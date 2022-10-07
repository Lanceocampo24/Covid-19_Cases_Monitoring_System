-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 12:03 PM
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
-- Database: `pasigcovidcases`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangays`
--

CREATE TABLE `barangays` (
  `BarangayID` int(3) NOT NULL,
  `BarangayName` varchar(50) NOT NULL,
  `BarangayChairman` varchar(50) NOT NULL,
  `BarangayContact` varchar(50) NOT NULL,
  `BarangayDistrict` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangays`
--

INSERT INTO `barangays` (`BarangayID`, `BarangayName`, `BarangayChairman`, `BarangayContact`, `BarangayDistrict`) VALUES
(1, 'Bagong Ilog', 'Jose Nilo C. Abreño', '671-0681', '1'),
(2, 'Bagong Katipunan', 'Alba Geronimo Ambo', '642-7416', '1'),
(3, 'Bambang', 'Reynaldo A. Samson, Jr.', '643-6832', '1'),
(4, 'Buting', 'Danilo M. Tuaño', '641-1440', '1'),
(5, 'Caniogan', 'Bernard C. Perez', '641-5110', '1'),
(6, 'Kalawaan', 'Onofre R. Capco', '642-5648', '1'),
(7, 'Kapasigan', 'Bien Paul D. Legaspi', '565-6902', '1'),
(8, 'Kapitolyo', 'Noel R. Pajara', '631-4397', '1'),
(9, 'Malinao', 'Joel S. Dela Cruz', '641-6672', '1'),
(10, 'Oranbo', 'Vicente V. Javier, Jr.', '635-9498', '1'),
(11, 'Palatiw', 'Dinah R. Guevarra', '641-044', '1'),
(12, 'Pineda', 'Hermani S. A. Lacuna', '584-8355', '1'),
(13, 'Sagad', 'Alberto A. Bautista', '640-5088', '1'),
(14, 'San Antonio', 'Joselito P. Dela Merced', '631-0099', '1'),
(15, 'San Joaquin', 'Nelia L. Munzod', '643-9657', '1'),
(16, 'San Jose', 'Ronwaldo C. Angeles', '640-0994', '1'),
(17, 'San Nicolas', 'Rigor J. Enriquez', '900-2062', '1'),
(18, 'Sta. Cruz', 'Roderick Mario U. Gonzales', '916-9015', '1'),
(19, 'Sta. Rosa', 'Reynaldo G. Morelos', '746-2128', '1'),
(20, 'Sto. Tomas', 'Josefino M. Mojica', '470-6362', '1'),
(21, 'Sumilang', '	Celestino U. Chua', '643-6276', '1'),
(22, 'Ugong', 'Engracio E. Santiago', '671-4071', '1'),
(23, 'Dela Paz', 'Dietmar L. Romualdez', '654-2331', '2'),
(24, 'Manggahan', 'Bobby L. Bobis', '682-0424', '2'),
(25, 'Maybunga', 'Arnold R. Alvarez', '628-4466', '2'),
(26, 'Pinagbuhatan', 'Maricar A. Vivero', '880-9394', '2'),
(27, 'Rosario', 'Aquilino R. Dela Cruz', '640-7705', '2'),
(28, 'San Miguel', 'Roberto E. Benito', '642-9510', '2'),
(29, 'Santolan', 'Briccio V. Ramos', '681-1614', '2'),
(30, 'Sta. Lucia', 'Elpidio E. Bunag', '791-8283', '2');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `CasesID` int(10) NOT NULL,
  `Confirmed` int(10) NOT NULL,
  `Recovered` int(10) NOT NULL,
  `Death` int(10) NOT NULL,
  `BarangayID` int(10) NOT NULL,
  `DateofCases` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`CasesID`, `Confirmed`, `Recovered`, `Death`, `BarangayID`, `DateofCases`) VALUES
(1, 2418, 2345, 52, 1, '2022-01-01'),
(2, 97, 97, 0, 2, '2022-01-01'),
(3, 1513, 1448, 62, 3, '2022-01-01'),
(4, 844, 826, 15, 4, '2022-01-01'),
(5, 2621, 2543, 75, 5, '2022-01-01'),
(6, 1726, 1671, 44, 6, '2022-01-02'),
(7, 1699, 1645, 53, 7, '2022-01-02'),
(8, 633, 609, 24, 8, '2022-01-02'),
(9, 1743, 1718, 24, 9, '2022-01-02'),
(10, 457, 445, 11, 10, '2022-01-02'),
(11, 7027, 6905, 112, 11, '2022-01-03'),
(12, 3649, 3565, 78, 12, '2022-01-03'),
(13, 503, 496, 7, 13, '2022-01-03'),
(14, 1293, 1243, 46, 14, '2022-01-03'),
(15, 7853, 7578, 261, 15, '2022-01-03'),
(16, 1609, 1565, 24, 16, '2022-01-04'),
(17, 5107, 4975, 120, 17, '2022-01-04'),
(18, 661, 636, 21, 18, '2022-01-04'),
(19, 1695, 1675, 16, 19, '2022-01-04'),
(20, 1208, 1172, 33, 20, '2022-01-04'),
(21, 208, 203, 5, 21, '2022-01-01'),
(22, 3082, 2999, 75, 22, '2022-01-02'),
(23, 299, 292, 7, 23, '2022-01-03'),
(24, 3291, 3202, 87, 24, '2022-01-04'),
(25, 403, 383, 18, 25, '2022-01-01'),
(26, 3549, 3460, 74, 26, '2022-01-02'),
(27, 60, 50, 5, 27, '2022-01-03'),
(28, 846, 813, 25, 28, '2022-01-04'),
(29, 817, 787, 29, 29, '2022-01-01'),
(30, 2696, 2623, 55, 30, '2022-01-02'),
(31, 2691, 2563, 53, 1, '2022-01-18'),
(32, 142, 125, 0, 2, '2022-01-18'),
(33, 1820, 1674, 64, 3, '2022-01-18'),
(34, 1028, 966, 15, 4, '2022-01-18'),
(35, 3054, 2866, 76, 5, '2022-01-18'),
(36, 2234, 1999, 45, 23, '2022-01-18'),
(37, 1958, 1768, 53, 6, '2022-01-18'),
(38, 744, 690, 25, 7, '2022-01-18'),
(39, 2544, 2483, 24, 8, '2022-01-18'),
(40, 616, 521, 11, 9, '2022-01-18'),
(41, 8486, 7910, 113, 24, '2022-01-18'),
(42, 4101, 3954, 78, 25, '2022-01-18'),
(43, 577, 541, 8, 10, '2022-01-18'),
(44, 1557, 1359, 47, 11, '2022-01-18'),
(45, 8727, 8021, 262, 26, '2022-01-18'),
(46, 1824, 1694, 35, 12, '2022-01-18'),
(47, 6225, 6070, 120, 27, '2022-01-18'),
(48, 848, 752, 21, 13, '2022-01-18'),
(49, 2051, 1932, 16, 14, '2022-01-18'),
(50, 1589, 1427, 33, 15, '2022-01-18'),
(51, 258, 238, 5, 16, '2022-01-18'),
(52, 3893, 3550, 75, 28, '2022-01-18'),
(53, 402, 349, 7, 17, '2022-01-18'),
(54, 3719, 3561, 87, 29, '2022-01-18'),
(55, 507, 429, 18, 18, '2022-01-18'),
(56, 4608, 4308, 77, 30, '2022-01-18'),
(57, 72, 60, 4, 19, '2022-01-18'),
(58, 1050, 933, 25, 20, '2022-01-18'),
(59, 971, 885, 29, 21, '2022-01-18'),
(60, 3253, 3103, 56, 22, '2022-01-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangays`
--
ALTER TABLE `barangays`
  ADD PRIMARY KEY (`BarangayID`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`CasesID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangays`
--
ALTER TABLE `barangays`
  MODIFY `BarangayID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `CasesID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
