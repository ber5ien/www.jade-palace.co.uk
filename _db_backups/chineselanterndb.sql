-- MySQL dump 10.11
--
-- Host: n1grid50mysql51.secureserver.net    Database: chineselanterndb
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
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

LOCK TABLES `delivery` WRITE;
/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;
INSERT INTO `delivery` VALUES (39,'4-8 miles','Â£4.00','penzance'),(38,'Other Areas up to 4 Miles','Â£2.00','penzance'),(37,'ALL - TR18 2,3,4,5 (min order Â£12)','FREE','penzance'),(40,'Hayle delivery charge special','Â£2.50','penzance');
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
) ENGINE=MyISAM AUTO_INCREMENT=200 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishes`
--

LOCK TABLES `dishes` WRITE;
/*!40000 ALTER TABLE `dishes` DISABLE KEYS */;
INSERT INTO `dishes` VALUES (1,'1','Chicken & Sweetcorn Soup','1.80','1'),(2,'2','Chicken & Mushroom Soup','1.80','1'),(3,'3','Crabmeat & Sweetcorn Soup','1.90','1'),(4,'4','Chicken Noodle Soup','1.80','1'),(5,'5','Chinese Pancake Roll','1.80','1'),(6,'6','Barbecue Spare Ribs','4.30','1'),(7,'7','Aromatic Crispy Duck (Quarter) (Server with Pancake, Hoi Sin Sauce & Salad)','6.90','1'),(8,'8','Mixed Dim Sum Selection (8)','3.80','1'),(9,'9','Hot & Sour Soup','2.20','1'),(10,'10','Sesame Prawn Toast','2.90','1'),(11,'11','Spicy Chicken Triangles (3)','2.90','1'),(12,'11a','Veg Pancake Rolls (2)','2.20','1'),(13,'11b','Crispy Won Ton','3.50','1'),(14,'11c','Skewered Satay Chicken','3.50','1'),(15,'12','Chicken on Fried Rice with Barbecue Sauce','3.80','2'),(16,'13','Chicken on Beansprouts with Barbecue Sauce','3.80','2'),(17,'14','Chicken with Sweetcorn','3.80','2'),(18,'15','Chicken with Babycorn','3.80','2'),(19,'16','Chicken with Mushroom','3.80','2'),(20,'17','Chicken with Straw Mushroom & Oyster Sauce','3.80','2'),(21,'18','Chicken with Pineapple','3.80','2'),(22,'19','Chicken with Ginger & Spring Onion','3.80','2'),(23,'20','Chicken with Cashew Nuts & Green Pepper','3.80','2'),(24,'21','Chicken Bamboo Shoots & Water Chestnuts','3.80','2'),(25,'22','Chicken with Tomato','3.80','2'),(26,'23','Chicken with Broccoli Spears & Oyster Sauce','3.80','2'),(27,'24','Chicken with Green Pepper & Blackbean Sauce','3.80','2'),(28,'25','Chicken with Vegetables & Szechuan Sauce','3.80','2'),(29,'26','Chicken Chop Suey','3.80','2'),(30,'27','Chicken in Satay Sauce','3.80','2'),(31,'28','Chicken in Lemon Sauce','4.00','2'),(51,'29','Beef on Beansprouts with Oyster Sauce','3.90','4'),(34,'28a','Crispy Chilli Chicken','4.00','2'),(35,'12a','Roast Pork on Fried Rice with Barbecue Sauce','3.90','3'),(36,'13a','Roast Pork on Beansprouts with Barbecue Sauce','3.90','3'),(37,'14a','Roast with Pork with Sweetcorn','3.90','3'),(38,'15a','Roast Pork with Babycorn','3.90','3'),(39,'16a','Roast Pork with Mushroom','3.90','3'),(40,'17a','Roast Pork with Straw Mushroom & Oyster Sauce','3.90','3'),(41,'18a','Roast Pork with Pineapple','3.90','3'),(42,'19a','Roast Pork with Ginger & Sprint Onion','3.90','3'),(43,'20a','Roast Pork with Cashew Nuts & Green Pepper','3.90','3'),(44,'21a','Roast Pork with Bamboo Shoots & Water Chestnuts','3.90','3'),(45,'22a','Roast Pork with Tomato','3.90','3'),(46,'23a','Roast Pork with Broccoli Spears & Oyster Sauce','3.90','3'),(47,'24a','Roast Pork with Green Pepper & Blackbean Sauce','3.90','3'),(48,'25a','Roast Pork with Vegetables & Szechuan Sauce','3.90','3'),(49,'26a','Roast Pork Chop Suey','3.90','3'),(50,'27a','Roast Pork in Satay Sauce','3.90','3'),(52,'30','Beef with Sweetcorn','3.90','4'),(53,'31','Beef with Babycorn','3.90','4'),(54,'32','Beef with Mushroom','3.90','4'),(55,'33','Beef with Straw Mushroom & Oyster Sauce','3.90','4'),(56,'34','Beef with Pineapple','3.90','4'),(57,'35','Beef with Ginger & Spring Onion','3.90','4'),(58,'36','Beef with Cashew Nuts & Green Pepper','3.90','4'),(59,'37','Beef with Bamboo Shoots & Water Chestnuts','3.90','4'),(60,'38','Beef with Tomato','3.90','4'),(61,'39','Beef with Broccoli Spears & Oyster Sauce','3.90','4'),(62,'40','Beef with Green Pepper & Blackbean Sauce','3.90','4'),(63,'41','Beef with Vegetables & Szechuan Sauce','3.90','4'),(64,'42','Beef Chop Suey','3.90','4'),(65,'43','Beef in Satay Sauce','3.90','4'),(66,'44','Crispy Beef in Chilli Sauce','4.00','4'),(67,'45','King Prawn on Beansprouts with Oyster Sauce','3.90','5'),(68,'46','King Prawn with Sweetcorn','3.90','5'),(69,'47','King Prawn with Babycorn','3.90','5'),(70,'48','King Prawn with Mushroom','3.90','5'),(71,'49','King Prawn with Straw Mushroom & Oyster Sauce','3.90','5'),(72,'50','King Prawn with Pineapple','4.40','5'),(73,'51','King Prawn with Ginger & Spring Onion','4.40','5'),(74,'52','King Prawn with Cashew Nuts & Green Pepper','4.40','5'),(75,'53','King Prawn with Bamboo Shoots & Water Chestnuts','4.40','5'),(76,'54','King Prawn with Tomato','4.40','5'),(77,'55','King Prawn with Broccoli Spears & Oyster Sauce','4.40','5'),(78,'56','King Prawn with Green Pepper & Blackbean Sauce','4.40','5'),(79,'57','Kings Prawn with Vegetables & Szechuan Sauce','4.40','5'),(80,'58','King Prawn Chop Suey','4.40','5'),(81,'59','King Prawn in Satay Sauce','4.40','5'),(82,'60','King Prawn in Batter with Lemon Sauce','4.40','5'),(83,'60a','Crispy Chilli King Prawn','4.40','5'),(84,'61','Roast Duck on Fried Rice with Barbecue Sauce','4.90','6'),(85,'62','Roast Duck on Beansprouts with Barbecue Sauce','4.90','6'),(86,'63','Roast Duck with Mushroom','4.90','6'),(87,'64','Roast Duck with Pineapple','4.90','6'),(88,'65','Roast Duck with Ginger & Spring Onion','4.90','6'),(89,'66','Roast Duck with Broccoli Spears & Oyster Sauce','4.90','6'),(90,'67','Roast Duck in Satay Sauce','4.90','6'),(91,'68','Roast Duck in Orange Sauce','4.90','6'),(92,'69','Roast Duck in Plum Sauce','4.90','6'),(93,'69a','Roast Duck Curry','4.90','6'),(94,'70','Chicken Foo Young','3.40','7'),(95,'71','Prawn Foo Young','3.60','7'),(96,'72','King Prawn Foo Young','4.20','7'),(97,'73','Special Foo Young','3.60','7'),(98,'74','Chicken Chow Mein','3.90','8'),(99,'75','Beef Chow Mein','3.90','8'),(100,'76','Prawn Chow Mein','4.10','8'),(101,'77','King Prawn Chow Mein','4.60','8'),(102,'78','Chinese Roast Pork Chow Mein','3.90','8'),(103,'79','Special Chow Mein','4.00','8'),(104,'80','Golden Dragon Special with Noodles','4.10','8'),(105,'81','Singapore Chow Mein','4.00','8'),(106,'82','Chicken Curry','3.60','9'),(107,'83','Beef Curry','3.80','9'),(108,'84','Prawn Curry','3.90','9'),(109,'85','King Prawn Curry','4.30','9'),(110,'86','Chinese Roast Pork Curry','3.70','9'),(111,'87','Mixed Meat Curry','3.90','9'),(112,'88','Sweet & Sour Chicken in Batter (10)','3.90','10'),(113,'89','Sweet & Sour King Prawn in Batter (10)','4.50','10'),(114,'90','Sweet & Sour Spare Ribs','4.40','10'),(115,'91','Sweet & Sour Duck','4.60','10'),(116,'92','Chicken Fried Rice','3.70','11'),(117,'93','Beef Fried Rice','3.80','11'),(118,'94','Prawn Fried Rice','4.00','11'),(119,'95','King Prawn Fried Rice','4.40','11'),(120,'96','Chinese Roast Pork Fried Rice','3.80','11'),(121,'97','Special Fried Rice','3.90','11'),(122,'98','Chinese Lantern Special with Fried Rice','4.00','11'),(123,'99','Singapore Fried Rice (Hot & Spicy)','3.90','11'),(124,'100','Chicken with Onion in our Chef\'s Special Cantonese Sauce','3.80','12'),(125,'101','Beef with Onion in our Chef\'s Special Cantonese Sauce','3.90','12'),(126,'102','King Prawn with Onion in our Chef\'s Special Cantonese Sauce (10)','4.10','12'),(127,'103','Mixed Meat with Onion in our Chef\'s Special Cantonese Sauce','4.20','12'),(128,'104','Sweet & Sour Chicken Hong Kong Style','3.90','12'),(129,'105','Spare Ribs Cantonese Style','4.40','12'),(130,'106','Mixed Vegetable Foo Young','3.50','13'),(131,'106a','Mushroom Foo Young','3.50','13'),(132,'106b','Onion Foo Young','3.50','13'),(133,'107','Mixed Vegetable in Blackbean Sauce','3.50','13'),(134,'108','Mixed Vegetable in Satay Sauce','3.50','13'),(135,'109','Mixed Vegetable in Sweet & Sour Sauce','3.50','13'),(136,'110','Mixed Vegetable Curry','3.50','13'),(137,'110a','Mushroom Curry','3.50','13'),(138,'111','Mixed Vegetable Chow Mein','3.70','13'),(139,'111a','Mushroom Chow Mein','3.60','13'),(140,'112','Mixed Vegetable in Oyster Sauce','3.60','13'),(141,'113','Mixed Vegetables in our Chef\'s Special Cantonese Sauce','3.50','13'),(142,'114','Mushroom Fried Rice','3.50','13'),(143,'115','Roast Chicken & Chips','4.20','14'),(144,'117','Chicken Omelette & Chips','4.20','14'),(145,'118','Prawn Omelette & Chips','4.30','14'),(146,'119','King Prawn Omelette & Chips','4.90','14'),(147,'120','Mushroom Omelette & Chips','4.20','14'),(148,'121','Chicken Balls (9) & Chips','4.50','14'),(149,'122','Two Sausages & Chips ','2.80','14'),(150,'123','Mixed Meat Satay','4.10','15'),(151,'124','Mixed Meat in Blackbean Sauce','4.10','15'),(152,'125','Mixed Meat Chop Suey','4.10','15'),(153,'126','Mixed Meat Szechuan','4.10','15'),(154,'127','Mixed Meat Kung Po','4.10','15'),(155,'128','Kung Po Chicken','4.10','16'),(156,'129','Kung Po King Prawn','4.90','16'),(157,'130','Kung Po Vegetable','4.00','16'),(158,'131','Kung Po Beef','4.20','16'),(159,'132','Kung Po Duck','4.90','16'),(160,'','Boiled Rice','1.70','17'),(161,'','Egg Fried Rice','1.80','17'),(162,'','Fried Soft Noodles','1.90','17'),(163,'','Mushrooms','2.30','17'),(164,'','Beansprouts','2.20','17'),(165,'','Bamboo Shoots & Water Chestnuts','2.20','17'),(166,'','Mixed Chinese Vegetables','2.90','17'),(167,'','Sweet & Sour Sauce','1.40','17'),(168,'','Curry Sauce','1.40','17'),(170,'','Barbecue Sauce','1.40','17'),(171,'','Cantonese Sauce','1.40','17'),(172,'','Satay Sauce','1.40','17'),(173,'','Chilli Sauce','1.40','17'),(174,'','Black Bean Sauce','1.40','17'),(175,'','Kung Po Sauce','1.40','17'),(176,'','Hoi Sin Sauce','1.40','17'),(177,'','Plum Sauce','1.40','17'),(178,'','Chips','1.40','17'),(179,'','Onion Rings','1.90','17'),(180,'','Fried Onions','1.60','17'),(181,'','Prawn Crackers','1.20','17'),(182,'','Banana Friter ','1.80','18'),(183,'','Pineapple Fritter','1.80','18'),(184,'Sp1','Salt & Pepper Chicken','3.90','special'),(185,'Sp2','Salt & Pepper Chicken Wings','3.90','special'),(186,'Sp3','Salt & Pepper Cantonese Spare Ribs','4.60','special'),(187,'Sp4','Squid with Green Pepper & Black Bean Sauce','4.70','special'),(188,'Sp5','Squid with Green Pepper & Satay Sauce','4.70','special'),(189,'Sp6','Duck Fried Rice with Spring Onion','4.90','special'),(190,'Sp7','Duck Chow Mein','4.90','special'),(191,'Sp8','Ham Foo Young','3.90','special'),(192,'Sp9','Fresh Vegetable Fried Rice','3.90','special'),(193,'Sp10','Crispy Seaweed','2.90','special'),(194,'Sp11','Barbecue Spare Ribs with Honey','4.60','special'),(195,'Sp12','Crispy Chilli Squid','4.70','special'),(196,'Sp13','Salt & Pepper Squid','4.70','special'),(197,'Sp14','Sweet & Sour Pork Balls','4.20','special'),(198,'Can','Can of Drink','0.80p','drinks'),(199,'Sp15','Bang Bang Chicken','2.80','special');
/*!40000 ALTER TABLE `dishes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mailinglist_blacklist`
--

DROP TABLE IF EXISTS `mailinglist_blacklist`;
CREATE TABLE `mailinglist_blacklist` (
  `rule` varchar(50) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailinglist_blacklist`
--

LOCK TABLES `mailinglist_blacklist` WRITE;
/*!40000 ALTER TABLE `mailinglist_blacklist` DISABLE KEYS */;
/*!40000 ALTER TABLE `mailinglist_blacklist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mailinglist_drafts`
--

DROP TABLE IF EXISTS `mailinglist_drafts`;
CREATE TABLE `mailinglist_drafts` (
  `id` varchar(32) NOT NULL default '0',
  `subject` varchar(255) NOT NULL default '',
  `message` text NOT NULL,
  `texthtml` tinyint(1) NOT NULL default '0',
  `lastsaved` varchar(10) NOT NULL default '',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailinglist_drafts`
--

LOCK TABLES `mailinglist_drafts` WRITE;
/*!40000 ALTER TABLE `mailinglist_drafts` DISABLE KEYS */;
/*!40000 ALTER TABLE `mailinglist_drafts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mailinglist_messages`
--

DROP TABLE IF EXISTS `mailinglist_messages`;
CREATE TABLE `mailinglist_messages` (
  `id` int(11) NOT NULL auto_increment,
  `subject` varchar(100) default NULL,
  `message` text NOT NULL,
  `created` varchar(10) NOT NULL default '',
  `queued` varchar(10) default NULL,
  `count` int(11) NOT NULL default '0',
  `format` varchar(4) NOT NULL default 'text',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailinglist_messages`
--

LOCK TABLES `mailinglist_messages` WRITE;
/*!40000 ALTER TABLE `mailinglist_messages` DISABLE KEYS */;
INSERT INTO `mailinglist_messages` VALUES (80,'Golden Dragon - We are now open again!','Hi,\r\n\r\nWe hope you all had good Christmas.\r\n\r\nWe would like you to know that we are open again!\r\n\r\nOur Take Aways are open starting from 5 pm today.\r\n\r\nBest Regards\r\nGolden Dragon','1293452284','1293452220',166,'text'),(81,'Valentines Day','<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\"> \r\n\r\n<HTML> <HEAD>	<META HTTP-EQUIV=\"CONTENT-TYPE\" CONTENT=\"text/html; charset=windows-1250\">	<STYLE TYPE=\"text/css\">	<!--\r\n\r\n		@page { margin-left: 2.54cm; margin-right: 2.54cm; margin-bottom: 0.5cm }\r\n\r\n		P { margin-bottom: 0.21cm; direction: ltr; color: #000000; widows: 2; orphans: 2 }\r\n\r\n		A:link { color: #0000ff; so-language: zxx }\r\n\r\n	-->\r\n\r\n	</STYLE>\r\n\r\n</HEAD>\r\n\r\n<BODY LANG=\"en-GB\" TEXT=\"#000000\" LINK=\"#0000ff\" DIR=\"LTR\">\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><IMG SRC=\"http://www.jade-palace.co.uk/emails/logo2.png\" ALIGN=BOTTOM WIDTH=200 HEIGHT=92 BORDER=0></P>\r\n\r\n\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><IMG SRC=\"http://www.jade-palace.co.uk/emails/hearth.jpg\" ALIGN=BOTTOM WIDTH=96 HEIGHT=96 BORDER=0></P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#ff0066\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=5><B>Forget the Chocolates this Valentines Day </B></FONT></FONT></FONT></P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#ff0066\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=5><B>treat your loved one to a Chinese takeaway from the Golden Dragon</B></FONT></FONT></FONT></P><P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><BR></P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#ff0066\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=5><B>Choose from any of our set menus for 2</B></FONT></FONT></FONT></P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#ff0066\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=5><B>to receive free prawn crackers </B></FONT></FONT></FONT></P>\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#ff0066\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=5><B>& fortune cookies</B></FONT></FONT></FONT></P>\r\n\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#ff0066\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=5><B>Feb 14th Only</B></FONT></FONT></FONT></P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><BR>\r\n\r\n</P><P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#ff0066\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=5><B>Who knows what your future holds?..</B></FONT></FONT></FONT></P><P STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#ff0000\"></FONT><FONT COLOR=\"#ffffff\">\r\n\r\n<FONT FACE=\"Segoe UI, serif\"><FONT SIZE=1 STYLE=\"font-size: 7pt\">	</FONT></FONT></FONT></P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><IMG SRC=\"http://www.jade-palace.co.uk/emails/hearth.jpg\" ALIGN=BOTTOM WIDTH=96 HEIGHT=96 BORDER=0></P><P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><BR>\r\n\r\n</P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#000000\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=4 STYLE=\"font-size: 16pt\"><B>Details of Set Menus can be found at</B></FONT></FONT></FONT></P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><A HREF=\"http://www.jade-palace.co.uk\"><FONT COLOR=\"#ff0066\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=4 STYLE=\"font-size: 16pt\"><B>www.goldendragonpenzance.co.uk</B></FONT></FONT></FONT></A></P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><BR></P><P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#000000\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=4 STYLE=\"font-size: 16pt\"><B>or telephone</B></FONT></FONT></FONT></P><P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><BR></P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#000000\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=4 STYLE=\"font-size: 16pt\"><B>Penzance 01736 351466</B></FONT></FONT></FONT></P>\r\n\r\n<P STYLE=\"margin-bottom: 0cm\"><BR>\r\n\r\n</P>\r\n\r\n<P STYLE=\"margin-bottom: 0cm\"><BR>\r\n\r\n</P>\r\n\r\n</BODY>\r\n\r\n</HTML>','1297619683','1297619640',204,'html'),(82,'Valentines Day','<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\"> \r\n\r\n<HTML> <HEAD>	<META HTTP-EQUIV=\"CONTENT-TYPE\" CONTENT=\"text/html; charset=windows-1250\">	<STYLE TYPE=\"text/css\">	<!--\r\n\r\n		@page { margin-left: 2.54cm; margin-right: 2.54cm; margin-bottom: 0.5cm }\r\n\r\n		P { margin-bottom: 0.21cm; direction: ltr; color: #000000; widows: 2; orphans: 2 }\r\n\r\n		A:link { color: #0000ff; so-language: zxx }\r\n\r\n	-->\r\n\r\n	</STYLE>\r\n\r\n</HEAD>\r\n\r\n<BODY LANG=\"en-GB\" TEXT=\"#000000\" LINK=\"#0000ff\" DIR=\"LTR\">\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><IMG SRC=\"http://www.jade-palace.co.uk/emails/logo2.png\" ALIGN=BOTTOM WIDTH=200 HEIGHT=92 BORDER=0></P>\r\n\r\n\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><IMG SRC=\"http://www.jade-palace.co.uk/emails/hearth.jpg\" ALIGN=BOTTOM WIDTH=96 HEIGHT=96 BORDER=0></P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#ff0066\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=5><B>Forget the Chocolates this Valentines Day </B></FONT></FONT></FONT></P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#ff0066\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=5><B>treat your loved one to a Chinese takeaway from the Golden Dragon</B></FONT></FONT></FONT></P><P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><BR></P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#ff0066\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=5><B>Choose from any of our set menus for 2</B></FONT></FONT></FONT></P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#ff0066\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=5><B>to receive free prawn crackers </B></FONT></FONT></FONT></P>\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#ff0066\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=5><B>& fortune cookies</B></FONT></FONT></FONT></P>\r\n\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#ff0066\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=5><B>Feb 14th Only</B></FONT></FONT></FONT></P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><BR>\r\n\r\n</P><P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#ff0066\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=5><B>Who knows what your future holds?..</B></FONT></FONT></FONT></P><P STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#ff0000\"></FONT><FONT COLOR=\"#ffffff\">\r\n\r\n<FONT FACE=\"Segoe UI, serif\"><FONT SIZE=1 STYLE=\"font-size: 7pt\">	</FONT></FONT></FONT></P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><IMG SRC=\"http://www.jade-palace.co.uk/emails/hearth.jpg\" ALIGN=BOTTOM WIDTH=96 HEIGHT=96 BORDER=0></P><P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><BR>\r\n\r\n</P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#000000\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=4 STYLE=\"font-size: 16pt\"><B>Details of Set Menus can be found at</B></FONT></FONT></FONT></P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><A HREF=\"http://www.jade-palace.co.uk\"><FONT COLOR=\"#ff0066\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=4 STYLE=\"font-size: 16pt\"><B>www.goldendragonpenzance.co.uk</B></FONT></FONT></FONT></A></P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><BR></P><P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#000000\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=4 STYLE=\"font-size: 16pt\"><B>or telephone</B></FONT></FONT></FONT></P><P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><BR></P>\r\n\r\n<P ALIGN=CENTER STYLE=\"margin-bottom: 0cm\"><FONT COLOR=\"#000000\"><FONT FACE=\"Curlz MT, serif\"><FONT SIZE=4 STYLE=\"font-size: 16pt\"><B>Penzance 01736 351466</B></FONT></FONT></FONT></P>\r\n\r\n<P STYLE=\"margin-bottom: 0cm\"><BR>\r\n\r\n</P>\r\n\r\n<P STYLE=\"margin-bottom: 0cm\"><BR>\r\n\r\n</P>\r\n\r\n</BODY>\r\n\r\n</HTML>','1297620426','',204,'html'),(88,'New Offer from Golden Dragon','Dear Customers,\r\n\r\nWe would like to let you know about our latest offer:\r\n\r\n15% off on all orders above £40 or free delivery starting from today 03/03/11 until Sunday 06/03/11.\r\n\r\nThis is to celebrate a new Head Chef at Golden Dragon.\r\n\r\nPlease mention about it when you are placing your order.\r\n\r\nMany Thanks\r\nGolden Dragon Team','1299170747','1299169980',213,'html');
/*!40000 ALTER TABLE `mailinglist_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mailinglist_queue`
--

DROP TABLE IF EXISTS `mailinglist_queue`;
CREATE TABLE `mailinglist_queue` (
  `message_id` int(11) NOT NULL default '0',
  `address` varchar(100) NOT NULL default '',
  `send_after` varchar(10) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailinglist_queue`
--

LOCK TABLES `mailinglist_queue` WRITE;
/*!40000 ALTER TABLE `mailinglist_queue` DISABLE KEYS */;
/*!40000 ALTER TABLE `mailinglist_queue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mailinglist_subscribers`
--

DROP TABLE IF EXISTS `mailinglist_subscribers`;
CREATE TABLE `mailinglist_subscribers` (
  `address` varchar(100) NOT NULL default '',
  `userkey` varchar(32) NOT NULL default '',
  `confirmed` tinyint(1) NOT NULL default '0',
  `last_sub_req_date` varchar(10) NOT NULL default '',
  `bounce_count` smallint(6) default '0',
  `shop` text NOT NULL,
  PRIMARY KEY  (`address`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailinglist_subscribers`
--

LOCK TABLES `mailinglist_subscribers` WRITE;
/*!40000 ALTER TABLE `mailinglist_subscribers` DISABLE KEYS */;
/*!40000 ALTER TABLE `mailinglist_subscribers` ENABLE KEYS */;
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
INSERT INTO `sets` VALUES (1,'M1','Set Meal For One','7.00','<ul>\r\n<li>Sweet & Sour Chicken (5)</li>\r\n<li>Beef Chop Suey</li>\r\n<li>Egg Fried Rice</li>\r\n</ul>','chinese'),(2,'M2','Set Meal For Two','16.50','<ul>	\r\n<li>Pancake Rolls or Barbecue Spare Ribs</li>\r\n<li>Sweet & Sour Chicken(10)</li>\r\n<li>Special Foo Young Beef & Mushroom</li>\r\n<li>Special Fried Rice</li>\r\n</ul>	','chinese'),(3,'M3','Set Meal For Three','20.50','<ul>\r\n<li>Barbecue Spare Ribs or Pancake Rolls</li>\r\n<li>Sweet & Sour King Prawns (9)</li>\r\n<li>Chicken with Cashew Nuts & Green Pepper</li>\r\n<li>Beef Chop Suey</li>\r\n<li>Special Foo Young</li>\r\n<li>Special Fried Rice</li>\r\n</ul>','chinese'),(4,'M4','Set Meal For Four','29.00','<ul>\r\n<li>Barbecue Spare Ribs or Pancake Rolls</li>\r\n<li>Sweet & Sour Chicken (12)</li>\r\n<li>Beef & Mushroom</li>\r\n<li>King Prawn with Cashew Nuts & Green Pepper</li>\r\n<li>Chinese Roast Pork on Beansprouts with Barbecue Sauce</li>\r\n<li>Chicken & Pineapple</li>\r\n<li>Special Fried Rice</li>\r\n</ul>\r\n','chinese'),(5,'M5','Set Meal For Five','38.50','<ul>\r\n<li>Barbecue Spare Ribs or Pancake Rolls</li>\r\n<li>Sweet & Sour Chicken (15)</li>\r\n<li>Duck with Pineapple</li>\r\n<li>King Prawn with Mushroom\r\nBeef Chop</li>\r\n<li>Special Foo Young</li>\r\n<li>Special Fried</li>\r\n<li>Chinese Roast Pork on Beansprouts with Barbecue</li>\r\n</ul>','chinese'),(6,'C1','Set Meal For One','7.00','<ul>\r\n<li>Sesame Prawn Toast</li>\r\n<li>Sweet & Sour Hong Kong Style</li>\r\n<li>Special Fried Rice</li>\r\n</ul>','cantonese'),(7,'C2','Set Meal For Two','17.50','<ul>\r\n<li>Aromatic Crispy Duck (Quarter)</li>\r\n<li>Chicken in Blackbean Sauce</li>\r\n<li>Beef Cantonese Style</li>\r\n<li>Special Fried Rice</li>\r\n</ul>','cantonese'),(8,'C3','Set Meal For Three','21.00','<ul>\r\n<li>Spare Ribs Cantonese Style</li>\r\n<li>King Prawn in Satay Sauce</li>\r\n<li>Beef in Blackbean Sauce</li>\r\n<li>Special Fried Rice</li>\r\n<li>Sweet & Sour Chicken Hong Kong Style</li>\r\n</ul>','cantonese'),(9,'C4','Set Meal For Four','27.50','<ul>\r\n<li>Spare Ribs Cantonese Style</li>\r\n<li>Sesame Prawn Toast</li>\r\n<li>Vegetables in Satay Sauce</li>\r\n<li>Chicken Cantonese Style</li>\r\n<li>Beef in Blackbean Sauce</li>\r\n<li>Special Fried Rice</li>\r\n<li>Prawn Crackers</li>\r\n</ul>','cantonese'),(10,'C5','Set Meal For Five','38.50','<ul>\r\n<li>Aromatic Crispy Duck (Half)</li>\r\n<li>Sesame Prawn Toast</li>\r\n<li>Sweet & Sour Hong Kong Style</li>\r\n<li>Beef in Satay Sauce</li>\r\n<li>King Prawn in Blackbean Sauce</li>\r\n<li>Chicken in Cantonese Sauce</li>\r\n<li>Special Fried Rice</li>\r\n</ul>','cantonese');
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
  `rights` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id_user`),
  FULLTEXT KEY `region` (`region`)
) ENGINE=MyISAM AUTO_INCREMENT=313 DEFAULT CHARSET=latin1 COMMENT='Jade Palace Users Table';

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (251,'amigacoding@gmail.com','maniak','fasdfasd','fdsafd','634534534','Penzance',0),(33,'rzdziech@gmail.com','maniak','','','5453543545','Penzance',3),(136,'glen.powell44@gmail.com','ee','glen','powell','07989958981','Penzance',3),(312,'sports99@hotmail.co.uk','henry1','Connor','Outram','01736 331450','Penzance',0),(311,'cabazooki@hotmail.com','henry1','57 manor way','heamoor','cornwall','Penzance',0),(310,'leahharris1@hotmail.co.uk','chocolate','Leah','Harris','07837229103','Penzance',0),(309,'sararichards1@hotmail.com','chillichicken','sara','richards','01736 753554','Penzance',0),(308,'posierosie5@hotmail.com','oliverlytton','Rosie','Newell','07794753933','Penzance',0),(307,'mevanessa@hotmail.com','sandy5','vanessa','ricketts','07889052402','Penzance',0),(306,'b1eddy@Hotmail.com','2604','','','710367','Penzance',0),(305,'whealchow@aol.com','chubby78','5 Cliff Cottages','Chapel Street','Marazion','Penzance',0),(304,'jmorwenna@hotmail.com','m02a12b83','','','','Penzance',0),(303,'meatygoodness66@hotmail.com','animal','Louis','Ford','07513133853','Penzance',0),(302,'p-o-k-e-y@hotmail.com','lemming','jake','','jakecloke','Penzance',0),(301,'mollymurphy-x@hotmail.com','roxylife','Molly','Murphy','07531132750','Penzance',0),(300,'sam.minshall@yahoo.co.uk','jetaflam','sam','minshall','07796356684','Penzance',0),(299,'white_butterflyx@hotmail.co.uk','bronnen2010','Catherine','Cock','01736600172','Penzance',0),(298,'annis26@hotmail.co.uk','annis','tasha','annis','752443','Penzance',0),(297,'cwolstencroft16@hotmail.com','codiekid','lauren','wolstencroft','07921236512','Penzance',0),(296,'mikaelarichards01736@talktalk.net','cornwall','mikaela','richards','01736755437','Penzance',0),(295,'catherine80@homecall.co.uk','pigtig80','Catherine ','Biscombe','01736600057','Penzance',0),(294,'rouffignac4@aol.com','roughy','22 trevithick cres','hayle cornwall','tr274x','Penzance',0),(293,'lordbuckfield@yahoo.co.uk','clarisa1','','','clarisa1','Penzance',0),(292,'sauxpot@live.co.uk','tasty1','Lawrence','Hunter','07881955789','Penzance',0),(291,'carlo1000000@hotmail.co.uk','carlynadine','carly','roberts','07538102201','Penzance',0),(290,'geraldinebartlett@talktalk.net','maison','15a trevenner lane','marazion','tr17 0bl','Penzance',0),(289,'michellearies@hotmail.com','katalina35','6 chywoone place','newlyn','penzance','Penzance',0),(288,'madamcod@yahoo.co.uk','mik3ys01','Heather','Taylor-Nicholson','01736 330187','Penzance',0),(287,'andrewwragge@googlemail.com','sprake1','6 High Mountains','Newlyn','TR18 5JY','Penzance',0),(286,'sadiemorse@hotmail.co.uk','lianne','Sadie','Lambourne','01736756292','Penzance',0),(285,'melissa-sian--x@hotmail.co.uk','munchbunch007','melissa','langley','07772073900','Penzance',0),(284,'vlmferrell@live.co.uk','max2','5 Birch Grove','Hayle','TR27 6PL','Penzance',0),(283,'smithmichelleuk@hotmail.co.uk','animals','Michelle','Smith','07599129962','Penzance',0),(282,'neil149@btinternet.com','bensafrim','Mr','Harris','07999488964','Penzance',0),(281,'rosie@pinkocean.com','samuel','John','Pollard','01736','Penzance',0),(280,'kerrybryant@yahoo.co.uk','moomoo','kerry','bryant','07722409714','Penzance',0),(279,'charlottebrown100@hotmail.com','hisexy','charlotte','brown','07540731160','Penzance',0),(278,'g-e-c-57@supanet.com','lantern','george','curnow','07704405549','Penzance',0),(277,'rayclemens@aol.com','Keltek2011','9 Mount View','Madron','TR20 8SZ','Penzance',0),(276,'smileyp11@hotmail.com','best5465','','','01736754346','Penzance',0),(275,'revdmike@supanet.com','dougal','Genesis','Bosparva Lane','Leedstown, Hayle','Penzance',0),(274,'chanted@btinternet.com','carver','40 cardinnis road','','01736 351072','Penzance',0),(273,'thizuldu@googlemail.com','waterside','13 Reens Crescent','Heamoor','Penzance','Penzance',0),(272,'gloria.gprowse.fsnet.co.uk@sky.com','gillyga48','14 Tregie','Newlyn','TR18 5QJ','Penzance',0),(271,'debrahammonde@gmail.com','peppermint','Debra','Hammonde','01736330321','Penzance',0),(270,'t4sh4-x@hotmail.co.uk','Grommit','Tash','Parcell','07969683094','Penzance',0),(269,'jimmynicholls@sky.com','tottenham','james','nicholls','01736758520','Penzance',0),(268,'hayleyt_1987@hotmail.co.uk','godrevy','hayley','tucker','07734860728','Penzance',0),(267,'dcv@hotmail.co.uk','qqqq','ddvvv','vdvdvdv','vdskjh','Penzance',0),(266,'happy_bunny100@hotmail.com','m739m7','Kimberley','Sadler','01736366303','Penzance',0),(265,'DEANGODDARD1@AOL.COM','HONDAFOUR','DEAN','GODDARD','07799864449','Penzance',0),(264,'robioke@yahoo.co.uk','sandramary','rob ','johns','07923383142','Penzance',0),(263,'gabeandsuemonro@hotmail.co.uk','wkendcrow','Gabe','Monro','01736361564','Penzance',0),(262,'r.stedmon@btinternet.com','JOWAN1990','RUTH ','STEDMON','01736810931','Penzance',0),(261,'rizla200@hotmail.co.uk','maffia','','','01736788947','Penzance',0),(260,'dity_minx1989@yahoo.com','blackcat','','','TR19 7EF','Penzance',0),(259,'i_cjames@yahoo.co.uk','monkeyes','Ian','James','01736851228','Penzance',0),(258,'lynda.james2@btopenworld.com','7oranges','Inish Rath','Alverton Road','TR18 4TQ','Penzance',0),(257,'cpjl@talktalk.net','tempest65','','','tr274ln','Penzance',0),(256,'a-ridge@sky.com','cam15eron','Andy Ridge','','01736363498','Penzance',0),(255,'paulathomas101@btconnect.com','kllccj','25 Gurnick Road,','Newlyn,','01736361057','Penzance',0),(254,'stueycoops@hotmail.co.uk','coopsie','Stuart','Cooper','8 Penalverne Avenue','Penzance',0),(253,'smithk380@aol.com','shelley','','','01736364813','Penzance',0),(250,'jcoops007@aol.com','ryanedward','john cooper','','7917060497','Penzance',3),(252,'jvjenkin@live.co.uk','e566ucy','joanne','jenkin','07810801526','Penzance',0);
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
INSERT INTO `vouchers` VALUES (5,'SPEND &pound;15 AND GET FREE CAN OF DRINK AND PRAWN CRACKERS','ONLY 1 VOUCHER TO BE USED ANYTIME \r\n','active','all','2011-06-30',''),(3,'SPEND &pound;40 AND GET AN EXTRA DISH FREE AND FREE DELIVERY UP TO 5 MILES','ONLY 1 VOUCHER TO BE USED ANYTIME\r\n','active','all','2011-06-30',''),(1,'SPEND &pound;12 and GET FREE PRAWN CRACKERS','ONLY 1 VOUCHER TO BE USED ANYTIME\r\n','active','all','2011-06-30',''),(2,'SPEND &pound;25 AND GET AN EXTRA DISH FREE','ONLY 1 VOUCHER TO BE USED ANYTIME\r\n','active','all','2011-06-30',''),(6,'SPEND &pound;25 AND GET FREE DELIVERY UP TO 4 MILES AND FREE PRAWN CRACKERS','ONLY 1 VOUCHER TO BE USED ANYTIME \r\n','active','all','2011-06-30',''),(7,'SPEND &pound;20 AND GET 2 PANCAKE ROLLS FREE','ONLY 1 VOUCHER TO BE USED ANYTIME \r\n','inactive','all','2011-06-30',''),(8,'SPEND &pound;35 AND GET AN EXTRA FREE DISH AND TWO FREE PANCAKE ROLLS','ONLY 1 VOUCHER TO BE USED ANYTIME \r\n\r\n','inactive','all','2011-06-30','');
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

-- Dump completed on 2011-05-09 19:42:34
