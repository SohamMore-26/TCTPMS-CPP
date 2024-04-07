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
        $row = mysqli_fetch_array($view);
    }

    ?>
    <div class="nav_head">
        <div class="title_div">
            <h1 id="h1">Teacher's Companion
            </h1>

        </div>
        <div class="title_div">
            <h1 id="h1"> Welcome Prof.
                <?php echo $_SESSION['firstName'] . $_SESSION['middleName'] . $_SESSION['lastName']; ?>
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
        <div class="main_c_cont">
            <?php
            include "config.php";
            $teacherId = $_SESSION['teacherId'];

            $timeSlots = [
                ['slot' => [1, 7, 13, 19, 25, 31], 'time' => '07:30 AM - 08:30 AM'],
                ['slot' => [2, 8, 14, 20, 26, 32], 'time' => '08:30 AM - 09:30 AM'],
                ['slot' => [3, 9, 15, 21, 27, 33], 'time' => '10:00 AM - 11:00 AM'],
                ['slot' => [4, 10, 16, 22, 28, 34], 'time' => '11:00 AM - 12:00 PM'],
                ['slot' => [5, 11, 17, 23, 29, 35], 'time' => '12:10 PM - 01:10 PM'],
                ['slot' => [6, 12, 18, 24, 30, 36], 'time' => '01:10 PM - 02:10 PM']
            ];

            $subs = array();

            $sql = "SELECT courseAbrevation FROM courseinfo WHERE teacher = '$teacherId'";

            $result = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $subs[] = $row['courseAbrevation'];
            }

            // Fetching data for each time slot
            foreach ($timeSlots as $timeSlot) {
                $slotNumbers = implode(',', $timeSlot['slot']);
                $query = "SELECT timetable.* FROM timetable INNER JOIN courseinfo ON timetable.course = courseinfo.courseAbrevation OR timetable.batch1 = courseinfo.courseAbrevation OR timetable.batch2 = courseinfo.courseAbrevation OR timetable.batch3 = courseinfo.courseAbrevation WHERE (timetable.slot IN ($slotNumbers)) AND (courseinfo.teacher = '$teacherId')";
                ${'view' . $timeSlot['slot'][0]} = mysqli_query($con, $query) or die(mysqli_error($con));
            }

            ?>

            <div class="t_tb_card t_tablecss">
                <h1>All Sem TimeTable</h1>
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

                    <?php
                    foreach ($timeSlots as $timeSlot) {

                        // Loop through views for each slot
                        for ($i = 1; $i <= 6; $i++) {
                            echo "<td>";

                            $view = ${'view' . $timeSlot['slot'][0]}; // Get the respective view
                            mysqli_data_seek($view, 0); // Reset pointer to first row
                    
                            // Initialize flag to check if any data printed
                            $printed = false;

                            while ($row = mysqli_fetch_array($view)) {
                                if ($row['slot'] != $timeSlot['slot'][$i - 1]) {
                                    continue;
                                }

                                if (isset($row['course']) && in_array($row['course'], $subs)) {
                                    echo $row['course'] . " (" . $row['division'] . ")";
                                    $printed = true;
                                }

                                for ($j = 1; $j <= 3; $j++) {
                                    if (!is_null($row["batch$j"]) && in_array($row["batch$j"], $subs)) {
                                        echo $row["batch$j"] . " (" . $row['division'] . "$j)" . PHP_EOL;
                                        $printed = true;
                                    }
                                }
                            }

                            if (!$printed) {
                                echo "";
                            }

                            echo "</td>";
                        }

                        echo "</tr>";

                        if ($timeSlot['time'] == '08:30 AM - 09:30 AM') {
                            echo '<tr><td>09:30 AM - 10:00 AM</td><td colspan="6">Break</td></tr>';
                        }
                        if ($timeSlot['time'] == '11:00 AM - 12:00 PM') {
                            echo '<tr><td>12:00 PM - 12:10 PM</td><td colspan="6">Break</td></tr>';
                        }
                    }
                    ?>
                </table>
            </div>
        </div>

    </div>
</body>

</html>