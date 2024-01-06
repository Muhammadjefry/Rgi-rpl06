<?php 
// Menghubungkan antara php dan mysql
$koneksi = mysqli_connect("localhost","root","","Pendaftaran");

// Apabila hubungan gagal makan print sebagai berikut
if(mysqli_connect_errno()){
    echo "Koneksi Gagal :" +mysqli_connect_errno();
}
?>