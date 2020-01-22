<?php
    include "db.php";
    if(isset($_POST['submit'])){
        $name = $_POST['bname'];
        $date = $_POST['date'];
        $acnum = $_POST['acnum'];
        $cnum = $_POST['cnum'];
        $bname = $_POST['bname'];
        $author = $_POST['author'];
        $source = $_POST['subb'];
        $inum = $_POST['inum'];
        $pp = $_POST['pp'];
        $yop = $_POST['yop'];
        $pages = $_POST['pages'];
        $bsize = $_POST['bsize'];
        $edition = $_POST['edition'];
        $cost = $_POST['cost'];
        $remarks = $_POST['remarks'];
        $ins = mysqli_query($con,"INSERT INTO `bookdata` (`BookName`, `edition`, `type` ) VALUES ('$name','$edition',1)") or die(mysqli_error($con));
        
        if($ins){
            $id = mysqli_insert_id($con);
            $ins1 = mysqli_query($con,"INSERT INTO `booksaddinfo`(`remarks`, `date` , `Accession_num`, `BookId`, `call_num`, `author`, `source`, `invoice_num`, `pandp`, `yearofpub`, `pages`, `booksize`, `cost`) VALUES ('$remarks','$date','$acnum','$id','$cnum','$author','$source','$inum','$pp','$yop','$pages','$bsize','$cost')") or die(mysqli_error($con));
            if($ins1){
               header('location:dashboard.php');
            }
        }
        else{
            echo "<script>alert('error in inserting book');</script>";
            header('location:dashboard.php');
        }
    }
?>