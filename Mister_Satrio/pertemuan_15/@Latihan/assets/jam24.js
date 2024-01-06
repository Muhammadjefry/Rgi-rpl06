const jam = document.getElementById("time");

function waktu() {
  let d = new Date();
  let hour = d.getHours();
  let minute = d.getMinutes();
  let second = d.getSeconds();

  if (hour < 10) {
    hour = "0" + hour;
  }
  if (minute < 10) {
    minute = "0" + minute;
  }
  if (second < 10) {
    second = "0" + second;
  }

  WaktuSaatIni = hour + ":" + minute + ":" + second + " WIB";

  jam.innerHTML = WaktuSaatIni;
}
waktu();
setInterval(waktu, 1000);
