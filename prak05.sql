-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2023 at 06:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prak05`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id_course` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `duration` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id_course`, `title`, `description`, `duration`) VALUES
(1, 'Dasar Pemrograman dengan Javascript', 'Pada course ini kita akan mempelajari mengenai pemrograman dimulai dari 0 menggunakan bahasa pemrograman Javascript.', '12 Jam'),
(7, 'Course 2', 'Course ini adalah untuk test saja', '1 Jam'),
(8, 'Pembelajaran HTML Dasar', 'Pada course ini akan membahas mengenai HTML dasar.', '20 Jam');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id_material` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id_material`, `id_course`, `title`, `description`, `link`) VALUES
(1, 1, 'Dasar Pemorograman Javascript', 'Materi ini akan mengajarkan tentang dasar-dasar dari pemrograman Javascript', 'https://www.youtube.com/embed/RUTV_5m4VeI\"'),
(3, 7, 'bb', 'bb', ''),
(8, 1, 'Apa itu Pemrograman?', 'Materi ini akan mengulang dari awal tentang pemrograman.', 'https://www.youtube.com/embed/Ncrlg9kTC6U'),
(9, 7, 'bb', 'bb', ''),
(10, 1, 'Bahasa Pemrograman', 'Materi ini akan menjelaskan mengenai apa itu bahasa pemrograman.', 'https://www.youtube.com/embed/dugL0oYx0w0'),
(11, 1, 'Compiler & Interpreter', 'Materi ini menjelaskan mengenai apa itu compiler & interpreter, bagaimana cara kerjanya, dan bahasa pemrograman apa yang memiliki 2 hal tersebut.', 'https://www.youtube.com/embed/gCBysZKiU3Y'),
(12, 8, 'Pengenalan HTML', 'Materi ini berisi pengenalan tentang HTML', 'https://www.youtube.com/embed/NBZ9Ro6UKV8'),
(13, 8, 'Code Editor', 'Materi ini membahas mengenai Code Editor yang berfungsi dalam menuliskan dan menjalankan kode kita.', 'https://youtube.com/embed/3sLSi9L5nWE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_course`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `id_course` (`id_course`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
