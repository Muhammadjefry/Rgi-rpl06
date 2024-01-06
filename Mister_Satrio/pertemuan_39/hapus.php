<?php 

// koneksi database
include 'koneksi2.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];

// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM Siswa WHERE id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:index.php");

?>