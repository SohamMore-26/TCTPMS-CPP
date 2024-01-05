<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
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
    </div>
    <h1 id="h1">Academic Calendar</h1>

    <form action="process.php" method="post" class="aca-form">
        <div class="container1">
            <b><label for="semester" class="label">Semester :</label></b>
            <select id="semester" name="sem" class="sem">
                <option value="">Select Semester</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>

            <b><label for="branch" class="label">Branch :</label></b>
            <select id="branch" name="branch" class="sem">
                <option value="">Select Branch</option>
                <option value="computer engineering">Computer Engineering</option>
                <option value="civil engineering">Civil Engineering</option>
                <option value="mechanical engineering">Mechanical Engineering</option>
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
        </div>

        <div class="label1">
            <b><label>Academic Year :</label></b>
        </div>
        <div class="container1">

            <b><label for="from" class="label">From :</label></b>
            <input class="sem" type="date" id="from" name="aystdatefrom" required>
            <b><label for="to" class="label">To :</label></b>
            <input class="sem" type="date" id="to" name="aystdateto" required>

        </div>

        <div class="label1">
            <b><label>Semester Duration :</label></b>
        </div>
        <div class="container1">
            <b><label for="stsemfrom" class="label">From :</label></b>
            <input class="sem" type="date" id="stsemfrom" name="stsemfrom" required>
            <b><label for="stsemto" class="label">To :</label></b>
            <input class="sem" type="date" id="stsemto" name="stfromto" required>

        </div>

        <div class="label1">
            <b><label>Class Test - 1 Schedule :</label></b>
        </div>
        <div class="container1">
            <b><label for="ct1from" class="label">From :</label></b>
            <input class="sem" type="date" id="ct1from" name="ct1from" required>
            <b><label for="ct1to" class="label">To :</label></b>
            <input class="sem" type="date" id="ct1to" name="ct1to" required>

        </div>

        <div class="label1">
            <b><label>Class Test - 2 Schedule :</label></b>
        </div>
        <div class="container1">
            <b><label for="ct2from" class="label">From :</label></b>
            <input class="sem" type="date" id="ct2from" name="ct2from" required>
            <b><label for="ct2to" class="label">To :</label></b>
            <input class="sem" type="date" id="ct2to" name="ct2to" required>

        </div>

        <div class="label1">
            <b><label>Practical Examination Schedule :</label></b>
        </div>
        <div class="container1">
            <b><label for="prefrom" class="label">From :</label></b>
            <input class="sem" type="date" id="prefrom" name="prefrom" required>
            <b><label for="preto" class="label">To :</label></b>
            <input class="sem" type="date" id="preto" name="preto" required>

        </div>

        <div class="label1">
            <b><label>Theory Examination Schedule :</label></b>
        </div>
        <div class="container1">
            <b><label for="thform" class="label">From :</label></b>
            <input class="sem" type="date" id="thfrom" name="thfrom" required>
            <b><label for="thto" class="label">To :</label></b>
            <input class="sem" type="date" id="thto" name="thto" required>

        </div>
        <div class="container1">
            <button type="submit" name="submit" class="btt" class="button">Add</button>
            <button type="submit" class="btt1" class="button1">Cancel</button>
        </div>
    </form>
</body>

</html>
