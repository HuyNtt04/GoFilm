<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class CateController extends Controller implements HasMiddleware
{
    public static function middleware(){
        return [
            new Middleware('permission:delete category',only:['destroy']),
            new Middleware('permission:update category',only:['update','edit']),
            new Middleware('permission:create category',only:['store','create']),
            new Middleware('permission:view category',only:['index']),
            new Middleware('permission:duyet category',only:['duyet'])
        ];

    }
    public function index()
    {
        $categories = Category::paginate(8);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name|max:255',
        ]);

        Category::create(['name' => $request->name]);

        return redirect()->route('admin.category.index')->with('success', 'Category added successfully!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id . '|max:255',
        ]);

        $category->update(['name' => $request->name]);

        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully!');
    }
    public function hardDelete(Request $request){
        $categories = $request->categories;
        Category::whereIn('id',$categories)->delete();
        return response()->json(['status' => 'success']);
    }
}