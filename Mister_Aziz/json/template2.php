<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
:root {
  --size: 400px;
  --blue: #aad5ff;
  --lb: rgba(0, 0, 0, 0.5);
}
body {
  display: grid;
  justify-items: center;
  grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
  background-color: var(--blue);
  color: cornsilk;
  font-family: "Roboto Condensed", sans-serif;
}
.container {
  width: var(--size);
  height: var(--size);
  display: grid;
  grid-template-columns: repeat(2, 50%);
  grid-template-rows: repeat(2, 50%);
  justify-items: center;
  align-items: center;
  filter: drop-shadow(0px 0px 7px rgba(1, 1, 1, .7));
}
.productImage {
  grid-column: 1/span 2;
  grid-row: 1 /span 2;
  width: var(--size);
  height: var(--size);
  background-size: cover;
  clip-path: polygon(
    20% 20%,
    50% 20%,
    50% 20%,
    80% 20%,
    80% 50%,
    80% 50%,
    80% 80%,
    50% 80%,
    50% 80%,
    20% 80%,
    20% 50%,
    20% 50%
  );
  transition: all 0.7s cubic-bezier(0.895, 0.03, 0.685, 0.22);
}
.shoeImg {
  background-color: #fff;
}
h4,
ul,
span {
  padding: 0;
  margin: 0;
}
.size,
.color {
  grid-column: 1;
  grid-row: 1;
  justify-self: center;
  z-index: 1;
  opacity: 0;
  transition: all 0.6s cubic-bezier(0.895, 0.03, 0.685, 0.22);
}
.size ul li,
.color ul li {
  list-style: none;
  width: 20px;
  height: 20px;
  margin: 5px;
  padding: 5px;
  text-align: center;
  background-color: rgba(0, 0, 0, 0.5);
}
.color {
  grid-column: 2;
  grid-row: 2;
}
.color ul li span {
  width: 10px;
  height: 10px;
  border-radius: 50px;
  display: inline-block;
}
.red {
  background-color: red;
}
.yellow {
  background-color: greenyellow;
}
.blue {
  background-color: #0070ee;
}
.price {
  grid-column: 2;
  grid-row: 1;
  justify-self: center;
  z-index: 1;
  opacity: 0;
  transition: all 0.6s cubic-bezier(0.895, 0.03, 0.685, 0.22);
}
.price h4 {
  margin-bottom: 8px;
}
.price span {
  width: 20px;
  height: 20px;
  padding: 5px;
  background-color: rgba(0, 0, 0, 0.5);
}
.productName {
  grid-column: 1;
  grid-row: 2;
  align-self: center;
  justify-self: center;
  z-index: 1;
  transition: all 0.7s cubic-bezier(0.895, 0.03, 0.685, 0.22);
}

.productImage:hover {
  clip-path: polygon(
    20% 0%,
    50% 0%,
    50% 20%,
    100% 20%,
    100% 50%,
    80% 50%,
    80% 100%,
    50% 100%,
    50% 80%,
    0% 80%,
    0% 50%,
    20% 50%
  );
  transform: rotate(-15deg);
  transition: all 0.4s cubic-bezier(0.86, 0, 0.07, 1);
}
.productImage:hover ~ * {
  opacity: 1;
  transform: rotate(-15deg);
  transition: all 0.4s cubic-bezier(0.86, 0, 0.07, 1);
}
.credits{
    color:white;
    font-size: 1.2rem;
    grid-column: 1 / -1 ;
    justify-self: center;
    text-align: center;
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
    echo '<div class="container shoe">
    <div class="productImage shoeImg" style="background-image: url('.$gambar.');"></div>
    <div class="size shoeSize">
       <h4>SIZE</h4>
       <ul>
          <li>9</li>
          <li>8</li>
          <li>7</li>
       </ul>
    </div>
    <div class="price shoePrice">
       <h4>PRICE</h4>
       <span>$'.$harga.'</span>
    </div>
    <div class="color shoeColor">
       <h4>COLORS</h4>
       <ul>
          <li><span class="blue"></span></li>
          <li><span class="yellow"></span></li>
          <li><span class="red"></span></li>
       </ul>
    </div>
    <div class="productName shoeName">
       '.$nama.'
    </div>
 </div>'; 
}
?>

<div class="container shoe">
   <div class="productImage shoeImg" style="background-image: url(https://source.unsplash.com/l8p1aWZqHvE/1000x1000);"></div>
   <div class="size shoeSize">
      <h4>SIZE</h4>
      <ul>
         <li>9</li>
         <li>8</li>
         <li>7</li>
      </ul>
   </div>
   <div class="price shoePrice">
      <h4>PRICE</h4>
      <span>$150</span>
   </div>
   <div class="color shoeColor">
      <h4>COLORS</h4>
      <ul>
         <li><span class="blue"></span></li>
         <li><span class="yellow"></span></li>
         <li><span class="red"></span></li>
      </ul>
   </div>
   <div class="productName shoeName">
      Nike Air Max
   </div>
</div>

    
</body>
</html>