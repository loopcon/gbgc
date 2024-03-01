@extends('layouts.adminheader')
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

.slider.round:before { border-radius: 50%;}


  </style>

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-3">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Reports</h5>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5">
                <a href="javascript:void(0);" class="btn text-light upload-excel" style="background:#4099ff" data-toggle="modal" data-target="#scoreImportModal"><i class="fas fa-file-import align-middle"></i>Upload Excel</a>
                <a class="btn text-light download-data" style="background:#263544" href="{{asset('sampleexcel/sample.xlsx')}}" download=""> Download Sample Data </a>
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
            <div class="col-6 col-sm-12 col-xl-2 m-b-30">
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

            <div class="col-6 col-sm-12 col-xl-2 m-b-30">
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


                  <div class="col-sm-12 col-xl-2 m-b-30">
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

                 <div class="col-sm-12 col-xl-2 m-b-30 mt-5">
                    <a href="{{route('adminreport')}}" class="btn btn-primary">Reset</a>
                </div>


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
                                
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive" id="targetDivold">

                                        @include('admin.report.table')
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

                                        <div class="form-row col-md-12" id="import">
                                            <div class="form-group col-sm-12">
                                                <input type="file" accept=".xlsx" name="file" id="score_import" value="" class="btn btn-secondary btn-block btn-sm" placeholder="Select Excel" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="close-modal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" id="confirmImport" class="btn btn-primary">Import</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
        <div id="loader" class="overlay">
    <div class="spinner"></div>
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
<style type="text/css">
    .overlay {
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9999;
    display: none; /* Hide loader initially */
}

.spinner {
    position: absolute;
    top: 50%;
    left: 50%;
    border: 6px solid #f3f3f3; /* Light grey */
    border-top: 6px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: translate(-50%, -50%) rotate(0deg); }
    100% { transform: translate(-50%, -50%) rotate(360deg); }
}

</style>
@endsection
@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
    $('#importForm').submit(function(){
        // Show loader
        $('#loader').show();

        // Disable screen
        $('body').addClass('modal-open');
        $('.modal-backdrop').addClass('show');

        return true; // Allow form submission to continue
    });
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

        for (var i = selectedYear ; i <= 2030; i++) {
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
            url: "{{ route('adminscoreview') }}",
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