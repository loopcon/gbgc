@extends('layouts.header')
@section('title')
<title>GBGC - {{$staticpage->title}}</title>
@endsection
@section('content')
 <div class="faq-heading-section">
    <div class="container">
    	  <div class="faq-heading-worktextsection">
				<h3>{{$staticpage->title}}</h3>
          </div>
		{!!$staticpage->description!!}
	</div>
</div>
@endsection