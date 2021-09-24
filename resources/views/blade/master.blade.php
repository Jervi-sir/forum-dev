<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/jpg" href="{{ asset('images/logo.png')}}" />

    <link rel="stylesheet" href="{{ asset('css/master.css')}}">
    <link rel="stylesheet" href="{{ asset('css/header.css')}}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


    <link rel="stylesheet" href="{{ asset('css/master.css')}}">
    <link rel="stylesheet" href="{{ asset('css/header.css')}}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    @yield('top-style')
    @yield('top-script')
    @yield('title')

</head>
<body>
    <div id="header">
        @include('blade.components.header')
    </div>
    @yield('body')
    @include('blade.footer')
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>
</html>
