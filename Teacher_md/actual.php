<?php
session_start();
include "config.php";
$a = $_SESSION['firstName'] . " " . $_SESSION['middleName'] . " " . $_SESSION['lastName'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Loop through each set of data submitted
    for ($i = 0; $i < count($_POST['unit_name']); $i++) {


        $id = $_POST['row_id'][$i];
        $actual_date = $_POST['actual_date'][$i];
        $status = $_POST['status'][$i];
    }
    // Insert data into the database
    $sql = "UPDATE `lesson_plan` SET `status`='$status',`actual_date`='$actual_date' WHERE id = '$id'" or die(mysqli_error($con));
    if ($con->query($sql) === TRUE) {

        echo $status;
        echo "hello";
        // echo "<script>";
        // echo 'window.location.href="tch_courses.php";';
        // echo "</script>";
    } else {
        // echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>