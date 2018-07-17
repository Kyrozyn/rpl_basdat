/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.31-MariaDB : Database - penyewaan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`penyewaan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `penyewaan`;

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id_pelanggan` varchar(5) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `no_ktp` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `hapus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `customer` */

insert  into `customer`(`id_pelanggan`,`nama`,`alamat`,`no_ktp`,`tanggal_lahir`,`no_telp`,`hapus`) values 
('00001','Satria FuccBoi','bandung','036796544368363','1998-10-10','0812391239',0),
('00002','Qais LuckyGuy','Cianjur','03679654436812','1998-02-20','08712313123',0);

/*Table structure for table `driver` */

DROP TABLE IF EXISTS `driver`;

CREATE TABLE `driver` (
  `id_driver` varchar(5) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `hapus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_driver`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `driver` */

insert  into `driver`(`id_driver`,`nama`,`alamat`,`tgl_lahir`,`no_telp`,`hapus`) values 
('00001','Spongebob Squarepants','bikini bottom','2000-05-05','081231931023',0),
('00002','Eugene Krabs','Bikini Bottom','1967-10-23','0878123213',0);

/*Table structure for table `kendaraan` */

DROP TABLE IF EXISTS `kendaraan`;

CREATE TABLE `kendaraan` (
  `No_Pol` varchar(10) NOT NULL,
  `Merk` varchar(50) NOT NULL,
  `Tahun_Buat` year(4) NOT NULL,
  `Bahan_Bakar` enum('Solar','Premium','Pertalite','Pertamax') NOT NULL,
  `Warna` varchar(20) NOT NULL,
  `Isi_Silinder` int(5) NOT NULL,
  `Harga_Sewa` int(11) NOT NULL,
  `hapus` tinyint(1) NOT NULL,
  PRIMARY KEY (`No_Pol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kendaraan` */

insert  into `kendaraan`(`No_Pol`,`Merk`,`Tahun_Buat`,`Bahan_Bakar`,`Warna`,`Isi_Silinder`,`Harga_Sewa`,`hapus`) values 
('12312','12312',2011,'Solar','123213',213,123,1),
('1232','123',0000,'Pertalite','123',123,41,1),
('A 5233 VZ','Toyota Innova',2015,'Premium','Merah Maroon',2393,10000000,0),
('B 1278 NH','Toyota Voxy',2014,'Pertamax','Putih',1987,13250000,0),
('B 1633 LK','Daihatsu Terios',2016,'Pertamax','Hitam',1495,13500000,0),
('B 304 HP','Suzuki APV',2016,'Pertamax','Hitam',1493,11525000,0),
('B 6349 TAP','Suzuki Ertiga',2017,'Pertamax','Putih',1462,12500000,0),
('B 6501 SGD','Suzuki Carry',2014,'Premium','Merah Maroon',1493,8750000,0),
('D 1017 FJ','Daihatsu Gran Max MB',2017,'Pertamax','Putih',1298,11500000,0),
('D 2397 VG','Daihatsu Taruna',2014,'Premium','Merah',1499,10525000,0),
('D 2921 RI','Isuzu Panther',2014,'Premium','Biru',1499,11300000,0),
('H 7047 TN','Toyota Avanza',2015,'Pertamax','Biru',1330,12500000,0);

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `username` varchar(60) NOT NULL,
  `pw` varchar(60) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`username`,`pw`,`role`) values 
('2','2','pegawai'),
('admin','admin','pemilik');

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `no_pegawai` varchar(5) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `hapus` tinyint(1) NOT NULL,
  PRIMARY KEY (`no_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pegawai` */

insert  into `pegawai`(`no_pegawai`,`nama`,`alamat`,`tgl_lahir`,`no_telp`,`hapus`) values 
('00001','Jordan Kelvin','banten','1998-11-20','08712392139',0),
('00002','Andika Dirgantara','Kolaka','1998-07-17','0878123123',0);

/*Table structure for table `sewa` */

DROP TABLE IF EXISTS `sewa`;

CREATE TABLE `sewa` (
  `kode_sewa` varchar(5) NOT NULL,
  `waktu_awal` datetime NOT NULL,
  `waktu_akhir` datetime NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `no_pol` varchar(10) NOT NULL,
  `id_pelanggan` varchar(5) NOT NULL,
  `id_driver` varchar(5) NOT NULL,
  `no_pegawai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sewa` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
