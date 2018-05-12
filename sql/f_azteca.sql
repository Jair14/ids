-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2018 at 02:14 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `f_azteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `calificacion`
--

CREATE TABLE `calificacion` (
  `folio_alumno` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `id_pregunta` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `respuesta_dada` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `respuesta_correcta` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `correcta/incorrecta` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `puntuacion` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `secciones`
--

CREATE TABLE `secciones` (
  `seccion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `no_preguntas` int(4) NOT NULL,
  `last` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `secciones`
--

INSERT INTO `secciones` (`seccion`, `no_preguntas`, `last`) VALUES
('Seccion 1', 3, 1006),
('Seccion 2', 3, 2010),
('Seccion 3', 2, 3002),
('Seccion 4', 3, 4005),
('Seccion 5', 5, 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`seccion`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
