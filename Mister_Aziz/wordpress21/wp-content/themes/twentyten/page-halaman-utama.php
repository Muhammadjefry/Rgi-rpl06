<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Merienda&display=swap');
      body {
        margin: 0;
        font-family: 'Merienda', cursive;
        background-color: #c91831;
      }
      .transi {
        transition: all 200ms ease-in-out;
      }
      .shade {
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
      }
      h1,
      h2 {
        text-align: center;
        color: #fff;
        font-size: 72px;
        margin: 20px 0 -50px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
      }
      h1 {
        padding-top: 20px;
      }
      h2 {
        font-size: 48px;
        margin: 40px 0 -65px;
      }
      a:link,
      a:visited {
        text-decoration: none;
        color: #fff;
      }
      .container {
        display: flex;
        width: 100%;
        max-width: 1280px;
        margin: 50px auto;
      }
      .container > div {
        flex: 1;
        background-color: gray;
      }
      .product-card {
        border-radius: 30px;
        height: 600px;
        margin: 20px;
        position: relative;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        box-shadow: 5px 5px 2px rgba(0, 0, 0, 0.2);
      }
      .product-card:hover {
        margin: -10px 0;
        height: 640px;
      }
      .product-card > * {
        position: absolute;
      }
      .product-card > .product-cat {
        top: 30px;
        left: 20px;
        text-transform: uppercase;
        font-weight: bold;
      }
      .product-card > .product-title {
        top: 60px;
        left: 20px;
        font-size: 40px;
        font-weight: bold;
        margin: 0;
      }
      .product-card > .product-price {
        bottom: 42px;
        left: 30px;
        font-size: 48px;
        font-weight: bold;
      }
      .product-card > .product-price > small {
        font-size: 20px;
      }
      .product-card:hover > .product-price {
        font-size: 72px;
      }
      .product-card > .atc {
        bottom: 30px;
        right: 30px;
        font-size: 48px;
        line-height: 48px;
        color: black;
        border: 2px solid black;
        background-color: transparent;
        border-radius: 999px;
        padding: 8px 21px 13px;
        cursor: pointer;
      }
      .product-card > .atc:hover {
        rotate: 90deg;
      }
      .alt {
        color: white;
      }
      .alt > .atc {
        color: white;
        border-color: white;
      }
        .contai{
            z-index: 20;
            text-align: center;
            font-size: 20px;
            color: #fff;
            font-family:sans-serif;
            padding: 30px;
            justify-content: space-between;
        }
        .contai img{
          width: 300px;
          height: 300px;
        }
        figcaption >  a{
            text-decoration: none;
            color: black;
        }
</style>
 </head>
<body>
<h1>Dapur Gaib</h1>
<h2>~ Best Sellers ~</h2>
<div class="container">
      <div class="product-card alt transi shade" style="background-image: url(https://i.pinimg.com/564x/e3/fe/d9/e3fed97c1265f8b039b255c0a3a5b92b.jpg)">
        <div class="product-cat">KFC</div>
        <h3 class="product-title">Ayam Crispy</h3>
        <div class="product-price transi">185<small>k</small></div>
        <button class="atc transi" data-pid="102">+</button>
      </div>

      <div class="product-card alt transi shade" style="background-image: url(https://i.pinimg.com/236x/d3/85/e7/d385e7efbf6c53f97fa641821b65fe9f.jpg)">
        <div class="product-cat">KFC</div>
        <h3 class="product-title">Ayam Crispy + Cheese</h3>
        <div class="product-price transi">200<small>k</small></div>
        <button class="atc transi" data-pid="104">+</button>
      </div>

      <div class="product-card transi shade" style="background-image: url(https://i.pinimg.com/564x/44/1e/45/441e45036e475526dceda158a40d43a2.jpg)">
        <div class="product-cat">KFC</div>
        <h3 class="product-title"></h3>
        <div class="product-price transi">180<small>k</small></div>
        <button class="atc transi" data-pid="105">+</button>
      </div>
    </div>
   </div>
   <div id="notif"></div>
   <?php
   $args = array(
    'post_type' => 'testimony',
    'posts_per_page' => 1,
    'orderby' => 'rand'
   );
// The Query.
$the_query = new WP_Query( $args );

// The Loop.
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '
        <div class="contai">
        <img src="'.fimage(get_the_ID()).'">
        <figure>
        <blockquote>
        <p >'.get_the_content().' </p>
        </blockquote>
        <figcaption>
       <a href="#">'.get_the_title().'</a>
       </figcaption>
       </figure>
       </div>';
	}
//     <figure class="text-end">
//     <blockquote class="blockquote">
//       <p>A well-known quote, contained in a blockquote element.</p>
//     </blockquote>
//     <figcaption class="blockquote-footer">
//       Someone famous in <cite title="Source Title">Source Title</cite>
//     </figcaption>
//   </figure>







} else {
	esc_html_e( 'Sorry, no posts matched your criteria.' );
}
// Restore original Post Data.
wp_reset_postdata();
?>
     
    <script>
document.addEventListener("click",function(e){
    if( e.target.classList.contains('atc') ){
        var pid = e.target.getAttribute('data-pid')
        var aaa = new FormData();
    aaa.append('action','atc');
    aaa.append('pid', pid )
    fetch( '<?php echo admin_url("admin-ajax.php");?>', {
        method: 'POST',
        credentials: 'same-origin',
        body: aaa
    } )
    // .then((response) => response.json())
    .then((response) => response.text())
    .then((data) => {
        document.querySelector('#notif').innerHTML = data;
        document.querySelector('#notif').classList.add("show");
        setTimeout( function(){
            document.querySelector('#notif').innerHTML = '';
        document.querySelector('#notif').classList.remove("show");
    }, 5000)
        console.log(data);
    })
    .catch((error) => {
        console.log(error);
    })
    }
    
})
    </script>
</body>
</html>