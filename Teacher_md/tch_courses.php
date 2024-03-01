

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
                    <a href="tch_courses.php">
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
                    <a href="tch_lesson_plan.php">
                        <ul><span class="material-symbols-outlined">
                                group
                            </span> Lesson Plan</ul>
                    </a>
                </div>

                <div class="side_card">
                    <a href="tch_lab_plan.php">
                        <ul><span class="material-symbols-outlined">
                                pending_actions
                            </span> Laboratory Plan</ul>
                    </a>
                </div>
            </li>
        </div>
        <div class="main_c_cont" id="cont_M">
            <div class="m_card" onclick="openPopup()">
                <h3>
                    <div class="icon"><span class="material-symbols-outlined">
                            menu_book
                        </span></div> Emerging Trends
                </h3>
            </div>
        </div>

        <div class="C_contain_scroll_hid" id="cont_C">
            <div class="course_card">
                    <h2>Emerging Trends in Computer and Information Technology </h2>
                    <h4>Course Code: 22618 </h4>
                    <h4>Course Abb: ETI</h4>
                    <h4>Branch: Co</h4>
                    <h4>NO of lectures: 48</h4>
                    <div style="display: flex; justify-content:space-between; width:300px; ">
                        <a href="tch_courses.php"><button type="button" class="button" > Back </button></a>
                        <a href="tch_add_syl.php"><button type="button" class="button" style="width: auto;" > Add syllabus </button></a>
                    </div>         
            </div>
        </div>

    </div>

    <script>
        let cont_main = document.getElementById("cont_M")
        let cont_c = document.getElementById("cont_C")
        function openPopup() {
            cont_main.classList.add("main_c_cont_hid")
            cont_main.classList.remove("main_c_cont")
            cont_c.classList.remove("C_contain_scroll_hid")
            cont_c.classList.add("C_contain_scroll")
        }
    </script>
</body>

</html>