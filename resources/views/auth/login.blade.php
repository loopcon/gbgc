<!DOCTYPE html>
<html lang="en">
<head>
<title>GBGC | Admin</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
<meta name="author" content="colorlib" />

<link rel="icon" href="../files/assets/images/favicon.ico" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/bootstrap/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('admin/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all"> <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/icon/feather/css/feather.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/icon/themify-icons/themify-icons.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/icon/icofont/css/icofont.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/icon/font-awesome/css/font-awesome.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/pages.css')}}">
</head>
<body themebg-pattern="theme1">

<div class="theme-loader">
<div class="loader-track">
<div class="preloader-wrapper">
<div class="spinner-layer spinner-blue">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
<div class="spinner-layer spinner-red">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
<div class="spinner-layer spinner-yellow">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
<div class="spinner-layer spinner-green">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
</div>
</div>
</div>

<section class="login-block">

<div class="container-fluid">
<div class="row">
<div class="col-sm-12">

<form class="md-float-material form-material" action="{{ route('login') }}" method="POST">
      @csrf
<div class="text-center">
<img src="{{asset('gbgc-logo.png')}}" alt="logo.png">
</div>
<div class="auth-box card">
<div class="card-block">
<div class="row m-b-20">
<div class="col-md-12">
<h3 class="text-center txt-primary">Sign In</h3>
</div>
</div>

<p class="text-muted text-center p-b-5">Sign in with your  account</p>
<div class="form-group form-primary">
<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
 @error('email')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
    </span>
@enderror
<span class="form-bar"></span>
<label class="float-label">Email</label>
</div>

<div class="form-group form-primary">
 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

@error('password')
   <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

<span class="form-bar"></span>
<label class="float-label">Password</label>
</div>

<div class="row m-t-30">
<div class="col-md-12">
<button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
</div>
</div>

</div>
</div>
</form>

</div>

</div>

</div>

</div>

</section>



<script type="text/javascript" src="{{asset('admin/bower_components/jquery/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/bower_components/popper.js/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>

<script src="{{asset('admin/assets/pages/waves/js/waves.min.js')}}"></script>

<script type="text/javascript" src="{{asset('admin/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>

<script type="text/javascript" src="{{asset('admin/bower_components/modernizr/js/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/bower_components/modernizr/js/css-scrollbars.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/js/common-pages.js')}}"></script>
</body>
</html>
