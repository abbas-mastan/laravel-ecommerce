<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\Opinion;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    public function indexBenefit()
    {
        $benefits = Benefit::get();
        return view('admin.products.benefits.product_benefits',compact('benefits'));
    }
    public function createBenefit($id = null)
    {
        $data['benefit'] = $id ? Benefit::find($id) : new Benefit();
        $data['opinions'] = Opinion::get();
        return view('admin.products.benefits.add', $data);
    }
    public function storeBenefit(Request $request,$id = null)
    {
        $request->validate(['name'=>'required','opinion'=>'nullable']);
        $unit = $id ? Benefit::find($id) : new Benefit();
        $unit->name = $request->name;
        $unit->opinion_id = $request->opinion;
        $unit->save();
        return redirect(route('admin.benefits'))->with('message', 'Benefit'. ($id ? ' updated ':' created '). 'successfully!');
    }
    public function destroyBenefit(Benefit $benefit)
    {
        $benefit->delete();
        return redirect(route('admin.benefits'))->with('message', 'Benefit deleted successfully!');
    }
}
