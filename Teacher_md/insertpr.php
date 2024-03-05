<?php
session_start();
include "config.php";
$a = $_SESSION['firstName'] . " " . $_SESSION['middleName'] . " " . $_SESSION['lastName'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

      
    
    // Loop through each set of data submitted
    for ($i = 0; $i < count($_POST['pr_topic']); $i++) {

        $lecno = $_POST['lecno'][$i];
        $sub = $_POST['course'][$i];
        $unit_no = $_POST['unit_no'][$i];
        $pr_outcome = $_POST['pr_outcome'][$i];
        $pr_topic = $_POST['pr_topic'][$i];

        $view = mysqli_query($con, "select * from courseinfo where courseAbrevation = '$sub'" ) or die(mysqli_error($con));
        $row = mysqli_fetch_array($view);
        $code= $row['courseCode'];
        // Insert data into the database
        $sql = "INSERT INTO `pr_syllabus`(`course` ,`coursecode`,`pr_no`, `unit_no`, `pr_outcome`, `pr_topic`, `preparedby`)VALUES ('$sub' ,'$code','$lecno','$unit_no','$pr_outcome','$pr_topic','$a')" or die(mysqli_error($con));
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