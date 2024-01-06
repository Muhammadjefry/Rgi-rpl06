<?php
if( $_SERVER['REQUEST_METHOD']=='GET'&&realpath(__FILE__)==realpath($_SERVER['SCRIPT_FILENAME'])){header('HTTP/1.0 403 Forbidden',TRUE,403 );die("<h2>Access Denied!</h2>");}
require_once('functions.php');

// Buka koneksi
$conn = new mysqli(SERVERNAME, DB_USER, DB_PASS, DB_NAME);
// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM siswa_3 WHERE status=1 ORDER BY id DESC LIMIT 5"; // pilih semua data dari tabel siswa_2
$result = $conn->query($sql); // jalankan SQL
if ($result->num_rows > 0) { // jika ada lebih dari 0 data
    while($row = $result->fetch_assoc()) { // loop data-data tersebut
        $nis  = $row['id'];
        $nama = $row['nama'];
        $tgl  = date('j F Y',strtotime($row['tanggal_lahir']));
        $usia = itungUsia($row['tanggal_lahir']);
        $gend = translateGend($row['jenis_kelamin']);
        $clas = translateClass($row['kelas']) . '-' . $row['angkatan'];

        echo '<tr>
            <td>'.$nis.'</td>
            <td>'.$nama.'</td>
            <td title="'.$tgl.'">'.$usia.'</td>
            <td>'.$gend.'</td>
            <td>'.$clas.'</td>
        </tr>';
    }
} else { // jika data kurang dari 1
    echo "<tr><td colspan=5>No Data</td></tr>";
}

// tutup koneksi
$conn->close();