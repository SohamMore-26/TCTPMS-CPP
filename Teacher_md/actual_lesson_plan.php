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

        <div class="tb_card tablecss" style="overflow:auto">
            <div class="planned">
                <div class="head">
                    <h1>Lecture No. 1 </h1>
                    <h1>Planned </h1>
                    <div class="elements">
                        <b><label for="topicN" class="label">Date :</label></b>
                        <input class="sem" type="date">
                    </div>

                </div>
                <div class="elements">
                    <b><label for="unit" class="label">Unit :</label></b>
                    <input class="sem" type="text" id="unit" name="unit" placeholder="Enter Unit" required>
                    <b><label for="topicN" class="label">Topic No. :</label></b>
                    <input class="sem" type="text" id="topicN" name="topicN" placeholder="Enter Topic No" required>
                </div>
                <div class="topicField">
                    <b><label for="unit" class="label">Topic to be Covered :</label></b>
                    <textarea rows="5" class="sem" id="topic" name="topic" required>
                        Enter Topic
                    </textarea>
                </div>
            </div>
            <hr>
            <div class="actual">
                <div class="planned">
                    <div class="headact">
                        <h1>Actual </h1>
                    </div>
                    <div class="elements">
                        <b><label for="unit" class="label">Unit Name :</label></b>
                        <input class="sem" type="text" id="unit" name="unit" placeholder="Enter Unit Name" required>

                        <b><label for="topicN" class="label">Topic No. :</label></b>
                        <input class="sem" type="text" id="topicN" name="topicN" placeholder="Enter Topic No" required>
                    </div>
                    <div class="topiccont">
                        <div class="topicField">
                            <b><label for="unit" class="label">Actual Topics Covered :</label></b>
                            <textarea rows="5" class="sem" id="topic" name="topic" required>
                            Enter Topic
                            </textarea>
                        </div>
                        <div class="topicField">
                            <div class="elements">
                                <b><label for="unit" class="label">Remarks :</label></b>
                                <input class="sem" type="text" id="unit" name="unit" placeholder="Enter Remarks">
                            </div>
                            <div class="elements">
                                <b><label for="topicN" class="label">Assignments :</label></b>
                                <input class="sem" type="text" id="topicN" name="topicN"
                                    placeholder="Enter Assignments (if any)">
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- <script>
        let dates = [new Date("2024-01-02"), new Date("2024-01-03"), new Date("2024-01-06")]
        let totalLecture = 48
        let newDates = datesGenerate(dates, totalLecture-3)

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

        function validate() {
            let perC = document.getElementById("per");
            perC.classList.add("visible");
            perC.classList.remove("hid");
        }

        var text = document.getElementById('Lesson');
        var table = '<table><thead><tr><th>Lecture Number</th><th>Plan Dates</th><th>Planned Topic Coverage</th><th>Actual Dates</th><th>Actual Topic Covered</th><th>Status</th><th>Percentage</th><th>Remarks</th></tr></thead><tbody>';

        for (var i = 0; i < newDates.length; i++) {
            let day = newDates[i].getDate();
            let month = newDates[i].getMonth() + 1;
            let year = newDates[i].getFullYear();

            let per = (i+1)/48*100

            table += '<tr><td>' + (i + 1) + '</td><td>' + day.toString() + '/' + month.toString() + '/' + year.toString() + '</td><td><textarea style="width: 250px; height: 140px;"></textarea></td><td><input type="date"></td><td><textarea style="width: 250px; height: 140px;""></textarea></td><td><input type="checkbox" onClick="validate()"></td><td>'+per.toFixed(2)+'</td><td><a href="">Remarks</a></td></tr>';
        }
        table += '</tbody></table>';

        text.innerHTML = table;
    </script> -->
</body>

</html>