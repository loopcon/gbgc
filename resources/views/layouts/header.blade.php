
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GBGC</title>
    <link rel="icon" href="{{asset('gbgc-logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
</head>
<body>
    <nav class="navbar-main-box">
        <div id="header-sticky">
            <div class="container">
                <div class="navbar-main">
                    <a href="#"><img src="{{asset('uploads/settings/'.$data->logo)}}" class="navbar-imglogo" alt=""></a>
                    <div>
                        <a href="javascript:void(0)" id="menu-btn" class="menu-icon"><i class="fa-solid fa-bars"></i><span>MENU</span></a>
                        <div class="dropdown-show" id="menu-popup">
                            <ul>
                                <li><a href="#">home</a></li>
                                <li><a href="#">Reports</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="{{route('frontcontactus')}}">Contact</a></li>
                                <li><a href="#">Account</a></li>
                                <li><a href="{{route('faq')}}">FAQs</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="{{route('membership')}}">Memberships</a></li>
                                <li><a href="#">How ItWorks</a></li>
                                <li><a class="navbar-sign-upbtn" href="" data-bs-toggle="modal" data-bs-target="#siguploginModal">SIGN UP / LOGIN</a></li>
                            </ul>
                        </div>
                    </div>   
                    @if ($alert = Session::get('alert-success'))
                        <div class="alert alert-success alert-dismissible fade show"  id="success-alert">
                            {{ $alert }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif($alert = Session::get('alert-danger'))
                        <div class="alert alert-danger alert-dismissible fade show" id="danger-alert">
                            {{ $alert }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>    
        </div>    
    </nav>
    <!-- login popup-->
   <div class="modal fade" id="siguploginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog siguplogin-dailog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
                <button data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i></button>
            </div>
            <div class="modal-body">
              <div class="row m-0">
                    <div class="col-5 p-0">
                        <img src="" class="img-fluid login-img-popup" alt="">
                    </div>
                    <div class="col-7 p-0">
                        <div class="login-register-form-box">
                            <div class="login-register-box">
                                <a href="#" class="login-text login-active">Login</a>
                                <a href="#" class="register-text ">Register</a>
                            </div>
                            <div>
                                <form action="/customer-checklogin" method="POST" class="login-form">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-plus"></i></span>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" aria-label="email" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="PASSWORD" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1"> Remember me</label>
                                    </div>
                                    <a href="{{route('customer-checklogin')}}"><button class="login-form-signin">SIGN IN</button></a>
                                </form>
                            </div>
                            <div>
                                <form action="{{route('registration')}}" class="register-form" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-user"></i></span>
                                                <input type="text" id="first_name" name="first_name" class="form-control  @error('email') is-invalid @enderror" placeholder="FIRST NAME" aria-label="Username" aria-describedby="basic-addon1"> 
                                                @if ($errors->has('first_name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('first_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-user"></i></span>
                                                <input type="text" id="last_name" name="last_name" class="form-control  @error('email') is-invalid @enderror " placeholder="LAST NAME" aria-label="Username" aria-describedby="basic-addon1">
                                                @if ($errors->has('last_name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('last_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-at"></i></span>
                                                <input type="email" id="email" name="email" class="form-control  @error('email') is-invalid @enderror" placeholder="EMAIL" aria-label="Username" aria-describedby="basic-addon1">
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                                                <input type="password" id="password" name="password" class="form-control  @error('email') is-invalid @enderror" placeholder="PASSWORD" aria-label="Username" aria-describedby="basic-addon1">
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                                                <input type="password" id="confirm_password" name="confirm_password" class="form-control  @error('email') is-invalid @enderror" placeholder="CONFIRM PASSWORD" aria-label="Username" aria-describedby="basic-addon1">
                                                @if ($errors->has('confirm_password'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1 form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1"> Subscribe to our newsletter </label>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">I accept the Terms of Service and Privacy Policy</label>
                                    </div>
                                    <a href="{{route('registration')}}"><button class="login-form-signin">SIGN IN</button></a>
                                </form>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
          </div>
        </div>
    </div>
 @yield('content')
    <!-- footer  start  -->
    <footer class="footer-bg">
        <div class="footer-first-section">
            <div class="container">
                <form method="post" action="{{route('store-newsletter')}}" enctype="multipart/form-data">
                @csrf
                    <div class="row m-0 footer-first-box">
                        <div class="col-12 col-sm-6">
                            <p class="newslatter-text">Newsletter</p>
                            <h5 class="join-our-mailing-heading">Join our Mailing list</h5>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="footer-email-input">
                                <input  class="form-control" name="newsletter_email"  type="email" data-parsley-required-message="{{ __("This value is required.")}}">
                                @if ($errors->has('newsletter_email')) <div class="text-danger">{{ $errors->first('newsletter_email') }}</div>@endif
                                <button class="subscrib-footer"> SUBSCRIBE </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="footer-second-section">
            <div class="container">
                <div class="footer-second-box">
                    <div>
                        <img src="img/gbgc-logo-black.png" class="footer-logo" alt="">
                    </div>
                    <div class="footer-second-secmenu">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Reports</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Cookies Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">other legal disclaimers</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="footer-copyrighttext">
                <p>Copyright © 2024 GBGC. All Rights Reserved.</p>
                <div class="footer-social-icon">
                    <i class="fa-brands fa-linkedin"></i>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer  end  -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#success-alert").slideUp(500);
            });
            $("#danger-alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#danger-alert").slideUp(500);
            });

            $(window).scroll(function () { 
                if ($(window).scrollTop() > 50) {
                    $('#header-sticky').addClass('sticky');
                }
                if ($(window).scrollTop() < 51) {
                    $('#header-sticky').removeClass('sticky');
                }
            });

            $("#menu-btn").on('click', function(event){
                event.stopPropagation();
                //    $("#dropdown").toggle();
                    $('#menu-popup').toggle();
                    $(this).find('svg').toggleClass('fa-bars fa-xmark');
                    if($(this).find('svg').hasClass('fa-bars')){
                        $(this).find('span').text('Menu');
                    }else{
                        $(this).find('span').text('Close');
                    }
                });
                $(document).on("click", function(event){
                    event.stopPropagation();
                $("#menu-popup").hide();      
                $('#menu-btn svg').removeClass('fa-xmark').addClass('fa-bars');
                if($('#menu-btn svg').hasClass('fa-bars')){
                        $('#menu-btn span').text('Menu');
                    }else{
                        $('#menu-btn span').text('Close');
                    }
            });

            $('#report-carousel').owlCarousel({
                margin:10,
                loop:true,
                dots: true,
                nav: true,
                items: 1,
                navText: [
                    '<i class="fa-solid fa-arrow-left-long"></i>',
                    '<i class="fa-solid fa-arrow-right-long"></i>'
                ],
                responsiveClass:true,
                responsive:{
                    0:{
                        margin:0,
                    },
                    600:{
                        margin:0,
                    }
                }
            });

            $(function() {
                $(".faq-accordion-header").click(function(event) {
                    event.preventDefault();
                    let dis = $(this);
                    let acr_box = dis.closest(".faq-accordion");
                    if(!dis.hasClass("active-accordion")){
                        acr_box.find(".faq-accordion-header").removeClass("faq-active-accordion");
                        dis.addClass("faq-active-accordion");
                        acr_box.find(".faq-accordion-content").slideUp();
                        dis.next().stop(true,true).slideToggle();
                    }
                });
            });

            
            $('.register-text').click(function(){
                $('.login-form').hide();
                $('.register-form').show();
                $('.login-text').removeClass('login-active');
                $(this).addClass('login-active');
            });
            
            $('.login-text').click(function(){
                $('.login-form').show();
                $('.register-form').hide();
                $(this).addClass('login-active');
                $('.register-text').removeClass('login-active');
                
            });
        

        });
    </script>
@yield('script')