<?php
    include "db.php";
    if(isset($_POST['submit'])){
        $bname = $_POST['bname'];
        $author = $_POST['author'];
        $sub = $_POST['subb'];
        $group = $_POST['dept'];
        $ins = mysqli_query($con,"INSERT INTO `bookdata` (`BookName`, `Author`, `subject`, `department`) VALUES ('$bname','$author','$sub','$group')") or die(mysqli_error($con));
        if($ins){
            header('location:dashboard.php');
        }
    }
?>