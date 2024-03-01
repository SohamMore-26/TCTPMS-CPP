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
            <button type="button" id="button_lg" class="button">Logout</button>
        </div>
    </div>
    <div class="main_cont">
        <div class="sidebar">
            <li>
                <div class="side_card">
                    <a href="tch_home.html">
                        <ul><span class="material-symbols-outlined">
                                home
                            </span> Home</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="tch_timetable.html">
                        <ul><span class="material-symbols-outlined">
                                today
                            </span>View Time Table</ul>
                    </a>
                </div>

                <div class="side_card">
                    <a href="tch_courses.html">
                        <ul><span class="material-symbols-outlined">
                                menu_book
                            </span> Courses</ul>
                    </a>
                </div>
                <!-- 
                <div class="side_card">
                    <a href="tch_AcademicCal.html">
                        <ul><span class="material-symbols-outlined">
                                calendar_clock
                            </span> Academic Calendar</ul>
                    </a>
                </div> -->

                <div class="side_card">
                    <a href="tch_lesson_plan.html">
                        <ul><span class="material-symbols-outlined">
                                group
                            </span> Lesson Plan</ul>
                    </a>
                </div>

                <div class="side_card">
                    <a href="tch_lab_plan.html">
                        <ul><span class="material-symbols-outlined">
                                pending_actions
                            </span> Laboratory Plan</ul>
                    </a>
                </div>
            </li>
        </div>

        <div class="C_contain_scroll">
            <div class="">

                <table class="tablecss tb_card">
                    <form method="post">
                        <h2>Enter Syllabus Data</h2>
                        <tr>
                            <th>Lec. No.</th>
                            <th>Unit</th>
                            <th>Unit Outcome</th>
                            <th>Topic</th>
                            <th>Sub-Topic</th>
                            <th>Save/add.,</th>
                        </tr>
                        <?php
                        // Assuming $id is defined somewhere before the loop
                        $id = 123;

                        // Loop to generate 48 rows
                        for ($i = 1; $i <= 48; $i++) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i; ?>
                                </td>
                                <td>
                                    <textarea  class="sem" type="text" cols="10" name="unit_name"> </textarea>
                                </td>
                                <td>
                                    <textarea  class="sem" type="text" cols="20" name="unit_outcome"> </textarea>
                                </td>
                                <td>
                                    <textarea  class="sem" type="text" cols="30" name="topic">  </textarea>
                                </td>
                                <td>
                                    <textarea  class="sem" type="text" cols="29" rows="5" name="sub_topic"> </textarea>
                                </td>
                                <td>
                                    <button type="submit" name="addSyllabus" class="button">Save</button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </form>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
<?php

include "config.php";
if (isset($_POST['addSyllabus'])) {
    extract($_POST);

    $add = mysqli_query($con, "INSERT INTO `syllabus`(`course`, `unit_name`, `unit_outcome`, `topic`, `sub_topic`) VALUES ('ETI','$unit_name','$unit_outcome','$topic','$sub_topic')") or die(mysqli_error($con));

    if ($add) {
        echo "<script>";
        echo "alert('Successfully Added...');";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('ERROR ! Fail..!')";
        echo "</script>";
    }
} ?>