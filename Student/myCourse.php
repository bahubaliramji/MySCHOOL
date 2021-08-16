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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo.png">
    <title>MySCHOOL || MyCourse</title>

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
                        <a  href="studentProfile.php" class="nav-link">
                            <i class="fas fa-user"></i>
                            Profile <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active" style="background-color:#225470;">
                        <a style="color:white;" href="myCourse.php" class="nav-link">
                            <!-- <i class="fas fa-accessible-icon"></i> -->
                            <i class="fab fa-accessible-icon"></i>
                            My Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="stufeedback.php" class="nav-link">
                            <i class="fab fa-accessible-icon"></i>
                           Feedback
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="stuChangePass.php" class="nav-link">
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


        <!-- main content -->

<div class="container mt-5 ml-4">
    <div class="row">
        <div class="jumbotron">
            <h4 class="text-center">All Course</h4>
            <?php   

            if(isset($stuLogEmail)){
                $conn = mysqli_connect("localhost","root","","lms_db");

                // SELECT * FROM `allcourse` WHERE 1
                // $sql = "SELECT * FROM `allcourse` WHERE 1";
                $sql = "SELECT co.order_id, c.id, c.name, c.duration, c.c_desc, c.image, c.author, c.originl_price, c.price FROM courseorder AS co JOIN allcourse AS c ON c.id = co.course_id WHERE co.stu_email = '$stuLogEmail'";

                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                ?>
                <div class="bg-light mb-3 ">
                    <h5 class="card-header"><?php echo $row['name'] ; ?></h5>
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?php echo $row['image'] ; ?>" alt="course_image" class="card-img-top mt-4">
                        </div>
                        <div class="col-sm-mb-3  mt-3">
                            <div class="card-body">
                                <p class="card-title"><?php echo $row['c_desc'] ; ?></p>
                                <small class="card-text">Duration: <?php echo $row['duration'] ; ?></small><br/>
                                <small class="card-text">Instructor: <?php echo $row['author'] ; ?></small><br/>
                               
                                <p class="card-text d-inline">Price: <small><del>&#8377  <?php echo $row['originl_price'] ; ?></del></small><span
								class="font-weight-bolder p-sapn">&#8377  <?php echo $row['price'] ; ?></span></p>
                                <input type="hidden" name="id" value="'.$row['price'].'">
                                <a href="watchcourse.php?course_id=<?php echo $row['id'] ; ?>" class="btn btn-primary mt-5 float-right">Watch Course</a>
                            </div>
                        </div>
                    </div>

                </div>


                <?php
                    }
                } else {
                    echo '<div style="width:auto;" class="alert alert-danger mt-5">No Purchase !!!</div>';
                }
            }
            
            ?>
                
         </div>
    </div>
</div>

</div>
<!-- div close for row from header  -->
</div>
<!-- div close for container-fluid from header -->
     