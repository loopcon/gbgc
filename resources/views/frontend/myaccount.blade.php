@extends('layouts.dashboardheader')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-settings bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Profile</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="feather icon-settings"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('myaccount')}}">My Account</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="pcoded-inner-content">
    <div   div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-dismissible" role="alert" style="border-color:#4099ff;color:#4099ff">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <div class="alert-message">
                                                {{ $message }}
                                            </div>
                                        </div>
                                    @endif
                                    @if ($message = Session::get('error'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <div class="alert-message">
                                                {{ $message }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-block">
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
                                    @if($customer_detail->access_type == 'paid' && $customer_detail->access_type == 'requestforpaiduser')
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
                                    <div class="container row">
                                        <button class="btn text-light m-3" style="background:#4099ff" type="submit">Update profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
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