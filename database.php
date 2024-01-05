<?php
$servername="localhost";
$username="root";
$password="";
$database="academic_calendar";
$con=mysqli_connect($servername,$username,$password,$database);
if(!$con)
{
    die("error detect".mysqli_error($con));
}
?>


