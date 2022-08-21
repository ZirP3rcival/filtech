/*
SQLyog Ultimate v9.50 
MySQL - 5.5.5-10.1.31-MariaDB : Database - ftwadb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ftwadb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ftwadb`;

/*Table structure for table `ft2_asmt_data_en` */

DROP TABLE IF EXISTS `ft2_asmt_data_en`;

CREATE TABLE `ft2_asmt_data_en` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `sid` int(5) DEFAULT NULL,
  `qno` int(15) DEFAULT NULL,
  `ans` varchar(50) DEFAULT NULL,
  `aky` varchar(50) DEFAULT NULL,
  `ascode` varchar(10) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `asid` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sid` (`sid`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `ft2_asmt_data_en` */

insert  into `ft2_asmt_data_en`(`id`,`sid`,`qno`,`ans`,`aky`,`ascode`,`syr`,`fid`,`grde`,`asid`) values (1,30,1,'','1\r\n2\r\n3\r\n4\r\n5','as1','2022-2023',2,1,'2'),(2,30,5,'sample 2','1\r\n2\r\n3\r\n4\r\n5\r\n6','as1','2022-2023',2,1,'2'),(3,30,4,'ssdfsdf','1\r\n2\r\n3','as2','2022-2023',2,1,'2');

/*Table structure for table `ft2_asmt_data_es` */

DROP TABLE IF EXISTS `ft2_asmt_data_es`;

CREATE TABLE `ft2_asmt_data_es` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `sid` int(5) DEFAULT NULL,
  `qno` int(15) DEFAULT NULL,
  `ans` varchar(50) DEFAULT NULL,
  `ascode` varchar(10) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `asid` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sid` (`sid`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ft2_asmt_data_es` */

insert  into `ft2_asmt_data_es`(`id`,`sid`,`qno`,`ans`,`ascode`,`syr`,`fid`,`grde`,`asid`) values (1,30,2,'essay 1','as1','2022-2023',2,1,'2'),(2,30,1,'qweqwe','as1','2022-2023',2,1,'2');

/*Table structure for table `ft2_asmt_data_id` */

DROP TABLE IF EXISTS `ft2_asmt_data_id`;

CREATE TABLE `ft2_asmt_data_id` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `sid` int(5) DEFAULT NULL,
  `qno` int(15) DEFAULT NULL,
  `ans` varchar(50) DEFAULT NULL,
  `aky` varchar(50) DEFAULT NULL,
  `ascode` varchar(10) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `asid` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sid` (`sid`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ft2_asmt_data_id` */

/*Table structure for table `ft2_asmt_data_mc` */

DROP TABLE IF EXISTS `ft2_asmt_data_mc`;

CREATE TABLE `ft2_asmt_data_mc` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `sid` int(5) DEFAULT NULL,
  `qno` int(15) DEFAULT NULL,
  `ans` varchar(50) DEFAULT NULL,
  `aky` varchar(50) DEFAULT NULL,
  `rslt` int(2) DEFAULT '0',
  `ascode` varchar(10) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `asid` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sid` (`sid`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `ft2_asmt_data_mc` */

insert  into `ft2_asmt_data_mc`(`id`,`sid`,`qno`,`ans`,`aky`,`rslt`,`ascode`,`syr`,`fid`,`grde`,`asid`) values (1,30,20,'B','C',0,'as2','2022-2023',2,1,'2'),(2,30,28,'B','A',0,'as2','2022-2023',2,1,'2'),(3,30,24,'B','A',0,'as2','2022-2023',2,1,'2'),(4,30,27,'B','A',0,'as2','2022-2023',2,1,'2'),(5,30,7,'B','C',0,'as2','2022-2023',2,1,'2'),(6,30,15,'','B',0,'as1','2022-2023',2,1,'2'),(7,30,5,'','C',0,'as1','2022-2023',2,1,'2'),(8,30,6,'','B',0,'as1','2022-2023',2,1,'2'),(9,30,14,'','A',0,'as1','2022-2023',2,1,'2'),(10,30,18,'','C',0,'as1','2022-2023',2,1,'2'),(11,30,2,'','B',0,'as1','2022-2023',2,1,'2'),(12,30,1,'','A',0,'as1','2022-2023',2,1,'2'),(13,30,19,'','B',0,'as1','2022-2023',2,1,'2'),(14,30,4,'','B',0,'as1','2022-2023',2,1,'2'),(15,30,3,'','C',0,'as1','2022-2023',2,1,'2');

/*Table structure for table `ft2_asmt_data_result` */

DROP TABLE IF EXISTS `ft2_asmt_data_result`;

CREATE TABLE `ft2_asmt_data_result` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `sid` int(5) DEFAULT NULL,
  `res` int(4) DEFAULT NULL,
  `rte` varchar(10) DEFAULT NULL,
  `ascode` varchar(10) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `sec` varchar(30) DEFAULT NULL,
  `asid` varchar(3) DEFAULT NULL,
  `timer` varchar(15) DEFAULT NULL,
  `adte` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `stat` varchar(1) DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ft2_asmt_data_result` */

insert  into `ft2_asmt_data_result`(`id`,`sid`,`res`,`rte`,`ascode`,`syr`,`fid`,`grde`,`sec`,`asid`,`timer`,`adte`,`stat`) values (3,30,NULL,NULL,'as1','2022-2023',2,1,'1','2','60','2022-08-22 02:08:52','N'),(4,30,NULL,NULL,'as2','2022-2023',2,1,'1','2','60','2022-08-22 02:08:52','N');

/*Table structure for table `ft2_asmt_enumeration` */

DROP TABLE IF EXISTS `ft2_asmt_enumeration`;

CREATE TABLE `ft2_asmt_enumeration` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `ascode` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `syr` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `qst` text CHARACTER SET latin1 COMMENT 'xm/qz questions',
  `qky` varchar(5000) CHARACTER SET latin1 DEFAULT NULL COMMENT 'key',
  `asid` varchar(3) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ft2_asmt_enumeration` */

insert  into `ft2_asmt_enumeration`(`id`,`ascode`,`fid`,`grde`,`syr`,`qst`,`qky`,`asid`) values (1,'as1',2,1,'2022-2023','Sample enumeration question','1\r\n2\r\n3\r\n4\r\n5','2'),(4,'as2',2,1,'2022-2023','sample enumeration','1\r\n2\r\n3','2'),(5,'as1',2,1,'2022-2023','Sample enumeration question 2','1\r\n2\r\n3\r\n4\r\n5\r\n6','2');

/*Table structure for table `ft2_asmt_essay` */

DROP TABLE IF EXISTS `ft2_asmt_essay`;

CREATE TABLE `ft2_asmt_essay` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `ascode` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `syr` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `qst` text CHARACTER SET latin1 COMMENT 'xm/qz questions',
  `asid` varchar(3) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ft2_asmt_essay` */

insert  into `ft2_asmt_essay`(`id`,`ascode`,`fid`,`grde`,`syr`,`qst`,`asid`) values (1,'as1',2,1,'2022-2023','sample essay question pauna','2'),(2,'as1',2,1,'2022-2023','essay question1 una','2');

/*Table structure for table `ft2_asmt_identification` */

DROP TABLE IF EXISTS `ft2_asmt_identification`;

CREATE TABLE `ft2_asmt_identification` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `ascode` varchar(10) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `qst` varchar(500) DEFAULT NULL COMMENT 'xm/qz questions',
  `qky` varchar(100) DEFAULT NULL COMMENT 'key',
  `asid` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ft2_asmt_identification` */

insert  into `ft2_asmt_identification`(`id`,`ascode`,`fid`,`grde`,`syr`,`qst`,`qky`,`asid`) values (1,'as1',2,1,'2022-2023','sample identification question pauna','A','2'),(2,'as2',2,1,'2022-2023','sample identification question una','sample','2');

/*Table structure for table `ft2_asmt_multiplechoice` */

DROP TABLE IF EXISTS `ft2_asmt_multiplechoice`;

CREATE TABLE `ft2_asmt_multiplechoice` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `ascode` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `syr` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `qst` varchar(500) CHARACTER SET latin1 DEFAULT NULL COMMENT 'xm/qz questions',
  `qa1` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `qa2` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `qa3` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `qa4` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `qky` varchar(50) CHARACTER SET latin1 DEFAULT NULL COMMENT 'key',
  `asid` varchar(3) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ft2_asmt_multiplechoice` */

insert  into `ft2_asmt_multiplechoice`(`id`,`ascode`,`fid`,`grde`,`syr`,`qst`,`qa1`,`qa2`,`qa3`,`qa4`,`qky`,`asid`) values (1,'as1',2,1,'2022-2023','What are intellectual property rights?','Patent, trademark, copyright, trademark, trade ','Patent, trades, copyright, trade secret','Patent, trademark, corporate, trade secret','none of the above','A','2'),(2,'as1',2,1,'2022-2023','Which is NOT an intellectual property issue?','Poor Trademark Selection','Poor Trademark Logos','Errors in Licensing','none of the above','B','2'),(3,'as1',2,1,'2022-2023','Choose the correct definition of patent;','Exclusive right to reproduce, distribute, modify, ','Permit the owner to “include” others from making, ','Permit the owner to “exclude” others from making, ','none of the above','C','2'),(4,'as1',2,1,'2022-2023','Choose the correct definition of copyright','Permit the owner to “include” others from making, ','Exclusive right to reproduce, distribute, modify, ','To copy the information the right way.','none of the above','B','2'),(5,'as1',2,1,'2022-2023','Which is the most common mistake of intellectual property rights?','Missing opportunity for patent protection','Use of trade secrets from prior employer','Failure to secure ownership','none of the above','C','2'),(6,'as1',2,1,'2022-2023','Typing in all capitals in electronic communications means:','this message is very important.	','you are shouting.','it\'s okay to forward this message to others.','nothing special--typing in all caps is normal.','B','2'),(7,'as2',2,1,'2022-2023','It is OK to forward or post an email message that you received if','this message is very important.	','Use of trade secrets from prior employer','it\'s okay to forward this message to others.','none of the above','C','2'),(14,'as1',2,1,'2022-2023','What are intellectual property rights?','Patent, trademark, copyright, trademark, trade ','Patent, trades, copyright, trade secret','Patent, trademark, corporate, trade secret','none of the above','A','2'),(15,'as1',2,1,'2022-2023','Which is NOT an intellectual property issue?','Poor Trademark Selection','Poor Trademark Logos','Errors in Licensing','none of the above','B','2'),(18,'as1',2,1,'2022-2023','Which is the most common mistake of intellectual property rights?','Missing opportunity for patent protection','Use of trade secrets from prior employer','Failure to secure ownership','none of the above','C','2'),(19,'as1',2,1,'2022-2023','Typing in all capitals in electronic communications means:','this message is very important.	','you are shouting.','it\'s okay to forward this message to others.','nothing special--typing in all caps is normal.','B','2'),(20,'as2',2,1,'2022-2023','It is OK to forward or post an email message that you received if','this message is very important.	','Use of trade secrets from prior employer','it\'s okay to forward this message to others.','none of the above','C','2'),(24,'as2',2,1,'2022-2023','cvbbcvbcv','cvbvcb','cvbcvb','cvbcvb','jhjkhjkhjkjhk','A','2'),(27,'as2',2,1,'2022-2023','sample multiple choice update','A','B','B','D','A','2'),(28,'as2',2,1,'2022-2023','update sample una','qq','www','www','rrr','A','2');

/*Table structure for table `ft2_assessment_set` */

DROP TABLE IF EXISTS `ft2_assessment_set`;

CREATE TABLE `ft2_assessment_set` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `ascode` varchar(10) DEFAULT NULL,
  `scdsc` varchar(30) DEFAULT NULL,
  `stat` varchar(5) DEFAULT 'none',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `ft2_assessment_set` */

insert  into `ft2_assessment_set`(`id`,`ascode`,`scdsc`,`stat`) values (1,'as1','Paunang Pagsusulit','none'),(2,'as2','Unang Pagsusulit','none'),(3,'as3','Ikalawang Pagsusulit','none'),(4,'as4','Ikatlong Pagsusulit','none'),(5,'as5','Ikaapat na Pagsusulit','none'),(6,'as6','Panapos na Pagsusulit','none'),(7,'qz1','Maikling Pagsusulit 1','none'),(8,'qz2','Maikling Pagsusulit 2','none'),(9,'qz3','Maikling Pagsusulit 3','none'),(10,'qz4','Maikling Pagsusulit 4','none'),(11,'qz5','Maikling Pagsusulit 5','none'),(12,'qz6','Maikling Pagsusulit 6','none'),(13,'qz7','Maikling Pagsusulit 7','none'),(14,'qz8','Maikling Pagsusulit 8','none'),(15,'lq1','Mahabang Pagsusulit 1','none'),(16,'lq2','Mahabang Pagsusulit 2','none'),(18,'lq3','Mahabang Pagsusulit 3','none'),(19,'lq4','Mahabang Pagsusulit 4','none'),(20,'lq5','Mahabang Pagsusulit 5','none'),(21,'lq6','Mahabang Pagsusulit 6','none'),(22,'lq7','Mahabang Pagsusulit 7','none'),(23,'lq8','Mahabang Pagsusulit 8','none');

/*Table structure for table `ft2_faculty_assessment` */

DROP TABLE IF EXISTS `ft2_faculty_assessment`;

CREATE TABLE `ft2_faculty_assessment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `ascode` varchar(10) DEFAULT NULL,
  `scdsc` varchar(30) DEFAULT NULL,
  `stat` varchar(5) DEFAULT 'none',
  `fid` varchar(5) DEFAULT NULL,
  `itm` int(3) DEFAULT '0',
  `grde` int(10) DEFAULT NULL,
  `sec` int(10) DEFAULT NULL,
  `used` varchar(1) DEFAULT 'N',
  `asid` varchar(3) DEFAULT NULL,
  `timer` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `ft2_faculty_assessment` */

insert  into `ft2_faculty_assessment`(`id`,`ascode`,`scdsc`,`stat`,`fid`,`itm`,`grde`,`sec`,`used`,`asid`,`timer`) values (1,'as1','Paunang Pagsusulit','block','2',5,1,1,'Y','2','60'),(2,'as2','Unang Pagsusulit','none','2',5,1,1,'Y','2','60'),(3,'as3','Ikalawang Pagsusulit','none','2',5,1,1,'N','2','60'),(4,'as4','Ikatlong Pagsusulit','none','2',5,1,1,'N','2','60'),(8,'as5','Ikaapat na Pagsusulit','none','2',5,1,1,'N','2','60'),(11,'qz1','Maikling Pagsusulit 1','none','2',10,1,NULL,'N','2','30'),(12,'qz2','Maikling Pagsusulit 2','none','2',15,1,NULL,'N','2','45');

/*Table structure for table `ft2_faculty_schedule` */

DROP TABLE IF EXISTS `ft2_faculty_schedule`;

CREATE TABLE `ft2_faculty_schedule` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fid` int(10) DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `sec` int(10) DEFAULT NULL,
  `sjid` int(10) DEFAULT NULL,
  `syr` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ft2_faculty_schedule` */

insert  into `ft2_faculty_schedule`(`id`,`fid`,`grde`,`sec`,`sjid`,`syr`) values (1,2,1,1,2,'2022-2023'),(2,2,1,4,2,'2022-2023'),(4,2,1,7,4,'2022-2023'),(5,32,2,8,2,'2022-2023'),(6,32,2,8,4,'2022-2023'),(7,32,2,8,7,'2022-2023'),(8,32,2,8,3,'2022-2023'),(10,2,2,11,2,'2022-2023'),(11,2,2,11,4,'2022-2023'),(20,2,2,11,7,'2022-2023'),(22,2,2,11,1,'2022-2023'),(25,32,1,7,2,'2022-2023');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
