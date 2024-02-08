@extends('layouts.adminheader')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Score</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('adminindex')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('adminscore')}}">Score</a>
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
                                        <div class="col-md-12 text-right">
                                           <?php /* <div class="col-md-12 text-right"><a href="{{route('datatext-create')}}" class="btn text-light" style="background:#4099ff"><i class="align-middle" data-feather="plus"></i>{{__('Add')}}</a></div> */ ?>
                                            <div class="col-md-12 text-right">
                                                <a href="javascript:void(0);" class="btn text-light" style="background:#4099ff" data-toggle="modal" data-target="#scoreImportModal"><i class="fas fa-file-import align-middle"></i> Import</a>
                                                <a class="btn text-light" style="background:#263544" href="{{ route('export-scores') }}"> Export Sample Data </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="complex-dt" class="table table-striped table-bordered nowrap">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="scoreImportModal" tabindex="-1" role="dialog" aria-labelledby="scoreImportModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('import-scores') }}" method="post" data-parsley-validate enctype="multipart/form-data" id="importScore">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="sizeOptionModalLabel">Import Score</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">View<span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <select id="view" class="form-control select2" name="view" required="">
                                                    <option value="0">--Select View--</option>
                                                    <option value="Standard">Standard</option>
                                                    <option value="Local">Local</option>
                                                </select>
                                            </div>
                                        </div>

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

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Currency<span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <select id="currency" class="form-control select2" name="currency" required="">
                                                    <option value="0">--Select Currency--</option>
                                                    @foreach($currencies as $currency)
                                                    <option value="{{$currency->id}}">{{$currency->name}}</option>
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
                                        <button type="submit" class="btn btn-primary">Import</button>
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
<script>
$(document).ready(function(){
    $('#import').hide();
    $('#view').change( function() { 
         var view = $(this).val();
        if(view != "" && view != 0){
            $('#import').show();
        }
        else{
            $('#import').hide();
        }
    });
    
    $('#scoreImportModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        $('#import').hide();
    })

});
</script>
@endsection