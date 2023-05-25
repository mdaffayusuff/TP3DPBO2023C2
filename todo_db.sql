-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 12:25 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` int(3) NOT NULL,
  `mata_kuliah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `mata_kuliah`) VALUES
(1, 'DPBO'),
(2, 'Analisis dan Desain Algoritma'),
(4, 'Pemprograman Visual'),
(5, 'Sistem Operasi'),
(6, 'Projek Konsultasi'),
(7, 'Metodologi Penelitian'),
(8, 'Big Data Analysis'),
(13, 'DPBO3');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_tugas`
--

CREATE TABLE `tipe_tugas` (
  `id` int(3) NOT NULL,
  `tipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_tugas`
--

INSERT INTO `tipe_tugas` (`id`, `tipe`) VALUES
(1, 'Latihan Praktikum'),
(2, 'Tugas Praktikum'),
(3, 'Tugas Mandiri'),
(4, 'Tugas Kelompok'),
(5, 'Tugas Besar'),
(6, 'Tugas Masa Depan'),
(13, 'Tugas Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `todo_list`
--

CREATE TABLE `todo_list` (
  `id_todo` int(10) NOT NULL,
  `nama_tugas` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `deadline` date NOT NULL,
  `id_tipe` int(3) NOT NULL,
  `id_matkul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todo_list`
--

INSERT INTO `todo_list` (`id_todo`, `nama_tugas`, `deskripsi`, `deadline`, `id_tipe`, `id_matkul`) VALUES
(14, 'TestingEdit', 'ss', '2023-05-25', 2, 2),
(17, 'Testing', 'aaaaaaa', '2023-05-25', 2, 1),
(18, 'testing add', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', '2023-05-31', 4, 2),
(19, 'Praktimum', 'Ya gitu', '2023-05-25', 3, 5),
(20, 'TP3 GUI', 'Desripsi dengan sebuah isi', '2023-05-25', 2, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_tugas`
--
ALTER TABLE `tipe_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo_list`
--
ALTER TABLE `todo_list`
  ADD PRIMARY KEY (`id_todo`),
  ADD KEY `tipe` (`id_tipe`),
  ADD KEY `matkul` (`id_matkul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tipe_tugas`
--
ALTER TABLE `tipe_tugas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `todo_list`
--
ALTER TABLE `todo_list`
  MODIFY `id_todo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todo_list`
--
ALTER TABLE `todo_list`
  ADD CONSTRAINT `todo_list_ibfk_1` FOREIGN KEY (`id_matkul`) REFERENCES `mata_kuliah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `todo_list_ibfk_2` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_tugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
