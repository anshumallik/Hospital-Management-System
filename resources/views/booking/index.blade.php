@extends('layout.app')
@section('page-name', 'Booking')
@section('booking', 'active')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <style>
        .outer {
            width: 100%;
            text-align: center;
        }

        .inner {
            display: inline-block;

        }
    </style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Booking</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content" style="margin-left: 10px;">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title float-left">
                    Manage Booking Form
                </h3>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table id="booking" class="table table-responsive" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Doctor Name</th>
                        <th>Specialist</th>
                        <th>Doctor Day</th>
                        <th>Doctor Time</th>
                        <th>Doctor Fees</th>
                        <th>Patient Name</th>
                        <th>Booking Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($booking as $b)
                        <tr>
                            <td>{{ ++$id }}</td>
                            <td>{{ $b->doctor['name'] }}</td>
                            <td>{{ $b->designation['name'] }}</td>
                            <td>{{ $b->doctor['day'] }}</td>
                            <td>{{ $b->doctor['time'] }}</td>
                            <td>{{ $b->doctor['fee'] }}</td>
                            <td>{{ $b->patient['name'] }}</td>
                            <td>
                                @if($b->status === "pending")
                                    {{ $b->status }}
                                    <form action="{{route('status.update', $b->id)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-success btn-sm" type="submit">Update</button>
                                    </form>
                                @else
                                    {{$b->status}}
                                @endif
                            </td>
                            <td>
                                <div class="d-inline-block">
                                    <a class="btn btn-sm" style="color: royalblue"
                                       href="{{route('booking.edit',$b->id)}}"><i
                                                class="fas fa-edit" title="Edit"></i></a>
                                    <a class="btn btn-sm" style="color: royalblue"
                                       href="{{route('booking.show',$b->id)}}"><i
                                                class="fas fa-eye" title="View"></i></a>
                                    <a class="btn btn-sm" style="color: red"
                                       href="{{route('generate-pdf',$b->id)}}"><i
                                                class="fas fa-file-pdf" title="Download"></i></a>
                                    <form action="{{route('booking.destroy', $b->id)}}" method="POST">@csrf
                                        @method('DELETE')
                                        <button value="submit" class="btn btn-sm" style="color: red;"><i
                                                    class="fas fa-trash" title="Delete"></i></button>
                                    </form>
                                </div>
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
        $("#products").DataTable();
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
        $("#booking").DataTable();
    </script>
@endsection