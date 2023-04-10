<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::InStock()->latest()->get();
//        $productsFiveInStock = Product::getFiveInStock(5)->latest()->get();
//        $productsItemsInStock = Product::getItemsInStock()->latest()->get();

        $categories = Category::get();
//        $categories = Category::all();
        $brands = Brand::all();
//        dd($productsItemsInStock);
//        $productsItemsInStock1 = Product::getItemsInStock(3)->get();
        return view('products.index', compact('products', 'categories', 'brands'));

    }
// позволяет просматривать товары по выбранной категории
    public function thisCategory(Category $category)
    {
        return view("products.index", [
            'products' => $category->products,
            'categories' => Category::all(),
            'brands' => Brand::all(),
        ]);
    }
//просмотра информации об одном товаре
    public function show(Product $product)
    {
        $productCategory = Product::getItemsInStock(5)->where('category_id', $product->category_id)->get();
//        dd($productCategory);
        return view('products.show', [
            'product' => $product,
            'productCategory' => $productCategory,
        ]);
    }

    public function productsFilter(Request $request)
    {
        $products = Product::InStock();

        if ($request->all() != []) {

            if ($request->category != []) {
                $products = $products->whereIn('category_id', $request->category);
            }

            if ($request->brand != []) {
                $products = $products->whereIn('brand_id', $request->brand);
            }

            if ($request->sorts != null) {
                $products = $products->orderBy($request->sorts, $request->sortSelected);
            }
            else {
                $products = $products->orderBy('created_at', 'desc');
            }
        }
        return back()->withInput($request->all() + ['products' => $products->get()]);
    }
}
