@extends('layouts.header')
@section('title')
<title>GBGC - Dashboard</title>
@endsection
@section('css')
<style>
.blur{
    filter: blur(3px);
    pointer-events: none;
}
</style>
@endsection
@section('content')
<div id='loader'>
<div class="profile-user-breadcrumbs">
    <div>
        <h1 class="profile-heading">
            {{ "Reports" }}
        </h1>
    </div>
    <div>
        <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li><i class="fa-solid fa-chevron-right"></i></li>
            <li class="profile-breadcrumbs-active">{{ "Reports"}}</li>
            
        </ul>
        @if($customer=='paid')
        <div class="text-right">
            <a class="btn text-light" style="margin-left: 1200px;margin-bottom : 10px; background:#2e9cc5" href="{{route('export-report')}}">Export Report</a>
        </div>
        @elseif($customer=='free')
        <div class="text-right freetxt">
            <p class="text-danger" style="margin-left: 645px;margin-bottom : 10px;">Your access type is free, First register for Pro version and then you can access to download Reports.</p>
        </div>
        @endif
    </div>
</div>

<div class="profile-section-main">
    <div >
        <div class="row m-0">
            <div class="col-12" id="message">
                @if ($message = Session::get('success'))
                    <div class="alert text-success alert-dismissible fade show" style="background-white;border-color:green;"  id="success-alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show"  id="danger-alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center m-0">
            @include('frontend.dashboard.sidebar')
            <div class="col-12 col-md-8 col-lg-9 blur" id="blur">
                <div class="dt-responsive table-responsive">
                    <table id="complex-dt" class="table table-striped table-bordered nowrap">
                            <input type="hidden" id="customer" value="{{$customer}}">
                            <input type="hidden" id="page" value="{{$page}}">
                        <thead>
                            <tr>
                                <th>{{__('Sr No.')}}</th>
                                <th>{{__('View')}}</th>
                                <th>{{__('Jurisdiction')}}</th>
                                <th>{{__('Currency')}}</th>
                                <th>{{__('Level 1')}}</th>
                                <th>{{__('level 2')}}</th>
                                <th>{{__('Level 3')}}</th>
                                <th>{{__('Level-4')}}</th>
                                <th>{{__('year')}}</th>
                                <th>{{__('Score')}}</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                            ?>
                            @if(count($score)>0)
                                @foreach($score as $data) 
                                    <tr>   
                                        <td>{{$i}}</td>
                                            <?php $i++;?>
                                        <td>{{$data->view}}</td>
                                        <td>@if($data->regionDetail){{$data->regionDetail->name}}@else - @endif
                                        </td>
                                        <td>@if($data->currencyDetail){{$data->currencyDetail->name}}@else - @endif
                                        </td>
                                        <td> @if($data->maincategoryDetail){{$data->maincategoryDetail->title}}@else - @endif</td>

                                        <td>@if($data->subcategory1Detail){{$data->subcategory1Detail->title}}@else - @endif</td>

                                        <td>@if($data->subcategory2Detail){{$data->subcategory2Detail->title}}@else - @endif</td>

                                        <td>@if($data->level4Detail){{$data->level4Detail->title}}@else - @endif</td>
                                        <td>{{$data->year}}</td>
                                        <td>{{$data->score}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                   {{ $score->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}" />
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
        $("#danger-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#danger-alert").slideUp(500);
        });

        $("#blur").removeClass('blur');
        $(".freetxt").hide();
        var customer = $('#customer').val();
        var page = $('#page').val();
        console.log(page);
        if(customer =='free' && page != 1)
        {
            $("#blur").addClass('blur');
            $(".freetxt").show();
        }
    });
</script>
@endsection