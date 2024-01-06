<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:index.php');
}

if(isset($_POST['order_btn'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = $_POST['number'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].','. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
    $placed_on = date('d-m-y');

    $cart_total = 0;
    $cart_products[] = '';

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($cart_query) > 0){
        while($cart_item = mysqli_fetch_assoc($cart_query)){
            $cart_products[] = $cart_item['name'].'('.$cart_item['quantity'].')';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }

    $total_products = implode(', ',$cart_products);

    $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

    if($cart_total == 0){
        $message[] = 'keranjang Anda kosong';
    }else{
        if(mysqli_num_rows($order_query) > 0){
            $message[] = 'pesanan sudah dilakukan';
        }else{
            mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
            $message[] = 'pesanan berhasil dilakukan!';
            mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        }
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/gaya.css">


</head>

<body>

    <?php include 'header.php'; ?>

    <div class="heading">
        <h3>checkout</h3>
        <p> <a href="home.php">home</a> / checkout </p>
    </div>

    <section class="display-order">

        <?php
            $grand_total = 0;
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select_cart) > 0){
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                    $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                    $grand_total += $total_price;
                    
        ?>
        <p> <?php echo $fetch_cart['name']; ?>
            <span>(<?php echo 'Rp'.$fetch_cart['price'].''.' x '. $fetch_cart['quantity']; ?>)</span>
        </p>
        <?php
            }
        }else{
            echo '<p class="empty">keranjang Anda kosong</p>';
        }
        ?>
        <div class="grand-total"> Total keseluruhan : <span>Rp <?php echo $grand_total; ?></span></div>

    </section>

    <section class="checkout">

        <form action="" method="post">
            <h3>Tempatkan pesanan Anda</h3>
            <div class="flex">
                <div class="inputBox">
                    <span>Nama Lengkap :</span>
                    <input type="text" name="name" required placeholder="masukkan nama Anda">
                </div>
                <div class="inputBox">
                    <span>Nomor Telepon :</span>
                    <input type="text" name="number" required placeholder="masukkan no Anda">
                </div>
                <div class="inputBox">
                    <span>Email :</span>
                    <input type="email" name="email" required placeholder="masukkan email Anda">
                </div>
                <div class="inputBox">
                    <span>Pembayaran :</span>
                    <select name="method">
                        <option value="cash on delivery">cash on delivery</option>
                        <option value="bank bri">bank bri</option>
                        <option value="bank bni">bank bni</option>
                        <option value="gopay/dana/ovo">gopay/dana/ovo</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>Provinsi :</span>
                    <input type="text" name="city" required placeholder="masukkan nama provinsi Anda">
                </div>
                <div class="inputBox">
                    <span>Kota :</span>
                    <input type="text" name="street" required placeholder="masukkan nama kota Anda">
                </div>
                <div class="inputBox">
                    <span>Kecamatan :</span>
                    <input type="text" name="state" required placeholder="masukkan nama kecamatan Anda">
                </div>
                <div class="inputBox">
                    <span>Kode Pos :</span>
                    <input type="text" min="0" name="flat" required placeholder="masukkan Kode Pos Anda">
                </div>
                <div class="inputBox">
                    <span>Nama Jln, Gedung, No Rumah</span>
                    <input type="text" name="country" required placeholder="masukkan Nama Jln, Gedung, No Rumah Anda">
                </div>
                <div class="inputBox">
                    <span>Detail Lainnya :</span>
                    <input type="text" min="0" name="pin_code" required placeholder="cth: Blok / Unit No, Patokan">
                </div>
            </div>
            <input type="submit" value="pesan sekarang" class="btn" name="order_btn">
        </form>

    </section>





    <?php include 'footer.php'; ?>

    <!-- custom js file link -->
    <script src="js/java.js"></script>

</body>

</html>