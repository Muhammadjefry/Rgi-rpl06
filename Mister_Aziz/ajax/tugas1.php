<?php
if ($_POST['angka'] == 0) {
    $out = array(
        'status' => 1,
        'message' => 'Angka yang anda masukan nol.'
    );
    echo json_encode($out);
} else if($_POST['angka'] > 0) {
    if($_POST['angka'] % 2 == 0) {
    $out = array(
        'status' => 2,
          'message' => ' Angka yang anda masukan Genap Positive'
         );
         echo json_encode($out);
    }else {
    $out = array(
         'status' => 3,
        'message' => ' Angka yang anda masukan Ganjil Positive'
          );
          echo json_encode($out);
    }

}else {
       if($_POST['angka'] % 2 == 0){
         $out = array(
                'status' => 4,
                'message' => ' Angka yang anda masukan Genap Negative'
                 );
                 echo json_encode($out);
          }else{
            $out = array(
                 'status' => 5,
                'message' => ' Angka yang anda masukan Ganjil Negative'
                         );
                     echo json_encode($out);
                }
        }
?>