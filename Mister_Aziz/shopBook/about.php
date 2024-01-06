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
    <title>Tentang Kami</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />


    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/gaya.css">


</head>

<body>

    <?php include 'header.php'; ?>

    <div class="heading">
        <h3>Tentang Kami</h3>
        <p> <a href="home.php">Halaman Utama</a> / Tentang Kami </p>
    </div>


    <section class="about" id="tentang">

        <div class="flex">

            <div class="image">
                <img src="img/about.png" alt="">
            </div>

            <div class="content">
                <h3>MENGAPA MEMILIH KAMI?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla suscipit voluptatum unde. Quas
                    repudiandae aliquid expedita ut officia error illo alias consequatur dolores nostrum, optio rerum
                    dolorum temporibus aliquam eaque.</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In iste maiores, optio assumenda ducimus
                    repellat atque voluptate quisquam quia nihil.</p>
                <a href="contact.php" class="btn">Hubungi kami</a>
            </div>

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

    <section class="authors" id="admin">

        <h1 class="title">admin</h1>

        <div class="box-container">

            <div class="box">
                <img src="img/author-9.jpg" alt="">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
                <h3>john deo</h3>
            </div>

            <div class="box">
                <img src="img/author-8.jpg" alt="">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
                <h3>john deo</h3>
            </div>

            <div class="box">
                <img src="img/author-3.jpg" alt="">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
                <h3>john deo</h3>
            </div>

            <div class="box">
                <img src="img/author-4.jpg" alt="">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
                <h3>john deo</h3>
            </div>

            <div class="box">
                <img src="img/author-5.jpg" alt="">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
                <h3>john deo</h3>
            </div>

            <div class="box">
                <img src="img/author-6.jpg" alt="">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
                <h3>john deo</h3>
            </div>

        </div>

    </section>





    <?php include 'footer.php'; ?>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link -->
    <script src="js/java.js"></script>

</body>

</html>