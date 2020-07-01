<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Day;
use App\Designation;
use App\Doctor;
use App\DoctorDetail;
use App\Patient;
use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use PhpParser\Comment\Doc;

class BookingController extends Controller
{

    public function index()
    {
        $booking = Booking::with('doctor', 'designation', 'patient')->get();
        $designation = Designation::all();
        return view('booking.index', compact('designation', 'booking'))->with('id');
    }


    public function create($designation_id = null)
    {
        $doctor = Doctor::where('designation_id', $designation_id)->pluck('name', 'id');
        $time = Time::all();
        $patient = Patient::all();
        $days = Day::all();
        $designation = Designation::all();
        $booking = Booking::all();
        return view('booking.create', compact('booking', 'designation', 'doctor', 'time', 'days', 'patient'));
    }

    public function getDesignation(Request $request)
    {
        $doctor = DB::table('doctors')
            ->where("designation_id", $request->designation_id)->pluck('name', 'id');
        return response()->json($doctor);
    }

    public function getTime(Request $request)
    {
        $time = DB::table('doctors')
            ->where("id", $request->id)->pluck('time', 'id');
        return response()->json($time);
    }


    public function getDay(Request $request)
    {
        $time = DB::table('doctors')
            ->where('id', $request->id)->pluck('day', 'id');
        return response()->json($time);
    }

    public function getFee(Request $request)
    {
        $time = DB::table('doctors')
            ->where('id', $request->id)->pluck('fee', 'id');
        return response()->json($time);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'booking_date' => 'required',
            'time_choosen' => 'required',
        ]);

        $booking = new Booking();
        $booking->doctor_fees = $request->doctor_fees;
        $booking->designation_name = $request->designation_name;
        $booking->patient_id = $request->patient_id;
        $booking->doctor_name = $request->doctor_name;
        $booking->doctor_day = $request->doctor_day;
        $booking->doctor_time = $request->doctor_time;
        $booking->booking_date = $request->booking_date;
        $booking->time_choosen = $request->time_choosen;
        $booking->save();
        $notification = array(
            'message' => 'Booking created Successfully',
            'alert-type' => "success"
        );
        return redirect()->route('booking.index')
            ->with($notification);

    }


    public function show($id)
    {
        $days = Day::find($id);
        $doctor = Doctor::find($id);
        $patient = Patient::find($id);
        $booking = Booking::find($id);
        return view('booking.show', compact('patient', 'doctor', 'days', 'booking'));
    }


    public function edit(Booking $booking)
    {
        $doctor = Doctor::all();
        return view('booking.edit', compact('booking', 'doctor'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'booking_date' => 'required',
            'time_choosen' => 'required',
            'doctor_fees' => 'required',
        ]);
        $booking = Booking::find($id);
        $booking->designation_name = $request->designation_name;
        $booking->doctor_name = $request->doctor_name;
        $booking->doctor_time = $request->doctor_time;
        $booking->doctor_day = $request->doctor_day;
        $booking->doctor_fees = $request->doctor_fees;
        $booking->booking_date = $request->booking_date;
        $booking->patient_id = $request->patient_id;
        $booking->time_choosen = $request->time_choosen;
        $booking->save();

        $notification = array(
            'message' => 'Booking Updated Successfully',
            'alert-type' => "success"
        );
        return redirect()->route('booking.index')
            ->with($notification);

    }

    public function generatePdf($id)
    {
        $booking = Booking::find($id);
        $pdf = PDF::loadView('booking.pdf', compact('booking'));
        set_time_limit(0);
        return $pdf->download('hospital.pdf');
    }

    public function bookingStatus()
    {
        $booking = Booking::all();
        $booking->status = 'completed';
        $booking->save();
        $notification = array(
            'message' => 'Booking Status Updated Successfully',
            'alert-type' => "success"
        );
        return redirect()->route('booking.index')
            ->with($notification);
    }


    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        $notification = array(
            'message' => 'Booking Deleted Successfully',
            'alert-type' => "success"
        );
        return redirect()->route('booking.index')
            ->with($notification);

    }
}
