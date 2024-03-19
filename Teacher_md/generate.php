<?php
include "config.php";
$acaYear = $_POST['aca_year'];
$sem = $_POST['semester'];
$sch = $_POST['scheme'];
$sub = $_POST['sub'];
$div = $_POST['div'];

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
$prperweek = $row2['practicalPW'];
$courseT = $row2['courseTitle'];
$courseC = $row2['courseCode'];

?>
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
      <a href="\TCTPMS-CPP\logout.php"> <button type="button" id="button_lg" class="button">Logout</button></a>
    </div>
  </div>

  <div class="">

    <center>
      <h2> As Per
        <?php echo $courseT; ?> (
        <?php echo $sub . " " . $courseC; ?>), there are
        <?php echo $lecperweek; ?> lectures per week for Divison '
        <?php echo $div; ?>' . Do you want to generate your plan ??
      </h2>
    </center>
    <center> <button class="button" onclick="generate()"> Yes </button> </center>
  </div>

</body>

</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>

  function generate() {
    let dt = <?php echo json_encode($days); ?>;
    let semStartDate = new Date("<?php echo $semstart ?>");
    let semEndDate = new Date("<?php echo $semend ?>");
    let date1 = [];
    let lecperweek = <?php echo $lecperweek ?>;
    let noOfLec = <?php echo $noOfLec ?>;
    var acaYear = "<?php echo $acaYear ?>";
    var sem = <?php echo $sem ?>;
    var sch = "<?php echo $sch ?>";
    var sub = "<?php echo $sub ?>";
    var div = "<?php echo $div ?>";

    let lastDate = [];


    lastDate = dates(noOfLec, semStartDate, dt, lecperweek, semEndDate)

    for (let i = 0; i < lastDate.length; i++) {
      console.log(i + 1, lastDate[i])

    }
    console.log(lastDate);

    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


    function dates(noOfLec, semStartDate, dt, lecperweek, semEndDate) {
      let date = []
      let temp

      for (let i = 0; i < lecperweek; i++) {
        temp = new Date(getNextDayFromDate(semStartDate, dt[i]))

        date.push(temp.toDateString())

      }

      let tempDate

      for (let i = 0; i < noOfLec - lecperweek; i++) {
        tempDate = new Date(date[i])


        tempDate.setDate(tempDate.getDate() + 7)

        if (tempDate.getTime() > semEndDate.getTime()) {

          for (let j = 0; j < noOfLec - i - lecperweek; j++) {
            date.push("Extra Lecture")
          }
          break
        }
        else {
          date.push(tempDate.toDateString())
        }
      }

      for (let i = 0; i < date.length; i++) {
        let a = new Date(date[i])

        if (date[i] == "Extra Lecture") {
          break

        }
        date[i] = a.getFullYear() + "-" + (a.getMonth() + 1) + "-" + a.getDate()

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



    $.ajax({
      url: 'generate.php',
      type: 'POST',
      data: {
        acaYear: acaYear,
        sem: sem,
        sch: sch,
        sub: sub,
        div: div,
        lastDate: JSON.stringify(lastDate)
      },
      success: function (response) {
        console.log(response);
      }
    });



  }

</script>
<?php
if (isset ($_POST['acaYear'], $_POST['sem'], $_POST['sch'], $_POST['sub'], $_POST['lastDate'], $_POST['div'])) {

  $acaYear = $_POST['acaYear'];
  $sem = $_POST['sem'];
  $sch = $_POST['sch'];
  $sub = $_POST['sub'];
  $div = $_POST['div'];
  $lastDate = json_decode($_POST['lastDate'], true);

  echo $acaYear;
  // Process and store the arrays in the database
  // Assuming $con is your database connection
  foreach ($lastDate as $index => $date) {
    $stmt = $con->prepare("INSERT INTO test (lecno, aca_year, semester, divison, scheme, course,date) VALUES (?,?,?,?,?,?,?)");
    $i = $index + 1;
    $stmt->bind_param("sssssss", $i, $acaYear, $sem, $div, $sch, $sub, $date);
    $lastDateSerialized = serialize($lastDate);

    $stmt->execute();
  }
  if ($stmt->execute()) {
    echo "<script>";
    echo "jQuery(document).ready(function() {";
    echo "alert('Dates Generated Successfully');";
    echo "});";
    echo "</script>";
} else {
    echo "Error: " . $stmt->error;
  }

}
?>