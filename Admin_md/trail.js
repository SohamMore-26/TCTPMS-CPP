

// var lecDate = new Date("2024-01-02")

// let datesArr=[2,3,6,9]
// let diffArr=[]


// for (let i = 1; i < datesArr.length; i++) 
// {
//     let a = datesArr[i]-datesArr[i-1]
//     diffArr.push(a)   
// }

// let k =0;

// let noOfLec = 48



// for (let j = 0; j < noOfLec; j++) 
// {
//     let day = lecDate.getDate();
//     let month = lecDate.getMonth()+1;
//     let year = lecDate.getFullYear();
//     console.log("Lec.",j+1,"    ",day.toString().padStart(2,'0'),"/",month.toString().padStart(2,'0'),"/",year.toString().padStart(2,'0'))
//     let tempDate=lecDate.getDate()+diffArr[k]

//     lecDate.setDate(tempDate)
    

//     k++

//     if (k == diffArr.length) 
//     {
//         k=0;
//     }

// }

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
            console.log(temp.toDateString());    
        }
        lc++
    }

    let a = temp.getDate()+1
    temp.setDate(a)
}







