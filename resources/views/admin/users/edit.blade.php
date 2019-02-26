@extends('layouts.admin')

@section('content')

<div class="col-md-6 offset-md-3 bg-white shadow pb-3">
	<div class="title p-3 text-center"><h1>Edit Users</h1></div>
	<hr>
	<div class="col-md-12">
		<div class="form-gorup text-center ">
			<img height="120" width="120" src="{{$user->photo ? $user->photo->file : 'http://' }} " alt="" class="img-responsive rounded">
		</div>

		{!! Form::model($user,['action'=>['AdminUserController@update',$user->id],'method'=>'patch', 'files'=>'true']) !!}

		<div class="form-gorup">
			{!! Form::label('name', 'User Name', ['class'=>'label']) !!}
			{!! Form::text('name',null,['class'=>'form-control']) !!}
		</div>

		<div class="form-gorup">
			{!! Form::label('email', 'User Email', ['class'=>'label']) !!}
			{!! Form::email('email',null,['class'=>'form-control']) !!}
		</div>

		<div class="form-gorup">
			{!! Form::label('role_id', 'User Role', ['class'=>'label']) !!}
			{!! Form::select('role_id',[''=>'Chose a role'] + $roles, null,['class'=>'form-control']) !!}
		</div>

		<div class="form-gorup">
			{!! Form::label('is_active', 'User Status', ['class'=>'label']) !!}
			{!! Form::select('is_active',[ 1 => 'Active', 0 => 'Not Active'],null,['class'=>'form-control']) !!}
		</div>

		<div class="form-gorup mt-2">
			{!! Form::label('photo', 'User Picture', ['class'=>'label']) !!}
			{!! Form::file('photo',null,['class'=>'form-control']) !!}
		</div>

		<div class="form-gorup">
			{!! Form::label('password', 'Password', ['class'=>'label']) !!}
			{!! Form::password('password',['class'=>'form-control']) !!}
		</div>
		<div class="form-gorup pt-1">
			{!! Form::submit('Submit', ['class'=>'btn btn-success']) !!}
		</div>
		{!! Form::close() !!}
	</div>

	<div class="col-md-12 errors pt-1">
		@if(count($errors) > 0)
			@foreach($errors->all() as $err)
				<h6 class="alert alert-danger p-1 m-1"> {{$err}} </h6>
			@endforeach
		@endif
	</div>
	
</div>


@endsection