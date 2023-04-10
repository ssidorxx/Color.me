<?php

namespace App\Http\Controllers;

use App\Http\Resources\BasketResource;
use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index()
    {
        $baskets = Basket::getBasket()->get();

        return view('baskets.index', compact('baskets'));
    }

    public function add(Request $request)
    {

        //ищем продукт в корзине авторизированного пользователя
        $basketProduct = Basket::getProductById($request->data);

//         dd($request->all());

        //если продукт не найден в корзине
        if ($basketProduct == null){
            $basketProduct = Basket::create([
                'user_id'=>auth()->id(), //auth()->user()->id,
                'price'=> Product::find($request->data)->price,
                'product_id'=> $request->data,
                'amount' => 1
            ]);

        }

        //иначе увеличиватеся в колво в корзине (без превышения товара в базе)
        else{
            $product = Product::find($request->data);

            if($basketProduct->amount < $product->count){
                $basketProduct->amount++;
                $basketProduct->price = $basketProduct ->summary;
                $basketProduct->save();
            }
        }
        return new BasketResource($basketProduct);
    }
    public function decrease (Request $request)
    {
        $basketProduct = Basket::getProductById($request->data);

        if($basketProduct-> amount > 1) {
            $basketProduct-> amount --;
            $basketProduct->price = $basketProduct ->summary;
            $basketProduct->save();
        }
        return new BasketResource($basketProduct);
    }

    public function destroy($id)
    {
        $res = Basket::where('product_id', $id)->where('user_id', auth()->id())->delete();

        return $res ? back()->with(['success' => 'Успешно удалено!']) :
            back()->withErrors(['error' => 'Не удалось удалить!']);
    }
    public function delete()
    {
        $basket = Basket::where('user_id', auth()->id())->pluck('id');
//        dd($basket);
        foreach ($basket as $product){
            $res = Basket::where('id', $product)->delete();
        }

        return $res ? back()->with(['success' => 'Успешно удалено!']) :
            back()->withErrors(['error' => 'Не удалось удалить!']);
    }
}
