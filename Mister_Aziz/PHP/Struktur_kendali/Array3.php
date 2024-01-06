<?php 
$mahasiswa = [["Muhammad jefry","794739478","Tekhink Informatika", "Mhmmad015@gmail.com"],
["Alifa Tasbikh","34739478","Manajemen S1", "Fabikh025@gmail.com"], ["Kanza Azzahra","7945389809","Farmasi", "Kanza Azzahra@gmail.com"]];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach($mahasiswa as $mhs) : ?>
    <ul>
        <li>Nama :<?= $mhs[0];  ?></li>
        <li>NRP :<?= $mhs[1];  ?></li>
        <li>Jurusan :<?= $mhs[2];  ?></li>
        <li>Email :<?= $mhs[3];  ?></li>
    </ul>
    <?php endforeach; ?>

</body>
</html>