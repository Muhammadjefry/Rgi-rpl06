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
    $no1 = $_POST['Nama'];
    $no2 = $_POST['Tanggal_Lahir'];
    $no3 = $_POST['Jenis_Kelamin'];
    $no4 = $_POST['Angkatan'];
    $no5 = $_POST['Jurusan'];
    $no6 = 1;
    $no7 = $_POST['email'];
    $no8 = md5($_POST['password']);

    $sql = "INSERT INTO siswa2 (name,tanggalLahir,jenisKelamin,angkatan,jurusan,status,email,password)
    VALUES ('$no1','$no2',$no3,$no4,$no5,$no6,'$no7','$no8')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();



?>