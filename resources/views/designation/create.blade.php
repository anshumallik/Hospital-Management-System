@extends('layout.app')
@section('page-name', 'Designation-Create')
@section('designation', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Create Designation</h3>
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
                            <h3 class="card-title">Add New Designation</h3>
                        </div>
                        <form action="{{route('designation.store')}}" role="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input type="text" name="name" class="form-control" id="designation"
                                           placeholder="Enter Designation">
                                    @if($errors->has('name'))
                                        <p class="error alert alert-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="designation">Description</label>
                                    <input type="text" id="description" placeholder="Description" name="description"
                                           class="form-control">
                                    @if($errors->has('description'))
                                        <p class="error alert alert-danger">{{$errors->first('description')}}</p>
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