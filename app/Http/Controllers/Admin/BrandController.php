<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function indexBrand()
    {
        $brands = Brand::get();
        return view('admin.products.brands.product_brands',compact('brands'));
    }
    public function createBrand($id = null)
    {
        $data['brand'] = $id ? Brand::find($id) : new Brand();
        return view('admin.products.brands.add', $data);
    }
    public function storeBrand(Request $request,$id = null)
    {
        $request->validate(['name'=>'required','status'=>'required']);
        $unit = $id ? Brand::find($id) : new Brand();
        $unit->name = $request->name;
        $unit->status = $request->status;
        $unit->slug = Str::slug($request->name,'-');
        $unit->save();
        return redirect(route('admin.brands'))->with('message', 'Brand'. ($id ? ' updated ':' created '). 'successfully!');
    }
    public function destroyBrand(Brand $brand)
    {
        $brand->delete();
        return redirect(route('admin.brands'))->with('message', 'Brand deleted successfully!');
    }
}
