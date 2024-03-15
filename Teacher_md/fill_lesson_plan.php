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
    $sub = $_POST['sub'];
    $view = mysqli_query($con, "select * from courseinfo where courseAbrevation = '$sub'") or die(mysqli_error($con));
    $row = mysqli_fetch_array($view);

    extract($row);
    $resultt = mysqli_query($con, "select teachingHours from courseinfo where courseAbrevation = '$sub'") or die(mysqli_error($con));
    $row11 = mysqli_fetch_assoc($resultt);
    $no_of_lec = $row11['teachingHours'];
    
    ?>
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
        <?php
        include "config.php";

        $view1 = mysqli_query($con, "select * from syllabus where course = '$sub'") or die(mysqli_error($con));
        ?>
        <div class="C_contain_scroll">
            <div style="display: flex;align-items:center;flex-direction: column; margin-left: 180px;">
                <table class="tablecss tb_card">
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
                            <th>Add PPTS</th>
                        </tr>
                        <?php
                        while ($row1 = mysqli_fetch_array($view1)) {
                            extract($row1); ?>
                            <tr>
                                <td>
                                    <input class="sem" type="date" name="planned_date[]">
                                    <input class="sema" type="text" name="sub[]"
                                        value="<?php echo $row['courseAbrevation'] ?>" style="display: none;">
                                    <input class="sema" type="text" name="code[]" value="<?php echo $row['courseCode'] ?>"
                                        style="display: none;">
                                </td>
                                <td>
                                    <textarea class="sem" type="text" cols="10"
                                        name="unit_name[]"> <?php echo $row1['unit_name']; ?> </textarea>
                                </td>
                                <td>
                                    <textarea class="sem" type="text" cols="20"
                                        name="course_outcome[]"> <?php echo $row1['course_outcome']; ?> </textarea>
                                </td>
                                <td>
                                    <textarea class="sem" type="text" cols="20"
                                        name="unit_outcome[]"> <?php echo $row1['unit_outcome']; ?> </textarea>
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
                                <td>
                                    <input type="file">
                                </td>
                            </tr>
                        <?php } ?>
                </table>
                <input type="submit" name="addSyllabus" class="button">
                </form>
            </div>
        </div>
    </div>

</body>

</html>