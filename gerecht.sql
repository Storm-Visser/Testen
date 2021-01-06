-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 01:57 PM
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
-- Database: `gerecht`
--

-- --------------------------------------------------------

--
-- Table structure for table `boodschappenlijst`
--

CREATE TABLE `boodschappenlijst` (
  `ID` int(8) NOT NULL,
  `product` varchar(69) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boodschappenlijst`
--

INSERT INTO `boodschappenlijst` (`ID`, `product`) VALUES
(1, 'ei'),
(2, 'boter'),
(3, 'kaas'),
(4, 'ei'),
(5, 'ei'),
(6, 'ei'),
(7, 'ei'),
(8, 'ei'),
(9, 'boter'),
(10, 'kaas'),
(11, 'ketchup');

-- --------------------------------------------------------

--
-- Table structure for table `gerecht`
--

CREATE TABLE `gerecht` (
  `naam` varchar(69) NOT NULL,
  `product1` varchar(69) DEFAULT NULL,
  `product2` varchar(69) DEFAULT NULL,
  `product3` varchar(69) DEFAULT NULL,
  `product4` varchar(69) DEFAULT NULL,
  `product5` varchar(69) DEFAULT NULL,
  `product6` varchar(69) DEFAULT NULL,
  `product7` varchar(69) DEFAULT NULL,
  `product8` varchar(69) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gerecht`
--

INSERT INTO `gerecht` (`naam`, `product1`, `product2`, `product3`, `product4`, `product5`, `product6`, `product7`, `product8`) VALUES
('Nasi', 'Kipfilethaasjes', 'Wok Olie', 'Sambal Oelek', 'Nasi-Bamigroente', 'Taugé', 'Ketjap Asin', 'kant-en-klare-satésaus', 'Chinese Eiermie');

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE `producten` (
  `ID` int(11) NOT NULL,
  `product` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`ID`, `product`) VALUES
(1, 'ei'),
(2, 'boter'),
(3, 'kaas'),
(4, 'ketchup');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boodschappenlijst`
--
ALTER TABLE `boodschappenlijst`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gerecht`
--
ALTER TABLE `gerecht`
  ADD PRIMARY KEY (`naam`);

--
-- Indexes for table `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boodschappenlijst`
--
ALTER TABLE `boodschappenlijst`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `producten`
--
ALTER TABLE `producten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
