//Deklarsi date
// Angka date(tahun,bulan,hari,jam,menit,detik)
// string date ("tahun-bulan-tahun")
// string date (" bulan tanggal,tahun jam:menit:detik )
let output = document.getElementById("output");
let countDownDate = "";
let tombol = document.getElementById("tombol");
let time_input = document.getElementById("time_input");
let timerStatus = false;

tombol.addEventListener("click", function () {
  let t = time_input.value;
  countDownDate = new Date(t).getTime();
  timerStatus = true;
  time_input.value = "";
});
let x = setInterval(function () {
  if (timerStatus) {
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
      days + " Days " + hours + " Hours " + " Minute " + seconds + " Seconds ";
    output.innerHTML = waktu;
    // console.log(waktu);
    if (distance < 0) {
      clearInterval(x);
      output.innerHTML = "EXPIRED";
    }
  }
}, 1000);
