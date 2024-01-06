<?php
if( $_SERVER['REQUEST_METHOD']=='GET'&&realpath(__FILE__)==realpath($_SERVER['SCRIPT_FILENAME'])){header('HTTP/1.0 403 Forbidden',TRUE,403 );die("<h2>Access Denied!</h2>");}

require_once('functions.php');

// Buka koneksi
$conn = new mysqli(SERVERNAME, DB_USER, DB_PASS, DB_NAME);
// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data_a = $_POST['siswa_nama'];
$data_b = $_POST['siswa_bday'];
$data_c = $_POST['siswa_gend'];
$data_d = $_POST['siswa_clas'];
$data_e = $_POST['siswa_year'];
$data_f = 1;
$data_g = $_POST['siswa_mail'];
$data_h = md5($_POST['siswa_pass']); // 5f4dcc3b5aa765d61d8327deb882cf99
$gambar = $_POST['pick'];


$sql = "INSERT INTO siswa_3 (nama, tanggal_lahir, jenis_kelamin, kelas, angkatan, status, email, password,pick)
VALUES ('$data_a','$data_b',$data_c,$data_d,$data_e,$data_f,'$data_g','$data_h','$gambar')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// tutup koneksi
$conn->close();