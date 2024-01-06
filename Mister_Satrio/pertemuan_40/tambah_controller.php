<?php 
// koneksi database
include ('koneksi.php');

// menangkap data yang dikirim dari form
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


$username=$first_name;
$password=$first_name.$last_name;
$level="siswa";


// menginput data ke database
mysqli_query($koneksi,"INSERT INTO Siswa VALUES (NULL,'$first_name','$last_name','$age','$gender','$address','$assesment_ipa','$assesment_mtk','$assesment_B_indo','$assesment_B_inggris')");
mysqli_query($koneksi,"INSERT INTO multi_user VALUES (NULL,'$username','$password','$level')");



// mengalihkan halamn kembali ken index
header("location:tabel_siswa.php");

