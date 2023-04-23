-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 17 nov. 2021 à 13:22
-- Version du serveur :  10.1.33-MariaDB
-- Version de PHP :  7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `tagent`
--

CREATE TABLE `tagent` (
  `IdAgent` int(3) NOT NULL,
  `NomAgent` char(12) DEFAULT NULL,
  `PostnomAgent` char(12) DEFAULT NULL,
  `PrenomAgent` char(12) DEFAULT NULL,
  `NumeParcelAgent` char(6) DEFAULT NULL,
  `GenreAgent` char(12) DEFAULT NULL,
  `DateNaisAgent` date DEFAULT NULL,
  `NNAgent` char(25) DEFAULT NULL,
  `TelAgent` char(15) DEFAULT NULL,
  `PhotoAgent` char(25) DEFAULT NULL,
  `IdQualif` int(3) DEFAULT NULL,
  `IdNation` int(4) DEFAULT NULL,
  `IdFonct` int(2) DEFAULT NULL,
  `IdQuart` int(3) DEFAULT NULL,
  `ActifAgent` int(1) DEFAULT NULL,
  `AccesAgent` int(1) DEFAULT NULL,
  `MotCleAgent` varchar(2500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tagent`
--

INSERT INTO `tagent` (`IdAgent`, `NomAgent`, `PostnomAgent`, `PrenomAgent`, `NumeParcelAgent`, `GenreAgent`, `DateNaisAgent`, `NNAgent`, `TelAgent`, `PhotoAgent`, `IdQualif`, `IdNation`, `IdFonct`, `IdQuart`, `ActifAgent`, `AccesAgent`, `MotCleAgent`) VALUES
(1, 'Lwanzo', 'Nzanzu', 'Mamie', '09', 'Femini', '1990-12-12', 'NN:456788765678', '+243828409897', NULL, 1, 1, 2, 10, 1, 1, '7c222fb2927d828af22f592134e8932480637c0d'),
(2, 'Kamabale', 'Kahwera', 'Sorgho', '90', 'Masculin', '1985-12-15', '778886555555546', '+243828409897', NULL, 1, 1, 1, 8, 1, 1, '7c222fb2927d828af22f592134e8932480637c0d'),
(3, 'Ingweiso', 'Jeanne', 'Jeanne', '333', 'Feminin', '1981-03-12', 'NN:878998837', '+243828409897', '', 3, 1, 5, 7, 1, 1, '7c222fb2927d828af22f592134e8932480637c0d'),
(4, 'Jeau-Paul', 'Amani', 'Amani', '398', 'Masculin', '1984-09-12', 'NN:878998837', '+243828409897', '', 2, 1, 6, 9, 1, 1, '7c222fb2927d828af22f592134e8932480637c0d'),
(5, 'Ngabu', 'Lucie', 'Lucie', '39', 'Masculin', '0000-00-00', 'NN:74747475756656', '+243828409897', '', 2, 1, 3, 8, 1, 1, '7c222fb2927d828af22f592134e8932480637c0d'),
(6, 'Seraphin', 'Mulimbila', 'Tambwe', '12', 'Masculin', '1980-10-23', 'NN:74747475756656', '+243828409897', '', 5, 1, 4, 7, 1, 1, '7c222fb2927d828af22f592134e8932480637c0d'),
(10, 'Mutanga', 'Asifiwe', 'Asifiwe', '33', 'Aucun', '1997-06-12', 'NN:87678909876567', '+243828409897', '', 1, 1, 6, 7, 0, 1, '7c222fb2927d828af22f592134e8932480637c0d'),
(26, 'Imani', 'Amani', 'Amani', '22', 'Masculin', '1986-02-12', 'NN: 00000000000000', '+243828409897', 'ok', 2, 1, 5, 7, 0, 1, '7c222fb2927d828af22f592134e8932480637c0d'),
(28, 'Matcho', 'Amani', 'Amani', '12', 'Feminin', '2021-10-01', 'NN:000000000', '+243828409897', 'ok', 6, 1, 4, 8, 0, 0, '7c222fb2927d828af22f592134e8932480637c0d'),
(36, 'Nanga', 'Amini', 'Amani', '85', 'Masculin', '1985-12-12', 'NN:98765456789', '+243828409897', 'ok', 2, 1, 6, 8, 0, 1, '7c222fb2927d828af22f592134e8932480637c0d'),
(37, 'Kamabale', 'Kahwera', 'Sorgho', '90', 'Masculin', '1984-02-12', '778886555555546', '+243828409897', 'ok', 1, 1, 1, 10, 0, 0, '7c222fb2927d828af22f592134e8932480637c0d'),
(38, 'Kamabale', 'Kahwera', 'Sorgho', '90', 'Masculin', '1984-02-12', '778886555555546', '+243828409897', 'ok', 1, 1, 1, 10, 0, 0, '7c222fb2927d828af22f592134e8932480637c0d'),
(1573, 'Ngabu', 'Lucie', 'Lucie', '33', 'Feminin', '1995-10-12', 'NN:878998837', '+243828409897', '', 1, 1, 3, 7, 0, 1, '7c222fb2927d828af22f592134e8932480637c0d'),
(3744, 'NZANZU', 'ASINGYA', 'DIEU_MERCI', '333', 'Masculin', '2020-00-00', 'NN:6789656789876', '+243828409897', 'ok', 1, 1, 4, 7, 1, 1, '7c222fb2927d828af22f592134e8932480637c0d'),
(3747, 'BB', 'Kahwera', 'Sorgho', '90', 'Feminin', '2021-11-18', '778886555555546', '+243828409897', 'ok', 1, 1, 4, 8, 0, 1, '7c222fb2927d828af22f592134e8932480637c0d'),
(3787, 'MOLI', 'MALI', 'HIRENE', '8', 'Feminin', '1994-10-30', 'N:68797768', '+243828409897', 'ok', 2, 1, 6, 7, 1, 1, '7c222fb2927d828af22f592134e8932480637c0d');

-- --------------------------------------------------------

--
-- Structure de la table `tclient`
--

CREATE TABLE `tclient` (
  `IdCli` int(12) NOT NULL,
  `NomCli` char(12) DEFAULT NULL,
  `PostnomCli` char(12) DEFAULT NULL,
  `PrenomCli` char(12) DEFAULT NULL,
  `GenreCli` char(12) DEFAULT NULL,
  `NumParcelCli` char(12) DEFAULT NULL,
  `DateNaisCli` date DEFAULT NULL,
  `TelCli` char(15) DEFAULT NULL,
  `PhotoCli` char(255) DEFAULT NULL,
  `IdJeton` int(11) DEFAULT NULL,
  `IdNation` int(4) DEFAULT NULL,
  `IdQuart` int(3) DEFAULT NULL,
  `ActifCli` int(1) DEFAULT NULL,
  `AccesCli` int(1) DEFAULT NULL,
  `MotCleCli` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tclient`
--

INSERT INTO `tclient` (`IdCli`, `NomCli`, `PostnomCli`, `PrenomCli`, `GenreCli`, `NumParcelCli`, `DateNaisCli`, `TelCli`, `PhotoCli`, `IdJeton`, `IdNation`, `IdQuart`, `ActifCli`, `AccesCli`, `MotCleCli`) VALUES
(1, 'Ngona', 'Kachel', 'Heritier', 'Masculin', '100', '1998-05-10', '+243828409897', 'photoxxx', 133, 1, 8, 0, 0, 7),
(2, 'Kambale', 'Charment', 'Dieu-merci', 'Feminin', '120', '1999-05-12', '0828756545', 'photoxxx', 233, 1, 8, 0, 0, 7),
(3, 'Maki', 'Salome', 'Carine', 'Femini', '12', '1999-05-12', '0828756545', NULL, NULL, 1, 4, 0, 0, 7),
(4, 'Kasoki', 'Kamaliro', 'Agnes', 'Femini', '20', '2001-10-12', '0845363648', NULL, NULL, 1, 7, 0, 0, 7),
(5, 'Kahindo', 'Tshongo', 'Joy', 'Femini', '01', '1998-05-14', '0970285551', NULL, NULL, 1, 10, 0, 0, 7),
(75, 'Kambale', 'Charment', 'Dieu-merci', 'Feminin', '99', '2020-10-30', '+243828409897', NULL, 133, 2, 7, 0, 0, 7),
(85, 'Mukuku', 'Mudungo', 'Christian', 'Masculin', '120', '1990-12-01', '+243828409897', 'photoxxx', 133, 2, 7, 0, 0, 7),
(87, 'Kambale', 'Charment', 'Dieu-merci', 'Masculin', '120', '2019-11-30', '+243828409897', 'photoxxx', 133, 2, 7, 0, 0, 7),
(88, 'Kambale', 'Charment', 'Dieu-merci', 'Masculin', '120', '2019-11-30', '+243828409897', 'photoxxx', 133, 2, 7, 0, 0, 7),
(89, 'Kambale', 'Charment', 'Dieu-merci', 'Masculin', '120', '2019-11-30', '+243828409897', 'photoxxx', 133, 2, 7, NULL, 0, 7),
(90, 'Kambale', 'Charment', 'Dieu-merci', 'Masculin', '120', '2019-11-30', '+243828409897', 'photoxxx', 133, 2, 7, NULL, 0, 7),
(99, 'Kambale', 'Charment', 'Dieu-merci', 'Masculin', '1111', '2020-11-01', '+243828409897', 'photoxxx', 133, 3, 7, 0, 0, 7),
(100, 'Kambalepppp', 'Charment', 'Dieu-merci', 'Aucun', '1111', '2020-11-01', '+243828409897', 'photoxxx', 133, 1, 8, 0, 0, 7),
(101, 'Kambale', 'Charment', 'Dieu-merci', 'Feminin', '1111', '2019-12-29', '+243828409897', 'photoxxx', 233, 3, 7, 0, 0, 7),
(102, 'Mudi', 'Charment', 'Dieu-merci', 'Aucun', '120', '2020-10-30', '+243828409897', 'photoxxx', 133, 1, 8, 0, 0, 7),
(104, 'Kambale', 'Charment', 'Dieu-merci', 'Feminin', '11', '2021-12-02', '+243828409897', 'photoxxx', 133, 2, 7, 0, 0, 7),
(105, 'Kambale', 'Charment', 'Dieu-merci', 'Masculin', '234', '2020-11-30', '+243828409897', 'photoxxx', 133, 3, 9, 0, 0, 7),
(106, 'Kambale', 'Charment', 'Dieu-merci', 'Masculin', '234', '2020-11-30', '+243828409897', 'photoxxx', 133, 3, 9, 0, 0, 7),
(109, 'Kambale', 'Charment', 'Dieu-merci', 'Masculin', '11', '0000-00-00', '+243828409897', 'photoxxx', 133, 2, 8, 0, 0, 7),
(110, 'Kambale', 'Charment', 'Dieu-merci', 'Masculin', '11', '2021-10-13', '+243828409897', 'photoxxx', 133, 2, 8, 0, 0, 7),
(112, 'Yangongo', 'Nathali', 'Nathali', 'Masculin', '747', '0000-00-00', '+243828409897', 'photoxxx', 438, 1, 7, 0, 0, 7),
(113, 'OGUBA', 'JONATHA', 'J.', 'Masculin', '747', '0000-00-00', '+243828409897', 'photoxxx', 438, 1, 7, 0, 0, 7),
(114, 'MUKALAYI', 'WAMUKALAY', 'MECHACK', 'Masculin', '12', '1980-03-06', '+243828409897', 'photoxxx', 374454, 3, 7, 0, 0, 7);

-- --------------------------------------------------------

--
-- Structure de la table `tconsommation`
--

CREATE TABLE `tconsommation` (
  `IdConso` int(11) NOT NULL,
  `DateConso` date DEFAULT NULL,
  `QuantConso` int(12) DEFAULT NULL,
  `PuConso` float DEFAULT NULL,
  `IdPrescript` int(12) DEFAULT NULL,
  `IdDesigServi` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tconsommation`
--

INSERT INTO `tconsommation` (`IdConso`, `DateConso`, `QuantConso`, `PuConso`, `IdPrescript`, `IdDesigServi`) VALUES
(3, '2021-10-27', 1, 3, 1, 1),
(4, '2021-10-27', 1, 1, 1, 2),
(5, '2021-10-27', 1, 3, 1, 3),
(6, '2021-10-28', 1, 3, 5, 1),
(7, '2021-10-28', 3, 2, 5, 2),
(8, '2021-11-13', 1, 3, 7, 1),
(9, '2021-11-13', 1, 1, 7, 2),
(16, '2021-11-17', 1, 3, 9, 1),
(17, '2021-11-17', 1, 3, 9, 2);

-- --------------------------------------------------------

--
-- Structure de la table `tdesignation`
--

CREATE TABLE `tdesignation` (
  `IdDesigServi` int(3) NOT NULL,
  `DesigServi` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tdesignation`
--

INSERT INTO `tdesignation` (`IdDesigServi`, `DesigServi`) VALUES
(1, 'Consultation'),
(2, 'Medicament'),
(3, 'Laboratoire'),
(4, 'Actes'),
(5, 'Hospitalisation'),
(6, 'Soins Infirmiers');

-- --------------------------------------------------------

--
-- Structure de la table `tdevise`
--

CREATE TABLE `tdevise` (
  `IdDevise` int(11) NOT NULL,
  `NomDevise` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tdevise`
--

INSERT INTO `tdevise` (`IdDevise`, `NomDevise`) VALUES
(1, 'USD'),
(2, 'CDF');

-- --------------------------------------------------------

--
-- Structure de la table `tfonction`
--

CREATE TABLE `tfonction` (
  `IdFonct` int(2) NOT NULL,
  `NomFonct` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tfonction`
--

INSERT INTO `tfonction` (`IdFonct`, `NomFonct`) VALUES
(1, 'Administrateur'),
(2, 'Medecin Chef de staff'),
(3, 'Caissier'),
(4, 'Directeur Ccial'),
(5, 'Receptionniste'),
(6, 'Sensibilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `tjeton1`
--

CREATE TABLE `tjeton1` (
  `IdJeton` int(11) NOT NULL,
  `IdProg` int(11) NOT NULL,
  `IdAgent` int(3) NOT NULL,
  `DateJeton` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tjeton1`
--

INSERT INTO `tjeton1` (`IdJeton`, `IdProg`, `IdAgent`, `DateJeton`) VALUES
(133, 33, 1, '2021-10-17 22:23:59'),
(233, 33, 2, '2021-10-17 22:23:02'),
(438, 38, 4, '2021-10-28 16:22:03'),
(3638, 38, 36, '2021-10-28 16:44:34'),
(157354, 54, 1573, '2021-11-17 13:12:17'),
(374454, 54, 3744, '2021-11-17 09:44:06'),
(374738, 38, 3747, '2021-10-27 16:25:21'),
(378754, 54, 3787, '2021-11-17 13:10:04');

-- --------------------------------------------------------

--
-- Structure de la table `tnationalite`
--

CREATE TABLE `tnationalite` (
  `IdNation` int(4) NOT NULL,
  `NomNation` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tnationalite`
--

INSERT INTO `tnationalite` (`IdNation`, `NomNation`) VALUES
(1, 'Congolaise'),
(2, 'Francaise'),
(3, 'Americaine'),
(4, 'Rwandaise');

-- --------------------------------------------------------

--
-- Structure de la table `tpayement`
--

CREATE TABLE `tpayement` (
  `IdPay` int(12) NOT NULL,
  `DatePay` datetime DEFAULT NULL,
  `IdConso` int(11) DEFAULT NULL,
  `Montat` double DEFAULT NULL,
  `IdTaux` int(11) DEFAULT NULL,
  `IdDevise` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tpayement`
--

INSERT INTO `tpayement` (`IdPay`, `DatePay`, `IdConso`, `Montat`, `IdTaux`, `IdDevise`) VALUES
(66, '2021-10-27 17:46:02', 3, 3, 1, 1),
(67, '2021-10-27 17:46:09', 4, 1, 1, 1),
(68, '2021-10-28 16:47:27', 6, 1, 1, 1),
(69, '2021-10-28 16:48:09', 6, 4000, 12, 2),
(70, '2021-10-28 16:48:38', 7, 4000, 12, 2),
(71, '2021-10-28 16:48:39', 7, 4000, 12, 2),
(72, '2021-11-13 10:58:22', 8, 1, 1, 1),
(73, '2021-11-13 10:58:47', 8, 2, 1, 1),
(74, '2021-11-13 10:59:01', 9, 1, 1, 1),
(76, '2021-11-16 10:36:34', 7, 2, 1, 1),
(78, '2021-11-16 11:00:32', 5, 2, 1, 1),
(79, '2021-11-16 11:00:47', 5, 1, 1, 1),
(81, '2021-11-17 11:26:52', 17, 1, 1, 1),
(82, '2021-11-17 11:26:55', 17, 1, 1, 1),
(83, '2021-11-17 11:26:58', 17, 1, 1, 1),
(84, '2021-11-17 11:34:51', 16, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tpays`
--

CREATE TABLE `tpays` (
  `IdPays` int(11) NOT NULL,
  `NomPays` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tpays`
--

INSERT INTO `tpays` (`IdPays`, `NomPays`) VALUES
(1, 'RDC'),
(2, 'FRANCE'),
(3, 'OUNGANDA');

-- --------------------------------------------------------

--
-- Structure de la table `tprescription`
--

CREATE TABLE `tprescription` (
  `IdPrescrip` int(12) NOT NULL,
  `Prescrip` text,
  `IdFiche` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tprescription`
--

INSERT INTO `tprescription` (`IdPrescrip`, `Prescrip`, `IdFiche`) VALUES
(1, '<p><b>1. MÃ©dicament</b></p><p><br></p><table class=\"table table-bordered\"><tbody><tr><td><b>MÃ©dicament</b></td><td><b>Matin</b></td><td><b>Midi</b></td><td><b>Soir</b></td></tr><tr><td>ParacÃ©tamol</td><td>1</td><td>1</td><td>1</td></tr></tbody></table><p><b>2.Examen</b></p><p>Urine.</p>', 59),
(5, '<p>ParacÃ©tamol</p><p>ParacÃ©tamol</p><p>ParacÃ©tamol<br></p><p>', 60),
(7, 'ParacÃ©tamol: 3x1 5 jours..', 61),
(9, '<p>Hospitalisation</p><p>paracetamol 3x3 5jours.</p>', 62);

-- --------------------------------------------------------

--
-- Structure de la table `tprogramme`
--

CREATE TABLE `tprogramme` (
  `IdProg` int(11) NOT NULL,
  `DateProg` datetime DEFAULT NULL,
  `DebProg` date DEFAULT NULL,
  `FinProg` date DEFAULT NULL,
  `ObjProg` char(255) DEFAULT NULL,
  `Prog` longtext,
  `Validation` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tprogramme`
--

INSERT INTO `tprogramme` (`IdProg`, `DateProg`, `DebProg`, `FinProg`, `ObjProg`, `Prog`, `Validation`) VALUES
(33, '2021-10-17 21:02:28', '2021-09-27', '2021-10-20', 'Programme', '<p>1</p><p><br></p><table class=\"table table-bordered\"><tbody><tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table><p><br></p>', 0),
(37, '2021-10-27 16:19:22', '2020-10-26', '2022-06-05', 'Programme Hira', '<p style=\"text-align: left; \">Nous Proposons un programme de sensibilisation dans la communautÃ© Hira</p><p style=\"text-align: left; \">1. PLAN</p><p style=\"text-align: left; \"><br></p><table class=\"table table-bordered\"><tbody><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table><p style=\"text-align: left; \"><br></p><p style=\"text-align: left; \">2. HORAIRE</p><p style=\"text-align: left; \"><br></p><table class=\"table table-bordered\"><tbody><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table><p style=\"text-align: left; \"><br></p><p style=\"text-align: left; \">3. BUDGET</p><p style=\"text-align: left; \"><br></p><table class=\"table table-bordered\"><tbody><tr><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td></tr></tbody></table><p style=\"text-align: left; \">.</p>', 0),
(38, '2021-10-27 16:19:22', '2020-10-26', '2022-06-05', 'Programme Hira', '<p style=\"text-align: left; \">Nous Proposons un programme de sensibilisation dans la communautÃ© Hira</p><p style=\"text-align: left; \">1. PLAN</p><p style=\"text-align: left; \"><br></p><table class=\"table table-bordered\"><tbody><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table><p style=\"text-align: left; \"><br></p><p style=\"text-align: left; \">2. HORAIRE</p><p style=\"text-align: left; \"><br></p><table class=\"table table-bordered\"><tbody><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table><p style=\"text-align: left; \"><br></p><p style=\"text-align: left; \">3. BUDGET</p><p style=\"text-align: left; \"><br></p><table class=\"table table-bordered\"><tbody><tr><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td></tr></tbody></table><p style=\"text-align: left; \">.</p>', 1),
(40, '2021-11-15 15:17:30', '2021-11-01', '2021-12-12', 'Programme Test', '<p style=\"text-align: left; \">&nbsp;PROBLEME Dâ€™ORDONNANCEMENT ET Dâ€™AFFECTATION&nbsp;</p><p style=\"text-align: left; \">IV.1. PROBLEME Dâ€™ORDONNANCEMENT&nbsp;</p><p style=\"text-align: left; \">IV.1.1. But de lâ€™ordonnancement&nbsp;&nbsp;</p><p style=\"text-align: left; \">Les problÃ¨mes dâ€™ordonnancement, qui sont une application directe des mÃ©thodes de&nbsp;</p><p style=\"text-align: left; \">recherche des chemins optimaux dans un graphe, se posent lorsque, en vue de la rÃ©alisation&nbsp;</p><p style=\"text-align: left; \">dâ€™un objectif (projet), on doit accomplir un ensemble de tÃ¢ches soumises, elles â€“ mÃªmes Ã  un&nbsp;</p><p style=\"text-align: left; \">ensemble de contraintes.&nbsp;&nbsp;</p><p style=\"text-align: left; \">En dâ€™autres termes, les modÃ¨les dâ€™ordonnancement ont pour objet la programmation des&nbsp;</p><p style=\"text-align: left; \">activitÃ©s nÃ©cessaires Ã  la rÃ©alisation dâ€™un certain objectif.&nbsp;&nbsp;</p><p style=\"text-align: left; \">IV.1.2. ReprÃ©sentation dâ€™un ordonnancement par un graphe&nbsp;&nbsp;</p><p style=\"text-align: left; \">Un&nbsp; ordonnancement&nbsp; peut&nbsp; Ãªtre&nbsp; reprÃ©sentÃ©&nbsp; par&nbsp; un&nbsp; graphe&nbsp; appelÃ©&nbsp; Â« graphe&nbsp;</p><p style=\"text-align: left; \">dâ€™ordonnancement Â» selon deux mÃ©thodes :&nbsp;&nbsp;</p><p style=\"text-align: left; \">ï‚§&nbsp; La mÃ©thode PERT (Program Evaluation Research Task) de conception amÃ©ricaine ;&nbsp;</p><p style=\"text-align: left; \">appelÃ©e aussi Â« mÃ©thode potentiel-Ã©tapes Â» ;&nbsp;&nbsp;</p><p style=\"text-align: left; \">ï‚§&nbsp; La mÃ©thode MPM (MÃ©thodes des potentiels Metra) dÃ©veloppÃ© en France ; appelÃ©e&nbsp;</p><p style=\"text-align: left; \">aussi Â« mÃ©thode potentiel-tÃ¢ches Â».&nbsp;&nbsp;</p><p style=\"text-align: left; \">1Â° Le diagramme de GANTT&nbsp;&nbsp;</p><p style=\"text-align: left; \">Le&nbsp; diagramme&nbsp; de&nbsp; GANTT&nbsp; est&nbsp; un&nbsp; schÃ©ma&nbsp; permettant&nbsp; de&nbsp; suivre&nbsp; les&nbsp; rÃ©alisations&nbsp; par&nbsp;</p><p style=\"text-align: left; \">rapport Ã  des prÃ©visions.&nbsp;&nbsp;</p><p style=\"text-align: left; \">Exemple : Un projet se dÃ©compose en six tÃ¢ches dont les caractÃ©ristiques sont les suivantes :&nbsp;&nbsp;</p><table class=\"table table-bordered\"><tbody><tr><td>xxxxx</td><td>YYYYY</td><td>UUUU</td><td>IIIII</td></tr><tr><td>yyyy</td><td>jjjjj</td><td>ggg</td><td>hhhh</td></tr><tr><td>hhhh</td><td>ffff</td><td>ffff</td><td>gggg</td></tr></tbody></table><p style=\"text-align: left; \">.</p>', 1),
(41, '2021-11-15 15:31:05', '2021-11-10', '2021-12-04', 'Objet : Programme Test', '<p><a style=\"color: green; background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\">Objet : Programme Test</a><span style=\"font-size: 16px; text-align: left;\"></span></p><p style=\"text-align: left;\">&nbsp;PROBLEME Dâ€™ORDONNANCEMENT ET Dâ€™AFFECTATION&nbsp;</p><p style=\"text-align: left;\">IV.1. PROBLEME Dâ€™ORDONNANCEMENT&nbsp;</p><p style=\"text-align: left;\">IV.1.1. But de lâ€™ordonnancement&nbsp;&nbsp;</p><p><a style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\"></a></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-align: left;\">Les problÃ¨mes dâ€™ordonnancement, qui sont une application directe des mÃ©thodes de&nbsp;</p>', 0),
(42, '2021-11-15 15:31:14', '2021-11-10', '2021-12-04', 'Objet : Programme Test', '<p><a style=\"color: green; background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\">Objet : Programme Test</a><span style=\"font-size: 16px; text-align: left;\"></span></p><p style=\"text-align: left;\">&nbsp;PROBLEME Dâ€™ORDONNANCEMENT ET Dâ€™AFFECTATION&nbsp;</p><p style=\"text-align: left;\">IV.1. PROBLEME Dâ€™ORDONNANCEMENT&nbsp;</p><p style=\"text-align: left;\">IV.1.1. But de lâ€™ordonnancement&nbsp;&nbsp;</p><p><a style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\"></a></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-align: left;\">Les problÃ¨mes dâ€™ordonnancement, qui sont une application directe des mÃ©thodes de&nbsp;</p>', 0),
(43, '2021-11-15 15:31:16', '2021-11-10', '2021-12-04', 'Objet : Programme Test', '<p><a style=\"color: green; background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\">Objet : Programme Test</a><span style=\"font-size: 16px; text-align: left;\"></span></p><p style=\"text-align: left;\">&nbsp;PROBLEME Dâ€™ORDONNANCEMENT ET Dâ€™AFFECTATION&nbsp;</p><p style=\"text-align: left;\">IV.1. PROBLEME Dâ€™ORDONNANCEMENT&nbsp;</p><p style=\"text-align: left;\">IV.1.1. But de lâ€™ordonnancement&nbsp;&nbsp;</p><p><a style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\"></a></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-align: left;\">Les problÃ¨mes dâ€™ordonnancement, qui sont une application directe des mÃ©thodes de&nbsp;</p>', 0),
(44, '2021-11-15 15:31:17', '2021-11-10', '2021-12-04', 'Objet : Programme Test', '<p><a style=\"color: green; background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\">Objet : Programme Test</a><span style=\"font-size: 16px; text-align: left;\"></span></p><p style=\"text-align: left;\">&nbsp;PROBLEME Dâ€™ORDONNANCEMENT ET Dâ€™AFFECTATION&nbsp;</p><p style=\"text-align: left;\">IV.1. PROBLEME Dâ€™ORDONNANCEMENT&nbsp;</p><p style=\"text-align: left;\">IV.1.1. But de lâ€™ordonnancement&nbsp;&nbsp;</p><p><a style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\"></a></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-align: left;\">Les problÃ¨mes dâ€™ordonnancement, qui sont une application directe des mÃ©thodes de&nbsp;</p>', 0),
(45, '2021-11-15 15:31:18', '2021-11-10', '2021-12-04', 'Objet : Programme Test', '<p><a style=\"color: green; background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\">Objet : Programme Test</a><span style=\"font-size: 16px; text-align: left;\"></span></p><p style=\"text-align: left;\">&nbsp;PROBLEME Dâ€™ORDONNANCEMENT ET Dâ€™AFFECTATION&nbsp;</p><p style=\"text-align: left;\">IV.1. PROBLEME Dâ€™ORDONNANCEMENT&nbsp;</p><p style=\"text-align: left;\">IV.1.1. But de lâ€™ordonnancement&nbsp;&nbsp;</p><p><a style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\"></a></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-align: left;\">Les problÃ¨mes dâ€™ordonnancement, qui sont une application directe des mÃ©thodes de&nbsp;</p>', 0),
(46, '2021-11-15 15:31:19', '2021-11-10', '2021-12-04', 'Objet : Programme Test', '<p><a style=\"color: green; background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\">Objet : Programme Test</a><span style=\"font-size: 16px; text-align: left;\"></span></p><p style=\"text-align: left;\">&nbsp;PROBLEME Dâ€™ORDONNANCEMENT ET Dâ€™AFFECTATION&nbsp;</p><p style=\"text-align: left;\">IV.1. PROBLEME Dâ€™ORDONNANCEMENT&nbsp;</p><p style=\"text-align: left;\">IV.1.1. But de lâ€™ordonnancement&nbsp;&nbsp;</p><p><a style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\"></a></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-align: left;\">Les problÃ¨mes dâ€™ordonnancement, qui sont une application directe des mÃ©thodes de&nbsp;</p>', 0),
(47, '2021-11-15 15:31:20', '2021-11-10', '2021-12-04', 'Objet : Programme Test', '<p><a style=\"color: green; background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\">Objet : Programme Test</a><span style=\"font-size: 16px; text-align: left;\"></span></p><p style=\"text-align: left;\">&nbsp;PROBLEME Dâ€™ORDONNANCEMENT ET Dâ€™AFFECTATION&nbsp;</p><p style=\"text-align: left;\">IV.1. PROBLEME Dâ€™ORDONNANCEMENT&nbsp;</p><p style=\"text-align: left;\">IV.1.1. But de lâ€™ordonnancement&nbsp;&nbsp;</p><p><a style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\"></a></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-align: left;\">Les problÃ¨mes dâ€™ordonnancement, qui sont une application directe des mÃ©thodes de&nbsp;</p>', 0),
(48, '2021-11-15 15:31:20', '2021-11-10', '2021-12-04', 'Objet : Programme Test', '<p><a style=\"color: green; background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\">Objet : Programme Test</a><span style=\"font-size: 16px; text-align: left;\"></span></p><p style=\"text-align: left;\">&nbsp;PROBLEME Dâ€™ORDONNANCEMENT ET Dâ€™AFFECTATION&nbsp;</p><p style=\"text-align: left;\">IV.1. PROBLEME Dâ€™ORDONNANCEMENT&nbsp;</p><p style=\"text-align: left;\">IV.1.1. But de lâ€™ordonnancement&nbsp;&nbsp;</p><p><a style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\"></a></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-align: left;\">Les problÃ¨mes dâ€™ordonnancement, qui sont une application directe des mÃ©thodes de&nbsp;</p>', 0),
(49, '2021-11-15 15:31:21', '2021-11-10', '2021-12-04', 'Objet : Programme Test', '<p><a style=\"color: green; background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\">Objet : Programme Test</a><span style=\"font-size: 16px; text-align: left;\"></span></p><p style=\"text-align: left;\">&nbsp;PROBLEME Dâ€™ORDONNANCEMENT ET Dâ€™AFFECTATION&nbsp;</p><p style=\"text-align: left;\">IV.1. PROBLEME Dâ€™ORDONNANCEMENT&nbsp;</p><p style=\"text-align: left;\">IV.1.1. But de lâ€™ordonnancement&nbsp;&nbsp;</p><p><a style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\"></a></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-align: left;\">Les problÃ¨mes dâ€™ordonnancement, qui sont une application directe des mÃ©thodes de&nbsp;</p>', 0),
(50, '2021-11-15 15:31:21', '2021-11-10', '2021-12-04', 'Objet : Programme Test', '<p><a style=\"color: green; background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\">Objet : Programme Test</a><span style=\"font-size: 16px; text-align: left;\"></span></p><p style=\"text-align: left;\">&nbsp;PROBLEME Dâ€™ORDONNANCEMENT ET Dâ€™AFFECTATION&nbsp;</p><p style=\"text-align: left;\">IV.1. PROBLEME Dâ€™ORDONNANCEMENT&nbsp;</p><p style=\"text-align: left;\">IV.1.1. But de lâ€™ordonnancement&nbsp;&nbsp;</p><p><a style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\"></a></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-align: left;\">Les problÃ¨mes dâ€™ordonnancement, qui sont une application directe des mÃ©thodes de&nbsp;</p>', 0),
(51, '2021-11-15 15:31:26', '2021-11-10', '2021-12-04', 'Objet : Programme Test', '<p><a style=\"color: green; background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\">Objet : Programme Test</a><span style=\"font-size: 16px; text-align: left;\"></span></p><p style=\"text-align: left;\">&nbsp;PROBLEME Dâ€™ORDONNANCEMENT ET Dâ€™AFFECTATION&nbsp;</p><p style=\"text-align: left;\">IV.1. PROBLEME Dâ€™ORDONNANCEMENT&nbsp;</p><p style=\"text-align: left;\">IV.1.1. But de lâ€™ordonnancement&nbsp;&nbsp;</p><p><a style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); text-align: left; font-size: 25px;\"></a></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-align: left;\">Les problÃ¨mes dâ€™ordonnancement, qui sont une application directe des mÃ©thodes de&nbsp;</p>', 0),
(53, '2021-11-15 15:31:28', '2021-11-10', '2021-12-04', 'Objet : Programme Test', '<p>fff</p>', 0),
(54, '2021-11-15 15:31:29', '2021-11-10', '2021-12-04', 'Objet : Programme Test', '                      	<p>bbb</p>                      ', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tprovince`
--

CREATE TABLE `tprovince` (
  `IdProv` int(11) NOT NULL,
  `NomProv` char(12) DEFAULT NULL,
  `IdPays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tprovince`
--

INSERT INTO `tprovince` (`IdProv`, `NomProv`, `IdPays`) VALUES
(1, 'Nord-Kivu', 1),
(2, 'Sud-Kivu', 1),
(3, 'Ituri', 1),
(4, 'Bas-Congo', 1),
(5, 'Kasay', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tqualification`
--

CREATE TABLE `tqualification` (
  `IdQualif` int(3) NOT NULL,
  `Qualif` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tqualification`
--

INSERT INTO `tqualification` (`IdQualif`, `Qualif`) VALUES
(1, 'Medecin'),
(2, 'Infirmier A1'),
(3, 'Infirmier A2'),
(4, 'Hygeniste'),
(5, 'DHP'),
(6, 'Laborantin');

-- --------------------------------------------------------

--
-- Structure de la table `tquartier`
--

CREATE TABLE `tquartier` (
  `IdQuart` int(3) NOT NULL,
  `NomQuart` char(12) DEFAULT NULL,
  `IdVille` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tquartier`
--

INSERT INTO `tquartier` (`IdQuart`, `NomQuart`, `IdVille`) VALUES
(1, 'MGL', 1),
(2, 'Kimemi', 1),
(3, 'Kambali', 1),
(4, 'Mayangose', 2),
(5, 'Himbi', 3),
(6, 'Majengo', 3),
(7, 'Lumumba', 4),
(8, 'Kindya', 4),
(9, 'Yambi-yaya', 4),
(10, 'Bankoko', 4),
(11, 'Braza', 4);

-- --------------------------------------------------------

--
-- Structure de la table `tregistremal`
--

CREATE TABLE `tregistremal` (
  `IdEnregMal` int(12) NOT NULL,
  `DateEnregMal` datetime DEFAULT NULL,
  `CasEnregMal` char(12) DEFAULT NULL,
  `RemEnregMal` varchar(450) DEFAULT NULL,
  `IdFiche` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tregistremal`
--

INSERT INTO `tregistremal` (`IdEnregMal`, `DateEnregMal`, `CasEnregMal`, `RemEnregMal`, `IdFiche`) VALUES
(2, '2021-10-23 21:05:22', 'NV', 'Remarque', 2),
(3, '2021-10-23 21:05:22', 'NV', 'Remarque', 2),
(22, '2021-10-24 02:30:44', '', '<p>b</p>', 56),
(23, '2021-10-24 02:31:39', '', '<p>wwww</p>', 33),
(24, '2021-10-24 02:32:04', 'Ancien_Cas', '<p>wwww</p>', 33),
(25, '2021-10-24 02:32:05', 'Ancien_Cas', '<p>wwww</p>', 33),
(26, '2021-10-24 02:33:42', 'Ancien_Cas', '<p>Bien</p>', 56),
(27, '2021-10-28 16:41:39', 'Ancien_Cas', '<p>Ici remarque</p>', 60),
(28, '2021-11-13 05:27:47', 'Ancien_Cas', '<p>Remarque</p>', 2),
(30, '2021-11-16 10:04:05', 'Ancien_Cas', '<p>bbbb</p>', 2),
(31, '2021-11-16 10:04:21', 'Ancien_Cas', '<p>bbbb</p>', 2),
(32, '2021-11-16 10:04:24', 'Ancien_Cas', '<p>bbbb</p>', 2),
(33, '2021-11-16 10:04:25', 'Ancien_Cas', '<p>bbbb</p>', 2),
(34, '2021-11-16 10:04:26', 'Ancien_Cas', '<p>bbbb</p>', 2),
(35, '2021-11-16 10:04:27', 'Ancien_Cas', '<p>bbbb</p>', 2),
(36, '2021-11-17 12:39:31', 'Ancien_Cas', '<p>Remarque ..........</p>', 62);

-- --------------------------------------------------------

--
-- Structure de la table `tretrait`
--

CREATE TABLE `tretrait` (
  `IdRetrait` int(12) NOT NULL,
  `DateRetrait` datetime DEFAULT NULL,
  `MontRetrait` double DEFAULT NULL,
  `IdAgent` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tretrait`
--

INSERT INTO `tretrait` (`IdRetrait`, `DateRetrait`, `MontRetrait`, `IdAgent`) VALUES
(2, '2021-10-28 17:59:12', 0.5, 4),
(3, '2021-11-16 11:49:01', 0.1, 1),
(4, '2021-11-16 13:11:10', 0.1, 1),
(5, '2021-11-16 13:24:01', 0.1, 1),
(6, '2021-11-16 13:42:32', 0.1, 1),
(7, '2021-11-16 13:43:25', 0.1, 1),
(8, '2021-11-17 11:50:30', 0.1, 3744);

-- --------------------------------------------------------

--
-- Structure de la table `tsignevit`
--

CREATE TABLE `tsignevit` (
  `IdFiche` int(12) NOT NULL,
  `DateElabFiche` datetime DEFAULT NULL,
  `TempFiche` char(12) DEFAULT NULL,
  `RespFiche` char(12) DEFAULT NULL,
  `PulsFiche` char(12) DEFAULT NULL,
  `PoidFiche` char(12) DEFAULT NULL,
  `TaFiche` char(12) DEFAULT NULL,
  `AnamFiche` text,
  `IdCli` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tsignevit`
--

INSERT INTO `tsignevit` (`IdFiche`, `DateElabFiche`, `TempFiche`, `RespFiche`, `PulsFiche`, `PoidFiche`, `TaFiche`, `AnamFiche`, `IdCli`) VALUES
(2, '2021-10-07 20:06:57', '35', '20min', '78/min', '51', '10/60', '<p>Le patient prÃ©sente des signes de faiblesse.</p><h1>1. Tableau</h1><table class=\"table table-bordered\"><tbody><tr><td>Titre1:&nbsp;</td><td>Titre: 2</td></tr><tr><td><br></td><td><br></td></tr></tbody></table><p><br></p>', 4),
(3, '2021-10-08 15:14:38', '111', '33', '33', '33', '333', '<p>33</p>', 3),
(31, '2021-10-09 08:50:23', '', '120', '100/12', '57', '60/10', '', 2),
(33, '2021-10-17 06:24:12', '36', '120min', '120', '57', '60/10', '<p><u><br></u></p><p><u>Le patient prÃ©sente des signe de fÃ©brilitÃ©.</u></p>', 5),
(56, '2021-10-23 15:18:24', '34', '120', '100/12', '57', '60/10', '<p></p>', 1),
(59, '2021-10-27 15:13:45', '120', '120m', '100/60', '56', '120/30', '<p><p><u>Ici on met une remarque....</u></p></p>', 106),
(60, '2021-10-28 16:36:11', '36', '120min', '120/50', '50', '120/30', '<p>Bien</p>', 112),
(61, '2021-11-13 10:29:20', '78', '120/min', '33', '54', '32', '<p>Remarque</p>', 113),
(62, '2021-11-17 09:50:29', '34', '120MIN', '53', '45', '120/20', 'Le patient prÃ©sente les signe des malaria.......', 114);

-- --------------------------------------------------------

--
-- Structure de la table `ttaux`
--

CREATE TABLE `ttaux` (
  `IdTaux` int(11) NOT NULL,
  `Taux` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ttaux`
--

INSERT INTO `ttaux` (`IdTaux`, `Taux`) VALUES
(1, 1),
(12, 2000),
(13, 2010);

-- --------------------------------------------------------

--
-- Structure de la table `tville`
--

CREATE TABLE `tville` (
  `IdVille` int(3) NOT NULL,
  `NomVille` char(12) DEFAULT NULL,
  `IdProv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tville`
--

INSERT INTO `tville` (`IdVille`, `NomVille`, `IdProv`) VALUES
(1, 'Butembo', 1),
(2, 'Beni', 1),
(3, 'Goma', 1),
(4, 'Bunia', 3),
(5, 'Bukavu', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tagent`
--
ALTER TABLE `tagent`
  ADD PRIMARY KEY (`IdAgent`),
  ADD KEY `IdQualif` (`IdQualif`),
  ADD KEY `IdNation` (`IdNation`),
  ADD KEY `IdFonct` (`IdFonct`),
  ADD KEY `IdQuart` (`IdQuart`);

--
-- Index pour la table `tclient`
--
ALTER TABLE `tclient`
  ADD PRIMARY KEY (`IdCli`),
  ADD KEY `IdNation` (`IdNation`),
  ADD KEY `IdQuart` (`IdQuart`),
  ADD KEY `IdJeton` (`IdJeton`);

--
-- Index pour la table `tconsommation`
--
ALTER TABLE `tconsommation`
  ADD PRIMARY KEY (`IdConso`),
  ADD KEY `IdDesigServi` (`IdDesigServi`),
  ADD KEY `IdPrescript` (`IdPrescript`);

--
-- Index pour la table `tdesignation`
--
ALTER TABLE `tdesignation`
  ADD PRIMARY KEY (`IdDesigServi`);

--
-- Index pour la table `tdevise`
--
ALTER TABLE `tdevise`
  ADD PRIMARY KEY (`IdDevise`);

--
-- Index pour la table `tfonction`
--
ALTER TABLE `tfonction`
  ADD PRIMARY KEY (`IdFonct`);

--
-- Index pour la table `tjeton1`
--
ALTER TABLE `tjeton1`
  ADD UNIQUE KEY `IdJeton` (`IdJeton`),
  ADD KEY `IdAgent` (`IdAgent`),
  ADD KEY `IdProg` (`IdProg`);

--
-- Index pour la table `tnationalite`
--
ALTER TABLE `tnationalite`
  ADD PRIMARY KEY (`IdNation`);

--
-- Index pour la table `tpayement`
--
ALTER TABLE `tpayement`
  ADD PRIMARY KEY (`IdPay`),
  ADD KEY `IdConso` (`IdConso`),
  ADD KEY `IdTaux` (`IdTaux`),
  ADD KEY `IdDevise` (`IdDevise`);

--
-- Index pour la table `tpays`
--
ALTER TABLE `tpays`
  ADD PRIMARY KEY (`IdPays`);

--
-- Index pour la table `tprescription`
--
ALTER TABLE `tprescription`
  ADD PRIMARY KEY (`IdPrescrip`),
  ADD KEY `IdFiche` (`IdFiche`);

--
-- Index pour la table `tprogramme`
--
ALTER TABLE `tprogramme`
  ADD PRIMARY KEY (`IdProg`);

--
-- Index pour la table `tprovince`
--
ALTER TABLE `tprovince`
  ADD PRIMARY KEY (`IdProv`),
  ADD KEY `IdPays` (`IdPays`);

--
-- Index pour la table `tqualification`
--
ALTER TABLE `tqualification`
  ADD PRIMARY KEY (`IdQualif`);

--
-- Index pour la table `tquartier`
--
ALTER TABLE `tquartier`
  ADD PRIMARY KEY (`IdQuart`),
  ADD KEY `IdVille` (`IdVille`);

--
-- Index pour la table `tregistremal`
--
ALTER TABLE `tregistremal`
  ADD PRIMARY KEY (`IdEnregMal`),
  ADD KEY `IdFiche` (`IdFiche`);

--
-- Index pour la table `tretrait`
--
ALTER TABLE `tretrait`
  ADD PRIMARY KEY (`IdRetrait`),
  ADD KEY `IdAgent` (`IdAgent`);

--
-- Index pour la table `tsignevit`
--
ALTER TABLE `tsignevit`
  ADD PRIMARY KEY (`IdFiche`),
  ADD KEY `IdCli` (`IdCli`);

--
-- Index pour la table `ttaux`
--
ALTER TABLE `ttaux`
  ADD PRIMARY KEY (`IdTaux`);

--
-- Index pour la table `tville`
--
ALTER TABLE `tville`
  ADD PRIMARY KEY (`IdVille`),
  ADD KEY `IdProv` (`IdProv`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tagent`
--
ALTER TABLE `tagent`
  MODIFY `IdAgent` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3788;

--
-- AUTO_INCREMENT pour la table `tclient`
--
ALTER TABLE `tclient`
  MODIFY `IdCli` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT pour la table `tconsommation`
--
ALTER TABLE `tconsommation`
  MODIFY `IdConso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `tdesignation`
--
ALTER TABLE `tdesignation`
  MODIFY `IdDesigServi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tdevise`
--
ALTER TABLE `tdevise`
  MODIFY `IdDevise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tfonction`
--
ALTER TABLE `tfonction`
  MODIFY `IdFonct` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tnationalite`
--
ALTER TABLE `tnationalite`
  MODIFY `IdNation` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tpayement`
--
ALTER TABLE `tpayement`
  MODIFY `IdPay` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT pour la table `tpays`
--
ALTER TABLE `tpays`
  MODIFY `IdPays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tprescription`
--
ALTER TABLE `tprescription`
  MODIFY `IdPrescrip` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `tprogramme`
--
ALTER TABLE `tprogramme`
  MODIFY `IdProg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `tprovince`
--
ALTER TABLE `tprovince`
  MODIFY `IdProv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `tqualification`
--
ALTER TABLE `tqualification`
  MODIFY `IdQualif` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tquartier`
--
ALTER TABLE `tquartier`
  MODIFY `IdQuart` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `tregistremal`
--
ALTER TABLE `tregistremal`
  MODIFY `IdEnregMal` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `tretrait`
--
ALTER TABLE `tretrait`
  MODIFY `IdRetrait` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `tsignevit`
--
ALTER TABLE `tsignevit`
  MODIFY `IdFiche` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `ttaux`
--
ALTER TABLE `ttaux`
  MODIFY `IdTaux` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `tville`
--
ALTER TABLE `tville`
  MODIFY `IdVille` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tagent`
--
ALTER TABLE `tagent`
  ADD CONSTRAINT `tagent_ibfk_1` FOREIGN KEY (`IdQualif`) REFERENCES `tqualification` (`IdQualif`),
  ADD CONSTRAINT `tagent_ibfk_2` FOREIGN KEY (`IdNation`) REFERENCES `tnationalite` (`IdNation`),
  ADD CONSTRAINT `tagent_ibfk_3` FOREIGN KEY (`IdFonct`) REFERENCES `tfonction` (`IdFonct`),
  ADD CONSTRAINT `tagent_ibfk_4` FOREIGN KEY (`IdQuart`) REFERENCES `tquartier` (`IdQuart`);

--
-- Contraintes pour la table `tclient`
--
ALTER TABLE `tclient`
  ADD CONSTRAINT `tclient_ibfk_1` FOREIGN KEY (`IdNation`) REFERENCES `tnationalite` (`IdNation`),
  ADD CONSTRAINT `tclient_ibfk_2` FOREIGN KEY (`IdQuart`) REFERENCES `tquartier` (`IdQuart`),
  ADD CONSTRAINT `tclient_ibfk_3` FOREIGN KEY (`IdJeton`) REFERENCES `tjeton1` (`IdJeton`);

--
-- Contraintes pour la table `tconsommation`
--
ALTER TABLE `tconsommation`
  ADD CONSTRAINT `tconsommation_ibfk_2` FOREIGN KEY (`IdDesigServi`) REFERENCES `tdesignation` (`IdDesigServi`),
  ADD CONSTRAINT `tconsommation_ibfk_3` FOREIGN KEY (`IdPrescript`) REFERENCES `tprescription` (`IdPrescrip`);

--
-- Contraintes pour la table `tjeton1`
--
ALTER TABLE `tjeton1`
  ADD CONSTRAINT `tjeton1_ibfk_1` FOREIGN KEY (`IdAgent`) REFERENCES `tagent` (`IdAgent`),
  ADD CONSTRAINT `tjeton1_ibfk_2` FOREIGN KEY (`IdAgent`) REFERENCES `tagent` (`IdAgent`),
  ADD CONSTRAINT `tjeton1_ibfk_3` FOREIGN KEY (`IdProg`) REFERENCES `tprogramme` (`IdProg`);

--
-- Contraintes pour la table `tpayement`
--
ALTER TABLE `tpayement`
  ADD CONSTRAINT `tpayement_ibfk_1` FOREIGN KEY (`IdConso`) REFERENCES `tconsommation` (`IdConso`),
  ADD CONSTRAINT `tpayement_ibfk_2` FOREIGN KEY (`IdTaux`) REFERENCES `ttaux` (`IdTaux`),
  ADD CONSTRAINT `tpayement_ibfk_3` FOREIGN KEY (`IdDevise`) REFERENCES `tdevise` (`IdDevise`);

--
-- Contraintes pour la table `tprescription`
--
ALTER TABLE `tprescription`
  ADD CONSTRAINT `tprescription_ibfk_1` FOREIGN KEY (`IdFiche`) REFERENCES `tsignevit` (`IdFiche`);

--
-- Contraintes pour la table `tprovince`
--
ALTER TABLE `tprovince`
  ADD CONSTRAINT `tprovince_ibfk_1` FOREIGN KEY (`IdPays`) REFERENCES `tpays` (`IdPays`);

--
-- Contraintes pour la table `tquartier`
--
ALTER TABLE `tquartier`
  ADD CONSTRAINT `tquartier_ibfk_2` FOREIGN KEY (`IdVille`) REFERENCES `tville` (`IdVille`);

--
-- Contraintes pour la table `tregistremal`
--
ALTER TABLE `tregistremal`
  ADD CONSTRAINT `tregistremal_ibfk_1` FOREIGN KEY (`IdFiche`) REFERENCES `tsignevit` (`IdFiche`);

--
-- Contraintes pour la table `tretrait`
--
ALTER TABLE `tretrait`
  ADD CONSTRAINT `tretrait_ibfk_1` FOREIGN KEY (`IdAgent`) REFERENCES `tagent` (`IdAgent`);

--
-- Contraintes pour la table `tsignevit`
--
ALTER TABLE `tsignevit`
  ADD CONSTRAINT `tsignevit_ibfk_1` FOREIGN KEY (`IdCli`) REFERENCES `tclient` (`IdCli`),
  ADD CONSTRAINT `tsignevit_ibfk_2` FOREIGN KEY (`IdCli`) REFERENCES `tclient` (`IdCli`);

--
-- Contraintes pour la table `tville`
--
ALTER TABLE `tville`
  ADD CONSTRAINT `tville_ibfk_1` FOREIGN KEY (`IdProv`) REFERENCES `tprovince` (`IdProv`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
