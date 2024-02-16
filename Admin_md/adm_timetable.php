<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TCTPMS-CPP/css/stylest.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Admin Home Module
    </title>
</head>

<body>
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
                    <a href="adm_home.php">
                        <ul><span class="material-symbols-outlined">
                                home
                            </span> Home</ul>
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
                    <a href="adm_courses.php">
                        <ul><span class="material-symbols-outlined">
                                menu_book
                            </span> Courses</ul>
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
                    <a href="adm_teacher.php">
                        <ul><span class="material-symbols-outlined">
                                group
                            </span> Teacher</ul>
                    </a>
                </div>
            </li>
        </div>
        <div class="main_c_cont">
            <div class="m_card">
                <a href="adm_timetableForm.php">
                    <h3>
                        <div class="icon"><span class="material-symbols-outlined">
                                add
                            </span></div> Add New Time Table
                    </h3>
                </a>

            </div>
            <?php
            include "config.php";
            $view1 = mysqli_query($con, "select * from timetable WHERE slot = '1' OR slot = '7' OR slot = '13' OR slot = '19' OR slot = '25' OR slot = '31'") or die(mysqli_error($con));
            ?>
            <?php
            include "config.php";
            $view2 = mysqli_query($con, "select * from timetable WHERE slot = '2' OR slot = '8' OR slot = '14' OR slot = '20' OR slot = '26' OR slot = '32'") or die(mysqli_error($con));
            ?>
            <?php
            include "config.php";
            $view3 = mysqli_query($con, "select * from timetable WHERE slot = '3' OR slot = '9' OR slot = '15' OR slot = '21' OR slot = '27' OR slot = '33'") or die(mysqli_error($con));
            ?>
            <?php
            include "config.php";
            $view4 = mysqli_query($con, "select * from timetable WHERE slot = '4' OR slot = '10' OR slot = '16' OR slot = '22' OR slot = '28' OR slot = '34'") or die(mysqli_error($con));
            ?>
            <?php
            include "config.php";
            $view5 = mysqli_query($con, "select * from timetable WHERE slot = '5' OR slot = '11' OR slot = '17' OR slot = '23' OR slot = '29' OR slot = '35'") or die(mysqli_error($con));
            ?>
            <?php
            include "config.php";
            $view6 = mysqli_query($con, "select * from timetable WHERE slot = '6' OR slot = '12' OR slot = '18' OR slot = '24' OR slot = '30' OR slot = '36'") or die(mysqli_error($con));
            ?>
            <div class="tb_card tablecss">
                <table>
                    <tr>
                        <th>Day / <br>
                            Time</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                    </tr>
                    <tr>

                        <td>07:30 AM</td>
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
                        <td>08:30 AM</td>
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
                        <td>09:30 AM</td>
                        <td colspan="6">Break</td>
                    </tr>
                    <tr>
                        <td>10:00 AM</td>
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
                        <td>11:00 AM</td>
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
                        <td>12:00 PM</td>
                        <td colspan="6">Break</td>
                    </tr>
                    <tr>
                        <td>12:10 PM</td>
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
                        <td>01:10 PM</td>
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