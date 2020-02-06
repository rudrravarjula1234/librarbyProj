<?php
include "db.php";
if (isset($_POST['submit'])) {
    // $til = $_POST['til'];
    $preE = $_POST['preE'];
    $pus = $_POST['pus'];
    $SubNo = $_POST['SubNo'];
    $adt = $_POST['adt'];
    $fdt = $_POST['fdt'];
    $Subanm = $_POST['Subanm'];
    $frmto = $_POST['frmto'];
    $pervol = $_POST['pervol'];
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
    $ins = mysqli_query($con, "INSERT INTO `bookdata` (`BookName`, `edition`, `type` ) VALUES ('$name','$volume',2)") or die(mysqli_error($con));

    if ($ins) {
        $id = mysqli_insert_id($con);
        $ins1 = mysqli_query($con, "INSERT INTO `joraddinfo`(`BookID`, `dateofpub`, `monthofpub`, `yearofpub`, `number`, `dteofrecived`, `ordernum`, `amount`, `libinitials`, `remarks`,`ddnum`,`PERIOD`,`PUB`,`SUBNo`,`Dt`,`subrupees`,`fromto`,`perVol`,`Fdt`) VALUES ('$id','$dop','$mop','$yop','$num','$dor','$ond','$amount','$lii','$remarks','$ddnd','$preE','$pus','$SubNo','$adt','$Subanm','$frmto','$pervol','$fdt')") or die(mysqli_error($con));
        if ($ins1) {
            header('location:dashboard.php');
        }
    }
}
