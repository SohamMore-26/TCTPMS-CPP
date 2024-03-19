<?php
session_start();
include "config.php";
$name = $_SESSION['firstName'] . " " . $_SESSION['middleName'] . " " . $_SESSION['lastName'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && $con->connect_error == false) {

    $id = $_POST['row_id'];
    $actual_date = $_POST['actual_date'];
    $status = $_POST['status'];
    $actual_coverage = $_POST['actual_coverage'];

    // Ensure $status is converted to a string for SQL query
    if (!is_string($status)) {
        $status = implode(',', $status);
    }
    if (!is_string($id)) {
        $id = implode(',', $id);
    }
    if (!is_string($actual_coverage)) {
        $actual_coverage = implode('', $actual_coverage);
    }
    if (!is_string($actual_date)) {
        $actual_date = implode('', $actual_date);
    }

    $sql = "UPDATE `lab_plan` SET `status`='$status',`actual_date`='$actual_date',`actual_coverage`='$actual_coverage' WHERE id = '$id'";    
    if ($con->query($sql) === TRUE) {
        echo "<script>";
        echo "alert('Done Successfully');";
        echo 'window.location.href="actual_lab_plan.php";';
        echo "</script>";
        
    } else {
        echo "Error updating record: " . $con->error;
    }
}
            echo 'window.location.href="tch_courses.php";';
