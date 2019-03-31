-- MySQL dump 10.13  Distrib 5.6.42, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: friends
-- ------------------------------------------------------
-- Server version	5.6.34-log

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
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,'Amsterdam','2018-12-03 18:24:13','2018-12-03 18:24:13'),(2,'Delft','2018-12-03 18:24:36','2018-12-03 18:24:36'),(3,'Rotterdam','2018-12-03 18:24:42','2018-12-03 18:24:42'),(4,'Utrecht','2018-12-03 18:24:51','2018-12-03 18:24:51'),(5,'','2018-12-03 19:31:16','2018-12-03 19:31:16');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `fk_comments_posts1_idx` (`post_id`),
  KEY `fk_comments_users1_idx` (`user_id`),
  CONSTRAINT `fk_comments_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (10,'123','2018-12-07 13:56:45','2018-12-07 13:56:45',14,17);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(100) DEFAULT NULL,
  `event_description` text,
  `event_datetime` datetime DEFAULT NULL,
  `event_location` varchar(255) DEFAULT NULL,
  `event_price` float DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `uodated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,' VALUABLE CONTACTS | FV DELFT','What do you want to achieve and who can help you with this? Yes, that’s how we’ll kick off the new year!\r\n\r\nWe are happy to share that Buccaneer Delft will be hosting this event. This former artillery warehouse accelerates and hosts multiple entrepreneurs in the energy and offshore industry. And energy is exactly what we want at the start of the 2019!\r\n\r\nWe are excited that Lana Velenjev will be kicking off our first event. She has initiated and co-founded various organizations, all with a close link to her mission to share and model the practice of self-fullness. During this evening, she will not only share her entrepreneurial journey(s) with us, like launching a Kickstarter campaign, but she will also guide us in a workshop. Yes, we’ll work on “Sparking the new year with the right intentions”. Lana will use the methodology that is covered in her book “The 90 day action planner”.\r\n\r\nBefore, in between, and after the keynote and workshop, there will be great moments to connect to each other and put our intentions into action! Drinks and small bites are included.\r\n\r\nInvitation for whom?\r\nAll ambitious women who want to grow (further) professionally and want to help others grow, are welcome. Whether you have a long track record at a large corporate, whether you are a student, an entrepreneur since long or just starting. Young, young of mind, experienced or less experienced. Men are most welcome ','2019-01-17 00:00:00','Buccaneer Delft Paardenmarkt 1, 2611 PA Delft',5,'2018-12-06 00:09:40','2018-12-06 00:09:40'),(2,'FEMALE VENTURES EINDHOVEN | WOMEN IN E-HEALTH','Female Ventures has landed in Eindhoven! We are delighted to invite you to our first event in Eindhoven that will give a platform to successful and inspiring women. The kick-off meeting will be dedicated to women working in E-Health. Our exceptional speakers will talk about their involvement and their own stories of female entrepreneurship in this emerging field. They will also share their challenges in their professional roles and more generally in the domain of E-Health. This event is hosted by EHV Innovation Café that takes place weekly on Thursday afternoons.','2019-02-14 00:00:00','Kazerne | EHV Innovation Café Paradijslaan 8, 5611KN Eindhoven',0,'2018-12-07 11:13:17','2018-12-07 11:13:17'),(3,' DIVERSITY: HOW TO MAKE IT WORK | FV ROTTERDAM','Research is continuing to build and show that diversity is essential in all situations to create an inclusive culture that allows for growth, empowerment and business effectiveness. How do we make sure this drive for diversity is being taken up at all levels and in all industries? We invite you to come and hear from two ladies who are paving the way for progress.','2019-04-11 00:00:00','CIC Rotterdam  Stationsplein 45, 4th Floor, Rotterdam',0,'2018-12-07 11:14:33','2018-12-07 11:14:33'),(4,' EMPOWER HEALTH | AMSTERDAM','We would like to invite you to our very exciting event ‘Empower Health: Healthy Living at Home and at Work’. \r\n\r\nDo you know what your body is trying to tell you? Is your body, mind and spirit in harmony? Is there a risk? And can it be prevented? In the next event, we will be discussing matters that will bring you closer to your “body language”. This session will uplift your mindset about healthcare and will be a true inspirational experience to anybody who wants to learn more about high impact, productivity and revolutionary technological solutions in the area of preventive healthcare in the area of healthy living at home and at work. \r\n\r\nWe are happy to announce that this time Circl will be hosting our event. During this evening, female speakers will inspire you with the road that led to their ventures. They will also share the challenges and opportunities they face in their businesses and share their view and expertise with us regarding this topic.','2019-04-17 00:00:00','Circl 1 B Gustav Mahlerplein, 1082 MS Amsterdam',0,'2018-12-07 13:30:33','2018-12-07 13:30:33');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_users_has_users_users4_idx` (`friend_id`),
  KEY `fk_users_has_users_users3_idx` (`user_id`),
  CONSTRAINT `fk_users_has_users_users3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_users_users4` FOREIGN KEY (`friend_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friends`
--

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` VALUES (5,12,11,'2018-12-04 00:03:07','2018-12-04 00:03:07'),(6,11,12,'2018-12-04 00:03:07','2018-12-04 00:03:07'),(7,14,12,'2018-12-05 11:23:32','2018-12-05 11:23:32'),(8,12,14,'2018-12-05 11:23:32','2018-12-05 11:23:32'),(9,10,13,'2018-12-05 11:47:00','2018-12-05 11:47:00'),(10,13,10,'2018-12-05 11:47:00','2018-12-05 11:47:00'),(11,10,12,'2018-12-05 11:47:40','2018-12-05 11:47:40'),(12,12,10,'2018-12-05 11:47:40','2018-12-05 11:47:40'),(13,8,14,'2018-12-05 14:11:24','2018-12-05 14:11:24'),(14,14,8,'2018-12-05 14:11:24','2018-12-05 14:11:24'),(15,13,9,'2018-12-07 14:05:07','2018-12-07 14:05:07'),(16,9,13,'2018-12-07 14:05:07','2018-12-07 14:05:07');
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `industries`
--

DROP TABLE IF EXISTS `industries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `industries` (
  `industry_id` int(11) NOT NULL AUTO_INCREMENT,
  `industry` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`industry_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `industries`
--

LOCK TABLES `industries` WRITE;
/*!40000 ALTER TABLE `industries` DISABLE KEYS */;
INSERT INTO `industries` VALUES (1,'Construction and Real Estate','2018-12-03 17:54:34','2018-12-03 17:54:34'),(2,'Communication and Media','2018-12-03 17:54:52','2018-12-03 17:54:52'),(3,'Consultancy','2018-12-03 17:55:03','2018-12-03 17:55:03'),(4,'Energy Companies','2018-12-03 17:55:20','2018-12-03 17:55:20'),(5,'Facility Management','2018-12-03 17:55:27','2018-12-03 17:55:27'),(6,'Fast Moving Consumer Goods','2018-12-03 17:55:41','2018-12-03 17:55:41'),(7,'Financial Services','2018-12-03 17:55:48','2018-12-03 17:55:48'),(8,'Financial Institutions','2018-12-03 17:55:56','2018-12-03 17:55:56'),(9,'Healthcare and welfare','2018-12-03 17:56:06','2018-12-03 17:56:06'),(10,'Trade and retail','2018-12-03 17:56:13','2018-12-03 17:56:13'),(11,'Catering industry','2018-12-03 17:56:32','2018-12-03 17:56:32'),(12,'Recreation','2018-12-03 17:56:40','2018-12-03 17:56:40'),(13,'Tourism and Culture','2018-12-03 17:56:48','2018-12-03 17:56:48'),(14,'Industry','2018-12-03 17:56:58','2018-12-03 17:56:58'),(15,'Information and Communication Technology (ICT) Intermediairs','2018-12-03 17:57:06','2018-12-03 17:57:06'),(16,'Legal Services','2018-12-03 17:57:19','2018-12-03 17:57:19'),(17,'Agriculture and horticulture','2018-12-03 17:57:29','2018-12-03 17:57:29'),(18,'Teaching and research','2018-12-03 17:57:36','2018-12-03 17:57:36'),(19,'Government and semi-government','2018-12-03 17:57:43','2018-12-03 17:57:43'),(20,'Technical services','2018-12-03 17:57:51','2018-12-03 17:57:51'),(21,'Telecommunication','2018-12-03 17:58:05','2018-12-03 17:58:05'),(22,'Transport and logistics','2018-12-03 17:58:10','2018-12-03 17:58:10'),(23,'Offshore','2018-12-03 17:58:17','2018-12-03 17:58:17'),(24,'Suistanability','2018-12-03 17:58:25','2018-12-03 17:58:25'),(25,'','2018-12-03 19:32:38','2018-12-03 19:32:38');
/*!40000 ALTER TABLE `industries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(100) DEFAULT NULL,
  `post` text,
  `public_private` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `fk_posts_users1_idx` (`user_id`),
  CONSTRAINT `fk_posts_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (4,'Saintelyon calling','...will you follow me?',NULL,'2018-12-03 22:12:12',NULL,8),(8,'Oranges','\r\nAn orange, whole and split\r\n\r\nOranges after peeling the skins\r\n\r\nOrange blossoms and oranges on tree\r\n\r\nOranges and orange juice\r\nThe orange is the fruit of the citrus species Citrus × sinensis in the family Rutaceae.[1] It is also called sweet orange, to distinguish it from the related Citrus × aurantium, referred to as bitter orange. The sweet orange reproduces asexually (apomixis through nucellar embryony); varieties of sweet orange arise through mutations.[2][3][4][5]\r\n\r\nThe orange is a hybrid between pomelo (Citrus maxima) and mandarin (Citrus reticulata).[2][6] The chloroplast genome, and therefore the maternal line, is that of pomelo.[7] The sweet orange has had its full genome sequenced.[2]\r\n\r\nSweet oranges were mentioned in Chinese literature in 314 BC.[2] As of 1987, orange trees were found to be the most cultivated fruit tree in the world.[8] Orange trees are widely grown in tropical and subtropical climates for their sweet fruit. The fruit of the orange tree can be eaten fresh, or processed for its juice or fragrant peel.[9] As of 2012, sweet oranges accounted for approximately 70% of citrus production.[10]\r\n\r\nIn 2014, 70.9 million tonnes of oranges were grown worldwide, with Brazil producing 24% of the world total followed by China and India.[11]',0,'2018-12-07 12:05:47',NULL,12),(9,'Cherry','A cherry is the fruit of many plants of the genus Prunus, and is a fleshy drupe (stone fruit).\r\nThe cherry fruits of commerce usually are obtained from cultivars of a limited number of species such as the sweet cherry (Prunus avium) and the sour cherry (Prunus cerasus). The name \'cherry\' also refers to the cherry tree and its wood, and is sometimes applied to almonds and visually similar flowering trees in the genus Prunus, as in \"ornamental cherry\" or \"cherry blossom\". Wild cherry may refer to any of the cherry species growing outside cultivation, although Prunus avium is often referred to specifically by the name \"wild cherry\" in the British Isles.',1,'2018-12-07 12:30:03',NULL,11),(14,'Chocolate','The seeds of the cacao tree have an intense bitter taste and must be fermented to develop the flavor. After fermentation, the beans are dried, cleaned, and roasted. The shell is removed to produce cacao nibs, which are then ground to cocoa mass, unadulterated chocolate in rough form. Once the cocoa mass is liquefied by heating, it is called chocolate liquor. The liquor also may be cooled and processed into its two components: cocoa solids and cocoa butter. Baking chocolate, also called bitter chocolate, contains cocoa solids and cocoa butter in varying proportions, without any added sugar. Much of the chocolate consumed today is in the form of sweet chocolate, a combination of cocoa solids, cocoa butter or added vegetable oils, and sugar. Milk chocolate is sweet chocolate that additionally contains milk powder or condensed milk. White chocolate contains cocoa butter, sugar, and milk, but no cocoa solids.\r\n\r\nChocolate has become one of the most popular food types and flavors in the world, and a vast number of foodstuffs involving chocolate have been created, particularly desserts including cakes, pudding, mousse, chocolate brownies, and chocolate chip cookies. Many candies are filled with or coated with sweetened chocolate, and bars of solid chocolate and candy bars coated in chocolate are eaten as snacks. Gifts of chocolate molded into different shapes (e.g., eggs, hearts, coins) have become traditional on certain Western holidays, such as Easter, Valentine\'s Day, and Hanukkah. Chocolate is also used in cold and hot beverages such as chocolate milk and hot chocolate and in some alcoholic drinks, such as creme de cacao.\r\n\r\nAlthough cocoa originated in the Americas, recent years have seen African nations assuming a leading role in producing cocoa. Since the 2000s, Western Africa produces almost two-thirds of the world\'s cocoa, with Ivory Coast growing almost half of that amount.',0,'2018-12-07 13:56:30',NULL,17);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requests` (
  `requests_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`requests_id`),
  KEY `fk_users_has_users_users2_idx` (`to_user`),
  KEY `fk_users_has_users_users1_idx` (`from_user`),
  CONSTRAINT `fk_users_has_users_users1` FOREIGN KEY (`from_user`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_users_users2` FOREIGN KEY (`to_user`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests`
--

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` VALUES (10,12,13,'2018-12-05 11:42:29','2018-12-05 11:42:29'),(12,12,9,'2018-12-05 11:42:49','2018-12-05 11:42:49'),(15,10,11,'2018-12-05 11:48:01','2018-12-05 11:48:01'),(16,10,9,'2018-12-05 12:01:03','2018-12-05 12:01:03'),(20,8,13,'2018-12-05 14:15:41','2018-12-05 14:15:41'),(21,11,8,'2018-12-05 14:16:11','2018-12-05 14:16:11'),(22,17,12,'2018-12-07 13:45:16','2018-12-07 13:45:16'),(23,9,14,'2018-12-07 14:01:28','2018-12-07 14:01:28');
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `user_admin` int(11) DEFAULT '0',
  `phone_number` varchar(45) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `biography` text,
  `student_professional` int(11) DEFAULT NULL,
  `work_place` varchar(255) DEFAULT NULL,
  `expertise` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `support_for` text,
  `support` text,
  `mentor_mentee` int(11) DEFAULT NULL,
  `recruitment_no_yes` int(11) DEFAULT NULL,
  `picture_url` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `city_id` int(11) DEFAULT NULL,
  `industry_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_users_cities_idx` (`city_id`),
  KEY `fk_users_industries1_idx` (`industry_id`),
  CONSTRAINT `fk_users_cities` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_industries1` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`industry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (8,'Alice','Johnson','alice.johnson@example.com','d11a754acc3ea6a29c2adde5fa0db152','f1422ff9e68d00a3ac5bbf9765b5d4fb02d1369d1221',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'assets/images/profile/default.jpg','2018-12-03 11:21:23','2018-12-03 11:21:23',NULL,NULL),(9,'Mary','Brown','mary.brown@example.com','df963944e0c95f1c9cc55b6961dc8ff7','369b8009ed6ad85950152cec89ae5ca15f65df224567',0,'','1985-07-10','https://www.linkedin.com','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',1,'','','','','',1,0,'assets/images/profile/default.jpg','2018-12-03 11:22:20','2018-12-03 11:22:20',5,4),(10,'Anna','Williams','anna.williams@example.com','0bf8a9a56e0ff4eabb55f0cda756c7da','83ac4dc1fffe53e7613c454ec14e4f89d3445903129e',0,'1234567','1996-02-07','','asdfdga',1,'','','','','',0,0,'assets/images/profile/default.jpg','2018-12-03 11:22:34','2018-12-03 11:22:34',5,25),(11,'Emma','Taylor','emma.taylor@example.com','1fc66f292d46aff62948834f0e40acc7','0011276287cddce015a4bb57dba4c0cc3ea4bf294750',0,'','0000-00-00','','',1,'CIC Rotterdam','','','','',0,NULL,'assets/images/profile/default.jpg','2018-12-03 11:22:48','2018-12-03 11:22:48',2,25),(12,'Mia','Clark','mia.clark@example.com','6ee3282a6de81dbc71253d8a906dedaf','ae3b47b8d420a61bade93d8437b6ce3cb26ca83953e4',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'assets/images/profile/default.jpg','2018-12-03 11:23:01','2018-12-03 11:23:01',NULL,NULL),(13,'Charlotte','Watson','charlotte.watson@example.com','1479f3905d1905c7345c0b67b3392d69','723ece6c63b71e04a4a57781916bb77c30e7ea674af5',0,'','0000-00-00','','',0,'','','','','',NULL,NULL,'assets/images/profile/default.jpg','2018-12-03 11:23:14','2018-12-03 11:23:14',2,25),(14,'Kate','Smith','kate.smith@example.com','3f457c091faab3fe9787856ab6575a8d','e05eb8d356c2a7103f43e0ad2e6e73f8d4ab0649cdd6',1,'','0000-00-00','','',NULL,'','','','','',NULL,NULL,'assets/images/profile/default.jpg','2018-12-03 11:30:46','2018-12-03 11:30:46',3,25),(16,'Admin','Admin','admin@example.com','981608d6d95b366f0443da1698c1a909','e3e2e48f850fb5396801bf2bbd0867aab71f80693f8b',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-12-05 23:06:55','2018-12-05 23:06:55',NULL,NULL),(17,'Melissa','Nelson','melissa.nelson@example.com','6ae707a7b00457d728f045dce34cf8b3','325ddb21f5b40a1ec4147764640acef8a8453d9e4bca',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-12-07 12:44:52','2018-12-07 12:44:52',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'friends'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-07 14:34:49
