
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     @yield('title')
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
                    <a href="{{route('index')}}"><img src="{{asset('uploads/settings/'.$data->logo)}}" class="navbar-imglogo" alt=""></a>
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
                                <li><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#siguploginModal">Sign Up / Login</a></li>
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
                        <div class="alert alert-success alert-dismissible fade show"  id="success-alert">
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
                    <div class="col-12 col-md-5 p-0">
                        <img src="" class="img-fluid login-img-popup" alt="">
                    </div>
                    <div class="col-12 col-md-7 p-0">
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
                                    <lable class="text-danger">{{Session::get('alert-danger')}}</lable>
                                    <a href="{{route('customer-checklogin')}}"><button class="login-form-signin">SIGN IN</button></a>
                                </form>
                            </div>
                            <div>
                            <form method="POST" id="submit_form" class="register-form">
                                @csrf
                            <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-user"></i></span>
                                                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="FIRST NAME" aria-label="Username" aria-describedby="basic-addon1"> 
                                             </div>
                                              <span class="firstname" id="firstname"></span>
                                        </div>
                                <div class="col-12 col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-user"></i></span>
                                        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="LAST NAME" aria-label="Username" aria-describedby="basic-addon1">
                                     </div>
                                     <span class="lastname" id="lastname"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-at"></i></span>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="EMAIL" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <span class="emailerror" id="emailerror"></span>
                                </div>    
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <span class="password" id="password"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <span class="confirmpassword" id="confirmpassword"></span>
                                </div>
                            </div>
                            <div class="mb-1 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="subscribe" value="1">
                                <label class="form-check-label" for="exampleCheck1"> Subscribe to our newsletter </label><br>
                                <span id="errorsubscribe"></span>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="accept" value="1">
                                <label class="form-check-label" for="exampleCheck1">I accept the Terms of Service and Privacy Policy</label><br>
                                <span id="accept"></span>
                            </div>
                            <span id="registrationsuccessmessage" style="color:green;"></span>
                            <span id="registrationwarningmessage" style="color:red;"></span>

                            <button type="button" class="login-form-signin register-btn" id="save_ajax_data">SIGN IN</button>
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
                        <div class="col-12 col-sm-5 col-md-5 col-lg-3">
                           <a href="{{route('index')}}"><img src="{{asset('img/gbgc-logo-black.png')}}" class="footer-logo" alt=""></a>
                        </div>
                        <div class="col-12 col-sm-7 col-md-7 col-lg-4">
                            <p class="newslatter-text">Newsletter</p>
                            <h5 class="join-our-mailing-heading">Join our Mailing list</h5>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-5">
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
                            <li><a href="{{route('faq')}}">Faqs</a></li>

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
                <p>Copyright © 2024 GBGC. All Rights Reserved.</p>
                <div class="footer-social-icon">
                    <i class="fa-brands fa-linkedin"></i>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer  end  -->
    <script src="{{asset('plugins/sweetalert/sweetalert.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script>

    $(document).on('click','#save_ajax_data',function() //id(button)
    {
        var formdata=$('#submit_form').serialize();
        $.ajax(
        {
          url:"{{route('registration')}}",
          type: "post",
          data: formdata,
          dataType:'JSON',
          success: function(data)
          {
            if (data.status == 1) 
            {
                $('#firstnamestrong, #lastnamestrong, #emailstrong, #acceptstrong').hide();
                $('#submit_form')[0].reset();
                $('.login-form').hide();
                $('.login-text').removeClass('login-active');
                $('.register-text').addClass('login-active');
                $('.register-form').show();
                 $('#registrationsuccessmessage').html('<p>Your Account has been successfully Created.</p>');
            }
            if (data.status == 0) {
                $('#firstnamestrong, #lastnamestrong, #emailstrong, #acceptstrong').hide();
                $('.login-form').hide();
                $('.login-text').removeClass('login-active');
                $('.register-text').addClass('login-active');
                $('.register-form').show();
                if(data.errorsubscribe)
                {
                    $('#errorsubscribe').html('<strong style="color:red">You are already Subscribe</strong>');
                }
                else if(data.errors)
                {
                    if(data.errors.first_name){$('#firstname').html('<strong id="firstnamestrong" style="color:red">First Name is Required </strong>');}
                    if(data.errors.last_name){$('#lastname').html('<strong style="color:red" id="lastnamestrong">Last Name is Required </strong>');}

                    if(data.errors.email){$('#emailerror').html('<strong id="emailstrong" style="color:red">' + data.errors.email + '</strong>');}

                    if(data.errors.accept){$('#accept').html('<strong style="color:red" id="acceptstrong">Accept Terms and Condition</strong>');}

                    if (data.errors.confirm_password) {
                        $('#confirmpassword').html('<strong style="color:red">' + data.errors.confirm_password[0] + '</strong>');
                    }
                    if (data.errors.password) {
                        for (var i = 0; i < data.errors.password.length; i++) {
                            $('#password').append('<strong style="color:red">' + data.errors.password[i] + '</strong><br>');
                        }
                    }
                }else{
                    $('#registrationwarningmessage').html('<p>Something went wrong</p>');
                }
                
            }
          }
        })
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
            @if(isset($errors) && ($errors->has('first_name') || $errors->has('last_name') || $errors->has('password') || $errors->has('confirm_password')))
                $("#siguploginModal").modal('show');
                $('.register-text').click();
            @endif
    

        });
    </script>
@yield('script')