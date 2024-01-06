<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form
// $nama = $_POST['nama'];
// $nim = $_POST['nim'];
// $alamat = $_POST['alamat'];

// menginput data ke database
mysqli_query($koneksi,"INSERT INTO mahasiswa
VALUES (NULL,'Afifan',123456390,'Jl Soedirman'),
(NULL,'Agung',863321590,'Jl Soekarno')
");

// mengalihkan halamn kembali ken index
// header("location:index.php");

?>