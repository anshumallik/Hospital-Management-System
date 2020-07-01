@extends('layout.app')
@section('page-name', 'Booking-Create')
@section('booking', 'active')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Booking Form</h3>
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
                            <h3 class="card-title">Booking Form</h3>
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
                        <form action="{{route('booking.store')}}" role="form" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="specialist">Specialist:</label>
                                    <select class="form-control designation" name="designation_name" id="designation"
                                            style="width: 100%;">
                                        <option value="Select Specialist">Select Specialist</option>
                                        @foreach($designation as $d)
                                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <select class="form-control doctor" name="doctor_name" id="doctor"
                                            style="width: 100%;">
                                        <option value="Select Doctor">Select Doctor</option>
                                        <option value="0"></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="doctor_time">Time</label>
                                    <select class="form-control" name="doctor_time" id="doctor_time">
                                        <option value="Select Time">Select Time</option>
                                        <option value="0"></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="specialist">Day</label>
                                    <select class="form-control" name="doctor_day" id="day">
                                        <option value="Select Day">Select Day</option>
                                        <option value="0"></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="doctor_fees">Fees</label>
                                    <select class="form-control" name="doctor_fees" id="fee">
                                        <option value="Select Fees">Select Fees</option>
                                        <option value="0"></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="patient">Patient Name</label>
                                    <select class="form-control" name="patient_id" id="patient_id">
                                        <option value="Select Patient">Select Patient</option>
                                        @foreach($patient as $p)
                                            <option value="{{$p->id}}">{{$p->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" name="booking_date" id="date"
                                           placeholder="mm/dd/yyyy">
                                </div>
                                <div class="form-group">
                                    <label for="time">Like your Time</label>
                                    <input type="text" class="form-control" name="time_choosen" id="your_time"
                                           placeholder="Enter time">
                                </div>
                            </div>
                            <div class="card-footer" style="text-align: center">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--<script src="https://code.jquery.com/jquery-3.4.1.js"></script>--}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script>
        $('#designation').change(function () {
            var cat_id = $(this).val();
            console.log(cat_id);
            if (cat_id) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('get-designation') }}?designation_id=" + cat_id,
                    success: function (data) {
                        console.log(data);
                        if (data) {
                            $("#doctor").empty();
                            $("#doctor").append('<option value="Select doctor">Select Doctor</option>');
                            $.each(data, function (key, value) {
                                $("#doctor").append('<option value="' + key + '">' + value + '</option>');
                            });
                        } else {
                            $('#doctor').empty();
                        }
                    }
                });
            } else {
                $('#doctor').empty();

            }
        });


        $('#doctor').change(function () {
            var time = $(this).val();
            console.log(time);
            if (time) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('get-time') }}?id=" + time,
                    success: function (data) {
                        console.log(data);
                        if (data) {
                            $("#doctor_time").empty();
                            $("#doctor_time").append('<option value="Select Time">Select Time</option>');
                            $.each(data, function (key, value) {
                                $("#doctor_time").append('<option value="' + key + '">' + value + '</option>');
                            });
                        } else {
                            $('#doctor_time').empty();
                        }
                    }
                });
            } else {
                $('#doctor_time').empty();

            }
        });


        $('#doctor_time').change(function () {
            var time = $(this).val();
            console.log(time);
            if (time) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('get-day') }}?id=" + time,
                    success: function (data) {
                        console.log(data);
                        if (data) {
                            $("#day").empty();
                            $("#day").append('<option value="Select Time">Select Time</option>');
                            $.each(data, function (key, value) {
                                $("#day").append('<option value="' + key + '">' + value + '</option>');
                            });
                        } else {
                            $('#day').empty();
                        }
                    }
                });
            } else {
                $('#day').empty();

            }
        });
        $('#day').change(function () {
            var time = $(this).val();
            console.log(time);
            if (time) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('get-fee') }}?id=" + time,
                    success: function (data) {
                        console.log(data);
                        if (data) {
                            $("#fee").empty();
                            $("#fee").append('<option value="Select Fee">Select Fee</option>');
                            $.each(data, function (key, value) {
                                $("#fee").append('<option value="' + key + '">' + value + '</option>');
                            });
                        } else {
                            $('#fee').empty();
                        }
                    }
                });
            } else {
                $('#fee').empty();

            }
        });


        $(function () {
            $("#date").datepicker()
        });


    </script>



@endsection