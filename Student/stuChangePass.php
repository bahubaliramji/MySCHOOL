<?php

// if(!isset($_SESSION)){
//     session_start();
// }

include('stuInclude/header.php');
include('../dbconnection.php');

if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
} else{
	echo "<script>location.href = '../index.php';</script>";
}

$stuLogEmail = $_SESSION['stuLogEmail'];
if(isset($_REQUEST['stuPassUpdatebtn'])){
    if(($_REQUEST['stuNewPass'] == "")){
        // message display if required field missing
        $passmsg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert"> Fill All Fields</div>';
    } else {
        $sql = "SELECT * FROM student WHERE  stu_email='$stuLogEmail'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            $stuNewPass = $_REQUEST['stuNewPass'];
            $sql = "UPDATE student SET 
            stu_pass = '$stuNewPass' WHERE 
            stu_email='$stuLogEmail'";

                $res = mysqli_query($conn,$sql);
                        
                if($res == TRUE)
                {   
                    $passmsg = '<div class="alert alert-success col-sm-6 mt-4" role="alert">Password Updated</div>';
                    
                }
                else
                {   
                    $passmsg = '<div class="alert alert-danger col-sm-6  mt-4" role="alert">unable to Update</div>';
                    
                }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo.png">
    <title>MySCHOOL || ChangePassword</title>

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


<!-- custom css -->
<link rel="stylesheet" href="../css/adminstyle.css">


</head>
<body>

<!-- Top Navbar -->
<nav class="navbar navbar-dark fixed-top p-0 flex-md-nowrap shadow" style="background-color:#225470;">
    <a href="studentProfile.php" class="navbar-brand col-sm-3 col-md-2 mr-0">E-Learnig <small class="text-white">Student Area</small></a>
 </nav>

 

<!-- side bar -->

<div class="contsiner-fluid mb-5" style="margin-top:40px;">
    <div class="row">
        <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item mb-3">
                        <img src="<?php echo $stu_img ?>" alt="studentimage" class="img-thumbnail rounded-circle">
                    </li>
    
                    <li class="nav-item">
                        <a href="studentProfile.php" class="nav-link">
                            <i class="fas fa-user"></i>
                            Profile <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="myCourse.php" class="nav-link">
                            <!-- <i class="fas fa-accessible-icon"></i> -->
                            <i class="fab fa-accessible-icon"></i>
                            My Courses
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a  href="stufeedback.php" class="nav-link">
                            <i class="fab fa-accessible-icon"></i>
                           Feedback
                        </a>
                    </li>
                    <li class="nav-item active" style="background-color:#225470;">
                        <a style="color:white;" href="stuChangePass.php" class="nav-link">
                            <i class="fas fa-key"></i>
                            Change Password
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../index.php" class="nav-link">
                            <i class="fas fa-home"></i>
                            Home
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

<div class="col-sm-9 mt-5">
    <div class="row">
        <div class="col-sm-6">
            <form class="mt-5 mx-5">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $stuLogEmail ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="stuNewPass">New Password</label>
                    <input type="text" class="form-control" id="stuNewPass" placeholder="New Password" name="stuNewPass">
                </div>
                <button class="btn btn-primary mr-4 mt-2" type="submit" id="stuPassUpdatebtn" name="stuPassUpdatebtn">Update</button>
                <button type="reset" class="btn btn-secondary mt-2">Reset</button>
                <?php if(isset($passmsg)) { echo $passmsg; }?>
            </form>
        </div>
    </div>
</div>


</div>
<!-- div close for row from header  -->
</div>
<!-- div close for container-fluid from header -->