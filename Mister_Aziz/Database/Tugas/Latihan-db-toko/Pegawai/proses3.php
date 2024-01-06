

<?php

//------Mengganti data sesuai id yang ada di Database----
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Latihan-db-toko";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error){
die("Connection failed: " . $conn->connect_error);
}
    $opa = $_POST['nama_lengkap'];
    $opi = $_POST['nama_panggilan'];
    $opu = $_POST['tanggal_lahir'];
    $ope = $_POST['jenis_kelamin'];
    $opo =$_POST['posisi'];
    $api = $_POST['tanggal_bergabung'];
    $apu = $_POST['id'];
    
$sql = "UPDATE Pegawai SET
      nama_lengkap='$opa',
      nama_panggilan='$opi',
      tanggal_lahir='$opu',
      jenis_kelamin=$ope,
      posisi=$opo,
      tanggal_bergabung='$api'
WHERE id= $apu";

if ($conn->query($sql) === TRUE) {
echo "Record updated successfully";
} else {
echo "Error updating record: " . $conn->error;
}

$conn->close();
?> 