@extends('layouts.header')
@section('title')
<title>GBGC</title>
@endsection
@section('content')
<div class="thank-youbox">
    <div class="thank-youtext">
        <h5>THANK YOU FOR CONNECT WITH GBGC</h5>
        <p>Thank you, Your payment request has been received. We will issue your invoice and send it to you shortly.</p>
        <a href="{{route('index')}}" class="thank-go-backbtn"> GO BACK </a>
    </div>
</div>
@endsection