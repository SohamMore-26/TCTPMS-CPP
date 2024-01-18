// var currentDate = new Date("2024-01-18")
// let newDate= currentDate.getDate()+17;
// currentDate.setDate(newDate);
// console.log(currentDate.toDateString())

let datesArr=[2,3,3,9]
let diffArr=[]


for (let i = 1; i < datesArr.length; i++) 
{
    
    console.log(datesArr[i])
    console.log(datesArr[i-1])
    let a = datesArr[i]-datesArr[i-1]
    diffArr.push(a)
    
}

let k =0;

console.log(diffArr)
for (let j = datesArr.length; j < 20; j++) 
{
    datesArr[j]=diffArr[k]+datesArr[j-1]
    k++
    if (k == diffArr.length) 
    {
        k=0;
    }

}


console.log(datesArr)