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

/*Table structure for table `armaster` */

DROP TABLE IF EXISTS `armaster`;

CREATE TABLE `armaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ARNo` varchar(20) DEFAULT NULL,
  `billingReferenceNo` varchar(20) DEFAULT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `armaster` */

insert  into `armaster`(`id`,`ARNo`,`billingReferenceNo`,`amount`,`createdDate`,`createdBy`,`status`) values (1,'AR00000001','B00000001','1680.00','2016-09-02 04:32:37','ALLADINX',0);

/*Table structure for table `billingmaster` */

DROP TABLE IF EXISTS `billingmaster`;

CREATE TABLE `billingmaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `billingReferenceNo` varchar(20) DEFAULT NULL,
  `billedDate` datetime DEFAULT NULL,
  `jobOrderReferenceNo` varchar(20) DEFAULT NULL,
  `downPayment` decimal(12,2) DEFAULT NULL,
  `amountReceived` decimal(12,2) DEFAULT NULL,
  `totalAmount` decimal(12,2) DEFAULT NULL,
  `balance` decimal(12,2) DEFAULT NULL,
  `change` decimal(12,2) DEFAULT NULL,
  `postedDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `billingmaster` */

insert  into `billingmaster`(`id`,`billingReferenceNo`,`billedDate`,`jobOrderReferenceNo`,`downPayment`,`amountReceived`,`totalAmount`,`balance`,`change`,`postedDate`,`createdBy`,`status`) values (1,'B00000001','2016-09-02 04:31:39','JO00000004','1000.00','700.00','1680.00','680.00',NULL,'2016-09-02 04:32:37','ALLADINX',1);

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `controlno` */

insert  into `controlno`(`id`,`description`,`controlCode`,`controlType`,`noOfDigit`,`lastDigit`,`remarks`,`createdDate`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values (1,'CUSTOMER MAINTENANCE','C','CUSTOMER',8,2,'Customer Maintenance','2016-07-10 07:33:33','alladinx','2016-07-10 09:08:10','alladinx',1),(2,'DEPARTMENT MAINTENANCE','D','DEPARTMENT',8,3,'Department Maintenance','2016-07-10 08:59:19','alladinx','2016-07-10 09:21:57','alladinx',1),(3,'JOB TYPES MAINTENANCE','JT','JOBTYPE',8,2,'Job Types Maintenance','2016-07-10 08:59:45','alladinx',NULL,NULL,1),(4,'MATERIAL MAINTENANCE','MAT','MATERIAL',8,0,'Material Maintenance','2016-07-10 09:00:14','alladinx','2016-07-27 05:43:22','ALLADINX',0),(5,'MENU MAINTENANCE','M','MENU',4,23,'Menu Maintenance','2016-07-10 09:00:33','alladinx',NULL,NULL,1),(6,'SIZING PATTERN MAINTENANCE','SP','SIZING',8,7,'Sizing Pattern Maintenance','2016-07-10 09:00:57','alladinx',NULL,NULL,1),(7,'UOM MAINTENANCE','UOM','UOM',3,1,'UOM Maintenance','2016-07-10 09:01:23','alladinx',NULL,NULL,1),(9,'ESTIMATE MAINTENANCE','EST','ESTIMATE',8,4,'Estimate Maintenance','2016-07-22 01:11:47','ALLADINX',NULL,NULL,1),(10,'JOB ORDER MAINTENANCE','JO','JOBORDER',8,4,'Job Order Maintenance','2016-07-25 11:23:56','ALLADINX',NULL,NULL,1),(11,'DELIVERY MAINTENANCE','DR','DELIVERY',8,7,'Delivery Maintenance','2016-07-27 05:43:00','ALLADINX',NULL,NULL,1),(12,'BILLING MAINTENANCE','B','BILLING',8,1,'Billing Maintenance','2016-07-27 08:05:00','ALLADINX',NULL,NULL,1),(13,'LABOR COSTS MAINTENANCE','LC','LABORCOSTS',4,19,'Labor Costs Maintenance','2016-07-28 03:57:51','ALLADINX',NULL,NULL,1),(14,'JOB DESCRIPTION MAINTENANCE','JD','JOBDESCRIPTION',4,3,'Job Description Maintenance','2016-07-29 01:46:11','ALLADINX',NULL,NULL,1),(15,'ACCOUNTS RECEIVABLE','AR','ACCOUNTS_RECEIVABLE',8,1,'Accounts Receivable Maintenance','2016-08-31 03:06:19','ALLADINX',NULL,NULL,1);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `customersmaster` */

insert  into `customersmaster`(`id`,`customerCode`,`customerName`,`address`,`mobileNo`,`telephoneNo`,`emailAddress`,`faxNo`,`birthDate`,`TIN`,`isVat`,`createdDate`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values (1,'C00000001','cust1','cust1','cust1','cust1','cust1','cust1','2016-07-01','cust1',1,'2016-07-22 03:30:17','ALLADINX',NULL,NULL,1),(2,'C00000002','cust2','cust2','cust2','cust2','cust2','cust2','2016-08-15','cust2',0,'2016-08-15 01:17:59','ALLADINX',NULL,NULL,1);

/*Table structure for table `deliverydetail` */

DROP TABLE IF EXISTS `deliverydetail`;

CREATE TABLE `deliverydetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deliveryCode` varchar(20) DEFAULT NULL,
  `estimateDtlId` int(11) DEFAULT NULL,
  `JODtlId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `deliverydetail` */

insert  into `deliverydetail`(`id`,`deliveryCode`,`estimateDtlId`,`JODtlId`,`quantity`,`price`) values (1,'DR00000006',NULL,1,10,'100.00'),(2,'DR00000007',NULL,1,5,'100.00');

/*Table structure for table `deliverymaster` */

DROP TABLE IF EXISTS `deliverymaster`;

CREATE TABLE `deliverymaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deliveryCode` varchar(20) DEFAULT NULL,
  `jobOrderReferenceNo` varchar(20) DEFAULT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  `discount` decimal(12,2) DEFAULT NULL,
  `vat` decimal(12,2) DEFAULT NULL,
  `subTotal` decimal(12,2) DEFAULT NULL,
  `totalAmount` decimal(12,2) DEFAULT NULL,
  `preparedBy` varchar(20) DEFAULT NULL,
  `preparedDate` datetime DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `deliverymaster` */

insert  into `deliverymaster`(`id`,`deliveryCode`,`jobOrderReferenceNo`,`amount`,`discount`,`vat`,`subTotal`,`totalAmount`,`preparedBy`,`preparedDate`,`createdDate`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values (1,'DR00000006','JO00000004','1000.00','0.00','120.00','1000.00','1120.00','ALLADINX','2016-09-02 04:22:06','2016-09-02 04:21:37','ALLADINX',NULL,NULL,1),(2,'DR00000007','JO00000004','500.00','0.00','60.00','500.00','560.00','ALLADINX','2016-09-02 04:31:15','2016-09-02 04:21:47','ALLADINX',NULL,NULL,1);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `departmentmaster` */

insert  into `departmentmaster`(`id`,`departmentCode`,`description`,`createdDate`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values (1,'D00000001','Finance','2016-07-26 04:33:57','ALLADINX',NULL,NULL,1),(2,'D00000002','Accounting','2016-07-26 04:34:02','ALLADINX',NULL,NULL,1),(3,'D00000003','Information Technology','2016-07-26 04:34:11','ALLADINX',NULL,NULL,1);

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
  `material` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `estimatedetail` */

insert  into `estimatedetail`(`id`,`estimateMasterId`,`quoteReferenceNo`,`specification`,`size`,`quantity`,`color`,`uom`,`material`) values (1,1,'EST00000004','asdf','SP00000005',10,'asf','UOM001','asf');

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
  `downPayment` decimal(12,2) DEFAULT '0.00',
  `isAppliedDP` int(1) DEFAULT '0',
  `amount` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `subTotal` decimal(10,2) DEFAULT NULL,
  `vat` decimal(10,2) DEFAULT NULL,
  `totalAmount` decimal(10,2) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT NULL,
  `acknowledgeBy` varchar(20) DEFAULT NULL,
  `acknowledgeDate` datetime DEFAULT NULL,
  `remarks` text,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(5) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `estimatemaster` */

insert  into `estimatemaster`(`id`,`quoteReferenceNo`,`transactionDate`,`customerCode`,`jobType`,`leadTime`,`dueDate`,`isRush`,`attachment`,`downPayment`,`isAppliedDP`,`amount`,`discount`,`subTotal`,`vat`,`totalAmount`,`balance`,`acknowledgeBy`,`acknowledgeDate`,`remarks`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values (1,'EST00000004','2016-09-02 04:19:29','C00000001','JT00000001',10,'2016-09-13',0,'20160902041929cflogo.gif','1000.00',0,'1500.00','0.00','1500.00','180.00','1680.00','680.00',NULL,NULL,'','ALLADINX','2016-09-02 04:19:37','ALLADINX',1);

/*Table structure for table `jobdescriptionmaster` */

DROP TABLE IF EXISTS `jobdescriptionmaster`;

CREATE TABLE `jobdescriptionmaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobDescriptionCode` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `jobdescriptionmaster` */

insert  into `jobdescriptionmaster`(`id`,`jobDescriptionCode`,`description`,`createdDate`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values (1,'JD0001','SEWING','2016-07-29 01:55:10','ALLADINX',NULL,NULL,1),(2,'JD0002','PATCHING','2016-07-29 01:55:26','ALLADINX',NULL,NULL,1),(3,'JD0003','PRINTING','2016-07-29 01:55:38','ALLADINX',NULL,NULL,1);

/*Table structure for table `joborderdepartment` */

DROP TABLE IF EXISTS `joborderdepartment`;

CREATE TABLE `joborderdepartment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobOrderMasterId` int(11) DEFAULT NULL,
  `jobOrderReferenceNo` varchar(20) DEFAULT NULL,
  `departmentCode` varchar(20) DEFAULT NULL,
  `isCurrent` int(1) DEFAULT '1',
  `startDate` datetime DEFAULT NULL,
  `endDate` datetime DEFAULT NULL,
  `startedBy` varchar(20) DEFAULT NULL,
  `endedBy` varchar(20) DEFAULT NULL,
  `remarks` text,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `joborderdepartment` */

insert  into `joborderdepartment`(`id`,`jobOrderMasterId`,`jobOrderReferenceNo`,`departmentCode`,`isCurrent`,`startDate`,`endDate`,`startedBy`,`endedBy`,`remarks`,`createdDate`,`createdBy`,`status`) values (1,1,'JO00000004','D00000003',1,'2016-09-02 04:19:48','2016-09-02 04:21:03','ALLADINX','ALLADINX','test','2016-09-02 04:19:48','ALLADINX',1);

/*Table structure for table `joborderdetail` */

DROP TABLE IF EXISTS `joborderdetail`;

CREATE TABLE `joborderdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobOrderMasterId` int(11) DEFAULT NULL,
  `jobOrderReferenceNo` varchar(20) DEFAULT NULL,
  `specification` varchar(20) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `uom` varchar(20) DEFAULT NULL,
  `material` text,
  `actual` int(11) DEFAULT NULL,
  `qty_delivered` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `joborderdetail` */

insert  into `joborderdetail`(`id`,`jobOrderMasterId`,`jobOrderReferenceNo`,`specification`,`size`,`quantity`,`color`,`uom`,`material`,`actual`,`qty_delivered`) values (1,1,'JO00000004','asdf','SP00000005',10,'asf','UOM001','asf',15,15);

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
  `acknowledgeBy` varchar(20) DEFAULT NULL,
  `acknowledgeDate` datetime DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `jobordermaster` */

insert  into `jobordermaster`(`id`,`jobOrderReferenceNo`,`quoteReferenceNo`,`amount`,`vat`,`discount`,`subTotal`,`totalAmount`,`acknowledgeBy`,`acknowledgeDate`,`createdDate`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values (1,'JO00000004','EST00000004','0.00','0.00','0.00','0.00','0.00',NULL,NULL,'2016-09-02 04:19:37','ALLADINX','2016-09-02 04:22:29','ALLADINX',2);

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

/*Table structure for table `jolaborcostsdetail` */

DROP TABLE IF EXISTS `jolaborcostsdetail`;

CREATE TABLE `jolaborcostsdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `joLaborCostMasterId` int(11) DEFAULT NULL,
  `laborCostsCode` varchar(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `jolaborcostsdetail` */

insert  into `jolaborcostsdetail`(`id`,`joLaborCostMasterId`,`laborCostsCode`,`quantity`,`amount`) values (1,2,'LC0008',15,'10.00'),(2,1,'LC0008',15,'5.00');

/*Table structure for table `jolaborcostsmaster` */

DROP TABLE IF EXISTS `jolaborcostsmaster`;

CREATE TABLE `jolaborcostsmaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobOrderDepartmentId` int(11) DEFAULT NULL,
  `jobOrderReferenceNo` varchar(20) DEFAULT NULL,
  `departmentCode` varchar(20) DEFAULT NULL,
  `employeeName` varchar(100) DEFAULT NULL,
  `jobDescriptionCode` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `jolaborcostsmaster` */

insert  into `jolaborcostsmaster`(`id`,`jobOrderDepartmentId`,`jobOrderReferenceNo`,`departmentCode`,`employeeName`,`jobDescriptionCode`,`description`,`createdBy`,`createdDate`,`modifiedBy`,`modifiedDate`) values (1,1,'JO00000004','D00000003','emp1','JD0002',NULL,'ALLADINX','2016-09-02 04:19:59',NULL,NULL),(2,1,'JO00000004','D00000003','emp2','JD0003',NULL,'ALLADINX','2016-09-02 04:20:04',NULL,NULL);

/*Table structure for table `laborcostsmaster` */

DROP TABLE IF EXISTS `laborcostsmaster`;

CREATE TABLE `laborcostsmaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `laborCostsCode` varchar(20) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `departmentCode` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `laborcostsmaster` */

insert  into `laborcostsmaster`(`id`,`laborCostsCode`,`description`,`departmentCode`,`createdDate`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values (1,'LC0003','Full Sewing with Zigzags',NULL,'2016-07-28 06:36:36','ALLADINX',NULL,NULL,1),(2,'LC0004','Close Shoulder',NULL,'2016-07-28 06:36:50','ALLADINX',NULL,NULL,1),(3,'LC0005','Close Side',NULL,'2016-07-28 06:37:00','ALLADINX',NULL,NULL,1),(4,'LC0006','Close Sleeve',NULL,'2016-07-28 06:37:08','ALLADINX',NULL,NULL,1),(5,'LC0007','Att Sleeve',NULL,'2016-07-28 06:37:18','ALLADINX',NULL,NULL,1),(6,'LC0008','Att Bond',NULL,'2016-07-28 06:37:24','ALLADINX',NULL,NULL,1),(7,'LC0009','Knitting',NULL,'2016-07-28 06:37:31','ALLADINX',NULL,NULL,1),(8,'LC0010','Att Placket with Zigzags',NULL,'2016-07-28 06:37:48','ALLADINX',NULL,NULL,1),(9,'LC0011','Att Colar with Sizing',NULL,'2016-07-28 06:37:58','ALLADINX',NULL,NULL,1),(10,'LC0012','Att Taping',NULL,'2016-07-28 06:38:08','ALLADINX',NULL,NULL,1),(11,'LC0013','Att Button',NULL,'2016-07-28 06:38:16','ALLADINX',NULL,NULL,1),(12,'LC0014','Att Cutout',NULL,'2016-07-28 06:38:23','ALLADINX',NULL,NULL,1),(13,'LC0015','Hemming Sidsid',NULL,'2016-07-28 06:38:33','ALLADINX',NULL,NULL,1),(14,'LC0016','Att Picket with Zipper',NULL,'2016-07-28 06:38:42','ALLADINX',NULL,NULL,1),(15,'LC0017','Button Hole',NULL,'2016-07-28 06:38:50','ALLADINX',NULL,NULL,1),(16,'LC0018','Patching',NULL,'2016-07-28 06:38:58','ALLADINX',NULL,NULL,1),(17,'LC0019','Lach Knitting',NULL,'2016-07-28 06:39:07','ALLADINX',NULL,NULL,1);

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
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `menumaster` */

insert  into `menumaster`(`id`,`menuCode`,`description`,`link`,`icon`,`isMaintenance`,`isTransactions`,`isReports`,`sortNo`,`createdDate`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values (2,'M0001','Control Nos','controlnos','icon-cogs',1,0,0,1,'2016-07-10 09:22:59','alladinx','2016-07-23 10:07:57','ALLADINX',1),(3,'M0002','Customers','customers','icon-group',1,0,0,3,'2016-07-10 09:23:10','alladinx','2016-07-23 10:08:20','ALLADINX',1),(4,'M0003','Departments','departments','icon-home',1,0,0,2,'2016-07-10 09:23:21','alladinx','2016-07-23 10:08:07','ALLADINX',1),(5,'M0004','Job Types','jobtypes','icon-tags',1,0,0,4,'2016-07-10 09:23:30','alladinx','2016-07-23 10:08:27','ALLADINX',1),(6,'M0005','Materials','materials','icon-barcode',1,0,0,5,'2016-07-10 09:23:40','alladinx','2016-07-23 10:08:34','ALLADINX',1),(7,'M0006','Menus','menus','icon-list',1,0,0,6,'2016-07-10 09:23:51','alladinx','2016-07-23 10:08:43','ALLADINX',1),(8,'M0007','Sizing Patterns','sizings','icon-bar-chart',1,0,0,7,'2016-07-10 09:24:07','alladinx','2016-07-23 10:08:51','ALLADINX',1),(9,'M0008','UOMs','uoms','icon-signal',1,0,0,8,'2016-07-10 09:24:20','alladinx','2016-07-23 10:08:58','ALLADINX',1),(10,'M0009','Estimates','estimates','icon-book',0,1,0,1,'2016-07-10 09:24:41','alladinx','2016-07-23 10:04:17','ALLADINX',1),(11,'M0010','Users','users','icon-user',1,0,0,9,'2016-07-10 09:41:29','alladinx','2016-07-23 10:09:06','ALLADINX',1),(12,'M0011','Pending Job Orders','jopending','icon-calendar',0,0,1,NULL,'2016-07-10 09:41:53','alladinx',NULL,NULL,1),(13,'M0012','Upcoming Dues','dues','icon-calendar',0,0,1,NULL,'2016-07-10 09:42:22','alladinx',NULL,NULL,1),(14,'M0013','Work In Process','wip','icon-calendar',0,0,1,NULL,'2016-07-10 09:42:36','alladinx',NULL,NULL,1),(15,'M0014','AR / UI','arui','icon-calendar',0,0,1,NULL,'2016-07-10 09:42:49','alladinx','2016-07-13 04:53:38','alladinx',1),(16,'M0015','Sales per Location','salesperlocation','icon-calendar',0,0,1,NULL,'2016-07-10 09:43:06','alladinx',NULL,NULL,1),(17,'M0016','Sales per Customer','salespercustomer','icon-calendar',0,0,1,NULL,'2016-07-10 09:43:18','alladinx',NULL,NULL,1),(18,'M0017','Clothing Report','clothingreport','icon-calendar',0,0,1,NULL,'2016-07-10 09:43:33','alladinx',NULL,NULL,1),(19,'M0018','Job Orders','joborders','icon-upload-alt',0,1,0,2,'2016-07-13 01:59:17','alladinx','2016-07-23 10:05:50','ALLADINX',1),(20,'M0019','Deliveries','deliveries','icon-truck',0,1,0,3,'2016-07-13 04:09:47','alladinx','2016-07-23 10:06:01','ALLADINX',1),(21,'M0020','Billings','billings','icon-money',0,1,0,4,'2016-07-25 04:58:04','ALLADINX','2016-08-06 03:45:09','ALLADINX',1),(22,'M0021','Daily Collections','dailycollections','icon-credit-card',0,1,0,5,'2016-07-25 04:59:19','ALLADINX','2016-07-25 05:01:14','ALLADINX',1),(23,'M0022','Labor Costs','laborcosts','icon-legal',1,0,0,10,'2016-07-28 03:24:05','ALLADINX','2016-07-28 03:38:59','ALLADINX',1),(24,'M0023','Job Description','jobdescriptions','icon-tasks',1,0,0,11,'2016-07-29 01:11:15','ALLADINX',NULL,NULL,1);

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
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `usermenuaccess` */

insert  into `usermenuaccess`(`id`,`userName`,`menuCode`) values (1,'ALLADINX','M0014'),(2,'ALLADINX','M0017'),(3,'ALLADINX','M0001'),(4,'ALLADINX','M0002'),(5,'ALLADINX','M0019'),(6,'ALLADINX','M0003'),(7,'ALLADINX','M0009'),(8,'ALLADINX','M0018'),(9,'ALLADINX','M0004'),(10,'ALLADINX','M0005'),(11,'ALLADINX','M0006'),(12,'ALLADINX','M0011'),(13,'ALLADINX','M0016'),(14,'ALLADINX','M0015'),(15,'ALLADINX','M0007'),(16,'ALLADINX','M0008'),(17,'ALLADINX','M0012'),(18,'ALLADINX','M0010'),(19,'ALLADINX','M0013'),(20,'NOELSR','M0014'),(21,'NOELSR','M0017'),(22,'NOELSR','M0001'),(23,'NOELSR','M0002'),(24,'NOELSR','M0019'),(25,'NOELSR','M0003'),(26,'NOELSR','M0009'),(27,'NOELSR','M0018'),(28,'NOELSR','M0004'),(29,'NOELSR','M0005'),(30,'NOELSR','M0006'),(31,'NOELSR','M0011'),(32,'NOELSR','M0016'),(33,'NOELSR','M0015'),(34,'NOELSR','M0007'),(35,'NOELSR','M0008'),(36,'NOELSR','M0012'),(37,'NOELSR','M0010'),(38,'NOELSR','M0013'),(39,'ALLADINX','M0020'),(40,'NOELSR','M0020'),(41,'ALLADINX','M0021'),(42,'NOELSR','M0021'),(43,'ALLADINX','M0022'),(44,'NOELSR','M0022'),(45,'REYCAST','M0009'),(46,'ALLADINX','M0023'),(47,'NOELSR','M0023');

/*Table structure for table `billingmaster_v` */

DROP TABLE IF EXISTS `billingmaster_v`;

/*!50001 DROP VIEW IF EXISTS `billingmaster_v` */;
/*!50001 DROP TABLE IF EXISTS `billingmaster_v` */;

/*!50001 CREATE TABLE  `billingmaster_v`(
 `id` int(11) ,
 `billingReferenceNo` varchar(20) ,
 `billedDate` datetime ,
 `jobOrderReferenceNo` varchar(20) ,
 `customerName` varchar(250) ,
 `customerTelNo` varchar(100) ,
 `jobTypeDesc` varchar(100) ,
 `downPayment` decimal(12,2) ,
 `amountReceived` decimal(12,2) ,
 `totalAmount` decimal(12,2) ,
 `balance` decimal(12,2) ,
 `change` decimal(12,2) ,
 `postedDate` datetime ,
 `createdBy` varchar(20) ,
 `status` int(1) ,
 `statusDesc` varchar(11) 
)*/;

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

/*Table structure for table `deliverydetail_v` */

DROP TABLE IF EXISTS `deliverydetail_v`;

/*!50001 DROP VIEW IF EXISTS `deliverydetail_v` */;
/*!50001 DROP TABLE IF EXISTS `deliverydetail_v` */;

/*!50001 CREATE TABLE  `deliverydetail_v`(
 `id` int(11) ,
 `deliveryCode` varchar(20) ,
 `JODtlId` int(11) ,
 `sizeDesc` varchar(100) ,
 `color` varchar(20) ,
 `uomDesc` varchar(100) ,
 `specification` varchar(20) ,
 `material` longblob ,
 `quantity` int(11) ,
 `price` decimal(12,2) 
)*/;

/*Table structure for table `deliverymaster_v` */

DROP TABLE IF EXISTS `deliverymaster_v`;

/*!50001 DROP VIEW IF EXISTS `deliverymaster_v` */;
/*!50001 DROP TABLE IF EXISTS `deliverymaster_v` */;

/*!50001 CREATE TABLE  `deliverymaster_v`(
 `id` int(11) ,
 `deliveryCode` varchar(20) ,
 `jobOrderReferenceNo` varchar(20) ,
 `quoteReferenceNo` varchar(20) ,
 `customerCode` varchar(20) ,
 `customerName` varchar(250) ,
 `address` varchar(300) ,
 `customerTelNo` varchar(100) ,
 `jobTypeDesc` varchar(100) ,
 `isRush` int(1) ,
 `leadTime` varbinary(100) ,
 `dueDate` date ,
 `attachment` text ,
 `downPayment` decimal(12,2) ,
 `isAppliedDP` int(1) ,
 `amount` decimal(12,2) ,
 `discount` decimal(12,2) ,
 `subTotal` decimal(12,2) ,
 `vat` decimal(12,2) ,
 `totalAmount` decimal(12,2) ,
 `preparedBy` varchar(20) ,
 `preparedDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `createdDate` datetime ,
 `createdBy` varchar(20) ,
 `status` int(1) ,
 `statusDesc` varchar(12) 
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
 `id` int(11) ,
 `estimateMasterId` int(11) ,
 `quoteReferenceNo` varchar(20) ,
 `specification` varchar(20) ,
 `size` varchar(20) ,
 `sizeDesc` varchar(100) ,
 `quantity` int(11) ,
 `color` varchar(20) ,
 `uom` varchar(20) ,
 `uomDesc` varchar(100) ,
 `material` text 
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
 `isRushDesc` varchar(3) ,
 `jobType` varchar(20) ,
 `jobTypeDesc` varchar(100) ,
 `leadTime` varbinary(100) ,
 `notificationDay` varchar(20) ,
 `dueDate` date ,
 `attachment` text ,
 `downPayment` decimal(12,2) ,
 `isAppliedDP` int(1) ,
 `amount` decimal(10,2) ,
 `discount` decimal(10,2) ,
 `subTotal` decimal(10,2) ,
 `vat` decimal(10,2) ,
 `totalAmount` decimal(10,2) ,
 `balance` decimal(10,2) ,
 `acknowledgeBy` varchar(20) ,
 `acknowledgeDate` datetime ,
 `remarks` text ,
 `createdBy` varchar(20) ,
 `userName` varchar(100) ,
 `modifiedDate` datetime ,
 `modifiedBy` varchar(20) ,
 `status` int(5) ,
 `statusDesc` varchar(12) 
)*/;

/*Table structure for table `jobdescriptionmaster_v` */

DROP TABLE IF EXISTS `jobdescriptionmaster_v`;

/*!50001 DROP VIEW IF EXISTS `jobdescriptionmaster_v` */;
/*!50001 DROP TABLE IF EXISTS `jobdescriptionmaster_v` */;

/*!50001 CREATE TABLE  `jobdescriptionmaster_v`(
 `id` int(11) ,
 `jobDescriptionCode` varchar(20) ,
 `description` varchar(100) ,
 `createdDate` datetime ,
 `createdBy` varchar(20) ,
 `modifiedDate` datetime ,
 `modifiedBy` varchar(20) ,
 `status` int(1) ,
 `statusDesc` varchar(8) 
)*/;

/*Table structure for table `joborderdepartment_v` */

DROP TABLE IF EXISTS `joborderdepartment_v`;

/*!50001 DROP VIEW IF EXISTS `joborderdepartment_v` */;
/*!50001 DROP TABLE IF EXISTS `joborderdepartment_v` */;

/*!50001 CREATE TABLE  `joborderdepartment_v`(
 `id` int(11) ,
 `jobOrderMasterId` int(11) ,
 `jobOrderReferenceNo` varchar(20) ,
 `departmentCode` varchar(20) ,
 `departmentName` varchar(50) ,
 `isCurrent` int(1) ,
 `startDate` datetime ,
 `endDate` datetime ,
 `startedBy` varchar(20) ,
 `endedBy` varchar(20) ,
 `remarks` text ,
 `createdDate` datetime ,
 `createdBy` varchar(20) ,
 `status` int(1) 
)*/;

/*Table structure for table `joborderdetail_v` */

DROP TABLE IF EXISTS `joborderdetail_v`;

/*!50001 DROP VIEW IF EXISTS `joborderdetail_v` */;
/*!50001 DROP TABLE IF EXISTS `joborderdetail_v` */;

/*!50001 CREATE TABLE  `joborderdetail_v`(
 `id` int(11) ,
 `jobOrderMasterId` int(11) ,
 `jobOrderReferenceNo` varchar(20) ,
 `specification` varchar(20) ,
 `size` varchar(20) ,
 `sizeDesc` varchar(100) ,
 `quantity` int(11) ,
 `color` varchar(20) ,
 `uom` varchar(20) ,
 `uomDesc` varchar(100) ,
 `material` text ,
 `actual` int(11) ,
 `qty_delivered` int(11) ,
 `qty_remaining` bigint(12) 
)*/;

/*Table structure for table `jobordermaster_v` */

DROP TABLE IF EXISTS `jobordermaster_v`;

/*!50001 DROP VIEW IF EXISTS `jobordermaster_v` */;
/*!50001 DROP TABLE IF EXISTS `jobordermaster_v` */;

/*!50001 CREATE TABLE  `jobordermaster_v`(
 `id` int(11) ,
 `jobOrderReferenceNo` varchar(20) ,
 `quoteReferenceNo` varchar(20) ,
 `jobType` varchar(20) ,
 `jobTypeDesc` varchar(100) ,
 `customerCode` varchar(20) ,
 `customerName` varchar(250) ,
 `address` varchar(300) ,
 `customerTelNo` varchar(100) ,
 `isRush` int(1) ,
 `isRushDesc` varchar(3) ,
 `leadTime` varbinary(100) ,
 `dueDate` date ,
 `department` varchar(50) ,
 `total_qty` decimal(41,0) ,
 `downPayment` decimal(12,2) ,
 `isAppliedDP` int(1) ,
 `amount` decimal(10,2) ,
 `vat` decimal(10,2) ,
 `discount` decimal(10,2) ,
 `subTotal` decimal(10,2) ,
 `totalAmount` decimal(10,2) ,
 `balance` decimal(10,2) ,
 `transactionDate` datetime ,
 `attachment` text ,
 `acknowledgeBy` varchar(20) ,
 `acknowledgeDate` datetime ,
 `createdDate` datetime ,
 `createdBy` varchar(20) ,
 `modifiedDate` datetime ,
 `modifiedBy` varchar(20) ,
 `status` int(1) ,
 `statusDesc` varchar(9) 
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

/*Table structure for table `jolaborcostsdetail_v` */

DROP TABLE IF EXISTS `jolaborcostsdetail_v`;

/*!50001 DROP VIEW IF EXISTS `jolaborcostsdetail_v` */;
/*!50001 DROP TABLE IF EXISTS `jolaborcostsdetail_v` */;

/*!50001 CREATE TABLE  `jolaborcostsdetail_v`(
 `id` int(11) ,
 `joLaborCostMasterId` int(11) ,
 `laborCostsCode` varchar(20) ,
 `laborCostsDesc` varchar(50) ,
 `quantity` int(11) ,
 `amount` decimal(12,2) ,
 `total` decimal(22,2) 
)*/;

/*Table structure for table `jolaborcostsmaster_v` */

DROP TABLE IF EXISTS `jolaborcostsmaster_v`;

/*!50001 DROP VIEW IF EXISTS `jolaborcostsmaster_v` */;
/*!50001 DROP TABLE IF EXISTS `jolaborcostsmaster_v` */;

/*!50001 CREATE TABLE  `jolaborcostsmaster_v`(
 `id` int(11) ,
 `jobOrderDepartmentId` int(11) ,
 `jobOrderReferenceNo` varchar(20) ,
 `customerName` varchar(250) ,
 `departmentCode` varchar(20) ,
 `departmentName` varchar(50) ,
 `employeeName` varchar(100) ,
 `jobDescriptionCode` varchar(20) ,
 `jobDescription` varchar(100) ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `totalLabor` decimal(44,2) 
)*/;

/*Table structure for table `laborcostsmaster_v` */

DROP TABLE IF EXISTS `laborcostsmaster_v`;

/*!50001 DROP VIEW IF EXISTS `laborcostsmaster_v` */;
/*!50001 DROP TABLE IF EXISTS `laborcostsmaster_v` */;

/*!50001 CREATE TABLE  `laborcostsmaster_v`(
 `id` int(11) ,
 `laborCostsCode` varchar(20) ,
 `description` varchar(50) ,
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

/*View structure for view billingmaster_v */

/*!50001 DROP TABLE IF EXISTS `billingmaster_v` */;
/*!50001 DROP VIEW IF EXISTS `billingmaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `billingmaster_v` AS (select `billingmaster`.`id` AS `id`,`billingmaster`.`billingReferenceNo` AS `billingReferenceNo`,`billingmaster`.`billedDate` AS `billedDate`,`billingmaster`.`jobOrderReferenceNo` AS `jobOrderReferenceNo`,`jobordermaster_v`.`customerName` AS `customerName`,`jobordermaster_v`.`customerTelNo` AS `customerTelNo`,`jobordermaster_v`.`jobTypeDesc` AS `jobTypeDesc`,`billingmaster`.`downPayment` AS `downPayment`,`billingmaster`.`amountReceived` AS `amountReceived`,`billingmaster`.`totalAmount` AS `totalAmount`,`billingmaster`.`balance` AS `balance`,`billingmaster`.`change` AS `change`,`billingmaster`.`postedDate` AS `postedDate`,`billingmaster`.`createdBy` AS `createdBy`,`billingmaster`.`status` AS `status`,(case when (`billingmaster`.`status` = 1) then 'POSTED' when (`billingmaster`.`status` = 2) then 'CLAIMED' else 'FOR POSTING' end) AS `statusDesc` from (`billingmaster` join `jobordermaster_v` on((`jobordermaster_v`.`jobOrderReferenceNo` = `billingmaster`.`jobOrderReferenceNo`)))) */;

/*View structure for view controlno_v */

/*!50001 DROP TABLE IF EXISTS `controlno_v` */;
/*!50001 DROP VIEW IF EXISTS `controlno_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `controlno_v` AS (select `controlno`.`id` AS `id`,`controlno`.`description` AS `description`,`controlno`.`controlCode` AS `controlCode`,`controlno`.`controlType` AS `controlType`,`controlno`.`noOfDigit` AS `noOfDigit`,`controlno`.`lastDigit` AS `lastDigit`,`controlno`.`remarks` AS `remarks`,`controlno`.`createdDate` AS `createdDate`,`controlno`.`createdBy` AS `createdBy`,`controlno`.`modifiedDate` AS `modifiedDate`,`controlno`.`modifiedBy` AS `modifiedBy`,`controlno`.`status` AS `status`,(case when (`controlno`.`status` = 1) then 'ACTIVE' else 'INACTIVE' end) AS `statusDesc` from `controlno`) */;

/*View structure for view customersmaster_v */

/*!50001 DROP TABLE IF EXISTS `customersmaster_v` */;
/*!50001 DROP VIEW IF EXISTS `customersmaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customersmaster_v` AS (select `customersmaster`.`id` AS `id`,`customersmaster`.`customerCode` AS `customerCode`,`customersmaster`.`customerName` AS `customerName`,`customersmaster`.`address` AS `address`,`customersmaster`.`mobileNo` AS `mobileNo`,`customersmaster`.`telephoneNo` AS `telephoneNo`,`customersmaster`.`emailAddress` AS `emailAddress`,`customersmaster`.`faxNo` AS `faxNo`,`customersmaster`.`birthDate` AS `birthDate`,`customersmaster`.`TIN` AS `TIN`,`customersmaster`.`isVat` AS `isVat`,`customersmaster`.`createdDate` AS `createdDate`,`customersmaster`.`createdBy` AS `createdBy`,`customersmaster`.`modifiedDate` AS `modifiedDate`,`customersmaster`.`modifiedBy` AS `modifiedBy`,`customersmaster`.`status` AS `status`,(case when (`customersmaster`.`status` = 1) then 'ACTIVE' else 'INACTIVE' end) AS `statusDesc` from `customersmaster`) */;

/*View structure for view deliverydetail_v */

/*!50001 DROP TABLE IF EXISTS `deliverydetail_v` */;
/*!50001 DROP VIEW IF EXISTS `deliverydetail_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `deliverydetail_v` AS (select `deliverydetail`.`id` AS `id`,`deliverydetail`.`deliveryCode` AS `deliveryCode`,`deliverydetail`.`JODtlId` AS `JODtlId`,`joborderdetail_v`.`sizeDesc` AS `sizeDesc`,`joborderdetail_v`.`color` AS `color`,`joborderdetail_v`.`uomDesc` AS `uomDesc`,`joborderdetail_v`.`specification` AS `specification`,(case when (`joborderdetail_v`.`actual` = NULL) then `joborderdetail_v`.`material` else `joborderdetail_v`.`actual` end) AS `material`,`deliverydetail`.`quantity` AS `quantity`,`deliverydetail`.`price` AS `price` from (`deliverydetail` join `joborderdetail_v` on((`joborderdetail_v`.`id` = `deliverydetail`.`JODtlId`)))) */;

/*View structure for view deliverymaster_v */

/*!50001 DROP TABLE IF EXISTS `deliverymaster_v` */;
/*!50001 DROP VIEW IF EXISTS `deliverymaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `deliverymaster_v` AS (select `deliverymaster`.`id` AS `id`,`deliverymaster`.`deliveryCode` AS `deliveryCode`,`deliverymaster`.`jobOrderReferenceNo` AS `jobOrderReferenceNo`,`estimatemaster_v`.`quoteReferenceNo` AS `quoteReferenceNo`,`estimatemaster_v`.`customerCode` AS `customerCode`,`estimatemaster_v`.`customerName` AS `customerName`,`estimatemaster_v`.`address` AS `address`,`estimatemaster_v`.`customerTelNo` AS `customerTelNo`,`estimatemaster_v`.`jobTypeDesc` AS `jobTypeDesc`,`estimatemaster_v`.`isRush` AS `isRush`,`estimatemaster_v`.`leadTime` AS `leadTime`,`estimatemaster_v`.`dueDate` AS `dueDate`,`estimatemaster_v`.`attachment` AS `attachment`,`estimatemaster_v`.`downPayment` AS `downPayment`,`estimatemaster_v`.`isAppliedDP` AS `isAppliedDP`,`deliverymaster`.`amount` AS `amount`,`deliverymaster`.`discount` AS `discount`,`deliverymaster`.`subTotal` AS `subTotal`,`deliverymaster`.`vat` AS `vat`,`deliverymaster`.`totalAmount` AS `totalAmount`,`deliverymaster`.`preparedBy` AS `preparedBy`,`deliverymaster`.`preparedDate` AS `preparedDate`,`deliverymaster`.`modifiedBy` AS `modifiedBy`,`deliverymaster`.`modifiedDate` AS `modifiedDate`,`deliverymaster`.`createdDate` AS `createdDate`,`deliverymaster`.`createdBy` AS `createdBy`,`deliverymaster`.`status` AS `status`,(case when (`deliverymaster`.`status` = 1) then 'ACKNOWLEDGED' else 'PENDING' end) AS `statusDesc` from ((`deliverymaster` join `jobordermaster` on((`jobordermaster`.`jobOrderReferenceNo` = `deliverymaster`.`jobOrderReferenceNo`))) join `estimatemaster_v` on((`estimatemaster_v`.`quoteReferenceNo` = `jobordermaster`.`quoteReferenceNo`)))) */;

/*View structure for view departmentmaster_v */

/*!50001 DROP TABLE IF EXISTS `departmentmaster_v` */;
/*!50001 DROP VIEW IF EXISTS `departmentmaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmentmaster_v` AS (select `departmentmaster`.`id` AS `id`,`departmentmaster`.`departmentCode` AS `departmentCode`,`departmentmaster`.`description` AS `description`,`departmentmaster`.`createdDate` AS `createdDate`,`departmentmaster`.`createdBy` AS `createdBy`,`departmentmaster`.`modifiedDate` AS `modifiedDate`,`departmentmaster`.`modifiedBy` AS `modifiedBy`,`departmentmaster`.`status` AS `status`,(case when (`departmentmaster`.`status` = 1) then 'ACTIVE' else 'INACTIVE' end) AS `statusDesc` from `departmentmaster`) */;

/*View structure for view estimatedetail_v */

/*!50001 DROP TABLE IF EXISTS `estimatedetail_v` */;
/*!50001 DROP VIEW IF EXISTS `estimatedetail_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estimatedetail_v` AS (select `estimatedetail`.`id` AS `id`,`estimatedetail`.`estimateMasterId` AS `estimateMasterId`,`estimatedetail`.`quoteReferenceNo` AS `quoteReferenceNo`,`estimatedetail`.`specification` AS `specification`,`estimatedetail`.`size` AS `size`,`sizingmaster`.`description` AS `sizeDesc`,`estimatedetail`.`quantity` AS `quantity`,`estimatedetail`.`color` AS `color`,`estimatedetail`.`uom` AS `uom`,`uommaster`.`description` AS `uomDesc`,`estimatedetail`.`material` AS `material` from ((`estimatedetail` join `sizingmaster` on((`sizingmaster`.`sizingCode` = `estimatedetail`.`size`))) join `uommaster` on((`uommaster`.`UOMCode` = `estimatedetail`.`uom`)))) */;

/*View structure for view estimatemaster_v */

/*!50001 DROP TABLE IF EXISTS `estimatemaster_v` */;
/*!50001 DROP VIEW IF EXISTS `estimatemaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estimatemaster_v` AS (select `estimatemaster`.`id` AS `id`,`estimatemaster`.`quoteReferenceNo` AS `quoteReferenceNo`,`estimatemaster`.`transactionDate` AS `transactionDate`,`estimatemaster`.`customerCode` AS `customerCode`,`customersmaster`.`customerName` AS `customerName`,`customersmaster`.`address` AS `address`,`customersmaster`.`telephoneNo` AS `customerTelNo`,`estimatemaster`.`isRush` AS `isRush`,(case when (`estimatemaster`.`isRush` = '1') then 'YES' else 'NO' end) AS `isRushDesc`,`estimatemaster`.`jobType` AS `jobType`,`jobtypemaster`.`description` AS `jobTypeDesc`,(case when (`estimatemaster`.`isRush` = 1) then `estimatemaster`.`leadTime` else `jobtypemaster`.`leadTime` end) AS `leadTime`,`jobtypemaster`.`notificationDay` AS `notificationDay`,`estimatemaster`.`dueDate` AS `dueDate`,`estimatemaster`.`attachment` AS `attachment`,`estimatemaster`.`downPayment` AS `downPayment`,`estimatemaster`.`isAppliedDP` AS `isAppliedDP`,`estimatemaster`.`amount` AS `amount`,`estimatemaster`.`discount` AS `discount`,`estimatemaster`.`subTotal` AS `subTotal`,`estimatemaster`.`vat` AS `vat`,`estimatemaster`.`totalAmount` AS `totalAmount`,`estimatemaster`.`balance` AS `balance`,`estimatemaster`.`acknowledgeBy` AS `acknowledgeBy`,`estimatemaster`.`acknowledgeDate` AS `acknowledgeDate`,`estimatemaster`.`remarks` AS `remarks`,`estimatemaster`.`createdBy` AS `createdBy`,`usermaster`.`fullName` AS `userName`,`estimatemaster`.`modifiedDate` AS `modifiedDate`,`estimatemaster`.`modifiedBy` AS `modifiedBy`,`estimatemaster`.`status` AS `status`,(case when (`estimatemaster`.`status` = 1) then 'ACKNOWLEDGED' when (`estimatemaster`.`status` = 3) then 'CANCELED' when (`estimatemaster`.`status` = 2) then 'DISAPPROVED' else 'PENDING' end) AS `statusDesc` from (((`estimatemaster` join `customersmaster` on((`customersmaster`.`customerCode` = `estimatemaster`.`customerCode`))) join `jobtypemaster` on((`jobtypemaster`.`jobTypeCode` = `estimatemaster`.`jobType`))) join `usermaster` on((`usermaster`.`userName` = `estimatemaster`.`createdBy`)))) */;

/*View structure for view jobdescriptionmaster_v */

/*!50001 DROP TABLE IF EXISTS `jobdescriptionmaster_v` */;
/*!50001 DROP VIEW IF EXISTS `jobdescriptionmaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jobdescriptionmaster_v` AS (select `jobdescriptionmaster`.`id` AS `id`,`jobdescriptionmaster`.`jobDescriptionCode` AS `jobDescriptionCode`,`jobdescriptionmaster`.`description` AS `description`,`jobdescriptionmaster`.`createdDate` AS `createdDate`,`jobdescriptionmaster`.`createdBy` AS `createdBy`,`jobdescriptionmaster`.`modifiedDate` AS `modifiedDate`,`jobdescriptionmaster`.`modifiedBy` AS `modifiedBy`,`jobdescriptionmaster`.`status` AS `status`,(case when (`jobdescriptionmaster`.`status` = 1) then 'ACTIVE' else 'INACTIVE' end) AS `statusDesc` from `jobdescriptionmaster`) */;

/*View structure for view joborderdepartment_v */

/*!50001 DROP TABLE IF EXISTS `joborderdepartment_v` */;
/*!50001 DROP VIEW IF EXISTS `joborderdepartment_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `joborderdepartment_v` AS (select `joborderdepartment`.`id` AS `id`,`joborderdepartment`.`jobOrderMasterId` AS `jobOrderMasterId`,`joborderdepartment`.`jobOrderReferenceNo` AS `jobOrderReferenceNo`,`joborderdepartment`.`departmentCode` AS `departmentCode`,`departmentmaster`.`description` AS `departmentName`,`joborderdepartment`.`isCurrent` AS `isCurrent`,`joborderdepartment`.`startDate` AS `startDate`,`joborderdepartment`.`endDate` AS `endDate`,`joborderdepartment`.`startedBy` AS `startedBy`,`joborderdepartment`.`endedBy` AS `endedBy`,`joborderdepartment`.`remarks` AS `remarks`,`joborderdepartment`.`createdDate` AS `createdDate`,`joborderdepartment`.`createdBy` AS `createdBy`,`joborderdepartment`.`status` AS `status` from (`joborderdepartment` join `departmentmaster` on((`departmentmaster`.`departmentCode` = `joborderdepartment`.`departmentCode`)))) */;

/*View structure for view joborderdetail_v */

/*!50001 DROP TABLE IF EXISTS `joborderdetail_v` */;
/*!50001 DROP VIEW IF EXISTS `joborderdetail_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `joborderdetail_v` AS (select `joborderdetail`.`id` AS `id`,`joborderdetail`.`jobOrderMasterId` AS `jobOrderMasterId`,`joborderdetail`.`jobOrderReferenceNo` AS `jobOrderReferenceNo`,`joborderdetail`.`specification` AS `specification`,`joborderdetail`.`size` AS `size`,`sizingmaster`.`description` AS `sizeDesc`,`joborderdetail`.`quantity` AS `quantity`,`joborderdetail`.`color` AS `color`,`joborderdetail`.`uom` AS `uom`,`uommaster`.`description` AS `uomDesc`,`joborderdetail`.`material` AS `material`,`joborderdetail`.`actual` AS `actual`,`joborderdetail`.`qty_delivered` AS `qty_delivered`,(case when (`joborderdetail`.`qty_delivered` > 0) then (`joborderdetail`.`actual` - `joborderdetail`.`qty_delivered`) else `joborderdetail`.`actual` end) AS `qty_remaining` from ((`joborderdetail` join `sizingmaster` on((`sizingmaster`.`sizingCode` = `joborderdetail`.`size`))) join `uommaster` on((`uommaster`.`UOMCode` = `joborderdetail`.`uom`)))) */;

/*View structure for view jobordermaster_v */

/*!50001 DROP TABLE IF EXISTS `jobordermaster_v` */;
/*!50001 DROP VIEW IF EXISTS `jobordermaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jobordermaster_v` AS (select `jobordermaster`.`id` AS `id`,`jobordermaster`.`jobOrderReferenceNo` AS `jobOrderReferenceNo`,`jobordermaster`.`quoteReferenceNo` AS `quoteReferenceNo`,`estimatemaster_v`.`jobType` AS `jobType`,`estimatemaster_v`.`jobTypeDesc` AS `jobTypeDesc`,`estimatemaster_v`.`customerCode` AS `customerCode`,`estimatemaster_v`.`customerName` AS `customerName`,`estimatemaster_v`.`address` AS `address`,`estimatemaster_v`.`customerTelNo` AS `customerTelNo`,`estimatemaster_v`.`isRush` AS `isRush`,`estimatemaster_v`.`isRushDesc` AS `isRushDesc`,`estimatemaster_v`.`leadTime` AS `leadTime`,`estimatemaster_v`.`dueDate` AS `dueDate`,(select `departmentmaster`.`description` AS `description` from (`joborderdepartment` join `departmentmaster` on((`departmentmaster`.`departmentCode` = `joborderdepartment`.`departmentCode`))) where ((`joborderdepartment`.`isCurrent` = 1) and (`joborderdepartment`.`jobOrderReferenceNo` = `jobordermaster`.`jobOrderReferenceNo`)) limit 0,1) AS `department`,(select sum(`joborderdetail_v`.`qty_remaining`) AS `COUNT(joborderdetail_v.qty_remaining)` from `joborderdetail_v` where (`joborderdetail_v`.`jobOrderReferenceNo` = `jobordermaster`.`jobOrderReferenceNo`)) AS `total_qty`,`estimatemaster_v`.`downPayment` AS `downPayment`,`estimatemaster_v`.`isAppliedDP` AS `isAppliedDP`,`estimatemaster_v`.`amount` AS `amount`,`estimatemaster_v`.`vat` AS `vat`,`estimatemaster_v`.`discount` AS `discount`,`estimatemaster_v`.`subTotal` AS `subTotal`,`estimatemaster_v`.`totalAmount` AS `totalAmount`,`estimatemaster_v`.`balance` AS `balance`,`estimatemaster_v`.`transactionDate` AS `transactionDate`,`estimatemaster_v`.`attachment` AS `attachment`,`jobordermaster`.`acknowledgeBy` AS `acknowledgeBy`,`jobordermaster`.`acknowledgeDate` AS `acknowledgeDate`,`jobordermaster`.`createdDate` AS `createdDate`,`jobordermaster`.`createdBy` AS `createdBy`,`jobordermaster`.`modifiedDate` AS `modifiedDate`,`jobordermaster`.`modifiedBy` AS `modifiedBy`,`jobordermaster`.`status` AS `status`,(case when (`jobordermaster`.`status` = 1) then 'COMPLETED' when (`jobordermaster`.`status` = 2) then 'BILLED' else 'PENDING' end) AS `statusDesc` from (`jobordermaster` join `estimatemaster_v` on((`estimatemaster_v`.`quoteReferenceNo` = `jobordermaster`.`quoteReferenceNo`)))) */;

/*View structure for view jobtypemaster_v */

/*!50001 DROP TABLE IF EXISTS `jobtypemaster_v` */;
/*!50001 DROP VIEW IF EXISTS `jobtypemaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jobtypemaster_v` AS (select `jobtypemaster`.`id` AS `id`,`jobtypemaster`.`jobTypeCode` AS `jobTypeCode`,`jobtypemaster`.`description` AS `description`,`jobtypemaster`.`leadTime` AS `leadTime`,`jobtypemaster`.`notificationDay` AS `notificationDay`,`jobtypemaster`.`createdDate` AS `createdDate`,`jobtypemaster`.`createdBy` AS `createdBy`,`jobtypemaster`.`modifiedDate` AS `modifiedDate`,`jobtypemaster`.`modifiedBy` AS `modifiedBy`,`jobtypemaster`.`status` AS `status`,(case when (`jobtypemaster`.`status` = 1) then 'ACTIVE' else 'INACTIVE' end) AS `statusDesc` from `jobtypemaster`) */;

/*View structure for view jolaborcostsdetail_v */

/*!50001 DROP TABLE IF EXISTS `jolaborcostsdetail_v` */;
/*!50001 DROP VIEW IF EXISTS `jolaborcostsdetail_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jolaborcostsdetail_v` AS (select `jolaborcostsdetail`.`id` AS `id`,`jolaborcostsdetail`.`joLaborCostMasterId` AS `joLaborCostMasterId`,`jolaborcostsdetail`.`laborCostsCode` AS `laborCostsCode`,`laborcostsmaster`.`description` AS `laborCostsDesc`,`jolaborcostsdetail`.`quantity` AS `quantity`,`jolaborcostsdetail`.`amount` AS `amount`,(`jolaborcostsdetail`.`quantity` * `jolaborcostsdetail`.`amount`) AS `total` from (`jolaborcostsdetail` join `laborcostsmaster` on((`laborcostsmaster`.`laborCostsCode` = `jolaborcostsdetail`.`laborCostsCode`)))) */;

/*View structure for view jolaborcostsmaster_v */

/*!50001 DROP TABLE IF EXISTS `jolaborcostsmaster_v` */;
/*!50001 DROP VIEW IF EXISTS `jolaborcostsmaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jolaborcostsmaster_v` AS (select `jolaborcostsmaster`.`id` AS `id`,`jolaborcostsmaster`.`jobOrderDepartmentId` AS `jobOrderDepartmentId`,`jolaborcostsmaster`.`jobOrderReferenceNo` AS `jobOrderReferenceNo`,`jobordermaster_v`.`customerName` AS `customerName`,`jolaborcostsmaster`.`departmentCode` AS `departmentCode`,`joborderdepartment_v`.`departmentName` AS `departmentName`,`jolaborcostsmaster`.`employeeName` AS `employeeName`,`jolaborcostsmaster`.`jobDescriptionCode` AS `jobDescriptionCode`,`jobdescriptionmaster`.`description` AS `jobDescription`,`jolaborcostsmaster`.`createdBy` AS `createdBy`,`jolaborcostsmaster`.`createdDate` AS `createdDate`,`jolaborcostsmaster`.`modifiedBy` AS `modifiedBy`,`jolaborcostsmaster`.`modifiedDate` AS `modifiedDate`,(select sum(`jolaborcostsdetail_v`.`total`) AS `SUM(jolaborcostsdetail_v.total)` from `jolaborcostsdetail_v` where (`jolaborcostsdetail_v`.`joLaborCostMasterId` = `jolaborcostsmaster`.`id`)) AS `totalLabor` from (((`jolaborcostsmaster` join `joborderdepartment_v` on(((`joborderdepartment_v`.`jobOrderReferenceNo` = `jolaborcostsmaster`.`jobOrderReferenceNo`) and (`joborderdepartment_v`.`departmentCode` = `jolaborcostsmaster`.`departmentCode`)))) join `jobordermaster_v` on((`jobordermaster_v`.`jobOrderReferenceNo` = `jolaborcostsmaster`.`jobOrderReferenceNo`))) join `jobdescriptionmaster` on((`jobdescriptionmaster`.`jobDescriptionCode` = `jolaborcostsmaster`.`jobDescriptionCode`)))) */;

/*View structure for view laborcostsmaster_v */

/*!50001 DROP TABLE IF EXISTS `laborcostsmaster_v` */;
/*!50001 DROP VIEW IF EXISTS `laborcostsmaster_v` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laborcostsmaster_v` AS (select `laborcostsmaster`.`id` AS `id`,`laborcostsmaster`.`laborCostsCode` AS `laborCostsCode`,`laborcostsmaster`.`description` AS `description`,`laborcostsmaster`.`createdDate` AS `createdDate`,`laborcostsmaster`.`createdBy` AS `createdBy`,`laborcostsmaster`.`modifiedDate` AS `modifiedDate`,`laborcostsmaster`.`modifiedBy` AS `modifiedBy`,`laborcostsmaster`.`status` AS `status`,(case when (`laborcostsmaster`.`status` = 1) then 'ACTIVE' else 'INACTIVE' end) AS `statusDesc` from `laborcostsmaster`) */;

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
