-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 07:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waterbills`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `adminId` int(5) NOT NULL,
  `adminUserName` varchar(50) NOT NULL,
  `adminPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`adminId`, `adminUserName`, `adminPassword`) VALUES
(1, 'Lasinda', '26344'),
(2, 'Kalhara', '80024');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(5) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wbNo` bigint(10) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userPassword` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `firstName`, `lastName`, `address`, `email`, `wbNo`, `userName`, `userPassword`) VALUES
(1, 'Lasinda', 'Kalhara', 'Galkanda Rd', 'lasindaraa158@gmail.com', 75689569, 'Lasi', '26344'),
(3, 'Danushka', 'Amali', 'No23, Ampitiya, Kandy', 'danushk@gmail.com', 75683659, 'Danu', '123456'),
(4, 'Vimanka', 'Frenando', 'No34, Homagama, Colombo', 'vimanka200@gmail.com', 75682345, 'Vima', '26344'),
(5, 'Rasintha ', 'Perera', 'No67, Kandy Rd, Dambulla', 'Rasi890@gmail.com', 75230021, 'Rasi', '123456'),
(6, 'Manula', 'Wasala', 'trinko Rd, Anuradhapura', 'manul45@gmail.com', 74685930, 'Manu', '123456'),
(7, 'Rajitha', 'Lakshan', 'Ella Rd, Minneriya', 'rajitha700@gmail.com', 74659320, 'Raji', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `water_bill_units`
--

CREATE TABLE `water_bill_units` (
  `rate_id` int(5) NOT NULL,
  `consumption_per_month` varchar(15) NOT NULL,
  `energy_charge` float(8,2) NOT NULL,
  `fixed_charge` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `water_bill_units`
--

INSERT INTO `water_bill_units` (`rate_id`, `consumption_per_month`, `energy_charge`, `fixed_charge`) VALUES
(1, '0-60', 25.00, 0.00),
(2, '61-90', 30.00, 400.00),
(3, '91-120', 50.00, 1000.00),
(4, '121-180', 50.00, 1500.00),
(5, 'Over 180', 75.00, 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `water_usage`
--

CREATE TABLE `water_usage` (
  `bh_id` int(5) NOT NULL,
  `month` varchar(20) NOT NULL,
  `unit_count` int(5) NOT NULL,
  `bill_value` float(8,2) NOT NULL,
  `monthly_charge` float(8,2) NOT NULL,
  `fix_charge` float(8,2) NOT NULL,
  `vat_charge` float(8,2) NOT NULL,
  `custom_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `water_usage`
--

INSERT INTO `water_usage` (`bh_id`, `month`, `unit_count`, `bill_value`, `monthly_charge`, `fix_charge`, `vat_charge`, `custom_id`) VALUES
(81, '2024_January', 23, 678.50, 575.00, 575.00, 103.50, 4),
(82, '2023 January', 212, 13334.00, 9300.00, 11300.00, 2034.00, 4),
(83, '2023 February', 20, 590.00, 500.00, 500.00, 90.00, 4),
(84, '2024 March', 44, 1298.00, 1100.00, 1100.00, 198.00, 4),
(85, '2023 December', 205, 12714.50, 8775.00, 10775.00, 1939.50, 1),
(86, '2024 January', 333, 24042.50, 18375.00, 20375.00, 3667.50, 1),
(87, '2024 February', 46, 1357.00, 1150.00, 1150.00, 207.00, 1),
(88, '2023 October', 105, 4897.00, 3150.00, 4150.00, 747.00, 1),
(89, '2024 April', 300, 21122.00, 15900.00, 17900.00, 3222.00, 1),
(90, '2024 January', 65, 2419.00, 1650.00, 2050.00, 369.00, 3),
(91, '2023 September', 75, 2773.00, 1950.00, 2350.00, 423.00, 3),
(92, '2023 October', 111, 5251.00, 3450.00, 4450.00, 801.00, 3),
(93, '2023 December', 205, 12714.50, 8775.00, 10775.00, 1939.50, 3),
(94, '2024 March', 121, 6431.00, 3950.00, 5450.00, 981.00, 3),
(95, '2024 May', 245, 16254.50, 11775.00, 13775.00, 2479.50, 3),
(96, '2024 January', 88, 3233.20, 2340.00, 2740.00, 493.20, 5),
(97, '2024 March', 98, 4484.00, 2800.00, 3800.00, 684.00, 5),
(98, '2023 October', 105, 4897.00, 3150.00, 4150.00, 747.00, 5),
(99, '2023 November', 222, 14219.00, 10050.00, 12050.00, 2169.00, 5),
(100, '2023 August', 408, 30680.00, 24000.00, 26000.00, 4680.00, 5),
(101, '2024 May', 111, 5251.00, 3450.00, 4450.00, 801.00, 5),
(102, '2023 May', 175, 9617.00, 6650.00, 8150.00, 1467.00, 5),
(103, '2024 January', 47, 1386.50, 1175.00, 1175.00, 211.50, 6),
(104, '2024 February', 77, 2843.80, 2010.00, 2410.00, 433.80, 6),
(105, '2024 March', 132, 7080.00, 4500.00, 6000.00, 1080.00, 6),
(106, '2024 April', 176, 9676.00, 6700.00, 8200.00, 1476.00, 6),
(107, '2024 May', 200, 12272.00, 8400.00, 10400.00, 1872.00, 6),
(108, '2024 June', 320, 22892.00, 17400.00, 19400.00, 3492.00, 6),
(109, '2024 January', 480, 37052.00, 29400.00, 31400.00, 5652.00, 7),
(110, '2024 January', 73, 2702.20, 1890.00, 2290.00, 412.20, 7),
(111, '2024 January', 297, 20856.50, 15675.00, 17675.00, 3181.50, 7),
(112, '2024 January', 109, 5133.00, 3350.00, 4350.00, 783.00, 7),
(113, '2024 January', 168, 9204.00, 6300.00, 7800.00, 1404.00, 7),
(114, '2024 January', 344, 25016.00, 19200.00, 21200.00, 3816.00, 1),
(115, '2024 January', 46, 1357.00, 1150.00, 1150.00, 207.00, 3),
(116, '2024 January', 135, 7257.00, 4650.00, 6150.00, 1107.00, 3),
(117, '2024 January', 555, 43689.50, 35025.00, 37025.00, 6664.50, 3),
(118, '2024 May', 100, 5168.40, 3380.00, 4380.00, 788.40, 5),
(119, '2024 January', 700, 57088.40, 46380.00, 48380.00, 8708.40, 1),
(120, '2024 April', 800, 65938.40, 53880.00, 55880.00, 10058.40, 3),
(121, '2024 January', 900, 74788.40, 61380.00, 63380.00, 11408.40, 3),
(122, '2024 January', 77, 2843.80, 2010.00, 2410.00, 433.80, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`adminId`),
  ADD UNIQUE KEY `adminUserName` (`adminUserName`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD UNIQUE KEY `wbNo` (`wbNo`);

--
-- Indexes for table `water_bill_units`
--
ALTER TABLE `water_bill_units`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `water_usage`
--
ALTER TABLE `water_usage`
  ADD PRIMARY KEY (`bh_id`),
  ADD KEY `fk_custom_id` (`custom_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `adminId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `water_bill_units`
--
ALTER TABLE `water_bill_units`
  MODIFY `rate_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `water_usage`
--
ALTER TABLE `water_usage`
  MODIFY `bh_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `water_usage`
--
ALTER TABLE `water_usage`
  ADD CONSTRAINT `fk_custom_id` FOREIGN KEY (`custom_id`) REFERENCES `customer` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
