<?php

namespace App\Http\Controllers;

use App\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{

    public function index()
    {
        $time = Time::all();
        return view('time.index', compact('time'))->with('i');
    }


    public function create()
    {
        $time = Time::all();
        return view('time.create', compact('time'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'time' => 'required'
        ]);
        $time = new Time();
        $time->time = $request->time;
        $time->save();
        $notification = array(
            'message' => 'Time created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('time.index')->with($notification);


    }


    public function show(Time $time)
    {
        //
    }


    public function edit(Time $time)
    {
        return view('time.edit', compact('time'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, ['time' => 'required']);

        $time = Time::find($id);
        $time->time = $request->time;
        $time->save();

        $notification = array(
          'message' => 'Time updated successfully',
          'alert-type' => 'success'
        );

        return redirect()->route('time.index')->with($notification);
    }


    public function destroy($id)
    {
        $time = Time::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Time Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('time.index', compact('time'))
            ->with($notification);
    }
}
