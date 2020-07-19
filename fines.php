<?php
include 'db.php';
    $fine = $_POST['finepay'];
    $a = $_POST['roll'];
    $qa = mysqli_query($con,"UPDATE `stddataa` SET `fine`=(`fine`- $fine) where stdid = '$a'");
    if($qa){
        echo "sucess";
        header("location:payfine.php");
    }
?>