<?php 
// Array
//Sebuah variabel yang dapat memiliki danyak niali
// element pada array boleh memilliki tipe data yang berbeda
// pasangan antara key dan value
// keynya adalh index, yang dimulai dari nol

//membuat array
// car nama
$hari = array(
    "Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu","Minggu",
);
// cara baru
$bulan = ["january","February","Maret"];
$arr = [123,"tulisan",false];

// Menampilkan Array
// var_dump() / print_r()
var_dump($hari);
echo '<br>';
echo '<br>';
echo '<br>';

print_r($bulan);
echo '<br>';
echo '<br>';
echo '<br>';

// Menampilkan 1 element pada array
echo $arr[0];

// menambahkan element baru pada array
$hari[] = "Libur";
echo '<br>';
var_dump($hari);
?>