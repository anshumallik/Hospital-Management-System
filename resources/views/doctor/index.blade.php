@extends('layout.app')
@section('page-name', 'Doctor')
@section('doctor', 'active')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Doctor</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content" style="margin-left: 10px;">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title float-left">
                    Doctor
                </h3>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table id="designation" class="table">
                    <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Photo</th>
                        <th>Specialist</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($doctor as $d)
                        <tr>
                            <td>{{ ++$id }}</td>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->phone }}</td>
                            <td><img src="{{asset('images/'.$p->image)}}" alt="" style="width:20px;"></td>
                            <td>{{ $d->designation['name'] }}</td>
                            <td>
                                <form action="{{route('doctor.destroy', $d->id)}}" method="POST">
                                    <a class="btn btn-sm" style="color: royalblue"
                                       href="{{ route('doctor.edit',$d->id) }}"><i
                                                class="fas fa-edit" title="Edit"></i></a>
                                    <a class="btn btn-sm" style="color: royalblue"
                                       href="{{ route('doctor.show',$d->id) }}"><i
                                                class="fas fa-eye" title="View"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button value="submit" class="btn btn-sm" style="color: red;"><i
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
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
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
        $("#designation").DataTable();
    </script>


@endsection