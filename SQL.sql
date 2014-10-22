/*
SQLyog Community v11.31 (64 bit)
MySQL - 5.6.17-log : Database - itas255_assignment02_lindsey_rauch
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`itas255_assignment02_lindsey_rauch` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `itas255_assignment02_lindsey_rauch`;

/*Table structure for table `book` */

DROP TABLE IF EXISTS `book`;

CREATE TABLE `book` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isbn` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instructor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `rating` int(11) NOT NULL,
  `desclong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descshort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `book` */

insert  into `book`(`bid`,`title`,`author`,`isbn`,`course`,`instructor`,`price`,`rating`,`desclong`,`descshort`,`qty`,`img`) values (1,'A+ Guide to Hardware','Jean Andrews','9781133135128','155','Dave Grant','94',4,'This step-by-step, highly visual text provides you with a comprehensive introduction to managing and maintaining computer hardware. Written by best-selling author and educator Jean Andrews, A+ GUIDE TO HARDWARE, Sixth Edition closely integrates the CompTI','Textbook for ITAS155',2,'http://ecx.images-amazon.com/images/I/51IHsWYY+kL.jpg'),(2,'MCTS Guide to Windows 7','Byron Wright','9781111309770','167','Dave Croft','157',4,'Introducing a complete guide to deploying and managing Windows 7 that is suitable for IT professionals and students alike! This instructional text provides the information users need to successfully migrate to Windows 7 and immediately derive benefits fro','Texbook for ITAS167',0,'http://ecx.images-amazon.com/images/I/51VP-FBoT6L.jpg'),(3,'Starting Out with Java: Early Objects','Tony Gaddis','9780133776744','185','Mark Dutchuk','133',5,'Starting Out with Java: Early Objects is intended for use in the Java programming course. It is also suitable for all readers interested in an introduction to the Java programming language. ¿ ¿ Tony Gaddis?s accessible, step-by-step presentation helps beg','Textbook for ITAS185',1,'http://ecx.images-amazon.com/images/I/41YGLSMqzuL.jpg'),(4,'Web Development and Design Fundamentals with HTML5','Tetty Ann Felke-Morris','9780132783392','191','Mark Dutchuk','117',3,'Using Hands-On Practice exercises and Web Site Case Studies to motivate readers, Web Development and Design Foundations with HTML5 includes all the necessary lessons to guide students in developing highly effective Web sites. A well-rounded balance of har','Textbook for ITAS191',3,'http://ecx.images-amazon.com/images/I/51B-na9SupL.jpg'),(5,'PHP 5 Unleashed','John Coggeshall','9780672325113','255','Mark Dutchuk','40',4,'Over 12 million Internet domains worldwide use the PHP language to power their websites. If you are a programmer included in this group, or would like to be one, you should pick up a copy of PHP Unleashed. The definitive guide in PHP programming, PHP Unle','Textbook for ITAS255',3,'http://www-fp.pearsonhighered.com/bigcovers/067232511X.jpg'),(6,'MCITP Guide to Windows Server 2008','Michael Palmer','9781423902386','233','Graham White','146',4,'MCITP GUIDE TO MICROSOFT WINDOWS SERVER 2008, Server Administration (Exam 70-646) prepares the reader to administer networks using the Microsoft Windows Server 2008 operating system and to pass the MCITP 70-646 certification exam. Focusing on updates to t','Textbook for ITAS233',1,'http://ecx.images-amazon.com/images/I/51boVJTBL9L.jpg'),(7,'Security+ Guide to Network Security Fundamentals','Mark Ciampa','9781111640125','218','Graham White','159',4,'Reflecting the latest developments from the information security field, best-selling Security+ Guide to Network Security Fundamentals, 4e provides the most current coverage available while thoroughly preparing readers for the CompTIA Security+ SY0-301 cer','Textbook for ITAS218',2,'http://ecx.images-amazon.com/images/I/51tLCsbcFJL.jpg'),(8,'The Official Ubuntu Server Book','Kyle Rankin','9780133017533','257','Dave Grant','29',5,'Ubuntu Server is a complete, free server operating system that just works, with the extra Ubuntu polish, innovation, and simplicity that administrators love.   Now, there?s a definitive, authoritative guide to getting up and running quickly with the newes','Textbook for ITAS257',2,'http://ecx.images-amazon.com/images/I/51OYGd+XtPL.jpg'),(9,'New Perspectives on Microsoft Project 2010','Biheller Bunin','9780538746762','164','Dave Croft','108',4,'NEW PERSPECTIVES ON MICROSOFT PROJECT 2010 takes a critical-thinking, problem-solving approach to teaching Microsoft\'s project management software. Case-based tutorials ask you to combine project management concepts with technology skills to complete real','Textbook for ITAS164',3,'http://ecx.images-amazon.com/images/I/41gyKpxPyXL.jpg'),(10,'Network+ Guide to Networks','Tamara Dean','9781423902454','175','Graham White','115',4,'Knowing how to install, configure, and troubleshoot a computer network is a highly marketable and exciting skill. This book first introduces the fundamental building blocks that form a modern network, such as protocols, topologies, hardware, and network o','Textbook for ITAS175',3,'http://ecx.images-amazon.com/images/P/1423902459.jpg'),(11,'Linux+ Guide to Linux Certification','Jason Eckert','9781418837211','181','Dave Grant','171',4,'LINUX+ GUIDE TO LINUX CERTIFICATION, THIRD EDITION offers the most up-to-date information to empower users to successfully pass CompTIA\'s Linux+ (Powered by LPI) Certification exam, while maintaining a focus on quality, classroom usability, and real-world','Textbook for ITAS181',3,'http://ecx.images-amazon.com/images/P/1418837210.jpg'),(12,'PHP and MySQL Web Development','Luke Welling','9780321833891','186','Mark Dutchuk','33',0,'Master today\'s best practices for succeeding with PHP 5.5 and MySQL 5.6 web database development! Long acknowledged as the clearest, most practical, and most down-to-earth guide to PHP/MySQL web development, the brand-new Fifth Edition of PHP and MySQL We','Textbook for ITAS186',3,'http://img2.imagesbn.com/p/9780321833891_p0_v1_s260x420.JPG'),(13,'Android Wireless Application Development, Volume 1: Android Essentials','Lauren Darcey','9780321813831','274','Dave Grant','30',4,'Android Wireless Application Development has earned a reputation as the most useful real-world guide to building robust, commercial-grade Android apps. Now, authors Lauren Darcey and Shane Conder have systematically revised and updated this guide for the ','Textbook for ITAS274',3,'http://img2.imagesbn.com/p/9780321813831_p0_v1_s260x420.JPG'),(14,'Fedora Linux Toolbox: 1000+ Commands for Fedora, CentOS and Red Hat Power Users','Christopher Negus','9780470082911','278','Dave Grant','17',5,'In this handy, compact guide, you?ll explore a ton of powerful Fedora Linux commands while you learn to use Fedora Linux as the experts do: from the command line. Try out more than 1,000 commands to find and get software, monitor system health and securit','Textbook for ITAS278',3,'http://ecx.images-amazon.com/images/I/51Ja8QpmGvL.jpg'),(15,'Microsoft SharePoint 2010: Creating and Implementing Real-World Projects','Jennifer Mason','9780735662827','280','Dave Croft','30',3,'Build effective solutions for real-world business scenarios?using out-of-the-box tools in Microsoft SharePoint Server, SharePoint Foundation, and Office 365. Each chapter in this hands-on book focuses on a single business project, using a standard approac','Textbook for ITAS280',3,'http://img2.imagesbn.com/p/9780735662827_p0_v3_s260x420.JPG'),(16,'Modern Database Management','Jeffery Hoffer','9780136088394','288','Mark Dutchuk','22',4,'Provide the latest information in database development.   Focusing on what leading database practitioners say are the most important aspects to database development, Modern Database Management presents sound pedagogy and includes topics that are critical ','Textbook for ITAS288',3,'http://ecx.images-amazon.com/images/I/51%2BXswP0clL.jpg');

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `uid` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`uid`,`book_id`),
  KEY `IDX_BA388B716A2B381` (`book_id`),
  CONSTRAINT `FK_BA388B716A2B381` FOREIGN KEY (`book_id`) REFERENCES `book` (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cart` */

insert  into `cart`(`uid`,`book_id`,`qty`) values (24,1,1),(24,9,1),(24,12,1),(24,16,2),(31,2,1),(34,10,1);

/*Table structure for table `rating` */

DROP TABLE IF EXISTS `rating`;

CREATE TABLE `rating` (
  `uid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`uid`,`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `rating` */

insert  into `rating`(`uid`,`bid`,`rating`,`comment`) values (24,1,5,'sdfd'),(24,9,3,'not bad'),(31,1,5,'yup'),(31,9,5,'its grrrreat!'),(33,2,5,'its windows'),(33,8,2,'its ubuntu'),(33,14,3,'its fedora'),(34,3,5,'its pretty good'),(34,10,4,'its networking');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`email`,`is_active`) values (1,'someuser','19937d4acc','someuser@mail.ca',1),(3,'someuser','$2y$13$3a7','someuser@mail.ca',1),(4,'user','$2y$13$12a','test@test.com',1),(5,'user1','pass','user@mail.com',1),(6,'someuser','4c9a82ce72','someuser@mail.ca',0),(7,'user','45f106ef4d','test@test.com',1),(8,'someuser','4c9a82ce72','someuser@mail.ca',0),(9,'user','45f106ef4d','test@test.com',1),(10,'someuser','4c9a82ce72','someuser@mail.ca',0),(12,'someuser','4c9a82ce72','someuser@mail.ca',0),(13,'mark','$2y$10$zGz','test@test.com',1),(14,'someuser','$2y$13$FQF','someuser@mail.ca',0),(15,'mark','$2y$13$y1o','test@test.com',1),(19,'mark1','871deb9e1c','test@test.com',1),(22,'mark2','$2y$13$ZbD','test@test.com',1),(24,'john','f6ceb0cd3a','test@test.com',1),(26,'test','$2y$10$w6y','test@test.com',1),(27,'test1','f0578f1e71','test@test.com',1),(31,'tony','9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684','tony@tony.com',1),(33,'lindsey','9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684','lindsey@lindsey.com',1),(34,'kevin','9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684','kevin@kevin.com',1),(35,'avon','9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684','avon@barksdale.com',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
