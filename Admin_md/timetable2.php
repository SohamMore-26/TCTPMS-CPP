<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TCTPMS-CPP/css/stylest.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Admin Module</title>
    <style>
        /* Make labels bold */
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            margin-left: 10px;  /* Add left margin to labels */
        }

        /* Styling for input fields */
        .course-abbreviation input, .batch-fields input {
            margin-top: 5px;
            margin-left: 10px;  /* Add left margin to input fields */
            margin-right: 10px;  /* Add right margin to input fields */
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        /* Save button styling */
        .save-button {
            background-color: #f44336; /* Same as the logout button */
            color: white;
            border: none;
            padding: 5px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .save-button:hover {
            background-color: #e53935; /* Darker red for hover effect */
        }

        .course-abbreviation, .batch-fields {
            margin-top: 10px;
        }

        /* Table should use more width of its container */
        .tablecss {
            width: 95%; /* Increase the width to take more space */
            /* margin: 20px auto; */
            border-collapse: collapse;
        }

        .tablecss th, .tablecss td {
            padding: 10px;
            text-align: left;
        }

        /* Dropdown styling */
        .dropdown-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            flex-wrap: wrap;  /* Allow items to wrap to the next line */
        }

        .dropdown-container div {
            margin-bottom: 10px;  /* Add bottom margin to each dropdown */
            width: 200px;  /* Set a fixed width for each dropdown */
        }

        .dropdown-container select {
            padding: 8px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 100%;  /* Make the dropdown take up the full width of the div */
        }

        .dropdown-container label {
            font-size: 16px;
            margin-right: 10px;
        }

        /* Make radio buttons appear side by side */
        .side_card label {
            display: inline-block; /* Make radio buttons appear horizontally */
            margin-right: 15px;     /* Add some space between the radio buttons */
        }

        /* Adjust the radio buttons for better alignment */
        .side_card input[type="radio"] {
            margin-right: 5px; /* Space between the radio button and label */
        }

        /* Add margin between Batch fields */
        .batch-fields label {
            margin-right: 10px; /* Add margin to the right of each label */
        }

        .batch-fields input {
            margin-right: 15px; /* Add margin between the input fields */
            margin-top: 5px; /* Slight top margin for consistency */
        }
    </style>
    <script>
        // Function to display the corresponding input fields based on the slot type
        function updateSlotDetails(selectElement, slotRow) {
            const slotType = selectElement.value;
            const courseAbbreviationField = slotRow.querySelector('.course-abbreviation');
            const batchFields = slotRow.querySelector('.batch-fields');
            
            // Hide both Course Abbreviation and Batch fields initially
            courseAbbreviationField.style.display = 'none';
            batchFields.style.display = 'none';

            // Show Course Abbreviation for Theory and Tutorial
            if (slotType === 'Theory' || slotType === 'Tutorial') {
                courseAbbreviationField.style.display = 'block';
            }
            
            // Show Batch fields only for Practical
            if (slotType === 'Practical') {
                batchFields.style.display = 'block';
            }
        }
    </script>
</head>

<body>

    <div class="nav_head">
        <div class="title_div">
            <h1 id="h1">Teacher's Companion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Welcome Admin</h1>
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
                        <ul><span class="material-symbols-outlined">home</span> Home</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="adm_AcademicCal.php">
                        <ul><span class="material-symbols-outlined">calendar_clock</span> Academic Calendar</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="adm_courses.php">
                        <ul><span class="material-symbols-outlined">menu_book</span> Courses</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="adm_timetable.php">
                        <ul><span class="material-symbols-outlined">today</span> Time Table</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="adm_teacher.php">
                        <ul><span class="material-symbols-outlined">group</span> Teacher</ul>
                    </a>
                </div>
            </li>
        </div>

        <div class="C_contain_scroll">
            <h2 style="text-align: center; margin-top: 20px;">Add Timetable</h2> <!-- Title -->

            <!-- Dropdowns for Academic Year, Semester, Branch, and Division -->
            <div class="dropdown-container">
                <div>
                    <label for="academic-year">Academic Year:</label>
                    <select id="academic-year" name="academic_year">
                        <option value="2025-2026">2025-2026</option>
                        <option value="2024-2025">2024-2025</option>
                        <option value="2023-2024">2023-2024</option>
                    </select>
                </div>
                <div>
                    <label for="semester">Semester:</label>
                    <select id="semester" name="semester">
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                    </select>
                </div>
                <div>
                    <label for="branch">Branch:</label>
                    <select id="branch" name="branch">
                        <option value="cs">Computer Science</option>
                        <option value="it">Information Technology</option>
                        <option value="ec">Electronics</option>
                    </select>
                </div>
                <div>
                    <label for="division">Division:</label>
                    <select id="division" name="division">
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                    </select>
                </div>

                <div>
                    <label for="scheme">Scheme:</label>
                    <select id="scheme" name="scheme">
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                    </select>
                </div>
            </div>

            <!-- Timetable Table -->
            <div style="display: flex; align-items:center; flex-direction: column; margin-left: 180px;">
                <table class="tablecss tb_card">
                    <form method="post" action="adm_timetable.php">
                        <tr>
                            <th>Slot No.</th>
                            <th>Slot Details</th>
                        </tr>
                        
                        <?php
                        // Loop to generate Slot Numbers from 1 to 64
                        for ($i = 1; $i <= 64; $i++) {
                            echo "<tr id='slot-row-$i'>
                                    <td>$i</td>
                                    <td>
                                        <!-- Slot Type Radio Buttons -->
                                        <label><input type='radio' name='slot_type_$i' value='Theory' onchange='updateSlotDetails(this, document.getElementById(\"slot-row-$i\"))'> Theory</label>
                                        <label><input type='radio' name='slot_type_$i' value='Practical' onchange='updateSlotDetails(this, document.getElementById(\"slot-row-$i\"))'> Practical</label>
                                        <label><input type='radio' name='slot_type_$i' value='Tutorial' onchange='updateSlotDetails(this, document.getElementById(\"slot-row-$i\"))'> Tutorial</label>

                                        <div class='course-abbreviation' style='display: none;'>
                                            <label for='course_abbreviation_$i'>Course Abbreviation:</label>
                                            <input type='text' name='course_abbreviation_$i' id='course_abbreviation_$i'>
                                        </div>

                                        <div class='batch-fields' style='display: none;'>
                                            <label for='batch1_$i'>Batch 1:</label>
                                            <input type='text' name='batch1_$i' id='batch1_$i'>
                                            <label for='batch2_$i'>Batch 2:</label>
                                            <input type='text' name='batch2_$i' id='batch2_$i'>
                                            <label for='batch3_$i'>Batch 3:</label>
                                            <input type='text' name='batch3_$i' id='batch3_$i'>
                                        </div>
                                    </td>
                                  </tr>";
                        }
                        ?>
                </table>
                
                <!-- Buttons for Adding and Cancelling -->
                <div class="buttons">
                    <button type="submit" name="savetimetable" class="button">Add</button>
                    <a href="adm_timetable.php"> <button type="button" class="button">Cancel</button></a>
                </div>
                
                </form>
            </div>
        </div>
    </div>

    <script>
        // Save button functionality (for now it just logs the slot number to console)
        function saveSlot(slotNumber) {
            console.log("Slot " + slotNumber + " saved.");
        }
    </script>
</body>

</html>

<?php
include "config.php";

// Handling the form submission and saving data
if (isset($_POST['savetimetable'])) {
    // Collect common form data
    $academic_year = $_POST['academic_year'];
    $semester = $_POST['semester'];
    $branch = $_POST['branch'];
    $division = $_POST['division'];
    $scheme = $_POST['scheme'];

    // Validate required fields
    if (empty($academic_year) || empty($semester) || empty($branch) || empty($division) || empty($scheme)) {
        echo "<script>";
        echo "alert('Please fill out all required fields.');";
        echo "</script>";
    } else {
        // Process each slot
        for ($i = 1; $i <= 64; $i++) {
            if (isset($_POST['slot_type_' . $i])) {
                $slot_type = $_POST['slot_type_' . $i];
                $course_abbreviation = isset($_POST['course_abbreviation_' . $i]) ? $_POST['course_abbreviation_' . $i] : null;
                $batch1 = isset($_POST['batch1_' . $i]) ? $_POST['batch1_' . $i] : null;
                $batch2 = isset($_POST['batch2_' . $i]) ? $_POST['batch2_' . $i] : null;
                $batch3 = isset($_POST['batch3_' . $i]) ? $_POST['batch3_' . $i] : null;

                // Prepare and execute the SQL query
                $stmt = $con->prepare("INSERT INTO timetable (aca_year, semester, branch, division, scheme, slot, th_pr, course, batch1, batch2, batch3) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                if ($stmt === false) {
                    die('MySQL prepare failed: ' . $con->error);
                }

                $stmt->bind_param('sssssiissss', $academic_year, $semester, $branch, $division, $scheme, $i, $slot_type, $course_abbreviation, $batch1, $batch2, $batch3);
                
                // Execute the statement and check for success
                if ($stmt->execute()) {
                    // Success
                    echo "<script>";
                    echo "alert('Timetable saved successfully');";
                    echo "</script>";
                } else {
                    // If query failed, log the error
                    echo "<script>";
                    echo "alert('Error saving timetable: " . $stmt->error . "');";
                    echo "</script>";
                }

                $stmt->close();
            }
        }

        // Redirect to the same page after submission
        echo "<script>";
        echo "window.location.href = 'adm_timetable.php';";  // Redirect to timetable page
        echo "</script>";
    }
}
?>

