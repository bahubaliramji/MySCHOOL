<!--start header -->
<?php
if(!isset($_SESSION))
{
	session_start();
}
// include('admininclude/header.php');
include('../dbconnection.php');



if(isset($_SESSION['is_admin_login'])){
    $adminLogEmail = $_SESSION['adminLogEmail'];
}
else{
	echo "<script>location.href = '../index.php';</script>";
}

?>
<!-- End header -->

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
<title>MySCHOOL || Addlesson</title>

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
                    <li class="nav-item active" style="background-color:#225470;">
                        <a style="color:white;"   href="lessons.php" class="nav-link">
                        <i class="fas fa-book-open"></i>
                            Lesson
                        </a>
                    </li>
                    <li class="nav-item">
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
                    <li class="nav-item">
                        <a href="adminPaymentStatus.php" class="nav-link">
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
                    <li class="nav-item">
                        <a href="adminChangePass.php" class="nav-link">
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


<?php


if(isset($_POST['lessonSubmitBtn'])){
    // console.log "clicked" ;
    $lesson_name = $_POST['lesson_name'];
    $lesson_desc = $_POST['lesson_desc'];
    $course_name = $_POST['course_name'];
    $course_id = $_POST['course_id'];
    $lesson_link = $_FILES['link'];
    

    // $con = mysqli_connect('localhost','root','','lms_db');
   



   $filename = $lesson_link['name'];
   $filetmp = $lesson_link['tmp_name'];
    $destinationfile ='../lessonvid/'.$filename;
    
    move_uploaded_file($filetmp,$destinationfile); 

        $sql = "INSERT INTO lesson SET
        lesson_name = '$lesson_name', 
        lesson_desc = '$lesson_desc', 
        lesson_link = '$destinationfile',
        course_id = '$course_id', 
        course_name = '$course_name'
        ";
        

        $res = mysqli_query($conn,$sql);
     

        if($res == true)
        {   
            $msg = '<div class="alert alert-success col-sm-5 mt-5">Lesson Added Successfully</div>';
             echo "<script> setTimeout(() => {
                window.location.href = 'lessons.php';
            }, 2000); </script>";
        }
        else
        {   
            $msg = '<div class="alert alert-danger col-sm-5 mt-5">Unable to Add</div>';
        }
   }

?>
 


<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-cemter">Add New Lesson</h3>
    <form  method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if($_SESSION['c_id']){ echo $_SESSION['c_id']; }?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if($_SESSION['c_name']){ echo $_SESSION['c_name']; }?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name" required>
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea type="text" class="form-control" id="lesson_desc" name="lesson_desc" required row=2></textarea>
        </div>
        <div class="form-group">
            <label for="link">Lesson Video Link</label> <br>
            <input type="file" class="form-control-file"  id="link" name="link" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
            <a href="courses.php" class="btn btn-danger">Close</a>
        </div>
        <?php if(isset($msg)) { echo $msg; }?>
    </form>
</div>

</div>
<!-- div close for row from header  -->
</div>
<!-- div close for container-fluid from header -->

<!-- add footer -->
<?php
include 'admininclude/footer.php';
?>
 