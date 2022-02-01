-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 02:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(255) NOT NULL,
  `brand_name` varchar(500) NOT NULL,
  `brand_description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_description`) VALUES
(1, 'NA', 'srilankan company biscuits and cakes'),
(2, 'nestle', 'Milk packet,Milo '),
(3, 'Munchi', 'biscuits mainly'),
(4, 'wasana', 'cake '),
(5, 'bakehouse', 'shorties,cakes'),
(6, 'b3', 'sweets'),
(7, 'Walgma bakery', 'Mathara branch'),
(8, 'Highland', 'You can get milk Youghurt,milk packets ant etc'),
(9, 'seafoods', 'safkwlfopewop'),
(10, 'default', 'any kind of'),
(11, 'qew', 'wqqd'),
(12, 'nnka', 'uoaPSALS'),
(13, 'p&s', 'cake'),
(14, 'AAA', 'Great');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `product_id` int(20) DEFAULT NULL,
  `total` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Breakfast'),
(2, 'Lunch'),
(3, 'Inventory');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `staff_or_student` varchar(4) NOT NULL,
  `wallet_id` int(20) NOT NULL,
  `uni_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `user_id`, `staff_or_student`, `wallet_id`, `uni_id`) VALUES
(17, 24, 'STD', 11, ''),
(18, 25, 'Nece', 16, ''),
(19, 26, 'Dese', 17, ''),
(20, 27, 'Elig', 18, ''),
(21, 28, 'Nemo', 19, ''),
(22, 29, 'Nost', 20, ''),
(23, 30, 'STD', 21, ''),
(24, 31, 'STD', 22, ''),
(25, 32, 'STD', 23, ''),
(28, 37, 'STD', 27, '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `description` varchar(600) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `username`, `topic`, `description`, `time`) VALUES
(1, 'fnlefj', '', 'fenjfwf', '2022-01-24 00:16:56'),
(2, 'fnlefj', '', 'fenjfwf', '2022-01-24 00:16:56'),
(3, 'namindu40', '', 'feaf', '2022-01-24 00:16:56'),
(4, 'namindu40', 'About service', 'vjvjb', '2022-01-24 00:16:56'),
(5, 'namindu40', 'Other', 'njkvsheufnsjvne.gwev', '2022-01-24 00:16:56'),
(6, 'namindu40', 'About food', 'efsejilgsr', '2022-01-24 00:16:56'),
(7, 'namindu40', 'Other', 'Feedback', '2022-01-24 00:16:56'),
(8, 'namindu40', 'About food', 'dkopsgr', '2022-01-24 00:16:56'),
(9, 'namindu40', 'About food', 'Misleading marketing, human hair was found in the Kottu.', '2022-01-24 00:16:56'),
(10, 'Govin95', 'About hygiene', 'Pices of hair find the KOttu', '2022-01-24 10:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `fyp`
--

CREATE TABLE `fyp` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_id` int(20) NOT NULL,
  `name` text NOT NULL,
  `des` text NOT NULL,
  `quantity` text NOT NULL,
  `sales` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fyp`
--

INSERT INTO `fyp` (`id`, `time`, `product_id`, `name`, `des`, `quantity`, `sales`) VALUES
(537, '2021-08-01 17:09:35', 0, 'Bun', 'ok', '67', '79'),
(538, '2021-08-08 17:10:02', 0, 'Bun', 'ok', '73', '72'),
(539, '2021-08-15 17:15:45', 0, 'Bun', 'ok', '24', '25'),
(541, '2021-08-21 19:30:36', 0, 'Bun', 'ok', '78', '120'),
(545, '2021-09-15 13:32:33', 0, 'Rice', 'vege', '24', '45'),
(547, '2021-09-15 13:53:01', 0, 'Rice', 'vege', '24', '34'),
(548, '2021-09-15 13:53:32', 0, 'Rice', 'vege', '34', '23'),
(549, '2021-09-15 13:54:57', 0, 'Milk', 'fresh', '12', '16'),
(550, '2021-09-15 13:55:24', 0, 'Milk', 'fresh', '32', '45'),
(551, '2021-09-15 13:55:37', 0, 'Milk', 'fresh', '56', '8'),
(552, '2021-09-15 13:55:58', 0, 'Milk', 'fresh', '34', '15'),
(553, '2021-09-15 13:56:22', 0, 'Milk', 'fresh', '12', '23'),
(554, '2021-09-15 13:56:49', 0, 'String Hoppers', 'ok', '12', '34'),
(555, '2021-09-15 13:57:08', 0, 'String Hoppers', 'ok', '34', '21'),
(556, '2021-09-15 15:03:30', 0, 'Noodles', 'hm', '12', '36'),
(557, '2021-09-15 15:03:50', 0, 'Noodles', 'dk', '12', '33'),
(558, '2021-09-15 15:04:18', 0, 'Noodles', 'er', '23', '15'),
(559, '2021-09-15 15:04:36', 0, 'Noodles', 'we', '17', '19'),
(562, '2021-12-06 17:50:12', 0, 'Milk rice', 'ok', '10', '20'),
(563, '2021-12-07 17:50:12', 0, 'Milk rice', 'ok', '30', '40'),
(564, '2021-12-08 17:51:31', 0, 'Milk rice', 'ok', '50', '60'),
(565, '2021-12-09 17:51:31', 0, 'Milk rice', 'ok', '70', '80'),
(566, '2021-12-10 17:51:31', 0, 'Milk rice', 'ok', '90', '100'),
(567, '2021-12-13 17:51:31', 0, 'Milk rice', 'ok', '110', '120'),
(568, '2021-12-14 17:51:31', 0, 'Milk rice', 'ok', '130', '140'),
(569, '2021-12-15 17:51:31', 0, 'Milk rice', 'ok', '150', '160'),
(570, '2021-12-16 17:51:31', 0, 'Milk rice', 'ok', '170', '180'),
(571, '2021-12-17 17:51:31', 0, 'Milk rice', 'ok', '190', '200'),
(1110, '2022-01-22 19:53:44', 115, 'TE', '', '0', '0'),
(1109, '2022-01-22 19:53:44', 106, 'Boiled Eggs', '', '0', '0'),
(1108, '2022-01-22 19:53:44', 105, 'Pol sambola', '', '0', '0'),
(1107, '2022-01-22 19:53:44', 94, 'Cutlet', '', '0', '0'),
(1106, '2022-01-22 19:53:44', 93, 'Bullseye eggs', '', '0', '0'),
(1105, '2022-01-22 19:53:44', 91, 'Chicken curry', '', '0', '0'),
(1104, '2022-01-22 19:53:44', 90, 'Fish Curry ', '', '0', '0'),
(1103, '2022-01-22 19:53:44', 88, 'Potato curry', '', '0', '0'),
(1102, '2022-01-22 19:53:44', 87, 'Eggs', '', '0', '0'),
(1101, '2022-01-22 19:53:44', 84, 'Beans curry', '', '0', '0'),
(1100, '2022-01-22 19:53:44', 83, 'Dhal Curry', '', '0', '0'),
(1099, '2022-01-22 19:53:44', 116, 'lemon', '', '0', '0'),
(1098, '2022-01-22 19:53:44', 113, 'Milk packet', '', '0', '0'),
(1097, '2022-01-22 19:53:44', 112, 'Lemon Juice', '', '0', '0'),
(1096, '2022-01-22 19:53:44', 111, 'Yoghurt', '', '0', '0'),
(1095, '2022-01-22 19:53:44', 110, 'Milk tea', '', '0', '0'),
(1094, '2022-01-22 19:53:44', 109, 'Chocolate cake ', '', '0', '0'),
(1093, '2022-01-22 19:53:44', 107, 'plane tea', '', '0', '0'),
(1092, '2022-01-22 19:53:44', 54, '', '', '0', '0'),
(1091, '2022-01-22 19:53:44', 52, '', '', '0', '0'),
(1090, '2022-01-22 19:53:44', 50, '', '', '0', '0'),
(1089, '2022-01-22 19:53:44', 48, '', '', '0', '0'),
(1088, '2022-01-22 19:53:44', 46, '', '', '0', '0'),
(1087, '2022-01-22 19:53:44', 45, '', '', '0', '0'),
(1086, '2022-01-22 19:53:44', 43, '', '', '0', '0'),
(1085, '2022-01-22 19:53:44', 41, '', '', '0', '0'),
(1084, '2022-01-22 19:53:44', 39, '', '', '0', '0'),
(1083, '2022-01-22 19:53:44', 37, '', '', '0', '0'),
(1082, '2022-01-22 19:53:44', 35, '', '', '0', '0'),
(1081, '2022-01-22 19:53:44', 33, '', '', '0', '0'),
(1080, '2022-01-22 19:53:44', 31, '', '', '0', '0'),
(1079, '2022-01-22 19:53:44', 29, '', '', '0', '0'),
(1078, '2022-01-22 19:53:44', 117, 'sweets', '', '0', '0'),
(1077, '2022-01-22 19:53:44', 104, 'Egg Buns', '', '0', '0'),
(1076, '2022-01-22 19:53:44', 103, 'Sausage Bun', '', '0', '0'),
(1075, '2022-01-22 19:53:44', 102, 'Noodles', '', '1', '40'),
(1074, '2022-01-22 19:53:44', 101, 'sandwich', '', '0', '0'),
(1073, '2022-01-22 19:53:44', 89, 'Chicken Kottu', '', '3', '240'),
(1072, '2022-01-22 19:53:44', 86, 'Egg rice & curry', '', '0', '0'),
(1071, '2022-01-22 19:53:44', 82, 'chicken fried rice ', '', '2', '160'),
(1070, '2022-01-22 19:53:44', 81, 'Chicken rice & curry', '', '1', '50'),
(1069, '2022-01-22 09:40:40', 115, 'TE', '', '0', '0'),
(1068, '2022-01-22 09:40:40', 106, 'Boiled Eggs', '', '0', '0'),
(1067, '2022-01-22 09:40:40', 105, 'Pol sambola', '', '0', '0'),
(1066, '2022-01-22 09:40:40', 94, 'Cutlet', '', '0', '0'),
(1065, '2022-01-22 09:40:40', 93, 'Bullseye eggs', '', '0', '0'),
(1064, '2022-01-22 09:40:40', 91, 'Chicken curry', '', '0', '0'),
(1063, '2022-01-22 09:40:40', 90, 'Fish Curry ', '', '0', '0'),
(1062, '2022-01-22 09:40:40', 88, 'Potato curry', '', '0', '0'),
(1061, '2022-01-22 09:40:40', 87, 'Eggs', '', '0', '0'),
(1060, '2022-01-22 09:40:40', 84, 'Beans curry', '', '1', '15'),
(1059, '2022-01-22 09:40:40', 83, 'Dhal Curry', '', '1', '15'),
(1058, '2022-01-22 09:40:40', 116, 'lemon', '', '0', '0'),
(1057, '2022-01-22 09:40:40', 113, 'Milk packet', '', '0', '0'),
(1056, '2022-01-22 09:40:40', 112, 'Lemon Juice', '', '0', '0'),
(1055, '2022-01-22 09:40:40', 111, 'Yoghurt', '', '0', '0'),
(1054, '2022-01-22 09:40:40', 110, 'Milk tea', '', '0', '0'),
(1053, '2022-01-22 09:40:40', 109, 'Chocolate cake ', '', '0', '0'),
(1052, '2022-01-22 09:40:40', 107, 'plane tea', '', '0', '0'),
(1051, '2022-01-22 09:40:40', 54, '', '', '0', '0'),
(1050, '2022-01-22 09:40:40', 52, '', '', '0', '0'),
(1049, '2022-01-22 09:40:40', 50, '', '', '0', '0'),
(1048, '2022-01-22 09:40:40', 48, '', '', '0', '0'),
(1047, '2022-01-14 09:40:40', 46, 'Milk rice', '', '90', '100'),
(1046, '2022-01-13 09:40:40', 45, 'Milk rice', '', '70', '80'),
(1045, '2022-01-12 09:40:40', 43, 'Milk rice', '', '60', '70'),
(1044, '2022-01-11 09:40:40', 41, 'Milk rice', '', '50', '60'),
(1043, '2022-01-10 09:40:40', 39, 'Milk rice', '', '40', '50'),
(1042, '2022-01-07 09:40:40', 37, 'Milk rice', '', '30', '40'),
(1041, '2022-01-06 09:40:40', 35, 'Milk rice', '', '20', '30'),
(1040, '2022-01-05 09:40:40', 33, 'Milk rice', '', '100', '120'),
(1039, '2022-01-04 09:40:40', 31, 'Milk rice', '', '40', '50'),
(1038, '2022-01-03 09:40:40', 29, 'Milk rice', '', '50', '60'),
(1037, '2022-01-22 09:40:40', 117, 'sweets', '', '0', '0'),
(1036, '2022-01-22 09:40:40', 104, 'Egg Buns', '', '0', '0'),
(1035, '2022-01-22 09:40:40', 103, 'Sausage Bun', '', '0', '0'),
(1034, '2022-01-22 09:40:40', 102, 'Noodles', '', '1', '40'),
(1033, '2022-01-22 09:40:40', 101, 'sandwich', '', '0', '0'),
(1032, '2022-01-22 09:40:40', 89, 'Chicken Kottu', '', '2', '160'),
(1031, '2022-01-22 09:40:40', 86, 'Egg rice & curry', '', '1', '55'),
(1030, '2022-01-22 09:40:40', 82, 'chicken fried rice ', '', '1', '80'),
(1029, '2022-01-22 09:40:40', 81, 'Chicken rice & curry', '', '1', '50');

-- --------------------------------------------------------

--
-- Table structure for table `kitchen`
--

CREATE TABLE `kitchen` (
  `kitchen_id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `order_number` int(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `order_status` varchar(10) DEFAULT NULL,
  `order_due_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu_identifier`
--

CREATE TABLE `menu_identifier` (
  `id` int(20) NOT NULL,
  `menu_id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_identifier`
--

INSERT INTO `menu_identifier` (`id`, `menu_id`, `name`) VALUES
(1, 0, 'Breakfast'),
(3, 1, 'Lunch'),
(4, 2, 'Other'),
(5, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(20) NOT NULL,
  `order_number` int(20) DEFAULT NULL,
  `customer_id` int(20) DEFAULT NULL,
  `order_time` datetime DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_status` varchar(10) DEFAULT NULL,
  `payment_method` varchar(10) DEFAULT NULL,
  `payment_status` varchar(10) DEFAULT NULL,
  `total` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `online_transaction`
--

CREATE TABLE `online_transaction` (
  `Trans_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `add_date` varchar(100) NOT NULL,
  `paid_amount` double(50,2) NOT NULL,
  `description` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `online_transaction`
--

INSERT INTO `online_transaction` (`Trans_id`, `customer_id`, `add_date`, `paid_amount`, `description`) VALUES
(2, 27, 'Monday 17th of January 2022 08:45:19 AM', 50.00, 1),
(3, 27, 'Monday 17th of January 2022 08:51:37 AM', 100.00, 1),
(4, 26, 'Monday 17th of January 2022 08:56:37 AM', 50.00, 1),
(5, 26, 'Tuesday 18th of January 2022 05:20:13 AM', 50.00, 1),
(6, 26, 'Tuesday 18th of January 2022 11:17:17 AM', 50.00, 1),
(7, 25, 'Wednesday 19th of January 2022 06:21:54 AM', 320.00, 1),
(8, 25, 'Wednesday 19th of January 2022 06:34:35 AM', 320.00, 1),
(9, 25, 'Wednesday 19th of January 2022 07:06:50 AM', 80.00, 1),
(10, 25, 'Wednesday 19th of January 2022 07:29:11 AM', 60.00, 1),
(11, 25, 'Wednesday 19th of January 2022 09:00:02 AM', 100.00, 1),
(12, 25, 'Wednesday 19th of January 2022 09:02:35 AM', 80.00, 1),
(13, 25, 'Thursday 20th of January 2022 08:27:27 AM', 180.00, 1),
(14, 25, 'Thursday 20th of January 2022 08:32:17 AM', 50.00, 1),
(15, 25, 'Thursday 20th of January 2022 08:40:44 AM', 80.00, 1),
(16, 25, 'Sunday 23rd of January 2022 04:01:15 PM', 480.00, 1),
(17, 25, 'Sunday 23rd of January 2022 10:56:38 PM', 160.00, 1),
(18, 27, 'Monday 24th of January 2022 10:45:05 AM', 160.00, 1),
(19, 27, 'Monday 24th of January 2022 10:46:48 AM', 320.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_number` int(20) NOT NULL,
  `customer_id` int(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `dine_or_takeaway` varchar(10) DEFAULT NULL,
  `total` varchar(10) DEFAULT NULL,
  `order_status` varchar(10) DEFAULT NULL,
  `payment_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_number`, `customer_id`, `username`, `dine_or_takeaway`, `total`, `order_status`, `payment_type`) VALUES
(17, 25, 'namindu40', 'Take away', '100', 'Completed', 'Credit'),
(18, 25, 'namindu40', 'Take away', '105', 'Completed', 'Credit'),
(19, 32, 'namindu40', 'Dine', '80', 'Completed', 'Online'),
(20, 25, 'namindu40', 'Take away', '50', 'Completed', 'Credit'),
(21, 25, 'namindu40', 'Dine', '60', 'Completed', 'Online'),
(22, 25, 'namindu40', 'Take away', '105', 'Completed', 'Credit'),
(23, 25, 'namindu40', 'Dine', '100', 'Accepted', 'Online'),
(24, 25, 'namindu40', 'Take away', '80', 'Accepted', 'Online'),
(25, 25, 'namindu40', 'Dine', '50', 'Completed', 'Credit'),
(26, 25, 'namindu40', 'Take away', '180', 'Completed', 'Online'),
(27, 25, 'namindu40', 'Take away', '50', 'Accepted', 'Online'),
(28, 25, 'namindu40', 'Dine-in or', '80', 'Completed', 'Online'),
(29, 25, 'namindu40', 'Take away', '50', 'Accepted', 'Credit'),
(30, 25, 'namindu40', 'Dine', '135', 'Completed', 'Credit'),
(31, 25, 'namindu40', 'Dine-in or', '130', 'Completed', 'Credit'),
(32, 25, 'namindu40', 'Dine', '15', 'Completed', 'Credit'),
(33, 25, 'namindu40', 'Dine', '15', 'Completed', 'Credit'),
(34, 25, 'namindu40', 'Take away', '80', 'Completed', 'Credit'),
(35, 25, 'namindu40', 'Dine', '80', 'Completed', 'Credit'),
(36, 25, 'namindu40', 'Dine', '80', 'Completed', 'Credit'),
(37, 25, 'namindu40', 'Dine', '80', 'Completed', 'Credit'),
(38, 25, 'namindu40', 'Dine', '80', 'Completed', 'Credit'),
(39, 25, 'namindu40', 'Dine', '80', 'Completed', 'Credit'),
(40, 25, 'namindu40', 'Dine', '80', 'Completed', 'Credit'),
(41, 25, 'namindu40', 'Dine', '50', 'Completed', 'Credit'),
(42, 25, 'namindu40', 'Take away', '95', 'Accepted', 'Credit'),
(43, 25, 'namindu40', 'Dine', '480', 'Completed', 'Online'),
(44, 25, 'namindu40', 'Take away', '50', 'Completed', 'Credit'),
(45, 25, 'namindu40', 'Dine', '160', 'Completed', 'Online'),
(46, 26, 'trialcs', 'Dine', '80', 'Completed', 'Credit'),
(47, 26, 'trialcs', 'Dine', '80', 'Completed', 'Credit'),
(48, 27, 'Govin95', 'Take away', '50', 'Completed', 'Credit'),
(49, 27, 'Govin95', 'Dine', '160', 'Completed', 'Online'),
(50, 27, 'Govin95', 'Dine', '320', 'Accepted', 'Online'),
(51, 27, 'Govin95', 'Dine', '40', 'Completed', 'Credit'),
(52, 28, '0773515885', 'Take away', '80', 'Completed', 'Credit');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(255) NOT NULL,
  `order_number` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_number`, `product_id`, `quantity`, `price`) VALUES
(5, 3, 2, 1, 50),
(6, 4, 2, 1, 50),
(7, 4, 3, 1, 50),
(8, 5, 2, 2, 100),
(9, 5, 3, 1, 50),
(10, 6, 3, 2, 100),
(11, 7, 2, 4, 200),
(12, 8, 2, 1, 50),
(13, 9, 2, 2, 100),
(14, 9, 3, 1, 50),
(15, 10, 2, 4, 200),
(16, 10, 3, 1, 50),
(17, 11, 2, 3, 150),
(18, 12, 3, 1, 50),
(19, 13, 2, 1, 50),
(20, 14, 2, 1, 50),
(21, 15, 3, 1, 50),
(22, 16, 2, 1, 50),
(23, 17, 2, 2, 100),
(24, 18, 81, 1, 50),
(25, 18, 86, 1, 55),
(26, 19, 82, 1, 80),
(27, 20, 81, 1, 50),
(28, 21, 83, 4, 60),
(29, 22, 81, 1, 50),
(30, 22, 86, 1, 55),
(31, 23, 101, 2, 100),
(32, 24, 89, 1, 80),
(33, 25, 81, 1, 50),
(34, 26, 81, 2, 100),
(35, 26, 89, 1, 80),
(36, 27, 81, 1, 50),
(37, 28, 82, 1, 80),
(38, 29, 81, 1, 50),
(39, 30, 82, 1, 80),
(40, 30, 86, 1, 55),
(41, 31, 81, 1, 50),
(42, 31, 82, 1, 80),
(43, 32, 83, 1, 15),
(44, 33, 84, 1, 15),
(45, 34, 82, 1, 80),
(46, 35, 89, 1, 80),
(47, 36, 82, 1, 80),
(48, 37, 82, 1, 80),
(49, 38, 82, 1, 80),
(50, 39, 82, 1, 80),
(51, 40, 82, 1, 80),
(52, 41, 81, 1, 50),
(53, 42, 81, 1, 50),
(54, 42, 113, 1, 45),
(55, 43, 89, 6, 480),
(56, 44, 81, 1, 50),
(57, 45, 89, 2, 160),
(58, 46, 82, 1, 80),
(59, 47, 82, 1, 80),
(60, 48, 81, 1, 50),
(61, 49, 89, 2, 160),
(62, 50, 82, 4, 320),
(63, 51, 102, 1, 40),
(64, 52, 89, 1, 80);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `wallet_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `owner_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `owner_wallet_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`owner_id`, `user_id`, `owner_wallet_id`) VALUES
(1, 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `owner_wallet`
--

CREATE TABLE `owner_wallet` (
  `owner_wallet_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `owner_id` int(255) NOT NULL,
  `balance` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `owner_wallet`
--

INSERT INTO `owner_wallet` (`owner_wallet_id`, `user_id`, `owner_id`, `balance`) VALUES
(1, 34, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(20) NOT NULL,
  `customer_id` int(20) DEFAULT NULL,
  `order_number` int(20) DEFAULT NULL,
  `payment_method` varchar(20) DEFAULT NULL,
  `payment_type` varchar(20) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `payment_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `brand_id` int(255) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `qty` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `availability` varchar(20) NOT NULL,
  `menu_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_description`, `qty`, `price`, `product_image`, `availability`, `menu_id`) VALUES
(29, 0, 0, '', '', 0, 0, 'coffee-6-995x498.jpg', '', 0),
(31, 0, 0, '', '', 0, 0, 'coffee-6-995x498.jpg', '', 0),
(33, 0, 0, '', '', 0, 0, '1607659256654_3.webp', '', 0),
(35, 0, 0, '', '', 0, 0, 'th.jpg', '', 0),
(37, 0, 0, '', '', 0, 0, 'th (1).jpg', '', 0),
(39, 0, 0, '', '', 0, 0, 'th.jpg', '', 0),
(41, 0, 0, '', '', 0, 0, 'th (1).jpg', '', 0),
(43, 0, 0, '', '', 0, 0, 'th.jpg', '', 0),
(45, 0, 0, '', '', 0, 0, 'th.jpg', '', 0),
(46, 0, 0, '', '', 0, 0, 'th.jpg', '', 0),
(48, 0, 0, '', '', 0, 0, 'th.jpg', '', 0),
(50, 0, 0, '', '', 0, 0, 'th (2).jpg', '', 0),
(52, 0, 0, '', '', 0, 0, 'th (3).jpg', '', 0),
(54, 0, 0, '', '', 0, 0, 'th (3).jpg', '', 0),
(81, 2, 1, 'Chicken rice & curry', 'Samba rice and four curries with chicken curry ,as you see fit for your lunch .Get a tasty lunch packet from the faculty of science canteen. ', 49, 50, 'chicken rice&curry.jpg', 'Available', 1),
(82, 2, 1, 'chicken fried rice ', 'kiri samba fried rice with chilli paste.Usually mixed with eggs ,vegitables ,chicken and other ingredians.', 46, 80, 'fried rice.jpg', 'Available', 1),
(83, 2, 1, 'Dhal Curry', 'Dhal curry is a traditional sri lankan dish prepared,cooked in coconut milk and other ingreadiants.you can get dhal curry extra dishes from science canteen.', 29, 15, 'dhal curry.jpg', 'Available', 2),
(84, 2, 1, 'Beans curry', 'A Sri Lankan green beans curry made with pepper and cumin as the main spices flavoring the dish, you’ll be surprised how good this vegan curry tastes.you can get extra beans dishes from science canteen.', 30, 15, 'beans curry.jpg', 'Available', 2),
(86, 2, 1, 'Egg rice & curry', 'samba rice and four curries with boiled egg.Get a tasty lunch packet from science faculty canteen.', 45, 55, 'egg rice & curry.jpg', 'Available', 1),
(87, 2, 1, 'Eggs', 'You can get extra boiled eggs from our canteen.', 59, 10, 'boiled egg.jpg', 'Available', 2),
(88, 2, 1, 'Potato curry', 'Potato curry in a creamy gravy made with Coconut milk. you can get extra potato curry dishes fron science canteen.', 49, 15, 'photato curry.jpg', 'Available', 2),
(89, 2, 1, 'Chicken Kottu', 'Chicken Kottu one portion with chili chicken gravy dish.Try it from science canteen.', 46, 80, 'Chicken-kottu.jpg', 'Available', 1),
(90, 2, 1, 'Fish Curry ', 'sri lankan fish curry dish with some chili.try it from science canteen.', 50, 20, 'fish curry.jpg', 'Available', 2),
(91, 2, 1, 'Chicken curry', 'sri lankan chicken curry.you can get extra tasty with chicken dish.', 50, 20, 'chicken curry.jpg', 'Not Available', 2),
(93, 2, 1, 'Bullseye eggs', 'Bullseye eggs with some salt and black pepper powder.You can get extra eggs with your lunch packet.', 60, 15, 'eggs bull\'s.jpeg', 'Available', 2),
(94, 2, 1, 'Cutlet', 'As you wish, you can add fish cutlet with your lunch packet.', 100, 10, 'cutlet.jpg', 'Not Available', 2),
(101, 1, 1, 'sandwich', 'There are two sandwich slides include in one packet.sandwich was made by onion with eggs.', 50, 50, 'sandwich.jpg', 'Not Available', 1),
(102, 1, 1, 'Noodles', 'You can get vegitable noodles packet for your breakfast.', 38, 40, 'noodles.jpg', 'Available', 1),
(103, 1, 5, 'Sausage Bun', 'Sausage bun was made by bakehouse team.You can get sausage buns from science cafe.', 50, 40, 'sausage bun.jpg', 'Available', 1),
(104, 1, 5, 'Egg Buns', 'You can get egg buns from science cafe.', 50, 40, 'egg bun.jpg', 'Available', 1),
(105, 1, 1, 'Pol sambola', 'You can get extra pol sambola dishes from us.', 49, 10, 'pol sambal.jpg', 'Available', 2),
(106, 1, 1, 'Boiled Eggs', 'You can get extra eggs from science cafe for your breakfast.', 59, 10, 'boiled egg.jpg', 'Not Available', 2),
(107, 3, 1, 'plane tea', 'you can get plane tea from science cafe.', 100, 10, 'planetea.jpg', 'Available', 0),
(109, 3, 7, 'Chocolate cake ', 'Chocolate cake slides ,you can get science cafe.', 49, 40, 'cake pices.jpg', 'Not Available', 0),
(110, 3, 1, 'Milk tea', 'You can get Milk tea from science canteen.', 50, 30, 'milktea.jpg', 'Available', 0),
(111, 3, 8, 'Yoghurt', 'You can get yoghurt  as your flavour.', 100, 45, 'highland yoghurt.jpg', 'Available', 0),
(112, 3, 1, 'Lemon Juice', 'You can get lemon juice from science cafe.', 80, 40, 'orange juice.jpg', 'Available', 0),
(113, 3, 8, 'Milk packet', 'You can get Vanila and chocolate milk packets from science cafe.', 119, 45, 'highland milk acket.jpeg', 'Available', 0),
(116, 2, 1, 'lemon', 'klkzxz', 90, 6, 'download.jpg', 'Available', 0),
(117, 3, 13, 'sweets', 'sweets ', 50, 10, 'th.jpg', 'Available', 1),
(118, 3, 3, 'biscuit', 'munchee super cream craker', 50, 80, 'munchi.jpg', 'Available', 2),
(119, 3, 1, 'chocolate ', 'for your tea ime', 23, 40, 'cream_crackers_190g__07129.1396679038.jpg', 'Available', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(38, 'niroshan@gmail.com', '37ecf6c3490d9ef5', '$2y$10$EXz6O02R2BVu34JhmUHi1uNU1CvanMQTZk1myPIQiktDR6/nGDL8q', '1643004382'),
(39, 'gog jyfyjfnf@gmaiil.com', '21d92184fa6b5df8', '$2y$10$xrn3SkrB9/nZipyvHBnuPu3YozN.N.PrRnP5hOWXYFd0A7g/S8YVa', '1643004510'),
(40, 'govinbimsara@gmail.com', '71c77cc6add03d43', '$2y$10$fa45gEjbNd74hyLeBuECAe0KMhyvLfmH2Q/ULffJT1EVgFBGZTAOu', '1643004641'),
(41, 'trialcsproject@gmail.com', '461eb119c55e697f', '$2y$10$688i3G4DT.EKUyRfiRgzAOGP6VB4YPHdDWTsi39og1a3K3lfh0iqS', '1643004652');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(20) NOT NULL,
  `sales_id` int(20) DEFAULT NULL,
  `review_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(20) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `product_id` int(20) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `product_id`, `user_rating`, `user_review`, `datetime`) VALUES
(1, 'namindu40', 3, 3, 'hkl', 1642402034),
(2, 'namindu40', 3, 3, 'Great\n', 1642402472),
(3, 'namindu40', 3, 3, 'n ', 1642402611),
(4, 'namindu40', 0, 3, 'hajldx', 1642403107),
(5, 'namindu40', 0, 2, 'ceaac', 1642403213),
(6, 'namindu40', 55, 1, 'nhk', 1642403336),
(7, 'namindu40', 22, 5, 'ml', 1642403412),
(8, 'namindu40', 3, 4, 'Great', 1642445426),
(9, 'namindu40', 3, 1, 'nnj', 1642479080),
(10, 'namindu40', 82, 3, 'Good enough', 1642918187),
(11, 'namindu40', 81, 5, 'Very delicious !!!!!', 1642935423),
(12, 'namindu40', 89, 1, 'Very disgusting !!!!', 1642935501),
(13, 'Govin95', 81, 5, 'Good meals!!!!!', 1643001174),
(14, 'Govin95', 89, 1, 'Food was bad!!!!!', 1643001617);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `nic`, `email`, `phone_number`, `username`, `password`) VALUES
(24, 'mala', 'Weerasekera', '951943142V', '123@gmail.com', 112607744, 'aaa', '$2y$10$kMrICS7Fh4wJ0'),
(25, 'Brittany', 'Stanley', 'Fugiat et ', 'ganaryxi@mailinator.com', 6, 'juvory', '$2y$10$dpWcGLP2JUufX'),
(26, 'Noelani', 'Boyer', 'Quis omnis', 'bupel@mailinator.com', 73, 'vumyfik', '$2y$10$xH7KAsPB271sn'),
(27, 'Ruth', 'Todd', 'Do officia', 'xitypicula@mailinator.com', 5555, 'luxihop', '$2y$10$5OT9x3F3XaNL5'),
(28, 'Liberty', 'Mcintyre', '1', 'kelyfi@mailinator.com', 1111, 'regumy', '$2y$10$LA96Ey2SEyP..5Nb1k.21OroSzxAnQ1gy3XB/ZNhTI1/BAtPdIy7i'),
(29, 'Aiko', 'Justice', 'Dolor dict', 'fuxejefugi@mailinator.com', 92, 'fopihutif', '$2y$10$r5JSfdjwl7NSPvchFVTrB.t4ANKv/veb1.3TUpcKWepFGmnsfkT7C'),
(30, 'Ranmeth', 'Samaranayeke', '951943142V', 'ranmeth@gmail.com', 55555, '55555', '$2y$10$f5R3ow9grvj3B9X3QVX8YunTmCxNQ2WwsM9BM4Ux/5wrRjOSe4ex.'),
(31, 'Gayantha', 'Idunil', '1564146313', 'gbyklsrehiug@gmail.com', 71111111, 'byhuksef', '$2y$10$cNidSe5KvsjWbgKKMmY6zeEDfNH9PleqO8Q3UycvP2xNWj4m2van.'),
(32, 'Namidu', 'Shriyantha', '123456789V', 'govinbimsara@gmail.com', 712345678, 'namindu40', '$2y$10$.agof/tcyltYMEu9h4aiSesLHlQz41a/V0TDUWlSWZ1nJUZAj05I2'),
(37, 'Govin', 'Weerasekera', '951943142V', 'govinbimsara@gmail.com', 773515885, '0773515885', '$2y$10$pfonw3D5Yfb3v4ZcypVDH.N6BW9QUGZKmT6RILE2a8uZ3RZ.JHrwG');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `user_id`, `customer_id`, `balance`) VALUES
(11, 24, 17, 0),
(16, 25, 18, 0),
(17, 26, 19, 0),
(18, 27, 20, 0),
(19, 28, 21, 0),
(20, 29, 22, 0),
(21, 30, 23, 0),
(22, 31, 24, 0),
(23, 32, 25, 150),
(27, 37, 28, 120);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `fyp`
--
ALTER TABLE `fyp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kitchen`
--
ALTER TABLE `kitchen`
  ADD PRIMARY KEY (`kitchen_id`);

--
-- Indexes for table `menu_identifier`
--
ALTER TABLE `menu_identifier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `online_transaction`
--
ALTER TABLE `online_transaction`
  ADD PRIMARY KEY (`Trans_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_number`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `owner_wallet`
--
ALTER TABLE `owner_wallet`
  ADD PRIMARY KEY (`owner_wallet_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fyp`
--
ALTER TABLE `fyp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1111;

--
-- AUTO_INCREMENT for table `menu_identifier`
--
ALTER TABLE `menu_identifier`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `online_transaction`
--
ALTER TABLE `online_transaction`
  MODIFY `Trans_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_number` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `owner_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `owner_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `owner_wallet`
--
ALTER TABLE `owner_wallet`
  MODIFY `owner_wallet_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `wallet_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
