<?php
include "config.php";

// Fetching unique 'scheme' values from the database
$scheme_query = "SELECT DISTINCT scheme FROM academic_cal";
$scheme_result = mysqli_query($con, $scheme_query);

// Check if the query was successful
if (!$scheme_result) {
    die('Error fetching schemes: ' . mysqli_error($con));
}

// Fetching distinct semesters from the database
$semester_query = "SELECT DISTINCT semester FROM academic_cal";
$semester_result = mysqli_query($con, $semester_query);

// Check if the query was successful
if (!$semester_result) {
    die('Error fetching semesters: ' . mysqli_error($con));
}

// Fetch data to populate the form if editing an existing record
$row2 = [];
if (isset($_GET['id'])) {
    $view2 = mysqli_query($con, "SELECT * FROM academic_cal WHERE id = '" . $_GET['id'] . "'") or die(mysqli_error($con));
    $row2 = mysqli_fetch_array($view2);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TCTPMS-CPP/css/stylest.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Academic Time Table</title>
</head>

<body>

    <!-- Navigation Bar -->
    <div class="nav_head">
        <div class="title_div">
            <h1 id="h1">Teacher's Companion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Welcome Admin</h1>
        </div>
        <div class="lgt_div">
            <a href="\TCTPMS-CPP\logout.php">
                <button type="button" id="button_lg" class="button">Logout</button>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main_cont">
        <div class="sidebar">
            <li>
                <div class="side_card">
                    <a href="adm_home.php">
                        <ul><span class="material-symbols-outlined">home</span> Home</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="adm_AcademicCal.php">
                        <ul><span class="material-symbols-outlined">calendar_clock</span> Academic Calendar</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="adm_courses.php">
                        <ul><span class="material-symbols-outlined">menu_book</span> Courses</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="adm_timetable.php">
                        <ul><span class="material-symbols-outlined">today</span> Time Table</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="adm_teacher.php">
                        <ul><span class="material-symbols-outlined">group</span> Teacher</ul>
                    </a>
                </div>
            </li>
        </div>

        <div class="main_c_cont_at">
            <form method="post">
                <div style="margin-top:100px">
                    <h1 id="h1">Update Academic Calendar</h1>
                    <div class="branch_cont">
                        <b><label for="semester" class="label">Semester:</label></b>
                        <select id="semester" name="semester" class="sem">
                            <option value="inp">Select Semester</option>
                            <?php
                            // Dynamically populate the semester dropdown
                            while ($semester = mysqli_fetch_assoc($semester_result)) {
                                $selected = ($row2['semester'] == $semester['semester']) ? 'selected' : '';  // Mark the current semester as selected
                                echo "<option value='" . $semester['semester'] . "' $selected>" . $semester['semester'] . "</option>";
                            }
                            ?>
                        </select>

                        <b><label for="scheme" class="label">Scheme:</label></b>
                        <select id="scheme" name="scheme" class="sem">
                            <option value="inp">Select Scheme</option>
                            <?php
                            // Dynamically populate the scheme dropdown
                            while ($scheme = mysqli_fetch_assoc($scheme_result)) {
                                $selected = ($row2['scheme'] == $scheme['scheme']) ? 'selected' : '';  // Mark the current scheme as selected
                                echo "<option value='" . $scheme['scheme'] . "' $selected>" . $scheme['scheme'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Additional Form Fields (Similar to your original structure) -->
                    <div class="cont_r_l">
                        <div style="width:90%">
                            <div class="label1">
                                <b><label>Academic Year :</label></b>
                            </div>
                            <div class="inp">
                                <b><label for="from" class="label">From:</label></b>
                                <input class="sem" type="text" id="from" name="aystdatefrom" value="<?php echo $row2['aca_year']; ?>" required>
                                <b><label for="to" class="label1">To:</label></b>
                                <input class="sem" type="text" id="to" name="aystdateto" value="<?php echo $row2['aca_year']; ?>" required>
                            </div>

                            <!-- Radio buttons for status -->
                            <div class="label1">
                                <b><label for="status" class="label">Academic Calendar Status:</label></b>
                            </div>
                            <div class="inp">
                                <input type="radio" id="active" name="status" value="Active" <?php if ($row2['isActive'] == 1) echo 'checked'; ?>>
                                <label for="active">Active</label>

                                <input type="radio" id="deactive" name="status" value="Deactive" <?php if ($row2['isActive'] == 0) echo 'checked'; ?>>
                                <label for="deactive">Deactive</label>
                            </div>

                            <!-- Semester duration fields (if applicable) -->
                            <div class="label1">
                                <b><label>Semester Duration :</label></b>
                            </div>
                            <div class="inp">
                                <b><label for="stsemfrom" class="label">From:</label></b>
                                <input class="sem" type="date" id="stsemfrom" name="stsemfrom" value="<?php echo $row2['sem_duration_from']; ?>" required>
                                <b><label for="stsemto" class="label1">To:</label></b>
                                <input class="sem" type="date" id="stsemto" name="stfromto" value="<?php echo $row2['sem_duration_to']; ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="buttons">
                        <button type="submit" name="addCal" class="button">Update</button>
                        <a href="adm_AcademicCal.php">
                            <button type="button" class="button">Cancel</button>
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>

</body>

</html>

<?php
if (isset($_POST['addCal'])) {
    // Extract form data
    extract($_POST);

    // Sanitize the data
    $semester = mysqli_real_escape_string($con, $semester);
    $scheme = mysqli_real_escape_string($con, $scheme);
    $status = mysqli_real_escape_string($con, $status); // Get status from the form

    // Check if status is selected
    if (empty($status)) {
        echo "<script>alert('Please select the status of the Academic Calendar.');</script>";
    } else {
        // Convert status to true (1) or false (0)
        $status_value = ($status == 'Active') ? 1 : 0;

        // If the status is being set to 'Active', update all other records with the same semester to 'Deactive'
        if ($status_value == 1) {
            $update_inactive = mysqli_query($con, "UPDATE `academic_cal` SET `isActive` = 0 WHERE `semester` = '$semester' AND `id` != '" . $_GET['id'] . "'") or die(mysqli_error($con));
        }

        // Update the database with true/false for status
        $update = mysqli_query($con, "UPDATE `academic_cal` SET 
            `semester` = '$semester',
            `scheme` = '$scheme',
            `sem_duration_from` = '$stsemfrom',
            `sem_duration_to` = '$stfromto',
            `isActive` = '$status_value'
            WHERE id = '" . $_GET['id'] . "'") or die(mysqli_error($con));

        if ($update) {
            echo "<script>alert('Data Updated Successfully!!');</script>";
        } else {
            echo "<script>alert('ERROR! Fail..!');</script>";
        }
    }
}
?>
