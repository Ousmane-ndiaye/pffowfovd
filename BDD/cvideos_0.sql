-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  sam. 11 juil. 2020 à 17:54
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cvideos_0`
--

-- --------------------------------------------------------

--
-- Structure de la table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `object` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contactus`
--

INSERT INTO `contactus` (`id`, `email`, `phone`, `fullname`, `object`, `message`) VALUES
(1, 'ousmanendiaye352@gmail.com', '+221775919686', 'Ousmane NDIAYE', 'test d\'envoie de message', 'Bpnjpur je suis ni\'ljd cdlfsngeos');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) DEFAULT NULL,
  `presentation` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `taille_entreprise` int(11) DEFAULT NULL,
  `siege_social` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tel` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `twitter` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `linkedin` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date_fondation` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D19FA60E899029B` (`plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `plan_id`, `presentation`, `taille_entreprise`, `siege_social`, `logo`, `tel`, `website`, `twitter`, `linkedin`, `date_fondation`, `type`, `slug`, `libelle`) VALUES
(1, 1, NULL, NULL, 'Dakar, Sénégal', NULL, '77962554', NULL, NULL, NULL, NULL, 'Travailleur indépendant ou profession libérale', 'innovation-lab\'s', 'Innovation Lab\'s');

-- --------------------------------------------------------

--
-- Structure de la table `entreprisesecteur`
--

DROP TABLE IF EXISTS `entreprisesecteur`;
CREATE TABLE IF NOT EXISTS `entreprisesecteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secteur_id` int(11) DEFAULT NULL,
  `entreprise_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_20607EAB9F7E4405` (`secteur_id`),
  KEY `IDX_20607EABA4AEAFEA` (`entreprise_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `entreprise` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `intitule_poste` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_current` tinyint(1) NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `competences` json DEFAULT NULL,
  `mois_de_debut` int(11) NOT NULL,
  `annee_de_debut` int(11) NOT NULL,
  `mois_de_fin` int(11) DEFAULT NULL,
  `annee_de_fin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_590C103A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`id`, `user_id`, `entreprise`, `intitule_poste`, `lieu`, `is_current`, `description`, `competences`, `mois_de_debut`, `annee_de_debut`, `mois_de_fin`, `annee_de_fin`) VALUES
(1, 6, 'Hakim', 'DG', 'Dakar', 1, 'nsqnksnkqs,kq', '[\"design\"]', 1, 2020, NULL, NULL),
(2, 6, 'sfdfd', 'ds', 'sfsfds', 1, 'qddfgdgdf', '[\"vdd\"]', 2, 2017, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `diplome` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ecole` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mois_de_debut` int(11) DEFAULT NULL,
  `annee_de_debut` int(11) DEFAULT NULL,
  `mois_de_fin` int(11) DEFAULT NULL,
  `annee_de_fin` int(11) DEFAULT NULL,
  `domaine_etude` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_404021BFA76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `infoprofil`
--

DROP TABLE IF EXISTS `infoprofil`;
CREATE TABLE IF NOT EXISTS `infoprofil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `titre_profil` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `situation` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `competences` json NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `website` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `twitter` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `linkedin` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_66B79BFEA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `infoprofil`
--

INSERT INTO `infoprofil` (`id`, `user_id`, `titre_profil`, `situation`, `competences`, `description`, `website`, `twitter`, `linkedin`) VALUES
(1, 2, 'Developpeur d\'application web et mobile', 'En recherche d\'emploi', '[\"php\", \"java\", \"symfony\", \"laravel\", \"spring boot\", \"angular\", \"activity\", \"keycloak\"]', 'Je suis un développeur web et mobile qui est passionné par les nouvelles technologies et les progrès scientifiques', 'http://ousmane-ndiaye.github.io', 'https://twitter.com/_OusmaneNdiaye', 'https://www.linkedin.com/in/ousmane-ndiaye/'),
(2, 7, 'Gérante', 'En poste', '[\"\"]', 'Entrepreneure/ commercante/beautè/makeup&hair\r\nProprietaire MaEva beauty', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `libelle` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9357758EA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`id`, `user_id`, `libelle`, `niveau`) VALUES
(1, 6, 'Anglais', 'Avancé');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200208174825', '2020-02-10 11:32:11'),
('20200711155647', '2020-07-11 15:56:58');

-- --------------------------------------------------------

--
-- Structure de la table `notifiable_entity`
--

DROP TABLE IF EXISTS `notifiable_entity`;
CREATE TABLE IF NOT EXISTS `notifiable_entity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `notifiable_notification`
--

DROP TABLE IF EXISTS `notifiable_notification`;
CREATE TABLE IF NOT EXISTS `notifiable_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_id` int(11) DEFAULT NULL,
  `notifiable_entity_id` int(11) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ADCFE0FAEF1A9D84` (`notification_id`),
  KEY `IDX_ADCFE0FAC3A0A4F8` (`notifiable_entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `subject` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

DROP TABLE IF EXISTS `personnes`;
CREATE TABLE IF NOT EXISTS `personnes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `entreprise_id` int(11) DEFAULT NULL,
  `poste` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2BB4FE2BA76ED395` (`user_id`),
  KEY `IDX_2BB4FE2BA4AEAFEA` (`entreprise_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id`, `user_id`, `entreprise_id`, `poste`) VALUES
(1, 9, 1, 'Directeur');

-- --------------------------------------------------------

--
-- Structure de la table `plan`
--

DROP TABLE IF EXISTS `plan`;
CREATE TABLE IF NOT EXISTS `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `duree` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offres` json NOT NULL,
  `par_defaut` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plan`
--

INSERT INTO `plan` (`id`, `libelle`, `prix`, `duree`, `offres`, `par_defaut`) VALUES
(1, 'STARTER', 0, '30 jours', '[\"TOP 10 CV VIDÉO DE LA SEMAINE\", \"1 SECTEUR\", \"0 PUBLICITÉ\", \"4 OFFRE D’EMPLOI\"]', NULL),
(2, 'STANDARD', 0, '6 Mois', '[\"CV VIDÉO ILLIMITÉS\", \"3 SECTEURS\", \"3 PUBLICITÉ\", \"OFFRE D’EMPLOI ILLIMITÉES\", \"BANNIÈRE\"]', NULL),
(3, 'PREMIUM', 0, '1 AN', '[\"CV VIDÉO ILLIMITÉS\", \"SECTEURS ILLIMITÉS\", \"12 PUBLICITÉ\", \"OFFRE D’EMPLOI ILLIMITÉES\", \"BANNIÈRE\", \"COMING SOON (événement, promotion, présentation nouveaux produits)\"]', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
CREATE TABLE IF NOT EXISTS `secteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `secteur`
--

INSERT INTO `secteur` (`id`, `libelle`, `description`, `image`) VALUES
(1, 'Agriculture', NULL, 'agriculture.jpg'),
(2, 'Animaux', NULL, 'animaux.jpg'),
(3, 'Artisanat - Métiers d\'art', '', 'Artisanat.jpg'),
(4, 'Bâtiment - Travaux publics', '', 'batiment.jpg'),
(5, 'Commerce - Immobilier', '', 'commerce.jpg'),
(6, 'Culture - Spectacle', '', 'culture.jpg'),
(7, 'Droit', '', 'droit.jpg'),
(8, 'Electronique - Informatique', '', 'electronique_informatique.jpg'),
(9, 'Environnement - Nature - Nettoyage', '', 'environnement.jpg'),
(10, 'Hôtellerie - Restauration - Tourisme', '', 'hotellerie.jpg'),
(11, 'Industrie - Matériaux', '', 'industrie.jpg'),
(12, 'Mécanique - Maintenance', '', 'mecanique.jpg'),
(13, 'Santé', '', 'sante.jpg'),
(14, 'Secrétariat - Accueil', '', 'secretariat.jpg'),
(15, 'Soins - Esthétique - Coiffure', '', 'soins.jpg'),
(16, 'Transport - Logistique', '', 'transport.jpg'),
(17, 'Agroalimentaire - Alimentation', '', 'alimentation.jpg'),
(18, 'Architecture - Aménagement intérieur', '', 'architecture.jpg'),
(19, 'Banque - Finance - Assurance', '', 'banque.jpg'),
(20, 'Biologie - Chimie', '', 'biologie.jpeg'),
(21, 'Communication - Information', '', 'communication.jpg'),
(22, 'Défense - Sécurité - Secours', '', 'defense.jpg'),
(23, 'Edition - Imprimerie - Livre', '', 'edition.jpg'),
(24, 'Enseignement - Formation', '', 'enseignement.jpg'),
(25, 'Gestion - Audit - Ressources humaines', '', 'gestion.jpg'),
(26, 'Humanitaire', '', 'humanitaire.jpeg'),
(27, 'Lettres - Sciences humaines', '', 'lettres.jpg'),
(28, 'Numérique - Multimédia - Audiovisuel', '', 'numerique.jpg'),
(29, 'Sciences - Maths - Physique', '', 'sciences.jpeg'),
(30, 'Social - Services à la personne', '', 'social.jpg'),
(31, 'Sport - Animation', '', 'sport.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `sexe` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `pays` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `adresse`, `tel`, `is_visible`, `birthday`, `sexe`, `ville`, `code_postal`, `pays`, `image`, `email`, `password`, `roles`, `is_active`, `prenom`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Nord Foire', '77 373 19 36', NULL, '1994-02-28 00:00:00', 'Homme', 'Dakar', 1700, NULL, NULL, 'papadjibyniang@gmail.com', '$2y$13$weJP89bhLJI4fSkG95W72O\/TbUTGkYmd1bkANsvT.9p4TP2dk1HFq', '[\"ROLE_PROFESSIONNEL\"]', 0, 'Papa Djiby', 'Niang', '2020-02-10 14:51:52', '0000-00-00 00:00:00'),
(2, 'Dakar, Sénégal', '77 591 96 86', NULL, '1994-09-18 00:00:00', 'Homme', 'Dakar', 35239, NULL, 'ousmane-5f09f95ea6427.png', 'ousmanendiaye352@gmail.com', '$2y$13$weJP89bhLJI4fSkG95W72O\/TbUTGkYmd1bkANsvT.9p4TP2dk1HFq', '[\"ROLE_PROFESSIONNEL\"]', 0, 'Ousmane', 'NDIAYE', '2020-02-11 08:44:58', '0000-00-00 00:00:00'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fayeabdoulaye45@gmail.com', '$2y$13$weJP89bhLJI4fSkG95W72O\/TbUTGkYmd1bkANsvT.9p4TP2dk1HFq', '[\"ROLE_PROFESSIONNEL\"]', 0, 'Abdoulaye', 'Faye', '2020-02-13 18:47:58', '0000-00-00 00:00:00'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'diopgaye8045@gmail.com', '$2y$13$weJP89bhLJI4fSkG95W72O\/TbUTGkYmd1bkANsvT.9p4TP2dk1HFq', '[\"ROLE_PROFESSIONNEL\"]', 0, 'Cheikh Diop', 'Gaye', '2020-02-27 18:21:32', '0000-00-00 00:00:00'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'badianeelina8@gmail.com', '$2y$13$weJP89bhLJI4fSkG95W72O\/TbUTGkYmd1bkANsvT.9p4TP2dk1HFq', '[\"ROLE_PROFESSIONNEL\"]', 0, 'elina', 'badiane', '2020-03-04 11:27:52', '0000-00-00 00:00:00'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'baghi.gueye@gmail.com', '$2y$13$weJP89bhLJI4fSkG95W72O\/TbUTGkYmd1bkANsvT.9p4TP2dk1HFq', '[\"ROLE_PROFESSIONNEL\"]', 0, 'Abdoul', 'Gueye', '2020-03-04 12:23:04', '0000-00-00 00:00:00'),
(7, 'hlm grand yoff', NULL, NULL, '1988-10-14 00:00:00', 'Femme', 'dakar', 99999, NULL, NULL, 'abyba1410@gmail.com', '$2y$13$weJP89bhLJI4fSkG95W72O\/TbUTGkYmd1bkANsvT.9p4TP2dk1HFq', '[\"ROLE_PROFESSIONNEL\"]', 0, 'aby', 'ba', '2020-03-08 03:44:13', '0000-00-00 00:00:00'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'diopgaye80@hotmail.fr', '$2y$13$weJP89bhLJI4fSkG95W72O\/TbUTGkYmd1bkANsvT.9p4TP2dk1HFq', '[\"ROLE_PROFESSIONNEL\"]', 0, 'cheikh Diop', 'Gaye', '2020-03-28 00:36:54', '0000-00-00 00:00:00'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ousseynouddgg@gmail.com', '$2y$13$weJP89bhLJI4fSkG95W72O\/TbUTGkYmd1bkANsvT.9p4TP2dk1HFq', '[\"ROLE_ENTREPRISE\"]', 0, 'Ousseynou', 'Diop', '2020-07-11 15:40:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `usersecteur`
--

DROP TABLE IF EXISTS `usersecteur`;
CREATE TABLE IF NOT EXISTS `usersecteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secteur_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1C24D9A19F7E4405` (`secteur_id`),
  KEY `IDX_1C24D9A1A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `usersecteur`
--

INSERT INTO `usersecteur` (`id`, `secteur_id`, `user_id`) VALUES
(1, 2, 1),
(2, 24, 1),
(3, 28, 1),
(4, 31, 1),
(5, 28, 2),
(6, 15, 7),
(7, 21, 7),
(8, 15, 7),
(9, 21, 7);

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `lien` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_current` tinyint(1) NOT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7CC7DA2CA76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vue`
--

DROP TABLE IF EXISTS `vue`;
CREATE TABLE IF NOT EXISTS `vue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_profil_id` int(11) DEFAULT NULL,
  `visiteur_id` int(11) DEFAULT NULL,
  `date_vue` datetime NOT NULL,
  `note` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C0ADD5948A2E6D45` (`info_profil_id`),
  KEY `IDX_C0ADD5947F72333D` (`visiteur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `FK_D19FA60E899029B` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`);

--
-- Contraintes pour la table `entreprisesecteur`
--
ALTER TABLE `entreprisesecteur`
  ADD CONSTRAINT `FK_20607EAB9F7E4405` FOREIGN KEY (`secteur_id`) REFERENCES `secteur` (`id`),
  ADD CONSTRAINT `FK_20607EABA4AEAFEA` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprise` (`id`);

--
-- Contraintes pour la table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `FK_590C103A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_404021BFA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `infoprofil`
--
ALTER TABLE `infoprofil`
  ADD CONSTRAINT `FK_66B79BFEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `langue`
--
ALTER TABLE `langue`
  ADD CONSTRAINT `FK_9357758EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `notifiable_notification`
--
ALTER TABLE `notifiable_notification`
  ADD CONSTRAINT `FK_ADCFE0FAC3A0A4F8` FOREIGN KEY (`notifiable_entity_id`) REFERENCES `notifiable_entity` (`id`),
  ADD CONSTRAINT `FK_ADCFE0FAEF1A9D84` FOREIGN KEY (`notification_id`) REFERENCES `notification` (`id`);

--
-- Contraintes pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD CONSTRAINT `FK_2BB4FE2BA4AEAFEA` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprise` (`id`),
  ADD CONSTRAINT `FK_2BB4FE2BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `usersecteur`
--
ALTER TABLE `usersecteur`
  ADD CONSTRAINT `FK_1C24D9A19F7E4405` FOREIGN KEY (`secteur_id`) REFERENCES `secteur` (`id`),
  ADD CONSTRAINT `FK_1C24D9A1A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `FK_7CC7DA2CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `vue`
--
ALTER TABLE `vue`
  ADD CONSTRAINT `FK_C0ADD5947F72333D` FOREIGN KEY (`visiteur_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_C0ADD5948A2E6D45` FOREIGN KEY (`info_profil_id`) REFERENCES `infoprofil` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
