-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 11 juin 2019 à 17:21
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `espace_membre`
--

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `membre_id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  PRIMARY KEY (`membre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`membre_id`, `pseudo`, `mail`, `motdepasse`) VALUES
(1, 'Kujaku', 'alexispapon@yahoo.fr', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'antonin', 'antonin@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');

-- --------------------------------------------------------

--
-- Structure de la table `plante`
--

DROP TABLE IF EXISTS `plante`;
CREATE TABLE IF NOT EXISTS `plante` (
  `plante_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `catégorie` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `photo` text COLLATE utf8_bin NOT NULL,
  `humidité` int(11) NOT NULL,
  `température` int(11) NOT NULL,
  `luminosité` int(11) NOT NULL,
  `floraison` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`plante_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `plante`
--

INSERT INTO `plante` (`plante_id`, `nom`, `catégorie`, `description`, `photo`, `humidité`, `température`, `luminosité`, `floraison`) VALUES
(1, 'Tomate', 'Solanaceae', 'Les tomates font d\'excellent fruits pour l\'été en entrée avec de la mozzarella.', 'image/tomate', -1, 2, 4, 'Pendant l\'été.'),
(2, 'Olivier', 'Oleaceae', 'On trouve dessus une chose que l\'ont raffole pour les apéros, les olives.', 'image/olivier', -2, 4, 3, 'Mois de mars.'),
(3, 'Lavande', 'Lamiaceae', 'La lavande est une plante qui sent plutôt bon. ', 'image/lavande', -2, 1, 3, 'Entre juin et juillet.'),
(4, 'Rose', 'Rosaceae', 'Une très belle fleur une fois qu\'elle a fleurit', '', -1, 3, 3, 'Entre juin et octobre'),
(5, 'Cactus', 'Cactaceae', 'Attention la plante peux piquer si vous la toucher !', '', -3, 4, 4, 'Au printemps'),
(6, 'Mimosa', 'Fabaceae', 'C\'est jaune et ça sent bon !', '', -2, 3, 3, 'Pendant l\'hiver'),
(10, 'Fraisier', 'Rosaceae', 'Les fraises c\'est juste trop bon !', 'https://www.gammvert.fr/conseils/sites/default/files/styles/main_image/public/2017-08/AdobeStock_112344597reduit.jpg?itok=qanW-cwx', -1, 1, 1, 'Avril');

-- --------------------------------------------------------

--
-- Structure de la table `plante_user`
--

DROP TABLE IF EXISTS `plante_user`;
CREATE TABLE IF NOT EXISTS `plante_user` (
  `plante_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `plante_id` int(11) NOT NULL,
  `membre_id` int(11) NOT NULL,
  PRIMARY KEY (`plante_user_id`),
  KEY `FK_plante_id` (`plante_id`),
  KEY `FK_membre_id` (`membre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `plante_user`
--

INSERT INTO `plante_user` (`plante_user_id`, `nom`, `plante_id`, `membre_id`) VALUES
(4, 'Rose', 4, 1),
(2, 'Olivier', 2, 2),
(3, 'Tomate', 1, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
