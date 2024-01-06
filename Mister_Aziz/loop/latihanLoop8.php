<?php 
//Menentukan jumlah gaji yang akan di berikan kepada karyawan selama 3 bulan

require_once('data-product3.php');//panggil file
$total_gaji = 0;
foreach($data as $x){
    $subtotal = $x['gaji'] * 3 ;
    $total_gaji +=  $subtotal;
}
echo "  Rp : ". Number_Format($total_gaji,0,'',',');
?>