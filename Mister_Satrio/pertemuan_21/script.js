// ------Program panggil waktu
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
}
waktu();
setInterval(waktu, 1000);
//------------setting DATE--
const bulan1 = [
  "january",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];

const hari1 = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
function tanggalComplit() {
  const d = new Date();
  let hari = hari1[d.getDay()];
  let bulan = bulan1[d.getMonth()];
  let tgl = d.getDate();
  let tahun = d.getFullYear();
  let tanggal = hari + ", " + tgl + " " + bulan + " " + tahun;
  document.getElementById("date").innerHTML = tanggal;
}
setInterval(tanggalComplit, 1000);

//------------SETTING FORM---
document.querySelector("#id01").addEventListener("submit", function (e) {
  e.preventDefault();
});

const database_user = [
  "alvin",
  "jefry",
  "sulaiman",
  "jalal",
  "lucky",
  "udin",
  "dimas",
];
const database_password = [
  "alvin123",
  "jefry123",
  "sulaiman123",
  "jalal123",
  "lucky123",
  "udin123",
  "dimas123",
];

function check_login() {
  //--scroll down....

  //------Call form----
  let form = document.getElementById("id01");
  let user = form[0].value;
  let pass = form[1].value;

  // -----Tagging----
  let statusUsername = false;
  let statusPassword = false;
  let indexPassword = 0;

  //-----Print to html--------
  let output = document.getElementById("output");
  let nama = document.getElementById("nama");
  let word = document.getElementById("pass");

  //-----Username cannot filled empety----
  if (user.length == 0) {
    word.innerHTML = "Username harus diisi";
  }
  //-----Username cannot filled empety------
  else if (pass.length == 0) {
    word.innerHTML = "Password Harus diisi";
  }
  //----Validate Username and password----
  if (user.length > 0 && pass.length > 0) {
    //---Check Username------
    for (idx in database_user) {
      if (user == database_user[idx]) {
        indexPassword = idx;
        statusUsername = true;
      }
    }
    //---Check Password------
    if (pass == database_password[indexPassword]) {
      statusPassword = true;
    }
    //---Enter Sistem
    //---Check Username
    if (statusUsername) {
      //--Check Password status
      if (statusPassword) {
        output.innerHTML = user;
        window.scrollTo(0, 1000);
      } else {
        word.innerHTML = "Wrong Password";
      }
    } else {
      word.innerHTML = "Username Not Found";
    }
  }
}
//------------masuk---
function masuk() {
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

  let masuk = document.getElementById("masuk");
  masuk.innerHTML = waktuSaatIni;
}
//--------keluar
function keluar() {
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

  let keluar = document.getElementById("keluar");
  keluar.innerHTML = waktuSaatIni;
}
