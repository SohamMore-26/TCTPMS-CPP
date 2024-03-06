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
            <a href="\TCTPMS-CPP\logout.php"> <button type="button" id="button_lg" class="button">Logout</button></a>
        </div>
    </div>
    <div class="main_cont">
        <div class="sidebar">
            <li>
                <div class="side_card">
                    <a href="tch_home.php">
                        <ul><span class="material-symbols-outlined">
                                home
                            </span> Home</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="tch_timetable.php">
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
                    <a href="tch_AcademicCal.php">
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

        <table>
            <tr>
                <th>Lec. No.</th>
                <th>Planed Dates</th>
                <th>Course Outcome</th>
                <th>Unit Outcome</th>
                <th>Unit Name</th>
                <th>Planned Topic</th>
                <th>Planned Sub Topic</th>
                <th>Status</th>
                <th>Save</th>
            </tr>
            <?php
            include "config.php";
            if (isset($_GET['course'])) {
                $view = mysqli_query($con, "select * from syllabus where course ='" . $_GET['course'] . "' ") or die(mysqli_error($con));
            }
            ?>
            <?php
            while ($row = mysqli_fetch_array($view)) {
                extract($row);
                $lec = $row['lecno'] ?>

                <tr>
                    <td><input type=text class="sem" value="<?php echo $row['lecno'] ?>"></td>
                    <td><input id="<?php echo $row['lecno']; ?>" type=text class="sem" value=""></td>
                    <td><textarea class="sem"><?php echo $row['course_outcome'] ?></textarea></td>
                    <td><textarea class="sem"><?php echo $row['unit_outcome'] ?></textarea></td>
                    <td><textarea class="sem"><?php echo $row['unit_name'] ?></textarea></td>
                    <td><textarea class="sem"><?php echo $row['topic'] ?></textarea></textarea></td>
                    <td><textarea class="sem"><?php echo $row['sub_topic'] ?></textarea></textarea></td>
                    <td><input type=checkbox></td>
                    <td><button type="submit" name="" class="button">Save</button> </td>
                </tr>
            <?php } ?>
        </table>

        <script>
            // --------------------------------------------------------------------------------------------------------------------------------------
            let temp = new Date()

            let credits = 3

            let dt = ["mad", "nis", "pr", "pr", "pr", "pr", "pr", "pr", "pwp", "eti", "mgt", "nolec", "nis", "eti", "mgt", "mgt", "pr", "pr", "pr", "pr", "ede", "ede", "pr", "pr", "mad", "pwp", "pr", "pr", "pr", "pr", "pr", "pr", "eti", "mad", "pwp", "nis"]

            let lc

            let k = 0

            a: for (let i = 0; i < 7; i++) {

                dayWeek = temp.getDay()

                switch (dayWeek) {
                    case 1: lc = 1
                        break
                    case 2: lc = 7
                        break
                    case 3: lc = 13
                        break
                    case 4: lc = 19
                        break
                    case 5: lc = 25
                        break
                    case 6: lc = 31
                        break
                    case 0: let a = temp.getDate() + 1
                        temp.setDate(a)
                        continue a

                }


                for (let j = 0; j < 6; j++) {
                    if (dt[lc - 1] == "nis") {
                        console.log(temp.toDateString());
                    }
                    lc++
                }

                let a = temp.getDate() + 1
                temp.setDate(a)
            }

            // ------------------------------------------------------------------------------------------------------------------------------------------------
            let dates = [new Date("2024-01-02"), new Date("2024-01-03"), new Date("2024-01-06")]
            let totalLecture = 48
            let newDates = datesGenerate(dates, totalLecture - 3)

            // console.log(newDates)

            let tempDate, tdate


            function datesGenerate(date, noOfLec) {
                let tempDate, tdate

                for (let i = 0; i < noOfLec; i++) {
                    tdate = new Date(date[i])

                    // console.log(tdate.toDateString())
                    tempDate = tdate.getDate() + 7

                    tdate.setDate(tempDate)

                    date.push(tdate)

                }
                return date

            }
            function getIndianDateFormat(date) {
                const options = {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                };
                return date.toLocaleDateString('en-IN', options);
            }


            function validate() {
                let perC = document.getElementById("per");
                perC.classList.add("visible");
                perC.classList.remove("hid");
            }

            var text = document.getElementById('Lesson');
            var table = '<table><thead><tr><th>Lec. No.</th><th>Planed Dates</th><th>Course Outcome</th><th>Unit Outcome</th><th>Unit Name</th><th>Planned Topic</th><th>Planned Sub Topic</th><th>Status</th><th>Save</th></tr></thead><tbody>';


            for (var i = 1; i <= i++ ) {
                let indianDate = getIndianDateFormat(new Date(newDates[i]));


                document.getElementById(i).value = indianDate;

            }





        </script>
</body>

</html>