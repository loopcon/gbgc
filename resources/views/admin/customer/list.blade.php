@extends('layouts.adminheader')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Customer</h5>
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
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#!">Customer</a>
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
                                <div class="card-header">
                                    <h5>Customer</h5>
                                    <div class="form-row">
                                        <div class="col-md-12 text-right">
                                            <div class="col-md-12 text-right"><a href="{{route('customer-create')}}" class="btn btn-success"><i class="align-middle" data-feather="plus"></i>{{__('Add')}}</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="complex-dt" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>{{__('Sr No.')}}</th>
                                                        <th>{{__('Name')}}</th>
                                                        <th>{{__('Email')}}</th>
                                                        <th>{{__('User Name')}}</th>
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
                                                            <td >  {{$data->username}} </td>
                                                            <td>
                                                            <a href='javascript:void(0);' data-href="{{ route('customer-delete',$data->id) }}" rel='tooltip' class="btn btn-danger btn-sm delete" title="Delete"><i class="fa fa-trash"></i></a>
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
                text: "{{__('Are you sure? Delete this Customer!')}}",
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