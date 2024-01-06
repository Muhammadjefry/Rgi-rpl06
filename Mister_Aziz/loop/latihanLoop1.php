<?php
$data = array(
    array(
        'iPhone 9', // nama
        'An apple mobile which is nothing like apple', // deskripsi
        549, // harga
        4.69, // rating
        94, // stock
    ),
    array(
        'iPhone X',
        'SIM-Free, Model A19211 6.5-inch Super Retina HD display with OLED technology A12 Bionic chip with ...',
        899,
        4.44,
        34,
    ),
    array(
        'Samsung Universe 9',
        'Samsung\'s new variant which goes beyond Galaxy to the Universe',
        1249,
        4.09,
        36,
    ),
    array(
        'OPPOF19',
        'OPPO F19 is officially announced on April 2021.',
        280,
        4.3,
        123,
    ),
    array(
        'Huawei P30',
        'Huawei\’s re-badged P30 Pro New Edition was officially unveiled yesterday in Germany and now the device has made its way to the UK.',
        499,
        4.09,
        32,
    ),
    array(
        'MacBook Pro',
        'MacBook Pro 2021 with mini-LED display may launch between September, November',
        1749,
        4.57,
        83,
    ),
    array(
        'Samsung Galaxy Book',
        'Samsung Galaxy Book S (2020) Laptop With Intel Lakefield Chip, 8GB of RAM Launched',
        1499,
        4.25,
        50,
    ),
    array(
        'Microsoft Surface Laptop 4',
        'Style and speed. Stand out on HD video calls backed by Studio Mics. Capture ideas on the vibrant touchscreen.',
        1499,
        4.43,
        68,
    ),
    array(
        'Infinix INBOOK',
        'Infinix Inbook X1 Ci3 10th 8GB 256GB 14 Win10 Grey – 1 Year Warranty',
        1099,
        4.54,
        96,
    ),
    array(
        'HP Pavilion 15-DK1056WM',
        'HP Pavilion 15-DK1056WM Gaming Laptop 10th Gen Core i5, 8GB, 256GB SSD, GTX 1650 4GB, Windows 10',
        1099,
        4.43,
        89,
    ),
    array(
        'perfume Oil',
        'Mega Discount, Impression of Acqua Di Gio by GiorgioArmani concentrated attar perfume Oil',
        13,
        4.26,
        65,
    ),
    array(
        'Brown Perfume',
        'Royal_Mirage Sport Brown Perfume for Men & Women - 120ml',
        40,
        4,
        52,
    ),

);

//Mencari stok dan nama barang

foreach($data as $x){
    echo "<p> Stok $x[0] ditoko PSstore jakarta tinggal $x[4] unit.</p>";
}


























