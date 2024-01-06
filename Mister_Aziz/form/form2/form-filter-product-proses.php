<?php 
require_once('data-product.php');//panggil file

// echo $_GET['harga_min'];
// echo '<br>';
// echo $_GET['harga_max'];
// echo '<br>';
//----------gunakan if untuk pengecualian >= <= dan masukan form yang telah ditentukan di awal 
foreach($data as $x){
    if($x[2] >= $_GET['harga_min'] && $x[2] <= $_GET['harga_max']){
        echo  "<p>$x[0] ($x[2]) </p>";
}
}


?>