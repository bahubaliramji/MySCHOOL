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

<!-- footer -->
<link rel="stylesheet" type="text/css" href="css/footer.css">

<!-- custom css -->
<link rel="stylesheet" href="css/style.css">

<title>MySCHOOL || Courses</title>
</head>
<body style="margin-top:70px;">
   
    <!-- Start Navigation -->
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark pl-5 fixed-top">
		<div class="container-fluid">
		<a class="navbar-brand " style="color:  #ffffff;  font: normal 36px 'Cookie', cursive;" href="index.php">My<span style=" color:  #5383d3;">SCHOOL</span></a>
			<span style="font: normal 15px 'Cookie', cursive;">Learn and Touch the SkY</span>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
				aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<ul class="navbar-nav custom-nav pl-5">
					<li class="nav-item custom-nav-item "><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item custom-nav-item active"><a href="courses.php" class="nav-link">Courses</a></li>
					<li class="nav-item custom-nav-item"><a href="paymentstatus.php" class="nav-link">Payment Status</a></li>
<?php 
	session_start();
	if(isset($_SESSION['is_login'])){
		echo '<li class="nav-item custom-nav-item"><a href="Student/studentProfile.php"class="nav-link">My Profile</a></li>
				<li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
	} else {
		echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#stuLoginModalCenter">Login</a></li>
				<li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Signup</a></li>';
	}
?>
					<li class="nav-item custom-nav-item"><a href="Student/stufeedback.php" class="nav-link">Feedback</a></li>
					<li class="nav-item custom-nav-item"><a href="contactus.php"  class="nav-link">Contact</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- End Navigation -->
	<?php
	include 'dbConnection.php';
	?>

  <!-- start course page banner  -->
  <div class="container-fluid bg-dark">
        <div class="row">
            <img src="img/courses/coursesbg1.jpg" alt="courses" style="height:500px; width:100%; object-fit:cover; bpx-shadow:10px;">

        </div>
    </div>

    <div class="container jumbotron mb-5">
        <div class="row">
            <div class="col-md-4">
                <h5 class="mb-5">If Already Registerd !! Login </h5>
				<form id="stuLogForm" method="POST">
						<div class="form-group">
							<i class="fas fa-envelope"></i>
							<label for="stuLogemail" class="pl-2 font-weight-bold">Email address</label>
							<input type="email" class="form-control" placeholder="Your Email Address" name="stuLogemail" id="stuLogemail" required>
							
						</div>
						<div class="form-group">
							<i class="fas fa-key"></i>
							<label for="stuLogpass" class="pl-2 font-weight-bold">Password</label>
							<input type="password" class="form-control" placeholder="Password" name="stuLogpass" id="stuLogpass" required>
						</div>
						<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
						<span  id="statusLogMsg"></span>
							<button type="submit" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
					</form> 
					<br/>
                
            </div>
            <div class="col-md-6 offset-md-1">
                <h5 class="mb-5">New User !! Sign Up </h5>
                <!-- Start student registration form -->
				<form id="stuRegForm"  method="POST">
						<div class="form-group">
							<i class="fas fa-user"></i>
							<label for="stuname" class="pl-2 font-weight-bold">Name</label>
                            <small id="statusMsg1"></small>
							<input type="text" class="form-control" placeholder="Name" name="stuname" id="stuname" required>

						</div>
						<div class="form-group">
							<i class="fas fa-envelope"></i>
							<label for="stuemail" class="pl-2 font-weight-bold">Email address</label>
                            <small id="statusMsg2"></small>
							<input type="email" class="form-control" placeholder="Your Email Address" name="stuemail" id="stuemail" required>
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div>
						<div class="form-group">
							<i class="fas fa-key"></i>
							<label for="stupass" class="pl-2 font-weight-bold">New Password</label>
                            <small id="statusMsg3"></small>
							<input type="password" class="form-control" placeholder="Password" name="stupass" id="stupass" required>
						</div>
						<span  id="successMsg"></span>
						<button type="button"  class="btn btn-primary" id="stuRegBtn">Sign up</button>
						
					</form> <br/>
                <!-- End student registration form -->
                
                <span  id="statusLogMsg"></span>
            </div>  
        </div>
    </div>

     <!-- contact us -->
   <div class="container">
   <?php 
		include ('mainInclude/contact.php');
	?>





    </div>
<!-- div close for row from header  -->
</div>
<!-- div close for container-fluid from header -->

 <!-- Start Footer -->
  
 <footer class="bg-dark" style="text-align: center; margin-top:20px; color:white; padding:20px;">
    <h6 style="text-align:center; margin-top: 5px;;" class="footer">Copyright &#169 MySCHOOL 2021 | All Right Reserved
        </h6>
    <a style="color:white; text-decoration:none;" style="text-align: center;" data-toggle="modal" id="adminlogin"
    data-target="#adminLoginModalCenter" href="#">Admin Login</a>
    </footer>
	<!-- end footer -->

    <!-- registration and log in -->
    <?php 
		include ('reglog.php');
	?>







    <!-- java script file -->
    <script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<!-- font awesome js -->
	<script src="js/all.min.js"></script>

	<!-- student testimonial owl slider js -->
	<!-- <script type="text/javascript" src="js/owl.min.js"></script> -->
	<!-- <script type="text/javascript" src="js/testyslider.js"></script> -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/owl.carousel.min.js" type="text/javascript"></script>

    <!-- student ajax call javscript-->
	<script src="js/ajaxrequest.js"></script>

    <!-- admin ajax call javscript
    <script src="js\adminajaxrequest.js"></script> -->

    <!-- for extra jquery -->
    <script src="js/myjQuery.js"></script>

</body>
</html>
