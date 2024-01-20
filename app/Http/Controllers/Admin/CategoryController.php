<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::get();
        return view('admin.products.categories.index', compact('categories'));
    }
   public  function deleteCategory(Category $category) 
    {
        $category->delete();
        return redirect(route('admin.categories'))->with('message', 'Category deleted successfully!');

    }
    public function addCategory($id = 0)
    {
        $category = $id ? Category::find($id) : new Category();
        return view('admin.products.categories.add', compact('category'));
    }
    public function storeCategory(Request $request, $id = 0)
    {
        $cat = $request->validate(['name' => 'required|min:5','description'=>'required']);
        $category = $id ? Category::find($id) : new Category();
        $category->name = $cat['name'];
        $category->slug = Str::slug($cat['name']);
        $category->description = $cat['description'];
        $category->save();
        return redirect(route('admin.categories'))->with('message', 'Category'.($id ? ' updated ':' created ') .'successfully!');
    }
}
