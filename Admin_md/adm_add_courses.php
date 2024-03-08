<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TCTPMS-CPP/css/stylest.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/970acd6ae4.js" crossorigin="anonymous"></script>
    <title>Admin Course Module
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
                    <a href="adm_home.php">
                        <ul><span class="material-symbols-outlined">
                                home
                            </span> Home</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="adm_AcademicCal.php">
                        <ul><span class="material-symbols-outlined">
                                calendar_clock
                            </span> Academic Calendar</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="adm_courses.php">
                        <ul><span class="material-symbols-outlined">
                                menu_book
                            </span> Courses</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="adm_timetable.php">
                        <ul><span class="material-symbols-outlined">
                                today
                            </span> Time Table</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="adm_teacher.php">
                        <ul><span class="material-symbols-outlined">
                                group
                            </span> Teacher</ul>
                    </a>
                </div>
            </li>
        </div>
        <div class="C_contain_scroll">
            <?php
            include "config.php";
            $view = mysqli_query($con, "select * from teacherinfo where firstName != 'Admin'") or die(mysqli_error($con));


            ?>
            <h2>Add Course Details</h2>
            <div class="add_course" id="add_course">
                <div class="add_course_card_cont">
                    <div class="add_course_card">
                        <form action="" method="post" class="aca-form">
                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="semester" class="label">Semester:</label></b>
                                    <select id="semester" name="semester" class="sem">
                                        <option value="">Select Semester</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                                <div class="name">
                                    <b><label for="branch" class="label">Branch:</label></b>
                                    <select id="branch" name="branch" class="sem">
                                        <option value="">Select Branch</option>
                                        <option value="All Branch">All Branch</option>
                                        <option value="CO">CO</option>
                                        <option value="CE">CE</option>
                                        <option value="ME">ME</option>
                                    </select>
                                </div>
                                <div class="name">
                                    <b><label for="scheme" class="label">Scheme:</label></b>
                                    <select id="scheme" name="scheme" class="sem">
                                        <option value="">Select Scheme</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                        <option value="F">F</option>
                                        <option value="G">G</option>
                                        <option value="H">H</option>
                                        <option value="I">I</option>
                                        <option value="K">K</option>
                                    </select>
                                </div>

                            </div>
                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="courseTitle" class="label">Course Title :</label></b>
                                    <input class="sem" type="text" id="courseTitle" name="courseTitle"
                                        placeholder="Enter Course Title" required>
                                </div>
                                <div class="name">
                                    <b><label for="courseAbrevation" class="label">Course Abrevation :</label></b>
                                    <input class="sem" type="text" id="courseAbrevation" name="courseAbrevation"
                                        placeholder="Enter Course Abrevation" required>
                                </div>
                                <div class="name">
                                    <b><label for="courseCode" class="label">Course Code :</label></b>
                                    <input class="sem" type="" id="courseCode" name="courseCode"
                                        placeholder="Enter Course Code" required>
                                </div>


                            </div>

                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="courseType" class="label">Course Type:</label></b>
                                    <select id="courseType" name="courseType" class="sem">
                                        <option value="">Select Course Type</option>
                                        <option value="DSC">Discipline Specific Course Core</option>
                                        <option value="DSE">Discipline Specific Elective</option>
                                        <option value="VEC">Value Education Course</option>
                                        <option value="INP">Intern./Apprenti./Project./Community</option>
                                        <option value="AEC">Ability Enhancement Course</option>
                                        <option value="SEC">Skill Enhancement Course</option>
                                        <option value="GE">Generic Elective</option>
                                    </select>
                                </div>
                                <div class="name">
                                    <b><label for="lecturePW" class="label">Lectures per week :</label></b>
                                    <input class="sem" type="text" id="lecturePW" name="lecturePW"
                                        placeholder="Enter Lectures Per Week" required>
                                </div>

                                <div class="name">
                                    <b><label for="practicalPW" class="label">Practicals per week :</label></b>
                                    <input class="sem" type="text" id="practicalPW" name="practicalPW"
                                        placeholder="Enter Practicals per week" required>
                                </div>


                            </div>
                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="tutorialPW" class="label">Tutorials per week :</label></b>
                                    <input class="sem" type="text" id="tutorialPW" name="tutorialPW"
                                        placeholder="Enter Tutorials per week" required>
                                </div>
                                <div class="name">
                                    <b><label for="teachingHours" class="label">Teaching Hours :</label></b>
                                    <input class="sem" type="text" id="teachingHours" name="teachingHours"
                                        placeholder="Enter Teaching Hours" required>
                                </div>
                                <div class="name">
                                    <b><label for="practicalHours" class="label">Practical Hours :</label></b>
                                    <input class="sem" type="text" id="teachingHours" name="practicalHours"
                                        placeholder="Enter Practical Hours" required>
                                </div>
                                <div class="name">
                                    <b><label for="selfhours" class="label">Self Learning Hours :</label></b>
                                    <input class="sem" type="text" id="selfhours" name="selfhours"
                                        placeholder="Enter Teaching Hours" required>
                                </div>
                            </div>
                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="ikshours" class="label">IKS Hours :</label></b>
                                    <input class="sem" type="text" id="ikshours" name="ikshours"
                                        placeholder="Enter IKS Hours" required>
                                </div>
                                <div class="name">
                                    <b><label for="totalcredits" class="label">Total Credits :</label></b>
                                    <input class="sem" type="text" id="totalcredits" name="totalcredits"
                                        placeholder="Enter Total Credits" required>
                                </div>
                                <div class="name">
                                    <b><label for="teacher" class="label">Course Teacher:</label></b>
                                    <select class="sem" type="text" id="teacher" name="teacher"
                                        placeholder="Enter Course Teacher" required>
                                        <option value="">Select Teacher</option>
                                        <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($view)) {
                                            extract($row);
                                            $name = $row['firstName'];
                                            $initial = strtoupper(substr($name, 0, 1));
                                            echo "<option value=\"$row[teacherId]\">$initial$row[middleName] $row[lastName]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="buttons">
                                <button type="submit" name="addCourse" class="button">Add</button>
                                <a href="adm_courses.php"> <button type="button" class="button">Back</button></a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>


    </div>
    </div>
</body>

</html>
<?php

include "config.php";
if (isset($_POST['addCourse'])) {
    extract($_POST);

    $add = mysqli_query($con, "INSERT INTO `courseinfo`(`semester`, `branch`, `scheme`, `courseTitle`, `courseAbrevation`, `courseCode`, `courseType`, `lecturePW`, `practicalPW`, `tutorialPW`,`selfhours`, `teachingHours`,`practicalHours`, `ikshours`, `totalcredits` , `teacher`) VALUES ('$semester','$branch','$scheme','$courseTitle','$courseAbrevation','$courseCode','$courseType','$lecturePW','$practicalPW','$tutorialPW','$selfhours','$teachingHours','$practicalHours','$ikshours','$totalcredits','$teacher' )") or die(mysqli_error($con));

    if ($add) {
        echo "<script>";
        echo "alert('Successfully Added...');";
        echo "</>";
    } else {
        echo "<script>";
        echo "alert('ERROR ! Fail..!')";
        echo "</script>";
    }
} ?>