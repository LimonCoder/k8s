<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Portfolio|Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('web/front/img/favicon.png')}}" rel="icon">
    <link href="{{asset('web/front/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('web/front/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('web/front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('web/front/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('web/front/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('web/front/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('web/front/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('web/front/css/style.css')}}" rel="stylesheet">
    <style>
        .navbar .nav-link {
            color: #333;
            padding: 10px 15px;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar .getstarted {
            border: 2px solid #007bff;
            color: #007bff;
            background-color: transparent;
        }

        .navbar .getstarted:hover {
            background-color: #007bff;
            color: #fff;
        }

    </style>
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ route('home.index') }}" class="logo d-flex align-items-center">
            <img src="{{asset('web/front/img/logo.png')}}" alt="">
            <span>Portfolio</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="{{ route('home.index') }}">Home</a></li>
                <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
                <li><a class="nav-link scrollto" href="#team">Team</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
                <li><a class="getstarted scrollto" href="{{ route('register') }}">User Register</a></li>
                <li><a class="getstarted scrollto" href="{{ route('recruiter_register') }}">Recruiter Register</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
