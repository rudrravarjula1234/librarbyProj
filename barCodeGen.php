<html>

<head>
    <style>
        p.inline {
            display: inline-block;
            padding-block: 150px;
        }

        span {
            font-size: 20px;
            padding-left: 2px;
        }
    </style>
    <style type="text/css" media="print">
        @page {
            size: A6 portrait;
            /* auto is the initial value */
            margin: 0mm;
            /* this affects the margin in the printer settings */

        }
    </style>
    <style>
        p {
            padding: 4px;
            margin-top: 0mm;
            margin-left: -1mm;
            margin-right: 6mm;
            border: 1px solid #4CAF50;
        }
        

    </style>
</head>

<body onload="window.print();">
    <div style="margin-left: 5%">
        <?php
        include 'barCodelib.php';
        include "db.php";
        $a = $_POST['barcodes'];
        $c = $_POST['var'];
        if (isset($_POST['gen'])) {
            foreach ($a as $key => $value) {
                echo "<p class='inline align'><span ><font size = 1.5px><b>Ideal Institute of Technology</b></font></span>" . bar128(stripcslashes($value)) . "</p>&nbsp&nbsp&nbsp&nbsp";
                echo "<p class='inline align'><span ><font size = 1.5px><b>Ideal Institute of Technology</b></font></span>" . bar128(stripcslashes($value)) . "</p>&nbsp&nbsp&nbsp&nbsp";
            }
        }
        if (isset($_POST['delete'])) {
            foreach ($a as $key => $value) {
                mysqli_query($con, "DELETE FROM `stddataa` WHERE `stdid` = '$value'");
            }
            echo "<script>window.close()</script>";
        }
        if (isset($_POST['remove'])) {
            foreach ($a as $key => $value) {
                mysqli_query($con, "DELETE FROM `booksdata` WHERE `BookGuid` = '$value'");
            }
            echo "<script>window.close()</script>";
        }
        ?>
    </div>
</body>

</html>

<?php

?>