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
<title>MySchool</title>

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
					<li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item custom-nav-item active"><a href="courses.php" class="nav-link">Courses</a></li>
					<li class="nav-item custom-nav-item"><a href="paymentstatus.php" class="nav-link">Payment Status</a></li>
<?php 
	session_start();
	if(isset($_SESSION['is_login'])){
		echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link">My Profile</a></li>
				<li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
	} else {
		echo '<li class="nav-item custom-nav-item"><a href="#" id="login" class="nav-link" data-toggle="modal" data-target="#stuLoginModalCenter">Login</a></li>
				<li class="nav-item custom-nav-item"><a href="#" id="reg" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Signup</a></li>';
	}
?>
					
					<li class="nav-item custom-nav-item"><a  href="loginorsignup.php" class="nav-link">Feedback</a></li>
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

    <!-- start main content -->
    <div class="container mt-5">
    <?php
        if(isset($_GET['course_id'])){
        $course_id = $_GET['course_id'];
        // $_SESSION['course_id'] = true;
        $_SESSION['course_id'] = $course_id;
		$sql = "SELECT * FROM allcourse WHERE id = $course_id";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
    
        echo '<div class="row">
            <div class="col-md-4">
                <img src="'.str_replace('..','.',$row['image']).'" alt="course_pic" class="card-img-top">
            </div> 
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Course Name: '.$row['name'].'  </h5>
                    <h6 >Author Name: '.$row['author'].'  </h6>
                    <p class="card-text"> '.$row['c_desc'].'</p>
                    <p class="card-text"> Duration: '.$row['duration'].'</p>
                    <form action="checkout.php" method="POST">
                        <p class="card-text">Price: <small><del>&#8377 '.$row['originl_price'].'</del></small><span
								class="font-weight-bolder p-sapn">&#8377 '.$row['price'].'</span></p>
                                <input type="hidden" name="id" value="'.$row['price'].'">
                        <button class="btn btn-primary text-white font-weight-bolder float-right" name="buy">Buy Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>'; 
   
}
    ?>

    <div  class="container mt-3">
        <div class="row">
        <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">lesson No.</th>
                        <th scope="col">Lesson Name</th>
                    </tr>
                </thead>
                <tbody>
<?php
		$sql = "SELECT * FROM lesson WHERE course_id = $course_id";
		$result = mysqli_query($conn,$sql);
    	if($result->num_rows > 0){
            $id = 1;
            while ($row = $result->fetch_assoc()){
                echo '  <tr>
                <th scope="row">'.$id.'</th>
                <td>
                
                '.$row['lesson_name'].'
            
                </td>
            </tr>';
            $id++;
            }
            // <a style="color:black; text-decoration:none;" href="'.str_replace('..','.',$row['lesson_link']).'">
            // '.$row['lesson_name'].'
            // </a>
            //  for video

        } else {
            $msg = '<div class="alert alert-danger col-sm-5 mt-2">Sorry, No Lesson Yet !</div>';
        }
?>
		
           
                    
                </tbody>
            </table>
            <?php if(isset($msg)) { echo $msg; }?>
        </div>
    </div>
   
   <!-- end main content -->
   


   </div>
<!-- div close for row from header  -->
</div>
<!-- div close for container-fluid from header -->

 <!-- Start Footer -->
  
 <footer class="bg-dark" style="text-align: center; color:white; padding:20px;">
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
