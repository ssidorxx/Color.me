<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\FileService;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view("admins.products.index", [
            'products' => Product::orderBy('created_at', 'desc')->get(),
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view("admins.products.create", [
            'brands' => Brand::all(),
            'categories' => Category::all()
        ]);
    }

    public function store(ProductRequest $request)
    {

        $path = FileService::upload($request->file('photo'), '/products');

//        dd(['photo'=>$path]+$request->except('photo'));
        $res = Product::create(['photo' => $path] + $request->except('photo'));


        return $res ? to_route('admin.product.index')->with(['success' => 'Успешно создан!']) :
            to_route('admin.product.index')->withErrors(['error' => 'Не удалось создать!']);
    }

    public function edit(Product $product)
    {
        return view('admins.products.update', [
            'product' => $product,
            'brands' => Brand::all(),
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Product $product)
    {
//        dd($request->all());
        $path = FileService::update( $product->photo, '/products', $request->file('photo'));
//        ,dd($path);

        $res = $product->update(['photo' => $path] + $request->except('photo'));

        return $res ? to_route('admin.product.index')->with(['success' => 'Успешно обновлено!']) :
            to_route('admin.product.index')->withErrors(['error' => 'Не удалось обновить!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $res = false;
//        dd(FileService::delete($product->photo));
        if (FileService::delete($product->photo)) {
            $res = $product->delete();
        }
        return $res ? back()->with(['success' => 'Успешно удалено!']) :
            back()->withErrors(['error' => 'Не удалось удалить!']);
    }

}
