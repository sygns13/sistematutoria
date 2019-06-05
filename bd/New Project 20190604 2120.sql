-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.7.20-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema bdtutoria
--

CREATE DATABASE IF NOT EXISTS bdtutoria;
USE bdtutoria;

--
-- Definition of table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(30) DEFAULT NULL,
  `semestrecursa` varchar(100) DEFAULT NULL,
  `persona_id` int(11) NOT NULL,
  `asignado` int(5) unsigned DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `borrado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Alumno_Usuario1_idx` (`persona_id`),
  CONSTRAINT `fk_Alumno_Usuario1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alumnos`
--

/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` (`id`,`codigo`,`semestrecursa`,`persona_id`,`asignado`,`activo`,`borrado`,`created_at`,`updated_at`) VALUES 
 (2,'081.2502.526','IV',39,0,1,0,'2017-04-07 23:50:23','2017-04-07 23:50:23'),
 (3,'sdfsd','sdf',40,0,1,0,'2017-04-10 03:39:03','2017-04-10 03:39:03'),
 (4,'asdsa','asd',41,0,1,0,'2017-04-10 03:41:08','2017-04-10 03:41:08'),
 (5,'052.456.231','asd',42,0,0,1,'2017-04-10 04:15:46','2017-06-17 17:41:01'),
 (6,'f13123','4',43,0,1,0,'2017-04-10 04:21:34','2017-04-10 04:21:34'),
 (7,'071.526.145','asdas',44,0,1,0,'2017-04-10 04:40:18','2017-04-10 04:40:18'),
 (8,'asd1','asd',45,0,1,0,'2017-04-10 04:53:00','2017-04-10 04:53:00'),
 (9,'sad2','3',46,0,1,0,'2017-04-10 04:53:48','2017-04-10 04:53:48'),
 (10,'asd3','das',47,0,1,0,'2017-04-10 05:15:13','2017-04-10 05:15:13'),
 (11,'asd4','das',48,0,1,0,'2017-04-10 05:28:30','2017-04-10 05:28:30'),
 (12,'asd25','asdas',49,0,1,0,'2017-04-10 05:42:27','2017-04-10 05:42:27'),
 (13,'071.25as32','4',50,0,1,0,'2017-04-10 05:50:33','2017-04-10 05:50:33');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;


--
-- Definition of table `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `mensaje` text,
  `envia` int(11) NOT NULL,
  `borrado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tutoralumno_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_chats_1` (`user_id`),
  KEY `FK_chats_2` (`tutoralumno_id`),
  CONSTRAINT `FK_chats_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_chats_2` FOREIGN KEY (`tutoralumno_id`) REFERENCES `tutoralumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chats`
--

/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
INSERT INTO `chats` (`id`,`fecha`,`hora`,`mensaje`,`envia`,`borrado`,`created_at`,`updated_at`,`user_id`,`tutoralumno_id`) VALUES 
 (1,'2018-05-01','11:59:15','hola como estas',1,0,'2018-05-01 11:59:15','2018-05-01 11:59:15',16,13),
 (2,'2018-05-01','11:59:38','todo bien?',1,0,'2018-05-01 11:59:38','2018-05-01 11:59:38',16,13),
 (3,'2018-05-01','11:59:42','seguro?',1,0,'2018-05-01 11:59:42','2018-05-01 11:59:42',16,13),
 (4,'2018-05-01','12:03:31','habla perro',1,0,'2018-05-01 12:03:31','2018-05-01 12:03:31',16,14),
 (5,'2018-05-01','12:20:36','sep',1,0,'2018-05-01 12:20:36','2018-05-01 12:20:36',16,13),
 (6,'2018-05-01','22:28:18','Buenas señor Tutor',1,0,'2018-05-01 22:28:18','2018-05-01 22:28:18',2,13),
 (7,'2018-05-01','22:28:24','yo estoy bien',1,0,'2018-05-01 22:28:24','2018-05-01 22:28:24',2,13),
 (8,'2018-05-01','22:28:32','y usted como esta?',1,0,'2018-05-01 22:28:32','2018-05-01 22:28:32',2,13),
 (9,'2018-05-01','22:28:49','yo bien hijo',1,0,'2018-05-01 22:28:49','2018-05-01 22:28:49',16,13),
 (10,'2018-05-01','22:28:55','que bueno',1,0,'2018-05-01 22:28:55','2018-05-01 22:28:55',2,13),
 (11,'2018-05-01','22:44:24','y usted}',1,0,'2018-05-01 22:44:24','2018-05-01 22:44:24',16,13),
 (12,'2018-05-01','22:44:48',NULL,1,0,'2018-05-01 22:44:48','2018-05-01 22:44:48',2,13),
 (13,'2018-05-01','22:45:00','que ha pasado',1,0,'2018-05-01 22:45:00','2018-05-01 22:45:00',2,13),
 (14,'2018-05-01','22:45:12',NULL,1,0,'2018-05-01 22:45:12','2018-05-01 22:45:12',16,13),
 (15,'2018-05-01','22:45:15','espacio',1,0,'2018-05-01 22:45:15','2018-05-01 22:45:15',16,13),
 (16,'2018-05-01','22:45:15','espacio',1,0,'2018-05-01 22:45:15','2018-05-01 22:45:15',16,13),
 (17,'2018-05-01','22:45:18','Oh',1,0,'2018-05-01 22:45:18','2018-05-01 22:45:18',16,13),
 (18,'2018-05-01','22:45:19','d',1,0,'2018-05-01 22:45:19','2018-05-01 22:45:19',16,13),
 (19,'2018-05-01','22:45:24','a',1,0,'2018-05-01 22:45:24','2018-05-01 22:45:24',2,13),
 (20,'2018-05-01','22:59:32','hola alumno',1,0,'2018-05-01 22:59:32','2018-05-01 22:59:32',16,13),
 (21,'2018-05-01','22:59:36','como estas',1,0,'2018-05-01 22:59:36','2018-05-01 22:59:36',16,13),
 (22,'2018-05-01','22:59:38','buen chico',1,0,'2018-05-01 22:59:38','2018-05-01 22:59:38',16,13),
 (23,'2018-05-01','23:00:21','todo va bien',1,0,'2018-05-01 23:00:21','2018-05-01 23:00:21',16,13),
 (24,'2018-05-01','23:00:23','o tienes problemas',1,0,'2018-05-01 23:00:23','2018-05-01 23:00:23',16,13),
 (25,'2018-05-01','23:14:51','hola hijo...',1,0,'2018-05-01 23:14:51','2018-05-01 23:14:51',16,13),
 (26,'2018-05-01','23:15:53','hola tutor',1,0,'2018-05-01 23:15:53','2018-05-01 23:15:53',2,13),
 (27,'2018-05-01','23:19:45','como estas',1,0,'2018-05-01 23:19:45','2018-05-01 23:19:45',16,13),
 (28,'2018-05-01','23:19:52','muy bien y usted',1,0,'2018-05-01 23:19:52','2018-05-01 23:19:52',2,13),
 (29,'2018-05-01','23:19:58','si bien tambien hijo',1,0,'2018-05-01 23:19:58','2018-05-01 23:19:58',2,13),
 (30,'2018-05-01','23:20:13','que bueno señor',1,0,'2018-05-01 23:20:13','2018-05-01 23:20:13',2,13),
 (31,'2018-05-01','23:20:30','porque vas tan mal en los cursos',1,0,'2018-05-01 23:20:30','2018-05-01 23:20:30',16,13),
 (32,'2018-05-01','23:20:34','a veces pasa',1,0,'2018-05-01 23:20:34','2018-05-01 23:20:34',2,13),
 (33,'2018-05-01','23:20:39','que pasa',1,0,'2018-05-01 23:20:39','2018-05-01 23:20:39',16,13),
 (34,'2018-05-01','23:20:42','no lo se',1,0,'2018-05-01 23:20:42','2018-05-01 23:20:42',2,13),
 (35,'2018-05-01','23:21:03','que no sabes',1,0,'2018-05-01 23:21:03','2018-05-01 23:21:03',16,13),
 (36,'2018-05-01','23:21:11','como hacer mi tarea',1,0,'2018-05-01 23:21:11','2018-05-01 23:21:11',2,13),
 (37,'2018-05-01','23:21:12','s dificil',1,0,'2018-05-01 23:21:12','2018-05-01 23:21:12',2,13),
 (38,'2018-05-01','23:21:17','humm',1,0,'2018-05-01 23:21:17','2018-05-01 23:21:17',16,13),
 (39,'2018-05-01','23:21:21','no entiendo que es lo dificil',1,0,'2018-05-01 23:21:21','2018-05-01 23:21:21',16,13),
 (40,'2018-05-01','23:21:23','estudiar',1,0,'2018-05-01 23:21:23','2018-05-01 23:21:23',2,13),
 (41,'2018-05-01','23:21:31','la mayoria de veces no puedo estudiar bien',1,0,'2018-05-01 23:21:31','2018-05-01 23:21:31',2,13),
 (42,'2018-05-01','23:21:33','me complico',1,0,'2018-05-01 23:21:33','2018-05-01 23:21:33',2,13),
 (43,'2018-05-01','23:21:37','entiendo',1,0,'2018-05-01 23:21:37','2018-05-01 23:21:37',16,13),
 (44,'2018-05-07','19:00:33','hola',1,0,'2018-05-07 19:00:33','2018-05-07 19:00:33',16,13),
 (45,'2018-05-07','19:01:12','como esta',1,0,'2018-05-07 19:01:12','2018-05-07 19:01:12',2,13),
 (46,'2018-05-07','19:01:20','bien',1,0,'2018-05-07 19:01:20','2018-05-07 19:01:20',16,13),
 (47,'2018-05-07','19:01:32','que bueno',1,0,'2018-05-07 19:01:32','2018-05-07 19:01:32',2,13),
 (48,'2018-05-07','19:01:39','hoyt',1,0,'2018-05-07 19:01:39','2018-05-07 19:01:39',2,13),
 (49,'2018-07-16','00:27:21','todo bien?',1,0,'2018-07-16 00:27:21','2018-07-16 00:27:21',2,13);
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;


--
-- Definition of table `detallepreguntas`
--

DROP TABLE IF EXISTS `detallepreguntas`;
CREATE TABLE `detallepreguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta_id` int(11) NOT NULL,
  `evaluacion_id` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `borrado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_PreguntaEval_Preguntas` (`pregunta_id`),
  KEY `fk_PreguntaEval_Evaluacion` (`evaluacion_id`),
  CONSTRAINT `fk_PreguntaEva_Evaluacion1` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluacions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PreguntaEva_Preguntas1` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detallepreguntas`
--

/*!40000 ALTER TABLE `detallepreguntas` DISABLE KEYS */;
INSERT INTO `detallepreguntas` (`id`,`pregunta_id`,`evaluacion_id`,`activo`,`borrado`,`created_at`,`updated_at`) VALUES 
 (1,2,1,1,0,'2018-03-25 23:51:41','2018-03-25 23:51:41'),
 (2,4,1,1,0,'2018-03-25 23:51:41','2018-03-25 23:51:41'),
 (3,5,1,1,0,'2018-03-25 23:51:41','2018-03-25 23:51:41'),
 (4,24,1,1,0,'2018-03-25 23:51:41','2018-03-25 23:51:41'),
 (5,10,1,1,0,'2018-03-25 23:51:41','2018-03-25 23:51:41'),
 (6,8,1,1,0,'2018-03-25 23:51:41','2018-03-25 23:51:41'),
 (7,25,1,1,0,'2018-03-25 23:51:41','2018-03-25 23:51:41'),
 (8,26,1,1,0,'2018-03-25 23:51:41','2018-03-25 23:51:41'),
 (9,20,1,1,0,'2018-03-25 23:51:41','2018-03-25 23:51:41'),
 (10,16,1,1,0,'2018-03-25 23:51:41','2018-03-25 23:51:41'),
 (11,23,1,1,0,'2018-03-25 23:51:41','2018-03-25 23:51:41'),
 (12,27,1,1,0,'2018-03-25 23:51:41','2018-03-25 23:51:41'),
 (13,5,2,1,0,'2018-03-26 00:09:24','2018-03-26 00:09:24'),
 (14,2,2,1,0,'2018-03-26 00:09:24','2018-03-26 00:09:24'),
 (15,9,2,1,0,'2018-03-26 00:09:24','2018-03-26 00:09:24'),
 (16,11,2,1,0,'2018-03-26 00:09:24','2018-03-26 00:09:24'),
 (17,14,2,1,0,'2018-03-26 00:09:24','2018-03-26 00:09:24'),
 (18,18,2,1,0,'2018-03-26 00:09:24','2018-03-26 00:09:24'),
 (19,15,2,1,0,'2018-03-26 00:09:24','2018-03-26 00:09:24'),
 (20,28,2,1,0,'2018-03-26 00:09:24','2018-03-26 00:09:24'),
 (21,29,2,1,0,'2018-03-26 00:09:24','2018-03-26 00:09:24'),
 (22,30,2,1,0,'2018-03-26 00:09:24','2018-03-26 00:09:24'),
 (40,6,3,1,0,'2018-03-26 03:03:36','2018-03-26 03:03:36'),
 (47,4,5,1,0,'2018-03-26 04:04:26','2018-03-26 04:04:26'),
 (60,2,4,1,0,'2018-03-26 04:13:28','2018-03-26 04:13:28'),
 (61,24,4,1,0,'2018-03-26 04:13:28','2018-03-26 04:13:28'),
 (62,5,4,1,0,'2018-03-26 04:13:28','2018-03-26 04:13:28'),
 (63,4,4,1,0,'2018-03-26 04:13:28','2018-03-26 04:13:28'),
 (64,40,4,1,0,'2018-03-26 04:13:28','2018-03-26 04:13:28'),
 (65,41,4,1,0,'2018-03-26 04:13:28','2018-03-26 04:13:28'),
 (66,42,4,1,0,'2018-03-26 04:13:28','2018-03-26 04:13:28'),
 (67,43,6,1,0,'2018-04-03 23:29:08','2018-04-03 23:29:08'),
 (68,44,6,1,0,'2018-04-03 23:29:08','2018-04-03 23:29:08'),
 (69,45,6,1,0,'2018-04-03 23:29:08','2018-04-03 23:29:08'),
 (75,13,7,1,0,'2018-04-06 22:50:38','2018-04-06 22:50:38'),
 (76,16,7,1,0,'2018-04-06 22:50:38','2018-04-06 22:50:38'),
 (77,15,7,1,0,'2018-04-06 22:50:38','2018-04-06 22:50:38'),
 (78,14,7,1,0,'2018-04-06 22:50:38','2018-04-06 22:50:38'),
 (79,18,7,1,0,'2018-04-06 22:50:38','2018-04-06 22:50:38'),
 (80,1,8,1,0,'2018-04-08 03:57:38','2018-04-08 03:57:38'),
 (81,3,8,1,0,'2018-04-08 03:57:38','2018-04-08 03:57:38'),
 (82,2,8,1,0,'2018-04-08 03:57:38','2018-04-08 03:57:38'),
 (83,8,8,1,0,'2018-04-08 03:57:38','2018-04-08 03:57:38'),
 (84,10,8,1,0,'2018-04-08 03:57:38','2018-04-08 03:57:38'),
 (85,15,8,1,0,'2018-04-08 03:57:38','2018-04-08 03:57:38'),
 (86,17,8,1,0,'2018-04-08 03:57:38','2018-04-08 03:57:38'),
 (87,18,8,1,0,'2018-04-08 03:57:38','2018-04-08 03:57:38'),
 (88,46,8,1,0,'2018-04-08 03:57:38','2018-04-08 03:57:38'),
 (89,2,9,1,0,'2018-04-14 09:32:19','2018-04-14 09:32:19'),
 (90,3,9,1,0,'2018-04-14 09:32:19','2018-04-14 09:32:19'),
 (91,47,9,1,0,'2018-04-14 09:32:19','2018-04-14 09:32:19'),
 (92,1,9,1,0,'2018-04-14 09:32:19','2018-04-14 09:32:19'),
 (93,2,10,1,0,'2018-05-07 19:09:41','2018-05-07 19:09:41'),
 (94,1,10,1,0,'2018-05-07 19:09:41','2018-05-07 19:09:41'),
 (95,3,10,1,0,'2018-05-07 19:09:41','2018-05-07 19:09:41'),
 (96,48,10,1,0,'2018-05-07 19:09:41','2018-05-07 19:09:41');
/*!40000 ALTER TABLE `detallepreguntas` ENABLE KEYS */;


--
-- Definition of table `diagnosticos`
--

DROP TABLE IF EXISTS `diagnosticos`;
CREATE TABLE `diagnosticos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text,
  `nomdiag` varchar(500) DEFAULT NULL,
  `fech` date DEFAULT NULL,
  `evaluacion_id` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `borrado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Diagnostico_Evaluacion1` (`evaluacion_id`),
  CONSTRAINT `fk_Diagnostico_Evaluacion1` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluacions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diagnosticos`
--

/*!40000 ALTER TABLE `diagnosticos` DISABLE KEYS */;
INSERT INTO `diagnosticos` (`id`,`descripcion`,`nomdiag`,`fech`,`evaluacion_id`,`activo`,`borrado`,`created_at`,`updated_at`) VALUES 
 (6,'<p>Contenido Textual del diagn&oacute;stico 01.aaa1</p>\n\n<p>Aqui elaboramos todo un diagn&oacute;stico del alumno partiendo de la evaluaci&oacute;n realizada.1a</p>\n\n<p>Parrafo final del diagn&oacute;stico.1a</p>','DIAGNOSTICO 01A','2018-04-06',1,1,0,'2018-04-06 22:46:58','2018-04-06 23:32:07'),
 (7,'<p>gssvsvsbbsnh swbsn</p>\n\n<p>hjkgg</p>\n\n<p>jkkkh</p>','DIAGNOSTICO ALUMNO','2018-04-14',9,1,0,'2018-04-14 09:37:53','2018-04-14 09:37:53'),
 (8,'<p>cedcedcedc frfr</p>\n\n<p>eferfrfer</p>\n\n<p>eferfref</p>','DIAGNOSTICO PRUEBA','2018-05-07',10,1,0,'2018-05-07 19:14:03','2018-05-07 19:14:03');
/*!40000 ALTER TABLE `diagnosticos` ENABLE KEYS */;


--
-- Definition of table `dimensionpersonas`
--

DROP TABLE IF EXISTS `dimensionpersonas`;
CREATE TABLE `dimensionpersonas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomdimen` varchar(500) DEFAULT NULL,
  `desdimen` text,
  `activo` tinyint(1) DEFAULT NULL,
  `borrado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dimensionpersonas`
--

/*!40000 ALTER TABLE `dimensionpersonas` DISABLE KEYS */;
INSERT INTO `dimensionpersonas` (`id`,`nomdimen`,`desdimen`,`activo`,`borrado`,`created_at`,`updated_at`) VALUES 
 (1,'ACADEMICA','<p>Relacionado a los aspectos acad&eacute;micos.</p>',1,0,'2017-12-08 04:20:05','2017-12-08 04:20:05'),
 (2,'PSICOSOCIAL','<p>Todo lo Relacionado a la interacci&oacute;n con otras personas.</p>',1,0,'2017-12-08 04:22:19','2017-12-08 04:22:19'),
 (3,'EMOCIONAL','<p>Todo lo relacionado al aspecto afectivo y emocional.</p>',1,0,'2017-12-08 04:22:38','2017-12-08 04:22:38'),
 (4,'--PRUEBA DELETE--','<p>deleted</p>',1,1,'2017-12-08 14:53:11','2017-12-08 15:15:33');
/*!40000 ALTER TABLE `dimensionpersonas` ENABLE KEYS */;


--
-- Definition of table `etapas`
--

DROP TABLE IF EXISTS `etapas`;
CREATE TABLE `etapas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nometapa` varchar(500) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `borrado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etapas`
--

/*!40000 ALTER TABLE `etapas` DISABLE KEYS */;
INSERT INTO `etapas` (`id`,`nometapa`,`activo`,`borrado`,`created_at`,`updated_at`) VALUES 
 (1,'CONTACTO INICIAL Y DIAGNOSTICO.',1,0,'2017-12-08 15:49:34','2017-12-08 15:50:13'),
 (2,'EVALUACIÓN Y ESTABLECIMIENTO DE OBJETIVOS.',1,0,'2017-12-08 15:50:21','2017-12-08 15:50:21'),
 (3,'ESTRATEGIAS PARA EL LOGRO DE OBJETIVOS.',1,0,'2017-12-08 15:50:30','2017-12-08 15:50:44'),
 (4,'SEGUIMIENTO Y EVALUACIÓN',1,0,'2017-12-08 15:50:37','2017-12-08 15:50:37'),
 (5,'--ASDSAD--',1,1,'2017-12-08 15:50:52','2017-12-08 15:50:56'),
 (6,'--ASDSA--',1,1,'2017-12-08 15:51:14','2017-12-08 15:51:18');
/*!40000 ALTER TABLE `etapas` ENABLE KEYS */;


--
-- Definition of table `evaluacions`
--

DROP TABLE IF EXISTS `evaluacions`;
CREATE TABLE `evaluacions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deseval` text,
  `tutoralumno_id` int(11) NOT NULL,
  `etapa_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fechatomada` date DEFAULT NULL,
  `fechares` date DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `borrado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Evaluacion_Alumno1` (`tutoralumno_id`),
  KEY `fk_Evaluacion_Etapa1` (`etapa_id`),
  CONSTRAINT `fk_Evaluacion_Alumno1` FOREIGN KEY (`tutoralumno_id`) REFERENCES `tutoralumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Evaluacion_Etapa1` FOREIGN KEY (`etapa_id`) REFERENCES `etapas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evaluacions`
--

/*!40000 ALTER TABLE `evaluacions` DISABLE KEYS */;
INSERT INTO `evaluacions` (`id`,`deseval`,`tutoralumno_id`,`etapa_id`,`estado`,`fechatomada`,`fechares`,`activo`,`borrado`,`created_at`,`updated_at`) VALUES 
 (1,'EVALUACION N° 01',13,1,5,'2018-03-25',NULL,1,0,'2018-03-25 23:51:41','2018-04-06 22:46:58'),
 (2,'EVALUACION N° 02',13,1,1,'2018-03-26',NULL,1,1,'2018-03-26 00:09:24','2018-03-26 01:08:38'),
 (3,'EVALUACION 02',13,2,1,'2018-03-26',NULL,1,1,'2018-03-26 02:08:41','2018-03-26 04:04:52'),
 (4,'EVALUACION N° 02',13,1,3,'2018-03-26',NULL,1,0,'2018-03-26 02:12:19','2018-04-06 22:49:48'),
 (5,'ASDSAD',13,1,1,'2018-03-26',NULL,1,1,'2018-03-26 04:02:27','2018-03-26 04:04:54'),
 (6,'EVALAUCION 3',13,2,4,'2018-04-03',NULL,1,0,'2018-04-03 23:29:08','2018-04-03 23:29:53'),
 (7,'EVALAUCION 4',13,1,2,'2018-04-06',NULL,1,0,'2018-04-06 22:50:31','2018-04-08 23:09:02'),
 (8,'EVALUACION N° 01',14,1,1,'2018-04-08',NULL,1,0,'2018-04-08 03:57:38','2018-04-08 03:57:38'),
 (9,'EVALUACION N° 05',13,1,5,'2018-04-14',NULL,1,0,'2018-04-14 09:32:19','2018-04-14 09:37:53'),
 (10,'EVAL PRUEBA',13,1,5,'2018-05-07',NULL,1,0,'2018-05-07 19:09:41','2018-05-07 19:14:03');
/*!40000 ALTER TABLE `evaluacions` ENABLE KEYS */;


--
-- Definition of table `informes`
--

DROP TABLE IF EXISTS `informes`;
CREATE TABLE `informes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `contenido` text,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tutoralumno_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_informes_1` (`tutoralumno_id`),
  CONSTRAINT `FK_informes_1` FOREIGN KEY (`tutoralumno_id`) REFERENCES `tutoralumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `informes`
--

/*!40000 ALTER TABLE `informes` DISABLE KEYS */;
INSERT INTO `informes` (`id`,`titulo`,`contenido`,`activo`,`borrado`,`created_at`,`updated_at`,`tutoralumno_id`) VALUES 
 (1,'INFORME N° 001ABC','<p>contenido del informeaac</p>\n\n<ul>\n	<li>item 1</li>\n	<li>item 2</li>\n</ul>',1,0,'2018-03-17 19:40:59','2018-03-18 00:53:47',13),
 (2,'INFORME N° 002','<p>adad</p>\n\n<p>asdasd</p>\n\n<p>asdasdas</p>\n\n<p>asdsadsadsad</p>',1,1,'2018-03-17 22:44:43','2018-03-18 01:01:13',13),
 (3,'DASDSAD','<p>dasdsadsad</p>',1,1,'2018-03-26 01:03:24','2018-03-26 01:03:28',13);
/*!40000 ALTER TABLE `informes` ENABLE KEYS */;


--
-- Definition of table `inhabilitacions`
--

DROP TABLE IF EXISTS `inhabilitacions`;
CREATE TABLE `inhabilitacions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(500) DEFAULT NULL,
  `fechaemi` date DEFAULT NULL,
  `motivo` tinyint(4) DEFAULT NULL,
  `tipo` tinyint(4) DEFAULT NULL,
  `obs` text,
  `fechaini` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `activo` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tutor_id` (`tutor_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `inhabilitacions_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inhabilitacions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inhabilitacions`
--

/*!40000 ALTER TABLE `inhabilitacions` DISABLE KEYS */;
INSERT INTO `inhabilitacions` (`id`,`documento`,`fechaemi`,`motivo`,`tipo`,`obs`,`fechaini`,`fechafin`,`user_id`,`tutor_id`,`activo`,`borrado`,`created_at`,`updated_at`) VALUES 
 (3,'DOCU BAJA 1','2017-12-01',6,2,'OBS 1','2017-12-04',NULL,1,2,0,0,'2017-12-04 04:09:26','2017-12-04 04:09:26'),
 (4,'DOCU REACT','2017-12-03',10,1,'OBS ACTIVACION','2017-12-04',NULL,1,2,0,0,'2017-12-04 04:19:14','2017-12-04 04:19:14'),
 (5,'DESACT 02','2017-12-01',1,2,'ASDAS','2017-12-04',NULL,1,3,0,0,'2017-12-04 04:20:35','2017-12-04 04:20:35'),
 (6,'ACTIVATE','2017-12-03',10,1,'OBS ACTIVA','2017-12-04',NULL,1,3,1,0,'2017-12-04 04:20:52','2017-12-04 04:20:52'),
 (7,'DESACTIVATE PROBAR','2017-12-03',1,2,NULL,'2017-12-04',NULL,1,2,1,0,'2017-12-04 04:21:25','2017-12-04 04:21:25');
/*!40000 ALTER TABLE `inhabilitacions` ENABLE KEYS */;


--
-- Definition of table `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(20) DEFAULT NULL,
  `nombres` varchar(225) DEFAULT NULL,
  `apellidos` varchar(225) DEFAULT NULL,
  `genero` int(11) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `telf` varchar(25) DEFAULT NULL,
  `direccion` varchar(1000) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `borrado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipoDocu` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personas`
--

/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` (`id`,`dni`,`nombres`,`apellidos`,`genero`,`email`,`telf`,`direccion`,`imagen`,`activo`,`borrado`,`created_at`,`updated_at`,`tipoDocu`) VALUES 
 (33,NULL,'Cristian Fernando','Chávez Torres',1,'crisfernex@gmail.com','964721936','Av Luzuriaga 814','',1,0,NULL,NULL,NULL),
 (39,'47331640','Fernando','Torres Malpi',1,'cristian_7_70@hotmail.com','944129804','Av. Luzuriaga 123','img/perfilAlumnos/47331640.jpg',1,0,'2017-04-07 23:50:23','2018-04-11 17:03:23',NULL),
 (40,'12345678','Maria','Fernanda',2,'sdf','sdf','sdf','',1,0,'2017-04-10 03:39:03','2017-04-10 03:39:03',NULL),
 (41,'12345678','asd','asd',1,'asd','asd','asd','',1,0,'2017-04-10 03:41:08','2017-04-10 03:41:08',NULL),
 (42,'87654321','asdsa','asd',1,'asd','asd','asd','img/perfilAlumnos/87654321.jpg',1,0,'2017-04-10 04:15:46','2017-04-10 04:15:46',NULL),
 (43,'47148595','Fernanda','Bonita',2,'dasd','adas','asd','img/perfilAlumnos/47148595.gif',1,0,'2017-04-10 04:21:34','2017-04-10 04:21:34',NULL),
 (44,'98765432','Joaquin Sabina','dasd',1,'dsad','dasdsa','dsad','img/perfilAlumnos/98765432.gif',1,0,'2017-04-10 04:40:18','2018-03-08 04:32:57',NULL),
 (45,'14785236','Flavia','asda',2,'flavia@gmail.com','sadd','dsad','img/perfilAlumnos/14785236.jpg',1,0,'2017-04-10 04:53:00','2017-06-08 04:58:36',NULL),
 (46,'47859625','asd','asd',1,'sdf','sd','sdf','img/perfilAlumnos/47859625.jpg',1,0,'2017-04-10 04:53:48','2017-04-10 04:53:48',NULL),
 (47,'47331641','1das','asd',1,'as','asd','asd','',1,0,'2017-04-10 05:15:13','2017-04-10 05:15:13',NULL),
 (48,'47331642','2dasd','dsa',1,'dsa','sa','dsa','',1,0,'2017-04-10 05:28:30','2017-04-10 05:28:30',NULL),
 (49,'47331643','3fasdas','asda',1,'crisfernex2@gmail.com','asd','asdas','',1,0,'2017-04-10 05:42:27','2017-04-10 05:42:27',NULL),
 (50,'54829325','4prueba','4apellido',2,'email@dominio.com','235123','Jr. Huanuco 234','',1,0,'2017-04-10 05:50:33','2017-04-10 05:50:33',NULL),
 (51,'-45851258-','IRMA','ROSALES',2,'IRMA@GMAIL.COM','957482565','JR. LOS ROSARIOS 234','04-12-171717-02-46-47.jpg',1,1,'2017-12-04 00:16:15','2017-12-04 03:01:45',1),
 (53,'85932541','LUIS MARCOS','MALDONADO ORTIZ',1,'LUIS@MAIL.COM','418535','JR LOS OLIVOS 234','',1,0,'2017-12-04 00:31:23','2017-12-04 00:31:23',1),
 (54,'92486428','ANA CAROLINA','BARTRA SUAREZ',2,'CARO@HOTMAIL.COM','943587415','JR LOS TULIPANES 234','11-04-181818-17-02-06.jpg',1,0,'2017-12-04 00:34:05','2018-04-11 17:02:10',1),
 (55,'47851259','RAMOS RIOS','ELIZABETH',2,'ELI@GMAIL.COM','428595','JR.LAS TERTULIAS 456','07-12-171717-03-14-01.jpg',1,0,'2017-12-07 03:14:20','2017-12-07 03:14:20',1);
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;


--
-- Definition of table `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `dimensionpersona_id` int(11) NOT NULL,
  `etapa_id` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `borrado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Preguntas_Dimensionesperson` (`dimensionpersona_id`),
  KEY `fk_Preguntas_Etapa` (`etapa_id`),
  CONSTRAINT `fk_Preg_Dimen1` FOREIGN KEY (`dimensionpersona_id`) REFERENCES `dimensionpersonas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Preg_Etapa1` FOREIGN KEY (`etapa_id`) REFERENCES `etapas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `preguntas`
--

/*!40000 ALTER TABLE `preguntas` DISABLE KEYS */;
INSERT INTO `preguntas` (`id`,`nombre`,`dimensionpersona_id`,`etapa_id`,`activo`,`borrado`,`created_at`,`updated_at`) VALUES 
 (1,'¿EN QUE CURSOS TE VA MAL Y PORQUE?',1,1,1,0,'2017-12-10 22:04:11','2017-12-10 22:26:12'),
 (2,'¿COMO ESTAS EN LOS CURSOS?',1,1,1,0,'2017-12-10 22:06:14','2017-12-10 22:06:14'),
 (3,'¿COMO TE ORGANIZAS PARA ESTUDIAR?',1,1,1,0,'2017-12-10 22:08:27','2017-12-10 22:08:27'),
 (4,'¿CUAL ES TU HISTORIAL DE NOTAS?',1,1,1,0,'2017-12-10 22:08:51','2017-12-10 22:08:51'),
 (5,'¿QUE METODOS O ESTRATEGIAS UTILIZAS PARA ESTUDIAR?',1,1,1,0,'2017-12-10 22:09:04','2017-12-10 22:09:04'),
 (6,'¿COMO ESTA LA RELACIÓN CON TUS PADRES O CON LAS PERSONAS CON LAS QUE VIVES?',1,2,1,1,'2017-12-10 22:09:26','2017-12-10 22:31:57'),
 (7,'¿COMO ESTA LA RELACIÓN CON TUS PADRES O CON LAS PERSONAS CON LAS QUE VIVES?',1,2,1,1,'2017-12-10 22:10:30','2017-12-10 22:31:53'),
 (8,'¿COMO ESTA LA RELACIÓN CON TUS PADRES O CON LAS PERSONAS CON LAS QUE VIVES?',2,1,1,0,'2017-12-10 22:11:47','2017-12-10 22:11:47'),
 (9,'¿TIENES UN GRUPO DE AMIGOS?',2,1,1,0,'2017-12-10 22:12:02','2017-12-10 22:12:02'),
 (10,'¿ACTUALMENTE TIENES PAREJA?',2,1,1,0,'2017-12-10 22:12:14','2017-12-10 22:12:14'),
 (11,'¿COMO ES TU RELACIÓN CON LOS DOCENTES?',2,1,1,0,'2017-12-10 22:12:36','2017-12-10 22:12:36'),
 (12,'¿CON QUIEN VIVES ACTUALMENTE Y DONDE?',2,1,1,0,'2017-12-10 22:12:52','2017-12-10 22:12:52'),
 (13,'NORMALMENTE ¿COMO TE SIENTES?',3,1,1,0,'2017-12-10 22:13:19','2017-12-10 22:26:34'),
 (14,'¿TE GUSTA LA CARRERA QUE ESTAS ESTUDIANDO?',3,1,1,0,'2017-12-10 22:13:30','2017-12-10 22:13:30'),
 (15,'¿TE SIENTES MOTIVADO PARA EL ESTUDIO EN TU CARRERA?',3,1,1,0,'2017-12-10 22:13:40','2017-12-10 22:13:40'),
 (16,'¿NORMALMENTE TIENES BUEN ANIMO O ESTAS SIN GANAS?',3,1,1,0,'2017-12-10 22:13:59','2017-12-10 22:13:59'),
 (17,'¿TE PONES NERVIOSO ANTE LOS EXÁMENES?',3,1,1,0,'2017-12-10 22:14:11','2017-12-10 22:14:11'),
 (18,'¿NORMALMENTE TE SIENTES TRANQUILO RELAJADO O MAS BIEN TENSO O ANSIOSO?',3,1,1,0,'2017-12-10 22:14:29','2017-12-10 22:14:29'),
 (19,'¿SIENTES QUE ESTAS ESTRESADO?',3,1,1,0,'2017-12-10 22:14:44','2017-12-10 22:14:44'),
 (20,'¿TE SIENTES VALIOSOS, IMPORTANTE?',3,1,1,0,'2017-12-10 22:14:55','2017-12-10 22:14:55'),
 (21,'¿SIENTES QUE LAS PERSONAS QUE TE RODEAN, TE QUIEREN, TE VALORAN?',3,1,1,0,'2017-12-10 22:15:05','2017-12-10 22:15:05'),
 (22,'¿SIENTES QUE ERES IMPORTANTE, PARA LOS DEMÁS?',3,1,1,0,'2017-12-10 22:15:17','2017-12-10 22:15:17'),
 (23,'¿SIENTES QUE VAS A SER EXITOSO?',3,1,1,0,'2017-12-10 22:15:31','2017-12-10 22:15:31'),
 (24,'NUEVA PREGUNTA ACADEMICA',1,1,2,0,'2018-03-25 23:51:41','2018-03-25 23:51:41'),
 (25,'NUEVA PREGUNTA PSICOSOCIAL 1',2,1,2,0,'2018-03-25 23:51:41','2018-03-25 23:51:41'),
 (26,'NUEVA PREGUNTA PSICOSOCIAL 2',2,1,2,0,'2018-03-25 23:51:41','2018-03-25 23:51:41'),
 (27,'NUEVA PREGUNTA EMOCIONAL 2',3,1,2,0,'2018-03-25 23:51:41','2018-03-25 23:51:41'),
 (28,'NUEVA PREGUNTA 1 EVAL 2',3,1,2,0,'2018-03-26 00:09:24','2018-03-26 00:09:24'),
 (29,'NUEVA PREGUNTA 2 EVAL 2',3,1,2,0,'2018-03-26 00:09:24','2018-03-26 00:09:24'),
 (30,'NUEVA PREGUNTA 3 EVAL 2',3,1,2,0,'2018-03-26 00:09:24','2018-03-26 00:09:24'),
 (31,'NUEVA PREGUNTA 01',1,2,2,0,'2018-03-26 02:57:22','2018-03-26 02:57:22'),
 (32,'NUEVA PREGUNTA 02',1,2,2,0,'2018-03-26 02:57:22','2018-03-26 02:57:22'),
 (33,'NUEVA PREGUNTA 03',1,2,2,0,'2018-03-26 02:57:22','2018-03-26 02:57:22'),
 (35,'NUEVA PREGUNTA 02',1,1,2,0,'2018-03-26 04:02:27','2018-03-26 04:02:27'),
 (36,'NUEVA PREGUNTA 03',1,1,2,0,'2018-03-26 04:02:27','2018-03-26 04:02:27'),
 (40,'NUEVA PREGUNTA 01ABC',1,1,2,0,'2018-03-26 04:06:49','2018-03-26 04:06:49'),
 (41,'NUEVA PREGUNTA 01ABC2',1,1,2,0,'2018-03-26 04:10:29','2018-03-26 04:10:29'),
 (42,'NUEVA PREGUNTA 01ABC3',1,1,2,0,'2018-03-26 04:13:28','2018-03-26 04:13:28'),
 (43,'SADSAD ',1,2,2,0,'2018-04-03 23:29:08','2018-04-03 23:29:08'),
 (44,'PREGUNTA 2',1,2,2,0,'2018-04-03 23:29:08','2018-04-03 23:29:08'),
 (45,'PREGIUNTA 3',2,2,2,0,'2018-04-03 23:29:08','2018-04-03 23:29:08'),
 (46,'TE SIENTES BIEN',3,1,2,0,'2018-04-08 03:57:38','2018-04-08 03:57:38'),
 (47,'PREGUNTA PERSONAL',1,1,2,0,'2018-04-14 09:32:18','2018-04-14 09:32:18'),
 (48,'PREGUNTA PROPIA',1,1,2,0,'2018-05-07 19:09:41','2018-05-07 19:09:41');
/*!40000 ALTER TABLE `preguntas` ENABLE KEYS */;


--
-- Definition of table `resultados`
--

DROP TABLE IF EXISTS `resultados`;
CREATE TABLE `resultados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desresultado` text,
  `califresultado` decimal(9,2) DEFAULT NULL,
  `detallepregunta_id` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `borrado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Resultado_idPreguntasEval2` (`detallepregunta_id`),
  CONSTRAINT `fk_Resultado_idPreguntasEval2` FOREIGN KEY (`detallepregunta_id`) REFERENCES `detallepreguntas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resultados`
--

/*!40000 ALTER TABLE `resultados` DISABLE KEYS */;
INSERT INTO `resultados` (`id`,`desresultado`,`califresultado`,`detallepregunta_id`,`activo`,`borrado`,`created_at`,`updated_at`,`estado`) VALUES 
 (1,'respuesta 01','4.00',1,1,0,'2018-03-31 17:46:57','2018-04-03 23:36:04',1),
 (2,'respuesta 02','3.00',2,1,0,'2018-03-31 17:46:57','2018-04-03 23:36:04',1),
 (3,'respuesta 03','2.00',3,1,0,'2018-03-31 17:46:57','2018-04-03 23:36:04',1),
 (4,'respuesta 04','1.00',4,1,0,'2018-03-31 17:46:57','2018-04-03 23:36:04',1),
 (5,'respuesta 05','5.00',5,1,0,'2018-03-31 17:46:57','2018-04-03 23:36:04',1),
 (6,'respuesta 06','2.00',6,1,0,'2018-03-31 17:46:57','2018-04-03 23:36:04',1),
 (7,'respuesta 07','3.00',7,1,0,'2018-03-31 17:46:57','2018-04-03 23:36:04',1),
 (8,'respuesta 08','3.00',8,1,0,'2018-03-31 17:46:57','2018-04-03 23:36:04',1),
 (9,'respuesta 09','2.00',9,1,0,'2018-03-31 17:46:57','2018-04-03 23:36:04',1),
 (10,'respuesta 10','2.00',10,1,0,'2018-03-31 17:46:57','2018-04-03 23:36:04',1),
 (11,'respuesta 11','2.00',11,1,0,'2018-03-31 17:46:57','2018-04-03 23:36:04',1),
 (12,'respuesta 12','2.00',12,1,0,'2018-03-31 17:46:57','2018-04-03 23:36:04',1),
 (13,'asdsa','4.00',67,1,0,'2018-04-03 23:29:36','2018-04-06 22:49:04',1),
 (14,'asdsad','3.00',68,1,0,'2018-04-03 23:29:36','2018-04-06 22:49:04',1),
 (15,'sadsad','3.00',69,1,0,'2018-04-03 23:29:36','2018-04-06 22:49:04',1),
 (16,'asd',NULL,60,1,0,'2018-04-06 22:49:48','2018-04-06 22:49:48',1),
 (17,'asd',NULL,61,1,0,'2018-04-06 22:49:48','2018-04-06 22:49:48',1),
 (18,'asd',NULL,62,1,0,'2018-04-06 22:49:48','2018-04-06 22:49:48',1),
 (19,'dasd',NULL,63,1,0,'2018-04-06 22:49:48','2018-04-06 22:49:48',1),
 (20,'dsad',NULL,64,1,0,'2018-04-06 22:49:48','2018-04-06 22:49:48',1),
 (21,'dasd',NULL,65,1,0,'2018-04-06 22:49:48','2018-04-06 22:49:48',1),
 (22,'dsa',NULL,66,1,0,'2018-04-06 22:49:48','2018-04-06 22:49:48',1),
 (23,'resp1n','4.00',89,1,0,'2018-04-14 09:35:04','2018-04-14 09:36:50',1),
 (24,'resp2','3.00',90,1,0,'2018-04-14 09:35:04','2018-04-14 09:36:50',1),
 (25,'resp 3','4.00',91,1,0,'2018-04-14 09:35:04','2018-04-14 09:36:50',1),
 (26,'resp 4','3.00',92,1,0,'2018-04-14 09:35:04','2018-04-14 09:36:50',1),
 (27,'sssxsx','4.00',93,1,0,'2018-05-07 19:12:10','2018-05-07 19:13:17',1),
 (28,'xdxdxx','3.00',94,1,0,'2018-05-07 19:12:10','2018-05-07 19:13:17',1),
 (29,'xdxdx','2.00',95,1,0,'2018-05-07 19:12:10','2018-05-07 19:13:17',1),
 (30,'zdzddzd','3.00',96,1,0,'2018-05-07 19:12:10','2018-05-07 19:13:17',1);
/*!40000 ALTER TABLE `resultados` ENABLE KEYS */;


--
-- Definition of table `semestres`
--

DROP TABLE IF EXISTS `semestres`;
CREATE TABLE `semestres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomsem` varchar(100) DEFAULT NULL,
  `inisem` date DEFAULT NULL,
  `finsem` date DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `borrado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `semestres`
--

/*!40000 ALTER TABLE `semestres` DISABLE KEYS */;
INSERT INTO `semestres` (`id`,`nomsem`,`inisem`,`finsem`,`activo`,`borrado`,`created_at`,`updated_at`) VALUES 
 (1,'2016-I','2016-04-11','2017-08-12',0,0,NULL,'2017-04-02 01:49:41'),
 (2,'2016-II','2016-09-02','2017-01-10',0,0,NULL,'2018-03-24 14:50:29'),
 (3,'2017-I','2017-04-18','2017-08-11',0,0,NULL,'2017-11-01 03:49:47'),
 (4,'2017-II','2017-09-25','2018-01-25',0,0,'2017-11-01 03:50:09','2018-03-08 02:29:14'),
 (5,'2018-I','2018-03-01','2018-06-30',1,0,'2018-03-08 02:29:30','2018-03-08 02:29:30');
/*!40000 ALTER TABLE `semestres` ENABLE KEYS */;


--
-- Definition of table `sesions`
--

DROP TABLE IF EXISTS `sesions`;
CREATE TABLE `sesions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `detalles` text,
  `fech` date DEFAULT NULL,
  `diagnostico_id` int(11) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `desresultados` text,
  `activo` tinyint(1) DEFAULT NULL,
  `borrado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fechaSesion` date DEFAULT NULL,
  `tipo` tinyint(4) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `tutoralumno_id` int(11) DEFAULT NULL,
  `califTutor` int(11) DEFAULT NULL,
  `califAlumno` int(11) DEFAULT NULL,
  `descCalifAlumno` text,
  `confirmado` int(11) DEFAULT NULL,
  `fechaConfir` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Sesion_Diagnostico1` (`diagnostico_id`),
  CONSTRAINT `fk_Sesion_Diagnostico1` FOREIGN KEY (`diagnostico_id`) REFERENCES `diagnosticos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sesions`
--

/*!40000 ALTER TABLE `sesions` DISABLE KEYS */;
INSERT INTO `sesions` (`id`,`titulo`,`detalles`,`fech`,`diagnostico_id`,`estado`,`desresultados`,`activo`,`borrado`,`created_at`,`updated_at`,`fechaSesion`,`tipo`,`hora`,`tutoralumno_id`,`califTutor`,`califAlumno`,`descCalifAlumno`,`confirmado`,`fechaConfir`) VALUES 
 (1,'SESIÓN N° 01','<p>detalles de la sesion, sera en el auditorio de la facultad de ciencias, protar dni y cuaderno de trabajo.</p>','2018-04-05',6,'2','fue productiva la sesionwe',1,0,'2018-04-09 00:17:48','2018-04-10 21:41:50','2018-04-09',1,'09:30:00',13,5,0,'',0,NULL),
 (2,'SESION N° 02','<p>conectarse a la hora se&ntilde;alada para tener una sesi&oacute;n via la plataforma de tutoria</p>','2018-04-08',6,'1','',1,0,'2018-04-09 00:21:11','2018-04-10 00:07:40','2018-04-15',1,'17:20:00',13,0,0,'',1,'2018-04-10'),
 (3,'SESION N° 03','<p>detalles de la sesi&oacute;n</p>','2018-04-09',6,'1','',1,1,'2018-04-09 00:55:24','2018-04-09 00:55:24','2018-04-07',1,'05:30:00',13,0,0,'',0,NULL),
 (4,'SESION N° 03','<p>detalles de la sesi&oacute;n</p>','2018-04-09',6,'1','',1,1,'2018-04-09 00:57:03','2018-04-08 21:30:26','2018-04-14',2,'05:40:00',13,0,0,'',0,NULL),
 (5,'SESION N° 03','<p>conversar con el alumno acerca de sus deficiencias</p>','2018-04-08',6,'3','Debido a petición del alumno la sesión se cancela.',1,0,'2018-04-08 23:08:10','2018-04-10 20:40:40','2018-04-18',2,'16:00:00',13,0,0,'Motivos de viaje',2,'2018-04-10'),
 (6,'SESION N° 04','<p>agenda</p>\n\n<p>temas a tratar</p>','2018-04-14',7,'1','',1,0,'2018-04-14 09:44:54','2018-04-14 09:45:33','2018-04-19',2,'10:30:00',13,0,0,'o',2,'2018-04-14'),
 (7,'SESION PRUEBA','<p>ggggggg</p>\n\n<p>&nbsp;</p>\n\n<p>gt5tg5tg5tg</p>','2018-05-07',8,'1','',1,0,'2018-05-07 19:16:25','2018-05-07 19:16:25','2018-05-16',2,'16:00:00',13,0,0,'',0,NULL);
/*!40000 ALTER TABLE `sesions` ENABLE KEYS */;


--
-- Definition of table `tareas`
--

DROP TABLE IF EXISTS `tareas`;
CREATE TABLE `tareas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(1000) DEFAULT NULL,
  `descripcion` text,
  `diagnostico_id` int(11) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `respuestas` text,
  `rutaresp` varchar(2000) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `calif` tinytext,
  `borrado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tutoralumno_id` int(11) DEFAULT NULL,
  `fechaentrega` date DEFAULT NULL,
  `fecharesuelta` date DEFAULT NULL,
  `descCalif` text,
  PRIMARY KEY (`id`),
  KEY `iddiagnostico` (`diagnostico_id`),
  CONSTRAINT `tarea_ibfk_1` FOREIGN KEY (`diagnostico_id`) REFERENCES `diagnosticos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tareas`
--

/*!40000 ALTER TABLE `tareas` DISABLE KEYS */;
INSERT INTO `tareas` (`id`,`nombre`,`descripcion`,`diagnostico_id`,`estado`,`respuestas`,`rutaresp`,`activo`,`calif`,`borrado`,`created_at`,`updated_at`,`tutoralumno_id`,`fechaentrega`,`fecharesuelta`,`descCalif`) VALUES 
 (1,'TAREA 1','<p>01 Hacer un informe de como esta tu vida</p>\n\n<p>02 Estudiar mas</p>\n\n<p>03 Evaluar tus actividades</p>',6,'2','','',1,'',0,'2018-04-08 23:09:43','2018-04-09 23:40:16',13,'2018-04-15',NULL,NULL),
 (2,'TAREA 2','<p>informe de tus cursos mas dificiles en la universidad</p>',6,'1','','',1,'',1,'2018-04-08 23:24:15','2018-04-08 21:25:21',13,'2018-04-17',NULL,NULL),
 (3,'TAREA 2','<p>pregunta 01</p>\n\n<p>enviar tarea 02</p>\n\n<p>enviar tarea 03</p>',6,'4','<p>Respuestas 02</p>\n\n<p>Respuestas 03</p>','09-04-2018-23-15-29.pdf',1,'3',0,'2018-04-08 23:06:39','2018-04-10 11:59:57',13,'2018-04-17','2018-04-09','Debido a que el alumno cumplio con la tarea asignada3'),
 (4,'TAREA EJEMPLO','<p>asignacion 1</p>\n\n<p>asignacion 2&nbsp;</p>\n\n<p>asignacion 3</p>',7,'4','<p>hgfhghfgfghf</p>\n\n<p>khhkjhjk</p>','14-04-2018-09-47-35.pdf',1,'4',0,'2018-04-14 09:43:58','2018-04-14 09:49:26',13,'2018-04-16','2018-04-14','dfddfgfd'),
 (5,'TAREA PRUEBA','<p>descripcion</p>',8,'1','','',1,'',0,'2018-05-07 19:15:09','2018-05-07 19:15:09',13,'2018-05-25',NULL,NULL);
/*!40000 ALTER TABLE `tareas` ENABLE KEYS */;


--
-- Definition of table `tipousers`
--

DROP TABLE IF EXISTS `tipousers`;
CREATE TABLE `tipousers` (
  `id` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipousers`
--

/*!40000 ALTER TABLE `tipousers` DISABLE KEYS */;
INSERT INTO `tipousers` (`id`,`nombre`,`descripcion`,`activo`,`borrado`,`created_at`,`updated_at`) VALUES 
 (1,'superadmin','',1,NULL,NULL,NULL),
 (2,'admin','',1,NULL,NULL,NULL),
 (3,'tutor','',1,NULL,NULL,NULL),
 (4,'alumno','',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tipousers` ENABLE KEYS */;


--
-- Definition of table `tutoralumnos`
--

DROP TABLE IF EXISTS `tutoralumnos`;
CREATE TABLE `tutoralumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) NOT NULL,
  `semestre_id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `fk_TutorAlumno_Tutor` (`tutor_id`),
  KEY `fk_TutorAlumno_Semestre1` (`semestre_id`),
  KEY `fk_TutorAlumno_Alumno1_idx` (`alumno_id`),
  CONSTRAINT `fk_TutorAlumno_Alumno1` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TutorAlumno_Semestre1` FOREIGN KEY (`semestre_id`) REFERENCES `semestres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TutorAlumno_Tutor` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutoralumnos`
--

/*!40000 ALTER TABLE `tutoralumnos` DISABLE KEYS */;
INSERT INTO `tutoralumnos` (`id`,`tutor_id`,`semestre_id`,`alumno_id`,`activo`,`borrado`,`created_at`,`updated_at`) VALUES 
 (1,3,4,11,1,0,'2017-12-07 04:59:44','2017-12-07 04:59:44'),
 (3,4,4,6,1,0,'2017-12-07 05:00:09','2017-12-07 05:00:09'),
 (4,4,4,12,1,0,'2017-12-07 05:06:17','2017-12-07 05:06:17'),
 (6,3,4,8,1,0,'2017-12-08 03:31:35','2017-12-08 03:31:35'),
 (7,3,4,4,1,0,'2017-12-08 03:31:38','2017-12-08 03:31:38'),
 (12,4,5,13,1,0,'2018-03-08 03:05:44','2018-03-08 03:05:44'),
 (13,3,5,2,1,0,'2018-03-08 04:28:41','2018-03-08 04:28:41'),
 (14,3,5,7,1,0,'2018-03-08 04:28:44','2018-03-08 04:28:44');
/*!40000 ALTER TABLE `tutoralumnos` ENABLE KEYS */;


--
-- Definition of table `tutors`
--

DROP TABLE IF EXISTS `tutors`;
CREATE TABLE `tutors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `especialidad` varchar(200) DEFAULT NULL,
  `persona_id` int(11) NOT NULL,
  `video` text,
  `activo` tinyint(1) DEFAULT NULL,
  `borrado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Tutor_Usuario1_idx` (`persona_id`),
  CONSTRAINT `fk_Tutor_Usuario1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutors`
--

/*!40000 ALTER TABLE `tutors` DISABLE KEYS */;
INSERT INTO `tutors` (`id`,`especialidad`,`persona_id`,`video`,`activo`,`borrado`,`created_at`,`updated_at`) VALUES 
 (1,'GESTION DE PROCESOS',51,'<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/6WeMiC-CJHA\" frameborder=\"0\" allowfullscreen></iframe>',1,1,'2017-12-04 00:16:15','2017-12-04 03:01:45'),
 (2,'PROGRAMACION WEB',53,NULL,2,0,'2017-12-04 00:31:23','2017-12-04 04:21:25'),
 (3,'ELECTRÓNICA 2',54,'<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/CN7ps3Z4uCc\" frameborder=\"0\" allowfullscreen></iframe>',1,0,'2017-12-04 00:34:05','2018-04-11 16:59:07'),
 (4,'GESTIÓN DE PROCESOS',55,'<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/sckg1vHDxBk\" frameborder=\"0\" gesture=\"media\" allow=\"encrypted-media\" allowfullscreen></iframe>',1,0,'2017-12-07 03:14:20','2017-12-07 03:14:20');
/*!40000 ALTER TABLE `tutors` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `remember_token` varchar(225) DEFAULT NULL,
  `tipouser_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `borrado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Usuario_tipoUsuario1_idx` (`tipouser_id`),
  KEY `fk_Usuario_Persona1_idx` (`persona_id`),
  CONSTRAINT `fk_Usuario_Persona1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_tipoUsuario1` FOREIGN KEY (`tipouser_id`) REFERENCES `tipousers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`name`,`email`,`password`,`remember_token`,`tipouser_id`,`persona_id`,`activo`,`borrado`,`created_at`,`updated_at`) VALUES 
 (1,'sygns','crisfernex@gmail.com','$2y$10$OZYLD9GWH6.3gnPGgCa6OOELR8XGrp2lOtpXXkXkzKd/gYqSCkOli','GJH2htds2VzWAjh0Qi7jt5Ztmsyhyjm19FbqLXrCmOERAGasVstTaBWAAqaC',1,33,1,0,'2017-03-27 01:03:07','2017-03-27 01:03:07'),
 (2,'cristian7','cristian_7_70@hotmail.com','$2y$10$tT.uYeUaAjYOsThidJR2N.FDG9Sr5AqMQTsgB9G7v6uyC90rbtKqy','5MEwJuAUcCn6IEdk5Qo7ujV1yZxlngmdBqNQNjtl4HDkLTyaiKKswEfkkHSC',4,39,1,0,'2017-04-07 23:50:23','2018-04-10 22:51:47'),
 (3,'sdf1','sdf','$2y$10$Ns2/pA8azYY17MULHCgnsOl3gC8Mn2PaxRy5R1JcHOrf6WQILDxiy',NULL,4,40,1,0,'2017-04-10 03:39:03','2017-04-10 03:39:03'),
 (4,'asd1','asd','$2y$10$BTWkWW1XfG8d5lHG2fokZu/6UtcGd1SVY4Z.RLalPUD5cO9C5DZDG',NULL,4,41,1,0,'2017-04-10 03:41:08','2017-04-10 03:41:08'),
 (5,'asd2','asd','$2y$10$Q8510.qGs9T.hIf4WFZTseOI3xN0aYPTs01Qes6CqR1NaL3CkQV0a',NULL,4,42,1,0,'2017-04-10 04:15:46','2017-04-10 04:15:46'),
 (6,'dsad3','dasd','$2y$10$JqvOUtnnRCte33wfab8c1uS.Xs4vFkwAdqpNyUbFnSoC9AyUn5xt2',NULL,4,43,1,0,'2017-04-10 04:21:34','2017-04-10 04:21:34'),
 (7,'dsad4','dsad','$2y$10$YuTKYK3ddr4Rfz40AV0eLuOPJmdInwoeig1djhaY9xqm1P8Ip1NEC',NULL,4,44,1,0,'2017-04-10 04:40:18','2017-04-10 04:40:18'),
 (8,'dsa5','dsad','$2y$10$7BdwwO5/BNPc/AOpPWYGZefOk/KYY7slQXNqSxaqP1cPXtXWqJNHK',NULL,4,45,1,0,'2017-04-10 04:53:00','2017-04-10 04:53:00'),
 (9,'sdfsd6','sdf','$2y$10$BINwZKSevijmI6IKAFZS6eZ8AqqnAk8y.0f8SXXnUPoKUcg9.Pyxq',NULL,4,46,1,0,'2017-04-10 04:53:48','2017-04-10 04:53:48'),
 (10,'asd7','as','$2y$10$81umHfIOEL/jhr17o.SadeIZLzwAn7XocYWDx5Xh0DK3Xy8w0Uy0q',NULL,4,47,1,0,'2017-04-10 05:15:13','2017-04-10 05:15:13'),
 (11,'dsa8','dsa','$2y$10$lqdoXlTzJ1ahgkYhGxPxq.RWoD4wTldoeMeE2BzycFhMT1u2gNupu',NULL,4,48,1,0,'2017-04-10 05:28:30','2017-04-10 05:28:30'),
 (12,'sygns29','crisfernex2@gmail.com','$2y$10$5C4ibWz2It31B795zycR9u3Nhli0s8rK4KL.lx.INE6gEqpmrF/hm',NULL,4,49,1,0,'2017-04-10 05:42:27','2017-04-10 05:42:27'),
 (13,'user10','email@dominio.com','$2y$10$Tme3ljjKY3qysF3AXHom7.G40hgX8On.tx4x4pOvTa16iSnaEDjjG',NULL,4,50,1,0,'2017-04-10 05:50:33','2017-04-10 05:50:33'),
 (14,'-IRMA123-','-IRMA@GMAIL.COM-','$2y$10$g2cXEZTf6G/n1vl9nA8cbecr3tazdTey7RaZCxpQR4imO.OntnHC2',NULL,3,51,1,1,'2017-12-04 00:16:15','2017-12-04 03:01:45'),
 (15,'TUTO1','LUIS@MAIL.COM','$2y$10$i22XqihfH8gSIA3TuSAlhey3n4DtbM.RANs7OkkWPYV0IJSER2fT2','QSIxtF7aB1pKVsy8xAUMb8kpyEzpKddZ8HPmcR0gcHzhsEEXDRGZ61MFqleq',3,53,2,0,'2017-12-04 00:31:23','2017-12-04 04:21:41'),
 (16,'CARO1','CARO@HOTMAIL.COM','$2y$10$wff6/7TWBgohaPM51q094e4XXuSWyFxCxkOyIGDBXRvELXg3C2JlS','lpNtD1tVcgG7ZSJHlDtwoErwxnihfNT7gmI8ZeDcoj2eeqNf9CdtAvobOIZR',3,54,1,0,'2017-12-04 00:34:05','2018-11-02 20:07:34'),
 (17,'ELI','ELI@GMAIL.COM','$2y$10$41HJdAPtgL6EIU6xtUdtZObx3vrVyEyJ8bcblwINBXnkzs0Untu3a',NULL,3,55,1,0,'2017-12-07 03:14:20','2018-03-24 14:51:16');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
