@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
	<a href="{{ route('categories.create')}}" class="btn btn-success">Add Category</a>
</div>
	<div class="card card-default">
		<div class="card-header">Categories</div>
			<div class="card-body">
				@if($data->count() >0)
				<table class="table">
					<thead>
						<th>Name</th>
						<th>POST COUNT</th>
					</thead>

					<tbody>
						@foreach ($data as $index)
							<tr>
								<td>
								{{$index->name}}
								</td>
								<td>
<!-- (OPEN) ang "posts" mao neng function sa category model so in short g ehap niya ang kung pila ka bo-ok posts sa kana nga category which is variable kay kanang index-->
								{{$index->posts->count()}} 
								<!-- CLOSE -->
								</td>
								<td>
									
								</td>
								<td>
									<button class="btn btn-danger ml-2 float-right" onclick="handleDelete({{$index->id}})">Delete</button>
									<a href="{{ route('categories.edit', $index->id)}}" class="btn btn-info  float-right">Edit</a>
								</td>
							</tr>	
						@endforeach
					</tbody>
				</table>
				@else
					<h1 class="text-center">No Category Yet</h1>
				@endif
					<form action="" method="POST" id="deleteCategoryForm">
					@method('DELETE')
					@csrf
						<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        Are you sure you want to delete this?
						      </div>
						      <div class="modal-footer">
						      	
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
						        <button type="submit" class="btn btn-danger">Yes</button>
						      </div>
						    </div>
						  </div>
						</div>
					</form>
			</div>
		</div>	
@endsection

@section('scripts')
<script>
	function handleDelete(id){

	
	var form = document.getElementById('deleteCategoryForm')

	form.action = '/categories/' + id

	//console.log('deleting', form)// aron ma check kung unsay sulod sa form


	$('#deleteModal').modal('show')

	}
</script>


@endsection