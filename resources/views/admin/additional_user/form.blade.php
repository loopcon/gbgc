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
                    <li class="breadcrumb-item"><a href="{{route('user')}}">User</a> </li>
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
                                        <a href="{{route('user')}}" class="btn btn-danger ">{{__('Cancel')}}</a>
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