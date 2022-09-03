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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `ft2_asmt_data_en` */

insert  into `ft2_asmt_data_en`(`id`,`sid`,`qno`,`ans`,`aky`,`ascode`,`syr`,`fid`,`grde`,`asid`) values (1,30,1,'1\n2\n3\n4\n5\n','1\r\n2\r\n3\r\n4\r\n5','as1','2022-2023',2,1,'2'),(2,30,5,'sample 2','1\r\n2\r\n3\r\n4\r\n5\r\n6','as1','2022-2023',2,1,'2'),(3,30,4,'ssdfsdf','1\r\n2\r\n3','as2','2022-2023',2,1,'2'),(4,2,1,'','1\r\n2\r\n3\r\n4\r\n5','as1','undefined',2,1,'2'),(5,2,5,'','1\r\n2\r\n3\r\n4\r\n5\r\n6','as1','undefined',2,1,'2');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ft2_asmt_data_es` */

insert  into `ft2_asmt_data_es`(`id`,`sid`,`qno`,`ans`,`ascode`,`syr`,`fid`,`grde`,`asid`) values (1,30,2,'essay 1 never ever ','as1','2022-2023',2,1,'2'),(2,30,1,'qweqwe is one two three','as1','2022-2023',2,1,'2'),(3,2,2,'','as1','undefined',2,1,'2'),(4,2,1,'','as1','undefined',2,1,'2');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `ft2_asmt_data_id` */

insert  into `ft2_asmt_data_id`(`id`,`sid`,`qno`,`ans`,`aky`,`ascode`,`syr`,`fid`,`grde`,`asid`) values (1,30,1,'','A','as1','2022-2023',2,1,'2'),(3,30,2,'sample','sample','as2','2022-2023',2,1,'2'),(4,30,3,'adadas','qwerty','as2','2022-2023',2,1,'2'),(5,2,1,'','A','as1','undefined',2,1,'2');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `ft2_asmt_data_mc` */

insert  into `ft2_asmt_data_mc`(`id`,`sid`,`qno`,`ans`,`aky`,`rslt`,`ascode`,`syr`,`fid`,`grde`,`asid`) values (6,30,15,'A','B',0,'as1','2022-2023',2,1,'2'),(7,30,5,'B','C',0,'as1','2022-2023',2,1,'2'),(8,30,6,'C','B',0,'as1','2022-2023',2,1,'2'),(9,30,14,'D','A',0,'as1','2022-2023',2,1,'2'),(10,30,18,'A','C',0,'as1','2022-2023',2,1,'2'),(11,30,2,'','B',0,'as1','2022-2023',2,1,'2'),(12,30,1,'','A',0,'as1','2022-2023',2,1,'2'),(13,30,19,'','B',0,'as1','2022-2023',2,1,'2'),(14,30,4,'','B',0,'as1','2022-2023',2,1,'2'),(15,30,3,'','C',0,'as1','2022-2023',2,1,'2'),(16,2,4,'','B',0,'as1','undefined',2,1,'2'),(17,2,19,'','B',0,'as1','undefined',2,1,'2'),(18,2,2,'','B',0,'as1','undefined',2,1,'2'),(19,2,1,'','A',0,'as1','undefined',2,1,'2'),(20,2,15,'','B',0,'as1','undefined',2,1,'2'),(21,2,14,'','A',0,'as1','undefined',2,1,'2'),(22,2,3,'','C',0,'as1','undefined',2,1,'2'),(23,2,18,'','C',0,'as1','undefined',2,1,'2'),(24,2,6,'','B',0,'as1','undefined',2,1,'2'),(25,2,5,'','C',0,'as1','undefined',2,1,'2');

/*Table structure for table `ft2_asmt_data_result` */

DROP TABLE IF EXISTS `ft2_asmt_data_result`;

CREATE TABLE `ft2_asmt_data_result` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `sid` int(5) DEFAULT NULL,
  `res` int(4) DEFAULT '0',
  `rte` varchar(10) DEFAULT NULL,
  `ascode` varchar(10) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `sec` varchar(30) DEFAULT NULL,
  `asid` varchar(3) DEFAULT NULL,
  `timer` varchar(15) DEFAULT NULL,
  `adte` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `mch` varchar(5) DEFAULT 'N',
  `idf` varchar(5) DEFAULT 'N',
  `enu` varchar(5) DEFAULT 'N',
  `esy` varchar(5) DEFAULT 'N',
  `stat` varchar(1) DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `ft2_asmt_data_result` */

insert  into `ft2_asmt_data_result`(`id`,`sid`,`res`,`rte`,`ascode`,`syr`,`fid`,`grde`,`sec`,`asid`,`timer`,`adte`,`mch`,`idf`,`enu`,`esy`,`stat`) values (2,30,73,'FAILED','as1','2022-2023',2,1,'1','2','90','2022-08-26 15:41:21','60.00','50.00','85.00','95.00','N'),(3,50,NULL,NULL,'as1','2022-2023',42,1,'13','7','45','2022-08-26 16:12:25','y','N','N','N','N');

/*Table structure for table `ft2_grade_record` */

DROP TABLE IF EXISTS `ft2_grade_record`;

CREATE TABLE `ft2_grade_record` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `fid` int(10) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `sid` int(5) DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `sec` varchar(30) DEFAULT NULL,
  `sjid` int(10) DEFAULT NULL,
  `grd1` varchar(5) DEFAULT '50.00',
  `grd2` varchar(5) DEFAULT '50.00',
  `grd3` varchar(5) DEFAULT '50.00',
  `grd4` varchar(5) DEFAULT '50.00',
  `ave` varchar(5) DEFAULT '50.00',
  `rem` varchar(8) DEFAULT 'FAILED',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ft2_grade_record` */

insert  into `ft2_grade_record`(`id`,`fid`,`syr`,`sid`,`grde`,`sec`,`sjid`,`grd1`,`grd2`,`grd3`,`grd4`,`ave`,`rem`) values (1,2,'2022-2023',30,1,'1',2,'80.00','85.00','85.00','75.00','81.25','PASSED');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
