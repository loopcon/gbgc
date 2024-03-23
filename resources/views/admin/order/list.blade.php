@extends('layouts.adminheader')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end align-items-md-end">
            <div class="col-12 col-md-6 col-lg-8">
                <div class="page-header-title breadcum-box">
                    <i class="feather icon-user bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Orders</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('adminindex')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('user')}}">Orders</a>
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
                                {{-- <div class="card-header">
                                </div> --}}
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="complex-dt" class="table table-striped table-bordered report-table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>{{__('Sr No.')}}</th>
                                                        <th>{{__('Name')}}</th>
                                                        <th>{{__('Email')}}</th>
                                                        <th>{{__('Phone')}}</th>
                                                        <th>{{__('Payment Method')}}</th>
                                                        <th>{{__('Amount')}}</th>
                                                        <th>{{__('Status')}}</th>
                                                        <th>{{__('Action')}}</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i=1;
                                                ?>
                                                @if(count($order)>0)
                                                    @foreach($order as $orderdata) 
                                                    <tr>   
                                                        <td>{{$i}}</td>
                                                            <?php $i++;?>
                                                        <td>
                                                            {{ isset($orderdata->customer) ? $orderdata->customer->fname   : '' }} 
                                                            {{ isset($orderdata->customer) ? $orderdata->customer->lname   : '' }}</td>
                                                        <td>
                                                            {{ isset($orderdata->customer) ? $orderdata->customer->email   : '' }}</td>
                                                        <td>
                                                            {{ isset($orderdata->customer) ? $orderdata->customer->phone   : '' }}</td>
                                                             </td>
                                                        <td>{{$orderdata->payment_method}}</td>
                                                        <td>{{$orderdata->amount}}</td>
                                                        <td>
                                                            @if($orderdata->status == 1)
                                                            <span class="badge bg-success">Payment Done</span>
                                                            @elseif($orderdata->status == 0)
                                                            <span class="badge bg-secondary" style="color:white">Payment Remaine</span>
                                                            @else
                                                            <span class="badge bg-danger">Payment Failed</span>
                                                            @endif
                                                        </td>
                                                        <td><a href='javascript:void(0);' data-id="{{ $orderdata->id }}" rel='tooltip' class="btn btn-light edit" title="Delete"><i class="fa fa-edit"></i></a>
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
                <div class="modal fade" id="orderModel" tabindex="-1" role="dialog" aria-labelledby="scoreImportModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('updatepaymentstatus') }}" method="post" data-parsley-validate enctype="multipart/form-data" id="importForm">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="sizeOptionModalLabel">Order Payment Status Update</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">

                                        <input type="hidden" name="id" class="edit_id" id="edit_id">
                                        <div class="form-row col-md-12">
                                            <div class="form-group col-sm-12">
                                                <label>Note</label>
                                               <textarea class="form-control" name="note" placeholder="Enter Note"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-row col-md-12" id="import">
                                            <div class="form-group col-sm-12">
                                                <label>Status</label>
                                                <select class="form-control" required name="status">
                                                    <option>Select Payment</option>
                                                    <option value="1">Payment Done</option>
                                                    <option value="2">Payment Failed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="close-modal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" id="confirmImport" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
    </div>
@endsection
@section('javascript')
<script>
    $(document).ready(function() {
        $(document).on('click', '.edit', function() {
            var id = $(this).data('id');
            $('.edit_id').val(id);
            $('#orderModel').modal('show');
        });
    });
</script>
@endsection