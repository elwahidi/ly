<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->

    @if(\Illuminate\Support\Facades\App::isLocale('ar'))
        <link rel="stylesheet" type="text/css" href="{{ asset('css_rtl/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css_rtl/bootstrap.rtl.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css_rtl/font-awesome.min.css') }}">
         <link rel="stylesheet" type="text/css" href="{{ asset('css_rtl/style.css') }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.rtl.min.css">-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    @endif

    <!--[if lt IE 9]>
    <script src="{{ asset('js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>
<div class="main-wrapper" id="app">
    @include('layouts.navbar')
    @include('communication.sidebar')

    @yield('content')




</div>

<div class="sidebar-overlay" data-reff=""></div>
<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.slimscroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/app_.js') }}"></script>
{{ Html::script('//'.Request::getHost().':6001/socket.io/socket.io.js') }}
{{ Html::script('js/app.js') }}

</body>
</html>
