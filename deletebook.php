<?php
    include "db.php";
    $a = $_POST['books'];
    $b = mysqli_query($con,"DELETE FROM `booksdata` WHERE `BookName` = '$a'") or die(mysqli_error($con));
    $c = mysqli_query($con,"DELETE FROM `bookdata` WHERE `BookId` = '$a'") or die(mysqli_error($con));
    if($b && $c) {   
    header('location:dashboard.php');
    }
    else
        echo "<script>alert('cant delete book');</script>"
    
?>