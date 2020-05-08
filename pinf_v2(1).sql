-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2020 at 01:31 PM
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
(3, 4, 'qsdds', 'tutu@free.fr', 'tutu', 'tutu', 708090405, 0, 0, ''),
(4, 3, 'l\'urgo', 'urgo@gmail.com', 'test', 'test', 906040502, 0, 0, ''),
(5, 7, 'yoo', 'yyoo@gmail.com', 'toi', 'toi', 201050604, 0, 0, ''),
(6, 6, 'yo', 'yo@gmail.com', 'rou', 'zef', 202020202, 0, 0, ''),
(7, 8, 'coco', 'coco@free.fr', 'kader', 'toto', 506040201, 0, 0, ''),
(8, 9, 'too', 'too@free.fr', 'too', 'too', 102030405, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `horaires`
--

DROP TABLE IF EXISTS `horaires`;
CREATE TABLE IF NOT EXISTS `horaires` (
  `id_commerce` int(11) NOT NULL,
  `deb_mat` time NOT NULL,
  `fin_mat` time NOT NULL,
  `deb_ap` time NOT NULL,
  `fin_ap` time NOT NULL,
  `jour` varchar(10) NOT NULL,
  KEY `id_commerce` (`id_commerce`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info_commerce`
--

DROP TABLE IF EXISTS `info_commerce`;
CREATE TABLE IF NOT EXISTS `info_commerce` (
  `id_commerce` int(11) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  KEY `id_commerce` (`id_commerce`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_commerce`
--

INSERT INTO `info_commerce` (`id_commerce`, `ville`, `code_postal`, `adresse`) VALUES
(1, 'aire', 62120, '95 rue basse');

-- --------------------------------------------------------

--
-- Table structure for table `journees`
--

DROP TABLE IF EXISTS `journees`;
CREATE TABLE IF NOT EXISTS `journees` (
  `jour` varchar(10) NOT NULL,
  `date_jour` date NOT NULL,
  `id_commerce` int(11) NOT NULL,
  KEY `jour` (`jour`) USING BTREE,
  KEY `id_commerce` (`id_commerce`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journees`
--

INSERT INTO `journees` (`jour`, `date_jour`, `id_commerce`) VALUES
('Monday', '2020-04-28', 6),
('Monday', '2020-05-04', 6),
('Monday', '2020-05-11', 6),
('Monday', '2020-05-18', 6),
('Monday', '2020-05-25', 6),
('Monday', '2020-06-01', 6),
('Monday', '2020-06-08', 6),
('Monday', '2020-06-15', 6),
('Monday', '2020-06-22', 6),
('Monday', '2020-06-29', 6),
('Sunday', '2020-04-28', 6),
('Sunday', '2020-05-03', 6),
('Sunday', '2020-05-10', 6),
('Sunday', '2020-05-17', 6),
('Sunday', '2020-05-24', 6),
('Sunday', '2020-05-31', 6),
('Sunday', '2020-06-07', 6),
('Sunday', '2020-06-14', 6),
('Sunday', '2020-06-21', 6),
('Sunday', '2020-06-28', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mesrdv`
--

DROP TABLE IF EXISTS `mesrdv`;
CREATE TABLE IF NOT EXISTS `mesrdv` (
  `id_rdv` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_commerce` int(11) NOT NULL,
  `horaire_deb` datetime NOT NULL,
  `id_journee` int(11) NOT NULL,
  PRIMARY KEY (`id_rdv`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_commerce` (`id_commerce`) USING BTREE
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
(1, 'maxime', 'maxant15@hotmail.fr', 'maxime', 'adminAdmin', 'Frémeaux', 'Maxime', 0, '', 1),
(2, 'test', 'test@test.net', 'test', 'pro', 'Test', 'Test', 0, '', 0),
(3, 'test2', 'test2@test.com', 'test2', 'part', 'test', 'test', 0, '', 0),
(4, 'tutu', 'tutu@free.fr', 'tutu', 'pro', 'tutu', 'tutu', 0, '', 0),
(5, 'sdfdfs', 'hgcjio@gmail.com', 'qzDEZRGSTHJYD', 'pro', 'dfsfds', 'dsqfds', 1, '', 0),
(6, 'cest moi', 'sfsd@free.fr', 'zerty', 'pro', 'rou', 'zef', 0, '', 1),
(8, 'abdoul', 'toto@gmail.com', 'toto2', 'pro', 'kader', 'toto', 0, '', 0),
(9, 'too', 'too@free.fr', 'too', 'pro', 'too', 'too', 0, '', 1);

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
  ADD CONSTRAINT `horaires_ibfk_2` FOREIGN KEY (`id_commerce`) REFERENCES `commerce` (`id_commerce`);

--
-- Constraints for table `info_commerce`
--
ALTER TABLE `info_commerce`
  ADD CONSTRAINT `info_commerce_ibfk_1` FOREIGN KEY (`id_commerce`) REFERENCES `commerce` (`id_commerce`);

--
-- Constraints for table `journees`
--
ALTER TABLE `journees`
  ADD CONSTRAINT `journees_ibfk_1` FOREIGN KEY (`id_commerce`) REFERENCES `commerce` (`id_commerce`);

--
-- Constraints for table `mesrdv`
--
ALTER TABLE `mesrdv`
  ADD CONSTRAINT `mesrdv_ibfk_1` FOREIGN KEY (`id_commerce`) REFERENCES `commerce` (`id_commerce`),
  ADD CONSTRAINT `mesrdv_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`id_commerce`) REFERENCES `commerce` (`id_commerce`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
