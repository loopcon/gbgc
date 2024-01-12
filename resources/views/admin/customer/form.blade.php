@extends('layouts.adminheader')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-info bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Customer</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="feather icon-info"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('customer')}}">Customer</a> </li>
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
                            <div class="card-header">
                                <h5>Customer Create</h5>
                            </div>
                            <div class="card-block"><ul>
                                <form method="post" action="{{route('customer-store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name"  id="name" class="form-control" placeholder="name" value="" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('name')) <div class="text-danger">{{ $errors->first('name') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="email"  id="email" class="form-control" placeholder="Email" value="" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('email')) <div class="text-danger">{{ $errors->first('email') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">User Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="username"  id="username" class="form-control" placeholder="User Name" value="" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('username')) <div class="text-danger">{{ $errors->first('username') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="password"  id="password" class="form-control" placeholder="Password" value="" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('password')) <div class="text-danger">{{ $errors->first('password') }}</div>@endif
                                        </div>
                                    </div>
                                    
                                    <div class="container row">
                                        <button class="btn btn-success btn-round waves-effect waves-light" type="submit">Submit</button>
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