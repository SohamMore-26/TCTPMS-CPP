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
    <title>HOD Monitor Module
    </title>
</head>

<body>
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
        <div class="main_c_cont" id="cont_M">
            <?php
            include "config.php";
            $qry = mysqli_query($con, "SELECT * FROM lesson_plan WHERE flag = 'Not approved'") or die(mysqli_error($con));
            $techs = [];
            while ($row1 = mysqli_fetch_array($qry)) {
                $techs[] = "'" . $row1['course'] . "'";
            }
            $techs_str = implode(',', $techs);
            if ($techs_str != null) {
                $view1 = mysqli_query($con, "select * from courseinfo where teacher = '" . $_GET['id'] . "' AND courseAbrevation IN ($techs_str)") or die(mysqli_error($con));
                while ($row = mysqli_fetch_array($view1)) {
                    ?>
                    <a href="hod_approve_form.php?course=<?php echo $row['courseAbrevation'] ?>">
                        <div class="m_card">
                            <h3>
                                <div class="icon">
                                    <span class="material-symbols-outlined">menu_book</span>
                                </div>
                                <?php echo $row['courseTitle']; ?>
                            </h3>
                        </div>
                    </a>
                    <?php
                }
            }
            else
                echo '<div class="m_card"><h3>No Approvals Pending</h3></div>'
            ?>


        </div>

    </div>
</body>

</html>