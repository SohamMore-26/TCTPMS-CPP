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