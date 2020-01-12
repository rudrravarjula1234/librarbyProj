<?php
    include 'db.php';
    $book = $_GET['book'];
    $std = mysqli_query($con,"SELECT `StdId` from `transaction` where BookGiud = '$book' ORDER BY `TranId` DESC LIMIT 1");
    $std = mysqli_fetch_array($std)[0];
    
    if(($book != null || $book != "")&&($std != null || $std != "")){
        mysqli_autocommit($con,FALSE);
        $status = mysqli_query($con,"UPDATE `booksdata` SET `status` = false WHERE `booksdata`.`BookGuid` = '$book'");
        $tran = mysqli_query($con,"INSERT INTO `transaction` (`BookGiud`,`StdId`,`type`) VALUES('$book','$std',2)");
        $std = mysqli_query($con,"UPDATE `stddataa` SET `Books` = `Books` - 1  WHERE `stdid` = '$std' and `Books` > 0 ");
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
        echo "invalied data";
    }
?>