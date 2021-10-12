@extends('layouts.app')

@section('content')
	@if($list->users->count()>0)
	  	@foreach($list->users as $index)
		<div class="card">
			  <div class="card-header">
			  	<div class="row">
			  		<div class="col-3">
				  		<div><img src="/storage/{{$index->image}}" alt="" width="150px" height="150px" class="rounded-circle">
				  		</div>
				  		<div class="pt-3 pl-4">
				  		<a href="unfriend/{{$index->id}}" class="btn btn-danger">
				  			Unfriend</a>
				  		</div>	
			  		</div>
			  		<div class="col-9">
			  			<div>
			  				<h1><strong>{{$index->name}}</strong></h1>
			  			</div>
			  			<div>
			  				<p>{{$index->about}}</p>
			  			</div>	
			  			<div class="d-flex">
			  				<div class="pr-2">Friends:</div>
			  				<div>{{$index->friends->count()}}</div>		  				
			  			</div>
			  			<div class="d-flex">
			  				<div class="pr-2">Post:</div>
			  				<div>{{$index->posts->count()}}</div>		  				
			  			</div>	
			  		</div>	

			  </div>
		</div>
		</div>
		<br><br>	
  	   @endforeach 
  	 @else
  	 		<div class="card mt-5">
				  <div class="card-header">
				  </div>
				  <div class="card-body">
				  	No Friends Yet
				  </div>
			</div>	  

  	 @endif
@endsection

