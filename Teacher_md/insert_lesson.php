<?php
session_start();
include "config.php";
$a = $_SESSION['teacherId'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Loop through each set of data submitted
    for ($i = 0; $i < count($_POST['unit_name']); $i++) {
        $lecno = $i+1;
        $sub = $_POST['sub'][$i];
        $code = $_POST['code'][$i];
        $planned_date = $_POST['planned_date'][$i];
        $unit_name = $_POST['unit_name'][$i];
        $course_outcome = $_POST['course_outcome'][$i];
        $unit_outcome = $_POST['unit_outcome'][$i];
        $topic = $_POST['topic'][$i];
        $sub_topic = $_POST['sub_topic'][$i];
        $teaching_aids = $_POST['teaching_aids'][$i];
        // Insert data into the database
        $sql = "INSERT INTO `lesson_plan`(`course`, `coursecode`, `lecno`, `planned_date`, `unit_name`, `course_outcome`, `unit_outcome`, `topic`, `sub_topic`, `teaching_aids`, `preparedby`) VALUES ('$sub','$code','$lecno','$planned_date','$unit_name','$unit_outcome','$course_outcome','$topic','$sub_topic','$teaching_aids','$a')" or die(mysqli_error($con));
        if ($con->query($sql) === TRUE) {
            echo "<script>";
            echo 'window.location.href="tch_lesson_plan_progress.php";';
            echo "</script>";
        } else {
            // echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
?>;