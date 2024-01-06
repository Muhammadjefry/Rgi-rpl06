<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <style>
*
{
    -webkit-box-sizing: border-box;
            box-sizing: border-box;
    margin: 0;
    padding: 0;
}


body
{
    font-family: 'Roboto', sans-serif;
    text-align: center;
}
a
{
    text-decoration: none;
}
.product-card {
    width: 380px;
    position: relative;
    box-shadow: 0 2px 7px #dfdfdf;
    margin: 10px;
    background: #fafafa;
    display: inline-block;
    text-align: left;
}

.badge {
    position: absolute;
    left: 0;
    top: 20px;
    text-transform: uppercase;
    font-size: 13px;
    font-weight: 700;
    background: red;
    color: #fff;
    padding: 3px 10px;
}

.product-tumb {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 300px;
    padding: 50px;
    background: #f0f0f0;
}

.product-tumb img {
    max-width: 100%;
    max-height: 100%;
}

.product-details {
    padding: 30px;
}

.product-catagory {
    display: block;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    color: #ccc;
    margin-bottom: 18px;
}

.product-details h4 a {
    font-weight: 500;
    display: block;
    margin-bottom: 18px;
    text-transform: uppercase;
    color: #363636;
    text-decoration: none;
    transition: 0.3s;
}

.product-details h4 a:hover {
    color: #fbb72c;
}

.product-details p {
    font-size: 15px;
    line-height: 22px;
    margin-bottom: 18px;
    color: #999;
}

.product-bottom-details {
    overflow: hidden;
    border-top: 1px solid #eee;
    padding-top: 20px;
}

.product-bottom-details div {
    float: left;
    width: 50%;
}

.product-price {
    font-size: 18px;
    color: #fbb72c;
    font-weight: 600;
}

.product-price small {
    font-size: 80%;
    font-weight: 400;
    text-decoration: line-through;
    display: inline-block;
    margin-right: 5px;
}

.product-links {
    text-align: right;
}

.product-links a {
    display: inline-block;
    margin-left: 5px;
    color: #e1e1e1;
    transition: 0.3s;
    font-size: 17px;
}

.product-links a:hover {
    color: #fbb72c;
}
    </style>
</head>
<body>
<?php 
require_once('DATA.php');
foreach($data as $x ){
    $ratingA = $x['rating'];
    $jumlah = array_sum($ratingA);
    $total = count($ratingA);
    $rata = $jumlah / $total;
   $des =   Number_Format($rata,2,'.','');

   //diskon
   $harga1 = $x['harga'] ;
   $harga2 = $x['harga_diskon'] ;
   $diskon1 = $harga1 - $harga2;
    $diskon2= $diskon1  / $harga1;
    $diskon3 = $diskon2 * 100;
    $desimal =   Number_Format($diskon3,0,'.','');
    if($desimal < 1){
        $cetakmerah = '';
        $cetakHarga = '';
    }else{
        $cetakmerah = '<div class="badge">'.$desimal.'%</div>';
        $cetakHarga='<small>$'.$x['harga'].'</small>';
    } 
echo '	<div class="product-card">
'.$cetakmerah.'
<div class="product-tumb">
    <img src="'.$x['gambar'].'" alt="">
</div>
<div class="product-details">
    <span class="product-catagory">'.$x['kategori'].'</span>
    <h4><a href="">'.$x['nama'].'g</a></h4>
    <p>'.$x['deskripsi'].'</p>
    <div class="product-bottom-details">
        <div class="product-price">'. $cetakHarga.'$'.$x['harga_diskon'].'</div>
        <div class="product-links"><span class="fa fa-star">'.$des.'</span></div>
    </div>
</div>
</div>';
}
?>
	<div class="product-card">
		<div class="badge">-25%</div>
		<div class="product-tumb">
			<img src="https://i.imgur.com/xdbHo4E.png" alt="">
		</div>
		<div class="product-details">
			<span class="product-catagory">Women,bag</span>
			<h4><a href="">Women leather bag</a></h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
			<div class="product-bottom-details">
				<div class="product-price"><small>$120.00</small>$90.00</div>
				<div class="product-links"><span class="fa fa-star"></span> 4.2</div>
			</div>
		</div>
	</div>
    
</body>
</html>