@extends('layout.app')
@section('page-name', 'Permissions')
@section('permissions', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Permissions</h1>
                </div>

            </div>
        </div>
    </section>
    <section class="content" style="margin-left: 10px;">
        <div class="card">
            <div class="card-header">
                <h3>Permission</h3>
            </div>
            <div class="card-body">
                <table class="table projects">
                    <thead>
                    <tr>
                        <th>Permissions</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}"
                                   class="btn btn-sm pull-left" style="margin-right: 3px; color: royalblue;"><i
                                            class="fas fa-edit" title="Edit"></i></a>
                                <form action="{{route('permissions.destroy', $permission->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm" style="color:red;"><i
                                                class="fas fa-trash" title="Delete"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection