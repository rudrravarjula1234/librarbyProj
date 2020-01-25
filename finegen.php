<?php
include "db.php";
$books = mysqli_query($con, "SELECT `BookGuid` from `booksdata` where `status` = true");
while ($row = mysqli_fetch_array($books)) {
    $book = $row[0];
    $query = mysqli_query($con, "SELECT TIMESTAMPDIFF(DAY,(SELECT `StartDate` from `transaction` where `BookGiud` = '$book' ORDER BY `TranId` DESC LIMIT 1),CURRENT_TIMESTAMP)");
    $days = mysqli_fetch_array($query)[0];
    if ($days > 5) {
        $fine = ($days - 5) * 5;
    } else {
        $fine = 0;
    }
    $query = mysqli_query($con, "UPDATE `stddataa` SET `fine`= `fine` + 1 WHERE `stdid` = (SELECT `stdid` FROM `booksdata` Where `BookGuid` = '$book' LIMIT 1)");
    echo $days;
    echo "</br>";
    header('location:dashboard.php');
}
