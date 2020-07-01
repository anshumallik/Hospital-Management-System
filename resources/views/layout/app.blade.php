<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hospital Management System</title>
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('diamond.png')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('layout.navbar')
    @include('layout.sidebar')
    <div class="content-wrapper">
        @yield('content')
    </div>
    @include('layout.footer')
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>