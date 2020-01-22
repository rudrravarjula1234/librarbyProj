<?php
    include "db.php";
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $dop = $_POST['dop'];
        $mop = $_POST['mop'];
        $yop = $_POST['yop'];
        $volume = $_POST['volume'];
        $num = $_POST['num'];
        $dor = $_POST['dor'];
        $ond = $_POST['ond'];
        $ddnd = $_POST['ddnd'];
        $amount = $_POST['amount'];
        $lii = $_POST['lii'];
        $remarks = $_POST['remarks'];
        $ins = mysqli_query($con,"INSERT INTO `bookdata` (`BookName`, `edition`, `type` ) VALUES ('$name','$volume',2)") or die(mysqli_error($con));
        
        if($ins){
            $id = mysqli_insert_id($con);
            $ins1 = mysqli_query($con,"INSERT INTO `joraddinfo`(`BookID`, `dateofpub`, `monthofpub`, `yearofpub`, `number`, `dteofrecived`, `ordernum`, `amount`, `libinitials`, `remarks`,`ddnum`) VALUES ('$id','$dop','$mop','$yop','$num','$dor','$ond','$amount','$lii','$remarks','$ddnd')") or die(mysqli_error($con));
            if($ins1){
                header('location:dashboard.php');
            }
        }
    }
?>