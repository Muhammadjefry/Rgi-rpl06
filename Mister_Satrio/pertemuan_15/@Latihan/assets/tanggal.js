const date = document.getElementById("date");
const days = [
  "Sunday",
  "Monday",
  "Tuesday",
  "Wednesday",
  "Thursday",
  "Friday",
  "Saturday",
];

const months = [
  "January",
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

function tanggal() {
  let d = new Date();
  let hari = days[d.getDay()];
  let tgl = d.getDate();
  let bulan = months[d.getMonth()];
  let tahun = d.getFullYear();

  tanggall = hari + ", " + tgl + " " + bulan + " " + tahun;

  date.innerHTML = tanggall;
  // console.log(tahun);
}
tanggal();
setInterval(tanggal, 1000);
