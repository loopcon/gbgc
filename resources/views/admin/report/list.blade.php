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

.bold{
    font-weight: bold;
}
.slider.round:before { border-radius: 50%;}


  </style>

    <div class="page-header card">
        <div class="row align-items-end breadcum-rowbox">
            <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                <div class="page-header-title breadcum-box">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Reports</h5>
                    </div>
                </div>
            </div>
            
            <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                <a href="javascript:void(0);" class="btn text-light upload-excel" style="background:#4099ff" data-toggle="modal" data-target="#scoreImportModal"><i class="fas fa-file-import align-middle"></i>Upload Excel</a>
                <a class="btn text-light download-data" style="background:#263544" href="{{asset('sampleexcel/sample.xlsx')}}" download=""> Download Sample Data </a>
            </div>
            
            <div class="col-12 col-sm-12 col-md-3 col-lg-4">
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
            <div class="col-6 col-sm-4 col-md-4 col-xl-2">
                <h3 class="sub-title">View</h3>
                <label class="switch">
                    <input type="checkbox" id="togBtnview"  onchange="updateCurrency()">
                    <div class="slider round">
                        <!--ADDED HTML -->
                        <span class="on">Standard</span>
                        <span class="off">Local</span>
                        <!--END-->
                    </div>
                    
                </label>   
            </div>

            <div class="col-6 col-6 col-sm-4 col-md-4 col-xl-2">
                <h3 class="sub-title">Currency</h3>
                <label class="switch">
                    <input type="checkbox" id="togBtncurrency" onchange="updateView()">
                    <div class="slider round">
                    <!--ADDED HTML -->
                    <span class="on">USD</span>
                    <span class="off">LocalCurr</span>
                    <!--END-->
                    </div>
                </label>   
            </div>

                <div class="col-12 col-sm-4 col-md-4 col-xl-2 adm-jurisdiction-input">
                    <h3 class="sub-title">Jurisdiction</h3>
                    <select class="js-example-basic-multiple col-sm-12" multiple="multiple" id="country">
                        <option value="all" selected disabled>All</option>
                        @if($region->count())
                            @foreach($region as $data)
                                <option value="{{$data->id}}" >{{ucfirst($data->name)}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>


            <div class="col-12 col-sm-4 col-md-4 col-xl-2 year-from-box">
                <h3 class="sub-title">Year From</h3>
                <select class="form-control js-example col-sm-12" id="ddlYearsfrom" name="year">
                    <option value="all" hidden>{{__('-- all --')}}</option>
                </select>
            </div>

            <div class="col-12 col-sm-4 col-md-4 col-xl-2 year-from-box">
                <h3 class="sub-title">Year To</h3>
                <select class="form-control js-example col-sm-12" id="ddlYearsto">
                    <option value="all" hidden>{{__('-- all --')}}</option>
                </select>
            </div>

            <div class="col-12 col-sm-4 col-md-4 col-xl-2 ">
                <h3 class="adm-reset-btn-label">reset btn</h3>
                <a href="{{route('adminreport')}}" class="btn btn-primary">Reset</a>
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
                                
                                <div class="card-block report-scorly">

                                <div style="display: flex; justify-content: center;">
                                    <div id="spinner" class="spinner-border text-primary" role="status" style="display: none;">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>

                                    <div class="dt-responsive table-responsive " id="targetDivnew">

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

<script>


   document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('togBtnview').checked = true;
    document.getElementById('togBtncurrency').checked = true;

    // Function to handle changes in elements
    function handleChange() {
        var viewValue = document.getElementById('togBtnview').checked;
        var currencyValue = document.getElementById('togBtncurrency').checked;
        var yearFromSelect = document.getElementById('ddlYearsfrom').value;
        var yearToSelect = document.getElementById('ddlYearsto').value;
        var countrySelect = document.getElementById('country');
        var selectedCountries = Array.from(countrySelect.selectedOptions).map(option => option.value).join(',');
        
        $('#spinner').show(); // Show spinner before AJAX request
        reportlist(viewValue, currencyValue, yearFromSelect, yearToSelect, selectedCountries);
    }

    // Attach event listeners to elements
    document.getElementById('togBtnview').addEventListener('change', handleChange);
    document.getElementById('togBtncurrency').addEventListener('change', handleChange);
    document.getElementById('ddlYearsfrom').addEventListener('change', handleChange);
    document.getElementById('ddlYearsto').addEventListener('change', handleChange);
    $('#country').change(function(){
    $('#country option[value="all"]').prop('selected', false);
        handleChange(); 
    });

    // Initial call
    handleChange();
});


function reportlist(viewValue, currencyValue, yearFromSelect, yearToSelect, selectedCountries) {
    var viewText = viewValue ? 'Standard' : 'Local';
    var currencyText = currencyValue ? 'USD' : 'LocalCurr';
    var yearFrom = yearFromSelect;
    var yearTo = yearToSelect;
    var jurisdictions = selectedCountries;
    var token = "{{ csrf_token() }}";
    $.ajax({
        url: "{{ route('adminscoreview') }}",
        type: "POST",
        dataType: 'json',
        data: {
            _token: token,
            view: viewText,
            currency: currencyText,
            year_from: yearFrom,
            year_to: yearTo,
            country: jurisdictions
        },
        success: function(data) {
            $('#spinner').hide(); // Hide spinner after successful response
            $("#targetDivold").hide();
            $('#targetDivnew').html(data.view);
            $('#targetDivnew td:empty').css({'border-top': '0px', 'border-bottom': '0px'});
            $('#targetDivnew tr:has(td:contains("Total")) td').css('font-weight', 'bold');
        },
        error: function(xhr, status, error) {
            $('#spinner').hide(); // Hide spinner if there's an error
            console.error(xhr.responseText);
        }
    });
}



    $('.textrow').hide();
    $('.viewtext').hide();
    $('.currencytext').hide();
    $('.juricdictiontext').hide();
    $('.yeartotext').hide();

    function updateText() {
        var viewToggle = document.getElementById("togBtnview");
        var currencyToggle = document.getElementById("togBtncurrency");
        var viewValueLabel = document.querySelector(".viewValue");
        var currencyValueLabel = document.querySelector(".currencyValue");

        // Set initial values for view and currency
        if (viewToggle.checked) {
            viewValueLabel.textContent = "Local";
        } else {
            viewValueLabel.textContent = "Standard";
        }

        if (currencyToggle.checked) {
            currencyValueLabel.textContent = "USD";
        } else {
            currencyValueLabel.textContent = "LocalCurr";
        }
    }

    //update currency 
    function updateCurrency() {
        var viewToggle = document.getElementById("togBtnview");
        var currencyToggle = document.getElementById("togBtncurrency");
        var currencyText = document.querySelector(".slider.round .off");

        if (viewToggle.checked) {
            // View is set to Local
            currencyToggle.checked = true;
            currencyText.textContent = "USD";
        } else {
            // View is set to Standard
            currencyToggle.checked = false;
            currencyText.textContent = "LocalCurr";
        }
        updateText();
    }

    function updateView() {
        var viewToggle = document.getElementById("togBtnview");
        var currencyToggle = document.getElementById("togBtncurrency");
        var currencyText = document.querySelector(".slider.round .off");

        if (currencyToggle.checked) {
            // Currency is set to USD
            viewToggle.checked = true; // Change view to Standard
            currencyText.textContent = "USD"; // Change currency text
        } else {
            // Currency is set to LocalCurr
            viewToggle.checked = false; // Change view to Local
            currencyText.textContent = "LocalCurr"; // Change currency text
        }
        updateText();
    }
    //Curencty and voiew change 

    //td remove border
     $(document).ready(function() {
         $('tr:has(td:contains("Total")) td').css('font-weight', 'bold');
        $('td:empty').css({'border-top': '0px', 'border-bottom': '0px'});
     });
    
    //import submission loader
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


    // Set default values for View and Currency
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('togBtnview').checked = true;
        document.getElementById('togBtncurrency').checked = true;
    });

    //year o and yesr from select
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
            text: '-- all --',
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

@endsection