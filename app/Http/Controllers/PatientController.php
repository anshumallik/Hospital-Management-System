<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function index()
    {
        $patient = Patient::all();
        return view('patient.index', compact('patient'))->with('id');
    }


    public function create()
    {
        return view('patient.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $patient = new Patient();
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->save();

        $notification = array(
            'message' => 'Patient created successfully',
            'alert-type' => 'success',

        );
        return redirect()->route('patient.index')
            ->with($notification);

    }


    public function show(Patient $patient)
    {
        //
    }


    public function edit(Patient $patient)
    {
        return view('patient.edit', compact('patient'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);
        $patient = Patient::find($id);
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->phone = $request->phone;
        $patient->address = $request->address;
        $patient->save();

        $notification = array(
            'message' => 'Patient updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('patient.index')
            ->with($notification);

    }


    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        $notification = array(
            'message' => 'Patient deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('patient.index')
            ->with($notification);
    }
}
