@extends('bootstrap')

@section('content')	

	@foreach($list->users as $index)
		<div class="profile-photo d-flex m-3"style="background-color: white">
			<div class="profile-photo-left d-flex m-2" style="width: 50%">
			<div class="" style="background-color: black">
				<img src="/storage/Koala.jpg"  style=" background: white; width: 100%; height:100px">
			</div>
			<div class=" ms-2" style="">
				<div style="font-size: 30px;">
				Brian Salo
				</div>
				<div>
					2 friends
				</div>	
				<div>
				@for($i=0; $i<3; $i++)
				<img src="/storage/Koala.jpg" class="rounded-circle" style="width: 30px; height:30px">
				@endfor
				</div>	

			</div>

			</div><!--profile photo lef-->	
	
			<div  class="profile-photo-right"style="width:50%">
				<div class="p-4" style="float: right;">
					<a class="btn btn-primary"><i class="fas fa-user-friends"></i>Add Friend</a>
				</div>	
			</div>	<!--profile-photo-right-->
		</div>	<!--profile-photo-->
	@endforeach
	
@endsection

 