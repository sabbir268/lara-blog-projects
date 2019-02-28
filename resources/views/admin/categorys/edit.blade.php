@extends('layouts.admin')

@section('content')

<div class="col-md-6 offset-md-3 bg-white shadow">
	<div class="title p-3 text-center"><h1>Edit categorys</h1></div>
	{!! Form::model($category,['action'=>['AdminCategoryController@update',$category->id],'method'=>'patch']) !!}
	<div class="form-gorup">
		{!! Form::label('name', 'Category Name', ['class'=>'label']) !!}
		{!! Form::text('name',null,['class'=>'form-control']) !!}
	</div>

	<div class="form-gorup pt-1">
		{!! Form::submit('Save Change!', ['class'=>'btn btn-success mb-3']) !!}
	</div>

	{!! Form::close() !!}

</div>

@endsection