@extends('layout.app')
@section('page-name', 'Booking-Edit')
@section('booking', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Edit Booking Form</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Booking</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content" style="margin-left: 10px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Booking Form</h3>
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <p><strong>Opps Something went wrong</strong></p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success" style="background-color: #0E9A00">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <form action="{{route('booking.update', $booking->id)}}" role="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Specialist</label>
                                    <input type="text" name="designation_name" value="{{$booking->designation['name']}}"
                                           class="form-control"
                                           id="name"
                                           placeholder="Enter Name">

                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="doctor_name" value="{{$booking->doctor['name']}}"
                                           class="form-control"
                                           id="doctor_name">
                                    @if($errors->has('doctor_name'))
                                        <p class="error alert alert-danger">{{$errors->first('doctor_name')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="time">Time</label>
                                    <input type="text" name="doctor_time" value="{{$booking->doctor['time']}}"
                                           class="form-control"
                                           id="doctor_time">
                                    @if($errors->has('doctor_time'))
                                        <p class="error alert alert-danger">{{$errors->first('doctor_time')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="day">Day</label>
                                    <input type="text" name="doctor_day" value="{{$booking->doctor['day']}}"
                                           class="form-control"
                                           id="doctor_day">
                                    @if($errors->has('doctor_day'))
                                        <p class="error alert alert-danger">{{$errors->first('doctor_day')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="day">Fees</label>
                                    <input type="number" name="doctor_fees" value="{{$booking->doctor['fee']}}"
                                           class="form-control"
                                           id="fee"
                                           placeholder="Enter Fee">
                                    @if($errors->has('doctor_fee'))
                                        <p class="error alert alert-danger">{{$errors->first('doctor_fee')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="day">Patient Name</label>
                                    <input type="text" name="patient_id" value="{{$booking->patient['name']}}"
                                           class="form-control"
                                           id="patient_id">
                                    @if($errors->has('patient_id'))
                                        <p class="error alert alert-danger">{{$errors->first('patient_id')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="text" name="booking_date" value="{{$booking->booking_date}}"
                                           class="form-control"
                                           id="booking_date">
                                    @if($errors->has('booking_date'))
                                        <p class="error alert alert-danger">{{$errors->first('booking_date')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="time_choosen">Like Your Time</label>
                                    <input type="text" name="time_choosen" value="{{$booking->time_choosen}}"
                                           class="form-control"
                                           id="time_choosen">
                                    @if($errors->has('time_choosen'))
                                        <p class="error alert alert-danger">{{$errors->first('time_choosen')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group text-center">
                                    <a class="btn btn-primary btn-xs" style="" href="{{ route('booking.index') }}">
                                        Back</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection