<?php

namespace App\Http\Controllers;

use App\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{

    public function index()
    {
        $designation = Designation::all();
        return view('designation.index', compact('designation'))->with('id');
    }


    public function create()
    {
        $designation = Designation::all();
        return view('designation.create', compact('designation'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        $designation = new Designation();
        $designation->name = $request->name;
        $designation->description = $request->description;
        $designation->save();

        $notification = array(
            'message' => 'Designation created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('designation.index')->with($notification);
    }


    public function show(Designation $designation)
    {
        //
    }


    public function edit(Designation $designation)
    {
        return view('designation.edit', compact('designation'));

    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        $designation = Designation::find($id);
        $designation->name = $request->name;
        $designation->description = $request->description;
        $designation->save();

        $notification = array(
            'message' => 'Designation updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('designation.index')
            ->with($notification);
    }

    public function destroy($id)
    {
        $designation = Designation::findOrFail($id);
        $designation->delete();

        $notification = array(
            'message' => 'Designation deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('designation.index')
            ->with($notification);

    }
}
