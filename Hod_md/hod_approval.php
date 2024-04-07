<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TCTPMS-CPP/css/stylest.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>HOD Module
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
                    <a href="hod_timetable.php">
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
        <div class="main_c_cont" style="overflow:auto">
            <?php
            include "config.php";

            $qry = mysqli_query($con, "SELECT * FROM lesson_plan WHERE flag = 'Not approved'") or die (mysqli_error($con));
            $techs = [];
            while ($row = mysqli_fetch_array($qry)) {
                $techs[] = "'" . $row['preparedby'] . "'";
            }

            $techString = implode(',', $techs);

            $qry = mysqli_query($con, "SELECT * FROM lesson_plan WHERE flag = 'Not approved'") or die (mysqli_error($con));
            $techs = [];
            while ($row1 = mysqli_fetch_array($qry)) {
                $techs[] = "'" . $row1['course'] . "'";
            }
            $techs_str = implode(',', $techs);


            if ($techString != null) {
                $view = mysqli_query($con, "SELECT * FROM teacherinfo WHERE firstName != 'Admin' AND firstName != 'Head' AND teacherId IN ({$techString})") or die (mysqli_error($con));
                $view1 = mysqli_query($con, "SELECT * from courseinfo where teacher IN ({$techString}) AND courseAbrevation IN ($techs_str)") or die (mysqli_error($con));
                ?>
                <table class="tb_card tablecss" style="padding:10px">
                <h2>
                    Approvals Pending
                </h2>
                    <tr>
                        <th>
                            Sr no.
                        </th>
                        <th>
                            Teacher ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Subject
                        </th>
                        <th>
                            View Plan
                        </th>
                    </tr>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_array($view)) {
                        extract($row); ?>
                        <?php
                        $j = 1;
                        while ($row1 = mysqli_fetch_array($view1)) {
                            extract($row1); ?>
                            <tr>
                                <td>
                                <?php echo $j; ?>
                                <?php $j += 1 ?>
                                </td>
                                <td>
                                    <?php echo $row['teacherId']; ?>
                                </td>
                                <td>
                                    Prof.
                                    <?php echo $row['firstName']; ?>
                                    <?php echo $row['middleName']; ?>
                                    <?php echo $row['lastName']; ?>
                                </td>
                                <td>
                                    <?php echo $row1['courseAbrevation']; ?>
                                </td>
                                <td>
                                    <a href="hod_approve_form.php?course=<?php echo $row1['courseAbrevation'] ?>">
                                        view
                                    </a>
                                </td>
                            </tr>

                        </table>
                    <?php  }
                    }

            } else {
                echo '<div class="m_card"><h3>No Approvals Pending</h3></div>';
            }
            ?>

        </div>



    </div>
    </div>


    <style>
        let aa="<?php echo $row[$techs_string]; ?>";
        console.log(aa);
    </style>

</body>

</html>