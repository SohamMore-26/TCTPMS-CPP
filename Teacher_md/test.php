<?php
include "config.php";

$view1 = mysqli_query($con, "SELECT * FROM lesson_plan WHERE course = 'MAD' AND aca_year = '2023 - 2024' AND sem = '6' AND div1 = 'A' ") or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }

        caption {
            font-size: larger;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <center>
        <h1>S.S.V.P.S's B. S. Deore Polytechnic, Dhule</h1>
        <h3>(Academic Year: 2023 - 2024)</h3>
        <h2>Lesson Plan</h2>

        <table>
            <thead>
            <tbody>
                <tr>
                    <th>
                        Name of Faculty: N. D. Patel
                    </th>
                    <th>
                        Program: Computer Engineering
                    </th>
                </tr>
                <tr>
                    <th>
                        Designation: Lecturer
                    </th>
                    <th>
                        Program Code:
                    </th>
                </tr>
                <tr>
                    <th>
                        Semester: 6
                    </th>
                </tr>
            </tbody>
            </thead>
        </table>

    </center>
    <h2 style="margin-left: 300px;">Course Details</h2>
    <center>
        <table>
            <!-- <caption>Course Schedule and Student Progress Record</caption> -->
            <tr>
                <th rowspan="2">Course Title</th>
                <th rowspan="2">Course Code</th>
                <th colspan="3">Teaching Scheme</th>
                <th rowspan="2">Credits (L+P+T)</th>
            </tr>
            <tr>
                <td>L</td>
                <td>P</td>
                <td>T</td>
            </tr>
            <tr>
                <td rowspan="2">Emering Trends</td>
                <td rowspan="2">225806</td>
                <td colspan="1">3</td>
                <td colspan="1">0</td>
                <td colspan="1">0</td>
                <td rowspan="2">3</td>
            </tr>
        </table>
        <br><br>
        <?php
        // Initialize a counter for the entries
        $entryCounter = 0;

        // Start the first table
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Lecture no. & <br> Date</th>';
        echo '<th>Topic to be covered and Assignment / Home Work Given</th>';
        echo '<th>Remarks</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Loop through the fetched data
        while ($row = mysqli_fetch_assoc($view1)) {
            // Increment the counter
            $entryCounter++;

            // Display the data in the table row
            echo '<tr>';
            echo '<td>' . $row['lecno'] . "<br>" . $row['planned_date'] . '</td>'; // Assuming 'lecture_no' is the column name for lecture number
            echo '<td>' . $row['topic'] . '</td>'; // Assuming 'topic' is the column name for the topic
            echo '<td rowspan="2">' . "" . '</td>'; // Assuming 'topic' is the column name for the topic
            echo '</tr>';
            echo '<tr>';
            echo '<td>' . "Assignment / Homework" . '</td>'; // Assuming 'lecture_no' is the column name for lecture number
            echo '<td>' . $row['assignment'] . '</td>'; // Assuming 'lecture_no' is the column name for lecture number
            echo '</tr>';
            // If the counter is a multiple of 3, close the current table and start a new one
            if ($entryCounter % 3 == 0) {
                echo '</tbody>';
                echo '</table>';

                // Start a new table
                echo '<table>';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Lecture no. & Date</th>';
                echo '<th>Topic to be covered and Assignment / Home Work Given</th>';
                echo '<th>Remarks</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
            }
        }

        // Close the last table if there are any remaining entries
        if ($entryCounter % 3 != 0) {
            echo '</tbody>';
            echo '</table>';
        }
        ?>
        <table>
            <thead>
                <tr>
                    <th colspan="2">
                        Week wise lesson plan
                    </th>
                    <th colspan="2">Week no.: </th>
                </tr>
                <tr>
                    <th>Sem.: </th>
                    <th>Course Title: </th>
                    <th>Course Code: </th>
                    <th>Name of Faculty: </th>
                </tr>
            </thead>
        </table>
        <table>
            <thead>
                <tr>
                    <th>Lecture no. & Date</th>
                    <th>Topic to be covered and
                        Assignment / Home Work Given</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td></td>
                    <td rowspan="2"></td>
                </tr>
                <tr>
                    <td>Assignment / Homework</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </center>
</body>

</html>