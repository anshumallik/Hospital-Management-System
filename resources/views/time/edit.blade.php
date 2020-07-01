@extends('layout.app')
@section('page-name', 'Time-Edit')
@section('time', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Edit Time</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Time</li>
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
                            <h3 class="card-title">Edit Time</h3>
                        </div>
                        <form action="{{route('time.update', $time->id)}}" role="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="day">Add Time</label>
                                    <input type="text" name="time" value="{{$time->time}}" class="form-control"
                                           id="day"
                                           placeholder="Enter Time">
                                    @if($errors->has('time'))
                                        <p class="error alert alert-danger">{{$errors->first('time')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group text-center">
                                    <a class="btn btn-primary btn-xs" style="" href="{{ route('time.index') }}">
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