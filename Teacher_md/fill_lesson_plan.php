<?php
// session_start();
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
//     $showError = "Login Failed...!";
//     header("location: index.php");
//     exit;
// }
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
        <h1 id="h1">Teacher's Companion </h1> </div>
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
        <?php
        session_start();
        $acaYear = $_SESSION['acaYear'];
        $sem = $_SESSION['sem'];
        $sch = $_SESSION['sch'];
        $sub = $_SESSION['sub'];
        $div = $_SESSION['div'];
        include "config.php";

        $view = mysqli_query($con, "select * from courseinfo where courseAbrevation = '$sub'") or die (mysqli_error($con));
        $row = mysqli_fetch_array($view);
        extract($row);

        $view1 = mysqli_query($con, "SELECT * FROM test JOIN syllabus ON syllabus.course = test.course AND syllabus.lecno = test.lecno  WHERE syllabus.course = '$sub'") or die (mysqli_error($con));
       ?>

        <div class="C_C_contain_scroll">
            <div style="display: flex;align-items:center;flex-direction: column;">
                <table class="tablecss" style="display: flex;align-items: flex-start;flex-direction: column;align-content: flex-start;">
                    <form method="post" action="insert_lesson.php">
                        <h2>Enter Lesson Plan of
                            <?php echo $row['courseTitle'] ?> (
                            <?php echo $row['branch'] ?>
                            <?php echo $row['semester'] ?>
                            <?php echo $row['scheme'] ?>)
                        </h2>
                        <tr>
                            <th>Planned Date</th>
                            <th>Unit Name</th>
                            <th>Course Outcome</th>
                            <th>Unit Outcome</th>
                            <th>Topic</th>
                            <th>Sub-Topic</th>
                            <th>Teaching Aids</th>
                        </tr>
                        <?php
                        while ($row1 = mysqli_fetch_array($view1)) {
                            extract($row1); ?>
                            <tr>
                                <td>

                                    <input class="sem" type="text" name="planned_date[]" style="width:90px" value="<?php
                                    if ($row1['date'] != "Extra Lecture") {
                                        $plannedate = date("d-m-Y", strtotime($date));
                                        echo $plannedate;
                                    } else {
                                        echo "Extra Lecture";
                                    }
                                    ?>">
                                    <input class="sem" type="text" name="acaYear[]"
                                        value="<?php echo $acaYear ?>" style="display: none;">
                                    <input class="sem" type="text" name="sem[]"
                                        value="<?php echo $sem ?>" style="display: none;">
                                    <input class="sem" type="text" name="sch[]"
                                        value="<?php echo $sch ?>" style="display: none;">
                                    <input class="sem" type="text" name="div[]"
                                        value="<?php echo $div ?>" style="display: none;">
                                    <input class="sema" type="text" name="sub[]" value="<?php echo $row['courseAbrevation'] ?>"
                                        style="display: none;">
                                    <input class="sema" type="text" name="code[]" value="<?php echo $row['courseCode'] ?>"
                                        style="display: none;">

                                </td>
                                <td>
                                    <textarea class="sem" type="text" cols="10"
                                        name="unit_name[]"> <?php echo $row1['unit_name']; ?> </textarea>
                                </td>
                                <td>
                                    <input class="sema" type="text" cols="20"
                                        name="course_outcome[]" value="<?php echo $row1['course_outcome']; ?>" > 
                                </td> 
                                <td>
                                    <input class="sema" type="text" cols="20"
                                        name="unit_outcome[]" value="<?php echo $row1['unit_outcome']; ?>" >
                                </td>
                                <td>
                                    <textarea class="sem" type="text" cols="30"
                                        name="topic[]"> <?php echo $row1['topic']; ?>  </textarea>
                                </td>
                                <td>
                                    <textarea class="sem" type="text" cols="29" rows="5"
                                        name="sub_topic[]"><?php echo $row1['sub_topic']; ?> </textarea>
                                </td>
                                <td>
                                    <textarea class="sem" type="text" cols="29" rows="5" name="teaching_aids[]"> </textarea>
                                </td>
                            </tr>
                        <?php } ?>
                </table>
                <input type="submit" name="addSyllabus" class="button" value="Verify">
                </form>
            </div>
        </div>
    </div>

</body>

</html>