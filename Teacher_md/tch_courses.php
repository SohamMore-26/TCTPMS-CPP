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
    if (isset($_SESSION['id'])) {
        $view = mysqli_query($con, "select * from courseinfo where teacher = '" . $_SESSION['teacherId'] . "'") or die(mysqli_error($con));
    }
    ?>
    <div class="nav_head">
    <div class="title_div">
            <h1 id="h1">Teacher's Companion
             </h1>
          
        </div>
        <div class="title_div">
            <h1 id="h1"> Welcome Prof. <?php echo $_SESSION['firstName'] . $_SESSION['middleName'] . $_SESSION['lastName']; ?>
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
        <div class="main_c_cont" id="cont_M">
            <h1 style="margin-left:15px ; margin-top:0px" >Add Courses Syllabus</h1>
            <?php
            while ($row = mysqli_fetch_array($view)) {
                extract($row); ?>
                <a href="tch_one_course.php?id=<?php echo $id; ?>">
                    <div class="m_card">
                    <h3>
                        <div class="icon"><span class="material-symbols-outlined">
                                menu_book
                            </span></div>
                        <?php echo $row['courseTitle']; ?> (<?php echo $row['branch']?><?php echo $row['semester']?><?php echo $row['scheme']?>)
                    </h3>
                </div>
                </a>
                
            <?php } ?>
        </div>

    </div>
</body>

</html>