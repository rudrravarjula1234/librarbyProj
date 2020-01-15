<?php
if (isset($_POST['submit'])) {
    $barcode = $_POST['barcode'];
    echo "<br />" . $barcode;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>
    </title>
</head>

<body>
    <form method="POST" action="barcode.php">
        <input type="text" name="barcode">
        <input type="submit" name="submit">
    </form>
</body>

</html>