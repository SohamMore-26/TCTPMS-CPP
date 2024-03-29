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
        <?php
            include "config.php";
                // $view = mysqli_query($con, "select * from teacherinfo where firstName != 'Admin'") or die(mysqli_error($con));
                $view2 = mysqli_query($con, "select * from academic_cal where id = '".$_GET['id']."'") or die(mysqli_error($con));
                $row2 = mysqli_fetch_array($view2);


            ?>
        <div class="main_c_cont_at">
            <form method="post">
                <div style="margin-top:100px">
                    <h1 id="h1">Update Academic Calendar</h1>
                    <div class="branch_cont">
                        <b><label for="semester" class="label">Semester:</label></b>
                        <select id="semester" name="semester" class="sem">
                            <option value="inp">Select Semester</option>
                            <option value="1st Sem">1st Sem</option>
                            <option value="Odd (3,5)">Odd (3,5)</option>
                            <option value="Even (2,4,6)">Even (2,4,6)</option>
                        </select>

                        <b><label for="scheme" class="label">Scheme:</label></b>
                        <select id="scheme" name="scheme" class="sem">
                            <option value="inp">Select Scheme</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                            <option value="I">I</option>
                            <option value="K">K</option>
                        </select>

                    </div>
                    <div class="cont_r_l">
                        <div style="width:90%">
                            <div class="label1">
                                <b><label>Academic Year :</label></b>
                            </div>
                            <div class="inp">

                                <b><label for="from" class="label">From:</label></b>
                                <input class="sem" type="text" id="from" name="aystdatefrom"  value="<?php echo $row2['aca_year']; ?>" required>
                                <b><label for="to" class="label1">To:</label></b>
                                <input class="sem" type="text" id="to" name="aystdateto" value="<?php echo $row2['aca_year']; ?>" required>

                            </div>

                            <div class="label1">
                                <b><label>Semester Duration :</label></b>
                            </div>
                            <div class="inp">
                                <b><label for="stsemfrom" class="label">From:</label></b>
                                <input class="sem" type="date" id="stsemfrom" name="stsemfrom" value="<?php echo $row2['sem_duration_from']; ?>" required>
                                <b><label for="stsemto" class="label1">To:</label></b>
                                <input class="sem" type="date" id="stsemto" name="stfromto" value="<?php echo $row2['sem_duration_to']; ?>" required>
                            </div>
                            <div class="label1">
                                <b><label>Class Test - 1 Schedule :</label></b>
                            </div>
                            <div class="inp">
                                <b><label for="ct1from" class="label">From:</label></b>
                                <input class="sem" type="date" id="ct1from" name="ct1from" value="<?php echo $row2['class_test1_from']; ?>" required>
                                <b><label for="ct1to" class="label1">To:</label></b>
                                <input class="sem" type="date" id="ct1to" name="ct1to" value="<?php echo $row2['class_test1_to']; ?>" required>

                            </div>
                            <div class="label1">
                                <b><label>Class Test - 2 Schedule :</label></b>
                            </div>
                            <div class="inp">
                                <b><label for="ct2from" class="label">From:</label></b>
                                <input class="sem" type="date" id="ct2from" name="ct2from" value="<?php echo $row2['class_test2_from']; ?>" required>
                                <b><label for="ct2to" class="label1">To:</label></b>
                                <input class="sem" type="date" id="ct2to" name="ct2to" value="<?php echo $row2['class_test2_to']; ?>" required>
                            </div>

                            <div class="label1">
                                <b><label>Practical Examination Schedule :</label></b>
                            </div>
                            <div class="inp">
                                <b><label for="prefrom" class="label">From:</label></b>
                                <input class="sem" type="date" id="prefrom" name="prefrom" value="<?php echo $row2['practical_exam_from']; ?>" required>
                                <b><label for="preto" class="label1">To:</label></b>
                                <input class="sem" type="date" id="preto" name="preto" value="<?php echo $row2['practical_exam_to']; ?>" required>

                            </div>

                            <div class="label1">
                                <b><label>Theory Examination Schedule :</label></b>
                            </div>
                            <div class="inp">
                                <b><label for="thform" class="label">From:</label></b>
                                <input class="sem" type="date" id="thfrom" name="thfrom" value="<?php echo $row2['theory_exam_from']; ?>" required>
                                <b><label for="thto" class="label1">To:</label></b>
                                <input class="sem" type="date" id="thto" name="thto" value="<?php echo $row2['theory_exam_to']; ?>"required>

                            </div>

                        </div>
                    </div>
                    <div class="buttons">
                        <button type="submit" name="addCal" class="button">Update</button>
                        <a href="adm_AcademicCal.php"> <button type="button" class="button">Cancel</button></a>
                    </div>

                </div>

            </form>
        </div>
    </div>


</body>

</html>

<?php
include "config.php";

if (isset ($_POST['addCal'])) {
    // Extract form data
    extract($_POST);

    // Check if required variables are set
    $update = mysqli_query($con, "UPDATE `academic_cal` SET 
        `semester` = '$semester',
        `scheme` = '$scheme',
        `branch` = '$branch',
        `aca_year` = '$aystdatefrom - $aystdateto',
        `sem_duration_from` = '$stsemfrom',
        `sem_duration_to` = '$stfromto',
        `class_test1_from` = '$ct1from',
        `class_test1_to` = '$ct1to',
        `class_test2_from` = '$ct2from',
        `class_test2_to` = '$ct2to',
        `practical_exam_from` = '$prefrom',
        `practical_exam_to` = '$preto',
        `theory_exam_from` = '$thfrom',
        `theory_exam_to` = '$thto'
        WHERE <put your condition here>") or die(mysqli_error($con));

    if ($update) {
        echo "<script>";
        echo "alert('Data Updated Successfully !!')";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('ERROR ! Fail..!')";
        echo "</script>";
    }
}
?>