@extends('layouts.app')

@section('content')
	<div class="card card-default">
		<div class="card-header">Create Post</div>
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
			<form action="{{ route('posts.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" id="title" class="form-control" name="title">
				</div>
				<div class="form-group">
					<label for="content">Content</label>
					<input id="content" type="hidden" name="content">
					<trix-editor input="content"></trix-editor>
				</div>
				<!-- 
				<div class="form-group">
					<label for="published_at">Published At</label>
					<input type="text" id="published_at" class="form-control" name="published_at">
				</div>
				 -->
				<div class="form-group ">
					<label for="image">Image</label>
					<input type="file" id="image" class="form-control" name="image">
				</div>
				<div class="form-group">
					<label for="category">About:</label>
					<select name="category" id="category" class="form-control">
						<option>---------</option>
						@foreach($categories as $category)
						<option value="{{$category->id}}">
							{{$category->name}}
						</option>
						@endforeach
					</select>
				</div>
				@if($tags->count() >0)
					<div class="form-group">
						<label for="tag">Feelings</label>
						<select name="tag[]" id="tag" class="form-control tag-selector" multiple>
							@foreach($tags as $tag)
							  <option value="{{$tag->id}}">
								{{$tag->name}}
							  </option>
							@endforeach
						</select>	
					</div>
				@endif	
				<div class="form-group">
					<button type="submit" class="btn btn-success">Create Post</button>
				</div>

			</form>

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