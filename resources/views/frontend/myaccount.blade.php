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
                        <label for="bussiness_name">Bussiness Wider Group</label>
                        <input  class="form-control"  type="text" id="business_wider_group" name="business_wider_group" value="{{$customer_detail->business_wider_group}}">
                    </div>
                    @if($customer_detail->access_type != 'additionaluser' && $customer_detail->access_type != 'requestforadditional')
                     <div class="contact-label col-12 col-lg-6">
                        <label for="bussiness_name">Additional User</label>
                        <input  class="form-control"  type="text" id="additional_user_no" name="additional_user_no">
                    </div>

                    <div class="contact-label col-12 col-lg-6">
                        <label for="bussiness_name">Additional Detail</label>
                        <input  class="form-control"  type="text" id="additional_details" name="additional_details" value="{{$customer_detail->additional_details}}">
                    </div>
                    @endif
                    <div class="contact-label col-12 col-lg-6">
                        <label for="bussiness_name">Billing Address</label>
                        <input  class="form-control"  type="text" id="billing_address" name="billing_address" value="{{$customer_detail->billing_address}}">
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