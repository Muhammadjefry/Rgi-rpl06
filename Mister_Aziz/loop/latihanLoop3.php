<?php
$siswa = array(
    array(
        'Anita',
        'XI-IPS',
        74
    ),
    array(
        'Budi',
        'XI-IPA',
        71
    ),
    array(
        'Cahyo',
        'XI-IPA',
        63
    ),
    array(
        'jefry',
        'XI-IPA',
        100
    ),
);

//perlakukan setiap  item dalm array $siswa  sebagai $x
//garis lurus || untuk atau
// Dan garis && untuk DAN {harus terpenuhi}
foreach($siswa as $x ){
    if( $x[1] == 'XI-IPS' || $x[2] > 70)
    {
    echo "<p>$x[0] dari kelas $x[1] mendapat nilai $x[2] dari ujian kemarin.</p>";
    }
} 






















