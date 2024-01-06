<?php 

//Harga mendapatkan persen 

require_once('data-product.php');//panggil file

foreach($data as $x){
    $angkapersen = $x[7];
    $hargaasli = $x[2];
     $desimal = $angkapersen / 100 ;
     $hargaptongan = $hargaasli * $desimal;
     $hargasetelahdiskon = $hargaasli - $hargaptongan;
    
    echo '<p> '.$x[0] .' harga produk setelah diskon ' .('Rp: '.$hargasetelahdiskon) .'</p>';
}



?>