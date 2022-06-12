<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    private $units;
    private $unit;
    public function add()
    {
        return view('admin.unit.add');
    }
    public function create(Request $request)
    {
//        return $request->all();
        Unit::newUnit($request);
        return redirect()->back()->with('message','Unit Info Create Successfully');
    }
    public function manage()
    {
        $this->units=Unit::orderBy('id','desc')->get();
        return view('admin.unit.manage',
            [
                'units'=>$this->units
            ]);
    }
    public function edit($id)
    {
        $this->unit=Unit::find($id);
        return view('admin.unit.edit',
            [
                'unit'=>$this->unit
            ]);
    }
    public function update(Request $request,$id)
    {
        Unit::updateUnit($request,$id);
        return redirect('/manage-unit')->with('message','Unit Info Update Successfully');
    }

    public function delete($id)
    {
        $this->unit=Unit::find($id);

        $this->unit->delete();

        return redirect('/manage-unit')->with('message','Unit Info Delete Successfully');

    }
}
