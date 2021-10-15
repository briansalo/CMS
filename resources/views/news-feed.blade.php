@extends('bootstrap')

@section('content')	

			<div class="write-post d-flex mt-4 rounded-2" style="background: white;" >	

				<div class="write-post-left-side ps-3 pt-2" >
					<img src="/storage/Koala.jpg" class="avatar">
				</div><!--write-post-left-side-bar-->							

				<div class="write-post-right-side ps-2 pt-2">
					<div>
						<textarea rows="3" cols="65" value="123" class="write-post-area">What's on your mind?....12asdsdsd
					    </textarea> 
			    	</div>

			    	<div class="d-flex" style="width: 500px;">
			    		<div style="width:100px;">
							<select class="" id="js-example-basic-single" >
							   <option selected>Feeling</option>
							   <option value="far fa-smile" data-icon="far fa-smile">
							   happy</option>
							   <option value="far fa-angry" data-icon="far fa-angry">
							   angry</option>
							</select>	
						</div>

						<div style="padding-left: 50px;" >
				    		<label class="btn btn-light">
				    		    <i class="fas fa-images"></i>
				    		     Photo<input type="file" id="image"hidden>
				    		</label>
			
			    			<img src="" id="showimage"style="width: 50px">
			    		</div>

			    		<div class="ms-5">
							<select class="form-select form-select-sm" id="select" style="width: 120px;">
								  <option selected value="0">Public</option>
								  <option value="1">Only Friend</option>
								  <option value="2">Only Me</option>
							</select>
			    		</div>	
			    	</div><!--d flex--->	
			   

			    	<div style="padding-top: 10px;">
			    		<i class="fas fa-users me-2"></i>Tag Friends:
			    	</div>	
			    	<div>

						<select class="js-example-basic-multiple" name="states[]" multiple="multiple" style=" width: 300px;">
							  <option value="AL">Brian</option>
							  <option value="WY" class="far fa-angry"><i class="far fa-angry"></i></option>
							  <option value="AL">Christian</option>
							  <option value="WY">frans</option>
							   <option data-content="<i class='fa fa-calculator' aria-hidden='true'></i>Option2"></option>
						</select>
					</div>
			    	<div class="pb-2 pt-2">
			    		<button type="button" class="btn btn-primary btn-sm">Post</button>
			    	</div>	

				</div><!--write-post-right-side-->
			</div><!--write-post-->


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