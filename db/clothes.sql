/*
SQLyog Ultimate v8.55 
MySQL - 5.1.41 : Database - clothes
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`clothes` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `clothes`;

/*Table structure for table ` usermenuaccess` */

DROP TABLE IF EXISTS ` usermenuaccess`;

CREATE TABLE ` usermenuaccess` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) DEFAULT NULL,
  `menuCode` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table ` usermenuaccess` */

/*Table structure for table `controlno` */

DROP TABLE IF EXISTS `controlno`;

CREATE TABLE `controlno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  `controlCode` varchar(20) DEFAULT NULL,
  `controlType` varchar(20) DEFAULT NULL,
  `noOfDigit` int(11) DEFAULT NULL,
  `lastDigit` int(11) DEFAULT '0',
  `remarks` varchar(250) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `controlno` */

insert  into `controlno`(`id`,`description`,`controlCode`,`controlType`,`noOfDigit`,`lastDigit`,`remarks`,`createdDate`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values (1,'CUSTOMER MAINTENANCE','C','CUSTOMER',8,0,'Customer Maintenance','2016-07-10 07:33:33','alladinx','2016-07-10 09:08:10','alladinx',1),(2,'DEPARTMENT MAINTENANCE','D','DEPARTMENT',8,0,'Department Maintenance','2016-07-10 08:59:19','alladinx','2016-07-10 09:21:57','alladinx',1),(3,'JOB TYPES MAINTENANCE','JT','JOBTYPE',8,0,'Job Types Maintenance','2016-07-10 08:59:45','alladinx',NULL,NULL,1),(4,'MATERIAL MAINTENANCE','MAT','MATERIAL',8,0,'Material Maintenance','2016-07-10 09:00:14','alladinx',NULL,NULL,1),(5,'MENU MAINTENANCE','M','MENU',4,17,'Menu Maintenance','2016-07-10 09:00:33','alladinx',NULL,NULL,1),(6,'SIZING PATTERN MAINTENANCE','SP','SIZING',8,0,'Sizing Pattern Maintenance','2016-07-10 09:00:57','alladinx',NULL,NULL,1),(7,'UOM MAINTENANCE','UOM','UOM',3,0,'UOM Maintenance','2016-07-10 09:01:23','alladinx',NULL,NULL,1);

/*Table structure for table `customersmaster` */

DROP TABLE IF EXISTS `customersmaster`;

CREATE TABLE `customersmaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerCode` varchar(20) DEFAULT NULL,
  `customerName` varchar(250) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `mobileNo` varchar(100) DEFAULT NULL,
  `telephoneNo` varchar(100) DEFAULT NULL,
  `emailAddress` varchar(100) DEFAULT NULL,
  `faxNo` varchar(100) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `TIN` varchar(100) DEFAULT NULL,
  `isVat` int(1) DEFAULT '0',
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `customersmaster` */

/*Table structure for table `departmentmaster` */

DROP TABLE IF EXISTS `departmentmaster`;

CREATE TABLE `departmentmaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departmentCode` varchar(20) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `departmentmaster` */

/*Table structure for table `estimatedetail` */

DROP TABLE IF EXISTS `estimatedetail`;

CREATE TABLE `estimatedetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estimateMasterId` int(11) DEFAULT NULL,
  `quoteReferenceNo` varchar(20) DEFAULT NULL,
  `specification` varchar(20) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `uom` varchar(20) DEFAULT NULL,
  `material` varchar(20) DEFAULT NULL,
  `remarks` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `estimatedetail` */

/*Table structure for table `estimatemaster` */

DROP TABLE IF EXISTS `estimatemaster`;

CREATE TABLE `estimatemaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quoteReferenceNo` varchar(20) DEFAULT NULL,
  `transactionDate` datetime DEFAULT NULL,
  `customerCode` varchar(20) DEFAULT NULL,
  `jobType` varchar(20) DEFAULT NULL,
  `acknowledgeBy` varchar(20) DEFAULT NULL,
  `acknowledgeDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(5) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `estimatemaster` */

/*Table structure for table `jobordermaster` */

DROP TABLE IF EXISTS `jobordermaster`;

CREATE TABLE `jobordermaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobOrderReferenceNo` varchar(20) DEFAULT NULL,
  `estimateReferenceNo` varchar(20) DEFAULT NULL,
  `assignTo` varchar(20) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `vat` decimal(12,2) DEFAULT NULL,
  `discount` decimal(12,2) DEFAULT NULL,
  `subTotal` decimal(12,2) DEFAULT NULL,
  `totalAmount` decimal(12,2) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `jobordermaster` */

/*Table structure for table `jobtypemaster` */

DROP TABLE IF EXISTS `jobtypemaster`;

CREATE TABLE `jobtypemaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobTypeCode` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `leadTime` varchar(100) DEFAULT NULL,
  `notificationDay` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `jobtypemaster` */

/*Table structure for table `materialmaster` */

DROP TABLE IF EXISTS `materialmaster`;

CREATE TABLE `materialmaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `materialCode` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `materialmaster` */

/*Table structure for table `menumaster` */

DROP TABLE IF EXISTS `menumaster`;

CREATE TABLE `menumaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menuCode` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `isMaintenance` int(11) DEFAULT NULL,
  `isTransactions` int(11) DEFAULT NULL,
  `isReports` int(11) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `menumaster` */

insert  into `menumaster`(`id`,`menuCode`,`description`,`link`,`isMaintenance`,`isTransactions`,`isReports`,`createdDate`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values (2,'M0001','Control Nos','controlnos',1,0,0,'2016-07-10 09:22:59','alladinx',NULL,NULL,1),(3,'M0002','Customers','customers',1,0,0,'2016-07-10 09:23:10','alladinx',NULL,NULL,1),(4,'M0003','Departments','departments',1,0,0,'2016-07-10 09:23:21','alladinx',NULL,NULL,1),(5,'M0004','Job Types','jobtypes',1,0,0,'2016-07-10 09:23:30','alladinx',NULL,NULL,1),(6,'M0005','Materials','materials',1,0,0,'2016-07-10 09:23:40','alladinx',NULL,NULL,1),(7,'M0006','Menus','menus',1,0,0,'2016-07-10 09:23:51','alladinx',NULL,NULL,1),(8,'M0007','Sizing Patterns','sizings',1,0,0,'2016-07-10 09:24:07','alladinx',NULL,NULL,1),(9,'M0008','UOMs','uoms',1,0,0,'2016-07-10 09:24:20','alladinx',NULL,NULL,1),(10,'M0009','Estimates','estimates',0,1,0,'2016-07-10 09:24:41','alladinx',NULL,NULL,1),(11,'M0010','Users','users',1,0,0,'2016-07-10 09:41:29','alladinx',NULL,NULL,1),(12,'M0011','Pending Job Orders','jopending',0,0,1,'2016-07-10 09:41:53','alladinx',NULL,NULL,1),(13,'M0012','Upcoming Dues','dues',0,0,1,'2016-07-10 09:42:22','alladinx',NULL,NULL,1),(14,'M0013','Work In Process','wip',0,0,1,'2016-07-10 09:42:36','alladinx',NULL,NULL,1),(15,'M0014','AR / UI','arui',0,0,1,'2016-07-10 09:42:49','alladinx',NULL,NULL,1),(16,'M0015','Sales per Location','salesperlocation',0,0,1,'2016-07-10 09:43:06','alladinx',NULL,NULL,1),(17,'M0016','Sales per Customer','salespercustomer',0,0,1,'2016-07-10 09:43:18','alladinx',NULL,NULL,1),(18,'M0017','Clothing Report','clothingreport',0,0,1,'2016-07-10 09:43:33','alladinx',NULL,NULL,1);

/*Table structure for table `sizingmaster` */

DROP TABLE IF EXISTS `sizingmaster`;

CREATE TABLE `sizingmaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sizingCode` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `sizingmaster` */

/*Table structure for table `uommaster` */

DROP TABLE IF EXISTS `uommaster`;

CREATE TABLE `uommaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UOMCode` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `uommaster` */

/*Table structure for table `usermaster` */

DROP TABLE IF EXISTS `usermaster`;

CREATE TABLE `usermaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) DEFAULT NULL,
  `fullName` varchar(100) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `usermaster` */

/*Table structure for table `controlno_v` */

DROP TABLE IF EXISTS `controlno_v`;

/*!50001 DROP VIEW IF EXISTS `controlno_v` */;
/*!50001 DROP TABLE IF EXISTS `controlno_v` */;

/*!50001 CREATE TABLE  `controlno_v`(
 `id` int(11) ,
 `description` varchar(100) ,
 `controlCode` varchar(20) ,
 `controlType` varchar(20) ,
 `noOfDigit` int(11) ,
 `lastDigit` int(11) ,
 `remarks` varchar(250) ,
 `createdDate` datetime ,
 `createdBy` varchar(20) ,
 `modifiedDate` datetime ,
 `modifiedBy` varchar(20) ,
 `status` int(1) ,
 `statusDesc` varchar(8) 
)*/;

/*Table structure for table `customersmaster_v` */

DROP TABLE IF EXISTS `customersmaster_v`;

/*!50001 DROP VIEW IF EXISTS `customersmaster_v` */;
/*!50001 DROP TABLE IF EXISTS `customersmaster_v` */;

/*!50001 CREATE TABLE  `customersmaster_v`(
 `id` int(11) ,
 `customerCode` varchar(20) ,
 `customerName` varchar(250) ,
 `address` varchar(300) ,
 `mobileNo` varchar(100) ,
 `telephoneNo` varchar(100) ,
 `emailAddress` varchar(100) ,
 `faxNo` varchar(100) ,
 `birthDate` date ,
 `TIN` varchar(100) ,
 `isVat` int(1) ,
 `createdDate` datetime ,
 `createdBy` varchar(20) ,
 `modifiedDate` datetime ,
 `modifiedBy` varchar(20) ,
 `status` int(1) ,
 `statusDesc` varchar(8) 
)*/;

/*Table structure for table `departmentmaster_v` */

DROP TABLE IF EXISTS `departmentmaster_v`;

/*!50001 DROP VIEW IF EXISTS `departmentmaster_v` */;
/*!50001 DROP TABLE IF EXISTS `departmentmaster_v` */;

/*!50001 CREATE TABLE  `departmentmaster_v`(
 `id` int(11) ,
 `departmentCode` varchar(20) ,
 `description` varchar(50) ,
 `createdDate` datetime ,
 `createdBy` varchar(20) ,
 `modifiedDate` datetime ,
 `modifiedBy` varchar(20) ,
 `status` int(1) ,
 `statusDesc` varchar(8) 
)*/;

/*Table structure for table `jobtypemaster_v` */

DROP TABLE IF EXISTS `jobtypemaster_v`;

/*!50001 DROP VIEW IF EXISTS `jobtypemaster_v` */;
/*!50001 DROP TABLE IF EXISTS `jobtypemaster_v` */;

/*!50001 CREATE TABLE  `jobtypemaster_v`(
 `id` int(11) ,
 `jobTypeCode` varchar(20) ,
 `description` varchar(100) ,
 `leadTime` varchar(100) ,
 `notificationDay` varchar(20) ,
 `createdDate` datetime ,
 `createdBy` varchar(20) ,
 `modifiedDate` datetime ,
 `modifiedBy` varchar(20) ,
 `status` int(1) ,
 `statusDesc` varchar(8) 
)*/;

/*Table structure for table `materialmaster_v` */

DROP TABLE IF EXISTS `materialmaster_v`;

/*!50001 DROP VIEW IF EXISTS `materialmaster_v` */;
/*!50001 DROP TABLE IF EXISTS `materialmaster_v` */;

/*!50001 CREATE TABLE  `materialmaster_v`(
 `id` int(11) ,
 `materialCode` varchar(20) ,
 `description` varchar(100) ,
 `createdDate` datetime ,
 `createdBy` varchar(20) ,
 `modifiedDate` datetime ,
 `modifiedBy` varchar(20) ,
 `status` int(1) ,
 `statusDesc` varchar(8) 
)*/;

/*Table structure for table `menumaster_v` */

DROP TABLE IF EXISTS `menumaster_v`;

/*!50001 DROP VIEW IF EXISTS `menumaster_v` */;
/*!50001 DROP TABLE IF EXISTS `menumaster_v` */;

/*!50001 CREATE TABLE  `menumaster_v`(
 `id` int(11) ,
 `menuCode` varchar(20) ,
 `description` varchar(100) ,
 `link` varchar(100) ,
 `isMaintenance` int(11) ,
 `isMaintenanceDesc` varchar(3) ,
 `isTransactions` int(11) ,
 `isTransactionsDesc` varchar(3) ,
 `isReports` int(11) ,
 `isReportsDesc` varchar(3) ,
 `createdDate` datetime ,
 `createdBy` varchar(20) ,
 `modifiedDate` datetime ,
 `modifiedBy` varchar(20) ,
 `status` int(1) ,
 `statusDesc` varchar(8) 
)*/;

/*Table structure for table `sizingmaster_v` */

DROP TABLE IF EXISTS `sizingmaster_v`;

/*!50001 DROP VIEW IF EXISTS `sizingmaster_v` */;
/*!50001 DROP TABLE IF EXISTS `sizingmaster_v` */;

/*!50001 CREATE TABLE  `sizingmaster_v`(
 `id` int(11) ,
 `sizingCode` varchar(20) ,
 `description` varchar(100) ,
 `createdDate` datetime ,
 `createdBy` varchar(20) ,
 `modifiedDate` datetime ,
 `modifiedBy` varchar(20) ,
 `status` int(1) ,
 `statusDesc` varchar(8) 
)*/;

/*Table structure for table `uommaster_v` */

DROP TABLE IF EXISTS `uommaster_v`;

/*!50001 DROP VIEW IF EXISTS `uommaster_v` */;
/*!50001 DROP TABLE IF EXISTS `uommaster_v` */;

/*!50001 CREATE TABLE  `uommaster_v`(
 `id` int(11) ,
 `UOMCode` varchar(20) ,
 `description` varchar(100) ,
 `createdDate` datetime ,
 `createdBy` varchar(20) ,
 `modifiedDate` datetime ,
 `modifiedBy` varchar(20) ,
 `status` int(1) ,
 `statusDesc` varchar(8) 
)*/;

/*Table structure for table `usermaster_v` */

DROP TABLE IF EXISTS `usermaster_v`;

/*!50001 DROP VIEW IF EXISTS `usermaster_v` */;
/*!50001 DROP TABLE IF EXISTS `usermaster_v` */;

/*!50001 CREATE TABLE  `usermaster_v`(
 `id` int(11) ,
 `userName` varchar(20) ,
 `fullName` varchar(100) ,
 `createdDate` datetime ,
 `createdBy` varchar(20) ,
 `modifiedDate` datetime ,
 `modifiedBy` varchar(20) ,
 `status` int(1) ,
 `statusDesc` varchar(8) 
)*/;

/*View structure for view controlno_v */

/*!50001 DROP TABLE IF EXISTS `controlno_v` */;
/*!50001 DROP VIEW IF EXISTS `controlno_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `controlno_v` AS (select `controlno`.`id` AS `id`,`controlno`.`description` AS `description`,`controlno`.`controlCode` AS `controlCode`,`controlno`.`controlType` AS `controlType`,`controlno`.`noOfDigit` AS `noOfDigit`,`controlno`.`lastDigit` AS `lastDigit`,`controlno`.`remarks` AS `remarks`,`controlno`.`createdDate` AS `createdDate`,`controlno`.`createdBy` AS `createdBy`,`controlno`.`modifiedDate` AS `modifiedDate`,`controlno`.`modifiedBy` AS `modifiedBy`,`controlno`.`status` AS `status`,(case when (`controlno`.`status` = 1) then 'ACTIVE' else 'INACTIVE' end) AS `statusDesc` from `controlno`) */;

/*View structure for view customersmaster_v */

/*!50001 DROP TABLE IF EXISTS `customersmaster_v` */;
/*!50001 DROP VIEW IF EXISTS `customersmaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customersmaster_v` AS (select `customersmaster`.`id` AS `id`,`customersmaster`.`customerCode` AS `customerCode`,`customersmaster`.`customerName` AS `customerName`,`customersmaster`.`address` AS `address`,`customersmaster`.`mobileNo` AS `mobileNo`,`customersmaster`.`telephoneNo` AS `telephoneNo`,`customersmaster`.`emailAddress` AS `emailAddress`,`customersmaster`.`faxNo` AS `faxNo`,`customersmaster`.`birthDate` AS `birthDate`,`customersmaster`.`TIN` AS `TIN`,`customersmaster`.`isVat` AS `isVat`,`customersmaster`.`createdDate` AS `createdDate`,`customersmaster`.`createdBy` AS `createdBy`,`customersmaster`.`modifiedDate` AS `modifiedDate`,`customersmaster`.`modifiedBy` AS `modifiedBy`,`customersmaster`.`status` AS `status`,(case when (`customersmaster`.`status` = 1) then 'ACTIVE' else 'INACTIVE' end) AS `statusDesc` from `customersmaster`) */;

/*View structure for view departmentmaster_v */

/*!50001 DROP TABLE IF EXISTS `departmentmaster_v` */;
/*!50001 DROP VIEW IF EXISTS `departmentmaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmentmaster_v` AS (select `departmentmaster`.`id` AS `id`,`departmentmaster`.`departmentCode` AS `departmentCode`,`departmentmaster`.`description` AS `description`,`departmentmaster`.`createdDate` AS `createdDate`,`departmentmaster`.`createdBy` AS `createdBy`,`departmentmaster`.`modifiedDate` AS `modifiedDate`,`departmentmaster`.`modifiedBy` AS `modifiedBy`,`departmentmaster`.`status` AS `status`,(case when (`departmentmaster`.`status` = 1) then 'ACTIVE' else 'INACTIVE' end) AS `statusDesc` from `departmentmaster`) */;

/*View structure for view jobtypemaster_v */

/*!50001 DROP TABLE IF EXISTS `jobtypemaster_v` */;
/*!50001 DROP VIEW IF EXISTS `jobtypemaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jobtypemaster_v` AS (select `jobtypemaster`.`id` AS `id`,`jobtypemaster`.`jobTypeCode` AS `jobTypeCode`,`jobtypemaster`.`description` AS `description`,`jobtypemaster`.`leadTime` AS `leadTime`,`jobtypemaster`.`notificationDay` AS `notificationDay`,`jobtypemaster`.`createdDate` AS `createdDate`,`jobtypemaster`.`createdBy` AS `createdBy`,`jobtypemaster`.`modifiedDate` AS `modifiedDate`,`jobtypemaster`.`modifiedBy` AS `modifiedBy`,`jobtypemaster`.`status` AS `status`,(case when (`jobtypemaster`.`status` = 1) then 'ACTIVE' else 'INACTIVE' end) AS `statusDesc` from `jobtypemaster`) */;

/*View structure for view materialmaster_v */

/*!50001 DROP TABLE IF EXISTS `materialmaster_v` */;
/*!50001 DROP VIEW IF EXISTS `materialmaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `materialmaster_v` AS (select `materialmaster`.`id` AS `id`,`materialmaster`.`materialCode` AS `materialCode`,`materialmaster`.`description` AS `description`,`materialmaster`.`createdDate` AS `createdDate`,`materialmaster`.`createdBy` AS `createdBy`,`materialmaster`.`modifiedDate` AS `modifiedDate`,`materialmaster`.`modifiedBy` AS `modifiedBy`,`materialmaster`.`status` AS `status`,(case when (`materialmaster`.`status` = 1) then 'ACTIVE' else 'INACTIVE' end) AS `statusDesc` from `materialmaster`) */;

/*View structure for view menumaster_v */

/*!50001 DROP TABLE IF EXISTS `menumaster_v` */;
/*!50001 DROP VIEW IF EXISTS `menumaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `menumaster_v` AS (select `menumaster`.`id` AS `id`,`menumaster`.`menuCode` AS `menuCode`,`menumaster`.`description` AS `description`,`menumaster`.`link` AS `link`,`menumaster`.`isMaintenance` AS `isMaintenance`,(case when (`menumaster`.`isMaintenance` = 1) then 'YES' else 'NO' end) AS `isMaintenanceDesc`,`menumaster`.`isTransactions` AS `isTransactions`,(case when (`menumaster`.`isTransactions` = 1) then 'YES' else 'NO' end) AS `isTransactionsDesc`,`menumaster`.`isReports` AS `isReports`,(case when (`menumaster`.`isReports` = 1) then 'YES' else 'NO' end) AS `isReportsDesc`,`menumaster`.`createdDate` AS `createdDate`,`menumaster`.`createdBy` AS `createdBy`,`menumaster`.`modifiedDate` AS `modifiedDate`,`menumaster`.`modifiedBy` AS `modifiedBy`,`menumaster`.`status` AS `status`,(case when (`menumaster`.`status` = 1) then 'ACTIVE' else 'INACTIVE' end) AS `statusDesc` from `menumaster`) */;

/*View structure for view sizingmaster_v */

/*!50001 DROP TABLE IF EXISTS `sizingmaster_v` */;
/*!50001 DROP VIEW IF EXISTS `sizingmaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sizingmaster_v` AS (select `sizingmaster`.`id` AS `id`,`sizingmaster`.`sizingCode` AS `sizingCode`,`sizingmaster`.`description` AS `description`,`sizingmaster`.`createdDate` AS `createdDate`,`sizingmaster`.`createdBy` AS `createdBy`,`sizingmaster`.`modifiedDate` AS `modifiedDate`,`sizingmaster`.`modifiedBy` AS `modifiedBy`,`sizingmaster`.`status` AS `status`,(case when (`sizingmaster`.`status` = 1) then 'ACTIVE' else 'INACTIVE' end) AS `statusDesc` from `sizingmaster`) */;

/*View structure for view uommaster_v */

/*!50001 DROP TABLE IF EXISTS `uommaster_v` */;
/*!50001 DROP VIEW IF EXISTS `uommaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `uommaster_v` AS (select `uommaster`.`id` AS `id`,`uommaster`.`UOMCode` AS `UOMCode`,`uommaster`.`description` AS `description`,`uommaster`.`createdDate` AS `createdDate`,`uommaster`.`createdBy` AS `createdBy`,`uommaster`.`modifiedDate` AS `modifiedDate`,`uommaster`.`modifiedBy` AS `modifiedBy`,`uommaster`.`status` AS `status`,(case when (`uommaster`.`status` = 1) then 'ACTIVE' else 'INACTIVE' end) AS `statusDesc` from `uommaster`) */;

/*View structure for view usermaster_v */

/*!50001 DROP TABLE IF EXISTS `usermaster_v` */;
/*!50001 DROP VIEW IF EXISTS `usermaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usermaster_v` AS (select `usermaster`.`id` AS `id`,`usermaster`.`userName` AS `userName`,`usermaster`.`fullName` AS `fullName`,`usermaster`.`createdDate` AS `createdDate`,`usermaster`.`createdBy` AS `createdBy`,`usermaster`.`modifiedDate` AS `modifiedDate`,`usermaster`.`modifiedBy` AS `modifiedBy`,`usermaster`.`status` AS `status`,(case when (`usermaster`.`status` = 1) then 'ACTIVE' else 'INACTIVE' end) AS `statusDesc` from `usermaster`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
