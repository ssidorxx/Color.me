<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\FileService;
use App\Http\Requests\Category1Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view("admins.categories.index",[
            'categories'=>Category::all(),
        ]);
    }
    public function create()
    {

        return view("admins.categories.create",[
            'categories'=>Category::all(),
        ]);
    }

    public function edit(Category $category)
    {
        return view('admins.categories.update', [
            'category'=>$category,
        ]);
    }

    public function update(Request $request, Category $category)
    {
//        dd($request->all());
        $path = FileService::update( $category->photo,'/categories', $request->file('photo'));
//        dd($path);

        $res = $category->update(['photo' => $path] + $request->except('photo'));

        return $res ? to_route('admin.categories.index')->with(['success' => 'Успешно обновлено!']) :
            to_route('admin.categories.index')->withErrors(['error' => 'Не удалось обновить!']);
    }

    public function store(CategoryRequest $request)
    {
        $path = FileService::upload($request->file('photo'), '/categories');

//        dd(['photo'=>$path]+$request->except('photo'));
        $res = Category::create(['photo' => $path] + $request->except('photo'));


        return $res ? to_route('admin.categories.index')->with(['success' => 'Успешно создано!']) :
            to_route('admin.categories.index')->withErrors(['error' => 'Не удалось создать!']);
    }

    public function thisCategory(Category $category)
    {
        return view("admins.products.index",['products'=>$category->products]);
    }

    public function destroy($id)
    {
        $res = Category::find($id)->delete();
        return $res ? to_route('admin.categories.index')->with(['success' => 'Успешно удалено!']) :
            to_route('admin.categories.index')->withErrors(['error' => 'Не удалось удалить!']);
    }
}
