<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
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

        $sub = $_POST['sub'][$i];
        $code = $_POST['code'][$i];
        $lecno = $_POST['lecno'][$i];
        $unit_name = $_POST['unit_name'][$i];
        $course_outcome = $_POST['course_outcome'][$i];
        $unit_outcome = $_POST['unit_outcome'][$i];
        $topic = $_POST['topic'][$i];
        $sub_topic = $_POST['sub_topic'][$i];
        // Insert data into the database
        $sql = "INSERT INTO `syllabus`(`course`, `coursecode`, `lecno`, `unit_name`, `unit_outcome`, `course_outcome`, `topic`, `sub_topic`, `preparedby`) VALUES ('$sub','$code','$lecno','$unit_name','$unit_outcome','$course_outcome','$topic','$sub_topic','$a')" or die(mysqli_error($con));
        if ($con->query($sql) === TRUE) {

            echo "<script>
                swal({
                    title: 'Success',
                text: 'Syllabus Entred Successfully!',
                icon: 'success',
                button: 'OK'
              }).then(function () {
                window.location.href = 'tch_courses.php';
              });
            </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
?>
</body>
</html>