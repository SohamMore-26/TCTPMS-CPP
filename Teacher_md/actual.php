<?php
session_start();
include "config.php";
$name = $_SESSION['firstName'] . " " . $_SESSION['middleName'] . " " . $_SESSION['lastName'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && $con->connect_error == false) {

    $id = $_POST['row_id'];
    $actual_date = $_POST['actual_date'];
    $actual_coverage = $_POST['actual_coverage'];

    // Ensure $status is converted to a string for SQL query
    if (!is_string($id)) {
        $id = implode(',', $id);
    }
    if (!is_string($actual_coverage)) {
        $actual_coverage = implode('', $actual_coverage);
    }
    if (!is_string($actual_date)) {
        $actual_date = implode('', $actual_date);
    }

    $sql = "UPDATE `lesson_plan` SET `actual_date`='$actual_date',`actual_coverage`='$actual_coverage' WHERE id = '$id'";
    if ($con->query($sql) === TRUE) {
        echo "<script>";
        echo "alert('Done Successfully');";
        echo 'window.location.href="actual_lesson_plan.php";';
        echo "</script>";

    } else {
        echo "Error updating record: " . $con->error;
    }
}
