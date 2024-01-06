<?php 

// date
// untuk menampilkan tanggal dengan format
//  l = hari
//  d = tanggal ()
// M = bulan
// Y = tahun
echo date("l, d-M-Y");

echo "<br>";
echo "<br>";

// Time 
// UNIX Timestamp / EPOCH time
// detik yang sudah dicari berlalu sejak 1970
echo date("d M Y", time()+60*60*24);
echo "<br>";
echo "<br>";
//mkTime
// membuat sendiri detik 
// mktime(0,0,0,0,0,0)
// jam, menit, detik, bulan, tanggal, tahun
echo date("l", mktime(0,0,0,9,23,2023));

// strtotime
echo "<br>";
echo "<br>";
echo date("l", strtotime("25 February 2024"));

?>