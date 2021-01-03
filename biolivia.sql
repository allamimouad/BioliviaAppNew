-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 25, 2020 at 03:20 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biolivia`
--

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `text_content` text NOT NULL,
  `total` float NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_commande`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id_commande`, `user`, `text_content`, `total`, `date_ajout`) VALUES
(18, 10, '<li><div ><a href=\"page_produit.php?id_produit=18\"><img src=\"images/products/1L.jpg\" class=\"imgPanier\" style=\"width:120px;height:160px;\"></a><span class=\"quantite\" style=\"font-size:1.7em;\">1 x </span> <a style=\"position: relative;bottom: 28px;padding:0;color:grey;font-size:1.5em;\" href=\"page_produit.php?id_produit=18\">Biolivia huile d olive 1 Littre</a><span class=\"pricePanier\" style=\"font-weight:bold;font-size:1.3em;\">60 Dhs</span></div></li><li><div class=\"total\" style=\"margin-top:10px;border-top:3px solid grey\"><span class=\"left\" style=\"font-weight:bold;font-size:1.3em\">Total</span><span class=\"right\" style=\"float: right;font-weight:bold;font-size:1.3em\">60 DHS</span></div></li>', 60, '2020-12-25 02:33:49'),
(19, 19, '<li><div ><a href=\"page_produit.php?id_produit=18\"><img src=\"images/products/1L.jpg\" class=\"imgPanier\" style=\"width:120px;height:160px;\"></a><span class=\"quantite\" style=\"font-size:1.7em;\">1 x </span> <a style=\"position: relative;bottom: 28px;padding:0;color:grey;font-size:1.5em;\" href=\"page_produit.php?id_produit=18\">Biolivia huile d olive 1 Littre</a><span class=\"pricePanier\" style=\"font-weight:bold;font-size:1.3em;\">60 Dhs</span></div></li><li><div ><a href=\"page_produit.php?id_produit=19\"><img src=\"images/products/5L.jpg\" class=\"imgPanier\" style=\"width:120px;height:160px;\"></a><span class=\"quantite\" style=\"font-size:1.7em;\">299 x </span> <a style=\"position: relative;bottom: 28px;padding:0;color:grey;font-size:1.5em;\" href=\"page_produit.php?id_produit=19\">Biolivia huile d olive 5 Littre</a><span class=\"pricePanier\" style=\"font-weight:bold;font-size:1.3em;\">74 750 Dhs</span></div></li><li><div class=\"total\" style=\"margin-top:10px;border-top:3px solid grey\"><span class=\"left\" style=\"font-weight:bold;font-size:1.3em\">Total</span><span class=\"right\" style=\"float: right;font-weight:bold;font-size:1.3em\">74 810 DHS</span></div></li>', 74810, '2020-12-25 02:42:10'),
(17, 10, '<li><div ><a href=\"page_produit.php?id_produit=20\"><img src=\"images/products/25L.jpg\" class=\"imgPanier\" style=\"width:120px;height:160px;\"></a><span class=\"quantite\" style=\"font-size:1.7em;\">1 x </span> <a style=\"position: relative;bottom: 28px;padding:0;color:grey;font-size:1.5em;\" href=\"page_produit.php?id_produit=20\">Biolivia huile d olive 25 Littre</a><span class=\"pricePanier\" style=\"font-weight:bold;font-size:1.3em;\">1 000 Dhs</span></div></li><li><div ><a href=\"page_produit.php?id_produit=19\"><img src=\"images/products/5L.jpg\" class=\"imgPanier\" style=\"width:120px;height:160px;\"></a><span class=\"quantite\" style=\"font-size:1.7em;\">1 x </span> <a style=\"position: relative;bottom: 28px;padding:0;color:grey;font-size:1.5em;\" href=\"page_produit.php?id_produit=19\">Biolivia huile d olive 5 Littre</a><span class=\"pricePanier\" style=\"font-weight:bold;font-size:1.3em;\">250 Dhs</span></div></li><li><div class=\"total\" style=\"margin-top:10px;border-top:3px solid grey\"><span class=\"left\" style=\"font-weight:bold;font-size:1.3em\">Total</span><span class=\"right\" style=\"float: right;font-weight:bold;font-size:1.3em\">1 250 DHS</span></div></li>', 1250, '2020-12-25 02:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL DEFAULT '0',
  `photo` varchar(255) NOT NULL DEFAULT '0',
  `prix_no_promo` int(11) NOT NULL DEFAULT 0,
  `prix` int(11) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom`, `photo`, `prix_no_promo`, `prix`, `description`, `stock`) VALUES
(18, 'Biolivia huile d olive 1 Littre', 'images/products/1L.jpg', 0, 60, '', 298),
(19, 'Biolivia huile d olive 5 Littre', 'images/products/5L.jpg', 250, 240, '', 0),
(20, 'Biolivia huile d olive 25 Littre', 'images/products/25L.jpg', 0, 1000, '', 299);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `genre` varchar(1) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `nom`, `prenom`, `password`, `genre`, `ville`, `adress`) VALUES
(12, 'kellie1987@gmail.com', 'Carver', 'Lois', '123456789', '0', 'Hartwick', 'Hartwick, New York(NY), 13348'),
(13, 'moriah_haye6@gmail.com', 'Mitchell', 'Eboni', '123456789', '0', 'Goodyear', 'Goodyear, Arizona(AZ), 85338'),
(14, 'sadie.met5@gmail.com', 'Sosa', 'Scott', '123456789', '0', 'Fremont', 'Fremont, California(CA), 94536'),
(15, 'rollin_reich@hotmail.com', 'Pak', 'Brandon', '123456789', '0', 'Nacogdoches', 'Nacogdoches, Texas(TX), 75961'),
(16, 'thora.herma4@gmail.com', 'Jenkins', 'Ebony', '123456789', '0', 'Atlanta', 'Atlanta, Georgia(GA), 30329'),
(17, 'petra2017@gmail.com', 'Carr', 'Edna', '123456789', '0', 'Tallahassee', 'Tallahassee, Florida(FL), 3231'),
(18, 'shaun_conro2@yahoo.com', 'Lemon', 'Cecil', '123456789', '0', 'Hopkinsville', 'Hopkinsville, Kentucky(KY), 42'),
(19, 'mouad@exemple.com', 'allami', 'mouad', '123456789', '1', 'birjdid', 'birjdid');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
