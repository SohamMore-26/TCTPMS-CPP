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
	$view = mysqli_query($con, "select * from academic_cal where id = '11'") or die(mysqli_error($con));
    ?>

<?php while ($row = mysqli_fetch_array($view)) {
extract($row);
    $sem_duration_from = $row['sem_duration_from'];
    $sem_duration_to = $row['sem_duration_to'];
   
    echo " Semester Start Date : $sem_duration_from " ;
    echo "           ";
    echo " Semester End Date : $sem_duration_to  " ;
    }?>