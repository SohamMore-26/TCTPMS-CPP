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



for (let j = 0; j < noOfLec; j++) 
{
    let day = lecDate.getDate();
    let month = lecDate.getMonth()+1;
    let year = lecDate.getFullYear();
    console.log(day.toString().padStart(2,'0'),"/",month.toString().padStart(2,'0'),"/",year.toString().padStart(2,'0'))
    let tempDate=lecDate.getDate()+diffArr[k]

    lecDate.setDate(tempDate)
    

    k++

    if (k == diffArr.length) 
    {
        k=0;
    }

}



