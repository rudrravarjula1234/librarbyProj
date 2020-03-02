<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payfine</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="main">
        <div class="jumbotron text-center">
            <h1>Pay fines</h1>
        </div>
        <div class="container">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" class="row text-center" style="padding:10px">
                <span class="col-sm-2"></span>
                <lable for="rollno" class="col-sm-2">Enter roll number</lable>
                <input id="rollno" type="text" placeholder="enter roll number" class="col-sm-3" name="roll"/>
                <input type="submit" value="Get fines" class="col-sm-2" name="sub"/>
            </form>
            <div class="row text-center">
                
                <?php if(isset($_POST['sub'])){
                    include 'db.php';
                    $a = $_POST['roll'];
                    $qu = mysqli_query($con,"SELECT `fine` from `stddataa` where stdid='$a'");
                    if(mysqli_num_rows($qu) > 0){
                    $re = mysqli_fetch_Array($qu)[0];
                    ?>
                    <form class="row" action="fines.php" method="post">
                <span class="col-sm-2"></span>
                    <table class="table" style="width:60%" class="col-sm-4">
                    <tr>
                        <td>Current fine</td>
                        <td id="curfine"><?php echo $re?></td>
                    </tr>
                    <tr>
                        <td>fine to pay</td>
                        <td><input type="number" name="finepay" id="payablefine" min="0"/></td>
                        <input type="hidden" value="<?php echo $a ?>" name="roll"/>
                    </tr>
                    <tr>
                        <td>remaining fine</td>
                        <td id="remfine"></td>
                    </tr>
                    </table>
                    <input type="submit" value="pay fine" id="paybut" class="btn"/>
                </form>
                <?php
                    }
                    else{
                        echo "roll number not found";
                    }
                }?>
                
                
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#paybut').attr("disabled",true);
            $('#payablefine').change(function(){
                if(parseInt($("#curfine").text()) >= parseInt($('#payablefine').val())){
                    $("#remfine").text($("#curfine").text() - $('#payablefine').val());
                    $('#paybut').attr("disabled",false);
                }
                else{
                    alert("fine cant be more than current fine");
                    $('#payablefine').val(0)
                    $('#paybut').attr("disabled",true);
                }
                // if($("#curfine").text()>)
            });
        });
    </script>
</body>
</html>