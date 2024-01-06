<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:index.php');
}

if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'sudah ditambahkan ke keranjang!';
    }else{
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        $message[] = 'produk ditambahkan ke keranjang!';
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman utama</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/gaya.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />


</head>

<body>

    <?php include 'header.php'; ?>

    <!-- <section class="home">

        <div class="content">
            <h3>Hand Picked Book to your door.</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio labore quam consequuntur accusamus
                impedit excepturi.</p>
            <a href="about.php" class="white-btn">temukan lebih banyak</a>
        </div>
    </section> -->

    <!-- home sectian start -->

    <section class="home" id="home">

        <div class="row">

            <div class="content">
                <h3>Banyak Buku Populer</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus ab exercitationem commodi
                    itaque, sed architecto.</p>
                <a href="shop.php" class="white-btn">shop now</a>
            </div>

            <div class="swiper books-slider">
                <div class="swiper-wrapper">
                    <a href="#" class="swiper-slide"><img src="img/melangkah.jpg" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="img/book2.jpg" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="img/book3.jpg" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="img/book4.jpg" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="img/book5.jpg" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="img/book6.jpg" alt=""></a>
                </div>
                <!-- <img src="img/stand.jpg" class="stand" alt=""> -->
            </div>

        </div>

    </section>

    <!-- home section end -->

    <!-- feature s -->
    <section class="features" id="features">

        <h1 class="fitur">Fitur <span>kami</span></h1>

        <div class="box-container">

            <div class="box">
                <img src="img/freatures1.png" alt="">
                <h3>Bebas Biaya Kirim</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, quos.</p>
            </div>

            <div class="box">
                <img src="img/freatures2.png" alt="">
                <h3>Pembayaran Mudah</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, quos.</p>
            </div>

            <div class="box">
                <img src="img/freatures3.png" alt="">
                <h3>Free Shiping</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, quos.</p>
            </div>

        </div>

    </section>
    <!-- feature e -->

    <section class="products">

        <h1 class="fitur">Produk <span>Terlaris</span></h1>

        <div class="box-container">

            <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 9") or die('query failed');
                if(mysqli_num_rows($select_products) > 0){
                    while($fetch_products = mysqli_fetch_assoc($select_products)){
                   
            ?>
            <form action="" method="post" class="box">
                <a href="detail.php?id=<?php echo $fetch_products['id'] ?>" style="text-decoration:none; color:#000;">
                    <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                    <div class="name"><?php echo $fetch_products['name']; ?></div>
                    <div class="price">Rp <?php echo $fetch_products['price']; ?></div>
                </a>
                <input type="number" min="1" name="product_quantity" value="1" class="qty">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products  ['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                <input type="submit" value="Masukkan Keranjang" name="add_to_cart" class="btn">
            </form>
            <?php
                }
            }else{
                echo '<p class="empty">belum ada produk yang ditambahkan!</p>';
            }
            ?>
        </div>

        <div class="load-more" style="margin-top: 2rem; text-align:center;">
            <a href="shop.php" class="option-btn">Lihat Lebih Banyak</a>
        </div>

    </section>

    <section class="review" id="review">

        <h1 class="fitur">Reviews <span>Pembeli</span></h1>

        <div class="swiper review-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <img src="img/pic-1.png" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe, soluta vero. Quis earum deleniti
                        praesentium quasi, tenetur quo ipsam obcaecati.</p>
                    <h3>John Deo</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="img/pic-2.png" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe, soluta vero. Quis earum deleniti
                        praesentium quasi, tenetur quo ipsam obcaecati.</p>
                    <h3>John Deo</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="img/pic-3.png" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe, soluta vero. Quis earum deleniti
                        praesentium quasi, tenetur quo ipsam obcaecati.</p>
                    <h3>John Deo</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="img/pic-4.png" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe, soluta vero. Quis earum deleniti
                        praesentium quasi, tenetur quo ipsam obcaecati.</p>
                    <h3>John Deo</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <section class="about">

        <div class="flex">

            <div class="image">
                <img src="img/about.png" alt="">
            </div>

            <div class="content">
                <h3>tentang kami</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In iste maiores, optio assumenda ducimus
                    repellat atque voluptate quisquam quia nihil.</p>
                <a href="about.php" class="btn">Baca selengkapnya</a>
            </div>

        </div>

    </section>

    <section class="home-contact">

        <div class="content">
            <h3>Ada pertanyaan</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, accusantium. Laudantium cum ipsum
                recusandae quos.</p>
            <a href="contact.php" class="white-btn">Hubungi kami</a>
        </div>

    </section>












    <?php include 'footer.php'; ?>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link -->
    <script src="js/java.js"></script>


    <!-- <script src="js/jquery.js"></script> -->

    <!--modernizr.min.js-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script> -->

    <!--bootstrap.min.js-->
    <!-- <script src="js/bootstrap.min.js"></script> -->

    <!-- bootsnav js -->
    <!-- <script src="js/bootsnav.js"></script> -->

    <!--owl.carousel.js-->
    <!-- <script src="js/owl.carousel.min.js"></script> -->

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script> -->

    <!--Custom JS-->
    <!-- <script src="js/custom.js"></script> -->

</body>

</html>