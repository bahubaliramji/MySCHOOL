<?php

include_once('../dbconnection.php');

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
    // $_SESSION['is_login'] = true;
    // $_SESSION['stuLogEmail'] = $stuLogEmail;
}
else{
	echo "<script>location.href = '../index.php';</script>";
}

if(isset($stuLogEmail)){
    $sql = "SELECT stu_img FROM student WHERE stu_email = '$stuLogEmail' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img'];
}

?>

