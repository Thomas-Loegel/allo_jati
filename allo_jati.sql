-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mar. 04 fév. 2020 à 10:45
-- Version du serveur :  8.0.18
-- Version de PHP :  7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `allo_jati`
--

-- --------------------------------------------------------

--
-- Structure de la table `artistes`
--

DROP TABLE IF EXISTS `artistes`;
CREATE TABLE IF NOT EXISTS `artistes` (
  `id_artiste` int(7) NOT NULL AUTO_INCREMENT,
  `id_role` int(7) NOT NULL,
  `id_oeuvre` int(7) NOT NULL,
  `id_media` int(7) NOT NULL,
  `nom` varchar(70) NOT NULL,
  `prenom` varchar(70) NOT NULL,
  `date_naissance` date NOT NULL,
  `biographie` text NOT NULL,
  PRIMARY KEY (`id_artiste`),
  KEY `id_media` (`id_media`),
  KEY `id_oeuvre` (`id_oeuvre`),
  KEY `id_role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_commentaire` int(7) NOT NULL AUTO_INCREMENT,
  `id_user` int(7) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `note` int(2) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

DROP TABLE IF EXISTS `medias`;
CREATE TABLE IF NOT EXISTS `medias` (
  `id_media` int(7) NOT NULL AUTO_INCREMENT,
  `affiche` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_media`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `oeuvres`
--

DROP TABLE IF EXISTS `oeuvres`;
CREATE TABLE IF NOT EXISTS `oeuvres` (
  `id_oeuvre` int(7) NOT NULL AUTO_INCREMENT,
  `type` varchar(70) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `annee` year(4) NOT NULL,
  `genre` varchar(70) NOT NULL,
  `id_artiste` int(7) NOT NULL,
  `id_media` int(7) NOT NULL,
  `resume` text NOT NULL,
  `duree` time(3) NOT NULL,
  PRIMARY KEY (`id_oeuvre`),
  KEY `id_media` (`id_media`),
  KEY `id_artiste` (`id_artiste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int(7) NOT NULL AUTO_INCREMENT,
  `id_artiste` int(7) NOT NULL,
  `id_oeuvre` int(7) NOT NULL,
  `acteur` int(4) DEFAULT NULL,
  `realisateur` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_role`),
  KEY `id_artiste` (`id_artiste`),
  KEY `id_oeuvre` (`id_oeuvre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(7) NOT NULL AUTO_INCREMENT,
  `id_commentaire` int(7) NOT NULL,
  `id_media` int(7) NOT NULL,
  `email` varchar(123) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `pseudo` varchar(70) NOT NULL,
  `admin` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_media` (`id_media`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
