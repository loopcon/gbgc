@extends('layouts.adminheader')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title breadcum-box">
                <i class="feather icon-info bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Homepage Banner</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="feather icon-info"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('homepagebanner')}}">Homepage Banner</a> </li>
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
                            <div class="card-block">
                                <form method="post" action="{{ route('homepagebanner-update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="{{$record->id}}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title"  id="title" class="form-control" placeholder="Title" value="{{$record->title}}" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('title')) <div class="text-danger">{{ $errors->first('title') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control ckeditor" id="description" name="description" placeholder="Description"  data-parsley-required-message="{{ __("This value is required.")}}">{{$record->description}}</textarea>
                                            @if ($errors->has('description')) <div class="text-danger">{{ $errors->first('description') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <div class="card-body"> 
                                                <img src="{{asset('uploads/homepagebanner/'.$record->image)}}" height="100px" width="100px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" placeholder="Upload Banner Image"  name="image" value="{{ isset($record->image) ? $record->image : old('image') }}" data-parsley-required-message="{{ __("This value is required.")}}" style="height: 41px">
                                            <label class=" text-danger"><small>Image size : 1920 x 1080 px and Type : .jpg, .png, .webp</small></label>
                                            @if ($errors->has('image')) <div class="text-danger">{{ $errors->first('image') }}</div>@endif
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
        CKEDITOR.replace('answer');       
    });
</script>
@endsection