<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>konten</title>
</head>
<body>
    <?php 
    if(isset($_COOKIE['teslogin']) && $_COOKIE['teslogin'] == 'oke' ){
        echo 'Ini adalah pesan rahasia yang hanya bisa diakses oleh pengguna terdaftar .';
    }else{
        echo ' Tidak ada apa-apa disini';
    }
    // var_dump($_COOKIE['teslogin'])
    ?>
</body>
</html>