<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
  background-color: #FEF5DF;
}

.container {
  width: 300px;
  height: 400px;
  position: relative;
  display: inline-block;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  margin: auto;
  background: url("https://i.pinimg.com/564x/6f/5a/b1/6f5ab1b470beeeeaf285bb451c63ac8f.jpg");
  background-color: black;
  background-size: cover;
  cursor: pointer;
  -webkit-box-shadow: 0 0 5px #000;
  box-shadow: 0 0 5px 3px #000;
  margin-left: 30px;
  margin-bottom: 30px;
}

.overlay {
  width: 100%;
  height: 100%;
  display: grid;
  grid-template-columns: 1fr;
  grid-template-rows: 1fr 2fr 2fr 1fr;
  background: rgba(77, 77, 77, 0.9);
  color: #FEF5DF;
  opacity: 0;
  transition: all 0.5s;
  font-family: "Playfair Display", serif;
}

.items {
  padding-left: 20px;
  letter-spacing: 3px;
}

.head {
  font-size: 30px;
  line-height: 40px;
  transform: translateY(40px);
  transition: all 0.7s;
}
.head hr {
  display: block;
  width: 0;
  border: none;
  border-bottom: solid 2px #FEF5DF;
  position: absolute;
  bottom: 0;
  left: 20px;
  transition: all 0.5s;
}

.price {
  font-size: 22px;
  line-height: 10px;
  font-weight: bold;
  opacity: 0;
  transform: translateY(40px);
  transition: all 0.7s;
}
.price .old {
  text-decoration: line-through;
  color: #b3b3b3;
}

.cart {
  font-size: 12px;
  opacity: 0;
  letter-spacing: 1px;
  font-family: "Lato", sans-serif;
  transform: translateY(40px);
  transition: all 0.7s;
}
.cart i {
  font-size: 16px;
}
.cart span {
  margin-left: 10px;
}

.container:hover .overlay {
  opacity: 1;
}
.container:hover .overlay .head {
  transform: translateY(0px);
}
.container:hover .overlay hr {
  width: 75px;
  transition-delay: 0.4s;
}
.container:hover .overlay .price {
  transform: translateY(0px);
  transition-delay: 0.3s;
  opacity: 1;
}
.container:hover .overlay .cart {
  transform: translateY(0px);
  transition-delay: 0.6s;
  opacity: 1;
}
.head p {
    height: 150px;
    overflow: hidden;
}
    </style>
</head>
<body>
<?php 
$data_mentah = file_get_contents('products-2.json');
$data_proses_1 = json_decode($data_mentah);

foreach($data_proses_1 as $x){
    $nama = $x->title;
    $harga = $x->price;
    $gambar = $x->image;
    echo '<div class="container" style="background-image:url('.$gambar.')">
    <div class="overlay">
        <div class = "items"></div>
            <div class = "items head">
            <p>'.$nama.'</p>
            <hr>
        </div>
        <div class = "items price">
            <p class="new">'.$harga.'</p>
        </div>
        <div class="items cart">
            <i class="fa fa-shopping-cart"></i>
            <span>ADD TO CART</span>
        </div>
    </div>
</div>'; 
}
?>

<!-- TEMPLATE START -->
<div class="container">
    <div class="overlay">
        <div class = "items"></div>
            <div class = "items head">
            <p>Flower Embroidery Hoop Art</p>
            <hr>
        </div>
        <div class = "items price">
            <p class="new">$345</p>
        </div>
        <div class="items cart">
            <i class="fa fa-shopping-cart"></i>
            <span>ADD TO CART</span>
        </div>
    </div>
</div>
<!-- TEMPLATE END -->
    
</body>
</html>