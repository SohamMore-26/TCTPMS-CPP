<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TCTPMS-CPP/css/stylest.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Actual Lesson Plan
    </title>
</head>

<body>
    <?php
    include "config.php";
    if (isset($_GET['course'])) {
        $view = mysqli_query($con, "select * from courseinfo where courseAbrevation = '" . $_GET['course'] . "'") or die(mysqli_error($con));
        $row = mysqli_fetch_array($view);
    }
    extract($row); ?>
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
        if (isset($_GET['course'])) {
            $view1 = mysqli_query($con, "select * from lesson_plan where course = '" . $_GET['course'] . "'") or die(mysqli_error($con));
        } ?>
        <div class="C_contain_scroll">
            <div style="display: flex;align-items:center;flex-direction: column;margin-left: 280px;">

                <table class="tablecss tb_card">
                    <form id="your_form" method="post" action="actual.php">
                        <h2>Actual Lesson Plan Of
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
                            <th>Status</th>
                            <th>Actual Date</th>
                            <th>Add Assignments</th>
                            <th>Submit</th>
                        </tr>
                        <?php
                        while ($row1 = mysqli_fetch_array($view1)) {
                            extract($row1); ?>
                            <tr>
                                <td>
                                    <input type="hidden" id="row_id" name="row_id[]" value="<?php echo $row1['id']; ?>">
                                    <input class="sem" type="text" name="planned_date[]" style="width:100px" value="<?php $plannedate = date("d-m-Y", strtotime($planned_date));
                                    echo $plannedate ?>">
                                </td>
                                <td>
                                    <textarea class="sem" type="text" cols="10" style="overflow-x: auto; white-space: nowrap;"
                                        name="unit_name[]"> <?php echo $row1['unit_name']; ?> </textarea>
                                </td>
                                <td>
                                    <textarea class="sem" type="text" cols="20" style="width:60px;overflow-x: auto; white-space: nowrap;"
                                        name="course_outcome[]"> <?php echo $row1['course_outcome']; ?> </textarea>
                                </td>
                                <td>
                                    <textarea class="sem" type="text" cols="20" style="width:60px;overflow-x: auto; white-space: nowrap;"
                                        name="unit_outcome[]"> <?php echo $row1['unit_outcome']; ?> </textarea>
                                </td>
                                <td>
                                    <textarea class="sem" type="text" cols="30"
                                        style="width:170px; overflow-x: auto; white-space: nowrap;"
                                        name="topic[]"> <?php echo $row1['topic']; ?>  </textarea>
                                </td>
                                <td>
                                    <textarea class="sem" type="text" cols="29"
                                        style="width:170px; overflow-x: auto; white-space: nowrap;"
                                        name="sub_topic[]"><?php echo $row1['sub_topic']; ?> </textarea>
                                </td>
                                <td>
                                    <input class="sem" type="checkbox" value="Done" name="status">
                                </td>
                                <td>
                                    <input class="sem" type="date" name="actual_date">
                                </td>
                                <td>
                                    <input type="file">
                                </td>
                                <td>
                                    <input class="button" type="submit" onclick="submitForm(this)">
                                </td>
                            </tr>
                        <?php } ?>
                </table>
                <!-- <input type="submit" name="addSyllabus" class="button"> -->
                </form>
            </div>
        </div>


</body>

</html>
<script>
    function submitForm(button) {
        var row = button.closest('tr');
        var id = row.querySelector('[name="row_id[]"]').value;
        document.getElementById('row_id').value = id;
        document.getElementById('your_form').submit();
    }
</script>