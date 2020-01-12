<?php
error_reporting(0);
include 'db.php';
session_start();

//Checking User Logged or Not
//Restrict User or Moderator to Access Admin.php page
if(empty($_SESSION['user'])){
 header('location:dashboard.php');
}
else{
       
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Modal Header -->

    <ul class="nav nav-tabs modal-header">

        <li class="nav-item">
            <a class="nav-link active" id="mainmenu" data-toggle="tab" href="#dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="stdmenu" data-toggle="tab" href="#addstd">Students</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="bookmenu" data-toggle="tab" href="#addbook">Books</a>
        </li>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </ul>
    <!-- Modal body -->

    <div class="tab-content">
        <a class="btn" href="logout.php">Logout</a>
        <div id="dashboard" class="container tab-pane active">
            <div id="dbgrid"></div>
        </div>
        <div id="addstd" class="container tab-pane fade">
            
            <div id="stdgrid"></div>
        </div>
        <div id="addbook" class="container tab-pane fade">
            
            <div id="bookgrid"></div>
        </div>
        
        <div id="menu2" class="container tab-pane fade"><br></div>
    </div>

</body>

</html>
<?php
}
?>
<script type="text/javascript">
$(document).ready(function() {
    main_latest();
    $('#mainmenu').click(function(){
        main_latest();
    });
    $('#stdmenu').click(function(){
        std_latest();
    });
    $('#bookmenu').click(function(){
        book_latest();
    });
    
});

var code, code2, status, status1;
//vvar x = setInterval(check_change, 1000);

function check_change() {
    $.ajax({
        url: "getdata.php",
        success: function(calling) {
            code = calling;
        }
    });
    if (code == code2) {

    } else {
        $("#signup").html(code);
        code2 = code;
    }
}
function main_latest() {
    $.ajax({
        url: "dashboardpage.php",
        success: function(result) {
            $("#dbgrid").html(result);
            code2 = result;

        }
    });
}
function std_latest() {
    $.ajax({
        url: "studentpage.php",
        success: function(result) {
            $("#stdgrid").html(result);
            code2 = result;

        }
    });
}
function book_latest() {
    $.ajax({
        url: "bookspage.php",
        success: function(result) {
            $("#bookgrid").html(result);
            code2 = result;

        }
    });
}
</script>