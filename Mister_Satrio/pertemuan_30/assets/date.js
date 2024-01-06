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

function date() {
  let d = new Date();
  let hari = days[d.getDay()];
  let tgl = d.getDate();
  let bulan = months[d.getMonth()];
  let tahun = d.getFullYear();

  let tanggal = hari + " " + tgl + " " + bulan + " " + tahun;

  document.getElementById("date").innerHTML = tanggal;
}
date();
