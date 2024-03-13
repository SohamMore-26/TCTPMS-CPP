<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TCTPMS-CPP/css/stylest.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>HOD Teacher Module
    </title>
</head>

<body>
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

        $qry = mysqli_query($con, "SELECT * FROM lesson_plan WHERE flag = 'Not approved'") or die(mysqli_error($con));
        $techs = [];
        while ($row = mysqli_fetch_array($qry)) {
            $techs[] = "'" . $row['preparedby'] . "'";
        }

        $techString = implode(',', $techs);
        $view = mysqli_query($con, "SELECT * FROM teacherinfo WHERE firstName != 'Admin' AND firstName != 'Head' AND teacherId IN ({$techString})") or die(mysqli_error($con));
        ?>
        <div class="main_c_cont" style="overflow:auto">
            <!-- <div class="w_card">
                <h3>
                    <div class="icon"><span class="material-symbols-outlined" style="margin-right: 10px;">
                            error
                        </span></div> No Existing Teachers
                </h3>
            </div> -->
            <?php
            $i = 1;
            while ($row = mysqli_fetch_array($view)) {
                extract($row); ?>
                <div class="m_card" style="padding:10px">
                    <a href="hod_one_course.php?id=<?php echo $teacherId; ?>">
                        <h3>
                            Prof.
                            <?php echo $row['firstName']; ?>
                            <?php echo $row['middleName']; ?>
                            <?php echo $row['lastName']; ?>
                        </h3>
                    </a>
                </div>
            <?php } ?>

        </div>



    </div>
    </div>


    <style>
        let aa="<?php echo $row[$techs_string]; ?>";
        console.log(aa);
    </style>

</body>

</html>