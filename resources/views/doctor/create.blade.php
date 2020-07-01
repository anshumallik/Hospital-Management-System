@extends('layout.app')
@section('page-name', 'Doctor-Create')
@section('doctor', 'active')
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"
          xmlns="http://www.w3.org/1999/html">
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet"/>
    <link href="{{ asset('css/jquery.multiselect.css') }}" rel="stylesheet"/>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Doctors Form</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Doctor</li>
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
                            <h3 class="card-title">Doctors Form</h3>
                        </div>
                        <form action="{{route('doctor.store')}}" role="form" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="Enter Name">
                                    @if($errors->has('name'))
                                        <p class="error alert alert-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" placeholder="Email" name="email"
                                           class="form-control">
                                    @if($errors->has('email'))
                                        <p class="error alert alert-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone">Mobile Number</label>
                                    <input type="text" id="phone" placeholder="Mobile Number" name="phone"
                                           class="form-control">
                                    @if($errors->has('phone'))
                                        <p class="error alert alert-danger">{{$errors->first('phone')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone">Photo</label>
                                    <input type="file" id="image" placeholder="Choose Image" name="image"
                                           class="form-control file">
                                    @if($errors->has('image'))
                                        <p class="error alert alert-danger">{{$errors->first('image')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="specialist">Specialist</label>
                                    <select class="form-control" name="designation_id">
                                        <option value="">Select Specialist</option>
                                        @foreach($designation as $d)
                                            <option value="{{$d->id}}" name="designation_id">{{$d->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('specialist'))
                                        <p class="error alert alert-danger">{{$errors->first('specialist')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="specialist">Day</label>
                                    <select class="form-control" name="day">
                                        <option value="">Select Day</option>
                                        @foreach($days as $day)
                                            <option value="{{$day->day}}" name="day">{{$day->day}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('specialist'))
                                        <p class="error alert alert-danger">{{$errors->first('specialist')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="specialist">Time/Schedule</label>
                                    <select name="time[]" multiple="multiple" class="3col active" id="time">
                                        @foreach($time as $t)
                                            <option name="time[]"
                                                    value="{{$t->time}}">{{ $t->time }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('specialist'))
                                        <p class="error alert alert-danger">{{$errors->first('specialist')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone">Fees</label>
                                    <input type="number" id="fee" name="fee"
                                           class="form-control">
                                    @if($errors->has('fee'))
                                        <p class="error alert alert-danger">{{$errors->first('fee')}}</p>
                                    @endif
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
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.multiselect.js') }}"></script>
    <script>
        $('#time').multiselect({
            columns: 1,
            placeholder: 'Select Time',
            search: true,
            selectAll: true
        });
    </script>
@endsection