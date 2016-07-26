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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `controlno` */

insert  into `controlno`(`id`,`description`,`controlCode`,`controlType`,`noOfDigit`,`lastDigit`,`remarks`,`createdDate`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values (1,'CUSTOMER MAINTENANCE','C','CUSTOMER',8,1,'Customer Maintenance','2016-07-10 07:33:33','alladinx','2016-07-10 09:08:10','alladinx',1),(2,'DEPARTMENT MAINTENANCE','D','DEPARTMENT',8,0,'Department Maintenance','2016-07-10 08:59:19','alladinx','2016-07-10 09:21:57','alladinx',1),(3,'JOB TYPES MAINTENANCE','JT','JOBTYPE',8,2,'Job Types Maintenance','2016-07-10 08:59:45','alladinx',NULL,NULL,1),(4,'MATERIAL MAINTENANCE','MAT','MATERIAL',8,0,'Material Maintenance','2016-07-10 09:00:14','alladinx',NULL,NULL,1),(5,'MENU MAINTENANCE','M','MENU',4,21,'Menu Maintenance','2016-07-10 09:00:33','alladinx',NULL,NULL,1),(6,'SIZING PATTERN MAINTENANCE','SP','SIZING',8,7,'Sizing Pattern Maintenance','2016-07-10 09:00:57','alladinx',NULL,NULL,1),(7,'UOM MAINTENANCE','UOM','UOM',3,1,'UOM Maintenance','2016-07-10 09:01:23','alladinx',NULL,NULL,1),(9,'ESTIMATE','EST','ESTIMATE',8,0,'ESTIMATE','2016-07-22 01:11:47','ALLADINX',NULL,NULL,1),(10,'JOB ORDER MAINTENANCE','JO','JOBORDER',8,0,'Job Order Maintenance','2016-07-25 11:23:56','ALLADINX',NULL,NULL,1);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `customersmaster` */

insert  into `customersmaster`(`id`,`customerCode`,`customerName`,`address`,`mobileNo`,`telephoneNo`,`emailAddress`,`faxNo`,`birthDate`,`TIN`,`isVat`,`createdDate`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values (1,'C00000001','cust1','cust1','cust1','cust1','cust1','cust1','2016-07-01','cust1',1,'2016-07-22 03:30:17','ALLADINX',NULL,NULL,1);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `departmentmaster` */

/*Table structure for table `estimatedetail` */

DROP TABLE IF EXISTS `estimatedetail`;

CREATE TABLE `estimatedetail` (
  `estimateMasterId` int(11) DEFAULT NULL,
  `quoteReferenceNo` varchar(20) DEFAULT NULL,
  `specification` varchar(20) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `uom` varchar(20) DEFAULT NULL,
  `material` text,
  `actual_material` text
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
  `leadTime` int(11) DEFAULT NULL,
  `dueDate` date DEFAULT NULL,
  `isRush` int(1) DEFAULT '0',
  `attachment` text,
  `amount` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `subTotal` decimal(10,2) DEFAULT NULL,
  `vat` decimal(10,2) DEFAULT NULL,
  `totalAmount` decimal(10,2) DEFAULT NULL,
  `acknowledgeBy` varchar(20) DEFAULT NULL,
  `acknowledgeDate` datetime DEFAULT NULL,
  `remarks` text,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(5) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `estimatemaster` */

/*Table structure for table `joborderdetails` */

DROP TABLE IF EXISTS `joborderdetails`;

CREATE TABLE `joborderdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jo_masterid` int(11) DEFAULT NULL,
  `jobOrderReferenceNo` varchar(20) DEFAULT NULL,
  `departmentCode` varchar(20) DEFAULT NULL,
  `startDate` datetime DEFAULT NULL,
  `endDate` datetime DEFAULT NULL,
  `startedBy` varchar(20) DEFAULT NULL,
  `endedBy` varchar(20) DEFAULT NULL,
  `Remarks` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `joborderdetails` */

/*Table structure for table `jobordermaster` */

DROP TABLE IF EXISTS `jobordermaster`;

CREATE TABLE `jobordermaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobOrderReferenceNo` varchar(20) DEFAULT NULL,
  `quoteReferenceNo` varchar(20) DEFAULT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `jobtypemaster` */

insert  into `jobtypemaster`(`id`,`jobTypeCode`,`description`,`leadTime`,`notificationDay`,`createdDate`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values (2,'JT00000001','Printing','10','5','2016-07-22 03:30:44','ALLADINX','2016-07-23 07:01:02','ALLADINX',1),(3,'JT00000002','Printing and Embroidery','30','15','2016-07-23 07:01:20','ALLADINX',NULL,NULL,1);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `materialmaster` */

/*Table structure for table `menumaster` */

DROP TABLE IF EXISTS `menumaster`;

CREATE TABLE `menumaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menuCode` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `icon` varchar(30) DEFAULT NULL,
  `isMaintenance` int(11) DEFAULT NULL,
  `isTransactions` int(11) DEFAULT NULL,
  `isReports` int(11) DEFAULT NULL,
  `sortNo` int(11) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `menumaster` */

insert  into `menumaster`(`id`,`menuCode`,`description`,`link`,`icon`,`isMaintenance`,`isTransactions`,`isReports`,`sortNo`,`createdDate`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values (2,'M0001','Control Nos','controlnos','icon-cogs',1,0,0,1,'2016-07-10 09:22:59','alladinx','2016-07-23 10:07:57','ALLADINX',1),(3,'M0002','Customers','customers','icon-group',1,0,0,3,'2016-07-10 09:23:10','alladinx','2016-07-23 10:08:20','ALLADINX',1),(4,'M0003','Departments','departments','icon-home',1,0,0,2,'2016-07-10 09:23:21','alladinx','2016-07-23 10:08:07','ALLADINX',1),(5,'M0004','Job Types','jobtypes','icon-tags',1,0,0,4,'2016-07-10 09:23:30','alladinx','2016-07-23 10:08:27','ALLADINX',1),(6,'M0005','Materials','materials','icon-barcode',1,0,0,5,'2016-07-10 09:23:40','alladinx','2016-07-23 10:08:34','ALLADINX',1),(7,'M0006','Menus','menus','icon-list',1,0,0,6,'2016-07-10 09:23:51','alladinx','2016-07-23 10:08:43','ALLADINX',1),(8,'M0007','Sizing Patterns','sizings','icon-bar-chart',1,0,0,7,'2016-07-10 09:24:07','alladinx','2016-07-23 10:08:51','ALLADINX',1),(9,'M0008','UOMs','uoms','icon-signal',1,0,0,8,'2016-07-10 09:24:20','alladinx','2016-07-23 10:08:58','ALLADINX',1),(10,'M0009','Estimates','estimates','icon-book',0,1,0,1,'2016-07-10 09:24:41','alladinx','2016-07-23 10:04:17','ALLADINX',1),(11,'M0010','Users','users','icon-user',1,0,0,9,'2016-07-10 09:41:29','alladinx','2016-07-23 10:09:06','ALLADINX',1),(12,'M0011','Pending Job Orders','jopending','icon-calendar',0,0,1,NULL,'2016-07-10 09:41:53','alladinx',NULL,NULL,1),(13,'M0012','Upcoming Dues','dues','icon-calendar',0,0,1,NULL,'2016-07-10 09:42:22','alladinx',NULL,NULL,1),(14,'M0013','Work In Process','wip','icon-calendar',0,0,1,NULL,'2016-07-10 09:42:36','alladinx',NULL,NULL,1),(15,'M0014','AR / UI','arui','icon-calendar',0,0,1,NULL,'2016-07-10 09:42:49','alladinx','2016-07-13 04:53:38','alladinx',1),(16,'M0015','Sales per Location','salesperlocation','icon-calendar',0,0,1,NULL,'2016-07-10 09:43:06','alladinx',NULL,NULL,1),(17,'M0016','Sales per Customer','salespercustomer','icon-calendar',0,0,1,NULL,'2016-07-10 09:43:18','alladinx',NULL,NULL,1),(18,'M0017','Clothing Report','clothingreport','icon-calendar',0,0,1,NULL,'2016-07-10 09:43:33','alladinx',NULL,NULL,1),(19,'M0018','Job Orders','joborders','icon-upload-alt',0,1,0,2,'2016-07-13 01:59:17','alladinx','2016-07-23 10:05:50','ALLADINX',1),(20,'M0019','Deliveries','deliveries','icon-truck',0,1,0,3,'2016-07-13 04:09:47','alladinx','2016-07-23 10:06:01','ALLADINX',1),(21,'M0020','Billings','billings','icon-money',0,1,0,4,'2016-07-25 04:58:04','ALLADINX','2016-07-25 05:02:24','ALLADINX',1),(22,'M0021','Daily Collections','dailycollections','icon-credit-card',0,1,0,5,'2016-07-25 04:59:19','ALLADINX','2016-07-25 05:01:14','ALLADINX',1);

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `sizingmaster` */

insert  into `sizingmaster`(`id`,`sizingCode`,`description`,`createdDate`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values (2,'SP00000001','Small','2016-07-21 01:01:23','ALLADINX',NULL,NULL,1),(3,'SP00000002','Medium','2016-07-21 01:01:31','ALLADINX',NULL,NULL,1),(4,'SP00000003','Large','2016-07-21 01:01:38','ALLADINX',NULL,NULL,1),(5,'SP00000004','Extra Large','2016-07-21 01:01:49','ALLADINX','2016-07-21 01:02:02','ALLADINX',1),(6,'SP00000005','Double XL','2016-07-21 01:02:12','ALLADINX',NULL,NULL,1),(7,'SP00000006','Triple XL','2016-07-21 01:02:21','ALLADINX',NULL,NULL,1),(8,'SP00000007','Extra Small','2016-07-21 01:02:30','ALLADINX',NULL,NULL,1);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `uommaster` */

insert  into `uommaster`(`id`,`UOMCode`,`description`,`createdDate`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values (2,'UOM001','uom1','2016-07-22 03:31:50','ALLADINX',NULL,NULL,1);

/*Table structure for table `usermaster` */

DROP TABLE IF EXISTS `usermaster`;

CREATE TABLE `usermaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) DEFAULT NULL,
  `passWord` varchar(50) DEFAULT NULL,
  `fullName` varchar(100) DEFAULT NULL,
  `userType` int(1) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `usermaster` */

insert  into `usermaster`(`id`,`userName`,`passWord`,`fullName`,`userType`,`createdDate`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values (1,'ALLADINX','dcbaa000d6a435d4a6d76b41a7b27b85','ALLADINX',1,'2016-07-13 07:17:15','alladinx',NULL,NULL,1),(2,'NOELSR','92b9fa2f52fd311ed02bd48c345a67d0','NOEL S. RODRIGUEZ',1,'2016-07-13 07:17:31','alladinx',NULL,NULL,1),(3,'REYCAST','c61ee97c26b787b2b6adecf39cf667ee','REYCAST',0,'2016-07-13 07:17:41','alladinx',NULL,NULL,1);

/*Table structure for table `usermenuaccess` */

DROP TABLE IF EXISTS `usermenuaccess`;

CREATE TABLE `usermenuaccess` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) DEFAULT NULL,
  `menuCode` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `usermenuaccess` */

insert  into `usermenuaccess`(`id`,`userName`,`menuCode`) values (1,'ALLADINX','M0014'),(2,'ALLADINX','M0017'),(3,'ALLADINX','M0001'),(4,'ALLADINX','M0002'),(5,'ALLADINX','M0019'),(6,'ALLADINX','M0003'),(7,'ALLADINX','M0009'),(8,'ALLADINX','M0018'),(9,'ALLADINX','M0004'),(10,'ALLADINX','M0005'),(11,'ALLADINX','M0006'),(12,'ALLADINX','M0011'),(13,'ALLADINX','M0016'),(14,'ALLADINX','M0015'),(15,'ALLADINX','M0007'),(16,'ALLADINX','M0008'),(17,'ALLADINX','M0012'),(18,'ALLADINX','M0010'),(19,'ALLADINX','M0013'),(20,'NOELSR','M0014'),(21,'NOELSR','M0017'),(22,'NOELSR','M0001'),(23,'NOELSR','M0002'),(24,'NOELSR','M0019'),(25,'NOELSR','M0003'),(26,'NOELSR','M0009'),(27,'NOELSR','M0018'),(28,'NOELSR','M0004'),(29,'NOELSR','M0005'),(30,'NOELSR','M0006'),(31,'NOELSR','M0011'),(32,'NOELSR','M0016'),(33,'NOELSR','M0015'),(34,'NOELSR','M0007'),(35,'NOELSR','M0008'),(36,'NOELSR','M0012'),(37,'NOELSR','M0010'),(38,'NOELSR','M0013'),(39,'ALLADINX','M0020'),(40,'NOELSR','M0020'),(41,'ALLADINX','M0021'),(42,'NOELSR','M0021');

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

/*Table structure for table `estimatedetail_v` */

DROP TABLE IF EXISTS `estimatedetail_v`;

/*!50001 DROP VIEW IF EXISTS `estimatedetail_v` */;
/*!50001 DROP TABLE IF EXISTS `estimatedetail_v` */;

/*!50001 CREATE TABLE  `estimatedetail_v`(
 `estimateMasterId` int(11) ,
 `quoteReferenceNo` varchar(20) ,
 `specification` varchar(20) ,
 `size` varchar(20) ,
 `sizeDesc` varchar(100) ,
 `quantity` int(11) ,
 `color` varchar(20) ,
 `uom` varchar(20) ,
 `uomDesc` varchar(100) ,
 `material` text ,
 `actual_material` text 
)*/;

/*Table structure for table `estimatemaster_v` */

DROP TABLE IF EXISTS `estimatemaster_v`;

/*!50001 DROP VIEW IF EXISTS `estimatemaster_v` */;
/*!50001 DROP TABLE IF EXISTS `estimatemaster_v` */;

/*!50001 CREATE TABLE  `estimatemaster_v`(
 `id` int(11) ,
 `quoteReferenceNo` varchar(20) ,
 `transactionDate` datetime ,
 `customerCode` varchar(20) ,
 `customerName` varchar(250) ,
 `address` varchar(300) ,
 `customerTelNo` varchar(100) ,
 `isRush` int(1) ,
 `jobType` varchar(20) ,
 `jobTypeDesc` varchar(100) ,
 `leadTime` varbinary(100) ,
 `notificationDay` varchar(20) ,
 `dueDate` date ,
 `attachment` text ,
 `amount` decimal(10,2) ,
 `discount` decimal(10,2) ,
 `subTotal` decimal(10,2) ,
 `vat` decimal(10,2) ,
 `totalAmount` decimal(10,2) ,
 `acknowledgeBy` varchar(20) ,
 `acknowledgeDate` datetime ,
 `remarks` text ,
 `createdBy` varchar(20) ,
 `modifiedDate` datetime ,
 `modifiedBy` varchar(20) ,
 `status` int(5) ,
 `statusDesc` varchar(12) 
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
 `icon` varchar(30) ,
 `isMaintenance` int(11) ,
 `isMaintenanceDesc` varchar(3) ,
 `isTransactions` int(11) ,
 `isTransactionsDesc` varchar(3) ,
 `isReports` int(11) ,
 `isReportsDesc` varchar(3) ,
 `xType` varchar(12) ,
 `createdDate` datetime ,
 `sortNo` int(11) ,
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
 `passWord` varchar(50) ,
 `fullName` varchar(100) ,
 `userType` int(1) ,
 `userTypeDesc` varchar(13) ,
 `createdDate` datetime ,
 `createdBy` varchar(20) ,
 `modifiedDate` datetime ,
 `modifiedBy` varchar(20) ,
 `status` int(1) ,
 `statusDesc` varchar(8) 
)*/;

/*Table structure for table `usermenuaccess_v` */

DROP TABLE IF EXISTS `usermenuaccess_v`;

/*!50001 DROP VIEW IF EXISTS `usermenuaccess_v` */;
/*!50001 DROP TABLE IF EXISTS `usermenuaccess_v` */;

/*!50001 CREATE TABLE  `usermenuaccess_v`(
 `id` int(11) ,
 `userId` int(11) ,
 `userName` varchar(20) ,
 `menuCode` varchar(20) ,
 `menuDesc` varchar(100) ,
 `link` varchar(100) ,
 `icon` varchar(30) ,
 `isMaintenance` int(11) ,
 `isTransactions` int(11) ,
 `isReports` int(11) ,
 `sortNo` int(11) ,
 `xType` varchar(12) 
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

/*View structure for view estimatedetail_v */

/*!50001 DROP TABLE IF EXISTS `estimatedetail_v` */;
/*!50001 DROP VIEW IF EXISTS `estimatedetail_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estimatedetail_v` AS (select `estimatedetail`.`estimateMasterId` AS `estimateMasterId`,`estimatedetail`.`quoteReferenceNo` AS `quoteReferenceNo`,`estimatedetail`.`specification` AS `specification`,`estimatedetail`.`size` AS `size`,`sizingmaster`.`description` AS `sizeDesc`,`estimatedetail`.`quantity` AS `quantity`,`estimatedetail`.`color` AS `color`,`estimatedetail`.`uom` AS `uom`,`uommaster`.`description` AS `uomDesc`,`estimatedetail`.`material` AS `material`,`estimatedetail`.`actual_material` AS `actual_material` from ((`estimatedetail` join `sizingmaster` on((`sizingmaster`.`sizingCode` = `estimatedetail`.`size`))) join `uommaster` on((`uommaster`.`UOMCode` = `estimatedetail`.`uom`)))) */;

/*View structure for view estimatemaster_v */

/*!50001 DROP TABLE IF EXISTS `estimatemaster_v` */;
/*!50001 DROP VIEW IF EXISTS `estimatemaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estimatemaster_v` AS (select `estimatemaster`.`id` AS `id`,`estimatemaster`.`quoteReferenceNo` AS `quoteReferenceNo`,`estimatemaster`.`transactionDate` AS `transactionDate`,`estimatemaster`.`customerCode` AS `customerCode`,`customersmaster`.`customerName` AS `customerName`,`customersmaster`.`address` AS `address`,`customersmaster`.`telephoneNo` AS `customerTelNo`,`estimatemaster`.`isRush` AS `isRush`,`estimatemaster`.`jobType` AS `jobType`,`jobtypemaster`.`description` AS `jobTypeDesc`,(case when (`estimatemaster`.`isRush` = 1) then `estimatemaster`.`leadTime` else `jobtypemaster`.`leadTime` end) AS `leadTime`,`jobtypemaster`.`notificationDay` AS `notificationDay`,`estimatemaster`.`dueDate` AS `dueDate`,`estimatemaster`.`attachment` AS `attachment`,`estimatemaster`.`amount` AS `amount`,`estimatemaster`.`discount` AS `discount`,`estimatemaster`.`subTotal` AS `subTotal`,`estimatemaster`.`vat` AS `vat`,`estimatemaster`.`totalAmount` AS `totalAmount`,`estimatemaster`.`acknowledgeBy` AS `acknowledgeBy`,`estimatemaster`.`acknowledgeDate` AS `acknowledgeDate`,`estimatemaster`.`remarks` AS `remarks`,`estimatemaster`.`createdBy` AS `createdBy`,`estimatemaster`.`modifiedDate` AS `modifiedDate`,`estimatemaster`.`modifiedBy` AS `modifiedBy`,`estimatemaster`.`status` AS `status`,(case when (`estimatemaster`.`status` = 1) then 'ACKNOWLEDGED' when (`estimatemaster`.`status` = 3) then 'CANCELED' when (`estimatemaster`.`status` = 2) then 'DISAPPROVED' else 'PENDING' end) AS `statusDesc` from ((`estimatemaster` join `customersmaster` on((`customersmaster`.`customerCode` = `estimatemaster`.`customerCode`))) join `jobtypemaster` on((`jobtypemaster`.`jobTypeCode` = `estimatemaster`.`jobType`)))) */;

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

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `menumaster_v` AS (select `menumaster`.`id` AS `id`,`menumaster`.`menuCode` AS `menuCode`,`menumaster`.`description` AS `description`,`menumaster`.`link` AS `link`,`menumaster`.`icon` AS `icon`,`menumaster`.`isMaintenance` AS `isMaintenance`,(case when (`menumaster`.`isMaintenance` = 1) then 'YES' else 'NO' end) AS `isMaintenanceDesc`,`menumaster`.`isTransactions` AS `isTransactions`,(case when (`menumaster`.`isTransactions` = 1) then 'YES' else 'NO' end) AS `isTransactionsDesc`,`menumaster`.`isReports` AS `isReports`,(case when (`menumaster`.`isReports` = 1) then 'YES' else 'NO' end) AS `isReportsDesc`,(case when (`menumaster`.`isTransactions` = 1) then 'TRANSACTIONS' when (`menumaster`.`isReports` = 1) then 'REPORTS' else 'MAINTENANCE' end) AS `xType`,`menumaster`.`createdDate` AS `createdDate`,`menumaster`.`sortNo` AS `sortNo`,`menumaster`.`createdBy` AS `createdBy`,`menumaster`.`modifiedDate` AS `modifiedDate`,`menumaster`.`modifiedBy` AS `modifiedBy`,`menumaster`.`status` AS `status`,(case when (`menumaster`.`status` = 1) then 'ACTIVE' else 'INACTIVE' end) AS `statusDesc` from `menumaster`) */;

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

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usermaster_v` AS (select `usermaster`.`id` AS `id`,`usermaster`.`userName` AS `userName`,`usermaster`.`passWord` AS `passWord`,`usermaster`.`fullName` AS `fullName`,`usermaster`.`userType` AS `userType`,(case when (`usermaster`.`userType` = 1) then 'ADMINISTRATOR' else 'USER' end) AS `userTypeDesc`,`usermaster`.`createdDate` AS `createdDate`,`usermaster`.`createdBy` AS `createdBy`,`usermaster`.`modifiedDate` AS `modifiedDate`,`usermaster`.`modifiedBy` AS `modifiedBy`,`usermaster`.`status` AS `status`,(case when (`usermaster`.`status` = 1) then 'ACTIVE' else 'INACTIVE' end) AS `statusDesc` from `usermaster`) */;

/*View structure for view usermenuaccess_v */

/*!50001 DROP TABLE IF EXISTS `usermenuaccess_v` */;
/*!50001 DROP VIEW IF EXISTS `usermenuaccess_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usermenuaccess_v` AS (select `usermenuaccess`.`id` AS `id`,`usermaster`.`id` AS `userId`,`usermenuaccess`.`userName` AS `userName`,`usermenuaccess`.`menuCode` AS `menuCode`,`menumaster`.`description` AS `menuDesc`,`menumaster`.`link` AS `link`,`menumaster`.`icon` AS `icon`,`menumaster`.`isMaintenance` AS `isMaintenance`,`menumaster`.`isTransactions` AS `isTransactions`,`menumaster`.`isReports` AS `isReports`,`menumaster`.`sortNo` AS `sortNo`,(case when (`menumaster`.`isTransactions` = 1) then 'TRANSACTIONS' when (`menumaster`.`isReports` = 1) then 'REPORTS' else 'MAINTENANCE' end) AS `xType` from ((`usermenuaccess` join `menumaster` on((`menumaster`.`menuCode` = `usermenuaccess`.`menuCode`))) join `usermaster` on((`usermaster`.`userName` = `usermenuaccess`.`userName`)))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
