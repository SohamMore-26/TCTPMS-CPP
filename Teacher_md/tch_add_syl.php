<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    $showError = "Login Failed...!";
    header("location: index.php");
    exit;
}
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
    <?php
    include "config.php";
    if (isset($_GET['id'])) {
        $view = mysqli_query($con, "select * from courseinfo where id = '" . $_GET['id'] . "'") or die(mysqli_error($con));
        $row = mysqli_fetch_array($view);
    }
    extract($row); ?>
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
                <div class="side_card">
                    <a href="lab_report.php">
                        <ul><span class="material-symbols-outlined">
                                pending_actions
                            </span> Laboratory Plan Report</ul>
                    </a>
                </div>
            </li>
        </div>

        <div class="C_contain_scroll">
            <div style="display: flex;align-items:center;flex-direction: column;">

                <table class="tablecss tb_card">
                    <form method="post" action="insert.php">
                        <h2>Enter Syllabus of
                            <?php echo $row['courseTitle'] ?> (
                            <?php echo $row['branch'] ?>
                            <?php echo $row['semester'] ?>
                            <?php echo $row['scheme'] ?>)
                        </h2>
                        <tr>
                            <th>Lec. No.</th>
                            <th>Unit Name</th>
                            <th>Course Outcome</th>
                            <th>Unit Outcome</th>
                            <th>Topic</th>
                            <th>Sub-Topic</th>
                        </tr>

                        <?php
                        $lc = $row['teachingHours'];
                        // Loop to generate 48 rows
                        for ($i = 1; $i <= $lc; $i++) {
                            ?>
                            <tr>
                                <td>
                                    <input class="sema" type="text" name="lecno[]" value="<?php echo $i; ?>">
                                    <input class="sema" type="text" name="sub[]"
                                        value="<?php echo $row['courseAbrevation'] ?>" style="display: none;">
                                    <input class="sema" type="text" name="code[]" value="<?php echo $row['courseCode'] ?>"
                                        style="display: none;">
                                </td>

                                <td>
                                    <textarea class="sem" type="text" cols="10" name="unit_name[]"> </textarea>
                                </td>
                                <td>
                                    <textarea class="sem" type="text" cols="20" name="course_outcome[]"> </textarea>
                                </td>
                                <td>
                                    <textarea class="sem" type="text" cols="20" name="unit_outcome[]"> </textarea>
                                </td>
                                <td>
                                    <textarea class="sem" type="text" cols="30" name="topic[]">  </textarea>
                                </td>
                                <td>
                                    <textarea class="sem" type="text" cols="29" rows="5" name="sub_topic[]"> </textarea>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>


                </table>
                <input type="submit" name="addSyllabus" class="button"></form>
            </div>
        </div>
    </div>
</body>

</html>