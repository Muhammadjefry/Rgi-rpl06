<?php 

// deteksi semua user yang kodisi login
// secara masal masukan informasi logout untuk semua user tsb
require_once('../functions.php');
  // Buka koneksi
$conn = new mysqli(SERVERNAME, DB_USER, DB_PASS, DB_NAME);
// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// dapatkan daftar user yang sedang Login
$sql = "SELECT DISTINCT user FROM jamterbang
WHERE aksi=1 
ORDER BY waktu DESC
LIMIT 100";
$userMasihLogin = array();
$waktu = time();
$minggu = date('W', $waktu);


$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // $userMasihLogin[]=$row['user'];
        $uid = $row['user'];
        $userMasihLogin[]="($uid,0,$waktu,$minggu)";
    }
} 
if( count($userMasihLogin) > 0){
         // ada yang belom pulang
         $tumbal = implode(',',$userMasihLogin);
         $sql = "INSERT INTO jamterbang (user, aksi, waktu, minggu)
         VALUES $tumbal";

        if ($conn->query($sql) === TRUE) {
             echo "Semua Sudah Di Pulangkan" ;
        } else {
              echo "Error: " . $sql . "<br>" ; //$conn->error;
}
}else{
    // udah pulang semua, jangan lakukan apa apa
    echo "Tidak ada pegawai yang sedang login " ;
}
// tutup koneksi
$conn->close();
?>