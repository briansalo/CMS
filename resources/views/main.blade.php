<!DOCTYPE html>
<html>
<head>
	<title></title>
<style>
body{
	background: #efefef;
}
nav{
	display: flex;
	align-items: center;
	justify-content: space-between;
	background-color: #1876f2;
	padding: 5px 5%;
	position: sticky;
	top: 0;
	z-index: 100;
	height: 50px;

}
.container{
	display: flex;
	justify-content: space-between;
	padding: 13px 5%;
}
.left-sidebar{

	flex-basis: 25%;
	position: sticky;
	top: 70px;
	align-self: flex-start;
	
}
.right-sidebar{

	flex-basis: 25%;
	position: sticky;
	top: 70px;
	align-self: flex-start;
	background: #fff;
	border-radius: 4px;

}	
.main-content{
	flex-basis: 47%;
}
.important-links a, .latest-post a{
	text-decoration: none;
	display: flex;
	align-items: center;
	margin-bottom: 30px;
	color: #626262;
	width: fit-content;
}
.important-links a img{
	width: 25px;
	margin-right: 5px;
}
.line{
	border-bottom: 1px solid #ccc;
}
.latest-post a img{
	width: 100px;
	border-radius: 5px;
	margin-right: 15px;
}
.all-user {


	align-items: center;
	margin-bottom: 18px;
}

.all-user a img{
	border-radius: 50%;
	width: 50px;
	right: 0px;
}
.write-post{
	width: 100%;
	background: #fff;
	border-radius: 6px;
	padding: 20px;
	columns: #626262;
}
</style>
</head>
<body>
	<nav>
		<div class="nav-left">
			<SPAN>Social Media App</SPAN>

		</div>
		<div class="nav-right">
		</div>		
	</nav>

<div class="container">
	<!------------------ left side bar------------------>
	<div class="left-sidebar">
		<div class="important-links">
			<a href="#"><img src="/storage/download_home.png">Home</a>
			<a href="#"><img src="/storage/download.png">Add Friend</a>
			<a href="#"><img src="/storage/download.png">Friend Request</a>
			<a href="#"><img src="/storage/download.png">Friend List</a>
		</div>
		<div class="line">
		</div>
		<div class="latest-post">
			<p>Your Latest Post</p>
			<a href="#"><img src="/storage/Koala.jpg">1st post</a>
			<a href="#"><img src="/storage/download_home.png">2nd post</a>
			<a href="#"><img src="/storage/download_home.png">2nd post</a>
			<a href="#"><img src="/storage/download_home.png">2nd post</a>

		</div>	

	</div>
	<!------------------ main content------------------>
	<div class="main-content">
		<div class="write-post">
			<div class="user-profile">

			</div>
	
		</div>
	</div>
	<!------------------ right side bar------------------>
	<div class="right-sidebar">
		<div class="try">
			<div class="all-user">
				<h1>All  User</h1>
				<a href="#"><img src="/storage/Koala.jpg">1st post</a>
			</div>
		</div>	

	</div>	
</div>	
</body>
</html>