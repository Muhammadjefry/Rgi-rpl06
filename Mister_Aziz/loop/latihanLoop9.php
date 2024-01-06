<?php 
  
//----menjumlah harga semua barang dan stoknya 

require_once('data-product.php');//panggil file
$total_nilai_inventori =0;
foreach($data as $x){
    //--menentukan harga dan stok
    $subtotal = $x[2] * $x[4];
    $total_nilai_inventori +=  $subtotal; 
}
echo  ($total_nilai_inventori);
//$xxx = $xxx + 11; // 34