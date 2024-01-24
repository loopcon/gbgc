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
                                        <label class="col-sm-2 col-form-label">View<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="view" class="form-control select2" name="view" required="">
                                                <option value="" selected disabled>--Select View--</option>
                                                <option value="Standard" @if((isset($record->view) && $record->view=="Standard")) selected="selected" @endif>Standard</option>
                                                <option value="Local" @if((isset($record->view) && $record->view=="Local")) selected="selected" @endif>Local</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Region<span class="text-danger">*</span></label>
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
                                        <label class="col-sm-2 col-form-label">Level 1<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="level_1"  id="level_1" class="form-control" placeholder="Level 1" value="{{ isset($record->level_1) ? $record->level_1 : old('level_1') }}" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('level_1')) <div class="text-danger">{{ $errors->first('level_1') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Level 2<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="level_2" class="form-control select2" name="level_2" required="">
                                                <option value="" selected disabled>--Select Level 2--</option>
                                                <option value="Landbased" @if((isset($record->level_2) && $record->level_2=="Landbased")) selected="selected" @endif>Landbased</option>
                                                <option value="Remote" @if((isset($record->level_2) && $record->level_2=="Remote")) selected="selected" @endif>Remote</option>
                                                <option value="Total" @if((isset($record->level_2) && $record->level_2=="Total")) selected="selected" @endif>Total</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Level 3<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="level_3" class="form-control select2" name="level_3"  required="">
                                                <option value="" selected disabled>--Select Level 3--</option>
                                                <option value="Lottery" @if((isset($record->level_3) && $record->level_3=="Lottery")) selected="selected" @endif>Lottery</option>
                                                <option value="Betting" @if((isset($record->level_3) && $record->level_3=="Betting")) selected="selected" @endif>Betting</option>
                                                <option value="Gaming" @if((isset($record->level_3) && $record->level_3=="Gaming")) selected="selected" @endif>Gaming</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Level 4<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="level_4"  id="level_4" class="form-control" placeholder="Level 4" value="{{ isset($record->level_4) ? $record->level_4 : old('level_4') }}" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('level_4')) <div class="text-danger">{{ $errors->first('level_4') }}</div>@endif
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
                                        <button class="btn text-light" style="background:#4099ff" type="submit">Submit</button>&nbsp;&nbsp;
                                        <a href="{{route('admindatatext')}}" class="btn btn-danger ">{{__('Cancel')}}</a>
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