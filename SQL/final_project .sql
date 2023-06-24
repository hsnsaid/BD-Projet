-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 22 mars 2023 à 23:54
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `final_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `administrateur_name` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `administrateur_name`, `password`) VALUES
(1, 'said', '7H080255');

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id` int(11) NOT NULL,
  `enseignant_name` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id`, `enseignant_name`, `password`, `Email`) VALUES
(16, 'drif', 'drif123', ''),
(17, 'Mous3ab', 'Mous3ab', 'Mous3ab@gmail.com'),
(18, 'said', '7H080255', 'said@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `enseigne`
--

CREATE TABLE `enseigne` (
  `modul_id` int(11) DEFAULT NULL,
  `enseignant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `enseigne`
--

INSERT INTO `enseigne` (`modul_id`, `enseignant_id`) VALUES
(8, 16),
(9, 17),
(1, 18),
(3, 18),
(10, 17);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `Etudiant_name` varchar(255) NOT NULL,
  `niveau` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Etudiant_Group` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `Place_of_birth` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `Etudiant_name`, `niveau`, `password`, `Etudiant_Group`, `date_of_birth`, `Place_of_birth`) VALUES
(21, 'Mous3ab', 'L3_ISIL', 'MOUS3AB', 3, '2002-07-11', 'Sidi Bel Abbass'),
(22, 'lol', 'L2', 'lol123lol', 3, '2023-03-10', 'lol'),
(23, 'said', 'L3_ISIL', '7H080255', 3, '2003-06-01', 'SIDI BEL ABBES');

-- --------------------------------------------------------

--
-- Structure de la table `etudy`
--

CREATE TABLE `etudy` (
  `Etudiant_id` int(11) DEFAULT NULL,
  `modul_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudy`
--

INSERT INTO `etudy` (`Etudiant_id`, `modul_id`) VALUES
(21, 3),
(21, 10),
(22, 1);

-- --------------------------------------------------------

--
-- Structure de la table `moduls`
--

CREATE TABLE `moduls` (
  `id` int(11) NOT NULL,
  `modul_name` varchar(255) NOT NULL,
  `modul_niveau` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `moduls`
--

INSERT INTO `moduls` (`id`, `modul_name`, `modul_niveau`) VALUES
(1, 'MN', 'L2'),
(3, 'IHM', 'L3_ISIL'),
(8, 'algo', 'L1'),
(9, 'Front', 'l2'),
(10, 'sid', 'L3_ISIL');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `administrateur_id` int(11) NOT NULL,
  `news_target` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `message`, `date`, `administrateur_id`, `news_target`) VALUES
(1, 'it\'s work', '2023-03-20', 1, ''),
(2, 'news for L2 studiant only: rakom 3agagin kabro a ban3ami hhhh', '2023-03-12', 1, 'L2'),
(3, 'ntoma kabar', '2023-03-12', 1, 'L3_ISIL'),
(4, 'Jami3a mbal3a nahar 20 mars', '2023-03-12', 1, 'GENERAL'),
(5, 'uiiuvdi', '2023-03-28', 1, 'L3_ISIL'),
(6, 'n', '2023-03-05', 1, 'L3_ISIL'),
(8, 'rahi takhdam', '2023-03-17', 1, 'L2'),
(9, 'JHHHHHHHH', '2023-03-17', 1, 'L3_ISIL'),
(10, 'tachikidi bum yeah yeah', '2023-03-18', 1, 'GENERAL');

-- --------------------------------------------------------

--
-- Structure de la table `ressources`
--

CREATE TABLE `ressources` (
  `id` int(11) NOT NULL,
  `ressources_name` varchar(255) NOT NULL,
  `modul_id` int(11) DEFAULT NULL,
  `enseignant_id` int(11) DEFAULT NULL,
  `ressources_type` varchar(255) DEFAULT NULL,
  `upload_date` date DEFAULT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ressources`
--

INSERT INTO `ressources` (`id`, `ressources_name`, `modul_id`, `enseignant_id`, `ressources_type`, `upload_date`, `file`) VALUES
(5, 'HCVIMVIIV', 3, 18, 'COUR', '2023-03-16', 'BB'),
(12, '8 DAYS', 3, 18, 'TD', '2023-03-23', ''),
(13, 'OUHU', 1, 18, 'TD', '2023-03-22', 'PHP.pdf');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`,`administrateur_name`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id`,`enseignant_name`);

--
-- Index pour la table `enseigne`
--
ALTER TABLE `enseigne`
  ADD KEY `modul_id` (`modul_id`),
  ADD KEY `enseignant_id` (`enseignant_id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`,`Etudiant_name`);

--
-- Index pour la table `etudy`
--
ALTER TABLE `etudy`
  ADD KEY `etudy_ibfk_1` (`Etudiant_id`),
  ADD KEY `etudy_ibfk_2` (`modul_id`);

--
-- Index pour la table `moduls`
--
ALTER TABLE `moduls`
  ADD PRIMARY KEY (`id`,`modul_name`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_ibfk_1` (`administrateur_id`);

--
-- Index pour la table `ressources`
--
ALTER TABLE `ressources`
  ADD PRIMARY KEY (`id`,`ressources_name`),
  ADD KEY `modul_id` (`modul_id`),
  ADD KEY `enseignant_id` (`enseignant_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `moduls`
--
ALTER TABLE `moduls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `ressources`
--
ALTER TABLE `ressources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `enseigne`
--
ALTER TABLE `enseigne`
  ADD CONSTRAINT `enseigne_ibfk_1` FOREIGN KEY (`modul_id`) REFERENCES `moduls` (`id`),
  ADD CONSTRAINT `enseigne_ibfk_2` FOREIGN KEY (`enseignant_id`) REFERENCES `enseignant` (`id`);

--
-- Contraintes pour la table `etudy`
--
ALTER TABLE `etudy`
  ADD CONSTRAINT `etudy_ibfk_1` FOREIGN KEY (`Etudiant_id`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `etudy_ibfk_2` FOREIGN KEY (`modul_id`) REFERENCES `moduls` (`id`);

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`administrateur_id`) REFERENCES `administrateur` (`id`);

--
-- Contraintes pour la table `ressources`
--
ALTER TABLE `ressources`
  ADD CONSTRAINT `ressources_ibfk_1` FOREIGN KEY (`modul_id`) REFERENCES `moduls` (`id`),
  ADD CONSTRAINT `ressources_ibfk_2` FOREIGN KEY (`enseignant_id`) REFERENCES `enseignant` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
