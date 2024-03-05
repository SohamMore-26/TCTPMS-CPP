let batch1Pr = ["","","nis","nis","","","pwp","pwp","","","","","","","","","ede","ede","","","","","mad","mad","","","cpe","cpe","cpe","cpe","mad","mad","","","",""]
let batch2Pr = ["","","mad","mad","nis","nis","mad","mad","","","","","","","","","ede","ede","pwp","pwp","","","","","","","cpe","cpe","cpe","cpe","","","","","",""]
let batch3Pr = ["","","pwp","pwp","mad","mad","nis","nis","","","","","","","","","ede","ede","mad","mad","","","","","","","cpe","cpe","cpe","cpe","","","","","",""]
let batchpr2 = ["","","pwp","pwp","mad","mad","nis","nis","","","","","","","","","ede","ede","mad","mad","","","","","","","cpe","cpe","cpe","cpe","","","","","",""]

let semStartDate = new Date("1-1-2024")

let b1PrDates = getPracticalDates(batch1Pr,semStartDate,1,"pwp")
let b2PrDates = getPracticalDates(batch2Pr,semStartDate,2,"mad")
let b3PrDates = getPracticalDates(batch3Pr,semStartDate,1,"nis")


// lastDate = new Date("")



console.log(" Dates for Batch -1 : ",b1PrDates);



// b1PrDates=regenerateDates(b1PrDates,batchpr2,lastDate)




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
                console.log(temp.toDateString())
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

        bPrDates.push(temp.toDateString())
    
    }

    return bPrDates
}


function regenerateDates(date,batchpr2,lastDate)
{
    let finalDates;

    for(let i = 0 ; i<date.length; i++)
    {
        if (date[i]==lastDate.toDateString()) 
        {

            finalDates=getPracticalDates(batchpr2,lastDate,2,"mad")
            date.splice(i)

            date=date.concat(finalDates)
            break 
        }
    }
    

    return date

}






