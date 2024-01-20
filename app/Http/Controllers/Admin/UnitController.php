<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    public function unitIndex()
    {
        $units = Unit::get();
        return view('admin.products.units.product_units',compact('units'));
    }
    public function createUnit($id = null)
    {
        $data['unit'] = $id ? Unit::find($id) : new Unit();
        return view('admin.products.units.add', $data);
    }
    public function storeUnit(Request $request,$id = null)
    {
        $request->validate(['name'=>'required','status'=>'required']);
        $unit = $id ? Unit::find($id) : new Unit();
        $unit->name = $request->name;
        $unit->status = $request->status;
        $unit->save();
        return redirect(route('admin.add.unit'))->with('message', 'Unit'. ($id ? ' updated ':' created '). 'successfully!');
    }
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect(route('admin.units'))->with('message', 'Unit deleted successfully!');

    }
}
