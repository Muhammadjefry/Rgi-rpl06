<?php 
require_once('data_siswa.php');

$mail = $_POST['email'];
$pass = $_POST['password'];

// Langkah 1 = Periksa apakah user/email terdaftar

$ada_user = 0;
$kindex = 0;
  foreach( $data_siswa as $x ){
     if( $x['Email'] == $mail ){
     $ada_user = 1;
     $user_index = $kindex;
     }
     $kindex++;
}
echo '<pre>';
var_dump($ada_user);
echo '</pre>';
// Langkah 2 = Cocokan email dan password terkait
if( $ada_user == 1 ){
    //ada user dengan email
    if($data_siswa[$user_index]['Password'] == $pass){
    //kombinasi sukses 
     $pesan = 'Anda berhail Login';
     setcookie(
        'teslogin',//nama cookie
        'oke',//nilai coookie
        time()+3600//Simpan cookie
     );
     }else {
        //kombinasi gagal 
     $pesan = 'Password tidak sesuai';
     }
}else{
    //email tidak ditemukan
    $pesan = 'Email tidak terdaftar';
}

echo '<pre>';
var_dump($pesan);
echo '</pre>';
?>