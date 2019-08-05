-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  lun. 05 août 2019 à 21:11
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

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
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) DEFAULT NULL,
  `presentation` longtext COLLATE utf8mb4_unicode_ci,
  `taille_entreprise` int(11) DEFAULT NULL,
  `siege_social` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` longtext COLLATE utf8mb4_unicode_ci,
  `tel` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` longtext COLLATE utf8mb4_unicode_ci,
  `twitter` longtext COLLATE utf8mb4_unicode_ci,
  `linkedin` longtext COLLATE utf8mb4_unicode_ci,
  `date_fondation` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D19FA60E899029B` (`plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `plan_id`, `presentation`, `taille_entreprise`, `siege_social`, `logo`, `tel`, `website`, `twitter`, `linkedin`, `date_fondation`, `type`, `libelle`, `slug`, `slogan`) VALUES
(1, 3, NULL, NULL, 'Dakar, Sénégal', NULL, '775919686', NULL, NULL, NULL, NULL, 'Travailleur indépendant ou profession libérale', 'Innov Digital', 'innov-digital', NULL),
(2, 2, NULL, NULL, 'Dakar, Sénégal', NULL, '778909889', NULL, NULL, NULL, NULL, 'Travailleur indépendant ou profession libérale', 'Sonatel', 'sonatel', NULL);

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
  `entreprise` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intitule_poste` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_current` tinyint(1) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `competences` json DEFAULT NULL,
  `mois_de_debut` int(11) NOT NULL,
  `annee_de_debut` int(11) NOT NULL,
  `mois_de_fin` int(11) DEFAULT NULL,
  `annee_de_fin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_590C103A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`id`, `user_id`, `entreprise`, `intitule_poste`, `lieu`, `is_current`, `description`, `competences`, `mois_de_debut`, `annee_de_debut`, `mois_de_fin`, `annee_de_fin`) VALUES
(1, 2, 'Sonatel', 'Développeur web & mobile', 'Dakar, Sénégal', 1, NULL, '[\"développeur php\", \"développeur javascript\"]', 7, 2018, 12, 2019),
(2, 2, 'Kocc Digit\'All', 'Consultant', 'Dakar, Sénégal', 1, 'Je participe au différent projet en même temps je suis tech-lead sur le projet SaffHajj', '[\"développeur java\"]', 12, 2018, NULL, NULL),
(3, 4, 'Innov Digital', 'Digital Manager', 'Dakar, Sénégal', 1, 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices', '[\"Team building\", \"ekjdfjdkd\", \"djdkndf\"]', 1, 2018, NULL, NULL),
(4, 4, 'Kocc Digit\'All', 'Consultant', 'Dakar, Sénégal', 0, 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices', '[\"\"]', 3, 2011, 8, 2019),
(5, 2, 'Kocc Digit\'All TF', 'Consultant', 'Dakar, Sénégal', 0, 'UDUS DSNBCX  sfkdfndf vgkgndf dfkdfjfds dfkdsjdkfjdkfj dfkdnfkj', '[\"js\", \"javas\", \"dnd\"]', 7, 2019, 12, 2019);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `diplome` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ecole` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `mois_de_debut` int(11) DEFAULT NULL,
  `annee_de_debut` int(11) DEFAULT NULL,
  `mois_de_fin` int(11) DEFAULT NULL,
  `annee_de_fin` int(11) DEFAULT NULL,
  `domaine_etude` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_404021BFA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `user_id`, `diplome`, `ecole`, `description`, `mois_de_debut`, `annee_de_debut`, `mois_de_fin`, `annee_de_fin`, `domaine_etude`) VALUES
(1, 2, 'Licence 1', 'Université Alioune Diop de Bambey', 'J\'ai eu une attestation provisoire', 7, 2015, 1, 2016, 'Mathématique Physique Chimie et Informatique'),
(2, 4, 'licence', 'Université Alioune Diop de Bambey', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices', 1, 2009, 2, 2019, 'Mathématique Physique Chimie et Informatique'),
(3, 2, 'Licence 2', 'Université Alioune Diop de Bambey', 'J\'ai pas cartouché en licence 2', 10, 2016, 7, 2017, 'Mathématique Physique Chimie et Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `infoprofil`
--

DROP TABLE IF EXISTS `infoprofil`;
CREATE TABLE IF NOT EXISTS `infoprofil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `titre_profil` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `situation` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `competences` json NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `website` longtext COLLATE utf8mb4_unicode_ci,
  `twitter` longtext COLLATE utf8mb4_unicode_ci,
  `linkedin` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_66B79BFEA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `infoprofil`
--

INSERT INTO `infoprofil` (`id`, `user_id`, `titre_profil`, `situation`, `competences`, `description`, `website`, `twitter`, `linkedin`) VALUES
(1, 2, 'Developpeur full-stack', 'À l’écoute d’opportunités', '[\"Développeur web\", \"Développeur mobile\"]', 'Passionné par l\'innovation et les nouvelles technologies, je suis toujours prêt à relever de nouveaux défis et challenges ! \r\n\r\nMon goût prononcé pour les applications web, mobiles, IOT (Internet Of Things) et l\'IA me permet d\'élargir mes compétences et d’interagir avec différentes équipes, et partenaires de notre écosystème.', NULL, NULL, NULL),
(2, 4, 'Markting Digital', 'À l’écoute d’opportunités', '[\"Google Ads\", \"Traitement de données\", \"Veille\"]', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclu', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `libelle` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9357758EA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`id`, `user_id`, `libelle`, `niveau`) VALUES
(1, 2, 'Français', 'Avancé'),
(2, 4, 'Français', 'Avancé'),
(3, 2, 'Anglais', 'Maîtrise');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190714112415', '2019-07-14 11:24:23'),
('20190714114258', '2019-07-14 11:43:04'),
('20190714122016', '2019-07-14 12:20:21'),
('20190714135134', '2019-07-14 13:51:38'),
('20190714140854', '2019-07-14 14:08:57'),
('20190714141142', '2019-07-14 14:11:45'),
('20190714152513', '2019-07-14 15:25:16'),
('20190714152915', '2019-07-14 15:29:18'),
('20190718172812', '2019-07-18 17:28:50'),
('20190720140907', '2019-07-20 14:26:17'),
('20190720144249', '2019-07-20 14:42:55'),
('20190720145135', '2019-07-20 14:51:40'),
('20190721080808', '2019-07-21 08:08:42'),
('20190721081111', '2019-07-21 08:11:15'),
('20190727093746', '2019-07-27 09:37:56'),
('20190727095434', '2019-07-27 09:54:38');

-- --------------------------------------------------------

--
-- Structure de la table `notifiable_entity`
--

DROP TABLE IF EXISTS `notifiable_entity`;
CREATE TABLE IF NOT EXISTS `notifiable_entity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notifiable_entity`
--

INSERT INTO `notifiable_entity` (`id`, `identifier`, `class`) VALUES
(1, '2', 'App\\Entity\\User');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notifiable_notification`
--

INSERT INTO `notifiable_notification` (`id`, `notification_id`, `notifiable_entity_id`, `seen`) VALUES
(10, 10, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `subject` varchar(4000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id`, `date`, `subject`, `message`, `link`) VALUES
(10, '2019-07-27 10:14:18', 'vu', '{\"user\":3,\"image\":\"default.png\",\"fullname\":\"Moussa Traor\\u00e9\"}', '/fr/entreprise/profil/innov-digital/ousmanendiaye352@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

DROP TABLE IF EXISTS `personnes`;
CREATE TABLE IF NOT EXISTS `personnes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `entreprise_id` int(11) DEFAULT NULL,
  `poste` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2BB4FE2BA76ED395` (`user_id`),
  KEY `IDX_2BB4FE2BA4AEAFEA` (`entreprise_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plan`
--

DROP TABLE IF EXISTS `plan`;
CREATE TABLE IF NOT EXISTS `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `duree` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offres` json NOT NULL,
  `par_defaut` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plan`
--

INSERT INTO `plan` (`id`, `libelle`, `prix`, `duree`, `offres`, `par_defaut`) VALUES
(1, 'free trial', 0, 'Mois', '[\"20 CV Vidéos\", \"2 secteurs\", \"0 publicité\", \"0 Offres d\'emplois\"]', NULL),
(2, 'starter', 100000, 'Mois', '[\"CV Vidéos illimités\", \"6 secteurs\", \"3 publicités\", \"Offres d\'emplois illimitées\"]', 1),
(3, 'premium', 300000, 'Mois', '[\"CV Vidéos illimités\", \"Secteurs illimités\", \"12 publicités\", \"Offres d\'emplois illimitées\"]', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
CREATE TABLE IF NOT EXISTS `secteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `sexe` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `pays` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `created_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci,
  `updated_at` datetime NOT NULL,
  `entreprise_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  UNIQUE KEY `UNIQ_8D93D649A4AEAFEA` (`entreprise_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `adresse`, `tel`, `is_visible`, `birthday`, `sexe`, `ville`, `code_postal`, `pays`, `email`, `password`, `roles`, `created_at`, `is_active`, `prenom`, `nom`, `image`, `updated_at`, `entreprise_id`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'alioune@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$SUc0TmhSeDBSQjFzZkZLOQ$pSrlU2BonQLRL6KfBPBgeGpnFhVT7F/m11WA7lgVV18', '[\"ROLE_PROFESSIONNEL\"]', '2019-06-24 09:56:29', 1, 'Alioune', 'Ndiaye', NULL, '2019-07-19 20:31:36', NULL),
(2, 'Colobane, Park Amazout', '77 591 96 86', NULL, '1994-09-18 00:00:00', 'Homme', 'Dakar', NULL, NULL, 'ousmanendiaye352@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$NEZXSUNIN1RKek12NnZFSA$/1AJqJ3aaipxoB+4+RQF4XQOfyUiyZOFdkKMCUJAMLI', '[\"ROLE_PROFESSIONNEL\"]', '2019-06-27 18:09:42', 1, 'Ousmane', 'Ndiaye', NULL, '2019-07-19 20:31:36', NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'moussa@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$cDNCR1FnNjdVYnBlRVh1ag$YE2NUV0J4TZvdBW3vdwGihiAsXgubexFDX7GqtATBHA', '[\"ROLE_ENTREPRISE\"]', '2019-06-28 19:49:10', 1, 'Moussa', 'Traoré', NULL, '2019-07-19 20:31:36', 1),
(4, 'Colobane, Park Amazout', '77 587 76 76', NULL, '1994-08-18 00:00:00', 'Homme', 'Dakar', NULL, NULL, 'moussadiop@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$ekhtLkIzL0ZZTW43a05mWQ$8xopOeneNascX3H7vXSfK97HLbhh2cXN0lwDpPBWMWE', '[\"ROLE_PROFESSIONNEL\"]', '2019-07-01 17:13:56', 1, 'Moussa', 'Diop', NULL, '2019-07-23 00:00:00', NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'malickndiaye@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$OURTRy9hcUdoUUYwcnI4Tw$tfigIt/JxL1pC85qT83I6bVjbYJ92s4TxVMYpaZ2uRU', '[\"ROLE_ENTREPRISE\"]', '2019-07-01 17:41:43', 1, 'Malick', 'Ndiaye', NULL, '2019-07-19 20:31:36', 2),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mounta14@hotmail.com', '$argon2i$v=19$m=1024,t=2,p=2$aDNXeFRUeWViNC5CeEVINQ$RtZT49f29OfQTsaXc5/bSt1JaXUG+9Ghr9/8veje29o', '[\"ROLE_PROFESSIONNEL\"]', '2019-07-09 16:26:04', 1, 'Mouhamadou Mourtada', 'LO', NULL, '2019-07-19 20:31:36', NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'idyniane1@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$ZDJwb2hiMmFyc1lobUhiYQ$WZjqR19x41Cg+88D3eXJbCvWsABeDG/2lBB/Er1MkFY', '[\"ROLE_PROFESSIONNEL\"]', '2019-07-09 18:14:13', 1, 'Idrissa', 'NIANE', NULL, '2019-07-19 20:31:36', NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tackosow96@yahoo.fr', '$argon2i$v=19$m=1024,t=2,p=2$elVKYWR2d043bU12RjRacQ$5xugRfkh4j/jck2nhx1pIvemYqcLtGvBsiRWE0CJP/M', '[\"ROLE_PROFESSIONNEL\"]', '2019-07-09 23:44:20', 1, 'Tacko', 'So', NULL, '2019-07-19 20:31:36', NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vieuxsarr@hotmail.fr', '$argon2i$v=19$m=1024,t=2,p=2$WFRBTWtldlZxazVpcGdlRw$Yq9+QZ58FGL8UsIaEmbgNuhk1sodG7z0l6EdRm2rF4s', '[\"ROLE_PROFESSIONNEL\"]', '2019-07-10 12:30:48', 1, 'Jean betel', 'Sarr', NULL, '2019-07-19 20:31:36', NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mcsouare85@yahoo.fr', '$argon2i$v=19$m=1024,t=2,p=2$ZUZVOG90VnRZSHJhRGo1Tw$7zka1yyEpgTH8HuXs2eqynf1nDNwEzv4Q8nXQFxYPw0', '[\"ROLE_PROFESSIONNEL\"]', '2019-07-10 14:05:49', 1, 'Mamadou lamine', 'Souare', NULL, '2019-07-19 20:31:36', NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'astoutateil@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$RGtxNTJ0Y3hmaE80MEh3aw$9A3B9cfng9QIWHNRZG/DnK8A8XdWITHr95aGB5Mm6TA', '[\"ROLE_PROFESSIONNEL\"]', '2019-07-10 14:10:28', 1, 'Astou', 'Tall', NULL, '2019-07-19 20:31:36', NULL),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ouleyelam17@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$QlpQWlhwc1c5dnR1clhwag$zoOM7s0RnPCBK0AySwuKoQEeRTXKbfkTLGAoxYdrbEw', '[\"ROLE_PROFESSIONNEL\"]', '2019-07-11 14:34:42', 1, 'Ouleye', 'Lam', NULL, '2019-07-19 20:31:36', NULL),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'seckaissata2015@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$eFN3bS5tdzJSTFdadm12WA$uMVk6Bjx7hadlHRDN1W7Dx8Qf5wgn85WHewVPFwNf08', '[\"ROLE_PROFESSIONNEL\"]', '2019-07-12 18:40:53', 1, 'Aissata', 'SECK', NULL, '2019-07-19 20:31:36', NULL),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'diemesouley@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$Z2N1V0JRVG00dGVpQms1TA$48OPp+5K7N7Js/m2/6a7c9SLfyEDywkj64iQtdPIFCw', '[\"ROLE_PROFESSIONNEL\"]', '2019-07-13 11:58:39', 1, 'Souleymane', 'DIEME', NULL, '2019-07-19 20:31:36', NULL),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gallassmb10@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$bGpoRW15UjkvQmtpMkJjNw$S1iMDFZuCnZN6+Ohr3XRZog+TxavmGhYOlRQByy2ZI0', '[\"ROLE_PROFESSIONNEL\"]', '2019-07-13 15:40:48', 1, 'Fallou', 'Mbengue', NULL, '2019-07-19 20:31:36', NULL),
(23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'serignemamour@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$Z0JlaVJobC9zZ1J4Rm81Sw$ZkExXXK2y8qDxcgrod1UoE4N+lAFNG13SEQ8Rzx47Sw', '[\"ROLE_PROFESSIONNEL\"]', '2019-07-14 18:13:29', 0, 'Serigne Mamour', 'Mbaye', NULL, '2019-07-19 20:31:36', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `usersecteur`
--

INSERT INTO `usersecteur` (`id`, `secteur_id`, `user_id`) VALUES
(1, 8, 2),
(2, 21, 2),
(4, 28, 2),
(5, 29, 2),
(6, 8, 4);

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `lien` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_current` tinyint(1) NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci,
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vue`
--

INSERT INTO `vue` (`id`, `info_profil_id`, `visiteur_id`, `date_vue`, `note`) VALUES
(7, 1, 3, '2019-07-02 19:13:56', NULL),
(8, 2, 3, '2019-07-04 18:41:04', NULL),
(9, 1, 3, '2019-07-19 20:21:20', NULL),
(11, 1, 3, '2019-07-27 10:14:18', NULL);

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
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649A4AEAFEA` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprise` (`id`);

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
