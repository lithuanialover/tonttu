-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 09:58 AM
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
-- Database: `tonttu`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_kana` varchar(255) NOT NULL,
  `student_gender` enum('男の子','女の子') NOT NULL,
  `student_image` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `student_kana`, `student_gender`, `student_image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Richard', 'りちゃーど', '男の子', 'students/54W9swvnLollieA4mPFMXp0IyKkCKeOoB39EdjQ8.jpg', 1, '2023-01-17 08:50:48', '2023-01-17 08:50:48'),
(2, 'Susan', 'スーザン', '女の子', 'students/qwIvGqoQUZ4s7MQdgOJcWHPf7E57HAA7GCvnVyAW.jpg', 1, '2023-01-17 08:51:36', '2023-01-17 08:51:36'),
(3, 'Joseph', 'じょぜふ', '男の子', 'students/ikpinNOkTBpc1L4Rk0gE55xWycz2GGfyjQNnGaEB.jpg', 2, '2023-01-17 08:52:48', '2023-01-17 08:52:48'),
(4, 'Thomas', 'とーます', '男の子', 'students/J0dKk41oG6e2whqh3ueyTa6h61e5ATrRG4gQXXhQ.jpg', 2, '2023-01-17 08:53:07', '2023-01-17 08:53:07'),
(5, 'Charles', 'ちゃーるず', '男の子', 'students/aeRnpqbaomq4IEXQmSumM8lW12HDYXuI9UHUWmse.jpg', 3, '2023-01-17 08:53:58', '2023-01-17 08:53:58'),
(6, 'Karen', 'かれん', '女の子', 'students/u2OItZegsZIeaPaIhjjtLn04QnDM8Mm9NUzNvuWz.jpg', 3, '2023-01-17 08:54:18', '2023-01-17 08:54:18'),
(7, 'Lisa', 'りさ', '女の子', 'students/Wh0hEzewG8rmNu5BNhjSXh4bgK5lmBHnuwA8xYKl.jpg', 4, '2023-01-17 08:55:12', '2023-01-17 08:55:12'),
(8, 'Daniel', 'だにえる', '男の子', 'students/7QYhVvvgrnBO5sPx3JfzUEKFVPoomCCaGMYRfXso.jpg', 4, '2023-01-17 08:55:35', '2023-01-17 08:55:35'),
(9, 'Matthew', 'ましゅー', '男の子', 'students/EfHNNWxoIKInjwWcEaMh1PxzA0tPhkN5fFhecgwz.jpg', 5, '2023-01-17 08:57:20', '2023-01-17 08:57:20'),
(10, 'Anthony', 'あんそにー', '男の子', 'students/JOi0rfoEoCYTsRF4BtAj6SBgdOFN2Bg3iUOcJgcn.jpg', 5, '2023-01-17 08:57:37', '2023-01-17 08:57:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
