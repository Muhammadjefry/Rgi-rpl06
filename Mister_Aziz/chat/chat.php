<?php

include_once( 'functions.php' );

// Buka koneksi
$conn = new mysqli(SERVERNAME, DB_USER, DB_PASS, DB_NAME);
// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM chat1 ORDER BY id DESC LIMIT 5"; // pilih semua data dari tabel siswa_2

$result = $conn->query($sql); // jalankan SQL
if ($result->num_rows > 0) { // jika ada lebih dari 0 data
    echo '<ul>';
    while($row = $result->fetch_assoc()) { // loop data-data tersebut
        $uid  = $row['user'];
        $nama  = translateNama($uid);
        $pesan = $row['pesan'];

        echo "<li class=u$uid><b>$nama</b> says:<br/>$pesan</li>";
    }
    echo '</ul>';
}

// tutup koneksi
$conn->close();