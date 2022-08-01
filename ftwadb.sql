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

/*Data for the table `tblasrslt_data` */

insert  into `tblasrslt_data`(`aid`,`id`,`sid`,`qno`,`rno`,`ans`,`aky`,`rslt`,`ascode`,`syr`) values (26,8,32,'1','19','C','C',1,'as1','2017 - 2018'),(27,8,32,'2','45','D','D',1,'as1','2017 - 2018'),(28,8,32,'3','1','A','A',1,'as1','2017 - 2018'),(29,8,32,'4','18','C','B',0,'as1','2017 - 2018'),(30,8,32,'5','17','C','C',1,'as1','2017 - 2018'),(31,9,33,'1','17','C','C',1,'as1','2017 - 2018'),(32,9,33,'2','45','D','D',1,'as1','2017 - 2018'),(33,9,33,'3','19','C','C',1,'as1','2017 - 2018'),(34,9,33,'4','15','B','B',1,'as1','2017 - 2018'),(35,9,33,'5','1','A','A',1,'as1','2017 - 2018');

/*Table structure for table `tblassess_set` */

DROP TABLE IF EXISTS `tblassess_set`;

CREATE TABLE `tblassess_set` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `ascode` varchar(10) DEFAULT NULL,
  `scdsc` varchar(30) DEFAULT NULL,
  `stat` varchar(5) DEFAULT 'none',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `tblassess_set` */

insert  into `tblassess_set`(`id`,`ascode`,`scdsc`,`stat`) values (1,'as1','Paunang Pagsusulit','none'),(2,'as2','Unang Pagsusulit','none'),(3,'as3','Ikalawang Pagsusulit','none'),(4,'as4','Ikatlong Pagsusulit','none'),(5,'as5','Ikaapat na Pagsusulit','none'),(6,'as6','Panapos na Pagsusulit','none'),(7,'qz1','Maikling Pagsusulit 1','none'),(8,'qz2','Maikling Pagsusulit 2','none'),(9,'qz3','Maikling Pagsusulit 3','none'),(10,'qz4','Maikling Pagsusulit 4','none'),(11,'qz5','Maikling Pagsusulit 5','none'),(12,'qz6','Maikling Pagsusulit 6','none'),(13,'qz7','Maikling Pagsusulit 7','none'),(14,'qz8','Maikling Pagsusulit 8','none'),(15,'lq1','Mahabang Pagsusulit 1','none'),(16,'lq2','Mahabang Pagsusulit 2','none'),(18,'lq3','Mahabang Pagsusulit 3','none'),(19,'lq4','Mahabang Pagsusulit 4','none'),(20,'lq5','Mahabang Pagsusulit 5','none'),(21,'lq6','Mahabang Pagsusulit 6','none'),(22,'lq7','Mahabang Pagsusulit 7','none'),(23,'lq8','Mahabang Pagsusulit 8','none');

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

/*Data for the table `tblfaculty_asses` */

insert  into `tblfaculty_asses`(`id`,`ascode`,`scdsc`,`stat`,`fid`,`itm`,`grde`,`sec`,`used`) values (1,'as1','Paunang Pagsusulit','block','2',10,1,'Kamagong','Y'),(2,'as2','Unang Pagsusulit','none','2',50,1,'Kamagong','Y'),(3,'as3','Ikalawang Pagsusulit','none','2',10,1,'Kamagong','Y');

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

/*Data for the table `tblfaculty_sched` */

insert  into `tblfaculty_sched`(`id`,`fid`,`grde`,`sec`,`syr`) values (1,2,'1','Kamagong','2017 - 2018'),(2,2,'1','Narra','2017 - 2018');

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

/*Data for the table `tblforum_data` */

insert  into `tblforum_data`(`id`,`subj`,`info`,`sndr`,`eadd`,`dte`,`stat`) values (1,'Sample Forum Post','Sample Forum Post','Juan Pinagpala','jpinagpala@gmail.com','2018-02-16','Y'),(2,'Testing','testing po','Gerry G. Geronimo','3gme@gmail.com','2018-03-23','Y'),(9,'Sample Message','Message for Testing','Juan Pinagpala','midgrifter@gmail.com','2018-07-28','N');

/*Table structure for table `tblgrade_data` */

DROP TABLE IF EXISTS `tblgrade_data`;

CREATE TABLE `tblgrade_data` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `grd` varchar(15) NOT NULL,
  `stat` varchar(1) DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tblgrade_data` */

insert  into `tblgrade_data`(`id`,`grd`,`stat`) values (1,'Grade-11','Y'),(4,'Grade-12','Y');

/*Table structure for table `tblmodule_data` */

DROP TABLE IF EXISTS `tblmodule_data`;

CREATE TABLE `tblmodule_data` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fid` int(10) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `flink` text,
  `syr` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mid` (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tblmodule_data` */

insert  into `tblmodule_data`(`id`,`fid`,`title`,`flink`,`syr`) values (1,2,'SQL Commands','<iframe src=\"https://docs.google.com/presentation/d/e/2PACX-1vR1ZyyU1WlzQLK-cL6x8-UOzohkWZyxakzemb1EI9k8JFqGma1t9sjzhjVn1p1h3Q/embed?start=true&loop=true&delayms=30000\" frameborder=\"0\" width=\"1280\" height=\"749\" allowfullscreen=\"true\" mozallowfullscreen=\"true\" webkitallowfullscreen=\"true\"></iframe>','2022-2023'),(2,2,'Philippine History','<iframe src=\"https://docs.google.com/presentation/d/e/2PACX-1vQ6CMug9aFZe-FioeIiZl8Ly78hzBJB9mmgX-OdjPIyFLRbkKJ7ahQwZZnbt1urHAMT-uMut4VRIoQC/embed?start=true&loop=true&delayms=30000\" frameborder=\"0\" width=\"960\" height=\"749\" allowfullscreen=\"true\" mozallowfullscreen=\"true\" webkitallowfullscreen=\"true\"></iframe>','2022-2023');

/*Table structure for table `tblmodule_stud` */

DROP TABLE IF EXISTS `tblmodule_stud`;

CREATE TABLE `tblmodule_stud` (
  `id` int(10) DEFAULT NULL,
  `grde` varchar(50) DEFAULT NULL,
  `sec` varchar(50) DEFAULT NULL,
  KEY `FK_tblmodule_stud` (`id`),
  CONSTRAINT `FK_tblmodule_stud` FOREIGN KEY (`id`) REFERENCES `tblmodule_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblmodule_stud` */

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

/*Data for the table `tblnews_data` */

insert  into `tblnews_data`(`id`,`title`,`info`,`dte`,`tme`,`ploc`,`actv`) values (1,'asdasdas','asdasdasdasdd','07-17-2018','03:37:17 AM','logox.png','Y'),(9,'sample po','<p>asdasdasdasdas asda sd asd as dasdasd</p>\r\n<p>&nbsp;aadsdas</p>\r\n<p>dasdasdas &nbsp;asddasda a asdasdasdas</p>','07-17-2018','10:39:11 PM','logox.png','Y'),(12,'qwerty','qweerty','2018-08-28','02:55:51 AM','emil.jpg','Y');

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

/*Data for the table `tblquest_data` */

insert  into `tblquest_data`(`id`,`ascode`,`fid`,`grde`,`sec`,`syr`,`qst`,`qa1`,`qa2`,`qa3`,`qa4`,`qky`) values (1,'as1',2,'1','Kamagong','2017 - 2018','What are intellectual property rights?','Patent, trademark, copyright, trademark, trade ','Patent, trades, copyright, trade secret','Patent, trademark, corporate, trade secret','none of the above','A'),(15,'as1',2,'1','Kamagong','2017 - 2018','Which is NOT an intellectual property issue?','Poor Trademark Selection','Poor Trademark Logos','Errors in Licensing','none of the above','B'),(17,'as1',2,'1','Kamagong','2017 - 2018','Choose the correct definition of patent;','Exclusive right to reproduce, distribute, modify, ','Permit the owner to “include” others from making, ','Permit the owner to “exclude” others from making, ','none of the above','C'),(18,'as1',2,'1','Kamagong','2017 - 2018','Choose the correct definition of copyright','Permit the owner to “include” others from making, ','Exclusive right to reproduce, distribute, modify, ','To copy the information the right way.','none of the above','B'),(19,'as1',2,'1','Kamagong','2017 - 2018','Which is the most common mistake of intellectual property rights?','Missing opportunity for patent protection','Use of trade secrets from prior employer','Failure to secure ownership','none of the above','C'),(33,'as1',2,'1','Kamagong','2017 - 2018','Typing in all capitals in electronic communications means:','this message is very important.	','you are shouting.','it\'s okay to forward this message to others.','nothing special--typing in all caps is normal.','B'),(34,'as2',2,'1','Kamagong','2017 - 2018','It is OK to forward or post an email message that you received if','this message is very important.	','Use of trade secrets from prior employer','it\'s okay to forward this message to others.','none of the above','C'),(45,'as1',2,'1','Kamagong','2017 - 2018','dfgdfgdfg','dfgdfg','dfgdcvb','dfgdcvb','c vbcvb','D'),(46,'as1',2,'1','Narra','2017 - 2018','dfgdfgdfg','dfgdfg','dfgdcvb','dfgdcvb','c vbcvb','D'),(47,'as1',2,'1','Narra','2017 - 2018','cbcvbcvb','cvbcv','vbvcbvcb','vbvcbvcb','ryrtyrty','A'),(48,'as2',2,'1','Kamagong','2017 - 2018','cvbbcvbcv','cvbvcb','cvbcvb','cvbcvb','jhjkhjkhjkjhk','A'),(49,'as2',2,'1','Narra','2017 - 2018','cvbbcvbcv','cvbvcb','cvbcvb','cvbcvb','jhjkhjkhjkjhk','A'),(52,'as3',2,'1','Kamagong','2017 - 2018','xvxcvxc','xcvxcv','werwer','werwer','yuiyui','A');

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

/*Data for the table `tblreslst_data` */

insert  into `tblreslst_data`(`id`,`sid`,`res`,`ovr`,`rte`,`ascode`,`syr`,`fid`,`grde`,`sec`,`adte`) values (8,32,4,5,'PASSED','as1','2017 - 2018',2,1,'Kamagong','08-28-2018'),(9,33,5,5,'PASSED','as1','2017 - 2018',2,1,'Kamagong','08-28-2018');

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

/*Data for the table `tblsection_data` */

insert  into `tblsection_data`(`id`,`grd`,`sect`,`fid`,`stat`) values (1,1,'Narra',2,'Y'),(4,1,'Kamagong',2,'Y');

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
  `login` varchar(1) DEFAULT 'N',
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `tblsinfo_data` */

insert  into `tblsinfo_data`(`id`,`lnme`,`fnme`,`mnme`,`eadd`,`cno`,`ploc`,`sqt`,`sqa`,`usr`,`pwd`,`alyas`,`grde`,`sec`,`actv`,`typ`,`ftnme`,`foccu`,`fcno`,`mtnme`,`moccu`,`mcno`,`login`) values (2,'Sarossa','Myrtle','M.','MyrtleSarossa@gmail.com','09169652259','myrtle.jpg','What is the first name of your favorite uncle?','qwerty','faculty','21232f297a57a5a743894a0e4a801fc3','Sarossa, Myrtle M.','','','Y','FACULTY',NULL,NULL,NULL,NULL,NULL,NULL,'N'),(26,'Cruz','Jeric','Pilipe','jeric@yahoo.com','09366527566','slogo.jpg','What is your oldest cousin\'s name?','juan','admin','21232f297a57a5a743894a0e4a801fc3','Cruz, Jeric Pilipe',NULL,NULL,'Y','ADMIN',NULL,NULL,NULL,NULL,NULL,NULL,'N'),(30,'Batumbakal','Annie','Frisco','afstonemetal@yahoo.com','09366527566','missing.jpg','What is the first name of your favorite hero?','juan','annie','21232f297a57a5a743894a0e4a801fc3','Batumbakal, Annie Frisco','1','Narra','Y','STUDENT',NULL,NULL,NULL,NULL,NULL,NULL,'N'),(32,'Bonifacio','Andres','Matapang','iamkatipunero@gmail.com','09096325986','missing.jpg','What is your oldest cousin\'s name?','rizal','andres','21232f297a57a5a743894a0e4a801fc3','Bonifacio, Andres Matapang','1','Kamagong','N','FACULTY',NULL,NULL,NULL,NULL,NULL,NULL,'N'),(33,'Pilapil','Pedro','Pilipe','midgrifter@gmail.com','09069266659','user.png','What is the first name of your favorite uncle?','juan','jeorge','21232f297a57a5a743894a0e4a801fc3','Pilapil, Pedro Pilipe','1','Kamagong','Y','STUDENT',NULL,NULL,NULL,NULL,NULL,NULL,'N');

/*Table structure for table `tblsyr_data` */

DROP TABLE IF EXISTS `tblsyr_data`;

CREATE TABLE `tblsyr_data` (
  `syr` varchar(15) DEFAULT NULL,
  `stat` varchar(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblsyr_data` */

insert  into `tblsyr_data`(`syr`,`stat`) values ('2016-2017','N'),('2022-2023','Y');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
