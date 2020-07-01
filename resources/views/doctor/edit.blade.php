@extends('layout.app')
@section('page-name', 'Doctor-Edit')
@section('doctor', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Edit Doctors Form</h3>
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
                            <h3 class="card-title">Edit Doctors Form</h3>
                        </div>
                        <form action="{{route('doctor.update', $doctor->id)}}" role="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{$doctor->name}}" class="form-control"
                                           id="name"
                                           placeholder="Enter Name">
                                    @if($errors->has('name'))
                                        <p class="error alert alert-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="day">Email</label>
                                    <input type="text" name="email" value="{{$doctor->email}}"
                                           class="form-control"
                                           id="email"
                                           placeholder="Enter Email">
                                    @if($errors->has('email'))
                                        <p class="error alert alert-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone">Mobile Number</label>
                                    <input type="text" name="phone" value="{{$doctor->phone}}"
                                           class="form-control"
                                           id="phone"
                                           placeholder="Enter Mobile Number">
                                    @if($errors->has('phone'))
                                        <p class="error alert alert-danger">{{$errors->first('phone')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Specialist</label>
                                    <input type="text" class="form-control" name="designation_id"
                                           value="{{ $doctor->designation->name }}">
                                    @if($errors->has('designation_id'))
                                        <p class="error alert alert-danger">{{$errors->first('specialist')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Day</label>
                                    <input type="text" class="form-control" name="day" value="{{$doctor->day}}">
                                    @if($errors->has('day'))
                                        <p class="error alert alert-danger">{{$errors->first('day')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Time/schedule</label>
                                    <input type="text" name="time" value="{{$doctor->time}}"
                                           class="form-control"
                                           id="time"
                                           placeholder="Enter Time">
                                    @if($errors->has('time'))
                                        <p class="error alert alert-danger">{{$errors->first('time')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="day">Fees</label>
                                    <input type="number" name="fee" value="{{$doctor->fee}}"
                                           class="form-control"
                                           id="fee"
                                           placeholder="Enter Fee">
                                    @if($errors->has('phone'))
                                        <p class="error alert alert-danger">{{$errors->first('phone')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group text-center">
                                    <a class="btn btn-primary btn-xs" style="" href="{{ route('doctor.index') }}">
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