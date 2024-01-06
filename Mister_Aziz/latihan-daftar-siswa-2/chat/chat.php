<?php
if( $_SERVER['REQUEST_METHOD']=='GET'&&realpath(__FILE__)==realpath($_SERVER['SCRIPT_FILENAME'])){header('HTTP/1.0 403 Forbidden',TRUE,403 );die("<h2>Access Denied!</h2>");}

include_once( '../functions.php' );

// Buka koneksi
$conn = new mysqli(SERVERNAME, DB_USER, DB_PASS, DB_NAME);
// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT chat1.id, chat1.user, chat1.pesan, chat1.waktu,siswa_3.id, siswa_3.nama, siswa_3.pick
FROM chat1
INNER JOIN siswa_3 ON chat1.user=siswa_3.id
ORDER BY chat1.id DESC
LIMIT 5"; // pilih semua data dari tabel siswa_2

$result = $conn->query($sql); // jalankan SQL
if ($result->num_rows > 0) { // jika ada lebih dari 0 data
    echo '<ul>';
    while($row = $result->fetch_assoc()) { // loop data-data tersebut
        $uid  = $row['user'];
        $nama  = $row['nama'];
        $pic = $row['pick'];
        $waktu = $row['waktu'];
        $rtime = relativeDate(strtotime($waktu));
        // $rtime = relativeDate(strtr($waktu))
        if($row['pick'] == ''){
            $pic = 'https://this-person-does-not-exist.com/img/avatar-gen112f1db33af229eb4f3e031587b3d5a2.jpg';
        }else{
            $pic = $row['pick'];
        }
        $pesan = str_replace( 
            array(
                'cuk',
                'pok',
                'tol',
                'rik',
                'lol',
                'fuck'
            ),
            array(
                '*******',
                '*******',
               ' <img src="https://i0.wp.com/www.galvanizeaction.org/wp-content/uploads/2022/06/Wow-gif.gif?fit=450%2C250&ssl=1" >',
               '<img src="https://media.tenor.com/XYPSFvI2MaIAAAAM/hahahahah-gahahahaha.gif" alt="">',
               '<img src="https://media.tenor.com/QRUKNWsBAh0AAAAC/laugh-lol.gif" alt="">',
               '<img src="https://cdn.pnghd.pics/data/1760/download-gif-pocong-17.jpg" alt="">'
            ),
            $row['pesan']
    );

        echo "<li class=u$uid></br><i> $waktu <i>$rtime</br>
        <img src='$pic' class='profile_chat'>
          <span<b>$nama</b> :</span><br/><br/>$pesan</li>";
    }
    echo '</ul>';
}

// tutup koneksi
$conn->close();