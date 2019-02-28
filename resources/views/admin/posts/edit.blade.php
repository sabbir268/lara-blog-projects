@extends('layouts.admin')

@section('content')

<div class="col-md-12  bg-white shadow pb-3">
	<div class="title p-3 text-center"><h1>Create Posts</h1></div>
	<hr>
	{!! Form::model($post,['action'=>['AdminPostController@update',$post->id],'method'=>'patch', 'files'=>'true']) !!}
	<div class="row">
		<div class="col-md-8">
			<div class="form-gorup">
				{!! Form::label('title', 'Post Title', ['class'=>'label']) !!}
				{!! Form::text('title',null,['class'=>'form-control']) !!}
			</div>

			<div class="form-gorup">
				{!! Form::label('body', 'Description', ['class'=>'label']) !!}
				{!! Form::textarea('body',null,['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-gorup">
				<div class="form-gorup mt-2">
					{!! Form::label('photo', 'Thumbnail Image', ['class'=>'label']) !!}
					{!! Form::file('photo',null,['class'=>'form-control']) !!}
					<img height="120" width="100%" src="{{$post->photo->file}} " alt="Image">
				</div>
			</div>

			<div class="form-gorup">
				{!! Form::label('category_id', 'Post Category', ['class'=>'label']) !!}
				{!! Form::select('category_id',[ '' => 'Chose a category']+$categorys,null,['class'=>'form-control']) !!}
			</div>

			<div class="form-gorup pt-1">
				{!! Form::submit('Publish!', ['class'=>'btn btn-success']) !!}
			</div>
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