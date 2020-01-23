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
        include "db.php";
        include 'barCodelib.php';
        $bid = $_POST['bid'];
        $copies = $_POST['copy'];
        $bookname = $_POST['bname'];
        $uid = uniqid();
        $array = array();
        while ($copies > 0) {
            $copyid = $bid . $uid . $copies;
            $copies--;
            $qu = mysqli_query($con, "INSERT INTO `booksdata` (`BookGuid`,`BookName`) values('$copyid','$bid')") or die(mysqli_error($con));
            if ($qu) {
                array_push($array, $copyid);
            }
        }

        foreach ($array as $key => $value) {
            echo "<p class='inline'><span ><b>IDEAL INSTITUTE OF TECHNOLOGY</b></span>" . bar128(stripcslashes($value)) . "</p>&nbsp&nbsp&nbsp&nbsp
            <p class='inline'><span ><b>IDEAL INSTITUTE OF TECHNOLOGY</b></span>" . bar128(stripcslashes($value)) . "</p>&nbsp&nbsp&nbsp&nbsp";
        }
        ?>
    </div>
</body>

</html>