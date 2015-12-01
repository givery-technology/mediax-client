

DROP TABLE IF EXISTS `dev_semcheck`.`contactus`;
DROP TABLE IF EXISTS `dev_semcheck`.`durations`;
DROP TABLE IF EXISTS `dev_semcheck`.`emaildb`;
DROP TABLE IF EXISTS `dev_semcheck`.`enduser`;
DROP TABLE IF EXISTS `dev_semcheck`.`engines`;
DROP TABLE IF EXISTS `dev_semcheck`.`extra`;
DROP TABLE IF EXISTS `dev_semcheck`.`keywords`;
DROP TABLE IF EXISTS `dev_semcheck`.`logs`;
DROP TABLE IF EXISTS `dev_semcheck`.`m_rankhistories`;
DROP TABLE IF EXISTS `dev_semcheck`.`nocontractkey`;
DROP TABLE IF EXISTS `dev_semcheck`.`notice`;
DROP TABLE IF EXISTS `dev_semcheck`.`orders`;
DROP TABLE IF EXISTS `dev_semcheck`.`quote_supportor`;
DROP TABLE IF EXISTS `dev_semcheck`.`rankhistory`;
DROP TABLE IF EXISTS `dev_semcheck`.`rankhistoryss`;
DROP TABLE IF EXISTS `dev_semcheck`.`rankkeywords`;
DROP TABLE IF EXISTS `dev_semcheck`.`ranklogs`;
DROP TABLE IF EXISTS `dev_semcheck`.`ranks`;
DROP TABLE IF EXISTS `dev_semcheck`.`resell_endcustom`;
DROP TABLE IF EXISTS `dev_semcheck`.`sales_goals`;
DROP TABLE IF EXISTS `dev_semcheck`.`sales_keywords`;
DROP TABLE IF EXISTS `dev_semcheck`.`sendemail`;
DROP TABLE IF EXISTS `dev_semcheck`.`seohistory`;
DROP TABLE IF EXISTS `dev_semcheck`.`servers`;
DROP TABLE IF EXISTS `dev_semcheck`.`servicelog`;
DROP TABLE IF EXISTS `dev_semcheck`.`syslog`;
DROP TABLE IF EXISTS `dev_semcheck`.`tmp`;
DROP TABLE IF EXISTS `dev_semcheck`.`tmp_rankhistory`;
DROP TABLE IF EXISTS `dev_semcheck`.`user`;


CREATE TABLE `dev_semcheck`.`contactus` (
	`subject` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`body` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`userid` int(11) DEFAULT 0 NOT NULL,
	`date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`status` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`id` int(20) NOT NULL AUTO_INCREMENT,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`durations` (
	`ID` int(10) NOT NULL AUTO_INCREMENT,
	`KeyID` int(8) DEFAULT 0 NOT NULL,
	`StartDate` int(8) DEFAULT 0 NOT NULL,
	`EndDate` int(8) DEFAULT 0 NOT NULL,
	`Flag` int(2) DEFAULT 0 NOT NULL,
	`created` datetime NOT NULL,
	`updated` datetime NOT NULL,	PRIMARY KEY  (`ID`)) 	DEFAULT CHARSET=sjis,
	COLLATE=sjis_japanese_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`emaildb` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`company` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
	`name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
	`tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
	`email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
	`content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
	`time` int(12) DEFAULT 0 NOT NULL,
	`ip` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
	`supportor` int(4) DEFAULT 0 NOT NULL,
	`status` int(4) DEFAULT 0 NOT NULL,
	`userid` int(5) DEFAULT 0 NOT NULL,
	`subject` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_unicode_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`enduser` (
	`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`supportor` int(4) DEFAULT 0 NOT NULL,
	`pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`company` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`department` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`fax` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`homepage` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`remark` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`status` int(10) UNSIGNED DEFAULT 0 NOT NULL,
	`date` int(12) UNSIGNED DEFAULT 0 NOT NULL,
	`address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`zipcode` varchar(115) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`CHPCode` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`CHPTime` int(11) DEFAULT 0 NOT NULL,
	`hosyou` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`seikou` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`loginip` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`logintime` int(14) DEFAULT 0 NOT NULL,
	`agent` int(1) DEFAULT 0 NOT NULL,
	`money_bank` tinyint(1) DEFAULT '0' NOT NULL,
	`sellremark` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`techremark` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`billlastday` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`parent` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`custom` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`keystr` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`created` datetime NOT NULL,
	`updated` datetime NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_unicode_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`engines` (
	`ID` int(2) NOT NULL AUTO_INCREMENT,
	`Name` varchar(20) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL,
	`ShowName` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`Short` varchar(10) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL,
	`Code` int(4) DEFAULT 0 NOT NULL,	PRIMARY KEY  (`ID`)) 	DEFAULT CHARSET=sjis,
	COLLATE=sjis_japanese_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`extra` (
	`ID` int(8) NOT NULL AUTO_INCREMENT,
	`KeyID` int(6) DEFAULT 0 NOT NULL,
	`ExtraType` int(2) DEFAULT 0 NOT NULL COMMENT '1 - in top 5, 2 - in top 3',
	`Price` int(10) DEFAULT 0 NOT NULL,	PRIMARY KEY  (`ID`),
	KEY `keyi` (`KeyID`)) 	DEFAULT CHARSET=sjis,
	COLLATE=sjis_japanese_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`keywords` (
	`ID` int(8) NOT NULL AUTO_INCREMENT,
	`UserID` int(6) DEFAULT 0 NOT NULL,
	`server_id` int(20) DEFAULT NULL,
	`Keyword` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`Url` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`Engine` int(4) DEFAULT 0 NOT NULL,
	`g_local` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '1' NOT NULL,
	`cost` int(10) DEFAULT 0,
	`Price` int(10) DEFAULT 0 NOT NULL,
	`limit_price` int(10) DEFAULT NULL,
	`limit_price_group` int(1) DEFAULT NULL COMMENT 'set limit price group: 1,2,3',
	`upday` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '0' NOT NULL,
	`goukeifee` int(11) DEFAULT 0 NOT NULL,
	`sengoukeifee` int(11) DEFAULT 0 NOT NULL,
	$sensengoukeifee int(11) DEFAULT 0 NOT NULL,
	`Enabled` tinyint(1) DEFAULT '0' NOT NULL,
	`Strict` tinyint(1) DEFAULT '0' NOT NULL,
	`Extra` tinyint(1) DEFAULT '0' NOT NULL,
	`start` int(8) DEFAULT 0 NOT NULL,
	`rankstart` int(8) DEFAULT 0 NOT NULL,
	`rankend` int(8) DEFAULT 0 NOT NULL,
	`kaiyaku_reason` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`middle` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`middleinfo` int(11) NOT NULL,
	`seika` int(11) DEFAULT 0 NOT NULL,
	`nocontract` int(11) DEFAULT 0 NOT NULL,
	`csv_type` int(10) NOT NULL COMMENT '[1=直営,2=直営2 , 3=代理店,4=ビスカス,5=アサミ,6=エニー]',
	`penalty` tinyint(1) NOT NULL,
	`service` int(5) NOT NULL,
	`mobile` tinyint(1) NOT NULL,
	`c_logic` tinyint(1) NOT NULL COMMENT 'Ranking restricted to company logic',
	`sales` tinyint(1) DEFAULT NULL,
	`created` datetime NOT NULL,
	`updated` datetime NOT NULL,
	`sitename` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'CSV',	PRIMARY KEY  (`ID`),
	KEY `ke` (`UserID`, `Enabled`),
	KEY `Price` (`Price`),
	KEY `Engine` (`Engine`),
	FULLTEXT KEY `Keyword` (`Keyword`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_unicode_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`logs` (
	`id` int(20) NOT NULL AUTO_INCREMENT,
	`user_id` int(20) NOT NULL,
	`log` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'pre&after data log',
	`ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`useragent` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`mvc` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`read` tinyint(1) NOT NULL,
	`created` datetime NOT NULL,
	`updated` datetime NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `dev_semcheck`.`m_rankhistories` (
	`id` int(20) NOT NULL AUTO_INCREMENT,
	`keyword_id` int(11) NOT NULL,
	`engine_id` int(1) NOT NULL,
	`keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`rank` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`rankdate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`created` datetime NOT NULL,
	`updated` datetime NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `dev_semcheck`.`nocontractkey` (
	`ID` int(8) NOT NULL AUTO_INCREMENT,
	`UserID` int(6) DEFAULT 0 NOT NULL,
	`Keyword` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`Url` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`Engine` int(4) DEFAULT 0 NOT NULL,
	`Price` int(10) DEFAULT 0 NOT NULL,
	`upday` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '0' NOT NULL,
	`goukeifee` int(11) DEFAULT 0 NOT NULL,
	`sengoukeifee` int(11) DEFAULT 0 NOT NULL,
	$sensengoukeifee int(11) DEFAULT 0 NOT NULL,
	`Enabled` tinyint(1) DEFAULT '0' NOT NULL,
	`Strict` tinyint(1) DEFAULT '0' NOT NULL,
	`Extra` tinyint(1) DEFAULT '0' NOT NULL,
	`start` int(8) DEFAULT 0 NOT NULL,
	`rankstart` int(8) DEFAULT 0 NOT NULL,
	`rankend` int(8) DEFAULT 0 NOT NULL,
	`kaiyaku_reason` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`middle` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`middleinfo` int(11) NOT NULL,	PRIMARY KEY  (`ID`),
	KEY `ke` (`UserID`, `Enabled`),
	KEY `Price` (`Price`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_unicode_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`notice` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`label` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`history` date NOT NULL,
	`created` datetime NOT NULL,
	`updated` datetime NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`orders` (
	`ID` int(6) NOT NULL AUTO_INCREMENT,
	`UserID` int(6) DEFAULT 0 NOT NULL,
	`Keywords` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`Url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`TotalPrice` int(10) DEFAULT 0 NOT NULL,
	`Enabled` tinyint(1) DEFAULT '0' NOT NULL,
	`OrderDate` int(11) DEFAULT 0 NOT NULL,
	`EnableDate` int(11) DEFAULT 0 NOT NULL,	PRIMARY KEY  (`ID`)) 	DEFAULT CHARSET=sjis,
	COLLATE=sjis_japanese_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`quote_supportor` (
	`supportorid` int(12) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,	PRIMARY KEY  (`supportorid`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`rankhistory` (
	`ID` int(11) NOT NULL AUTO_INCREMENT,
	`KeyID` int(8) DEFAULT 0 NOT NULL,
	`Url` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`Rank` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`RankDate` int(11) DEFAULT 0 NOT NULL,
	`params` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`created` datetime NOT NULL,
	`updated` datetime NOT NULL,	PRIMARY KEY  (`ID`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`rankhistoryss` (
	`ID` int(11) NOT NULL AUTO_INCREMENT,
	`KeyID` int(8) DEFAULT 0 NOT NULL,
	`Url` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`Rank` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`RankDate` int(11) DEFAULT 0 NOT NULL,	PRIMARY KEY  (`ID`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`rankkeywords` (
	`ID` int(11) NOT NULL AUTO_INCREMENT,
	`Keyword` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`google_jp` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`yahoo_jp` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`google_en` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`yahoo_en` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`bing` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,	PRIMARY KEY  (`ID`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`ranklogs` (
	`id` int(20) NOT NULL AUTO_INCREMENT,
	`keyword_id` int(20) NOT NULL,
	`engine_id` int(20) NOT NULL,
	`keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`rank` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`params` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`rankdate` date NOT NULL,
	`created` datetime NOT NULL,
	`modified` datetime NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_unicode_ci,
	ENGINE=InnoDB;

CREATE TABLE `dev_semcheck`.`ranks` (
	`id` int(20) NOT NULL AUTO_INCREMENT,
	`keyword_id` int(20) NOT NULL,
	`engine_id` int(5) NOT NULL,
	`keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`rank` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`rankdate` date NOT NULL,
	`created` datetime NOT NULL,
	`updated` datetime NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `dev_semcheck`.`resell_endcustom` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`resellid` int(11) DEFAULT 0 NOT NULL,
	`customid` int(11) DEFAULT 0 NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`sales_goals` (
	`id` int(20) NOT NULL AUTO_INCREMENT,
	`type` int(11) NOT NULL COMMENT '1:seika montly 2:seika daily',
	`goal` int(11) NOT NULL,
	`target` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'target day, month or year',
	`date` date NOT NULL,
	`created` datetime NOT NULL,
	`modified` datetime NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `dev_semcheck`.`sales_keywords` (
	`id` int(20) NOT NULL AUTO_INCREMENT,
	`keyword_id` int(20) NOT NULL,
	`user_id` int(20) NOT NULL,
	`keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`rank` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`sales` int(10) NOT NULL,
	`cost` int(10) NOT NULL,
	`profit` int(10) NOT NULL,
	`limit` int(5) NOT NULL,
	`date` date NOT NULL,
	`created` datetime NOT NULL,
	`updated` datetime NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `dev_semcheck`.`sendemail` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`status` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`seohistory` (
	`ID` int(4) NOT NULL AUTO_INCREMENT,
	`KeyID` int(4) DEFAULT 0 NOT NULL,
	`Remark` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`Finish` tinyint(1) DEFAULT '0' NOT NULL,
	`AddDate` int(11) DEFAULT 0 NOT NULL,	PRIMARY KEY  (`ID`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_unicode_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`servers` (
	`id` int(20) NOT NULL AUTO_INCREMENT,
	`code` int(1) NOT NULL COMMENT 'Server Code',
	`name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`api` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`memo` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`created` datetime NOT NULL,
	`updated` timestamp NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `dev_semcheck`.`servicelog` (
	`ID` int(10) NOT NULL AUTO_INCREMENT,
	`LogTime` int(11) DEFAULT 0 NOT NULL,
	`KeyID` int(8) DEFAULT 0 NOT NULL,
	`Content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`Type` int(2) DEFAULT 0 NOT NULL,
	`Checked` tinyint(1) DEFAULT '0' NOT NULL,	PRIMARY KEY  (`ID`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_unicode_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`syslog` (
	`ID` int(10) NOT NULL AUTO_INCREMENT,
	`LogTime` int(11) DEFAULT 0 NOT NULL,
	`Content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`ip` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,	PRIMARY KEY  (`ID`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_unicode_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`tmp` (
	`ID` int(11) DEFAULT 0 NOT NULL,
	`KeyID` int(8) DEFAULT 0 NOT NULL,
	`Url` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`Rank` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`RankDate` int(11) DEFAULT 0 NOT NULL,
	`params` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`created` datetime NOT NULL,
	`updated` datetime NOT NULL	) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `dev_semcheck`.`tmp_rankhistory` (
	`ID` int(11) DEFAULT 0 NOT NULL,
	`KeyID` int(8) DEFAULT 0 NOT NULL,
	`Url` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`Rank` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`RankDate` int(11) DEFAULT 0 NOT NULL,
	`params` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`created` datetime NOT NULL,
	`updated` datetime NOT NULL	) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `dev_semcheck`.`user` (
	`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`supportor` int(4) DEFAULT 0 NOT NULL,
	`pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`company` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`department` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`fax` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`homepage` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`remark` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`status` int(10) UNSIGNED DEFAULT 0 NOT NULL,
	`date` int(12) UNSIGNED DEFAULT 0 NOT NULL,
	`address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`zipcode` varchar(115) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`CHPCode` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`CHPTime` int(11) DEFAULT 0 NOT NULL,
	`hosyou` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`seikou` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`loginip` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`logintime` int(14) DEFAULT 0 NOT NULL,
	`agent` int(1) DEFAULT 0 NOT NULL,
	`money_bank` tinyint(1) DEFAULT '0' NOT NULL,
	`sellremark` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`techremark` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`billlastday` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '翌月末' NOT NULL,
	`password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`role` int(5) DEFAULT NULL,
	`created` datetime NOT NULL,
	`updated` datetime NOT NULL,
	`logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`limit_price_multi` int(10) DEFAULT NULL,
	`limit_price_multi2` int(10) DEFAULT NULL,
	`limit_price_multi3` int(10) DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_unicode_ci,
	ENGINE=MyISAM;

