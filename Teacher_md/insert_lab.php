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

    // Loop through each set of data submitted
    for ($i = 0; $i < count($_POST['pr_no']); $i++) {
        $aca_year = $_POST['aca_year'][$i];
        $sem = $_POST['sem'][$i];
        $sch = $_POST['sch'][$i];
        $div = $_POST['division'][$i];
        $batch = $_POST['batch'][$i];
        $pr_no = $_POST['pr_no'][$i];
        $sub = $_POST['sub'][$i];
        $code = $_POST['code'][$i];
        $planned_date = $_POST['planned_date'][$i];
        $unit_name = $_POST['unit_name'][$i];
        $course_outcome = $_POST['course_outcome'][$i];
        $pr_outcome = $_POST['pr_outcome'][$i];
        $topic = $_POST['topic'][$i];
        // Insert data into the database
        $sql = "INSERT INTO `lab_plan`(`aca_year`, `semester`, `scheme`,`division`, `batch`, `course`, `coursecode`, `pr_no`, `planned_date`, `unit_name`, `course_outcome`, `pr_outcome`, `topic`,`preparedby`) VALUES ('$aca_year','$sem','$sch','$div','$batch','$sub','$code','$pr_no','$planned_date','$unit_name','$course_outcome','$pr_outcome','$topic','$a')" or die(mysqli_error($con));
        if ($con->query($sql) === TRUE) {
            echo "<script>
            swal({
                title: 'Success',
                text: 'Laboratory Plan Sent For Approval Successfully!',
                icon: 'success',
                button: 'OK'
            }).then(function() {
                window.location.href = 'tch_lab_plan_progress.php'; 
            });
            </script>";
        } else {
            // echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
?>;