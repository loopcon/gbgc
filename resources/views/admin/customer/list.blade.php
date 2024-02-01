@extends('layouts.adminheader')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-user bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Users</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('adminindex')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('user')}}">Users</a>
                        </li>
                    </ul>
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
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="complex-dt" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>{{__('Sr No.')}}</th>
                                                        <th>{{__('Name')}}</th>
                                                        <th>{{__('Email')}}</th>
                                                        <th>{{__('Phone')}}</th>
                                                        <th>{{__('Job Title')}}</th>
                                                        <th>{{__('Bussiness Name')}}</th>
                                                        <th>{{__('Bussiness Size')}}</th>
                                                        <th>{{__('Access Type')}}</th>
                                                        <th>{{__('Status')}}</th>
                                                        <th>{{__('Action')}}</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i=1;
                                                ?>
                                                @if(count($customer)>0)
                                                    @foreach($customer as $data) 
                                                        <tr>   
                                                            <td>{{$i}}</td>
                                                                <?php $i++;?>
                                                            <td >  {{$data->name}} </td>
                                                            <td >  {{$data->email}} </td>
                                                            <td >  {{$data->phone}} </td>
                                                            <td >  {{$data->job_title}} </td>
                                                            <td >  {{$data->bussiness_name}} </td>
                                                            <td >  {{$data->bussiness_size}} </td>
                                                            <td >  {{$data->access_type}} </td>
                                                            <td > 
                                                                @if($data->status==0) 
                                                                    <a href='javascript:void(0);' data-href="{{route('user-change-status', array($data->id, '1'))}} " rel='tooltip' title='Approved' class='btn btn-danger btn-sm mt-1 status'>Pending</a>
                                                                @else
                                                                    <button type="button" class='btn btn-success btn-sm mt-1'>Approved</button>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($data->status==1) 
                                                                    <a href="{{ route('user-password-create',$data->id) }}" rel='tooltip' class="btn text-light" style="background:#4099ff" title="Create User Id-Password">Create Id Password</a>
                                                                @else
                                                                    <button type="button" class='btn text-light btn-sm mt-1' style="background:#4099ff">Request is Pending</button>
                                                                @endif
                                                             </td>
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
    $(document).ready(function() {
        $(document).on('click', '.status', function() {
            var title = $(this).attr('title');
            var href = $(this).data('href');
            swal({
                title: "",
                text: "Are you sure? "+title+" this user!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-info",
                confirmButtonText: "Yes, "+title+" it!",
                closeOnConfirm: true
            }, function() {
                location.href = href;
            });
        });
    });
</script>
@endsection