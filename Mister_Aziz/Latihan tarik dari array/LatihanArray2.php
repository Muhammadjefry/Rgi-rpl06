<?php 
require_once('data-product3.php');//panggil file
// echo '<pre>';
// echo var_dump($data);
// echo '</pre>'
$orang=0;
foreach($data as $x){
    if($x['gaji'] > 300 && $x['gaji'] < 400 ){
        $gaji = $x['gaji'];
    }
}

echo $x['gaji'];
?>