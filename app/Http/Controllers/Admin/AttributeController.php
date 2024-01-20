<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    public function attributeIndex()
    {
        $attributes = Attribute::get();
        return view('admin.products.attributes.product_attributes',compact('attributes'));
    }
    public function createAttribute($id = null)
    {
        $data['attribute'] = $id ? Attribute::find($id) : new Attribute();
        return view('admin.products.attributes.add', $data);
    }
    public function storeAttribute(Request $request,$id = null)
    {
        $request->validate(['name'=>'required']);
        $unit = $id ? Attribute::find($id) : new Attribute();
        $unit->name = $request->name;
        $unit->save();
        return redirect(route('admin.attributes'))->with('message', 'Attribute'. ($id ? ' updated ':' created '). 'successfully!');
    }
    public function destroyAttribute(Attribute $attribute)
    {
        $attribute->delete();
        return redirect(route('admin.attributes'))->with('message', 'Attribute deleted successfully!');
    }
}
