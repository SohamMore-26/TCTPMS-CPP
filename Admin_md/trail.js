var lecDate = new Date("2024-01-02")

let datesArr=[2,3,6,9]
let diffArr=[]


for (let i = 1; i < datesArr.length; i++) 
{
    let a = datesArr[i]-datesArr[i-1]
    diffArr.push(a)   
}

let k =0;

let noOfLec = 48

console.log(lecDate.toDateString())

for (let j = 1; j < noOfLec; j++) 
{
    let tempDate=lecDate.getDate()+diffArr[k]

    lecDate.setDate(tempDate)
    
    console.log(lecDate.toDateString())

    k++

    if (k == diffArr.length) 
    {
        k=0;
    }

}



