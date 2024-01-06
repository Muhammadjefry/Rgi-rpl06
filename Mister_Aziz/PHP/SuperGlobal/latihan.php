<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body>
    <ul>
        <li><img src=" <?= $_GET['gambar']; ?>  " style="width:100px"></li>
        <li><?= $_GET["Nama"]; ?></li>
        <li><?= $_GET["Nrp"]; ?></li>
        <li><?= $_GET["Email"]; ?></li>
        <li><?= $_GET["Jurusan"]; ?></li>
    </ul>

    <a href="$_GET.php">Kembali ke daftar Mahasiswa</a>
</body>
</html>