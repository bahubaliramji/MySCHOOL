<?php 
if(!isset($_SESSION)){
    session_start();
}

// $conn = mysqli_connect("localhost","root","","lms_db");

$_host = "localhost";
$_user = "root";
$_password = "";
$_name = "lms_db";

// create  connection 
$conn = new mysqli($_host,$_user,$_password,$_name);

// check connection 
// if($conn->connect_error){
//     die("connection failed");
// }
// else {
//     echo "connected";
// }


?>