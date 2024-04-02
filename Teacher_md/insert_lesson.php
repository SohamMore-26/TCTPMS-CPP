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
    $a = $_SESSION['teacherId'];


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        // Prepare the SQL statement
        $stmt = $con->prepare("INSERT INTO `lesson_plan`(`aca_year`, `course`, `coursecode`, `sem`, `sch`, `div1`, `lecno`, `planned_date`, `unit_name`, `course_outcome`, `unit_outcome`, `topic`, `sub_topic`, `teaching_aids`,`preparedby`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");

        // Loop through each set of data submitted
        for ($i = 0; $i < count($_POST['unit_name']); $i++) {
            $lecno = $i + 1;
            $sub = $_POST['sub'][$i];
            $code = $_POST['code'][$i];
            $acaYear = $_POST['acaYear'][$i];
            $sem = $_POST['sem'][$i];
            $sch = $_POST['sch'][$i];
            $div = $_POST['div'][$i];
            $planned_date = $_POST['planned_date'][$i];
            $unit_name = $_POST['unit_name'][$i];
            $course_outcome = $_POST['course_outcome'][$i];
            $unit_outcome = $_POST['unit_outcome'][$i];
            $topic = $_POST['topic'][$i];
            $sub_topic = $_POST['sub_topic'][$i];
            $teaching_aids = $_POST['teaching_aids'][$i];

            // Bind parameters
            $stmt->bind_param("sssssssssssssss", $acaYear, $sub, $code, $sem, $sch, $div, $lecno, $planned_date, $unit_name, $course_outcome, $unit_outcome, $topic, $sub_topic, $teaching_aids, $a);

            // Execute the query
            if ($stmt->execute()) {
                // Success message
                 echo "<script>
                swal({
                    title: 'Success',
                    text: 'Lesson Plan Sent For Approval Successfully!',
                    icon: 'success',
                    button: 'OK'
                }).then(function() {
                    window.location.href = 'tch_lesson_plan_progress.php'; 
                });
                </script>";
            } else {
                // Error handling
                echo "Error: " . $stmt->error;
            }
        }

        // Close the statement
        $stmt->close();
    }

    ?>
</body>

</html>