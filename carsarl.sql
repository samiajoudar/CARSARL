-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 21 mai 2021 à 17:57
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `carsarl`
--

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id`, `nom`) VALUES
(1, 'dacia');

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

DROP TABLE IF EXISTS `reclamation`;
CREATE TABLE IF NOT EXISTS `reclamation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `sujet` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_voiture` int NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `nom` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `tele` varchar(250) NOT NULL,
  `etat` varchar(25) NOT NULL,
  PRIMARY KEY (`id`,`id_voiture`),
  KEY `fkIdx_30` (`id_voiture`)
) ENGINE=MyISAM AUTO_INCREMENT=2;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `id_voiture`, `date_debut`, `date_fin`, `nom`, `email`, `tele`, `etat`) VALUES
(1, 1, '2020-08-24', '2022-01-13', 'hhh', 'mehdi@jjh.ckk', '2588', 'yes');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `id` int NOT NULL AUTO_INCREMENT,
  `marque` int NOT NULL,
  `modele` varchar(250) NOT NULL,
  `nombre_places` int NOT NULL,
  `carburant` varchar(250) NOT NULL,
  `details` varchar(250) NOT NULL,
  `fraix` float NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`id`, `marque`, `modele`, `nombre_places`, `carburant`, `details`, `fraix`, `image`) VALUES
(1, 1, 'logan', 5, 'electrique', 'mohamad chel7', 150, 'logan.jpg');
COMMIT;

