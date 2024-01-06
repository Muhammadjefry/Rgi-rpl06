<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:index.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pesanan</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/gaya.css">


</head>

<body>

    <?php include 'header.php'; ?>

    <div class="heading">
        <h3>pesanan mu</h3>
        <p> <a href="home.php">halaman utama</a> / pesanan </p>
    </div>

    <section class="placed-orders" id="beli">

        <h1 class="title">pesanan mu</h1>

        <div class="box-container">

            <?php
                $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
                if(mysqli_num_rows($order_query) > 0){
                    while($fetch_orders = mysqli_fetch_assoc($order_query)){
            ?>
            <div class="box">
                <p> pesan pada tgl : <span><?php echo $fetch_orders['placed_on']; ?></span></p>
                <p> nama : <span><?php echo $fetch_orders['name']; ?></span></p>
                <p> no : <span><?php echo $fetch_orders['number']; ?></span></p>
                <p> email : <span><?php echo $fetch_orders['email']; ?></span></p>
                <p> alamat : <span><?php echo $fetch_orders['address']; ?></span></p>
                <p> pembayaran : <span><?php echo $fetch_orders['method']; ?></span></p>
                <p> pesanan anda : <span><?php echo $fetch_orders['total_products']; ?></span></p>
                <p> total harga : <span>Rp <?php echo $fetch_orders['total_price']; ?></span></p>
                <p> status pembayaran : <span
                        style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; } ?>"><?php echo $fetch_orders['payment_status']; ?></span>
                </p>
            </div>
            <?php
                }
            }else{
                echo '<p class="empty">belum ada pesanan yang dilakukan!</p>';
            }
            ?>

        </div>

    </section>





    <?php include 'footer.php'; ?>

    <!-- custom js file link -->
    <script src="js/java.js"></script>

</body>

</html>