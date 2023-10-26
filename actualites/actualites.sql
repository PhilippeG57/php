-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 26 oct. 2023 à 09:41
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `actualites`
--

-- --------------------------------------------------------

--
-- Structure de la table `actus`
--

DROP TABLE IF EXISTS `actus`;
CREATE TABLE IF NOT EXISTS `actus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `idUser` int(11) NOT NULL,
  `dateAdd` varchar(100) NOT NULL,
  `dateUpdate` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actus`
--

INSERT INTO `actus` (`id`, `titre`, `texte`, `photo`, `idUser`, `dateAdd`, `dateUpdate`) VALUES
(1, 'C\'est la fête test', 'Test mon texte', 'images/6538d41e0e869.jpg', 2, '2023-10-25 08:38:54', '2023-10-26 10:49:40'),
(5, 'LALALA', 'Oui', 'images/653a1a667db54.jpg', 4, '2023-10-26 09:51:02', ''),
(6, 'testasto', 'test', 'images/653a202e25035.jpg', 2, '2023-10-26 10:15:42', '2023-10-26 08:48:35');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `dateCreated` varchar(100) NOT NULL,
  `statut` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `pseudo`, `email`, `mdp`, `dateCreated`, `statut`) VALUES
(1, 'GARCIA', 'Philippe', 'Philippe57', 'philippe57660.garcia@gmail.com', '$2y$10$Wb08hSxG3vKlPWhRFYrOS.NnvPZ9KYtHcWmciCBVlXM0Qh9gjw5FO', '2023-10-24 21:01:50', 'client'),
(2, 'aaa', 'aaa', 'aaa', 'a@a.com', '$2y$10$TzxIe2WeT6fJshepFAjU2uaAWfdPdOnKpzFeXyYMEfbjaS78kceWC', '2023-10-25 09:15:57', 'admin'),
(3, 'Bond', 'James', 'JamesBond007', 'james.bond@gmail.com', '$2y$10$MpeokR2eJLOgyWl6NHI6pezMH8eyTahWyjfoENTsCFnfF5Hh46edO', '2023-10-25 11:06:05', 'admin'),
(4, 'b', 'b', 'b', 'b@b.com', '$2y$10$dWx8QwPH9e.iRdWc7QAYJeG82oWP3VScsb56p6GlpoZo5BqMoyZ0G', '2023-10-26 09:50:10', 'client');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
