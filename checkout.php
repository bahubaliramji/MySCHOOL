<?php


include('dbconnection.php');

if(!isset($_SESSION['is_login'])){
    echo "<script>location.href = 'loginorsignup.php';</script>";
    
} else{
    header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
    $stuLogEmail = $_SESSION['stuLogEmail'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="GENERATOR" content="Evrsoft First Page">
    <link rel="icon" href="img/logo.png">
    <!-- Boostrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">


<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">



<!-- footer
<link rel="stylesheet" type="text/css" href="../css/style.css"> -->


<!-- custom css -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="css/adminstyle.css">
    <title>CheckOut</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3 jumbotron">
         
    
            <h3 class="mb-5">Welcome to MySCHOOL Payment Page</h3>
                <form method="post" action="PaytmKit/pgRedirect.php">
                    <div class="form-group row">
                        <label for="ORDER_ID" class="col-sm-4 col-form-label">ORDER_ID:</label>
                        <div class="col-sm-8">
                            <input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20"
                                        name="ORDER_ID" autocomplete="off"
                                        value="<?php echo  "ORDS" . rand(10000,99999999)?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CUST_ID" class="col-sm-4 col-form-label">Student Email:</label>
                        <div class="col-sm-8">
                            <input  id="CUST_ID" class="form-control" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off"
                                        value="<?php if(isset($stuLogEmail)){echo $stuLogEmail;}?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount:</label>
                        <div class="col-sm-8">
                            <input  title="TXN_AMOUNT" class="form-control" title="TXN_AMOUNT" tabindex="10"
                                        type="text" name="TXN_AMOUNT"
                                        value="<?php if(isset($_POST['id'])){echo $_POST['id'];}?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <!-- <label for="INDUSTRY_TYPE_ID" class="col-sm-4 col-form-label">INDUSTRY_TYPE_ID:</label> -->
                        <div class="col-sm-8">
                            <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off"
                            value="Retail" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <!-- <label for="CHANNEL_ID" class="col-sm-4 col-form-label">Channel_ID:</label> -->
                        <div class="col-sm-8">
                            <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
                                        size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
                        </div>
                    </div>
                    <div class="text-center">
                        <input value="CheckOut" class="btn btn-primary" type="submit"	onclick="">
                        <a href="courses.php" class="btn btn-danger">Cancel</a>
                    </div>
                    </form>
                    <small class="form-text text-muted mt-3">Note: Complete Payment by Clicking Checkout Button</small>
        </div>
    </div>
</div>






</body>
</html>
<?php
}
?>
