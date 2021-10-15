@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2 mt-5">
	<!-- checking if what route -->
	@if(\Request::is('posts')) 
	<a href="{{ route('posts.create')}}" class="btn btn-success">Add Post</a>
	@endif
	<!-- checking if what route -->
</div>
	<div class="card card-default">
		<div class="card-header">
			@if(\Request::is('all_posts')) 
				ALL POST
			@Else
				All Trashed	
			@endif	
		</div>
			<div class="card-body">
				@if($data->count() >0) 
				<table class="table">
					<thead>
						<th>Image</th>
						<th>User</th>
						<th>Category</th>
						<th>Tag</th>
						<th></th>
					</thead>

					<tbody>

						@foreach ($data as $index )
					
							<tr>
								<td>
								<img src="/storage/{{$index->image}}" alt="" width="50px" height="50px">
								</td>
								<td>
								{{$index->user->name}}

								</td>

								<td>
<!-- (OPEN) sa kane nga post which is ang variable nga g assign kay ang index then g tawag kung unsay pangalan sa category ana nga post. then mabuhat rane siya kay ang post belongs to one category so ma direct natog tawag kung unsay name sa category kay sa isa ka post isa raman ka cateegory NOTE kanang "category" gikan na siya sa imong function sa model -->			
								{{$index->category->name}}
								<!-- CLOSE-->
								</td>
								<td>
<!-- (OPEN) ang "index" mao ney ang post then ang "tags" mao nay name sa function sa model. so in short g kuha ang tanan tags nga gikan ana nga post. then nag for loop otro ko kay many to many mani sila kay every post daghan may tag so aron ma gawas tanan tag sa kana nga post -->									
									@foreach($index->tags as $tag)
										<button class="btn btn-lg btn-primary btn-sm pr-1">
											{{$tag->name}}
										</button> 
									@endforeach	
									<!-- CLOSE-->

								</td>	
								<td>
								@if(auth()->user()->superAdmin() or auth()->user()->isAdmin())	
									<form action="{{ route('posts.destroy', $index->id)}}" method="POST">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger ml-2 mt-1 float-right btn-sm">
										{{$index->trashed()? 'DELETE':'TRASH'}}
										</button>
									</form>
									@if($index->trashed())
									<a href="restore_posts/{{$index->id}}" class="btn btn-info  float-right mt-1 btn-sm">Restore</a>
									@endif
								@endif	
								</td>
							</tr>	
						@endforeach
					</tbody>
				</table>
				@else
					<h1 class="text-center">No Post Yet</h1>
				@endif
			</div>
		</div>	
@endsection

@section('scripts')

	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

	<script>

		$(document).ready(function() {
		    $('.tag-selector').select2();
		});
	</script>


@endsection

@section('css')

	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

@endsection