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
        <h1 id="h1">Teacher's Companion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Welcome prof. <?php echo $_SESSION['firstName'] . $_SESSION['middleName'] . $_SESSION['lastName']; ?>
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
                extract($row);
                $lc = $row['teachingHours'];
                $pr = $row['practicalHours'];
                ?>

                <h2>
                    <?php echo $row['courseTitle']; ?> (<?php echo $row['branch']?><?php echo $row['semester']?><?php echo $row['scheme']?>)
                </h2>
                <h4>Course Code:
                    <?php echo $row['courseCode']; ?>
                </h4>
                <h4>Course Abb:
                    <?php echo $row['courseAbrevation']; ?>
                </h4>
                <h4>Branch:
                    <?php echo $row['branch']; ?>
                </h4>
                <h4>
                <?php 
                    if($row['teachingHours'] > 0 &&  $row['practicalHours'] > 0){
                        echo "No of lectures :" . $row['teachingHours']."<br><br>";         
                        echo "No of practicals :" . $row['practicalHours'];
                    }
                    elseif( $row['teachingHours'] > 0){
                        echo "No of lectures :" . $row['teachingHours'];         
                    }
                    else{
                        echo "No of practicals :" . $row['practicalHours'];
                    }
                ?>
                </h4>


                <div style="button_cont">
                    <a href="tch_courses.php"><button type="button" class="button"> Back </button></a>
                    <a href="tch_add_syl.php?id=<?php echo $id; ?>"><button id="addth" type="button" class="button hid"
                            style="width: auto;">Add Theory syllabus </button></a>
                    <a href="tch_addpr_syl.php?id=<?php echo $id; ?>"><button id="addpr" type="button"
                            class="button hid" style="width: auto;">Add Practical syllabus </button></a>
                </div>
            </div>
        </div>

    </div>

    <script>
        let theo = document.getElementById("addth");
        let prac = document.getElementById("addpr");
        let ph = '<?php echo $row['practicalHours']; ?>';
        let th = '<?php echo $row['teachingHours']; ?>';
        if (ph > 0) {
            console.log(ph);
            prac.classList.remove("hid");
        }
        if (th > 0) {
            console.log(th);
            theo.classList.remove("hid");
        }
    </script>

</body>

</html>