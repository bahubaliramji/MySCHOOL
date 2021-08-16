$(document).ready(function () {
    // $('#successMsg').hide();

    // ajax called for clear fields
    // $('#reg').click(function () {
    //     clearRegField();
    // }) ;
    // $('#login').click(function () {
    //     clearLogField();
    // }) ;



    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

    // ajax call for already exist email 
    $("#stuemail").on("keypress blur", function () {
        var stuemail = $("#stuemail").val();
        $.ajax({
            url: "Student/addstudent.php",
            method: "POST",
            data: {
                checkemail: "checkemail",
                stuemail: stuemail,

            },
            success: function (data) {
                // console.log(data);
                if(data != 0){
                    $("#statusMsg2").html('<small style="color:red;"> Email ID already used !</small>');
                    $("#stuRegBtn").attr("disabled", true);

                } else if(data == 0 && reg.test(stuemail)){
                    $("#statusMsg2").html('<small style="color:green;"> There You Go !</small>');
                    $("#stuRegBtn").attr("disabled", false);

                } else if (!reg.test(stuemail)) {
                    $("#statusMsg2").html('<small style="color:red;"> Please Enter valid Email e.g. example@mail.com !</small>');
                    $("#stuRegBtn").attr("disabled", false);
                }
                if(stuemail == "") {
                    $("#statusMsg2").html('<small style="color:red;">Please Enter Email !</small>');
                }
                // extra work related 
                // if(stuname == "") {
                //     $("#statusMsg1").html('<small style="color:red;"> Please Enter Name !</small>');
                // }
                // if(stupass == "") {
                //     $("#statusMsg3").html('<small style="color:red;"> Please Enter Password !</small>');
                // }
            },
        });
    });
});

$('#stuRegBtn').click(function () {



    // function addStu (){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();

    // checking form fields on form submission validation
    if (stuname.trim() == "") {
        $("#statusMsg1").html('<small style="color:red;"> Please Enter Name !</small>');
        $("#stuname").focus();
        return false;
    } else if (stuemail.trim() == "") {
        $("#statusMsg2").html('<small style="color:red;"> Please Enter Email !</small>');
        $("#stuemail").focus();
        return false;
    } else if (stuemail.trim() !== "" && !reg.test(stuemail)) {
        $("#statusMsg2").html('<small style="color:red;"> Please Enter valid Email e.g. example@mail.com !</small>');
        $("#stuemail").focus();
        return false;
    } else if (stupass.trim() == "") {
        $("#statusMsg3").html('<small style="color:red;"> Please Enter Password !</small>');
        $("#stupass").focus();
        return false;
    } else {


        $.ajax({
            url: 'Student/addstudent.php',
            method: 'POST',
            dataType: 'json',
            data: {
                stusignup: "stusignup",
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass,
            },
            success: function (data) {
                // console.log(data);
                if (data == 'OK') {

                    $("#successMsg").html('<span style="color:black; background-color:#33cc33;padding: 5px; box-shadow: 0px 5px 10px #009900; " class="alert alert-success">Registration Successful !</span>');
                    clearField();
                    $("#successMsg").fadeOut(3000);
                }
                else if (data == 'Failed') {
                    $("#successMsg").html('<span style="padding: 5px;ox-shadow: 0px 5px 10px black; " class="alert alert-danger">Unable to register</span>');

                } 
            },

        });
        // $('#successMsg').show(300, function () {
        //     $('#successMsg').html('Registration Successful !');
        // });
        //  clearField() ;
        //  $('#successMsg').fadeOut(3000);

    }

});

// empty all fields 

function clearField() {

    $('#stuRegForm').trigger("reset");
    $('#statusMsg1').html(" ");
    $('#statusMsg2').html(" ");
    $('#statusMsg3').html(" ");

}


// ajax call  for student login
function checkStuLogin() {

// $('#stuLoginBtn').click(function () {
    //  console.log("Login Clicked");
    var stuLogEmail = $("#stuLogemail").val();
    var stuLogPass = $("#stuLogpass").val();
    // var stuLogEmail = $("#adminLogemail").val();
    // var stuLogPass = $("#adminLogpass").val();
    $.ajax({
        url: "Student/addstudent.php",
        method: "POST",
        // dataType: "json",
        data: {
            checkLogemail: "checkLogemail",
             stuLogEmail: stuLogEmail,
             stuLogPass: stuLogPass,
         },
         success: function(data){
            //  console.log(data);

            if(data == 0){
                $("#statusLogMsg").html('<small style="padding: 5px;ox-shadow: 0px 5px 10px black; " class ="alert alert-danger">Invalid Email or Password !</small>');
            }
            else if(data == 1)
            {
                $("#statusLogMsg").html('<div class ="spinner-border text-success" role="status"></div>');
               
                setTimeout(()=>{
                    window.location.href = "index.php";
                },1000);
            }
        },
    });
 
}


// // ajax call  for admin login
function adminLogin() {

    // $('#stuLoginBtn').click(function () {
        //  console.log("Login Clicked");
        
        var adminLogEmail = $("#adminLogemail").val();
        var adminLogPass = $("#adminLogpass").val();
        $.ajax({
            url: "admin/adminlog.php",
            method: "POST",
            // dataType: "json",
            data: {
                checkLogemail: "checkLogemail",
                 adminLogEmail: adminLogEmail,
                 adminLogPass: adminLogPass,
             },
             success: function(data){
                //  console.log(data);
    
                if(data == 0){
                    $("#adminLogMsg").html('<small style="padding: 5px;ox-shadow: 0px 5px 10px black; " class ="alert alert-danger">Invalid Email or Password !</small>');
                }
                else if(data == 1)
                {
                    $("#adminLogMsg").html('<div class ="spinner-border text-success" role="status"></div>');
                    setTimeout(()=>{
                        window.location.href = "admin/adminDashboard.php";
                    },1000);
                }
            },
        });
     
    }
 