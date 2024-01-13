<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylest.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Time Table Form
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
                <a href="adm_home.html">
                    <ul><span class="material-symbols-outlined">
                            home
                        </span> Home</ul>
                </a>
                <hr>
                <a href="adm_timetable.html">
                    <ul><span class="material-symbols-outlined">
                            today
                        </span> Time Table</ul>
                </a>
                <hr>
                <a href="adm_courses.html">
                    <ul><span class="material-symbols-outlined">
                            menu_book
                        </span> Courses</ul>
                </a>
                <hr>
                <a href="adm_AcademicCal.html">
                    <ul><span class="material-symbols-outlined">
                            calendar_clock
                        </span> Academic Calendar</ul>
                </a>
                <hr>
                <a href="">
                    <ul><span class="material-symbols-outlined">
                            group
                        </span> Teacher</ul>
                </a>
                <hr>
                <a href="">
                    <ul><span class="material-symbols-outlined">
                            pending_actions
                        </span> Approvals</ul>
                </a>
            </li>
        </div>

        <div class="timeTableHead">
            <center>
                <h1 id="h1">Add Time Table</h1>
            </center>
            <b><label for="semester" class="label">Semester :</label></b>
            <select id="semester" name="semester" class="sem">
                <option value="">Select Semester</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>

            <b><label for="scheme" class="label">Scheme :</label></b>
            <select id="scheme" name="scheme" class="sem">
                <option value="">Select Scheme</option>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
                <option value="e">E</option>
                <option value="f">F</option>
                <option value="g">G</option>
                <option value="h">H</option>
                <option value="i">I</option>
                <option value="k">K</option>
            </select>

            <b><label for="division" class="label">Division :</label></b>
            <select id="division" name="division" class="sem">
                <option value="">Select Division</option>
                <option value="a">A</option>
                <option value="b">B</option>
            </select>

            <b><label for="acaYear" class="label">Academic Year :</label></b>
            <input class="sem" type="text" id="acaYear" name="acaYear" placeholder="Enter Academic Year" required>


            <center>
                <table>
                    <tr>
                        <th>Day/ <br>
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
                        <td>
                            <div class="tdContant"><input type="radio" id="1" name="ThPr" onclick="openDialog(this)"
                                    value="Theory"> Theory
                                <input type="radio" id="1" name="ThPr" onclick="openDialog(this)"
                                    value="Practical">Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant"><input type="radio" id="7" name="ThPr" onclick="openDialog(this)"
                                    value="Theory">Theory
                                <input type="radio" id="7" name="ThPr" onclick="openDialog(this)"
                                    value="Practical">Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant"><input type="radio" id="13" name="ThPr" onclick="openDialog(this)"
                                    value="Theory">Theory
                                <input type="radio" id="13" name="ThPr" onclick="openDialog(this)"
                                    value="Practical">Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant"><input type="radio" id="19" name="ThPr" onclick="openDialog(this)"
                                    value="Theory">Theory
                                <input type="radio" id="19" name="ThPr" onclick="openDialog(this)"
                                    value="Practical">Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant"><input type="radio" id="25" name="ThPr" onclick="openDialog(this)"
                                    value="Theory">Theory
                                <input type="radio" id="25" name="ThPr" onclick="openDialog(this)"
                                    value="Practical">Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant"><input type="radio" id="31" name="ThPr" onclick="openDialog(this)"
                                    value="Theory">Theory
                                <input type="radio" id="31" name="ThPr" onclick="openDialog(this)"
                                    value="Practical">Practical
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td>08:30 AM</td>
                        <td>
                            <div class="tdContant"><input type="radio" id="2" name="ThPr" onclick="openDialog(this)"
                                    value="Theory"> Theory
                                <input type="radio" id="2" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant"><input type="radio" id="8" name="ThPr" onclick="openDialog(this)"
                                    value="Theory"> Theory
                                <input type="radio" id="8" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant"><input type="radio" id="14" name="ThPr" onclick="openDialog(this)"
                                    value="Theory"> Theory
                                <input type="radio" id="14" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant"><input type="radio" id="20" name="ThPr" onclick="openDialog(this)"
                                    value="Theory"> Theory
                                <input type="radio" id="20" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant"><input type="radio" id="26" name="ThPr" onclick="openDialog(this)"
                                    value="Theory"> Theory
                                <input type="radio" id="26" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant"><input type="radio" id="32" name="ThPr" onclick="openDialog(this)"
                                    value="Theory"> Theory
                                <input type="radio" id="32" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td>09:30 AM</td>
                        <td colspan="6">Break</td>
                    </tr>
                    <tr>
                        <td>10:00 AM</td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="3" name="ThPr" onclick="openDialog(this)" value="Theory"> Theory
                                <input type="radio" id="3" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="9" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="9" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="15" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="15" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="21" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="21" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="27" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="27" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="33" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="33" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td>11:00 AM</td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="4" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="4" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="10" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="10" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="16" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="16" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="22" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="22" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="28" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="28" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="34" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="34" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td>12:00 PM</td>
                        <td colspan="6">Break</td>
                    </tr>
                    <tr>
                        <td>12:10 PM</td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="5" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="5" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="11" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="11" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="17" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="17" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="23" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="23" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="29" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="29" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="35" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="35" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>01:10 PM</td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="6" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="6" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="12" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="12" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="18" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="18" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="24" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="24" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="30" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="30" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>
                        <td>
                            <div class="tdContant">
                                <input type="radio" id="36" name="ThPr" onclick="openDialog(this)" value="Theory">
                                Theory
                                <input type="radio" id="36" name="ThPr" onclick="openDialog(this)" value="Practical">
                                Practical
                            </div>
                        </td>

                    </tr>
                </table>
            </center>

            <dialog id="myDialog">

                <div class="dialog">
                        <form method="post">
                            <h2 class="timeTableHeader">Theory Time Table</h2>
                            <b><label for="slot" class="label">Slot :</label></b>
                            <input class="sem" type="text" id="slot" name="slot" placeholder="For.eg: Slot: 1" required>
                            <b><label for="time_day" class="label">Day :</label></b>
                            <input class="sem" type="text" id="time_day" name="time_day" placeholder="For.eg: Monday"
                                required>
                            <b><label for="time_ThPr" class="label">Theory / Practical :</label></b>
                            <input class="sem" type="text" id="time_ThPr" name="time_ThPr" placeholder="For.eg: Theory"
                                required>
                            <b><label for="time_course" class="label">Course Abrevation :</label></b>
                            <input class="sem" type="text" id="time_course" name="time_course" placeholder="For.eg: STE"
                                required>
                                <button type="submit" class="timeTableButton" name="addTimeTable">Add</button>
                                <button class="timeTableButton" onclick="closeDialog()">Close</button>

                        </form>
                </div>
            </dialog>

            <dialog id="myDialogP">

                <div class="dialog">
                    <h2 class="timeTableHeader">Practical Time Table</h2>
                    <b><label for="time_day" class="label">Day :</label></b>
                    <input class="sem" type="text" id="time_day" name="time_day" placeholder="For.eg: Monday" required>
                    <b><label for="time_ThPr" class="label">Theory / Practical :</label></b>
                    <input class="sem" type="text" id="time_ThPr" name="time_ThPr" placeholder="For.eg: Theory"
                        required>
                    <b><label for="time_course" class="label">Course Abrevation :</label></b>
                    <input class="sem" type="text" id="time_course" name="time_course" placeholder="For.eg: STE"
                        required>
                    <button class="timeTableButton" onclick="closeDialogP()">Close</button>
                </div>
            </dialog>


            <script src="script.js"></script>



</body>

</html>

<?php

    include "config.php";
    if(isset($_POST['addTimeTable']))
	{
		extract($_POST);

		$add = mysqli_query($con,"INSERT INTO `timetable`(`time_day`, `time_Thpr`, `time_course`) VALUES ('$time_day','$time_ThPr','$time_course')") or die(mysqli_error($con));

		if($add)
		{
		echo "<script>";
		echo "alert('Successfully Added...');";
		echo "</script>";
		}
		else
		{
			echo "<script>";
			echo "alert('ERROR ! Fail..!')";
			echo "</script>";
		}
	}

?>