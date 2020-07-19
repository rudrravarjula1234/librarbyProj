<?php
include 'db.php';
    $getbooks = mysqli_query($con, "SELECT *,(SELECT COUNT(BookGuid) from `booksdata` where BookName = `bookdata`.`BookId`) AS total,(SELECT COUNT(BookGuid) from `booksdata` where BookName = `bookdata`.`BookId` && STATUS = false) AS available from `bookdata` where type = 1");
    $c = mysqli_query($con, "SELECT COUNT(*) from `bookdata` where type = 1");
    echo mysqli_fetch_array($c)[0];
    $interests = array();
    while ($row = mysqli_fetch_assoc($getbooks)) {
        $interests[] = $row;
    }
    
?>