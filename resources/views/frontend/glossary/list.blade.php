@extends('layouts.dashboardheader')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-sm-6 col-md-8">
                <div class="page-header-title user-breadcum-box">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Glossary</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('index')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('frontglossary')}}">Glossary</a>
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
                            <div class="card user-glossary-card">
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
                                        <div class="col-md-10 text-left">
                                            <div class="user-jurisdiction-head">
                                                <h6 style="text-align:center;"><b>Jurisdiction</b> </h6>
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
                                            <lable id="hide-text"></lable> <lable id="hidetextValue"></lable>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive">
                                         <div id="targetDivnew" class="dt-responsive dashboard-table-responsive">
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
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {

        $(document).on('click','.info',function()
        {
            var information = $(this).data('information');
            $('.infotext').html(information);
            $('#informationmodel').modal('show');
        });
        
        $('#hide-text').hide();

        loadGloassayList("","");

        $('#select-jurisdiction').on('change', function(){
            
            var jurisdiction = $(this).val();
            var url = "";
            loadGloassayList(jurisdiction,url);

            var juris = $('#select-jurisdiction option:selected').text();
            if(juris != "--Select Jurisdiction--")
            {
                $('#hide-text').show();
                $('#hidetextValue').html();
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
        var url = "{{ route('frontglossarylist')}}";
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
                $('#hide-text').html(response.region.text);
                $('#hidetextValue').html(response.region.name);
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