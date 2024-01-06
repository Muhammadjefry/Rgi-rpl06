<?php 
/*
 * decide based upon current EST if the store is open
 *
 * @return bool
 */
require_once('../functions.php');

$statusKantor = storeIsOpen();
$userID = (isset($_COOKIE['data_nis'])) ? $_COOKIE['data_nis'] : 0;
 if( $statusKantor ==true && $userID > 0){
  // Buka koneksi
$conn = new mysqli(SERVERNAME, DB_USER, DB_PASS, DB_NAME);
// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// dapatkan aktivitas terakhir user
$sql = "SELECT * FROM jamterbang
WHERE user=$userID 
ORDER BY waktu DESC
LIMIT 1";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       $lastAct = $row['aksi'];
       $lastWak = $row['waktu'];
    }
} else {
    $lastAct = 0;
}

$aksi = ($lastAct == 0) ? 1 : 0;
$waktu = time();
$minggu = date('W', $waktu);

$sql = "INSERT INTO jamterbang (user, aksi, waktu, minggu)
VALUES ($userID, $aksi, $waktu , $minggu)";

if ($conn->query($sql) === TRUE) {
    if($aksi == 1){
        echo "Login Suksses";
    }else{
        $perbedaan = $waktu - $lastWak;
        echo 'Logout Suksses ('.secondsTo($perbedaan) .')';
    }
} else {
    echo "Error: " . $sql . "<br>" ; //$conn->error;
}

// tutup koneksi
$conn->close();


    }else{
        echo 'Entah kenapa..?';
    }


// ---------------
// kedua kode dibawah ini memberikan hasil yang sama 
// kode diatas terlihat lebih banyak/panjang tapi bisa memproses syarat beruntun
// kode di bawah terlihat lebih pendek, tapi hanya bisa menerima 1 syarat 

//-----isset(); // sudah dideklarasikan atau tidak
//------empty();// memiliki isi atau tidak. '',0, false <-- nilai 2 tersebut dianggap empthy atau kosong

// $x = 1;
// if( isset($x) && $x == 1){
//     $userID = 123;
// }else{
//     $userID = 0;
// }
// echo $userID;

//Shortened
// $userID = ($x == 1) ? 123:0;
?>