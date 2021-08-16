<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="img/logo.png">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Boostrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Font Awesome CSS -->
<link rel="stylesheet" href="css/all.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">


<!-- student testimonial owl slider css -->
<!-- Favicons================================================== -->
<link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">
<!-- Stylesheet================================================== -->
<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
<link rel="stylesheet" type="text/css" href="css/all.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">

<link rel="stylesheet" type="text/css" href="css/owl.theme.default.csss">




<!-- footer -->
<link rel="stylesheet" type="text/css" href="css/footer.css">


<!-- custom css -->
<link rel="stylesheet" href="css/style.css">
<title>MySCHOOL</title>

</head>

<body>
	<!-- Start Navigation -->
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark pl-5 fixed-top">
		<div class="container-fluid" >
			<a class="navbar-brand " style="color:  #ffffff;  font: normal 36px 'Cookie', cursive;" href="index.php">My<span style=" color:  #5383d3;">SCHOOL</span></a>
			<span style="font: normal 15px 'Cookie', cursive;">Learn and Touch the SkY</span>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
				aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<ul class="navbar-nav custom-nav pl-5">
					<li class="nav-item custom-nav-item active"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item custom-nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
					<li class="nav-item custom-nav-item"><a href="paymentstatus.php" class="nav-link">Payment Status</a></li>
<?php 
	session_start();
	if(isset($_SESSION['is_login'])){
		echo '<li class="nav-item custom-nav-item"><a href="Student/studentProfile.php" class="nav-link">My Profile</a></li>
				<li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
	} else {
		echo '<li class="nav-item custom-nav-item"><a href="#" id="login" class="nav-link" data-toggle="modal" data-target="#stuLoginModalCenter">Login</a></li>
				<li class="nav-item custom-nav-item"><a href="#" id="reg" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Signup</a></li>';
	}
?>
					
					<li class="nav-item custom-nav-item"><a href="loginorsignup.php" class="nav-link">Feedback</a></li>
					<li class="nav-item custom-nav-item"><a href="contactus.php" class="nav-link">Contact</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- End Navigation -->

	<?php
	include 'dbConnection.php';
	?>


	<!-- Start video background -->
	<div class="container-fluid remove-vid-marg">
		<div class="vid-parent">
			<video playsinline autoplay muted loop>
				<source src="video/bagvid.mp4">
			</video>
			<div class="vid-overlay"></div>
		</div>
		<div class="vid-content">
			<h1 class="my-content">Welcome to <a class="navbar-brand " style="color:  #ffffff;  font: normal 36px 'Cookie', cursive;" href="index.php">My<span style=" color:  #5383d3;">SCHOOL</span></a></h1>
			<p style=" color: blanchedalmond; font: normal 15px 'Cookie', cursive;" class="my-content">Learn and Touch the SkY</p><br>
			<!-- Button trigger modal -->
<?php 
	if(!isset($_SESSION['is_login'])){
		echo '<a href="#" class="btn btn-danger " data-toggle="modal" data-target="#stuRegModalCenter">Get Started</a>';
	} else {
		echo '<a href="Student/studentProfile.php" class="btn btn-primary ">My Profile</a>';
	}

?>			
			
		</div>

	</div>

	<!-- end video background -->

	<!-- Start text banner -->
	<div class="container-fluid bg-danger txt-banner">
		<div class="row bottom-banner">
			<div class="col-sm">
				<h5><i class="fas fa-book-open mr-3"></i>100+ online Courses</h5>
			</div>
			<div class="col-sm">
				<h5><i class="fas fa-users mr-3"></i>Expert Instructors</h5>
			</div>
			<div class="col-sm">
				<h5><i class="fas fa-keyboard mr-3"></i>Lifetime Access</h5>
			</div>
			<div class="col-sm">
				<h5><i class="fas fa-rupee-sign mr-3"></i>Money Back Guarantee*</h5>
			</div>
		</div>

	</div>


	<!-- end text banner -->

	<!-- Start Most Popular Course -->
	<?php 
		include ('mainInclude/mostpopularcourses.php');
	?>

	<!-- end of second deck -->

	<div class="text-center m-2">
		<a href="courses.php" class="btn btn-danger btn-sm">View All Courses</a>
	</div>
	<!-- End Most Popular Course -->
	<!-- Start Conatct us -->
	<?php 
		include ('mainInclude/contact.php');
	?>
	<!-- End Conatct us -->
	<!-- Start student feedback  -->

	<?php 
		include ('mainInclude/feedback.php');
	?>
	<!-- Start student feedback  -->

	<!-- social follow -->
	<div style="margin-top:20px;" class="container-fluid bg-danger">
		<div class="row text-white text-center p-1">
			<div class="col-sm">
				<a style=" text-decoration:none;" href="https://www.facebook.com/DSM-Online-1837207429732367/" class="text-white social-hower"><i class="fab fa-facebook mr-3"></i>Facebook</a>
			</div>
			<div class="col-sm">
				<a  style=" text-decoration:none;" href="https://twitter.com/online_dsm?s=20" class="text-white social-hower"><i class="fab fa-twitter mr-3"></i>Twitter</a>
			</div>
			<div class="col-sm">
				<a style=" text-decoration:none;" href="https://www.linkedin.com/mwlite/company/dsm-online" class="text-white social-hower"><i class="fab fa-linkedin mr-3"></i>Linkedin</a>
			</div>
			<div class="col-sm">
				<a style=" text-decoration:none;" href="https://www.instagram.com/amrendraramji/" class="text-white social-hower"><i class="fab fa-instagram mr-3"></i>Instagram</a>
			</div>
		</div>
	</div>


	<!-- start footer -->
	<?php 
		include ('mainInclude/footer.php');
	?>
	
	<!-- end footer -->


	<!-- Start Admin Login-->

	<!-- End Student login-->

	<?php 
		include ('reglog.php');
	?>
	<!-- Start Student Registration-->


	<!-- End Student Registration-->

	<!-- jquery and bootstrap javascript -->
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<!-- font awesome js -->
	<script src="js/all.min.js"></script>

	<!-- student ajax call javscript-->
	<script src="js/ajaxrequest.js"></script>

	<!-- admin ajax call javscript
	<script src="js\adminajaxrequest.js"></script> -->

	<!-- for custon java script jquery -->
	<script src="js/myjQuery.js"></script>
	

</body>

</html>