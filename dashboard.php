<?php
error_reporting(0);
include 'db.php';
session_start();

//Checking User Logged or Not
//Restrict User or Moderator to Access Admin.php page
if (empty($_SESSION['user'])) {
    header('location:dashboard.php');
} else {

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
                <a class="nav-link active" id="mainmenu" data-toggle="tab" href="#dashboard">Dashboard Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="dbjrnls" data-toggle="tab" href="#dashboardjrnls">Dashboard Journals</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="stdmenu" data-toggle="tab" href="#addstd">People</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="bookmenu" data-toggle="tab" href="#addbook">Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="jornalsmenu" data-toggle="tab" href="#addjornals">Jornals</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="jornalsmenu" data-toggle="tab" href="#addjornals">Books Issue</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="jornalsmenu" data-toggle="tab" href="#addjornals">Books Return</a>
            </li>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </ul>
        <!-- Modal body -->

        <div class="tab-content">
            <a class="btn" href="logout.php">Logout</a>
            <a class="btn" href="finegen.php" target="_blank">Generate Fines</a>
            <div id="dashboard" class="container tab-pane active">
                <div id="dbgrid"></div>
            </div>
            <div id="dashboardjrnls" class="container tab-pane active">
                <div id="dbjgrid"></div>
            </div>
            <div id="addstd" class="container tab-pane fade">
                <div id="stdgrid"></div>
            </div>
            <div id="addbook" class="container tab-pane fade">
                <div id="bookgrid"></div>
            </div>
            <div id="addjornals" class="container tab-pane fade">
                <div id="jornalsgrid"></div>
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
        $('#mainmenu').click(function() {
            main_latest();
        });
        $('#dbjrnls').click(function() {
            dbj_latest();
        });
        $('#stdmenu').click(function() {
            std_latest();
        });
        $('#bookmenu').click(function() {
            book_latest();
        });
        $('#jornalsmenu').click(function() {
            jornals_latest();
        });
    });

    var code, code2, status, status1;
    //vvar x = setInterval(check_change, 1000);

    function main_latest() {
        $.ajax({
            url: "dashboardpage.php",
            success: function(result) {
                $("#dbgrid").html(result);
                code2 = result;

            }
        });
    }

    function jornals_latest() {
        $.ajax({
            url: "Jornals.php",
            success: function(result) {
                $("#jornalsgrid").html(result);
                code2 = result;

            }
        });
    }

    function dbj_latest() {
        $.ajax({
            url: "dashboardJornals.php",
            success: function(result) {
                $("#dbjgrid").html(result);
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