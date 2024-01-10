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
                    <a href="#"><img src="img/gbgc-logo.png" class="navbar-imglogo" alt=""></a>
                    <div>
                        <a href="javascript:void(0)" id="menu-btn" class="menu-icon"><i class="fa-solid fa-bars"></i><span>MENU</span></a>
                        <div class="dropdown-show" id="menu-popup">
                            <ul>
                                <li><a href="#">home</a></li>
                                <li><a href="#">Reports</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Account</a></li>
                            </ul>
                        </div>
                    </div>   
                </div>
            </div>    
        </div>    
    </nav>
   
 @yield('content')
    <!-- footer  start  -->
    <footer class="footer-bg">
        <div class="footer-first-section">
            <div class="container">
                <div class="row m-0 footer-first-box">
                    <div class="col-12 col-sm-6">
                        <p class="newslatter-text">Newsletter</p>
                        <h5 class="join-our-mailing-heading">Join our Mailing list</h5>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="footer-email-input">
                            <input  class="form-control"  type="email" placeholder="Email">
                            <button class="subscrib-footer"> SUBSCRIBE </button>
                        </div>
                    </div>
                </div>
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
                            <li><a href="#">Account</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="footer-copyrighttext">
                <p>Copyright © 2023 GBGC. All Rights Reserved.</p>
                <div class="footer-social-icon">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-x-twitter"></i>
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

        });
    </script>
