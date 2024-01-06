<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
display: flex;
        }
       .container {
        display: flex;
        justify-content: space-evenly;
        /* align-items: center; */
        margin: 100px auto;
      }
      .container .card {
        position: relative;
        display: flex;
        justify-content: center;
        background: rgb(0, 98, 98);
        width: 350px;
        height: 300px;
        max-width: 100%;
        border-radius: 20px;
        transition: 0.5s;
        box-shadow: 7px 5px 15px rgb(88, 88, 88);
      }
      .container .card:hover {
        height: 400px;
      }
      .container .card .img {
        position: absolute;
        top: 20px;
        width: 300px;
        height: 220px;
        background: #333;
        overflow: hidden;
        border-radius: 12px;
        transition: 0.5s;
      }
      .container .card:hover .img {
        top: -100px;
        scale: 0.75;
        box-shadow: 7px 5px 15px rgb(88, 88, 88);
      }
      .container .card .img img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* background-position: c; */
        object-fit: cover;
      }
      .container .card .content {
        position: absolute;
        top: 230px;
        width: 100%;
        height: 50px;
        padding: 0 30px;
        text-align: center;
        overflow: hidden;
        transition: 0.5s;
      }
      .container .card:hover .content {
        top: 100px;
        height: 300px;
      }
      .container .card .content h2 {
        font-size: 1.5rem;
        font-weight: 700;
        color: aqua;
      }

      .container .card .content p {
        color: #b5b5b5;
        padding: 0 30px;
      }

      .container .card .content a {
        position: relative;
        top: 15px;
        display: inline-block;
        padding: 12px 25px;
        text-decoration: none;
        background: red;
        color: #ffffff;
        font-weight: 500;
      }

      .container .card .content a:hover {
        opacity: 0.8;
      }
    </style>
</head>
<body>
    <?php 
    if( have_posts() ){
        while(have_posts()){
            the_post();

            // get_the_title()
            // get_the_content()
            // get_post_meta( get_the_ID(), 'NAMA_META', true)

    
            echo '<div class="container">
                    <div class="card">
                        <div class="img">
                             <img src="'. get_post_meta(get_the_ID(), 'poster', true) .'" alt="" />
                         </div>
                        <div class="content">
                            <h2>' . get_the_title() . '</h2>
                            <p>  ' . get_the_content() . ' </p>
                         <a href="#">Read more</a>
                      </div>
                    </div>
                  </div>';
              }
    }
    ?>
</body>
</html>