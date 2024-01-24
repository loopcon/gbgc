@extends('layouts.header')
@section('content')
 <div class="faq-heading-section">
    <div class="container">
        <div class="bird-svg-main">
            <svg viewBox="0 0 96 36"><path fill-rule="evenodd" d="M56.825 4.463c-6.7-3.2-16.5-4-22.3 1.4-1.3 1.2-2.5 2.8-3.3 4.5-4.8-10.7-20.8-12.7-30.7-7.9-.8.4-.7 1.7.4 1.6 5.3-.6 10.4-2.2 15.9-1.3 3.2.5 6.3 1.7 8.7 4 2.2 2.1 4.1 5.3 4.4 8.1.2 1.4 2.3 1.6 2.5.1.4-2.5 1.7-5 3.5-6.8 5.6-5.7 13.6-2.9 20.2-1.2 1.5.4 2-1.9.7-2.5zm25.1 25.2c-2.1.8-4.2 1.7-6.2 2.9-3.4-5.3-11-7.4-16.7-5.1-1.4.5-.8 2.7.7 2.5 4.1-.5 7.9-1.1 11.4 1.5 1.1.8 2.5 2.4 3 3.3.4.7 1.2 1.1 1.9.6 1.7-1.2 3.6-2.1 5.5-2.9 1.8-.7 3.8-1.4 5.7-1.7 2.7-.4 5.2.2 7.8 0 .7 0 1.1-1 .5-1.5-3.6-2.5-9.8-.9-13.6.4z"></path></svg>
        </div>
        <div class="faq-heading-worktextsection">
<<<<<<< HEAD
            <h1>{{$membership->name}}</h1>
            
            <button>Contact Us</button>
=======
            <h1>Internet Gambling Report</h1>
            <a href="#" class="faq-contactbtn">Contact Us</a>
>>>>>>> 0fcbebca20e4fcda264cd6291aaa1f3ed38f7b12
        </div>
        <img class="badal-imgset-1"  src="img/badal-img-2.svg" alt="">
        <img class="badal-imgset-2"  src="img/badal-img.svg" alt="">
    </div>
</div> 

<div class="container">
    <div class="purchase-prise-box">
        <div class="purchase-prise-item">
            <div class="purchase-prise-text">
                <h4><i class="fa-solid fa-sterling-sign"></i> {{$membership->price}}</h4>
                <p>One-time fee, 30-day access to downloads.</p>
            </div>
        </div>
        <div class="purchase-prise-item">
            <div class="purchase-add-button">
                <a href="{{route('checkout')}}" class="purchase-now-boxbtn">Purchase Now</a>
            </div>
        </div>
    </div>

    <div>
        <p>{!!$membership->long_description!!}</p>
    </div>


    <div class="row membership-imganddetailtext">
        <div class="col-12 col-md-6">
            <img src="img/membership-img.jpg" class="img-fluid" alt="">
        </div>

        <div class="col-6">
            <div class="standard-prise-textdetail">
                <p>{!!$membership->short_description!!}</p> 

        <div class="col-12 col-md-6">
            <div class="membership-detailtext">
                <ul>
                    <li><span><i class="fa-solid fa-check"></i></span><p>250 Jurisdictions</p></li>
                    <li><span><i class="fa-solid fa-check"></i></span><p>4000 pages</p></li>
                    <li><span><i class="fa-solid fa-check"></i></span><p>Global Gambling Revenues</p></li>
                    <li><span><i class="fa-solid fa-check"></i></span><p>Global Operators Database</p></li> 
                    <li><span><i class="fa-solid fa-check"></i></span><p>Key Markets Database</p></li>
                    <li><span><i class="fa-solid fa-check"></i></span><p>With Forecasts to 2025</p></li>
                </ul>

            </div>    
        </div>
    </div>

    <div class="purchase-box">
        <a href="{{route('checkout')}}" style="text-decoration:none"><button class="purchase-now-btn">PURCHASE NOW </button></a>
    </div>
</div>
@endsection