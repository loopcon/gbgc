@extends('layouts.header')
@section('title')
<title>GBGC - Contact Us.</title>
@endsection
@section('content')
<!-- get  in touch  start  -->
      <div class="container">
        <div class="get-in-touchsection">
            <div class="grid-get-in-touch row">
                <div class="row">
                    <div class="col-12">
                        @if ($message = Session::get('success'))
                    <div class="alert text-success alert-dismissible fade show" style="background-white;border-color:green;" id="success-alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show"  id="danger-alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <h2 class="get-in-touchtext">CONTACT</h2>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                    <div>
                        <form method="post" action="{{route('store-contactus')}}">
                        @csrf
                            <div class="name-input">
                                <label for="email">Email</label>
                                <input  class="form-control"  type="text" placeholder="Ex.ralphdavies@gmail.com" id="email" name="email"> 
                            </div>
                        
                            <div class="name-input">
                                <label for="phone">Phone</label>
                                <input  class="form-control" maxlength="10"  type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Phone Number" id="phone" name="phone">
                            </div>
                            <div class="name-input">
                                <label for="message">Message</label>
                                <textarea class="form-control" rows="2" placeholder="Mention additional details about your needs?" id="message" name="message"></textarea>
                            </div>
                            <button class="get-request-btn">Request Information</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6 contact-usbox">
                    <img src="{{asset('img/contact-us.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- get in  touch  end -->
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
        $("#danger-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#danger-alert").slideUp(500);
        });
    });
</script>
@endsection