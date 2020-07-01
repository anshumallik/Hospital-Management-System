<?php

namespace App\Http\Controllers;

use App\Day;
use App\Designation;
use App\Doctor;
use App\Time;
use Illuminate\Http\Request;
use function Sodium\compare;

class DoctorController extends Controller
{

    public function index()
    {
        $time = Time::all();
        $days = Day::all();
        $designation = Designation::all();
        $doctor = Doctor::all();
        return view('doctor.index', compact('doctor', 'designation', 'days', 'time'))->with('id');

    }


    public function create()
    {
        $time = Time::all();
        $days = Day::all();
        $designation = Designation::all();
        $doctor = Doctor::all();
        return view('doctor.create', compact('doctor', 'designation', 'days', 'time'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:doctors,email',
            'phone' => 'required',
            'fee' => 'required',
            'day' => 'required',
        ]);
        $image = $request->file('image');
        if (isset($image)) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('images/')) {
                mkdir('images/', 0777, true);
            }
            $image->move('images/', $imageName);
        }
        $doctor = new Doctor();
        $doctor = $request->input('time');
        $doctor = implode(',', $doctor);
        $input = $request->except('time');
        $doctor->time = $doctor;
        $doctor->desigantion_id = $request->designation_id;
        $doctor->image = $imageName;
        $doctor->save();

        $input['time'] = $doctor;
        $input['day'] = $request->day;
        $input['image'] = $imageName;
        $input['designation_id'] = $request->designation_id;
        Doctor::create($input);

        $notification = array(
            'message' => 'Doctor added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('doctor.index')
            ->with($notification);


    }

    public function show($id)
    {
        $time = Time::all();
        $days = Day::all();
        $doctor = Doctor::find($id);
        return view('doctor.show', compact('doctor', 'days', 'time'));
    }


    public function edit(Doctor $doctor, $id = null)
    {
        $time = Time::find($id);
        $days = Day::all();
        $designations = Designation::where('id', $id)->with('doctors')->first();
        return view('doctor.edit', compact('doctor', 'designations', 'time', 'days'));
    }


    public function update(Request $request, $id)
    {

        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->fee = $request->fee;
        $doctor->day = $request->day;
        $doctor->time = $request->time;
        $doctor->designation_id = $request->designation_id;
        $doctor->save();
        $notification = array(
            'message' => 'Doctor Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('doctor.index')
            ->with($notification);
    }


    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        $notification = array(
            'message' => 'Doctor Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('doctor.index')
            ->with($notification);
    }
}
