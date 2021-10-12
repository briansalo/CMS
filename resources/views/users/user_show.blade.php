@extends('layouts.app')

@section('content')
	  	@foreach($user as $index)
		<div class="card">
			  <div class="card-header">
			  	<div class="row">
			  		<div class="col-3">
				  		<div><img src="/storage/{{$index->image}}" alt="" width="150px" height="150px" class="rounded-circle">
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
		<br>	
  	   @endforeach 
		<H1>All POST:</H1>
	  @if($data->count() >0) 
	  	@foreach($data as $index)
		<div class="card">
			  <div class="card-header">
			  	<div class="d-flex bd-highlight">	
			    	@if(Auth::user()->id==$index->user_id)
			    	<div class="ml-auto p-2 bd-highlight">	
				    	<a href="{{ route('posts.edit', $index->id)}}" class="btn btn-primary btn-block">
							Edit</a>
				    </div>
			    	<div class="p-2">	
				    	<button class="btn btn-danger btn-block">Delete</button>
				    </div>
				    @endif
				</div>
			  </div>

			  <div class="card-body">
				  	<div class="row">
				  		<div class="col-3">
				  			<div class="text-center"><h6>{{$index->category->name}}</h6>
				  			</div>
					  			<div class="d-flex">
								    @foreach($index->tags as $tag)
									    <div><h5><span class="badge badge-secondary mr-1">
									    	{{$tag->name}}</span></h5>
									    </div>
								    @endforeach
								 </div>  
				  			<img src="/storage/{{$index->image}}" alt="" class="img-thumbnail">
				  		</div>		
					  		<div class="col-9">	
					  			<div class="d-flex">
							    	<div class="pr-3">
							    		<strong><h3>{{$index->title}}</h3></strong>
							    	</div>
							    </div>
							    <div>
							    	{!!$index->content!!}	
								</div>
								<div><br>
		                        	<strong>Published at:</strong> {{$index->created_at}}
								</div>
								<div>
									<strong>Updated at:</strong> {{$index->updated_at}}
								</div>
							</div>	
			 	 </div>
			</div>
		</div>
		<br>

  	    @endforeach
  	   @else
  	   	 no post yet
	  @endif  

@endsection 

