-- MySQL dump 10.11
--
-- Host: n1grid50mysql31.secureserver.net    Database: goldendragon
-- ------------------------------------------------------
-- Server version	5.0.91-log

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
-- Table structure for table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
CREATE TABLE `delivery` (
  `id_delivery` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `price` text NOT NULL,
  `takeaway` text NOT NULL,
  PRIMARY KEY  (`id_delivery`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

LOCK TABLES `delivery` WRITE;
/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;
INSERT INTO `delivery` VALUES (39,'Then &pound;1.00 per extra mile there after.',' ','penzance'),(38,'Other Areas up to 3 Miles','&pound;2.50','penzance'),(37,'ALL - TR18 2,3,4,5','&pound;1.50','penzance');
/*!40000 ALTER TABLE `delivery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dishes`
--

DROP TABLE IF EXISTS `dishes`;
CREATE TABLE `dishes` (
  `id_dish` int(11) NOT NULL auto_increment,
  `sort_number` text NOT NULL,
  `name` text NOT NULL,
  `price` text NOT NULL,
  `id_menu` text,
  PRIMARY KEY  (`id_dish`)
) ENGINE=MyISAM AUTO_INCREMENT=199 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishes`
--

LOCK TABLES `dishes` WRITE;
/*!40000 ALTER TABLE `dishes` DISABLE KEYS */;
INSERT INTO `dishes` VALUES (1,'1','Chicken & Sweetcorn Soup','2.20','1'),(2,'2','Chicken & Mushroom Soup','2.20','1'),(3,'3','Crabmeat & Sweetcorn Soup','2.20','1'),(4,'4','Chicken Noodle Soup','2.20','1'),(5,'5','Chinese Pancake Roll','2.20','1'),(6,'6','Barbecue Spare Ribs','4.80','1'),(7,'7','Aromatic Crispy Duck (Quarter) (Server with Pancake, Hoi Sin Sauce & Salad)','6.90','1'),(8,'8','Mixed Dim Sum Selection (8)','3.80','1'),(9,'9','Hot & Sour Soup','2.50','1'),(10,'10','Sesame Prawn Toast','2.80','1'),(11,'11','Spicy Chicken Triangles (3)','2.80','1'),(12,'11a','Veg Pancake Rolls (2)','2.80','1'),(13,'11b','Crispy Won Ton','3.50','1'),(14,'11c','Skewered Satay Chicken','3.50','1'),(15,'12','Chicken on Fried Rice with Barbecue Sauce','3.90','2'),(16,'13','Chicken on Beansprouts with Barbecue Sauce','3.90','2'),(17,'14','Chicken with Sweetcorn','3.90','2'),(18,'15','Chicken with Babycorn','3.90','2'),(19,'16','Chicken with Mushroom','3.90','2'),(20,'17','Chicken with Straw Mushroom & Oyster Sauce','3.90','2'),(21,'18','Chicken with Pineapple','3.90','2'),(22,'19','Chicken with Ginger & Spring Onion','3.90','2'),(23,'20','Chicken with Cashew Nuts & Green Pepper','3.90','2'),(24,'21','Chicken Bamboo Shoots & Water Chestnuts','3.90','2'),(25,'22','Chicken with Tomato','3.90','2'),(26,'23','Chicken with Broccoli Spears & Oyster Sauce','3.90','2'),(27,'24','Chicken with Green Pepper & Blackbean Sauce','3.90','2'),(28,'25','Chicken with Vegetables & Szechuan Sauce','3.90','2'),(29,'26','Chicken Chop Suey','3.90','2'),(30,'27','Chicken in Satay Sauce','3.90','2'),(31,'28','Chicken in Lemon Sauce','3.90','2'),(51,'29','Beef on Beansprouts with Oyster Sauce','3.90','4'),(34,'28a','Crispy Chilli Chicken','3.90','2'),(35,'12a','Roast Pork on Fried Rice with Barbecue Sauce','3.90','3'),(36,'13a','Roast Pork on Beansprouts with Barbecue Sauce','3.90','3'),(37,'14a','Roast with Pork with Sweetcorn','3.90','3'),(38,'15a','Roast Pork with Babycorn','3.90','3'),(39,'16a','Roast Pork with Mushroom','3.90','3'),(40,'17a','Roast Pork with Straw Mushroom & Oyster Sauce','3.90','3'),(41,'18a','Roast Pork with Pineapple','3.90','3'),(42,'19a','Roast Pork with Ginger & Sprint Onion','3.90','3'),(43,'20a','Roast Pork with Cashew Nuts & Green Pepper','3.90','3'),(44,'21a','Roast Pork with Bamboo Shoots & Water Chestnuts','3.90','3'),(45,'22a','Roast Pork with Tomato','3.90','3'),(46,'23a','Roast Pork with Broccoli Spears & Oyster Sauce','3.90','3'),(47,'24a','Roast Pork with Green Pepper & Blackbean Sauce','3.90','3'),(48,'25a','Roast Pork with Vegetables & Szechuan Sauce','3.90','3'),(49,'26a','Roast Pork Chop Suey','3.90','3'),(50,'27a','Roast Pork in Satay Sauce','3.90','3'),(52,'30','Beef with Sweetcorn','3.90','4'),(53,'31','Beef with Babycorn','3.90','4'),(54,'32','Beef with Mushroom','3.90','4'),(55,'33','Beef with Straw Mushroom & Oyster Sauce','3.90','4'),(56,'34','Beef with Pineapple','3.90','4'),(57,'35','Beef with Ginger & Spring Onion','3.90','4'),(58,'36','Beef with Cashew Nuts & Green Pepper','3.90','4'),(59,'37','Beef with Bamboo Shoots & Water Chestnuts','3.90','4'),(60,'38','Beef with Tomato','3.90','4'),(61,'39','Beef with Broccoli Spears & Oyster Sauce','3.90','4'),(62,'40','Beef with Green Pepper & Blackbean Sauce','3.90','4'),(63,'41','Beef with Vegetables & Szechuan Sauce','3.90','4'),(64,'42','Beef Chop Suey','3.90','4'),(65,'43','Beef in Satay Sauce','3.90','4'),(66,'44','Crispy Beef in Chilli Sauce','3.90','4'),(67,'45','King Prawn on Beansprouts with Oyster Sauce','4.90','5'),(68,'46','King Prawn with Sweetcorn','4.90','5'),(69,'47','King Prawn with Babycorn','4.90','5'),(70,'48','King Prawn with Mushroom','4.90','5'),(71,'49','King Prawn with Straw Mushroom & Oyster Sauce','4.90','5'),(72,'50','King Prawn with Pineapple','4.90','5'),(73,'51','King Prawn with Ginger & Spring Onion','4.90','5'),(74,'52','King Prawn with Cashew Nuts & Green Pepper','4.90','5'),(75,'53','King Prawn with Bamboo Shoots & Water Chestnuts','4.90','5'),(76,'54','King Prawn with Tomato','4.90','5'),(77,'55','King Prawn with Broccoli Spears & Oyster Sauce','4.90','5'),(78,'56','King Prawn with Green Pepper & Blackbean Sauce','4.90','5'),(79,'57','Kings Prawn with Vegetables & Szechuan Sauce','4.90','5'),(80,'58','King Prawn Chop Suey','4.90','5'),(81,'59','King Prawn in Satay Sauce','4.90','5'),(82,'60','King Prawn in Batter with Lemon Sauce','4.90','5'),(83,'60a','Crispy Chilli King Prawn','4.90','5'),(84,'61','Roast Duck on Fried Rice with Barbecue Sauce','4.90','6'),(85,'62','Roast Duck on Beansprouts with Barbecue Sauce','4.90','6'),(86,'63','Roast Duck with Mushroom','4.90','6'),(87,'64','Roast Duck with Pineapple','4.90','6'),(88,'65','Roast Duck with Ginger & Spring Onion','4.90','6'),(89,'66','Roast Duck with Broccoli Spears & Oyster Sauce','4.90','6'),(90,'67','Roast Duck in Satay Sauce','4.90','6'),(91,'68','Roast Duck in Orange Sauce','4.90','6'),(92,'69','Roast Duck in Plum Sauce','4.90','6'),(93,'69a','Roast Duck Curry','4.90','6'),(94,'70','Chicken Foo Young','3.90','7'),(95,'71','Prawn Foo Young','3.90 ','7'),(96,'72','King Prawn Foo Young','4.90','7'),(97,'73','Special Foo Young','3.90','7'),(98,'74','Chicken Chow Mein','3.90','8'),(99,'75','Beef Chow Mein','3.90','8'),(100,'76','Prawn Chow Mein','3.90','8'),(101,'77','King Prawn Chow Mein','4.90','8'),(102,'78','Chinese Roast Pork Chow Mein','3.90','8'),(103,'79','Special Chow Mein','3.90','8'),(104,'80','Golden Dragon Special with Noodles','3.90','8'),(105,'81','Singapore Chow Mein','3.90','8'),(106,'82','Chicken Curry','3.90','9'),(107,'83','Beef Curry','3.90','9'),(108,'84','Prawn Curry','3.90','9'),(109,'85','King Prawn Curry','4.90','9'),(110,'86','Chinese Roast Pork Curry','3.90','9'),(111,'87','Mixed Meat Curry','3.90','9'),(112,'88','Sweet & Sour Chicken in Batter (10)','4.20','10'),(113,'89','Sweet & Sour King Prawn in Batter (10)','4.90','10'),(114,'90','Sweet & Sour Spare Ribs','4.90','10'),(115,'91','Sweet & Sour Duck','4.90','10'),(116,'92','Chicken Fried Rice','3.90','11'),(117,'93','Beef Fried Rice','3.90','11'),(118,'94','Prawn Fried Rice','3.90','11'),(119,'95','King Prawn Fried Rice','4.90','11'),(120,'96','Chinese Roast Pork Fried Rice','3.90','11'),(121,'97','Special Fried Rice','3.90','11'),(122,'98','Golden Dragon Special with Fried Rice','3.90','11'),(123,'99','Singapore Fried Rice (Hot & Spicy)','3.90','11'),(124,'100','Chicken with Onion in our Chef\'s Special Cantonese Sauce','3.90','12'),(125,'101','Beef with Onion in our Chef\'s Special Cantonese Sauce','3.90','12'),(126,'102','King Prawn with Onion in our Chef\'s Special Cantonese Sauce (10)','4.90','12'),(127,'103','Mixed Meat with Onion in our Chef\'s Special Cantonese Sauce','3.90','12'),(128,'104','Sweet & Sour Chicken Hong Kong Style','3.90','12'),(129,'105','Spare Ribs Cantonese Style','4.90','12'),(130,'106','Mixed Vegetable Foo Young','3.90','13'),(131,'106a','Mushroom Foo Young','3.90','13'),(132,'106b','Onion Foo Young','3.90','13'),(133,'107','Mixed Vegetable in Blackbean Sauce','3.90','13'),(134,'108','Mixed Vegetable in Satay Sauce','3.90','13'),(135,'109','Mixed Vegetable in Sweet & Sour Sauce','3.90','13'),(136,'110','Mixed Vegetable Curry','3.90','13'),(137,'110a','Mushroom Curry','3.90','13'),(138,'111','Mixed Vegetable Chow Mein','3.90','13'),(139,'111a','Mushroom Chow Mein','3.90','13'),(140,'112','Mixed Vegetable in Oyster Sauce','3.90','13'),(141,'113','Mixed Vegetables in our Chef\'s Special Cantonese Sauce','3.90','13'),(142,'114','Mushroom Fried Rice','3.90','13'),(143,'115','Roast Chicken & Chips','3.90','14'),(144,'117','Chicken Omelette & Chips','3.90','14'),(145,'118','Prawn Omelette & Chips','3.90','14'),(146,'119','King Prawn Omelette & Chips','4.90','14'),(147,'120','Mushroom Omelette & Chips','3.90','14'),(148,'121','Chicken Balls (9) & Chips','3.90','14'),(149,'122','Two Sausages & Chips ','3.90','14'),(150,'123','Mixed Meat Satay','3.90','15'),(151,'124','Mixed Meat in Blackbean Sauce','3.90','15'),(152,'125','Mixed Meat Chop Suey','3.90','15'),(153,'126','Mixed Meat Szechuan','3.90','15'),(154,'127','Mixed Meat Kung Po','3.90','15'),(155,'128','Kung Po Chicken','3.90','16'),(156,'129','Kung Po King Prawn','4.90','16'),(157,'130','Kung Po Vegetable','3.90','16'),(158,'131','Kung Po Beef','3.90','16'),(159,'132','Kung Po Duck','4.90','16'),(160,'','Boiled Rice','1.90','17'),(161,'','Egg Fried Rice','1.90','17'),(162,'','Fried Soft Noodles','2.30','17'),(163,'','Mushrooms','2.30','17'),(164,'','Beansprouts','2.20','17'),(165,'','Bamboo Shoots & Water Chestnuts','2.20','17'),(166,'','Mixed Chinese Vegetables','2.90','17'),(167,'','Sweet & Sour Sauce','1.50','17'),(168,'','Curry Sauce','1.50','17'),(170,'','Barbecue Sauce','1.50','17'),(171,'','Cantonese Sauce','1.50','17'),(172,'','Satay Sauce','1.50','17'),(173,'','Chilli Sauce','1.50','17'),(174,'','Blackbean Sauce','1.50','17'),(175,'','Kung po Sauce','1.50','17'),(176,'','Hoi Sin Sauce','1.50','17'),(177,'','Plum Sauce','1.50','17'),(178,'','Chips','1.50','17'),(179,'','Onion Rings','1.90','17'),(180,'','Fried Onions','1.90','17'),(181,'','Prawn Crackers','1.20','17'),(182,'','Banana Friter ','1.90','18'),(183,'','Pineapple Fritter','1.90','18'),(184,'Sp1','Salt & Pepper Chicken','3.90','special'),(185,'Sp2','Salt & Pepper Chicken Wings','3.90','special'),(186,'Sp3','Salt & Pepper Cantonese Spare Ribs','4.90','special'),(187,'Sp4','Squid with Green Pepper & Black Bean Sauce','4.90','special'),(188,'Sp5','Squid with Green Pepper & Satay Sauce','4.90','special'),(189,'Sp6','Duck Fried Rice with Spring Onion','4.90','special'),(190,'Sp7','Duck Chow Mein','4.90','special'),(191,'Sp8','Ham Foo Young','3.90','special'),(192,'Sp9','Fresh Vegetable Fried Rice','3.90','special'),(193,'Sp10','Crispy Seaweed','2.90','special'),(194,'Sp11','Barbecue Spare Ribs with Honey','4.80','special'),(195,'Sp12','Crispy Chilli Squid','4.90','special'),(196,'Sp13','Salt & Pepper Squid','4.90','special'),(197,'Sp14','Sweet & Sour Pork Balls','3.90','special'),(198,'Can','Can of Drink','0.80p','drinks');
/*!40000 ALTER TABLE `dishes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id_menu` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  PRIMARY KEY  (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'<font size=5>Starters</font>'),(2,'Chicken Dishes'),(3,'Chinese Roast Pork Dishes'),(4,'Beef Dishes'),(5,'King Prawn Dishes (10)'),(6,'Chinese Roast Duck Dishes'),(7,'Foo Young Dishes (Chinese Omelette)'),(8,'Noodle Dishes'),(9,'Curry Dishes (Rice Not Included)'),(10,'Sweet &amp; Sour Dishes'),(11,'Fried Rice Dishes'),(12,'Cantonese Dishes'),(13,'Vegetable Dishes'),(14,'English Dishes'),(15,'Mixed Meat Dishes'),(16,'Kung Po Dishes'),(17,'Side Portions'),(18,'Sweets');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sets`
--

DROP TABLE IF EXISTS `sets`;
CREATE TABLE `sets` (
  `id_sets` int(11) NOT NULL auto_increment,
  `sort_number` text NOT NULL,
  `name` text NOT NULL,
  `price` text NOT NULL,
  `dishes` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY  (`id_sets`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='sets';

--
-- Dumping data for table `sets`
--

LOCK TABLES `sets` WRITE;
/*!40000 ALTER TABLE `sets` DISABLE KEYS */;
INSERT INTO `sets` VALUES (1,'M1','Set Meal For One','7.80','<ul>\r\n<li>Sweet & Sour Chicken (5)</li>\r\n<li>Beef Chop Suey</li>\r\n<li>Egg Fried Rice</li>\r\n</ul>','chinese'),(2,'M2','Set Meal For Two','18.00','<ul>	\r\n<li>Pancake Rolls or Barbecue Spare Ribs</li>\r\n<li>Sweet & Sour Chicken(10)</li>\r\n<li>Special Foo Young Beef & Mushroom</li>\r\n<li>Special Fried Rice</li>\r\n</ul>	','chinese'),(3,'M3','Set Meal For Three','25.00','<ul>\r\n<li>Barbecue Spare Ribs or Pancake Rolls</li>\r\n<li>Sweet & Sour King Prawns (9)</li>\r\n<li>Chicken with Cashew Nuts & Green Pepper</li>\r\n<li>Beef Chop Suey</li>\r\n<li>Special Foo Young</li>\r\n<li>Special Fried Rice</li>\r\n</ul>','chinese'),(4,'M4','Set Meal For Four','32.00','<ul>\r\n<li>Barbecue Spare Ribs or Pancake Rolls</li>\r\n<li>Sweet & Sour Chicken (12)</li>\r\n<li>Beef & Mushroom</li>\r\n<li>King Prawn with Cashew Nuts & Green Pepper</li>\r\n<li>Chinese Roast Pork on Beansprouts with Barbecue Sauce</li>\r\n<li>Chicken & Pineapple</li>\r\n<li>Special Fried Rice</li>\r\n</ul>\r\n','chinese'),(5,'M5','Set Meal For Five','42.00','<ul>\r\n<li>Barbecue Spare Ribs or Pancake Rolls</li>\r\n<li>Sweet & Sour Chicken (15)</li>\r\n<li>Duck with Pineapple</li>\r\n<li>King Prawn with Mushroom\r\nBeef Chop</li>\r\n<li>Special Foo Young</li>\r\n<li>Special Fried</li>\r\n<li>Chinese Roast Pork on Beansprouts with Barbecue</li>\r\n</ul>','chinese'),(6,'C1','Set Meal For One','8.50','<ul>\r\n<li>Sesame Prawn Toast</li>\r\n<li>Sweet & Sour Hong Kong Style</li>\r\n<li>Special Fried Rice</li>\r\n</ul>','cantonese'),(7,'C2','Set Meal For Two','18.00','<ul>\r\n<li>Aromatic Crispy Duck (Quarter)</li>\r\n<li>Chicken in Blackbean Sauce</li>\r\n<li>Beef Cantonese Style</li>\r\n<li>Special Fried Rice</li>\r\n</ul>','cantonese'),(8,'C3','Set Meal For Three','23.00','<ul>\r\n<li>Spare Ribs Cantonese Style</li>\r\n<li>King Prawn in Satay Sauce</li>\r\n<li>Beef in Blackbean Sauce</li>\r\n<li>Special Fried Rice</li>\r\n<li>Sweet & Sour Chicken Hong Kong Style</li>\r\n</ul>','cantonese'),(9,'C4','Set Meal For Four','30.00','<ul>\r\n<li>Spare Ribs Cantonese Style</li>\r\n<li>Sesame Prawn Toast</li>\r\n<li>Vegetables in Satay Sauce</li>\r\n<li>Chicken Cantonese Style</li>\r\n<li>Beef in Blackbean Sauce</li>\r\n<li>Special Fried Rice</li>\r\n<li>Prawn Crackers</li>\r\n</ul>','cantonese'),(10,'C5','Set Meal For Five','42.00','<ul>\r\n<li>Aromatic Crispy Duck (Half)</li>\r\n<li>Sesame Prawn Toast</li>\r\n<li>Sweet & Sour Hong Kong Style</li>\r\n<li>Beef in Satay Sauce</li>\r\n<li>King Prawn in Blackbean Sauce</li>\r\n<li>Chicken in Cantonese Sauce</li>\r\n<li>Special Fried Rice</li>\r\n</ul>','cantonese');
/*!40000 ALTER TABLE `sets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL auto_increment COMMENT 'user key',
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `number` text NOT NULL,
  `region` text NOT NULL,
  PRIMARY KEY  (`id_user`),
  FULLTEXT KEY `region` (`region`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=latin1 COMMENT='Jade Palace Users Table';

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (32,'rafal.zdziech@gmail.com','maniak','','','545435435435','Penzance'),(33,'rzdziech@gmail.com','maniak','','','5453543545','Penzance'),(34,'emilylkeast@hotmail.co.uk','lampard','Emily','Leiworthy','01736 368991','Penzance'),(26,'ronjaismyname@yahoo.co.uk','hello1','ronja','wiedenbeck','07519372811','Penzance'),(27,'p.c.stanley@hotmail.co.uk','chinese','paula','stanley','01736 874367','Penzance'),(28,'hannahangwin123@hotmail.com','mobileme','hannah','angwin','07961253048','Penzance'),(29,'black_dvc@tlen.pl','qwerty1','Ela','Lobodzinska','','Penzance'),(30,'ibretticus@hotmail.co.uk','dennis2874','Brett','Allen','07888954055','Penzance'),(31,'hollee.jose@gmail.com','Jasper','Holly','Jose','','Penzance'),(35,'nymphet@hotmail.co.uk','chinese','Megan Louise','Roberts','07890575112','Penzance'),(36,'austinherbert@gmail.com','lion','austin','herbert','01736367333','Penzance'),(37,'lynda.james2@btopenworld.com','7oranges','Lynda','James','01736 360477','Penzance'),(38,'hwilson26@yahoo.co.uk','cornwall','Hannah ','Wilson','01736732177','Penzance'),(39,'vixentornado@yahoo.co.uk','Vixyvu1','Vikki','Johns','363184','Penzance'),(49,'alandavies78@gmail.com','yamaha125','alan','davis','07534591631','Penzance'),(41,'rthomastrevear@googlemail.com','buster01','Richard','Thomas','07811778747','Penzance'),(42,'lizkent@talktalk.net','hongkong','Elizabeth Kent','Kent','07506079477','Penzance'),(43,'oliver.ross@live.co.uk','bogsby22','Ross','Oliver','07943475835','Penzance'),(44,'penny@uren.wanadoo.co.uk','trewithen','Penny','Uren','01736364974','Penzance'),(45,'j5unoturbo@hotmail.co.uk','cullen06','jonathan','mullally','01736 360100','Penzance'),(46,'s.groombridge08@btinternet.com','chickenbollocks','sarah','groombridge','01736710189','Penzance'),(47,'Innocenttilprovenguilty@hotmail.co.uk','monkey','Leanne','Penberthy','07539760860','Penzance'),(48,'norman_bates_85@hotmail.com','tr184qx','lee','jones','01736351778','Penzance'),(50,'hannah.1976@hotmail.co.uk','bunnus','hannah','tilsley','07733454775','Penzance'),(51,'JonEm4@aol.com','jaclil','emma','deakin','07929215560','Penzance'),(52,'markwiles3@aol.com','matilda','mark','wiles','01736333293','Penzance'),(53,'Martyn.walker@Tesco.net','purple','Martyn','Walker','01736366649','Penzance'),(54,'cullam-sashaosborne@sky.com','pawgyboy','Cullam','Osborne','01736350744','Penzance'),(55,'hazhoare@hotmail.co.uk','123456','lisa','hoare','','Penzance'),(56,'a.stephens233@btinternet.com','olivia99','Ann','stephens','07598312298','Penzance'),(57,'tricky1981@hotmail.co.uk','roofing','Richard Hadwin','hadwin','07866475250','Penzance'),(58,'martin10203@yahoo.co.uk','oxygen','M','Bailey','07791270243','Penzance'),(59,'dean.benson@talktalk.net','hamilton','Dean','Benson','01736 363474','Penzance'),(60,'lordbuckfield@yahoo.co.uk','clarisa1','simon','buckfield','07801516352','Penzance'),(61,'shaundashcroft@hotmail.co.uk','kylealex','shaun','ashcroft','07897353550','Penzance'),(62,'julzpz@sky.com','tayshanlew1','Julie','Warr','01736 369518','Penzance'),(63,'tammy.turner76@yahoo.co.uk','billy','tammy','turner','01736351538','Penzance'),(64,'minstrel-mad@hotmail.co.uk','billybumhole','Emily','Fayer','07531941951','Penzance'),(65,'ravenswood25@msn.com','singapore','jean','howes','07894400885','Penzance'),(66,'carlydouglas84@yahoo.co.uk','rileygordon07','carly','douglas','01736 351706','Penzance'),(67,'seakingeunice@tiscali.co.uk','tammy','eunice','morris','01736363182','Penzance'),(68,'alisunsisley123@hotmail.co.uk','watkins666','Alisun','Watkins','01736350187','Penzance'),(69,'P-o-k-e-y@hotmail.com','lemming','Jake','Cloke','07792588978','Penzance'),(70,'amberbabyx2009@live.co.uk','amberbabyx','Amber','Gregory','07955555324','Penzance'),(71,'martinbailey172@msn.com','doogie15','martin','bailey','01736351924','Penzance'),(72,'simon@cannockcottage.freeserve.co.uk','rebecca','Simon','Winn','740336','Penzance'),(73,'annieedgecombe@hotmail.co.uk','qwertypop93','Annie','Edgecombe','07792588978','Penzance'),(74,'dsnicholas2000@hotmail.com','ca88age','dan','french','01736 719116','Penzance'),(75,'s_cripps1@sky.com','snooker147','robin','cripps','07878661541','Penzance'),(76,'Ollieh101@hotmail.co.uk','Oliver1','Ollie','Humphreys','07974158700','Penzance'),(77,'malcolmglover@live.co.uk','heamoor','Malcolm','Glover','01736364711','Penzance'),(78,'jebath@cornwall.gov.uk','Jasmine','Jenna','Bath','07896343833','Penzance'),(79,'rayclemens@aol.com','Kernow10','Ray','Clemens','01736 366606','Penzance'),(80,'flukeyluke69@live.co.uk','Collegeisshit','luke','wilson','369946','Penzance'),(81,'robertead@googlemail.com','bmw318','robert','ead','','Penzance'),(82,'susan.gilbert82@yahoo.co.uk','charlotte1957','Sue','Gilbert','07525752000','Penzance'),(83,'sabrinagrahampz@yahoo.co.uk','sadiesue','Sabrina','Graham','07780117178','Penzance'),(84,'debz.o@hotmail.co.uk','takeaway','Debbie','Ould','01736 740020','Penzance'),(85,'brownfield@fsmail.net','forest','MARTIN','BROWNFIELD','01736331256','Penzance'),(86,'gsjelbert@yahoo.com','chinese','tom','jelbert','01736740779','Penzance'),(87,'martinhagger@tiscali.co.uk','james','Martin','Hagger','01736350833','Penzance'),(88,'Smas@btconnect.com','chinese','Jorji','Mackintosh','07971264233','Penzance'),(89,'pete@peteallen.fsnet.co.uk','220gti','pete','allen','07718625959','Penzance');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vouchers`
--

DROP TABLE IF EXISTS `vouchers`;
CREATE TABLE `vouchers` (
  `id_discount` int(11) NOT NULL auto_increment,
  `offer` text NOT NULL,
  `description` text NOT NULL,
  `status` text NOT NULL,
  `scale` text NOT NULL,
  `valid` date NOT NULL,
  `restrict` text NOT NULL,
  PRIMARY KEY  (`id_discount`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='discount and offers';

--
-- Dumping data for table `vouchers`
--

LOCK TABLES `vouchers` WRITE;
/*!40000 ALTER TABLE `vouchers` DISABLE KEYS */;
INSERT INTO `vouchers` VALUES (5,'SPEND &pound;15 AND GET FREE CAN OF DRINK AND PRAWN CRACKERS','ONLY 1 VOUCHER TO BE USED ANYTIME \r\nVALID UNTIL END OF AUGUST\r\nNOT TO INCLUDE DUCK DISHES','active','all','2010-08-31','VOUCHERS NOT VALID ON SATURDAYS'),(3,'SPEND &pound;40 AND GET AN EXTRA DISH FREE AND FREE DELIVERY UP TO 5 MILES','ONLY 1 VOUCHER TO BE USED ANYTIME\r\nVALID UNTIL END OF AUGUST\r\nNOT TO INCLUDE DUCK DISHES','active','all','2010-08-31','VOUCHERS NOT VALID ON SATURDAYS'),(1,'SPEND &pound;12 and GET FREE PRAWN CRACKERS','ONLY 1 VOUCHER TO BE USED ANYTIME\r\nVALID UNTIL END OF AUGUST','active','all','2010-08-31','VOUCHERS NOT VALID ON SATURDAYS'),(2,'SPEND &pound;25 AND GET AN EXTRA DISH FREE','ONLY 1 VOUCHER TO BE USED ANYTIME\r\nVALID UNTIL END OF AUGUST\r\nNOT TO INCLUDE DUCK DISHES','active','all','2010-08-31','VOUCHERS NOT VALID ON SATURDAYS'),(6,'SPEND &pound;25 AND GET FREE DELIVERY UP TO 4 MILES AND FREE PRAWN CRACKERS','ONLY 1 VOUCHER TO BE USED ANYTIME \r\nVALID UNTIL END OF AUGUST\r\nNOT TO INCLUDE DUCK DISHES','active','all','2010-08-31','VOUCHERS NOT VALID ON SATURDAYS'),(7,'SPEND  &pound;20 AND GET 2 PANCAKE ROLLS FREE','ONLY 1 VOUCHER TO BE USED ANYTIME \r\nVALID UNTIL END OF AUGUST\r\nNOT TO INCLUDE DUCK DISHES','active','all','2010-08-31','VOUCHERS NOT VALID ON SATURDAYS'),(8,'SPEND &pound;35 AND GET AN EXTRA FREE DISH AND TWO FREE PANCAKE ROLLS','ONLY 1 VOUCHER TO BE USED ANYTIME \r\nVALID UNTIL END OF AUGUST\r\nNOT TO INCLUDE DUCK DISHES\r\n','active','all','2010-08-31','VOUCHERS NOT VALID ON SATURDAYS');
/*!40000 ALTER TABLE `vouchers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-08-09 22:48:03
