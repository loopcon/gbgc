@extends('layouts.adminheader')
@section('content')
    <div class="page-header card">
        <div class="row adm-membership-box">
            <div class="col-12 col-md-6 col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h5>MemberShip Plan</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('adminindex')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#!">MemberShip Plan</a>
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
                                {{-- <div class="card-header"> --}}
                                    <!-- <div class="form-row">
                                        <div class="col-md-12 text-right">
                                            <div class="col-md-12 text-right"><a href="{{route('addmembershipplan')}}" class="btn text-light" style="background:#4099ff"><i class="align-middle" data-feather="plus"></i>{{__(' + Add')}}</a></div>
                                        </div>
                                    </div> -->
                                {{-- </div> --}}
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="complex-dt" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>{{__('Sr No.')}}</th>
                                                    <th>{{__('Access Status')}}</th>
                                                    <th>{{__('Title')}}</th>
                                                    <th>{{__('Price')}}</th>
                                                    <th>{{__('Text')}}</th>
                                                    <th>{{__('Action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i=1;
                                                ?>
                                                @if(count($membershipplan)>0)
                                                    @foreach($membershipplan as $data) 
                                                        <tr>   
                                                            <td>{{$i}}</td>
                                                                <?php $i++;?>
                                                            <td>{{$data->access_status}} </td>
                                                            <td>{{$data->name}} </td>
                                                            <td> {{$data->price}} </td>
                                                            <td> {{$data->text}} </td>
                                                            <td><a href="{{ route('membershipplanedit',$data->id) }}" rel='tooltip' class="btn text-light" style="background:#4099ff" title="Edit"><i class="fa fa-edit"></i></a>
                                                            <a href="{{ route('membershipplandelete',$data->id) }}" rel='tooltip' class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete This record?');"><i class="fa fa-trash"></i></a>
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