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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark sign">

<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html">
                    <img class="align-content" src="images/logo.png" alt="">
                </a>
            </div>
            <div class="login-form">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="{{ checked_asset('dashboard/assets/js/jquery.min.js') }}"></script>
<script src="{{ checked_asset('dashboard/assets/js/popper.min.js') }}"></script>
<script src="{{ checked_asset('dashboard/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ checked_asset('dashboard/assets/js/jquery.matchHeight.min.js') }}"></script>
<script src="{{ checked_asset('dashboard/assets/js/main.js') }}"></script>

</body>
</html>
