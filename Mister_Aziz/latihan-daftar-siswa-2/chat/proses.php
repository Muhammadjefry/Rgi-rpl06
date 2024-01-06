<?php
if( $_SERVER['REQUEST_METHOD']=='GET'&&realpath(__FILE__)==realpath($_SERVER['SCRIPT_FILENAME'])){header('HTTP/1.0 403 Forbidden',TRUE,403 );die("<h2>Access Denied!</h2>");}
include_once( '../functions.php' );

// Buka koneksi
$conn = new mysqli(SERVERNAME, DB_USER, DB_PASS, DB_NAME);
// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$pesan = strip_tags($_POST['pesan']);////Keamanan agar dijadikan text html
$uid = userid();
$ip = $_SERVER["REMOTE_ADDR"];
// $gambar = ['pick'];
$sql = "INSERT INTO chat1 (user, pesan,ip)
VALUES ($uid,'$pesan','$ip')";

if ($conn->query($sql) === TRUE) {
    echo "Pesan berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// tutup koneksi
$conn->close();