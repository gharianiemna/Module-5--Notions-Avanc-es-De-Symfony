-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 13 juil. 2022 à 16:53
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbuserauth`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220707125420', '2022-07-07 14:54:32', 611),
('DoctrineMigrations\\Version20220707164539', '2022-07-07 18:45:48', 256),
('DoctrineMigrations\\Version20220707174214', '2022-07-07 19:42:23', 186),
('DoctrineMigrations\\Version20220708102941', '2022-07-08 12:29:49', 1293),
('DoctrineMigrations\\Version20220708110820', '2022-07-08 13:08:25', 165),
('DoctrineMigrations\\Version20220713133027', '2022-07-13 15:30:37', 280);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `age` int(11) DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `user_name`, `email`, `password`, `roles`, `age`, `adress`) VALUES
(12, 'ADMIN', 'ADMIN@ADMIN.COM', '$2y$13$EdZYhWz7bSmBQ/d5cw6kfOGhCC55Kxpj3U01g7nTkyYADiBjcGVYK', '[\"ROLE_ADMIN\"]', 30, 'Paris'),
(13, 'ahmed dhieb', 'med@talan.com', '$2y$13$9/dCMjX9AZaOHviJPNbOEuu7/dGqfRQr7dQCmKxywM93sbGzBwmLW', '[\"ROLE_USER\"]', 35, 'Sfax'),
(14, 'Ilyes Dhieb', 'Ilyes@talan.com', '$2y$13$6FYY5yBCXoGo7gkIx0QhR.sakISiWEePeWXBAuKjlvNSBvZxSi7Ey', '[\"ROLE_USER\"]', 2, 'Ariana'),
(15, 'emna ghariani', 'emna@talan.com', '$2y$13$MCTU18sEY.7Yw..OzLK2z.7C961TTv9sXTmOAkRVL7Sq9HiPkPrCm', '[\"ROLE_USER\"]', 29, 'Tunis');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
