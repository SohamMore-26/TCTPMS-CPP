<?php
include "Admin_md\config.php";

$view1 = mysqli_query($con, "SELECT planned_date FROM lesson_plan WHERE course = 'MAD' AND aca_year = '2023 - 2024' AND sem = '6' AND div1 = 'A' ") or die(mysqli_error($con));

// Fetch all dates into an array
$dates = [];
while ($row = mysqli_fetch_assoc($view1)) {
    $dates[] = $row['planned_date'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Lecture Schedule</title>
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

        td.diagonalRising {
            background: linear-gradient(to right bottom, #ffffff 0%, #ffffff 49.9%, #000000 50%, #000000 51%, #ffffff 51.1%, #ffffff 100%);
        }

        table:nth-of-type(2) td {
            background-image: linear-gradient(to top right,
                    papayawhip calc(50% - 1px),
                    black,
                    papayawhip calc(50% + 1px));
        }
    </style>
</head>

<body>
    <!-- Your existing table structure -->
    <table>
        <!-- Your existing table headers -->
        <tr>
            <th rowspan="2">Week</th>
            <th colspan="6">Lectures</th>
            <th rowspan="2">% Syllabus Covered</th>
            <th colspan="2" style="width: 15px;">Dated Signature</th>
            <th rowspan="2">Remark</th>
        </tr>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>*</td>
            <td>*</td>
            <td>Faculty</td>
            <td>Head</td>
        </tr>
        <tr>
            <th>1</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>2</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>3</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>4</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>5</th>
        </tr>
        <tr>
            <th>6</th>
        </tr>
        <tr>
            <th>7</th>
        </tr>
        <tr>
            <th>8</th>
        </tr>
        <tr>
            <th>9</th>
        </tr>
        <tr>
            <th>10</th>
        </tr>
        <tr>
            <th>11</th>
        </tr>
        <tr>
            <th>12</th>
        </tr>
        <tr>
            <th>13</th>
        </tr>
        <tr>
            <th>14</th>
        </tr>
        <tr>
            <th>15</th>
        </tr>
        <tr>
            <th>16</th>
        </tr>
    </table>
</body>

</html>