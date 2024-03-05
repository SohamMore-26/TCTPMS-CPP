let dt = ["mad","nis","pr","pr","pr","pr","pr","pr","pwp","eti","mgt","nolec","nis","eti","mgt","mgt","pr","pr","pr","pr","ede","ede","pr","pr","mad","pwp","pr","pr","pr","pr","pr","pr","eti","mad","pwp","nis"]
let dt2 = ["mad","nis","pr","pr","pr","pr","pr","pr","pwp","eti","mgt","nolec","nis","eti","mgt","mgt","pr","pr","pr","pr","ede","ede","pr","pr","mad","nis","pr","pr","pr","pr","pr","pr","eti","mad","pwp","pwp"]
let semStartDate = new Date("1-1-2024")
let semEndDate = new Date("4-9-2024")
let lastDate = new Date("2-21-2024")
let dates=[]


dates = initDates(semStartDate,dt)

let newDates = datesGenerate(dates,48-3,semEndDate)

for (let i = 0; i < newDates.length; i++) {
    console.log(newDates[i], i+1);
    
}

let finalDates = regenerateDates(newDates,lastDate,semEndDate,dt2)
console.log("\n\n");

for (let i = 0; i < finalDates.length; i++) 
{
    console.log(finalDates[i], i+1);
    
}




function datesGenerate(date ,noOfLec,semEndDate) 
{
    let tempDate,tdate 

    a : for (let i = 0; i < noOfLec; i++) 
    {
        tdate = new Date(date[i])

    
        tempDate=tdate.getDate()+7

        tdate.setDate(tempDate)

        if (tdate.getTime() > semEndDate.getTime()) 
        {
            for (let j = 0; j < noOfLec - i; j++) {
                date.push("Extra Lecture")
                
            }   
            break a
        }

        date.push(tdate.toDateString())
          

    }
    return date

}

function initDates(semStartDate,dt)
{
    let date=[]
    let temp = semStartDate

    let lc

    a: for (let i = 0; i < 7; i++) 
    {
      
        dayWeek = temp.getDay()

        switch(dayWeek)
        {
            case 1 : lc=1
                break
            case 2 : lc=7
                break
            case 3 : lc=13
                break
            case 4 : lc=19
                break
            case 5 : lc=25
                break
            case 6 : lc=31
                break
            case 0 :    let a = temp.getDate()+1
                        temp.setDate(a)
                        continue a
        
        }


        for (let j = 0; j < 6; j++) 
        {
            if (dt[lc-1] == "nis") 
            {
                date.push(temp.toDateString())     
            }
            lc++
        }
        let a = temp.getDate()+1
        temp.setDate(a)
    }

    return date
}

function regenerateDates(date,lastDate,semEndDate,dt2)
{
    let genDates,finalDates;

    for(let i = 0 ; i<date.length; i++)
    {
        if (date[i]==lastDate.toDateString()) 
        {
            genDates= initDates(lastDate,dt2)

            finalDates = datesGenerate(genDates,date.length-i-3,semEndDate)

            date.splice(i)

            date=date.concat(finalDates)
            break 
        }
    }
    

    return date


}



























