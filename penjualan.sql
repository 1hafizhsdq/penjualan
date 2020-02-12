-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: penjualan
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.11-MariaDB

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
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(128) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES (1,'Beras',9000,10000,'Kg'),(2,'barang',5678,6789,'asdf');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_barang`
--

DROP TABLE IF EXISTS `kategori_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nama_kategori` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_barang`
--

LOCK TABLES `kategori_barang` WRITE;
/*!40000 ALTER TABLE `kategori_barang` DISABLE KEYS */;
INSERT INTO `kategori_barang` VALUES (1,'Alat Masak'),(2,'Alat Bersih'),(3,'Beras');
/*!40000 ALTER TABLE `kategori_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(128) NOT NULL,
  `Alamat` varchar(128) NOT NULL,
  `Telp` char(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,'Ida','jl ikan kerapu','085336505990'),(2,'Hafiza','Jl Kebun Jeruk 12','087115879012');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'annisa adni','annisa@gmail.com','2.PNG','$2y$10$rNAvPeUdlG/dKZMJqnDeD.yoDoJoWnrSX80CUEJ8H3aCa70ecVEEe',1,1,1580701580),(4,'adli','adli@gmail.com','default.jpg','$2y$10$KXe9I63QvS/RAUcML3TcZee.r0D4YUTZ1uZms.2f7Rr58PuEc0hg2',2,1,1580724315),(6,'umair','umairdesain@gmail.com','default.jpg','$2y$10$umnD9lD898BNe46lfmLphOBdr75VWdNRZ.IsaWco8CilwY/Ulj3q2',2,1,1580992951),(7,'hafiz','annisaelfira19@gmail.com','default.jpg','$2y$10$zbeR/yRGcYrDnouhAeKC9eCjr/8xRkHL0mmy52dxRzCq21H34fP1W',2,0,1581050717),(8,'haf','haf@gmail.com','default.jpg','$2y$10$RL8HshJix1TX72czdV.a6egu3Gi0iy9Pu2CaSGupPjmRlmgQnhkie',2,1,1581482973),(9,'ul','ul@gmail.com','default.jpg','$2y$10$CXxnhk1aUd3E/GVXhHV/we9flEa/hqSIsxdiIMNY5afPEi29F9TM.',2,1,1581483661);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_access_menu`
--

DROP TABLE IF EXISTS `user_access_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_access_menu`
--

LOCK TABLES `user_access_menu` WRITE;
/*!40000 ALTER TABLE `user_access_menu` DISABLE KEYS */;
INSERT INTO `user_access_menu` VALUES (1,1,1),(2,1,2),(3,2,2),(4,1,3),(5,1,5),(6,1,7);
/*!40000 ALTER TABLE `user_access_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_menu`
--

LOCK TABLES `user_menu` WRITE;
/*!40000 ALTER TABLE `user_menu` DISABLE KEYS */;
INSERT INTO `user_menu` VALUES (1,'administrator','fas fa-fw fa-user-cog'),(2,'user','fas fas-fw fa-user-alt'),(3,'menu','fas fa-fw fa-box'),(5,'Datamaster','fas fa-fw fa-folder'),(7,'Dashboard','fas fa-fw fa-columns');
/*!40000 ALTER TABLE `user_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,'administrator'),(2,'member');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_sub_menu`
--

DROP TABLE IF EXISTS `user_sub_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_sub_menu`
--

LOCK TABLES `user_sub_menu` WRITE;
/*!40000 ALTER TABLE `user_sub_menu` DISABLE KEYS */;
INSERT INTO `user_sub_menu` VALUES (2,2,'My Profile','user',1),(3,3,'Menu Management','menu',1),(4,3,'Submenu Management','menu/submenu',1),(5,1,'Role','admin/role',1),(6,2,'Edit Profile','user/edit',1),(7,2,'Change Password','user/changepassword',1),(12,5,'Supplier','Datamaster/Supplier',1),(13,5,'Barang','Barang',1);
/*!40000 ALTER TABLE `user_sub_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_token`
--

DROP TABLE IF EXISTS `user_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_token`
--

LOCK TABLES `user_token` WRITE;
/*!40000 ALTER TABLE `user_token` DISABLE KEYS */;
INSERT INTO `user_token` VALUES (2,'umairdesain@gmail.com','2.6119356858088e76',1580992951),(3,'annisaelfira19@gmail.com','1.0658226525474e77',1581050717),(4,'umairdesain@gmail.com','5.0597123477954e76',1581058962),(5,'haf@gmail.com','a79d8775a55d63ad5f87e95b8a1a902df80e763a11fa8bbff91fdeb4a04976ee',1581483306),(6,'umairdesain@gmail.com','c0c08f9f737172e9b98959b1274245a8607d0d32959f8d2e7e94288bb9311557',1581483700);
/*!40000 ALTER TABLE `user_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'penjualan'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-12 22:29:22
