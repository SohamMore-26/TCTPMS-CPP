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
            <button type="button" id="button_lg" class="button">Logout</button>
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
        <?php
		include "config.php";
		$view = mysqli_query($con, "select * from teacherinfo") or die(mysqli_error($con));
		?>
        <div class="main_c_cont">
            <!-- <div class="w_card">
                <h3>
                    <div class="icon"><span class="material-symbols-outlined" style="margin-right: 10px;">
                            error
                        </span></div> No Existing Teachers
                </h3>
            </div> -->
            <div class="m_card">
                <a href="adm_teacherform.html">
                    <h3>
                        <div class="icon"><span class="material-symbols-outlined">
                                add
                            </span></div> Add New Teacher
                    </h3>
                </a>
            </div>

            <h3> View Teacher : </h3>
         
            <table >
                    <tr>
                        <th>Name</th>
                        <th>Teacher Id</th>
                        <th>Designation</th>
                        <th>Branch</th>
                        <th>Action</th>
            
                    </tr>
                    <?php
                        while ($row = mysqli_fetch_array($view)) {
                          extract($row); ?>
                          <tr>
                            <td>
                              <?php echo $row['firstName']; ?> <?php echo $row['middleName']; ?> <?php echo $row['lastName']; ?> 
                            </td>
                            <td>
                              <?php echo $row['teacherId']; ?>
                            </td>
                            <td>
                              <?php echo $row['designation']; ?>
                            </td>
                            <td>
                              <?php echo $row['branch']; ?>
                            </td>
                            <td>
                              <a href="update_teacher.html"> Update </a> /  <a href="delete_teacher.html"> Delete </a>
                            </td>
                           
                          </tr>
                        <?php } ?>
                </table>
        </div>
    </div>
   
</body>

</html>