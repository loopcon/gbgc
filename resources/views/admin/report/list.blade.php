@extends('layouts.adminheader')
<link class="js-stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
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
        <div class="row align-items-center mt-5 mb-2" style="text-align: center">
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
            <div class="col-lg-4">
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
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-inline">
                    <div class="row">
                        <div class="col-6">
                            <label> <h6>Year From</h6>
                            <select id="ddlYearsfrom" class="form-control year" name="year">
                                <option value="" hidden>{{__('-- select --')}}</option>
                            </select>
                            </lable>
                        </div>
                        <div class="col-6">
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
        <div class="row align-items-center" style="text-align: center">
            
            <div class="col-lg-2"> 
                <div  class=""><h6 class="hiddenViewValue"></h6></div>
            </div>
            <div class="col-lg-2">
                <div  class="hiddenCurrency"><h6 class="hiddenCurrencyValue"></h6></div>
            </div>
            <div class="col-lg-4">
                <div  class="hiddenJurisdiction"><h6 class="hiddenJurisdictionValue"></h6></div>
            </div>
            <div class="col-lg-4">
                <div  class="hiddenYear"><h6 class="hiddenYearValue"></h6></div>
                
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
                                    <div class="form-row">
                                        <div class="col-md-12 text-right">
                                            <div class="col-md-12 text-right">
                                                <a href="javascript:void(0);" class="btn text-light" style="background:#4099ff" data-toggle="modal" data-target="#scoreImportModal"><i class="fas fa-file-import align-middle"></i>Upload Excel</a>
                                                <!-- <a class="btn text-light" style="background:#263544" href="{{ route('export-scores') }}"> Export Sample Data </a> -->

                                                <a class="btn text-light" style="background:#263544" href="{{asset('sampleexcel/sample.xlsx')}}" download=""> Download Sample Data </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block p-b-0">
                                    <div class="table-responsive">
                                        <table id="report-list" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>{{__('Sr No.')}}</th>
                                                    <th>{{__('View')}}</th>
                                                    <th>{{__('Currency')}}</th>
                                                    <th>{{__('Jurisdiction')}}</th>
                                                    <th>{{__('Level 1')}}</th>
                                                    <th>{{__('level 2')}}</th>
                                                    <th>{{__('Level 3')}}</th>
                                                    <th>{{__('Level-4')}}</th>
                                                    <th>{{__('year')}}</th>
                                                    <th>{{__('Score')}}</th>
                                                    <th>{{__('Comments')}}</th>
                                                    </tr>
                                            </thead>
                                            <tbody> <?php /*
                                                <?php
                                                    $i=1;
                                                ?>
                                                @if(count($score)>0)
                                                    @foreach($score as $data) 
                                                        <tr>   
                                                            <td>{{$i}}</td>
                                                                <?php $i++;?>
                                                            <td>{{$data->view}}</td>
                                                            <td>{{$data->currency_id}}</td>
                                                            <td>@if($data->regionDetail){{$data->regionDetail->name}}@else - @endif
                                                            </td>
                                                            
                                                            <td> @if($data->maincategoryDetail){{$data->maincategoryDetail->title}}@else - @endif</td>

                                                            <td>@if($data->subcategory1Detail){{$data->subcategory1Detail->title}}@else - @endif</td>

                                                           <td>@if($data->subcategory2Detail){{$data->subcategory2Detail->title}}@else - @endif</td>

                                                           <td>@if($data->level4Detail){{$data->level4Detail->title}}@else - @endif</td>
                                                            <td>{{$data->year}}</td>
                                                            <td>{{$data->score}}</td>
                                                            <td>{{$data->comment}}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif */ ?>
                                            </tbody>
                                        </table>
                                        <div class="pull-right" id="pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="scoreImportModal" tabindex="-1" role="dialog" aria-labelledby="scoreImportModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('import-scores') }}" method="post" data-parsley-validate enctype="multipart/form-data" id="importForm">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="sizeOptionModalLabel">Upload Excel File</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">

                                        <!-- <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">View<span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <select id="view" class="form-control select2" name="view" required="">
                                                    <option value="0">--Select View--</option>
                                                    <option value="Standard">Standard</option>
                                                    <option value="Local">Local</option>
                                                </select>
                                            </div>
                                        </div> -->

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jurisdiction<span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <select id="region" class="form-control select2" name="region" required="">
                                                    <option value="0">--Select Jurisdiction--</option>
                                                    @foreach($region as $regiondata)
                                                    <option value="{{$regiondata->id}}">{{$regiondata->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

<!--                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Currency<span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <select id="currency" class="form-control select2" name="currency" required="">
                                                    <option value="0">--Select Currency--</option>
                                                    @foreach($currencies as $currency)
                                                    <option value="{{$currency->id}}">{{$currency->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> -->

                                        <div class="form-row col-md-12" id="import">
                                            <div class="form-group col-sm-12">
                                                <input type="file" accept=".xlsx" name="file" id="score_import" value="" class="btn btn-secondary btn-block btn-sm" placeholder="Select Excel" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="close-modal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" id="confirmImport" class="btn btn-primary">Import</button>
                                    </div>
                                </form>
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
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script>
$(document).ready(function() {
       $('.select2').select2({
            placeholder: "Select Jurisdiction",
            allowClear: true
        });
        $('.year').select2();

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
});
    function loadReportList(jurisdiction,yearfrom,yearto,url,view,currency)
    {
        if(url==''){
            url = "{{ route('adminreportlist',1)}}";
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