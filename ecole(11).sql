-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 02 mars 2023 à 19:19
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `id` int(11) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `id_enseignant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`id`, `debut`, `fin`, `id_enseignant`) VALUES
(3, '2023-02-13', '2023-02-27', 6),
(6, '2023-02-10', '2023-02-28', 6),
(8, '2023-02-14', '2023-04-30', 11);

-- --------------------------------------------------------

--
-- Structure de la table `activitees`
--

CREATE TABLE `activitees` (
  `id` int(11) NOT NULL,
  `titreActivitees` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `jours` date NOT NULL,
  `duree` varchar(20) NOT NULL,
  `id_classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `activitees`
--

INSERT INTO `activitees` (`id`, `titreActivitees`, `description`, `jours`, `duree`, `id_classe`) VALUES
(1, 'Sortie piscine', 'Nous irons à la piscine lundi prochain penser au maillot de baim', '2023-02-20', '1H', 9),
(18, 'Sortie piscine', 'nous irons a la piscine penser à vos maillots', '2023-02-24', '2h', 9),
(19, 'essai2', 'sdfdsfdsfdsfsdfsdf', '2023-02-28', '1H', 9),
(20, 'essai2', '', '2023-02-27', '', 7);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `motDePasse` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `motDePasse`) VALUES
(9, 'admin@admin.com', '$2y$10$ms3NL8VlfpMDzOlaSPeMwOvCV2Hgx2fhk07anOyJe6z1AQkbtqis.'),
(11, 'directrice@directrice.com', '$2y$10$g/FY8XdrxzKz2Bo/C/IajeRpu6wJx9MYS77OW4SjkaAtFNmyRnXOK'),
(12, 'directeur@direction.com', '$2y$10$33ZTXnC.ENtJwGUYYthw9.YoUfyO7bPXORR.72RqtjGMmiRMPUi7a'),
(13, 'admin2@admin2.com', '$2y$10$eb5R6msRnEtcfXvMatqUHezyiXnWYxURsBhlKaH4L6iISXlyFncaW'),
(14, 'admin3@admin3.com', '$2y$10$kf4lg2cyXH4hLyL2ao92pu1dGDnBZLvkxD8pmMPsmU.T2yPUzN2Am');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `niveau` varchar(20) NOT NULL,
  `id_enseignant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `nom`, `niveau`, `id_enseignant`) VALUES
(6, 'CP1', 'cp', 6),
(7, 'CP2', 'cp', 10),
(9, 'Cours élémentaire 1', 'CE1', 11);

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `email_primaire` varchar(250) NOT NULL,
  `email_secondaire` varchar(250) NOT NULL,
  `id_classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id`, `nom`, `prenom`, `email_primaire`, `email_secondaire`, `id_classe`) VALUES
(2, 'Véricel', 'Amélia', 'gregoryvericel6@gmail.com', 'melvericel@yahoo.fr', 6),
(3, 'Véricel', 'Lylou', 'a@a.com', 'melvericel@yahoo.fr', 7);

-- --------------------------------------------------------

--
-- Structure de la table `enseignants`
--

CREATE TABLE `enseignants` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `motDePasse` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enseignants`
--

INSERT INTO `enseignants` (`id`, `nom`, `email`, `motDePasse`) VALUES
(6, 'Enseignant1', 'enseignant1@enseignant.com', '$2y$10$j5MWuMxtS3SLwqqZE63bROmX70.C17aTLioLJ6IyeCONQqojYXXW.'),
(10, 'Enseignant2', 'enseignant2@enseignant.com', '$2y$10$PYmDPuvkYIbN3CDgr6Ih1eX8Y3H4ThFBNLHYD8z0xDBHmrjutx6Tq'),
(11, 'Enseignant3', 'enseignant3@enseignant.com', '$2y$10$LueIhYffwUei4CxvYkSAd.GRyADNWHUKuCxZm1rsnA8CKyY8My232'),
(12, 'Enseignant4', 'enseignant4@enseignant.com', '$2y$10$J4QDIhnd064qRk1cJZ9rTO5FOo8u6yzIqt3uLRPVqO/cekymX2gte'),
(13, 'Enseignant5', 'enseignant5@enseignant.com', '$2y$10$4sxl0uC2BhPByeRZ9tGbPu6fVYr1csZHnVvnjHtcRFwmZfiOzDF7q');

-- --------------------------------------------------------

--
-- Structure de la table `infos`
--

CREATE TABLE `infos` (
  `id` int(11) NOT NULL,
  `titreInfos` varchar(200) NOT NULL,
  `details` varchar(2000) NOT NULL,
  `id_classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `infos`
--

INSERT INTO `infos` (`id`, `titreInfos`, `details`, `id_classe`) VALUES
(1, 'Absence professeur', 'je serais absent mardi 21 février', 6);

-- --------------------------------------------------------

--
-- Structure de la table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `motDePasse` varchar(200) NOT NULL,
  `password_changed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parents`
--

INSERT INTO `parents` (`id`, `nom`, `prenom`, `email`, `motDePasse`, `password_changed`) VALUES
(1, 'Véricel', 'grégory', 'gregoryvericel6@gmail.com', '$2y$10$gPMRoS86As81lKnEIaoBuOFUkSKDtt.DLEFsTGfh8UZKmjYnXZvra', 1),
(40, 'Véricel', 'grégory', 'robart@robart.com', '$2y$10$PqY6yaNiCHhpAQQ59cTyvu295mGIf5asjKqEJHQFrooOccht9Fx86', 0),
(41, 'Véricel', 'grégory', 'a@a.com', '$2y$10$hBWFRxbBHpsU0oc9vHKp2e4Eq5rgpS6x4bQPeCnnISrH3AmjY6z7m', 0),
(42, 'Véricel', 'grégory', 'p@p.com', '$2y$10$SQrAsqGvTPrBZwVCnc2QTOKs7T5B/3amqbn.8cWFApIa8XAhhix1.', 0),
(45, 'Véricel', 'grégory', 'gregoryvericel6gmail.com', '$2y$10$Km1MMYGXPQZYOfL5gpbViOwLT3bunZBLg7efosoQT7YoIL7GQPtYa', 0),
(46, 'Véricel', 'grégory', 'm@m.com', '$2y$10$u37EirRsg6VKNx/OhqdTJOzGbyl4rMG1RkZOzf.mtGPJgQzqlKhmC', 0),
(47, 'Véricel', 'grégory', 'n@m.com', '$2y$10$eTNUQatoSFxpk5kdXcouhuvDLwbnpu4Yo6zJ3el/H8XfK4meJYYPq', 0),
(48, 'véricel', 'Mélodie', 'melvericel@yahoo.fr', '$2y$10$.cnqZvsPmYNg35BI7PdAluCwPUWrmuyDCz5Mpah.UqMVpmVGADShy', 1),
(49, 'Véricel', 'Mélodie', 'mel@yahoo.fr', '$2y$10$3VIcwGtRx5./8zukLbTPE.V6UE0yb0KcNxEjxXglYjPAclUgPpJJS', 0),
(50, 'h', 'h', 'h@h.com', '$2y$10$bKPu8zNgVBtyJcioNUXb6u.txTSQdbsuEJHSArV2Uw5x2VgJusYau', 0),
(51, 'j', 'j', 'j@j.com', '$2y$10$B2XlyIbJUwUl18pR7/yOB.mBAzqY9Ty5pEmKNSP6MpGNV/LNEAyQW', 0),
(56, 'test', 'test', 'test@test.com', '$2y$10$6ge37UwHkER4foFnTzNvo.KU9eGS9ubVSa8ZkMmf5K8DRTZOZw5B6', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idenseignant_absence` (`id_enseignant`);

--
-- Index pour la table `activitees`
--
ALTER TABLE `activitees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idclasse_activitees` (`id_classe`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idenseignant_classe` (`id_enseignant`);

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_classeid_eleves` (`id_classe`);

--
-- Index pour la table `enseignants`
--
ALTER TABLE `enseignants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idclasse_infos` (`id_classe`);

--
-- Index pour la table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `activitees`
--
ALTER TABLE `activitees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `enseignants`
--
ALTER TABLE `enseignants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `FK_idenseignant_absence` FOREIGN KEY (`id_enseignant`) REFERENCES `enseignants` (`id`);

--
-- Contraintes pour la table `activitees`
--
ALTER TABLE `activitees`
  ADD CONSTRAINT `FK_idclasse_activitees` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`);

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `FK_idenseignant_classe` FOREIGN KEY (`id_enseignant`) REFERENCES `enseignants` (`id`);

--
-- Contraintes pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD CONSTRAINT `FK_classeid_eleves` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`);

--
-- Contraintes pour la table `infos`
--
ALTER TABLE `infos`
  ADD CONSTRAINT `FK_idclasse_infos` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
