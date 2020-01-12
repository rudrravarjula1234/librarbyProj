<?php
    include "db.php";
    if(isset($_POST['submit'])){
        $bname = $_POST['sname'];
        $author = $_POST['rnum'];
        $group = $_POST['dept'];
        $ins = mysqli_query($con,"INSERT INTO `stddataa` (`stdid`, `stdname`, `group`, `Books`) VALUES ('$author','$bname','$group',0)") or die(mysqli_error($con));
        if($ins){
            header('location:dashboard.php');
        }
    }
?>