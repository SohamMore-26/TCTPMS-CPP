<?php
require_once 'vendor/autoload.php'; // Include the Dompdf autoload file

use Dompdf\Dompdf; // Import the Dompdf class

include "config.php"; // Include your database configuration file
session_start();

$acaYear = $_GET['aca_year'];
$sem = $_GET['semester'];
$sch = $_GET['scheme'];
$sub = $_GET['sub'];
$div = $_GET['div'];
$tch_id = $_GET['tch_id'];
$type = $_GET['type'];

$view1 = mysqli_query($con, "SELECT * FROM lesson_plan WHERE course = '$sub' AND aca_year = '$acaYear' AND sem = '$sem' AND div1 = '$div' AND sch='$sch' AND preparedby = '$tch_id'") or die(mysqli_error($con));
$view0 = mysqli_query($con, "SELECT * FROM lesson_plan WHERE course = '$sub' AND aca_year = '$acaYear' AND sem = '$sem' AND div1 = '$div' AND sch='$sch' AND preparedby = '$tch_id'") or die(mysqli_error($con));
$view2 = mysqli_query($con, "SELECT * FROM courseinfo WHERE courseAbrevation = '$sub'") or die(mysqli_error($con));
$row2 = mysqli_fetch_assoc($view2);
$row1 = mysqli_fetch_assoc($view0);
$creds = $row2["practicalPW"]+$row2["lecturePW"]+$row2["tutorialPW"];
// HTML content to be displayed inside the PDF
$html = '
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .d table {
            width: 100%;
            border-collapse: collapse;
        }

        .d table,
        .d th,
        .d td {
            border: 1px solid black;
        }

        .d th,
        .d td {
            padding: 5px;
            text-align: left;
        }

        .d caption {
            font-size: larger;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="d" >
        <center>
        <h1>S.S.V.P.S\'s B. S. Deore Polytechnic, Dhule</h1>
        <h3>(Academic Year: 2023 - 2024)</h3>
        <h2>Lesson Plan</h2>

        <table>
            <thead>
            <tbody>
                <tr>
                    <th>
                        Name of Faculty: ' . $_SESSION['firstName'] . ' ' . $_SESSION['middleName'] . ' ' . $_SESSION['lastName'] . '
                    </th>
                    <th>
                        Program: CO
                    </th>
                </tr>
                <tr>
                    <th>
                        Designation: Lecturer
                    </th>
                    <th>
                        Semester: '.$row1["sem"].'
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
                <th rowspan="1">Course Title</th>
                <th rowspan="1">Course Code</th>
                <th colspan="3">Teaching Scheme</th>
                <th rowspan="1">Credits (L+P+T)</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>L</td>
                <td>P</td>
                <td>T</td>
                <td></td>
            </tr>
            <tr>
                <td rowspan="1">'.$sub.'</td>
                <td rowspan="1">'.$row1["coursecode"].'</td>
                <td colspan="1">'.$row2["lecturePW"].'</td>
                <td colspan="1">'.$row2["practicalPW"].'</td>
                <td colspan="1">'.$row2["tutorialPW"].'</td>
                <td rowspan="1">'.$creds.'</td>
            </tr>
        </table>';

// Initialize a counter for the entries
$entryCounter = 0;

$week = 2;

$html .= '<br><br><br>
        <table>
            <thead>
                <tr>
                    <th colspan="2">
                        Week wise lesson plan
                    </th>
                    <th colspan="2">Week no.: 1 </th>
                </tr>
                <tr>
                    <th>Sem.: '.$row1["sem"].' </th>
                    <th>Course Title:' .$sub. '</th>
                    <th>Course Code: '.$row1["coursecode"].' </th>
                    <th>Name of Faculty: ' . $_SESSION['firstName'] . ' ' . $_SESSION['middleName'] . ' ' . $_SESSION['lastName'] . ' </th>
                </tr>
            </thead>
        </table>';

$html .= '<table>';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th>Lecture no. & <br> Date</th>';
$html .= '<th>Topic to be covered and Assignment / Home Work Given</th>';
$html .= '<th>Remarks</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';

// Loop through the fetched data
while ($row = mysqli_fetch_assoc($view1)) {
    // Increment the counter
    $entryCounter++;

    // Display the data in the table row
    $html .= '<tr>';
    $html .= '<td>' . $row['lecno'] . "<br>" . $row['planned_date'] . '</td>'; // Assuming \'lecture_no\' is the column name for lecture number
    $html .= '<td>' . $row['topic'] . '</td>'; // Assuming \'topic\' is the column name for the topic
    $html .= '<td rowspan="2">' . "" . '</td>'; // Assuming \'topic\' is the column name for the topic
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td>' . "Assignment / Homework" . '</td>'; // Assuming \'lecture_no\' is the column name for lecture number
    $html .= '<td>' . $row['assignment'] . '</td>'; // Assuming \'lecture_no\' is the column name for lecture number
    $html .= '</tr>';
    // If the counter is a multiple of 3, close the current table and start a new one
    if ($entryCounter % 3 == 0) {
        
        $html .= '</table>';

        // Start a new table
        $html .= '<br><br><br>';
        $html .= '<table>';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th colspan="2">';
        $html .= 'Week wise lesson plan';
        $html .= '</th>';
        $html .= '<th colspan="2">Week no.:'.$week.'</th>';
        $week++;
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th>Sem.:  '.$row1["sem"].' </th>';
        $html .= '<th>Course Title: '.$row1["course"].' </th>';
        $html .= '<th>Course Code:'.$row1["coursecode"].'</th>';
        $html .= '<th>Name of Faculty:' . $_SESSION['firstName'] . ' ' . $_SESSION['middleName'] . ' ' . $_SESSION['lastName'] . '</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '</table>';
        
        $html .= '<table>';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>Lecture no. & Date</th>';
        $html .= '<th>Topic to be covered and Assignment / Home Work Given</th>';
        $html .= '<th>Remarks</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';
    }
}

// Close the last table if there are any remaining entries
if ($entryCounter % 3 != 0) {
    $html .= '</tbody>';
    $html .= '</table>';
}

$html .= '</center>
    </div>   
</body>

</html>';

$html .='
<div class="sign">
<h3>Sign of Faculty : </h3> 
<h3>Sign of H. O. D. : </h3> 
</div>
';

// Create a Dompdf instance
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('Weekly_Lesson_Plan_Report.pdf', ['Attachment' => 0]);
?>
