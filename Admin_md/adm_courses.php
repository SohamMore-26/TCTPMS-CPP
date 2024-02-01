<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TCTPMS-CPP/css/stylest.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/970acd6ae4.js" crossorigin="anonymous"></script>
    <title>Admin Course Module
    </title>

</head>

<body>
    <div class="nav_head">
        <div class="title_div">
            <h1 id="h1">Teacher's Companion</h1>
        </div>
        <div class="lgt_div">
            <button type="button" id="button_lg" class="btt">Logout</button>
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
                    <a href="">
                        <ul><span class="material-symbols-outlined">
                                group
                            </span> Teacher</ul>
                    </a>
                </div>
            </li>
        </div>
    
    <?php
		include "config.php";
		$view = mysqli_query($con, "select * from courseinfo") or die(mysqli_error($con));
		?>

    <div class="bt_c_cont">
        <div class="contain_scroll">
            <div class="main_c_cont_cr" id="main_c_cont_cr">
                <?php while ($row = mysqli_fetch_array($view)) { extract($row); ?>
                <div class="m_card">
                    <h3>
                        <div class="icon"><i class="fa-solid fa-greater-than"></i>
                            <?php echo $row['semester']; ?> <sup>th</sup> Semester Courses
                        </div>
                    </h3>
                </div>
                <?php } ?>
            </div>


            <div class="add_course , add_course_hid" id="add_course">
                <div class="add_course_card_cont">
                    <div class="add_course_card">
                        <form action="" method="post" class="aca-form">
                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="semester" class="label">Semester:</label></b>
                                    <select id="semester" name="semester" class="sem">
                                        <option value="">Select Semester</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                                <div class="name">
                                    <b><label for="branch" class="label">Branch:</label></b>
                                    <select id="branch" name="branch" class="sem">
                                        <option value="">Select Branch</option>
                                        <option value="Computer Engineering">Computer Engineering</option>
                                        <option value="Civil Engineering">Civil Engineering</option>
                                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                                    </select>
                                </div>
                                <div class="name">
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

                            </div>
                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="courseTitle" class="label">Course Title :</label></b>
                                    <input class="sem" type="text" id="courseTitle" name="courseTitle"
                                        placeholder="Enter Course Title" required>
                                </div>
                                <div class="name">
                                    <b><label for="courseAbrevation" class="label">Course Abrevation :</label></b>
                                    <input class="sem" type="text" id="courseAbrevation" name="courseAbrevation"
                                        placeholder="Enter Course Abrevation" required>
                                </div>
                                <div class="name">
                                    <b><label for="courseCode" class="label">Course Code :</label></b>
                                    <input class="sem" type="text" id="courseCode" name="courseCode"
                                        placeholder="Enter Course Code" required>
                                </div>
                            </div>

                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="lecturePW" class="label">Lectures per week :</label></b>
                                    <input class="sem" type="text" id="lecturePW" name="lecturePW"
                                        placeholder="Enter Lectures Per Week" required>
                                </div>

                                <div class="name">
                                    <b><label for="practicalPW" class="label">Practicals per week :</label></b>
                                    <input class="sem" type="text" id="practicalPW" name="practicalPW"
                                        placeholder="Enter Practicals per week" required>
                                </div>

                                <div class="name">
                                    <b><label for="tutorialPW" class="label">Tutorials per week :</label></b>
                                    <input class="sem" type="text" id="tutorialPW" name="tutorialPW"
                                        placeholder="Enter Tutorials per week" required>
                                </div>
                            </div>
                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="teachingHours" class="label">Teaching Hours :</label></b>
                                    <input class="sem" type="text" id="teachingHours" name="teachingHours"
                                        placeholder="Enter Teaching Hours" required>
                                </div>
                            </div>
                            <div class="buttons">
                                <button type="submit" name="addCourse" class="" class="button">Add</button>
                                <button type="submit" class="" class="button1" onclick="showMain()">Back</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


            <div class="upd_course , upd_course_hid" id="upd_course">
                <div class="upd_course_card_cont">
                    <div class="upd_course_card">
                        <form action="" class="aca-form">
                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="courseCode" class="">Course Code :</label></b>
                                    <input class="" type="text" id="courseCode" name="courseCode"
                                        placeholder="Enter Course Code" required>
                                </div>
                            </div>
                        </form>
                        <div class="buttons">
                            <button type="submit" name="submit" class="" class="button">Search</button>
                        </div>
                    </div>
                    <div class="add_course_card">
                        <form action="" class="aca-form">
                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="semester" class="label">Semester:</label></b>
                                    <select id="semester" name="semester" class="sem">
                                        <option value="">Select Semester</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                                <div class="name">
                                    <b><label for="branch" class="label">Branch:</label></b>
                                    <select id="branch" name="branch" class="sem">
                                        <option value="">Select Branch</option>
                                        <option value="Computer Engineering">Computer Engineering</option>
                                        <option value="Civil Engineering">Civil Engineering</option>
                                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                                    </select>
                                </div>
                                <div class="name">
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

                            </div>
                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="courseTitle" class="label">Course Title :</label></b>
                                    <input class="sem" type="text" id="courseTitle" name="courseTitle"
                                        placeholder="Enter Course Title" required>
                                </div>
                                <div class="name">
                                    <b><label for="courseAbrevation" class="label">Course Abrevation :</label></b>
                                    <input class="sem" type="text" id="courseAbrevation" name="courseAbrevation"
                                        placeholder="Enter Course Abrevation" required>
                                </div>
                                <div class="name">
                                    <b><label for="courseCode" class="label">Course Code :</label></b>
                                    <input class="sem" type="text" id="courseCode" name="courseCode"
                                        placeholder="Enter Course Code" required>
                                </div>
                            </div>

                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="lecturePW" class="label">Lectures per week :</label></b>
                                    <input class="sem" type="text" id="lecturePW" name="lecturePW"
                                        placeholder="Enter Lectures Per Week" required>
                                </div>

                                <div class="name">
                                    <b><label for="practicalPW" class="label">Practicals per week :</label></b>
                                    <input class="sem" type="text" id="practicalPW" name="practicalPW"
                                        placeholder="Enter Practicals per week" required>
                                </div>

                                <div class="name">
                                    <b><label for="tutorialPW" class="label">Tutorials per week :</label></b>
                                    <input class="sem" type="text" id="tutorialPW" name="tutorialPW"
                                        placeholder="Enter Tutorials per week" required>
                                </div>
                            </div>

                            <div class="name_cont">
                                <div class="name">
                                    <b><label for="teachingHours" class="label">Teaching Hours :</label></b>
                                    <input class="sem" type="text" id="teachingHours" name="teachingHours"
                                        placeholder="Enter Teaching Hours" required>
                                </div>
                            </div>
                        </form>
                        <div class="buttons">
                            <button type="submit" name="submit" class="" class="button">Update</button>
                            <button type="submit" name="submit" class="" class="button">Delete</button>
                            <button type="submit" class="" class="button1" onclick="showMain()">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bt_cont">
            <div class="btn_card">
                <h3 onclick="showAdd()">
                    <div class="icon"><i class="fa-solid fa-book"></i></div> Add new Course
                </h3>
            </div>
        </div>
    </div>
    

    </div>
    </div>

    <script src="script.js"></script>
</body>

</html>
<?php

    include "config.php";
    if(isset($_POST['addCourse']))
	{
		extract($_POST);

		$add = mysqli_query($con,"INSERT INTO `courseinfo`(`semester`, `branch`, `scheme`, `courseTitle`, `courseAbrevation`, `courseCode`, `lecturePW`, `practicalPW`, `tutorialPW`, `teachingHours`) VALUES ('$semester','$branch','$scheme','$courseTitle','$courseAbrevation','$courseCode','$lecturePW','$practicalPW','$tutorialPW','$teachingHours')") or die(mysqli_error($con));

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
    }?>