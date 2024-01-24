@extends('layouts.header')
@section('content')
<div class="faq-heading-section">
        <div class="container">
            <div class="bird-svg-main">
                <svg viewBox="0 0 96 36"><path fill-rule="evenodd" d="M56.825 4.463c-6.7-3.2-16.5-4-22.3 1.4-1.3 1.2-2.5 2.8-3.3 4.5-4.8-10.7-20.8-12.7-30.7-7.9-.8.4-.7 1.7.4 1.6 5.3-.6 10.4-2.2 15.9-1.3 3.2.5 6.3 1.7 8.7 4 2.2 2.1 4.1 5.3 4.4 8.1.2 1.4 2.3 1.6 2.5.1.4-2.5 1.7-5 3.5-6.8 5.6-5.7 13.6-2.9 20.2-1.2 1.5.4 2-1.9.7-2.5zm25.1 25.2c-2.1.8-4.2 1.7-6.2 2.9-3.4-5.3-11-7.4-16.7-5.1-1.4.5-.8 2.7.7 2.5 4.1-.5 7.9-1.1 11.4 1.5 1.1.8 2.5 2.4 3 3.3.4.7 1.2 1.1 1.9.6 1.7-1.2 3.6-2.1 5.5-2.9 1.8-.7 3.8-1.4 5.7-1.7 2.7-.4 5.2.2 7.8 0 .7 0 1.1-1 .5-1.5-3.6-2.5-9.8-.9-13.6.4z"></path></svg>
            </div>
            <div class="faq-heading-worktextsection">
                <h1>Checkout</h1>
                
                <button>Contact Us</button>
            </div>
            <img class="badal-imgset-1"  src="img/badal-img-2.svg" alt="">
            <img class="badal-imgset-2"  src="img/badal-img.svg" alt="">
        </div>
    </div> 

    <div class="container">
        <div class="global-gaming-addtoreport">
            <span><i class="fa-solid fa-circle-check"></i></span> <p>“{{$membership->name}}” has been added to your basket.</p>
        </div>

        <div class="rerurn-customerbox">
            <span><i class="fa-regular fa-calendar"></i></span> <p>Returning customer? </p> <a href="javascript:void(0)" class="clicktologinform">Click here to login</a>
        </div>

        <div class="login-click-show">
            <p>If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing section.</p>

            <form action="" class="login-form-detailcheck">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username or Email <span>*</span></label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-6">
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
            <div class="col-6 p-0">
                <h4 class="check-order-headtext">Billing details</h4>
                <form action="" class="billing-form-detail">
                    <div class="row m-0">
                        <div class="col-6 order-check-firstname">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">First name <span>*</span></label>
                                <input type="text" class="form-control" id="firstname" >
                            </div>
                        </div>
                        <div class="col-6 p-0">
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Last name <span>*</span></label>
                                <input type="text" class="form-control" id="lastname" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="companyname" class="form-label">Company name (optional)</label>
                        <input type="text" class="form-control" id="companyname" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Country/Region <span>*</span></label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Street address <span>*</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <input type="text" class="form-control mt-3" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Town / City / Post Office <span>*</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Parish <span>*</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Postal Code (optional)</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phone <span>*</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address  <span>*</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </form>
            </div>

            <div class="col-6">
                <h4 class="check-order-headtext">Additional information</h4>
                <form action="" class="additional-form-detail">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Order notes (optional)</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                      </div>
                </form>
                <h4 class="check-order-headtext">Marketing Preference</h4>
                <form action="" class="marketing-form-detail">
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">I am happy to receive marketing and product information based on my order. (optional)</label>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container">
        <div>
            <h2 class="check-order-headtext">Your order</h2>
            <table class="table table-bordered check-tableorder">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$membership->name}}</td>
                    <td>£{{$membership->price}}</td>
                    
                </tr>
                <tr>
                    <td class="order-tablecheck-subtotal">Subtotal</td>
                    <td class="order-tablecheck-subtotal">£{{$membership->price}}</td>
                </tr>
                <tr>
                    <td class="order-tablecheck-subtotal">Total</td>
                    <td class="order-tablecheck-subtotal">£{{$membership->price}}</td>
                </tr>
                
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <div class="credit-card-box">
            <h4 class="credit-card-headtext">Credit Card (Stripe)</h4>
            <div class="payment-method-checkout">
                <p>Pay with your credit card via Stripe.</p>
                <div>
                    <span class="use-payment"><input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Use a new payment method</span>
                    <form action="" class="creadit-card-form">
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Card Number <span>*</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="1234 1234 1234 1234">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Expiry Date <span>*</span></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="MM/YY">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Card Code (CVC) <span>*</span></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="CVC">
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="savepayment-text">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                Save payment information to my account for future purchases.
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="your-personal-databox">
                <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#">privacy policy.</a></p>
                <a href="#" class="place-order-btn"> PLACE ORDER </a>
            </div>
        </div>
        
    </div>
@endsection