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
  if (elementValue === "Theory") {
    document.getElementById('myDialog').showModal();
  }
  if (elementValue === "Practical") {
    document.getElementById('myDialogP').showModal();
  }
  console.log(elementID);
  console.log(elementValue);
}

// Function to close the dialog
function closeDialog() {
  document.getElementById('myDialog').close();
}

function closeDialogP() {
  document.getElementById('myDialogP').close();
}