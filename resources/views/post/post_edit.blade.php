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
			
			<form action="{{ route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" id="title" class="form-control" name="title" value="{{$post->title}}">
				</div>
				<div class="form-group">
					<label for="content">Content</label>
					<input id="content" type="hidden" name="content" value="{{$post->content}}">
					<trix-editor input="content"></trix-editor>
				</div>
				<!--
				<div class="form-group">
					<label for="published_at">Published At</label>
					<input type="text" id="published_at" class="form-control" name="published_at" value="{{$post->published_at}}">
				</div>
				-->
				<div class="form-group">
				<img src="/storage/{{$post->image}}" alt="" width="50px" height="50px">	
				<input type="file" id="image" class="form-control" name="image">
				</div>
				<div class="form-group">
					<label for="category">About</label>
					<select name="category" id="category" class="form-control">			
						@foreach($categories as $category)
						<!-- (open)code ne siya aron e show niya kung unsa nga category ang g pele sa user -->
						<option value="{{$category->id}}"
							@if($category->id == $post->category_id)
							 selected
							@endif

							>
							{{$category->name}}
							<!-- CLOSE -->
						</option>

						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="tag">Feelings</label>
					<select name="tag[]" id="tag" class="form-control tag-selector" multiple>
						@foreach($tags as $tag)
<!-- (open)"--1st--if(in_array($tag->id" if array daw ang sulod ana nga i.d --2nd--"$post->tags->toArray()" ang mga variable ana nag base sila sa model then pasabot ana g kuha tanan ang tag nga gikan sa post then g convert to array kay daghan biyay tag sa isa ka post. --3rd-- "pluck('id)" kay aron ang ipa gawas niya is ang array ra sa i.d. kay akung dili e pluck ang result ana kay array of array so dapat e pluck aron array sa i.d. ra  -->
						  <option value="{{$tag->id}}"
						  	@if(in_array($tag->id, $post->tags->pluck('id')->toArray()));
						  	selected 
						  	@endif
						  	>
						  	{{$tag->name}}
							<!-- CLOSE -->
						  </option>
						@endforeach
					</select>	
				</div>				
				<div class="form-group">
					<button type="submit" class="btn btn-success">
					{{isset($post) ?'Update Post' : 'CREATE POST'}}
					</button>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>


@endsection 

@section('scripts')
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

	<script>
		flatpickr('#published_at', {
			enableTime: true
		
		}) //e define nimo kung unsa i.d. ang e flatpicker niya then g enable ang time

		$(document).ready(function() {
		    $('.tag-selector').select2();
		});		
	</script>

@endsection

@section('css')

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">

	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

@endsection