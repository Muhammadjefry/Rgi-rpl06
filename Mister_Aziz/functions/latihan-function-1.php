<?php 
// Nilai Rupiah dijadikan dolar

function jadiindolar($rupiah){
    $dolar = 15169; 
    $hasil =$rupiah/$dolar;
    return $hasil;
}

echo jadiindolar(30000); 

?>