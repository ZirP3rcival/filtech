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
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ftwadb` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;

USE `ftwadb`;

/*Table structure for table `ft2_asmt_enumeration` */

DROP TABLE IF EXISTS `ft2_asmt_enumeration`;

CREATE TABLE `ft2_asmt_enumeration` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `ascode` varchar(10) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` varchar(50) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `qst` text COMMENT 'xm/qz questions',
  `qky` text COMMENT 'key',
  `asid` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ft2_asmt_enumeration` */

insert  into `ft2_asmt_enumeration`(`id`,`ascode`,`fid`,`grde`,`syr`,`qst`,`qky`,`asid`) values (1,'as1',2,'1','2022-2023','Sample enumeration question',NULL,'2');

/*Table structure for table `ft2_asmt_essay` */

DROP TABLE IF EXISTS `ft2_asmt_essay`;

CREATE TABLE `ft2_asmt_essay` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `ascode` varchar(10) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` varchar(50) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `qst` text COMMENT 'xm/qz questions',
  `asid` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ft2_asmt_essay` */

insert  into `ft2_asmt_essay`(`id`,`ascode`,`fid`,`grde`,`syr`,`qst`,`asid`) values (1,'as1',2,'1','2022-2023','sample essay question','2');

/*Table structure for table `ft2_asmt_identification` */

DROP TABLE IF EXISTS `ft2_asmt_identification`;

CREATE TABLE `ft2_asmt_identification` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `ascode` varchar(10) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` varchar(50) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `qst` varchar(500) DEFAULT NULL COMMENT 'xm/qz questions',
  `qky` varchar(100) DEFAULT NULL COMMENT 'key',
  `asid` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ft2_asmt_identification` */

insert  into `ft2_asmt_identification`(`id`,`ascode`,`fid`,`grde`,`syr`,`qst`,`qky`,`asid`) values (1,'as1',2,'1','2022-2023','sample identification question','A','2');

/*Table structure for table `ft2_asmt_multiplechoice` */

DROP TABLE IF EXISTS `ft2_asmt_multiplechoice`;

CREATE TABLE `ft2_asmt_multiplechoice` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `ascode` varchar(10) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` varchar(50) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `qst` varchar(500) DEFAULT NULL COMMENT 'xm/qz questions',
  `qa1` varchar(50) DEFAULT NULL,
  `qa2` varchar(50) DEFAULT NULL,
  `qa3` varchar(50) DEFAULT NULL,
  `qa4` varchar(50) DEFAULT NULL,
  `qky` varchar(50) DEFAULT NULL COMMENT 'key',
  `asid` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `ft2_asmt_multiplechoice` */

insert  into `ft2_asmt_multiplechoice`(`id`,`ascode`,`fid`,`grde`,`syr`,`qst`,`qa1`,`qa2`,`qa3`,`qa4`,`qky`,`asid`) values (1,'as1',2,'1','2022-2023','What are intellectual property rights?','Patent, trademark, copyright, trademark, trade ','Patent, trades, copyright, trade secret','Patent, trademark, corporate, trade secret','none of the above','A','2'),(2,'as1',2,'1','2022-2023','Which is NOT an intellectual property issue?','Poor Trademark Selection','Poor Trademark Logos','Errors in Licensing','none of the above','B','2'),(3,'as1',2,'1','2022-2023','Choose the correct definition of patent;','Exclusive right to reproduce, distribute, modify, ','Permit the owner to “include” others from making, ','Permit the owner to “exclude” others from making, ','none of the above','C','2'),(4,'as1',2,'1','2022-2023','Choose the correct definition of copyright','Permit the owner to “include” others from making, ','Exclusive right to reproduce, distribute, modify, ','To copy the information the right way.','none of the above','B','2'),(5,'as1',2,'1','2022-2023','Which is the most common mistake of intellectual property rights?','Missing opportunity for patent protection','Use of trade secrets from prior employer','Failure to secure ownership','none of the above','C','2'),(6,'as1',2,'1','2022-2023','Typing in all capitals in electronic communications means:','this message is very important.	','you are shouting.','it\'s okay to forward this message to others.','nothing special--typing in all caps is normal.','B','2'),(7,'as2',2,'1','2022-2023','It is OK to forward or post an email message that you received if','this message is very important.	','Use of trade secrets from prior employer','it\'s okay to forward this message to others.','none of the above','C','2'),(11,'as2',2,'1','2022-2023','cvbbcvbcv','cvbvcb','cvbcvb','cvbcvb','jhjkhjkhjkjhk','A','2'),(13,'as3',2,'1','2022-2023','xvxcvxc','xcvxcv','werwer','werwer','yuiyui','A','2'),(14,'as1',2,'1','2022-2023','What are intellectual property rights?','Patent, trademark, copyright, trademark, trade ','Patent, trades, copyright, trade secret','Patent, trademark, corporate, trade secret','none of the above','A','2'),(15,'as1',2,'1','2022-2023','Which is NOT an intellectual property issue?','Poor Trademark Selection','Poor Trademark Logos','Errors in Licensing','none of the above','B','2'),(16,'as1',2,'1','2022-2023','Choose the correct definition of patent;','Exclusive right to reproduce, distribute, modify, ','Permit the owner to “include” others from making, ','Permit the owner to “exclude” others from making, ','none of the above','C','2'),(17,'as1',2,'1','2022-2023','Choose the correct definition of copyright','Permit the owner to “include” others from making, ','Exclusive right to reproduce, distribute, modify, ','To copy the information the right way.','none of the above','B','2'),(18,'as1',2,'1','2022-2023','Which is the most common mistake of intellectual property rights?','Missing opportunity for patent protection','Use of trade secrets from prior employer','Failure to secure ownership','none of the above','C','2'),(19,'as1',2,'1','2022-2023','Typing in all capitals in electronic communications means:','this message is very important.	','you are shouting.','it\'s okay to forward this message to others.','nothing special--typing in all caps is normal.','B','2'),(20,'as2',2,'1','2022-2023','It is OK to forward or post an email message that you received if','this message is very important.	','Use of trade secrets from prior employer','it\'s okay to forward this message to others.','none of the above','C','2'),(21,'as1',2,'1','2022-2023','dfgdfgdfg','dfgdfg','dfgdcvb','dfgdcvb','c vbcvb','D','2'),(23,'as1',2,'1','2022-2023','cbcvbcvb','cvbcv','vbvcbvcb','vbvcbvcb','ryrtyrty','A','2'),(24,'as2',2,'1','2022-2023','cvbbcvbcv','cvbvcb','cvbcvb','cvbcvb','jhjkhjkhjkjhk','A','2'),(26,'as3',2,'1','2022-2023','xvxcvxc','xcvxcv','werwer','werwer','yuiyui','A','2'),(27,'as2',2,'1','2022-2023','sample multiple choice update','A','B','B','D','A','2'),(28,'as2',2,'1','2022-2023','update sample','qq','www','www','rrr','A','2');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
