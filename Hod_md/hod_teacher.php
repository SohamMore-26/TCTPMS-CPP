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
            <a href="\TCTPMS-CPP\logout.php"> <button type="button" id="button_lg" class="button">Logout</button></a>
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
        $view = mysqli_query($con, "select * from teacherinfo where firstName != 'Admin'") or die(mysqli_error($con));
        ?>
        <div class="C_contain_scroll">
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
                <div class="m_card">
                    <a href="adm_teacherform.php">
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

</body>

</html>