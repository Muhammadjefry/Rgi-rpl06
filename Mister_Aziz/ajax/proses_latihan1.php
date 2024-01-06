<?php
if ($_POST['harga'] == 1000) {
    $out = array(
        'status' => 1,
        'message' => 'Harga yang anda masukan benar.'
    );
    echo json_encode($out);
} else if($_POST['harga'] <= 1000) {
    $out = array(
        'status' => 0,
        'message' => ' Harga yang anda masukan Terlalu rendah....!!!'
    );
    echo json_encode($out);
}else{
    $out = array(
        'status' => 0,
        'message' => ' Harga yang anda masukan Terlalu tinggi....!!!'
    );
    echo json_encode($out);
}

?>