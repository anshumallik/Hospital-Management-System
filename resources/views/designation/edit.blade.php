@extends('layout.app')
@section('page-name', 'Designation-Edit')
@section('designation', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Edit Designation Form</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Designation</li>
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
                            <h3 class="card-title">Edit Designation</h3>
                        </div>
                        <form action="{{route('designation.update', $designation->id)}}" role="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="day">Designation</label>
                                    <input type="text" name="name" value="{{$designation->name}}" class="form-control"
                                           id="day"
                                           placeholder="Enter Designation">
                                    @if($errors->has('name'))
                                        <p class="error alert alert-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="day">Description</label>
                                    <input type="text" name="description" value="{{$designation->description}}"
                                           class="form-control"
                                           id="description"
                                           placeholder="Enter Designation">
                                    @if($errors->has('description'))
                                        <p class="error alert alert-danger">{{$errors->first('description')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group text-center">
                                    <a class="btn btn-primary btn-xs" style="" href="{{ route('designation.index') }}">
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