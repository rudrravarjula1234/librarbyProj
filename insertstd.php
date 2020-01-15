<?php
    include "db.php";
    if(isset($_POST['submit'])){
        $bname = $_POST['sname'];
        $author = $_POST['rnum'];
        $group = $_POST['dept'];
        $type = $_POST['type'];
        echo $type;
        $ins = mysqli_query($con,"INSERT INTO `stddataa` (`stdid`, `stdname`, `group`, `Books`,`type`) VALUES ('$author','$bname','$group',0,$type)") or die(mysqli_error($con));
        if($ins){
            header('location:dashboard.php');
        }
    }
?>