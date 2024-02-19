@extends('layouts.dashboardheader')
@section('title')
<title>GBGC - Dashboard</title>
@endsection
@section('content')
<style>
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

@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Reports</h5>
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
                            <a href="{{route('adminreport')}}">Reports</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">

                <div class="col-sm-12 col-xl-2 m-b-30">
                    <h3 class="sub-title">View</h3>
                    <label class="switch">
                        <input type="checkbox" id="togBtnview">
                        <div class="slider round">
                        <!--ADDED HTML -->
                        <span class="on">Standard</span>
                        <span class="off">Local</span>
                        <!--END-->
                        </div>
                    </label>   
                </div>

                <div class="col-sm-12 col-xl-2 m-b-30">
                <h3 class="sub-title">Currency</h3>
                    <label class="switch">
                        <input type="checkbox" id="togBtncurrency">
                        <div class="slider round">
                        <!--ADDED HTML -->
                        <span class="on">USD</span>
                        <span class="off">LocalCurr</span>
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
                        @if($region->count())
                            @foreach($region as $data)
                                <option value="{{$data->id}}" >{{ucfirst($data->name)}}</option>
                            @endforeach
                        @endif
                    </select> 
                    </lable>

                  <div class="col-sm-12 col-xl-3 m-b-30">
                      <h3 class="sub-title">Jurisdiction</h3>
                      <select class="js-example-basic-multiple col-sm-12" multiple="multiple" id="country">
                          @if($region->count())
                              @foreach($region as $data)
                                  <option value="{{$data->id}}" >{{ucfirst($data->name)}}</option>
                              @endforeach
                          @endif
                      </select>
                  </div>


                <div class="col-sm-12 col-xl-2 m-b-30">
                <h3 class="sub-title">Year From</h3>
                <select class="form-control js-example col-sm-12" id="ddlYearsfrom" name="year">
                    <option value="" hidden>{{__('-- select --')}}</option>
                </select>
                </div>


                <div class="col-sm-12 col-xl-2 m-b-30">
                <h3 class="sub-title">Year To</h3>
                <select class="form-control js-example col-sm-12" id="ddlYearsto">
                    <option value="0" hidden>{{__('-- select --')}}</option>
                </select>
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
                <div class="col-4"></div>
                <div  class="col-4 hiddenYear"><h6 class="hiddenYearValue"></h6></div>
                <div class="col-4"></div>
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
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="row">
                                    
                                </div>
                               
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive" id="targetDivold">

                                     @include('frontend.report.table')
                                    </div>
                                    <div class="dt-responsive table-responsive" id="targetDivnew">
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
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </div>
@endsection
@section('javascript')
<script>
$(document).ready(function () {

        $("#blur").removeClass('blur');
        $(".freetxt").hide();
        $(".hiddenView").hide();
        $(".hiddenCurrency").hide();
        $(".hiddenJurisdiction").hide();
        $(".hiddenYear").hide();

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

     for (var i = 2007; i <= 2030; i++) {
        $('#ddlYearsfrom').append($('<option>', {
            value: i,
            text: i
        }));
    }


    $('#ddlYearsfrom').change(function () {
        var selectedYear = parseInt($(this).val());
        $('#ddlYearsto').empty().append($('<option>', {
            value: '',
            text: '-- select --',
            hidden: true
        }));

        for (var i = selectedYear + 1; i <= 2030; i++) {
            $('#ddlYearsto').append($('<option>', {
                value: i,
                text: i
            }));
        }
    });
    };


    };

        // loadReportList("","","");
        loadReportList("","","","","","");

        // $(document).on("click", "#pagination a", function(e) {
        //     e.preventDefault();
        //     var page_link = $(this).attr("href");
        //     loadReportList(page_link);
        // });

        $('#select-jurisdiction').on('change', function(){
            
            var jurisdiction = $(this).val();
            var yearfrom = $('#ddlYearsfrom').val();
            var yearto = $('#ddlYearsto').val();
            var url = "";
            var view = $('#view').val();
            var currency = $('#currency').val();
            loadReportList(jurisdiction,yearfrom,yearto,url,view,currency);

            if(jurisdiction != ''){
                $(".hiddenJurisdiction").show();
                var juris = $("#select-jurisdiction option:selected").map(function () {
                return $(this).text();
                }).get().join(',');
                $('.hiddenJurisdictionValue').html('Jurisdiction : '+ juris);
            }
            else{
               $(".hiddenJurisdiction").hide();
            }
            
        });
        $('#ddlYearsfrom').on('change', function(){
            var yearfrom = $(this).val();
            var jurisdiction = $('#select-jurisdiction').val();
            var yearto = $('#ddlYearsto').val();
            console.log(yearto);
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

            if(yearto != 0){
                $(".hiddenYear").show();
                $('.hiddenYearValue').html('Year : '+ yearfrom +'-'+ yearto);
             }
             else{
                 $(".hiddenYear").hide();
             }
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
            var view = $('#view').val();
            loadReportList(jurisdiction,yearfrom,yearto,url,view,currency);

            $('.hiddenCurrencyValue').html('Currency : '+ currency);
        });



document.addEventListener("DOMContentLoaded", function() {
    var checkbox = document.getElementById('togBtnview');
    var currencySelect = document.getElementById('togBtncurrency'); 
    var jurisdictionSelect = document.getElementById('country'); 
    var yearFromSelect = document.getElementById('ddlYearsfrom'); 
    var yearToSelect = document.getElementById('ddlYearsto'); 

    [checkbox, currencySelect, yearFromSelect, yearToSelect].forEach(function(element) {
        if (element) {
            element.addEventListener('change', function() {
                handleFormChange();
            });
        }
    });


    jurisdictionSelect.addEventListener('change', function() {
        handleFormChange();
    });

    function handleFormChange() {
        var viewValue = checkbox.checked ? 'Standard' : 'Local';
        var currencyValue = checkbox.checked ? 'USD' : 'LocalCurr';
        var jurisdictionValues = Array.from(jurisdictionSelect.selectedOptions).map(option => option.value);
        var yearFromValue = yearFromSelect.value;
        var yearToValue = yearToSelect.value;
        var token = "{{ csrf_token() }}";

        // Send AJAX request with all values
        $.ajax({
            url: "{{ route('scoreview') }}",
            type: "POST",
            dataType: 'json',
            data: {
                _token: token,
                view: viewValue,
                currency: currencyValue,
                jurisdictions: jurisdictionValues,
                year_from: yearFromValue,
                year_to: yearToValue
            },
            success: function(data) {
                $("#targetDivold").hide();
                $('#targetDivnew').html(data.view);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
});

</script>
@endsection