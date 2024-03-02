<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TCTPMS-CPP/css/stylest.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Academic Calendar
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
        $view = mysqli_query($con, "select * from academic_cal") or die(mysqli_error($con));
        ?>
        <div class="main_c_cont">
            <div class="m_card">
                <a href="adm_AcadCalForm.php">
                    <h3>
                        <div class="icon"><span class="material-symbols-outlined">
                                add
                            </span></div> Add Academic Calendar
                    </h3>
                </a>
            </div>

            <div class="tb_card tablecss">
                <h3> View Academic Calendar : </h3>
                <table>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Semester</th>
                        <th>Scheme</th>
                        <th>Academic Year</th>
                        <th>Semester Duration</th>
                        <th>Class Test 1 From-To</th>
                        <th>Class Test 2 From-To</th>
                        <th>Practical Exam From-To</th>
                        <th>Theory Exam From-To</th>
                        <th>Update</th>
                        <th>Delete</th>

                    </tr>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_array($view)) {
                        extract($row); ?>
                        <tr>
                            <td>
                                <?php echo $i++; ?>
                            </td>
                            <td>
                                <?php echo $row['semester']; ?>
                            </td>
                            <td>
                                <?php echo $row['scheme']; ?>
                            </td>
                            <td>
                                <?php echo $row['aca_year_from']; ?> -
                                <?php echo $row['aca_year_to']; ?>
                            </td>
                            <td>

                                <?php $newdate2 = date("d-m-Y", strtotime($sem_duration_from));
                                echo "$newdate2"; ?> to
                                <?php $newdate3 = date("d-m-Y", strtotime($sem_duration_to));
                                echo "$newdate3"; ?>
                            </td>
                            <td>

                                <?php
                                $newdate = date("d-m-Y", strtotime($class_test1_from));
                                echo "$newdate"; ?> to
                                <?php
                                $newdate1 = date("d-m-Y", strtotime($class_test1_to));
                                echo "$newdate1"; ?>
                            </td>
                            <td>

                                <?php $newdate4 = date("d-m-Y", strtotime($class_test2_from));
                                echo "$newdate4"; ?> to
                                <?php $newdate5 = date("d-m-Y", strtotime($class_test2_to));
                                echo "$newdate5"; ?>
                            </td>
                            <td>
                                <?php $newdate6 = date("d-m-Y", strtotime($practical_exam_from));
                                echo "$newdate6"; ?> to
                                <?php $newdate7 = date("d-m-Y", strtotime($practical_exam_to));
                                echo "$newdate7"; ?>
                            </td>
                            <td>

                                <?php $newdate8 = date("d-m-Y", strtotime($theory_exam_from));
                                echo "$newdate8"; ?> to
                                <?php $newdate9 = date("d-m-Y", strtotime($theory_exam_to));
                                echo "$newdate9"; ?>
                            </td>
                            <td>
                                <a href="update_teacher.php"> <span class="material-symbols-outlined">
                                        edit
                                    </span> </a>
                            </td>
                            <td>
                                <a href="delete_cal.php?id=<?php echo $id; ?>">
                                    <span class="material-symbols-outlined">
                                        delete
                                    </span></a>
                            </td>

                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
</body>

</html>