/*
SQLyog Community v12.4.0 (64 bit)
MySQL - 8.0.39 : Database - sunbeam_appdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `advisory` */

DROP TABLE IF EXISTS `advisory`;

CREATE TABLE `advisory` (
  `advisory_id` varchar(100) DEFAULT NULL,
  `section_id` varchar(100) DEFAULT NULL,
  `grade_level` varchar(100) DEFAULT NULL,
  `school_year` varchar(100) DEFAULT NULL,
  `teacher_id` varchar(100) DEFAULT NULL,
  UNIQUE KEY `section_schoolyear` (`section_id`,`school_year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `advisory` */

insert  into `advisory`(`advisory_id`,`section_id`,`grade_level`,`school_year`,`teacher_id`) values 
('ADV3DF461652C696','SEC616E07096778D','Grade 1','SY03FBB1599C61C','TDEC9218A0D6B5');

/*Table structure for table `announcement` */

DROP TABLE IF EXISTS `announcement`;

CREATE TABLE `announcement` (
  `announcement_id` int NOT NULL AUTO_INCREMENT,
  `announcement` text,
  `from_sender` varchar(100) DEFAULT NULL,
  `type` enum('school','advisory') DEFAULT NULL,
  `advisory_id` varchar(100) DEFAULT NULL,
  `syid` varchar(100) DEFAULT NULL,
  `dateTimePosted` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `announcement` */

insert  into `announcement`(`announcement_id`,`announcement`,`from_sender`,`type`,`advisory_id`,`syid`,`dateTimePosted`) values 
(12,'<p>Hi guys welcome to my vlog</p><p>admo dre office</p>','1','school',NULL,'SY03FBB1599C61C','2024-12-05 14:12:49'),
(13,'WALAY KLASEEEEEEEEEEEEEEEE!!','T158F0C1C96533','advisory','ADV37A37989430D0','SY03FBB1599C61C','2024-12-12 21:14:43'),
(14,'IS OJT is now started. Take care students. You are call to lead.','1','school',NULL,'SY03FBB1599C61C','2025-02-12 09:45:39'),
(15,'To our new enrollees, the Sunbeam Christian School of Panabo is now accepting new enrollees. Come and visit us and we are happy to assist you. Thank you!&nbsp;','1','school',NULL,'SY03FBB1599C61C','2025-02-12 10:05:01'),
(16,'To our parents, we are having an event to help our student improve their skills in Sci-Math. The schedule will be posted out soon. Thank you!','1','school',NULL,'SY03FBB1599C61C','2025-02-12 10:11:16'),
(17,'Welcome to the section announcement. We are happy to give your child a lot of homework this school year. Thank You!','TDFDB936CDE413','advisory','ADVCE3AAA218B77C','SY03FBB1599C61C','2025-02-17 14:16:15');

/*Table structure for table `bankdetails` */

DROP TABLE IF EXISTS `bankdetails`;

CREATE TABLE `bankdetails` (
  `tblid` varchar(100) DEFAULT NULL,
  `bankName` varchar(100) DEFAULT NULL,
  `instructions` text,
  `accountNumber` varchar(100) DEFAULT NULL,
  `accountName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `bankdetails` */

insert  into `bankdetails`(`tblid`,`bankName`,`instructions`,`accountNumber`,`accountName`) values 
('BANK0001','GCASH',NULL,'09912021547','BRIAN JADE GARCIA');

/*Table structure for table `captureform137` */

DROP TABLE IF EXISTS `captureform137`;

CREATE TABLE `captureform137` (
  `form137_id` int NOT NULL AUTO_INCREMENT,
  `school_name` varchar(100) DEFAULT NULL,
  `school_id` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `division` varchar(100) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `grade_level` varchar(100) DEFAULT NULL,
  `section` varchar(100) DEFAULT NULL,
  `school_year` varchar(100) DEFAULT NULL,
  `adviser_name` varchar(100) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`form137_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `captureform137` */

/*Table structure for table `captureform137_grades` */

DROP TABLE IF EXISTS `captureform137_grades`;

CREATE TABLE `captureform137_grades` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `form137_id` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `first_grading` varchar(100) DEFAULT NULL,
  `second_grading` varchar(100) DEFAULT NULL,
  `third_grading` varchar(100) DEFAULT NULL,
  `fourth_grading` varchar(100) DEFAULT NULL,
  `final_rating` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `order_grades` decimal(10,1) DEFAULT NULL,
  `order_parent` varchar(100) DEFAULT NULL,
  `subject_head_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `captureform137_grades` */

/*Table structure for table `documentrequest` */

DROP TABLE IF EXISTS `documentrequest`;

CREATE TABLE `documentrequest` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `document` varchar(100) DEFAULT NULL,
  `parent_id` varchar(100) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `request_status` enum('PENDING','CLAIMED','FOR CLAIM') DEFAULT NULL,
  `dateRequested` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `documentrequest` */

/*Table structure for table `enrollment` */

DROP TABLE IF EXISTS `enrollment`;

CREATE TABLE `enrollment` (
  `enrollment_id` varchar(100) DEFAULT NULL,
  `dateEnrolled` varchar(100) DEFAULT NULL,
  `syid` varchar(100) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `grade_level` varchar(100) DEFAULT NULL,
  `advisory_id` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `credit_balance` varchar(100) DEFAULT NULL,
  `monthly` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `enrollment` */

insert  into `enrollment`(`enrollment_id`,`dateEnrolled`,`syid`,`student_id`,`grade_level`,`advisory_id`,`status`,`credit_balance`,`monthly`) values 
('ENR0AB3C8E540288','2025-04-19 14:00:19','SY03FBB1599C61C','LRN40550101010101','Grade 1','ADV3DF461652C696','ENROLLED',NULL,'1287.5');

/*Table structure for table `enrollment_fees` */

DROP TABLE IF EXISTS `enrollment_fees`;

CREATE TABLE `enrollment_fees` (
  `fee_id` int NOT NULL AUTO_INCREMENT,
  `enrollment_id` varchar(100) DEFAULT NULL,
  `fee` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `fees_id` decimal(10,2) DEFAULT NULL,
  `priority` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`fee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=327 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `enrollment_fees` */

insert  into `enrollment_fees`(`fee_id`,`enrollment_id`,`fee`,`type`,`amount`,`status`,`fees_id`,`priority`) values 
(321,'ENR0AB3C8E540288','BOOKS','MAIN','4645','PAYMENT',NULL,NULL),
(322,'ENR0AB3C8E540288','ELECTRIC SUBSIDY','MAIN','3300','PAYMENT',NULL,NULL),
(323,'ENR0AB3C8E540288','ID AND INSURANCE','MAIN','380','PAYMENT',NULL,NULL),
(324,'ENR0AB3C8E540288','MISCELLANEOUS FEE','MAIN','5350','PAYMENT',NULL,NULL),
(325,'ENR0AB3C8E540288','REGISTRATION','MAIN','1000','PAYMENT',NULL,'YES'),
(326,'ENR0AB3C8E540288','TUITION','MAIN','6000','PAYMENT',NULL,'YES');

/*Table structure for table `enrollment_requirements` */

DROP TABLE IF EXISTS `enrollment_requirements`;

CREATE TABLE `enrollment_requirements` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `enrollment_id` varchar(100) DEFAULT NULL,
  `document_name` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

/*Data for the table `enrollment_requirements` */

insert  into `enrollment_requirements`(`tblid`,`enrollment_id`,`document_name`,`status`,`student_id`) values 
(55,'ENR0AB3C8E540288','BIRTH CERTIFICATE','YES','LRN40550101010101'),
(56,'ENR0AB3C8E540288','GOOD MORAL','YES','LRN40550101010101'),
(57,'ENR0AB3C8E540288','FORM 137','YES','LRN40550101010101');

/*Table structure for table `fees` */

DROP TABLE IF EXISTS `fees`;

CREATE TABLE `fees` (
  `fees_id` int NOT NULL AUTO_INCREMENT,
  `grade_level` varchar(100) DEFAULT NULL,
  `fee_title` varchar(100) DEFAULT NULL,
  `fee_type` varchar(100) DEFAULT NULL,
  `fee_amount` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `priority` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`fees_id`),
  UNIQUE KEY `grade_level` (`grade_level`,`fee_title`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `fees` */

insert  into `fees`(`fees_id`,`grade_level`,`fee_title`,`fee_type`,`fee_amount`,`status`,`priority`) values 
(17,'Grade 1','TUITION','MAIN','6000','ACTIVE','YES'),
(18,'Grade 1','ELECTRIC SUBSIDY','MAIN','3300','ACTIVE',NULL),
(19,'Grade 1','ID AND INSURANCE','MAIN','380','ACTIVE',NULL),
(24,'Grade 4','REGISTRATION','MAIN','1000','ACTIVE',NULL),
(25,'Grade 4','TUITION','MAIN','6000','ACTIVE',NULL),
(26,'Grade 4','ELECTRIC SUBSIDY','MAIN','3800','ACTIVE',NULL),
(27,'Grade 4','ID AND INSURANCE','MAIN','380','ACTIVE',NULL),
(28,'Grade 4','BOOKS','MAIN','5495','ACTIVE',NULL),
(29,'Grade 4','MISCELLANEOUS FEE','MAIN','5350','ACTIVE',NULL),
(30,'Grade 5','REGISTRATION','MAIN','1000','ACTIVE',NULL),
(31,'Grade 5','TUITION','MAIN','6000','ACTIVE',NULL),
(32,'Grade 5','ELECTRIC SUBSIDY','MAIN','3800','ACTIVE',NULL),
(33,'Grade 5','BOOKS','MAIN','6000','ACTIVE',NULL),
(34,'Grade 5','MISCELLANEOUS FEE','MAIN','7000','ACTIVE',NULL),
(35,'Grade 5','ID AND INSURANCE','MAIN','380','ACTIVE',NULL),
(38,'Grade 1','BOOKS','MAIN','4645','ACTIVE',NULL),
(39,'Grade 1','MISCELLANEOUS FEE','MAIN','5350','ACTIVE',NULL),
(41,'Grade 1','JOGGING PANTS(SMALL)','OTHERS','350','ACTIVE',NULL),
(42,'Grade 2','REGISTRATION','MAIN','1000','ACTIVE',NULL),
(43,'Grade 2','TUITION','MAIN','6000','ACTIVE',NULL),
(44,'Grade 2','ELECTRIC SUBSIDY','MAIN','3500','ACTIVE',NULL),
(45,'Grade 2','ID AND INSURANCE','MAIN','380','ACTIVE',NULL),
(46,'Grade 2','BOOKS','MAIN','4645','ACTIVE',NULL),
(47,'Grade 2','MISCELLANEOUS FEE','MAIN','5350','ACTIVE',NULL),
(49,'Grade 3','REGISTRATION','MAIN','1000','ACTIVE',NULL),
(50,'Grade 3','TUITION','MAIN','6000','ACTIVE',NULL),
(51,'Grade 3','ELECTRIC SUBSIDY','MAIN','3800','ACTIVE',NULL),
(52,'Grade 3','ID AND INSURANCE','MAIN','380','ACTIVE',NULL),
(53,'Grade 3','BOOKS','MAIN','5195','ACTIVE',NULL),
(58,'Grade 1','JOGGING PANTS (LARGE)','OTHERS','350','ACTIVE',NULL),
(59,'Grade 1','JOGGING PANTS (MEDIUM)','OTHERS','350','ACTIVE',NULL),
(66,'Grade 6','REGISTRATION','MAIN','1000','ACTIVE',NULL),
(67,'Grade 6','TUITION','MAIN','6000','ACTIVE',NULL),
(68,'Grade 6','ELECTRIC SUBSIDY','MAIN','3800','ACTIVE',NULL),
(69,'Grade 6','ID AND INSURANCE','MAIN','380','ACTIVE',NULL),
(70,'Grade 6','BOOKS','MAIN','5495','ACTIVE',NULL),
(71,'Grade 6','MISCELLANEOUS FEE','MAIN','5350','ACTIVE',NULL),
(72,'Grade 3','MISCELLANEOUS FEE','MAIN','5350','ACTIVE',NULL),
(73,'Kindergarten 1','REGISTRATION','MAIN','1000','ACTIVE',NULL),
(74,'Kindergarten 1','TUITION','MAIN','6000','ACTIVE',NULL),
(75,'Kindergarten 1','ELECTRIC SUBSIDY','MAIN','2500','ACTIVE',NULL),
(76,'Kindergarten 1','ID AND INSURANCE','MAIN','380','ACTIVE',NULL),
(77,'Kindergarten 1','BOOKS','MAIN','3530','ACTIVE',NULL),
(78,'Kindergarten 1','MISCELLANEOUS FEE','MAIN','4850','ACTIVE',NULL),
(82,'Grade 1','REGISTRATION','MAIN','1000','ACTIVE','YES');

/*Table structure for table `grade_level` */

DROP TABLE IF EXISTS `grade_level`;

CREATE TABLE `grade_level` (
  `grade_level_id` int NOT NULL AUTO_INCREMENT,
  `grade_level` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`grade_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `grade_level` */

insert  into `grade_level`(`grade_level_id`,`grade_level`) values 
(1,'Kindergarten 1'),
(2,'Kindergarten 2'),
(3,'Grade 1'),
(4,'Grade 2'),
(5,'Grade 3'),
(6,'Grade 4'),
(7,'Grade 5'),
(8,'Grade 6');

/*Table structure for table `installment` */

DROP TABLE IF EXISTS `installment`;

CREATE TABLE `installment` (
  `installment_id` int unsigned NOT NULL AUTO_INCREMENT,
  `enrollment_id` varchar(100) DEFAULT NULL,
  `amount_due` varchar(100) DEFAULT '',
  `is_paid` varchar(100) DEFAULT NULL,
  `installment_number` int DEFAULT NULL,
  `syid` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `payment_id` varchar(100) DEFAULT NULL,
  `from_balance` varchar(100) DEFAULT NULL,
  `to_balance` varchar(100) DEFAULT NULL,
  `credit_balance` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`installment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=628 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `installment` */

insert  into `installment`(`installment_id`,`enrollment_id`,`amount_due`,`is_paid`,`installment_number`,`syid`,`type`,`payment_id`,`from_balance`,`to_balance`,`credit_balance`) values 
(617,'ENR0AB3C8E540288','7800','DONE',1,'SY03FBB1599C61C','DOWNPAYMENT',NULL,NULL,NULL,NULL),
(618,'ENR0AB3C8E540288','1287.5','NOT DONE',2,'SY03FBB1599C61C',NULL,NULL,NULL,NULL,NULL),
(619,'ENR0AB3C8E540288','1287.5','NOT DONE',3,'SY03FBB1599C61C',NULL,NULL,NULL,NULL,NULL),
(620,'ENR0AB3C8E540288','1287.5','NOT DONE',4,'SY03FBB1599C61C',NULL,NULL,NULL,NULL,NULL),
(621,'ENR0AB3C8E540288','1287.5','NOT DONE',5,'SY03FBB1599C61C',NULL,NULL,NULL,NULL,NULL),
(622,'ENR0AB3C8E540288','1287.5','NOT DONE',6,'SY03FBB1599C61C',NULL,NULL,NULL,NULL,NULL),
(623,'ENR0AB3C8E540288','1287.5','NOT DONE',7,'SY03FBB1599C61C',NULL,NULL,NULL,NULL,NULL),
(624,'ENR0AB3C8E540288','1287.5','NOT DONE',8,'SY03FBB1599C61C',NULL,NULL,NULL,NULL,NULL),
(625,'ENR0AB3C8E540288','1287.5','NOT DONE',9,'SY03FBB1599C61C',NULL,NULL,NULL,NULL,NULL),
(626,'ENR0AB3C8E540288','1287.5','NOT DONE',10,'SY03FBB1599C61C',NULL,NULL,NULL,NULL,NULL),
(627,'ENR0AB3C8E540288','1287.5','NOT DONE',11,'SY03FBB1599C61C',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `learning_areas` */

DROP TABLE IF EXISTS `learning_areas`;

CREATE TABLE `learning_areas` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `learning_area` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `learning_areas` */

insert  into `learning_areas`(`tblid`,`learning_area`) values 
(1,'Mother Tongue'),
(2,'Filipino'),
(3,'English'),
(4,'Mathematics'),
(5,'Science'),
(6,'Araling Panlipunan'),
(7,'MAPEH - Music'),
(8,'MAPEH - Arts'),
(9,'MAPEH - Physical Education'),
(10,'MAPEH - Health'),
(11,'Eduk. sa Pagpapakatao - Arabic Language'),
(12,'Eduk. sa Pagpapakatao - Islamic Values Education');

/*Table structure for table `onlinepayment` */

DROP TABLE IF EXISTS `onlinepayment`;

CREATE TABLE `onlinepayment` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `transactionCode` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `proofPayment` varchar(100) DEFAULT NULL,
  `status` enum('PENDING','DONE','RETURNED') DEFAULT NULL,
  `transactionDate` varchar(100) DEFAULT NULL,
  `paidBy` varchar(100) DEFAULT NULL,
  `bankDetailsId` varchar(100) DEFAULT NULL,
  `installment_number` varchar(100) DEFAULT NULL,
  `syid` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `onlinepayment` */

/*Table structure for table `onlinepaymentstudents` */

DROP TABLE IF EXISTS `onlinepaymentstudents`;

CREATE TABLE `onlinepaymentstudents` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `transactionCode` varchar(100) DEFAULT NULL COMMENT 'connected to main Table',
  `enrollment_id` varchar(100) DEFAULT NULL,
  `sy_id` varchar(100) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `amount_paid` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `onlinepaymentstudents` */

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `enrollment_id` varchar(100) DEFAULT NULL,
  `syid` varchar(100) DEFAULT NULL,
  `amount_paid` varchar(100) DEFAULT NULL,
  `date_paid` varchar(100) DEFAULT NULL,
  `method_of_payment` varchar(100) DEFAULT NULL,
  `or_number` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `paid_by` varchar(100) DEFAULT NULL,
  `proof_of_payment` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `installment_id` varchar(100) DEFAULT NULL,
  `cashier` varchar(100) DEFAULT NULL,
  `onlinePaymentId` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `payment` */

insert  into `payment`(`payment_id`,`enrollment_id`,`syid`,`amount_paid`,`date_paid`,`method_of_payment`,`or_number`,`remarks`,`paid_by`,`proof_of_payment`,`type`,`installment_id`,`cashier`,`onlinePaymentId`) values 
(146,'ENR0AB3C8E540288','SY03FBB1599C61C','7800','2025-04-26 18:28:00','CASH','OR9019',NULL,NULL,NULL,'DOWNPAYMENT',NULL,'USR-bf7e8239f391b-240728',NULL);

/*Table structure for table `payment_installment` */

DROP TABLE IF EXISTS `payment_installment`;

CREATE TABLE `payment_installment` (
  `payment_id` varchar(100) DEFAULT NULL,
  `installment_id` varchar(100) DEFAULT NULL,
  `enrollment_id` varchar(100) DEFAULT NULL,
  `tbl_id` int NOT NULL AUTO_INCREMENT,
  `from_balance` varchar(100) DEFAULT NULL,
  `to_balance` varchar(100) DEFAULT NULL,
  `credit_balance` varchar(100) DEFAULT NULL,
  `paid` varchar(100) DEFAULT NULL,
  `amount_due` varchar(100) DEFAULT NULL,
  KEY `tbl_id` (`tbl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=292 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `payment_installment` */

insert  into `payment_installment`(`payment_id`,`installment_id`,`enrollment_id`,`tbl_id`,`from_balance`,`to_balance`,`credit_balance`,`paid`,`amount_due`) values 
('146','617','ENR0AB3C8E540288',291,'20675','12875',NULL,'7800','7800');

/*Table structure for table `payment_settings` */

DROP TABLE IF EXISTS `payment_settings`;

CREATE TABLE `payment_settings` (
  `installment_number` varchar(100) DEFAULT NULL,
  `dueDate` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `payment_settings` */

insert  into `payment_settings`(`installment_number`,`dueDate`) values 
('2','2025-04-01');

/*Table structure for table `schedule` */

DROP TABLE IF EXISTS `schedule`;

CREATE TABLE `schedule` (
  `schedule_id` varchar(100) DEFAULT NULL,
  `syid` varchar(100) DEFAULT NULL,
  `advisory_id` varchar(100) DEFAULT NULL COMMENT 'alternate for section with adviser',
  `subject_id` varchar(100) DEFAULT NULL,
  `teacher_id` varchar(100) DEFAULT NULL,
  `from_time` varchar(100) DEFAULT NULL,
  `to_time` varchar(100) DEFAULT NULL,
  `minutes` varchar(100) DEFAULT NULL,
  `monday` varchar(100) DEFAULT NULL,
  `tuesday` varchar(100) DEFAULT NULL,
  `wednesday` varchar(100) DEFAULT NULL,
  `thursday` varchar(100) DEFAULT NULL,
  `friday` varchar(100) DEFAULT NULL,
  UNIQUE KEY `syid` (`syid`,`advisory_id`,`subject_id`,`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `schedule` */

insert  into `schedule`(`schedule_id`,`syid`,`advisory_id`,`subject_id`,`teacher_id`,`from_time`,`to_time`,`minutes`,`monday`,`tuesday`,`wednesday`,`thursday`,`friday`) values 
('SCHED0A25631F6142A','SY03FBB1599C61C','ADV3DF461652C696','SUBJ00BE5D7E0A809','TDEC9218A0D6B5','7:10 AM','8:20 AM',NULL,'1','1','1','1','1');

/*Table structure for table `school_year` */

DROP TABLE IF EXISTS `school_year`;

CREATE TABLE `school_year` (
  `syid` varchar(100) DEFAULT NULL,
  `school_year` varchar(100) DEFAULT NULL,
  `active_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `school_year` */

insert  into `school_year`(`syid`,`school_year`,`active_status`) values 
('SY1','2023-2024','INACTIVE'),
('SY03FBB1599C61C','2024-2025','ACTIVE'),
('SYFBB81F85BEC2F','2025-2026','INACTIVE');

/*Table structure for table `section` */

DROP TABLE IF EXISTS `section`;

CREATE TABLE `section` (
  `section_id` varchar(100) DEFAULT NULL,
  `section` varchar(100) DEFAULT NULL,
  `grade_level` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `section` */

insert  into `section`(`section_id`,`section`,`grade_level`,`status`) values 
('SECF875B8B2F6DD0','4',NULL,'ACTIVE'),
('SEC5DF1F26E0354A','5',NULL,'ACTIVE'),
('SEC616E07096778D','Section Kamatis',NULL,'ACTIVE'),
('SECB83A9B1FD2EE5','Section Talong',NULL,'ACTIVE'),
('SEC51FF453E2D3EB','6',NULL,'ACTIVE'),
('SECA24093ECD2301','Section Okra',NULL,'ACTIVE'),
('SECD1E6E994D17DC','7',NULL,'ACTIVE');

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `grading_period` varchar(100) DEFAULT NULL,
  `active_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `settings` */

insert  into `settings`(`grading_period`,`active_status`) values 
('first_grading','active'),
('second_grading','active'),
('third_grading','active'),
('fourth_grading','active');

/*Table structure for table `student` */

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `student_id` varchar(100) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `name_extension` varchar(100) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `city_mun` varchar(100) DEFAULT NULL,
  `barangay` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `active_sy` varchar(100) DEFAULT NULL,
  `birthDate` varchar(100) DEFAULT NULL,
  `birthPlace` varchar(100) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `ip_flag` varchar(100) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `father_firstname` varchar(100) DEFAULT NULL,
  `father_middlename` varchar(100) DEFAULT NULL,
  `father_lastname` varchar(100) DEFAULT NULL,
  `mother_firstname` varchar(100) DEFAULT NULL,
  `mother_middlename` varchar(100) DEFAULT NULL,
  `mother_lastname` varchar(100) DEFAULT NULL,
  `father_contact` varchar(100) DEFAULT NULL,
  `father_fb` varchar(100) DEFAULT NULL,
  `mother_contact` varchar(100) DEFAULT NULL,
  `mother_fb` varchar(100) DEFAULT NULL,
  `guardian_firstname` varchar(100) DEFAULT NULL,
  `guardian_middlename` varchar(100) DEFAULT NULL,
  `guardian_lastname` varchar(100) DEFAULT NULL,
  `guardian_phone` varchar(100) DEFAULT NULL,
  `guardian_occupation` varchar(100) DEFAULT NULL,
  `last_gradelevel` varchar(100) DEFAULT NULL,
  `last_schoolname` varchar(100) DEFAULT NULL,
  `last_schooladdress` varchar(100) DEFAULT NULL,
  `last_sycompleted` varchar(100) DEFAULT NULL,
  `last_schoolid` varchar(100) DEFAULT NULL,
  `father_occupation` varchar(100) DEFAULT NULL,
  `father_education` varchar(100) DEFAULT NULL,
  `mother_occupation` varchar(100) DEFAULT NULL,
  `mother_education` varchar(100) DEFAULT NULL,
  `parent_id` varchar(100) DEFAULT NULL,
  `current_enrollment_id` varchar(100) DEFAULT NULL,
  `grade_settings` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `firstname` (`firstname`,`middlename`,`lastname`,`name_extension`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `student` */

insert  into `student`(`student_id`,`firstname`,`middlename`,`lastname`,`name_extension`,`region`,`province`,`city_mun`,`barangay`,`address`,`active_sy`,`birthDate`,`birthPlace`,`sex`,`ip_flag`,`religion`,`father_firstname`,`father_middlename`,`father_lastname`,`mother_firstname`,`mother_middlename`,`mother_lastname`,`father_contact`,`father_fb`,`mother_contact`,`mother_fb`,`guardian_firstname`,`guardian_middlename`,`guardian_lastname`,`guardian_phone`,`guardian_occupation`,`last_gradelevel`,`last_schoolname`,`last_schooladdress`,`last_sycompleted`,`last_schoolid`,`father_occupation`,`father_education`,`mother_occupation`,`mother_education`,`parent_id`,`current_enrollment_id`,`grade_settings`) values 
('LRN40550101010101','LUKA','SLOVEJIKA','DONCIC','','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Cacao','AWIT STREET','SY03FBB1599C61C','2018-04-05','DAVAO CITY','Male',NULL,'ATHEIST','PAPA','','DONCIC','MAMA','','DONCIC','(+63) 9191919119','PAPA DONCIC TV','(+63) 9191919191','MAMA DONCIC TV','','','','','',NULL,NULL,NULL,NULL,NULL,'CONSTRUCTION WORKER','COLLEGE GRADUATE','TEACHER','COLLEGE GRADUATE',NULL,'ENR0AB3C8E540288','ACTIVE');

/*Table structure for table `student_grades` */

DROP TABLE IF EXISTS `student_grades`;

CREATE TABLE `student_grades` (
  `grade_id` int NOT NULL AUTO_INCREMENT,
  `subject_id` varchar(100) DEFAULT NULL,
  `schedule_id` varchar(100) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `advisory_id` varchar(100) DEFAULT NULL,
  `first_grading` varchar(100) DEFAULT NULL,
  `second_grading` varchar(100) DEFAULT NULL,
  `third_grading` varchar(100) DEFAULT NULL,
  `fourth_grading` varchar(100) DEFAULT NULL,
  `average` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `student_grades` */

insert  into `student_grades`(`grade_id`,`subject_id`,`schedule_id`,`student_id`,`advisory_id`,`first_grading`,`second_grading`,`third_grading`,`fourth_grading`,`average`,`remarks`) values 
(173,'SUBJ00BE5D7E0A809','SCHED0A25631F6142A','LRN40550101010101','ADV3DF461652C696',NULL,NULL,NULL,NULL,NULL,NULL),
(174,'SUBJ00BE5D7E0A809','SCHED0A25631F6142A','LRN40550101010101','ADV3DF461652C696',NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `subject_main` */

DROP TABLE IF EXISTS `subject_main`;

CREATE TABLE `subject_main` (
  `subject_head_id` decimal(10,1) NOT NULL,
  `subject_head_name` varchar(100) DEFAULT NULL,
  `main_subject` int DEFAULT NULL,
  PRIMARY KEY (`subject_head_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `subject_main` */

insert  into `subject_main`(`subject_head_id`,`subject_head_name`,`main_subject`) values 
(1.0,'Mother Tongue',1),
(2.0,'Filipino',1),
(3.0,'English',1),
(4.0,'Mathematics',1),
(5.0,'Science',1),
(6.0,'Araling Panlipunan',1),
(7.0,'EPP / TLE',1),
(8.0,'MAPEH',1),
(8.1,'Music',0),
(8.2,'Arts',0),
(8.3,'Physical Education',0),
(8.4,'Health',0),
(9.0,'Edukasyon sa Pagpapakatao',1),
(10.0,'Computer',1);

/*Table structure for table `subjects` */

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `subject_id` varchar(100) DEFAULT NULL,
  `subject_code` varchar(100) DEFAULT NULL,
  `subject_title` varchar(100) DEFAULT NULL,
  `subject_description` varchar(100) DEFAULT NULL,
  `subject_head_id` varchar(100) DEFAULT NULL COMMENT 'mao ni mabutang sa grade card na subject jud',
  `subject_type` enum('PARENT','CHILD') DEFAULT NULL,
  `subject_parent_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `subjects` */

insert  into `subjects`(`subject_id`,`subject_code`,`subject_title`,`subject_description`,`subject_head_id`,`subject_type`,`subject_parent_id`) values 
('SUBJ3E39D8690E79C','GMRC / BIBLE','GMRC / BIBLE','GMRC / BIBLE','9.0','PARENT',NULL),
('SUBJ00BE5D7E0A809','MATH 1','MATH 1','MATH 1','4.0','PARENT',NULL),
('SUBJ5D3512C8E76B6','ENGLISH 1','ENGLISH 1','ENGLISH 1','3.0','PARENT',NULL),
('SUBJE1C5B2EFBFCEC','READING AND LITERACY 1','READING AND LITERACY 1','READING AND LITERACY 1','1.0','PARENT',NULL),
('SUBJEDE9205EC2D09','GMRC/BIBLE 4','GMRC/BIBLE 4','GMRC/BIBLE 4','9.0','PARENT',NULL),
('SUBJ92E51EC18A701','MAPEH 4','MAPEH 4','MAPEH 4','8.0','PARENT',NULL),
('SUBJ3E019105754A7','','Music','','8.1','CHILD','SUBJ92E51EC18A701'),
('SUBJB232AC8A4691C','','Arts','','8.2','CHILD','SUBJ92E51EC18A701'),
('SUBJ13B47BE10D5E9','','Physical Education','','8.3','CHILD','SUBJ92E51EC18A701'),
('SUBJ36044A4F83E49','','Health','','8.4','CHILD','SUBJ92E51EC18A701'),
('SUBJ02DAC88F0F0A1','EPP 4','EPP 4','EPP 4','7.0','PARENT',NULL),
('SUBJE77713F7C6A33','MATH 4','MATH 4','MATH 4','4.0','PARENT',NULL),
('SUBJF8E11A50DE474','Filipino 4','Filipino 4','Filipino 4','2.0','PARENT',NULL),
('SUBJD8093D5D1FA2B','Araling Panlipunan 4','Araling Panlipunan 4','Araling Panlipunan 4','6.0','PARENT',NULL),
('SUBJEC230F002A831','Science 4','Science 4','Science 4','5.0','PARENT',NULL),
('SUBJB4BFECB6D5EE7','English 4','English 4','English 4','3.0','PARENT',NULL),
('SUBJFCE25D759253C','ESP / BIBLE 5','ESP / BIBLE 5','ESP / BIBLE 5','9.0','PARENT',NULL),
('SUBJFC78994270B2C','EPP 5','EPP 5','EPP 5','7.0','PARENT',NULL),
('SUBJA0F29F9BC6B7B','ESP 3','ESP 3','ESP/BIBLE','9.0','PARENT',NULL),
('SUBJEA28EF6AD4494','MATH 3','MATH 3','MATHEMATICS 3','4.0','PARENT',NULL),
('SUBJF1EEFAE1CAF4D','MAPEH 3','MAPEH 3','MAPEH 3','8.0','PARENT',NULL),
('SUBJEA3B0F220F59C','','Music','','8.1','CHILD','SUBJF1EEFAE1CAF4D'),
('SUBJ87EAF539F1E0C','','Arts','','8.2','CHILD','SUBJF1EEFAE1CAF4D'),
('SUBJ0F924CB584797','','Physical Education','','8.3','CHILD','SUBJF1EEFAE1CAF4D'),
('SUBJE3AF773C889C2','','Health','','8.4','CHILD','SUBJF1EEFAE1CAF4D'),
('SUBJ14CB55A4DD6CD','SCIENCE 3','SCIENCE 3','SCIENCE 3','5.0','PARENT',NULL),
('SUBJBA3695DEF7CF0','FILIPINO 3','FILIPINO 3','FILIPINO 3','2.0','PARENT',NULL),
('SUBJ673B033EB2043','ARALING PANLIPUNAN 3','ARALING PANLIPUNAN 3','ARALING PANLIPUNAN 3','6.0','PARENT',NULL),
('SUBJ8767CF64F8B1F','ENGLISH 3','ENGLISH 3','ENGLISH 3','3.0','PARENT',NULL),
('SUBJ662273E1C47E6','ENGLISH 5','ENGLISH 5','ENGLISH 5','3.0','PARENT',NULL),
('SUBJ27F90E4F6B88B','MAPEH 5','MAPEH 5','MAPEH 5','8.0','PARENT',NULL),
('SUBJCF17199D41B06','','Music','','8.1','CHILD','SUBJ27F90E4F6B88B'),
('SUBJD3699C20FC1E0','','Arts','','8.2','CHILD','SUBJ27F90E4F6B88B'),
('SUBJ3010129B0525A','','Physical Education','','8.3','CHILD','SUBJ27F90E4F6B88B'),
('SUBJFD96008B83E18','','Health','','8.4','CHILD','SUBJ27F90E4F6B88B'),
('SUBJD5DC3D1534808','MATH 5','MATH 5','MATHEMATICS 5','4.0','PARENT',NULL),
('SUBJ23D8C7C2624D8','SCIENCE 5','SCIENCE 5','SCIENCE 5','5.0','PARENT',NULL),
('SUBJ466B2F94CEAC2','ARALING PANLIPUNAN 5','ARALING PANLIPUNAN 5','ARALING PANLIPUNAN 5','6.0','PARENT',NULL),
('SUBJ1FCC2312C6C92','FILIPINO 5','FILIPINO 5','FILIPINO 5','2.0','PARENT',NULL),
('SUBJD5F563D52DD58','ESP / BIBLE 6','ESP / BIBLE 6','ESP/ BIBLE 6','9.0','PARENT',NULL),
('SUBJ67E5D9552F08C','EPP 6','EPP 6','EPP 6','7.0','PARENT',NULL),
('SUBJBEB413FE43C18','MATH 6','MATH 6','MATHEMATICS 6','4.0','PARENT',NULL),
('SUBJCC9C596D7EC37','FILIPINO 6','FILIPINO 6','FILIPINO 6','2.0','PARENT',NULL),
('SUBJE3F84C6FEB80F','MAPEH 6','MAPEH 6','MAPEH 6','8.0','PARENT',NULL),
('SUBJ5F6FCDBB91442','','Music','','8.1','CHILD','SUBJE3F84C6FEB80F'),
('SUBJ42CF5DF29E6BD','','Arts','','8.2','CHILD','SUBJE3F84C6FEB80F'),
('SUBJFAD96F628A015','','Physical Education','','8.3','CHILD','SUBJE3F84C6FEB80F'),
('SUBJA76E10A8BC50A','','Health','','8.4','CHILD','SUBJE3F84C6FEB80F'),
('SUBJ808FA8B46244D','ARALING PANLIPUNAN 6','ARALING PANLIPUNAN 6','ARALING PANLIPUNAN 6','6.0','PARENT',NULL),
('SUBJ95BD0E8EA9263','ENGLISH 6','ENGLISH 6','ENGLISH 6','3.0','PARENT',NULL),
('SUBJ98B0FE1920949','SCIENCE 6','SCIENCE 6','SCIENCE 6','5.0','PARENT',NULL),
('SUBJ5D33EB2A30AF4','Science 1','Language/Physical and Natural Science','Science 1','5.0','PARENT',NULL),
('SUBJ82301CF8E96A1','SCI 1','Language/Physical and Natural Science','Language/Physical and Natural Science','5.0','PARENT',NULL),
('SUBJ6B071566C5CC2','GMRC/MAKABANSA','GMRC/MAKABANSA','GMRC/MAKABANSA','2.0','PARENT',NULL),
('SUBJ4B514E15A0A04','Computer 1','Computer 1','Computer 1','10.0','PARENT',NULL),
('SUBJD2199CBAA95B6','Language ','Language ','Language ','1.0','PARENT',NULL),
('SUBJ6620E8FD80AFE','Makabansa','Makabansa','Makabansa','2.0','PARENT',NULL),
('SUBJAD725F3830A10','ESP/BIBLE','ESP/BIBLE','ESP/BIBLE','9.0','PARENT',NULL),
('SUBJB9E373050221D','ENGLISH 2','ENGLISH 2','ENGLISH 2','3.0','PARENT',NULL),
('SUBJ916F107C60D25','Araling Panlipunan 2','Araling Panlipunan 2','Araling Panlipunan 2','6.0','PARENT',NULL),
('SUBJ8C775AC3D2C38','Math 2','Math 2','Math 2','4.0','PARENT',NULL),
('SUBJ95B7BBA41721F','Filipino 2','Filipino 2','Filipino 2','2.0','PARENT',NULL),
('SUBJEBEF8E67C9381','Reading and Literacy 2','Reading and Literacy 2','Reading and Literacy 2','3.0','PARENT',NULL),
('SUBJ9E569E62AC89C','MAPEH/COMPUTER','MAPEH/COMPUTER','MAPEH/COMPUTER','8.0','PARENT',NULL),
('SUBJD89F1FA5B59B2','','Music','','8.1','CHILD','SUBJ9E569E62AC89C'),
('SUBJ83723CAD913EF','','Arts','','8.2','CHILD','SUBJ9E569E62AC89C'),
('SUBJ8A77179A05B90','','Physical Education','','8.3','CHILD','SUBJ9E569E62AC89C'),
('SUBJ813A869C19F9D','','Health','','8.4','CHILD','SUBJ9E569E62AC89C'),
('SUBJF83642480CDF9','FIlipino 1','FIlipino 1','FIlipino 1','2.0','PARENT',NULL),
('SUBJ82F9C485A1164',NULL,NULL,NULL,NULL,'PARENT',NULL),
('SUBJ7DE206D3E645A',NULL,NULL,NULL,NULL,'PARENT',NULL),
('SUBJA3CA171CC9C5F',NULL,NULL,NULL,NULL,'PARENT',NULL),
('SUBJB5A77178B8BD5',NULL,NULL,NULL,NULL,'PARENT',NULL),
('SUBJ7D41AB5954600',NULL,NULL,NULL,NULL,'PARENT',NULL),
('SUBJ9C42E04A2E9DB',NULL,NULL,NULL,NULL,'PARENT',NULL);

/*Table structure for table `teacher` */

DROP TABLE IF EXISTS `teacher`;

CREATE TABLE `teacher` (
  `teacher_id` varchar(100) DEFAULT NULL,
  `teacher_firstname` varchar(100) DEFAULT NULL,
  `teacher_middlename` varchar(100) DEFAULT NULL,
  `teacher_lastname` varchar(100) DEFAULT NULL,
  `teacher_extension` varchar(100) DEFAULT NULL,
  `teacher_region` varchar(100) DEFAULT NULL,
  `teacher_province` varchar(100) DEFAULT NULL,
  `teacher_citymun` varchar(100) DEFAULT NULL,
  `teacher_barangay` varchar(100) DEFAULT NULL,
  `teacher_address` varchar(100) DEFAULT NULL,
  `college_course` varchar(100) DEFAULT NULL,
  `post_graduate_course` varchar(100) DEFAULT NULL,
  `teacher_birthdate` varchar(100) DEFAULT NULL,
  `teacher_gender` varchar(100) DEFAULT NULL,
  `teacher_emailaddress` varchar(100) DEFAULT NULL,
  `teacher_contactNumber` varchar(100) DEFAULT NULL,
  `teacher_profile` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `teacher` */

insert  into `teacher`(`teacher_id`,`teacher_firstname`,`teacher_middlename`,`teacher_lastname`,`teacher_extension`,`teacher_region`,`teacher_province`,`teacher_citymun`,`teacher_barangay`,`teacher_address`,`college_course`,`post_graduate_course`,`teacher_birthdate`,`teacher_gender`,`teacher_emailaddress`,`teacher_contactNumber`,`teacher_profile`) values 
('TDEC9218A0D6B5','Ellen Joy','S','Boctotos','','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','J.P. Laurel','PUROK 2','Bachelor of Science in Information Technology','MIT','1990-05-05','Male','sakmaestros@gmail.com','(+63) 9912021547','uploads/profile_images/TDEC9218A0D6B5/profile_image.jpg'),
('TE73F9F3CE2494','Japhet','V','Tolentino','','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Cacao','PUROK 5','BS Education Major in English','Master in Secondary Education','1990-01-01','Male','shernancy@gmail.com','(+63) 9912021547',NULL),
('TDFDB936CDE413','Craizia Jane','M','Del Rosario','','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Cacao','PUROK 3','BS EDUC','','1984-05-05','Female','monkeygarp@gmail.com','(+63) 9912021900',NULL),
('T965A22ED6A3A7','Kaloy','','Loie','','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Buenavista','PUROK 3','BS Educ in Math','','1976-09-21','Male','kaloyloie@gmail.com','(+63) 0991020222',NULL),
('T158F0C1C96533','Ailyn','S','Exclamado','','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Cacao','PUROK 1','BS in Education','','1990-01-01','Male','gifty_joy@yopmail.com','(+63) 1231231231',NULL),
('T392DF740696AD','Leah','M','Araneta ','','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Visayas','Gentiles Subd','BS IN EDUCATION','Master in Education','1965-01-08','Female','leah_araneta@yopmail.com','(+63) 9297501250',NULL),
('T699EBCDE12880','Gifty Joy','Gencianos','Pandio','','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Pob.)','Purok Maharlika','BS IN EDUCATION','Master in Education','1996-10-08','Female','gifty_joy@yopmail.com','(+63) 9122700871',NULL),
('TFAA14AD1015E8','Charlene','Catalan','Serina','','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Sindaton','Purok 3','BS IN EDUCATION','Master in Education','1996-01-29','Female','charlene_serina@yopmail.com','(+63) 9518444498',NULL),
('T6483BBFF587BC','Corie Anne Joy','Camino','Uypala','','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CARMEN','Ising (Pob.)','Purok 13','BS IN EDUCATION','Master in Education','1986-03-13','Female','corie_anne@yopmail.com','(+63) 9631908956',NULL),
('TEBB45FA054403','Aniegyn','P','Advincula','','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Kauswagan','PUROK 5','BS IN EDUCATION','Master in Education','1986-05-21','Female','aniegyn_advincula@yopmail.com','(+63) 0950581374',NULL),
('T499692CC26249','Angelyn','P','Comendador','','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Datu Abdul Dadia','Purok 3','BS in Education','Master in Education','1980-05-02','Female','angelyn@yopmail.com','(+63) 9850623789',NULL),
('T9C605AAF7C68E','Ellen Joy','S','Boctoto','','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','J.P. Laurel','Purok 2','BSIT','MIT','1990-05-05','Male','sakmaestro@asdfasdfasdf.com','(+63) 9912021547',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `active_remarks` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `profile_image` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`role`,`active_remarks`,`fullname`,`gender`,`profile_image`) values 
('1','registrar','$2y$10$/IQUBLgWzYqQ3f.McUCBWeOw/697fyTx3ZehWh6Yds.CP7fp96WPK','admin','active','REGISTRAR',NULL,NULL),
('T158F0C1C96533','ailyn@yopmail.com','$2y$10$oduItQquavEivEjdYizQE.P9wvie8rovaUhlszq5R/hrJUEwLHdSe','teacher','inactive','Ailyn Exclamado',NULL,NULL),
('T392DF740696AD','leah_araneta@yopmail.com','$2y$10$LCmE6CLkz6/AZK1bVNuZ6uHyClizWVMYohffg11xh2my50niTjukq','teacher','active','Leah Araneta ',NULL,NULL),
('T499692CC26249','angelyn@yopmail.com','$2y$10$0OF6LG6oiTudml6Wbq30teD9mtV0bB7KCg7bUMksr2ZuKc3s.YS5e','teacher','active','Angelyn Comendador',NULL,NULL),
('T6483BBFF587BC','corie_anne@yopmail.com','$2y$10$2nzPr.dskDKKDfVeAMqyTeK0ZzOV3wOQSAYB6omHEB4R6Hwg4NJ9q','teacher','active','Corie Anne Joy Uypala',NULL,NULL),
('T699EBCDE12880','gifty_joy@yopmail.com','$2y$10$wRQ7tPuWF7A4PmIpqAw1FOUEA0WHGIrum2O93KZXoIezhGNNrVWSG','teacher','active','Gifty Joy Pandio',NULL,NULL),
('T9C605AAF7C68E','sakmaestro@asdfasdfasdf.com','$2y$10$kult2lWzTEl2iZpG5LPP1ev1.RkdUt6Oh.zaBL76k1Av94UjMl5gi','teacher','active','Ellen Joy Boctoto',NULL,NULL),
('TDEC9218A0D6B5','ellenjoy@yopmail.com','$2y$10$/IQUBLgWzYqQ3f.McUCBWeOw/697fyTx3ZehWh6Yds.CP7fp96WPK','teacher','active','Ellen Joy Boctoto',NULL,NULL),
('TDFDB936CDE413','craizia@yopmail.com','$2y$10$Ed7uBalvL71wslBUN3.1/u01lmaO4oN1XU6E/IB3nH1f0qP/kD7Oi','teacher','active','Craizia Jane Del Rosario',NULL,NULL),
('TE73F9F3CE2494','japhet@yopmail.com','$2y$10$orztpllakLvLF6TYdCnq.OTO3hjzHo9QAONfauHlWRzJI39BZhYpO','teacher','inactive','Japhet Tolentino',NULL,NULL),
('TEBB45FA054403','aniegyn_advincula@yopmail.com','$2y$10$ajp91aWsK1mYD6mAXKAmXOSdCRE8a/rUL0.u53nwaeqEV3QHuBbHK','teacher','active','Aniegyn Advincula',NULL,NULL),
('TFAA14AD1015E8','charlene_serina@yopmail.com','$2y$10$gTGT7VBqLsYO9Nzu2slmremuZSNilugjoREU8IR7u9kLGP7.i2iTe','teacher','active','Charlene Serina',NULL,NULL),
('USR-a8ef4c1ca89b5-241205','lyvee@yopmail.com','$2y$10$3U/it.ycbXHW96DioREZOe6WziLp38tz6nZZS8S2TWkPuB7RSzER2','parent','active','LYVEE JEAN GALORIO','FEMALE','uploads/users/default.jpg'),
('USR-bf7e8239f391b-240728','cashier@yopmail.com','$2y$10$n4ya6pMOanUCRdfZMrh3quKKCflNAK9sFWPFCEayDb1qX90N/Q692','cashier','active','Lebi san','MALE','uploads/users/fullname.png'),
('USR-d8644e21bf759-250219','alejandro@gmail.com','$2y$10$9Pr7Zy6Pbf8Sz2ezVbF7ju8ekuO0617usXN.8WYb6KVhyZuZplRuO','parent','active','ALEJANDRO DURAN','MALE','uploads/users/default.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
