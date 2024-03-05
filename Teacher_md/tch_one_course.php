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
            <div class="course_card">
            <?php
            include "config.php";
            if (isset($_GET['id'])) {
                $view = mysqli_query($con, "select * from courseinfo where id = '" . $_GET['id'] . "'") or die(mysqli_error($con));
                $row = mysqli_fetch_array($view);
            }
                        extract($row);?>
                    <h2><?php echo $row['courseTitle']; ?> </h2>
                    <h4>Course Code: <?php echo $row['courseCode']; ?> </h4>
                    <h4>Course Abb: <?php echo $row['courseAbrevation']; ?></h4>
                    <h4>Branch: <?php echo $row['branch']; ?></h4>
                    <h4>No of lectures: <?php echo $row['teachingHours']; ?></h4>
                    
                    <div style="display: flex; justify-content:space-between; width:300px; ">
                        <a href="tch_courses.php"><button type="button" class="button" > Back </button></a>
                        <a href="tch_add_syl.php?id=<?php echo $id; ?>"><button type="button" class="button" style="width: auto;" > Add syllabus </button></a>
                        <a href="tch_addpr_syl.php?id=<?php echo $id; ?>"><button type="button" class="button" style="width: auto;" > Add syllabus </button></a>
                    </div>         
            </div>
        </div>

    </div>

</body>

</html>