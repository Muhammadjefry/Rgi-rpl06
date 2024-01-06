<?php
/*
    '=='    = Memiliki nilai sama
    '==="   = Memiliki nilai DAN tipe-tipe sama
    '>'     = lebih besar
    '=>'    = Lebih besar atau sama dengan
    '<'     = Lebih kecil
    '<='    = Lebih kecil atau sama dengan
    '!='    = Bukan sama dengan
    */
// $nilai_ulangan = 65;

// if($nilai_ulangan > 65){
//     $status = 'Lulus';
// } else {
// $status = 'Remidi';

// }

// echo $status;
$nilai = 85;

if($nilai > 80){
    $hasil = 'Dapat bonus';
}else{
    $hasil = 'Kurang baik';
}
echo $hasil;
?>