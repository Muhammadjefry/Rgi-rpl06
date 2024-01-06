// Take Element from HTML
let time = document.getElementById("duration");
let start = document.getElementById("Start");
let finish = document.getElementById("Finish");
let globalTime = document.getElementById("clock").innerHTML;
let waktu2 = document.getElementById("waktu").innerHTML;
// Variable for time duration
let timer = false;
let minute = 0;
let second = 0;
let kurangi = "05:00";
let apa = globalTime - kurangi;
// Initial State
start.disabled = false;
finish.disabled = false;
// take time
function check() {
  if (globalTime <= waktu2) {
    start.disabled = true;
  }
  if (apa == waktu2) {
    start.disabled = false;
    start.style.backgroundColor = "green";
    console.log("change");
  }
}
setInterval(check, 1000);

// check();
// Press Start
start.addEventListener("click", function () {
  finish.style.display = "block";
  start.style.display = "none";
  timer = true;
  duration();
});

// press Stop
finish.addEventListener("click", function () {
  finish.disabled = true;
  start.disabled = false;
  timer = false;
  duration();
});

function duration() {
  if (timer) {
    second++;
    if (second == 60) {
      minute += 1;
      second = 0;
    }

    // prepare to print in html
    lblSecond = second.toString();
    lblMinute = minute.toString();

    //convert 1 digit to 2 digit
    if (second < 10) {
      lblSecond = "0" + lblSecond;
    }
    if (minute < 10) {
      lblMinute = "0" + lblMinute;
    }

    // print to html
    time.innerHTML = lblMinute + ":" + lblSecond;
    setTimeout(duration, 1000);
  }
}
