@extends('layouts.app')

@section('content')

<h1 class="text-center ">Edit Category</h1>
		<div class="card card-default">
			<div class="card-header">Category</div>
			<div class="card-body">
			@if($errors->any())
				<div class="alert alert-danger">
					<ul class="list-group">
						@foreach($errors->all() as $error)
						<li class="list-group-item text-danger">
							{{$error}}
						</li>
						@endforeach
					</ul>
				</div>
			@endif
			
			<form action="{{ route('categories.update', $category->id)}}" method="POST">
				@csrf
				@method('PUT')
				<div class="form-group">
				<input type="text"class="form-control" value="{{$category->name}}" name="name">
				</div>
				<div class="form-group text-center">
				<button type="submit" class="btn btn-success">Save Todo</button>
				<a href="/categories" class="btn btn-secondary">Back</a>
				
				</div>
			</form>
			</div>
		</div>
	</div>
</div>


@endsection 