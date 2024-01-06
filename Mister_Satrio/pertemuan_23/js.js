function waktu() {
  //--------Buat vaiable jam
  let waktu = new Date();
  let jam = waktu.getHours();
  let menit = waktu.getMinutes();
  let detik = waktu.getSeconds();

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
  let waktuSaatIni = jam + ":" + menit + ":" + detik + " " + "WIB";

  //----Tampilkan waktu ke html
  document.getElementById("clock").innerHTML = waktuSaatIni;
  return waktuSaatIni;
}
waktu();
setInterval(waktu, 1000);
