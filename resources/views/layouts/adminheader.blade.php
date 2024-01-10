<!DOCTYPE html>
<html lang="en">
<head>
<title>GBGC | Admin</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
<meta name="author" content="colorlib" />

<link rel="icon" href="{{asset('gbgc-logo.png')}}" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/bootstrap/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('admin/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/icon/feather/css/feather.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/font-awesome-n.min.css')}}">

<link rel="stylesheet" href="{{asset('admin/bower_components/chartist/css/chartist.css')}}" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/widget.css')}}">
</head>
<body>

<div class="loader-bg">
<div class="loader-bar"></div>
</div>

<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">

<nav class="navbar header-navbar pcoded-header">
<div class="navbar-wrapper">
<div class="navbar-logo">
<a href="index.html">
<img class="img-fluid" src="{{asset('gbgc-logo.png')}}" alt="Theme-Logo" / style="height: 50px;">
</a>

<a class="mobile-options waves-effect waves-light">
<i class="feather icon-more-horizontal"></i>
</a>
</div>
<div class="navbar-container container-fluid">

<ul class="nav-right">



<li class="user-profile header-notification">
<div class="dropdown-primary dropdown">
<div class="dropdown-toggle" data-toggle="dropdown">
<img src="{{asset('admin/assets/images/avatar-4.jpg')}}" class="img-radius" alt="User-Profile-Image">
<span>{{ Auth::user()->name }}</span>
<i class="feather icon-chevron-down"></i>
</div>
<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

<li>
<a href="{{route('adminprofile')}}">
<i class="feather icon-user"></i> Profile
</a>
</li>
<li>
<a href="#"onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action border-0 "><i class="feather icon-log-out"></i> Logout</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
@csrf
</form>
</li>

</ul>
</div>
</li>
</ul>
</div>
</div>
</nav>


<div class="pcoded-main-container">
<div class="pcoded-wrapper">

<nav class="pcoded-navbar">
<div class="nav-list">
<div class="pcoded-inner-navbar main-menu">


<ul class="pcoded-item pcoded-left-item">

    <li class>
        <a href="{{route('adminindex')}}" class="waves-effect waves-dark">
            <span class="pcoded-micon">
                <i class="feather icon-home"></i>
            </span>
            <span class="pcoded-mtext">Dashboard</span>
        </a>
    </li>

    <li class>
        <a href="#" class="waves-effect waves-dark">
            <span class="pcoded-micon">
                <i class="feather icon-upload"></i>
            </span>
            <span class="pcoded-mtext">GBGC Data Upload</span>
        </a>
    </li>
    <li class>
        <a href="#" class="waves-effect waves-dark">
            <span class="pcoded-micon">
                <i class="feather icon-user"></i>
            </span>
            <span class="pcoded-mtext">Users</span>
        </a>
    </li>
    <li class>
        <a href="#" class="waves-effect waves-dark">
            <span class="pcoded-micon">
                <i class="feather icon-info"></i>
            </span>
            <span class="pcoded-mtext">Membership Plan</span>
        </a>
    </li>
    <li class>
        <a href="#" class="waves-effect waves-dark">
            <span class="pcoded-micon">
                <i class="feather icon-info"></i>
            </span>
            <span class="pcoded-mtext">Orders</span>
        </a>
    </li>
    <li class>
        <a href="#" class="waves-effect waves-dark">
            <span class="pcoded-micon">
                <i class="feather icon-info"></i>
            </span>
            <span class="pcoded-mtext">CMS</span>
        </a>
    </li>

    <li class>
        <a href="{{route('aboutus')}}" class="waves-effect waves-dark">
            <span class="pcoded-micon">
                <i class="feather icon-info"></i>
            </span>
            <span class="pcoded-mtext">About Us</span>
        </a>
    </li>

    <li class="pcoded-hasmenu  pcoded-trigger">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
            <span class="pcoded-mtext">Settings</span>
        </a>
        <ul class="pcoded-submenu">
            <li class>
                <a href="{{route('websitelogo')}}" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Website Logo</span>
                </a>
            </li>
        </ul>
    </li>

    <li class>
        <a href="#" class="waves-effect waves-dark">
            <span class="pcoded-micon">
                <i class="feather icon-log-out"></i>
            </span>
            <span class="pcoded-mtext">Log Out</span>
        </a>
    </li>

</ul>

</div>
</div>
</nav>

<div class="pcoded-content">

 @yield('content')

</div>

<div id="styleSelector">
</div>
</div>
</div>


</div>
</div>


<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="{{asset('admin/bower_components/jquery/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/bower_components/popper.js/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>

<script src="{{asset('admin/assets/pages/waves/js/waves.min.js')}}"></script>

<script type="text/javascript" src="{{asset('admin/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>

<script src="{{asset('admin/assets/pages/chart/float/jquery.flot.js')}}"></script>
<script src="{{asset('admin/assets/pages/chart/float/jquery.flot.categories.js')}}"></script>
<script src="{{asset('admin/assets/pages/chart/float/curvedLines.js')}}"></script>
<script src="{{asset('admin/assets/pages/chart/float/jquery.flot.tooltip.min.js')}}"></script>

<script src="{{asset('admin/bower_components/chartist/js/chartist.js')}}"></script>

<script src="{{asset('admin/assets/pages/widget/amchart/amcharts.js')}}"></script>
<script src="{{asset('admin/files/assets/pages/widget/amchart/serial.js')}}"></script>
<script src="{{asset('admin/assets/pages/widget/amchart/light.js')}}"></script>

<script src="{{asset('admin/assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('admin/assets/js/vertical/vertical-layout.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/pages/dashboard/custom-dashboard.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/js/script.min.js')}}"></script>
</body>
</html>
