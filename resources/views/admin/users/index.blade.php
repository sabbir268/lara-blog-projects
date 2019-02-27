@extends('layouts.admin')

@section('content')

<div class="col-md-12 bg-white shadow">
	<div class="title p-3 text-center"><h1>Users</h1></div>
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
					<th>Name</th>
					<th>Email</th>
					<th>Role</th>
					<th>Status</th>
					<th>Created</th>
					<th>Updated</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				@if($users)
				@foreach($users as $user)
				<tr>
					<th>{{$user->name}} </th>
					<th>{{$user->email}} </th>
					<th>{{$user->role->name}} </th>
					<th>{{$user->is_active == 1 ? 'Active' : 'Not Active'}} </th>
					<th>{{$user->created_at->diffForHumans()}} </th>
					<th>{{$user->updated_at->diffForHumans()}} </th>
					<th><div class="btn-group"><button class="btn btn-success rounded-0"><a class="text-white" href="/admin/users/{{$user->id}}/edit"><i class="fa fa-edit"></i></a></button>
						
						{!! Form::open(['action'=>['AdminUserController@destroy',$user->id],'method'=>'delete'])  !!} 
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