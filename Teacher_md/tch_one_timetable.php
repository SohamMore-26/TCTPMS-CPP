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
        $view = mysqli_query($con, "select * from courseinfo where teacher = '" . $_SESSION['firstName'] . "'") or die(mysqli_error($con));
    }
    ?>
    <div class="nav_head">
        <div class="title_div">
            <h1 id="h1">Teacher's Companion</h1>
        </div>
        <div class="lgt_div">
            <button type="button" id="button_lg" class="button">Logout</button>
        </div>
    </div>
    <div class="main_cont">
        <div class="sidebar">
            <li>
                <div class="side_card">
                    <a href="tch_home.html">
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
                    <a href="tch_courses.php">
                        <ul><span class="material-symbols-outlined">
                                menu_book
                            </span> Courses</ul>
                    </a>
                </div>
                <!-- 
                <div class="side_card">
                    <a href="tch_AcademicCal.html">
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
        <div class="main_c_cont">
            <?php
            include "config.php";
            $view1 = mysqli_query($con, "select * from timetable WHERE semester = '" . $_GET['id'] . "' AND  slot = '1' AND slot = '7' AND slot = '13' AND slot = '19' AND slot = '25' AND slot = '31'") or die(mysqli_error($con));
            ?>
            <?php
            include "config.php";
            $view2 = mysqli_query($con, "select * from timetable WHERE semester = '" . $_GET['id'] . "' AND slot = '2' AND slot = '8' AND slot = '14' AND slot = '20' AND slot = '26' AND slot = '32'") or die(mysqli_error($con));
            ?>
            <?php
            include "config.php";
            $view3 = mysqli_query($con, "select * from timetable WHERE semester = '" . $_GET['id'] . "' AND slot = '3' AND slot = '9' AND slot = '15' AND slot = '21' AND slot = '27' AND slot = '33'") or die(mysqli_error($con));
            ?>
            <?php
            include "config.php";
            $view4 = mysqli_query($con, "select * from timetable WHERE semester = '" . $_GET['id'] . "' AND slot = '4' AND slot = '10' AND slot = '16' AND slot = '22' AND slot = '28' AND slot = '34'") or die(mysqli_error($con));
            ?>
            <?php
            include "config.php";
            $view5 = mysqli_query($con, "select * from timetable WHERE semester = '" . $_GET['id'] . "' AND slot = '5' AND slot = '11' AND slot = '17' AND slot = '23' AND slot = '29' AND slot = '35'") or die(mysqli_error($con));
            ?>
            <?php
            include "config.php";
            $view6 = mysqli_query($con, "select * from timetable WHERE semester = '" . $_GET['id'] . "' AND slot = '6' AND slot = '12' AND slot = '18' AND slot = '24' AND slot = '30' AND slot = '36'") or die(mysqli_error($con));
            ?>
            <div class="t_tb_card t_tablecss">
                <table>
                    <tr>
                        <th>Day/Time</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                    </tr>
                    <tr>

                        <td>07:30 AM - 08:30 AM</td>
                        <?php
                        while ($row1 = mysqli_fetch_array($view1)) {
                            extract($row1); ?>
                            <td>

                                <?php if ($row1['course'] != null) {
                                    echo $row1['course'];
                                } ?>
                                <?php if ($row1['batch1'] != null) {
                                    echo $row1['batch1'] . " (" . $row1['division'] . "1)";
                                } ?>
                                <?php if ($row1['batch2'] != null) {
                                    echo $row1['batch2'] . " (" . $row1['division'] . "2)";
                                } ?>
                                <?php if ($row1['batch3'] != null) {
                                    echo $row1['batch3'] . " (" . $row1['division'] . "3)";
                                } ?>
                            </td>
                        <?php } ?>

                    </tr>
                    <tr>
                        <td>08:30 AM - 09:30 AM</td>
                        <?php
                        while ($row2 = mysqli_fetch_array($view2)) {
                            extract($row2); ?>
                            <td>

                                <?php if ($row2['course'] != null) {
                                    echo $row2['course'];
                                } ?>
                                <?php if ($row2['batch1'] != null) {
                                    echo $row2['batch1'] . " (" . $row2['division'] . "1)";
                                } ?>
                                <?php if ($row2['batch2'] != null) {
                                    echo $row2['batch2'] . " (" . $row2['division'] . "2)";
                                } ?>
                                <?php if ($row2['batch3'] != null) {
                                    echo $row2['batch3'] . " (" . $row2['division'] . "3)";
                                } ?>
                            </td>
                        <?php } ?>

                    </tr>
                    <tr>
                        <td>09:30 AM - 10:00 AM</td>
                        <td colspan="6">Break</td>
                    </tr>
                    <tr>
                        <td>10:00 AM - 11:00 AM</td>
                        <?php
                        while ($row3 = mysqli_fetch_array($view3)) {
                            extract($row3); ?>
                            <td>

                                <?php if ($row3['course'] != null) {
                                    echo $row3['course'];
                                } ?>
                                <?php if ($row3['batch1'] != null) {
                                    echo $row3['batch1'] . " (" . $row3['division'] . "1)";
                                } ?>
                                <?php if ($row3['batch2'] != null) {
                                    echo $row3['batch2'] . " (" . $row3['division'] . "2)";
                                } ?>
                                <?php if ($row3['batch3'] != null) {
                                    echo $row3['batch3'] . " (" . $row3['division'] . "3)";
                                } ?>
                            </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td>11:00 AM - 12:00 PM</td>
                        <?php
                        while ($row4 = mysqli_fetch_array($view4)) {
                            extract($row4); ?>
                            <td>

                                <?php if ($row4['course'] != null) {
                                    echo $row4['course'];
                                } ?>
                                <?php if ($row4['batch1'] != null) {
                                    echo $row4['batch1'] . " (" . $row4['division'] . "1)" . PHP_EOL;
                                } ?>
                                <?php if ($row4['batch2'] != null) {
                                    echo $row4['batch2'] . " (" . $row4['division'] . "2)" . PHP_EOL;
                                } ?>
                                <?php if ($row4['batch3'] != null) {
                                    echo $row4['batch3'] . " (" . $row4['division'] . "3)" . PHP_EOL;
                                } ?>
                            </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td>12:00 PM - 12:10 PM</td>
                        <td colspan="6">Break</td>
                    </tr>
                    <tr>
                        <td>12:10 PM - 01:10 PM</td>
                        <?php
                        while ($row5 = mysqli_fetch_array($view5)) {
                            extract($row5); ?>
                            <td>

                                <?php if ($row5['course'] != null) {
                                    echo $row5['course'];
                                } ?>
                                <?php if ($row5['batch1'] != null) {
                                    echo $row5['batch1'] . " (" . $row5['division'] . "1)" . PHP_EOL;
                                } ?>
                                <?php if ($row5['batch2'] != null) {
                                    echo $row5['batch2'] . " (" . $row5['division'] . "2)" . PHP_EOL;
                                } ?>
                                <?php if ($row5['batch3'] != null) {
                                    echo $row5['batch3'] . " (" . $row5['division'] . "3)" . PHP_EOL;
                                } ?>
                            </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td>01:10 PM - 02:10 PM</td>
                        <?php
                        while ($row6 = mysqli_fetch_array($view6)) {
                            extract($row6); ?>
                            <td>

                                <?php if ($row6['course'] != null) {
                                    echo $row6['course'];
                                } ?>
                                <?php if ($row6['batch1'] != null) {
                                    echo $row6['batch1'] . " (" . $row6['division'] . "1)" . PHP_EOL;
                                } ?>
                                <?php if ($row6['batch2'] != null) {
                                    echo $row6['batch2'] . " (" . $row6['division'] . "2)" . PHP_EOL;
                                } ?>
                                <?php if ($row6['batch3'] != null) {
                                    echo $row6['batch3'] . " (" . $row6['division'] . "3)" . PHP_EOL;
                                } ?>
                            </td>
                        <?php } ?>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</body>

</html>