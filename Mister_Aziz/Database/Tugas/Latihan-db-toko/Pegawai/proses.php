<?php 
//------------Upload gambar--------------
  
$target_dir = "gambar/";
// $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
$microtime = floor(microtime(true) * 1000);
$target_file = $target_dir.$microtime.'.'.basename($_FILES['foto']['name']);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$nama_file = 'nopic_s.jpg';

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
$check = getimagesize($_FILES["foto"]["tmp_name"]);
if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
} else {
    echo "File is not an image.";
    $uploadOk = 0;
}
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
$uploadOk = 0;
}

// Check file size
if ($_FILES["foto"]["size"] > 5000000) {
echo "Sorry, your file is too large.";
$uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
    $nama_file = $microtime . '.' . htmlspecialchars( basename( $_FILES["foto"]["name"]));
    echo "The file " .$nama_file. " has been uploaded.";
    
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


//Keamanan
if(
    isset ($_POST['nama_lengkap']) 
)   {  }else{
    echo 'Jangan akses halaman ini langsung';
};
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
    $opa = $_POST['tanggal_bergabung'];
    
    $sql = "INSERT INTO Pegawai (nama_lengkap,nama_panggilan, tanggal_lahir, jenis_kelamin,posisi,foto,tanggal_bergabung)
    VALUES ('$nikc','$opo','$ipi',$opi,$ope,'$nama_file','$opa')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();



?>