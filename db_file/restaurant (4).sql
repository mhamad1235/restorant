-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 04:44 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_product`
--

CREATE TABLE `add_product` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `subcat_id` int(11) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_product`
--

INSERT INTO `add_product` (`id`, `image`, `name`, `price`, `description`, `subcat_id`, `status`) VALUES
(1, 'hamburger-meat.jpg', 'هەمبەرگر گۆشت', '1500', '...', 4, 'yes'),
(2, 'sandwich-chicken.jpg', 'هەمبەرگر مریشك', '1000', '...', 4, 'yes'),
(3, 'cheeseburger.jpg', 'هەمبەرگر گۆشت بە پەنیر', '2000', '...', 4, 'yes'),
(4, 'hamburger-cheese.jpg', 'هەمبەرگر مریشك بە پەنیر ', '2000', '...', 4, 'yes'),
(5, 'white_burger.jpg', 'هەمبەرگر بیض', '1500', '...', 4, 'yes'),
(6, 'kfc_and_pepsi.jpg', 'کنتاکی ٥ پارچە + پیپسی', '2000', '...', 4, 'yes'),
(8, 'meat-pizza.jpg', 'پیتزا گۆشت', '4000', '...', 1, 'yes'),
(9, 'chicken-pizza.jpg', 'پیتزا مریشك', '4000', '...', 1, 'yes'),
(10, 'mixed-pizza.jpg', 'پیتزا مشکل', '4000', '...', 1, 'yes'),
(11, 'vegetable_pizza.jpg', 'پیتزا خظروات', '4000', '...', 1, 'yes'),
(12, 'meat-pizza.jpg', 'پیتزا Bloomrest', '4000', '...', 1, 'yes'),
(13, 'Margherita-Pizza.jpg', 'پیتزا مارکریتا', '4000', '...', 1, 'yes'),
(14, 'pizza_burger_french_fries.jpg', 'پتزا گۆشت + پتزاخ + برگر + فینگر ', '12000', '....', 1, 'yes'),
(15, 'rice_and_beans.jpg', 'سادە', '2000', '...', 2, 'yes'),
(16, 'rice,meat_and_beans.jpg', 'قۆزی', '6000', '...', 2, 'yes'),
(17, 'brnj_u_mrishk.jpg', 'برنج و مریشك', '4000', '...', 2, 'yes'),
(18, 'chicken_shawarma_2.jpg', 'شاورمە لەسەر برنج', '4000', '...', 2, 'yes'),
(19, 'bryani_with_chicken.jpg', 'بریانی', '3000', '...', 2, 'yes'),
(20, 'meze mqabilat 2.jpg', 'مقبلات جۆراوجۆر', '2000', '...', 5, 'yes'),
(21, 'french_fries_3.jpg', 'فینگر ', '1000', '...', 5, 'yes'),
(22, 'Cheese-Fries_2.jpg', 'فینگر بە پەنیر', '1500', '...', 5, 'yes'),
(23, 'Crispy-Fried-Onion-Rings.jpg', 'پیازی ئەڵقە', '1000', '...', 5, 'yes'),
(24, 'chicken_shawarma.jpg', 'شاورمە مریشك', '1500', '...', 3, 'yes'),
(25, 'beef-shawarma.jpg', 'شاورمە گۆشت', '1500', '...', 3, 'yes'),
(26, 'fruits.jpg', 'میوەی جۆراوجۆر', '2000', '...', 6, 'yes'),
(27, 'paqlawa.jpg', 'پاقڵاوە بە فستق ', '1000', '...', 6, 'yes'),
(28, 'paqlawa.jpg', 'پاقڵاوە بە گوێز', '750', '...', 6, 'yes'),
(29, 'cake.jpg', 'کێک بە شیر', '1500', '...', 6, 'yes'),
(30, 'knafa.jpg', 'کنافە بە پەنیر', '2000', '...', 6, 'yes'),
(31, 'knafa2.JPG', 'کنافە بە قشطە', '2000', '...', 6, 'yes'),
(32, 'محەلەبی.jpg', 'محەلەبی ', '1000', '...', 6, 'yes'),
(33, 'محەلەبی.jpg', 'محەلەبی بە پاقڵاوە', '1500', '...', 6, 'yes'),
(34, 'brmay_wshk.jpg', 'بڕمەی وشك', '500', '...', 6, 'yes'),
(35, 'water.webp', 'ئاو', '250', '...', 8, 'yes'),
(36, 'Ayran.jpg', 'ماستاو', '500', '...', 8, 'yes'),
(37, 'pepsi.jpg', 'بیبسی', '500', '....', 8, 'yes'),
(38, 'dew_drink.jpg', 'دیۆ', '500', '...', 8, 'yes'),
(39, 'sevenUp_drink.jpg', 'سێڤن ئەپ', '500', '...', 8, 'yes'),
(40, 'fanta.webp', 'فانتا ', '500', '...', 8, 'yes'),
(41, 'tea_2.jpg', 'چا', '250', '...', 7, 'yes'),
(42, 'simple-coffee.jpg', 'قاوەی سادە', '1000', '...', 7, 'yes'),
(43, 'qazwan_coffee.jpg', 'قاوەی قەزوان', '1000', '...', 7, 'yes'),
(44, 'chocolate_coffee.jpg', 'شکڵاتە', '500', '...', 7, 'yes'),
(45, 'green_tea_2.jpg', 'چای سەوز', '500', '...', 7, 'yes'),
(47, 'Juice.png', 'جیزەر', '2000', '...', 9, 'yes'),
(48, 'Juice.png', 'سێو', '2000', '...', 9, 'yes'),
(49, 'Juice.png', 'کێوی', '2000', '...', 9, 'yes'),
(50, 'Juice.png', 'شفتی', '2000', '...', 9, 'yes'),
(51, 'Juice.png', 'گندورە', '2000', '...', 9, 'yes'),
(52, 'Juice.png', 'ئەنەناس', '2000', '...', 9, 'yes'),
(53, 'Juice.png', 'مۆز و شیر', '2000', '...', 9, 'yes'),
(54, 'Juice.png', 'فڕاولە', '2000', '...', 9, 'yes'),
(55, 'Juice.png', 'هنار', '2000', '...', 9, 'yes'),
(56, 'Juice.png', 'لیمۆ', '2000', '...', 9, 'yes'),
(57, 'Juice.png', 'لیمۆ نەعناع', '2000', '...', 9, 'yes'),
(58, 'redbull.jpg', 'ڕێدبوڵ', '1500', '...', 10, 'yes'),
(60, 'mexico_tiger_drink.jpg', 'مکسیکی لیمۆ', '1500', '...', 10, 'yes'),
(61, 'Pomegranate_mexico drink.jpg', 'مکسیکی هەنار ', '1500', '....', 10, 'yes'),
(62, 'white_tiger_drink.png', 'وایت تایگەر ', '1000', '....', 10, 'yes'),
(63, 'pizza burger french fries.jpg', 'پیتزا پاپاڕۆنی', '4000', '...', 1, 'yes'),
(64, 'sandwich.webp', 'فاهیتا', '2000', '...', 3, 'yes'),
(65, 'sandwich.webp', 'فلادلفیا', '2000', '...', 3, 'yes'),
(66, 'scaloub.jpg', 'سکالوب', '2000', '...', 3, 'yes'),
(67, 'chicken crispy 2.jpg', 'کریسپی ', '2500', '....', 3, 'yes'),
(68, 'sandwich.webp', 'مکسیکی', '2000', '...', 3, 'yes'),
(69, 'hot potato.jpg', 'پەتاتەی گەرم ', '1000', '...', 5, 'yes'),
(71, 'Juice.png', 'پرتەقاڵ', '2000', 'شاز', 9, 'yes'),
(73, 'plng.jpg', 'تایگەر', '1000', 'شاز', 10, 'yes'),
(74, 'freeze.jpg', 'فریزز', '1250', '', 8, 'yes'),
(78, 'کاستەر.jpg', 'کاستەر', '1000', '.', 6, 'yes'),
(79, 'cappucino.webp', 'کاپۆچینۆ', '500', '...', 7, 'yes'),
(80, 'fire_ball.png', 'فایەر بۆڵ', '1000', '....', 10, 'yes'),
(81, 'shisha.jpg', 'نێرگەلە فنجان', '4000', '...', 12, 'yes'),
(82, 'shisha_fresh.jpg', 'نێرگەلەی سروشتی', '7000', '...', 13, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `add_user`
--

CREATE TABLE `add_user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `passwordd` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `groups` varchar(200) NOT NULL,
  `store` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_user`
--

INSERT INTO `add_user` (`id`, `firstName`, `lastName`, `username`, `email`, `passwordd`, `gender`, `groups`, `store`) VALUES
(1, 'captain', 'captain', 'captain', 'captain@gmail.com', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'male', 'HA', 'Bloom Rest'),
(2, 'captain2', 'cap', 'capcap', 'captain2@gmail.com', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'male', 'HA', 'Bloom Rest');

-- --------------------------------------------------------

--
-- Table structure for table `bill_id`
--

CREATE TABLE `bill_id` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `discount` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_id`
--

INSERT INTO `bill_id` (`id`, `created_at`, `discount`) VALUES
(1, '2022-10-27 18:32:39', 10),
(2, '2022-10-29 14:07:49', 50),
(3, '2022-10-29 14:10:45', 0),
(4, '2022-10-29 14:50:03', 50),
(5, '2022-10-29 15:11:02', 0),
(6, '2022-10-29 16:04:01', 50),
(7, '2022-10-29 16:06:37', 0),
(8, '2022-10-29 17:18:35', 0),
(9, '2022-10-29 17:46:06', 0),
(10, '2022-11-02 20:23:34', 0),
(11, '2022-11-02 20:24:12', 0),
(12, '2022-11-02 20:55:49', 0),
(13, '2022-11-03 03:28:14', 0),
(14, '2022-11-03 17:49:06', 0),
(15, '2022-11-03 17:50:15', 0),
(16, '2022-11-03 17:50:49', 50),
(17, '2022-11-04 15:28:08', 50);

-- --------------------------------------------------------

--
-- Table structure for table `book_table`
--

CREATE TABLE `book_table` (
  `id` int(11) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_table`
--

INSERT INTO `book_table` (`id`, `table_name`, `capacity`, `availability`, `status`) VALUES
(1, 'مێزی ژمارە یەک', '4', 'available', 'active'),
(2, 'مێزی ژمارە دوو', '4', 'available', 'active'),
(3, 'مێزی ژمارە سێ', '4', 'available', 'active'),
(4, 'مێزی ژمارە چوار', '4', 'available', 'active'),
(5, 'مێزی ژمارە پێنج', '4', 'available', 'active'),
(6, 'مێزی ژمارە شەش', '4', 'available', 'active'),
(7, 'مێزی ژمارە حەوت', '4', 'available', 'active'),
(8, 'مێزی ژمارە هەشت', '4', 'available', 'active'),
(9, 'مێزی ژمارە نۆ', '4', 'available', 'active'),
(10, 'مێزی ژمارە دە', '4', 'available', 'active'),
(11, 'مێزی ژمارە یازدە', '4', 'available', 'active'),
(12, 'مێزی ژمارە دوازدە', '4', 'available', 'active'),
(13, 'مێزی ژمارە سێزدە', '4', 'available', 'active'),
(14, 'مێزی ژمارە چواردە', '4', 'available', 'active'),
(15, 'مێزی ژمارە پازدە', '2', 'available', 'active'),
(16, 'مێزی ژمارە شازدە', '5', 'available', 'active'),
(17, 'مێزی ژمارە حەڤدە', '5', 'available', 'active'),
(18, 'مێزی ژمارە هەژدە', '5', 'available', 'active'),
(19, 'مێزی ژمارە نۆزدە', '5', 'available', 'active'),
(20, 'مێزی ژمارە بیست', '5', 'available', 'active'),
(21, 'مێزی ژمارە بیستویەک', '5', 'available', 'active'),
(22, 'مێزی ژمارە بیستودوو', '5', 'available', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `status`) VALUES
(1, 'خواردنەوەکان', 'active'),
(2, 'خواردنەکان', 'active'),
(3, 'حلویات و میوە', 'active'),
(4, 'نێرگەلە', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `address` varchar(150) NOT NULL,
  `country` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `currency` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `make_group`
--

CREATE TABLE `make_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `make_group`
--

INSERT INTO `make_group` (`id`, `group_name`, `status`) VALUES
(10, 'HA', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `table_id`, `weight`, `created_at`) VALUES
(12, 8, 2, '2022-11-02 18:10:06'),
(15, 3, 0, '2022-11-03 04:23:53'),
(16, 10, 0, '2022-11-03 17:46:46'),
(17, 6, 0, '2022-11-03 17:47:12'),
(18, 4, 0, '2022-11-03 17:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `bill_id`, `product_id`, `table_id`, `quantity`) VALUES
(1, 1, 6, 2, 2),
(2, 1, 2, 2, 4),
(3, 1, 1, 2, 4),
(4, 1, 3, 2, 1),
(5, 1, 5, 2, 1),
(6, 2, 9, 2, 2),
(7, 3, 1, 2, 1),
(8, 3, 2, 2, 2),
(9, 4, 13, 2, 2),
(10, 4, 45, 2, 2),
(11, 5, 3, 2, 7),
(12, 5, 6, 2, 3),
(13, 6, 2, 14, 2),
(14, 6, 3, 14, 2),
(15, 6, 30, 14, 2),
(16, 7, 45, 9, 1),
(17, 7, 6, 9, 1),
(18, 7, 26, 9, 1),
(19, 7, 74, 9, 5),
(20, 7, 71, 9, 3),
(21, 8, 12, 11, 1),
(22, 8, 13, 11, 3),
(23, 9, 4, 1, 3),
(24, 9, 2, 1, 1),
(25, 9, 6, 1, 3),
(26, 10, 6, 1, 1),
(27, 10, 5, 1, 1),
(28, 10, 9, 1, 1),
(29, 10, 10, 1, 3),
(30, 10, 4, 1, 1),
(31, 11, 2, 5, 1),
(32, 11, 3, 5, 8),
(33, 11, 6, 5, 4),
(34, 11, 5, 5, 9),
(35, 11, 15, 5, 1),
(36, 12, 2, 2, 1),
(37, 13, 3, 3, 7),
(38, 13, 2, 3, 7),
(39, 13, 6, 3, 1),
(40, 13, 5, 3, 2),
(41, 13, 74, 3, 4),
(42, 14, 5, 2, 2),
(43, 14, 2, 2, 7),
(44, 14, 4, 2, 1),
(45, 14, 9, 2, 1),
(46, 14, 3, 2, 4),
(47, 14, 6, 2, 1),
(48, 15, 41, 5, 3),
(49, 15, 38, 5, 1),
(50, 15, 40, 5, 1),
(51, 15, 3, 5, 9),
(52, 15, 2, 5, 7),
(53, 16, 6, 22, 8),
(54, 16, 5, 22, 10),
(55, 16, 3, 22, 16),
(56, 16, 10, 22, 11),
(57, 16, 4, 22, 1),
(58, 16, 1, 22, 1),
(59, 16, 2, 22, 6),
(60, 17, 41, 2, 2),
(61, 17, 42, 2, 2),
(62, 17, 45, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `store_name`, `status`) VALUES
(1, 'Bloom Rest', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subcat`
--

CREATE TABLE `subcat` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcat`
--

INSERT INTO `subcat` (`id`, `cat_id`, `name`, `status`) VALUES
(1, 2, 'پیتزا', 'active'),
(2, 2, 'ژەمی ڕۆژانە', 'active'),
(3, 2, 'ساندویچات', 'active'),
(4, 2, 'همبرگر', 'active'),
(5, 2, 'مقبلات', 'active'),
(6, 3, 'حلویات', 'active'),
(7, 1, 'خواردنەوەی گەرم', 'active'),
(8, 1, 'خواردنەوەی سارد', 'active'),
(9, 1, 'شەربەت', 'active'),
(10, 1, 'خواردنەوەی وزەبەخش', 'active'),
(12, 4, 'نێرگەلە فنجان', 'active'),
(13, 4, 'نێرگەلە سروشتی', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `temporary_order`
--

CREATE TABLE `temporary_order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temporary_order`
--

INSERT INTO `temporary_order` (`id`, `product_id`, `table_id`, `quantity`) VALUES
(106, 10, 4, 11),
(107, 13, 4, 2),
(108, 12, 4, 3),
(109, 4, 4, 1),
(117, 6, 8, 5),
(145, 2, 8, 1),
(148, 10, 3, 1),
(149, 9, 3, 1),
(150, 12, 3, 1),
(152, 36, 10, 3),
(153, 3, 10, 3),
(155, 3, 6, 1),
(156, 2, 6, 1),
(157, 18, 6, 1),
(158, 19, 6, 1),
(159, 73, 9, 1),
(160, 74, 9, 1),
(161, 71, 9, 1),
(162, 78, 9, 1),
(163, 6, 1, 1),
(164, 10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1'),
(2, 'balen', 'jalal', 'balen@gmail.com', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1'),
(3, 'yousif', 'aziz', 'yusf@gmail.com', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1'),
(4, 'admin', 'admin', 'admin@gmail.com', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_product`
--
ALTER TABLE `add_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcat_id` (`subcat_id`);

--
-- Indexes for table `add_user`
--
ALTER TABLE `add_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_id`
--
ALTER TABLE `bill_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_table`
--
ALTER TABLE `book_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `make_group`
--
ALTER TABLE `make_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcat`
--
ALTER TABLE `subcat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `temporary_order`
--
ALTER TABLE `temporary_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `table_id` (`table_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_product`
--
ALTER TABLE `add_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `add_user`
--
ALTER TABLE `add_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bill_id`
--
ALTER TABLE `bill_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `book_table`
--
ALTER TABLE `book_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `make_group`
--
ALTER TABLE `make_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcat`
--
ALTER TABLE `subcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `temporary_order`
--
ALTER TABLE `temporary_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_product`
--
ALTER TABLE `add_product`
  ADD CONSTRAINT `add_product_ibfk_1` FOREIGN KEY (`subcat_id`) REFERENCES `subcat` (`id`);

--
-- Constraints for table `subcat`
--
ALTER TABLE `subcat`
  ADD CONSTRAINT `subcat_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `temporary_order`
--
ALTER TABLE `temporary_order`
  ADD CONSTRAINT `temporary_order_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `add_product` (`id`),
  ADD CONSTRAINT `temporary_order_ibfk_2` FOREIGN KEY (`table_id`) REFERENCES `book_table` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
