<?php
include "config.php";
$acaYear = $_POST['aca_year'];
$sem = $_POST['semester'];
$sch = $_POST['scheme'];
$sub = $_POST['sub'];
$NOW = $_POST['week'];
$div = $_POST['divison'];

if ($sem == "1") {
    $sem1 = "1st Sem";
} elseif ($sem % 2 == 0) {
    $sem1 = "Even (2,4,6)";
} else {
    $sem1 = "Odd (3,5)";
}

// echo $sem1;
// echo $acaYear;

$aca = mysqli_query($con, "select * from academic_cal where aca_year = '$acaYear' AND semester = '$sem1'") or die(mysqli_error($con));
$row = mysqli_fetch_array($aca);
$semstart = $row['sem_duration_from']; // sem start date
$semend = $row['sem_duration_to']; // sem end date


$time = mysqli_query($con, "select * from timetable where aca_year = '$acaYear' AND semester = '$sem' AND scheme = '$sch' AND division = '$div' AND course = '$sub'") or die(mysqli_error($con));

while ($row1 = mysqli_fetch_array($time)) {
    extract($row1);
    $day = $row1['day'];
    if (!is_string($day)) {
        $day = implode(',', $day);
    }
    echo $day;
}


// $subarray = $row1['course'];
// echo $semend;
// echo $sem;
// echo $sch;
// echo $sub;
// echo $NOW;
// echo $div;
?>