/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - lmmc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lmmc` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `lmmc`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `no_hp_admin` varchar(15) NOT NULL,
  PRIMARY KEY (`id_admin`),
  KEY `admin_ibfk_2` (`username`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`username`,`nama_admin`,`no_hp_admin`) values 
(1,'admin','Dimas','08122222222');

/*Table structure for table `apoteker` */

DROP TABLE IF EXISTS `apoteker`;

CREATE TABLE `apoteker` (
  `id_apoteker` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `nama_apoteker` varchar(20) NOT NULL,
  `alamat_apoteker` text NOT NULL,
  `no_hp_apoteker` varchar(15) NOT NULL,
  PRIMARY KEY (`id_apoteker`),
  KEY `apoteker_ibfk_1` (`username`),
  CONSTRAINT `apoteker_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `apoteker` */

insert  into `apoteker`(`id_apoteker`,`username`,`nama_apoteker`,`alamat_apoteker`,`no_hp_apoteker`) values 
(1,'apotekerA','apotekerA','alamat apotekerA','087777777777');

/*Table structure for table `dokter` */

DROP TABLE IF EXISTS `dokter`;

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `nama_dokter` varchar(20) NOT NULL,
  `alamat_dokter` text NOT NULL,
  `no_hp_dokter` varchar(15) NOT NULL,
  `spesialis` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokter`),
  KEY `dokter_ibfk_1` (`username`),
  CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `dokter` */

insert  into `dokter`(`id_dokter`,`username`,`nama_dokter`,`alamat_dokter`,`no_hp_dokter`,`spesialis`) values 
(1,'dokterA','dokterA','Banjarmasin','08345678910','umum'),
(4,'dokterB','dokterB','Kalua','0877232323','umum');

/*Table structure for table `jadwal_dokter` */

DROP TABLE IF EXISTS `jadwal_dokter`;

CREATE TABLE `jadwal_dokter` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokter` int(11) NOT NULL,
  `hari_kerja` date NOT NULL,
  `jam_kerja` time NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `id_dokter` (`id_dokter`),
  CONSTRAINT `jadwal_dokter_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jadwal_dokter` */

insert  into `jadwal_dokter`(`id_jadwal`,`id_dokter`,`hari_kerja`,`jam_kerja`) values 
(7,1,'2020-12-18','08:00:00'),
(8,4,'2020-12-01','09:00:00');

/*Table structure for table `obat` */

DROP TABLE IF EXISTS `obat`;

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL AUTO_INCREMENT,
  `id_apoteker` int(11) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `tanggal_obat` date NOT NULL,
  `jenis_obat` varchar(30) NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `satuan_obat` varchar(20) NOT NULL,
  `harga_obat` float NOT NULL,
  `keterangan` varchar(8) NOT NULL,
  PRIMARY KEY (`id_obat`),
  KEY `obat_ibfk_1` (`id_apoteker`),
  CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_apoteker`) REFERENCES `apoteker` (`id_apoteker`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

/*Data for the table `obat` */

insert  into `obat`(`id_obat`,`id_apoteker`,`nama_obat`,`tanggal_obat`,`jenis_obat`,`jumlah_obat`,`satuan_obat`,`harga_obat`,`keterangan`) values 
(11,1,'obatc','2020-12-24','Tablet',133,'Botol',22000,'masuk'),
(12,1,'obatA','2020-12-12','Salep',13,'Strip',15000,'masuk'),
(21,1,'obatX','2020-12-12','Pil',124,'Pack',220000,'masuk'),
(22,1,'obatXQE23E','2020-12-13','Tablet',124,'Pcs',123232,'keluar'),
(23,1,'on','2020-12-13','Tablet',124,'Pcs',123232,'keluar'),
(24,1,'obatXQE23E','2020-12-13','Kapsul',133,'Strip',123232,'keluar'),
(26,1,'obatB','2020-12-17','Kapsul',13,'Pcs',22000,'keluar'),
(27,1,'obat r','2020-12-23','Pil',22,'Strip',2300,'masuk'),
(28,1,'paracetamol','2020-12-07','Kapsul',5,'Pcs',32000,'masuk'),
(29,1,'amoxylin','2020-12-02','Tablet',25,'Pack',56000,'masuk'),
(30,1,'Hydrocodone','2020-12-08','Pil',22,'Pcs',42000,'masuk'),
(31,1,'Lisinopril','2020-12-08','Kapsul',22,'Pcs',220000,'keluar'),
(32,1,'Norvasc','2020-12-06','Sirup',25,'Pcs',123000,'masuk'),
(33,1,'Hydrochlorothiazide','2020-12-06','Sirup',20,'Pcs',120000,'keluar');

/*Table structure for table `pasien` */

DROP TABLE IF EXISTS `pasien`;

CREATE TABLE `pasien` (
  `no_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `nama_pasien` varchar(20) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `no_hp_pasien` varchar(15) NOT NULL,
  `no_bpjs` varchar(20) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `instansi` varchar(20) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  PRIMARY KEY (`no_anggota`),
  KEY `pasien_ibfk_1` (`username`),
  CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pasien` */

insert  into `pasien`(`no_anggota`,`username`,`nama_pasien`,`tanggal_masuk`,`no_hp_pasien`,`no_bpjs`,`no_ktp`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`agama`,`instansi`,`gol_darah`) values 
(1,'ps3','123','2020-12-10','0897878','q23q3c343','5tertrtret','stbk','2000-12-21','L','Islam','InstansiA','B'),
(2,'ps4','123','2020-12-10','0897878','q23q3c343','22e ','kotaA','2000-12-21','L','Hindu','Instansi a','B'),
(3,'apotekerA','123','2020-12-10','0897878','q23q3c343','5tertrtret','kotaA','2012-12-21','L','Islam','dwdw','B'),
(4,'rxxx','anjayani','2020-12-23','','dqwe3qr23','3 3W3R3 R3R','E4 R3R3 ','2020-12-01','L','Islam','InstansiA','O');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NOT NULL,
  `no_anggota` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `total_pembayaran` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `pembayaran_ibfk_1` (`id_admin`),
  KEY `pembayaran_ibfk_2` (`no_anggota`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`no_anggota`) REFERENCES `pasien` (`no_anggota`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pembayaran` */

/*Table structure for table `rekam_medis` */

DROP TABLE IF EXISTS `rekam_medis`;

CREATE TABLE `rekam_medis` (
  `id_rekam_medis` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokter` int(11) NOT NULL,
  `no_anggota` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `tekanan_darah` float NOT NULL,
  `keluhan` text NOT NULL,
  `diagnosa` text NOT NULL,
  PRIMARY KEY (`id_rekam_medis`),
  KEY `rekam_medis_ibfk_1` (`id_dokter`),
  KEY `rekam_medis_ibfk_2` (`no_anggota`),
  KEY `rekam_medis_ibfk_3` (`id_obat`),
  CONSTRAINT `rekam_medis_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rekam_medis_ibfk_2` FOREIGN KEY (`no_anggota`) REFERENCES `pasien` (`no_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rekam_medis_ibfk_3` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `rekam_medis` */

insert  into `rekam_medis`(`id_rekam_medis`,`id_dokter`,`no_anggota`,`id_obat`,`tanggal_periksa`,`tekanan_darah`,`keluhan`,`diagnosa`) values 
(2,1,4,12,'2020-12-07',100,'mual','diare');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`username`,`password`,`email`,`level`) values 
('abc123','123','abc@gmail.com',2),
('admin','123','admin@gmail.com',1),
('apotekerA','123','apotekerA@gmail.com',4),
('dokterA','123','abc@gmail.com',3),
('dokterB','123','abc@gmail.com',3),
('ps3','123','abc@gmail.com',2),
('ps4','123','dwdwd@gmail.com',2),
('rxxx','123','abc@gmail.com',2),
('userA','321','userA@gmail.com',2),
('wert','111','abc@gmail.com',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
