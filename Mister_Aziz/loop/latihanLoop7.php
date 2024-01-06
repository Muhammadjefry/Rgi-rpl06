<?php 

//Menjumlahkan 2 id yang memesan 

require_once('data-product2.php');//panggil file
foreach($data as $x){
    if($x['id'] == 14){
        $harga = $x["harga"] ;
        $sisa_stok = 2;
        $subtotal = $harga * $sisa_stok;

        $total_nilai_keranjang = $subtotal;
    } 
    elseif($x['id'] == 81){
        $harga = $x["harga"] ;
        $sisa_stok = 1;
        $subtotal = $harga * $sisa_stok;

        $total_nilai_keranjang += $subtotal;
    }
}
echo  $total_nilai_keranjang;
?>