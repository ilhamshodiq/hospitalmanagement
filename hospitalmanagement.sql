-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for hospitalmanagement
CREATE DATABASE IF NOT EXISTS `hospitalmanagement` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `hospitalmanagement`;

-- Dumping structure for table hospitalmanagement.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table hospitalmanagement.admin: ~3 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`) VALUES
	(1, 'admin', 'admin', 'ini admin'),
	(2, 'dummy', 'dummy', 'Dummy Admin'),
	(3, 'dummy23', 'dummy2', 'dummy2');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table hospitalmanagement.diagnosa
CREATE TABLE IF NOT EXISTS `diagnosa` (
  `id_diagnosa` int(11) NOT NULL AUTO_INCREMENT,
  `id_keluhan` int(11) DEFAULT NULL,
  `deskripsi_diagnosa` varchar(2000) DEFAULT NULL,
  `id_resep` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_diagnosa`),
  KEY `FK_diagnosa_resep` (`id_resep`),
  KEY `FK_diagnosa_keluhan` (`id_keluhan`),
  CONSTRAINT `FK_diagnosa_keluhan` FOREIGN KEY (`id_keluhan`) REFERENCES `keluhan` (`id_keluhan`),
  CONSTRAINT `FK_diagnosa_resep` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table hospitalmanagement.diagnosa: ~5 rows (approximately)
/*!40000 ALTER TABLE `diagnosa` DISABLE KEYS */;
INSERT INTO `diagnosa` (`id_diagnosa`, `id_keluhan`, `deskripsi_diagnosa`, `id_resep`) VALUES
	(1, 1, 'Es terrooosss', 1),
	(5, 1, 'asdasd', 1),
	(6, 1, 'asdasd', 1),
	(19, 2, 'asdasd', 12),
	(20, 7, 'test', 5);
/*!40000 ALTER TABLE `diagnosa` ENABLE KEYS */;

-- Dumping structure for table hospitalmanagement.dokter
CREATE TABLE IF NOT EXISTS `dokter` (
  `id_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_dokter` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `spesialis` varchar(50) DEFAULT NULL,
  `id_poliklinik` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dokter`),
  KEY `FK_dokter_poliklinik` (`id_poliklinik`),
  CONSTRAINT `FK_dokter_poliklinik` FOREIGN KEY (`id_poliklinik`) REFERENCES `poliklinik` (`id_poliklinik`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table hospitalmanagement.dokter: ~3 rows (approximately)
/*!40000 ALTER TABLE `dokter` DISABLE KEYS */;
INSERT INTO `dokter` (`id_dokter`, `username`, `password`, `nama_dokter`, `jenis_kelamin`, `alamat`, `spesialis`, `id_poliklinik`) VALUES
	(1, 'dokter1', 'dokter1', 'Ilham Shodiq', 'Laki-laki', 'Probolinggo', 'Umum', 1),
	(2, 'dokter2', 'dokter2', 'Rikka', 'Laki-laki', 'Ngalam', 'Kulit', 1),
	(4, 'dokter3', 'dokter3', 'Otto Octavius', 'Laki-laki', 'adasdasd', 'Laba-laba', 1);
/*!40000 ALTER TABLE `dokter` ENABLE KEYS */;

-- Dumping structure for table hospitalmanagement.jadwal_dokter
CREATE TABLE IF NOT EXISTS `jadwal_dokter` (
  `id_jadwal_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokter` int(11) DEFAULT NULL,
  `waktu_mulai` varchar(50) DEFAULT NULL,
  `waktu_berakhir` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal_dokter`),
  KEY `FK_jadwal_dokter_dokter` (`id_dokter`),
  CONSTRAINT `FK_jadwal_dokter_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table hospitalmanagement.jadwal_dokter: ~1 rows (approximately)
/*!40000 ALTER TABLE `jadwal_dokter` DISABLE KEYS */;
INSERT INTO `jadwal_dokter` (`id_jadwal_dokter`, `id_dokter`, `waktu_mulai`, `waktu_berakhir`) VALUES
	(2, 1, '08:00', '17:00');
/*!40000 ALTER TABLE `jadwal_dokter` ENABLE KEYS */;

-- Dumping structure for table hospitalmanagement.keluhan
CREATE TABLE IF NOT EXISTS `keluhan` (
  `id_keluhan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(11) DEFAULT NULL,
  `tanggal` varchar(50) DEFAULT NULL,
  `jam` varchar(50) DEFAULT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `deskripsi` varchar(2000) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'belum disetujui',
  `id_ruangan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_keluhan`),
  KEY `FK_keluhan_pasien` (`id_pasien`),
  KEY `FK_keluhan_dokter` (`id_dokter`),
  KEY `FK_keluhan_ruangan` (`id_ruangan`),
  CONSTRAINT `FK_keluhan_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  CONSTRAINT `FK_keluhan_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  CONSTRAINT `FK_keluhan_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table hospitalmanagement.keluhan: ~8 rows (approximately)
/*!40000 ALTER TABLE `keluhan` DISABLE KEYS */;
INSERT INTO `keluhan` (`id_keluhan`, `id_pasien`, `tanggal`, `jam`, `id_dokter`, `deskripsi`, `status`, `id_ruangan`) VALUES
	(1, 1, '2022-06-10', '09:00', 1, 'Saya batuk', 'disetujui', 1),
	(2, 1, '2022-06-13', '07:22', 2, 'asdasd', 'disetujui', 3),
	(3, 1, '2022-06-12', '07:23', 1, 'asdasd', 'disetujui', 1),
	(4, 2, '2022-06-12', '12:15', 1, 'asjdnkajsdkjashdkj', 'disetujui', 4),
	(5, 1, '2022-06-13', '15:20', 1, 'asdasd', 'disetujui', 1),
	(6, 1, '2022-06-14', '15:34', 1, 'asdasd', 'disetujui', 1),
	(7, 1, '2022-06-15', '18:06', 1, 'aasdasd', 'disetujui', 3),
	(8, 1, '2022-06-16', '12:23', 2, 'asdasd', 'belum disetujui', 4);
/*!40000 ALTER TABLE `keluhan` ENABLE KEYS */;

-- Dumping structure for table hospitalmanagement.obat
CREATE TABLE IF NOT EXISTS `obat` (
  `id_obat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(50) NOT NULL DEFAULT '0',
  `harga` float NOT NULL DEFAULT '0',
  `stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table hospitalmanagement.obat: ~2 rows (approximately)
/*!40000 ALTER TABLE `obat` DISABLE KEYS */;
INSERT INTO `obat` (`id_obat`, `nama_obat`, `harga`, `stok`) VALUES
	(1, 'Paracetamol', 10000, -36),
	(2, 'Panadol', 8000, -204),
	(4, 'Bodrex', 30000, 65);
/*!40000 ALTER TABLE `obat` ENABLE KEYS */;

-- Dumping structure for table hospitalmanagement.pasien
CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_pasien` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table hospitalmanagement.pasien: ~4 rows (approximately)
/*!40000 ALTER TABLE `pasien` DISABLE KEYS */;
INSERT INTO `pasien` (`id_pasien`, `username`, `password`, `nama_pasien`, `jenis_kelamin`, `alamat`, `no_hp`) VALUES
	(1, 'pasien1', 'pasien1', 'Eden Hazard', 'Laki-laki', 'Banyuwangi', '085111111111'),
	(2, 'pasien2', 'pasien2', 'Paul Pogba', 'Laki-laki', 'Bondowoso', '081234567891'),
	(3, 'pasien3', 'pasien3', 'Lina', 'Perempuan', 'qweqweasd', '1231423523462362346');
/*!40000 ALTER TABLE `pasien` ENABLE KEYS */;

-- Dumping structure for table hospitalmanagement.poliklinik
CREATE TABLE IF NOT EXISTS `poliklinik` (
  `id_poliklinik` int(11) NOT NULL AUTO_INCREMENT,
  `nama_poliklinik` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id_poliklinik`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table hospitalmanagement.poliklinik: ~2 rows (approximately)
/*!40000 ALTER TABLE `poliklinik` DISABLE KEYS */;
INSERT INTO `poliklinik` (`id_poliklinik`, `nama_poliklinik`, `deskripsi`) VALUES
	(1, 'Poliklinik Umum', 'Poliklinik yang memeriksa dan melayani pasien secara umum.'),
	(2, 'Poliklinik THT', 'Poliklinik THT adalah Klinik yang di peruntukan mengobati penyakit yang berkaitan dengan telinga, hidung, dan tenggorokan.');
/*!40000 ALTER TABLE `poliklinik` ENABLE KEYS */;

-- Dumping structure for table hospitalmanagement.resep
CREATE TABLE IF NOT EXISTS `resep` (
  `id_resep` int(11) NOT NULL AUTO_INCREMENT,
  `id_obat` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_resep`),
  KEY `FK_resep_obat` (`id_obat`),
  CONSTRAINT `FK_resep_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table hospitalmanagement.resep: ~16 rows (approximately)
/*!40000 ALTER TABLE `resep` DISABLE KEYS */;
INSERT INTO `resep` (`id_resep`, `id_obat`, `jumlah`) VALUES
	(1, 1, 1),
	(2, 2, 4),
	(3, 1, 2),
	(4, 2, 1),
	(5, 2, 33),
	(6, 2, 2),
	(7, 2, 333),
	(8, 1, 3),
	(9, 1, 1),
	(10, 1, 1),
	(11, 1, 2),
	(12, 2, 1),
	(13, 1, 22),
	(14, 1, 12),
	(15, 1, 123),
	(16, 1, 23),
	(17, 2, 2);
/*!40000 ALTER TABLE `resep` ENABLE KEYS */;

-- Dumping structure for table hospitalmanagement.ruangan
CREATE TABLE IF NOT EXISTS `ruangan` (
  `id_ruangan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ruangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_ruangan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table hospitalmanagement.ruangan: ~3 rows (approximately)
/*!40000 ALTER TABLE `ruangan` DISABLE KEYS */;
INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
	(1, 'Kamar 1'),
	(3, 'Kamar 2'),
	(4, 'Kamar 3');
/*!40000 ALTER TABLE `ruangan` ENABLE KEYS */;

-- Dumping structure for trigger hospitalmanagement.beliobat
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `beliobat` AFTER INSERT ON `resep` FOR EACH ROW BEGIN
	UPDATE obat
	SET stok = stok-NEW.jumlah
	WHERE obat.id_obat = NEW.id_obat;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
