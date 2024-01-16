@extends('layouts.adminheader')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-info bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Region</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="feather icon-info"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('region')}}">FAQ</a> </li>
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
                                <h5>Region Create</h5>
                            </div>
                            <div class="card-block">
                                <form method="post" action="@if(isset($record)){{ route('region-update', array('id' => $record->id)) }}@else{{route('region-store')}}@endif" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="{{ isset($record->id) ? $record->id : '' }}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Country Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="countryCode"  id="countryCode" class="form-control" placeholder="Country Code" maxlength="2" value="{{ isset($record->countryCode) ? $record->countryCode : old('countryCode') }}" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('countryCode')) <div class="text-danger">{{ $errors->first('countryCode') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name"  id="name" class="form-control" placeholder="Name" value="{{ isset($record->name) ? $record->name : old('name') }}" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('name')) <div class="text-danger">{{ $errors->first('name') }}</div>@endif
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
    });
</script>
@endsection