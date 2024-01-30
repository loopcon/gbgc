@extends('layouts.adminheader')
@section('css')
    <style>
        .cke_contents{
            height:1000px!important;
        }
    </style>
@endsection
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-info bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Email Templates</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="feather icon-settings"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('admin-emailtemplates')}}">Email Templates</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <!-- <div class="row">
                    <div class="col-sm-12"> -->
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
                        <div class="row">
                            <div class="col-3">
                                <div class="card">
                                    <div class="list-group list-group-flush" role="tablist">
                                        @if($email_templates)
                                            @foreach($email_templates as $key => $value)
                                                <a href="javascript:void(0)" data-id='{{$value->label}}' data-bs-toggle="list" class="list-group-item list-group-item-action {{ $key == '0' ? 'active' : ''}}"  role="tab">{{$value->value}}</a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="tab-content">
                                    @if($email_templates)
                                        @foreach($email_templates as $key => $value)
                                            <div class="tab-pane fade {{ $key == 0 ? 'active show' : ''}}" id="{{$value->label}}" role="tabpanel">
                                                <div class="card">
                                                    <form role="form" action="{{route('admin-emailtemplate-update')}}"  name="{{$value->label}}" method="post" data-parsley-validate enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <h2 class="col-form-label">{{$value->value}}</h2>
                                                                <textarea class="form-control ckeditor" name="{{$value->label}}" id="{{$value->label}}" required="" style="height: 1000px">{{$value->template}}</textarea>
                                                                <input type="hidden" name="id" value="{{$value->id}}">
                                                            </div>
                                                        </div>

                                                        <div class="card-footer text-end">
                                                            <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><!-- /.tab-pane -->
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>        
                    <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>
    $(document).ready(function(){
        $(document).on('click', '.list-group-item-action', function(){
            var tab = $(this).data('id');
            $('.tab-pane').removeClass('active');
            $('.tab-pane').removeClass('show');
            $('#'+tab).addClass('active');
            $('#'+tab).addClass('show');
            $('.list-group-item-action').removeClass('active');
            $(this).addClass('active');
        });   
});
    
</script>
@endsection