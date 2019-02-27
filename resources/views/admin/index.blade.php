@extends('layouts.admin')

@section('content')

<div class="col-md-12">
	<div class="table table-responsive">
		<table class="table table striped" id="dataTable">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Role</th>
					<th>Status</th>
					<th>Created</th>
					<th>Updated</th>
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
				</tr>
				@endforeach
				@endif
			</tbody>

		</table>
	</div>
</div>

@endsection