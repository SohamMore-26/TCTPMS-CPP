<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TCTPMS-CPP/css/stylest.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Time Table Form
    </title>
</head>

<body>

    <div class="nav_head">
        <div class="title_div">
            <h1>Teacher's Companion</h1>
        </div>
        <div class="lgt_div">
            <a href="\TCTPMS-CPP\logout.php"> <button type="button" id="button_lg" class="button">Logout</button></a>
        </div>
    </div>
    <div class="main_cont">
        <div class="sidebar">
            <li>
                <div class="side_card">
                    <a href="adm_home.php">
                        <ul><span class="material-symbols-outlined">
                                home
                            </span> Home</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="adm_AcademicCal.php">
                        <ul><span class="material-symbols-outlined">
                                calendar_clock
                            </span> Academic Calendar</ul>
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
                    <a href="adm_timetable.php">
                        <ul><span class="material-symbols-outlined">
                                today
                            </span> Time Table</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="adm_teacher.php">
                        <ul><span class="material-symbols-outlined">
                                group
                            </span> Teacher</ul>
                    </a>
                </div>
            </li>
        </div>
        <div class="main_c_cont">
            <div class="form_card">
                <form method="post" style="width: 600px;">
                    <center>
                        <h1 id="h1">Add Time Table</h1>
                    </center>
                    <div class="">
                        <?php
                        include "config.php";
                        $view = mysqli_query($con, "select * from academic_cal") or die(mysqli_error($con));
                        ?>
                        <div class="formdiv">
                            <div class="input">
                                <b><label for="acaYear" class="label">Academic Year :</label></b>
                                <select id="acaYear" name="acaYear" class="sem">
                                    <option value="">Select Academic Year</option>
                                    <?php

                                    while ($row = mysqli_fetch_array($view)) {
                                        extract($row); ?>
                                        <option value="<?php echo $row['aca_year']; ?>">
                                            <?php echo $row['aca_year']; ?>
                                        <?php } ?>
                                </select>
                            </div>
                            <div class="input">
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
                            </div>
                            <div class="input">
                                <b><label for="scheme" class="label">Scheme :</label></b>
                                <select id="scheme" name="scheme" class="sem">
                                    <option value="">Select Scheme</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                    <option value="I">I</option>
                                    <option value="K">K</option>
                                </select>
                            </div>
                            <div class="input">
                                <b><label for="branch" class="label">Branch :</label></b>
                                <select id="branch" name="branch" class="sem">
                                    <option value="">Select Branch</option>
                                    <option value="CO">CO</option>
                                    <option value="ME">ME</option>
                                    <option value="CE">CE</option>  
                                </select>
                            </div>


                        </div>

                        <div class="formdiv">
                            <div class="input">
                                <b><label for="division" class="label">Division :</label></b>
                                <select id="division" name="division" class="sem">
                                    <option value="">Select Division</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                </select>
                            </div>
                            <div class="input">
                                <b><label for="slot" class="label">Slot :</label></b>
                                <select id="slot" name="slot" class="sem" onchange="setDay(this)">
                                    <option value="">Select Slot</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                </select>
                            </div>
                            <div class="input">
                                <b><label for="time_day" class="label">Day :</label></b>
                                <input class="sem" type="text" id="time_day" name="time_day"
                                    placeholder="For.eg: Monday" required>
                            </div>
                        </div>
                    </div>
                    <div class="formdiv">
                        <div class="input">
                            <b><label for="type" class="label">Type :</label></b>
                            <div style=" display:flex ">
                                <input type="radio" id="Th" name="ThPr" onclick="openDialog(this)" value="Theory">Th

                                <input type="radio" id="Pr" name="ThPr" onclick="openDialog(this)" value="Practical">Pr

                                <input type="radio" id="Tu" name="ThPr" onclick="openDialog(this)" value="Tutorial">Tu
                            </div>
                        </div>
                        <div class="thr thr_hid" id="thr">

                            <div class="input">
                                <b><label for="sub" class="label">Course Abrevation :</label></b>
                                <input class="sem" type="text" id="sub" name="time_course" placeholder="For.eg: STE">
                            </div>
                        </div>
                        <div class="pra pra_hid" id="pra">
                            <div class="input">
                                <b><label for="sub" class="label">batch1 :</label></b>
                                <input class="sem" type="text" id="batch1" name="batch1" placeholder="For.eg: STE">
                            </div>
                            <div class="input">
                                <b><label for="sub" class="label">batch2 :</label></b>
                                <input class="sem" type="text" id="batch2" name="batch2" placeholder="For.eg: STE">
                            </div>
                            <div class="input">
                                <b><label for="sub" class="label">batch3 :</label></b>
                                <input class="sem" type="text" id="batch3" name="batch3" placeholder="For.eg: STE">
                            </div>
                        </div>
                    </div>
                    <div style="display:flex;justify-content:center">
                        <button type="submit" class="button" name="addTimeTable">Add</button>
                    </div>

                </form>

            </div>

        </div>
    </div>

    <script>

        let thr = document.getElementById("thr")
        let pra = document.getElementById("pra")

        let day = document.getElementById('time_day').value;
        let slot = document.getElementById('slot').value;
        let subject = document.getElementById('subject').value;

        function openDialog(item) {
            let itemid = item.id
            if (itemid == "Th") {
                thr.classList.remove("thr_hid")
                pra.classList.add("pra_hid")
            }
            else if (itemid == "Pr") {
                thr.classList.add("thr_hid")
                pra.classList.remove("pra_hid")
            }
            else if (itemid == "Tu") {
                thr.classList.remove("thr_hid")
                pra.classList.add("pra_hid")
            }
        }

        function setDay(element) {

            let elementValue = element.value;
            let elementDay = checkSlot(elementValue);

            document.getElementById("time_day").value = elementDay;
        }

        function checkSlot(elementValue) {
            var elementDay;
            if (elementValue >= 1 && elementValue <= 6) {
                elementDay = "Monday";
            }
            else if (elementValue >= 7 && elementValue <= 12) {
                elementDay = "Tuesday";
            }
            else if (elementValue >= 13 && elementValue <= 18) {
                elementDay = "Wednesday";
            }
            else if (elementValue >= 19 && elementValue <= 24) {
                elementDay = "Thusday";
            }
            else if (elementValue >= 25 && elementValue <= 30) {
                elementDay = "Friday";
            }
            else if (elementValue >= 31 && elementValue <= 36) {
                elementDay = "Saturaday";
            }
            else {
            }
            return elementDay;
            console.log(elementDay);
        }

        function add_tt() {

            const newRow = document.createElement('tr');
            newRow.innerHTML = `<td>${day}</td><td>${slot}</td><td>${subject}</td>`;

            // Append the row to the timetable display area
            const timetableDisplay = document.getElementById('timetableDisplay');
            timetableDisplay.appendChild(newRow);

            // Clear the form for the next entry
            document.getElementById('timetableForm').reset();
        }
    </script>
</body>

</html>

<?php
include "config.php";

if (isset($_POST['addTimeTable'])) {
    // Extract form data
    extract($_POST);

    // Check if required variables are set
    // if(isset($semester, $branch, $division,$slot, $acaYear, $time_day, $time_ThPr, $time_course, $batch1, $batch2, $batch3)) {

    // Insert data into the database
    $add = mysqli_query($con, "INSERT INTO `timetable`(`semester`,`scheme`,`division`,`aca_year`,`slot`,`day`,`th_pr`,`course`,`batch1`,`batch2`,`batch3`) VALUES ('$semester','$scheme','$division','$acaYear','$slot', '$time_day', '$ThPr', '$time_course', '$batch1', '$batch2', '$batch3')") or die(mysqli_error($con));

    if ($add) {
        echo "<script>";
        echo "alert('Successfully Added...');";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('ERROR ! Fail..!')";
        echo "</script>";
    }
}
?>