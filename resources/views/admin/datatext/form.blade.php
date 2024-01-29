@extends('layouts.adminheader')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-info bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Data Text</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="feather icon-info"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('admindatatext')}}">DataText</a> </li>
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
                                <form method="post" action="@if(isset($record)){{ route('datatext-update', array('id' => $record->id)) }}@else{{route('datatext-store')}}@endif" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="{{ isset($record->id) ? $record->id : '' }}">
                                  <?php /*  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">View<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="view" class="form-control select2" name="view" required="">
                                                <option value="0">--Select View--</option>
                                                <option value="Standard" @if((isset($record->view) && $record->view=="Standard")) selected="selected" @endif>Standard</option>
                                                <option value="Local" @if((isset($record->view) && $record->view=="Local")) selected="selected" @endif>Local</option>
                                            </select>
                                        </div>
                                    </div> */ ?>
                                    <div class="form-group row" id="step_1">
                                        <label class="col-sm-2 col-form-label">Region<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="region_id" class="form-control select2" name="region_id" required="">
                                                <option value="0" selected>-- Select region --</option>
                                                @if($region->count())
                                                    @foreach($region as $data)
                                                        <option value="{{$data->id}}" @if(isset($record) && $data->id==$record->region_id) selected="selected" @endif>{{ucfirst($data->name)}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if ($errors->has('region_id')) <div class="text-danger">{{ $errors->first('region_id') }}</div>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row" id="step_2">
                                        <label class="col-sm-2 col-form-label">Main Category-1<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="main_category" class="form-control select2" name="main_category" required="">
                                                <option value="0" selected>--Select Main Category--</option>
                                                 @if($level_1->count())
                                                    @foreach($level_1 as $data)
                                                        <option value="{{$data->id}}" @if(isset($record) && $data->id==$record->region_id) selected="selected" @endif>{{ucfirst($data->title)}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="step_3">
                                        <label class="col-sm-2 col-form-label">Sub Category-1<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="sub_category_1" class="form-control select2" name="sub_category_1" required="">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="step_4">
                                        <label class="col-sm-2 col-form-label">Sub category-2<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="sub_category_2" class="form-control select2" name="sub_category_2"  required="">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="step_5">
                                        <label class="col-sm-2 col-form-label">Level-4<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="level_4" class="form-control select2" name="level_4"  required="">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="step_6">
                                        <label class="col-sm-2 col-form-label">Description<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control ckeditor" id="description" name="description" placeholder="Description"  data-parsley-required-message="{{ __("This value is required.")}}">{{ isset($record->description) ? $record->description : old('description') }}</textarea>
                                            @if ($errors->has('description')) <div class="text-danger">{{ $errors->first('description') }}</div>@endif
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="container row">
                                        <button class="btn text-light" style="background:#4099ff" type="submit">Submit</button>&nbsp;&nbsp;
                                        <a href="{{route('admindatatext')}}" class="btn btn-danger ">{{__('Cancel')}}</a>
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
        // CKEDITOR.replace('description');   

           
    
  @if(empty($record))
    $('#step_2').hide();
    $('#step_3').hide();
    $('#step_4').hide();
    $('#step_5').hide();
    $('#step_6').hide();
@else
var region_id = $('#region_id').val();
changeRegion(region_id);
if(region_id!= "" && region_id!=0){
    var main_category = $('#main_category').val();
    var selected_sub_category_1 = "{{$record->sub_category_1}}";
    changeMainCategory(main_category,selected_sub_category_1);

    // var sub_category_1 = $('#sub_category_1').val();
    var selected_sub_category_2 = "{{$record->sub_category_2}}";
    changeSubCategory1(selected_sub_category_1,selected_sub_category_2);

    var selected_level_4 = "{{$record->level_4}}";
    changeSubCategory2(selected_sub_category_2,selected_level_4);
}
@endif
     $('#region_id').change( function() {
        var region_id = $(this).val();
        changeRegion(region_id);
    });
    // $('#main_category').change( function() { 
    //     var main_category = $(this).val();
    //     changeMainCategory(main_category);
    // });
    // $('#step_3').change( function() { 
    //     $('#step_4').show();
    // });
    // $('#step_4').change( function() { 
    //     $('#step_5').show();
    // });
    // $('#step_5').change( function() { 
    //     $('#step_6').show();
    // });
 
    $('#main_category').on('change', function () {
        var main_category = $(this).val();
        changeMainCategory(main_category,0)
        // $("#sub_category_1").html('');
    });
    $('#sub_category_1').on('change', function () {
        var sub_category_1 = $(this).val();
        changeSubCategory1(sub_category_1,0);
        // $("#sub_category_2").html('');
    });
    $('#sub_category_2').on('change', function () {
        var sub_category_2 = $(this).val();
        changeSubCategory2(sub_category_2,0);

        // $("#level_4").html('');
    });
});     
function changeRegion(region_id){
    if(region_id != "" && region_id!= 0){
        $('#step_2').show();
    }
    else{
        $('#step_2').hide();
        $('#step_3').hide();
        $('#step_4').hide();
        $('#step_5').hide();
        $('#step_6').hide();
    }
}
function changeMainCategory(main_category,selected_sub_category_1){
    if(main_category != "" && main_category != 0){
        $('#step_3').show();
        $.ajax({
            url: "{{url('admin/sub_category_1')}}",
            type: "POST",
            data: {
                parent_id: main_category,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (result) {
                $('#sub_category_1').html('<option value="0">--Select Sub category 1--</option>');
                $('#sub_category_2').html('<option value="0">--Select Sub category 2--</option>');
                $('#level_4').html('<option value="0">--Select Level 4--</option>');
                $.each(result.sub_category_1, function (key, value) {
                    var selected = "";
                    if(selected_sub_category_1 == value.id){
                        selected = "selected='selected'";
                    }
                    $("#sub_category_1").append('<option value="' + value
                        .id + '"' + selected + '>' + value.title + '</option>');
                });
            }
        });
    }
    else{
        $('#step_3').hide();
        $('#step_4').hide();
        $('#step_5').hide();
        $('#step_6').hide();
    }
}
function changeSubCategory1(sub_category_1,selected_sub_category_2){
    if(sub_category_1!= "" && sub_category_1!= 0){
        $('#step_4').show();
        $.ajax({
            url: "{{url('admin/sub_category_2')}}",
            type: "POST",
            data: {
                parent_id: sub_category_1,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (res) {
                $('#sub_category_2').html('<option value="0">--Select Sub category 2--</option>');
                $('#level_4').html('<option value="0">--Select Level 4--</option>');
                $.each(res.sub_category_2, function (key, value) {
                    var selected = "";
                    if(selected_sub_category_2 == value.id){
                        selected = "selected='selected'";
                    }
                    $("#sub_category_2").append('<option value="' + value
                        .id + '"' + selected + '>' + value.title + '</option>');
                });
            }
        });
    }
    else{
        $('#step_4').hide();
        $('#step_5').hide();
        $('#step_6').hide();
    }
}
function changeSubCategory2(sub_category_2,selected_level_4){
    if(sub_category_2!= "" && sub_category_2!= 0){
        $('#step_5').show();
        $.ajax({
            url: "{{url('admin/level_4')}}",
            type: "POST",
            data: {
                parent_id: sub_category_2,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (res) {
                $('#level_4').html('<option value="0">--Select Level 4--</option>');
                $.each(res.level_4, function (key, value) {
                    var selected = "";
                    if(selected_level_4 == value.id){
                        selected = "selected='selected'";
                    }
                    $("#level_4").append('<option value="' + value
                        .id + '"' + selected + '>' + value.title + '</option>');
                });
            }
        });
    }
    else{
        $('#step_5').hide();
        $('#step_6').hide();
    }
    $('#step_5').change( function() { 
        $('#step_6').show();
    });
}

</script>
@endsection