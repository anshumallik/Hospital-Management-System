@extends('layout.app')
@section('page-name', 'Role')
@section('roles', 'active')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Roles</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title float-left">
                    Roles
                </h3>
            </div>
            <div class="card-body p-0">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table class="table projects">
                    <tr>
                        <th>Sn</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                                    <a class="btn" href="{{ route('roles.show',$role->id) }}" style="color: royalblue;"><i
                                                class="fa fa-eye" title="View"></i></a>
                                    @can('role-edit')
                                        <a class="btn" style="color: royalblue;"
                                           href="{{ route('roles.edit',$role->id) }}"><i class="fas fa-edit"
                                                                                         title="Edit"></i></a>
                                    @endcan
                                    @csrf
                                    @method('DELETE')
                                    @can('role-delete')
                                        <button value="submit" class="btn btn-sm" style="color: red;"><i
                                                    class="fas fa-trash" title="Delete"></i></button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>


                @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
    {{--{!! $roles->render() !!}--}}
@endsection