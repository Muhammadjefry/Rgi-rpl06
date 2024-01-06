var countDate = new Date("jan 01 2024 00:00:00").getTime();

function newyear() {
  var now = new Date().getTime();
  gap = countDate - now;

  var detik = 1000;
  var menit = detik * 60;
  var jam = menit * 60;
  var hari = jam * 24;

  var h = Math.floor(gap / hari);
  var j = Math.floor((gap % hari) / jam);
  var m = Math.floor((gap % jam) / menit);
  var d = Math.floor((gap % menit) / detik);

  document.getElementById("hari").innerHTML = h;
  document.getElementById("jam").innerHTML = j;
  document.getElementById("menit").innerHTML = m;
  document.getElementById("detik").innerHTML = d;
}
setInterval(function () {
  newyear();
}, 1000);
