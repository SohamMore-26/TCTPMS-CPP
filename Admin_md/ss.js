let dt=["Monday","Wednesday","Friday"]
let semStartDate = new Date("2024-01-01")
let semEndDate = new Date("2024-04-09")
let date1=[]
let lecperweek=3
let lastDate=[]


lastDate = dates(48,semStartDate,dt,lecperweek,semEndDate)

for (let i = 0; i < lastDate.length; i++) {
  console.log(i+1,lastDate[i])
  
}
console.log(lastDate);

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


function dates(noOfLec,semStartDate,dt,lecperweek,semEndDate)
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
      

      tempDate.setDate(tempDate.getDate()+7)

      if (tempDate.getTime() > semEndDate.getTime())
      {

        for (let j = 0; j < noOfLec-i-lecperweek; j++) 
        {
          date.push("Extra Lecture")  
        }
        break
      }
      else
      {
        date.push(tempDate.toDateString())
      }
    }

    for (let i = 0; i < date.length; i++) 
    {
      let a = new Date(date[i])

      if (date[i] == "Extra Lecture") {
        break
        
      }
      date[i]=a.getFullYear()+"/"+(a.getMonth()+1)+"/"+a.getDate()
      
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