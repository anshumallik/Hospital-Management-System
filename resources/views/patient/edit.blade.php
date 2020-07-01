@extends('layout.app')
@section('page-name', 'Patient-Edit')
@section('patient', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Edit Patients Form</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Patient</li>
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
                            <h3 class="card-title">Edit Patients Form</h3>
                        </div>
                        <form action="{{route('patient.update', $patient->id)}}" role="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{$patient->name}}" class="form-control"
                                           id="name"
                                           placeholder="Enter Name">
                                    @if($errors->has('name'))
                                        <p class="error alert alert-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="day">Email</label>
                                    <input type="text" name="email" value="{{$patient->email}}"
                                           class="form-control"
                                           id="email"
                                           placeholder="Enter Email">
                                    @if($errors->has('email'))
                                        <p class="error alert alert-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone">Mobile Number</label>
                                    <input type="text" name="phone" value="{{$patient->phone}}"
                                           class="form-control"
                                           id="phone"
                                           placeholder="Enter Mobile Number">
                                    @if($errors->has('phone'))
                                        <p class="error alert alert-danger">{{$errors->first('phone')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="day">Address</label>
                                    <input type="text" name="address" value="{{$patient->address}}"
                                           class="form-control"
                                           id="phone"
                                           placeholder="Enter Address">
                                    @if($errors->has('address'))
                                        <p class="error alert alert-danger">{{$errors->first('address')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group text-center">
                                    <a class="btn btn-primary btn-xs" style="" href="{{ route('patient.index') }}">
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