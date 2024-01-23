@extends('layouts.adminheader')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-info bg-c-blue"></i>
                <div class="d-inline">
                    <h5>MemberShip Plan</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                      <a href="{{route('adminindex')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('adminmembership')}}">MemberShip Plan</a> </li>
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
                            </div>
                            <div class="card-block"><ul>
                                <form method="post" action="{{route('storemembershipplan')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name"  id="title" class="form-control" placeholder="Title" value="" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('name')) <div class="text-danger">{{ $errors->first('name') }}</div>@endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Price</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="price"  id="price" class="form-control" placeholder="Price" value="" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('name')) <div class="text-danger">{{ $errors->first('name') }}</div>@endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Short Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control ckeditor" id="short_description" name="short_description" placeholder="Long Description"  data-parsley-required-message="{{ __("This value is required.")}}" "></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Long Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control ckeditor" id="long_description" name="long_description" placeholder="Long Description"  data-parsley-required-message="{{ __("This value is required.")}}" "></textarea>
                                        </div>
                                    </div>

                                    <div class="container row">
                                        <button class="btn text-light" style="background:#4099ff" type="submit">Submit</button>&nbsp;&nbsp;
                                        <a href="{{route('adminmembership')}}" class="btn btn-danger ">{{__('Cancel')}}</a>
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
        CKEDITOR.replace('short_description');       
        CKEDITOR.replace('long_description');       
    });
</script>
@endsection