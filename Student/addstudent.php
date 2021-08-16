<?php
// header("Content-type:application/json");



include '../dbConnection.php';

//checking email already registered
if(isset($_POST['checkemail']) && isset($_POST['stuemail'])){
    $stuemail = $_POST['stuemail'];
    $sql ="SELECT stu_email FROM student WHERE stu_email = '".$stuemail."'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    echo json_encode($row);
}


//insert student registration
//  if(isset($_POST['signup'])){
if(isset($_POST['stusignup']) && isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stupass']) )
{



    $stuname = $_POST['stuname'];
    $stuemail = $_POST['stuemail'];
    $stupass = $_POST['stupass'];
  //  $hashPass = password_hash($stupass, PASSWORD_BCRYPT);

    $sql = "INSERT INTO student SET 
    stu_name = '$stuname', 
    stu_email = '$stuemail', 
    stu_pass = '$stupass'
    ";
    // $conn = mysqli_connect('localhost','root','','lms_db');
    // $res = mysqli_query($conn,$sql);

    // if($res == TRUE)
    // {
    if($conn->query($sql) == TRUE){
        echo json_encode("OK");
    }
    else{
        echo json_encode("Failed");
    }  
}

// student login verification 
if(!isset( $_SESSION['is_login'])){
if(isset($_POST['checkLogemail']) && isset($_POST['stuLogEmail']) && isset($_POST['stuLogPass'])) {
    $stuLogEmail = $_POST['stuLogEmail'];
    $stuLogPass = $_POST['stuLogPass'];


    $conn = mysqli_connect('localhost','root','','lms_db');

    $sql = "SELECT * FROM student WHERE stu_email = '$stuLogEmail' AND stu_pass = '$stuLogPass'";
   
    $result = $conn->query($sql);

    $row = $result->num_rows;

    if($row === 1){
       // echo json_encode("OK");
        
         $_SESSION['is_login'] = true;
         $_SESSION['stuLogEmail'] = $stuLogEmail;
         echo json_encode($row);

    } else if($row === 0){
        echo json_encode($row);
    }
}
}   






?>