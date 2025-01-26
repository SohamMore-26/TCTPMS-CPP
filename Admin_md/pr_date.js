let dt = <?php echo json_encode($days); ?>;
let semStartDate = new Date("<?php echo $semstart ?>");
let semEndDate = new Date("<?php echo $semend ?>");
let date1 = [];
let prPerWeek = <?php echo $lecperweek ?>;
let noOfPr = <?php echo $noOfLec ?>;
var acaYear = "<?php echo $acaYear ?>";
var sem = <?php echo $sem ?>;
var sch = "<?php echo $sch ?>";
var sub = "<?php echo $sub ?>";
var div = "<?php echo $div ?>";

let lastDate = [];
let extraPr= 0;
lastDate = dates(noOfPr, semStartDate, dt, prPerWeek, semEndDate)

for (let i = 0; i < lastDate.length; i++) {
    console.log(i + 1, lastDate[i])

  }
  console.log(lastDate);



function dates(noOfPr, semStartDate, dt, prPerWeek, semEndDate) 
{
    let date = []
    let temp

    for (let i = 0; i < prPerWeek; i++) 
    {
      temp = new Date(getNextDayFromDate(semStartDate, dt[i]))

      date.push(temp.toDateString())

    }

    let tempDate

    for (let i = 0; i < noOfPr - prPerWeek; i++) {
      tempDate = new Date(date[i])


      tempDate.setDate(tempDate.getDate() + 7)

      if (tempDate.getTime() > semEndDate.getTime()) {
        for (let j = 0 ; j < noOfPr - i - prPerWeek; j++) {
          date.push("Extra Practical");
          extraPr += 1;
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