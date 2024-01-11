@extends('layouts.adminheader')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-info bg-c-blue"></i>
                <div class="d-inline">
                    <h5>FAQ</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="feather icon-info"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('aboutus')}}">FAQ</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="pcoded-inner-content">
    <div   div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Frequently Ask Questions List</h5>
                                <div class="form-row">
                                    <div class="col-md-12 text-right">
                                        <div class="col-md-12 text-right"><a href="{{route('faq-create')}}" class="btn btn-success"><i class="align-middle" data-feather="plus"></i>{{__('Add')}}</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="card-body">
                                    <table id="table" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>{{__('Id')}}</th>
                                                <th>{{__('Questions')}}</th>
                                                <th>{{__('Answers')}}</th>
                                                <th>{{__('Action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($faq as $data) 
                                            <tr>   
                                                <td >  {{$data->id}} </td>
                                                <td >  {{$data->question}} </td>
                                                <td >  {{$data->answer}} </td>
                                                <td><a href="{{ route('faq-edit',$data->id) }}" rel='tooltip' title="Edit" class='btn btn-info btn-sm'><i class='fas fa-pencil-alt'></i></a>
                                                <a href="{{ route('faq-delete',$data->id) }}" rel='tooltip' title="Delete" class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></a>
                                                @csrf
                                                @method('DELETE')
                                                </td>
                                                </tr>
                                            @endforeach
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
</div>
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('javascript')
    <!-- <script>
        $(document).ready(function() {
            var page = $("#table").DataTable({
                    "language": {
                        "url": "{{__('Datatable Language')}}",
                    },
                    "order": [], //Initial no order.
                    "aaSorting": [],
                    processing: true,
                    serverSide: true,
                    "pageLength": 100,
                    "lengthMenu": [[50, 100, 200, 400], [50, 100, 200, 400]],
                    "columns": [
                        {data: 'id', name: 'id'},
                        {data: 'question', name: 'question'},
                        {data: 'answer', name: 'answer'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                    "ajax" : {
                        url : "{{ route('faq-datatable') }}",
                        type : "POST",
                        data : function(d) {
                            d._token = "{{ csrf_token() }}"
                        }
                    }
            });

            $(document).on('click', '.delete', function() {
                var href = $(this).data('href');
                swal({
                    title: "",
                    text: "{{__('Are you sure? Delete this Faq!')}}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "{{__('Yes, delete it!')}}",
                    cancelButtonText: "{{__('Cancel')}}",
                    closeOnConfirm: true
                },
                function(){
                    location.href = href;
                });
            });
        });
    </script> -->
@endsection