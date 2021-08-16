<?php

if(!isset($_SESSION)){
    session_start();
}

// admin login verification
if(!isset( $_SESSION['is_admin_login'])){
if(isset($_POST['checkLogemail']) && isset($_POST['adminLogEmail']) && isset($_POST['adminLogPass'])) {
    $adminLogEmail = $_POST['adminLogEmail'];
    $adminLogPass = $_POST['adminLogPass'];


    $conn = mysqli_connect('localhost','root','','lms_db');

    $sql = "SELECT admin_email, admin_pass FROM adminlog WHERE admin_email = '$adminLogEmail' AND admin_pass = '$adminLogPass'";
    // $sql = "SELECT admin_email, admin_pass FROM admin WHERE admin_email = '".$adminLogEmail."'";
    $result = $conn->query($sql);

    $row = $result->num_rows;

    if($row === 1){
       // echo json_encode("OK");
        
         $_SESSION['is_admin_login'] = true;
         $_SESSION['adminLogEmail'] = $adminLogEmail;
         echo json_encode($row);

    } else if($row === 0){
        echo json_encode($row);
    }
}
} 

?>