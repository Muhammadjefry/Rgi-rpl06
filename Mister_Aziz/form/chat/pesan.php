<?php 
require_once('functions.php');
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "chat";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM chat1 ORDER BY id DESC LIMIT 12";//pilih semua data  dari tabel siswa2
    $result = $conn->query($sql);//jalankan SQL
    if ($result->num_rows > 0) {//jika lebih dari 0 data
        while($row = $result -> fetch_assoc()){
            $uid  = $row['user'];
            $nama  = translateNama($uid);
            $pesan = $row['pesan'];
    
            echo "<li class=u$uid><b>$nama</b> says:<br/>$pesan</li>";
        }
        echo '</ul>';
    } 
      $conn->close();



?>