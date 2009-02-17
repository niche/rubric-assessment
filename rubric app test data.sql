/*
SQLyog Community Edition- MySQL GUI v7.02 
MySQL - 5.0.51b-community-nt : Database - rubricapp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`rubricapp` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `rubricapp`;

/*Table structure for table `assignment_student` */

DROP TABLE IF EXISTS `assignment_student`;

CREATE TABLE `assignment_student` (
  `id` int(11) NOT NULL auto_increment,
  `student_id` int(11) default NULL,
  `assignment_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12345679 DEFAULT CHARSET=latin1;

/*Data for the table `assignment_student` */

insert  into `assignment_student`(`id`,`student_id`,`assignment_id`) values (12345678,12345678,12345678);

/*Table structure for table `assignments` */

DROP TABLE IF EXISTS `assignments`;

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `description` text,
  `module_id` char(7) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12345680 DEFAULT CHARSET=latin1;

/*Data for the table `assignments` */

insert  into `assignments`(`id`,`name`,`description`,`module_id`) values (1,'Test Assignment','Just a bit of testing really					','AFC1001'),(12345679,'Summative One ',NULL,'AIE2502');

/*Table structure for table `criterias` */

DROP TABLE IF EXISTS `criterias`;

CREATE TABLE `criterias` (
  `id` int(11) NOT NULL auto_increment,
  `description` text,
  `points` int(11) default NULL,
  `rubric_id` int(11) default NULL,
  `fail` text,
  `third` text,
  `twotwo` text,
  `twoone` text,
  `first` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `criterias` */

insert  into `criterias`(`id`,`description`,`points`,`rubric_id`,`fail`,`third`,`twotwo`,`twoone`,`first`) values (1,'Reflection on and analysis of a personal relationship with Empire',NULL,1,NULL,NULL,NULL,NULL,NULL),(17,'Understanding of chosen theory  30%',30,2,'Has clearly totally misunderstood the chosen theory','Shows evidence of considerable misunderstanding  of the chosen theory with only minor understanding','Has understood some of the theory while misunderstanding some aspects of it','Has a solid understanding of the chosen theory with only minor misunderstandings ','Has clearly completely understood the chosen theory \r'),(18,'Choice and application of theory to chosen text 25%',25,2,'Has chosen an irrelevant theory and failed to apply it to the chosen text to generate  a reading ','Has chosen an irrelevant theory but made a good attempt to apply it to the text to generate a reading Has chosen a relevant theory but failed to apply it effectively to the chosen text to generate a reading ','Has chosen a relevant theory and has been partially successful in applying it effectively to the chosen text to generate a reading ','Has chosen a relevant theory and has been mostly successful in applying it to the chosen text to generate a good reading ','Has chosen a relevant theory and has been wholly successful in applying it to the chosen text to generate a sophisticated reading \r'),(19,'Use of secondary material 15%',15,2,'Makes no use of secondary material','\"Chooses resources which have limited relevance, low quality and are not effectively used\"','Makes good use of secondary resources which have low relevance and quality. Could have made better use of secondary resources which are relevant and good quality','\"Makes effective use of good quality, relevant secondary resources\"','\"Makes rigorous, imaginative  and sophisticated use of good quality, relevant secondary resources\"\r'),(20,'Structure 15%',15,2,'No cohesive structure','LIttle cohesive structure','Some evidence of a cohesive structure ','Confident use of techniques to guide reader through the essay','Confident and imaginative use of techniques to produce a wholly appropriate structure for the essay \r'),(21,'Expression 15%',15,2,'\"Entirely unclear expression, with no meaningful paragraph or sentence structure, with too many grammatical, spelling and punctuation errors\"','\"Mostly unclear expression, with poor paragraph and/or sentence structure, with a significant number of grammatical, spelling and punctuation errors\"','\"Substantial passages of unclear expression, with weak sentence and/or paragraph structure with numerous grammatical, spelling and punctuation errors\"','\"Mostly clear expression with good paragraph and sentence structure, with some minor grammatical, spelling and punctuation errors\"','\"Clear, concise and sophisticated expression, with excellent paragraph and sentence structure, that is completely or almost completely free of grammatical, spelling and punctuation errors\"\r');

/*Table structure for table `results` */

DROP TABLE IF EXISTS `results`;

CREATE TABLE `results` (
  `id` int(11) NOT NULL auto_increment,
  `criteria_id` int(11) default NULL,
  `student_score` int(11) default NULL,
  `first_marker_score` int(11) default NULL,
  `second_marker_score` int(11) default NULL,
  `student_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `criteria_id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12345679 DEFAULT CHARSET=latin1;

/*Data for the table `results` */

insert  into `results`(`id`,`criteria_id`,`student_score`,`first_marker_score`,`second_marker_score`,`student_id`) values (12345678,12345678,12345678,12345678,12345678,12345678);

/*Table structure for table `rubrics` */

DROP TABLE IF EXISTS `rubrics`;

CREATE TABLE `rubrics` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(150) default NULL,
  `description` text,
  `assignment_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `rubrics` */

insert  into `rubrics`(`id`,`name`,`description`,`assignment_id`) values (1,'test rubric','just testing',1),(2,'Summative One ',NULL,2);

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` varchar(255) NOT NULL default '',
  `name` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `students` */

insert  into `students`(`id`,`name`) values ('Lorem Ipsum is simply dummy text of the printing and typesetting industry','Lorem Ipsum is simply dummy text of the printing and typesetting industry');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
