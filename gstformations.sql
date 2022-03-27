-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 25 mars 2022 à 10:28
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gstformations`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20211118161808', '2021-11-18 16:18:38', 3551);

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id`, `login`, `mp`, `nom`, `prenom`, `statut`) VALUES
(6, 'Langley', 'K3po794033db327ac6ccf3d547978072aa68', 'Franchet', 'Langley', 1),
(7, 'Clarice', 'K3po6314cd1550fc25a428b8ca08c6548833', 'Duval', 'Clarice', 0),
(8, 'Linette', 'K3poe3449c5e346248c3f57f62cad54025d6', 'Duval', 'Linette', 1),
(9, 'Jewel', 'K3po5a240bd5fa5918c43352c338631c0fdd', 'Leclair', 'Jewel', 1),
(10, 'Guy', 'K3poe0ad20e39895b41bf993c4e044ae3734', 'Patel', 'Guy', 0),
(11, 'coco', 'K3poac0ddf9e65d57b6a56b2453386cd5db5', 'Corentin', 'Chalot', 0);

-- --------------------------------------------------------

--
-- Structure de la table `employe_services`
--

DROP TABLE IF EXISTS `employe_services`;
CREATE TABLE IF NOT EXISTS `employe_services` (
  `employe_id` int(11) NOT NULL,
  `services_id` int(11) NOT NULL,
  PRIMARY KEY (`employe_id`,`services_id`),
  KEY `IDX_3C291C571B65292` (`employe_id`),
  KEY `IDX_3C291C57AEF5A6C1` (`services_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employe_services`
--

INSERT INTO `employe_services` (`employe_id`, `services_id`) VALUES
(8, 4),
(8, 5),
(8, 7),
(8, 8),
(8, 9),
(8, 10),
(9, 4),
(9, 5),
(9, 7),
(9, 9);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit_id` int(11) DEFAULT NULL,
  `date_debut` date NOT NULL,
  `nbre_heures` int(11) NOT NULL,
  `departement` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_404021BFF347EFB` (`produit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `produit_id`, `date_debut`, `nbre_heures`, `departement`, `description`) VALUES
(9, 8, '2023-05-04', 200, 'Paris', 'Compréhension de l\'utilisation d\'un mac'),
(10, 6, '2023-05-04', 20, 'Paris', 'Découverte des scripts AMK'),
(11, 9, '2023-06-06', 4, 'Paris', 'Compréhension de l\'utilisation d\'une machine sous windows 11'),
(12, 11, '2024-02-28', 70, 'Val d\'Oise', 'Compréhension de l\'utilisation d\'une machine sous Linux'),
(13, 7, '2022-12-09', 10, 'Val d\'Oise', 'Appréhension du logiciel teams afin de pouvoir travailler à distance'),
(14, 2, '2022-08-09', 12, 'Bouches-du-Rhône', 'Les basiques de symfony'),
(15, 4, '2022-08-09', 15, 'Haute-Garonne', 'Formation sur le logiciel exel'),
(16, 10, '2023-07-28', 12, 'Paris', 'Découverte de windows 8');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employe_id` int(11) DEFAULT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `statut` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5E90F6D61B65292` (`employe_id`),
  KEY `IDX_5E90F6D65200282E` (`formation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `employe_id`, `formation_id`, `statut`) VALUES
(29, 8, 11, 'E'),
(30, 8, 16, 'E'),
(31, 8, 12, 'E'),
(32, 8, 13, 'E'),
(33, 9, 11, 'E'),
(34, 9, 13, 'E'),
(35, 9, 15, 'E');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `services_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_29A5EC27AEF5A6C1` (`services_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `services_id`) VALUES
(2, 'Symfony 5', 6),
(3, 'PIX', 8),
(4, 'Excel', 9),
(5, 'word', 9),
(6, 'AutomaticMouseAndKeyboard', 10),
(7, 'Microsoft Teams', 9),
(8, 'MAC', 7),
(9, 'Windows 11', 4),
(10, 'Windows 8', 4),
(11, 'Linux', 5);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `nom`) VALUES
(4, 'Windows'),
(5, 'Linux'),
(6, 'Symfony'),
(7, 'Apple'),
(8, 'PIX'),
(9, 'Microsoft'),
(10, 'Robosoft');

-- --------------------------------------------------------

--
-- Structure de la table `services_employe`
--

DROP TABLE IF EXISTS `services_employe`;
CREATE TABLE IF NOT EXISTS `services_employe` (
  `services_id` int(11) NOT NULL,
  `employe_id` int(11) NOT NULL,
  PRIMARY KEY (`services_id`,`employe_id`),
  KEY `IDX_11FF184EAEF5A6C1` (`services_id`),
  KEY `IDX_11FF184E1B65292` (`employe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employe_services`
--
ALTER TABLE `employe_services`
  ADD CONSTRAINT `FK_3C291C571B65292` FOREIGN KEY (`employe_id`) REFERENCES `employe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3C291C57AEF5A6C1` FOREIGN KEY (`services_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_404021BFF347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `FK_5E90F6D61B65292` FOREIGN KEY (`employe_id`) REFERENCES `employe` (`id`),
  ADD CONSTRAINT `FK_5E90F6D65200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_29A5EC27AEF5A6C1` FOREIGN KEY (`services_id`) REFERENCES `services` (`id`);

--
-- Contraintes pour la table `services_employe`
--
ALTER TABLE `services_employe`
  ADD CONSTRAINT `FK_11FF184E1B65292` FOREIGN KEY (`employe_id`) REFERENCES `employe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_11FF184EAEF5A6C1` FOREIGN KEY (`services_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
