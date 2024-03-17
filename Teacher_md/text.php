<?php
include "config.php";

// Check if lastDate parameter is received
if (isset($_POST['lastDate'])) {
    // Decode the JSON array received from JavaScript
    $lastDate = json_decode($_POST['lastDate']);

    // Loop through the array and insert each date into the database
    foreach ($lastDate as $lectureDate) {
        mysqli_query($con, "INSERT INTO `test` (`date`) VALUES ('$lectureDate') ") or die(mysqli_error($con));
    }

    echo "Lecture dates inserted successfully.";
} else {
    echo "Error: No lecture dates received.";
}
?>