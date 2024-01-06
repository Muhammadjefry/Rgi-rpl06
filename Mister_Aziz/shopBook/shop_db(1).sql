-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2023 at 02:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(15, 13, 'bima akbar', '085678654723', 'bima@gmail.com', 'bank bri', 'flat no. 563736,probolinggo, jawa timur, jln pahlawan - rt5 rw5', ', Jujutsu Kaisen(1)', 30000, '24-11-23', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `deskripsi`) VALUES
(1, 'One Piece', 45000, 'onepiece.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam pariatur maxime quos debitis accusantium enim, eius quam, officiis, dicta nam eaque inventore ratione impedit nihil fugit culpa a vitae quidem quis assumenda ipsam aspernatur cumque quasi. Reiciendis officia iusto est veritatis repellendus dolorem vel obcaecati quis perspiciatis, minus impedit ex, doloribus, maiores soluta quas ratione voluptates. Non velit explicabo optio a amet earum ratione quaerat, labore harum, ipsam quidem sed. Laudantium cum, enim eveniet laborum libero, maxime atque quasi ab culpa magni mollitia ex esse error debitis voluptas quisquam. Est veritatis, velit at aspernatur dolor sed modi expedita? Necessitatibus, exercitationem?'),
(3, 'Yang Telah Lama Pergi', 84000, 'Yang Telah Lama Pergi.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam pariatur maxime quos debitis accusantium enim, eius quam, officiis, dicta nam eaque inventore ratione impedit nihil fugit culpa a vitae quidem quis assumenda ipsam aspernatur cumque quasi. Reiciendis officia iusto est veritatis repellendus dolorem vel obcaecati quis perspiciatis, minus impedit ex, doloribus, maiores soluta quas ratione voluptates. Non velit explicabo optio a amet earum ratione quaerat, labore harum, ipsam quidem sed. Laudantium cum, enim eveniet laborum libero, maxime atque quasi ab culpa magni mollitia ex esse error debitis voluptas quisquam. Est veritatis, velit at aspernatur dolor sed modi expedita? Necessitatibus, exercitationem?'),
(4, 'Senja di Alaska', 84000, 'Senja di Alaska.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam pariatur maxime quos debitis accusantium enim, eius quam, officiis, dicta nam eaque inventore ratione impedit nihil fugit culpa a vitae quidem quis assumenda ipsam aspernatur cumque quasi. Reiciendis officia iusto est veritatis repellendus dolorem vel obcaecati quis perspiciatis, minus impedit ex, doloribus, maiores soluta quas ratione voluptates. Non velit explicabo optio a amet earum ratione quaerat, labore harum, ipsam quidem sed. Laudantium cum, enim eveniet laborum libero, maxime atque quasi ab culpa magni mollitia ex esse error debitis voluptas quisquam. Est veritatis, velit at aspernatur dolor sed modi expedita? Necessitatibus, exercitationem?'),
(5, 'Sebuah Seni untuk Bersikap Bodo Amat', 78000, 'Sebuah Seni untuk Bersikap Bodo Amat (edisi handy).png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam pariatur maxime quos debitis accusantium enim, eius quam, officiis, dicta nam eaque inventore ratione impedit nihil fugit culpa a vitae quidem quis assumenda ipsam aspernatur cumque quasi. Reiciendis officia iusto est veritatis repellendus dolorem vel obcaecati quis perspiciatis, minus impedit ex, doloribus, maiores soluta quas ratione voluptates. Non velit explicabo optio a amet earum ratione quaerat, labore harum, ipsam quidem sed. Laudantium cum, enim eveniet laborum libero, maxime atque quasi ab culpa magni mollitia ex esse error debitis voluptas quisquam. Est veritatis, velit at aspernatur dolor sed modi expedita? Necessitatibus, exercitationem?'),
(6, 'Boruto - Naruto Next Generation', 40000, 'boruto.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam pariatur maxime quos debitis accusantium enim, eius quam, officiis, dicta nam eaque inventore ratione impedit nihil fugit culpa a vitae quidem quis assumenda ipsam aspernatur cumque quasi. Reiciendis officia iusto est veritatis repellendus dolorem vel obcaecati quis perspiciatis, minus impedit ex, doloribus, maiores soluta quas ratione voluptates. Non velit explicabo optio a amet earum ratione quaerat, labore harum, ipsam quidem sed. Laudantium cum, enim eveniet laborum libero, maxime atque quasi ab culpa magni mollitia ex esse error debitis voluptas quisquam. Est veritatis, velit at aspernatur dolor sed modi expedita? Necessitatibus, exercitationem?'),
(7, 'Lima Sekawan: Ke Bukit Billycock', 43000, 'Lima Sekawan: Ke Bukit Billycock.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam pariatur maxime quos debitis accusantium enim, eius quam, officiis, dicta nam eaque inventore ratione impedit nihil fugit culpa a vitae quidem quis assumenda ipsam aspernatur cumque quasi. Reiciendis officia iusto est veritatis repellendus dolorem vel obcaecati quis perspiciatis, minus impedit ex, doloribus, maiores soluta quas ratione voluptates. Non velit explicabo optio a amet earum ratione quaerat, labore harum, ipsam quidem sed. Laudantium cum, enim eveniet laborum libero, maxime atque quasi ab culpa magni mollitia ex esse error debitis voluptas quisquam. Est veritatis, velit at aspernatur dolor sed modi expedita? Necessitatibus, exercitationem?'),
(8, 'Melangkah', 74400, 'Melangkah.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam pariatur maxime quos debitis accusantium enim, eius quam, officiis, dicta nam eaque inventore ratione impedit nihil fugit culpa a vitae quidem quis assumenda ipsam aspernatur cumque quasi. Reiciendis officia iusto est veritatis repellendus dolorem vel obcaecati quis perspiciatis, minus impedit ex, doloribus, maiores soluta quas ratione voluptates. Non velit explicabo optio a amet earum ratione quaerat, labore harum, ipsam quidem sed. Laudantium cum, enim eveniet laborum libero, maxime atque quasi ab culpa magni mollitia ex esse error debitis voluptas quisquam. Est veritatis, velit at aspernatur dolor sed modi expedita? Necessitatibus, exercitationem?'),
(10, 'Espresso', 33000, 'Espresso.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam pariatur maxime quos debitis accusantium enim, eius quam, officiis, dicta nam eaque inventore ratione impedit nihil fugit culpa a vitae quidem quis assumenda ipsam aspernatur cumque quasi. Reiciendis officia iusto est veritatis repellendus dolorem vel obcaecati quis perspiciatis, minus impedit ex, doloribus, maiores soluta quas ratione voluptates. Non velit explicabo optio a amet earum ratione quaerat, labore harum, ipsam quidem sed. Laudantium cum, enim eveniet laborum libero, maxime atque quasi ab culpa magni mollitia ex esse error debitis voluptas quisquam. Est veritatis, velit at aspernatur dolor sed modi expedita? Necessitatibus, exercitationem?'),
(13, 'Kekasih Teluk', 48000, 'Kekasih Teluk.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam pariatur maxime quos debitis accusantium enim, eius quam, officiis, dicta nam eaque inventore ratione impedit nihil fugit culpa a vitae quidem quis assumenda ipsam aspernatur cumque quasi. Reiciendis officia iusto est veritatis repellendus dolorem vel obcaecati quis perspiciatis, minus impedit ex, doloribus, maiores soluta quas ratione voluptates. Non velit explicabo optio a amet earum ratione quaerat, labore harum, ipsam quidem sed. Laudantium cum, enim eveniet laborum libero, maxime atque quasi ab culpa magni mollitia ex esse error debitis voluptas quisquam. Est veritatis, velit at aspernatur dolor sed modi expedita? Necessitatibus, exercitationem?'),
(14, 'Seandainya Aku Boleh Memilih', 55000, 'Seandainya Aku Boleh Memilih.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam pariatur maxime quos debitis accusantium enim, eius quam, officiis, dicta nam eaque inventore ratione impedit nihil fugit culpa a vitae quidem quis assumenda ipsam aspernatur cumque quasi. Reiciendis officia iusto est veritatis repellendus dolorem vel obcaecati quis perspiciatis, minus impedit ex, doloribus, maiores soluta quas ratione voluptates. Non velit explicabo optio a amet earum ratione quaerat, labore harum, ipsam quidem sed. Laudantium cum, enim eveniet laborum libero, maxime atque quasi ab culpa magni mollitia ex esse error debitis voluptas quisquam. Est veritatis, velit at aspernatur dolor sed modi expedita? Necessitatibus, exercitationem?'),
(16, 'Kumpulan Dongeng Cerita Rakyat Nusantara', 69000, 'Kumpulan Dongeng Cerita Rakyat Nusantara.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam pariatur maxime quos debitis accusantium enim, eius quam, officiis, dicta nam eaque inventore ratione impedit nihil fugit culpa a vitae quidem quis assumenda ipsam aspernatur cumque quasi. Reiciendis officia iusto est veritatis repellendus dolorem vel obcaecati quis perspiciatis, minus impedit ex, doloribus, maiores soluta quas ratione voluptates. Non velit explicabo optio a amet earum ratione quaerat, labore harum, ipsam quidem sed. Laudantium cum, enim eveniet laborum libero, maxime atque quasi ab culpa magni mollitia ex esse error debitis voluptas quisquam. Est veritatis, velit at aspernatur dolor sed modi expedita? Necessitatibus, exercitationem?'),
(17, 'Republik Rakyat Lucu dan Cerita-cerita Lainnya', 49000, 'Republik Rakyat Lucu dan Cerita-cerita Lainnya.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam pariatur maxime quos debitis accusantium enim, eius quam, officiis, dicta nam eaque inventore ratione impedit nihil fugit culpa a vitae quidem quis assumenda ipsam aspernatur cumque quasi. Reiciendis officia iusto est veritatis repellendus dolorem vel obcaecati quis perspiciatis, minus impedit ex, doloribus, maiores soluta quas ratione voluptates. Non velit explicabo optio a amet earum ratione quaerat, labore harum, ipsam quidem sed. Laudantium cum, enim eveniet laborum libero, maxime atque quasi ab culpa magni mollitia ex esse error debitis voluptas quisquam. Est veritatis, velit at aspernatur dolor sed modi expedita? Necessitatibus, exercitationem?'),
(18, 'Taman Sang Nabi', 35000, 'Taman Sang Nabi.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam pariatur maxime quos debitis accusantium enim, eius quam, officiis, dicta nam eaque inventore ratione impedit nihil fugit culpa a vitae quidem quis assumenda ipsam aspernatur cumque quasi. Reiciendis officia iusto est veritatis repellendus dolorem vel obcaecati quis perspiciatis, minus impedit ex, doloribus, maiores soluta quas ratione voluptates. Non velit explicabo optio a amet earum ratione quaerat, labore harum, ipsam quidem sed. Laudantium cum, enim eveniet laborum libero, maxime atque quasi ab culpa magni mollitia ex esse error debitis voluptas quisquam. Est veritatis, velit at aspernatur dolor sed modi expedita? Necessitatibus, exercitationem?'),
(19, 'Stories Of Your Life', 40000, 'Stories Of Your Life.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam pariatur maxime quos debitis accusantium enim, eius quam, officiis, dicta nam eaque inventore ratione impedit nihil fugit culpa a vitae quidem quis assumenda ipsam aspernatur cumque quasi. Reiciendis officia iusto est veritatis repellendus dolorem vel obcaecati quis perspiciatis, minus impedit ex, doloribus, maiores soluta quas ratione voluptates. Non velit explicabo optio a amet earum ratione quaerat, labore harum, ipsam quidem sed. Laudantium cum, enim eveniet laborum libero, maxime atque quasi ab culpa magni mollitia ex esse error debitis voluptas quisquam. Est veritatis, velit at aspernatur dolor sed modi expedita? Necessitatibus, exercitationem?'),
(20, 'Tentang Seseorang', 40000, 'Tentang Seseorang.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam pariatur maxime quos debitis accusantium enim, eius quam, officiis, dicta nam eaque inventore ratione impedit nihil fugit culpa a vitae quidem quis assumenda ipsam aspernatur cumque quasi. Reiciendis officia iusto est veritatis repellendus dolorem vel obcaecati quis perspiciatis, minus impedit ex, doloribus, maiores soluta quas ratione voluptates. Non velit explicabo optio a amet earum ratione quaerat, labore harum, ipsam quidem sed. Laudantium cum, enim eveniet laborum libero, maxime atque quasi ab culpa magni mollitia ex esse error debitis voluptas quisquam. Est veritatis, velit at aspernatur dolor sed modi expedita? Necessitatibus, exercitationem?'),
(21, 'The Black Shadow', 35000, 'The Black Shadow.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam pariatur maxime quos debitis accusantium enim, eius quam, officiis, dicta nam eaque inventore ratione impedit nihil fugit culpa a vitae quidem quis assumenda ipsam aspernatur cumque quasi. Reiciendis officia iusto est veritatis repellendus dolorem vel obcaecati quis perspiciatis, minus impedit ex, doloribus, maiores soluta quas ratione voluptates. Non velit explicabo optio a amet earum ratione quaerat, labore harum, ipsam quidem sed. Laudantium cum, enim eveniet laborum libero, maxime atque quasi ab culpa magni mollitia ex esse error debitis voluptas quisquam. Est veritatis, velit at aspernatur dolor sed modi expedita? Necessitatibus, exercitationem?'),
(22, 'Merebah Riuh', 35000, 'Merebah Riuh.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam pariatur maxime quos debitis accusantium enim, eius quam, officiis, dicta nam eaque inventore ratione impedit nihil fugit culpa a vitae quidem quis assumenda ipsam aspernatur cumque quasi. Reiciendis officia iusto est veritatis repellendus dolorem vel obcaecati quis perspiciatis, minus impedit ex, doloribus, maiores soluta quas ratione voluptates. Non velit explicabo optio a amet earum ratione quaerat, labore harum, ipsam quidem sed. Laudantium cum, enim eveniet laborum libero, maxime atque quasi ab culpa magni mollitia ex esse error debitis voluptas quisquam. Est veritatis, velit at aspernatur dolor sed modi expedita? Necessitatibus, exercitationem?'),
(23, 'Me & mr. old', 33000, 'Me & Mr. Old.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam pariatur maxime quos debitis accusantium enim, eius quam, officiis, dicta nam eaque inventore ratione impedit nihil fugit culpa a vitae quidem quis assumenda ipsam aspernatur cumque quasi. Reiciendis officia iusto est veritatis repellendus dolorem vel obcaecati quis perspiciatis, minus impedit ex, doloribus, maiores soluta quas ratione voluptates. Non velit explicabo optio a amet earum ratione quaerat, labore harum, ipsam quidem sed. Laudantium cum, enim eveniet laborum libero, maxime atque quasi ab culpa magni mollitia ex esse error debitis voluptas quisquam. Est veritatis, velit at aspernatur dolor sed modi expedita? Necessitatibus, exercitationem?'),
(24, 'Jujutsu Kaisen', 30000, 'Jujutsu Kaisen.jpg', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium, totam. Veniam itaque inventore, quas aut deleniti veritatis voluptatum, delectus ad voluptatem consequatur nesciunt quis minus assumenda! Enim sequi distinctio ipsa facere ad, libero soluta doloribus omnis cum rerum suscipit? Dolorem quidem nostrum sed illo necessitatibus dolorum soluta laborum veritatis mollitia.'),
(25, 'Spy X Family', 45000, 'Spy x Family.jpg', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium, totam. Veniam itaque inventore, quas aut deleniti veritatis voluptatum, delectus ad voluptatem consequatur nesciunt quis minus assumenda! Enim sequi distinctio ipsa facere ad, libero soluta doloribus omnis cum rerum suscipit? Dolorem quidem nostrum sed illo necessitatibus dolorum soluta laborum veritatis mollitia.'),
(26, 'Black Clover', 40000, 'Black Clover.jpg', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium, totam. Veniam itaque inventore, quas aut deleniti veritatis voluptatum, delectus ad voluptatem consequatur nesciunt quis minus assumenda! Enim sequi distinctio ipsa facere ad, libero soluta doloribus omnis cum rerum suscipit? Dolorem quidem nostrum sed illo necessitatibus dolorum soluta laborum veritatis mollitia.'),
(27, 'Anak Kantoran', 40000, 'Anak Kantoran.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi sunt, reprehenderit quae provident error repellendus saepe ad tempore in voluptatibus cum sed deserunt porro quidem sit quasi molestias tempora sint ducimus fugit incidunt hic alias. Eum ipsum et repellendus itaque quia! Sunt repellendus modi cum repudiandae, voluptate ipsa ullam saepe?'),
(28, 'Gadis Kretek', 67500, 'Gadis Kretek.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi sunt, reprehenderit quae provident error repellendus saepe ad tempore in voluptatibus cum sed deserunt porro quidem sit quasi molestias tempora sint ducimus fugit incidunt hic alias. Eum ipsum et repellendus itaque quia! Sunt repellendus modi cum repudiandae, voluptate ipsa ullam saepe?'),
(29, 'Insecurities Principle', 119000, 'Insecurities Principle.jpeg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi sunt, reprehenderit quae provident error repellendus saepe ad tempore in voluptatibus cum sed deserunt porro quidem sit quasi molestias tempora sint ducimus fugit incidunt hic alias. Eum ipsum et repellendus itaque quia! Sunt repellendus modi cum repudiandae, voluptate ipsa ullam saepe?');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(3, 'admin01', 'admin01@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(6, 'jalal', 'jalal@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(13, 'bima akbar', 'bima@gmail.com', '202cb962ac59075b964b07152d234b70', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
