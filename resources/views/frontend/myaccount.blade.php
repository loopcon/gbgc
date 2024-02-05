@extends('layouts.header')
@section('title')
<title>GBGC - Dashboard</title>
@endsection
@section('content')
<div class="profile-user-breadcrumbs">
    <div>
        <h1 class="profile-heading">
            {{ "Profile" }}
        </h1>
    </div>
    <div>
        <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li><i class="fa-solid fa-chevron-right"></i></li>
            <li class="profile-breadcrumbs-active">{{ "User Profile"}}</li>
        </ul>
    </div>
</div>

<div class="profile-section-main">
    <div >
        <div class="row m-0">
            <div class="col-12" id="message">
                @if ($message = Session::get('success'))
                    <div class="alert text-success alert-dismissible fade show" style="background-white;border-color:green;"  id="success-alert">
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
        <div class="row justify-content-center m-0">
            @include('frontend.dashboard.sidebar')
            <div class="col-12 col-md-8 col-lg-9">
                <form method="post" action="{{route('updatemyaccount')}}" id="my-profile-form" class="row" enctype="multipart/form-data" data-parsley-validate=''>
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$customer_detail->id}}">
                    <div class="contact-label col-12 col-lg-6">
                        <label class="form-label">Name</label>
                        <input  class="form-control"  type="text" id="name" name="name" value="{{$customer_detail->name}}">
                    </div>
                    <div class="contact-label col-12 col-lg-6">
                        <label for="email">Email</label>
                        <input  class="form-control" type="text" id="email" name="email" value="{{$customer_detail->email}}" readOnly>
                    </div>
                    <div class="contact-label col-12 col-lg-6">
                        <label for="phone">Phone number</label>
                        <input  class="form-control" maxlength="10"  type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="PHONE NUMBER" id="phone" name="phone" value="{{$customer_detail->phone}}" readOnly>
                    </div>
                    <div class="contact-label col-12 col-lg-6">
                        <label for="job_title">Job Title</label>
                        <input  class="form-control"  type="text" id="job_title" name="job_title" value="{{$customer_detail->job_title}}">
                    </div>
                    <div class="contact-label col-12 col-lg-6">
                        <label for="bussiness_name">Bussiness Name</label>
                        <input  class="form-control"  type="text" id="bussiness_name" name="bussiness_name" value="{{$customer_detail->bussiness_name}}">
                    </div>
                    <div class="contact-label col-12 col-lg-6">
                        <label for="bussiness_size">Bussiness Size</label>
                        <select id="bussiness_size" class="form-control select2" name="bussiness_size" required="">
                            <option value="0">--Select Bussiness Size--</option>
                            <option value="small" @if((isset($customer_detail->bussiness_size) && $customer_detail->bussiness_size=="small")) selected="selected" @endif>small</option>
                            <option value="medium" @if((isset($customer_detail->bussiness_size) && $customer_detail->bussiness_size=="medium")) selected="selected" @endif>Medium-sized</option>
                            <option value="large" @if((isset($customer_detail->bussiness_size) && $customer_detail->bussiness_size=="large")) selected="selected" @endif>Large</option>
                        </select> 
                    </div>
                    <div class="text-center mt-3">
                        <button class="get-request-btn mb-3" style="width:182px">Update profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}" />
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