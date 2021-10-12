@extends('layouts.app')

@section('content')
	<div class="card card-default">
		<div class="card-header">
		</div>
			<div class="card-body">
				@if($users->count() >0) 
				<table class="table">
					<thead>
						<th>Name</th>
						<th>Email</th>
					</thead>

					<tbody>
						@foreach ($users as $data)
	  						@if(Auth::user()->id==$data->id)
							@else
							<tr>
								<td>		
									{{$data->name}}
								</td>
								<td>
									{{$data->email}}
								</td>	
								<td>
									@if(!$data->isadmin() and !$data->superAdmin())
									<form action="users/{{$data->id}}/make_admin" method="POST">
										@csrf
										<button type="submit" class="btn btn-success btn-sm">
											Make admin
										</button>
									</form>
									@elseif($data->superAdmin())
									super admin
									@elseif(Auth::user()->superAdmin())
									<form action="users/{{$data->id}}/make_user" method="POST">
										@csrf
										<button type="submit" class="btn btn-success btn-sm">
											Make user
										</button>
									</form>
									@elseif($data->isAdmin())
									admin
									@endif	
								</td>
							</tr>
							@endif	
						@endforeach
					</tbody>
				</table>
				@else
					<h1 class="text-center">No Users Yet</h1>
				@endif
			</div>
		</div>	
@endsection
