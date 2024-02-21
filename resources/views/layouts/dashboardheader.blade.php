<!DOCTYPE html>
<html lang="en">
<head>
<title>GBGC - Consultancy & market reports for the global gambling industry.</title>
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


<link rel="stylesheet" href="{{asset('admin/files/bower_components/select2/css/select2.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/files/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/files/bower_components/multiselect/css/multi-select.css')}}" />

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
                        <a href="{{route('index')}}">
                            <img class="img-fluid" src="{{asset('uploads/generalsetting/'.$data->logo)}}" alt="Theme-Logo"  style="height: 50px;">
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
                                            <a href="{{route('customer-logout')}}"><i class="feather icon-log-out"></i>Log out</a>
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
                                <ul class="pcoded-item pcoded-left-item mt-2" >
                                    
                                    
                                    <li class="">
                                        <a href="{{route('frontreport')}}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-info"></i>
                                            </span>
                                            <span class="pcoded-mtext">Reports</span>
                                        </a>
                                    </li>

                                    <li class="{{ (request()->is('glossary*'))? 'pcoded-trigger' : '' }}">
                                        <a href="{{route('frontglossary')}}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-info"></i>
                                            </span>
                                            <span class="pcoded-mtext">Glossary</span>
                                        </a>
                                    </li>

                                    <li class="">
                                        <a href="{{route('additionaluserlist')}}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-info"></i>
                                            </span>
                                            <span class="pcoded-mtext">Additional user</span>
                                        </a>
                                    </li>

                                    <li class="">
                                        <a href="#" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-info"></i>
                                            </span>
                                            <span class="pcoded-mtext">Orders</span>
                                        </a>
                                    </li>

                                    <li class="pcoded-hasmenu {{ (request()->is('myaccount*') )? 'pcoded-trigger' : '' }}">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-info"></i>
                                            </span>
                                            <span class="pcoded-mtext">Profile Setting</span>
                                        </a>
                                        <ul class="pcoded-submenu " style="{{ (request()->is('myaccount*') )? 'display:block' : 'display:none' }}">
                                            <li class="{{ (request()->is('myaccount*'))? 'active' : '' }}">
                                                <a href="{{route('myaccount')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">My Account</span>
                                                </a>
                                            </li>
                                        </ul>
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
    <script type="text/javascript" src="{{asset('admin/files/assets/pages/advance-elements/select2-custom.js')}}"></script>
    <script src="{{asset('admin/files/assets/js/pcoded.min.js')}}"></script>
    <script src="{{asset('admin/files/assets/js/vertical/vertical-layout.min.js')}}"></script>
    <script src="{{asset('admin/files/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/files/assets/js/script.js')}}"></script>

    <script type="text/javascript" src="{{asset('admin/files/bower_components/select2/js/select2.full.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/files/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('admin/files/bower_components/multiselect/js/jquery.multi-select.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/files/assets/js/jquery.quicksearch.js')}}"></script>

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    @yield('javascript')

</body>
</html>
