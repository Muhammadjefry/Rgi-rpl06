<?php 

function cekBIsaDibagi($i,$d){
    if($i & $d ==0){
        $output = true;
    }else{
        $output = false;
    }
    return $output;
}

/////////////////
$angka = 123465;
$kelipatan= 11;
if(cekBIsaDibagi($angka,$kelipatan)){
    echo $angka .' Merupakan bilangan kelipatan '. $kelipatan;
}else{
    echo $angka .' BUKAN Merupakan bilangan kelipatan '. $kelipatan;
}
?>