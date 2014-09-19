-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 19 Septembre 2014 à 16:46
-- Version du serveur: 5.5.39-log
-- Version de PHP: 5.4.32-pl0-gentoo

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `wn_portfolio`
--
CREATE DATABASE IF NOT EXISTS `wn_portfolio` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wn_portfolio`;

-- --------------------------------------------------------

--
-- Structure de la table `autres`
--

DROP TABLE IF EXISTS `autres`;
CREATE TABLE IF NOT EXISTS `autres` (
  `id` int(10) unsigned zerofill NOT NULL,
  `logo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `autres`
--

TRUNCATE TABLE `autres`;
--
-- Contenu de la table `autres`
--

INSERT INTO `autres` (`id`, `logo`) VALUES
(0000000101, 'trame1.png'),
(0000000102, 'trame2.png'),
(0000000103, 'trame3.png');

-- --------------------------------------------------------

--
-- Structure de la table `cadres`
--

DROP TABLE IF EXISTS `cadres`;
CREATE TABLE IF NOT EXISTS `cadres` (
  `id` int(10) unsigned zerofill NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text,
  `type` enum('references','autres') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `cadres`
--

TRUNCATE TABLE `cadres`;
--
-- Contenu de la table `cadres`
--

INSERT INTO `cadres` (`id`, `titre`, `description`, `type`) VALUES
(0000000001, 'Paul Exploit ... Poing & Fer', '<br><br><p>\r\nIl s''agit de la version 1 du site du groupe.</p>\r\n<br>\r\n<p>\r\nLe site possède un lecteur de MP3 écrit en jQuery/HTML5,<br> un slider d''images doté d''un minuteur, <br>et il affiche le contenu de la page fan Facebook.\r\n</p>\r\n<br>\r\n<br>\r\n<p>\r\nLess is more.\r\n</p>\r\n\r\n', 'references'),
(0000000002, 'test2', 'petite description 2 due 2', 'references'),
(0000000003, 'test3', 'petite description 3 tre 3', 'references'),
(0000000004, 'test4', 'petite description 4 quattro 4', 'references'),
(0000000101, 'réseaux', 'description réseaux', 'autres'),
(0000000102, 'maintenance', 'description maintenance', 'autres'),
(0000000103, 'contact', '54 rue de vincennes 93100 MONTREUIL', 'autres');

-- --------------------------------------------------------

--
-- Structure de la table `references`
--

DROP TABLE IF EXISTS `references`;
CREATE TABLE IF NOT EXISTS `references` (
  `id` int(10) unsigned zerofill NOT NULL,
  `sousTitre` varchar(100) DEFAULT NULL,
  `bg` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `tech` text,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `bg_UNIQUE` (`bg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `references`
--

TRUNCATE TABLE `references`;
--
-- Contenu de la table `references`
--

INSERT INTO `references` (`id`, `sousTitre`, `bg`, `img`, `url`, `tech`, `position`) VALUES
(0000000001, 'sous-titre de la reference 1 uno 1', 'bgPaulEx.png', 'slidePaulExploit.png', 'http://paul-exploit.fr/', 'PHP, jQuery, HTML5, API Facebook', 1),
(0000000002, 'sous-titre de la reference 2 due 2', 'bg-intro2.jpg', 'slide2.jpg', 'http://whosnet2014.fr/', 'php,jquery,truc,bidule', 2),
(0000000003, 'sous-titre de la reference 3 tre 3', 'bg-intro3.jpg', 'slide3.jpg', 'http://whosnet2014.fr/', 'php,jquery,truc,bidule', 3),
(0000000004, 'sous-titre de la reference 4 quattro 4', 'bg-intro4.jpg', 'slide4.jpg', 'http://whosnet2014.fr/', 'php,jquery,truc,bidule', 4);

-- --------------------------------------------------------

--
-- Structure de la table `reseaux-sociaux`
--

DROP TABLE IF EXISTS `reseaux-sociaux`;
CREATE TABLE IF NOT EXISTS `reseaux-sociaux` (
  `id` int(11) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `reseaux-sociaux`
--

TRUNCATE TABLE `reseaux-sociaux`;
--
-- Contenu de la table `reseaux-sociaux`
--

INSERT INTO `reseaux-sociaux` (`id`, `logo`, `url`) VALUES
(1, 'fIcon.png', NULL),
(2, 'tIcon.png', NULL),
(3, 'sonIcon', NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `autres`
--
ALTER TABLE `autres`
  ADD CONSTRAINT `fk_autres_cadres` FOREIGN KEY (`id`) REFERENCES `cadres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `references`
--
ALTER TABLE `references`
  ADD CONSTRAINT `fk_references_cadres` FOREIGN KEY (`id`) REFERENCES `cadres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
