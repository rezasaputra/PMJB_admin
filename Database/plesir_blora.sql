/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.19-MariaDB : Database - plesir_blora
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`plesir_blora` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `plesir_blora`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `level` tinyint(5) DEFAULT NULL,
  `status` tinyint(5) DEFAULT '1',
  `session` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`uid`,`nama_admin`,`username`,`password`,`email`,`level`,`status`,`session`) values (1,'Super Admin','admin','c93ccd78b2076528346216b3b2f701e6','admin@gmail.com',1,1,'02e985e9954b3d7807d41d34a947cbb6e7f6ef2b'),(5,'Ahmad Salaf','salaf','81dc9bdb52d04dc20036dbd8313ed055','salaf@gmail.com',2,1,NULL);

/*Table structure for table `gambar` */

DROP TABLE IF EXISTS `gambar`;

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL AUTO_INCREMENT,
  `id_wisata` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id_gambar`),
  KEY `id_wisata` (`id_wisata`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `gambar` */

insert  into `gambar`(`id_gambar`,`id_wisata`,`url`) values (1,1,'07ecd7445b841439f422ea6efa531072.jpg'),(2,1,'830cc113e02ee85d790d1098f9b1344f.jpg'),(4,2,'fb59f544eeeb855a6158a490844f2618.png'),(5,2,'d1e1cf0fa8f10cd0526dc750d080210a.png');

/*Table structure for table `gambar_kuliner` */

DROP TABLE IF EXISTS `gambar_kuliner`;

CREATE TABLE `gambar_kuliner` (
  `idg` int(11) NOT NULL AUTO_INCREMENT,
  `id_kuliner` int(20) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  PRIMARY KEY (`idg`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `gambar_kuliner` */

insert  into `gambar_kuliner`(`idg`,`id_kuliner`,`gambar`) values (1,1,'609c7a9c5ff1ce3a4fa94064e1631004.jpg'),(2,1,'5de8a98144d948b58082aab51ac80095.jpg'),(4,1,'bece3145d19056281b70ce9748c66b29.jpg');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  `status` tinyint(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama_kategori`,`status`) values (4,'Alam',1),(5,'Budaya',1),(6,'Sejarah',1),(7,'Religi',1);

/*Table structure for table `kuliner` */

DROP TABLE IF EXISTS `kuliner`;

CREATE TABLE `kuliner` (
  `id_kuliner` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kuliner` varchar(255) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `pic_kuliner` varchar(255) NOT NULL,
  `jam_buka` varchar(255) NOT NULL,
  `daftar_harga` varchar(255) NOT NULL,
  `alamat_kuliner` varchar(255) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `status` tinyint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kuliner`),
  UNIQUE KEY `id_wisata` (`id_wisata`),
  KEY `id_wisata_2` (`id_wisata`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kuliner` */

insert  into `kuliner`(`id_kuliner`,`nama_kuliner`,`id_wisata`,`pic_kuliner`,`jam_buka`,`daftar_harga`,`alamat_kuliner`,`latitude`,`longitude`,`status`) values (1,'Prasmanann',1,'','09:00 - 12:00','','Blora Regency, Central Java, Indonesia','-7.012244','111.3798928',1);

/*Table structure for table `kunjungan` */

DROP TABLE IF EXISTS `kunjungan`;

CREATE TABLE `kunjungan` (
  `id_kunjungan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `tgl_kunjungan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kunjungan`),
  KEY `id_user` (`id_user`),
  KEY `id_wisata` (`id_wisata`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kunjungan` */

/*Table structure for table `rute` */

DROP TABLE IF EXISTS `rute`;

CREATE TABLE `rute` (
  `id_rute` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rute`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rute` */

/*Table structure for table `transportasi` */

DROP TABLE IF EXISTS `transportasi`;

CREATE TABLE `transportasi` (
  `id_t` int(11) NOT NULL AUTO_INCREMENT,
  `nama_t` varchar(30) DEFAULT NULL,
  `status` tinyint(5) DEFAULT '1',
  PRIMARY KEY (`id_t`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `transportasi` */

insert  into `transportasi`(`id_t`,`nama_t`,`status`) values (1,'Sepeda',1),(2,'BUS',1),(3,'Mobil',1),(4,'Motor',1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`id_user`,`nama_user`,`email_user`,`pic`,`tgl`) values (1,2121,'Muchamad Akbar','akbar@gmail.com','098765432','2017-10-04');

/*Table structure for table `wisata` */

DROP TABLE IF EXISTS `wisata`;

CREATE TABLE `wisata` (
  `id_wisata` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `nama_wisata` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `pic_wisata` varchar(255) NOT NULL,
  `pengunjung` double DEFAULT NULL,
  `transportasi` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longtitude` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `rating` int(255) NOT NULL,
  PRIMARY KEY (`id_wisata`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wisata` */

insert  into `wisata`(`id_wisata`,`id_kategori`,`nama_wisata`,`deskripsi`,`pic_wisata`,`pengunjung`,`transportasi`,`alamat`,`latitude`,`longtitude`,`status`,`rating`) values (1,4,'Goa Krawang','','0986673541',NULL,'3','Blora Regency, Central Java, Indonesia','-7.012244','111.3798928','1',0),(2,4,'Taman Raya Abadi','','2121121',NULL,'2','Blora Regency, Central Java, Indonesia','-7.012244','111.3798928','1',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
