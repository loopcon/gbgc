@extends('layouts.header')
@section('content')
<!-- get  in touch  start  -->
      <div class="container">
        <div class="get-in-touchsection">
            <div class="grid-get-in-touch row">
                <div class="row">
                    <div class="col-12">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-dismissible" role="alert" style="border-color:#00ace0;color:#00ace0">
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
                <div class="col-12">
                    <h2 class="get-in-touchtext">Profile</h2>
                    <h5>Hi,{{$customer_detail->first_name}} here you can see your account details.</h5>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                    <div>
                        <form method="post" action="{{route('updatemyaccount')}}">
                        @csrf
                            <input type="hidden" name="id" value="{{$customer_detail->id}}">
                            <div class="name-input">
                                <label for="name">Name</label>
                                <input  class="form-control"  type="text" id="name" name="name" value="{{$customer_detail->name}}"> 
                            </div>
                            <div class="name-input">
                                <label for="email">Email</label>
                                <input  class="form-control" type="text" id="email" name="email" value="{{$customer_detail->email}}"> 
                            </div>
                            <div class="name-input">
                                <label for="phone">Phone number</label>
                                <input  class="form-control" maxlength="10"  type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="PHONE NUMBER" id="phone" name="phone" value="{{$customer_detail->phone}}"> 
                            </div>
                            <div class="name-input">
                                <label for="job_title">Job Title</label>
                                <input  class="form-control"  type="text" id="job_title" name="job_title" value="{{$customer_detail->job_title}}"> 
                            </div>
                            <div class="name-input">
                                <label for="bussiness_name">Bussiness Name</label>
                                <input  class="form-control"  type="text" id="bussiness_name" name="bussiness_name" value="{{$customer_detail->bussiness_name}}"> 
                            </div>
                            <div class="name-input">
                                <label for="bussiness_size">Bussiness Size</label>
                                <select id="bussiness_size" class="form-control select2" name="bussiness_size" required="">
                                    <option value="0">--Select Bussiness Size--</option>
                                    <option value="small" @if((isset($customer_detail->bussiness_size) && $customer_detail->bussiness_size=="small")) selected="selected" @endif>small</option>
                                    <option value="medium" @if((isset($customer_detail->bussiness_size) && $customer_detail->bussiness_size=="medium")) selected="selected" @endif>Medium-sized</option>
                                    <option value="large" @if((isset($customer_detail->bussiness_size) && $customer_detail->bussiness_size=="large")) selected="selected" @endif>Large</option>
                                </select> 
                            </div>
                            <button class="get-request-btn">Update profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- get in  touch  end -->
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $(document).on('click', '.close', function() {
            var href = $(this).data('href');
            swal({
                closeOnConfirm: true
            },
            function(){
                location.href = href;
            });
        });
    });
</script>
@endsection