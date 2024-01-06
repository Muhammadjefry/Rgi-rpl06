// ------Program panggil waktu
function waktu() {
  //--------Buat vaiable jam
  let waktu = new Date();
  let jam = waktu.getHours();
  let menit = waktu.getMinutes();
  let detik = waktu.getSeconds();
  am_pm = "AM";
  if (jam >= 12) {
    if (jam == 12) {
      am_pm = "PM";
    } else if (jam > 12) {
      jam -= 12;
      am_pm = "PM";
    }
  } else {
    am_pm = "AM";
  }
  if (jam < 10) {
    jam = "0" + jam;
  }
  if (menit < 10) {
    menit = "0" + menit;
  }
  if (detik < 10) {
    detik = "0" + detik;
  }
  // -------buat text waktu
  let waktuSaatIni = jam + ":" + menit + ":" + detik + " " + am_pm;

  //-------Sisitem alarm--------------

  //----Tampilkan waktu ke html
  document.getElementById("clock").innerHTML = waktuSaatIni;
}
waktu();
setInterval(waktu, 1000);