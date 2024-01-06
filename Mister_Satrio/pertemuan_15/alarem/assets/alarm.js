// Take Element from HTML
// let audio = document.getElementById("myaudio");
let globalTime = document.getElementById("clock").innerHTML;
let globalTime2 = document.getElementById("clock");
let waktu2 = document.getElementById("alarm").innerHTML;

// take time
function check() {
  if (globalTime == waktu2) {
    globalTime2.style.backgroundColor = "red";
    var notifikasi = new Audio("iphone_ringtone_trap_remixbigconverter.mp3");
    notifikasi.play();
    console.log("change");
  }

  if (globalTime > waktu2) {
    var notifikasi = new Audio("iphone_ringtone_trap_remixbigconverter.mp3");
    notifikasi.pause();
    globalTime2.style.backgroundColor = globalTime;
    console.log("rubah");
  }
}
check();
// setInterval(check, 1000);
