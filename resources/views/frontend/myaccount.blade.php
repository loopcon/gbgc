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
                                <label for="first_name">First name</label>
                                <input  class="form-control"  type="text" id="first_name" name="first_name" value="{{$customer_detail->first_name}}"> 
                            </div>
                            <div class="name-input">
                                <label for="last_name">Last name</label>
                                <input  class="form-control"  type="text" id="last_name" name="last_name" value="{{$customer_detail->last_name}}"> 
                            </div>
                            <div class="name-input">
                                <label for="email">Email</label>
                                <input  class="form-control" type="text" id="email" name="email" value="{{$customer_detail->email}}"> 
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