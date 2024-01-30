<!DOCTYPE html>
<html lang="en">
<head>
<title>GBGC | Admin</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
<meta name="author" content="colorlib" />

<link rel="icon" href="../files/assets/images/favicon.ico" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalert/sweetalert.css') }}">
<link class="js-stylesheet" href="{{ asset('plugins/parsley/parsley.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('admin/files/bower_components/bootstrap/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('admin/files/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="{{asset('admin/files/assets/icon/feather/css/feather.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('admin/files/assets/icon/themify-icons/themify-icons.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('admin/files/assets/icon/icofont/css/icofont.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('admin/files/assets/icon/font-awesome/css/font-awesome.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('admin/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/files/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('admin/files/assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/files/assets/css/pages.css')}}">
@yield('css')
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
                        <a href="{{route('adminindex')}}">
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
                                        <span>@if(auth()->user()){{ Auth::user()->name }}@endif</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <?php /*    <li>
                                            <a href="{{route('adminprofile')}}">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li> */ ?>
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
                                <ul class="pcoded-item pcoded-left-item" >
                                    <li class="{{ (request()->is('backend'))? 'pcoded-trigger' : '' }}">
                                        <a href="{{route('adminindex')}}" class="waves-effect waves-dark ">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-home"></i>
                                            </span>
                                            <span class="pcoded-mtext">Dashboard</span>
                                        </a>
                                    </li>

                                    <li class="pcoded-hasmenu {{ (request()->is('admin/region*') || request()->is('admin/score*'))? 'pcoded-trigger' : '' }}">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-upload"></i>
                                            </span>
                                            <span class="pcoded-mtext">GBGC Data Upload</span>
                                        </a>
                                        <ul class="pcoded-submenu " style="{{ (request()->is('admin/region*') || request()->is('admin/score*'))? 'display:block' : 'display:none' }}">
                                            <li class="{{ (request()->is('admin/region*'))? 'active' : '' }}">
                                                <a href="{{route('region')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Region</span>
                                                </a>
                                            </li>
                                            <li class="{{ (request()->is('admin/score*'))? 'active' : '' }}">
                                                <a href="{{route('adminscore')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Score</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="{{ (request()->is('admin/user*'))? 'pcoded-trigger' : '' }}">
                                        <a href="{{route('user')}}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-user"></i>
                                            </span>
                                            <span class="pcoded-mtext">User</span>
                                        </a>
                                    </li>
    
                                    <li class="{{ (request()->is('admin/membership*'))? 'pcoded-trigger' : '' }}">
                                        <a href="{{route('adminmembership')}}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-list"></i>
                                            </span>
                                            <span class="pcoded-mtext">Membership Plan</span>
                                        </a>
                                    </li>

                                    <li class="{{ (request()->is('admin/order*'))? 'pcoded-trigger' : '' }}">
                                        <a href="#" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-info"></i>
                                            </span>
                                            <span class="pcoded-mtext">Orders</span>
                                        </a>
                                    </li>

                                    <li class="pcoded-hasmenu  {{ (request()->is('admin/staticpage*') || request()->is('admin/faq*') || request()->is('admin/newsletter*') || request()->is('admin/contactus*') || request()->is('admin/homepagebanner*') || request()->is('admin/homepagereport*'))? 'pcoded-trigger' : '' }}">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-edit"></i></span>
                                            <span class="pcoded-mtext">CMS</span>
                                        </a>
                                        <ul class="pcoded-submenu" style="{{ (request()->is('admin/staticpage*') || request()->is('admin/faq*') || request()->is('admin/newsletter*') || request()->is('admin/contactus*') || request()->is('admin/homepagebanner*') || request()->is('admin/homepagereport*'))? 'display:block' : 'display:none' }}">
                                            <li class="{{ (request()->is('admin/staticpage*'))? 'active' : '' }}">
                                                <a href="{{route('staticpage')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Static Page</span>
                                                </a>
                                            </li>
                                            <li class="{{ (request()->is('admin/faq*'))? 'active' : '' }}">
                                                <a href="{{route('adminfaq')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">FAQ</span>
                                                </a>
                                            </li>
                                            <li class="{{ (request()->is('admin/newsletter*'))? 'active' : '' }}">
                                                <a href="{{route('newsletter')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Customer NewsLetter</span>
                                                </a>
                                            </li>
                                            <li class="{{ (request()->is('admin/contactus*'))? 'active' : '' }}">
                                                <a href="{{route('contactus')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Contact List</span>
                                                </a>
                                            </li>
                                            <li class="{{ (request()->is('admin/homepagebanner*'))? 'active' : '' }}">
                                                <a href="{{route('homepagebanner')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Homepage Banner</span>
                                                </a>
                                            </li>
                                            <li class="{{ (request()->is('admin/homepagereport*'))? 'active' : '' }}">
                                                <a href="{{route('homepagereport')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Homepage Reports</span>
                                                </a>
                                            </li>    
                                        </ul>
                                    </li>
                                    
                                    <li class="pcoded-hasmenu {{ (request()->is('admin/datatext*') || request()->is('admin/level*'))? 'pcoded-trigger' : '' }}">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-info"></i>
                                            </span>
                                            <span class="pcoded-mtext">Data Text</span>
                                        </a>
                                        <ul class="pcoded-submenu" style="{{ (request()->is('admin/datatext*') || request()->is('admin/level*'))? 'display:block' : 'display:none' }}">
                                            <li class="{{ (request()->is('admin/level*'))? 'active' : '' }}">
                                                <a href="{{route('adminlevel')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Level</span>
                                                </a>
                                            </li>
                                            <li class="{{ (request()->is('admin/datatext*'))? 'active' : '' }}">
                                                <a href="{{route('admindatatext')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Upload DataText</span>
                                                </a>
                                            </li>
                                        </ul>   
                                    </li>

                                    <li class="{{ (request()->is('admin/glossary*'))? 'pcoded-trigger' : '' }}">
                                        <a href="{{route('adminglossary')}}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-info"></i>
                                            </span>
                                            <span class="pcoded-mtext">Glossary</span>
                                        </a>
                                    </li>

                                    <li class="{{ (request()->is('admin/report*'))? 'pcoded-trigger' : '' }}">
                                        <a href="{{route('adminreport')}}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-info"></i>
                                            </span>
                                            <span class="pcoded-mtext">Reports</span>
                                        </a>
                                    </li>

                                    <li class="{{ (request()->is('admin/emailtemplates*'))? 'pcoded-trigger' : '' }}">
                                        <a href="{{route('admin-emailtemplates')}}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-info"></i>
                                            </span>
                                            <span class="pcoded-mtext">Email Templates</span>
                                        </a>
                                    </li>

                                    <li class="pcoded-hasmenu {{ (request()->is('admin/generalsetting*'))? 'pcoded-trigger' : '' }}">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                                            <span class="pcoded-mtext">Settings</span>
                                        </a>
                                        <ul class="pcoded-submenu" style="{{ (request()->is('admin/generalsetting*'))? 'display:block' : 'display:none' }}">
                                           <?php /* <li class>
                                                <a href="{{route('websitelogo')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Website Logo</span>
                                                </a>
                                            </li> */ ?>
                                            <li class="{{ (request()->is('admin/generalsetting*'))? 'active' : '' }}">
                                                <a href="{{route('generalsetting')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">General Setting</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    @if(auth()->user())
                                    <li class>
                                        <a href="#"onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-log-out"></i>
                                            </span>
                                            <span class="pcoded-mtext">Log Out</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                        </form>
                                    </li>
                                    @endif

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

    <script src="{{asset('plugins/sweetalert/sweetalert.js')}}" type="text/javascript"></script>
    <script src="{{ asset('plugins/parsley/parsley.js') }}"></script>
    <script src="{{asset('plugins/ckeditor/ckeditor.js')}}"  type="text/javascript"></script>

    <script type="text/javascript" src="{{asset('admin/files/bower_components/jquery/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/files/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/files/bower_components/popper.js/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/files/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('admin/files/assets/pages/waves/js/waves.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('admin/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>

    <script type="text/javascript" src="{{asset('admin/files/bower_components/modernizr/js/modernizr.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/files/bower_components/modernizr/js/css-scrollbars.js')}}"></script>

    <script src="{{asset('admin/files/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/files/assets/pages/data-table/js/jszip.min.js')}}"></script>
    <script src="{{asset('admin/files/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/files/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/files/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/files/assets/pages/data-table/js/data-table-custom.js')}}"></script>
    <script src="{{asset('admin/files/assets/js/pcoded.min.js')}}"></script>
    <script src="{{asset('admin/files/assets/js/vertical/vertical-layout.min.js')}}"></script>
    <script src="{{asset('admin/files/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/files/assets/js/script.js')}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    @yield('javascript')

</body>
</html>
