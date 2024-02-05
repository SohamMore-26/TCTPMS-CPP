<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
	include "config.php";
	$view = mysqli_query($con, "select * from timetable") or die(mysqli_error($con));
    ?>

<?php { extract($row);?>
    $aca_year = $row['aca_year'];$aca_year = $row['aca_year'];
    echo $aca_year;<?php } ?>