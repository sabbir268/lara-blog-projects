@extends('layouts.admin')

@section('content')

<div class="col-md-12 bg-white shadow">
	<div class="title p-3 text-center"><h1>All medias</h1></div>

	<a href="/admin/medias/create" class="btn btn-link">Upload New</a>
	
	@if(session('message'))
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		{{session('message')}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif
	<div class="col-md-12">
		<div class="table table-responsive">
			<table class="table table-sm text-center table-bordered" id="dataTable">
				<thead>
					<tr>
						<th>Id</th>
						<th>Image</th>
						<th>Created</th>
						<th>Updated</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					@if($medias)
					@foreach($medias as $media)
					<tr>
						<th>{{$media->id}} </th>
						<th> <img style="height: 80px;width: 100px" src="{{$media->file}}" alt="No Images">  </th>
						<th>{{$media->created_at->diffForHumans()}} </th>
						<th>{{$media->updated_at->diffForHumans()}} </th>
						<th><div class="btn-group">

							{!! Form::open(['action'=>['AdminMediaController@destroy',$media->id],'method'=>'delete'])  !!} 
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
</div>

@endsection