-- phpMyAdmin SQL Dump
-- version 3.3.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2010 at 11:58 PM
-- Server version: 5.1.37
-- PHP Version: 5.2.10-2ubuntu6.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jadepalace`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `id_delivery` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `price` text NOT NULL,
  `takeaway` text NOT NULL,
  PRIMARY KEY (`id_delivery`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id_delivery`, `name`, `price`, `takeaway`) VALUES
(2, 'St.Austell East', '1.50', 'staustell'),
(3, 'St.Austell West', '1.00', 'staustell'),
(4, 'Trewoon', '1.50', 'staustell'),
(5, 'Foxhole', '2.00', 'staustell'),
(6, 'Polgooth/Sticker', '2.50', 'staustell'),
(7, 'Penwithick', '2.50', 'staustell'),
(8, 'St.Stephen', '2.50', 'staustell'),
(9, 'Mevagissey', '3.50', 'staustell'),
(10, 'Pentewan', '3.00', 'staustell'),
(11, 'Stenalees', '2.00', 'staustell'),
(12, 'for first 2 miles', '1.50', 'roche'),
(13, 'up to 4 miles', '2.50', 'roche'),
(14, 'per extra mile there after.', '1.00', 'roche'),
(15, 'Up to 2 miles', '1.50', 'truro'),
(16, 'Up to 4 miles', '2.50', 'truro'),
(17, 'Carharrack', '4.50', 'truro'),
(18, 'Carnon Downs/Deveron', '4.50', 'truro'),
(19, 'Crofthandy/St.Day', '3.50', 'truro'),
(20, 'Cusgarne', '4.50', 'truro'),
(21, 'Feock', '4.50', 'truro'),
(22, 'Frogpool', '5.50', 'truro'),
(23, 'Lanner', '5.50', 'truro'),
(24, 'Mithian', '3.50', 'truro'),
(25, 'Mount Hawke', '3.50', 'truro'),
(26, 'Perranworthal', '6.50', 'truro'),
(27, 'Penhallow/Porthtowan', '5.50', 'truro'),
(28, 'Perranwell', '6.50', 'truro'),
(29, 'Playing Place', '3.50', 'truro'),
(30, 'Probus', '6.50', 'truro'),
(31, 'St.Agnes', '5.50', 'truro'),
(32, 'St.Erme/Trispen', '6.50', 'truro'),
(33, 'Scorrier', '4.50', 'truro'),
(34, 'Shortlanesend', '3.50', 'truro'),
(35, 'Stithians', '9.50', 'truro'),
(36, 'Tresillian', '4.50', 'truro');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE IF NOT EXISTS `dishes` (
  `id_dish` int(11) NOT NULL AUTO_INCREMENT,
  `sort_number` text NOT NULL,
  `name` text NOT NULL,
  `price` text NOT NULL,
  `id_menu` text,
  PRIMARY KEY (`id_dish`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=201 ;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id_dish`, `sort_number`, `name`, `price`, `id_menu`) VALUES
(1, '1', 'Chicken & Sweetcorn Soup', '2.20', '1'),
(2, '2', 'Chicken & Mushroom Soup', '2.20', '1'),
(3, '3', 'Crabmeat & Sweetcorn Soup', '2.20', '1'),
(4, '4', 'Chicken Noodle Soup', '2.20', '1'),
(5, '5', 'Chinese Pancake Roll', '2.20', '1'),
(6, '6', 'Barbecue Spare Ribs', '4.80', '1'),
(7, '7', 'Aromatic Crispy Duck (Quarter) (Server with Pancake, Hoi Sin Sauce & Salad)', '7.20', '1'),
(8, '8', 'Mixed Dim Sum Selection (8)', '3.80', '1'),
(9, '9', 'Hot & Sour Soup', '2.50', '1'),
(10, '10', 'Sesame Prawn Toast', '2.80', '1'),
(11, '11', 'Spicy Chicken Triangles (3)', '2.80', '1'),
(12, '11a', 'Veg Pancake Rolls (2)', '2.80', '1'),
(13, '11b', 'Crispy Won Ton', '3.50', '1'),
(14, '11c', 'Skewered Satay Chicken', '3.50', '1'),
(15, '12', 'Chicken on Fried Rice with Barbecue Sauce', '4.60', '2'),
(16, '13', 'Chicken on Beansprouts with Barbecue Sauce', '4.60', '2'),
(17, '14', 'Chicken with Sweetcorn', '4.60', '2'),
(18, '15', 'Chicken with Babycorn', '4.60', '2'),
(19, '16', 'Chicken with Mushroom', '4.60', '2'),
(20, '17', 'Chicken with Straw Mushroom & Oyster Sauce', '4.60', '2'),
(21, '18', 'Chicken with Pineapple', '4.60', '2'),
(22, '19', 'Chicken with Ginger & Spring Onion', '4.80', '2'),
(23, '20', 'Chicken with Cashew Nuts & Green Pepper', '4.80', '2'),
(24, '21', 'Chicken Bamboo Shoots & Water Chestnuts', '4.60', '2'),
(25, '22', 'Chicken with Tomato', '4.60', '2'),
(26, '23', 'Chicken with Broccoli Spears & Oyster Sauce', '4.60', '2'),
(27, '24', 'Chicken with Green Pepper & Blackbean Sauce', '4.60', '2'),
(28, '25', 'Chicken with Vegetables & Szechuan Sauce', '4.60', '2'),
(29, '26', 'Chicken Chop Suey', '4.60', '2'),
(30, '27', 'Chicken in Satay Sauce', '4.60', '2'),
(31, '28', 'Chicken in Lemon Sauce', '4.80', '2'),
(51, '29', 'Beef on Beansprouts with Oyster Sauce', '4.70', '4'),
(34, '28a', 'Crispy Chilli Chicken', '4.80', '2'),
(35, '12a', 'Roast Pork on Fried Rice with Barbecue Sauce', '4.60', '3'),
(36, '13a', 'Roast Pork on Beansprouts with Barbecue Sauce', '4.60', '3'),
(37, '14a', 'Roast with Pork with Sweetcorn', '4.60', '3'),
(38, '15a', 'Roast Pork with Babycorn', '4.60', '3'),
(39, '16a', 'Roast Pork with Mushroom', '4.60', '3'),
(40, '17a', 'Roast Pork with Straw Mushroom & Oyster Sauce', '4.60', '3'),
(41, '18a', 'Roast Pork with Pineapple', '4.60', '3'),
(42, '19a', 'Roast Pork with Ginger & Sprint Onion', '4.80', '3'),
(43, '20a', 'Roast Pork with Cashew Nuts & Green Pepper', '4.80', '3'),
(44, '21a', 'Roast Pork with Bamboo Shoots & Water Chestnuts', '4.60', '3'),
(45, '22a', 'Roast Pork with Tomato', '4.60', '3'),
(46, '23a', 'Roast Pork with Broccoli Spears & Oyster Sauce', '4.60', '3'),
(47, '24a', 'Roast Pork with Green Pepper & Blackbean Sauce', '4.60', '3'),
(48, '25a', 'Roast Pork with Vegetables & Szechuan Sauce', '4.60', '3'),
(49, '26a', 'Roast Pork Chop Suey', '4.60', '3'),
(50, '27a', 'Roast Pork in Satay Sauce', '4.60', '3'),
(52, '30', 'Beef with Sweetcorn', '4.70', '4'),
(53, '31', 'Beef with Babycorn', '4.70', '4'),
(54, '32', 'Beef with Mushroom', '4.70', '4'),
(55, '33', 'Beef with Straw Mushroom & Oyster Sauce', '4.70', '4'),
(56, '34', 'Beef with Pineapple', '4.70', '4'),
(57, '35', 'Beef with Ginger & Spring Onion', '5.00', '4'),
(58, '36', 'Beef with Cashew Nuts & Green Pepper', '5.00', '4'),
(59, '37', 'Beef with Bamboo Shoots & Water Chestnuts', '4.70', '4'),
(60, '38', 'Beef with Tomato', '4.70', '4'),
(61, '39', 'Beef with Broccoli Spears & Oyster Sauce', '4.70', '4'),
(62, '40', 'Beef with Green Pepper & Blackbean Sauce', '4.70', '4'),
(63, '41', 'Beef with Vegetables & Szechuan Sauce', '4.70', '4'),
(64, '42', 'Beef Chop Suey', '4.70', '4'),
(65, '43', 'Beef in Satay Sauce', '4.70', '4'),
(66, '44', 'Crispy Beef in Chilli Sauce', '5.00', '4'),
(67, '45', 'King Prawn on Beansprouts with Oyster Sauce', '5.40', '5'),
(68, '46', 'King Prawn with Sweetcorn', '5.40', '5'),
(69, '47', 'King Prawn with Babycorn', '5.40', '5'),
(70, '48', 'King Prawn with Mushroom', '5.40', '5'),
(71, '49', 'King Prawn with Straw Mushroom & Oyster Sauce', '5.40', '5'),
(72, '50', 'King Prawn with Pineapple', '5.40', '5'),
(73, '51', 'King Prawn with Ginger & Spring Onion', '5.40', '5'),
(74, '52', 'King Prawn with Cashew Nuts & Green Pepper', '5.40', '5'),
(75, '53', 'King Prawn with Bamboo Shoots & Water Chestnuts', '5.40', '5'),
(76, '54', 'King Prawn with Tomato', '5.40', '5'),
(77, '55', 'King Prawn with Broccoli Spears & Oyster Sauce', '5.40', '5'),
(78, '56', 'King Prawn with Green Pepper & Blackbean Sauce', '5.40', '5'),
(79, '57', 'Kings Prawn with Vegetables & Szechuan Sauce', '5.40', '5'),
(80, '58', 'King Prawn Chop Suey', '5.40', '5'),
(81, '59', 'King Prawn in Satay Sauce', '5.40', '5'),
(82, '60', 'King Prawn in Batter with Lemon Sauce', '5.40', '5'),
(83, '60a', 'Crispy Chilli King Prawn', '5.40', '5'),
(84, '61', 'Roast Duck on Fried Rice with Barbecue Sauce', '5.50', '6'),
(85, '62', 'Roast Duck on Beansprouts with Barbecue Sauce', '5.50', '6'),
(86, '63', 'Roast Duck with Mushroom', '5.50', '6'),
(87, '64', 'Roast Duck with Pineapple', '5.50', '6'),
(88, '65', 'Roast Duck with Ginger & Spring Onion', '5.50', '6'),
(89, '66', 'Roast Duck with Broccoli Spears & Oyster Sauce', '5.50', '6'),
(90, '67', 'Roast Duck in Satay Sauce', '5.50', '6'),
(91, '68', 'Roast Duck in Orange Sauce', '5.50', '6'),
(92, '69', 'Roast Duck in Plum Sauce', '5.50', '6'),
(93, '69a', 'Roast Duck Curry', '5.50', '6'),
(94, '70', 'Chicken Foo Young', '4.40', '7'),
(95, '71', 'Prawn Foo Young', '4.90', '7'),
(96, '72', 'King Prawn Foo Young', '5.30', '7'),
(97, '73', 'Special Foo Young', '4.60', '7'),
(98, '74', 'Chicken Chow Mein', '4.60', '8'),
(99, '75', 'Beef Chow Mein', '4.80', '8'),
(100, '76', 'Prawn Chow Mein', '5.10', '8'),
(101, '77', 'King Prawn Chow Mein', '5.30', '8'),
(102, '78', 'Chinese Roast Pork Chow Mein', '4.60', '8'),
(103, '79', 'Special Chow Mein', '4.90', '8'),
(104, '80', 'Jade Palace Special with Noodles', '5.00', '8'),
(105, '81', 'Singapore Chow Mein', '5.00', '8'),
(106, '82', 'Chicken Curry', '4.70', '9'),
(107, '83', 'Beef Curry', '4.90', '9'),
(108, '84', 'Prawn Curry', '5.00', '9'),
(109, '85', 'King Prawn Curry', '5.40', '9'),
(110, '86', 'Chinese Roast Pork Curry', '4.70', '9'),
(111, '87', 'Mixed Meat Curry', '5.00', '9'),
(112, '88', 'Sweet & Sour Chicken in Batter (10)', '4.70', '10'),
(113, '89', 'Sweet & Sour King Prawn in Batter (10)', '5.40', '10'),
(114, '90', 'Sweet & Sour Spare Ribs', '5.00', '10'),
(115, '91', 'Sweet & Sour Duck', '5.40', '10'),
(116, '92', 'Chicken Fried Rice', '4.50', '11'),
(117, '93', 'Beef Fried Rice', '4.70', '11'),
(118, '94', 'Prawn Fried Rice', '5.00', '11'),
(119, '95', 'King Prawn Fried Rice', '5.20', '11'),
(120, '96', 'Chinese Roast Pork Fried Rice', '4.50', '11'),
(121, '97', 'Special Fried Rice', '4.70', '11'),
(122, '98', 'Jade Palace Special with Fried Rice', '4.90', '11'),
(123, '99', 'Singapore Fried Rice (Hot & Spicy)', '4.90', '11'),
(124, '100', 'Chicken with Onion in our Chef''s Special Cantonese Sauce', '4.90', '12'),
(125, '101', 'Beef with Onion in our Chef''s Special Cantonese Sauce', '5.10', '12'),
(126, '102', 'King Prawn with Onion in our Chef''s Special Cantonese Sauce (10)', '5.40', '12'),
(127, '103', 'Mixed Meat with Onion in our Chef''s Special Cantonese Sauce', '5.40', '12'),
(128, '104', 'Sweet & Sour Chicken Hong Kong Style', '4.90', '12'),
(129, '105', 'Spare Ribs Cantonese Style', '5.40', '12'),
(130, '106', 'Mixed Vegetable Foo Young', '4.40', '13'),
(131, '106a', 'Mushroom Foo Young', '4.40', '13'),
(132, '106b', 'Onion Foo Young', '4.40', '13'),
(133, '107', 'Mixed Vegetable in Blackbean Sauce', '4.40', '13'),
(134, '108', 'Mixed Vegetable in Satay Sauce', '4.40', '13'),
(135, '109', 'Mixed Vegetable in Sweet & Sour Sauce', '4.40', '13'),
(136, '110', 'Mixed Vegetable Curry', '4.40', '13'),
(137, '110a', 'Mushroom Curry', '4.40', '13'),
(138, '111', 'Mixed Vegetable Chow Mein', '4.40', '13'),
(139, '111a', 'Mushroom Chow Mein', '4.40', '13'),
(140, '112', 'Mixed Vegetable in Oyster Sauce', '4.40', '13'),
(141, '113', 'Mixed Vegetables in our Chef''s Special Cantonese Sauce', '4.40', '13'),
(142, '114', 'Mushroom Fried Rice', '4.40', '13'),
(143, '115', 'Roast Chicken & Chips', '4.70', '14'),
(144, '117', 'Chicken Omelette & Chips', '5.10', '14'),
(145, '118', 'Prawn Omelette & Chips', '5.60', '14'),
(146, '119', 'King Prawn Omelette & Chips', '5.90', '14'),
(147, '120', 'Mushroom Omelette & Chips', '4.90', '14'),
(148, '121', 'Chicken Balls (9) & Chips', '4.60', '14'),
(149, '122', 'Two Sausages & Chips ', '3.00', '14'),
(150, '123', 'Mixed Meat Satay', '5.20', '15'),
(151, '124', 'Mixed Meat in Blackbean Sauce', '5.20', '15'),
(152, '125', 'Mixed Meat Chop Suey', '5.20', '15'),
(153, '126', 'Mixed Meat Szechuan', '5.20', '15'),
(154, '127', 'Mixed Meat Kung Po', '5.20', '15'),
(155, '128', 'Kung Po Chicken', '5.00', '16'),
(156, '129', 'Kung Po King Prawn', '5.30', '16'),
(157, '130', 'Kung Po Vegetable', '4.50', '16'),
(158, '131', 'Kung Po Beef', '5.10', '16'),
(159, '132', 'Kung Po Duck', '5.50', '16'),
(160, '', 'Boiled Rice', '2.10', '17'),
(161, '', 'Egg Fried Rice', '2.10', '17'),
(162, '', 'Fried Soft Noodles', '2.40', '17'),
(163, '', 'Mushrooms', '2.40', '17'),
(164, '', 'Beansprouts', '2.30', '17'),
(165, '', 'Bamboo Shoots & Water Chestnuts', '2.30', '17'),
(166, '', 'Mixed Chinese Vegetables', '3.10', '17'),
(167, '', 'Sweet & Sour Sauce', '1.50', '17'),
(168, '', 'Curry Sauce', '1.50', '17'),
(170, '', 'Barbecue Sauce', '1.50', '17'),
(171, '', 'Cantonese Sauce', '1.50', '17'),
(172, '', 'Satay Sauce', '1.50', '17'),
(173, '', 'Chilli Sauce', '1.50', '17'),
(174, '', 'Blackbean Sauce', '1.50', '17'),
(175, '', 'Kung po Sauce', '1.50', '17'),
(176, '', 'Hoi Sin Sauce', '1.50', '17'),
(177, '', 'Plum Sauce', '1.50', '17'),
(178, '', 'Chips', '1.50', '17'),
(179, '', 'Onion Rings', '2.10', '17'),
(180, '', 'Fried Onions', '2.10', '17'),
(181, '', 'Prawn Crackers', '1.30', '17'),
(182, '', 'Banana Friter ', '2.40', '18'),
(183, '', 'Pineapple Fritter', '2.40', '18'),
(184, 'Sp1', 'Salt & Pepper Chicken', '4.70', 'special'),
(185, 'Sp2', 'Salt & Pepper Chicken Wings', '4.00', 'special'),
(186, 'Sp3', 'Salt & Pepper Cantonese Spare Ribs', '5.10', 'special'),
(187, 'Sp4', 'Squid with Green Pepper & Black Bean Sauce', '5.10', 'special'),
(188, 'Sp5', 'Squid with Green Pepper & Satay Sauce', '5.10', 'special'),
(189, 'Sp6', 'Duck Fried Rice with Spring Onion', '5.40', 'special'),
(190, 'Sp7', 'Duck Chow Mein', '5.40', 'special'),
(191, 'Sp8', 'Ham Foo Young', '4.50', 'special'),
(192, 'Sp9', 'Fresh Vegetable Fried Rice', '4.20', 'special'),
(193, 'Sp10', 'Crispy Seaweed', '3.20', 'special'),
(194, 'Sp11', 'Barbecue Spare Ribs with Honey', '5.00', 'special'),
(195, 'Sp12', 'Crispy Chilli Squid', '5.10', 'special'),
(196, 'Sp13', 'Salt & Pepper Squid', '5.10', 'special'),
(197, 'Sp14', 'Sweet & Sour Pork Balls', '4.80', 'special'),
(198, 'Can', 'Can of Drink', '0.80p', 'drinks');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id_menu`, `name`) VALUES
(1, '<font size=5>Starters</font>\r\n'),
(2, 'Chicken Dishes'),
(3, 'Chinese Roast Pork Dishes'),
(4, 'Beef Dishes'),
(5, 'King Prawn Dishes (10)'),
(6, 'Chinese Roast Duck Dishes'),
(7, 'Foo Young Dishes (Chinese Omelette)'),
(8, 'Noodle Dishes'),
(9, 'Curry Dishes (Rice Not Included)'),
(10, 'Sweet &amp; Sour Dishes'),
(11, 'Fried Rice Dishes'),
(12, 'Cantonese Dishes'),
(13, 'Vegetable Dishes'),
(14, 'English Dishes'),
(15, 'Mixed Meat Dishes'),
(16, 'Kung Po Dishes'),
(17, 'Side Portions'),
(18, 'Sweets');

-- --------------------------------------------------------

--
-- Table structure for table `sets`
--

CREATE TABLE IF NOT EXISTS `sets` (
  `id_sets` int(11) NOT NULL AUTO_INCREMENT,
  `sort_number` text NOT NULL,
  `name` text NOT NULL,
  `price` text NOT NULL,
  `dishes` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id_sets`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='sets' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sets`
--

INSERT INTO `sets` (`id_sets`, `sort_number`, `name`, `price`, `dishes`, `type`) VALUES
(1, 'M1', 'Set Meal For One', '7.80', '<ul>\r\n<li>Sweet & Sour Chicken (5)</li>\r\n<li>Beef Chop Suey</li>\r\n<li>Egg Fried Rice</li>\r\n</ul>', 'chinese'),
(2, 'M2', 'Set Meal For Two', '18.00', '<ul>	\r\n<li>Pancake Rolls or Barbecue Spare Ribs</li>\r\n<li>Sweet & Sour Chicken(10)</li>\r\n<li>Special Foo Young Beef & Mushroom</li>\r\n<li>Special Fried Rice</li>\r\n</ul>	', 'chinese'),
(3, 'M3', 'Set Meal For Three', '25.00', '<ul>\r\n<li>Barbecue Spare Ribs or Pancake Rolls</li>\r\n<li>Sweet & Sour King Prawns (9)</li>\r\n<li>Chicken with Cashew Nuts & Green Pepper</li>\r\n<li>Beef Chop Suey</li>\r\n<li>Special Foo Young</li>\r\n<li>Special Fried Rice</li>\r\n</ul>', 'chinese'),
(4, 'M4', 'Set Meal For Four', '32.00', '<ul>\r\n<li>Barbecue Spare Ribs or Pancake Rolls</li>\r\n<li>Sweet & Sour Chicken (12)</li>\r\n<li>Beef & Mushroom</li>\r\n<li>King Prawn with Cashew Nuts & Green Pepper</li>\r\n<li>Chinese Roast Pork on Beansprouts with Barbecue Sauce</li>\r\n<li>Chicken & Pineapple</li>\r\n<li>Special Fried Rice</li>\r\n</ul>\r\n', 'chinese'),
(5, 'M5', 'Set Meal For Five', '42.00', '<ul>\r\n<li>Barbecue Spare Ribs or Pancake Rolls</li>\r\n<li>Sweet & Sour Chicken (15)</li>\r\n<li>Duck with Pineapple</li>\r\n<li>King Prawn with Mushroom\r\nBeef Chop</li>\r\n<li>Special Foo Young</li>\r\n<li>Special Fried</li>\r\n<li>Chinese Roast Pork on Beansprouts with Barbecue</li>\r\n</ul>', 'chinese'),
(6, 'C1', 'Set Meal For One', '8.50', '<ul>\r\n<li>Sesame Prawn Toast</li>\r\n<li>Sweet & Sour Hong Kong Style</li>\r\n<li>Special Fried Rice</li>\r\n</ul>', 'cantonese'),
(7, 'C2', 'Set Meal For Two', '18.00', '<ul>\r\n<li>Aromatic Crispy Duck (Quarter)</li>\r\n<li>Chicken in Blackbean Sauce</li>\r\n<li>Beef Cantonese Style</li>\r\n<li>Special Fried Rice</li>\r\n</ul>', 'cantonese'),
(8, 'C3', 'Set Meal For Three', '23.00', '<ul>\r\n<li>Spare Ribs Cantonese Style</li>\r\n<li>King Prawn in Satay Sauce</li>\r\n<li>Beef in Blackbean Sauce</li>\r\n<li>Special Fried Rice</li>\r\n<li>Sweet & Sour Chicken Hong Kong Style</li>\r\n</ul>', 'cantonese'),
(9, 'C4', 'Set Meal For Four', '30.00', '<ul>\r\n<li>Spare Ribs Cantonese Style</li>\r\n<li>Sesame Prawn Toast</li>\r\n<li>Vegetables in Satay Sauce</li>\r\n<li>Chicken Cantonese Style</li>\r\n<li>Beef in Blackbean Sauce</li>\r\n<li>Special Fried Rice</li>\r\n<li>Prawn Crackers</li>\r\n</ul>', 'cantonese'),
(10, 'C5', 'Set Meal For Five', '42.00', '<ul>\r\n<li>Aromatic Crispy Duck (Half)</li>\r\n<li>Sesame Prawn Toast</li>\r\n<li>Sweet & Sour Hong Kong Style</li>\r\n<li>Beef in Satay Sauce</li>\r\n<li>King Prawn in Blackbean Sauce</li>\r\n<li>Chicken in Cantonese Sauce</li>\r\n<li>Special Fried Rice</li>\r\n</ul>', 'cantonese');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user key',
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `number` text NOT NULL,
  `region` text NOT NULL,
  PRIMARY KEY (`id_user`),
  FULLTEXT KEY `region` (`region`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Jade Palace Users Table' AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `name`, `surname`, `number`, `region`) VALUES
(25, 'rzdziech12@gmail.com', '', 'Rafal', 'Zdziech', '07907928536', 'St.Austell'),
(23, 'rzdziech@gmail.com', '', 'Rafal', 'Zdziech', '07907928536', 'St.Austell'),
(24, 'rzdziech1@gmail.com', '', 'Rafal', 'Zdziech', '07907928536', 'St.Austell');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE IF NOT EXISTS `vouchers` (
  `id_discount` int(11) NOT NULL AUTO_INCREMENT,
  `offer` text NOT NULL,
  `description` text NOT NULL,
  `status` text NOT NULL,
  `scale` text NOT NULL,
  `valid` date NOT NULL,
  `restrict` text NOT NULL,
  PRIMARY KEY (`id_discount`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='discount and offers' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id_discount`, `offer`, `description`, `status`, `scale`, `valid`, `restrict`) VALUES
(1, 'SPEND &pound;12 and GET FREE PRAWN CRACKERS', 'ONLY 1 VOUCHER TO BE USED ANYTIME\r\nVALID UNTIL END OF AUGUST', 'active', 'all', '2010-08-31', 'VOUCHERS NOT VALID ON SATURDAYS'),
(2, 'SPEND &pound;25 AND GET AN EXTRA DISH FREE', 'ONLY 1 VOUCHER TO BE USED ANYTIME\r\nVALID UNTIL END OF AUGUST\r\nNOT TO INCLUDE DUCK DISHES', 'active', 'all', '2010-08-31', 'VOUCHERS NOT VALID ON SATURDAYS'),
(3, 'SPEND &pound;40 AND GET AN EXTRA DISH FREE AND FREE DELIVERY UP TO 5 MILES', 'ONLY 1 VOUCHER TO BE USED ANYTIME\r\nVALID UNTIL END OF AUGUST\r\nNOT TO INCLUDE DUCK DISHES', 'active', 'all', '2010-08-31', 'VOUCHERS NOT VALID ON SATURDAYS'),
(5, 'SPEND &pound;15 AND GET FREE CAN OF DRINK AND PRAWN CRACKERS', 'ONLY 1 VOUCHER TO BE USED ANYTIME \r\nVALID UNTIL END OF AUGUST\r\nNOT TO INCLUDE DUCK DISHES', 'active', 'all', '2010-08-31', 'VOUCHERS NOT VALID ON SATURDAYS');
