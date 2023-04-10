<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view("admins.brands.index",[
            'brands'=>Brand::all(),
        ]);
    }
    public function create()
    {

        return view("admins.brands.create",[
            'brands'=>Brand::all(),
        ]);
    }

    public function edit(Brand $brand)
    {
        return view('admins.brands.update', [
            'brand'=>$brand,
        ]);
    }
    public function update(Request $request, Brand $brand)
    {
        $res = $brand->update($request->all());

        return $res ? to_route('admin.brand.index')->with(['success' => 'Успешно обновлено!']) :
            to_route('admin.brand.index')->withErrors(['error' => 'Не удалось обновить!']);
    }

    public function store(BrandRequest $request)
    {
//        dd($request->all());
//        if(Category::where('',$request->category));
        $res = $categories = Brand::create($request->all());

        return $res ? to_route('admin.brand.index')->with(['success' => 'Успешно создано!']) :
            to_route('admin.brand.index')->withErrors(['error' => 'Не удалось создать!']);
    }

    public function thisBrand(Brand $brand)
    {
        return view("admins.products.index",['products'=>$brand->products]);
    }

    public function destroy($id)
    {
        $res = Brand::find($id)->delete();
        return $res ? to_route('admin.brand.index')->with(['success' => 'Успешно удалено!']) :
            to_route('admin.brand.index')->withErrors(['error' => 'Не удалось удалить!']);
    }
}
