<?php 
    include "db.php";
    $books = mysqli_query($con,"SELECT `BookGuid`,`stdid` from `booksdata` where `status` = true");
    while($row = mysqli_fetch_array($books)){
        $book = $row[0];
        $std = $row[1];
        $finedays = mysqli_query($con,"SELECT `type` from `stddataa` where `stdid` = '$std'");
        $finedays = mysqli_fetch_array($finedays)[0];
        $query = mysqli_query($con,"SELECT TIMESTAMPDIFF(DAY,(SELECT `StartDate` from `transaction` where `BookGiud` = '$book' ORDER BY `TranId` DESC LIMIT 1),CURRENT_TIMESTAMP)") ;
        $days = mysqli_fetch_array($query)[0];
        if($finedays == 1){
            if($days > 15){
                $fine = ($days - 15)*5; 
            }
            else{
                $fine = 0;
            }
        }
        elseif($finedays == 2){
            if($days > 180){
                $fine = ($days - 180)*5; 
            }
            else{
                $fine = 0;
            }
        }
        $query = mysqli_query($con,"UPDATE `stddataa` SET `running_fine`= $fine WHERE `stdid` = (SELECT `stdid` FROM `booksdata` Where `BookGuid` = '$book' LIMIT 1)");
        echo $days;
        echo "</br>";
    }
    
    
?>