<?php

if(isset($_POST['submitContactForm'])){
    // console.log "clicked" ;
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];
   
    

    $conn = mysqli_connect('localhost','root','','lms_db');
   

    
    
        $sql = "INSERT INTO contact SET
        name = '$name', 
        subject = '$subject', 
        email = '$email',
        message = '$message'
       
        ";
        

        $res = mysqli_query($conn,$sql);
     

        if($res == true)
        {   
            $msg = '<div class="alert alert-success col-sm-5 mt-2">Submitted Successfully</div>';
             echo "<script> setTimeout(() => {
                window.location.href = 'index.php';
            }, 3000); </script>";
        }
        else
        {   
            $msg = '<div class="alert alert-danger col-sm-5 mt-2">Unable to Add</div>';
        }
   }




?>
<!-- Start Conatct us -->
<div class="container mt-4" id="contact">
    <h2 class="text-center mb-4">Contact US</h2>
    <div class="row">
        <div class="col-md-8">
            <form action="" method="POST">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required><br>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required><br>
                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required><br>
                <textarea type="text" class="form-control" name="message" id="message" placeholder="How we can help you ?"
                    style="height:150px;" required></textarea><br>
                    <!-- <input type="text" class="form-control" name="message" id="message" placeholder="Message" required><br> -->
                
                <button type="submit" class="btn btn-primary" id="submitContactForm" name="submitContactForm">Submit</button>
                <?php if(isset($msg)) { echo $msg; }?>
            </form>
        </div>
        <div class="col-md-4 stripe text-white text-center">
            <h4>MySCHOOL</h4>
            <p>MySCHOOL,
                Near UIT RGPV Bhopal,
                Madhya Pradesh - 442033<br />
                Phone: 8081350753 <br />
                www.MySCHOOL.com
            </p>

        </div>
    </div>
</div>
<!-- End Conatct us -->


