<?php

namespace App\Http\Controllers;

use App\Day;
use Illuminate\Http\Request;
use function Sodium\compare;

class DayController extends Controller
{

    public function index()
    {
        $days = Day::all();
        return view('day.index', compact('days'))->with('i');
    }


    public function create()
    {
        $days = Day::all();
        return view('day.create', compact('days'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'day' => 'required',
        ]);
        $day = new Day();
        $day->day = $request->day;
        $day->save();
        $notification = array(
            'message' => 'Day added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('days.index')->with($notification);

    }


    public function show(Day $day)
    {
        //
    }


    public function edit(Day $day)
    {
        return view('day.edit', compact('day'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'day' => 'required',
        ]);
        $day = Day::find($id);
        $day->day = $request->day;
        $day->save();

        $notification = array(
            'message' => 'Day updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('days.index')->with($notification);
    }

    public function destroy($id)
    {
        $day = Day::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Day deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('days.index', compact('day'))->with($notification);
    }
}
