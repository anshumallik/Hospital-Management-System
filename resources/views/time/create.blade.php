@extends('layout.app')
@section('page-name', 'Time-Create')
@section('time', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Add Time</h3>
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
                            <h3 class="card-title">Add Time</h3>
                        </div>
                        <form action="{{route('time.store')}}" role="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Add Time</label>
                                    <input type="text" name="time" class="form-control" id="product_name"
                                           placeholder="Enter Time">
                                    @if($errors->has('time'))
                                        <p class="error alert alert-danger">{{$errors->first('time')}}</p>
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
@endsection