-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 02:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(5) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `book_author_name` varchar(100) NOT NULL,
  `book_publication_name` varchar(100) NOT NULL,
  `book_purchase_date` varchar(100) NOT NULL,
  `book_price` varchar(100) NOT NULL,
  `book_qty` int(5) NOT NULL,
  `available_qty` int(5) NOT NULL,
  `librarian_username` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`, `datetime`) VALUES
(15, 'স্মৃতিতে হুমায়ূন আহমেদ (হার্ডকভার)', '20230104061003.jpg', 'মতিন রেজা', 'চৈতি', '2023-01-19', '230', 2, 433, 'motinreza', '2023-01-04 17:10:03'),
(16, 'হাবলুদের জন্য প্রোগ্রামিং (হার্ডকভার)', '20230104061229.jpg', 'মতিন রেজা', 'চৈতি', '2023-01-18', '450', 1, 42, 'motinreza', '2023-01-04 17:12:29'),
(17, 'লারাভেল পিএইচপি ওয়েব ফ্রেমওয়ার্ক-২য় সংস্করন', '20230104061427.gif', 'মতিন রেজা', 'চৈতি', '2023-01-26', '700', 5, 33, 'motinreza', '2023-01-04 17:14:27'),
(18, 'Tales From Shakespeare', '20230104061852.jpg', 'Motin Reza', 'fox', '2023-02-02', '300', 3, 45, 'motinreza', '2023-01-04 17:18:52'),
(19, 'Timeless Story Greece (Paperback)', '20230104062251.jpg', 'Sunny ', 'Ecclesiastes', '2023-02-01', '246', 2, 55, 'motinreza', '2023-01-04 17:22:51'),
(20, 'A Temporary Sojourn and Other Stories', '20230104062451.gif', 'Andrew', 'Ecclesiastes', '2023-02-02', '343', 453, 433, 'motinreza', '2023-01-04 17:24:51'),
(21, 'বুক অব ইসলামিক নলেজ (হার্ডকভার)', '20230105083427.jpg', 'Al farabi', 'Islamic Research', '2023-01-25', '320', 23, 560, 'motinreza', '2023-01-05 07:34:27'),
(22, 'Children Islamic Stories - Level 3 (English)', '20230105083548.jpg', 'Khalid sufi', 'Childen box', '2023-01-26', '240', 2, 55, 'motinreza', '2023-01-05 07:35:48'),
(23, 'The Young Muslim Series, Book 1', '20230105083707.jpg', 'Soniya sumaiya', 'Islamic fundation', '2023-01-26', '330', 1, 455, 'motinreza', '2023-01-05 07:37:07'),
(24, 'চল (হার্ডকভার)', '20230105084600.jpg', 'অন্তিক মাহমুদ', 'চৈতি', '2023-01-19', '215', 2, 435, 'motinreza', '2023-01-05 07:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `id` int(5) NOT NULL,
  `student_id` int(5) NOT NULL,
  `book_id` int(5) NOT NULL,
  `book_issu_date` varchar(100) NOT NULL,
  `book_return_date` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `student_id`, `book_id`, `book_issu_date`, `book_return_date`, `datetime`) VALUES
(1, 1, 9, '05-24-2022', '26-05-22', '2022-05-24 10:15:37'),
(2, 2, 10, '05-24-2022', '26-05-22', '2022-05-24 10:15:55'),
(4, 2, 10, '05-24-2022', '', '2022-05-24 10:20:16'),
(6, 1, 11, '05-24-2022', '26-05-22', '2022-05-24 14:22:37'),
(7, 1, 11, '05-24-2022', '26-05-22', '2022-05-24 14:22:54'),
(8, 1, 11, '05-24-2022', '26-05-22', '2022-05-24 16:06:10'),
(9, 2, 11, '05-26-2022', '', '2022-05-26 07:02:45'),
(10, 1, 11, '05-26-2022', '26-05-22', '2022-05-26 07:03:33'),
(11, 1, 11, '05-26-2022', '26-05-22', '2022-05-26 07:14:58'),
(12, 1, 15, '01-04-2023', '04-01-23', '2023-01-04 17:25:32'),
(13, 1, 15, '01-04-2023', '', '2023-01-04 17:25:54'),
(14, 2, 16, '01-04-2023', '', '2023-01-04 17:26:06'),
(15, 3, 19, '01-04-2023', '', '2023-01-04 17:26:15'),
(16, 4, 20, '01-04-2023', '', '2023-01-04 17:26:24'),
(17, 2, 17, '01-05-2023', '', '2023-01-05 07:00:12'),
(18, 3, 15, '01-05-2023', '', '2023-01-05 07:00:28'),
(19, 4, 20, '01-05-2023', '', '2023-01-05 07:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `id` int(5) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `datetime`) VALUES
(1, 'Motin Reza', 'librarian', 'motinreza2000@gmail.com', 'motinreza', 'motinlibrarian2021!', '2022-05-22 02:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(5) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `roll` int(6) NOT NULL,
  `reg` int(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phone`, `image`, `status`, `datetime`) VALUES
(1, 'Motin Student', 'Reza', 158226, 150096, 'motinreza3000@gmail.com', 'motinreza', 'motinstudent2021!', '01872585542', NULL, 1, '2022-05-21 09:55:47'),
(2, 'Kawsar', 'Ahmed', 158227, 150097, 'kawsar@gamil.com', 'kawsarahmed', 'kawsar2021!', '01872585543', NULL, 1, '2022-05-21 09:56:33'),
(3, 'Nafiza', 'Ahmed', 158234, 150045, 'nafiza@gamil.com', 'nafizaahmed', 'nafiza2021!', '01872585556', NULL, 1, '2022-05-21 09:56:33'),
(4, 'Mafiya', 'Reza', 158226, 150096, 'mafiya2000@gmail.com', 'mafiya', 'mafiya2021!', '01872585569', NULL, 1, '2022-05-21 09:55:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
