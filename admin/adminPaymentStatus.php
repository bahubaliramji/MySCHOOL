<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	// include('admininclude/header.php');
	include('../dbconnection.php');
	// $conn = mysqli_connect("localhost","root","","lms_db");


	// following files need to be included
	require_once("../PaytmKit/lib/config_paytm.php");
	require_once("../PaytmKit/lib/encdec_paytm.php");

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
<link rel="icon" href="../img/logo.png">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Boostrap CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css">

<!-- Font Awesome CSS -->
<link rel="stylesheet" href="../css/all.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">


<!-- student testimonial owl slider css -->
<!-- Favicons==================================================  -->
<link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">
<!-- Stylesheet================================================== -->
<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
<link rel="stylesheet" type="text/css" href="../css/all.css">
<!-- <link rel="stylesheet" type="text/css" href="../css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="../css/owl.theme.default.csss"> -->




<!-- footer
<link rel="stylesheet" type="text/css" href="../css/style.css"> -->


<!-- custom css -->
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" href="../css/adminstyle.css">
<title>MySCHOOL || PaymentStatus</title>

</head>
<body>

 <!-- <h1>this is dashboard</h1>
 <a href="../logout.php">logout</a> -->
 <!-- fixed-top cllass -->
 <!-- Top Navbar -->
 <nav class="navbar navbar-dark  p-0 shadow" style="background-color:#225470;">
    <a href="adminDasboard.php" class="navbar-brand col-sm-3 col-md-2 mr-0">E-Learnig <small class="text-white">Admin Area</small></a>
 </nav>


<!-- side bar -->
<div class="contsiner-fluid mb-5" style="margin-top:40px;">
    <div class="row">
        <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li  class="nav-item">
                        <a    href="admindashboard.php" class="nav-link">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                        </a>
                    </li>
                    <li  class="nav-item ">
                        <a href="courses.php" class="nav-link" >
                            <!-- <i class="fas fa-accessible-icon"></i> -->
                            <i class="fab fa-accessible-icon"></i>
                            Courses
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a    href="lessons.php" class="nav-link">
                        <i class="fas fa-book-open"></i>
                            Lesson
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a   href="students.php" class="nav-link">
                            <i class="fas fa-users"></i>
                            Students
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sellreport.php" class="nav-link">
                            <i class="fas fa-table"></i>
                            Sell Report
                        </a>
                    </li>
                    <li class="nav-item active" style="background-color:#225470;">
                        <a style="color:white;" href="adminPaymentStatus.php" class="nav-link">
                            <!-- <i class="fas fa-table"></i> -->
                            <i class="fas fa-shopping-cart"></i>
                            Payment Status
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="feedback.php" class="nav-link">
                        <i class="fas fa-comment-dots"></i>
                            Feedback
                        </a>
                    </li>
                    <li  class="nav-item">
                        <a   href="contactrequest.php" class="nav-link" >
                            <!-- <i class="fas fa-accessible-icon"></i> -->
                            <!-- <i class="fab fa-accessible-icon"></i> -->
                            <i class="fas fa-id-card-alt"></i>
                            Contact Request
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a  href="adminChangePass.php" class="nav-link">
                            <i class="fas fa-key"></i>
                            Change Password
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../logout.php" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    
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
						?>
						<tr >
							<td ><label><?php echo $paramName?></label></td>
							<td ><?php echo $paramValue?></td>
						</tr>
						<?php
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

</div>
<!-- div close for row from header  -->
</div>
<!-- div close for container-fluid from header -->
</body>
</html>