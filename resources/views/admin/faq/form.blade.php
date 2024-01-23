@extends('layouts.adminheader')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-info bg-c-blue"></i>
                <div class="d-inline">
                    <h5>FAQ</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="feather icon-info"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('adminfaq')}}">FAQ</a> </li>
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
                                <form method="post" action="@if(isset($record)){{ route('faq-update', array('id' => $record->id)) }}@else{{route('faq-store')}}@endif" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="{{ isset($record->id) ? $record->id : '' }}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Question</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="question"  id="question" class="form-control" placeholder="Question" value="{{ isset($record->question) ? $record->question : old('question') }}" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('question')) <div class="text-danger">{{ $errors->first('question') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Answer</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control ckeditor" id="answer" name="answer" placeholder="Answer"  data-parsley-required-message="{{ __("This value is required.")}}">{{ isset($record->answer) ? $record->answer : old('answer') }}</textarea>
                                            @if ($errors->has('answer')) <div class="text-danger">{{ $errors->first('answer') }}</div>@endif
                                        </div>
                                    </div>
                                    
                                    <div class="container row">
                                        <button class="btn text-light" style="background:#4099ff" type="submit">Submit</button>&nbsp;&nbsp;
                                        <a href="{{route('adminfaq')}}" class="btn btn-danger ">{{__('Cancel')}}</a>
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