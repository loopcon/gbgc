@extends('layouts.adminheader')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-info bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Additional User</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="feather icon-info"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('additional-user')}}">Additional User</a> </li>
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
                                <form method="post" action="{{ route('additional-user-store', array('id' => $additonaluser->id)) }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="{{ isset($additonaluser->id) ? $additonaluser->id : '' }}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">User Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name"  id="name" class="form-control" value="{{$additonaluser->name}}" readOnly >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Additional User Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="additional_user_no"  id="additional_user_no" class="form-control" value="{{$additonaluser->additional_user_no}}" readOnly >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Accept Number of Additional User</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="accept_additional_user"  id="accept_additional_user" class="form-control" value="{{ isset($additonaluser->accept_additional_user) ? $additonaluser->accept_additional_user : old('accept_additional_user') }}" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                            @if ($errors->has('accept_additional_user')) <div class="text-danger">{{ $errors->first('accept_additional_user') }}</div>@endif
                                        </div>
                                    </div>
                                    
                                    <div class="container row">
                                        <button class="btn text-light" style="background:#4099ff" type="submit">Submit</button>&nbsp;&nbsp;
                                        <a href="{{route('additional-user')}}" class="btn btn-danger ">{{__('Cancel')}}</a>
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
<div class="pcoded-inner-content">
        <div class="main-body">
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
                                <div class="card-header">
                                  {{"Additonal User List"}}
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="complex-dt" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>{{__('Sr No.')}}</th>
                                                        <th>{{__('Name')}}</th>
                                                        <th>{{__('Job Title')}}</th>
                                                        <th>{{__('Phone Number')}}</th>
                                                        <th>{{__('Email')}}</th>
                                                        <th>{{__('Action')}}</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i=1;
                                                ?>
                                                @if(count($accepted_user)>0)
                                                    @foreach($accepted_user as $data) 
                                                        <tr>   
                                                            <td>{{$i}}</td>
                                                                <?php $i++;?>
                                                            <td >  {{$data->name}} </td>
                                                            <td >  {{$data->job_title}} </td>
                                                            <td >  {{$data->phone}} </td>
                                                            <td >  {{$data->email}} </td>
                                                          <?php /*  <td><a href="{{ route('faq-edit',$data->id) }}" rel='tooltip' class="btn text-light" style="background:#4099ff" title="Edit"><i class="fa fa-edit"></i></a>
                                                            <a href='javascript:void(0);' data-href="{{ route('faq-delete',$data->id) }}" rel='tooltip' class="btn btn-danger delete" title="Delete"><i class="fa fa-trash"></i></a>
                                                             </td> */ ?>
                                                             <td><a href="{{ route('additionaluser-password-create',$data->id) }}" rel='tooltip' class="btn text-light btn-sm mt-1" style="background:#4099ff" title="Create Additional User Id-Password">{{"Create Id Password"}}</a></td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="styleSelector">
        </div>
    </div>
@endsection
@section('javascript')
<script>
    $(document).ready(function(){     
    });
</script>
@endsection