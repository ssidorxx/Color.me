<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use App\Models\Order_content;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{


    public function index ()
    {
        $orders = Order::where('user_id', auth()->id())->get();

        return view('orders.index', compact('orders', ));
    }

    //добавление товаров в базу и удаление их из корзины
    public function store(Request $request)
    {
//        dd(Basket::getAmount());
//        dd($request->all());
        $res = false;

        if($request->all()!=null){

                $res = Order::create([
                    'user_id' => auth()->id(),
                    'amount' => Basket::getAmount(),
                    'status_id' => 1,
                    'total_price'=>Basket::getPrice(),

                ]);
                foreach(Basket::getBasket()->get() as $product){
                    if($product->amount != 0){
                        Order_content::create([
                            'count_price'=>$product->price,
                            'count'=>$product->amount,
                            'order_id'=>$res->id,
                            'product_id'=>$product->product_id,

                        ]);
                        $elem = Product::find($product->product_id); //элемент в товарах
                        $elem ->update(['count' => $elem->count - $product->amount]);
                    }
                    $product->delete();
                }

        }
        return $res ? to_route('users.profile')->with(['success' => 'Заказ оформлен']) :
            to_route('basket.index')->withErrors(['error' => 'Не удалось оформить заказ']);
    }

    //метод для изменения статуса заказа и возвращения кол-ва  товаров обратно на склад
    public function cancelOrder(Order $order, Request $request)
    {
        $result = false;
        if ($request != '') {
            $result = $order->update(['status_id' => 3]);

            foreach ($order->contents as $product)
            {
                $elem = Product::find($product->product_id);
                $elem->update(['count' => $elem->count + $product->count]);
            }
        }

        return $result ? to_route('users.profile')->with(['success' => 'Заказ успешно отменен']) :
            to_route('users.profile')->withErrors(['error' => 'Не удалось отменить заказ']);
    }
//метод для просмотра состава заказа;
    public function show(Order $order)
    {

        return view("orders.show",[
            'orderContent'=>$order->contents,
            'order_id'=>$order->id,
        ]);
    }
}
