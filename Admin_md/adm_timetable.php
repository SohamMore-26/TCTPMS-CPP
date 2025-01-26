<?php
include "config.php";  // Assuming you have this file for database connection

// Fetch distinct values for each filter
$academicYears = mysqli_query($con, "SELECT DISTINCT aca_year FROM timetable ORDER BY aca_year ASC") or die(mysqli_error($con));
$schemes = mysqli_query($con, "SELECT DISTINCT scheme FROM timetable ORDER BY scheme ASC") or die(mysqli_error($con));
$divisions = mysqli_query($con, "SELECT DISTINCT division FROM timetable ORDER BY division ASC") or die(mysqli_error($con));
$branches = mysqli_query($con, "SELECT DISTINCT branch FROM timetable ORDER BY branch ASC") or die(mysqli_error($con));

// Get the selected filter values from the GET request
$academic_year = isset($_GET['aca_year']) ? $_GET['aca_year'] : '';
$scheme = isset($_GET['scheme']) ? $_GET['scheme'] : '';
$division = isset($_GET['division']) ? $_GET['division'] : '';
$branch = isset($_GET['branch']) ? $_GET['branch'] : '';

// Construct the query with filters
$query = "SELECT * FROM timetable WHERE 1=1"; // 1=1 is used to simplify adding conditions

if ($academic_year) {
    $query .= " AND academic_year = '$academic_year'";
}

if ($scheme) {
    $query .= " AND scheme = '$scheme'";
}

if ($division) {
    $query .= " AND division = '$division'";
}

if ($branch) {
    $query .= " AND branch = '$branch'";
}

// Execute the query to get filtered data
$filtered_data = mysqli_query($con, $query) or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TCTPMS-CPP/css/stylest.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Admin Home Module</title>
</head>

<body>
    <div class="nav_head">
        <div class="title_div">
            <h1 id="h1">Teacher's Companion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Welcome Admin</h1>
        </div>
        <div class="lgt_div">
            <a href="\TCTPMS-CPP\logout.php"> <button type="button" id="button_lg" class="button">Logout</button></a>
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
            <!-- Add New Time Table Button -->
            <div class="m_card">
                <a href="adm_timetableFormC.php">
                    <h3>
                        <div class="icon"><span class="material-symbols-outlined">
                                add
                            </span></div> Add New Time Table
                    </h3>
                </a>
            </div>

            <!-- Filters Form -->
            <div class="filters">
                <form method="GET" action="">
                    <label for="academic_year">Academic Year:</label>
                    <select name="academic_year" id="academic_year">
                        <option value="">Select Academic Year</option>
                        <?php while ($year = mysqli_fetch_array($academicYears)): ?>
                            <option value="<?= $year['academic_year'] ?>" <?= ($academic_year == $year['academic_year']) ? 'selected' : '' ?>>
                                <?= $year['academic_year'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>

                    <label for="scheme">Scheme:</label>
                    <select name="scheme" id="scheme">
                        <option value="">Select Scheme</option>
                        <?php while ($scheme_option = mysqli_fetch_array($schemes)): ?>
                            <option value="<?= $scheme_option['scheme'] ?>" <?= ($scheme == $scheme_option['scheme']) ? 'selected' : '' ?>>
                                <?= $scheme_option['scheme'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>

                    <label for="division">Division:</label>
                    <select name="division" id="division">
                        <option value="">Select Division</option>
                        <?php while ($division_option = mysqli_fetch_array($divisions)): ?>
                            <option value="<?= $division_option['division'] ?>" <?= ($division == $division_option['division']) ? 'selected' : '' ?>>
                                <?= $division_option['division'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>

                    <label for="branch">Branch:</label>
                    <select name="branch" id="branch">
                        <option value="">Select Branch</option>
                        <?php while ($branch_option = mysqli_fetch_array($branches)): ?>
                            <option value="<?= $branch_option['branch'] ?>" <?= ($branch == $branch_option['branch']) ? 'selected' : '' ?>>
                                <?= $branch_option['branch'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>

                    <button type="submit" id="filter_button">Apply Filters</button>
                </form>
            </div>

            <!-- Table to Display Timetable -->
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

                    <!-- 07:30 AM - 08:30 AM -->
                    <tr>
                        <td>07:30 AM - 08:30 AM</td>
                        <?php
                        $view1 = mysqli_query($con, "SELECT * FROM timetable WHERE slot = '1' AND aca_year = '$academic_year' AND scheme = '$scheme' AND division = '$division' AND branch = '$branch'") or die(mysqli_error($con));
                        while ($row1 = mysqli_fetch_array($view1)) {
                            echo "<td>" . ($row1['course'] ? $row1['course'] : 'No Course') . "</td>";
                        }
                        ?>
                    </tr>

                    <!-- 08:30 AM - 09:30 AM -->
                    <tr>
                        <td>08:30 AM - 09:30 AM</td>
                        <?php
                        $view2 = mysqli_query($con, "SELECT * FROM timetable WHERE slot = '2' AND aca_year = '$academic_year' AND scheme = '$scheme' AND division = '$division' AND branch = '$branch'") or die(mysqli_error($con));
                        while ($row2 = mysqli_fetch_array($view2)) {
                            echo "<td>" . ($row2['course'] ? $row2['course'] : 'No Course') . "</td>";
                        }
                        ?>
                    </tr>

                    <!-- Break -->
                    <tr>
                        <td>09:30 AM - 10:00 AM</td>
                        <td colspan="6">Break</td>
                    </tr>

                    <!-- 10:00 AM - 11:00 AM -->
                    <tr>
                        <td>10:00 AM - 11:00 AM</td>
                        <?php
                        $view3 = mysqli_query($con, "SELECT * FROM timetable WHERE slot = '3' AND aca_year = '$academic_year' AND scheme = '$scheme' AND division = '$division' AND branch = '$branch'") or die(mysqli_error($con));
                        while ($row3 = mysqli_fetch_array($view3)) {
                            echo "<td>" . ($row3['course'] ? $row3['course'] : 'No Course') . "</td>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>11:00 AM - 12:00 PM</td>
                        <?php
                        $view3 = mysqli_query($con, "SELECT * FROM timetable WHERE slot = '4' AND aca_year = '$academic_year' AND scheme = '$scheme' AND division = '$division' AND branch = '$branch'") or die(mysqli_error($con));
                        while ($row3 = mysqli_fetch_array($view3)) {
                            echo "<td>" . ($row3['course'] ? $row3['course'] : 'No Course') . "</td>";
                        }
                        ?>
                    </tr>

                    <tr>
                        <td>12:00 PM - 12:10 PM</td>
                        <td colspan="6">Break</td>
                    </tr>
                    
                    <tr>
                        <td>12:10 PM - 01:10 PM</td>
                        <?php
                        $view3 = mysqli_query($con, "SELECT * FROM timetable WHERE slot = '5' AND aca_year = '$academic_year' AND scheme = '$scheme' AND division = '$division' AND branch = '$branch'") or die(mysqli_error($con));
                        while ($row3 = mysqli_fetch_array($view3)) {
                            echo "<td>" . ($row3['course'] ? $row3['course'] : 'No Course') . "</td>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>01:10 PM - 02:10 PM</td>
                        <?php
                        $view3 = mysqli_query($con, "SELECT * FROM timetable WHERE slot = '6' AND aca_year = '$academic_year' AND scheme = '$scheme' AND division = '$division' AND branch = '$branch'") or die(mysqli_error($con));
                        while ($row3 = mysqli_fetch_array($view3)) {
                            echo "<td>" . ($row3['course'] ? $row3['course'] : 'No Course') . "</td>";
                        }
                        ?>
                    </tr>

                    <!-- Additional slots can be added below in the same format -->
                    <!-- Continue with other timeslots like 11:00 AM - 12:00 PM, 12:10 PM - 01:10 PM, etc. -->

                </table>
            </div>
        </div>
    </div>
</body>

</html>
