@extends('layouts.adminheader')
@section('content')
<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h5>Profile</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('adminindex')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="#!">Profile</a> </li>
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

<h5>Profile</h5>
</div>

<div class="card-block">
<form method="post" action="{{route('updateprofile')}}">
@csrf
<input type="hidden" name="id" value="{{$user->id}}">
<div class="form-group row">
<label class="col-sm-2 col-form-label">Name</label>
<div class="col-sm-10">
<input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{$user->name}}">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Email</label>
<div class="col-sm-10">
<input type="text" class="form-control" placeholder="Email" value="{{$user->email}}" readonly>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" name="password" placeholder="Password">
</div>
</div>

<div class="container row">
	<button class="btn btn-success btn-round waves-effect waves-light" type="submit">Submit</button>
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
</div>
@endsection