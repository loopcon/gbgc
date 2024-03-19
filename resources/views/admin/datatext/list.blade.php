@extends('layouts.adminheader')
@section('content')
<link class="js-stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Glossary</h5>
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
                            <a href="{{route('admindatatext')}}">Glossary</a>
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
                                <div class="card-header">
                                    <div class="form-row">
                                        <div class="col-md-3 text-center">
                                            <div class="d-inline">
                                                <h6><b>Jurisdiction</b> </h6>
                                                <label>
                                                    <select id="select-jurisdiction" class="form-control select2" name="region_id">
                                                        <option value="0" sselected>--Select Jurisdiction--</option>
                                                        @if($region->count())
                                                            @foreach($region as $data)
                                                                <option value="{{$data->id}}">{{ucfirst($data->name)}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select> 
                                                </lable>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <lable id="hide-text">The Gambling industry is characterised by monopolies. Vast majority of the industry is operated by comapnies :</lable> <lable id="hidetextValue"></lable>
                                        </div>
                                        <div class="col-md-2 text-right">
                                            

                                                <a href="javascript:void(0);"  data-toggle="modal" data-target="#scoreImportModal" class="btn text-light" style="background:#4099ff"><i class="align-middle" data-feather="plus"></i>{{__('Upload Excel')}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="">
                                        
                                        

                                        <div id="targetDivnew" class="dt-responsive admin-table-responsive">
                                        </div>

                                        
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
      <div class="modal fade" id="scoreImportModal" tabindex="-1" role="dialog" aria-labelledby="scoreImportModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('importdatatext') }}" method="post" data-parsley-validate enctype="multipart/form-data" id="importForm">
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
        $('td:empty').css({'border-top': '0px', 'border-bottom': '0px'});
    });
</script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {

        $(document).on('click','.info',function()
        {
            var information = $(this).data('information');
            $('.infotext').html(information);
            $('#informationmodel').modal('show');
        });
        
        $(document).on('click', '.delete', function() {
            var href = $(this).data('href');
            swal({
                title: "",
                text: "{{__('Are you sure? Delete this Data!')}}",
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
        $('#hide-text').hide();

        $('#select-jurisdiction').on('change', function(){
            
            var jurisdiction = $(this).val();
            var url = "";
            loadGloassayList(jurisdiction,url);

            var juris = $('#select-jurisdiction option:selected').text();
            if(juris != "--Select Jurisdiction--")
            {
                $('#hide-text').show();
                $('#hidetextValue').html(juris);
            }
            else{
                $('#hide-text').hide();
                $('#hidetextValue').hide();
            }
            
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var jurisdiction = document.getElementById('select-jurisdiction').value;
        loadGloassayList(jurisdiction, 1); // Load the initial page
    });

    function loadGloassayList(jurisdiction, page) {
        var url = "{{ route('adminglossarylist')}}";
        $.ajax({
            type: 'POST',
            data: { 
                _token: "{{ csrf_token() }}", 
                jurisdiction: jurisdiction,
                page: page // Pass the page number
            },
            url: url,
            dataType: 'json',
            success: function (response) {
                $('#targetDivnew').html(response.view);
                $('#targetDivnew td:empty').css({'border-top': '0px', 'border-bottom': '0px'});

            }
        });
    }

    $(document).ready(function() {
        $('#paginate a').on('click', handlePaginationClick);
    });

    function handlePaginationClick(event) {
        event.preventDefault();
        var pageUrl = event.target.href;
        var pageNumber = getPageNumberFromLink(event.target);
        var jurisdiction = document.getElementById('select-jurisdiction').value;
        loadGloassayList(jurisdiction, pageNumber);
    }

    function getPageNumberFromLink(link) {
        // Extract the page number from the link's text
        var pageNumber = link.textContent.trim();
        return pageNumber;
    }

</script>
@endsection