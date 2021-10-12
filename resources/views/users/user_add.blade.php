@extends('layouts.app')

@section('content')
	@if($data->count()>0)
	
	  	@foreach($data as $index)
	  	<!--- condition ne siya aron dili na mo gawas sa listahan sa mga user ang current user--->
	  	@if(Auth::user()->id==$index->id)
		@else	
		<div class="card mt-5">
			  <div class="card-header">
			  	<div class="row">
			  		<div class="col-3">
				  		<div><img src="/storage/{{$index->image}}" alt="" width="150px" height="150px" class="rounded-circle">
				  		</div>
				  		<div class="pt-2 pr-4">
				  		<a href="add_friend/{{$index->id}}" class="btn btn-info  float-right">
				  			Add Friend</a>
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

		@endif
  		@endforeach

 	  	@foreach($data2 as $index1)
	  	@if(Auth::user()->id==$index1->id)
		@else	
		<div class="card mt-5">
			  <div class="card-header">
			  	<div class="row">
			  		<div class="col-3">
				  		<div><img src="/storage/{{$index1->image}}" alt="" width="150px" height="150px" class="rounded-circle">
				  		</div>
				  		<div class="pt-2 pr-4">
				  		<a href="cancel_friend_request/{{$index1->id}}" class="btn btn-danger  float-right">
				  			Cancel Friend Request</a>
				  		</div>	
			  		</div>
			  		<div class="col-9">
			  			<div>
			  				<h1><strong>{{$index1->name}}</strong></h1>
			  			</div>
			  			<div>
			  				<p>{{$index1->about}}</p>
			  			</div>	
			  			<div class="d-flex">
			  				<div class="pr-2">Friends:</div>
			  				<div>{{$index1->friends->count()}}</div>		  				
			  			</div>
			  			<div class="d-flex">
			  				<div class="pr-2">Post:</div>
			  				<div>{{$index1->posts->count()}}</div>		  				
			  			</div>	
			  		</div>	
			  </div>
		</div>
		</div>
		
		@endif
  		@endforeach
  	 
  	 @else
  	 		<div class="card mt-5">
				  <div class="card-header">
				  </div>
				  <div class="card-body">
				  As of the moment there's no user to add
				  </div>
			</div>	  

  	 @endif
@endsection

