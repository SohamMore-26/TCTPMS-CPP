<?php
include "config.php";
session_start();
if (isset($_SESSION['id'])) {
    $view = mysqli_query($con, "select * from courseinfo where teacher = '" . $_SESSION['teacherId'] . "' AND teachingHours > 0") or die(mysqli_error($con));
}

$view1 = mysqli_query($con, "select DISTINCT aca_year from academic_cal ") or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TCTPMS-CPP/css/stylest.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Teacher Home Module
    </title>
</head>

<body>
    <div class="nav_head">
        <div class="title_div">
            <h1 id="h1">Teacher's Companion
            </h1>

        </div>
        <div class="title_div">
            <h1 id="h1"> Welcome Prof.
                <?php echo $_SESSION['firstName'] . $_SESSION['middleName'] . $_SESSION['lastName']; ?>
            </h1>

        </div>
        <div class="lgt_div">
            <a href="\TCTPMS-CPP\logout.php"> <button type="button" id="button_lg" class="button">Logout</button></a>
        </div>
    </div>
    <div class="main_cont">
        <div class="sidebar">
            <li>
                <div class=" side_card">
                    <a href="tch_home.php">
                        <ul><span class="material-symbols-outlined">
                                home
                            </span> Home</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="tch_timetable.php">
                        <ul><span class="material-symbols-outlined">
                                today
                            </span>View Time Table</ul>
                    </a>
                </div>

                <div class="side_card">
                    <a href="tch_courses.php">
                        <ul><span class="material-symbols-outlined">
                                menu_book
                            </span> Courses</ul>
                    </a>
                </div>
                <div class="separator">Create Lesson & Laboratory Plan</div>
                <div class="side_card">
                    <a href="tch_lesson_plan.php">
                        <ul><span class="material-symbols-outlined">
                                group
                            </span> Lesson Plan</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="tch_lab_plan.php">
                        <ul><span class="material-symbols-outlined">
                                pending_actions
                            </span> Laboratory Plan</ul>
                    </a>
                </div>

                <div class="separator">Mark Daily Progress</div>

                <div class="side_card">
                    <a href="tch_lesson_plan_progress.php">
                        <ul><span class="material-symbols-outlined">
                                group
                            </span> Lesson Plan</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="tch_lab_plan_progress.php">
                        <ul><span class="material-symbols-outlined">
                                pending_actions
                            </span> Laboratory Plan</ul>
                    </a>
                </div>
                <div class="separator">Reports</div>
                <div class="side_card">
                    <a href="lesson_plan_report.php">
                        <ul><span class="material-symbols-outlined">
                                pending_actions
                            </span> Lesson Plan Report</ul>
                    </a>
                </div>
            </li>
        </div>
        <div class="main_c_cont">

            <div class="lesson_card">
                <h1>Reports Here</h1>
                <div style=" display: flex; align-items: center; justify-content: center;">
                    <table>
                        <form method="post" action="generate_lesson_report.php"
                            style="display: flex; flex-direction:column; width:200px; align-items:center ; justify-content: center;"
                            ;>

                            <tr>
                                <td>
                                    <div style="display:flex; flex-direction:row;align-items:center;">

                                        <b><label for="aca_year" class="label">Academic Year:</label></b>
                                    </div>

                                </td>
                                <td><input class="sem" type="text" name="tch_id"
                                        value="<?php echo $_SESSION['teacherId'] ?>" style="display: none;">

                                    <select id="aca_year" name="aca_year" class="sem">
                                        <option value="">Select Academic Year</option>

                                        <?php while ($row1 = mysqli_fetch_array($view1)) {
                                            extract($row1); ?>
                                            <option value="<?php echo $row1['aca_year']; ?>">
                                                <?php echo $row1['aca_year']; ?>
                                            <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="display:flex; flex-direction:row;align-items:center;">
                                        <b><label for="aca_year" class="label">Semester:</label></b>
                                    </div>
                                </td>
                                <td><select id="semester" name="semester" class="sem"
                                        onchange="loadCourses(this.value)">
                                        <option value="">Select Semester</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select></td>
                            </tr>


                            <tr>
                                <td>
                                    <div style="display:flex; flex-direction:row;align-items:center;">
                                        <b><label for="div" class="label">Divison:</label></b>

                                    </div>
                                </td>
                                <td> <select id="div" name="div" class="sem">
                                        <option value="">Select Divison</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div style="display:flex; flex-direction:row;align-items:center;">
                                        <b><label for="aca_year" class="label">Scheme:</label></b>
                                    </div>
                                </td>

                                <td><select id="scheme" name="scheme" class="sem">
                                        <option value="">Select Scheme</option>
                                        <option value="I">I</option>
                                        <option value="K">K</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div style="display:flex; flex-direction:row;align-items:center;">
                                        <b><label for="sub" class="label">Course:</label></b>

                                    </div>
                                </td>
                                <td><select id="sub" name="sub" class="sem">
                                        <option value="">Select Course</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($view)) {
                                            extract($row); ?>
                                            <option value="<?php echo $row['courseAbrevation']; ?>">
                                                <?php echo $row['courseAbrevation']; ?>
                                            <?php } ?>
                                    </select>
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <input type="submit" name="add" class="button" value="View">
                                </td>
                                <td><input type="submit" name="view" class="button" value="Cancel"
                                        formaction="tch_home.php"></td>
                            </tr>
                        </form>
                </div>

                </table>
            </div>
        </div>
    </div>
</body>

</html>