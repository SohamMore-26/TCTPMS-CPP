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


                    <!-- <hr>
                <a href="tch_approvals.html">
                    <ul><span class="material-symbols-outlined">
                            pending_actions
                        </span> Approvals</ul>
                </a> -->
            </li>
        </div>

        <div class="tb_card tablecss" style="overflow:auto">
            <div class="planned" >
                <div class="elem" >
                    Lecture No. 1
                </div>

            </div>
            <div class="actual" >
                two
            </div>
            <div class="scroll_num">
                <div>
                    1
                </div>
                <div>
                    1
                </div>
                <div>
                    1
                </div>
                <div>
                    1
                </div>
                <div>
                    1
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

            table += '<tr><td>' + (i + 1) + '</td><td>' + day.toString() + '/' + month.toString() + '/' + year.toString() + '</td><td><textarea></textarea></td><td><input type="date"></td><td><textarea></textarea></td><td><input type="checkbox" onClick="validate()"></td><td>'+per.toFixed(2)+'</td><td><a href="">Remarks</a></td></tr>';
        }
        table += '</tbody></table>';

        text.innerHTML = table;
    </script> -->
</body>

</html>