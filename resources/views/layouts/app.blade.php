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
        <link rel="stylesheet" type="text/css" href="{{ asset('css_rtl/fullcalendar.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css_rtl/dataTables.bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css_rtl/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css_rtl/bootstrap-datetimepicker.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/morris/morris.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css_rtl/style.css') }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.rtl.min.css">-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/fullcalendar.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/morris/morris.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        @endif
        <link rel="stylesheet" type="text/css" href="{{ asset('css/loading.css') }}">
    @stack('custom-styles')
    <!--[if lt IE 9]>
        <script src="{{ asset('js/html5shiv.min.js') }}"></script>
        <script src="{{ asset('js/respond.min.js') }}"></script>
        <![endif]-->
</head>
<body>
<div class="main-wrapper" id="app">
    @include('layouts.sidebar')
    @include('layouts.navbar')

    <div class="page-wrapper">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @yield('content')
            @include('layouts.msg')
    </div>

</div>

<div class="sidebar-overlay" id="sidebar-overlay" data-reff=""><i class="loading"></i></div>
<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.slimscroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/morris/morris.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/raphael/raphael-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/translate.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/app_.js') }}"></script>
<script type="text/javascript" src="{{asset('js/tmpl.js')}}"></script>



@stack('custom-scripts')

{{ Html::script('//'.Request::getHost().':6001/socket.io/socket.io.js') }}
{{ Html::script('js/app.js') }}
</body>
</html>
