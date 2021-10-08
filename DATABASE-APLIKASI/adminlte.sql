/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.1.38-MariaDB : Database - adminlte
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`adminlte` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `adminlte`;

/*Table structure for table `daftar_ps_diunit_pengelola_ps` */

DROP TABLE IF EXISTS `daftar_ps_diunit_pengelola_ps`;

CREATE TABLE `daftar_ps_diunit_pengelola_ps` (
  `id_ps` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_program` varchar(50) NOT NULL,
  `nama_ps` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `no_tgl_sk` varchar(50) NOT NULL,
  `tgl_kadaluarsa` varchar(50) NOT NULL,
  `jml_mhs_saat_ts` int(11) NOT NULL,
  PRIMARY KEY (`id_ps`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `daftar_ps_diunit_pengelola_ps` */

/*Table structure for table `dosen_pembimbing_utama_tugas_akhir` */

DROP TABLE IF EXISTS `dosen_pembimbing_utama_tugas_akhir`;

CREATE TABLE `dosen_pembimbing_utama_tugas_akhir` (
  `id_dosen_pembimbing` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(50) NOT NULL,
  `ts2` int(11) NOT NULL,
  `ts1` int(11) NOT NULL,
  `ts` int(11) NOT NULL,
  `r1` int(11) NOT NULL,
  `ts_2` int(11) NOT NULL,
  `ts_1` int(11) NOT NULL,
  `ts_` int(11) NOT NULL,
  `r2` int(11) NOT NULL,
  `r3` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_dosen_pembimbing`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `dosen_pembimbing_utama_tugas_akhir` */

/*Table structure for table `dosen_praktisi` */

DROP TABLE IF EXISTS `dosen_praktisi`;

CREATE TABLE `dosen_praktisi` (
  `id_dosen_praktisi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(50) NOT NULL,
  `nidk` int(11) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `pend_tertinggi` varchar(50) NOT NULL,
  `bidang_keahlian` varchar(50) NOT NULL,
  `sertifikat` varchar(50) NOT NULL,
  `matkul_yg_diampu` varchar(50) NOT NULL,
  `bobot_kredit` int(11) NOT NULL,
  PRIMARY KEY (`id_dosen_praktisi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `dosen_praktisi` */

/*Table structure for table `dosen_tdk_tetap` */

DROP TABLE IF EXISTS `dosen_tdk_tetap`;

CREATE TABLE `dosen_tdk_tetap` (
  `id_dosen_tdk_tetap` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(50) NOT NULL,
  `nidnk` int(11) NOT NULL,
  `pen_pas_sarjana` varchar(50) NOT NULL,
  `bid_keahlian` varchar(50) NOT NULL,
  `jabatan_akademik` varchar(50) NOT NULL,
  `sertifikat_pendidikan_profesional` varchar(50) NOT NULL,
  `sertifikat_kompetensi_profesi_industri_1` varchar(50) NOT NULL,
  `sertifikat_kompetensi_profesi_industri_2` varchar(50) NOT NULL,
  `kesesuaian_bidang_keahlian_dengan_mata_kuliah_yang_diampu` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dosen_tdk_tetap`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `dosen_tdk_tetap` */

/*Table structure for table `dosen_tetap_pt` */

DROP TABLE IF EXISTS `dosen_tetap_pt`;

CREATE TABLE `dosen_tetap_pt` (
  `id_dosen_tetap_pt` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(50) NOT NULL,
  `pendidikan_pasca_sarjana` varchar(50) NOT NULL,
  `nidn` int(11) NOT NULL,
  `bidang_keahlian` varchar(50) NOT NULL,
  `kesesuaian_inti_ps` varchar(50) DEFAULT NULL,
  `jabatan_akademik` varchar(50) DEFAULT NULL,
  `sertifikat_pendik_prof` varchar(50) DEFAULT NULL,
  `sertifikat_kompetensi_prof` varchar(50) DEFAULT NULL,
  `matkul_ps_akre` varchar(50) DEFAULT NULL,
  `kesesuaian_bid_keahlian` varchar(50) DEFAULT NULL,
  `matkul_diampu_pslain` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_dosen_tetap_pt`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `dosen_tetap_pt` */

insert  into `dosen_tetap_pt`(`id_dosen_tetap_pt`,`nama_dosen`,`pendidikan_pasca_sarjana`,`nidn`,`bidang_keahlian`,`kesesuaian_inti_ps`,`jabatan_akademik`,`sertifikat_pendik_prof`,`sertifikat_kompetensi_prof`,`matkul_ps_akre`,`kesesuaian_bid_keahlian`,`matkul_diampu_pslain`,`created_at`) values 
(3,'MUHAMAD IRFAN SETIAWAN','Magister/ Magister Terapan/ Spesialis',261207395,'nn',NULL,NULL,'LIKMI, BNSP','LIKMI, BNSP','ww','ww','ww','2021-01-17 15:59:21');

/*Table structure for table `ewmp_dosen` */

DROP TABLE IF EXISTS `ewmp_dosen`;

CREATE TABLE `ewmp_dosen` (
  `id_ewmp_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(50) NOT NULL,
  `dtps` varchar(50) NOT NULL,
  `ps_akreditasi` varchar(50) NOT NULL,
  `ps_dalampt` varchar(50) NOT NULL,
  `ps_luarpt` varchar(50) NOT NULL,
  `penelitian` varchar(50) NOT NULL,
  `pkm` varchar(50) NOT NULL,
  `tugas_tambahan` varchar(50) NOT NULL,
  `jml_sks` int(11) NOT NULL,
  `rata_rata_persemester` int(11) NOT NULL,
  PRIMARY KEY (`id_ewmp_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ewmp_dosen` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `ipk_lulusan` */

DROP TABLE IF EXISTS `ipk_lulusan`;

CREATE TABLE `ipk_lulusan` (
  `id_ipk_lulusan` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_lulus` year(4) NOT NULL,
  `jml_lulusan` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `rata_rata` int(11) NOT NULL,
  `maks` int(11) NOT NULL,
  PRIMARY KEY (`id_ipk_lulusan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ipk_lulusan` */

/*Table structure for table `karya_ilmiah_dtps_disitasi` */

DROP TABLE IF EXISTS `karya_ilmiah_dtps_disitasi`;

CREATE TABLE `karya_ilmiah_dtps_disitasi` (
  `id_karya_ilmiah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(50) NOT NULL,
  `judul_artikel_disitasi` varchar(50) NOT NULL,
  `jumlah_sitasi` int(11) NOT NULL,
  PRIMARY KEY (`id_karya_ilmiah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `karya_ilmiah_dtps_disitasi` */

/*Table structure for table `karya_ilmiah_mhs_yg_disitasi` */

DROP TABLE IF EXISTS `karya_ilmiah_mhs_yg_disitasi`;

CREATE TABLE `karya_ilmiah_mhs_yg_disitasi` (
  `id_mhs_yg_disitasi` int(11) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `judul_artikel_yg_disitasi` varchar(50) NOT NULL,
  `jml_sitasi` int(11) NOT NULL,
  PRIMARY KEY (`id_mhs_yg_disitasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `karya_ilmiah_mhs_yg_disitasi` */

/*Table structure for table `kcpr_pembelajaran` */

DROP TABLE IF EXISTS `kcpr_pembelajaran`;

CREATE TABLE `kcpr_pembelajaran` (
  `id_kcpr_pembelajaran` int(11) NOT NULL AUTO_INCREMENT,
  `semester` int(11) NOT NULL,
  `kode_mata_kuliah` int(11) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `matkul_kompetensi` varchar(50) NOT NULL,
  `kuliah_responsi_tutorial` int(11) NOT NULL,
  `seminar` int(11) NOT NULL,
  `praktukum_praktik_praktiklapangan` int(11) NOT NULL,
  `konversi_kejam` int(11) NOT NULL,
  `sikap` int(11) NOT NULL,
  `pengetahuan` int(11) NOT NULL,
  `keterampilan_umum` int(11) NOT NULL,
  `keterampilan_khusus` int(11) NOT NULL,
  `dokumen_rencana_pembelajaran` varchar(50) NOT NULL,
  `unit_penyelenggara` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kcpr_pembelajaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kcpr_pembelajaran` */

/*Table structure for table `kepuasan_mhs` */

DROP TABLE IF EXISTS `kepuasan_mhs`;

CREATE TABLE `kepuasan_mhs` (
  `id_mhs` int(11) NOT NULL AUTO_INCREMENT,
  `aspek_yg_diukur` varchar(50) NOT NULL,
  `sangat_baik` int(11) NOT NULL,
  `baik` int(11) NOT NULL,
  `cukup` int(11) NOT NULL,
  `kurang` int(11) NOT NULL,
  `rencana_tindak_lanjut` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mhs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kepuasan_mhs` */

/*Table structure for table `kepuasan_pengguna_lulusan` */

DROP TABLE IF EXISTS `kepuasan_pengguna_lulusan`;

CREATE TABLE `kepuasan_pengguna_lulusan` (
  `id_pengguna_lulusan` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_lulusan` year(4) NOT NULL,
  `jml_lulusan` int(11) NOT NULL,
  `jml_tanggapan_kepuasan_pengguna_yg_terlacak` int(11) NOT NULL,
  `jenis_kemampuan` varchar(50) NOT NULL,
  `sangat_baik` int(11) NOT NULL,
  `baik` int(11) NOT NULL,
  `cukup` int(11) NOT NULL,
  `kurang` int(11) NOT NULL,
  `rencana_tindak_lanjut_ps` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pengguna_lulusan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kepuasan_pengguna_lulusan` */

/*Table structure for table `kerjasama_pendidikan` */

DROP TABLE IF EXISTS `kerjasama_pendidikan`;

CREATE TABLE `kerjasama_pendidikan` (
  `id_kerjasamapendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `lembaga_mitra` varchar(50) NOT NULL,
  `tingkat` varchar(50) DEFAULT NULL,
  `judul_kegiatan_kerja` varchar(50) NOT NULL,
  `manfaat` varchar(50) NOT NULL,
  `waktu_durasi` varchar(50) NOT NULL,
  `bukti_kerjasama` varchar(50) NOT NULL,
  `tahun_berakhir_kjsm` year(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kerjasamapendidikan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kerjasama_pendidikan` */

insert  into `kerjasama_pendidikan`(`id_kerjasamapendidikan`,`lembaga_mitra`,`tingkat`,`judul_kegiatan_kerja`,`manfaat`,`waktu_durasi`,`bukti_kerjasama`,`tahun_berakhir_kjsm`,`created_at`) values 
(5,'PT CANGKUDU MEDIA GROUP','NASIONAL','PERWEWENAN','ILMU TEKNIK','120 HARI','LAMP344',2020,'2021-01-06 12:34:28'),
(6,'PT indofood makmur sukses','Internasional','KERJASAMA BILATERALa','NILAI','300HARI','SERTIFIKAT',2020,'2021-01-06 13:03:13'),
(7,'PT JARSINDO GARMENT','NASIONAL','NASIONAL','NILAI','120 HARI1','SERTIFIKAT',2012,'2021-01-06 13:04:43');

/*Table structure for table `kerjasama_penelitian` */

DROP TABLE IF EXISTS `kerjasama_penelitian`;

CREATE TABLE `kerjasama_penelitian` (
  `id_kjpl` int(11) NOT NULL AUTO_INCREMENT,
  `lembaga_mitra` varchar(50) NOT NULL,
  `tingkat` varchar(50) DEFAULT NULL,
  `judul_kegiatan_kerja` varchar(50) NOT NULL,
  `manfaat` varchar(50) NOT NULL,
  `waktu_durasi` varchar(50) NOT NULL,
  `bukti_kerjasama` varchar(50) NOT NULL,
  `tahun_berakhir_kjsm` year(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kjpl`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kerjasama_penelitian` */

insert  into `kerjasama_penelitian`(`id_kjpl`,`lembaga_mitra`,`tingkat`,`judul_kegiatan_kerja`,`manfaat`,`waktu_durasi`,`bukti_kerjasama`,`tahun_berakhir_kjsm`,`created_at`) values 
(11,'PT indofood makmur','Nasional','PERWEWENAN','ADA DEH','120 HARI','LAMP344',2020,'2021-01-06 15:28:22');

/*Table structure for table `kerjasama_pkm` */

DROP TABLE IF EXISTS `kerjasama_pkm`;

CREATE TABLE `kerjasama_pkm` (
  `id_kjspkm` int(11) NOT NULL AUTO_INCREMENT,
  `lembaga_mitra` varchar(50) NOT NULL,
  `tingkat` varchar(50) NOT NULL,
  `judul_kegiatan_kerja` varchar(50) NOT NULL,
  `manfaat` varchar(50) NOT NULL,
  `waktu_durasi` varchar(50) NOT NULL,
  `bukti_kerjasama` varchar(50) NOT NULL,
  `tahun_berakhir_kjs_pkm` year(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kjspkm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kerjasama_pkm` */

insert  into `kerjasama_pkm`(`id_kjspkm`,`lembaga_mitra`,`tingkat`,`judul_kegiatan_kerja`,`manfaat`,`waktu_durasi`,`bukti_kerjasama`,`tahun_berakhir_kjs_pkm`,`created_at`) values 
(2,'PT CANGKUDU MEDIA GROUP','Internasional','PERWEWENAN','ILMU TEKNIK','120 HARI','SERTIFIKAT',2022,'2021-01-06 15:59:17');

/*Table structure for table `kesesuaian_bidang_kerja_lulusan` */

DROP TABLE IF EXISTS `kesesuaian_bidang_kerja_lulusan`;

CREATE TABLE `kesesuaian_bidang_kerja_lulusan` (
  `id_bidang_kerja_lulusan` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_lulus` year(4) NOT NULL,
  `jml_lulusan` int(11) NOT NULL,
  `jml_lulusan_terlacak` int(11) NOT NULL,
  `rendah` int(11) NOT NULL,
  `sedang` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  PRIMARY KEY (`id_bidang_kerja_lulusan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kesesuaian_bidang_kerja_lulusan` */

/*Table structure for table `luaran_pkm_dtps_bag1` */

DROP TABLE IF EXISTS `luaran_pkm_dtps_bag1`;

CREATE TABLE `luaran_pkm_dtps_bag1` (
  `id_pkm_dtps_bag1` int(11) NOT NULL AUTO_INCREMENT,
  `luaran_pkm` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pkm_dtps_bag1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `luaran_pkm_dtps_bag1` */

/*Table structure for table `luaran_pkm_dtps_bag2` */

DROP TABLE IF EXISTS `luaran_pkm_dtps_bag2`;

CREATE TABLE `luaran_pkm_dtps_bag2` (
  `id_pkm_dtps_bag2` int(11) NOT NULL AUTO_INCREMENT,
  `luaran_pkm` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pkm_dtps_bag2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `luaran_pkm_dtps_bag2` */

/*Table structure for table `luaran_pkm_dtps_bag3` */

DROP TABLE IF EXISTS `luaran_pkm_dtps_bag3`;

CREATE TABLE `luaran_pkm_dtps_bag3` (
  `id_pkm_dtps_bag3` int(11) NOT NULL AUTO_INCREMENT,
  `luaran_pkm` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pkm_dtps_bag3`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `luaran_pkm_dtps_bag3` */

/*Table structure for table `luaran_pkm_dtps_bag4` */

DROP TABLE IF EXISTS `luaran_pkm_dtps_bag4`;

CREATE TABLE `luaran_pkm_dtps_bag4` (
  `id_pkm_dtps_bag4` int(11) NOT NULL AUTO_INCREMENT,
  `luaran_pkm` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pkm_dtps_bag4`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `luaran_pkm_dtps_bag4` */

/*Table structure for table `luaran_pkm_yg_dihasilkan_mhs_bag1` */

DROP TABLE IF EXISTS `luaran_pkm_yg_dihasilkan_mhs_bag1`;

CREATE TABLE `luaran_pkm_yg_dihasilkan_mhs_bag1` (
  `id_luaran_penelitian_bag1` int(11) NOT NULL AUTO_INCREMENT,
  `luaran_pkm` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_luaran_penelitian_bag1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `luaran_pkm_yg_dihasilkan_mhs_bag1` */

/*Table structure for table `luaran_pkm_yg_dihasilkan_mhs_bag2` */

DROP TABLE IF EXISTS `luaran_pkm_yg_dihasilkan_mhs_bag2`;

CREATE TABLE `luaran_pkm_yg_dihasilkan_mhs_bag2` (
  `id_luaran_penelitian_bag2` int(11) NOT NULL AUTO_INCREMENT,
  `luaran_pkm` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_luaran_penelitian_bag2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `luaran_pkm_yg_dihasilkan_mhs_bag2` */

/*Table structure for table `luaran_pkm_yg_dihasilkan_mhs_bag3` */

DROP TABLE IF EXISTS `luaran_pkm_yg_dihasilkan_mhs_bag3`;

CREATE TABLE `luaran_pkm_yg_dihasilkan_mhs_bag3` (
  `id_luaran_penelitian_bag3` int(11) NOT NULL AUTO_INCREMENT,
  `luaran_pkm` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_luaran_penelitian_bag3`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `luaran_pkm_yg_dihasilkan_mhs_bag3` */

/*Table structure for table `luaran_pkm_yg_dihasilkan_mhs_bag4` */

DROP TABLE IF EXISTS `luaran_pkm_yg_dihasilkan_mhs_bag4`;

CREATE TABLE `luaran_pkm_yg_dihasilkan_mhs_bag4` (
  `id_luaran_penelitian_bag4` int(11) NOT NULL AUTO_INCREMENT,
  `luaran_pkm` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_luaran_penelitian_bag4`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `luaran_pkm_yg_dihasilkan_mhs_bag4` */

/*Table structure for table `masa_studi_lulusan_d3` */

DROP TABLE IF EXISTS `masa_studi_lulusan_d3`;

CREATE TABLE `masa_studi_lulusan_d3` (
  `id_studi_lulusan_d3` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_masuk` year(4) NOT NULL,
  `jml_mhs_diterima` int(11) NOT NULL,
  `akhir_ts4` int(11) NOT NULL,
  `akhir_ts3` int(11) NOT NULL,
  `akhir_ts2` int(11) NOT NULL,
  `akhir_ts1` int(11) NOT NULL,
  `akhir_ts` int(11) NOT NULL,
  `jml_lulusan_sd_akhir_ts` int(11) NOT NULL,
  `rata_rata_masa_studi` int(11) NOT NULL,
  PRIMARY KEY (`id_studi_lulusan_d3`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `masa_studi_lulusan_d3` */

/*Table structure for table `masa_studi_lulusan_s1` */

DROP TABLE IF EXISTS `masa_studi_lulusan_s1`;

CREATE TABLE `masa_studi_lulusan_s1` (
  `id_lulusan_s1` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_masuk` year(4) NOT NULL,
  `jml_mhs_diterima` int(11) NOT NULL,
  `akhir_ts6` int(11) DEFAULT NULL,
  `akhir_ts5` int(11) DEFAULT NULL,
  `akhir_ts4` int(11) NOT NULL,
  `akhir_ts3` int(11) NOT NULL,
  `akhir_ts2` int(11) NOT NULL,
  `akhir_ts1` int(11) NOT NULL,
  `akhir_ts` int(11) NOT NULL,
  `jml_lulusan_sd_akhir_ts` int(11) NOT NULL,
  `rata_rata_masa_studi` int(11) NOT NULL,
  PRIMARY KEY (`id_lulusan_s1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `masa_studi_lulusan_s1` */

/*Table structure for table `masa_studi_lulusan_s2` */

DROP TABLE IF EXISTS `masa_studi_lulusan_s2`;

CREATE TABLE `masa_studi_lulusan_s2` (
  `id_lulusan_s1` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_masuk` year(4) NOT NULL,
  `jml_mhs_diterima` int(11) NOT NULL,
  `akhir_ts3` int(11) NOT NULL,
  `akhir_ts2` int(11) NOT NULL,
  `akhir_ts1` int(11) NOT NULL,
  `akhir_ts` int(11) NOT NULL,
  `jml_lulusan_sd_akhir_ts` int(11) NOT NULL,
  `rata_rata_masa_studi` int(11) NOT NULL,
  PRIMARY KEY (`id_lulusan_s1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `masa_studi_lulusan_s2` */

/*Table structure for table `masa_studi_lulusan_s3` */

DROP TABLE IF EXISTS `masa_studi_lulusan_s3`;

CREATE TABLE `masa_studi_lulusan_s3` (
  `id_lulusan_s1` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_masuk` year(4) NOT NULL,
  `jml_mhs_diterima` int(11) NOT NULL,
  `akhir_ts6` int(11) DEFAULT NULL,
  `akhir_ts5` int(11) DEFAULT NULL,
  `akhir_ts4` int(11) NOT NULL,
  `akhir_ts3` int(11) NOT NULL,
  `akhir_ts2` int(11) NOT NULL,
  `akhir_ts1` int(11) NOT NULL,
  `akhir_ts` int(11) NOT NULL,
  `jml_lulusan_sd_akhir_ts` int(11) NOT NULL,
  `rata_rata_masa_studi` int(11) NOT NULL,
  PRIMARY KEY (`id_lulusan_s1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `masa_studi_lulusan_s3` */

/*Table structure for table `mhs_asing` */

DROP TABLE IF EXISTS `mhs_asing`;

CREATE TABLE `mhs_asing` (
  `id_mhs_asing` int(11) NOT NULL AUTO_INCREMENT,
  `ps_program_studi` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `ts2` int(11) NOT NULL,
  `ts1` int(11) NOT NULL,
  `ts` int(11) NOT NULL,
  `ts2_1` int(11) NOT NULL,
  `ts1_1` int(11) NOT NULL,
  `ts_1` int(11) NOT NULL,
  `ts2_2` int(11) NOT NULL,
  `ts1_2` int(11) NOT NULL,
  `ts_2` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_mhs_asing`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `mhs_asing` */

insert  into `mhs_asing`(`id_mhs_asing`,`ps_program_studi`,`ts2`,`ts1`,`ts`,`ts2_1`,`ts1_1`,`ts_1`,`ts2_2`,`ts1_2`,`ts_2`,`created_at`) values 
(3,'TEKNIK INFORMATIKA',12,12,12,12,12,12,12,12,12,'2021-01-07 13:12:44'),
(4,'SISTEM INFORMASI D3',150,100,88,0,0,0,0,0,0,'2021-01-07 13:15:47'),
(5,'MANAJEMEN INFORMATIKA',80,75,50,0,0,0,0,0,0,'2021-01-07 13:16:28');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `model_has_roles` */

/*Table structure for table `pameran_presentasi_publikasi_ilmiah_dtps` */

DROP TABLE IF EXISTS `pameran_presentasi_publikasi_ilmiah_dtps`;

CREATE TABLE `pameran_presentasi_publikasi_ilmiah_dtps` (
  `id_publikasi` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_publikasi` varchar(50) NOT NULL,
  `ts2` int(11) NOT NULL,
  `ts1` int(11) NOT NULL,
  `ts` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_publikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pameran_presentasi_publikasi_ilmiah_dtps` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `penelitian_dtps` */

DROP TABLE IF EXISTS `penelitian_dtps`;

CREATE TABLE `penelitian_dtps` (
  `id_penelitian` int(11) NOT NULL AUTO_INCREMENT,
  `sumber_pembiayaan` varchar(50) NOT NULL,
  `ts2` int(11) NOT NULL,
  `ts1` int(11) NOT NULL,
  `ts` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_penelitian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `penelitian_dtps` */

/*Table structure for table `penelitian_dtps_mhs` */

DROP TABLE IF EXISTS `penelitian_dtps_mhs`;

CREATE TABLE `penelitian_dtps_mhs` (
  `id_penelitian` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(50) NOT NULL,
  `tema_penelitian_sesuai_roadmap` varchar(50) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `judul_kegiatan` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  PRIMARY KEY (`id_penelitian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `penelitian_dtps_mhs` */

/*Table structure for table `penelitian_dtps_yg_menjadi_rujukan_tema_tesis` */

DROP TABLE IF EXISTS `penelitian_dtps_yg_menjadi_rujukan_tema_tesis`;

CREATE TABLE `penelitian_dtps_yg_menjadi_rujukan_tema_tesis` (
  `id_penelitian_rujukan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(50) NOT NULL,
  `tema_penelitian_sesuai_roadmap` varchar(50) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `judul_tesis` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  PRIMARY KEY (`id_penelitian_rujukan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `penelitian_dtps_yg_menjadi_rujukan_tema_tesis` */

/*Table structure for table `penggunaan_dana` */

DROP TABLE IF EXISTS `penggunaan_dana`;

CREATE TABLE `penggunaan_dana` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `ts2` int(20) NOT NULL,
  `ts1` int(20) NOT NULL,
  `ts` int(20) NOT NULL,
  `rata_rata1` int(20) NOT NULL,
  `ts_2` int(20) NOT NULL,
  `ts_1` int(20) NOT NULL,
  `ts_` int(20) NOT NULL,
  `rata_rata2` int(20) NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `penggunaan_dana` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `permissions` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `pkm_dtps` */

DROP TABLE IF EXISTS `pkm_dtps`;

CREATE TABLE `pkm_dtps` (
  `id_pkm_dtps` int(11) NOT NULL AUTO_INCREMENT,
  `sumber_pembiayaan` varchar(50) NOT NULL,
  `ts2` int(11) NOT NULL,
  `ts1` int(11) NOT NULL,
  `ts` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_pkm_dtps`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pkm_dtps` */

/*Table structure for table `pkm_dtps_mhs` */

DROP TABLE IF EXISTS `pkm_dtps_mhs`;

CREATE TABLE `pkm_dtps_mhs` (
  `id_pkm_dtps_mhs` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(50) NOT NULL,
  `tema_pkm_sesuai_roadmap` varchar(50) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `judul_kegiatan` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  PRIMARY KEY (`id_pkm_dtps_mhs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pkm_dtps_mhs` */

/*Table structure for table `pkm_pembelajaran` */

DROP TABLE IF EXISTS `pkm_pembelajaran`;

CREATE TABLE `pkm_pembelajaran` (
  `id_pkm_pembelajaran` int(11) NOT NULL AUTO_INCREMENT,
  `judul_pkm` varchar(50) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `matkul` varchar(50) NOT NULL,
  `bentuk_integrasi` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  PRIMARY KEY (`id_pkm_pembelajaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pkm_pembelajaran` */

/*Table structure for table `prestasi_akademik_mhs` */

DROP TABLE IF EXISTS `prestasi_akademik_mhs`;

CREATE TABLE `prestasi_akademik_mhs` (
  `id_prestasi_akademik_mhs` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(50) NOT NULL,
  `waktu_perolehan` varchar(50) NOT NULL,
  `wilayah` varchar(50) NOT NULL,
  `nasional` varchar(50) NOT NULL,
  `internasional` varchar(50) NOT NULL,
  `prestasi_yg_dicapai` varchar(50) NOT NULL,
  PRIMARY KEY (`id_prestasi_akademik_mhs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `prestasi_akademik_mhs` */

/*Table structure for table `prestasi_non_akademik_mhs` */

DROP TABLE IF EXISTS `prestasi_non_akademik_mhs`;

CREATE TABLE `prestasi_non_akademik_mhs` (
  `id_prestasi_non_akademik_mhs` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(50) NOT NULL,
  `waktu_perolehan` varchar(50) NOT NULL,
  `wilayah` varchar(50) NOT NULL,
  `nasional` varchar(50) NOT NULL,
  `internasional` varchar(50) NOT NULL,
  `prestasi_yg_dicapai` varchar(50) NOT NULL,
  PRIMARY KEY (`id_prestasi_non_akademik_mhs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `prestasi_non_akademik_mhs` */

/*Table structure for table `produk_dtps_yg_diadopsi` */

DROP TABLE IF EXISTS `produk_dtps_yg_diadopsi`;

CREATE TABLE `produk_dtps_yg_diadopsi` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi_produk` varchar(50) NOT NULL,
  `bukti` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `produk_dtps_yg_diadopsi` */

/*Table structure for table `produk_dtps_yg_dihasilkan_mhs_yg_diadopsi_masyarakat` */

DROP TABLE IF EXISTS `produk_dtps_yg_dihasilkan_mhs_yg_diadopsi_masyarakat`;

CREATE TABLE `produk_dtps_yg_dihasilkan_mhs_yg_diadopsi_masyarakat` (
  `id_produk_yg_diadopsi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mhs` varchar(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi_produk` varchar(50) NOT NULL,
  `bukti` varchar(50) NOT NULL,
  PRIMARY KEY (`id_produk_yg_diadopsi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `produk_dtps_yg_dihasilkan_mhs_yg_diadopsi_masyarakat` */

/*Table structure for table `publikasi_ilmiah_dtps` */

DROP TABLE IF EXISTS `publikasi_ilmiah_dtps`;

CREATE TABLE `publikasi_ilmiah_dtps` (
  `id_publikasi` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_publikasi` varchar(50) NOT NULL,
  `ts2` int(11) NOT NULL,
  `ts1` int(11) NOT NULL,
  `ts` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_publikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `publikasi_ilmiah_dtps` */

/*Table structure for table `publikasi_ilmiah_mhs` */

DROP TABLE IF EXISTS `publikasi_ilmiah_mhs`;

CREATE TABLE `publikasi_ilmiah_mhs` (
  `id_publikasi_ilmiah_mhs` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_publikasi` varchar(50) NOT NULL,
  `ts2` int(11) NOT NULL,
  `ts1` int(11) NOT NULL,
  `ts` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  PRIMARY KEY (`id_publikasi_ilmiah_mhs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `publikasi_ilmiah_mhs` */

/*Table structure for table `publikasi_ilmiah_mhs_ps_terapan` */

DROP TABLE IF EXISTS `publikasi_ilmiah_mhs_ps_terapan`;

CREATE TABLE `publikasi_ilmiah_mhs_ps_terapan` (
  `id_publikasi_ilmiah_mhs_ps_terapan` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_publikasi` varchar(50) NOT NULL,
  `ts2` int(11) NOT NULL,
  `ts1` int(11) NOT NULL,
  `ts` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  PRIMARY KEY (`id_publikasi_ilmiah_mhs_ps_terapan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `publikasi_ilmiah_mhs_ps_terapan` */

/*Table structure for table `rekognisi_dtps` */

DROP TABLE IF EXISTS `rekognisi_dtps`;

CREATE TABLE `rekognisi_dtps` (
  `id_dtps` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(50) NOT NULL,
  `bidang_keahlian` varchar(50) NOT NULL,
  `rkg_bkt_pendukung` varchar(50) NOT NULL,
  `wilayah` varchar(50) NOT NULL,
  `nasional` varchar(50) NOT NULL,
  `internasional` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  PRIMARY KEY (`id_dtps`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `rekognisi_dtps` */

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `role_has_permissions` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `roles` */

/*Table structure for table `seleksi_mhs_baru` */

DROP TABLE IF EXISTS `seleksi_mhs_baru`;

CREATE TABLE `seleksi_mhs_baru` (
  `id_seleksi_mhs` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_akademik` varchar(4) NOT NULL,
  `daya_tampung` int(11) NOT NULL,
  `pendaftar` int(11) NOT NULL,
  `lulus_seleksi` int(11) NOT NULL,
  `reguler1` int(11) NOT NULL,
  `transfer1` int(11) NOT NULL,
  `reguler2` int(11) NOT NULL,
  `transfer2` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_seleksi_mhs`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `seleksi_mhs_baru` */

insert  into `seleksi_mhs_baru`(`id_seleksi_mhs`,`tahun_akademik`,`daya_tampung`,`pendaftar`,`lulus_seleksi`,`reguler1`,`transfer1`,`reguler2`,`transfer2`,`created_at`) values 
(1,'TS-4',180,100,85,85,0,75,0,'2021-01-06 21:33:13'),
(2,'TS-3',100,90,75,75,0,65,0,'2021-01-06 21:33:13'),
(4,'TS-2',100,100,70,70,0,70,0,'2021-01-06 21:33:13'),
(5,'TS-1',120,80,70,70,0,70,66,'2021-01-06 21:33:13'),
(6,'TS',250,130,95,80,0,60,0,'2021-01-06 21:33:13');

/*Table structure for table `tb_daftarpsunipengelolaprodi` */

DROP TABLE IF EXISTS `tb_daftarpsunipengelolaprodi`;

CREATE TABLE `tb_daftarpsunipengelolaprodi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jenis_program` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ps` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tgl_sk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kadaluarsa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_mhs_saat_ts` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_daftarpsunipengelolaprodi` */

insert  into `tb_daftarpsunipengelolaprodi`(`id`,`jenis_program`,`nama_ps`,`status`,`no_tgl_sk`,`tgl_kadaluarsa`,`jml_mhs_saat_ts`,`created_at`) values 
(5,'MANGAN SINTEN','TEKNIK INFORMATIKA','TERAKREDITASI','20/SK/DF/2019','23/01/2019','1201','2021-01-06 09:02:14');

/*Table structure for table `tb_identitas` */

DROP TABLE IF EXISTS `tb_identitas`;

CREATE TABLE `tb_identitas` (
  `id_identitas` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_program` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `peringkat_akre_ps` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_sk_bnpt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_kadaluarsa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_unit_pengelola` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kabupaten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ts` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_identitas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_identitas` */

/*Table structure for table `tb_mhs` */

DROP TABLE IF EXISTS `tb_mhs`;

CREATE TABLE `tb_mhs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prodi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_mhs` */

/*Table structure for table `tempat_kerja_lulusan` */

DROP TABLE IF EXISTS `tempat_kerja_lulusan`;

CREATE TABLE `tempat_kerja_lulusan` (
  `id_mhs_lulusan` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_lulus` year(4) NOT NULL,
  `jml_lulusan` int(11) NOT NULL,
  `jml_lulusan_terlacak` int(11) NOT NULL,
  `lokal_tdk_berbadan_hukum` int(11) NOT NULL,
  `nasional_berbadan_hukum` int(11) NOT NULL,
  `internasional` int(11) NOT NULL,
  PRIMARY KEY (`id_mhs_lulusan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tempat_kerja_lulusan` */

/*Table structure for table `tes` */

DROP TABLE IF EXISTS `tes`;

CREATE TABLE `tes` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `barang` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tes` */

insert  into `tes`(`id`,`nama`,`barang`,`created_at`) values 
(1,'alfonso','aaa','2021-01-03 19:12:14'),
(2,'alfonso','aaa','2021-01-03 19:12:45'),
(3,'bn v','fcxghm v','2021-01-03 19:20:10');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(6,'KAJUR TI','kajur_ti@stmik-sumedang.ac.id',NULL,'$2y$10$8Q/cjT96oKV7VhEywmGZSux/JcBzCAIKsdGmB3DNm54L.i2L5suRC','gePWfDLpfbNNxGM95AXDeydmZNpWscpgd7HZTDaXdQRf8VU85QmXvigIUlcJ','2021-01-06 02:01:59','2021-01-06 02:01:59');

/*Table structure for table `vmts` */

DROP TABLE IF EXISTS `vmts`;

CREATE TABLE `vmts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visimisi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vmts` */

/*Table structure for table `waktu_tunggu_lulusan_d3` */

DROP TABLE IF EXISTS `waktu_tunggu_lulusan_d3`;

CREATE TABLE `waktu_tunggu_lulusan_d3` (
  `id_lulusan_d3` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_lulus` varchar(4) NOT NULL,
  `jml_lulusan` int(11) NOT NULL,
  `jml_lulusan_terlacak` int(11) NOT NULL,
  `wt_kurangdari_3bulan` int(11) NOT NULL,
  `wt_lebihdari_3bulan_kurangdari_6bulan` int(11) NOT NULL,
  `wt_lebihdari_6bulan` int(11) NOT NULL,
  PRIMARY KEY (`id_lulusan_d3`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `waktu_tunggu_lulusan_d3` */

/*Table structure for table `waktu_tunggu_lulusan_s1` */

DROP TABLE IF EXISTS `waktu_tunggu_lulusan_s1`;

CREATE TABLE `waktu_tunggu_lulusan_s1` (
  `id_lulusan_s1` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_lulus` varchar(4) NOT NULL,
  `jml_lulusan` int(11) NOT NULL,
  `jml_lulusan_terlacak` int(11) NOT NULL,
  `wt_kurangdari_3bulan` int(11) NOT NULL,
  `wt_lebihdari_3bulan_kurangdari_6bulan` int(11) NOT NULL,
  `wt_lebihdari_6bulan` int(11) NOT NULL,
  PRIMARY KEY (`id_lulusan_s1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `waktu_tunggu_lulusan_s1` */

/*Table structure for table `waktu_tunggu_lulusan_s1_terapan` */

DROP TABLE IF EXISTS `waktu_tunggu_lulusan_s1_terapan`;

CREATE TABLE `waktu_tunggu_lulusan_s1_terapan` (
  `id_lulusan_s1_terapan` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_lulus` varchar(4) NOT NULL,
  `jml_lulusan` int(11) NOT NULL,
  `jml_lulusan_terlacak` int(11) NOT NULL,
  `wt_kurangdari_3bulan` int(11) NOT NULL,
  `wt_lebihdari_3bulan_kurangdari_6bulan` int(11) NOT NULL,
  `wt_lebihdari_6bulan` int(11) NOT NULL,
  PRIMARY KEY (`id_lulusan_s1_terapan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `waktu_tunggu_lulusan_s1_terapan` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
