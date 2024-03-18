<?php

include "config.php";
$acaYear = $_POST['aca_year'];
$sem = $_POST['semester'];
$sch = $_POST['scheme'];
$sub = $_POST['sub'];
$div = $_POST['div'];
$batch = $_POST['batch'];

$view = mysqli_query($con, "select * from lab_plan where course = '$sub' AND aca_year = '$acaYear' AND batch = '$batch' AND division ='$div '") or die (mysqli_error($con));
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
            <h1 id="h1">Teacher's Companion</h1>
        </div>
        <div class="lgt_div">
            <a href="\TCTPMS-CPP\logout.php"> <button type="button" id="button_lg" class="button">Logout</button></a>
        </div>
    </div>
    <div class="main_cont">
        <div class="sidebar">
            <li>
                <div class="side_card">
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
                <!-- 
                <div class="side_card">
                    <a href="tch_AcademicCal.php">
                        <ul><span class="material-symbols-outlined">
                                calendar_clock
                            </span> Academic Calendar</ul>
                    </a>
                </div> -->

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
            </li>
        </div>
        <div class="C_contain_scroll">
            <div style="display: flex;align-items:center;flex-direction: column; margin-left: 180px;">
                <table class="tablecss tb_card">
                    <form method="post" action="insert_lab.php">
                        <h2>Actual Laboratory Plan of
                            <?php echo $sub ?> for Batch
                            <?php echo $div . "" . $batch . ""; ?>

                        </h2>
                        <tr>
                            <th>Practical No.</th>
                            <th>Planned Date</th>
                            <th>Practical Outcome</th>
                            <th>Planned Practical</th>
                            <th>Status</th>
                            <th>Actual Date</th>
                            <th>Actual Coverage</th>
                            <th>Save</th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_array($view)) {
                            extract($row); ?>
                            <tr>
                                <input class="sema" type="text" name="aca_year[]" value="<?php echo $acaYear ?>"
                                    style="display: none;">
                                <input class="sema" type="text" name="sem[]" value="<?php echo $sem ?>"
                                    style="display: none;">
                                <input class="sema" type="text" name="sch[]" value="<?php echo $sch ?>"
                                    style="display: none;">
                                <input class="sema" type="text" name="batch[]" value="<?php echo $batch ?>"
                                    style="display: none;">

                                <td>
                                    <?php echo $row['pr_no'] ?>
                                    <input class="sema" type="text" name="sub[]" value="<?php echo $row['course'] ?>"
                                        style="display: none;">
                                    <input class="sema" type="text" name="code[]" value="<?php echo $row['coursecode'] ?>"
                                        style="display: none;">
                                </td>
                                <td>
                                    <?php echo $row['planned_date'] ?>
                                </td>
                                <td>
                                    <?php echo $row['pr_outcome']; ?>
                                </td>
                                <td>
                                    <?php echo $row['topic']; ?>
                                </td>
                                <td>
                                    <input class="sem" type="checkbox" value="Done" name="status">

                                </td>
                                <td>
                                    <input class="sem" type="date" name="actual_date[]">

                                </td>
                                <td>
                                    <textarea class="sem" type="text" cols="20" name="actual_coverage[]"></textarea>
                                </td>
                                <td>
                                    <input class="button" type="submit" onclick="submitForm(this)" value="Save">
                                </td>
                            </tr>
                        <?php } ?>
                </table>
                </form>
            </div>
        </div>


</body>

</html>