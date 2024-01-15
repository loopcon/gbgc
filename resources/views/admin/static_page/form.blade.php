@extends('layouts.adminheader')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-file bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Static Page</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="feather icon-file"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('staticpage')}}">Static Page</a> </li>
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
                                <h5>Static Page Create</h5>
                            </div>
                            <div class="card-block">
                                <form method="post" action="@if(isset($record)){{ route('staticpage-update', array('id' => $record->id)) }}@else{{route('staticpage-store')}}@endif" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="{{ isset($record->id) ? $record->id : '' }}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title"  id="title" class="form-control" placeholder="Title" value="{{ isset($record->title) ? $record->title : old('title') }}" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('title')) <div class="text-danger">{{ $errors->first('title') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Slug</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="slug"  id="slug" class="form-control" placeholder="Slug" value="{{ isset($record->slug) ? $record->slug : old('slug') }}" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('slug')) <div class="text-danger">{{ $errors->first('slug') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control ckeditor" id="description" name="description" placeholder="Description"  data-parsley-required-message="{{ __("This value is required.")}}">{{ isset($record->description) ? $record->description : old('description') }}</textarea>
                                            @if ($errors->has('description')) <div class="text-danger">{{ $errors->first('description') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <div class="card-body"> 
                                            @if(isset($record->image))
                                                <img src="{{asset('uploads/staticpage/'.$record->image)}}" height="250px" width="250px">
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" placeholder="Upload Image"  name="image" id="image">
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
@section('javascript')
<script>
    $(document).ready(function(){
        CKEDITOR.replace('description');       
    });
</script>
@endsection