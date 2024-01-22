@extends('layouts.adminheader')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-info bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Data Text</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="feather icon-info"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('admindatatext')}}">DataText</a> </li>
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
                            <div class="card-block">
                                <form method="post" action="@if(isset($record)){{ route('datatext-update', array('id' => $record->id)) }}@else{{route('datatext-store')}}@endif" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="{{ isset($record->id) ? $record->id : '' }}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Country<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="region_id" class="form-control select2" name="region_id" required="">
                                                <option value="" selected disabled>-- Select region --</option>
                                                @if($region->count())
                                                    @foreach($region as $data)
                                                        <option value="{{$data->id}}" @if(isset($record) && $data->id==$record->region_id) selected="selected" @endif>{{ucfirst($data->name)}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if ($errors->has('region_id')) <div class="text-danger">{{ $errors->first('region_id') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title"  id="title" class="form-control" placeholder="Title" value="{{ isset($record->title) ? $record->title : old('title') }}" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('title')) <div class="text-danger">{{ $errors->first('title') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Type<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="type" class="form-control select2" name="type" required="">
                                                <option value="" selected disabled>--Select Type--</option>
                                                <option value="Landbased" @if((isset($record->type) && $record->type=="Landbased")) selected="selected" @endif>Landbased</option>
                                                <option value="Remote" @if((isset($record->type) && $record->type=="Remote")) selected="selected" @endif>Remote</option>
                                                <option value="Total" @if((isset($record->type) && $record->type=="Total")) selected="selected" @endif>Total</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Category<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="category" class="form-control select2" name="category"  required="">
                                                <option value="" selected disabled>--Select Category--</option>
                                                <option value="Lottery" @if((isset($record->category) && $record->category=="Lottery")) selected="selected" @endif>Lottery</option>
                                                <option value="Betting" @if((isset($record->category) && $record->category=="Betting")) selected="selected" @endif>Betting</option>
                                                <option value="Gaming" @if((isset($record->category) && $record->category=="Gaming")) selected="selected" @endif>Gaming</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Sub Category<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="sub_category"  id="sub_category" class="form-control" placeholder="Sub Category" value="{{ isset($record->sub_category) ? $record->sub_category : old('sub_category') }}" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('sub_category')) <div class="text-danger">{{ $errors->first('sub_category') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control ckeditor" id="description" name="description" placeholder="Description"  data-parsley-required-message="{{ __("This value is required.")}}">{{ isset($record->description) ? $record->description : old('description') }}</textarea>
                                            @if ($errors->has('description')) <div class="text-danger">{{ $errors->first('description') }}</div>@endif
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