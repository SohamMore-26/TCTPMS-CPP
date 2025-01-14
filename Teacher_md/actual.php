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
    $name = $_SESSION['firstName'] . " " . $_SESSION['middleName'] . " " . $_SESSION['lastName'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $con->connect_error == false) {

        $id = $_POST['row_id'];
        $actual_date = $_POST['actual_date'];
        $actual_coverage = $_POST['actual_coverage'];
        $assignment = $_POST['assignment'];

        // Ensure $status is converted to a string for SQL query
        if (!is_string($id)) {
            $id = implode(',', $id);
        }
        if (!is_string($assignment)) {
            $assignment = implode('', $assignment);
        }
        if (!is_string($actual_coverage)) {
            $actual_coverage = implode('', $actual_coverage);
        }
        if (!is_string($actual_date)) {
            $actual_date = implode('', $actual_date);
        }

        $sql = "UPDATE `lesson_plan` SET `actual_date`='$actual_date',`actual_coverage`='$actual_coverage' ,`assignment`='$assignment' WHERE id = '$id'";
        if ($con->query($sql) === TRUE) {
            echo "<script>
            swal({
            title: 'Success',
            text: 'Lesson Plan Updated Successfully!',
            icon: 'success',
            button: 'OK'
            }).then(function() {
            window.location.href = 'tch_lesson_plan_progress.php'; 
            });
            </script>";

        } else {
            echo "Error updating record: " . $con->error;
        }
    }
    ?>
</body>

</html>