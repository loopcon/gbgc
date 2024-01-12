@extends('layouts.adminheader')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>FAQ</h5>
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
                            <a href="#!">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#!">FAQ</a>
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
                                <div class="card-header">
                                    <h5>FAQ</h5>
                                    <div class="form-row">
                                        <div class="col-md-12 text-right">
                                            <div class="col-md-12 text-right"><a href="{{route('faq-create')}}" class="btn btn-success"><i class="align-middle" data-feather="plus"></i>{{__('Add')}}</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="complex-dt" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>{{__('Sr No.')}}</th>
                                                        <th>{{__('Questions')}}</th>
                                                        <th>{{__('Answers')}}</th>
                                                        <th>{{__('Action')}}</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i=1;
                                                ?>
                                                @if(count($faq)>0)
                                                    @foreach($faq as $data) 
                                                        <tr>   
                                                            <td>{{$i}}</td>
                                                                <?php $i++;?>
                                                            <td >  {{$data->question}} </td>
                                                            <td >  {{$data->answer}} </td>
                                                            <td><a href="{{ route('faq-edit',$data->id) }}" rel='tooltip' class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                                                            <a href="{{ route('faq-delete',$data->id) }}" rel='tooltip' class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                                             </td>
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
                </div>
            </div>
        </div>
        <div id="styleSelector">
        </div>
    </div>
@endsection