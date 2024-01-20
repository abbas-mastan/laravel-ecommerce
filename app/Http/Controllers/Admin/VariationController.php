<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Variation;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    //
    public function indexVariation()
    {
        $variations = Variation::get();
        return view('admin.products.variations.product_variations',compact('variations'));
    }
    public function createVariation($id = null)
    {
        $data['variation'] = $id ? Variation::find($id) : new Variation();
        $data['attributes'] = Attribute::get();
        return view('admin.products.variations.add', $data);
    }
    public function storeVariation(Request $request,$id = null)
    {
        $request->validate(['name'=>'required','attribute'=>'nullable']);
        $unit = $id ? Variation::find($id) : new Variation();
        $unit->name = $request->name;
        $unit->attribute_id = $request->attribute;
        $unit->save();
        return redirect(route('admin.variations'))->with('message', 'Variation'. ($id ? ' updated ':' created '). 'successfully!');
    }
    public function destroyVariation(Variation $variation)
    {
        $variation->delete();
        return redirect(route('admin.variations'))->with('message', 'Variation deleted successfully!');
    }
}
