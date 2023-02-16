<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Starter Kit | @yield('title')</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" href="{{ checked_asset('dashboard/images/logo2.png') }}">
    <link rel="shortcut icon" href="{{ checked_asset('dashboard/images/logo2.png') }}">

    <link rel="stylesheet" href="{{ checked_asset('dashboard/assets/css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ checked_asset('dashboard/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ checked_asset('dashboard/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ checked_asset('dashboard/assets/css/themify/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ checked_asset('dashboard/assets/css/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ checked_asset('dashboard/assets/css/flag-icon/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ checked_asset('dashboard/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ checked_asset('dashboard/assets/css/style.css') }}">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="{{ checked_asset('dashboard/assets/css/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ checked_asset('dashboard/assets/css/jqvmap.min.css') }}" rel="stylesheet">

    <link href="{{ checked_asset('dashboard/assets/css/weather/css/weather-icons.css') }}" rel="stylesheet" />
    <link href="{{ checked_asset('dashboard/assets/css/fullcalendar.min.css') }}" rel="stylesheet" />
    <link href="{{ checked_asset('dashboard/assets/css/new-style.css') }}" rel="stylesheet" />

    <style>
        #weatherWidget .currentDesc {
            color: #ffffff!important;
        }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
    @yield('styles')
    @stack('header_scripts')
</head>
<body>
@include('admin.layouts.includes.menu')
<div id="right-panel" class="right-panel">
    <!-- Header-->
    @include('admin.layouts.includes.header')
    <!-- /#header -->
    @yield('bread_crumbs')
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            @yield('content')
        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
    <!-- Footer -->
    @include('admin.layouts.includes.footer')
    <!-- /.site-footer -->
</div>

<!-- Scripts -->
<script src="{{ checked_asset('dashboard/assets/js/jquery.min.js') }}"></script>
<script src="{{ checked_asset('dashboard/assets/js/popper.min.js') }}"></script>
<script src="{{ checked_asset('dashboard/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ checked_asset('dashboard/assets/js/jquery.matchHeight.min.js') }}"></script>
<script src="{{ checked_asset('dashboard/assets/js/main.js') }}"></script>

<!--  Chart js -->
{{--<script src="{{ checked_asset('dashboard/assets/js/Chart.bundle.min.js') }}"></script>--}}

<!--Chartist Chart-->
{{--<script src="{{ checked_asset('dashboard/assets/js/chartist.min.js') }}"></script>--}}
{{--<script src="{{ checked_asset('dashboard/assets/js/chartist-plugin-legend.min.js') }}"></script>--}}

{{--<script src="{{ checked_asset('dashboard/assets/js/jquery.flot.min.js') }}"></script>--}}
{{--<script src="{{ checked_asset('dashboard/assets/js/jquery.flot.pie.min.js') }}"></script>--}}
{{--<script src="{{ checked_asset('dashboard/assets/js/jquery.flot.spline.min.js') }}"></script>--}}

{{--<script src="{{ checked_asset('dashboard/assets/js/jquery.simpleWeather.min.js') }}"></script>--}}
{{--<script src="{{ checked_asset('dashboard/assets/js/weather-init.js') }}"></script>--}}

<script src="{{ checked_asset('dashboard/assets/js/moment.min.js') }}"></script>
{{--<script src="{{ checked_asset('dashboard/assets/js/fullcalendar.min.js') }}"></script>--}}
{{--<script src="{{ checked_asset('dashboard/assets/js/fullcalendar-init.js') }}"></script>--}}

@stack('end_scripts')
@stack('filemanager_scripts')
</body>
</html>
