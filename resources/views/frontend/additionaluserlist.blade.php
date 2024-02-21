@extends('layouts.dashboardheader')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Additional User</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href=""><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('additionaluserlist')}}">Additional User</a>
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
                                    <div class="form-row">
                                        <div class="col-md-12 text-right">
                                            <div class="col-md-12 text-right">

                                            <a href="javascript:void(0)"  class="btn text-light freetoproacess"  style="background:#4099ff">  Free to Pro</a>
                                              @if($customer->access_type!="paid"  && $customer->access_type!="additionaluser"  && $customer->access_type!="requestforadditional" && $customer->payment!=1)
								                
								                @endif

								                @if($customer->remain_payment_additional_user > 0)
								                <a href="javascript:void(0)"  class=" btn text-light additionaluser"  style="background:#4099ff">Add Additional User</a>
								                @endif
								            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="complex-dt" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>{{__('Sr No.')}}</th>
                                                        <th>{{__('name')}}</th>
                                                        <th>{{__('Job Title')}}</th>
                                                        <th>{{__('Phone')}}</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i=1;
                                                ?>
                                                @if(count($additionaluser)>0)
                                                    @foreach($additionaluser as $additionaluserdata) 
                                                        <tr>   
                                                            <td>{{$i}}</td>
                                                                <?php $i++;?>
                                                            <td>{{$additionaluserdata->name}} </td>
                                                            <td>{{$additionaluserdata->job_title}}</td>
                                                            <td>{{$additionaluserdata->phone}}</td>
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
                text: "{{__('Are you sure? Delete this Currency!')}}",
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