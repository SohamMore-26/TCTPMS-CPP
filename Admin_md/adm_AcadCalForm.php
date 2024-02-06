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
                    <a href="adm_home.html">
                        <ul><span class="material-symbols-outlined">
                                home
                            </span> Home</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="adm_timetable.html">
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
                    <a href="adm_AcademicCal.html">
                        <ul><span class="material-symbols-outlined">
                                calendar_clock
                            </span> Academic Calendar</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="adm_teacher.html">
                        <ul><span class="material-symbols-outlined">
                                group
                            </span> Teacher</ul>
                    </a>
                </div>
            </li>
        </div>
        <div class="main_c_cont_at">
            <form  method="post">
            <h1 id="h1">Academic Calendar</h1>
            <div class="branch_cont">
                <b><label for="semester" class="label">Semester:</label></b>
                <select id="semester" name="semester" class="sem">
                    <option value="">Select Semester</option>
                    <option value="Odd">Odd</option>
                    <option value="Even">Even</option>
                </select>

                <b><label for="scheme" class="label">Scheme:</label></b>
                <select id="scheme" name="scheme" class="sem">
                    <option value="">Select Scheme</option>
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
                <div class="cont_right">
                        <div class="label1">
                            <b><label>Academic Year :</label></b>
                        </div>
                        <div class="">

                            <b><label for="from" class="label">From :</label></b>
                            <input class="sem" type="text" id="from" name="aystdatefrom" required>
                            <b><label for="to" class="label">To :</label></b>
                            <input class="sem" type="text" id="to" name="aystdateto" required>

                        </div>

                        <div class="label1">
                            <b><label>Semester Duration :</label></b>
                        </div>
                        <div class="">
                            <b><label for="stsemfrom" class="label">From :</label></b>
                            <input class="sem" type="date" id="stsemfrom" name="stsemfrom" required>
                            <b><label for="stsemto" class="label">To :</label></b>
                            <input class="sem" type="date" id="stsemto" name="stfromto" required>
                        </div>
                        <div class="label1">
                            <b><label>Class Test - 1 Schedule :</label></b>
                        </div>
                        <div class="">
                            <b><label for="ct1from" class="label">From :</label></b>
                            <input class="sem" type="date" id="ct1from" name="ct1from" required>
                            <b><label for="ct1to" class="label">To :</label></b>
                            <input class="sem" type="date" id="ct1to" name="ct1to" required>

                        </div>
                    </div>

                    <div class="cont_left">


                        <div class="label1">
                            <b><label>Class Test - 2 Schedule :</label></b>
                        </div>
                        <div class="">
                            <b><label for="ct2from" class="label">From :</label></b>
                            <input class="sem" type="date" id="ct2from" name="ct2from" required>
                            <b><label for="ct2to" class="label">To :</label></b>
                            <input class="sem" type="date" id="ct2to" name="ct2to" required>

                        </div>

                        <div class="label1">
                            <b><label>Practical Examination Schedule :</label></b>
                        </div>
                        <div class="">
                            <b><label for="prefrom" class="label">From :</label></b>
                            <input class="sem" type="date" id="prefrom" name="prefrom" required>
                            <b><label for="preto" class="label">To :</label></b>
                            <input class="sem" type="date" id="preto" name="preto" required>

                        </div>

                        <div class="label1">
                            <b><label>Theory Examination Schedule :</label></b>
                        </div>
                        <div class="">
                            <b><label for="thform" class="label">From :</label></b>
                            <input class="sem" type="date" id="thfrom" name="thfrom" required>
                            <b><label for="thto" class="label">To :</label></b>
                            <input class="sem" type="date" id="thto" name="thto" required>

                        </div>

                    </div>
                </div>
                <div class="buttons">
                    <button type="submit" name="addCal" class="btt" class="button">Add</button>
                    <button type="submit" class="btt1" class="button1">Cancel</button>
                </div>
                
            </form>
            </div>
        </div>
        

</body>

</html>

<?php
include "config.php";

if(isset($_POST['addCal'])) {
    // Extract form data
    extract($_POST);

    // Check if required variables are set
    if(isset($semester, $scheme, $aystdatefrom, $aystdateto, $stsemfrom, $stfromto, $ct1from, $ct1to, $ct2from, $ct2to, $prefrom, $preto, $thfrom, $thto)) {

        // Insert data into the database
        $add = mysqli_query($con, "INSERT INTO `academic_cal`(`semester`,`scheme`,`aca_year_from`,`aca_year_to`,`sem_duration_from`,`sem_duration_to`,`class_test1_from`,`class_test1_to`,`class_test2_from`,`class_test2_to`,`practical_exam_from`,`practical_exam_to`,`theory_exam_from`,`theory_exam_to`) VALUES ('$semester', '$scheme', '$aystdatefrom', '$aystdateto', '$stsemfrom', '$stfromto', '$ct1from', '$ct1to', '$ct2from', '$ct2to', '$prefrom', '$preto', '$thfrom', '$thto')") or die(mysqli_error($con));

        if($add) {
            // Redirect to a different page to prevent form resubmission
            header("Location: success_page.php"); // Change "success_page.php" to your desired success page
            exit(); // Ensure script execution stops after redirect
        } else {
            echo "<script>";
            echo "alert('ERROR ! Fail..!')";
            echo "</script>";
        }

    } else {
        echo "<script>";
        echo "alert('One or more required fields are missing. Please fill in all the fields.');";
        echo "</script>";
    }
}
?>


