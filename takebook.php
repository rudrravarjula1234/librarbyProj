<?php
    include 'db.php';
    $book = $_GET['book'];
    $std = $_GET['std'];
    if(($book != null || $book != "")&&($std != null || $std != "")){
        $tran = mysqli_query($con,"INSERT INTO `transaction` (`BookGiud`,`StdId`,`type`) VALUES('$book','$std',1)");
        if($tran){
            $status = mysqli_query($con,"UPDATE `booksdata` SET `status` = '1' WHERE `booksdata`.`BookGuid` = $book");
            if($status){
                $std = mysqli_query($con,"UPDATE `stddataa` SET `Books` = (SELECT (Books+1) FROM `stddata` WHERE `stdid` = '$std') WHERE WHERE `stdid` = '$std'");
                if($std){
                    echo 1;
                }
            }
            else{
                echo 0;
            }
        }
        else{
            echo 0;
        }
    }
    else{
        echo "invalied data";
    }
?>