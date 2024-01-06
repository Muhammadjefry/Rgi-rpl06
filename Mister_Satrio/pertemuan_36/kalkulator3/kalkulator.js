// Take all HTML element
const properties = document.getElementsByClassName("properties");
const number = document.getElementsByClassName("num");
const opt = document.getElementsByClassName("operator");
const monitor = document.getElementById("container_monitor");
const btnHasil = document.getElementById("hasil");

// Variable
let hasil = 0;
let angka1 = 0;
let angka2 = 0;
let simpanAngka = 0;
let operator = "";
let temp1 = "";
let temp2 = "";
let ppt = "";

// Read Numeric Button Clicking
for (let i = 0; i <= 10; i++) {
  number[i].addEventListener("click", function () {
    if (operator == "") {
      if (hasil == 0) {
        temp1 += number[i].value;
        console.log("Angka1 : ", temp1);
        monitor.innerHTML = temp1;
      } else {
        temp1 = number[i].value;
        console.log("Angka1 : ", temp1);
        monitor.innerHTML = temp1;
        hasil = 0;
      }
    } else {
      let x = "";
      x = number[i].value;
      temp2 += number[i].value;
      console.log("Angka2 : ", temp2);
      monitor.innerHTML += x;
      x = "";
    }
  });
}

// Read Operator Button Clicking
for (let i = 0; i <= 3; i++) {
  opt[i].addEventListener("click", function () {
    operator = opt[i].value;
    monitor.innerHTML += opt[i].innerHTML;
  });
}
opt[4].addEventListener("click", function () {
  operator = opt[4].value;
  monitor.innerHTML = "";
});

// Read Properties Button Clickcing
// Clear Button
properties[0].addEventListener("click", function () {
  monitor.innerHTML = "0";
  angka1 = 0;
  angka2 = 0;
  hasil = 0;
  operator = "";
  temp1 = "";
  temp2 = "";
});

// Clear Entry
properties[1].addEventListener("click", function () {
  if (operator == "") {
    temp1 = "";
    monitor.innerHTML = 0;
  } else {
    temp2 = "";
    monitor.innerHTML = temp1 + operator;
  }
});
// MU (Mark Up)
properties[2].addEventListener("click", function () {
  operator = "mark up";
  monitor.innerHTML = "";
});

// MC (Memory Clean)
properties[3].addEventListener("click", function () {
  simpanAngka = 0;
  monitor.innerHTML = 0;
});
// MR (Memory Recall)
properties[4].addEventListener("click", function () {
  monitor.innerHTML = saveAngka;
  hasil = 1;
  temp1 = saveAngka.toString();
});
// M+ (Memory Add)
properties[5].addEventListener("click", function () {
  simpanAngka += hasil;
  monitor.innerHTML = "";
});
// M- (Memory Substract)
properties[6].addEventListener("click", function () {
  simpanAngka -= hasil;
  monitor.innerHTML = "";
});
// Read Equal Button and Calculate
btnHasil.addEventListener("click", function () {
  angka1 = parseInt(temp1);
  angka2 = parseInt(temp2);
  if (operator == "+") {
    hasil = angka1 + angka2;
  } else if (operator == "-") {
    hasil = angka1 - angka2;
  } else if (operator == "x") {
    hasil = angka1 * angka2;
  } else if (operator == "/") {
    hasil = angka1 / angka2;
  } else if (operator == "%") {
    hasil = (angka1 * angka2) / 100;
  } else if (operator == "mark up") {
    hasil = angka1 + (angka1 * angka2) / 100;
  }

  monitor.innerHTML = hasil;
  console.log("hasil : ", hasil);
  operator = "";
  temp2 = "";
  temp1 = hasil.toString();
});
