@extends('layouts.admin')

@section('content')

<div class="col-md-6 offset-md-3 bg-white shadow pb-3">
	<div class="title p-3 text-center"><h1>Edit Posts</h1></div>
	<hr>
	
	<div class="col-md-12 errors pt-1">
		@if(count($errors) > 0)
			@foreach($errors->all() as $err)
				<h6 class="alert alert-danger p-1 m-1"> {{$err}} </h6>
			@endforeach
		@endif
	</div>
	
</div>


@endsection