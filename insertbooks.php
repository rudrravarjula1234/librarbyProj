<?php
    include "db.php";
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $date = $POST['date'];
        $acnum = $POST['acnum'];
        $cnum = $POST['cnum'];
        $bname = $POST['bname'];
        $author = $POST['author'];
        $source = $POST['source'];
        $inum = $POST['inum'];
        $pp = $POST['pp'];
        $yop = $POST['yop'];
        $pages = $POST['pages'];
        $bsize = $POST['bsize'];
        $edition = $POST['edition'];
        $cost = $POST['cost'];
        $remarks = $_POST['remarks'];
        $ins = mysqli_query($con,"INSERT INTO `bookdata` (`BookName`, `edition`, `type` ) VALUES ('$name','$edition',1)") or die(mysqli_error($con));
        
        if($ins){
            $id = mysqli_insert_id($con);
            $ins1 = mysqli_query($con,"INSERT INTO `booksaddinfo`(`remarks`, `date` , `Accession_num`, `BookId`, `call_num`, `author`, `source`, `invoice_num`, `pandp`, `yearofpub`, `pages`, `booksize`, `cost`) VALUES ('$remarks','$date','$acnum','$id','$cnum','$author','$source','$inum','$pp','$yop','$bsize','$pages','$bsize','$cost')");
            if($ins1){
               header('location:dashboard.php');
            }
        }
    }
?>