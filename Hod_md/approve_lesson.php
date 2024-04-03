<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

</body>

</html>
<?php
session_start();
include "config.php";
$a = $_SESSION['teacherId'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sub = $_POST['lec_no'];
    // Loop through each set of data submitted
    $code = $_POST['code'];

    if (!is_string($code)) {
        $code = implode($code);
    }

    $codez = substr($code, 0, 5); // Extract the first 5 characters of the entire data

    for ($i = 0; $i < $sub; $i++) {
        // Insert data into the database
        $sql = "UPDATE `lesson_plan` SET `flag` = 'Approved', `approvedby` = '$a' WHERE flag = 'Not Approved' AND coursecode = '$codez'";
        if ($con->query($sql) === TRUE) {
            // Display SweetAlert
            echo "<script>
                    swal({
                        title: 'Success',
                        text: 'Lesson Plan is Approved!',
                        icon: 'success',
                        button: 'OK'
                    }).then(function() {
                        window.location.href = 'hod_approval.php'; 
                    });
                </script>";
            exit(); // Terminate PHP execution after redirecting
        } else {
            // Handle error
            echo "Error: " . $con->error;
        }
    }
}
?>