-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mar. 07 sep. 2021 à 11:15
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecf2`
--
CREATE DATABASE IF NOT EXISTS `ecf2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ecf2`;

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

DROP TABLE IF EXISTS `recettes`;
CREATE TABLE IF NOT EXISTS `recettes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 NOT NULL,
  `pays` varchar(50) CHARACTER SET utf8 NOT NULL,
  `legumes` varchar(50) CHARACTER SET utf8 NOT NULL,
  `fruits` varchar(50) CHARACTER SET utf8 NOT NULL,
  `images` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id`, `title`, `description`, `pays`, `legumes`, `fruits`, `images`) VALUES
(30, 'Beyrouth', 'Houmous vert', 'Liban', 'Pois chiche, menth', '/', '60d597575f904_houmous_pesto.jpg'),
(31, 'lemon cake', 'Meringue zeste de citron et jus de citron', 'italie', '/', 'Citron', '61090a5785307_lemoncake.jpg'),
(24, 'Coques et pois', 'Les coques sont des coquillages extrêmement simples à cuisiner.', 'Cap vert', 'Petit pois, oigons jaunes,ail', '/', 'coques_legumes.jpg'),
(29, 'Le Bordelais', 'Une pointe de Rhum et de la vanille', 'France', '/', 'Fraise, Myrtill', '60d594c63c862_fruits_rouges.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(120) CHARACTER SET utf8 NOT NULL,
  `mail` varchar(200) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `role` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `mail`, `password`, `role`) VALUES
(60, 'lucie', 'aubrac@ffi.com', '$2y$10$7fM0hJj/A10t6uIOQEDbtedafl25GtyuMBJcd68ZZEOFF7P2wDGji', 1),
(61, 'alain', 'maire@bdx.fr', '$2y$10$w30BMdp22fXkgyiDtuaer.Xm2hV3gyqbzSsBGhVRjyPMd9f/EiM9O', 0),
(62, 'louis', '16@france.fr', '$2y$10$0aDf.2OggyBBt.EquVzezO2s2lSRQ6/aTxZXJg2RZ/dxswe4jc3KK', 0),
(67, 'jean', 'valjean@mis.fr', '$2y$10$o.jhtNGb/vxFoj1rwogAwOhfNrJwsxR6yC3Iz7q9Q7RxkZuhI1lPy', NULL);
--
-- Base de données : `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
