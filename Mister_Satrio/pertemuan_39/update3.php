<?php 
// koneksi database
include 'koneksi2.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$address = $_POST['address'];

// update data ke database
mysqli_query($koneksi,"UPDATE Siswa SET first_name='$first_name', last_name='$last_name', age='$age', gender='$gender', address='$address' WHERE id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:halaman_pengurus.php");

?>