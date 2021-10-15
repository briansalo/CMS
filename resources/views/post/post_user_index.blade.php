@extends('layouts.app')

@section('content')
<style>
.container-img{
	background:red;


}
.body-image{
		width: 100%;
		border-radius: 6px;
		margin-bottom: 14px; 
}
</style>	
	<div class="d-flex justify-content-end mb-2 mt-5">
		@if(\Request::is('posts')) 
		<a href="{{ route('posts.create')}}" class="btn btn-success ">Add 1Post</a>
		@endif
	</div>

	  @if($data->count() >0) 
	  	@foreach($data as $index)
		<div class="card">
			  <div class="card-header">
			  	<div class="d-flex bd-highlight">
			  		<div><img src="/storage/{{$index->user->image}}" alt=""  width="50px" height="50px" class="rounded-circle">
			  		</div>
			    	<div class="pr-5"><h1><a href="{{ route('user_profile', $index->user->id)}}">
			    		{{$index->user->name}}</a></h1>
			    	</div>
			    	@if(Auth::user()->id==$index->user_id)
			    	<div class="ml-auto p-2 bd-highlight">	
				    	<a href="{{ route('posts.edit', $index->id)}}" class="btn btn-primary btn-block">
							Edit</a>
				    </div>
			    	<div class="p-2">	
				    	<button class="btn btn-danger btn-block" onclick="handleDelete({{$index->id}})">Delete</button>
				    </div>
				    @endif
				</div>
			  </div>
</div>
			  <div class="container-img">


							
				  					<img class="body-image" src="/storage/{{$index->image}}">
				  		
	

			</div>
		
		<br>	

  	    @endforeach
  	   @else
  	 		<div class="card mt-5">
				  <div class="card-header">
				  </div>
				  <div class="card-body">
				  	No Post Yet
				  </div>
			</div>	
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

@endsection

@section('scripts')
<script>
	function handleDelete(id){

	
	var form = document.getElementById('deleteCategoryForm')

	form.action = '/posts/' + id

	//console.log('deleting', form)// aron ma check kung unsay sulod sa form


	$('#deleteModal').modal('show')

	}
</script>