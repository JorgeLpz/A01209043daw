-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 01:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basedatosricardo`
--

-- --------------------------------------------------------

--
-- Table structure for table `Entregan`
--

CREATE TABLE `entregan` (
  `Clave` decimal(5,0) NOT NULL,
  `RFC` char(13) NOT NULL,
  `Numero` decimal(5,0) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Cantidad` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Entregan`
--

INSERT INTO `Entregan` (`Clave`, `RFC`, `Numero`, `Fecha`, `Cantidad`) VALUES
('1000', 'AAAA800101', '5000', '0000-00-00 00:00:00', '165.00'),
('1000', 'AAAA800101', '5019', '0000-00-00 00:00:00', '7.00'),
('1000', 'AAAA800101', '5019', '0000-00-00 00:00:00', '254.00'),
('1010', 'BBBB800101', '5001', '0000-00-00 00:00:00', '528.00'),
('1010', 'BBBB800101', '5018', '0000-00-00 00:00:00', '523.00'),
('1010', 'BBBB800101', '5018', '0000-00-00 00:00:00', '667.00'),
('1020', 'CCCC800101', '5002', '0000-00-00 00:00:00', '582.00'),
('1020', 'CCCC800101', '5017', '0000-00-00 00:00:00', '8.00'),
('1020', 'CCCC800101', '5017', '0000-00-00 00:00:00', '478.00'),
('1030', 'DDDD800101', '5003', '0000-00-00 00:00:00', '202.00'),
('1030', 'DDDD800101', '5016', '0000-00-00 00:00:00', '139.00'),
('1030', 'DDDD800101', '5016', '0000-00-00 00:00:00', '295.00'),
('1040', 'EEEE800101', '5004', '0000-00-00 00:00:00', '263.00'),
('1040', 'EEEE800101', '5015', '0000-00-00 00:00:00', '540.00'),
('1040', 'EEEE800101', '5015', '0000-00-00 00:00:00', '546.00'),
('1050', 'FFFF800101', '5005', '0000-00-00 00:00:00', '503.00'),
('1050', 'FFFF800101', '5014', '0000-00-00 00:00:00', '90.00'),
('1050', 'FFFF800101', '5014', '0000-00-00 00:00:00', '623.00'),
('1060', 'GGGG800101', '5006', '0000-00-00 00:00:00', '324.00'),
('1060', 'GGGG800101', '5013', '0000-00-00 00:00:00', '47.00'),
('1060', 'GGGG800101', '5013', '0000-00-00 00:00:00', '692.00'),
('1070', 'HHHH800101', '5007', '0000-00-00 00:00:00', '2.00'),
('1070', 'HHHH800101', '5012', '0000-00-00 00:00:00', '503.00'),
('1070', 'HHHH800101', '5012', '0000-00-00 00:00:00', '516.00'),
('1080', 'AAAA800101', '5008', '0000-00-00 00:00:00', '86.00'),
('1080', 'AAAA800101', '5011', '0000-00-00 00:00:00', '429.00'),
('1080', 'AAAA800101', '5011', '0000-00-00 00:00:00', '699.00'),
('1090', 'BBBB800101', '5009', '0000-00-00 00:00:00', '73.00'),
('1090', 'BBBB800101', '5010', '0000-00-00 00:00:00', '421.00'),
('1090', 'BBBB800101', '5010', '0000-00-00 00:00:00', '612.00'),
('1100', 'CCCC800101', '5009', '0000-00-00 00:00:00', '466.00'),
('1100', 'CCCC800101', '5009', '0000-00-00 00:00:00', '523.00'),
('1100', 'CCCC800101', '5010', '0000-00-00 00:00:00', '699.00'),
('1110', 'DDDD800101', '5008', '0000-00-00 00:00:00', '292.00'),
('1110', 'DDDD800101', '5008', '0000-00-00 00:00:00', '337.00'),
('1110', 'DDDD800101', '5011', '0000-00-00 00:00:00', '368.00'),
('1120', 'EEEE800101', '5007', '0000-00-00 00:00:00', '167.00'),
('1120', 'EEEE800101', '5007', '0000-00-00 00:00:00', '692.00'),
('1120', 'EEEE800101', '5012', '0000-00-00 00:00:00', '215.00'),
('1130', 'FFFF800101', '5006', '0000-00-00 00:00:00', '562.00'),
('1130', 'FFFF800101', '5006', '0000-00-00 00:00:00', '673.00'),
('1130', 'FFFF800101', '5013', '0000-00-00 00:00:00', '63.00'),
('1140', 'GGGG800101', '5005', '0000-00-00 00:00:00', '583.00'),
('1140', 'GGGG800101', '5005', '0000-00-00 00:00:00', '651.00'),
('1140', 'GGGG800101', '5014', '0000-00-00 00:00:00', '219.00'),
('1150', 'HHHH800101', '5004', '0000-00-00 00:00:00', '270.00'),
('1150', 'HHHH800101', '5004', '0000-00-00 00:00:00', '453.00'),
('1150', 'HHHH800101', '5015', '0000-00-00 00:00:00', '458.00'),
('1160', 'AAAA800101', '5016', '0000-00-00 00:00:00', '162.00'),
('1160', 'AAAA800101', '5019', '0000-00-00 00:00:00', '244.00'),
('1160', 'AAAA800101', '5019', '0000-00-00 00:00:00', '665.00'),
('1170', 'BBBB800101', '5017', '0000-00-00 00:00:00', '180.00'),
('1170', 'BBBB800101', '5018', '0000-00-00 00:00:00', '53.00'),
('1170', 'BBBB800101', '5018', '0000-00-00 00:00:00', '517.00'),
('1180', 'CCCC800101', '5017', '0000-00-00 00:00:00', '216.00'),
('1180', 'CCCC800101', '5017', '0000-00-00 00:00:00', '334.00'),
('1180', 'CCCC800101', '5018', '0000-00-00 00:00:00', '407.00'),
('1190', 'DDDD800101', '5016', '0000-00-00 00:00:00', '356.00'),
('1190', 'DDDD800101', '5016', '0000-00-00 00:00:00', '622.00'),
('1190', 'DDDD800101', '5019', '0000-00-00 00:00:00', '94.00'),
('1200', 'EEEE800101', '5000', '0000-00-00 00:00:00', '177.00'),
('1200', 'EEEE800101', '5015', '0000-00-00 00:00:00', '585.00'),
('1200', 'EEEE800101', '5015', '0000-00-00 00:00:00', '653.00'),
('1210', 'FFFF800101', '5001', '0000-00-00 00:00:00', '43.00'),
('1210', 'FFFF800101', '5014', '0000-00-00 00:00:00', '70.00'),
('1210', 'FFFF800101', '5014', '0000-00-00 00:00:00', '479.00'),
('1220', 'GGGG800101', '5002', '0000-00-00 00:00:00', '24.00'),
('1220', 'GGGG800101', '5013', '0000-00-00 00:00:00', '653.00'),
('1220', 'GGGG800101', '5013', '0000-00-00 00:00:00', '658.00'),
('1230', 'HHHH800101', '5003', '0000-00-00 00:00:00', '530.00'),
('1230', 'HHHH800101', '5012', '0000-00-00 00:00:00', '115.00'),
('1230', 'HHHH800101', '5012', '0000-00-00 00:00:00', '312.00'),
('1240', 'AAAA800101', '5004', '0000-00-00 00:00:00', '152.00'),
('1240', 'AAAA800101', '5011', '0000-00-00 00:00:00', '366.00'),
('1240', 'AAAA800101', '5011', '0000-00-00 00:00:00', '549.00'),
('1250', 'BBBB800101', '5005', '0000-00-00 00:00:00', '71.00'),
('1250', 'BBBB800101', '5010', '0000-00-00 00:00:00', '690.00'),
('1250', 'BBBB800101', '5010', '0000-00-00 00:00:00', '691.00'),
('1260', 'CCCC800101', '5006', '0000-00-00 00:00:00', '460.00'),
('1260', 'CCCC800101', '5009', '0000-00-00 00:00:00', '2.00'),
('1260', 'CCCC800101', '5009', '0000-00-00 00:00:00', '631.00'),
('1270', 'DDDD800101', '5007', '0000-00-00 00:00:00', '506.00'),
('1270', 'DDDD800101', '5008', '0000-00-00 00:00:00', '324.00'),
('1270', 'DDDD800101', '5008', '0000-00-00 00:00:00', '546.00'),
('1280', 'EEEE800101', '5007', '0000-00-00 00:00:00', '331.00'),
('1280', 'EEEE800101', '5007', '0000-00-00 00:00:00', '448.00'),
('1280', 'EEEE800101', '5008', '0000-00-00 00:00:00', '107.00'),
('1290', 'FFFF800101', '5006', '0000-00-00 00:00:00', '279.00'),
('1290', 'FFFF800101', '5006', '0000-00-00 00:00:00', '336.00'),
('1290', 'FFFF800101', '5009', '0000-00-00 00:00:00', '132.00'),
('1300', 'GGGG800101', '5005', '0000-00-00 00:00:00', '457.00'),
('1300', 'GGGG800101', '5005', '0000-00-00 00:00:00', '521.00'),
('1300', 'GGGG800101', '5010', '0000-00-00 00:00:00', '119.00'),
('1310', 'HHHH800101', '5011', '0000-00-00 00:00:00', '72.00'),
('1310', 'HHHH800101', '5019', '0000-00-00 00:00:00', '199.00'),
('1310', 'HHHH800101', '5019', '0000-00-00 00:00:00', '463.00'),
('1320', 'AAAA800101', '5012', '0000-00-00 00:00:00', '698.00'),
('1320', 'AAAA800101', '5018', '0000-00-00 00:00:00', '163.00'),
('1320', 'AAAA800101', '5018', '0000-00-00 00:00:00', '413.00'),
('1330', 'BBBB800101', '5013', '0000-00-00 00:00:00', '554.00'),
('1330', 'BBBB800101', '5017', '0000-00-00 00:00:00', '93.00'),
('1330', 'BBBB800101', '5017', '0000-00-00 00:00:00', '558.00'),
('1340', 'CCCC800101', '5014', '0000-00-00 00:00:00', '324.00'),
('1340', 'CCCC800101', '5016', '0000-00-00 00:00:00', '11.00'),
('1340', 'CCCC800101', '5016', '0000-00-00 00:00:00', '674.00'),
('1350', 'DDDD800101', '5015', '0000-00-00 00:00:00', '261.00'),
('1350', 'DDDD800101', '5015', '0000-00-00 00:00:00', '272.00'),
('1350', 'DDDD800101', '5015', '0000-00-00 00:00:00', '330.00'),
('1360', 'EEEE800101', '5014', '0000-00-00 00:00:00', '37.00'),
('1360', 'EEEE800101', '5014', '0000-00-00 00:00:00', '265.00'),
('1360', 'EEEE800101', '5016', '0000-00-00 00:00:00', '364.00'),
('1370', 'FFFF800101', '5013', '0000-00-00 00:00:00', '423.00'),
('1370', 'FFFF800101', '5013', '0000-00-00 00:00:00', '575.00'),
('1370', 'FFFF800101', '5017', '0000-00-00 00:00:00', '44.00'),
('1380', 'GGGG800101', '5012', '0000-00-00 00:00:00', '147.00'),
('1380', 'GGGG800101', '5012', '0000-00-00 00:00:00', '645.00'),
('1380', 'GGGG800101', '5018', '0000-00-00 00:00:00', '302.00'),
('1390', 'HHHH800101', '5011', '0000-00-00 00:00:00', '308.00'),
('1390', 'HHHH800101', '5011', '0000-00-00 00:00:00', '697.00'),
('1390', 'HHHH800101', '5019', '0000-00-00 00:00:00', '107.00'),
('1400', 'AAAA800101', '5000', '0000-00-00 00:00:00', '382.00'),
('1400', 'AAAA800101', '5010', '0000-00-00 00:00:00', '116.00'),
('1400', 'AAAA800101', '5010', '0000-00-00 00:00:00', '441.00'),
('1410', 'BBBB800101', '5001', '0000-00-00 00:00:00', '601.00'),
('1410', 'BBBB800101', '5009', '0000-00-00 00:00:00', '461.00'),
('1410', 'BBBB800101', '5009', '0000-00-00 00:00:00', '467.00'),
('1420', 'CCCC800101', '5002', '0000-00-00 00:00:00', '603.00'),
('1420', 'CCCC800101', '5008', '0000-00-00 00:00:00', '278.00'),
('1420', 'CCCC800101', '5008', '0000-00-00 00:00:00', '444.00'),
('1430', 'DDDD800101', '5003', '0000-00-00 00:00:00', '576.00'),
('1430', 'DDDD800101', '5007', '0000-00-00 00:00:00', '13.00'),
('1430', 'DDDD800101', '5007', '0000-00-00 00:00:00', '506.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Entregan`
--
ALTER TABLE `Entregan`
  ADD PRIMARY KEY (`Clave`,`RFC`,`Numero`,`Fecha`,`Cantidad`),
  ADD KEY `cfentreganrfc` (`RFC`),
  ADD KEY `cfentregannumero` (`Numero`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Entregan`
--
ALTER TABLE `Entregan`
  ADD CONSTRAINT `cfentreganclave` FOREIGN KEY (`Clave`) REFERENCES `materiales` (`Clave`),
  ADD CONSTRAINT `cfentregannumero` FOREIGN KEY (`Numero`) REFERENCES `proyectos` (`Numero`),
  ADD CONSTRAINT `cfentreganrfc` FOREIGN KEY (`RFC`) REFERENCES `proveedores` (`RFC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
