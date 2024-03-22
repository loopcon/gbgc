@extends('layouts.adminheader')
@section('content')
<div class="page-header card">
    <div class="row align-items-end align-items-md-end">
        <div class="col-12 col-md-6 col-lg-8">
            <div class="page-header-title breadcum-box">
                <i class="feather icon-settings bg-c-blue"></i>
                <div class="d-inline">
                    <h5>General Setting</h5>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="feather icon-settings"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('generalsetting')}}">General Setting</a> </li>
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
                            {{-- <div class="card-header">
                            </div> --}}
                            <div class="card-block">
                                <form method="post" action="{{route('generalsetting-update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="{{$generalsetting->id}}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Site Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="site_name"  id="site_name" class="form-control" value="{{$generalsetting->site_name}}" placeholder="Site Name" data-parsley-required-message="{{ __("This value is required.")}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Phone Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="phone"  id="phone" class="form-control" value="{{$generalsetting->phone}}" placeholder="Phone Number" data-parsley-required-message="{{ __("This value is required.")}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="address" name="address" placeholder="Address"  data-parsley-required-message="{{ __("This value is required.")}}">{{$generalsetting->address}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">About Us</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control ckeditor" id="aboutus" name="aboutus" placeholder="About Us"  data-parsley-required-message="{{ __("This value is required.")}}">{{$generalsetting->aboutus}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Contact Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="contact_email"  id="contact_email" class="form-control" value="{{$generalsetting->contact_email}}" placeholder="Contact Email" data-parsley-required-message="{{ __("This value is required.")}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Linked In URL</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="linkedin"  id="linkedin" class="form-control" value="{{$generalsetting->linkedin}}" placeholder="Linked In Url" data-parsley-required-message="{{ __("This value is required.")}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Copyright Year</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="copyrignt_year"  id="copyrignt_year" class="form-control" value="{{$generalsetting->copyrignt_year}}" placeholder="Copyright Year" data-parsley-required-message="{{ __("This value is required.")}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Admin Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="admin_email"  id="admin_email" class="form-control" value="{{$generalsetting->admin_email}}" placeholder="Admin Email" data-parsley-required-message="{{ __("This value is required.")}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Admin Password</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="admin_password"  id="admin_password" class="form-control" value="{{$generalsetting->admin_password}}" placeholder="Admin Password" data-parsley-required-message="{{ __("This value is required.")}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <div class="card-body"> 
                                                <img src="{{asset('uploads/generalsetting/'.$generalsetting->logo)}}" height="100px" width="100px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Logo</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" placeholder="Upload Logo"  name="logo" style="height:41px;" >
                                            <label class=" text-danger"><small>Logo size : 210 x 100 px and Type : .jpg, .png, .webp</small></label>
                                            @if ($errors->has('logo')) <div class="text-danger">{{ $errors->first('logo') }}</div>@endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <div class="card-body"> 
                                                <img src="{{asset('uploads/generalsetting/'.$generalsetting->fevicon)}}" height="100px" width="100px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Fevicon</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" placeholder="Upload Fevicon"  name="fevicon" style="height:41px;">
                                            <label class=" text-danger"><small>Fevicon size : 210 x 100 px and Type : .jpg, .png, .webp</small></label>
                                            @if ($errors->has('fevicon')) <div class="text-danger">{{ $errors->first('fevicon') }}</div>@endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Seo Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="seo_title"  id="seo_title" class="form-control" value="{{$generalsetting->seo_title}}" placeholder="Seo Title" data-parsley-required-message="{{ __("This value is required.")}}" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Meta keyword</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="meta_keyword"  id="meta_keyword" class="form-control" value="{{$generalsetting->meta_keyword}}" placeholder="Meta keyword" data-parsley-required-message="{{ __("This value is required.")}}" >
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Meta Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control ckeditor" id="meta_description" name="meta_description" placeholder="Meta Description"  data-parsley-required-message="{{ __("This value is required.")}}">{{$generalsetting->meta_description}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Canonical Tag</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control ckeditor" id="canonical_tag" name="canonical_tag" placeholder="Canonical Tag"  data-parsley-required-message="{{ __("This value is required.")}}">{{$generalsetting->canonical_tag}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Google Tag Manager</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control ckeditor" id="google_tag_manager" name="google_tag_manager" placeholder="Google Tag Manager"  data-parsley-required-message="{{ __("This value is required.")}}">{{$generalsetting->google_tag_manager}}</textarea>
                                        </div>
                                    </div>

                                    <div class="container row">
                                        <button class="btn text-light" style="background:#4099ff" type="submit">Submit</button>
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
    $(document).ready(function(){
        CKEDITOR.replace('aboutus');
        CKEDITOR.replace('meta_description');       
        CKEDITOR.replace('canonical_tag');       
        CKEDITOR.replace('google_tag_manager');       
    });
</script>
@endsection