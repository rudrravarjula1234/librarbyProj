<?php
    include 'db.php';
    $book = $_GET['book'];
    $std = $_GET['std'];
    $bstate = mysqli_query($con,"SELECT `status` from `booksdata` where `booksdata`.`BookGuid` = '$book'");
    $bstate = mysqli_fetch_array($bstate)[0];
    $limit = mysqli_query($con,"SELECT CASE
    WHEN `type` = 1 THEN `Books` < 3
    WHEN `type` = 2 THEN `Books` < 4
    END
    FROM `stddataa` WHERE `stdid` = $std") or die(mysqli_error($con));
    $limit = mysqli_fetch_array($limit)[0];
    echo $bstate != 1;
    echo $limit;
    if(($book != null || $book != "")&&($std != null || $std != "") && $bstate != 1 && $limit){
        mysqli_autocommit($con,FALSE);
        $status = mysqli_query($con,"UPDATE `booksdata` SET `status` = true , `stdid` = '$std' WHERE `booksdata`.`BookGuid` = '$book' and `booksdata`.`status` = false") ; 
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