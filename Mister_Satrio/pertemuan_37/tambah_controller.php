<?php 
// koneksi database
include ('koneksi.php');

// menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$alamat = $_POST['alamat'];

// menginput data ke database
mysqli_query($koneksi,"INSERT INTO mahasiswa VALUES (NULL,'$nama','$nim','$alamat')");

// mengalihkan halamn kembali ken index
header("location:index.php");

