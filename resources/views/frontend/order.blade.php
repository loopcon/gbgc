@extends('layouts.dashboardheader')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title user-breadcum-box">
                <i class="feather icon-settings bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Orders</h5>
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
                                {{-- <div class="card-header">
                                    <div class="form-row">
                                        <div class="col-md-12 text-right">
                                            <div class="col-md-12 text-right">

                                    
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="complex-dt" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>{{__('Sr No.')}}</th>
                                                        <th>{{__('Membership Plan')}}</th>
                                                        <th>{{__('Patment Method')}}</th>
                                                        <th>{{__('Amount')}}</th>
                                                        <th>{{__('Payment Date')}}</th>
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
                                                        <td>{{ isset($orderdata->membershipplan) ? $orderdata->membershipplan->name   : '' }}</td>
                                                        <td>{{$orderdata->payment_method}}</td>
                                                        <td>{{$orderdata->amount}}</td>
                                                        <td>{{$orderdata->created_at}}</td>
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