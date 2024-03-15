let dt=["Monday","Wednesday","Friday"]
let semStartDate = new Date("1-1-2024")
let date1=[]
let lecperweek=3

let lastDate=[]

lastDate = dates(48,semStartDate,dt,lecperweek)
console.log(lastDate);

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


function dates(noOfLec,semStartDate,dt,lecperweek)
{
    let date=[]

    let loopCounter = 0 
    

    for(let i = 0 ; i < noOfLec ; i++)
    {
        date[i] = getNextDayFromDate(semStartDate, dt[loopCounter])

        loopCounter++
        if(loopCounter == lecperweek)
            loopCounter=0
        
        lastDate.push(date[i].toDateString())
        console.log(i+1,date[i].toDateString())
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

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++=