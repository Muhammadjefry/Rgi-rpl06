<?php
function artiPosisi($x){
    if($x == 0 ){
       $sy = 'kasir';
    }elseif($x == 1){
        $sy = 'driver';
    }elseif($x == 2){
        $sy = 'sales';
    }else{
        $sy = 'tumbal...!!';
    }
    return $sy;
}
function itungUsia($x){
    $year = (date('Y')- date('Y',strtotime($x)));
    return $year;
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Latihan-db-toko";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//-------ASC = Ascending / Naik 
//-------DES = Descending / turun
$istem_per_halaman = 3;
if(isset($_GET['halaman']) && $_GET['halaman'] > 0 ){
    $halaman_sekarang = $_GET['halaman'];
}else{
    $halaman_sekarang = 1;
}
$offset = ( $halaman_sekarang - 1 ) * $istem_per_halaman;
// $halaman_sekarang = ($_GET['halaman']);
// $offset = ($halaman_sekarang  - 1) *$istem_per_halaman;
$sql = "SELECT * FROM Pegawai ORDER BY id DESC LIMIT $istem_per_halaman OFFSET $offset";
$result = $conn->query($sql);
// $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
    $nama = $row['nama_panggilan'];
    $posisi = artiPosisi($row['posisi']);
    $sejak =$row['tanggal_bergabung'];
    $usia = itungUsia($row['tanggal_lahir']);
    $foto = 'gambar/' .$row['foto'];
    
    echo "<img src='$foto' width=100 /><p>$nama $usia tahun, bekerja di Toko RGI sebagai $posisi sejak $sejak.</p>";
}
} else {
  echo "0 results";
}
$conn->close();

$url = strtok($_SERVER["REQUEST_URI"], '?');
?> 

<a href="<?php echo $url. '?halaman=' .($halaman_sekarang - 1 ) ?> " > < Back</a>

<a href="<?php echo $url.'?halaman='.($halaman_sekarang + 1 )  ?> " > Next ></a>