@extends('layouts.header')
@section('content')

 <div class="navbar-bgimg">
        <img src="{{asset('uploads/homepagebanner/'.$homepagebanner->image)}}" class="img-fluid slider-img" alt="">
        <div class="the-only-slidertext">
            <h4>{{$homepagebanner->title}}</h4>
            {!!$homepagebanner->description!!}
           <?php /* <ul>
                <li>Stack the odds in your favour.</li>
                <li>Stop relying on topline reporting to make complex decisions.</li>
                <li>Subscribe to access revenue data split by every European gambling jurisdiction and market.</li>
            </ul>*/ ?>
            <button>Read More</button>
        </div>
    </div>
    
    <!-- report  section  start  -->
     <div class="container">
        <div id="report-carousel" class="owl-carousel owl-theme">
            <div class="reports-mainbg">
                <div class="row m-0 align-items-center">
                    <div class="col-12 col-sm-6">
                        <img src="{{asset('img/report-img.png')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="repote-box">
                            <p class="report-heading">REPORTS</p>
                            <h4 class="current-report-heading">CURRENT</h4>
                            <p class="report-text">Our data is updated quarterly, and so are our expert projections. Say goodbye to once-a-year reports that are outdated as soon as you click ‘buy.’</p>
                        </div>
                    </div>
                </div>
            </div>   

            <div class="reports-mainbg">
                <div class="row m-0 align-items-center">
                    <div class="col-12 col-sm-6">
                        <img src="{{asset('img/report-img.png')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="repote-box">
                            <p class="report-heading">REPORTS</p>
                            <h4 class="current-report-heading">CURRENT</h4>
                            <p class="report-text">Our data is updated quarterly, and so are our expert projections. Say goodbye to once-a-year reports that are outdated as soon as you click ‘buy.’</p>
                        </div>
                    </div>
                </div>
            </div>  

            <div class="reports-mainbg">
                <div class="row m-0 align-items-center">
                    <div class="col-12 col-sm-6">
                        <img src="{{asset('img/report-img.png')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="repote-box">
                            <p class="report-heading">REPORTS</p>
                            <h4 class="current-report-heading">CURRENT</h4>
                            <p class="report-text">Our data is updated quarterly, and so are our expert projections. Say goodbye to once-a-year reports that are outdated as soon as you click ‘buy.’</p>
                        </div>
                    </div>
                </div>
            </div>  

        </div>   
     </div>
    <!-- report  section  end  -->
    <!-- how it  work  start  -->
        <div class="container">
            <div class="how-it-works-box">
                <div class="hiw-offers-box">
                    <!-- <img src="img/how-it-works-img2.png" alt=""> -->
                    <p class="hiw-offers-box-text">WE OFFER 
                        <span>INCOMPARABLE</span>
                        METRICS FROM
                        <span>GAMBLING</span>
                        INDUSTRY</p>
                </div>
                <div class="row m-0 align-items-center"> 
                    <div class="col-12 col-sm-6">
                        <h5 class="how-it-workheading">How it Works</h5>
                        <h4 class="sign-up-step-heading">SIGN UP IN 4 EASY STEPS</h4>
                        <div class="click-here-text">
                            <span>01.</span><p > Click here to provide your billing information</p>
                        </div>
                        <div class="click-here-text">
                            <span>02.</span><p>We’ll send you an invoice </p>
                        </div>
                        <div class="click-here-text">
                            <span>03.</span> <p> Pay for your membership</p>    
                        </div>
                        <div class="click-here-text">
                            <span>04.</span> <p> We’ll send you an access code</p>
                        </div>
                        
                        <p class="well-send-textdetail">Once your invoice is paid, you’ll receive your access code within one business day.</p>
                    </div>
                    <div class="col-12 col-sm-6">
                        <img src="{{asset('img/how-it-works-img1.png')}}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>    
        </div>
    <!-- how it  work  end  -->

    <!-- member  benifits  start  -->
          <div class="member-benifits-bg">
            <div class="container">
                <div class="row m-0 member-benifits-box">    
                    <div class="col-12 col-sm-6">
                        <div class="subscript-text-box">
                            <p>Subscription</p>
                            <h4>Member Benifits</h4>
                            <button>Buy Now</button>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="standard-box">
                            <div class="standard-btnbox">
                                <button>Standard</button>
                            </div>
                            <div class="standard-box-detail">
                                <p class="prise-text-year"><span class="standard-price"><i class="fa-solid fa-sterling-sign"></i> 99.99 </span>  /YEAR </p>
                                <div class="standard-prise-textdetail">
                                    <i class="fa-solid fa-check"></i><p>Unlimited Withdrawal Limit</p>
                                </div>
                                <div class="standard-prise-textdetail">
                                    <i class="fa-solid fa-check"></i><p>Extra tips and Rewards</p>
                                </div>
                                <div class="standard-prise-textdetail">
                                    <i class="fa-solid fa-check"></i><p>Unlimited Life line Limit</p>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
          </div>                          
    <!-- member  benifits  end  -->
@foreach($staticpage as $page)
@if($page->slug == 'about_us')
    <!-- about css start  -->
        <div class="container">
            <div class="row about-box m-0">
                <div class="col-12 col-sm-11 col-md-12 col-lg-11">
                    <div class="row m-0 about-box ">
                        <div class="col-12 col-sm-6">
                            <img src="{{asset('uploads/staticpage/'.$page->image)}}" class="img-fluid about-imgmain" alt="">
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="aboutus-text-box">
                                <p class="about-usheading">{{$page->title}}</p>
                                <h4>ABOUT GBGC</h4>
                                <p>{!!$page->description!!}</p>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    <!-- about css end  -->
@endif
@endforeach

@endsection