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
    <div class="main_cont">
        <div class="sidebar">
            <li>
                <div class="side_card">
                    <a href="tch_home.html">
                        <ul><span class="material-symbols-outlined">
                                home
                            </span> Home</ul>
                    </a>
                </div>
                <div class="side_card">
                    <a href="tch_timetable.html">
                        <ul><span class="material-symbols-outlined">
                                today
                            </span>View Time Table</ul>
                    </a>
                </div>

                <div class="side_card">
                    <a href="tch_courses.php">
                        <ul><span class="material-symbols-outlined">
                                menu_book
                            </span> Courses</ul>
                    </a>
                </div>
                <!-- 
                <div class="side_card">
                    <a href="tch_AcademicCal.html">
                        <ul><span class="material-symbols-outlined">
                                calendar_clock
                            </span> Academic Calendar</ul>
                    </a>
                </div> -->

                <div class="side_card">
                    <a href="tch_lesson_plan.php">
                        <ul><span class="material-symbols-outlined">
                                group
                            </span> Lesson Plan</ul>
                    </a>
                </div>


                <div class="side_card">
                    <a href="tch_lab_plan.php">
                        <ul><span class="material-symbols-outlined">
                                pending_actions
                            </span> Laboratory Plan</ul>
                    </a>
                </div>
            </li>
        </div>

    

    <div class="tablecss" style="overflow:auto">
        <div id="Practical"></div>
    </div>

    <script>
    let batch1Pr = ["","","nis","nis","","","pwp","pwp","","","","","","","","","ede","ede","","","","","mad","mad","","","cpe","cpe","cpe","cpe","mad","mad","","","",""]
let batch2Pr = ["","","mad","mad","nis","nis","mad","mad","","","","","","","","","ede","ede","pwp","pwp","","","","","","","cpe","cpe","cpe","cpe","","","","","",""]
let batch3Pr = ["","","pwp","pwp","mad","mad","nis","nis","","","","","","","","","ede","ede","mad","mad","","","","","","","cpe","cpe","cpe","cpe","","","","","",""]

let semStartDate = new Date("1-1-2024")

let b1PrDates = getPracticalDates(batch1Pr,semStartDate,1,"mad")
let b2PrDates = getPracticalDates(batch2Pr,semStartDate,2,"mad")
let b3PrDates = getPracticalDates(batch3Pr,semStartDate,1,"nis")



// console.log(" Dates for Batch -1 : ",b1PrDates);
// console.log(" Dates for Batch -2 : ",b2PrDates);
// console.log(" Dates for Batch -3 : ",b3PrDates);



function getPracticalDates(batchPr,semStartDate,prCredits,subject)
{
    let temp = semStartDate
    let slotNo
    let bPrDates = []

    a: for (let i = 0; i < 7; i++) 
    {
        dayWeek = temp.getDay()

        switch(dayWeek)
        {
            case 1 : slotNo=1
                break
            case 2 : slotNo=7
                break
            case 3 : slotNo=13
                break
            case 4 : slotNo=19
            break
            case 5 : slotNo=25
                break
            case 6 : slotNo=31
                break
            case 0 :    let a = temp.getDate()+1
                        temp.setDate(a)
                        continue a
        
        }
        for (let j = 0; j < 6; j+=2) 
        {
        
            if (batchPr[slotNo-1] == subject) 
            {
                bPrDates.push(temp.toDateString())
            }
            slotNo+=2
        
        }
        let a = temp.getDate()+1
        temp.setDate(a)
    
    }

    let tempDate
    


    for (let k = 0;  k <  (16*prCredits-prCredits); k++) 
    {
        temp = new Date(bPrDates[k])

        tempDate = temp.getDay() + 7 

        temp.setDate(tempDate)

        bPrDates.push(temp.toDateString())  }

    return bPrDates
}

        function validate() {
            let perC = document.getElementById("per");
            perC.classList.add("visible");
            perC.classList.remove("hid");
        }

        var text = document.getElementById('Practical');
        var table = '<table><thead><tr><th>Pr. No.</th><th>Planed Dates</th><th>Planned Practical Coverage</th><th>Issued By</th><th>Approved By</th><th>Status</th><th>Remarks</th></tr></thead><tbody>';

        for (var i = 0; i < b1PrDates.length; i++) {

            b1PrDates[i]

            // console.log(typeof(k))
            // let day = k.getFullDate();
            // let month = k.getMonth() + 1;
            // let year = k.getFullYear();

            let per = (i + 1) / 48 * 100

            table += '<tr><td>' + (i + 1) + '</td><td>' + b1PrDates[i]+ '</td><td><textarea style="width: 453px; height: 129px;"></textarea></td><td><input type=text</td><td><input type=text></td><td><input type=checkbox></td><td><a href="">Remarks</a></td></tr>';
        }
        table += '</tbody></table>';

        text.innerHTML = table;
    </script>
</body>

</html>