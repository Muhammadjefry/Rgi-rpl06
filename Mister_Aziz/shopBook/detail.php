<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:index.php');
}

// $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE product_id = $_GET['id'] ");
// $fetch_products = mysqli_fetch_object($select_products);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/gaya.css">


</head>

<body>

    <?php include 'header.php'; ?>


    <div class="heading">
        <h3>Detail Produk</h3>
        <p> <a href="home.php">home</a> / Detail </p>
    </div>

    <!-- detail -->
    <section class="detail-produk" id="detail">
        <div class="detail">
            <div class="wadah">
                <h1 class="fitur">Detail <span>Produk</span></h1>
                <div class="kotak">
                    <div class="col-2">
                        <?php
                        $id = $_GET['id'];
                        $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id='$id'") or die('query failed');
                        if(mysqli_num_rows($select_products) > 0){
                            while($fetch_products = mysqli_fetch_assoc($select_products)){        
                        ?>
                        <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" width="100%">
                    </div>
                    <div class="col-2">
                        <h3 class="product_name"><?php echo $fetch_products['name']; ?></h3>
                        <h4 class="product_price">Rp <?php echo number_format($fetch_products['price']); ?></h4>
                        <p>Deskripsi Buku :<br> <?php echo $fetch_products['deskripsi'] ?></p>
                        <a href="home.php" class="btn">Kembali</a>
                    </div>
                    <?php
                            }}
                        ?>
                </div>
            </div>
        </div>
    </section>






    <?php include 'footer.php'; ?>

    <!-- custom js file link -->
    <script src="js/script.js"></script>

</body>

</html>