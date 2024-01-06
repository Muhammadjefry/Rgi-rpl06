<?php 
$data_mentah = file_get_contents('products-2.json');
$data_proses_1 = json_decode($data_mentah);

foreach($data_proses_1 as $x){
    $nama = $x->title;
    $harga = $x->price;
    echo "<p> Harga  $nama Ditoko RGI Rp : $harga</p>"; 
}


// echo '<pre>';
// var_dump($data_proses_1[0]->rating->rate);
// echo '</pre>';



?>