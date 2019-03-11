@extends('layouts.admin')

@section('content')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" />
@endsection

<div class="col-md-12 bg-white shadow">
	<div class="title p-3 text-center"><h1>All medias</h1></div>
	
	{!! Form::open(['action'=>'AdminMediaController@store','method'=>'post','files'=>'true','class'=>'dropzone'])!!}

	{!! Form::close() !!}

</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@endsection