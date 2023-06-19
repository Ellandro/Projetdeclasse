-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 18 juin 2023 à 23:53
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `universite`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `Matricule` varchar(10) NOT NULL,
  `NomEtu` varchar(30) NOT NULL,
  `PrenomEtu` varchar(50) NOT NULL,
  `Mail` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `IdInscrip` int NOT NULL,
  `dateNaissance` date NOT NULL,
  `Contact` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Sexe` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Pays` varchar(25) NOT NULL,
  `Pere` varchar(50) NOT NULL,
  `Mere` varchar(50) NOT NULL,
  `nom_fil` varchar(75) NOT NULL,
  PRIMARY KEY (`Matricule`),
  KEY `IdInscrip` (`IdInscrip`),
  KEY `nom_fil` (`nom_fil`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`Matricule`, `NomEtu`, `PrenomEtu`, `Mail`, `IdInscrip`, `dateNaissance`, `Contact`, `Sexe`, `Password`, `Pays`, `Pere`, `Mere`, `nom_fil`) VALUES
('Frzoed', 'Yao', 'Kouassi', 'kuass@gmail.com', 0, '0000-00-00', '0907767654', 'M', '34a3477653bf8693c0cfb0aec094c1a01e9ad497', 'Senegal', 'Seka oriane Nancy', 'Chonou', 'TSGE'),
('CI32423423', 'Adama', 'Landry', 'adamalandry0107@gmail.com', 0, '2012-10-22', '0877655555', 'M', '1585e636a6c364641525c502b018be4c37879f58', 'Cote d\'Ivoire', 'asaz', 'adam', 'TSGE'),
('3125626255', 'Yao', 'Kouassi', 'kuass@gmail.com', 0, '2001-06-20', '0907767654', 'M', NULL, 'Cote d\'Ivoire', '', '', ''),
('134265626f', 'Tchi', 'Adou', 'tchi@htmail.com', 0, '2000-04-12', '0908876986', 'M', NULL, 'Cote d\'Ivoire', '', '', ''),
('213314252', 'Ouattara ', 'Awa', 'out@gmail.com', 0, '0000-00-00', '321528262', 'F', NULL, 'Senegal', '', '', ''),
('CI23517861', 'Atoto', 'Jean Phillipe', 'admin@gmail.com', 0, '2003-05-14', '0877655555', 'M', 'CI2Madmi', 'Senegal', 'Amani', 'Bakou', 'TGI'),
('Frzoe', 'Yao', 'Kouassi', 'kuass@gmail.com', 0, '0000-00-00', '0907767654', 'M', '17f30501e1ad0fd36c5dd3bd43f55775235e9cb1', 'Senegal', 'Seka oriane Nancy', 'Chonou', 'TSGE');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `nom_fil` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `niveau_diplome` varchar(2) DEFAULT NULL,
  `duree_formation` int DEFAULT NULL,
  `frais_inscription` double DEFAULT NULL,
  `frais_trim` double DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  PRIMARY KEY (`nom_fil`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`nom_fil`, `niveau_diplome`, `duree_formation`, `frais_inscription`, `frais_trim`, `date_creation`) VALUES
('TSGE', 'ts', 2, 500, 500, '2014-12-15'),
('TGI', 'Q', 0, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `IdInscrip` int NOT NULL,
  `DateIns` date NOT NULL,
  PRIMARY KEY (`IdInscrip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `nom_mat` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nombre_heure_total` int DEFAULT NULL,
  `nombre_heure_tp` int DEFAULT NULL,
  `nombre_heure_th` int DEFAULT NULL,
  `coef` int NOT NULL,
  `nom_fil` varchar(75) DEFAULT NULL,
  `IdProf` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nom_mat`),
  KEY `nom_fil` (`nom_fil`),
  KEY `IdProf` (`IdProf`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`nom_mat`, `nombre_heure_total`, `nombre_heure_tp`, `nombre_heure_th`, `coef`, `nom_fil`, `IdProf`) VALUES
('', 0, 0, 0, 3, 'TSGE', '1'),
('Informatique', 40, 12, 0, 3, 'TGI', '13Z23'),
('Anglais', 24, 0, 5, 3, 'TSGE', '2'),
('And', 0, 0, 0, 3, 'TSGE', '1'),
('histoire', 24, 0, 0, 3, '', ''),
('Math', 40, 0, 12, 3, 'TGI', '7'),
('Analyse', 30, 10, 12, 3, 'TSGE', '4'),
('francais', 30, 10, 12, 3, 'TGI', '4'),
('Web', 50, 20, 10, 5, 'TGI', '2');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id_note` varchar(12) NOT NULL,
  `Matricule` varchar(12) DEFAULT NULL,
  `id_mat` varchar(15) DEFAULT NULL,
  `note` float DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `mention` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_note`),
  KEY `Matricule` (`Matricule`),
  KEY `id_mat` (`id_mat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id_note`, `Matricule`, `id_mat`, `note`, `type`, `mention`) VALUES
('SAZA', '1231411D', 'francais', 20, 'Examen', 'Bien'),
('1ZZE4', '3125626255f', 'anglais', 15, 'Examen', 'Bien'),
('AERAZ', 'Ci01324535', 'Histoire', 18, 'Examen', 'Exe'),
('fdt', '213314252', 'Anglais', 12, 'Examen', 'AB');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `NumPaie` varchar(15) NOT NULL,
  `Matricule` varchar(10) DEFAULT NULL,
  `Nom` varchar(25) NOT NULL,
  `Prenom` varchar(75) NOT NULL,
  `Email` varchar(75) NOT NULL,
  `datePaie` date NOT NULL,
  `TypePaie` varchar(15) NOT NULL,
  `Montant` int NOT NULL,
  `Reste` int NOT NULL,
  `Num_versement` varchar(15) NOT NULL,
  PRIMARY KEY (`NumPaie`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`NumPaie`, `Matricule`, `Nom`, `Prenom`, `Email`, `datePaie`, `TypePaie`, `Montant`, `Reste`, `Num_versement`) VALUES
('1234CHOTSG', '1234235251', 'Chonou', 'Seka oriane Nancy', 'oriane@gmail', '0000-00-00', '', 350000, 0, 'Semestre 2'),
('1326ADAINF', '132626242F', 'Adama', 'landry', 'adamalandry0107@gmail.com', '0000-00-00', '', 500000, 0, 'deuxieme'),
('1222ATOTSG', '122232F', 'Atoto', 'Jean Phillipe', 'admin@gmail.com', '0000-00-00', '', 250000, 0, 'Semestre 1'),
('2141OUATSG', '214162FA', 'Ouattara', 'Aminata', 'Ouattara@homail.com', '0000-00-00', '', 450000, 0, 'Semestre 1'),
('1223YAOTSG', '1223421', 'Yao', 'Kouassi', 'ahou@gmail.com', '0000-00-00', '', 34000, 0, 'Semestre 1');

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `statut` varchar(15) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `lieu_naissance` varchar(200) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `nom_fil` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `niveau` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nom_fil` (`nom_fil`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id`, `nom`, `prenom`, `statut`, `date_naissance`, `lieu_naissance`, `adresse`, `nom_fil`, `tel`, `niveau`, `date_inscription`, `photo`) VALUES
(6, 'jxugd', 'Landry', '', '2000-12-28', 'Banvayo', 'bruxelle', 'Abidjan', '0877655555', '3', '2023-06-13', 'IMG_20221028_142445.jpg'),
(7, 'Adama', 'Landry', '', '2000-12-28', 'Banvayo', 'bruxelle', 'Abidjan', '0877655555', '1', '2023-06-13', 'IMG_20221028_142445.jpg'),
(8, 'Atoto', '2000-12-28', '', '0000-00-00', 'Bondoukou', 'Bondoukou', 'TSGE', '6754242', 'Licence 2', '0000-00-00', ''),
(10, 'Chonou', 'Seka oriane Nancy', '2', '2000-12-28', 'bondoukou', 'Ouragahio', 'TGI', '0907767654', 'Licence 2', '2023-06-13', '');

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

DROP TABLE IF EXISTS `programme`;
CREATE TABLE IF NOT EXISTS `programme` (
  `id_prog` int NOT NULL AUTO_INCREMENT,
  `annee_scolaire` varchar(50) DEFAULT NULL,
  `classe` varchar(50) DEFAULT NULL,
  `nom_fil` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id_prog`),
  KEY `nom_fil` (`nom_fil`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `login` varchar(100) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `login`, `pwd`, `role`, `email`) VALUES
(12, 'admin', '123', 'Directeur', 'admin@gmail.com'),
(13, 'swc1', '123', 'Secrétaire', 'sec1@gmail.com'),
(14, 'sec2', '123', 'Secrétaire', 'user2@gmail.com'),
(17, 'sec3', '123', 'Secrétaire', 'test10@gmail.com'),
(18, 'adama', 'root', 'Secrétaire', 'adama@gmail.com'),
(21, 'sdf', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Secrétaire', 'sd@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
