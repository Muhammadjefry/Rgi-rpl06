<?php 
//pembulatan Atas = Langit-langit
$aaa = 51.515151515;
echo ceil($aaa).' rupiah';
echo '<br><br>';


//Pembulatan Bawah= Lantai
echo floor($aaa).' rupiah';
echo '<br><br>';

//Memproses angka menjadi number format

$aaa = 2200000.245414;//angka untuk di proses
$bbb = 0;//jumlah digit desimal
$ccc = ',';//pemisah desimal
$ddd = '.';//pemisah ribuan
echo 'Rp '.number_format($aaa,$bbb,$ccc,$ddd);
echo '<br><br>';

?>