let enterHour;
let enterMinute;
let enterSecond;
let leaveHour;
let leaveMinute;
let leaveSecond;
let durationHour;
let durationMinute;
let durationSecond;

let Masuk_jam = "08";
let Masuk_menit = "00";
let Masuk_detik = "00";

let Keluar_jam = "15";
let Keluar_menit = "00";
let Keluar_detik = "00";

// let datangAwalJ;
// let datangAwalM;
// let datangAwalD;

// let pulangDahulu = " Datang dahulu ";
// let pulangTepat = " Datang tepat ";
// let pulangTerlambat = " Datang terlambat";

// let datangterlambat;

function captureEnter() {
  //-----Create TIme
  let t = new Date();

  //-------parse Time
  enterHour = t.getHours();
  enterMinute = t.getMinutes();
  enterSecond = t.getSeconds();

  //------COnvert 2 digit time

  if (enterHour < 10) {
    enterHour = "0" + enterHour;
  }
  if (enterMinute < 10) {
    enterMinute = "0" + enterMinute;
  }
  if (enterSecond < 10) {
    enterSecond = "0" + enterSecond;
  }

  //   DatangJ = Masuk_jam == enterHour;
  //   DatangM = Masuk_menit == enterMinute;
  //   DatangD = Masuk_detik == enterSecond;

  //   dtng = DatangJ + DatangM + DatangD;

  durasimasukJ = enterHour - Masuk_jam;
  durasimasukM = enterMinute - Masuk_menit;
  durasimasukD = enterSecond - Masuk_detik;

  //------Create output
  let enterTime =
    "Masuk : " +
    enterHour +
    " : " +
    enterMinute +
    " : " +
    enterSecond +
    ",<br>" +
    " Lewat, " +
    durasimasukJ +
    " Jam " +
    durasimasukM +
    " Menit, " +
    durasimasukD +
    " Detik ";

  //Keterangan
  if (
    enterHour == Masuk_jam &&
    enterMinute == Masuk_menit &&
    enterSecond == Masuk_detik
  ) {
    document.getElementById("ket1").innerHTML =
      "KETERANGAN : DATANG TEPAT WAKTU";
  } else if (
    enterHour < Masuk_jam &&
    enterMinute < Masuk_menit &&
    enterSecond < Masuk_detik
  ) {
    document.getElementById("ket1").innerHTML =
      "KETERANGAN : DATANG LEBIH AWAL";
  } else if (
    enterHour > Masuk_jam &&
    enterMinute > Masuk_menit &&
    enterSecond > Masuk_detik
  ) {
    document.getElementById("ket1").innerHTML = "KETERANGAN : DATANG TERLAMBAT";
  }

  //Enter to html
  document.getElementById("enter-info").innerHTML = enterTime;
  return enterTime;
}

function captureLeave() {
  //-----Create TIme
  let t = new Date();

  //-------parse Time
  leaveHour = t.getHours();
  leaveMinute = t.getMinutes();
  leaveSecond = t.getSeconds();

  //------COnvert 2 digit time

  if (leaveHour < 10) {
    leaveHour = "0" + leaveHour;
  }
  if (leaveMinute < 10) {
    leaveMinute = "0" + leaveMinute;
  }
  if (leaveSecond < 10) {
    leaveSecond = "0" + leaveSecond;
  }
  //Hitung lewat
  durasimasukJ = leaveHour - Keluar_jam;
  durasimasukM = leaveMinute - Keluar_menit;
  durasimasukD = leaveSecond - Keluar_detik;

  // keterangan

  //------Create output
  let leaveTime =
    "Keluar : " +
    leaveHour +
    " : " +
    leaveMinute +
    " : " +
    leaveSecond +
    ",<br>" +
    " Lewat, " +
    durasimasukJ +
    " Jam " +
    durasimasukM +
    " Menit, " +
    durasimasukD +
    " Detik ";

  //Keterangan
  if (
    enterHour == Keluar_jam &&
    enterMinute == Keluar_menit &&
    enterSecond == Keluar_detik
  ) {
    document.getElementById("ket2").innerHTML =
      "KETERANGAN : PULANG TEPAT WAKTU";
  } else if (
    enterHour < Keluar_jam &&
    enterMinute < Keluar_menit &&
    enterSecond < Keluar_detik
  ) {
    document.getElementById("ket2").innerHTML =
      "KETERANGAN : PULANG LEBIH AWAL";
  } else if (
    enterHour > Keluar_jam &&
    enterMinute > Keluar_menit &&
    enterSecond > Keluar_detik
  ) {
    document.getElementById("ket2").innerHTML = "KETERANGAN : PULANG TERLAMBAT";
  }

  //Enter to html
  document.getElementById("leave-info").innerHTML = leaveTime;

  //----Calculate duration
  if (leaveSecond < enterSecond) {
    leaveSecond += 60;
    leaveMinute -= 1;
  }
  durationSecond = leaveSecond - enterSecond;
  if (leaveMinute < enterMinute) {
    leaveMinute += 60;
    leaveHour -= 1;
  }
  durationMinute = leaveMinute - enterMinute;
  durationHour = leaveHour - enterHour;

  //Duration text
  let durationText =
    durationHour +
    " Hours, " +
    durationMinute +
    " Minute, " +
    durationSecond +
    " Second, ";

  // print to html
  document.getElementById("duration-info").innerHTML = durationText;
}
