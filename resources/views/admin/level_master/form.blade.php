@extends('layouts.adminheader')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-info bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Levels</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="feather icon-info"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('adminlevel')}}">Levels</a> </li>
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
                                <form method="post" action="@if(isset($record)){{ route('level-update', array('id' => $record->id)) }}@else{{route('level-store')}}@endif" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="{{ isset($record->id) ? $record->id : '' }}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title"  id="title" class="form-control" placeholder="Title" value="{{ isset($record->title) ? $record->title : old('title') }}" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('title')) <div class="text-danger">{{ $errors->first('title') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Level Number<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" name="level_number"  id="level_number" class="form-control" placeholder="Level Number" value="{{ isset($record->level_number) ? $record->level_number : old('level_number') }}" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('level_number')) <div class="text-danger">{{ $errors->first('level_number') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Level<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="level" class="form-control select2" name="level">
                                                <option value="" selected disabled>--Select Level--</option>
                                                @if($level->count())
                                                    @foreach($level as $data)
                                                        <option value="{{$data->id}}" @if(isset($record) && $data->id==$record->region_id) selected="selected" @endif>{{ucfirst($data->title)}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="container row">
                                        <button class="btn text-light" style="background:#4099ff" type="submit">Submit</button>&nbsp;&nbsp;
                                        <a href="{{route('adminlevel')}}" class="btn btn-danger ">{{__('Cancel')}}</a>
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