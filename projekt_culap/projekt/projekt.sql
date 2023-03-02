-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 06:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `administratori`
--

CREATE TABLE `administratori` (
  `id` int(6) NOT NULL,
  `ime` varchar(100) DEFAULT NULL,
  `prezime` varchar(100) DEFAULT NULL,
  `korisnicko_ime` varchar(100) DEFAULT NULL,
  `lozinka` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administratori`
--

INSERT INTO `administratori` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`) VALUES
(1, 'Katarina', 'Ćulap', 'katarina', 'katarina'),
(2, 'Boris', 'Badurina', 'boris', 'boris'),
(3, 'Pero', 'Perić', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `narudzba`
--

CREATE TABLE `narudzba` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) NOT NULL,
  `prezime` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobitel` varchar(50) NOT NULL,
  `poruka` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `narudzba`
--

INSERT INTO `narudzba` (`id`, `ime`, `prezime`, `email`, `mobitel`, `poruka`) VALUES
(37, 'Proba', 'Proba', 'kculap@ffos.hr', '4084845748', 'Dobar dan, želim naručiti 1 kinder tortu.'),
(39, 'Katarina', 'Ćulap', 'kculap@ffos.hr', '0915555555', 'Htjela bih naručiti jednu kinder tortu, molim Vas da me nazovete! LP.');

-- --------------------------------------------------------

--
-- Table structure for table `recenzije`
--

CREATE TABLE `recenzije` (
  `id` int(11) NOT NULL,
  `ime` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `ocjena` int(1) NOT NULL,
  `tekst` text CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `datum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recenzije`
--

INSERT INTO `recenzije` (`id`, `ime`, `ocjena`, `tekst`, `datum`) VALUES
(8, 'Marko Mak', 1, 'Prezadovoljan!', 1621940010),
(13, 'gfsgf', 4, 'fsgs', 1663323397),
(14, 'gfsgf', 4, 'fsgs', 1663323398),
(15, 'fgsgsg', 4, 'gfsdgs', 1663323500);

-- --------------------------------------------------------

--
-- Table structure for table `recepti`
--

CREATE TABLE `recepti` (
  `id` int(11) NOT NULL,
  `naslov` varchar(100) DEFAULT NULL,
  `tekst_posta` varchar(200) DEFAULT NULL,
  `datum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recepti`
--

INSERT INTO `recepti` (`id`, `naslov`, `tekst_posta`, `datum`) VALUES
(1, 'Nutella torta', 'Biskvit\r\n6jaja\r\n120 gšećera\r\n180 gbrašna\r\n30 gkakaa\r\n1 vrećicapraška za pecivo\r\n1 žličicaekstrakta vanilije\r\nPreljev za biskvit\r\n200 mlvode\r\n50 gšećera\r\n2 žliceruma za kolače\r\nKrema\r\n500 mlslatkog vrh', '0000-00-00'),
(8, 'Voćna torta', 'Proba', '2022-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `slastice`
--

CREATE TABLE `slastice` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `slika` varchar(255) NOT NULL,
  `cijena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slastice`
--

INSERT INTO `slastice` (`id`, `naziv`, `slika`, `cijena`) VALUES
(1, 'Mađarica', 'madarica.jpg', '8.00'),
(2, 'Ledeni vjetar', 'ledeni.jpg', '15.00'),
(3, 'Krempita', 'krempita.jpg', '10.00'),
(4, 'Kinder torta', 'kinder.jpg', '15.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administratori`
--
ALTER TABLE `administratori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narudzba`
--
ALTER TABLE `narudzba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recenzije`
--
ALTER TABLE `recenzije`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recepti`
--
ALTER TABLE `recepti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slastice`
--
ALTER TABLE `slastice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administratori`
--
ALTER TABLE `administratori`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `narudzba`
--
ALTER TABLE `narudzba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `recenzije`
--
ALTER TABLE `recenzije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `recepti`
--
ALTER TABLE `recepti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slastice`
--
ALTER TABLE `slastice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
