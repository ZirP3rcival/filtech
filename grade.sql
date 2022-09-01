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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ft2_grade_record` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
