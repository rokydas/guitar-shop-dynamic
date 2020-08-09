-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2020 at 05:42 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dream_guitarist`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profile_picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `profile_picture`) VALUES
('apu', 'apu', '3.jpg'),
('jhankar', 'jhankar', '4.jpg'),
('nayan', 'nayan', '1.jpg'),
('roky', 'roky', '2.jpg'),
('sagor', 'sagor', '6.jpg'),
('showrav', 'showrav', '8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `guitar_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `guitar_id`, `username`, `quantity`) VALUES
(164, 58, 'rokydas', 3),
(165, 10, 'rokydas', 2),
(166, 5, 'rokydas', 3),
(167, 43, 'rokydas', 2),
(168, 9, 'rokydas', 2),
(169, 24, 'rokydas', 1),
(170, 11, 'rokydas', 1),
(171, 38, 'rokydas', 1),
(172, 9, 'showravdevnathapu', 1),
(173, 18, 'showravdevnathapu', 1),
(174, 45, 'showravdevnathapu', 1),
(175, 47, 'showravdevnathapu', 1),
(176, 57, 'showravdevnathapu', 1),
(177, 8, 'showravdevnathapu', 1),
(178, 5, 'showravdevnathapu', 1),
(179, 40, 'showravdevnathapu', 1),
(180, 22, 'showravdevnathapu', 1),
(181, 33, 'showravdevnathapu', 1),
(182, 7, 'showravdevnathapu', 1),
(183, 11, 'showravdevnathapu', 1),
(184, 18, 'showravdas', 1),
(185, 22, 'showravdas', 1),
(186, 27, 'showravdas', 1),
(187, 3, 'showravdas', 1),
(188, 55, 'showravdas', 1),
(189, 35, 'nayandas', 1),
(190, 7, 'nayandas', 1),
(191, 57, 'nayandas', 1),
(192, 34, 'ketovhai', 1),
(193, 11, 'ketovhai', 1),
(194, 55, 'ketovhai', 1),
(195, 13, 'ketovhai', 1),
(196, 21, 'ketovhai', 1),
(197, 6, 'ketovhai', 1),
(198, 22, 'ketovhai', 1),
(199, 19, 'ketovhai', 1),
(200, 45, 'ketovhai', 1),
(201, 10, 'niloyroy', 1),
(202, 13, 'niloyroy', 1),
(203, 33, 'abulhosen', 1),
(204, 8, 'abulhosen', 1),
(205, 38, 'abulhosen', 1),
(206, 13, 'abulhosen', 1),
(207, 34, 'jabedhossain', 1),
(208, 21, 'jabedhossain', 1),
(209, 24, 'jabedhossain', 1),
(210, 20, 'sarujdutta', 1),
(211, 8, 'sarujdutta', 1),
(212, 9, 'sarujdutta', 1),
(213, 21, 'sarujdutta', 1),
(214, 18, 'sarujdutta', 1),
(215, 35, 'sarujdutta', 1),
(216, 14, 'sarujdutta', 1),
(217, 37, 'sarujdutta', 1),
(218, 58, 'sarujdutta', 1),
(219, 18, 'nurulabsar', 1),
(220, 16, 'nurulabsar', 1),
(221, 26, 'nurulabsar', 1),
(222, 27, 'nurulabsar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guitar`
--

CREATE TABLE `guitar` (
  `guitar_id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL,
  `presence` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guitar`
--

INSERT INTO `guitar` (`guitar_id`, `brand`, `model`, `image`, `price`, `presence`) VALUES
(1, 'Deviser', 'L720A', 'deviser9.jpg', 7500, b'0'),
(2, 'Deviser', 'L707', 'deviser11.jpg', 7000, b'0'),
(3, 'Deviser', 'L720B', 'deviser10.jpg', 8500, b'1'),
(4, 'Deviser', 'LS120', 'deviser3.jpg', 8000, b'0'),
(5, 'Deviser', 'L-620', 'deviser12.jpg', 7500, b'1'),
(6, 'Deviser', '770AN', 'deviser2.jpg', 9500, b'1'),
(7, 'Deviser', 'L-mini 05', 'deviser6.jpg', 8000, b'0'),
(8, 'Deviser', 'L-560A', 'deviser7.jpg', 9300, b'1'),
(9, 'Deviser', 'LG5', 'deviser8.jpg', 20000, b'1'),
(10, 'Deviser', 'DM-30', 'deviser13.jpg', 4300, b'1'),
(11, 'Deviser', 'L-910', 'deviser14.jpg', 11990, b'1'),
(12, 'AXE', 'AG 48', 'axe1.jpg', 6000, b'0'),
(13, 'AXE', 'Pure Black with EQ', 'axe2.jpg', 7290, b'1'),
(14, 'AXE', 'AG 48 (Yellow)', 'axe3.jpg', 6000, b'1'),
(15, 'AXE', 'AG 48 (Black)', 'axe4.jpg', 5800, b'0'),
(16, 'AXE', 'UK 24-70S', 'axe5.jpg', 5000, b'1'),
(17, 'AXE', 'BK (Black)', 'axe6.jpg', 5990, b'0'),
(18, 'Fender', 'Guitar Pick (10 pcs)', 'fender1.jpg', 220, b'1'),
(19, 'Fender', 'Guitar Strap', 'fender2.jpg', 149, b'1'),
(20, 'Fender', 'Ukalele 21 inch wooden', 'fender3.jpg', 5000, b'1'),
(21, 'Fender', '150 XL Electric Guitar Strings', 'fender4.jpg', 237, b'1'),
(22, 'Fender', '10 Meters fender cable', 'fender5.jpg', 1250, b'1'),
(23, 'Fender', 'Premium Instrument Cable', 'fender6.jpg', 890, b'0'),
(24, 'Fender', 'Guitar Capo', 'fender7.jpg', 189, b'1'),
(25, 'Fender', 'cd-60CE', 'fender8.jpg', 7500, b'0'),
(26, 'Fender', 'Guitar Belt', 'fender9.jpg', 550, b'1'),
(27, 'Fender', 'Fender CD-60 (Brown)', 'fender10.jpg', 12250, b'1'),
(32, 'Fender', 'Electric Guitar (Blue)', 'fender11.jpg', 20425, b'0'),
(33, 'Fender', 'Electric Guitar (Red)', 'fender12.jpg', 18990, b'1'),
(34, 'Fender', 'Electric Guitar (Black)', 'fender13.jpg', 98000, b'1'),
(35, 'Fender', 'California Instrument Cables', 'fender14.jpg', 645, b'1'),
(36, 'Yamaha', 'Acoustic Guitar Strings', 'yamaha1.jpg', 190, b'0'),
(37, 'Yamaha', 'Deep Blue Acoustic', 'yamaha2.jpg', 6000, b'1'),
(38, 'Yamaha', '4010 Acoustic', 'yamaha3.jpg', 7000, b'1'),
(39, 'Yamaha', 'Yamaha Guitar Capo', 'yamaha4.jpg', 940, b'1'),
(40, 'Yamaha', 'Yamaha F310 with amplifier', 'yamaha5.jpg', 18699, b'1'),
(41, 'Yamaha', 'Yamaha FGX-720C Top Cutway', 'yamaha6.jpg', 14500, b'0'),
(42, 'Yamaha', 'F310 with EQ (Wooden) ', 'yamaha7.jpg', 15890, b'0'),
(43, 'Yamaha', 'FG 800 (Solid Top)', 'yamaha8.jpg', 17500, b'1'),
(44, 'Yamaha', 'F-600 (Solid)', 'yamaha9.jpg', 15000, b'1'),
(45, 'Yamaha', 'F-30 (Semi - Acoustic)', 'yamaha10.jpg', 12250, b'1'),
(46, 'Yamaha', 'C - 315 (Classical)', 'yamaha11.jpg', 11270, b'0'),
(47, 'Yamaha', 'FG-700', 'yamaha12.jpg', 7800, b'1'),
(48, 'Yamaha', 'C-40 (Classical)', 'yamaha13.jpg', 14210, b'0'),
(49, 'Yamaha', 'APX500', 'yamaha14.jpg', 14500, b'0'),
(50, 'Ibanez', '270dx Electric Lead Guitar (Brown)', 'ibanez1.jpg', 19000, b'1'),
(51, 'Ibanez', 'Series 470', 'ibanez2.jpg', 17640, b'0'),
(52, 'Ibanez', 'V - 74', 'ibanez3.jpg', 15190, b'0'),
(53, 'Ibanez', 'Series 470', 'ibanez4.jpg', 20580, b'0'),
(54, 'Ibanez', 'GIO GRG 270 dx', 'ibanez5.jpg', 27000, b'1'),
(55, 'Ibanez', '4 String Bass', 'ibanez6.jpg', 23749, b'0'),
(56, 'Ibanez', 'UEW5-OPN', 'ibanez7.jpg', 9310, b'0'),
(57, 'Ibanez', 'V72', 'ibanez8.jpg', 17150, b'1'),
(58, 'Ibanez', 'SU03', 'ibanez9.jpg', 12250, b'1'),
(59, 'Ibanez', 'Concert Ukulele', 'ibanez10.jpg', 6000, b'0'),
(60, 'Deviser', 'LS570', 'deviser1.jpg', 9000, b'0'),
(61, 'Deviser', 'L625', 'deviser5.jpg', 7700, b'0'),
(62, 'Deviser', 'JA4040S', 'deviser4.jpg', 7000, b'0'),
(72, 'Omuk', 'Tomuk', 'fender12.jpg', 567, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `sell_id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sell_details`
--

CREATE TABLE `sell_details` (
  `sell_details_id` int(11) NOT NULL,
  `sell_id` int(11) DEFAULT NULL,
  `guitar_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `profile_picture` text DEFAULT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `cart_number` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `email`, `password`, `profile_picture`, `mobile_number`, `cart_number`) VALUES
(1, 'Showrav Dev', 'Nath Apu', 'showravdevnathapu', 'showravdev@gmail.com', 'showrav', '6.jpg', '01881569774', 11),
(2, 'Roky', 'Das', 'rokydas', 'rokydas@gmail.com', 'rokydas', '4.jpg', '01521227862', 8),
(3, 'Showrav', 'Das', 'showravdas', 'showravdas@gmail.com', '12345', '3.jpg', '01309722830', 4),
(4, 'Nayan', 'Das', 'nayandas', 'nayandas@gmail.com', 'nayandas', '6.jpg', '01856987452', 2),
(5, 'Keto', 'Vhai', 'ketovhai', 'ketovhai@gmail.com', 'ketovhai', '2.jpg', '01789564521', 8),
(6, 'Niloy', 'Roy', 'niloyroy', 'niloyroy@gmail.com', 'niloyroy', '10.jpg', '01236547896', 2),
(7, 'Abul', 'Hosen', 'abulhosen', 'abulhosen@gmail.com', 'abulhosen', '3.jpg', '01458796512', 4),
(8, 'Jabed', 'Hossain', 'jabedhossain', 'jabedhossain@gmail.c', 'jabedhossain', '9.jpg', '01324125879', 3),
(9, 'Saruj', 'Dutta', 'sarujdutta', 'sarujdutta@gmail.com', 'sarujdutta', '5.jpg', '01963452187', 9),
(10, 'Nurul', 'Absar', 'nurulabsar', 'nurulabsar@gmail.com', 'nurulabsar', '3.jpg', '01234859674', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `guitar`
--
ALTER TABLE `guitar`
  ADD PRIMARY KEY (`guitar_id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`sell_id`);

--
-- Indexes for table `sell_details`
--
ALTER TABLE `sell_details`
  ADD PRIMARY KEY (`sell_details_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `guitar`
--
ALTER TABLE `guitar`
  MODIFY `guitar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `sell_details`
--
ALTER TABLE `sell_details`
  MODIFY `sell_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
