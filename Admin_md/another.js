let dt = ["mad","nis","pr","pr","pr","pr","pr","pr","pwp","eti","mgt","nolec","nis","eti","mgt","mgt","pr","pr","pr","pr","ede","ede","pr","pr","mad","pwp","pr","pr","pr","pr","pr","pr","eti","mad","pwp","nis"];
let dt2 = ["mad","nis","pr","pr","pr","pr","pr","pr","pwp","eti","mgt","nolec","nis","eti","mgt","mgt","pr","pr","pr","pr","ede","ede","pr","pr","mad","nis","pr","pr","pr","pr","pr","pr","eti","mad","pwp","pwp"]
let semStartDate = new Date("1-1-2024")
let semEndDate = new Date("4-9-2024")
let lastDate = new Date("2-21-2024")
let dates=[]


let lastLectureDate 

let lastEntryDate = new Date("3-6-2024")

let today = new Date()

// dates = initDates(semStartDate,dt)

// let newDates = datesGenerate(dates,48-3,semEndDate)

dates = datesGenerate(45,semStartDate,semEndDate,dt)

for (let i = 0; i < dates.length; i++) {
    console.log(dates[i], i+1);
    
}

console.log(today.toDateString())


for(let i = 0 ; i <dates.length; i++)
{
    
    if (new Date(dates[i]).getTime() > today.getTime()) 
    {
        break
    }
    lastLectureDate = dates[i]
}

console.log("Difference : ",new Date(lastLectureDate).getDate()-lastEntryDate.getDate());

// let finalDates = regenerateDates(newDates,lastDate,semEndDate,dt2)
// console.log("\n\n");

// for (let i = 0; i < finalDates.length; i++) 
// {
//     console.log(finalDates[i], i+1);
    
// }


function datesGenerate(noOfLec,semStartDate,semEndDate,dt)
{
    let date=[]
    
    dt = ["Monday","Tuesday","Thursday"]

    semstdt = new Date("1-1-2024")

    date =[]

    for(let i = 0 ; i < 48 ; i++)
    {
        date[i] = getNextDayFromDate(semstdt, dt[i]);
        console.log(date[i].toDateString())
    }
    

    let tempDate,tdate 

    b : for (let i = 0; i < noOfLec; i++) 
    {
        tdate = new Date(date[i])

    
        tempDate=tdate.getDate()+7

        tdate.setDate(tempDate)

        if (tdate.getTime() > semEndDate.getTime()) 
        {
            for (let j = 0; j < noOfLec - i; j++) {
                date.push("Extra Lecture")
                
            }   
            break b
        }

        date.push(tdate.toDateString())
          

    }
    return date

}



function getNextDayFromDate(date, day) {
    const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    const inputDayIndex = daysOfWeek.indexOf(day);
    const inputDate = new Date(date);
  
    while (inputDate.getDay() !== inputDayIndex) {
      inputDate.setDate(inputDate.getDate() + 1);
    }
  
    // Advance to the next occurrence of the given day
    inputDate.setDate(inputDate.getDate());
  
    return inputDate;
  }




















