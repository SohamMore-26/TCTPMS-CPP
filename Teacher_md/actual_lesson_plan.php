<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TCTPMS-CPP/css/stylest.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Actual Lesson Plan
    </title>
</head>

<body>
    <?php
    session_start();
    include "config.php";
    $acaYear = $_SESSION['aca_year'] = $_POST['aca_year'];
    $sem = $_SESSION['semester'] = $_POST['semester'];
    $sch = $_POST['scheme'];
    $sub = $_SESSION['sub'] = $_POST['sub'];
    $div = $_POST['div'];

    $checkApprove = mysqli_query($con, "select * from lesson_plan where course = '$sub' AND sem = '$sem' AND sch = '$sch' AND aca_year ='$acaYear' And flag = 'Approved'") or die(mysqli_error($con));
    if ($checkApprove->num_rows < 0) {
        echo "<script>
        swal({
            title: 'Warning',
            text: 'Lesson Plan Does Not Exists',
            icon: 'warning',
            button: 'OK'
        }).then(function() {
            window.location.href = 'tch_lesson_plan_progress.php'; 
        });
     </script>";
        exit();
    }
    elseif ($checkApprove->num_rows < 0) {
        echo "<script>
        swal({
            title: 'Warning',
            text: 'Lesson Plan Is Not Approved!!',
            icon: 'warning',
            button: 'OK'
        }).then(function() {
            window.location.href = 'tch_lesson_plan_progress.php'; 
        });
     </script>";
        exit();

    }
    if ($sub) {
        $view = mysqli_query($con, "select * from courseinfo where courseAbrevation = '$sub'") or die(mysqli_error($con));
        $row = mysqli_fetch_array($view);
    }
    extract($row); ?>
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
        <?php
        include "config.php";

        if ($sub) {
            $view1 = mysqli_query($con, "select * from lesson_plan where course = '$sub' ") or die(mysqli_error($con));
        } ?>
        <div class="C_C_contain_scroll">
            <div style="display: flex;align-items:center;flex-direction: column;">

                <table class="tablecss"
                    style="display: flex;align-items: flex-start;flex-direction: column;align-content: flex-start;background-color:">
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
                            <th>Course<br>Outcome</th>
                            <th>Unit<br>Outcome</th>
                            <th>Planned Topic</th>
                            <th>Planned Sub-Topic</th>
                            <th>Status</th>
                            <th>Actual Date</th>
                            <th>Actual Coverage</th>
                            <th>Add Assignments</th>
                            <th>Submit</th>
                        </tr>
                        <?php
                        while ($row1 = mysqli_fetch_array($view1)) {
                            extract($row1); ?>
                            <tr>
                                <td>
                                    <input type="hidden" id="row_id" name="row_id[]" value="<?php echo $row1['id']; ?>">
                                    <?php $plannedate = date("d-m-Y", strtotime($planned_date));
                                    echo $plannedate ?>
                                </td>
                                <td>
                                    <?php echo $row1['unit_name']; ?>
                                </td>
                                <td>
                                    <?php echo $row1['course_outcome']; ?>
                                </td>
                                <td>
                                    <?php echo $row1['unit_outcome']; ?>
                                </td>
                                <td>
                                    <?php echo $row1['topic']; ?>
                                </td>
                                <td>
                                    <?php echo $row1['sub_topic']; ?>
                                </td>
                                <td>
                                    <?php if ($row1['actual_coverage'] != null) { ?>
                                        <span class="material-symbols-outlined" style="color:#42f554;font-weight:bold;">
                                            done
                                        </span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($row1['actual_date'] != "0000-00-00") { ?>

                                        <?php $newdate2 = date("d-m-Y", strtotime($actual_date));
                                        echo "$newdate2"; ?>
                                    <?php } else { ?>
                                        <input class="sem" type="date" name="actual_date[]">
                                    <?php } ?>

                                </td>
                                <td>
                                    <?php if ($row1['actual_coverage'] != null) { ?>
                                        <?php echo $row1['actual_coverage']; ?>
                                    <?php } else { ?>
                                        <textarea class="sem" type="text" cols="20" name="actual_coverage[]"></textarea>
                                    <?php } ?>
                                </td>
                                <td>
                                    <input type="file">
                                </td>
                                <td>
                                    <input class="button" type="submit" onclick="submitForm(this)" value="Save">
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