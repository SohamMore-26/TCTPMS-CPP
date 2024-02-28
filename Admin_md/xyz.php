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

        <div class="main_c_cont">
            <div class="wel_card">
                <div class="timeTableHead">
                    <center>
                        <h1 id="h1">Create Lesson Plan</h1>
                    </center>
                    <b><label for="semester" class="label">Semester :</label></b>
                    <select id="semester" name="semester" class="sem">
                        <option value="">Select Semester</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
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

                    <b><label for="division" class="label">Division :</label></b>
                    <select id="division" name="division" class="sem">
                        <option value="">Select Division</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                    </select>

                    <b><label for="acaYear" class="label">Academic Year :</label></b>
                    <input class="sem" type="text" id="acaYear" name="acaYear" placeholder="Enter Academic Year"
                        required>
                    <b><label for="acaYear" class="label">Subject :</label></b>
                    <input class="sem" type="text" id="sub" name="sub" placeholder="Enter Subject " required>
                    <center>
                        <button name="addCal" class="button" onclick="getdata()">Add</button>

                    </center>
                </div>
            </div>
        </div>

        <script>

            function getdata() {
                var semester = document.getElementById('semester').value;
                var scheme = document.getElementById('scheme').value;
                var division = document.getElementById('division').value;
                var academicYear = document.getElementById('acaYear').value;
                var sub = document.getElementById('sub').value;

                // Do something with the data
                console.log("Semester:", semester);
                console.log("Scheme:", scheme);
                console.log("Division:", division);
                console.log("Academic Year:", academicYear);
                console.log("Subject :", sub);

            }

            function date() {

                let temp = new Date("1-2-2024")

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








            }

        </script>
</body>

</html>