<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TCTPMS-CPP/css/stylest.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Teacher Home Module
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
                    <a href="tch_home.html">
                        <ul><span class="material-symbols-outlined">
                                home
                            </span> Home</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="tch_timetable.html">
                        <ul><span class="material-symbols-outlined">
                                today
                            </span>View Time Table</ul>
                    </a>
                </div>

                <div class="side_card">
                    <a href="tch_courses.html">
                        <ul><span class="material-symbols-outlined">
                                menu_book
                            </span> Courses</ul>
                    </a>
                </div>
                <!-- 
                <div class="side_card">
                    <a href="tch_AcademicCal.html">
                        <ul><span class="material-symbols-outlined">
                                calendar_clock
                            </span> Academic Calendar</ul>
                    </a>
                </div> -->

                <div class="side_card">
                    <a href="tch_lesson_plan.html">
                        <ul><span class="material-symbols-outlined">
                                group
                            </span> Lesson Plan</ul>
                    </a>
                </div>

                <!-- <hr>
                <a href="tch_approvals.html">
                    <ul><span class="material-symbols-outlined">
                            pending_actions
                        </span> Approvals</ul>
                </a> -->
            </li>
        </div>

        <div class="C_contain_scroll">
            <div class="course_card">
                <h2>Teacher Details</h2>
                <h4>Teacher ID:  </h4>
                <h4>Designation:  </h4>
                <h4>Branch: </h4>
                <h4>Status: </h4>                   
                <div style="display: flex; justify-content:space-around; width:600px; ">
                    <a href="adm_teacher.php"><button type="button" class="button" > Back </button></a>
                    <a href=""><button type="button" class="button" id="btnD"> Delete </button></a>
                    <a href="tch_add_syl.html"><button type="button" class="button" style="width: auto;" > Update Teacher </button></a>
                </div>
            </div>
        </div>

    </div>
    
</body>

</html>