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
            <button type="button" id="button_lg" class="btt">Logout</button>
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
                    <a href="adm_timetable.php">
                        <ul><span class="material-symbols-outlined">
                                today
                            </span> Time Table</ul>
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
                    <a href="adm_AcademicCal.php">
                        <ul><span class="material-symbols-outlined">
                                calendar_clock
                            </span> Academic Calendar</ul>
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

        <?php
         include "config.php";
         $view = mysqli_query($con, "select * from courseinfo") or die(mysqli_error($con)); ?>


<div class="main_c_cont">
    <div class="btn_card">
        <a href="adm_add_courses.php">
            <h3>
                <div class="icon"><i class="fa-solid fa-book"></i></div> Add new Course
            </h3>
        </a>  
    </div>
    <div class="tb_card">
        <table>
                <tr>
                    <th>Course Title</th>
                    <th>Course Abbrevation</th>
                    <th>Course Code</th>
                    <th>Lecture per week</th>
                    <th>Practical per week</th>
                    <th>Tutorial per week</th>
                    <th>Branch</th>
                    <th>Semester</th>
                    <th>Scheme</th>
                    <th>Action</th>
                    
                </tr>
                <?php
                        while ($row = mysqli_fetch_array($view)) {
                            extract($row); ?>
        <tr>
            <td>
                <?php echo $row['courseTitle']; ?>
            </td>
            <td>
                <?php echo $row['courseAbrevation']; ?>
            </td>
            <td>
                <?php echo $row['courseCode']; ?>
            </td>
            <td>
                <?php echo $row['lecturePW']; ?>
            </td>
            <td>
                <?php echo $row['practicalPW']; ?>
            </td>
            <td>
                <?php echo $row['tutorialPW']; ?>
            </td>
            <td>
                <?php echo $row['branch']; ?>
            </td>
            <td>
                <?php echo $row['semester']; ?>
            </td>
            <td>
                <?php echo $row['scheme']; ?>
            </td>
            <td>
                <a href="update_teacher.html"> Update </a> / <a href="delete_teacher.html"> Delete </a>
            </td>
            
        </tr>
        <?php } ?>
    </table>
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

    $add = mysqli_query($con, "INSERT INTO `courseinfo`(`semester`, `branch`, `scheme`, `courseTitle`, `courseAbrevation`, `courseCode`, `lecturePW`, `practicalPW`, `tutorialPW`, `teachingHours`) VALUES ('$semester','$branch','$scheme','$courseTitle','$courseAbrevation','$courseCode','$lecturePW','$practicalPW','$tutorialPW','$teachingHours')") or die(mysqli_error($con));

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