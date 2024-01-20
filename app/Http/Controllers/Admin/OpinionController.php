<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Opinion;

class OpinionController extends Controller
{
    public function indexOpinion()
    {
        $opinions = Opinion::get();
        return view('admin.products.opinions.product_opinions',compact('opinions'));
    }
    public function createOpinion($id = null)
    {
        $data['opinion'] = $id ? Opinion::find($id) : new Opinion();
        return view('admin.products.opinions.add', $data);
    }
    public function storeOpinion(Request $request,$id = null)
    {
        $request->validate(['name'=>'required']);
        $unit = $id ? Opinion::find($id) : new Opinion();
        $unit->name = $request->name;
        $unit->save();
        return redirect(route('admin.add.attribute'))->with('message', 'Attribute'. ($id ? ' updated ':' created '). 'successfully!');
    }
    public function destroyOpinion(Opinion $opinion)
    {
        $opinion->delete();
        return redirect(route('admin.opinions'))->with('message', 'Attribute deleted successfully!');
    }
}