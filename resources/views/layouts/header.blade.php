
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     @yield('title')
    <link rel="icon" href="{{asset('gbgc-logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link class="js-stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <nav class="navbar-main-box">
        <div id="header-sticky">
            <div class="container">
                <div class="navbar-main">
                    <a href="{{route('index')}}"><img src="{{asset('uploads/generalsetting/'.$data->logo)}}" class="navbar-imglogo" alt=""></a>
                    <div>
                        <a href="javascript:void(0)" id="menu-btn" class="menu-icon"><i class="fa-solid fa-bars"></i><span>MENU</span></a>
                        <div class="dropdown-show" id="menu-popup">
                            <ul>
                                <li><a href="{{route('index')}}">Home</a></li>
                                @if(isset($data2))
                                <li><a href="{{ route($data2->slug) }}">{{$data2->title}}</a></li>
                                @endif
                                <li><a href="{{route('howitswork')}}">How It Works</a></li>
                                <li><a href="{{route('membership')}}">Memberships</a></li>
                                <li><a href="#">Reports</a></li>
                                <li><a href="#">News</a></li>
                                @if(!Auth::guard('customers')->user())
                                <li><a href="javascript:void(0)" class="loginmodel">Login</a></li>
                                @else
                                <li><a href="{{route('myaccount')}}">My Account</a></li>
                                @endif
                                <li><a href="{{route('frontcontactus')}}">Contact Us</a></li>
                                @if(Auth::guard('customers')->user())
                                <li><a href="{{route('customer-logout')}}">Logout</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>   
                    @if ($alert = Session::get('alert-success'))
                    <div id="message" style="position: fixed;top: 0;right: 0;">
                        <div class="alert bg-success text-light alert-dismissible fade show"  id="success-alert">
                            {{ $alert }}
                            <button type="button" class="btn-close" data-bs-theme="white" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>    
        </div>    
    </nav>
    <!-- verfication model -->

       <div class="modal fade" id="verficationmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog siguplogin-dailog modal-dialog-centered ">
          <div class="modal-content">
            <div class="modal-header">
                <h5>Sign In</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
    <!-- end verfication model -->


    <!-- login popup-->
   <div class="modal fade" id="siguploginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog siguplogin-dailog modal-dialog-centered ">
        
        <!-- signin body -->
          <div class="modal-content" id="signinbody">
            <div class="modal-header">
                <h5>Sign In</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row m-0">
                    <div class="col-12 p-0">
                        <div class="login-register-form-box">
                            <div>

                                <form  method="POST" class="login-form" id="signupform">
                                    @csrf
                                <div class="row mb-3">
                                    <div class="input-group ">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email1" name="email1" placeholder="Email" aria-label="email" aria-describedby="basic-addon1"> 
                                    </div>
                                    <div id="email-login"></div>
                                </div>

                                <div class="row mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <div id="password-login"></div>
                                </div>

                                <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1"> Remember me</label>
                                </div>

                                    <div id="errormsg-login"></div>
                                    <button type="button" class="login-form-signin" id="save_login_data">SIGN IN</button>
                                </form>
                            </div>

                        </div>
                    </div>
              </div>
            </div>
            </div>
          </div>
        <!-- End Signin Body  -->
        </div>
    </div>
<!-- Login popup end -->

    <!-- send mail popup-->
    <div class="modal fade" id="sendemailmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog siguplogin-dailog modal-dialog-centered ">
        
        <!-- signin body -->
          <div class="modal-content" id="signinbody">
            <div class="modal-header">
                <h5>Verify Email</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row m-0">
                    <div class="col-12 p-0">
                        <div class="login-register-form-box">
                            <div>

                                <form  method="POST" class="login-form" id="verifytotp">
                                    @csrf
                                <div class="row mb-3">
                                    <div class="input-group ">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                                        <input type="text" class="form-control" id="otp" required placeholder="Enter Verify Code" name="otp">
                                        <input type="hidden" class="form-control" id="verifyemail" name="verifyemail" placeholder="Email" readonly> 
                                    </div>
                                </div>

                                    <div id="errormsg-otp"></div>
                                    <button type="button" class="login-form-signin" id="verify_otp">Send OTP</button>
                                </form>
                            </div>

                        </div>
                    </div>
              </div>
            </div>

            </div>
          </div>
        <!-- End Signin Body  -->
        </div>
    </div>
<!-- send mail popup end -->

 @yield('content')
    <!-- footer  start  -->
    <footer class="footer-bg">
        <div class="footer-first-section">
            <div class="container">
                <form method="post" action="{{route('store-newsletter')}}" enctype="multipart/form-data">
                @csrf
                    <div class="row m-0 footer-first-box">
                        <div class="col-12 col-sm-4 col-md-5 col-lg-3">
                           <a href="{{route('index')}}"><img src="{{asset('img/gbgc-logo-black.png')}}" class="footer-logo" alt=""></a>
                        </div>
                        <div class="col-12 col-sm-8 col-md-7 col-lg-4">
                            <p class="newslatter-text">Newsletter</p>
                            <h5 class="join-our-mailing-heading">Join our Mailing list</h5>
                        </div>
                        <div class="col-12 col-sm-8 col-md-7 col-lg-5">
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
                    <div class="footer-second-secmenu">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="#">Reports</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="{{route('frontcontactus')}}">Contact</a></li>
                            <li><a href="{{route('faq')}}">FAQ's</a></li>

                            @foreach($data1 as $staticpage)
                            <li><a href="{{ route($staticpage->slug) }}">{{$staticpage->title}}</a></li>
                            @endforeach
         <!--                    <li><a href="#">Cookies Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Legal Disclaimers</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="footer-copyrighttext">
                <p style="font-size:13px">Copyright © 2024 GBGC. All Rights Reserved.</p>
                <div class="footer-social-icon">
                    <a href="https://www.linkedin.com"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer  end  -->
    <script src="{{asset('plugins/sweetalert/sweetalert.js')}}" type="text/javascript"></script>
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script>

    $(document).on('click','.loginmodel',function()
    {
        $('#signupform').trigger('reset');
        $('#emailloginerror, #passwordloginerror ,#errormsglogin').hide();
        $('#siguploginModal').modal('show');
    });

    $(document).on('click','#save_login_data',function() //id(button)
    {
        var formdata=$('#signupform').serialize();
        $.ajax(
        {
          url:"{{route('customer-checklogin')}}",
          type: "post",
          data: formdata,
          dataType:'JSON',
          success: function(data)
          {
            if(data.status == 1)
            {
                window.location.href = "{{ route('frontdashboard') }}";
            }
            if (data.status == 0) {
                $('#emailloginerror, #passwordloginerror ,#errormsglogin').hide();
                if(data.errors)
                {
                    if(data.errors.email1){$('#email-login').html('<strong id="emailloginerror" style="color:red">'+ data.errors.email1 + '</strong>');}
                    if(data.errors.password){$('#password-login').html('<strong id="passwordoginerror" style="color:red">'+ data.errors.password + '</strong>');}
                }
                if(data.errormsg)
                {
                   $('#errormsg-login').html('<strong id="errormsglogin" style="color:red">'+ data.errormsg + '</strong>');
                }
            }
            if(data.status == 2)
            {
                $('#siguploginModal').modal('hide');
                $('#verifytotp').trigger('reset');
                $('#sendemailmodel').modal('show');
                $('#verifyemail').val(data.email);
                
            }
          }
        });
    });

    $(document).on('click','#verify_otp',function() //id(button)
    {
        var formdata=$('#verifytotp').serialize();
        $.ajax(
        {
          url:"{{route('verifytotp')}}",
          type: "post",
          data: formdata,
          dataType:'JSON',
          success: function(data)
          {
             if(data.status == 1)
            {
                window.location.href = "{{ route('frontdashboard') }}";
            }

            if(data.status== 0)
            {
                $('#errormsg-otp').html('<strong id="errormsglogin" style="color:red">'+ data.otperrormsg + '</strong>');
            }
          }
        });
    });


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

            $('.freetopro_additionaluser').hide();
            $('.freetopro_billing_address').hide();
            $('.freetopro-btn').hide();
            $('.freetopro').click(function(){
                $('.freetopro_additionaluser').show();
                $('.freetopro_billing_address').show();
                $('.freetopro-btn').show();
                $('.register-btn').hide();
            });

            // $('#freetopro-btn').click(function(){
            //     if(Session::get('registration-error'))
            //     {
            //         $("#registerModal").modal('show');
            //         $('.freetopro_additionaluser').show();
            //         $('.freetopro_billing_address').show();
            //         $('.freetopro-btn').show();
            //         $('.register-btn').hide();
            //     }
            // });


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

            $('.register-btn').click(function(){
                $('.login-form').show();
                $('.register-form').hide(); 
            });

            @if(Session::get('alert-danger'))
                $("#siguploginModal").modal('show');
            @endif
            @if(isset($errors) && $errors->has('email1') || $errors->has('password'))
                $("#siguploginModal").modal('show');
            @endif
            // @if(isset($errors) && ($errors->has('first_name') || $errors->has('last_name') || $errors->has('password') || $errors->has('confirm_password')))
            //     $("#siguploginModal").modal('show');
            //     $('.register-text').click();
            // @endif

            @if(Session::get('registration-error'))
                $("#registerModal").modal('show');
            @endif
            
            @if(isset($errors) &&($errors->has('name') || $errors->has('job_titlename') || $errors->has('business_name') || $errors->has('business_size') || $errors->has('email') || $errors->has('phone')))
                $("#registerModal").modal('show');
            @endif

             @if(Session::get('registration-pro-error'))
                $("#registerModal").modal('show');
            @endif

            @if(isset($errors) &&($errors->has('additional_user_no') || $errors->has('billing_address')))
                $("#registerModal").modal('show');
                $('.freetopro_additionaluser').show();
                $('.freetopro_billing_address').show();
                $('.freetopro-btn').show();
                $('.register-btn').hide();
            @endif
    
        });
    </script>
@yield('script')