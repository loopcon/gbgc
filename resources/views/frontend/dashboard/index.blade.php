@extends('layouts.header')
@section('title')
<title>GBGC - Dashboard</title>
@endsection
@section('content')
<div class="profile-user-breadcrumbs">
    <div>
        <h1 class="profile-heading">
            {{ "Dashboard" }}
        </h1>
    </div>
    <div>
        <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li><i class="fa-solid fa-chevron-right"></i></li>
            <li class="profile-breadcrumbs-active">{{ "Dashboard"}}</li>
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
            <div class="col-12 col-md-8 col-lg-9 ">
                <h3>Hello !! {{$customer->name}}</h3> 
                @if($customer->access_type!="paid")
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#registerModal" class="free-access-btn freetopro" style="width:15%">  Free to Pro</a>
                @endif
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