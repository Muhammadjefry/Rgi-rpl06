<?php 

$mahasiswa = [
    [
        "Nama" => "Muhammad jefry",
        "Nrp" => "794739478",
        "Jurusan"=>"Tekhink Informatika", "Email"=>"Mhmmad015@gmail.com",
        "gambar" => "gam2.jpg"
    ],
    [
        "Nama" =>    "Alifa Tasbikh",
        "Nrp" => "34739478",
        "Jurusan" => "Manajemen S1",
        "Email"=> "Fabikh025@gmail.com",
        "gambar" => "gam3.jpg"

    ], 
    [
        "Nama" =>  "Kanza Azzahra",
        "Nrp" => "7945389809",
        "Jurusan" => "Farmasi",
        "Email"=>   "Kanza Azzahra@gmail.com",
        "gambar" => "gam4.png"
    ]
    ];
// $_GET
// echo '<pre>';
// echo var_dump($mahasiswa);
// echo '</pre>';
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
            <li><a href="latihan.php?Nama=<?= $mhs["Nama"];?>&Nrp=<?= $mhs["Nrp"]; ?>&Email=<?= $mhs["Email"]; ?>&Jurusan=<?= $mhs["Jurusan"]; ?>&gambar=<?= $mhs["gambar"]; ?>
            "><?= $mhs["Nama"]; ?></a></li>
        </ul>
        <?php endforeach ; ?>
</body>
</html>