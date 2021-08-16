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
	// $adminEmail = $_SESSION['adminLogEmail'];
    // $_SESSION['adminLogEmail'] = $adminLogEmail;
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
<title>MySCHOOL || EditCourse</title>

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
                    <li  class="nav-item active" style="background-color:#225470;">
                        <a style="color:white;"  href="courses.php" class="nav-link" >
                            <!-- <i class="fas fa-accessible-icon"></i> -->
                            <i class="fab fa-accessible-icon"></i>
                            Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="lessons.php" class="nav-link">
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


// update 
if(isset($_POST['updateCourse'])){
        $id = $_GET['id'];
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $author = $_POST['author'];
        $duration = $_POST['duration'];
        $original_price = $_POST['original_price'];
        $price = $_POST['price'];
        $image = $_FILES['img'];
    

        // $con = mysqli_connect('localhost','root','','lms_db');
       
    
    
    
       $filename = $image['name'];
       $filetmp = $image['tmp_name'];
       $fileext = explode('.',$filename);
       $filecheck = strtolower(end($fileext));
    
       $fileextstored = array('png','jpg','jpeg');
    
       if(in_array($filecheck,$fileextstored)){
           $destinationfile ='../img/courseimg/'.$filename;
           // $img_folder = '../img/courseimg/'.$course_image;
           move_uploaded_file($filetmp,$destinationfile);
       } 
    
            $sql = "UPDATE allcourse SET 
            id = '$id',
            name = '$name', 
            c_desc = '$desc', 
            author = '$author',
            duration = '$duration',
            originl_price = '$original_price',
            image = '$destinationfile',
            price = '$price'
            WHERE id='$id'
            ";
            
    
            $res = mysqli_query($conn,$sql);
         
        if($res == true)
        {   
            $msg = '<div class="alert alert-success col-sm-5 mt-5">Course Updated Successfully</div>';
            echo "<script> setTimeout(() => {
                window.location.href = 'courses.php';
            }, 2000); </script>";
            
            
        }
        else
        {   
            $msg = '<div class="alert alert-danger col-sm-5 mt-5">Unable to update</div>';
            
        }
   }

?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-cemter">Update Course Details</h3>
    <?php 
        $id = $_GET['id'];
        $sql = "SELECT * FROM  allcourse WHERE id = {$_GET['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    
    

    ?>


    <form id="updateForm" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="id">Course ID</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php if($_GET['id']){ echo $_GET['id']; }?>" readonly>
        </div>
        <div class="form-group">
            <label for="name">Course Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($row['name'])){ echo $row['name']; }?>" required>
        </div>
        <div class="form-group">
            <label for="desc">Course Description</label>
            <textarea type="text" class="form-control" id="desc" name="desc"  required row=2><?php if(isset($row['c_desc'])){ echo $row['c_desc']; }?></textarea>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" name="author"value="<?php if(isset($row['author'])){ echo $row['author']; }?>" required>
        </div>
        <div class="form-group">
            <label for="duration">Course Duration</label>
            <input type="text" class="form-control" id="duration" name="duration"value="<?php if(isset($row['duration'])){ echo $row['duration']; }?>" required>
        </div>
        <div class="form-group">
            <label for="original_price">Course Original Price</label>
            <input type="text" class="form-control" id="original_price" name="original_price" value="<?php if(isset($row['originl_price'])){ echo $row['originl_price']; }?>" required>
        </div>
        <div class="form-group">
            <label for="price">Course Selling Price</label>
            <input type="text" class="form-control" id="price" name="price" value="<?php if(isset($row['price'])){ echo $row['price']; }?>" required>
        </div>
        <div class="form-group">
            <label for="img">Course Image</label>
            <img src="<?php if(isset($row['image'])){ echo $row['image']; }?>" alt="" style="max-height: 200px" class="img-thumbnail">
            <input type="file" class="form-control-file" id="img" name="img" accept="png/jpeg/jpg" required >
        </div>
        <div class="text-center">
            <button class="btn btn-danger" type="submit" id="updateCourse" name="updateCourse">Update</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
        <!-- <div classe="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div> -->
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

