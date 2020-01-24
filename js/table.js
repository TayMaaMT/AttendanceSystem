var modal1 = document.querySelector(".modal1");
var trigger1 = document.querySelector(".btn-edit");
var closeButton1 = document.querySelector(".close-button1");

function toggleModal1() {
    modal1.classList.toggle("show-modal1");
}

function windowOnClick1(event1) {
    if (event1.target === modal1) {
        toggleModal1();
    }
}

trigger1.addEventListener("click", toggleModal1);
closeButton1.addEventListener("click", toggleModal1);
window.addEventListener("click", windowOnClick1);

/* ############################################################## */


var modal2 = document.querySelector(".modal2");
var trigger2 = document.querySelector(".btn-del");
var closeButton2 = document.querySelector(".close-button2");

function toggleModal2() {
    modal2.classList.toggle("show-modal2");
}

function windowOnClick2(event2) {
    if (event2.target === modal2) {
        toggleModal2();
    }

}

trigger2.addEventListener("click", toggleModal2);
closeButton2.addEventListener("click", toggleModal2);
window.addEventListener("click", windowOnClick2);

/* ############################################################## */

var all_tr = $('tr');
$('td input[type="button"]').on('click', function() {
    all_tr.removeClass('selected');

    $(this).closest('tr').addClass('selected');
    console.log($(this).closest('tr')[0].cells[0].innerText);
    console.log($(this).closest('tr')[0].cells[1].innerText);
    console.log($(this).closest('tr')[0].cells[2].innerText);
    console.log($(this).closest('tr')[0].cells[3].innerText);
    console.log($(this).closest('tr')[0].cells[4].innerText);
    console.log($(this).closest('tr')[0].cells[5].innerText);

    document.getElementById('student_name').value = $(this).closest('tr')[0].cells[2].innerText;
    document.getElementById('student_id').value = $(this).closest('tr')[0].cells[1].innerText;
    document.getElementById('doctor').value = $(this).closest('tr')[0].cells[6].innerText;
    document.getElementById('course').value = $(this).closest('tr')[0].cells[4].innerText;
    document.getElementById('No_id').value = $(this).closest('tr')[0].cells[0].innerText;
    document.getElementById('delet_id').value = $(this).closest('tr')[0].cells[0].innerText;
    console.log(document.getElementById('student_name').value);
});

console.log("hihihi");