<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:index.php');
}

if(isset($_POST['update_cart'])){

    $cart_id = $_POST['cart_id'];
    $cart_quantity = $_POST['cart_quantity'];
    mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
    $message[] = 'jumlah keranjang diperbarui!';
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
    header('location:cart.php');
}

if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    header('location:cart.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>keranjang</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/gaya.css">


</head>

<body>

    <?php include 'header.php'; ?>

    <div class="heading">
        <h3>keranjang belanja</h3>
        <p> <a href="home.php">halaman utama</a> / keranjang </p>
    </div>

    <section class="shopping-cart" id="keranjang">

        <h1 class="title">produk ditambahkan</h1>

        <div class="box-container">
            <?php
                $grand_total = 0;
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                if(mysqli_num_rows($select_cart) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            ?>
            <div class="box">
                <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fa-solid fa-xmark"
                    onclick="return confirm('delete this from cart?');"></a>
                <img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="">
                <div class="name"><?php echo $fetch_cart['name']; ?></div>
                <div class="price">Rp<?php echo $fetch_cart['price']; ?></div>
                <form action="" method="post">
                    <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                    <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                    <input type="submit" name="update_cart" value="perbarui" class="option-btn">
                </form>
                <div class="sub-total"> sub total :
                    <span>Rp<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?></span>
                </div>
            </div>
            <?php
            $grand_total += $sub_total;
                }
            }else{
                echo '<p class="empty">keranjang Anda kosong</p>';
            }
            ?>
        </div>

        <div style="margin-top: 2rem; text-align:center;">
            <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>"
                onclick="return confirm('delete all from cart?');">hapus semua</a>
        </div>

        <div class="cart-total">
            <p>grand total : <span>Rp <?php echo $grand_total; ?></span></p>
            <div class="flex">
                <a href="shop.php" class="option-btn">lanjut belanja</a>
                <a href="checkout.php" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">lanjutkan ke
                    pembayaran</a>
            </div>
        </div>

    </section>





    <?php include 'footer.php'; ?>

    <!-- custom js file link -->
    <script src="js/script.js"></script>

</body>

</html>