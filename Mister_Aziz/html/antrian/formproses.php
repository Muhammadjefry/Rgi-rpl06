<?php 
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Puskesmas";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
    }
    //SQL menarik data terakhir
    $col1 = $_POST['pasien_nama'];
    $col2 = $_POST['pasien_unit'];
    $tanggal_sekarang= date('Y-m-d');
    $sql = "SELECT * FROM Antrian  WHERE   unit_pasien=$col2 AND timestamp= '$tanggal_sekarang'  ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result -> fetch_assoc()){
            $no_urut_terakhir =$row['no_urut'];
        }
    } else {//jika data kurang dari satu 
        $no_urut_terakhir = 0;
    };
    //SQLuntuk menyimpan data
    $no1 = $_POST['pasien_nama'];
    $no2 = $_POST['pasien_unit'];
    $no3 = $no_urut_terakhir + 1;
    $no4 = 1;

    $sql = "INSERT INTO Antrian (nama_pasien,unit_pasien,no_urut,status)
    VALUES ('$no1',$no2,$no3,$no4)";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();



?>
