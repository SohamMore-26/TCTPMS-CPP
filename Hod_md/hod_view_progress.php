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
    if (isset ($_GET['course'])) {
        $view = mysqli_query($con, "select * from courseinfo where courseAbrevation = '" . $_GET['course'] . "'") or die (mysqli_error($con));
        $row = mysqli_fetch_array($view);
    }
    extract($row); ?>
    <div class="nav_head">
        <div class="title_div">
        <h1 id="h1">Teacher's Companion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Welcome Head of Department</h1>
        </div>
        <div class="lgt_div">
            <a href="\TCTPMS-CPP\logout.php"> <button type="button" id="button_lg" class="button">Logout</button></a>
        </div>
    </div>
    <div class="main_cont">
        <div class="sidebar">
            <li>
                <div class="side_card">
                    <a href="hod_home.php">
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
                    <a href="hod_approval.php">
                        <ul><span class="material-symbols-outlined">
                                menu_book
                            </span>Approvals</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="hod_teacher.php">
                        <ul><span class="material-symbols-outlined">
                                group
                            </span> View Progress</ul>
                    </a>
                </div>
            </li>
        </div>
        <?php
        include "config.php";
        if (isset ($_GET['course'])) {
            $view1 = mysqli_query($con, "select * from lesson_plan where course = '" . $_GET['course'] . "'") or die (mysqli_error($con));
        } ?>
        <div class="C_contain_scroll">
            <div style="display: flex;align-items:center;flex-direction: column;margin-left: 80px;">

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
                            <th>Planned Topic</th>
                            <th>Planned Sub-Topic</th>
                            <th>Actual Coverage</th>
                            <th>Status</th>
                            <th>Actual Date</th>
                        </tr>
                        <?php
                        while ($row1 = mysqli_fetch_array($view1)) {
                            extract($row1); ?>
                            <tr>
                                <td>
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
                                    <?php echo $row1['actual_coverage']; ?>
                                </td>
                                <td>
                                    <?php echo $row1['status']; ?>
                                </td>
                                <td>
                                    <?php echo $row1['actual_date']; ?>
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