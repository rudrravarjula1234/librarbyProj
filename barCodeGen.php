<html>
<head>
<style>
p.inline {display: inline-block;}
span { font-size: 13px;}
</style>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
</style>
</head>
<body onload="window.print();">
	<div style="margin-left: 5%">
		<?php
		include 'barCodelib.php';
		$a = $_POST['barcodes'];
        $c = $_POST['var'];
        foreach ($a as $key => $value) {
            echo "<p class='inline'><span ><b>Item: $c[$key]</b></span>".bar128(stripcslashes($value))."</p>&nbsp&nbsp&nbsp&nbsp";
        }
		?>
	</div>
</body>
</html>

<?php
    
?>