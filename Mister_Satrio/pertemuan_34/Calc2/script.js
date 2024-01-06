const btnNumeric = document.getElementsByClassName("numeric");
const btnOperator = document.getElementsByClassName("operator");
const btnClear = document.getElementsByClassName("clear");
const btnHasil = document.getElementById("hasil");
const monitor = document.getElementsByClassName("monitor");
const display_num1 = monitor[0];
const display_num2 = monitor[2];
const display_operator = monitor[1];
const display_hasil = monitor[3];

// Variabel
// Variable
let hasil = 0;
let angka1 = 0;
let angka2 = 0;
let operator = "";
let temp1 = "";
let temp2 = "";

// Reading all numeric button
for (let i = 0; i < 12; i++) {
  btnNumeric[i].addEventListener("click", function () {
    if (operator == "") {
      temp1 += btnNumeric[i].innerHTML;
      display_num1.innerHTML = temp1;
    } else {
      temp2 += btnNumeric[i].innerHTML;
      display_num2.innerHTML = temp2;
    }
  });
}

// Reading all operator button

for (let j = 0; j < 4; j++) {
  btnOperator[j].addEventListener("click", function () {
    operator += btnOperator[j].innerHTML;
    display_operator.innerHTML = operator;
  });
}
btnHasil.addEventListener("click", function () {
  angka1 = parseInt(temp1);
  angka2 = parseInt(temp2);
  if (operator == "+") {
    hasil = angka1 + angka2;
    display_hasil.innerHTML = hasil;
  } else if (operator == "-") {
    hasil = angka1 - angka2;
    display_hasil.innerHTML = hasil;
  } else if (operator == "*") {
    hasil = angka1 * angka2;
    display_hasil.innerHTML = hasil;
  } else if (operator == "/") {
    hasil = angka1 / angka2;
    display_hasil.innerHTML = hasil;
  } else {
    hasil = "Kosong woi";
    display_hasil.innerHTML = hasil;
  }
});
