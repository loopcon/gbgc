@extends('layouts.header')
@section('title')
<title>GBGC - Consultancy & market reports for the global gambling industry.</title>
@endsection
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
    @if(count($homepagereport)>0)
    <div class="reports-bg">
        <div class="container">
            <div id="report-carousel" class="owl-carousel owl-theme">
        
                @foreach($homepagereport as $report)
                <div class="reports-mainbg">
                    <div class="row m-0 align-items-center">
                        <div class="col-12 col-sm-6">
                            <img src="{{asset('uploads/homepagereport/'.$report->image)}}" class="img-fluid" alt="">
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="repote-box">
                                <p class="report-heading">REPORTS</p>
                                <h4 class="current-report-heading">{{$report->title}}</h4>
                                <p class="report-text">{!!$report->description!!}</p>
                            </div>
                        </div>
                    </div>
                </div>  
                @endforeach
        

            <?php /*  <div class="reports-mainbg">
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
                </div> */ ?>

            </div>   
        </div>
    </div>
    @endif 
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
                        <a href="{{route('howitswork')}}" class="faq-contactbtn"><button class="btn btn-info text-light"> Read More </button></a>
                    </div>
                    <div class="col-12 col-sm-6">
                        <img src="{{asset('img/how-it-works-img1.png')}}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>    
        </div>
    <!-- how it  work  end  -->

    <!-- member  benifits  start  -->
    @if($free_membership != null || $paid_membership != null)
          <div class="member-benifits-bg">
            <div class="container">
                <div>
                    <div class="subscript-text-box">
                        <p>Subscription</p>
                        <h4>Member Benefits</h4>
                         {{-- <a href="{{route('checkout')}}" style="text-decoration:none"><button>Buy Now</button></a> --}}
                    </div>
                </div>
                <div class="row m-0 member-benifits-box"> 
                    @if($free_membership != null)
                    <div class="col-12 col-sm-6">
                        <div class="standard-box-detail">
                            <p class="free-access-heading">{{$free_membership->name}}</p>
                            <p>ACCESS NOW FOR</p>
                            <div class="free-text-ullisttext">
                                <p>{!!$free_membership->short_description!!}</p>
                            </div>   
                        </div>
                        <a href="javascript:void(0)"  class="free-access-btn freeaccess">  ACCESS NOW</a>
                    </div>
                    @endif

                    @if($paid_membership != null)
                    <div class="col-12 col-sm-6">
                        <div class="standard-box">
                            {{-- <div class="standard-btnbox">
                                <button>{{$paid_membership->name}}</button>
                            </div> --}}
                            <div class="standard-box-detail">
                                <p class="prise-text-year"><span class="standard-price">£{{$paid_membership->price}}</span> - 12 months access</p>
                                <div class="standard-prise-textdetail">
                                    <p>{!!$paid_membership->short_description!!}</p>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="pri-signupbtn prosignup">SIGN UP NOW</a>
                        </div>  
                    </div>
                    @endif
                </div>
            </div>
          </div>   
    @endif                       
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


<!-- Free Access -->
<!-- Register popup -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Registed  for Free Access</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row m-0">
                    <div class="col-12 col-md-12 p-0">
                        <div class="login-register-form-box">
                            <div>
                                <form method="post" action="@if(isset($customer)){{ route('registration-update', array('id' => $customer->id)) }}@else{{route('registration')}}@endif" class="register-form1" enctype="multipart/form-data" id="freeaccessform">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6 ">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-user"></i></span>
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                                            </div>
                                            <div id="nameerror"></div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="input-group ">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen-nib"></i></span>
                                                <input type="text" id="job_title" name="job_title"  class="form-control" placeholder="Job Title">
                                            </div>
                                            <div id="jobtitleerror"></div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-envelope"></i></span>
                                                <input type="email" id="email" name="email" class="form-control" placeholder="Email"> 
                                            </div>
                                            <div id="emailerror"></div>
                                        </div> 
                                         <div class="col-12 col-md-6" >
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                                                <input  class="form-control" maxlength="10"  type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Phone Number" id="phone" name="phone">
                                            </div> 
                                            <div id="phoneerror"></div>  
                                        </div>
                                         
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12 col-md-12">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-pen"></i></span>
                                                <input type="text" id="bussiness_name" name="bussiness_name" class="form-control" placeholder="Business Name"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12 col-md-12">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-circle-info"></i></span>
                                                <textarea class="form-control" placeholder="If Your Business is Part of a Wider Group Please let us  Know" class="form-control" name="business_wider_group"></textarea> 
                                            </div>
                                        </div>
                                    </div>

                                    <div id="errormsg"></div>
                                    <div id="successmsg"></div>
                                    <button type="button" class="login-form-signin register-btn" id="save_freeaccess">Register</button>
                                </form>
                            </div>

                        </div>
                    </div>
              </div>
            </div>
        </div>
    </div>
</div>
<!-- End Free Access -->

<!-- pro signup -->
<div class="modal fade" id="prosignupmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Registed  for Pro Access</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                 <div class="row m-0">
                    <div class="col-12 col-md-12 p-0">
                        <div class="login-register-form-box">
                            <div>
                                <form method="post" id="proaccessform">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6 ">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-user"></i></span>
                                                <input type="text" id="proname" name="name" class="form-control" placeholder="Name">
                                            </div>
                                            <div id="nameerror-pro"></div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="input-group ">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen-nib"></i></span>
                                                <input type="text" id="projob_title" name="job_title"  class="form-control" placeholder="Job Title">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-envelope"></i></span>
                                                <input type="email" id="proemail" name="email" class="form-control" placeholder="Email"> 
                                            </div>
                                            <div id="emailerror-pro"></div>
                                        </div> 
                                         <div class="col-12 col-md-6" >
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                                                <input  class="form-control" maxlength="10"  type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Phone Number" id="prophone" name="phone">
                                            </div> 
                                            <div id="phoneerror-pro"></div>  
                                        </div>
                                         
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-pen"></i></span>
                                                <input type="text" id="probussiness_name" name="bussiness_name" class="form-control" placeholder="Business Name"> 
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-g"></i></span>
                                                <input type="text" id="gstnumber" name="gst" class="form-control" placeholder="VAT/GST Number"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12 col-md-12">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-circle-info"></i></span>
                                                <input class="form-control" placeholder="If Your Business is Part of a Wider Group Please let us  Know" class="form-control" name="business_wider_group">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                           <div class="col-12 col-md-12">
                                            <div class="input-group ">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-users"></i></span>
                                                <input type="text" id="additional_user_no" name="additional_user_no"  class="form-control" placeholder="Number of Additional User" value="" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                            </div>
                                            <div id="jobtitleerror-pro"></div>
                                        </div>
                                    </div>

                                      <div class="row mb-3">
                                        <div class="col-12 col-md-12">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-location-dot"></i></span>
                                                <textarea class="form-control" placeholder="Biling Address" class="form-control" name="billing_address" placeholder="Biling Address"></textarea> 
                                            </div>
                                        </div>
                                    </div>

                                      <div class="row mb-3">
                                        <div class="col-12 col-md-12">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-file"></i></span>
                                                <textarea class="form-control"class="form-control" name="additional_details" placeholder="Is there is Anything You Require Additional on Your Invoice"></textarea> 
                                            </div>
                                        </div>
                                    </div>


                                    <div id="errormsg"></div>
                                    <div id="successmsg"></div>
                                    <button type="button" class="login-form-signin register-btn" id="save_proaccess">Register</button>
                                </form>
                            </div>

                        </div>
                    </div>
              </div>
            </div>
        </div>
    </div>
</div>
<!-- end pro signup -->


@section('script')
<script type="text/javascript">
  $(document).on('click','.freeaccess',function()
  {
    $('#freeaccessform').trigger('reset');
    $('#registerModal').modal('show');
  });

  $(document).on('click','#save_freeaccess',function(){
    var formdata=$('#freeaccessform').serialize();

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
               $('#successmsg').html('<strong id="successmsgshow" style="color:green">Your Account Request Sent Successfully.</strong>');
               setTimeout(function() {
                   location.reload();
               }, 2000);
            }
            
            if (data.status == 0) {
                $('#nameerrorshow, #jobtitleerrorshow, #emailerrorshow, #phoneerrorshow').hide();
                if(data.errors)
                {
                    if(data.errors.name){$('#nameerror').html('<strong id="nameerrorshow" style="color:red">'+ data.errors.name + '</strong>');}
                    if (data.errors.email) {$('#emailerror').html('<strong id="emailerrorshow" style="color:red">' + data.errors.email + '</strong>');}
                    if(data.errors.phone){$('#phoneerror').html('<strong id="phoneerrorshow" style="color:red">'+ data.errors.phone +'</strong>');}
                }
                if(data.errormsg)
                {
                    $('#errormsg').html('<strong id="errormsg" style="color:red">Something went Wrong Please Try again.</strong>');
                }
            }

          }
        });

  });

$(document).on('click','.prosignup',function()
  {
    $('#proaccessform').trigger('reset');
    $('#prosignupmodel').modal('show');
  });    


  $(document).on('click','#save_proaccess',function(){
    var formdata=$('#proaccessform').serialize();

      $.ajax(
        {
          url:"{{route('proregistration')}}",
          type: "post",
          data: formdata,
          dataType:'JSON',
          success: function(data)
          {
           if (data.status == 1) 
            {
                window.location.href = "{{ route('checkout') }}";
            }
            
            if (data.status == 0) {
                $('#nameerrorshow, #jobtitleerrorshow, #emailerrorshow, #phoneerrorshow').hide();
                if(data.errors)
                {
                    if(data.errors.name){$('#nameerror-pro').html('<strong id="nameerrorshow" style="color:red">'+ data.errors.name + '</strong>');}
                    if (data.errors.email) {$('#emailerror-pro').html('<strong id="emailerrorshow" style="color:red">' + data.errors.email + '</strong>');}
                    if(data.errors.phone){$('#phoneerror-pro').html('<strong id="phoneerrorshow" style="color:red">'+ data.errors.phone +'</strong>');}
                }
                if(data.errormsg)
                {
                    $('#errormsg').html('<strong id="errormsg" style="color:red">Something went Wrong Please Try again.</strong>');
                }
            }

          }
        });

  });
</script>


@endsection
@endsection
