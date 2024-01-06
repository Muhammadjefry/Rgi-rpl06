<?php 
//Keamanan
if(
    isset ($_POST['Nama_Lengkap']) 
)   {  }else{
    echo 'Jangan akses halaman ini langsung';
};
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
    $full = $_POST['Nama_Lengkap'];
    $nikc = $_POST['Nama_Panggilan'];
    $opo = $_POST['Tanggal_Lahir'];
    $ipi = $_POST['Jenis_Kelamin'];
    $opi = $_POST['Angkatan'];
    $ope = $_POST['Jurusan'];
    
    $sql = "INSERT INTO siswa (Nama_Lengkap, Nama_Panggilan, Tanggal_Lahir, Jenis_Kelamin, Angkatan, Jurusan)
    VALUES ('$full', '$nikc', '$opo',$ipi,$opi,$ope)";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();



?>