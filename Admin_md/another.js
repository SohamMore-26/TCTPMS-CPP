let dates=[]




function datesGenerate(date ,noOfLec) 
{
    let tempDate,tdate 

    for (let i = 0; i < noOfLec; i++) 
    {
        tdate = new Date(date[i])

        // console.log(tdate.toDateString())
    
        tempDate=tdate.getDate()+7

        tdate.setDate(tempDate)
    
        date.push(tdate.toDateString())

    }
    return date

}


let temp = new Date("1-2-2024")

let credits = 3

let dt = ["mad","nis","pr","pr","pr","pr","pr","pr","pwp","eti","mgt","nolec","nis","eti","mgt","mgt","pr","pr","pr","pr","ede","ede","pr","pr","mad","pwp","pr","pr","pr","pr","pr","pr","eti","mad","pwp","nis"]

let lc

let k=0

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
            dates.push(temp.toDateString())     
        }
        lc++
    }
    let a = temp.getDate()+1
    temp.setDate(a)
}



let newDates = datesGenerate(dates,48)

console.log(newDates)








