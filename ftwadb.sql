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
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ftwadb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `ftwadb`;

/*Table structure for table `ft2_active_year` */

DROP TABLE IF EXISTS `ft2_active_year`;

CREATE TABLE `ft2_active_year` (
  `id` int(10) NOT NULL,
  `syr` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `stat` varchar(1) CHARACTER SET latin1 DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `ft2_announcements_data` */

DROP TABLE IF EXISTS `ft2_announcements_data`;

CREATE TABLE `ft2_announcements_data` (
  `id` int(10) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `info` text,
  `dtme` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ploc` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ft2_asmt_data_en` */

DROP TABLE IF EXISTS `ft2_asmt_data_en`;

CREATE TABLE `ft2_asmt_data_en` (
  `id` int(15) NOT NULL,
  `sid` int(5) DEFAULT NULL,
  `qno` int(15) DEFAULT NULL,
  `ans` text,
  `aky` varchar(50) DEFAULT NULL,
  `ascode` varchar(10) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` varchar(5) DEFAULT NULL,
  `asid` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ft2_asmt_data_es` */

DROP TABLE IF EXISTS `ft2_asmt_data_es`;

CREATE TABLE `ft2_asmt_data_es` (
  `id` int(15) NOT NULL,
  `sid` int(5) DEFAULT NULL,
  `qno` int(15) DEFAULT NULL,
  `ans` longtext CHARACTER SET latin1 COLLATE latin1_general_ci,
  `ascode` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `syr` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` varchar(5) DEFAULT NULL,
  `asid` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ft2_asmt_data_id` */

DROP TABLE IF EXISTS `ft2_asmt_data_id`;

CREATE TABLE `ft2_asmt_data_id` (
  `id` int(15) NOT NULL,
  `sid` int(5) DEFAULT NULL,
  `qno` int(15) DEFAULT NULL,
  `ans` longtext CHARACTER SET utf8,
  `aky` varchar(50) DEFAULT NULL,
  `ascode` varchar(10) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` varchar(5) DEFAULT NULL,
  `asid` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ft2_asmt_data_mc` */

DROP TABLE IF EXISTS `ft2_asmt_data_mc`;

CREATE TABLE `ft2_asmt_data_mc` (
  `id` int(15) NOT NULL,
  `sid` int(5) DEFAULT NULL,
  `qno` int(15) DEFAULT NULL,
  `ans` varchar(50) DEFAULT NULL,
  `aky` varchar(50) DEFAULT NULL,
  `rslt` int(2) DEFAULT '0',
  `ascode` varchar(10) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` varchar(5) DEFAULT NULL,
  `asid` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ft2_asmt_data_result` */

DROP TABLE IF EXISTS `ft2_asmt_data_result`;

CREATE TABLE `ft2_asmt_data_result` (
  `id` int(15) NOT NULL,
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
  `stat` varchar(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ft2_asmt_enumeration` */

DROP TABLE IF EXISTS `ft2_asmt_enumeration`;

CREATE TABLE `ft2_asmt_enumeration` (
  `id` int(15) NOT NULL,
  `ascode` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `syr` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `qst` text CHARACTER SET latin1 COMMENT 'xm/qz questions',
  `qky` varchar(5000) CHARACTER SET latin1 DEFAULT NULL COMMENT 'key',
  `asid` varchar(3) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Table structure for table `ft2_asmt_essay` */

DROP TABLE IF EXISTS `ft2_asmt_essay`;

CREATE TABLE `ft2_asmt_essay` (
  `id` int(15) NOT NULL,
  `ascode` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `syr` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `qst` text CHARACTER SET latin1 COMMENT 'xm/qz questions',
  `asid` varchar(3) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Table structure for table `ft2_asmt_identification` */

DROP TABLE IF EXISTS `ft2_asmt_identification`;

CREATE TABLE `ft2_asmt_identification` (
  `id` int(15) NOT NULL,
  `ascode` varchar(10) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `qst` varchar(500) DEFAULT NULL COMMENT 'xm/qz questions',
  `qky` varchar(100) DEFAULT NULL COMMENT 'key',
  `asid` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ft2_asmt_multiplechoice` */

DROP TABLE IF EXISTS `ft2_asmt_multiplechoice`;

CREATE TABLE `ft2_asmt_multiplechoice` (
  `id` int(15) NOT NULL,
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
  `asid` varchar(3) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Table structure for table `ft2_assessment_set` */

DROP TABLE IF EXISTS `ft2_assessment_set`;

CREATE TABLE `ft2_assessment_set` (
  `id` int(5) NOT NULL,
  `ascode` varchar(10) DEFAULT NULL,
  `scdsc` varchar(30) DEFAULT NULL,
  `stat` varchar(5) DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ft2_assigned_subjects` */

DROP TABLE IF EXISTS `ft2_assigned_subjects`;

CREATE TABLE `ft2_assigned_subjects` (
  `id` int(5) NOT NULL,
  `grde` int(5) DEFAULT NULL,
  `sec` int(5) DEFAULT NULL,
  `sjid` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ft2_chat_msg` */

DROP TABLE IF EXISTS `ft2_chat_msg`;

CREATE TABLE `ft2_chat_msg` (
  `id` int(15) NOT NULL,
  `cid` int(10) DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `asid` varchar(3) DEFAULT NULL,
  `chat` text,
  `log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Table structure for table `ft2_faculty_assessment` */

DROP TABLE IF EXISTS `ft2_faculty_assessment`;

CREATE TABLE `ft2_faculty_assessment` (
  `id` int(5) NOT NULL,
  `ascode` varchar(10) DEFAULT NULL,
  `scdsc` varchar(30) DEFAULT NULL,
  `stat` varchar(5) DEFAULT 'none',
  `fid` varchar(5) DEFAULT NULL,
  `itm` int(3) DEFAULT '0',
  `grde` int(10) DEFAULT NULL,
  `sec` int(10) DEFAULT NULL,
  `used` varchar(1) DEFAULT 'N',
  `asid` varchar(3) DEFAULT NULL,
  `timer` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ft2_faculty_schedule` */

DROP TABLE IF EXISTS `ft2_faculty_schedule`;

CREATE TABLE `ft2_faculty_schedule` (
  `id` int(10) NOT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `sec` int(10) DEFAULT NULL,
  `sjid` int(10) DEFAULT NULL,
  `syr` varchar(15) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `ft2_grade_data` */

DROP TABLE IF EXISTS `ft2_grade_data`;

CREATE TABLE `ft2_grade_data` (
  `id` int(10) NOT NULL,
  `grd` varchar(15) CHARACTER SET latin1 NOT NULL,
  `stat` varchar(1) CHARACTER SET latin1 DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `ft2_grade_record` */

DROP TABLE IF EXISTS `ft2_grade_record`;

CREATE TABLE `ft2_grade_record` (
  `id` int(15) NOT NULL,
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
  `rem` varchar(8) DEFAULT 'FAILED'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ft2_module_records` */

DROP TABLE IF EXISTS `ft2_module_records`;

CREATE TABLE `ft2_module_records` (
  `id` int(10) NOT NULL,
  `fid` int(10) DEFAULT NULL,
  `title` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `flink` text CHARACTER SET latin1,
  `syr` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `asid` varchar(3) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `ft2_module_subjects` */

DROP TABLE IF EXISTS `ft2_module_subjects`;

CREATE TABLE `ft2_module_subjects` (
  `id` int(10) NOT NULL,
  `subj` varchar(100) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `ft2_section_data` */

DROP TABLE IF EXISTS `ft2_section_data`;

CREATE TABLE `ft2_section_data` (
  `id` int(10) NOT NULL,
  `grd` int(10) DEFAULT NULL,
  `sect` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `stat` varchar(1) CHARACTER SET latin1 DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `ft2_users_account` */

DROP TABLE IF EXISTS `ft2_users_account`;

CREATE TABLE `ft2_users_account` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lnme` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `fnme` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `mnme` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `eadd` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `cno` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `ploc` longblob,
  `sqt` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `sqa` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `usr` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `pwd` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `alyas` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `grde` int(10) DEFAULT NULL,
  `sec` int(10) DEFAULT NULL,
  `actv` varchar(1) CHARACTER SET latin1 DEFAULT 'Y',
  `typ` varchar(10) CHARACTER SET latin1 DEFAULT 'STUDENT',
  `login` varchar(1) CHARACTER SET latin1 DEFAULT 'N',
  `thm1` varchar(10) NOT NULL DEFAULT '#ff9966',
  `thm2` varchar(10) NOT NULL DEFAULT '#ff66cc',
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=475 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tblasrslt_data` */

DROP TABLE IF EXISTS `tblasrslt_data`;

CREATE TABLE `tblasrslt_data` (
  `aid` int(11) NOT NULL,
  `id` int(15) DEFAULT NULL,
  `sid` int(5) DEFAULT NULL,
  `qno` varchar(3) DEFAULT NULL,
  `rno` varchar(15) DEFAULT NULL,
  `ans` varchar(50) DEFAULT NULL,
  `aky` varchar(50) DEFAULT NULL,
  `rslt` int(2) DEFAULT '0',
  `ascode` varchar(10) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `tblassess_set` */

DROP TABLE IF EXISTS `tblassess_set`;

CREATE TABLE `tblassess_set` (
  `id` int(5) NOT NULL,
  `ascode` varchar(10) DEFAULT NULL,
  `scdsc` varchar(30) DEFAULT NULL,
  `stat` varchar(5) DEFAULT 'none'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `tblfaculty_asses` */

DROP TABLE IF EXISTS `tblfaculty_asses`;

CREATE TABLE `tblfaculty_asses` (
  `id` int(5) NOT NULL,
  `ascode` varchar(10) DEFAULT NULL,
  `scdsc` varchar(30) DEFAULT NULL,
  `stat` varchar(5) DEFAULT 'none',
  `fid` varchar(5) DEFAULT NULL,
  `itm` int(3) DEFAULT '0',
  `grde` int(5) DEFAULT NULL,
  `sec` varchar(30) DEFAULT NULL,
  `used` varchar(1) DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `tblfaculty_sched` */

DROP TABLE IF EXISTS `tblfaculty_sched`;

CREATE TABLE `tblfaculty_sched` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `fid` int(10) DEFAULT NULL,
  `grde` varchar(50) DEFAULT NULL,
  `sec` varchar(50) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

/*Table structure for table `tblforum_data` */

DROP TABLE IF EXISTS `tblforum_data`;

CREATE TABLE `tblforum_data` (
  `id` int(10) NOT NULL,
  `subj` varchar(100) DEFAULT NULL,
  `info` text,
  `sndr` varchar(100) DEFAULT NULL,
  `eadd` varchar(60) DEFAULT NULL,
  `dte` varchar(12) DEFAULT NULL,
  `stat` varchar(1) DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `tblgrade_data` */

DROP TABLE IF EXISTS `tblgrade_data`;

CREATE TABLE `tblgrade_data` (
  `id` int(5) NOT NULL,
  `grd` varchar(15) NOT NULL,
  `stat` varchar(1) DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `tblmodule_data` */

DROP TABLE IF EXISTS `tblmodule_data`;

CREATE TABLE `tblmodule_data` (
  `id` int(10) NOT NULL,
  `fid` int(10) DEFAULT NULL,
  `chpt` varchar(30) DEFAULT NULL,
  `lesn` varchar(30) DEFAULT NULL,
  `ttle` varchar(200) DEFAULT NULL,
  `nfo` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `tblmodule_stud` */

DROP TABLE IF EXISTS `tblmodule_stud`;

CREATE TABLE `tblmodule_stud` (
  `id` int(10) DEFAULT NULL,
  `grde` varchar(50) DEFAULT NULL,
  `sec` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `tblnews_data` */

DROP TABLE IF EXISTS `tblnews_data`;

CREATE TABLE `tblnews_data` (
  `id` int(10) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `info` text,
  `dte` varchar(20) DEFAULT NULL,
  `tme` varchar(20) DEFAULT NULL,
  `ploc` varchar(100) NOT NULL DEFAULT 'missing.jpg',
  `actv` varchar(1) DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `tblpfiles_data` */

DROP TABLE IF EXISTS `tblpfiles_data`;

CREATE TABLE `tblpfiles_data` (
  `id` int(10) NOT NULL,
  `mid` int(5) DEFAULT NULL,
  `pploc` varchar(100) DEFAULT NULL,
  `ttle` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2868 DEFAULT CHARSET=latin1;

/*Table structure for table `tblreslst_data` */

DROP TABLE IF EXISTS `tblreslst_data`;

CREATE TABLE `tblreslst_data` (
  `id` int(5) NOT NULL,
  `sid` int(5) DEFAULT NULL,
  `res` int(4) DEFAULT NULL,
  `ovr` int(4) DEFAULT NULL,
  `rte` varchar(10) DEFAULT NULL,
  `ascode` varchar(10) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` int(5) DEFAULT NULL,
  `sec` varchar(30) DEFAULT NULL,
  `adte` varchar(12) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `tblreslst_data_copy` */

DROP TABLE IF EXISTS `tblreslst_data_copy`;

CREATE TABLE `tblreslst_data_copy` (
  `id` int(5) NOT NULL,
  `sid` int(5) DEFAULT NULL,
  `res` int(4) DEFAULT NULL,
  `ovr` int(4) DEFAULT NULL,
  `rte` varchar(10) DEFAULT NULL,
  `ascode` varchar(10) DEFAULT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `grde` int(5) DEFAULT NULL,
  `sec` varchar(30) DEFAULT NULL,
  `adte` varchar(12) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `tblsection_data` */

DROP TABLE IF EXISTS `tblsection_data`;

CREATE TABLE `tblsection_data` (
  `id` int(5) NOT NULL,
  `grd` int(5) DEFAULT NULL,
  `sect` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `fid` int(5) DEFAULT NULL,
  `stat` varchar(1) CHARACTER SET latin1 DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tblsinfo_data` */

DROP TABLE IF EXISTS `tblsinfo_data`;

CREATE TABLE `tblsinfo_data` (
  `id` int(10) NOT NULL,
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
  `mcno` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `tblsyr_data` */

DROP TABLE IF EXISTS `tblsyr_data`;

CREATE TABLE `tblsyr_data` (
  `id` int(5) NOT NULL,
  `syr` varchar(15) DEFAULT NULL,
  `stat` varchar(1) DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `tblvfiles_data` */

DROP TABLE IF EXISTS `tblvfiles_data`;

CREATE TABLE `tblvfiles_data` (
  `id` int(10) NOT NULL,
  `mid` int(5) DEFAULT NULL,
  `vploc` varchar(100) DEFAULT NULL,
  `ttle` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
