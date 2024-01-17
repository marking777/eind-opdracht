-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jan 17, 2024 at 08:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent1`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminw`
--

CREATE TABLE `adminw` (
  `id` int(45) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminw`
--

INSERT INTO `adminw` (`id`, `naam`, `achternaam`, `email`, `wachtwoord`) VALUES
(1, 'Marouane', 'ELjaghnouni', 'eljaghnounimarouane@gmail.com', '89');

-- --------------------------------------------------------

--
-- Table structure for table `autow`
--

CREATE TABLE `autow` (
  `id` int(45) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `model` int(255) NOT NULL,
  `jaar` int(45) NOT NULL,
  `prijs` int(45) NOT NULL,
  `kenteken` varchar(255) NOT NULL,
  `beschikbaarheid` varchar(255) NOT NULL,
  `kleur` varchar(255) NOT NULL,
  `brandstof` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `autow`
--

INSERT INTO `autow` (`id`, `merk`, `model`, `jaar`, `prijs`, `kenteken`, `beschikbaarheid`, `kleur`, `brandstof`, `file`) VALUES
(1, 'Audi', 0, 2023, 3000, 'hvd3223dn9', '11', 'zwart', 'diesel', './fotos/supercar_audi_rs7_night-removebg-preview.png'),
(2, 'renault', 0, 1945, 7000, '666', '11', 'geel', 'benzine', './fotos/Renault_4__l_auto_universale-removebg-preview.png'),
(3, 'mercedes', 207, 2004, 900, '321121', 'wel', 'wit', 'benzine', './fotos/meri.png'),
(4, 'mercedes', 240, 1998, 1000, '321121', 'wel', 'geel', 'diesel', './fotos/1983_240D_Diesel_Sedan-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

CREATE TABLE `klanten` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `rijbewijsnummer` int(45) NOT NULL,
  `telefoonnummer` int(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klanten`
--

INSERT INTO `klanten` (`id`, `naam`, `adres`, `rijbewijsnummer`, `telefoonnummer`, `email`, `wachtwoord`) VALUES
(1, 'marouane', 'zarzour', 1234, 666, 'eljaghnounimarouane@gmail.com', '$2y$10$OWtqHJsAH3M6WXr9olmcm.5RPbQVWLXZcFWaH/BPqsw6p3n3qBFtu');

-- --------------------------------------------------------

--
-- Table structure for table `verhuringen`
--

CREATE TABLE `verhuringen` (
  `id` int(45) NOT NULL,
  `kosten` int(45) NOT NULL,
  `klantid` int(45) NOT NULL,
  `autoid` int(45) NOT NULL,
  `begindatum` date NOT NULL,
  `einddatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminw`
--
ALTER TABLE `adminw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autow`
--
ALTER TABLE `autow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verhuringen`
--
ALTER TABLE `verhuringen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `verhuringen_ibfk_1` (`klantid`),
  ADD KEY `verhuringen_ibfk_2` (`autoid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminw`
--
ALTER TABLE `adminw`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `autow`
--
ALTER TABLE `autow`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `klanten`
--
ALTER TABLE `klanten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `verhuringen`
--
ALTER TABLE `verhuringen`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `verhuringen`
--
ALTER TABLE `verhuringen`
  ADD CONSTRAINT `verhuringen_ibfk_1` FOREIGN KEY (`klantid`) REFERENCES `klanten` (`id`),
  ADD CONSTRAINT `verhuringen_ibfk_2` FOREIGN KEY (`autoid`) REFERENCES `autow` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
