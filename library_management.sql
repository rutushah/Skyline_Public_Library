-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2022 at 06:38 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(25) NOT NULL,
  `ISBN_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_detail`
--

CREATE TABLE `book_detail` (
  `ISBN_number` int(11) NOT NULL,
  `book_name` varchar(25) NOT NULL,
  `author_name` varchar(25) NOT NULL,
  `book_price` float NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `book_quantity` int(11) NOT NULL,
  `book_edition` varchar(25) NOT NULL,
  `publish_year` date NOT NULL,
  `rack_no` int(11) NOT NULL,
  `book_status` tinyint(1) NOT NULL,
  `e_book` varchar(255) NOT NULL,
  `book_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Finance'),
(2, 'Fiction'),
(3, 'Science'),
(4, 'History'),
(5, 'Drama'),
(6, 'Humor'),
(7, 'Peotry');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `issue_book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_issue_date` date NOT NULL,
  `book_return_date` date NOT NULL,
  `book_return_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `library_setting`
--

CREATE TABLE `library_setting` (
  `library_id` int(11) NOT NULL,
  `library_name` varchar(25) NOT NULL,
  `library_address` varchar(255) NOT NULL,
  `library_contact` varchar(10) NOT NULL,
  `library_email` varchar(255) NOT NULL,
  `book_return_day_limit` int(11) NOT NULL,
  `membership_price` float NOT NULL,
  `fine_per_day` float NOT NULL,
  `book_issue_limit` int(11) NOT NULL,
  `opening_time` varchar(25) NOT NULL,
  `closing_time` varchar(25) NOT NULL,
  `library_status` tinyint(1) NOT NULL,
  `important_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `registration_date` date NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `residence_proof` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `first_name`, `last_name`, `email_id`, `contact_number`, `password`, `address`, `registration_date`, `user_status`, `image`, `residence_proof`, `user_role`) VALUES
(7, 'Tapan', 'Shah', 'tapan@gmail.com', '5142334392', '$2y$10$q/CxlmqCr6m3t3cFzZgBH.VDGsfvwqUy5CkaPTnUmWPQT5OKUwhSi', '1901 knightsbridge road', '2022-10-21', 0, '20210729_164549.jpg', '20191125_145757.jpg', 1),
(8, 'Komal', 'Vekariya', 'komal@gmail.com', '4842548787', '$2y$10$uWZLkodRYds9Jv7JSXMs6uZlr6FAEE1U8x.EAtDB7HCTrZoJfuX3K', 'fhjdhh', '2022-10-22', 0, 'residence3.jpg', 'residence.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email_id` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  `registration_date` date NOT NULL,
  `pet_name` varchar(25) NOT NULL,
  `mother_name` varchar(25) NOT NULL,
  `birth_place` varchar(25) NOT NULL,
  `fine` float NOT NULL,
  `user_unique_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `residence_proof` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL,
  `account_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email_id`, `password`, `user_status`, `contact_number`, `address`, `payment_status`, `registration_date`, `pet_name`, `mother_name`, `birth_place`, `fine`, `user_unique_id`, `image`, `residence_proof`, `user_role`, `account_status`) VALUES
(70, 'komal', 'Vekariya', 'komal@gmail.com', '$2y$10$kQFL2pO0CcAnI9PSE2hYcOBOe3e/KJQqet9/qb/ttJr3m3tdN6EZ6', 0, '5142334548', 'xjfck', 0, '2022-10-21', 'jfcj', 'dxfj', 'ddfd', 0, 0, 'residence3.jpg', 'residence2.jpg', 2, 1),
(71, 'Rutu', 'Shah', 'rutu@gmail.com', '$2y$10$X/Q3m5swhMPE1CTxM9qebumh.4Ef5iZvsOHPBdm5md6xXL67uwxRW', 0, '7415455484', '12, Gadhwal Appartment, opp Uttamnagar Garden, Maninagar', 0, '2022-10-22', 'Detu', 'Ripalben', 'Bayad', 0, 0, 'profile.jpg', 'residence1.png', 2, 0),
(72, 'Unnati', 'Patel', 'unnati@gmail.com', '$2y$10$sWLP1NOU5RtA5kjbEot9qeek5AgzFT00u4FRfFo5YJBNMUUgbKZmu', 0, '8175136044', '1901 knightsbridge road\r\napt 8202', 0, '2022-10-22', 'Test', 'Test2', 'Test3', 0, 0, '20190926_161038.jpg', '20191229_105744.jpg', 2, 1),
(73, 'Detu', 'Shah', 'detu@gmail.com', '$2y$10$pezaCQVY7jGTy0tZD4omO.JQcRJB7u6hJDIMAH/tLmm68vqGKQWAu', 0, '5142334393', '1645 Boulevard de Maisonneuve Ouest\r\nApt 2004', 0, '2022-10-22', 'detu1', 'detu2', 'detu3', 0, 0, 'IMG_20191006_230020.jpg', 'IMG_20200114_181218.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_role_id` int(11) NOT NULL,
  `user_role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_role`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `ISBN_number` (`ISBN_number`);

--
-- Indexes for table `book_detail`
--
ALTER TABLE `book_detail`
  ADD PRIMARY KEY (`ISBN_number`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`issue_book_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `library_setting`
--
ALTER TABLE `library_setting`
  ADD PRIMARY KEY (`library_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `user_role` (`user_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role` (`user_role`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `issue_book_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library_setting`
--
ALTER TABLE `library_setting`
  MODIFY `library_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`ISBN_number`) REFERENCES `book_detail` (`ISBN_number`);

--
-- Constraints for table `book_detail`
--
ALTER TABLE `book_detail`
  ADD CONSTRAINT `book_detail_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD CONSTRAINT `issue_books_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `issue_books_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `user_role` (`user_role_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `user_role` (`user_role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
