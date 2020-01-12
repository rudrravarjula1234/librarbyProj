<?php
    include 'db.php';
    $book = $_GET['book'];
    $std = $_GET['std'];
    $bstate = mysqli_query($con,"SELECT `status` from `booksdata` where `booksdata`.`BookGuid` = '$book'");
    $bstate = mysqli_fetch_array($bstate)[0];
    if(($book != null || $book != "")&&($std != null || $std != "") && $bstate != 1){
        mysqli_autocommit($con,FALSE);
        $status = mysqli_query($con,"UPDATE `booksdata` SET `status` = true WHERE `booksdata`.`BookGuid` = '$book' and `booksdata`.`status` = false") ; 
        $tran = mysqli_query($con,"INSERT INTO `transaction` (`BookGiud`,`StdId`,`type`) VALUES('$book','$std',1)") ;
        $std = mysqli_query($con,"UPDATE `stddataa` SET `Books` = `Books` + 1  WHERE `stdid` = '$std'") ;
        if($status && $tran && $std){
            mysqli_commit($con);
            mysqli_autocommit($con,TRUE);
            echo 1;
        }
        else{
            mysqli_rollback($con);
            mysqli_autocommit($con,TRUE);
            echo "transaction failed";
        }

        
    }
    else{
        echo "invalid data";
    }
?>