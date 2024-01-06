<?php
//Mencari volume kubus

function pangkatdua($aaa){
    $ooo = $aaa ** 2;
    return $ooo;
}
function volumekubus($panjang,$lebar,$tinggi)
{
    $volume = $panjang * $lebar * $tinggi;
    return $volume;
}
echo volumekubus(5,8,11);
?> 