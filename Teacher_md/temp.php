<div class="tablecss" style="overflow:auto">
            <div id="Practical"></div>
        </div>

        <script>
            let batch1Pr = ["", "", "nis", "nis", "", "", "pwp", "pwp", "", "", "", "", "", "", "", "", "ede", "ede", "", "", "", "", "mad", "mad", "", "", "cpe", "cpe", "cpe", "cpe", "mad", "mad", "", "", "", ""];
            let batch2Pr = ["", "", "mad", "mad", "nis", "nis", "mad", "mad", "", "", "", "", "", "", "", "", "ede", "ede", "pwp", "pwp", "", "", "", "", "", "", "cpe", "cpe", "cpe", "cpe", "", "", "", "", "", ""];
            let batch3Pr = ["", "", "pwp", "pwp", "mad", "mad", "nis", "nis", "", "", "", "", "", "", "", "", "ede", "ede", "mad", "mad", "", "", "", "", "", "", "cpe", "cpe", "cpe", "cpe", "", "", "", "", "", ""];

            let semStartDate = new Date("1-1-2024");

            let b1PrDates = getPracticalDates(batch1Pr, semStartDate, 1, "mad");
            let b2PrDates = getPracticalDates(batch2Pr, semStartDate, 2, "mad");
            let b3PrDates = getPracticalDates(batch3Pr, semStartDate, 1, "nis");



            // console.log(" Dates for Batch -1 : ",b1PrDates);
            // console.log(" Dates for Batch -2 : ",b2PrDates);
            // console.log(" Dates for Batch -3 : ",b3PrDates);



            function getPracticalDates(batchPr, semStartDate, prCredits, subject) {
                let temp = semStartDate;
                let slotNo;
                let bPrDates = [];

                a: for (let i = 0; i < 7; i++) {
                    dayWeek = temp.getDay()

                    switch (dayWeek) {
                        case 1: slotNo = 1
                            break
                        case 2: slotNo = 7
                            break
                        case 3: slotNo = 13
                            break
                        case 4: slotNo = 19
                            break
                        case 5: slotNo = 25
                            break
                        case 6: slotNo = 31
                            break
                        case 0: let a = temp.getDate() + 1;
                            temp.setDate(a);
                            continue a;

                    }
                    for (let j = 0; j < 6; j += 2) {

                        if (batchPr[slotNo - 1] == subject) {
                            bPrDates.push(temp.toDateString())
                        }
                        slotNo += 2;

                    }
                    let a = temp.getDate() + 1;
                    temp.setDate(a);

                }

                let tempDate;



                for (let k = 0; k < (16 * prCredits - prCredits); k++) {
                    temp = new Date(bPrDates[k])

                    tempDate = temp.getDay() + 7;

                    temp.setDate(tempDate);

                    bPrDates.push(temp.toDateString());
                }

                return bPrDates
            }
            function getIndianDateFormat(date) {
                const options = {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                };
                return date.toLocaleDateString('en-IN', options);
            }

            function validate() {
                let perC = document.getElementById("per");
                perC.classList.add("visible");
                perC.classList.remove("hid");
            }

            var text = document.getElementById('Practical');
            var table = '<table><thead><tr><th>Pr. No.</th><th>Planed Dates</th><th>Planned Practical Coverage</th><th>Issued By</th><th>Approved By</th><th>Status</th><th>Remarks</th><th>Save</th></tr></thead><tbody>';

            for (var i = 0; i < b1PrDates.length; i++) {

                let indianDate = getIndianDateFormat(new Date(b1PrDates[i]));


                // console.log(typeof(k))
                // let day = k.getFullDate();
                // let month = k.getMonth() + 1;
                // let year = k.getFullYear();

                let per = (i + 1) / 48 * 100

                table += '<tr><td>' + (i + 1) + '</td><td>' + indianDate + '</td><td><textarea style="width: 453px; height: 129px;"></textarea></td><td><input type=text</td><td><input type=text></td><td><input type=checkbox></td><td><a href="">Remarks</a></td><td><button type="submit" name="" class="button">Save</button> </td></tr>';
            }
            table += '</tbody></table>';

            text.innerHTML = table;
        </script>