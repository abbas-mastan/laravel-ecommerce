<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function products()
    {
        $products = Product::get();
        return view('admin.products.index', compact('products'));
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
        if ($request->hasFile('image')) {
            if ($id && $product->image) {
                $this->deleteProductImage($product->image);
            }
            $filename = $request->file('image')->hashName();
            $request->file('image')->storeAs("public/products/" . $filename);
        }
        $category = Category::find($request->category);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->gender = $request->gender;
        $product->status = $request->status;
        $product->image = $filename ?? $product->image;
        $product->description = $request->description;
        $category->products()->save($product);
        return redirect(route('admin.products'))->with('message', 'Product' . ($id ? ' updated ' : ' created ') . 'successfully!');
    }

    public function deleteProduct(Product $product)
    {
        if ($product->image) {
            $this->deleteProductImage($product->image);
        }

        $product->delete();
        return redirect(route('admin.products'))->with('message', 'Product deleted successfully!');

    }

    private function deleteProductImage($filename)
    {
        Storage::delete('public/products/' . $filename);
    }
}
