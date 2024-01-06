-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 12, 2023 at 08:06 AM
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
-- Database: `data_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat1`
--

DROP TABLE IF EXISTS `chat1`;
CREATE TABLE `chat1` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat1`
--

INSERT INTO `chat1` (`id`, `user`, `pesan`, `waktu`) VALUES
(1, 9, 'Halo!', '2023-09-11 08:14:12'),
(2, 9, 'Tes satu dua tiga', '2023-09-11 08:17:22'),
(3, 9, 'Tes lagi...', '2023-09-11 08:18:24'),
(4, 9, 'aaa', '2023-09-11 08:18:36'),
(5, 6, 'Tes', '2023-09-11 08:25:11'),
(6, 9, 'Lalilulelo', '2023-09-11 08:25:43'),
(7, 9, 'Jambu mente', '2023-09-11 08:28:24'),
(8, 6, 'Test pak...', '2023-09-11 08:32:30'),
(9, 5, 'oii', '2023-09-11 08:37:31'),
(10, 6, '', '2023-09-11 08:37:45'),
(11, 9, ':D', '2023-09-11 08:42:55'),
(12, 9, 'a', '2023-09-12 02:16:44'),
(13, 13, 'My ID is 13', '2023-09-12 05:01:47'),
(14, 13, 'peko', '2023-09-12 05:58:08'),
(15, 13, 'oh hi!', '2023-09-12 05:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_3`
--

DROP TABLE IF EXISTS `siswa_3`;
CREATE TABLE `siswa_3` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `jenis_kelamin` int(1) NOT NULL,
  `kelas` int(1) NOT NULL,
  `angkatan` int(2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `email` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL DEFAULT '5f4dcc3b5aa765d61d8327deb882cf99'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa_3`
--

INSERT INTO `siswa_3` (`id`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `kelas`, `angkatan`, `status`, `email`, `password`) VALUES
(1, 'Anita Sari', '2003-02-08', 1, 1, 29, 1, 'anita@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'Bonita Ayu Riska', '2004-01-14', 1, 1, 29, 1, 'bonita@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'Farhan', '2000-07-25', 0, 2, 27, 1, 'farhan@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(4, 'Putra Cahyo', '2001-06-11', 0, 0, 28, 1, 'putra@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(5, 'Anggra Hardiansyah', '1998-01-20', 0, 0, 25, 1, 'anggra@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(6, 'Budi Santoso', '2003-11-11', 0, 0, 28, 1, 'budi@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(7, 'Eri Mulyani', '2005-09-11', 0, 0, 29, 1, 'eri@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(8, 'Mahendra Rahmat', '2005-09-11', 0, 0, 29, 1, 'mahendra@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(9, 'Biboo', '2002-07-24', 1, 1, 27, 1, 'biboo@moai.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(10, 'Rani', '2005-09-07', 1, 1, 29, 1, 'rani@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(11, 'Cahyo', '2005-09-07', 0, 0, 29, 1, 'cahyo@gg.gg', '5f4dcc3b5aa765d61d8327deb882cf99'),
(12, 'Suep', '2005-09-01', 0, 0, 29, 1, 'suep@gg.gg', '5f4dcc3b5aa765d61d8327deb882cf99'),
(13, 'Duljis', '2005-09-12', 0, 0, 29, 1, 'duljis@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat1`
--
ALTER TABLE `chat1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa_3`
--
ALTER TABLE `siswa_3`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat1`
--
ALTER TABLE `chat1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `siswa_3`
--
ALTER TABLE `siswa_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
