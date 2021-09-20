<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = new Category;
        $categories = Category::all();
        return view('admin.categories.index',['categories'=>$categories]);
    }

    public function create()
    {
        {
            $categories = Category::all();
         
        }
    }

    
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->save();

       return back();
    }

    public function edit(Category $category)
    {
        $categories = new Category;
        $this->$categories = Category::all();
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request,$id)
    {
        $category = Category::findorfail($id);
        $request->validate([
            'name' => 'required',
        ]);
        $category->update($request->all());

        $category->save();
         return redirect()->route('categories.index');
        return back();
    }

    public function destroy($id)
    {
        Category::findorfail($id)->delete();
        return redirect()->route('categories.index');
    }

    
}
