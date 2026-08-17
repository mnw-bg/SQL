-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Isäntä: db
-- Luontiaika: 13.08.2026 klo 11:52
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
-- Tietokanta: `testdb`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `Kilpailut`
--

CREATE TABLE `Kilpailut` (
  `Hevonen` int NOT NULL,
  `Ravirata` int NOT NULL,
  `kilpailupvm` date NOT NULL,
  `Tulos` int NOT NULL,
  `voittosumma` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vedos taulusta `Kilpailut`
--

INSERT INTO `Kilpailut` (`Hevonen`, `Ravirata`, `kilpailupvm`, `Tulos`, `voittosumma`) VALUES
(34, 2, '2005-11-06', 6, 0),
(34, 4, '2005-08-01', 5, 0),
(87, 4, '2005-08-01', 5, 0),
(145, 1, '2005-09-12', 1, 300),
(165, 1, '2005-09-12', 2, 150),
(165, 1, '2005-08-01', 6, 0),
(235, 1, '2005-08-01', 6, 0),
(34, 3, '2005-10-10', 1, 1000),
(87, 3, '2005-10-10', 4, 0),
(125, 4, '2005-01-02', 1, 500),
(145, 4, '2005-01-02', 1, 500),
(235, 4, '2005-01-02', 5, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
