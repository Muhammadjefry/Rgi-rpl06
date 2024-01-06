<?php 
//------------Upload gambar--------------
  
$target_dir = "upload/";
// $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
$microtime = floor(microtime(true) * 1000);
$target_file = $target_dir.$microtime.'.'.basename($_FILES['gambar']['name']);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$nama_file = 'nopic_s.jpg';

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
$check = getimagesize($_FILES["gambar"]["tmp_name"]);
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
if ($_FILES["gambar"]["size"] > 5000000) {
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
  if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
    $nama_file = htmlspecialchars( basename( $_FILES["gambar"]["name"]));
    echo "The file " .$nama_file. " has been uploaded.";
    
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


//Keamanan
if(
    isset ($_POST['nama']) 
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
    $nikc = $_POST['nama'];
    $opo = $_POST['harga'];
    $ipi = $_POST['stok'];
    $opi = $_POST['terjual'];
    
    $sql = "INSERT INTO Produk (nama,harga, stok, terjual,gambar)
    VALUES ('$nikc',$opo,$ipi,$opi,'$nama_file')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();



?>