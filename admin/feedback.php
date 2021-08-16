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
<title>MySCHOOL || Feedback</title>

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
                        <a  href="students.php" class="nav-link">
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
                    <li class="nav-item active" style="background-color:#225470;">
                        <a   style="color:white;" href="feedback.php" class="nav-link">
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


<div class="col-sm-9 mt-5">
    <!-- table -->
    <p class="bg-dark text-white p-2">Studend's Feedback</p>
    <?php
    $sql = "SELECT * FROM  feedback";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Feedback ID</th>
                <th scope="col">Student ID</th>
                <th scope="col">Content</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // $id = 1;
            while($row = $result->fetch_assoc()){
            
            echo '<tr>';
                echo '<th scope="row">'.$row['f_id'].'</th>';
                echo '<td>'.$row['stu_id'].'</td>';
                echo '<td>'.$row['f_content'].'</td>';
                echo '<td>';
                echo '
                    <form method="POST" class="d-inline">
                    <input action="" type="hidden" name="id" value="'.$row['f_id'].'" >
                    <button type="submit" name="delete" value="Delete" class="btn btn-secondary">
                    <i class="fas fa-trash-alt"></i>
                    </button>
                    </form>
                </td>
            </tr>';
            // $id++;
            } 
            ?>
        </tbody>
    </table>
   <?php 
   
    } 
     else {
          echo "0 Result";
    }

    if(isset($_REQUEST['delete'])){
       
        $sql = "DELETE FROM feedback WHERE f_id = {$_REQUEST['id']}";
        $res = $conn->query($sql);
        if($res == TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
        }
        else {
            echo "Unable to Delete Data";
        }
    }
     ?>
</div>


</div>
<!-- div close for row from header  -->


</div>
<!-- div close for container-fluid from header -->