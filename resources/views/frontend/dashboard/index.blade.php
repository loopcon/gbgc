@extends('layouts.header')
@section('title')
<title>GBGC - Dashboard</title>
@endsection
@section('content')
<div class="profile-user-breadcrumbs">
    <div>
        <h1 class="profile-heading">
            {{ "Dashboard" }}
        </h1>
    </div>
    <div>
        <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li><i class="fa-solid fa-chevron-right"></i></li>
            <li class="profile-breadcrumbs-active">{{ "Dashboard"}}</li>
        </ul>
    </div>
</div>

<div class="profile-section-main">
    <div >
        <div class="row m-0">
            <div class="col-12" id="message">
                @if ($message = Session::get('success'))
                    <div class="alert text-success alert-dismissible fade show" style="background-white;border-color:green;"  id="success-alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show"  id="danger-alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center m-0">
            @include('frontend.dashboard.sidebar')
            <div class="col-12 col-md-8 col-lg-9 ">
                <h3>Hello !! {{$customer->name}}</h3> 
                @if($customer->access_type!="paid"  && $customer->access_type!="additionaluser"  && $customer->access_type!="requestforadditional")
                <a href="javascript:void(0)"  class="free-access-btn freetoproacess" style="width:15%">  Free to Pro</a>
                @endif

                @if($customer->remain_payment_additional_user > 0)
                <a href="javascript:void(0)"  class=" btn text-light additionaluser" style="background:#4099ff">Add Additional User</a>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Free to Pro Access-->
<div class="modal fade" id="freetopromodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Free To Pro</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                        <div class="col-12 col-md-4 ">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-user"></i></span>
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{$customer->name}}">
                                            </div>
                                            <div id="nameerror"></div>
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-envelope"></i></span>
                                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{$customer->email}}" readonly> 
                                            </div>
                                            <div id="emailerror"></div>
                                        </div> 

                                        <div class="col-12 col-md-4" >
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                                                <input  class="form-control" maxlength="10"  type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Phone Number" id="phone" name="phone" value="{{$customer->phone}}" readonly>
                                            </div> 
                                            <div id="phoneerror"></div>  
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                    
                                        <div class="col-12 col-md-6">
                                            <div class="input-group ">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen-nib"></i></span>
                                                <input type="text" id="job_title" name="job_title"  class="form-control" placeholder="Job Title" value="{{$customer->job_title}}">
                                            </div>
                                            <div id="jobtitleerror"></div>
                                        </div>
                                     
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-pen"></i></span>
                                                <input type="text" id="bussiness_name" name="bussiness_name" class="form-control" placeholder="Business Name" value="{{$customer->bussiness_name}}"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12 col-md-12">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-circle-info"></i></span>
                                                <input class="form-control" placeholder="If Your Business is Part of a Wider Group Please let us  Know" class="form-control" name="business_wider_group" value="{{$customer->business_wider_group}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12 col-md-12">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-location-dot"></i></span>
                                                <textarea class="form-control" placeholder="Biling Address" class="form-control" name="billing_address" placeholder="Biling Address">{{$customer->billing_address}}</textarea> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                           <div class="col-12 col-md-12">
                                            <div class="input-group ">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-users"></i></span>
                                                <input type="text" id="additional_user_no" name="additional_user_no"  class="form-control" placeholder="Number of Additional User" value="" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                            </div>
                                            <div id="jobtitleerror"></div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12 col-md-12">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-file"></i></span>
                                                <textarea class="form-control"class="form-control" name="additional_details" placeholder="Is there is Anything You Require Additional on Your Invoice"></textarea> 
                                            </div>
                                        </div>
                                    </div>

                                    <div id="errormsg"></div>
                                    <div id="successmsg"></div>
                                    <button type="button" class="login-form-signin register-btn" id="save_freetopro">Submit</button>
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
                <h5>Additional User</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-user"></i></span>
                                            <input type="text" id="name{{$i}}" name="name[]" class="form-control" placeholder="Name">
                                        </div>
                                        <div id="nameerror{{$i}}"></div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="input-group ">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen-nib"></i></span>
                                            <input type="text" id="job_title{{$i}}" name="job_title[]" class="form-control" placeholder="Job Title">
                                        </div>
                                        <div id="jobtitleerror{{$i}}"></div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12 col-md-6" >
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                                            <input class="form-control" maxlength="10" type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Phone Number" id="phone{{$i}}" name="phone[]">
                                        </div> 
                                        <div id="phoneerror{{$i}}"></div>  
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-envelope"></i></span>
                                            <input type="text" id="additonalemail{{$i}}" name="email[]" class="form-control" placeholder="Email">
                                        </div>
                                        <div id="emailerror{{$i}}"></div>
                                    </div>
                                </div>
                                @endfor

                                <div id="emailerror{{$i}}" data-index="{{$i}}"></div>

                                <button type="button" class="login-form-signin register-btn saveadditional" id="saveadditional">Submit</button>
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
<!--Additional User -->

<!-- End Additional User -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('script')
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
                $('#nameerrorshow, #jobtitleerrorshow, #emailerrorshow, #phoneerrorshow').hide();
                if(data.errors)
                {
                    if(data.errors.name){$('#nameerror').html('<strong id="nameerrorshow" style="color:red">'+ data.errors.name + '</strong>');}
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

                    if (key.includes('name')) {
                        var index = key.replace('name', '').replace('.', '');
                        $('#nameerror' + index).html('<strong style="color:red">' + value[0] + '</strong>');
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