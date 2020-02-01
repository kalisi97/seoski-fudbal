-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2017 at 02:02 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuca`
--

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`id`, `naziv`) VALUES
(1, 'Beograd'),
(2, 'Jagodina'),
(3, 'Novi Sad'),
(4, 'Nis'),
(5, 'Kragujevac'),
(6, 'Krusevac');

-- --------------------------------------------------------

--
-- Table structure for table `mec`
--

CREATE TABLE `mec` (
  `mecID` int(11) NOT NULL,
  `domacinID` int(11) NOT NULL,
  `gostID` int(11) NOT NULL,
  `golovaDomacin` int(11) NOT NULL,
  `golovaGost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mec`
--

INSERT INTO `mec` (`mecID`, `domacinID`, `gostID`, `golovaDomacin`, `golovaGost`) VALUES
(1, 1, 12, 4, 1),
(4, 1, 9, 3, 1),
(5, 1, 11, 6, 3),
(6, 6, 1, 2, 2),
(7, 2, 5, 3, 1),
(8, 2, 11, 7, 1),
(9, 7, 2, 2, 3),
(10, 3, 2, 2, 1),
(11, 3, 8, 4, 0),
(13, 10, 3, 1, 4),
(14, 11, 12, 1, 1),
(15, 8, 9, 2, 2),
(16, 4, 6, 0, 5),
(17, 5, 7, 1, 0),
(18, 1, 10, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabela`
--

CREATE TABLE `tabela` (
  `rb` int(11) NOT NULL,
  `timID` int(11) NOT NULL,
  `ukupnoUtakmica` int(11) NOT NULL,
  `pobeda` int(11) NOT NULL,
  `nereseno` int(11) NOT NULL,
  `poraza` int(11) NOT NULL,
  `golovaDatih` int(11) NOT NULL,
  `golovaPrimljenih` int(11) NOT NULL,
  `brojPoena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabela`
--

INSERT INTO `tabela` (`rb`, `timID`, `ukupnoUtakmica`, `pobeda`, `nereseno`, `poraza`, `golovaDatih`, `golovaPrimljenih`, `brojPoena`) VALUES
(1, 1, 5, 4, 1, 0, 17, 7, 13),
(2, 2, 4, 3, 0, 1, 14, 6, 9),
(3, 3, 3, 3, 0, 0, 10, 2, 9),
(4, 4, 1, 0, 0, 1, 0, 5, 0),
(5, 5, 2, 1, 0, 1, 2, 3, 3),
(6, 6, 2, 1, 1, 0, 7, 2, 4),
(7, 7, 2, 0, 0, 2, 2, 4, 0),
(8, 8, 2, 0, 1, 1, 2, 6, 1),
(9, 9, 2, 0, 1, 1, 3, 5, 1),
(10, 10, 2, 0, 0, 2, 1, 6, 0),
(11, 11, 3, 0, 1, 2, 5, 14, 1),
(12, 12, 2, 0, 1, 1, 2, 5, 1),
(13, 17, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `timID` int(11) NOT NULL,
  `nazivTima` varchar(255) NOT NULL,
  `brojIgraca` int(11) NOT NULL,
  `gradID` int(11) NOT NULL,
  `grb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`timID`, `nazivTima`, `brojIgraca`, `gradID`, `grb`) VALUES
(1, 'Mali jezevi', 23, 6, 'jezevi.png'),
(2, 'Buldog roversi', 43, 1, 'bulldog.png'),
(3, 'Curani', 32, 2, 'curani.gif'),
(4, 'Nislije', 34, 4, 'merak.gif'),
(5, 'Podbara NS', 26, 3, 'ns.gif'),
(6, 'Palma', 33, 2, 'palma.jpg'),
(7, 'Radnicki Kragujeva', 32, 5, 'radnicki.png'),
(8, 'Jedva smo se skupili', 17, 1, 'jsss.jpg'),
(9, 'Jokic Magija', 23, 3, 'jokic.png'),
(10, 'Mozaik', 31, 5, 'mozaik.jpg'),
(11, 'Black Ring Crew', 19, 1, 'brc.jpg'),
(12, 'Milojica i deca', 13, 6, 'milojic.jpg'),
(17, 'urke bojz', 23, 2, 'ruza.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `verifikovano` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `ime`, `prezime`, `username`, `password`, `admin`, `verifikovano`) VALUES
(1, 'Urke', 'Savov', 'urke', 'urke', 1, 1),
(2, 'Vladimir', 'Cakovic', 'cako', 'cako', 0, 1),
(3, 'cone', 'cone', 'cone', 'cone', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mec`
--
ALTER TABLE `mec`
  ADD PRIMARY KEY (`mecID`),
  ADD KEY `domacinID` (`domacinID`),
  ADD KEY `gostID` (`gostID`);

--
-- Indexes for table `tabela`
--
ALTER TABLE `tabela`
  ADD PRIMARY KEY (`rb`,`timID`),
  ADD KEY `timID` (`timID`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`timID`),
  ADD KEY `gradID` (`gradID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mec`
--
ALTER TABLE `mec`
  MODIFY `mecID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tabela`
--
ALTER TABLE `tabela`
  MODIFY `rb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `timID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mec`
--
ALTER TABLE `mec`
  ADD CONSTRAINT `mec_ibfk_1` FOREIGN KEY (`domacinID`) REFERENCES `tim` (`timID`),
  ADD CONSTRAINT `mec_ibfk_2` FOREIGN KEY (`gostID`) REFERENCES `tim` (`timID`);

--
-- Constraints for table `tabela`
--
ALTER TABLE `tabela`
  ADD CONSTRAINT `tabela_ibfk_1` FOREIGN KEY (`timID`) REFERENCES `tim` (`timID`);

--
-- Constraints for table `tim`
--
ALTER TABLE `tim`
  ADD CONSTRAINT `tim_ibfk_1` FOREIGN KEY (`gradID`) REFERENCES `grad` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
