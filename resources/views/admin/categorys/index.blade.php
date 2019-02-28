@extends('layouts.admin')

@section('content')

<div class="col-md-12 bg-white shadow">
	<div class="title p-3 text-center"><h1>All categorys</h1></div>
	
	@if(session('message'))
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		{{session('message')}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif
	<div class="row">
		<div class="col-md-4">
			{!! Form::open(['url'=>'/admin/categorys','method'=>'post']) !!}
			<div class="form-gorup">
				{!! Form::label('name', 'Category Name', ['class'=>'label']) !!}
				{!! Form::text('name',null,['class'=>'form-control']) !!}
			</div>

			<div class="form-gorup pt-1">
				{!! Form::submit('Publish!', ['class'=>'btn btn-success']) !!}
			</div>

			{!! Form::close() !!}
		</div>

		<div class="col-md-8">
			<div class="table table-responsive">
				<table class="table table-sm text-center table-bordered" id="dataTable">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Created</th>
							<th>Updated</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						@if($categorys)
						@foreach($categorys as $category)
						<tr>
							<th>{{$category->id}} </th>
							<th>{{$category->name}} </th>
							<th>{{$category->created_at->diffForHumans()}} </th>
							<th>{{$category->updated_at->diffForHumans()}} </th>
							<th><div class="btn-group"><button class="btn btn-success rounded-0"><a class="text-white" href="/admin/categorys/{{$category->id}}/edit"><i class="fa fa-edit"></i></a></button>

								{!! Form::open(['action'=>['AdminCategoryController@destroy',$category->id],'method'=>'delete'])  !!} 
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
</div>

@endsection