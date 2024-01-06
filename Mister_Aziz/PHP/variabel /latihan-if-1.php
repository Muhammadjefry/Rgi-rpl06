<?php



// $harga_minuman = 9000;

// if($harga_minuman > 10000){
//     $status = 'belum';
// }elseif($harga_minuman > 13000){
//     $status = 'kawin';
// }elseif($harga_minuman > 15000){
//     $status = 'durung';
// }elseif($harga_minuman){
//     $status = 'jomblo';
// }
// echo $status;


//status 
$status = 'kawin';

if($status == 'kawin' ){
    $harga_minuman = 'Gratis';
}

elseif($status == 'belum kawin'){
    $harga_minuman = 10000;
}

elseif($status == 'jomblo'){
    $harga_minuman = 8500 ;
}

echo $harga_minuman;



?>