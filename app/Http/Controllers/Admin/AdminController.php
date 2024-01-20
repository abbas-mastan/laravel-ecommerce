<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AddProductRequest;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function categories()
    {
        $categories = Category::get();
        return view('admin.categories.index', compact('categories'));
    }
    public function products()
    {
        $products = Product::get();
        return view('admin.products.index',compact('products'));
    }

    public function addProduct($id = null)
    {
        $data['product'] = $id ? Product::find($id) : new Product();
        $data['categories'] = Category::get();
        return view('admin.products.add', $data);
    }
    public function storeProduct(AddProductRequest $request, $id = 0)
    {
        $product = $id ? Product::find($id) : new Product();
        if($request->hasFile('image')){
            if($id && $product->image) $this->deleteProductImage($product->image);
            $filename = $request->file('image')->hashName();
            $request->file('image')->storeAs("public/products/".$filename);
        }
        $category = Category::find($request->category);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->gender = $request->gender;
        $product->image = $filename ?? $product->image;
        $product->description = $request->description;
        $category->products()->save($product);
        return redirect(route('admin.add.product'))->with('message', 'Product'. ($id ? ' updated ':' created '). 'successfully!');
    }

    public  function deleteProduct(Product $product) 
    {
        if ($product->image) $this->deleteProductImage($product->image);
        $product->delete();
        return redirect(route('admin.products'))->with('message', 'Product deleted successfully!');

    }
    public  function deleteCategory(Category $category) 
    {
        $category->delete();
        return redirect(route('admin.categories'))->with('message', 'Category deleted successfully!');

    }
    public function addCategory($id = 0)
    {
        $category = $id ? Category::find($id) : new Category();
        return view('admin.categories.add', compact('category'));
    }
    public function storeCategory(Request $request, $id = 0)
    {
        $cat = $request->validate(['name' => 'required|min:5']);
        $category = $id ? Category::find($id) : new Category();
        $category->name = $cat['name'];
        $category->save();
        return redirect(route('admin.add.category'))->with('message', 'Category created successfully!');
    }

    private function deleteProductImage($filename)
    {
        Storage::delete('public/products/'.$filename);
    }
}
