let output1 = document.getElementById("output2");
// let output2 = document.getElementById("output2");
// let output3 = document.getElementById("output3");
// let output4 = document.getElementById("output4");
// let output5 = document.getElementById("output5");
let time_input = document.getElementById("time_input");
let time_input1 = document.getElementById("waktu2");
// let time_input2 = document.getElementById("waktu2");
// let time_input3 = document.getElementById("waktu3");
// let time_input4 = document.getElementById("waktu4");
// let time_input5 = document.getElementById("waktu5");

// september 21,2023

let countDownDate = "";
let tombol = document.getElementById("tombol");
let timerStatus = false;

tombol.addEventListener("click", function () {
  let p = time_input1;
  let t = time_input.value;
  countDownDate = new Date(t).getTime(p);
  timerStatus = true;
  time_input.value = "" + "";
  //   time_input1 = "";
  console.log(countDownDate);
});
// let countDownDate = "";

let x1 = setInterval(function () {
  if (timerStatus) {
    // let t = time_input1.innerText;
    // countDownDate = new Date(t).getTime();
    //   time_input.value = "";
    // get current date
    let now = new Date().getTime();
    // Calculation duration
    let distance = countDownDate - now;
    // date converter
    let second = 1000;
    let minute = 1000 * 60;
    let hour = 1000 * 60 * 60;
    let day = 1000 * 60 * 60 * 24;

    // Convert ms to variable
    let days = Math.floor(distance / day);
    let hours = Math.floor((distance % day) / hour);
    let minutes = Math.floor((distance % hour) / minute);
    let seconds = Math.floor((distance % minute) / second);

    //  text to print
    let waktu =
      days +
      " Days " +
      hours +
      " Hours " +
      minutes +
      " Minute " +
      seconds +
      " Seconds ";
    output1.innerHTML = waktu;

    // console.log(waktu);
    if (distance < 0) {
      clearInterval(x1);
      output1.innerHTML = " EXPIRED ";
    }
  }
}, 1000);

// let x2 = setInterval(function () {
//   let t = time_input2.innerText;
//   countDownDate = new Date(t).getTime();
//   //   time_input.value = "";
//   // get current date
//   let now = new Date().getTime();
//   // Calculation duration
//   let distance = countDownDate - now;
//   // date converter
//   let second = 1000;
//   let minute = 1000 * 60;
//   let hour = 1000 * 60 * 60;
//   let day = 1000 * 60 * 60 * 24;

//   // Convert ms to variable
//   let days = Math.floor(distance / day);
//   let hours = Math.floor((distance % day) / hour);
//   let minutes = Math.floor((distance % hour) / minute);
//   let seconds = Math.floor((distance % minute) / second);

//   //  text to print
//   let waktu =
//     days +
//     " Days " +
//     hours +
//     " Hours " +
//     minutes +
//     " Minute " +
//     seconds +
//     " Seconds ";
//   output2.innerHTML = waktu;

//   // console.log(waktu);
//   if (distance < 0) {
//     clearInterval(x2);
//     output2.innerHTML = " Waktu Telah Berlalu ";
//   }
// }, 1000);

// let x3 = setInterval(function () {
//   let t = time_input3.innerText;
//   countDownDate = new Date(t).getTime();
//   //   time_input.value = "";
//   // get current date
//   let now = new Date().getTime();
//   // Calculation duration
//   let distance = countDownDate - now;
//   // date converter
//   let second = 1000;
//   let minute = 1000 * 60;
//   let hour = 1000 * 60 * 60;
//   let day = 1000 * 60 * 60 * 24;

//   // Convert ms to variable
//   let days = Math.floor(distance / day);
//   let hours = Math.floor((distance % day) / hour);
//   let minutes = Math.floor((distance % hour) / minute);
//   let seconds = Math.floor((distance % minute) / second);

//   //  text to print
//   let waktu =
//     days +
//     " Days " +
//     hours +
//     " Hours " +
//     minutes +
//     " Minute " +
//     seconds +
//     " Seconds ";
//   output3.innerHTML = waktu;

//   // console.log(waktu);
//   if (distance < 0) {
//     clearInterval(x3);
//     output3.innerHTML = " Waktu Telah Berlalu ";
//   }
// }, 1000);

// let x4 = setInterval(function () {
//   let t = time_input4.innerText;
//   countDownDate = new Date(t).getTime();
//   //   time_input.value = "";
//   // get current date
//   let now = new Date().getTime();
//   // Calculation duration
//   let distance = countDownDate - now;
//   // date converter
//   let second = 1000;
//   let minute = 1000 * 60;
//   let hour = 1000 * 60 * 60;
//   let day = 1000 * 60 * 60 * 24;

//   // Convert ms to variable
//   let days = Math.floor(distance / day);
//   let hours = Math.floor((distance % day) / hour);
//   let minutes = Math.floor((distance % hour) / minute);
//   let seconds = Math.floor((distance % minute) / second);

//   //  text to print
//   let waktu =
//     days +
//     " Days " +
//     hours +
//     " Hours " +
//     minutes +
//     " Minute " +
//     seconds +
//     " Seconds ";
//   output4.innerHTML = waktu;

//   // console.log(waktu);
//   if (distance < 0) {
//     clearInterval(x4);
//     output4.innerHTML = " Waktu Telah Berlalu ";
//   }
// }, 1000);

// let x5 = setInterval(function () {
//   let t = time_input5.innerText;
//   countDownDate = new Date(t).getTime();
//   //   time_input.value = "";
//   // get current date
//   let now = new Date().getTime();
//   // Calculation duration
//   let distance = countDownDate - now;
//   // date converter
//   let second = 1000;
//   let minute = 1000 * 60;
//   let hour = 1000 * 60 * 60;
//   let day = 1000 * 60 * 60 * 24;

//   // Convert ms to variable
//   let days = Math.floor(distance / day);
//   let hours = Math.floor((distance % day) / hour);
//   let minutes = Math.floor((distance % hour) / minute);
//   let seconds = Math.floor((distance % minute) / second);

//   //  text to print
//   let waktu =
//     days +
//     " Days " +
//     hours +
//     " Hours " +
//     minutes +
//     "  Minute " +
//     seconds +
//     " Seconds ";
//   output5.innerHTML = waktu;

//   // console.log(waktu);
//   if (distance < 0) {
//     clearInterval(x5);
//     output5.innerHTML = " Waktu Telah Berlalu ";
//   }
// }, 1000);
