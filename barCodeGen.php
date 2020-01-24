<html>

<head>
    <style>
        p.inline {
            display: inline-block;
        }

        span {
            font-size: 13px;
        }
    </style>
    <style type="text/css" media="print">
        @page {
            size: auto;
            /* auto is the initial value */
            margin: 0mm;
            /* this affects the margin in the printer settings */

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
                echo "<p class='inline'><span ><font size=0.4px><b>IDEAL INSTITUTE OF TECHNOLOGY</b></font></span>" . bar128(stripcslashes($value)) . "</p>&nbsp&nbsp&nbsp&nbsp
                <p class='inline'><span ><font size=0.4px><b>IDEAL INSTITUTE OF TECHNOLOGY</b></font></span>" . bar128(stripcslashes($value)) . "</p><b>&nbsp&nbsp&nbsp&nbsp</b>";
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