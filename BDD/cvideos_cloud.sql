-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: CVIDEOS
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experience` (
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
  KEY `IDX_590C103A76ED395` (`user_id`),
  CONSTRAINT `FK_590C103A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experience`
--

LOCK TABLES `experience` WRITE;
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
INSERT INTO `experience` VALUES (1,2,'Sonatel','Développeur web & mobile','Dakar, Sénégal',1,NULL,'[\"développeur php\", \"développeur javascript\"]',7,2018,12,2019),(2,2,'Kocc Digit\'All','Consultant','Dakar, Sénégal',1,'Je participe au différent projet en même temps je suis tech-lead sur le projet SaffHajj','[\"développeur java\"]',12,2018,NULL,NULL),(3,4,'Innov Digital','Digital Manager','Dakar, Sénégal',1,'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices','[\"Team building\", \"ekjdfjdkd\", \"djdkndf\"]',1,2018,NULL,NULL),(4,4,'Kocc Digit\'All','Consultant','Dakar, Sénégal',0,'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices','[\"\"]',3,2011,8,2019),(5,2,'Kocc Digit\'All TF','Consultant','Dakar, Sénégal',0,'UDUS DSNBCX  sfkdfndf vgkgndf dfkdfjfds dfkdsjdkfjdkfj dfkdnfkj','[\"js\", \"javas\", \"dnd\"]',7,2019,12,2019);
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formation`
--

DROP TABLE IF EXISTS `formation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formation` (
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
  KEY `IDX_404021BFA76ED395` (`user_id`),
  CONSTRAINT `FK_404021BFA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formation`
--

LOCK TABLES `formation` WRITE;
/*!40000 ALTER TABLE `formation` DISABLE KEYS */;
INSERT INTO `formation` VALUES (1,2,'Licence 1','Université Alioune Diop de Bambey','J\'ai eu une attestation provisoire',7,2015,1,2016,'Mathématique Physique Chimie et Informatique'),(2,4,'licence','Université Alioune Diop de Bambey','Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices',1,2009,2,2019,'Mathématique Physique Chimie et Informatique'),(3,2,'Licence 2','Université Alioune Diop de Bambey','J\'ai pas cartouché en licence 2',10,2016,7,2017,'Mathématique Physique Chimie et Informatique');
/*!40000 ALTER TABLE `formation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infoprofil`
--

DROP TABLE IF EXISTS `infoprofil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infoprofil` (
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
  UNIQUE KEY `UNIQ_66B79BFEA76ED395` (`user_id`),
  CONSTRAINT `FK_66B79BFEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infoprofil`
--

LOCK TABLES `infoprofil` WRITE;
/*!40000 ALTER TABLE `infoprofil` DISABLE KEYS */;
INSERT INTO `infoprofil` VALUES (1,2,'Developpeur full-stack','À l’écoute d’opportunités','[\"Développeur web\", \"Développeur mobile\"]','Passionné par l\'innovation et les nouvelles technologies, je suis toujours prêt à relever de nouveaux défis et challenges ! \r\n\r\nMon goût prononcé pour les applications web, mobiles, IOT (Internet Of Things) et l\'IA me permet d\'élargir mes compétences et d’interagir avec différentes équipes, et partenaires de notre écosystème.',NULL,NULL,NULL),(2,4,'Markting Digital','À l’écoute d’opportunités','[\"Google Ads\", \"Traitement de données\", \"Veille\"]','Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclu',NULL,NULL,NULL);
/*!40000 ALTER TABLE `infoprofil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `langue`
--

DROP TABLE IF EXISTS `langue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `langue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `libelle` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9357758EA76ED395` (`user_id`),
  CONSTRAINT `FK_9357758EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `langue`
--

LOCK TABLES `langue` WRITE;
/*!40000 ALTER TABLE `langue` DISABLE KEYS */;
INSERT INTO `langue` VALUES (1,2,'Français','Avancé'),(2,4,'Français','Avancé'),(3,2,'Anglais','Maîtrise');
/*!40000 ALTER TABLE `langue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20190626222105','2019-06-26 22:21:13'),('20190627123426','2019-06-27 12:34:56'),('20190627180741','2019-06-27 18:07:49'),('20190628063922','2019-06-28 06:39:35'),('20190629022730','2019-06-29 02:27:42'),('20190630060845','2019-06-30 06:08:56'),('20190702183855','2019-07-02 18:39:07'),('20190702191053','2019-07-02 19:11:01');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secteur`
--

LOCK TABLES `secteur` WRITE;
/*!40000 ALTER TABLE `secteur` DISABLE KEYS */;
INSERT INTO `secteur` VALUES (1,'Agriculture',NULL,'agriculture.jpg'),(2,'Animaux',NULL,'animaux.jpg'),(3,'Artisanat - Métiers d\'art','','Artisanat.jpg'),(4,'Bâtiment - Travaux publics','','batiment.jpg'),(5,'Commerce - Immobilier','','commerce.jpg'),(6,'Culture - Spectacle','','culture.jpg'),(7,'Droit','','droit.jpg'),(8,'Electronique - Informatique','','electronique_informatique.jpg'),(9,'Environnement - Nature - Nettoyage','','environnement.jpg'),(10,'Hôtellerie - Restauration - Tourisme','','hotellerie.jpg'),(11,'Industrie - Matériaux','','industrie.jpg'),(12,'Mécanique - Maintenance','','mecanique.jpg'),(13,'Santé','','sante.jpg'),(14,'Secrétariat - Accueil','','secretariat.jpg'),(15,'Soins - Esthétique - Coiffure','','soins.jpg'),(16,'Transport - Logistique','','transport.jpg'),(17,'Agroalimentaire - Alimentation','','alimentation.jpg'),(18,'Architecture - Aménagement intérieur','','architecture.jpg'),(19,'Banque - Finance - Assurance','','banque.jpg'),(20,'Biologie - Chimie','','biologie.jpeg'),(21,'Communication - Information','','communication.jpg'),(22,'Défense - Sécurité - Secours','','defense.jpg'),(23,'Edition - Imprimerie - Livre','','edition.jpg'),(24,'Enseignement - Formation','','enseignement.jpg'),(25,'Gestion - Audit - Ressources humaines','','gestion.jpg'),(26,'Humanitaire','','humanitaire.jpeg'),(27,'Lettres - Sciences humaines','','lettres.jpg'),(28,'Numérique - Multimédia - Audiovisuel','','numerique.jpg'),(29,'Sciences - Maths - Physique','','sciences.jpeg'),(30,'Social - Services à la personne','','social.jpg'),(31,'Sport - Animation','','sport.jpg');
/*!40000 ALTER TABLE `secteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'alioune@gmail.com','$argon2i$v=19$m=1024,t=2,p=2$SUc0TmhSeDBSQjFzZkZLOQ$pSrlU2BonQLRL6KfBPBgeGpnFhVT7F/m11WA7lgVV18','[\"ROLE_PROFESSIONNEL\"]','2019-06-24 09:56:29',1,'Alioune','Ndiaye',NULL),(2,'Colobane, Park Amazout','77 591 96 86',NULL,'1994-09-18 00:00:00','Homme','Dakar',NULL,NULL,'ousmanendiaye352@gmail.com','$argon2i$v=19$m=1024,t=2,p=2$NEZXSUNIN1RKek12NnZFSA$/1AJqJ3aaipxoB+4+RQF4XQOfyUiyZOFdkKMCUJAMLI','[\"ROLE_PROFESSIONNEL\"]','2019-06-27 18:09:42',1,'Ousmane','Ndiaye',NULL),(3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'moussa@gmail.com','$argon2i$v=19$m=1024,t=2,p=2$cDNCR1FnNjdVYnBlRVh1ag$YE2NUV0J4TZvdBW3vdwGihiAsXgubexFDX7GqtATBHA','[\"ROLE_ENTREPRISE\"]','2019-06-28 19:49:10',1,'Moussa','Traoré',NULL),(4,'Colobane, Park Amazout','77 587 76 76',NULL,'1994-08-18 00:00:00','Homme','Dakar',NULL,NULL,'moussadiop@gmail.com','$argon2i$v=19$m=1024,t=2,p=2$ekhtLkIzL0ZZTW43a05mWQ$8xopOeneNascX3H7vXSfK97HLbhh2cXN0lwDpPBWMWE','[\"ROLE_PROFESSIONNEL\"]','2019-07-01 17:13:56',1,'Moussa','Diop',NULL),(5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'malickndiaye@gmail.com','$argon2i$v=19$m=1024,t=2,p=2$OURTRy9hcUdoUUYwcnI4Tw$tfigIt/JxL1pC85qT83I6bVjbYJ92s4TxVMYpaZ2uRU','[\"ROLE_ENTREPRISE\"]','2019-07-01 17:41:43',1,'Malick','Ndiaye',NULL),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'mounta14@hotmail.com','$argon2i$v=19$m=1024,t=2,p=2$aDNXeFRUeWViNC5CeEVINQ$RtZT49f29OfQTsaXc5/bSt1JaXUG+9Ghr9/8veje29o','[\"ROLE_PROFESSIONNEL\"]','2019-07-09 16:26:04',1,'Mouhamadou Mourtada','LO',NULL),(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'idyniane1@gmail.com','$argon2i$v=19$m=1024,t=2,p=2$ZDJwb2hiMmFyc1lobUhiYQ$WZjqR19x41Cg+88D3eXJbCvWsABeDG/2lBB/Er1MkFY','[\"ROLE_PROFESSIONNEL\"]','2019-07-09 18:14:13',1,'Idrissa','NIANE',NULL),(8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'tackosow96@yahoo.fr','$argon2i$v=19$m=1024,t=2,p=2$elVKYWR2d043bU12RjRacQ$5xugRfkh4j/jck2nhx1pIvemYqcLtGvBsiRWE0CJP/M','[\"ROLE_PROFESSIONNEL\"]','2019-07-09 23:44:20',1,'Tacko','So',NULL),(9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'vieuxsarr@hotmail.fr','$argon2i$v=19$m=1024,t=2,p=2$WFRBTWtldlZxazVpcGdlRw$Yq9+QZ58FGL8UsIaEmbgNuhk1sodG7z0l6EdRm2rF4s','[\"ROLE_PROFESSIONNEL\"]','2019-07-10 12:30:48',1,'Jean betel','Sarr',NULL),(10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'mcsouare85@yahoo.fr','$argon2i$v=19$m=1024,t=2,p=2$ZUZVOG90VnRZSHJhRGo1Tw$7zka1yyEpgTH8HuXs2eqynf1nDNwEzv4Q8nXQFxYPw0','[\"ROLE_PROFESSIONNEL\"]','2019-07-10 14:05:49',1,'Mamadou lamine','Souare',NULL),(11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'astoutateil@gmail.com','$argon2i$v=19$m=1024,t=2,p=2$RGtxNTJ0Y3hmaE80MEh3aw$9A3B9cfng9QIWHNRZG/DnK8A8XdWITHr95aGB5Mm6TA','[\"ROLE_PROFESSIONNEL\"]','2019-07-10 14:10:28',1,'Astou','Tall',NULL),(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ouleyelam17@gmail.com','$argon2i$v=19$m=1024,t=2,p=2$QlpQWlhwc1c5dnR1clhwag$zoOM7s0RnPCBK0AySwuKoQEeRTXKbfkTLGAoxYdrbEw','[\"ROLE_PROFESSIONNEL\"]','2019-07-11 14:34:42',1,'Ouleye','Lam',NULL),(13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'seckaissata2015@gmail.com','$argon2i$v=19$m=1024,t=2,p=2$eFN3bS5tdzJSTFdadm12WA$uMVk6Bjx7hadlHRDN1W7Dx8Qf5wgn85WHewVPFwNf08','[\"ROLE_PROFESSIONNEL\"]','2019-07-12 18:40:53',1,'Aissata','SECK',NULL),(14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'diemesouley@gmail.com','$argon2i$v=19$m=1024,t=2,p=2$Z2N1V0JRVG00dGVpQms1TA$48OPp+5K7N7Js/m2/6a7c9SLfyEDywkj64iQtdPIFCw','[\"ROLE_PROFESSIONNEL\"]','2019-07-13 11:58:39',1,'Souleymane','DIEME',NULL),(15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'gallassmb10@gmail.com','$argon2i$v=19$m=1024,t=2,p=2$bGpoRW15UjkvQmtpMkJjNw$S1iMDFZuCnZN6+Ohr3XRZog+TxavmGhYOlRQByy2ZI0','[\"ROLE_PROFESSIONNEL\"]','2019-07-13 15:40:48',1,'Fallou','Mbengue',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usersecteur`
--

DROP TABLE IF EXISTS `usersecteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usersecteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secteur_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1C24D9A19F7E4405` (`secteur_id`),
  KEY `IDX_1C24D9A1A76ED395` (`user_id`),
  CONSTRAINT `FK_1C24D9A19F7E4405` FOREIGN KEY (`secteur_id`) REFERENCES `secteur` (`id`),
  CONSTRAINT `FK_1C24D9A1A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usersecteur`
--

LOCK TABLES `usersecteur` WRITE;
/*!40000 ALTER TABLE `usersecteur` DISABLE KEYS */;
INSERT INTO `usersecteur` VALUES (1,8,2),(2,21,2),(4,28,2),(5,29,2),(6,8,4);
/*!40000 ALTER TABLE `usersecteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `lien` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `is_current` tinyint(1) NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_7CC7DA2CA76ED395` (`user_id`),
  CONSTRAINT `FK_7CC7DA2CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vue`
--

DROP TABLE IF EXISTS `vue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_profil_id` int(11) DEFAULT NULL,
  `visiteur_id` int(11) DEFAULT NULL,
  `date_vue` datetime NOT NULL,
  `note` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C0ADD5948A2E6D45` (`info_profil_id`),
  KEY `IDX_C0ADD5947F72333D` (`visiteur_id`),
  CONSTRAINT `FK_C0ADD5947F72333D` FOREIGN KEY (`visiteur_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_C0ADD5948A2E6D45` FOREIGN KEY (`info_profil_id`) REFERENCES `infoprofil` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vue`
--

LOCK TABLES `vue` WRITE;
/*!40000 ALTER TABLE `vue` DISABLE KEYS */;
INSERT INTO `vue` VALUES (7,1,3,'2019-07-02 19:13:56',NULL),(8,2,3,'2019-07-04 18:41:04',NULL);
/*!40000 ALTER TABLE `vue` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-14  0:27:38
