let batch1Pr = ["","","nis","nis","","","pwp","pwp","","","","","","","","","ede","ede","","","","","mad","mad","","","cpe","cpe","cpe","cpe","mad","mad","","","",""]
let batch2Pr = ["","","mad","mad","nis","nis","mad","mad","","","","","","","","","ede","ede","pwp","pwp","","","","","","","cpe","cpe","cpe","cpe","","","","","",""]
let batch3Pr = ["","","pwp","pwp","mad","mad","nis","nis","","","","","","","","","ede","ede","mad","mad","","","","","","","cpe","cpe","cpe","cpe","","","","","",""]

let b1PrDates = []
let b2PrDates = []
let b3PrDates = []


let semStartDate = new Date("1-1-2024")

let temp = semStartDate

let slotNo

let prCredits = 2

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
        
        if (batch1Pr[slotNo-1] == "mad") 
        {
            b1PrDates.push(temp.toDateString())
        }
        if (batch2Pr[slotNo-1] == "mad") 
        {
            b2PrDates.push(temp.toDateString())
        }
        if (batch3Pr[slotNo-1] == "mad") 
        {
            b3PrDates.push(temp.toDateString())
        }
        slotNo+=2
        
    }
    let a = temp.getDate()+1
    temp.setDate(a)
    
}

let tempDate


for (let k = 0;  k <  (16*prCredits-prCredits); k++) 
{
    temp = new Date(b1PrDates[k])

    tempDate = temp.getDay() + 7 

    temp.setDate(tempDate)

    b1PrDates.push(temp.toDateString())

    temp = new Date(b2PrDates[k])

    tempDate = temp.getDay() + 7 

    temp.setDate(tempDate)

    b2PrDates.push(temp.toDateString())

    temp = new Date(b2PrDates[k])

    tempDate = temp.getDay() + 7 

    temp.setDate(tempDate)

    b3PrDates.push(temp.toDateString())
    
}




console.log(" Dates for Batch -1 : ",b1PrDates);
console.log(" Dates for Batch -2 : ",b2PrDates);
console.log(" Dates for Batch -3 : ",b3PrDates);