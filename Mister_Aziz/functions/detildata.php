<?php

// $bbb = 'halo dunia';//string
// var_dump($bbb);
// echo '<br><br>';
// $aaa = 9.3;//float ada komanya
// var_dump($aaa);
// echo '<br><br>';
// $aaa = 9;//asli integer
// var_dump($aaa);
// echo '<br><br>'; 
//--------------- detil data ----------//
$aaa = array('apel','Banana','Cherry');
echo '<pre>';
var_dump($aaa);
echo '</pre>';
echo '<br><br>'; 
//---mendapatkan jumlah item dalam sebuah array---
$aaa = array('apel','Banana','Cherry');
echo count($aaa);
echo '<br><br>'; 
//------memecah string menjadi array sesuai dengan sparator (argumen 1)---
$aaa = 'Makanan, Panas, Pedas';
$bbb = explode( ', ', $aaa);
echo '<pre>';
var_dump($bbb);
echo '</p>';
echo '<br><br>';

//------Mendapatkan nomor acak dari batas tertulis------------//
$batas_bawah = 0;
$batas_atas = 999;
$angka_acak = rand($batas_bawah, $batas_atas);//sn gks ysng dismbil bisa juga angka utuh  (memiliki desimal)
echo floor($angka_acak);//kita gunakan fungsi floor()untuk membulatkan angka kita
//---menggabungkan array dengan pemisah tertentu-----//
echo '<br><br>';
$aaa = array('merah','jingga','kuning','hijau','biru','ungu');
$aaa_tapi_srting = join( ', ',$aaa);
echo 'Pelangi Memiliki 7 warna yaitu :'.$aaa_tapi_srting;
echo '<br><br>';

//Mengganti nama asli dengan merubah nama tertentu----------
$teks_untuk_dicari = 'Anjing';
$teks_pengganti = '* * *';
$kalimat_untuk_diproses = 'Dasar anjing kaparat,
sialan kau!';
echo str_ireplace($teks_untuk_dicari,$teks_pengganti,$kalimat_untuk_diproses);
//------kalau besar hurufnya kecil itu penting,gunakan str_replace() tanpa i
echo '<br><br>';

 ?>