-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2020 at 12:21 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinf_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `commerce`
--

DROP TABLE IF EXISTS `commerce`;
CREATE TABLE IF NOT EXISTS `commerce` (
  `id_commerce` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `nom_commerce` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `tel` int(11) NOT NULL,
  `blacklist` int(11) NOT NULL,
  `abonne` int(11) NOT NULL,
  `chemin_photo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_commerce`),
  UNIQUE KEY `id_commerce` (`id_commerce`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commerce`
--

INSERT INTO `commerce` (`id_commerce`, `id_utilisateur`, `nom_commerce`, `email`, `nom`, `prenom`, `tel`, `blacklist`, `abonne`, `chemin_photo`) VALUES
(1, 1, 'mon site', 'ghj@gmail.com', 'Frémeaux', 'Maxime', 102030405, 0, 1, ''),
(2, 1, 'ton site', 'ghj@gmail.com', 'Frémeaux', 'Maxime', 102030405, 0, 0, ''),
(3, 4, 'qsdds', 'tutu@free.fr', 'tutu', 'tutu', 708090405, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `horaires`
--

DROP TABLE IF EXISTS `horaires`;
CREATE TABLE IF NOT EXISTS `horaires` (
  `jour` varchar(10) NOT NULL,
  `id_commerce` int(11) NOT NULL,
  `deb_mat` datetime NOT NULL,
  `fin_mat` datetime NOT NULL,
  `deb_ap` datetime NOT NULL,
  `fin_ap` datetime NOT NULL,
  PRIMARY KEY (`jour`,`id_commerce`),
  KEY `id_commerce` (`id_commerce`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `journees`
--

DROP TABLE IF EXISTS `journees`;
CREATE TABLE IF NOT EXISTS `journees` (
  `id_journee` int(11) NOT NULL,
  `jour` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_journee`,`jour`),
  KEY `jour` (`jour`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mesrdv`
--

DROP TABLE IF EXISTS `mesrdv`;
CREATE TABLE IF NOT EXISTS `mesrdv` (
  `id_rdv` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_commerce` int(11) NOT NULL,
  `id_journee` int(11) NOT NULL,
  `horaire_deb` datetime NOT NULL,
  PRIMARY KEY (`id_rdv`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_commerce` (`id_commerce`),
  KEY `id_journee` (`id_journee`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ouverturec`
--

DROP TABLE IF EXISTS `ouverturec`;
CREATE TABLE IF NOT EXISTS `ouverturec` (
  `id_commerce` int(11) NOT NULL,
  `id_journee` int(11) NOT NULL,
  `ouvert` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_commerce`,`id_journee`),
  KEY `id_journee` (`id_journee`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id_commerce` int(11) NOT NULL,
  `nom_commerce` varchar(45) NOT NULL,
  `nom_service` varchar(30) NOT NULL,
  `services` text NOT NULL,
  `couts` int(11) NOT NULL,
  `duree_rdv` int(11) NOT NULL,
  KEY `id_commerce` (`id_commerce`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id_commerce`, `nom_commerce`, `nom_service`, `services`, `couts`, `duree_rdv`) VALUES
(1, 'mon site', 'coiffure', 'je vous coiffe', 69, 15),
(1, 'mon site', 'moi', 'je m\'offre', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passe` varchar(32) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `blacklist` int(11) NOT NULL,
  `chemin_photo` varchar(45) NOT NULL,
  `connecte` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `email`, `passe`, `qualification`, `nom`, `prenom`, `blacklist`, `chemin_photo`, `connecte`) VALUES
(1, 'maxime', 'maxant15@hotmail.fr', 'maxime', 'adminAdmin', 'Frémeaux', 'Maxime', 0, '', 0),
(2, 'test', 'test@test.net', 'test', 'pro', 'Test', 'Test', 0, '', 0),
(3, 'test2', 'test2@test.com', 'test2', 'part', 'test', 'test', 0, '', 0),
(4, 'tutu', 'tutu@free.fr', 'tutu', 'pro', 'tutu', 'tutu', 0, '', 1),
(5, 'sdfdfs', 'hgcjio@gmail.com', 'qzDEZRGSTHJYD', 'pro', 'dfsfds', 'dsqfds', 1, '', 0),
(6, 'cest moi', 'sfsd@free.fr', 'zerty', 'part', 'rou', 'zef', 1, '', 0),
(7, 'c\'et', 'cmoi@gmail.com', 'toi', 'toi', 'toi', 'toi', 0, '', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commerce`
--
ALTER TABLE `commerce`
  ADD CONSTRAINT `commerce_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Constraints for table `horaires`
--
ALTER TABLE `horaires`
  ADD CONSTRAINT `horaires_ibfk_1` FOREIGN KEY (`id_commerce`) REFERENCES `commerce` (`id_commerce`),
  ADD CONSTRAINT `horaires_ibfk_2` FOREIGN KEY (`jour`) REFERENCES `journees` (`jour`);

--
-- Constraints for table `mesrdv`
--
ALTER TABLE `mesrdv`
  ADD CONSTRAINT `mesrdv_ibfk_1` FOREIGN KEY (`id_commerce`) REFERENCES `commerce` (`id_commerce`),
  ADD CONSTRAINT `mesrdv_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `mesrdv_ibfk_3` FOREIGN KEY (`id_journee`) REFERENCES `journees` (`id_journee`);

--
-- Constraints for table `ouverturec`
--
ALTER TABLE `ouverturec`
  ADD CONSTRAINT `ouvertureC_ibfk_1` FOREIGN KEY (`id_journee`) REFERENCES `journees` (`id_journee`),
  ADD CONSTRAINT `ouvertureC_ibfk_2` FOREIGN KEY (`id_commerce`) REFERENCES `commerce` (`id_commerce`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`id_commerce`) REFERENCES `commerce` (`id_commerce`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
