@extends('layouts.header')
@section('content')
<div class="faq-heading-section">
    <div class="container">
        <div class="bird-svg-main">
            <svg viewBox="0 0 96 36"><path fill-rule="evenodd" d="M56.825 4.463c-6.7-3.2-16.5-4-22.3 1.4-1.3 1.2-2.5 2.8-3.3 4.5-4.8-10.7-20.8-12.7-30.7-7.9-.8.4-.7 1.7.4 1.6 5.3-.6 10.4-2.2 15.9-1.3 3.2.5 6.3 1.7 8.7 4 2.2 2.1 4.1 5.3 4.4 8.1.2 1.4 2.3 1.6 2.5.1.4-2.5 1.7-5 3.5-6.8 5.6-5.7 13.6-2.9 20.2-1.2 1.5.4 2-1.9.7-2.5zm25.1 25.2c-2.1.8-4.2 1.7-6.2 2.9-3.4-5.3-11-7.4-16.7-5.1-1.4.5-.8 2.7.7 2.5 4.1-.5 7.9-1.1 11.4 1.5 1.1.8 2.5 2.4 3 3.3.4.7 1.2 1.1 1.9.6 1.7-1.2 3.6-2.1 5.5-2.9 1.8-.7 3.8-1.4 5.7-1.7 2.7-.4 5.2.2 7.8 0 .7 0 1.1-1 .5-1.5-3.6-2.5-9.8-.9-13.6.4z"></path></svg>
        </div>
        <div class="faq-heading-worktextsection">
            <h2 class="lost-password-text">Lost password</h2>
            <button>Contact Us</button>
        </div>
        <img class="badal-imgset-1"  src="img/badal-img-2.svg" alt="">
        <img class="badal-imgset-2"  src="img/badal-img.svg" alt="">
    </div>
</div> 

<div class="container">
    <p>Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.</p>
    <form action="" class="lost-password-detail">
        <div class="mb-3">
            <label for="firstname" class="form-label">Username or email</label>
            <input type="text" class="form-control" id="firstname" >
        </div>
        <button class="reset-password">RESET PASSWORD</button>
    </form>
</div>
@endsection