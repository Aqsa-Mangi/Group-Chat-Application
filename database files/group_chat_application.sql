/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.27-MariaDB : Database - group_chat_application
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`group_chat_application` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `group_chat_application`;

/*Table structure for table `chat_messages` */

DROP TABLE IF EXISTS `chat_messages`;

CREATE TABLE `chat_messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `text_message` text DEFAULT NULL,
  `send_time` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `chat_messages` */

insert  into `chat_messages`(`msg_id`,`user_id`,`text_message`,`send_time`) values 
(1,1,'Hello','06:54 AM'),
(2,2,'Hii','06:54 AM'),
(3,1,'Morning','06:54 AM'),
(4,1,'Evening','06:54 AM'),
(5,1,'hi','06:54 AM'),
(6,1,'hello','07:17 AM'),
(7,1,'hello','07:18 AM'),
(8,4,'Hello','08:12 AM'),
(9,4,'Hello Aqsa','08:13 AM');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_image` varchar(200) DEFAULT NULL,
  `is_online` int(11) NOT NULL DEFAULT 0,
  `logout_time` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`user_id`,`first_name`,`last_name`,`user_email`,`password`,`user_image`,`is_online`,`logout_time`) values 
(1,'Aqsa','Aman','aqsa@gmail.com','123','one.png',0,'1681355619'),
(2,'Ahmer','Mangi','ahmer@gmail.com','123','two.png',0,'1681343297'),
(3,'Asfar','Ali','asfar@gmail.com','123','three.png',0,'1681353297'),
(4,'Aliza','Mangi','aliza@gmail.com','123','four.png',0,'1681355599');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
