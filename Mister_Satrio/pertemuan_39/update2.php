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
$assesment_ipa = $_POST['assesment_ipa'];
$assesment_mtk = $_POST['assesment_mtk'];
$assesment_B_indo = $_POST['assesment_B_indo'];
$assesment_B_inggris = $_POST['assesment_B_inggris'];

// update data ke database
mysqli_query($koneksi,"UPDATE Siswa SET first_name='$first_name', last_name='$last_name', age='$age', gender='$gender', address='$address', assesment_ipa='$assesment_ipa', assesment_mtk='$assesment_mtk', assesment_B_indo='$assesment_B_indo',
assesment_B_inggris='$assesment_B_inggris' WHERE id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:halaman_pegawai.php");

?>