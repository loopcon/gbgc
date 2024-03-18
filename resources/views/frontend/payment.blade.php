@extends('layouts.header')
@section('title')
<title>Checkout</title>
@endsection
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="faq-heading-section">
        <div class="container">
            <div class="bird-svg-main">
                <svg viewBox="0 0 96 36"><path fill-rule="evenodd" d="M56.825 4.463c-6.7-3.2-16.5-4-22.3 1.4-1.3 1.2-2.5 2.8-3.3 4.5-4.8-10.7-20.8-12.7-30.7-7.9-.8.4-.7 1.7.4 1.6 5.3-.6 10.4-2.2 15.9-1.3 3.2.5 6.3 1.7 8.7 4 2.2 2.1 4.1 5.3 4.4 8.1.2 1.4 2.3 1.6 2.5.1.4-2.5 1.7-5 3.5-6.8 5.6-5.7 13.6-2.9 20.2-1.2 1.5.4 2-1.9.7-2.5zm25.1 25.2c-2.1.8-4.2 1.7-6.2 2.9-3.4-5.3-11-7.4-16.7-5.1-1.4.5-.8 2.7.7 2.5 4.1-.5 7.9-1.1 11.4 1.5 1.1.8 2.5 2.4 3 3.3.4.7 1.2 1.1 1.9.6 1.7-1.2 3.6-2.1 5.5-2.9 1.8-.7 3.8-1.4 5.7-1.7 2.7-.4 5.2.2 7.8 0 .7 0 1.1-1 .5-1.5-3.6-2.5-9.8-.9-13.6.4z"></path></svg>
            </div>
            <div class="faq-heading-worktextsection">
                <h1>Checkout</h1>
                <a href="{{route('frontcontactus')}}" class="faq-contactbtn">Contact Us</a>
            </div>
            <img class="badal-imgset-1"  src="{{asset('img/badal-img-2.svg')}}" alt="">
            <img class="badal-imgset-2"  src="{{asset('img/badal-img.svg')}}" alt="">
        </div>
    </div> 

    <div class="container">
     <?php  /*  <div class="global-gaming-addtoreport">
            <span><i class="fa-solid fa-circle-check"></i></span> <p>“{{$membership->name}}” has been added to your basket.</p>
        </div>

        <div class="rerurn-customerbox">
            <span><i class="fa-regular fa-calendar"></i></span> <p>Returning customer? </p> <a  href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#siguploginModal" class="clicktologinform">Click here to login</a>
        </div> */ ?>

        <div class="login-click-show">
            <p>If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing section.</p>

            <form action="" class="login-form-detailcheck" >
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username or Email <span>*</span></label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password <span>*</span></label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                    </div>
                </div>
                <div class="loginbtn-group">
                    <button type="submit" class="loginbtn-check">LOGIN</button>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>  
                </div>   
                <a href="http://127.0.0.1:5501/lost-password.html" class="lost-your-password-text" target="_blank">Lost your password?</a>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row m-0">
            <div class="col-12 col-sm-6 p-0">
                    <form 
                            role="form" 
                            action="{{ route('stripe') }}" 
                            method="post" 
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                        @csrf
                    <input type="hidden" value="{{$customer->id}}" name="customerid">
                    <input type="hidden" value="{{$customer->access_type}}" name="access_type">
                    <input type="hidden" name="membershipamount" value="{{$membershipamount}}">
        
               
            </div>

        </div>
    </div>




    <div class="container">
     <div class="credit-card-box">
            
            
            <h4 class="credit-card-headtext">Credit Card (Stripe)</h4>
            <div class="payment-method-checkout" id="checkoutbox">
                <p>Pay with your credit card via Stripe.</p>
                <div>
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Name on Card<span>*</span></label>
                            <input  class="form-control" size='4' type='text' placeholder="Name on Card">
                        </div>

                  
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Card Number <span>*</span></label>
                             <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text' placeholder="1234 1234 1234 1234">
                            <div id="card-error"></div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Expiration Month<span>*</span></label>
                                    <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                                </div>
                                <div id="exp_month-error"></div>
                            </div>

                             <div class="col-4">
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Expiration Year<span>*</span></label>
                                    <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                                </div>
                                <div id="exp_year-error"></div>
                            </div>
                            <div class="col-4">
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Card Code (CVC) <span>*</span></label>
                                   <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                                </div>
                                <div id="cvc-error"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div id="invalid_request-error"></div>
                        </div>
                    
                </div>
            </div>
        </div>

            <div class="your-personal-databox">
                <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="{{route($staticpage->slug)}}">privacy policy.</a></p>
                
                <button type="submit" class="place-order-btn">Place Order</button><br>
            </div>
        </div>
    </div>
</form>
</div>
</div>
</div>
@endsection
@section('script')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
<script type="text/javascript">
  
$(function() {
  
    /*------------------------------------------
    --------------------------------------------
    Stripe Payment Code
    --------------------------------------------
    --------------------------------------------*/
    
    var $form = $(".require-validation");
     
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');
    
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
     
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
    
    });
      
    /*------------------------------------------
    --------------------------------------------
    Stripe Response Handler
    --------------------------------------------
    --------------------------------------------*/
    function stripeResponseHandler(status, response) {
        if (response.error) {

            console.log(response.error);
           $('#carerror','#exp_montherror','#exp_yearerror','#cvcerror','#invalid_request_error').hide();
           if(response.error.param === "number"){$('#card-error').html('<strong id="carerror" style="color:red">'+ response.error.message + '</strong>');}

           if(response.error.param === "exp_month"){$('#exp_month-error').html('<strong id="exp_montherror" style="color:red">'+ response.error.message + '</strong>');}

           if(response.error.param === "exp_year"){$('#exp_year-error').html('<strong id="exp_yearerror" style="color:red">'+ response.error.message + '</strong>');}

           if(response.error.param === "cvc"){$('#cvc-error').html('<strong id="cvcerror" style="color:red">'+ response.error.message + '</strong>');}

           if(response.error.type === "invalid_request_error"){$('#invalid_request-error').html('<strong id="invalid_request_error" style="color:red">'+ response.error.message + '</strong>');}
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
                 
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>
@endsection