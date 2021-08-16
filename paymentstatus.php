<?php

if(isset($_POST['submitContactForm'])){
    // console.log "clicked" ;
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];
   
    

    $conn = mysqli_connect('localhost','root','','lms_db');
   

    
    
        $sql = "INSERT INTO contact SET
        name = '$name', 
        subject = '$subject', 
        email = '$email',
        message = '$message'
       
        ";
        

        $res = mysqli_query($conn,$sql);
     

        if($res == true)
        {   
            $msg = '<div class="alert alert-success col-sm-5 mt-2">Submitted Successfully</div>';
             echo "<script> setTimeout(() => {
                window.location.href = 'paymentstatus.php';
            }, 3000); </script>";
        }
        else
        {   
            $msg = '<div class="alert alert-danger col-sm-5 mt-2">Unable to Add</div>';
        }
   }




?>

<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	// $conn = mysqli_connect("localhost","root","","lms_db");


	// following files need to be included
	require_once("PaytmKit/lib/config_paytm.php");
	require_once("PaytmKit/lib/encdec_paytm.php");

	$ORDER_ID = "";
	$requestParamList = array();
	$responseParamList = array();

	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_POST["ORDER_ID"];

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
	}

?>

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

<title>MySCHOOL || PaymentStatus</title>
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
					<li class="nav-item custom-nav-item "><a href="courses.php" class="nav-link">Courses</a></li>
					<li class="nav-item custom-nav-item active"><a href="paymentstatus.php" class="nav-link">Payment Status</a></li>
<?php 
	if(isset($_SESSION['is_login'])){
		echo '<li class="nav-item custom-nav-item"><a href="Student/studentProfile.php" class="nav-link">My Profile</a></li>
				<li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
	} else {
		echo '<li class="nav-item custom-nav-item"><a href="Student/stufeedback.php" class="nav-link" data-toggle="modal" data-target="#stuLoginModalCenter">Login</a></li>
				<li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Signup</a></li>';
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

   
		<!--payment stauts  -->
<div class="container">
	<h2 class="text-center my-4">Payment Status</h2>
	
	<form method="post" action="">
		<div class="form-group row">
			
				   
					<label class="offset-sm-3 col-form-label">ORDER_ID:</label>
					<div>
					<input class="form-control mx-3" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>"> <br/>
					
					</div>

				                
			                
	                <div>
	                <input class="btn btn-primary mx-4" value="View" type="submit"	onclick="">
	                </div>
				</div>               
			
		
	</form>
	

		
		<br/></br/>
		<?php
		if (isset($responseParamList) && count($responseParamList)>0 )
		{ 
		?>
		
			<div class=" justify-content-center">
				<div class="col-auto">
				<h2 class="text-center">Payment Receipt :</h2>
				<table class="table table-bordered">
					<tbody>
						<?php
							foreach($responseParamList as $paramName => $paramValue) {

								if(($paramName == "TXNID") || ($paramName == "ORDERID") || ($paramName == "TXNAMOUNT") || ($paramName == "STATUS")) {

								
						?>
						<tr >
							<td ><label><?php echo $paramName?></label></td>
							<td ><?php echo $paramValue?></td>
						</tr>
						<?php
							}
						}
						?>
						<tr>
							<td colspan="2"  class="text-center">
								<button   type="button" class="btn btn-primary " onclick="javascript:window.print();">Print</button>
							</td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
			</div>
		
		<?php
		} 
		?>

   <!-- end main content -->
   <!-- contact us -->
   <!-- Start Conatct us -->
<div class="container mt-4" id="contact">
    <h2 class="text-center mb-4">Contact US</h2>
    <div class="row">
        <div class="col-md-8">
            <form action="" method="POST">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required><br>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required><br>
                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required><br>
                <textarea type="text" class="form-control" name="message" id="message" placeholder="How we can help you ?"
                    style="height:150px;" required></textarea><br>
                    <!-- <input type="text" class="form-control" name="message" id="message" placeholder="Message" required><br> -->
                
                <button type="submit" class="btn btn-primary" id="submitContactForm" name="submitContactForm">Submit</button>
                <?php if(isset($msg)) { echo $msg; }?>
            </form>
        </div>
        <div class="col-md-4 stripe text-white text-center">
            <h4>MySCHOOL</h4>
            <p>MySCHOOL,
                Near UIT RGPV Bhopal,
                Madhya Pradesh - 442033<br />
                Phone: 8081350753 <br />
                www.MySCHOOL.com
            </p>

        </div>
    </div>
</div>
<!-- End Conatct us -->


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
