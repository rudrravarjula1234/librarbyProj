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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script type='text/javascript'>
            $(document).ready(function() {
                $('#myForm input').keydown(function(e) {
                    if (e.keyCode == 13) {

                        if ($(':input:eq(' + ($(':input').index(this) + 1) + ')').attr('type') == 'submit') { // check for submit button and submit form on enter press
                            return true;
                        }

                        $(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();

                        return false;
                    }

                });
            });
        </script>
    </head>

    <body>
        <!-- Modal Header -->

        <ul class="nav nav-tabs modal-header" id="myForm">

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
                <a class="nav-link" id="bookTake" data-toggle="tab" href="#takebook">Books Issue</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="bookReturn" data-toggle="tab" href="#returnbook">Books Return</a>
            </li>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </ul>
        <!-- Modal body -->

        <div class="tab-content">
            <a class="btn" href="logout.php">Logout</a>
            <a class="btn" href="finegen.php" target="_blank">Generate Fines</a>
            <div id="dashboard" class="container-fluid tab-pane active">
                <div id="dbgrid"></div>
            </div>
            <div id="dashboardjrnls" class="container-fluid tab-pane active">
                <div id="dbjgrid"></div>
            </div>
            <div id="addstd" class="container-fluid tab-pane fade">
                <div id="stdgrid"></div>
            </div>
            <div id="addbook" class="container-fluid tab-pane fade">
                <div id="bookgrid"></div>
            </div>
            <div id="addjornals" class="container-fluid tab-pane fade">
                <div id="jornalsgrid"></div>
            </div>
            <div id="takebook" class="container-fluid tab-pane active">
                <div id="tbgrid"></div>
            </div>
            <div id="returnbook" class="container-fluid tab-pane active">
                <div id="rbgrid"></div>
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
        $('#bookTake').click(function() {
            btake_latest();
        });
        $('#bookReturn').click(function() {
            breturn_latest();
        });

    });

    function clerotherdivs(a) {
        var array = ["#dbgrid", "#jornalsgrid", "#dbjgrid", "#stdgrid", "#bookgrid", "#tbgrid", "#rbgrid"];
        array.forEach(element => {
            if (element != a) {
                $(element).empty();
            }
        });
    }
    var code, code2, status, status1;
    //vvar x = setInterval(check_change, 1000);

    function main_latest() {
        $.ajax({
            url: "dashboardpage.php",
            beforeSend: function() {
                $('#dbgrid').html('<h1 class="loader"></h1>');
            },
            
            success: function(result) {
                clerotherdivs("#dbgrid");
                $("#dbgrid").html(result);
                code2 = result;
            }
        });
    }

    function jornals_latest() {
        $.ajax({
            url: "Jornals.php",
            success: function(result) {
                clerotherdivs("#jornalsgrid");
                $("#jornalsgrid").html(result);
                code2 = result;
            }
        });
    }

    function dbj_latest() {
        $.ajax({
            url: "dashboardJornals.php",
            success: function(result) {
                clerotherdivs("#dbjgrid");
                $("#dbjgrid").html(result);
                code2 = result;
            }
        });
    }

    function std_latest() {
        $.ajax({
            url: "studentpage.php",
            success: function(result) {
                clerotherdivs("#stdgrid");
                $("#stdgrid").html(result);
                code2 = result;
            }
        });
    }

    function book_latest() {
        $.ajax({
            url: "bookspage.php",
            success: function(result) {
                clerotherdivs("#bookgrid");
                $("#bookgrid").html(result);
                code2 = result;
            }
        });
    }

    function btake_latest() {
        $.ajax({
            url: "barcode.php",
            success: function(result) {
                clerotherdivs("#tbgrid");
                $("#tbgrid").html(result);
                code2 = result;
            }
        });
    }

    function breturn_latest() {
        $.ajax({
            url: "barcodereturn.php",
            success: function(result) {
                clerotherdivs("#rbgrid");
                $("#rbgrid").html(result);
                code2 = result;
            }
        });
    }
</script>