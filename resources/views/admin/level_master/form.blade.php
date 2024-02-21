@extends('layouts.adminheader')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-info bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Levels</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="feather icon-info"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('adminlevel')}}">Levels</a> </li>
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
                            </div>
                            <div class="card-block">
                                <form method="post" action="@if(isset($record)){{ route('level-update', array('id' => $record->id)) }}@else{{route('level-store')}}@endif" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="{{ isset($record->id) ? $record->id : '' }}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title"  id="title" class="form-control" placeholder="Title" value="{{ isset($record->title) ? $record->title : old('title') }}" data-parsley-required-message="{{ __("This value is required.")}}" >
                                            @if ($errors->has('title')) <div class="text-danger">{{ $errors->first('title') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Level Number<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="level_number" class="form-control select2" name="level_number" required="">
                                                <option value="" selected disabled>--Select level_number--</option>
                                              <?php /*  <option value="1" @if((isset($record->level_number) && $record->level_number==1)) selected="selected" @endif>1</option>
                                                <option value="2" @if((isset($record->level_number) && $record->level_number==2)) selected="selected" @endif>2</option>
                                                <option value="3" @if((isset($record->level_number) && $record->level_number==3)) selected="selected" @endif>3</option> */ ?>
                                                <option value="4" @if((isset($record->level_number) && $record->level_number==4)) selected="selected" @endif>4</option>
                                            </select>
                                            @if ($errors->has('level_number')) <div class="text-danger">{{ $errors->first('level_number') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row" id="div_parent_level">
                                        <label class="col-sm-2 col-form-label">Parent Level</label>
                                        <div class="col-sm-10">
                                            <select id="parent_level" class="form-control select2" name="parent_level">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="container row">
                                        <button class="btn text-light" style="background:#4099ff" type="submit">Submit</button>&nbsp;&nbsp;
                                        <a href="{{route('adminlevel')}}" class="btn btn-danger ">{{__('Cancel')}}</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>
    $(document).ready(function(){ 
        @if(empty($record))
            $('#div_parent_level').hide();
        @else
            var level_number = $('#level_number').val();
            var get_parent_level;
            if(level_number == 1){
                $('#div_parent_level').hide();
            }else if(level_number == 2){
                get_parent_level = 1;
            }else if(level_number == 3){
                get_parent_level = 2;
            }else if(level_number == 4){
                get_parent_level = 3;
            }
            var selected_parent_level = "{{$record->parent_id}}";
            changelevelNumber(level_number,get_parent_level,selected_parent_level);
        @endif 
            $('#level_number').on('change', function () {
                var level_number = $(this).val();
                var get_parent_level;
                if(level_number == 1){
                    $('#div_parent_level').hide();
                }else if(level_number == 2){
                    get_parent_level = 1;
                }else if(level_number == 3){
                    get_parent_level = 2;
                }else if(level_number == 4){
                    get_parent_level = 3;
                }
                changelevelNumber(level_number,get_parent_level,0)
            });
    });
    function changelevelNumber(level_number,get_parent_level,selected_parent_level){
        if(level_number != 1){
            $('#div_parent_level').show();
            $.ajax({
                url: "{{url('admin/parent_level')}}",
                type: "POST",
                data: {
                    parent_level: get_parent_level,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#parent_level').html('<option value="0">--Select Parent Level--</option>');
                    $.each(result.parent_level, function (key, value) {
                        var selected = "";
                        if(selected_parent_level == value.id){
                            selected = "selected='selected'";
                        }
                        // console.log(value);
                        $("#parent_level").append('<option value="' + value
                            .id + '"' + selected + '>' + result.main_level.master_detail.title + ' > ' + value.master_detail.title + ' > ' + value.title + '</option>');
                    });
                }
            });
        }
    }
</script>
@endsection