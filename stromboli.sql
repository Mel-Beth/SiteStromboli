-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 04 oct. 2024 à 07:09
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stromboli`
--

-- --------------------------------------------------------

--
-- Structure de la table `catg_produits`
--

DROP TABLE IF EXISTS `catg_produits`;
CREATE TABLE IF NOT EXISTS `catg_produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `catg_produits`
--

INSERT INTO `catg_produits` (`id`, `nom`) VALUES
(11, 'Plat'),
(12, 'Boisson'),
(13, 'Dessert');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prix` int NOT NULL,
  `id_catg` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `id_catg`) VALUES
(5, 'La Reine', 'C\'est une reine', 10, 1),
(7, 'Le Roi', 'C\'est un Roi', 10, 1),
(8, 'La Dame', 'C\'est une Dame', 10, 1),
(9, 'Le Valet', 'C\'est un  Valet', 10, 1),
(20, 'Coca', 'C\'est un Coca', 3, 5),
(21, 'Fanta', 'C\'est un Fanta', 3, 6),
(22, 'Orangina', 'C\'est un Orangina', 3, 7),
(23, 'Eau', 'C\'est une Eau', 2, 8),
(24, 'Tiramisu', 'C\'est un Tiramisu', 3, 9),
(25, 'Tarte aux pommes', 'C\'est une Tarte aux pommes', 3, 10),
(26, 'Profiteroles', 'Ce sont des Profiteroles', 3, 11),
(27, 'Crêpes', 'Ces sont des Crêpes', 3, 12),
(28, 'La Reine', 'C\'est une reine', 10, 1),
(29, 'Le Roi', 'C\'est un Roi', 10, 2),
(30, 'La Dame', 'C\'est une Dame', 10, 3),
(31, 'Le Valet', 'C\'est un Valet', 10, 4),
(32, 'Coca', 'C\'est un Coca', 3, 5),
(33, 'Fanta', 'C\'est un Fanta', 3, 6),
(34, 'Orangina', 'C\'est un Orangina', 3, 7),
(35, 'Eau', 'C\'est une Eau', 2, 8),
(36, 'Tiramisu', 'C\'est un Tiramisu', 3, 9),
(37, 'Tarte aux pommes', 'C\'est une Tarte aux pommes', 3, 10),
(38, 'Profiteroles', 'Ce sont des Profiteroles', 3, 11),
(39, 'Crêpes', 'Ces sont des Crêpes', 3, 12);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
