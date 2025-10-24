<!DOCTYPE html>
<html lang="zxx" dir="ltr">
<head>
    <meta charset="utf-8" />
    <title>H3kHire</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/magnific-popup.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/fav-icon.png') }}" />
</head>
<body>
    <div id="preloader">
        <div id="status">
            <img src="{{ asset('images/preloader.svg') }}" id="preloader_image" alt="loader">
        </div>
    </div>
    <a href="javascript:;" id="return-to-top" class="change-bg2"> <i class="fas fa-angle-double-up"></i></a>
    <div class="main-header-wrapper1 float_left">
        <div class="right-sidebar" id="right-sidebar">
            <div class="toggle-top-header">
                <a class="tog-logo" href="{{ url('/') }}"> <img src="{{ asset('images/h3khire-logo.png') }}" alt="logo"> </a>
                <button class="sidebar-close"></button>
            </div>
            <div class="toogle-centent float_left">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam.</p>
                <h5 class="title-toggle">Latest Jobs</h5>
            </div>
            <div class="post-toggle float_left">
                <div class="togle-img">
                    <img src="{{ asset('images/drive.png') }}" alt="img">
                </div>
                <div class="togle-text">
                    <a href="javascript:;">Seniour PHP Developer</a>
                    <span>1-2 yrs Exp.</span>
                    <a class="apply-btn" href="javascript:;">Apply Now</a>
                </div>
            </div>
            <div class="post-toggle float_left">
                <div class="togle-img">
                    <img src="{{ asset('images/drive1.png') }}" alt="img">
                </div>
                <div class="togle-text">
                    <a href="javascript:;">Graphics Designer</a>
                    <span>0-1 yrs Exp.</span>
                    <a class="apply-btn" href="javascript:;">Apply Now</a>
                </div>
            </div>
            <div class="post-toggle float_left">
                <div class="togle-img">
                    <img src="{{ asset('images/drive2.png') }}" alt="post">
                </div>
                <div class="togle-text">
                    <a href="javascript:;">Product Manager</a>
                    <span>0-2 yrs Exp.</span>
                    <a class="apply-btn" href="javascript:;">Apply Now</a>
                </div>
            </div>
            <div class="toogle-centent float_left">
                <h5 class="title-toggle">We Are Social</h5>
            </div>
            <div class="tog-social float_left">
                <a class="btn-from" href="javascript:;">Sign in</a>
            </div>
        </div>
        <div class="sb-main-header1">
            <x-admin.aside />
            </div>
    </div>