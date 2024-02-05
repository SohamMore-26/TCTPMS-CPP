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
            
                 <div class="m_card" onclick="openPopup()">
                <h3>
                    <div class="icon"><span class="material-symbols-outlined">
                            person
                        </span></div>
                </h3>
            </div></a>

            <div class="popup" id="popup">
            <?php 
		include "config.php";
        ?>

            <h2></h2>
            <h4>Teacher ID:  </h4>
            <h4>Designation:  </h4>
            <h4>Branch: </h4>
            <h4>Status: </h4>
            <button type="button" onclick="closePopup()"> Close </button>

            </div>
        </div>
    </div>
    <script>
        let popup = document.getElementById("popup");
        function openPopup() { 
            popup.classList.add("open_popup");
        }
        function closePopup() {
            popup.classList.remove("open_popup");
        }
    </script>
</body>

</html>