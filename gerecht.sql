-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 jan 2021 om 11:01
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Tabelstructuur voor tabel `boodschappenlijst`
--

CREATE TABLE `boodschappenlijst` (
  `ID` int(8) NOT NULL,
  `product` varchar(69) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gerecht`
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
-- Gegevens worden geëxporteerd voor tabel `gerecht`
--

INSERT INTO `gerecht` (`naam`, `product1`, `product2`, `product3`, `product4`, `product5`, `product6`, `product7`, `product8`) VALUES
('Nasi', 'Kipfilethaasjes', 'Wok Olie', 'Sambal Oelek', 'Nasi-Bamigroente', 'Taugé', 'Ketjap Asin', 'kant-en-klare-satésaus', 'Chinese Eiermie');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `producten` (
  `ID` int(11) NOT NULL,
  `product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gerecht`
--
ALTER TABLE `gerecht`
  ADD PRIMARY KEY (`naam`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
