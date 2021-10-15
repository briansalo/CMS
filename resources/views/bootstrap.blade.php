<!DOCTYPE html>
<html>
<head>
	<title></title>
<!-- bootstrap -->	
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!--select 2-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<script src="https://use.fontawesome.com/a2697fda3c.js"></script>

<script src="https://kit.fontawesome.com/5cffec2ddd.js" crossorigin="anonymous"></script>
<style>
.important-links a, .latest-post p{
	text-decoration: none;
	color: #626262;
}	
.important-links a img{
	width: 25px;
	margin-right: 5px;
}
.line{
	border-bottom: 2px solid #ccc;
}
.latest-post img{
	width: 100px;
	border-radius: 5px;
	margin-right: 15px;
}
.news-feed img{
	width:100%;
	height: 50%;
}
 .left{
height: 300px;
overflow-y: scroll;
position: sticky;
top: 0;   
 }
.avatar {
  vertical-align: middle;
  width: 60px;
  height: 60px;
  border-radius: 50%;
}
.write-post-area{
	border:0;
	outline: 0;
	border-bottom: 1px solid #ccc;
	resize: none;

}


.list-user-scroll{
height: 100px;
overflow-y: scroll;
position: sticky;
top: 0;   
 }

</style>
</head>
<body>

<div class="container-fluid" style="background: #efefef;">
	<nav class="navbar navbar-dark bg-primary mt-2 sticky-top" style=" height: 50px;">
		  <!-- Navbar content -->
	</nav>

	<div class="row">


		<!-- left sidebar-->
		<div class="col-md-3" style=" height: calc(100vh - 56px);
			  position: sticky; top: 50px;">
		
			<div class="important-links mt-2 ml-2">
				<div class="mb-4 mt-4 ms-5">
					<a href="{{ route('home')}}"><img src="/storage/download_home.png">Home</a>
				</div>
				<div class="mb-4 ms-5">
					 <a href="{{ route('profile')}}"><img src="/storage/download.png">Add Friend</a>
				</div>
				<div class="mb-4 ms-5">
					<a href="#"><img src="/storage/download.png">Friend Request  
				</div>
				<div class="mb-4 ms-5">
					<a href="{{ route('list-of-user')}}"><img src="/storage/download.png">Friend List</a>
				</div>
				<div class="line ms-5">
				</div>
				<div class="ms-5 mt-4">
					Your Latest Post
				</div>
			</div><!--close important links -->

 		@for($i=0; $i<3; $i++)
			<div class="latest-post d-flex mb-2">
						
				<div class="ps-5">
					<img src="/storage/Koala.jpg">
				</div>	
				<div>
				  <div class="pt-4" style="font-size: 13px;">Date of Post: 2021-10-11</div>
				  <div>Likes123:</div>
				</div>

			</div><!-- close latest post-->
		@endfor	

		</div><!--md-3 left-side-bar--->









			<!-- main content-->
		<div class="col-md-6">
			 @yield('content')

		</div><!--col-md-6main content-->









			<!-- right sidebar -->
		<div class="col-md-3" style="height: calc(100vh - 56px);
			  position: sticky; top: 50px;">
			<div class="new-register mx-2" style="background-color: white;"> 
			  	<div class="mt-4 ps-5" style="font-family: Times New Roman; font-size: 25px;">
			  		New User
			  	</div>
			  @for($i=0; $i<2; $i++)	
				<div class="mb-2" style="background-color: white;">
					<img src="/storage/Koala.jpg" class="rounded-circle" style=" background: white; width: 20%; height: 50px;">Christian Salo
				</div>	
			  @endfor	
            </div><!--new register-->

            <div class="all-user pt-5 ps-2">
			  	<div class="mt-2 ps-5" style="font-family: Times New Roman; font-size: 25px;">
			  		All User
			  	</div>

			  	<div class="list-user-scroll" style="height: calc(55vh - 56px);
			  		position: sticky; top: 50px;">
	
			  @for($i=0; $i<10; $i++)
				<div class="mb-2" style="background-color: white">
					<img src="/storage/Koala.jpg" class="rounded-circle" style=" background: white; width: 20%; height: 50px;">Christian Salo1
				</div>	
			 @endfor
				</div>

			</div><!--all-user-->

		</div><!--col=md-3 right side bar-->	



				
		</div><!-- row-->

	</div>	<!-- container-->

<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();

//for upload image
			$('#image').change(function(e){
				var reader = new FileReader();
				reader.onload = function(e){
					$('#showimage').attr('src',e.target.result);
				}
				reader.readAsDataURL(e.target.files['0']);
				
			});

//for emoji
      function formatText (icon) {
    return $('<span><i class="fas ' + $(icon.element).data('icon') + '"></i> ' + icon.text + '</span>');
};

$('#js-example-basic-single').select2({
    width: "100%",
    templateSelection: formatText,
    templateResult: formatText
});
});
</script>
<script>
$("#select").change(function() {
		// if the selected is monthly fee
   var test = $(this).val()
   console.log(test)
});
</script>
</body>
</html>