<?php

include_once( 'functions.php' );

// Buka koneksi
$conn = new mysqli(SERVERNAME, DB_USER, DB_PASS, DB_NAME);
// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$pesan = $_POST['pesan'];
$uid = userid();

$sql = "INSERT INTO chat1 (user, pesan)
VALUES ($uid,'$pesan')";

if ($conn->query($sql) === TRUE) {
    echo "Pesan berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// tutup koneksi
$conn->close();