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

if(isset($stuLogEmail)){
    $sql = "SELECT * FROM student WHERE stu_email = '$stuLogEmail' ";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $stuId = $row['id'];
    }
    }
    
    if(isset($_REQUEST['submitFeedbackBtn'])){
        if($_REQUEST['f_content'] == ""){
            $passmsg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert"> Fill All Fields</div>';
        } else {
            $fcontent = $_REQUEST['f_content'];
        
            $sql = "INSERT INTO feedback SET 	

            f_content = '$fcontent', 
            stu_id = '$stuId'
            ";
    
            $res = mysqli_query($conn,$sql);
                    
            if($res == true)
            {   
                $passmsg = '<div class="alert alert-success col-sm-5 mt-5">Submited Successfully !</div>';
                
                
            }
            else
            {   
                $passmsg = '<div class="alert alert-danger col-sm-5 mt-5">Unable to Submit</div>';
                
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
    <title>MySCHOOL || Feedback</title>

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
                    <li class="nav-item active" style="background-color:#225470;">
                        <a style="color:white;" href="stufeedback.php" class="nav-link">
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


<div class="col-sm-6 mt-5">
    <form action="" method="POST" enctype="multipart/form-data" class="mx-5">
    <div class="form-group">
            <label for="stuId">Student ID</label>
            <input type="text" class="form-control" id="stuId" name="stuId" value="<?php if(isset($stuId)){ echo $stuId; }?>" readonly>
        </div>
        <div class="form-group">
            <label for="f_content">Write Feedback</label>
            <textarea type="text" class="form-control" id="f_content" name="f_content" required row=2></textarea>
        </div>
        <div class="text-center">
            <button class="btn btn-primary" type="submit" id="submitFeedbackBtn" name="submitFeedbackBtn">Submit Feedback</button>
        </div>
        <?php if(isset($passmsg)) { echo $passmsg; }?>
    </form>
</div>

</div>
<!-- div close for row from header  -->
</div>
<!-- div close for container-fluid from header -->
 

<?php
include('stuInclude/footer.php');
?>