<?php
if( $_SERVER['REQUEST_METHOD']=='GET'&&realpath(__FILE__)==realpath($_SERVER['SCRIPT_FILENAME'])){header('HTTP/1.0 403 Forbidden',TRUE,403 );die("<h2>Access Denied!</h2>");}
require_once('functions.php');

// Buka koneksi
$conn = new mysqli(SERVERNAME, DB_USER, DB_PASS, DB_NAME);
// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['siswa_mail'];
$password = md5($_POST['siswa_pass']);

$sql = "SELECT * FROM siswa_3 WHERE status=1 AND email='$username' LIMIT 1";
$result = $conn->query($sql); // jalankan SQL
if ($result->num_rows > 0) { // jika ada lebih dari 0 data
    while($row = $result->fetch_assoc()) { // loop data-data tersebut
        // user ditemukan, mulai cocokkan password
        if( $row['password'] == $password ) {
            // data cocok, izinkan login dengan menyimpan user id ke dalam $_COOKIE['data_nis'] dengan durasi 1 jam
            setcookie(
                'data_nis',
                $row['id'],
                time() + (86400*365*99), // 99 tahun
                '/'
            );
            echo "Login berhasil.";
        } else {
            // data tidak cocok, blokir akses login
            echo "Email dan password tidak cocok.";
        }
    }
} else { // jika data kurang dari 1
    echo "User tidak ditemukan.";
}

// tutup koneksi
$conn->close();