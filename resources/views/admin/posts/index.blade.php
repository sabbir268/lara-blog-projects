@extends('layouts.admin')

@section('content')

<div class="col-md-12 bg-white shadow">
	<div class="title p-3 text-center"><h1>All Posts</h1></div>
	<div class="table table-responsive">
		@if(session('message'))
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			{{session('message')}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif
		<table class="table table-bordered" id="dataTable">
			<thead>
				<tr>
					<th>Id</th>
					<th>Thumb</th>
					<th>Title</th>
					<th>Category</th>
					<th>Description</th>
					<th>Created</th>
					<th>Updated</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				@if($posts)
				@foreach($posts as $post)
				<tr>
					<th>{{$post->id}} </th>
					<th> <img height="50" width="80" src="{{$post->photo->file}}" alt="image"> </th>
					<th>{{str_limit($post->title,20)}}</th>
					<th>{{$post->category ? $post->category->name : 'Uncategorise'}} </th>
					<th>{{str_limit($post->body,50)}} </th>
					<th>{{$post->created_at->diffForHumans()}} </th>
					<th>{{$post->updated_at->diffForHumans()}} </th>
					<th><div class="btn-group"><button class="btn btn-success rounded-0"><a class="text-white" href="/admin/posts/{{$post->id}}/edit"><i class="fa fa-edit"></i></a></button>
						
						{!! Form::open(['action'=>['AdminPostController@destroy',$post->id],'method'=>'delete'])  !!} 
						{{-- {!!Form::submit('<i class="fa fa-trash"></i>')!!} --}}
						<button type="submit"  class="btn btn-danger rounded-0"><i class="fa fa-trash"></i></button>
						{!!Form::close()!!}
						

					</div></th>
				</tr>
				@endforeach
				@endif
			</tbody>

		</table>
	</div>
</div>

@endsection