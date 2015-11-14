-- 
-- Table structure for table `mailinglist_blacklist`
-- 

CREATE TABLE `mailinglist_blacklist` (
  `rule` varchar(50) default NULL
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Table structure for table `mailinglist_drafts`
-- 

CREATE TABLE `mailinglist_drafts` (
  `id` varchar(32) NOT NULL default '0',
  `subject` varchar(255) NOT NULL default '',
  `message` text NOT NULL,
  `texthtml` tinyint(1) NOT NULL default '0',
  `lastsaved` varchar(10) NOT NULL default '',
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Table structure for table `mailinglist_messages`
-- 

CREATE TABLE `mailinglist_messages` (
  `id` int(11) NOT NULL auto_increment,
  `subject` varchar(100) default NULL,
  `message` text NOT NULL,
  `created` varchar(10) NOT NULL default '',
  `queued` varchar(10) default NULL,
  `count` int(11) NOT NULL default '0',
  `format` varchar(4) NOT NULL default 'text',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=59 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `mailinglist_queue`
-- 

CREATE TABLE `mailinglist_queue` (
  `message_id` int(11) NOT NULL default '0',
  `address` varchar(100) NOT NULL default '',
  `send_after` varchar(10) NOT NULL default ''
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Table structure for table `mailinglist_subscribers`
-- 

CREATE TABLE `mailinglist_subscribers` (
  `address` varchar(100) NOT NULL default '',
  `userkey` varchar(32) NOT NULL default '',
  `confirmed` tinyint(1) NOT NULL default '0',
  `last_sub_req_date` varchar(10) NOT NULL default '',
  `bounce_count` smallint(6) default '0',
  PRIMARY KEY  (`address`)
) TYPE=MyISAM;
