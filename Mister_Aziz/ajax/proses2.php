<?php
// if($_POST['judul'] == 'jojo'){
//   $st = 1 ;
// }else{
//   $st = 0 ;
// }
$output = array(
    'status' => 1,
    'pesan' => $_POST['judul']
);
$output = json_encode($output);
echo $output;
