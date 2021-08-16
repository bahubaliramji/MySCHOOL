$(document).ready(function () {

 $('#reg').click(function () {
        clearRegField();
    }) ;
 $('#login').click(function () {
        clearLogField();
    }) ;
$('#adminlogin').click(function () {
    clearAdminLogField();
    }) ;

// registration 
function clearRegField() {

    $('#stuRegForm').trigger("reset");
    $('#statusMsg1').html(" ");
    $('#statusMsg2').html(" ");
    $('#statusMsg3').html(" ");

}

// // student  login form 
function clearLogField() {

    $('#stuLogForm').trigger("reset");
    $('#statusLogMsg').html(" ");
}
// // admin login form 
function clearAdminLogField() {

    $('#adminLogForm').trigger("reset");
    $('#adminLogMsg').html(" ");
}



// this is used for student registration


// this is used for edit student and course 
$('#requpdate').click(function () {
    clearUpdateField();
}) ;
function clearUpdateField() {

    $('#updateForm').trigger("reset");
}


// for play video 


});