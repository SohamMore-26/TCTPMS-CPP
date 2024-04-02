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


    $sub = $_POST['unit_name'];
    // Loop through each set of data submitted
    for ($i = 0; $i < $sub; $i++) {

        $code = $_POST['code'][$i];

        // Insert data into the database
        $sql = "UPDATE `lesson_plan` SET `flag` = 'Approved', `approvedby` = '$a' WHERE flag = 'Not Approved' AND coursecode = '$code'" or die(mysqli_error($con));
        if ($con->query($sql) === TRUE) {
            
            echo "Hello";
            // echo die();
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
        } else {
            // echo "Error: " . $sql . "<br>" . $con->e$sql = "UPDATE `lesson_plan` SET `flag` = 'approved'" or die(mysqli_error($con));rror;
        }
    }
        
}
?>;