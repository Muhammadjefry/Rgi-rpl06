<?php 

//Menjumlah suatu barang dan rating masing masing barang----

require_once('data-product2.php');//panggil file
$total_nilai_inventori =0;
foreach($data as $x){
    $subtotal = $x["harga"] * $x["rating"];
    $total_nilai_inventori +=  $subtotal; 
}
echo  ($total_nilai_inventori);
//$xxx = $xxx + 11; // 34

?>