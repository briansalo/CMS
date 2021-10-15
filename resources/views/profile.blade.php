@extends('bootstrap')

@section('content')	

		<div class="cover-photo">
		  <img src="/storage/cover.jpg" style="background: white; width: 100%; height: 230px;">
		</div><!--cover-photo-->

		<div class="profile-photo d-flex"style="background-color: white">
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

		 @for($i=0; $i<10; $i++)
			<div class="news-feed mt-3 rounded-2 line" style="background: white;">
				<div class="news-feed-header d-flex ps-3 pt-2">
					<div>
					<img src="/storage/Koala.jpg" class="rounded-circle" style=" background: white; width: 50px; height:50px">
					</div>
					<div>
						<div style="font-size: 20px; ">
						  Brian Salo -------- is feeling happy
						</div>
						<div class="d-flex"style="font-size: 10px;">
							<div>Public</div>							
							<div>
							   <i class="fas fa-sort-down ps-1 pe-1" ></i>
						        24 hours ago
						    </div>
						</div>
					</div>
				</div><!--news-feed-header-->

				<div class="news-feed-content ps-3 pe-3 ">
					<div class="text-content " >
				        How To Make A Website Like Facebook Using HTML And CSS | Social Media Website Design Step By Step 123
					</div>
					<div>
						<img src="/storage/Koala.jpg" style=" background: white; width: 100%; height: 300px;">
					</div>
					<div class="line pt-2 "></div>
					<div class="pt-2 pb-2">
						<a href="#"><i class="far fa-thumbs-up"></i> Like</a>
					</div>	
				</div><!--news-feed-content-->	
			</div><!--news-feed-->	
		@endfor


@endsection