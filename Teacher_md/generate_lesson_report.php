<?php
require_once 'vendor/autoload.php';
use Dompdf\Dompdf;

$acaYear = $_POST['aca_year'];
$sem = $_POST['semester'];
$sch = $_POST['scheme'];
$sub = $_POST['sub'];
$div = $_POST['div'];
$tch_id = $_POST['tch_id'];
$type = $_POST['type'];

$conn = new PDO('mysql:host=localhost:3307;dbname=tctpms-db', 'root', '');
$con = mysqli_connect("localhost:3307", "root", "", "tctpms-db");

$sql = "SELECT * FROM lesson_plan WHERE course = '$sub' AND aca_year = '$acaYear' AND sem = '$sem' AND div1 = '$div' AND sch='$sch'AND preparedby = '$tch_id'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

 
if ($type === 'lessonPlan') {
    // Fetch data for weekly lesson plan
    $sql = "SELECT * FROM lesson_plan WHERE course = '$sub' AND aca_year = '$acaYear' AND sem = '$sem' AND div1 = '$div' AND sch='$sch' AND preparedby = '$tch_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Generate PDF from the first HTML template
    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lesson Plan Report</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
    
            th,
            td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
                width: 50px;
                text-align: center;
            }
    
            td {
                height: 50px;
            }
    
            th {
                background-color: #f2f2f2;
                width: 15px;
            }
    
            caption {
                font-size: 25px;
            }
        </style>
    </head>
    <body>
    
        <table>
            <caption>Teaching Plan</caption>
            <thead>
            <tr>
                <th>Lecture No.</th>
                <th>CO (Mention only no.)</th>
                <th>UO (Mention only no.)</th>
                <th>Title/Details</th>
                <th style="width: 80px;">Planned Date</th>
                <th style="width: 80px;">Actual Date</th>
                <th>Teaching Method / Media</th>
                <th>Remarks</th>
            </tr>
            </thead>
            <tbody>';
    
    foreach ($rows as $row) {
        $html .= '<tr>
            <td>'.$row['lecno'].'</td>
            <td>'.$row['course_outcome'].'</td>
            <td>'.$row['unit_outcome'].'</td>
            <td>'.$row['topic'].'</td>
            <td>'.$row['planned_date'].'</td>
            <td>'.$row['actual_date'].'</td>
            <td>'.$row['teaching_aids'].'</td>
            <td></td>
        </tr>';
    }
    
    $html .= '</tbody>
    </table>
    </body>
    </html>';
} elseif ($type === 'weekly') {
    // Redirect to test.php with query parameters
    $redirect_url = "test.php?";
    $redirect_url .= "aca_year=" . urlencode($acaYear) . "&";
    $redirect_url .= "semester=" . urlencode($sem) . "&";
    $redirect_url .= "scheme=" . urlencode($sch) . "&";
    $redirect_url .= "sub=" . urlencode($sub) . "&";
    $redirect_url .= "div=" . urlencode($div) . "&";
    $redirect_url .= "tch_id=" . urlencode($tch_id) . "&";
    $redirect_url .= "type=" . urlencode($type);
    header("Location: $redirect_url");
    exit; // Ensure that no other code executes after the redirect
}

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('Lesson_Plan_Report.pdf', ['Attachment' => 0]);
?>