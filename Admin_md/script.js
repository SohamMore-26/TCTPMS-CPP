let cards = document.getElementById("main_c_cont_cr");
let add_cr = document.getElementById("add_course");
let del_cr = document.getElementById("upd_course");

function showAdd() {
  cards.classList.add("main_c_cont_cr_hid");
  add_cr.classList.remove("add_course_hid");
  del_cr.classList.add("upd_course_hid");
}

function showDel() {
  cards.classList.add("main_c_cont_cr_hid");
  add_cr.classList.add("add_course_hid");
  del_cr.classList.remove("upd_course_hid");
}

function showMain() {
  cards.classList.remove("main_c_cont_cr_hid");
  add_cr.classList.add("add_course_hid");
  del_cr.classList.add("upd_course_hid");
}

// Function to open the dialog
function openDialog(element) {

  let elementID = element.id;
  let elementValue = element.value;
  let elementDay = checkDay(elementID); 
  
  // console.log(elementID);
  // console.log(elementValue);
  // console.log(elementDay);
  if (elementValue === "Theory") {
    document.getElementById('myDialog').showModal();

    document.getElementById("slot").value = elementID;
    document.getElementById("time_day").value = elementDay;
    document.getElementById("time_ThPr").value = elementValue;
  }
  if (elementValue === "Practical") {
    document.getElementById('myDialogP').showModal();

    document.getElementById("Slot").value = elementID;
    document.getElementById("Time_day").value = elementDay;
    document.getElementById("Time_ThPr").value = elementValue;
  }
  if (elementValue === "Tutorial") {
    document.getElementById('myDialogTu').showModal();
    document.getElementById("slotTu").value = elementID;
    document.getElementById("time_dayTu").value = elementDay;
    document.getElementById("time_ThPrTu").value = elementValue;
  }



  console.log(elementID);
  console.log(elementValue);
  console.log(elementDay);
}

function checkDay(elementID) {
  var elementDay; 
  if (elementID >= 1 && elementID <= 6) {
    elementDay = "Monday";
  }
  else if (elementID >= 7 && elementID <= 12) {
     elementDay = "Tuesday";
  }
  else if (elementID >= 13 && elementID <= 18) {
     elementDay = "Wednesday";
  }
  else if (elementID >= 19 && elementID <= 24) {
    let elementDay = "Thusday";
  }
  else if (elementID >= 25 && elementID <= 30) {
     elementDay = "Friday";
  }
  else if (elementID >= 31 && elementID <= 36) {
     elementDay = "Saturaday";
  }
  else {
  }

  return elementDay;
}
// Function to close the dialog
function closeDialog() {
  document.getElementById('myDialog').close();
}

function closeDialogP() {
  document.getElementById('myDialogP').close();
}
function closeDialogTu() {
  document.getElementById('myDialogTu').close();
}

function checkDay(elementID) {
  var elementDay; 
  if (elementID >= 1 && elementID <= 6) {
    elementDay = "Monday";
  }
  else if (elementID >= 7 && elementID <= 12) {
     elementDay = "Tuesday";
  }
  else if (elementID >= 13 && elementID <= 18) {
     elementDay = "Wednesday";
  }
  else if (elementID >= 19 && elementID <= 24) {
    let elementDay = "Thusday";
  }
  else if (elementID >= 25 && elementID <= 30) {
     elementDay = "Friday";
  }
  else if (elementID >= 31 && elementID <= 36) {
     elementDay = "Saturaday";
  }
  else {
  }

  return elementDay;
}