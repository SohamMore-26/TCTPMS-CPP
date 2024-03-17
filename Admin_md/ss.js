let dt=["Monday","Wednesday","Friday"]
let semStartDate = new Date("2024-01-01")
let date1=[]
let lecperweek=3
let lastDate=[]

lastDate = dates(48,semStartDate,dt,lecperweek)

for (let i = 0; i < lastDate.length; i++) {
  console.log(i,lastDate[i])
  
}
console.log(lastDate);

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


function dates(noOfLec,semStartDate,dt,lecperweek)
{
    let date=[]
    let temp

    

    for(let i = 0 ; i < lecperweek ; i++)
    {
      temp = new Date(getNextDayFromDate(semStartDate, dt[i]))

      date.push(temp.toDateString())
        
    }
    let tempDate

    for (let i = 0; i < noOfLec-lecperweek; i++) 
    {
      tempDate = new Date(date[i])
      
      temp=tempDate.getDate()+7
      tempDate.setDate(temp)
      date.push(tempDate.toDateString())
    }
    
    
    return date
}

function getNextDayFromDate(date, day) 
{
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

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++=