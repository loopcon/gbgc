@extends('layouts.dashboardheader')
@section('title')
<title>GBGC - Consultancy & market reports for the global gambling industry.</title>
@endsection
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Additional User</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href=""><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('additionaluserlist')}}">Additional User</a>
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
                                    <div class="form-row">
                                        <div class="col-md-12 text-right">
                                            <div class="col-md-12 text-right">

                                           

                                             <!-- freetopro -->
                                              @if($customer->access_type!="paid"  && $customer->access_type!="additionaluser"  && $customer->access_type!="requestforadditional" && $customer->payment!=1)
								                 <a href="javascript:void(0)"  class="btn text-light freetoproacess"  style="background:#4099ff">  Free to Pro</a>
								                @endif
								                <!-- endfreetopro -->

								                <!-- paid -->
								                @if($customer->remain_payment_additional_user > 0)
								                <a href="javascript:void(0)"  class=" btn text-light additionaluser"  style="background:#4099ff">Add Additional User</a>
								                @endif
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
                                                        <th>{{__('name')}}</th>
                                                        <th>{{__('Job Title')}}</th>
                                                        <th>{{__('Phone')}}</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i=1;
                                                ?>
                                                @if(count($additionaluser)>0)
                                                    @foreach($additionaluser as $additionaluserdata) 
                                                        <tr>   
                                                            <td>{{$i}}</td>
                                                                <?php $i++;?>
                                                            <td>{{$additionaluserdata->name}} </td>
                                                            <td>{{$additionaluserdata->job_title}}</td>
                                                            <td>{{$additionaluserdata->phone}}</td>
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


    <!-- Free to Pro Access-->
<div class="modal fade" id="freetopromodel" tabindex="-1" role="dialog" aria-labelledby="scoreImportModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="sizeOptionModalLabel">Free to Pro</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
             <div class="row m-0">
                    <div class="col-12 col-md-12 p-0">
                        <div class="login-register-form-box">
                            <div>
                                <form method="post" id="freetoproform">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$customer->id}}">
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6 ">
                                            <div class="input-group">
                                                <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" value="{{$customer->fname}}">
                                            </div>
                                            <div id="fnameerror"></div>
                                        </div>

                                        <div class="col-12 col-md-6 ">
                                            <div class="input-group">
                                                <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" value="{{$customer->lname}}">
                                            </div>
                                            <div id="lnameerror"></div>
                                        </div>
                                    </div>

                                        <div class="row mb-3">
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{$customer->email}}" readonly> 
                                            </div>
                                            <div id="emailerror"></div>
                                        </div> 

                                        <div class="col-12 col-md-6" >
                                            <div class="input-group">
                                                <input  class="form-control" maxlength="10"  type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Phone Number" id="phone" name="phone" value="{{$customer->phone}}" readonly>
                                            </div> 
                                            <div id="phoneerror"></div>  
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                    
                                        <div class="col-12 col-md-6">
                                            <div class="input-group ">
                                                <input type="text" id="job_title" name="job_title"  class="form-control" placeholder="Job Title" value="{{$customer->job_title}}">
                                            </div>
                                            <div id="jobtitleerror"></div>
                                        </div>
                                     
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <input type="text" id="bussiness_name" name="bussiness_name" class="form-control" placeholder="Business Name" value="{{$customer->bussiness_name}}"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12 col-md-12">
                                            <div class="input-group">
                                                <input class="form-control" placeholder="If Your Business is Part of a Wider Group Please let us  Know" class="form-control" name="business_wider_group" value="{{$customer->business_wider_group}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12 col-md-12">
                                            <div class="input-group">
                                                <textarea class="form-control" placeholder="Biling Address" class="form-control" name="billing_address" placeholder="Biling Address">{{$customer->billing_address}}</textarea> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                           <div class="col-12 col-md-12">
                                            <div class="input-group ">
                                                <input type="text" id="additional_user_no" name="additional_user_no"  class="form-control" placeholder="Number of Additional User" value="" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                            </div>
                                            <div id="jobtitleerror"></div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12 col-md-12">
                                            <div class="input-group">
                                                <textarea class="form-control"class="form-control" name="additional_details" placeholder="Is there is Anything You Require Additional on Your Invoice"></textarea> 
                                            </div>
                                        </div>
                                    </div>

                                    <div id="errormsg"></div>
                                    <button type="button" id="close-modal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="save_freetopro">Submit</button>
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


<!-- End Free to Pro Access-->
<div class="modal fade" id="additionalusermodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sizeOptionModalLabel">Additional User</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" style="max-height:400px;overflow: auto;">
             <div class="row m-0">
                    <div class="col-12 col-md-12 p-0">
                        <div class="login-register-form-box">
                            <div>
                                @if($customer->remain_payment_additional_user > 0)
                            <form method="post" id="additionaluserform">
                                @csrf
                                <input type="hidden" name="id" value="{{$customer->id}}">
                                <?php $j=1;?>
                              @for($i = 0; $i < $customer->remain_payment_additional_user; $i++)
                                <label>Add Details for Additional User {{$j}}</label>
                                <?php $j++;?>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6 ">
                                        <div class="input-group">
                                            <input type="text" id="fname{{$i}}" name="fname[]" class="form-control" placeholder="First Name">
                                        </div>
                                        <div id="fnameerror{{$i}}"></div>
                                    </div>

                                     <div class="col-12 col-md-6 ">
                                        <div class="input-group">
                                            <input type="text" id="lname{{$i}}" name="lname[]" class="form-control" placeholder="Last Name">
                                        </div>
                                        <div id="lnameerror{{$i}}"></div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12 col-md-12">
                                        <div class="input-group ">
                                            <input type="text" id="job_title{{$i}}" name="job_title[]" class="form-control" placeholder="Job Title">
                                        </div>
                                        <div id="jobtitleerror{{$i}}"></div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12 col-md-6" >
                                        <div class="input-group">
                                            <input class="form-control" maxlength="10" type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Phone Number" id="phone{{$i}}" name="phone[]">
                                        </div> 
                                        <div id="phoneerror{{$i}}"></div>  
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <input type="text" id="additonalemail{{$i}}" name="email[]" class="form-control" placeholder="Email">
                                        </div>
                                        <div id="emailerror{{$i}}"></div>
                                    </div>
                                </div>
                                @endfor

                                <div id="emailerror{{$i}}" data-index="{{$i}}"></div>

                                  <div class="modal-footer">
                                        <button type="button" id="close-modal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" id="saveadditional" class="btn btn-primary saveadditional">Submit</button>
                                    </div>
                                </form>

                                @else
                                <div class="row">
                                    <h4>You Can not Create a Additional User</h4>
                                </div>
                                 @endif
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
<script>
    $(document).ready(function() {
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
        $("#danger-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#danger-alert").slideUp(500);
        });
    });

    $(document).on('click','.freetoproacess',function()
    {
        $('#freetopromodel').modal('show');
    });

    $(document).on('click','.additionaluser',function()
    {
        $('#additionalusermodel').modal('show');
    });


   $(document).on('click','#save_freetopro',function(){
    var formdata=$('#freetoproform').serialize();
      $.ajax(
        {

          url:"{{route('registration-update')}}",
          type: "post",
          data: formdata,
          dataType:'JSON',
          success: function(data)
          {

           if (data.status == 1) 
            {
               window.location.href = "{{ route('checkout') }}";
               // setTimeout(function() {
               //     location.reload();
               // }, 4000);
            }
            
            if (data.status == 0) {
                $('#fnameerrorshow, #lnameerrorshow, #jobtitleerrorshow, #emailerrorshow, #phoneerrorshow').hide();
                if(data.errors)
                {
                    if(data.errors.fname){$('#fnameerror').html('<strong id="fnameerrorshow" style="color:red">'+ data.errors.fname + '</strong>');}
                    if(data.errors.lname){$('#lnameerror').html('<strong id="lnameerrorshow" style="color:red">'+ data.errors.lname + '</strong>');}
                    if (data.errors.email) {$('#emailerror').html('<strong id="emailerrorshow" style="color:red">' + data.errors.email + '</strong>');}
                    if(data.errors.phone){$('#phoneerror').html('<strong id="phoneerrorshow" style="color:red">'+ data.errors.phone +'</strong>');}
                }
                if(data.errormsg)
                {
                    $('#errormsg').html('<strong id="errormsg" style="color:red">Something went Wrong Please Try again.</strong>');
                }
            }

          }
        });
  });




   $(document).on('click','#saveadditional',function(){
    var formdata=$('#additionaluserform').serialize();
      $.ajax(
        {
          url:"{{route('storeadditionaluser')}}",
          type: "post",
          data: formdata,
          dataType:'JSON',
          success: function(data)
          {

            if (data.status == 1) 
            {
                window.location.href = "{{ route('additionalcheckout') }}";
            }
            
            if (data.status == 0 && data.errors) {

                $.each(data.errors, function(key, value) {
                    if (key.includes('email')) {
                        var index = key.replace('email', '').replace('.', '');
                        $('#emailerror' + index).html('<strong style="color:red">' + value[0] + '</strong>');
                    }

                    if (key.includes('phone')) {
                        var index = key.replace('phone', '').replace('.', '');
                        $('#phoneerror' + index).html('<strong style="color:red">' + value[0] + '</strong>');
                    }

                    if (key.includes('fname')) {
                        var index = key.replace('fname', '').replace('.', '');
                        $('#fnameerror' + index).html('<strong style="color:red">' + value[0] + '</strong>');
                    }

                    if (key.includes('lname')) {
                        var index = key.replace('lname', '').replace('.', '');
                        $('#lnameerror' + index).html('<strong style="color:red">' + value[0] + '</strong>');
                    }

                    if (key.includes('job_title')) {
                        var index = key.replace('job_title', '').replace('.', '');
                        $('#jobtitleerror' + index).html('<strong style="color:red">' + value[0] + '</strong>');
                    }
                });
            }

          }
        });
  });
</script>
@endsection