<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TCTPMS-CPP/css/stylest.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Academic Time Table
    </title>
</head>

<body>

    <div class="nav_head">
        <div class="title_div">
            <h1>Teacher's Companion</h1>
        </div>
        <div class="lgt_div">
            <button type="submit" id="button" class="btt">Logout</button>
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
                    <a href="adm_timetable.php">
                        <ul><span class="material-symbols-outlined">
                                today
                            </span> Time Table</ul>
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
                    <a href="adm_AcademicCal.php">
                        <ul><span class="material-symbols-outlined">
                                calendar_clock
                            </span> Academic Calendar</ul>
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

        <?php
                        include "config.php";
                        if (isset($_GET['id'])) {
                            $view = mysqli_query($con, "select * from teacherinfo where id = '" . $_GET['id'] . "'") or die(mysqli_error($con));
                            $row = mysqli_fetch_array($view);
                        }
                        ?>

        <div class="main_c_cont_t">
            <div class="form_cont">
                <h1 id="h1">Create a Teacher</h1>
                <form method="post" class="aca-form">
                    <div class="form_c_cont">
                        <div class="name_cont">
                            <div class="name">
                                <b><label for="firstName" class="label">First Name :</label></b>
                                <input class="sem" type="text" id="firstName" name="firstName"
                                    value="<?php echo $row['firstName']; ?>" required>
                            </div>
                            <div class="name">
                                <b><label for="middleName" class="label">Middle Name :</label></b>
                                <input class="sem" type="text" id="middleName" name="middleName"
                                value="<?php echo $row['middleName']; ?>" required>
                            </div>
                            <div class="name">
                                <b><label for="lastName" class="label">Last Name :</label></b>
                                <input class="sem" type="text" id="lastName" name="lastName"
                                value="<?php echo $row['lastName']; ?>" required>
                            </div>
                        </div>

                        <div class="name_cont">
                            <div class="name">
                                <b><label for="teacher_id" class="label">Teacher ID :</label></b>
                                <input class="sem" type="text" id="teacher_id" name="teacherId"
                                value="<?php echo $row['teacherId']; ?>" required>
                            </div>

                            <div class="name">
                                <b><label for="designation" class="label">Designation :</label></b>
                                <select id="designation" name="designation" class="sem" value="<?php echo $row['designation']; ?>">
                                    <option value="">Select Designation</option>
                                    <option value="Lecturer">Lecturer</option>
                                    <option value="Head of Department">Head of Department</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>

                            <div class="name">
                                <b><label for="branch" class="label">Branch :</label></b>
                                <input class="sem" type="text" id="branch" name="branch" value="<?php echo $row['branch']; ?>"
                                    required>
                            </div>
                        </div>

                        <div class="name_cont">
                            <div class="name">
                                <b><label for="joiningDate" class="label">Joining Date :</label></b>
                                <input class="sem" type="date" id="joiningDate" name="joiningDate" value="<?php echo $row['joiningDate']; ?>" required>
                            </div>

                            <div class="name_r">
                                <b><label for="currentStatus" class="label">Current Status :</label></b>
                                <div class="radio_cont">
                                    <input class="sem1" type="radio" id="currentStatus" name="currentStatus"
                                        value="Teaching" required>
                                    Teaching
                                    <input class="sem1" type="radio" id="currentStatus" name="currentStatus"
                                        value="Retried" required>
                                    Retried
                                </div>
                            </div>
                            <div class="name">
                                <b><label for="leavingDate" class="label">Leaving Date :</label></b>
                                <input class="sem" type="date" id="leavingDate" name="leavingDate" value="<?php echo $row['leavingDate']; ?>">
                            </div>
                        </div>

                        <div class="form_button_cont">
                            <button type="submit"  class="button" name="updateTeacher">Update</button>
                            <a href="adm_teacher.php"> <button type="button" href="adm_teacher.php" class="button" >Cancel</button></a>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
    </div>
</body>

</html>
<?php

include "config.php";
if (isset($_POST['updateTeacher'])) {
    extract($_POST);



    $add = mysqli_query($con,"UPDATE `teacherinfo` SET `firstName`='$firstName',`middleName`='$middleName', `lastName`='$lastName',`teacherId`='$teacherId',`car_comp`='$car_comp',`designation`='$designation',`branch`='$branch',`joiningDate`='$joiningDate',`currentStatus`='$currentStatus',`leavingDate`='$leavingDate' WHERE id = '" . $_GET['id'] . "'") or die(mysqli_error($con));

    if ($add) {
        echo "<script>";
        echo "alert('Successfully Updated');";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('ERROR ! Fail..!')";
        echo "</script>";
    }
}