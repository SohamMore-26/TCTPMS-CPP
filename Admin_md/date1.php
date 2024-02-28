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
                    <form method="post">
                        <b><label for="semester" class="label">Semester :</label></b>
                        <select id="semester" name="semester" class="sem">
                            <option value="">Select Semester</option>
                            <option value="Even">Even</option>
                            <option value="Odd">Odd</option>

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
                            <button name="add" class="button">Add</button>

                        </center>
                    </form>
                </div>
            </div>
        </div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $semester = $_POST['semester'];
            $scheme = $_POST['scheme'];
            $division = $_POST['division'];
            $acaYear = $_POST['acaYear'];
            $subject = $_POST['sub'];


            // echo "Semester: " . $semester . "<br>";
            // echo "Scheme: " . $scheme . "<br>";
            // echo "Division: " . $division . "<br>";
            // echo "Academic Year: " . $acaYear . "<br>";
            // echo "Subject: " . $subject . "<br>";
        

        include "config.php";
        $view = mysqli_query($con, "SELECT * FROM academic_cal WHERE semester = '$semester' AND scheme = '$scheme' AND aca_year_to = '$acaYear'") or die(mysqli_error($con));


        $row = mysqli_fetch_array($view);
        extract($row);
        $semstart = $row['sem_duration_from'];
        $semend = $row['sem_duration_to'];

        // echo "Sem Start: " . $semstart . "<br>";
        // echo "Sem End: " . $semend . "<br>";
    }
        ?>

        