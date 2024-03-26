@extends('layouts.adminheader')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end align-items-sm-center align-items-md-center">
            <div class="col-12 col-md-6 col-lg-8">
                <div class="admin-custom-breadcum">
                    <div class="page-header-title breadcum-box">
                        <i class="feather icon-inbox bg-c-blue"></i>
                        <div class="d-inline">
                            <h5>Level</h5>
                        </div>
                    </div>
                    <div class=""><a href="{{route('level-create')}}" class="btn text-light" style="background:#4099ff" ><i class="align-middle" data-feather="plus"></i>{{__('Add')}}</a></div>
                </div>    
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('adminindex')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('adminlevel')}}">Level</a>
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
                            <div class="card admin-level-card">
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
                                {{-- <div class="card-header">
                                    <div class="form-row">
                                        <div class="col-md-12 text-right">
                                            <div class="col-md-12 text-right"><a href="{{route('level-create')}}" class="btn text-light" style="background:#4099ff" ><i class="align-middle" data-feather="plus"></i>{{__('Add')}}</a></div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="complex-dt" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>{{__('Sr No.')}}</th>
                                                    <th>{{__('Level 1')}}</th>
                                                    <th>{{__('Level 2')}}</th>
                                                    <th>{{__('Level 3')}}</th>
                                                    <th>{{__('Level 4')}}</th>
                                                    <th>{{__('Action')}}</th>
                                                    </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php
                                                    $i=1;
                                                ?>
                                                @if(count($level)>0)
                                                    @foreach($level as $data) 
                                                        <tr>   
                                                            <td>{{$i}}</td>
                                                                <?php $i++;?>
                                                            <td >{{$data->masterDetail->masterDetail->masterDetail->title}} </td>

                                                            <td >{{$data->masterDetail->masterDetail->title}} </td>

                                                            <td >{{$data->masterDetail->title}} </td>

                                                            <td >  {{$data->title}} </td>
                                                           
                                                            <td><a href="{{ route('level-edit',$data->id) }}" rel='tooltip' class="btn text-light" style="background:#4099ff" title="Edit"><i class="fa fa-edit"></i></a>
                                                            <a href='javascript:void(0);' data-href="{{ route('level-delete',$data->id) }}" rel='tooltip' class="btn btn-danger delete" title="Delete"><i class="fa fa-trash"></i></a>
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
        $(document).on('click', '.delete', function() {
            var href = $(this).data('href');
            swal({
                title: "",
                text: "{{__('Are you sure? Delete this Level!')}}",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-info",
                confirmButtonText: "{{__('Yes, delete it!')}}",
                cancelButtonText: "{{__('Cancel')}}",
                closeOnConfirm: true
            },
            function(){
                location.href = href;
            });
        });
    });
</script>
@endsection