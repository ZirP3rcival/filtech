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

/*Table structure for table `tblasrslt_data` */

DROP TABLE IF EXISTS `tblasrslt_data`;

CREATE TABLE `tblasrslt_data` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(15) DEFAULT NULL,
  `sid` int(5) DEFAULT NULL,
  `qno` varchar(3) DEFAULT NULL,
  `rno` varchar(3) DEFAULT NULL,
  `ans` varchar(50) DEFAULT NULL,
  `aky` varchar(50) DEFAULT NULL,
  `rslt` int(2) DEFAULT '0',
  `ascode` varchar(10) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`aid`),
  KEY `sid` (`sid`),
  KEY `id` (`id`),
  CONSTRAINT `FK_tblasrslt_data` FOREIGN KEY (`id`) REFERENCES `tblreslst_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tblasrslt_data_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `tblsinfo_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Table structure for table `tblassess_set` */

DROP TABLE IF EXISTS `tblassess_set`;

CREATE TABLE `tblassess_set` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `ascode` varchar(10) DEFAULT NULL,
  `scdsc` varchar(30) DEFAULT NULL,
  `stat` varchar(5) DEFAULT 'none',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Table structure for table `tblfaculty_asses` */

DROP TABLE IF EXISTS `tblfaculty_asses`;

CREATE TABLE `tblfaculty_asses` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `ascode` varchar(10) DEFAULT NULL,
  `scdsc` varchar(30) DEFAULT NULL,
  `stat` varchar(5) DEFAULT 'none',
  `fid` varchar(5) DEFAULT NULL,
  `itm` int(3) DEFAULT '0',
  `grde` int(5) DEFAULT NULL,
  `sec` varchar(30) DEFAULT NULL,
  `used` varchar(1) DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `tblfaculty_sched` */

DROP TABLE IF EXISTS `tblfaculty_sched`;

CREATE TABLE `tblfaculty_sched` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `fid` int(10) DEFAULT NULL,
  `grde` varchar(50) DEFAULT NULL,
  `sec` varchar(50) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `tblforum_data` */

DROP TABLE IF EXISTS `tblforum_data`;

CREATE TABLE `tblforum_data` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `subj` varchar(100) DEFAULT NULL,
  `info` text,
  `sndr` varchar(100) DEFAULT NULL,
  `eadd` varchar(60) DEFAULT NULL,
  `dte` varchar(12) DEFAULT NULL,
  `stat` varchar(1) DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Table structure for table `tblgrade_data` */

DROP TABLE IF EXISTS `tblgrade_data`;

CREATE TABLE `tblgrade_data` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `grd` varchar(15) NOT NULL,
  `stat` varchar(1) DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `tblmodule_data` */

DROP TABLE IF EXISTS `tblmodule_data`;

CREATE TABLE `tblmodule_data` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fid` int(10) DEFAULT NULL,
  `chpt` varchar(30) DEFAULT NULL,
  `lesn` varchar(30) DEFAULT NULL,
  `ttle` varchar(200) DEFAULT NULL,
  `nfo` text,
  PRIMARY KEY (`id`),
  KEY `mid` (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Table structure for table `tblmodule_stud` */

DROP TABLE IF EXISTS `tblmodule_stud`;

CREATE TABLE `tblmodule_stud` (
  `id` int(10) DEFAULT NULL,
  `grde` varchar(50) DEFAULT NULL,
  `sec` varchar(50) DEFAULT NULL,
  KEY `FK_tblmodule_stud` (`id`),
  CONSTRAINT `FK_tblmodule_stud` FOREIGN KEY (`id`) REFERENCES `tblmodule_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tblnews_data` */

DROP TABLE IF EXISTS `tblnews_data`;

CREATE TABLE `tblnews_data` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `info` text,
  `dte` varchar(20) DEFAULT NULL,
  `tme` varchar(20) DEFAULT NULL,
  `ploc` varchar(100) NOT NULL DEFAULT 'missing.jpg',
  `actv` varchar(1) DEFAULT 'N',
  PRIMARY KEY (`id`,`ploc`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Table structure for table `tblpfiles_data` */

DROP TABLE IF EXISTS `tblpfiles_data`;

CREATE TABLE `tblpfiles_data` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mid` int(5) DEFAULT NULL,
  `pploc` varchar(100) DEFAULT NULL,
  `ttle` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mid` (`mid`),
  KEY `id` (`id`),
  CONSTRAINT `FK_tblpfiles_data` FOREIGN KEY (`mid`) REFERENCES `tblmodule_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Table structure for table `tblquest_data` */

DROP TABLE IF EXISTS `tblquest_data`;

CREATE TABLE `tblquest_data` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `ascode` varchar(10) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` varchar(50) DEFAULT NULL,
  `sec` varchar(50) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `qst` varchar(500) DEFAULT NULL COMMENT 'xm/qz questions',
  `qa1` varchar(50) DEFAULT NULL,
  `qa2` varchar(50) DEFAULT NULL,
  `qa3` varchar(50) DEFAULT NULL,
  `qa4` varchar(50) DEFAULT NULL,
  `qky` varchar(50) DEFAULT NULL COMMENT 'key',
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

/*Table structure for table `tblreslst_data` */

DROP TABLE IF EXISTS `tblreslst_data`;

CREATE TABLE `tblreslst_data` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `sid` int(5) DEFAULT NULL,
  `res` int(4) DEFAULT NULL,
  `ovr` int(4) DEFAULT NULL,
  `rte` varchar(10) DEFAULT NULL,
  `ascode` varchar(10) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` int(5) DEFAULT NULL,
  `sec` varchar(30) DEFAULT NULL,
  `adte` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Table structure for table `tblsection_data` */

DROP TABLE IF EXISTS `tblsection_data`;

CREATE TABLE `tblsection_data` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `grd` int(5) DEFAULT NULL,
  `sect` varchar(30) DEFAULT NULL,
  `fid` int(5) DEFAULT NULL,
  `stat` varchar(1) DEFAULT 'Y',
  KEY `id` (`id`),
  KEY `FK_tblsection_data` (`grd`),
  CONSTRAINT `FK_tblsection_data` FOREIGN KEY (`grd`) REFERENCES `tblgrade_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `tblsinfo_data` */

DROP TABLE IF EXISTS `tblsinfo_data`;

CREATE TABLE `tblsinfo_data` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lnme` varchar(30) DEFAULT NULL,
  `fnme` varchar(30) DEFAULT NULL,
  `mnme` varchar(30) DEFAULT NULL,
  `eadd` varchar(60) DEFAULT NULL,
  `cno` varchar(11) DEFAULT NULL,
  `ploc` varchar(50) DEFAULT 'missing.jpg',
  `sqt` varchar(100) DEFAULT NULL,
  `sqa` varchar(25) DEFAULT NULL,
  `usr` varchar(15) DEFAULT NULL,
  `pwd` varchar(45) DEFAULT NULL,
  `alyas` varchar(100) DEFAULT NULL,
  `grde` varchar(50) DEFAULT NULL,
  `sec` varchar(50) DEFAULT NULL,
  `actv` varchar(1) DEFAULT 'Y',
  `typ` varchar(10) DEFAULT 'STUDENT',
  `ftnme` varchar(100) DEFAULT NULL,
  `foccu` varchar(100) DEFAULT NULL,
  `fcno` varchar(11) DEFAULT NULL,
  `mtnme` varchar(100) DEFAULT NULL,
  `moccu` varchar(100) DEFAULT NULL,
  `mcno` varchar(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Table structure for table `tblsyr_data` */

DROP TABLE IF EXISTS `tblsyr_data`;

CREATE TABLE `tblsyr_data` (
  `syr` varchar(15) DEFAULT NULL,
  `stat` varchar(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tblvfiles_data` */

DROP TABLE IF EXISTS `tblvfiles_data`;

CREATE TABLE `tblvfiles_data` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mid` int(5) DEFAULT NULL,
  `vploc` varchar(100) DEFAULT NULL,
  `ttle` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mid` (`mid`),
  KEY `id` (`id`),
  CONSTRAINT `tblvfiles_data_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `tblmodule_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
