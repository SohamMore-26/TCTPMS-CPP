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



$aca = mysqli_query($con, "select * from academic_cal where aca_year = '$acaYear' AND semester = '$sem1'") or die (mysqli_error($con));
$row = mysqli_fetch_array($aca);
$semstart = $row['sem_duration_from']; // sem start date
$semend = $row['sem_duration_to']; // sem end date


$time = mysqli_query($con, "select * from timetable where aca_year = '$acaYear' AND semester = '$sem' AND scheme = '$sch' AND division = '$div' AND course = '$sub'") or die (mysqli_error($con));
$days = array(); // Declare an empty array
while ($row1 = mysqli_fetch_array($time)) {
  extract($row1);
  $day = $row1['day'];
  array_push($days, $day); // Push each day value into the array
}

$course = mysqli_query($con, "select * from courseinfo where courseAbrevation = '$sub' ") or die (mysqli_error($con));
$row2 = mysqli_fetch_array($course);
$noOfLec = $row2['teachingHours'];
$lecperweek = $row2['lecturePW'];

?>


<script>
  let dt = <?php echo json_encode($days); ?>;
  let semStartDate = new Date("<?php echo $semstart ?>");
  let date1 = [];
  let lecperweek = <?php echo $lecperweek ?>;
  let noOfLec = <?php echo $noOfLec ?>;
  let lastDate = [];

  lastDate = dates(noOfLec, semStartDate, dt, lecperweek)

  for (let i = 0; i < lastDate.length; i++) {
    console.log(i, lastDate[i])

  }
  // console.log(lastDate);

  // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


  function dates(noOfLec, semStartDate, dt, lecperweek) {
    let date = []
    let temp



    for (let i = 0; i < lecperweek; i++) {
      temp = new Date(getNextDayFromDate(semStartDate, dt[i]))

      date.push(temp.toDateString())

    }
    let tempDate

    for (let i = 0; i < noOfLec - lecperweek; i++) {
      tempDate = new Date(date[i])

      temp = tempDate.getDate() + 7
      tempDate.setDate(temp)
      date.push(tempDate.toDateString())
    }


    return date
  }

  function getNextDayFromDate(date, day) {
    const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    const inputDayIndex = daysOfWeek.indexOf(day);
    let inputDate = new Date(date);

    while (inputDate.getDay() !== inputDayIndex) {
      inputDate.setDate(inputDate.getDate() + 1);
    }

    // Advance to the next occurrence of the given day
    inputDate.setDate(inputDate.getDate());
    return inputDate;
  }


  let xhr = new XMLHttpRequest();
  let url = "text.php";
  let params = "lastDate=" + JSON.stringify(lastDate);
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      console.log(xhr.responseText);
    }
  };
  xhr.send(params);
</script>