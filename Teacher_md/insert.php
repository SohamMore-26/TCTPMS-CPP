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

        $lecno = $_POST['lecno'][$i];
        $sub = $_POST['course'][$i];
        $unit_name = $_POST['unit_name'][$i];
        $unit_outcome = $_POST['unit_outcome'][$i];
        $topic = $_POST['topic'][$i];
        $sub_topic = $_POST['sub_topic'][$i];

        // Insert data into the database
        $sql = "INSERT INTO `syllabus`(`course` , `lecno`, `unit_name`, `unit_outcome`, `topic`, `sub_topic`,`preparedby`) VALUES ('$sub','$lecno','$unit_name','$unit_outcome','$topic','$sub_topic','$a')" or die(mysqli_error($con));
        if ($con->query($sql) === TRUE) {

            echo "<script>";
            echo 'window.location.href="tch_courses.php";';
            echo "</script>";
        } else {
            // echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
?>; 