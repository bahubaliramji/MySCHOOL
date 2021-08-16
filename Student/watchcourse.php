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
    <title>MySCHOOL || Courses</title>

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

 



        <!-- main content -->

    <div class="container-fluid bg-success mt-5 p-3">
        <h3>Welcome to E-Learning</h3>
        <a href="myCourse.php" class="btn btn-danger">My Courses</a>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 border-right">
                <h4 class="text-center">Lessons</h4>
                <ul id="playlist" class="nav flex-column">
                    <?php
                        if(isset($_GET['course_id'])){
                            $course_id = $_GET['course_id'];
                            $conn = mysqli_connect("localhost","root","","lms_db");
                            $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){

                                    // '.str_replace('../','',$row['lesson_link']).'
                                echo   ' <li class="nav-item border-bottom py-2"
                                    movieurl="'.$row['lesson_link'].'" style="cursor:pointer;">
                                    '.$row['lesson_name'].'
                                    </li>';

                            
                                }
                            }
                        }
                    
                    ?>
                </ul>
            </div>
            <div class="col-sm-8">
                <video id="videoarea" src="" class="mt-5 w-75 ml-2" controls autoplay></video>
            </div>
        </div>
    </div>



    <?php
include('stuInclude/footer.php');
?>