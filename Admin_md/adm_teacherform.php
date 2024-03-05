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
        <div class="main_c_cont_t">
            <div class="form_cont">
                <h1 id="h1">Create a Teacher</h1>
                <form method="post" class="aca-form">
                    <div class="form_c_cont">
                        <div class="name_cont">
                            <div class="name">
                                <b><label for="firstName" class="label">First Name :</label></b>
                                <input class="sem" type="text" id="firstName" name="firstName"
                                    placeholder="Enter First Name" required>
                            </div>
                            <div class="name">
                                <b><label for="middleName" class="label">Middle Name :</label></b>
                                <input class="sem" type="text" id="middleName" name="middleName"
                                    placeholder="Enter Middle Name" required>
                            </div>
                            <div class="name">
                                <b><label for="lastName" class="label">Last Name :</label></b>
                                <input class="sem" type="text" id="lastName" name="lastName"
                                    placeholder="Enter Last Name" required>
                            </div>
                        </div>

                        <div class="name_cont">
                            <div class="name">
                                <b><label for="teacher_id" class="label">Teacher ID :</label></b>
                                <input class="sem" type="text" id="teacher_id" name="teacherId"
                                    placeholder="Enter Teacher ID" required>
                            </div>

                            <div class="name">
                                <b><label for="designation" class="label">Designation :</label></b>
                                <select id="designation" name="designation" class="sem">
                                    <option value="">Select Designation</option>
                                    <option value="Lecturer">Lecturer</option>
                                    <option value="Head of Department">Head of Department</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>

                            <div class="name">
                                <b><label for="branch" class="label">Branch :</label></b>
                                <select id="branch" name="branch" class="sem">
                                    <option value="">Select Branch</option>
                                    <option value="All Branch">All Branch</option>
                                    <option value="Computer Engineering">Computer Engineering</option>
                                    <option value="Civil Engineering">Civil Engineering</option>
                                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                                </select>
                            </div>
                        </div>

                        <div class="name_cont">
                            <div class="name">
                                <b><label for="joiningDate" class="label">Joining Date :</label></b>
                                <input class="sem" type="date" id="joiningDate" name="joiningDate" required>
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
                                <input class="sem" type="date" id="leavingDate" name="leavingDate">
                            </div>

                        </div>
                        <div class="name_r">
                            <div class="name">
                                <b><label for="password" class="label">Password :</label></b>
                                <input class="sem" type="text" id="password" name="password"
                                    placeholder="Assign Password">
                            </div>
                        </div>
                        <div class="form_button_cont">
                            <button type="submit" class="button" name="addTeacher">Add</button>
                            <button type="button" href="adm_teacher.php" class="button">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
    </div>
    <script>
        window.onload = (event) => {
            initMultiselect();
        };

        function initMultiselect() {
            checkboxStatusChange();

            document.addEventListener("click", function (evt) {
                var flyoutElement = document.getElementById('myMultiselect'),
                    targetElement = evt.target; // clicked element

                do {
                    if (targetElement == flyoutElement) {
                        // This is a click inside. Do nothing, just return.
                        //console.log('click inside');
                        return;
                    }

                    // Go up the DOM
                    targetElement = targetElement.parentNode;
                } while (targetElement);

                // This is a click outside.
                toggleCheckboxArea(true);
                //console.log('click outside');
            });
        }

        function checkboxStatusChange() {
            var multiselect = document.getElementById("mySelectLabel");
            var multiselectOption = multiselect.getElementsByTagName('option')[0];

            var values = [];
            var checkboxes = document.getElementById("mySelectOptions");
            var checkedCheckboxes = checkboxes.querySelectorAll('input[type=checkbox]:checked');

            for (const item of checkedCheckboxes) {
                var checkboxValue = item.getAttribute('value');
                values.push(checkboxValue);
            }

            var dropdownValue = "Nothing is selected";
            if (values.length > 0) {
                dropdownValue = values.join(', ');
            }

            multiselectOption.innerText = dropdownValue;
        }

        function toggleCheckboxArea(onlyHide = false) {
            var checkboxes = document.getElementById("mySelectOptions");
            var displayValue = checkboxes.style.display;

            if (displayValue != "block") {
                if (onlyHide == false) {
                    checkboxes.style.display = "block";
                }
            } else {
                checkboxes.style.display = "none";
            }
        }
    </script>

</body>

</html>
<?php

include "config.php";
if (isset($_POST['addTeacher'])) {
    extract($_POST);

    $add = mysqli_query($con, "INSERT INTO `teacherinfo`(`firstName`, `middleName`, `lastName`, `teacherId`, `designation`, `branch`, `joiningDate`, `currentStatus`, `leavingDate` ,`password`) VALUES ('$firstName','$middleName','$lastName','$teacherId','$designation','$branch','$joiningDate','$currentStatus','$leavingDate' ,'$password')") or die(mysqli_error($con));

    if ($add) {
        echo "<script>";
        echo "alert('Successfully Added...');";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('ERROR ! Fail..!')";
        echo "</script>";
    }
}

?>