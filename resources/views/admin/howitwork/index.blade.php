@extends('layouts.adminheader')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title breadcum-box">
                <i class="feather icon-info bg-c-blue"></i>
                <div class="d-inline">
                    <h5>How It's Work</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="feather icon-info"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('adminfaq')}}">How It's Work</a> </li>
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
                            {{-- <div class="card-header">
                            </div> --}}
                            <div class="card-block">
                                <form method="post" action="{{route('updatehowitswork')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <input type="hidden" name="id" value="{{$howitwork->id}}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">First Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title1" class="form-control" placeholder="Question" value="{{$howitwork->title1}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Second Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title2" class="form-control" placeholder="Second Title" value="{{$howitwork->title2}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Third Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title3"   class="form-control" placeholder="Third Title" value="{{$howitwork->title3}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Image Box Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="imagetext" class="form-control" placeholder="Image Box Title" value="{{$howitwork->imagetext}}">
                                        </div>
                                    </div>

                                    <div class="form-group row admin-image-upload">
                                        <label class="col-sm-2 col-form-label">Image Upload</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="image"  class="form-control" placeholder="Image Upload">
                                        </div>
                                    </div>
                                    <div class="form-group row container">
                                        <img src="{{asset('uploads/howitswork/'.$howitwork->image)}}" style="height:100px;width: 100px;">
                                    </div>

                                  <div class="container row">
                                        <button class="btn text-light" style="background:#4099ff" type="submit">Submit</button>&nbsp;&nbsp;
                                    </div>

                                </form>
                                <hr>
                                  <div class="form-group row mb-2">
                                    <label class="col-sm-2 col-form-label pt-0">
                                        <a href="javascript:void(0);" class="btn text-light upload-excel" style="background:#4099ff" data-toggle="modal" data-target="#scoreImportModal"><i class="fas fa-file-import align-middle"></i>Add Steps</a>
                                    </label>
                                  </div>
                                    <div class="form-group row container admin-table-responsive">
                                        <table class="table table-bordered col-sm-12">
                                          <thead>
                                            <tr>
                                              <th scope="col">Sr No.</th>
                                              <th scope="col">Title</th>
                                              <th scope="col">Action</th>
                                            </tr>
                                          </thead>
                                        <tbody>
                                            <?php $i=1;?>
                                            @foreach($howitworkstep as $step)
                                        <tr>
                                          <td>{{$i}}</th>
                                          <?php $i++;?>
                                          <td>{{$step->title}}</td>
                                          <td><a href="javascript:;" data-id="{{$step->id}}" data-title="{{$step->title}}"  class="btn text-light edit" style="background:#4099ff" title="Edit"><i class="fa fa-edit"></i></a></td>
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

    <div class="modal fade" id="scoreImportModal" tabindex="-1" role="dialog" aria-labelledby="scoreImportModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('addhowitwork') }}" method="post" data-parsley-validate enctype="multipart/form-data" id="importForm">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="sizeOptionModalLabel">Add Steps</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-row col-md-12" id="import">
                                            <div class="form-group col-sm-12">
                                                <input type="text"  name="title" placeholder="Enter Title" required / class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="close-modal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" id="confirmImport" class="btn btn-primary">save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

    <!-- edit model -->

    <div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="editmodel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('edithowitsworkstep') }}" method="post" data-parsley-validate enctype="multipart/form-data" id="importForm">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" class="edit_id">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="sizeOptionModalLabel">Edit Steps</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-row col-md-12" id="import">
                                            <div class="form-group col-sm-12">
                                                <input type="text"  name="title" placeholder="Enter Title" required / class="form-control edit_title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="close-modal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" id="confirmImport" class="btn btn-primary">save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
    <!-- end edit model -->
@endsection
@section('javascript')
<script>

$(document).on('click','.edit',function()
  {
    var id=$(this).data('id');
    var title=$(this).data('title');

    $('.edit_id').val(id);
    $('.edit_title').val(title);
    $('#editmodel').modal('show');
  });


    $(document).ready(function(){
        CKEDITOR.replace('answer');       
    });
</script>
@endsection