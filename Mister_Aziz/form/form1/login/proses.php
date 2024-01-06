<?php 

$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "data_siswa";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
    }
    // $no1 = $_POST['Nama'];
    // $no2 = $_POST['Tanggal_Lahir'];
    // $no3 = $_POST['Jenis_Kelamin'];
    // $no4 = $_POST['Angkatan'];
    // $no5 = $_POST['Jurusan'];
    // $no6 = 1;
    $no7 = $_POST['email'];
    $no8 = md5($_POST['password']);

    $sql = "SELECT * FROM siswa2 WHERE email='$no7' LIMIT 1";//pilih semua data  dari tabel siswa2
    $result = $conn->query($sql);//jalankan SQL
    if ($result->num_rows > 0) {//jika lebih dari 0 data
        while($row = $result -> fetch_assoc()){
          if($row['password'] == $no8 ){
            setcookie(
              'data_nis',
              $row['id'],
              time() + 3600,
              '/' 
            );
            echo 'login berhasil';
          }else{
            echo 'password tidak cocok';
          }
        }
    } else {//jika data kurang dari satu 
        echo "Tidak ada data..";
    };
      
      $conn->close();



?>