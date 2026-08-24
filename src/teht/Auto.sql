-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Isäntä: db
-- Luontiaika: 20.08.2026 klo 11:23
-- Palvelimen versio: 8.0.46
-- PHP-versio 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Tietokanta: `Auto`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `Asiakas`
--

CREATE TABLE `Asiakas` (
  `AsiakasID` int NOT NULL,
  `Asnro` varchar(50) NOT NULL,
  `Sukunimi` varchar(50) NOT NULL,
  `Etunimi` varchar(50) NOT NULL,
  `Lähiosoite` varchar(50) NOT NULL,
  `Postiosoite` varchar(50) NOT NULL,
  `puhelin` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vedos taulusta `Asiakas`
--

INSERT INTO `Asiakas` (`AsiakasID`, `Asnro`, `Sukunimi`, `Etunimi`, `Lähiosoite`, `Postiosoite`, `puhelin`) VALUES
(1, '100', 'Salonen', 'Eemeli', 'Pajutie 5', '45910 VOIKKAA', '050 556 422'),
(2, '101', 'Salminen', 'Alli', 'Koivutie 10', '35800 MÄNTTÄ', ''),
(3, '102', 'Silander', 'Eila', 'Kuusikuja 3', '34800 VIRRAT', '(+358) 4462 1'),
(4, '103', 'Malmi', 'Asko', 'Lehtokatu 1', '07940 LOVIISA', '050 3266 674'),
(5, '104', 'Ahtiala', 'Liisa', 'Liisantie 15', '00430 HELSINKI', '040 755 820'),
(6, '105', 'Virtanen', 'Matti', 'Tavintie 13', '00830 HELSINKI', '045 521 402'),
(7, '106', 'Vähälä', 'Siru', 'Koulukatu 1', '80170 JOENSUU', ''),
(8, '107', 'Senilä', 'Ilmari', 'Kauppakuja 2', '74100 IISALMI', '(017) 233 577'),
(9, '108', 'Kulkija', 'Kalle', 'Koulukuja 4', '07940 LOVIISA', '050 558 877'),
(10, '109', 'Salmi', 'Matti', 'Kumputie 5', '35820 MÄNTTÄ', '044 764 442'),
(11, '110', 'Korhonen', 'Eila', 'Matinkuja 9', '45910 VOIKKAA', '045 433 389'),
(12, '111', 'Kettula', 'Kalle', 'Villentie 7', '80170 JOENSUU', '040 677 444'),
(13, '112', 'Kurvinen', 'Esa', 'Suonotko 8', '00610 HELSINKI', '(013) 6662 31');

-- --------------------------------------------------------

--
-- Rakenne taululle `Autot`
--

CREATE TABLE `Autot` (
  `AutoID` int NOT NULL,
  `Merkki` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Malli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vedos taulusta `Autot`
--

INSERT INTO `Autot` (`AutoID`, `Merkki`, `Malli`) VALUES
(1, 'Ford', 'Sierra'),
(2, 'Volvo', '340'),
(3, 'Opel', 'Kadet'),
(4, 'Mazda', '626'),
(5, 'Mazda', '626'),
(6, 'Ford', 'Sierra'),
(7, 'Volvo', '244'),
(8, 'Volvo', '740'),
(9, 'Volvo', '244'),
(10, 'Volvo', '340'),
(11, 'Ford', 'Escort'),
(12, 'Ford', 'Escort'),
(13, 'Opel', 'Kadett'),
(14, 'Opel', 'Ascona'),
(15, 'Fiat', 'Uno'),
(16, 'Volvo', '740'),
(17, 'Opel', 'Ascona'),
(18, 'Ford', 'Escort'),
(19, 'Opel', 'Ascona'),
(20, 'Volvo', '740'),
(21, 'Volvo', '740'),
(22, 'Fiat', 'Punto'),
(23, 'Opel', 'Kadett'),
(24, 'Ford', 'Escort'),
(25, 'Opel', 'Ascona'),
(26, 'Opel', 'Kadett'),
(27, 'Ford', 'Escort'),
(28, 'Ford', 'Escort'),
(29, 'Opel', 'Astra'),
(30, 'Volvo', '340'),
(31, 'Ford', 'Escort'),
(32, 'Ford', 'Escort'),
(33, 'Fiat', 'Tipo'),
(34, 'Opel', 'Ascona'),
(35, 'Opel', 'Kadet'),
(36, 'Fiat', 'Tipo'),
(37, 'Fiat', 'Uno'),
(38, 'Fiat', 'Punto'),
(39, 'Volvo', '340'),
(40, 'Opel', 'Kadett');

-- --------------------------------------------------------

--
-- Rakenne taululle `Henkilosto`
--

CREATE TABLE `Henkilosto` (
  `hloID` int NOT NULL,
  `Nimi` varchar(250) NOT NULL,
  `Rooli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vedos taulusta `Henkilosto`
--

INSERT INTO `Henkilosto` (`hloID`, `Nimi`, `Rooli`) VALUES
(1, 'Santeri Autio', 'Myyjä'),
(2, 'Aki Pölhö', 'Myyjä'),
(3, 'Arvid Berg', 'Myyjä'),
(4, 'Santeri Autio', 'Myyjä'),
(5, 'Santeri Autio', 'Myyjä'),
(6, 'Santeri Autio', 'Myyjä'),
(7, 'Santeri Autio', 'Myyjä'),
(8, 'Aki Pölhö', 'Myyjä'),
(9, 'Santeri Autio', 'Myyjä'),
(10, 'Santeri Autio', 'Myyjä'),
(11, 'Santeri Autio', 'Myyjä'),
(12, 'Santeri Autio', 'Myyjä'),
(13, 'Aki Pölhö', 'Myyjä'),
(14, 'Arvid Berg', 'Myyjä'),
(15, 'Santeri Autio', 'Myyjä'),
(16, 'Santeri Autio', 'Myyjä'),
(17, 'Santeri Autio', 'Myyjä'),
(18, 'Aki Pölhö', 'Myyjä'),
(19, 'Aki Pölhö', 'Myyjä'),
(20, 'Santeri Autio', 'Myyjä'),
(21, 'Aki Pölhö', 'Myyjä'),
(22, 'Aki Pölhö', 'Myyjä'),
(23, 'Arvid Berg', 'Myyjä'),
(24, 'Aki Pölhö', 'Myyjä'),
(25, 'Aki Pölhö', 'Myyjä'),
(26, 'Aki Pölhö', 'Myyjä'),
(27, 'Aki Pölhö', 'Myyjä'),
(28, 'Aki Pölhö', 'Myyjä'),
(29, 'Arvid Berg', 'Myyjä'),
(30, 'Santeri Autio', 'Myyjä'),
(31, 'Santeri Autio', 'Myyjä'),
(32, 'Santeri Autio', 'Myyjä'),
(33, 'Santeri Autio', 'Myyjä'),
(34, 'Santeri Autio', 'Myyjä'),
(35, 'Arvid Berg', 'Myyjä'),
(36, 'Aki Pölhö', 'Myyjä'),
(37, 'Santeri Autio', 'Myyjä'),
(38, 'Santeri Autio', 'Myyjä'),
(39, 'Aki Pölhö', 'Myyjä'),
(40, 'Arvid Berg', 'Myyjä');

-- --------------------------------------------------------

--
-- Rakenne taululle `Myytavat_autot`
--

CREATE TABLE `Myytavat_autot` (
  `AutoID` int NOT NULL,
  `Rek.nro` varchar(50) NOT NULL,
  `MerkkiID` int NOT NULL,
  `Moottorinkoko` varchar(50) NOT NULL,
  `Vuosimalli` int NOT NULL,
  `Mittarilukema` int NOT NULL,
  `Hinta` int NOT NULL,
  `hloID` int NOT NULL,
  `Asnro` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vedos taulusta `Myytavat_autot`
--

INSERT INTO `Myytavat_autot` (`AutoID`, `Rek.nro`, `MerkkiID`, `Moottorinkoko`, `Vuosimalli`, `Mittarilukema`, `Hinta`, `hloID`, `Asnro`) VALUES
(1, 'ACD-899', 1, '2,1', 86, 150000, 4500, 1, 101),
(2, 'AZZ-177', 2, '1,4', 84, 123000, 2300, 2, 102),
(3, 'BBB-466', 2, '1,2', 83, 98000, 3100, 2, 102),
(4, 'BOU-85', 2, '2,2', 91, 66500, 6500, 2, 102),
(5, 'BUU-420', 0, '2,2', 86, 133000, 4500, 0, 0),
(6, 'BZS-431', 0, '2,1', 91, 75000, 5750, 0, 0),
(7, 'HAA-439', 2, '2,4', 92, 89500, 6500, 2, 102),
(8, 'HAI-333', 3, '1,8', 90, 89000, 7500, 3, 103),
(9, 'HEL-444', 3, '2,4', 87, 179000, 3000, 3, 103),
(10, 'IBM-366', 0, '1,6', 93, 35500, 6350, 0, 0),
(11, 'KDF-622', 0, '1,6', 90, 42500, 2250, 0, 0),
(12, 'KOL-253', 0, '1,6', 91, 36000, 6850, 0, 0),
(13, 'KRE-197', 9, '1,4', 93, 42500, 7750, 9, 109),
(14, 'KYA-361', 0, '2,1', 88, 92000, 1500, 0, 0),
(15, 'LEE-440', 10, '1,1', 93, 31000, 5250, 10, 110),
(16, 'LEI-460', 7, '1,8', 86, 263000, 3500, 7, 107),
(17, 'LEN-314', 0, '2,1', 93, 40500, 6800, 0, 0),
(18, 'LRE-25', 0, '1,4', 82, 188000, 2500, 0, 0),
(19, 'NC-560', 8, '2,1', 85, 123000, 3500, 8, 108),
(20, 'NO-250', 11, '1,8', 91, 131500, 8350, 11, 111),
(21, 'OHO-860', 6, '1,8', 85, 178000, 3000, 6, 106),
(22, 'OKI-222', 11, '1,2', 94, 11500, 6000, 11, 111),
(23, 'OPS-289', 5, '1,4', 90, 16500, 2000, 5, 105),
(24, 'OPT-242', 0, '1,6', 89, 56000, 3600, 0, 0),
(25, 'PDI-432', 4, '2,1', 90, 61500, 3550, 4, 104),
(26, 'RAS-439', 0, '1,4', 88, 85000, 1200, 0, 0),
(27, 'RCD-547', 0, '1,6', 84, 112000, 2000, 0, 0),
(28, 'RTU-122', 0, '1,4', 87, 94000, 1750, 0, 0),
(29, 'TEE-422', 0, '2,1', 93, 46000, 7100, 0, 0),
(30, 'VAL-555', 0, '1,6', 88, 71000, 5500, 0, 0),
(31, 'VAT-681', 0, '1,6', 86, 72000, 4500, 0, 0),
(32, 'VES-233', 0, '1,6', 85, 85000, 3800, 0, 0),
(33, 'XAB-560', 0, '1,4', 89, 54000, 1000, 0, 0),
(34, 'XBU-323', 0, '2,1', 88, 81000, 1000, 0, 0),
(35, 'XHI-122', 0, '1,4', 85, 33000, 3200, 0, 0),
(36, 'XKU-102', 0, '1,2', 89, 23000, 1200, 0, 0),
(37, 'XSD-235', 0, '1,1', 88, 62000, 1500, 0, 0),
(38, 'XVA-220', 0, '1,4', 94, 27000, 6850, 0, 0),
(39, 'ZGG-100', 0, '1,4', 89, 61500, 5545, 0, 0),
(40, 'ÅGG-312', 0, '1,2', 88, 49000, 1250, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeksit taulukolle `Asiakas`
--
ALTER TABLE `Asiakas`
  ADD PRIMARY KEY (`AsiakasID`);

--
-- Indeksit taulukolle `Autot`
--
ALTER TABLE `Autot`
  ADD PRIMARY KEY (`AutoID`);

--
-- Indeksit taulukolle `Henkilosto`
--
ALTER TABLE `Henkilosto`
  ADD PRIMARY KEY (`hloID`);

--
-- Indeksit taulukolle `Myytavat_autot`
--
ALTER TABLE `Myytavat_autot`
  ADD PRIMARY KEY (`AutoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Asiakas`
--
ALTER TABLE `Asiakas`
  MODIFY `AsiakasID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Autot`
--
ALTER TABLE `Autot`
  MODIFY `AutoID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `Henkilosto`
--
ALTER TABLE `Henkilosto`
  MODIFY `hloID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `Myytavat_autot`
--
ALTER TABLE `Myytavat_autot`
  MODIFY `AutoID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
