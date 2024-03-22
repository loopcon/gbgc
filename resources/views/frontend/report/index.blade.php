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

.bold{
    font-weight: bold;
}

  </style>


    <div class="page-header card">
                <div class="row align-items-end user-report-breadcum-main">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="page-header-title user-breadcum-box">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Reports</h5>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-5 col-md-5 col-lg-5">
                <a class="btn text-light download-btn" style="background:#4099ff" href="{{route('reportdownload')}}"> Download Excel </a>
            </div>
            
            <div class="col-sm-4 col-md-4 col-lg-4">
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
            <div class="col-6 col-sm-6 col-md-4 col-xl-2">
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

            <div class="col-6 col-sm-6 col-md-4  col-xl-2">
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

            <div class="col-12 col-sm-6 col-md-4  col-xl-2 user-year-from-box">
                <h3 class="sub-title">Jurisdiction</h3>
                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" id="country">
                    @if($region->count())
                        @foreach($region as $data)
                            <option value="{{$data->id}}" >{{ucfirst($data->name)}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-xl-2 user-year-from-box">
                <h3 class="sub-title">Year From</h3>
                <select class="form-control js-example col-sm-12" id="ddlYearsfrom" name="year">
                    <option value="" hidden>{{__('-- select --')}}</option>
                </select>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-xl-2 user-year-from-box">
                <h3 class="sub-title">Year To</h3>
                <select class="form-control js-example col-sm-12" id="ddlYearsto">
                    <option value="0" hidden>{{__('-- select --')}}</option>
                </select>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                <h3 class="user-reset-btn">Year To</h3>
                <a href="{{route('frontreport')}}" class="btn btn-primary">Reset</a>
            </div>

        </div>
        <div class="row textrow">
            <div class="col-sm-12 col-xl-2 m-b-30 ">
                <h6 class="viewtext">View : <lable class="viewValue"></lable></h6>
            </div>
            <div class="col-sm-12 col-xl-2 m-b-30 ">
                <h6 class="currencytext">Currency : <lable class="currencyValue"></lable></h6> 
            </div>
            <div class="col-sm-12 col-xl-3 m-b-30 ">
                <h6 class="juricdictiontext">Jurisdiction : <lable class="juricdictionValue"></h6>
            </div>
            <div class="col-sm-12 col-xl-4 m-b-30 " style="text-align: center;">
                <h6 class="yeartotext">Year : <lable class="yeartoValue"></h6>
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
                                    
                                </div>
                               
                                <div class="card-block">
                                    <div class="dt-responsive" id="targetDivold">

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
<!-- Information pop-up -->
<div class="modal fade" id="informationmodel" tabindex="-1" role="dialog" aria-labelledby="scoreImportModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="sizeOptionModalLabel"><b>Information</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row m-0">
                    <div class="col-12 col-md-12 p-0">
                        <div class="login-register-form-box">
                            <div>
                                <form method="post">
                                    @csrf
                                    <p class="infotext"></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Information pop-up end-->
@endsection
@section('javascript')
<script type="text/javascript">
    $(document).ready(function() {
         $('tr:has(td:contains("Total")) td').css('font-weight', 'bold');
        $('td:empty').css({'border-top': '0px', 'border-bottom': '0px'});
    });
</script>

<script>
    // Set default values for View and Currency
    document.addEventListener('DOMContentLoaded', function() {
        // Set View as Standard
        document.getElementById('togBtnview').checked = true;

        // Set Currency as USD
        document.getElementById('togBtncurrency').checked = true;
    });
</script>
<script>
$(document).ready(function () {
        $(document).on('click','.info',function()
        {
            var information = $(this).data('information');
            $('.infotext').html(information);
            $('#informationmodel').modal('show');
        });

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

        for (var i = selectedYear; i <= 2030; i++) {
            $('#ddlYearsto').append($('<option>', {
                value: i,
                text: i
            }));
        }
    });
});
</script>


<script>
    $('.textrow').hide();
    $('.viewtext').hide();
    $('.currencytext').hide();
    $('.juricdictiontext').hide();
    $('.yeartotext').hide();

    document.addEventListener("DOMContentLoaded", function() {
        var checkbox = document.getElementById('togBtnview');
        var currencySelect = document.getElementById('togBtncurrency'); 
        var yearFromSelect = document.getElementById('ddlYearsfrom'); 
        var yearToSelect = document.getElementById('ddlYearsto'); 
        
       $(function() {
        $('#country').change(function(e) {
            var selectedOptions = $(this).find('option:selected');
            var selectedCountryText = [];
            var selectedcountry = $(e.target).val();

            selectedOptions.each(function() {
                selectedCountryText.push($(this).text());
            });

            handleFormChange(checkbox, selectedcountry, yearFromSelect, yearToSelect, selectedCountryText.join(', '));
            }); 
        });

       [checkbox, currencySelect, yearFromSelect, yearToSelect].forEach(function(element) {
        if (element) {
            element.addEventListener('change', function(e) {
                var selectedcountry = $('#country').val(); // Retrieve the selected country value
                handleFormChange(checkbox, selectedcountry, yearFromSelect, yearToSelect);
            });
        }
    });

        
        function paginate(page) {
            var viewValue = checkbox.checked ? 'Standard' : 'Local';
            var currencyValue = currencySelect.checked ? 'USD' : 'LocalCurr';
            var jurisdictionValues = Array.from(jurisdictionSelect.selectedOptions).map(option => option.value);
            var yearFromValue = yearFromSelect.value;
            var yearToValue = yearToSelect.value;
            var token = "{{ csrf_token() }}";
            handleFormChange(checkbox, null, yearFromSelect, yearToSelect);
        }
    });

    function handleFormChange(checkbox, selectedcountry, yearFromSelect, yearToSelect, selectedCountryText) {
        var viewValue = checkbox.checked ? 'Standard' : 'Local';
        var currencyCheckbox = document.getElementById('togBtncurrency');
        var currencyValue = currencyCheckbox.checked ? 'USD' : 'LocalCurr';
        var yearFromValue = yearFromSelect.value;
        var yearToValue = yearToSelect.value;
        var country = selectedcountry;
        var juricdictiontext = selectedCountryText;

        var token = "{{ csrf_token() }}";
        $('.textrow').show();
        if(viewValue != "") {
            $('.viewtext').show();
            $('.viewValue').html(viewValue);
        }
        if(juricdictiontext != "")
        {
            $('.juricdictiontext').show();
            $('.juricdictionValue').html(juricdictiontext)
        }else {
            // If no jurisdiction text, hide the corresponding element
            $('.juricdictiontext').hide();
        }
        if(currencyValue != "") {
            $('.currencytext').show();
            $('.currencyValue').html(currencyValue);
        }
        if(yearFromValue && yearToValue != 0) {
            $('.yeartotext').show();
            $('.yeartoValue').html(yearFromValue + '-' +yearToValue);
        }

        // Send AJAX request with all values
        $.ajax({
            url: "{{ route('scoreview') }}",
            type: "POST",
            dataType: 'json',
            data: {
                _token: token,
                view: viewValue,
                currency: currencyValue,
                year_from: yearFromValue,
                year_to: yearToValue,
                country: country // Add country to the data object being sent
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
</script>



@endsection