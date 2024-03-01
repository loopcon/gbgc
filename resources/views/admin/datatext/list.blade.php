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
                                        <div class="col-md-8">
                                        <lable id="hide-text">The Gambling industry is characterised by monopolies. Vast majority of the industry is operated by comapnies :</lable> <lable id="hidetextValue"></lable>
                                        </div>
                                        <div class="col-md-1 text-right">
                                            <div class="col-md-12 text-right"><a href="{{route('datatext-create')}}" class="btn text-light" style="background:#4099ff"><i class="align-middle" data-feather="plus"></i>{{__('Add')}}</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="glossary-list" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                   <?php /* <th>{{__('Sr No.')}}</th>
                                                    <th>{{__('View')}}</th>
                                                    <th>{{__('Region')}}</th> */ ?>
                                                    <th>{{__('Jurisdiction')}}</th>
                                                    <th>{{__('Level-1')}}</th>
                                                    <th>{{__('Level-2')}}</th>
                                                    <th>{{__('Level-3')}}</th>
                                                    <th>{{__('Level-4')}}</th>
                                                    <th>{{__('Description')}}</th>
                                                    <th>{{__('Action')}}</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                             <?php /*    <?php
                                                    $i=1;
                                                ?>
                                                @if(count($datatext)>0)
                                                    @foreach($datatext as $data) 
                                                        <tr>   
                                                        //    <td>{{$i}}</td>
                                                        //         <?php $i++;?>
                                                        //     <td >  {{$data->view}} </td>
                                                        //     <td >  {{$data->regionDetail->name}} </td>
                                                            <td >@if($data->maincategoryDetail){{$data->maincategoryDetail->title}}@else - @endif</td>
                                                            <td >@if($data->subcategory1Detail){{$data->subcategory1Detail->title}}@else - @endif</td>
                                                            <td >@if($data->subcategory2Detail){{$data->subcategory2Detail->title}}@else - @endif</td>
                                                            <td >@if($data->level4Detail){{$data->level4Detail->title}}@else - @endif</td>
                                                            <td >  {!!$data->description!!} </td>
                                                            <td><a href="{{ route('datatext-edit',$data->id) }}" rel='tooltip' class="btn text-light" style="background:#4099ff" title="Edit"><i class="fa fa-edit"></i></a>
                                                            <a href='javascript:void(0);' data-href="{{ route('datatext-delete',$data->id) }}" rel='tooltip' class="btn btn-danger delete" title="Delete"><i class="fa fa-trash"></i></a>
                                                             </td>
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

        loadGloassayList("","");

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

        $(document).on('click', '.pagination li.page-item a.page-link', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            var jurisdiction = $('#select-jurisdiction').val();
            loadGloassayList(jurisdiction,url);
        });
    });

    function loadGloassayList(jurisdiction,url)
    {
        if(url==''){
            url = "{{ route('adminglossarylist',1)}}";
        }
        $.ajax({
            type: 'POST',
            data: { _token: "{{ csrf_token() }}", jurisdiction: jurisdiction},
            url: url,
            dataType: 'json',
            success: function (response) {
                $("#glossary-list tbody").html(response.data.glossary_list);
                $("#pagination").html(response.data.pagination);
                // $("#page").html(response.data.page);
            }
        });
    }
</script>
@endsection