@extends('layouts.header')
@section('title')
<title>GBGC - Dashboard</title>
@endsection
@section('css')
    <link class="js-stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<style>
.blur{
    filter: blur(3px);
    pointer-events: none;
}

.switch {
  position: relative;
  display: inline-block;
  width: 90px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: gray;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #4099ff;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(55px);
  -ms-transform: translateX(55px);
  transform: translateX(55px);
}

/*------ ADDED CSS ---------*/
.on
{
  display: none;
}

.on, .off
{
  color: white;
  position: absolute;
  transform: translate(-50%,-50%);
  top: 50%;
  left: 50%;
  font-size: 10px;
  font-family: Verdana, sans-serif;
}

input:checked+ .slider .on
{display: block;}

input:checked + .slider .off
{display: none;}

/*--------- END --------*/

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;}
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
        <div class="row align-items-center mt-5 mb-2" style="text-align: center">
            <div class="col-lg-2"> 
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li class="profile-breadcrumbs-active">{{ "Reports"}}</li>
                    
                </ul>
            </div>
            <div class="col-lg-2">
                <div class="d-inline">
                    <h6>View</h6>
                    <label class="switch">
                        <input type="checkbox" id="view" value="">
                        <div class="slider round">
                        <!--ADDED HTML -->
                        <span class="on switch-label-on" data-on="local">Local</span>
                        <span class="off switch-label-off" data-off="standard">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Standard</span>
                        <!--END-->
                        </div>
                    </label>  
                </div>
            </div>
            <div class="col-lg-2">
                <div class="d-inline">
                    <h6>Currency</h6>
                    <label class="switch">
                        <input type="checkbox" id="currency" value="">
                        <div class="slider round">
                        <!--ADDED HTML -->
                        <span class="on curr-usd" data-on="LocalCurr">LocalCurr</span>
                        <span class="off curr-local" data-off="USD">USD</span>
                        <!--END-->
                        </div>
                    </label>   
                </div>
            </div>
            <div class="col-lg-2">
                <div class="d-inline">
                    <h6>Jurisdiction</h6>
                    <label>
                    <select id="select-jurisdiction" class="form-control select2" multiple name="region_id">
                        <option value="" disabled>--Select--</option>
                        @if($region->count())
                            @foreach($region as $data)
                                <option value="{{$data->id}}" >{{ucfirst($data->name)}}</option>
                            @endforeach
                        @endif
                    </select> 
                    </lable>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-inline">
                    <div class="row">
                        <div class="col-4">
                            <label> <h6>Year From</h6>
                            <select id="ddlYearsfrom" class="form-control year" name="year">
                                <option value="" hidden>{{__('-- select --')}}</option>
                            </select>
                            </lable>
                        </div>
                        <div class="col-4">
                            <label> <h6>Year To</h6>
                            <select id="ddlYearsto" class="form-control year">
                                <option value="0" hidden>{{__('-- select --')}}</option>
                            </select>
                            </lable>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center mb-2" style="text-align: center">
            <div class="col-lg-2"> 
            </div>
            <div class="col-lg-2"> 
                <div  class=""><h6 class="hiddenViewValue"></h6></div>
            </div>
            <div class="col-lg-2">
                <div  class="hiddenCurrency"><h6 class="hiddenCurrencyValue"></h6></div>
            </div>
            <div class="col-lg-2">
                <div  class="hiddenJurisdiction"><h6 class="hiddenJurisdictionValue"></h6></div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>
        @if($customer=='paid' || $customer=='additionaluser')
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
                    <table  id="report-list" class="table table-striped table-bordered nowrap" id="">
                            <input type="hidden" id="customer" value="{{$customer}}">
                        <?php /*  <input type="hidden" id="page" value="{{$page}}">  */ ?>
                        <input type="hidden" id="page">
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
                            <?php /* <?php
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
                            @endif */ ?>
                        </tbody>
                    </table>

                  <?php /*  {{ $score->links('pagination::bootstrap-5') }}  */ ?>
                    <div class="float-end" id="pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}" />
</div>
@endsection
@section('script')
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select Jurisdiction",
            allowClear: true
        });
        $('.year').select2();

        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
        $("#danger-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#danger-alert").slideUp(500);
        });

        $("#blur").removeClass('blur');
        $(".freetxt").hide();
        $(".hiddenView").hide();
        $(".hiddenCurrency").hide();
        $(".hiddenJurisdiction").hide();

         window.onload = function () {
        //Reference the DropDownList.
        var ddlYearsfrom = document.getElementById("ddlYearsfrom");
        var ddlYearsto = document.getElementById("ddlYearsto");

 
        //Determine the Current Year.
        var currentYear = (new Date()).getFullYear();
 
        //Loop and add the Year values to DropDownList.
        for (var i = 2007; i <= 2030; i++) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            ddlYearsfrom.appendChild(option);
        }

        ddlYearsfrom.onchange = function() {
            var from =  $('#ddlYearsfrom').val();
            $('#ddlYearsto option').remove();
            $('#ddlYearsto').html('<option value="0" hidden>{{__("-- select --")}}</option>');
            
            for (var i = from; i <= 2030; i++) {
                var option = document.createElement("OPTION");
                option.innerHTML = i;
                option.value = i;
                ddlYearsto.appendChild(option);
            }
        }

    };

        // loadReportList("","","");
        loadReportList("","","","","","");

        // $(document).on("click", "#pagination a", function(e) {
        //     e.preventDefault();
        //     var page_link = $(this).attr("href");
        //     loadReportList(page_link);
        // });

        $('#select-jurisdiction').on('change', function(){
            $(".hiddenJurisdiction").show();
            var jurisdiction = $(this).val();
            var yearfrom = $('#ddlYearsfrom').val();
            var yearto = $('#ddlYearsto').val();
            var url = "";
            var view = $('#view').val();
            var currency = $('#currency').val();
            loadReportList(jurisdiction,yearfrom,yearto,url,view,currency);

            var juris = $("#select-jurisdiction option:selected").map(function () {
                return $(this).text();
                }).get().join(',');
                $('.hiddenJurisdictionValue').html('Jurisdiction : '+ juris);
        });
        $('#ddlYearsfrom').on('change', function(){
            var yearfrom = $(this).val();
            var jurisdiction = $('#select-jurisdiction').val();
            var yearto = $('#ddlYearsto').val();
            var url = "";
            var view = $('#view').val();
            var currency = $('#currency').val();
            loadReportList(jurisdiction,yearfrom,yearto,url,view,currency);
        });
        $('#ddlYearsto').on('change', function(){
            var yearto = $(this).val();
            var jurisdiction = $('#select-jurisdiction').val();
            var yearfrom = $('#ddlYearsfrom').val();
            var url = "";
            var view = $('#view').val();
            var currency = $('#currency').val();
            loadReportList(jurisdiction,yearfrom,yearto,url,view,currency);
        });

        $(document).on('click', '.pagination li.page-item a.page-link', function(e){
            e.preventDefault();
            var jurisdiction = $('#select-jurisdiction').val();
            var yearfrom = $('#ddlYearsfrom').val();
            var yearto = $('#ddlYearsto').val();
            var url = $(this).attr('href');
            var view = $('#view').val();
            var currency = $('#currency').val();
            loadReportList(jurisdiction,yearfrom,yearto,url,view,currency);

            
            var customer = $('#customer').val();
            var page = $('#page').val();
            if(customer =='free' && page != 1)
            {
                $("#blur").addClass('blur');
                $(".freetxt").show();
            }
        });

        $('#view').on('change', function(e) 
        {
            e.preventDefault();
            $(".hiddenView").show();

            var is_checked = $(this).is(':checked');
            var selected_data;
            var $switch_label_on = $('.switch-label-on');
            var $switch_label_off = $('.switch-label-off');
            // console.log('is_checked: ' + is_checked); 

            if(is_checked) {
                selected_data = $switch_label_on.attr('data-on');
            } else {
                selected_data = $switch_label_off.attr('data-off');
            }
            var view = selected_data;

            $('.hiddenViewValue').html('View : '+ view);

            $("#view").val(view);
            var jurisdiction = $('#select-jurisdiction').val();
            var yearfrom = $('#ddlYearsfrom').val();
            var yearto = $('#ddlYearsto').val();
            var url = "";
            var currency = $('#currency').val();
            loadReportList(jurisdiction,yearfrom,yearto,url,view,currency);
        });

        $('#currency').on('change', function(e) 
        {
            e.preventDefault();
            $(".hiddenCurrency").show();

            var is_checked = $(this).is(':checked');
            var selected_currency;
            var $curr_usd = $('.curr-usd');
            var $curr_local = $('.curr-local');
            // console.log('is_checked: ' + is_checked); 

            if(is_checked) {
                selected_currency = $curr_usd.attr('data-on');
            } else {
                selected_currency = $curr_local.attr('data-off');
            }
            var currency = selected_currency;
            $("#currency").val(currency);
            var jurisdiction = $('#select-jurisdiction').val();
            var yearfrom = $('#ddlYearsfrom').val();
            var yearto = $('#ddlYearsto').val();
            var url = "";

            $('.hiddenCurrencyValue').html('Currency : '+ currency);

            var view = $('#view').val();
            loadReportList(jurisdiction,yearfrom,yearto,url,view,currency);
        });

    });
    

    function loadReportList(jurisdiction,yearfrom,yearto,url,view,currency)
    {
        if(url==''){
            url = "{{ route('frontreportlist',1)}}";
        }
        $.ajax({
            type: 'POST',
            data: { _token: "{{ csrf_token() }}", jurisdiction: jurisdiction, yearfrom: yearfrom, yearto: yearto,view: view, currency:currency},
            url: url,
            dataType: 'json',
            success: function (response) {
                $("#report-list tbody").html(response.data.report_list);
                $("#pagination").html(response.data.pagination);
                $("#page").html(response.data.page);
            }
        });
    }

</script>
@endsection