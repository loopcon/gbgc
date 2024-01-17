@extends('layouts.adminheader')
@section('content')
<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-upload-cloud bg-c-blue"></i>
<div class="d-inline">
<h5>Website Logo</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="#"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="#!">WebSite Logo</a> </li>
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
<div class="row">
	<div class="col-12">
		@if ($message = Session::get('success'))
			<div class="alert alert-success alert-dismissible" role="alert">
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
<div class="card-header">

<h5>WebSite Logo</h5>
</div>

<div class="card-block">
<form method="post" action="{{route('websitelogoupdate')}}" enctype="multipart/form-data">
@csrf

<input type="hidden" name="id" value="{{$websitelogo->id}}">

<div class="form-group row">
<label class="col-sm-2 col-form-label">Logo Image</label>
<div class="col-sm-10">
<input type="file" class="form-control" placeholder="Enter Image" name="logo" >
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Favicon Image</label>
<div class="col-sm-10">
<input type="file" class="form-control" placeholder="Enter Favicon"  name="favicon">
</div>
</div>

<div class="container row">
	<button class="btn btn-success btn-round waves-effect waves-light" type="submit">Submit</button>
</div>

<div class="form-group row">
	<div class="col-sm-4">
		<div class="card-body"> 
			<img src="{{asset('uploads/settings/'.$websitelogo->logo)}}">
		</div>
	</div>

	<div class="col-sm-4">
		<div class="card-body"> 
			<img src="{{asset('uploads/settings/'.$websitelogo->favicon)}}">
		</div>
	</div>
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