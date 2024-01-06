<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kek";

function translateUnit($u) {
    if( $u == 0 ) {
        $unit = 'g';
    } elseif( $u == 1 ) {
        $unit = 's';
    } elseif( $u == 2 ) {
        $unit = 'k';
    } else {
        $unit = '0';
    }

    return $unit;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$unit = (int) $_POST['unit'];
$tanggal_sekarang = date("Y-m-d");


$sql = "SELECT * FROM antrian_pasien
WHERE unit_pasien=$unit AND timestamp='$tanggal_sekarang' AND status=1
ORDER BY id ASC
LIMIT 1";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $prefix = translateUnit($row['unit_pasien']);
        $no_urut_terakhir = $row['no_urut'];
        $id = $row['id'];
    }
} else {
    $id = 0;
}


if( $id > 0 ) {
    $sql = "UPDATE antrian_pasien SET status=0 WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo $prefix . $no_urut_terakhir;
    } else {
        echo "000";
    }
} else {
    echo '000';
}




$conn->close();