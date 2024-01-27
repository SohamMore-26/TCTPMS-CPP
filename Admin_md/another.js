let dates=[new Date("2024-01-02"),new Date("2024-01-03"),new Date("2024-01-06")]

let newDates = datesGenerate(dates,48)

console.log(newDates)


function datesGenerate(date ,noOfLec) 
{
    let tempDate,tdate 

    for (let i = 0; i < noOfLec; i++) 
    {
        tdate = new Date(date[i])

        // console.log(tdate.toDateString())
    
        tempDate=tdate.getDate()+7

        tdate.setDate(tempDate)
    
        date.push(tdate)

    }
    return date

}





