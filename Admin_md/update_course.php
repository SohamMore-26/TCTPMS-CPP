<?php
include "config.php";

// Fetch the schemes from the database
$scheme_query = "SELECT DISTINCT scheme FROM academic_cal";
$scheme_result = mysqli_query($con, $scheme_query);

// Check if the query was successful
if (!$scheme_result) {
    die('Error fetching schemes: ' . mysqli_error($con));
}

// Fetch the course info to populate the form
$view2 = mysqli_query($con, "SELECT * FROM courseinfo WHERE id = '".$_GET['id']."'") or die(mysqli_error($con));
$row2 = mysqli_fetch_array($view2);

// Fetch teachers (excluding the admin)
$view = mysqli_query($con, "SELECT * FROM teacherinfo WHERE firstName != 'Admin'") or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TCTPMS-CPP/css/stylest.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/970acd6ae4.js" crossorigin="anonymous"></script>
    <title>Admin Course Module</title>
</head>

<body>
    <div class="nav_head">
        <div class="title_div">
            <h1 id="h1">Teacher's Companion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Welcome Admin</h1>
        </div>
        <div class="lgt_div">
            <a href="\TCTPMS-CPP\logout.php"> <button type="button" id="button_lg" class="button">Logout</button></a>
        </div>
    </div>
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
        <div class="C_contain_scroll">
            <h2>Update Course Details</h2>
            <div class="add_course" id="add_course">
                <div class="add_course_card_cont">
                    <div class="add_course_card">
                        <form action="" method="post" class="aca-form">
                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="semester" class="label">Semester:</label></b>
                                    <select id="semester" name="semester" class="sem">
                                        <option value="">Select Semester</option>
                                        <?php 
                                        $semesters = [1, 2, 3, 4, 5, 6];  // Array for semesters
                                        foreach ($semesters as $semester) {
                                            $selected = ($semester == $row2['semester']) ? 'selected' : '';  // Compare with the value from the DB
                                            echo "<option value='$semester' $selected>$semester</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="name">
                                    <b><label for="branch" class="label">Branch:</label></b>
                                    <select id="branch" name="branch" class="sem">
                                        <option value="">Select Branch</option>
                                        <option value="All Branch" <?php echo ($row2['branch'] == 'All Branch') ? 'selected' : ''; ?>>All Branch</option>
                                        <option value="CO" <?php echo ($row2['branch'] == 'CO') ? 'selected' : ''; ?>>CO</option>
                                        <option value="CE" <?php echo ($row2['branch'] == 'CE') ? 'selected' : ''; ?>>CE</option>
                                        <option value="ME" <?php echo ($row2['branch'] == 'ME') ? 'selected' : ''; ?>>ME</option>
                                    </select>
                                </div>
                                <div class="name">
                                    <b><label for="scheme" class="label">Scheme:</label></b>
                                    <select id="scheme" name="scheme" class="sem">
                                        <option value="">Select Scheme</option>
                                        <option value="inp" <?php echo ($row2['scheme'] == 'inp') ? 'selected' : ''; ?>>inp</option>
                                        <?php
                                        while ($scheme = mysqli_fetch_assoc($scheme_result)) {
                                            $selected = ($scheme['scheme'] == $row2['scheme']) ? 'selected' : '';  // Pre-select the scheme
                                            echo "<option value='" . $scheme['scheme'] . "' $selected>" . $scheme['scheme'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="courseTitle" class="label">Course Title:</label></b>
                                    <input class="sem" type="text" id="courseTitle" name="courseTitle" value="<?php echo $row2['courseTitle']; ?>" required>
                                </div>
                                <div class="name">
                                    <b><label for="courseAbrevation" class="label">Course Abrevation:</label></b>
                                    <input class="sem" type="text" id="courseAbrevation" name="courseAbrevation" value="<?php echo $row2['courseAbrevation']; ?>" required>
                                </div>
                                <div class="name">
                                    <b><label for="courseCode" class="label">Course Code:</label></b>
                                    <input class="sem" type="text" id="courseCode" name="courseCode" value="<?php echo $row2['courseCode']; ?>" required>
                                </div>
                            </div>

                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="courseType" class="label">Course Type:</label></b>
                                    <select id="courseType" name="courseType" class="sem">
                                        <option value="">Select Course Type</option>
                                        <option value="DSC" <?php echo ($row2['courseType'] == 'DSC') ? 'selected' : ''; ?>>Discipline Specific Course Core</option>
                                        <option value="DSE" <?php echo ($row2['courseType'] == 'DSE') ? 'selected' : ''; ?>>Discipline Specific Elective</option>
                                        <option value="VEC" <?php echo ($row2['courseType'] == 'VEC') ? 'selected' : ''; ?>>Value Education Course</option>
                                        <option value="INP" <?php echo ($row2['courseType'] == 'INP') ? 'selected' : ''; ?>>Intern./Apprenti./Project./Community</option>
                                        <option value="AEC" <?php echo ($row2['courseType'] == 'AEC') ? 'selected' : ''; ?>>Ability Enhancement Course</option>
                                        <option value="SEC" <?php echo ($row2['courseType'] == 'SEC') ? 'selected' : ''; ?>>Skill Enhancement Course</option>
                                        <option value="GE" <?php echo ($row2['courseType'] == 'GE') ? 'selected' : ''; ?>>Generic Elective</option>
                                    </select>
                                </div>
                                <div class="name">
                                    <b><label for="lecturePW" class="label">Lectures per week:</label></b>
                                    <input class="sem" type="text" id="lecturePW" name="lecturePW" value="<?php echo $row2['lecturePW']; ?>" required>
                                </div>
                                <div class="name">
                                    <b><label for="practicalPW" class="label">Practicals per week:</label></b>
                                    <input class="sem" type="text" id="practicalPW" name="practicalPW" value="<?php echo $row2['practicalPW']; ?>" required>
                                </div>
                            </div>
                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="tutorialPW" class="label">Tutorials per week:</label></b>
                                    <input class="sem" type="text" id="tutorialPW" name="tutorialPW" value="<?php echo $row2['tutorialPW']; ?>" required>
                                </div>
                                <div class="name">
                                    <b><label for="teachingHours" class="label">Teaching Hours:</label></b>
                                    <input class="sem" type="text" id="teachingHours" name="teachingHours" value="<?php echo $row2['teachingHours']; ?>" required>
                                </div>
                                <div class="name">
                                    <b><label for="selfhours" class="label">Self Learning Hours:</label></b>
                                    <input class="sem" type="text" id="selfhours" name="selfhours" value="<?php echo $row2['selfhours']; ?>" required>
                                </div>
                            </div>
                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="ikshours" class="label">IKS Hours:</label></b>
                                    <input class="sem" type="text" id="ikshours" name="ikshours" value="<?php echo $row2['ikshours']; ?>" required>
                                </div>
                                <div class="name">
                                    <b><label for="totalcredits" class="label">Total Credits:</label></b>
                                    <input class="sem" type="text" id="totalcredits" name="totalcredits" value="<?php echo $row2['totalcredits']; ?>" required>
                                </div>
                                <div class="name">
                                    <b><label for="teacher" class="label">Course Teacher:</label></b>
                                    <select class="sem" type="text" id="teacher" name="teacher" required>
                                        <option value="">Select Teacher</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($view)) {
                                            $selected = ($row['teacherId'] == $row2['teacherId']) ? 'selected' : '';  // Pre-select the teacher
                                            echo "<option value=\"" . $row['teacherId'] . "\" $selected>" . strtoupper(substr($row['firstName'], 0, 1)) . $row['middleName'] . " " . $row['lastName'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="buttons">
                                <button type="submit" name="updateCourse" class="button">Update</button>
                                <a href="adm_courses.php"> <button type="button" class="button">Back</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>

<?php
if (isset($_POST['updateCourse'])) {
    extract($_POST);
    $update = mysqli_query($con, "UPDATE `courseinfo` SET 
        `semester` = '$semester',
        `branch` = '$branch',
        `scheme` = '$scheme',
        `courseTitle` = '$courseTitle',
        `courseAbrevation` = '$courseAbrevation',
        `courseCode` = '$courseCode',
        `lecturePW` = '$lecturePW',
        `practicalPW` = '$practicalPW',
        `tutorialPW` = '$tutorialPW',
        `teachingHours` = '$teachingHours',
        `selfhours` = '$selfhours',
        `ikshours` = '$ikshours',
        `totalcredits` = '$totalcredits',
        `teacherId` = '$teacher'
        WHERE `id` = '".$_GET['id']."'") or die(mysqli_error($con));

    if ($update) {
        echo "<script>";
        echo "alert('Successfully Updated...');";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('ERROR! Fail..!');";
        echo "</script>";
    }
}
?>
