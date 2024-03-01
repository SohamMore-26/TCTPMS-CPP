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

       

    <div class="tablecss" style="overflow:auto">
        <div id="Lesson"></div>
    </div>

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

        function validate() {
            let perC = document.getElementById("per");
            perC.classList.add("visible");
            perC.classList.remove("hid");
        }

        var text = document.getElementById('Lesson');
        var table = '<table><thead><tr><th>Lec. No.</th><th>Planed Dates</th><th>Planned Topic Coverage</th><th>Issued By</th><th>Approved By</th><th>Status</th><th>Remarks</th></tr></thead><tbody>';

        for (var i = 0; i < newDates.length; i++) {

            
            let day = newDates[i].getDate();
            let month = newDates[i].getMonth() + 1;
            let year = newDates[i].getFullYear();

            let per = (i + 1) / 48 * 100

            table += '<tr><td>' + (i + 1) + '</td><td>' + day.toString() + '/' + month.toString() + '/' + year.toString() + '</td><td><textarea style="width: 453px; height: 129px;"></textarea></td><td><input type=text</td><td><input type=text></td><td><input type=checkbox></td><td><a href="">Remarks</a></td></tr>';
        }
        table += '</tbody></table>';

        text.innerHTML = table;
    </script>
</body>

</html>