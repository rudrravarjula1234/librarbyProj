<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript">
        function delayedRedirect() {
            window.location = "dashboard.php"
        }
    </script>
    <script>
        alert("Return Successful");
    </script>
</head>

<body onLoad="setTimeout('delayedRedirect()', 2000)">
    <h1>Return Successful</h1>
</body>

</html>