<?php
include 'db.php';
$book = $_GET['book'];
$std = mysqli_query($con, "SELECT `StdId` from `transaction` where BookGiud = '$book' ORDER BY `TranId` DESC LIMIT 1");
$std = mysqli_fetch_array($std)[0];

if (($book != null || $book != "") && ($std != null || $std != "")) {
    mysqli_autocommit($con, FALSE);
    $query = mysqli_query($con, "SELECT TIMESTAMPDIFF(DAY,(SELECT `StartDate` from `transaction` where `BookGiud` = '$book' ORDER BY `TranId` DESC LIMIT 1),CURRENT_TIMESTAMP)");
    $days = mysqli_fetch_array($query)[0];
    if ($days > 5) {
        $fine = ($days - 5) * 5;
    } else {
        $fine = 0;
    }
    $status = mysqli_query($con, "UPDATE `booksdata` SET `status` = false , `stdid`=null WHERE `booksdata`.`BookGuid` = '$book'");
    $tran = mysqli_query($con, "INSERT INTO `transaction` (`BookGiud`,`StdId`,`type`) VALUES('$book','$std',2)");
    $std = mysqli_query($con, "UPDATE `stddataa` SET `Books` = `Books` - 1, `fine` = `fine` + $fine  WHERE `stdid` = '$std' and `Books` > 0 ");
    if ($status && $tran && $std) {
        mysqli_commit($con);
        mysqli_autocommit($con, TRUE);
        // echo 1;
        header('location:dashboard.php');
    } else {
        mysqli_rollback($con);
        mysqli_autocommit($con, TRUE);
        echo "transaction failed";
    }
} else {
    echo "invalied data";
}
