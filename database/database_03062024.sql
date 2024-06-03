/*
SQLyog Enterprise v12.5.1 (64 bit)
MySQL - 5.7.33 : Database - u927135498_babussalam
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`u927135498_babussalam` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `u927135498_babussalam`;

/*Table structure for table `tbl_about` */

DROP TABLE IF EXISTS `tbl_about`;

CREATE TABLE `tbl_about` (
  `about_id` int(11) NOT NULL AUTO_INCREMENT,
  `about_image` varchar(100) DEFAULT NULL,
  `about_description` text,
  PRIMARY KEY (`about_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_about` */

insert  into `tbl_about`(`about_id`,`about_image`,`about_description`) values 
(1,'about1.jpg','<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n');

/*Table structure for table `tbl_agenda` */

DROP TABLE IF EXISTS `tbl_agenda`;

CREATE TABLE `tbl_agenda` (
  `agenda_id` int(11) NOT NULL AUTO_INCREMENT,
  `agenda_nama` varchar(200) DEFAULT NULL,
  `agenda_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `agenda_deskripsi` text,
  `agenda_mulai` date DEFAULT NULL,
  `agenda_selesai` date DEFAULT NULL,
  `agenda_tempat` varchar(90) DEFAULT NULL,
  `agenda_waktu` varchar(30) DEFAULT NULL,
  `agenda_keterangan` varchar(200) DEFAULT NULL,
  `agenda_author` varchar(60) DEFAULT NULL,
  `agenda_pengguna_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`agenda_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_agenda` */

insert  into `tbl_agenda`(`agenda_id`,`agenda_nama`,`agenda_tanggal`,`agenda_deskripsi`,`agenda_mulai`,`agenda_selesai`,`agenda_tempat`,`agenda_waktu`,`agenda_keterangan`,`agenda_author`,`agenda_pengguna_id`) values 
(14,'Tawaqufan','2021-03-18 13:55:45','Tawaqufan tahunan ini dialkukan penyambutan bulan suci ramadhan 2021 ok','2021-03-25','2021-03-25','RW 01 rawa Buaya','20.00 - 23.00 WIB','Pakai Masker','Mohamad Ismi Azis',2),
(15,'Makan bersama','2021-03-18 14:20:21','Deskripsi test sip aja','2021-03-19','2021-03-20','Baitussalam','08.00 - 14.00 Wib','Bawa nasi','Mohamad Ismi Azis',2),
(17,'Rewart diri SHADOWS','2021-03-18 14:28:56','aaaa okeee','2021-03-19','2021-03-20','Rawa Buaya, cengkareng Jakarta barat','20.00 - 23.00 WIB','aaaa','Mohamad Ismi Azis',2),
(27,'test','2021-03-21 09:41:40','ss','2021-03-21','2021-03-22','Ramayana','08.00 - 14.00 WIB','aaa','Mohamad Ismi Azis',2);

/*Table structure for table `tbl_album` */

DROP TABLE IF EXISTS `tbl_album`;

CREATE TABLE `tbl_album` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT,
  `album_nama` varchar(50) DEFAULT NULL,
  `album_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `album_pengguna_id` int(11) DEFAULT NULL,
  `album_author` varchar(60) DEFAULT NULL,
  `album_count` int(11) DEFAULT '0',
  `album_cover` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`album_id`),
  KEY `album_pengguna_id` (`album_pengguna_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_album` */

insert  into `tbl_album`(`album_id`,`album_nama`,`album_tanggal`,`album_pengguna_id`,`album_author`,`album_count`,`album_cover`) values 
(3,'Pemilu Osis 2016-2017 udah','2017-01-21 08:58:16',2,'Mohamad Ismi Azis',0,'dc088a9fb62333012ff7a601828219d7.jpg'),
(4,'Kegiatan Belajar majelis besok','2017-01-24 08:31:13',2,'Mohamad Ismi Azis',1,'203bc0411a07ed0430d39bcc38ec2c56.jpg');

/*Table structure for table `tbl_files` */

DROP TABLE IF EXISTS `tbl_files`;

CREATE TABLE `tbl_files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_judul` varchar(120) DEFAULT NULL,
  `file_deskripsi` text,
  `file_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `file_oleh` varchar(60) DEFAULT NULL,
  `file_download` int(11) DEFAULT '0',
  `file_data` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_files` */

insert  into `tbl_files`(`file_id`,`file_judul`,`file_deskripsi`,`file_tanggal`,`file_oleh`,`file_download`,`file_data`) values 
(2,'Dasar-dasar CSS','Modul dasar-dasar CSS 3. Modul ini membantu anda untuk memahami struktur dasar CSS','2017-01-23 11:30:01','Drs. Joko',0,'ab9a183ff240deadbedaff78e639af2f.pdf'),
(3,'14 Teknik Komunikasi Yang Paling Efektif','Ebook 14 teknik komunikasi paling efektif membantu anda untuk berkomunikasi dengan baik dan benar','2017-01-23 22:26:06','Drs. Joko',0,'ab2cb34682bd94f30f2347523112ffb9.pdf'),
(4,'Bagaimana Membentuk Pola Pikir yang Baru','Ebook ini membantu anda membentuk pola pikir baru.','2017-01-23 22:27:07','Drs. Joko',0,'30f588eb5c55324f8d18213f11651855.pdf'),
(5,'7 Tips Penting mengatasi Kritik','7 Tips Penting mengatasi Kritik','2017-01-23 22:27:44','Drs. Joko',0,'329a62b25ad475a148e1546aa3db41de.docx'),
(6,'8 Racun dalam kehidupan kita','8 Racun dalam kehidupan kita','2017-01-23 22:28:17','Drs. Joko',0,'8e38ad4948ba13758683dea443fbe6be.docx'),
(7,'Jurnal Teknolgi Informasi','Jurnal Teknolgi Informasi','2017-01-25 10:18:53','Gunawan, S.Pd',0,'87ae0f009714ddfdd79e2977b2a64632.pdf'),
(8,'Jurnal Teknolgi Informasi 2','Jurnal Teknolgi Informasi','2017-01-25 10:19:22','Gunawan, S.Pd',0,'c4e966ba2c6e142155082854dc5b3602.pdf'),
(9,'Naskah Publikasi IT','Naskah Teknolgi Informasi','2017-01-25 10:21:04','Gunawan, S.Pd',0,'71380b3cf16a17a02382098c028ece9c.pdf'),
(10,'Modul Teknologi Informasi','Modul Teknologi Informasi','2017-01-25 10:22:08','Gunawan, S.Pd',0,'029143a3980232ab2900d94df36dbb0c.pdf'),
(11,'Modul Teknologi Informasi Part II','Modul Teknologi Informasi','2017-01-25 10:22:54','Gunawan, S.Pd',0,'ea8f3f732576083156e509657614f551.pdf'),
(12,'Modul Teknologi Informasi Part III','Modul Teknologi Informasi','2017-01-25 10:23:21','Gunawan, S.Pd',0,'c5e5e7d16e4cd6c3d22c11f64b0db2af.pdf');

/*Table structure for table `tbl_galeri` */

DROP TABLE IF EXISTS `tbl_galeri`;

CREATE TABLE `tbl_galeri` (
  `galeri_id` int(11) NOT NULL AUTO_INCREMENT,
  `galeri_judul` varchar(60) DEFAULT NULL,
  `galeri_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `galeri_gambar` varchar(40) DEFAULT NULL,
  `galeri_album_id` int(11) DEFAULT NULL,
  `galeri_pengguna_id` int(11) DEFAULT NULL,
  `galeri_author` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`galeri_id`),
  KEY `galeri_album_id` (`galeri_album_id`),
  KEY `galeri_pengguna_id` (`galeri_pengguna_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_galeri` */

insert  into `tbl_galeri`(`galeri_id`,`galeri_judul`,`galeri_tanggal`,`galeri_gambar`,`galeri_album_id`,`galeri_pengguna_id`,`galeri_author`) values 
(7,'Belajar dengan native speaker','2017-01-24 08:26:22','831e5ad43ccc3c851d50c128ff095541.jpg',1,1,'M Fikri Setiadi'),
(8,'Diskusi dengan native speaker','2017-01-24 08:27:05','84afbf1d3ad45932f1d7ac47b8a00949.jpg',1,1,'M Fikri Setiadi'),
(9,'Foto bareng native speaker','2017-01-24 08:27:28','a99ab060d5d5bf8c96f24fe385f7dd8b.jpg',1,1,'M Fikri Setiadi'),
(10,'Foto bareng native speaker','2017-01-24 08:28:40','d70cedba6391b7b3c74b914efd82953f.jpg',1,1,'M Fikri Setiadi'),
(11,'Foto bareng native speaker','2017-01-24 08:28:54','10de99f425b9961ce1e87c5e5575f8f4.jpg',1,1,'M Fikri Setiadi'),
(19,'File download Gambar HD','2020-09-28 23:58:35','8bb0709530779e4b7a8e9791d7aefc95.jpg',5,2,'Mohamad Ismi Azis'),
(20,'File download Gambar HD','2020-09-28 23:59:14','b0eb9e1613668eebb55a95f1041065c6.jpg',5,2,'Mohamad Ismi Azis');

/*Table structure for table `tbl_guru` */

DROP TABLE IF EXISTS `tbl_guru`;

CREATE TABLE `tbl_guru` (
  `guru_id` int(11) NOT NULL AUTO_INCREMENT,
  `guru_nip` varchar(30) DEFAULT NULL,
  `guru_nama` varchar(70) DEFAULT NULL,
  `guru_jenkel` varchar(2) DEFAULT NULL,
  `guru_tmp_lahir` varchar(80) DEFAULT NULL,
  `guru_tgl_lahir` varchar(80) DEFAULT NULL,
  `guru_mapel` varchar(120) DEFAULT NULL,
  `guru_photo` varchar(40) DEFAULT NULL,
  `guru_tgl_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`guru_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_guru` */

insert  into `tbl_guru`(`guru_id`,`guru_nip`,`guru_nama`,`guru_jenkel`,`guru_tmp_lahir`,`guru_tgl_lahir`,`guru_mapel`,`guru_photo`,`guru_tgl_input`) values 
(9,'1115040','Ustad Saadih S.Pd','L','Jakarta','25 Agustus 1970','Agama','f938e4f74e5a9613bc94c026d48f2878.JPG','2020-09-29 00:03:14'),
(11,'11114069','Habib Jafar','L','Arab','20 September','Penasihat','8e56bc9451a3add6869d71c69e61c76c.jpg','2021-03-18 13:48:16');

/*Table structure for table `tbl_heading` */

DROP TABLE IF EXISTS `tbl_heading`;

CREATE TABLE `tbl_heading` (
  `heading_id` int(11) NOT NULL AUTO_INCREMENT,
  `heading_image` varchar(100) DEFAULT NULL,
  `heading_description` text,
  `heading_judul` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`heading_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_heading` */

insert  into `tbl_heading`(`heading_id`,`heading_image`,`heading_description`,`heading_judul`) values 
(5,'2a94c3fb4e8db787ebb77447fbe64439.jpg','Guru merupakan faktor penting dalam proses belajar-mengajar. Itulah kenapa kami mendatangkan guru-guru terbaik dari berbagai penjuru.	','Test Judul'),
(6,'29b4ce8694da8a4e359db34e0487ab8c.jpg','Guru merupakan faktor penting dalam proses belajar-mengajar. Itulah kenapa kami mendatangkan guru-guru terbaik dari berbagai penjuru dunia','Testing 2'),
(7,'d502554a9a0b4632d5519e2b7f43f5d6.jpg',' ','Pengajian Rutin Mingguan');

/*Table structure for table `tbl_inbox` */

DROP TABLE IF EXISTS `tbl_inbox`;

CREATE TABLE `tbl_inbox` (
  `inbox_id` int(11) NOT NULL AUTO_INCREMENT,
  `inbox_nama` varchar(40) DEFAULT NULL,
  `inbox_email` varchar(60) DEFAULT NULL,
  `inbox_kontak` varchar(20) DEFAULT NULL,
  `inbox_pesan` text,
  `inbox_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `inbox_status` int(11) DEFAULT '1' COMMENT '1=Belum dilihat, 0=Telah dilihat',
  PRIMARY KEY (`inbox_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_inbox` */

/*Table structure for table `tbl_kategori` */

DROP TABLE IF EXISTS `tbl_kategori`;

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(30) DEFAULT NULL,
  `kategori_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kategori` */

insert  into `tbl_kategori`(`kategori_id`,`kategori_nama`,`kategori_tanggal`) values 
(1,'Pendidikan','2016-09-06 12:49:04'),
(2,'Politik','2016-09-06 12:50:01'),
(3,'Sains','2016-09-06 12:59:39'),
(5,'Penelitian','2016-09-06 13:19:26'),
(6,'Prestasi','2016-09-07 09:51:09'),
(13,'Olah Raga','2017-01-13 20:20:31'),
(15,'Islami','2020-09-28 22:10:23');

/*Table structure for table `tbl_kelas` */

DROP TABLE IF EXISTS `tbl_kelas`;

CREATE TABLE `tbl_kelas` (
  `kelas_id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas_nama` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`kelas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kelas` */

insert  into `tbl_kelas`(`kelas_id`,`kelas_nama`) values 
(1,'Pelajar'),
(2,'Mahasiswa'),
(3,'Karyawan Swasta'),
(4,'Guru');

/*Table structure for table `tbl_komentar` */

DROP TABLE IF EXISTS `tbl_komentar`;

CREATE TABLE `tbl_komentar` (
  `komentar_id` int(11) NOT NULL AUTO_INCREMENT,
  `komentar_nama` varchar(30) DEFAULT NULL,
  `komentar_email` varchar(50) DEFAULT NULL,
  `komentar_isi` varchar(120) DEFAULT NULL,
  `komentar_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `komentar_status` varchar(2) DEFAULT NULL,
  `komentar_tulisan_id` int(11) DEFAULT NULL,
  `komentar_parent` int(11) DEFAULT '0',
  PRIMARY KEY (`komentar_id`),
  KEY `komentar_tulisan_id` (`komentar_tulisan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_komentar` */

insert  into `tbl_komentar`(`komentar_id`,`komentar_nama`,`komentar_email`,`komentar_isi`,`komentar_tanggal`,`komentar_status`,`komentar_tulisan_id`,`komentar_parent`) values 
(1,'M Fikri','fikrifiver97@gmail.com',' Nice Post.','2018-08-07 22:09:07','1',24,0),
(2,'M Fikri Setiadi','fikrifiver97@gmail.com',' Awesome Post','2018-08-07 22:14:26','1',24,0),
(3,'Joko','joko@gmail.com','Thank you.','2018-08-08 10:54:56','1',24,1),
(6,'Mohamad Ismi Azis','','Terima kasih mas.','2020-09-26 19:52:00','1',24,2),
(7,'siza','siza@gmail.com','ini website majelis sangat kompleks sekali dan bagus banget mudah bagi pembaca serta mencari infromasi disini. ','2020-09-28 22:15:21','1',26,0),
(10,'Enggar anjas','enggar@gmail.com','Apakah saya menjadi anggota majelis ta&#039;lim disini? ','2021-03-18 14:02:21','1',28,0),
(11,NULL,'','Boleh banget, ini bersifat umum kok.','2021-03-18 14:04:15','1',28,10),
(12,'ismi azis','sellerxperia01@gmail.com','ini boleh ikut kan yaa ','2024-05-29 15:52:44','1',28,0);

/*Table structure for table `tbl_log_aktivitas` */

DROP TABLE IF EXISTS `tbl_log_aktivitas`;

CREATE TABLE `tbl_log_aktivitas` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_nama` text,
  `log_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `log_ip` varchar(20) DEFAULT NULL,
  `log_pengguna_id` int(11) DEFAULT NULL,
  `log_icon` blob,
  `log_jenis_icon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`log_id`),
  KEY `log_pengguna_id` (`log_pengguna_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_log_aktivitas` */

/*Table structure for table `tbl_pengguna` */

DROP TABLE IF EXISTS `tbl_pengguna`;

CREATE TABLE `tbl_pengguna` (
  `pengguna_id` int(11) NOT NULL AUTO_INCREMENT,
  `pengguna_nama` varchar(50) DEFAULT NULL,
  `pengguna_moto` varchar(100) DEFAULT NULL,
  `pengguna_jenkel` varchar(2) DEFAULT NULL,
  `pengguna_username` varchar(30) DEFAULT NULL,
  `pengguna_password` varchar(35) DEFAULT NULL,
  `pengguna_tentang` text,
  `pengguna_email` varchar(50) DEFAULT NULL,
  `pengguna_nohp` varchar(20) DEFAULT NULL,
  `pengguna_facebook` varchar(35) DEFAULT NULL,
  `pengguna_twitter` varchar(35) DEFAULT NULL,
  `pengguna_linkdin` varchar(35) DEFAULT NULL,
  `pengguna_google_plus` varchar(35) DEFAULT NULL,
  `pengguna_status` varchar(10) DEFAULT '1',
  `pengguna_level` varchar(3) DEFAULT NULL,
  `pengguna_register` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengguna_photo` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`pengguna_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pengguna` */

insert  into `tbl_pengguna`(`pengguna_id`,`pengguna_nama`,`pengguna_moto`,`pengguna_jenkel`,`pengguna_username`,`pengguna_password`,`pengguna_tentang`,`pengguna_email`,`pengguna_nohp`,`pengguna_facebook`,`pengguna_twitter`,`pengguna_linkdin`,`pengguna_google_plus`,`pengguna_status`,`pengguna_level`,`pengguna_register`,`pengguna_photo`) values 
(2,'Mohamad Ismi Azis','Jangan Menyerah','L','admin','21232f297a57a5a743894a0e4a801fc3','I am Programmer Junior At Jakarta	','mohamadismiazis@gmail.com','0895334929462',NULL,NULL,NULL,NULL,'1','1','2020-09-26 19:18:05','3c40f655f756d7029be2cc1db540179a.jpg'),
(3,'Lia Fauziyyah',NULL,'P','lia','21232f297a57a5a743894a0e4a801fc3',NULL,'lia@lia.com','085716376375',NULL,NULL,NULL,NULL,'1','2','2021-03-11 14:03:06','feac2cea4a83ef6fb49c861e181f3eea.jpg'),
(4,'candra',NULL,'L','candra','21232f297a57a5a743894a0e4a801fc3',NULL,'candraariska@gmail.com','0895334929463',NULL,NULL,NULL,NULL,'0','3','2021-03-13 07:44:53','f96b7fd72cb545bdfaaa94844bc85e62.jpg');

/*Table structure for table `tbl_pengumuman` */

DROP TABLE IF EXISTS `tbl_pengumuman`;

CREATE TABLE `tbl_pengumuman` (
  `pengumuman_id` int(11) NOT NULL AUTO_INCREMENT,
  `pengumuman_judul` varchar(150) DEFAULT NULL,
  `pengumuman_deskripsi` text,
  `pengumuman_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengumuman_author` varchar(60) DEFAULT NULL,
  `pengumuman_pengguna_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pengumuman_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pengumuman` */

insert  into `tbl_pengumuman`(`pengumuman_id`,`pengumuman_judul`,`pengumuman_deskripsi`,`pengumuman_tanggal`,`pengumuman_author`,`pengumuman_pengguna_id`) values 
(3,'Peresmian Website Majelis','Peresmian dan launching website Talim Babussalam akan diadakan pada hari 18 Maret 2021 pukul 20.00,','2017-01-22 14:16:16','Mohamad Ismi Azis',2),
(10,'Pengajian Malam jumat','bertempat di baitusalam pengajian ruti  pada tanggal 18 Maret 2021.','2021-03-18 13:52:38','Mohamad Ismi Azis',2);

/*Table structure for table `tbl_pengunjung` */

DROP TABLE IF EXISTS `tbl_pengunjung`;

CREATE TABLE `tbl_pengunjung` (
  `pengunjung_id` int(11) NOT NULL AUTO_INCREMENT,
  `pengunjung_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengunjung_ip` varchar(40) DEFAULT NULL,
  `pengunjung_perangkat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pengunjung_id`)
) ENGINE=InnoDB AUTO_INCREMENT=953 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pengunjung` */

insert  into `tbl_pengunjung`(`pengunjung_id`,`pengunjung_tanggal`,`pengunjung_ip`,`pengunjung_perangkat`) values 
(930,'2018-08-09 15:04:59','::1','Chrome'),
(931,'2020-09-26 19:13:34','::1','Chrome'),
(932,'2020-09-28 08:06:44','::1','Chrome'),
(933,'2020-09-29 00:00:02','::1','Chrome'),
(934,'2021-01-09 05:52:46','::1','Chrome'),
(935,'2021-02-11 14:52:43','::1','Chrome'),
(936,'2021-03-01 15:09:17','::1','Chrome'),
(937,'2021-03-02 08:27:29','::1','Chrome'),
(938,'2021-03-05 09:06:12','::1','Chrome'),
(939,'2021-03-11 14:00:01','::1','Chrome'),
(940,'2021-03-13 06:05:08','::1','Chrome'),
(941,'2021-03-13 08:48:33','127.0.0.1','Firefox'),
(942,'2021-03-15 13:22:29','::1','Chrome'),
(943,'2021-03-16 09:09:15','::1','Chrome'),
(944,'2021-03-17 08:37:09','::1','Chrome'),
(945,'2021-03-18 10:55:29','::1','Chrome'),
(946,'2021-03-20 15:47:47','::1','Chrome'),
(947,'2021-03-21 10:02:01','::1','Chrome'),
(948,'2021-03-22 20:18:23','::1','Chrome'),
(949,'2021-03-24 11:25:32','::1','Chrome'),
(950,'2024-05-29 15:50:35','::1','Chrome'),
(951,'2024-05-30 20:36:49','127.0.0.1','Chrome'),
(952,'2024-06-02 16:55:02','127.0.0.1','Chrome');

/*Table structure for table `tbl_siswa` */

DROP TABLE IF EXISTS `tbl_siswa`;

CREATE TABLE `tbl_siswa` (
  `siswa_id` int(11) NOT NULL AUTO_INCREMENT,
  `siswa_nis` varchar(20) DEFAULT NULL,
  `siswa_nama` varchar(70) DEFAULT NULL,
  `siswa_jenkel` varchar(2) DEFAULT NULL,
  `siswa_kelas_id` int(11) DEFAULT NULL,
  `siswa_photo` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`siswa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_siswa` */

/*Table structure for table `tbl_tags` */

DROP TABLE IF EXISTS `tbl_tags`;

CREATE TABLE `tbl_tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_tags` */

insert  into `tbl_tags`(`tag_id`,`tag_name`) values 
(1,'Teknologi aja'),
(2,'Psikologi'),
(3,'Motivasi'),
(4,'Kesehatan');

/*Table structure for table `tbl_testimoni` */

DROP TABLE IF EXISTS `tbl_testimoni`;

CREATE TABLE `tbl_testimoni` (
  `testimoni_id` int(11) NOT NULL AUTO_INCREMENT,
  `testimoni_nama` varchar(30) DEFAULT NULL,
  `testimoni_isi` varchar(120) DEFAULT NULL,
  `testimoni_email` varchar(35) DEFAULT NULL,
  `testimoni_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`testimoni_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_testimoni` */

/*Table structure for table `tbl_testimonial` */

DROP TABLE IF EXISTS `tbl_testimonial`;

CREATE TABLE `tbl_testimonial` (
  `testimonial_id` int(11) NOT NULL AUTO_INCREMENT,
  `testimonial_name` varchar(50) DEFAULT NULL,
  `testimonial_content` text,
  `testimonial_image` varchar(50) DEFAULT NULL,
  `testimonial_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `testimonial_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`testimonial_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_testimonial` */

insert  into `tbl_testimonial`(`testimonial_id`,`testimonial_name`,`testimonial_content`,`testimonial_image`,`testimonial_created_at`,`testimonial_status`) values 
(6,'Izmi Azis S.Kom','Web nya bagus semua berfungsi dengan baik.','56e3f004c2d59fe1140dd6fa6d06e875.jpg','2021-03-16 15:31:21','Programmer Jiwasraya'),
(10,'Al Anshori','Web yang powerfull dan mudah di pahami bagi user','5ffa02d202a108256d396667260ca01e.jpg','2021-03-16 15:39:27','Pengusaha'),
(11,'Enggar Anjas S.H','ini website sangat bermanfaat sekali, cukup jarang nemuin website untuk majelis yang sudah responsive dan fitur lengkap','0190adcc97bb0a17e54dd16791a65421.png','2021-03-18 11:13:33','Karyawan Swasta');

/*Table structure for table `tbl_tulisan` */

DROP TABLE IF EXISTS `tbl_tulisan`;

CREATE TABLE `tbl_tulisan` (
  `tulisan_id` int(11) NOT NULL AUTO_INCREMENT,
  `tulisan_judul` varchar(100) DEFAULT NULL,
  `tulisan_isi` text,
  `tulisan_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tulisan_kategori_id` int(11) DEFAULT NULL,
  `tulisan_kategori_nama` varchar(30) DEFAULT NULL,
  `tulisan_views` int(11) DEFAULT '0',
  `tulisan_gambar` varchar(40) DEFAULT NULL,
  `tulisan_pengguna_id` int(11) DEFAULT NULL,
  `tulisan_author` varchar(40) DEFAULT NULL,
  `tulisan_img_slider` int(2) NOT NULL DEFAULT '0',
  `tulisan_slug` varchar(200) DEFAULT NULL,
  `tulisan_status` varchar(10) DEFAULT '0',
  `tulisan_tags` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`tulisan_id`),
  KEY `tulisan_kategori_id` (`tulisan_kategori_id`),
  KEY `tulisan_pengguna_id` (`tulisan_pengguna_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_tulisan` */

insert  into `tbl_tulisan`(`tulisan_id`,`tulisan_judul`,`tulisan_isi`,`tulisan_tanggal`,`tulisan_kategori_id`,`tulisan_kategori_nama`,`tulisan_views`,`tulisan_gambar`,`tulisan_pengguna_id`,`tulisan_author`,`tulisan_img_slider`,`tulisan_slug`,`tulisan_status`,`tulisan_tags`) values 
(20,'Persiapan siswa menjelang ujian nasional','<p>Banyak metode bejalar yang dilakukan oleh siswa untuk persiapan menghadapi ujian nasional (UN). Biantaranya mengingat dengan metode Mind Map, ataupun bejalar diluar kelas (outdoor).&nbsp; Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel.</p>\r\n','2017-05-17 16:24:42',1,'Pendidikan',38,'0a927c6d34dc5560b72f053313f14638.jpg',1,'M Fikri Setiadi',0,'persiapan-siswa-menjelang-ujian-nasional','1',NULL),
(24,'Proses belajar mengajar MSchool','<p>Proses belajar mengajar di sekolah m-sekolah berlangsung menyenangkan. Didukung oleh instruktur yang fun dengan metode mengajar yang tidak biasa. Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel.</p>\r\n\r\n<p>Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel a Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel artikel Ini adalah sampel artikel Ini adalah sampel artikel.</p>\r\n\r\n<p>Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel .</p>\r\n\r\n<p>Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel.</p>\r\n\r\n<p>Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel Ini adalah sampel artikel.</p>\r\n','2017-05-17 16:46:29',1,'Pendidikan',168,'ea114dc1ec5275560a5ef3238fd04722.jpg',1,'M Fikri Setiadi',0,'proses-belajar-mengajar-mschool','1',NULL),
(26,'Hidup ini indah','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummying text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Ini adalah updatean pertama saya beneran saya mengakui nya</p>\r\n\r\n<ol>\r\n	<li>ketuahanan yang maha esa</li>\r\n	<li>kemanusaiaan yang adil dan beradab</li>\r\n	<li>persatuan indonesia</li>\r\n	<li>test</li>\r\n</ol>\r\n','2020-09-28 22:14:03',13,'Olah Raga',35,'681804215dc44af5a67ad6bc6174a5d3.jpg',2,'Mohamad Ismi Azis',0,'hidup-ini-indah','1',NULL),
(27,'Hidup ini indah untukmu','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\"\" src=\"/majelis/assets/kcfinder/upload/files/DreamCatcher-64e2e4f8-74a7-40bd-8562-ac5cfb4807a3.jpg\" style=\"height:400px; width:500px\" /></p>\r\n','2021-03-02 10:37:44',1,'Pendidikan',13,'34adc12d24ac6f66bbd9c48608d5ab97.jpg',2,'Mohamad Ismi Azis',0,'hidup-ini-indah-untukmu','1','Teknologi aja,Psikologi'),
(28,'Meriah nya acara isra miraj di tahun 2021','<p>ini acara terbaru untuk isra mirajdi tahun 2021, dihadiri para kyai dan orang besar .</p>\r\n','2021-03-11 14:42:28',1,'Pendidikan',18,'06008ea16fa4b647672b48a80fc4ec60.jpg',2,'Mohamad Ismi Azis',0,'meriah-nya-acara-isra-miraj-di-tahun-2021','1','Teknologi aja,Psikologi'),
(30,'pengumuman berita bari','<p>ini adalah brta terbaru yang wajib anda ketagui selama anda isni</p>\r\n','2021-03-24 16:23:41',2,'Politik',0,'92f22556f5f385819ede16b88a2844a9.jpg',2,'Mohamad Ismi Azis',0,'pengumuman-berita-bari','0','Motivasi');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
