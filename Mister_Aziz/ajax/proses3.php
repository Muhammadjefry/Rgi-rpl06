<?php  
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Latihan-db-toko";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
    }
    $nikc = $_POST['nama_lengkap'];
    $opo = $_POST['nama_panggilan'];
    $ipi = $_POST['tanggal_lahir'];
    $opi = $_POST['jenis_kelamin'];
    $ope = $_POST['posisi'];
    $op = '';
    $opa = $_POST['tanggal_bergabung'];

    $sql = "INSERT INTO Pegawai (nama_lengkap,nama_panggilan, tanggal_lahir, jenis_kelamin,posisi,foto,tanggal_bergabung)
    VALUES ('$nikc','$opo','$ipi',$opi,$ope,'$op','$opa')";
    
    if ($conn->query($sql) === TRUE) {
        $out = array(
            'status' => 1,
            'message' => 'Data '.$nikc.' berhasil disimpan.'
        );
        echo json_encode($out);
    } else {
        $out = array(
            'status' => 0,
            'message' => 'Error'.$sql."<br>".$conn->error
        );
        echo json_encode($out);
    }
   
    
    $conn->close();
