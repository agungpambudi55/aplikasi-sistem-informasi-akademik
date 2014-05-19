-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2014 at 09:16 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aksesoris`
--

CREATE TABLE IF NOT EXISTS `tb_aksesoris` (
  `nama` varchar(100) NOT NULL,
  `ket1` varchar(100) NOT NULL,
  `ket2` varchar(100) NOT NULL,
  PRIMARY KEY (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aksesoris`
--

INSERT INTO `tb_aksesoris` (`nama`, `ket1`, `ket2`) VALUES
('kkm', '75', ''),
('paging', '10', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE IF NOT EXISTS `tb_berita` (
  `kode_berita` int(20) NOT NULL AUTO_INCREMENT,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kode` varchar(10) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`kode_berita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`kode_berita`, `tgl`, `kode`, `judul`, `isi`, `photo`) VALUES
(35, '2014-03-06 02:58:23', 'admin', 'Java 7, Platform Java Terbaru dari Oracle yang Menjanjikan 7 Keuntungan', 'Oracle baru saja mengumumkan peluncuran platform Java standard edition 7 (Java SE7). Mereka mengklaim bahwa Java terbaru ini akan memiliki berbagai kemudahan dibandingkan dengan versi-versi sebelumnya.\r\n\r\nDikatakan terdapat tujuh keuntungan Java SE7. Yang pertama adalah perubahan bahasa. Perubahan bahasa ini dikatakan Oracle dapat membantu pengembang untuk dapat lebih produkitf dan menghasilkan program dengan syntak yang sederhana sehingga dapat dengan mudah dimengerti.\r\n\r\nSelanjutnya adalah peningkatan bahasa pendukung dinamis, seperti Ruby, Phyton, dan Javascript. Dengan adanya bahasa pendukung tersebut dapat meningkatkan performance pada JVM.\r\n\r\nKetiga adalah multicore API baru yang membuat pengembang lebih mudah untuk mendekomposisi permasalahan menjadi beberapa bagian yang nantinya dapat dieksekusi secara paralel. Selain itu terdapat juga interface I/O yang lebih komprehensif, fitur jaringan dan kemananan baru, support terhadap internasionalisasi, termasuk unicode 6.0, dan yang terakhir adalah tersedia beberapa versi update librari.\r\n\r\nJava SE7 yang baru pertama kali ini dikembangkan oleh Oracle memiliki kompabilitas dengan versi sebelumnya. Sehingga para pengembang tak perlu susah-susah untuk beradaptasi.', '98788768687678.jpeg'),
(36, '2014-03-04 09:36:57', 'admin', 'Oracle Cloud Social Service', 'Oracle memperkenalkan jajaran produk dan inovasi teknologi cloud yang diklaimnya sebagai yang terlengkap. Salah satunya yang terbaru untuk social service-nya adalah Oracle Cloud Social Service.\r\n&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp\r\nSolusi bisnis ini memungkinkan perusahaan untuk berinteraksi dengan para pelanggannya dengan menggunakan beragam jalur sosial media secara komprehensif dan berarti. Contohnya perusahaan dapat melakukan kegiatan sosial marketing, commerce, pelayanan pelanggan dan kegiatan mendengarkan umpan balik. Selain itu, Oracle Cloud Social Service ini menyediakan solusi sosial media untuk membantu para karyawan agar bisa bekerja sama dengan lebih efektif.\r\n\r\nSolusi-solusi dalam platform ini antara lain Oracle Social Network, Oracle Social Data Service, Oracle Social Marketing and Engagement Service, dan Oracle Social Intelligence Service.\r\n\r\nSolusi Social Network tersebut dapat membangun kerjasama yang aman dan pembentukan jaringan sosial antar karyawan. Social Data Service akan membantu pengelolaan data dari jaringan sosial dan beragam sumber data dalam enterprise yang bertujuan memperkaya aplikasi penunjang bisnis utama. Social Marketing and Engagement Services akan membantu staf marketing untuk dapat membuat, mempublikasikan, memoderasi, mengelola, mengukur dan membuat laporan dari kegiatan social marketing mereka. Selain itu, Social Intelligence Service dari Oracle ini akan membantu menganalisa interaksi sosial media dan membantu divisi customer service serta sales untuk bisa berinteraksi dengan para pelanggan dan potensial pelanggan.', 'bns-20120229130214-oracle.jpg'),
(37, '2014-03-06 04:33:33', 'admin', 'Penyandang Sekolah Adiwiyata dan Sekolah Rujukan', 'Sekolah Adiwiyata ini didirikan tahun 1964 hasil prakarsa Pemerintah Daerah dan dunia usaha di Ponorogo untuk pertama pada saat itu disebut STM (Sekolah Teknologi Menengah) Persiapan Negeri Ponorogo. Secara resmi lembaga ini menjadi STM Negeri Ponorogo berdasarkan SK Menteri Pendidikan dan Kebudayaan nomor 148/Diprt/BI/66 tanggal 1 Pebruari 1966. Perubahan STM Negeri Ponorogo menjadi SMK Negeri 1 Jenangan berdasarkan SK Mendikbud nomor 036/0/1997 tanggal 7 Maret 1997. Sekolah Adiwiyata ini didirikan tahun 1964 hasil prakarsa Pemerintah Daerah dan dunia usaha di Ponorogo untuk pertama pada saat itu disebut STM (Sekolah Teknologi Menengah) Persiapan Negeri Ponorogo. Secara resmi lembaga ini menjadi STM Negeri Ponorogo berdasarkan SK Menteri Pendidikan dan Kebudayaan nomor 148/Diprt/BI/66 tanggal 1 Pebruari 1966. Perubahan STM Negeri Ponorogo menjadi SMK Negeri 1 Jenangan berdasarkan SK Mendikbud nomor 036/0/1997 tanggal 7 Maret 1997. Sekolah Adiwiyata ini didirikan tahun 1964 hasil prakarsa Pemerintah Daerah dan dunia usaha di Ponorogo untuk pertama pada saat itu disebut STM (Sekolah Teknologi Menengah) Persiapan Negeri Ponorogo. Secara resmi lembaga ini menjadi STM Negeri Ponorogo berdasarkan SK Menteri Pendidikan dan Kebudayaan nomor 148/Diprt/BI/66 tanggal 1 Pebruari 1966. Perubahan STM Negeri Ponorogo menjadi SMK Negeri 1 Jenangan berdasarkan SK Mendikbud nomor 036/0/1997 tanggal 7 Maret 1997. Sekolah Adiwiyata ini didirikan tahun 1964 hasil prakarsa Pemerintah Daerah dan dunia usaha di Ponorogo untuk pertama pada saat itu disebut STM (Sekolah Teknologi Menengah) Persiapan Negeri Ponorogo. Secara resmi lembaga ini menjadi STM Negeri Ponorogo berdasarkan SK Menteri Pendidikan dan Kebudayaan nomor 148/Diprt/BI/66 tanggal 1 Pebruari 1966. Perubahan STM Negeri Ponorogo menjadi SMK Negeri 1 Jenangan berdasarkan SK Mendikbud nomor 036/0/1997 tanggal 7 Maret 1997. Sekolah Adiwiyata ini didirikan tahun 1964 hasil prakarsa Pemerintah Daerah dan dunia usaha di Ponorogo untuk pertama pada saat itu disebut STM (Sekolah Teknologi Menengah) Persiapan Negeri Ponorogo. Secara resmi lembaga ini menjadi STM Negeri Ponorogo berdasarkan SK Menteri Pendidikan dan Kebudayaan nomor 148/Diprt/BI/66 tanggal 1 Pebruari 1966. Perubahan STM Negeri Ponorogo menjadi SMK Negeri 1 Jenangan berdasarkan SK Mendikbud nomor 036/0/1997 tanggal 7 Maret 1997.', '322352502201445.jpg'),
(38, '2014-03-06 06:12:35', 'admin', 'Penilaian Team Adiwiyata', 'Sekolah SMKN 1 Jenangan Ponorogo ini menjadi salah satu sekolah yang dinilai cocok sebagai sekolah adiwiyata karena mempunyai lahan hijau yang luas yang didirikan tahun 1964 hasil prakarsa Pemerintah Daerah dan dunia usaha di Ponorogo untuk pertama pada saat itu disebut STM (Sekolah Teknologi Menengah) Persiapan Negeri Ponorogo. Secara resmi lembaga ini menjadi STM Negeri Ponorogo berdasarkan SK Menteri Pendidikan dan Kebudayaan nomor 148/Diprt/BI/66 tanggal 1 Pebruari 1966. Perubahan STM Negeri Ponorogo menjadi SMK Negeri 1 Jenangan berdasarkan SK Mendikbud nomor 036/0/1997 tanggal 7 Maret 1997.  Sistem Informasi Akademik ini dirancang untuk mempermudah proses administrasi pada Sekolah Menengah Kejuruan (SMK) Negeri 1 Jenangan Ponorogo. Baik hal itu dalam penerimaan siswa baru maupun dalam pembuatan jadwal pelajaran, input nilai siswa dan penentuan kelas dari siswa baru yang baru mendaftar yang sudah diterima oleh sekolah.Perubahan STM Negeri Ponorogo menjadi SMK Negeri 1 Jenangan berdasarkan SK Mendikbud nomor 036/0/1997 tanggal 7 Maret 1997.  Sistem Informasi Akademik ini dirancang untuk mempermudah proses administrasi pada Sekolah Menengah Kejuruan (SMK) Negeri 1 Jenangan Ponorogo. Baik hal itu dalam penerimaan siswa baru maupun dalam pembuatan jadwal pelajaran, input nilai siswa dan penentuan kelas dari siswa baru yang baru mendaftar yang sudah diterima oleh sekolah. Sekolah Adiwiyata ini didirikan tahun 1964 hasil prakarsa Pemerintah Daerah dan dunia usaha di Ponorogo untuk pertama pada saat itu disebut STM (Sekolah Teknologi Menengah) Persiapan Negeri Ponorogo. Secara resmi lembaga ini menjadi STM Negeri Ponorogo berdasarkan SK Menteri Pendidikan dan Kebudayaan nomor 148/Diprt/BI/66 tanggal 1 Pebruari 1966. Perubahan STM Negeri Ponorogo menjadi SMK Negeri 1 Jenangan berdasarkan SK Mendikbud nomor 036/0/1997 tanggal 7 Maret 1997. ', '02152502201423224.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bidang`
--

CREATE TABLE IF NOT EXISTS `tb_bidang` (
  `kode_bidang` varchar(4) NOT NULL,
  `nama_bidang` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_bidang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bidang`
--

INSERT INTO `tb_bidang` (`kode_bidang`, `nama_bidang`) VALUES
('0001', 'Teknologi Informasi Dan Komunikasi'),
('0002', 'Teknologi Dan Rekayasa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE IF NOT EXISTS `tb_guru` (
  `kode_guru` int(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(18) CHARACTER SET latin1 NOT NULL,
  `nama_guru` varchar(50) CHARACTER SET latin1 NOT NULL,
  `kode_keahlian` varchar(4) CHARACTER SET latin1 NOT NULL,
  `alamat` text CHARACTER SET latin1 NOT NULL,
  `telpon` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `agama` varchar(10) CHARACTER SET latin1 NOT NULL,
  `jenis_kelamin` varchar(10) CHARACTER SET latin1 NOT NULL,
  `tmp_lahir` varchar(20) CHARACTER SET latin1 NOT NULL,
  `tgl_lahir` varchar(30) CHARACTER SET latin1 NOT NULL,
  `pendidikan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 NOT NULL,
  `photo` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`kode_guru`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=72 ;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`kode_guru`, `nip`, `nama_guru`, `kode_keahlian`, `alamat`, `telpon`, `agama`, `jenis_kelamin`, `tmp_lahir`, `tgl_lahir`, `pendidikan`, `status`, `photo`) VALUES
(64, '199298723897874687', 'Royyan Alfiyatu Zuhriyah', '07', 'Jl. Singobarong No.90 Siman Ponorogo', '085765173653', 'Islam', 'Perempuan', 'Ponorogo', '18-05-1974', 'S1 Teknik Informatika', 'Guru Tetap', '09033904032014img_9741.jpg'),
(62, '199876876283687576', 'Gunaryoko', '07', 'Jl. Mericon No.90 Singosaren Ponorogo', '085765173653', 'Islam', 'Laki-laki', 'Ponorogo', '08-05-1961', 'S1 Teknik Informatika', 'Guru Tetap', '09030804032014img_9721.jpg'),
(61, '199695151996105158', 'Dihin Muriyatmomo', '07', 'Jl. Raya Madiun-ponorogo No.20 Babadan Ponorogo', '085765173653', 'Islam', 'Perempuan', 'Ponorogo', '28-11-1967', 'S1 Teknik Informatika', 'Guru Tetap', '09032904032014img_9735.jpg'),
(65, '199538483486873648', 'Eko Hidayat Ridho', '03', 'Jl. Kebleduk No.39 Kebunsari Madiun', '085765173653', 'Islam', 'Laki-laki', 'Ponorogo', '10-05-1984', 'S1 Teknik Mesin', 'Guru Bantu', '03035606032014img_9728.jpg'),
(63, '199372837687648367', 'Bambang Suwarno', '07', 'Jl. Bunga No.23 Singosaren Ponorogo', '085765173653', 'Islam', 'Laki-laki', 'Ponorogo', '05-07-1961', 'S1 Pendidikan Teknik Informatika', 'Guru Tetap', '09030904032014img_9711.jpg'),
(60, '199695151996105150', 'Agung Pambudi', '07', 'Jl. Letj. S. Sukowati No. 49 Polorejo Babadan Ponorogo', '085765173653', 'Islam', 'Laki-laki', 'Ponorogo', '15-05-1977', 'S1 Teknik Informatika', 'Guru Tetap', '04032506032014img_9713.jpg'),
(66, '196879879879879879', 'Slamet Sugiarto', '07', 'Jl. Syuhada No.87 Ngunut Babadan Ponorogo', '085765173653', 'Islam', 'Laki-laki', 'Ponorogo', '25-07-1967', 'S1 Pendidikan Teknik Informatika', 'Guru Tetap', '09033704032014img_9717.jpg'),
(67, '199327878768346876', 'Rianto', '07', 'Jl. Sopoeruh No.80 Balong Ponorogo', '085765173653', 'Islam', 'Laki-laki', 'Ponorogo', '04-08-1967', 'S1 Pendidi', 'Guru Tetap', '09035904032014img_9727.jpg'),
(68, '198793879872938798', 'Tryas Anjarwati', '07', 'Jl. Sopoeruh No.80 Balong Ponorogo', '085765173653', 'Islam', 'Perempuan', 'Ponorogo', '15-12-1983', 'S1 Teknik Informatika', 'Guru Tetap', '09035304032014img_9743.jpg'),
(69, '199387682368768768', 'Agus Santoso', '03', 'Jl. Jaksa Agung No. 123 Ponorogo', '085765173653', 'Islam', 'Laki-laki', 'Ponorogo', '05-04-1960', 'S1 Pendidikan Teknik Mesin', 'Guru Tetap', '04030506032014img_9717.jpg'),
(70, '199387665789876578', 'Mahmud Sugini', '03', 'Jl. Jaksa Agung No. 123 Ponorogo', '085765173653', 'Islam', 'Laki-laki', 'Ponorogo', '03-03-1960', 'S1 Pendidikan Teknik Mesin', 'Guru Tetap', '09033104032014img_9730.jpg'),
(71, '119987289368274687', 'Faisal Anwar', '03', 'Jl. Jetis No. 38', '085765173653', 'Islam', 'Laki-laki', 'Ponorogo', '02-04-1966', 'S1 Teknik Mesin', 'Guru Tetap', '20034204032014img_9733.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru_sk`
--

CREATE TABLE IF NOT EXISTS `tb_guru_sk` (
  `kode_guru_sk` int(20) NOT NULL AUTO_INCREMENT,
  `kode_standar` int(20) NOT NULL,
  `kode_guru` int(20) NOT NULL,
  PRIMARY KEY (`kode_guru_sk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `tb_guru_sk`
--

INSERT INTO `tb_guru_sk` (`kode_guru_sk`, `kode_standar`, `kode_guru`) VALUES
(30, 39, 61),
(31, 19, 61),
(32, 40, 61),
(33, 29, 61),
(34, 30, 61),
(35, 26, 61),
(36, 20, 61),
(37, 21, 61),
(38, 36, 61),
(39, 28, 61),
(40, 35, 61),
(41, 27, 66),
(42, 34, 66),
(43, 19, 66),
(44, 24, 62),
(45, 25, 62),
(46, 38, 62),
(47, 23, 62),
(48, 29, 64),
(49, 30, 64),
(50, 40, 64),
(51, 20, 64),
(52, 21, 64),
(53, 31, 64),
(54, 28, 64),
(55, 32, 64),
(56, 32, 67),
(57, 34, 67),
(58, 33, 66),
(59, 23, 66),
(60, 38, 64),
(61, 24, 63),
(62, 24, 64),
(63, 24, 68),
(64, 25, 68),
(65, 26, 64),
(66, 26, 67),
(67, 36, 64),
(68, 26, 63),
(69, 20, 62),
(70, 27, 62),
(71, 19, 67),
(72, 40, 68),
(73, 28, 62),
(74, 28, 68),
(75, 32, 68),
(76, 32, 66),
(77, 33, 64);

-- --------------------------------------------------------

--
-- Table structure for table `tb_keahlian`
--

CREATE TABLE IF NOT EXISTS `tb_keahlian` (
  `kode_keahlian` varchar(2) CHARACTER SET latin1 NOT NULL,
  `kode_prodi` varchar(3) CHARACTER SET latin1 NOT NULL,
  `nama_keahlian` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`kode_keahlian`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_keahlian`
--

INSERT INTO `tb_keahlian` (`kode_keahlian`, `kode_prodi`, `nama_keahlian`) VALUES
('03', '222', 'Teknik Pemesinan'),
('01', '242', 'Teknik Konstruksi Kayu'),
('02', '242', 'Gambar Bangunan'),
('04', '212', 'Teknik Elektronika Industri'),
('05', '222', 'Teknik Pengelasan'),
('06', '262', 'Teknik Sepeda Motor'),
('07', '252', 'Rekayasa Perangkat Lunak'),
('08', '232', 'Teknik Otomasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `kode_kelas` int(20) NOT NULL AUTO_INCREMENT,
  `kode_keahlian` varchar(2) NOT NULL,
  `nama_kelas` varchar(1) NOT NULL,
  PRIMARY KEY (`kode_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`kode_kelas`, `kode_keahlian`, `nama_kelas`) VALUES
(18, '07', 'A'),
(19, '07', 'B'),
(20, '02', 'A'),
(21, '02', 'B'),
(22, '03', 'A'),
(23, '03', 'B'),
(24, '03', 'C'),
(25, '03', 'D'),
(26, '05', 'A'),
(27, '01', 'A'),
(28, '06', 'A'),
(29, '04', 'A'),
(30, '04', 'B'),
(31, '04', 'C'),
(32, '08', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas_siswa`
--

CREATE TABLE IF NOT EXISTS `tb_kelas_siswa` (
  `kode_kelas_siswa` int(20) NOT NULL AUTO_INCREMENT,
  `kode_keahlian` varchar(2) NOT NULL,
  `kode_siswa` int(20) NOT NULL,
  `kode_kelas` int(20) NOT NULL,
  `tahun_masuk` varchar(4) NOT NULL,
  PRIMARY KEY (`kode_kelas_siswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `tb_kelas_siswa`
--

INSERT INTO `tb_kelas_siswa` (`kode_kelas_siswa`, `kode_keahlian`, `kode_siswa`, `kode_kelas`, `tahun_masuk`) VALUES
(21, '07', 37, 18, '2011'),
(22, '07', 47, 18, '2011'),
(23, '07', 39, 18, '2011'),
(24, '07', 40, 18, '2011'),
(25, '07', 38, 18, '2011'),
(26, '07', 41, 18, '2011'),
(27, '07', 36, 18, '2011'),
(28, '07', 42, 18, '2011'),
(29, '07', 49, 18, '2011'),
(30, '07', 43, 18, '2011'),
(31, '07', 61, 18, '2011'),
(32, '07', 56, 18, '2011'),
(33, '07', 48, 18, '2011'),
(34, '07', 50, 18, '2011'),
(35, '07', 62, 18, '2011'),
(36, '07', 44, 19, '2011'),
(37, '07', 55, 19, '2011'),
(38, '07', 67, 19, '2011'),
(39, '07', 65, 19, '2011'),
(40, '07', 66, 19, '2011'),
(41, '02', 64, 20, '2011'),
(42, '02', 45, 20, '2011'),
(43, '02', 57, 20, '2011'),
(44, '02', 58, 21, '2011'),
(45, '02', 63, 21, '2011'),
(46, '02', 59, 21, '2011');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE IF NOT EXISTS `tb_nilai` (
  `kode_nilai` int(20) NOT NULL AUTO_INCREMENT,
  `kode_siswa` int(20) NOT NULL,
  `kode_kelas` int(20) NOT NULL,
  `kode_standar` int(20) NOT NULL,
  `nilai_angka` int(3) NOT NULL,
  `nilai_huruf` varchar(30) NOT NULL,
  PRIMARY KEY (`kode_nilai`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=306 ;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`kode_nilai`, `kode_siswa`, `kode_kelas`, `kode_standar`, `nilai_angka`, `nilai_huruf`) VALUES
(1, 37, 18, 19, 78, 'Tujuh Puluh Delapan        '),
(2, 47, 18, 19, 90, 'Sembilan Puluh        '),
(3, 39, 18, 19, 82, 'Delapan Puluh Dua        '),
(4, 40, 18, 19, 83, 'Delapan Puluh Tiga        '),
(5, 38, 18, 19, 90, 'Sembilan Puluh        '),
(6, 41, 18, 19, 92, 'Sembilan Puluh Dua        '),
(7, 36, 18, 19, 88, 'Delapan Puluh Delapan        '),
(8, 42, 18, 19, 86, 'Delapan Puluh Enam        '),
(9, 49, 18, 19, 83, 'Delapan Puluh Tiga        '),
(10, 43, 18, 19, 97, 'Sembilan Puluh Tujuh        '),
(11, 61, 18, 19, 91, 'Sembilan Puluh Satu       '),
(12, 56, 18, 19, 85, 'Delapan Puluh Lima        '),
(13, 48, 18, 19, 92, 'Sembilan Puluh Dua        '),
(14, 50, 18, 19, 87, 'Delapan Puluh Tujuh        '),
(15, 62, 18, 19, 90, 'Sembilan Puluh        '),
(16, 37, 18, 20, 90, 'Sembilan Puluh        '),
(17, 47, 18, 20, 86, 'Delapan Puluh Enam        '),
(18, 39, 18, 20, 87, 'Delapan Puluh Tujuh        '),
(19, 40, 18, 20, 80, 'Delapan Puluh        '),
(20, 38, 18, 20, 92, 'Sembilan Puluh Dua        '),
(21, 41, 18, 20, 79, 'Tujuh Puluh Sembilan        '),
(22, 36, 18, 20, 87, 'Delapan Puluh Tujuh        '),
(23, 42, 18, 20, 84, 'Delapan Puluh Empat        '),
(24, 49, 18, 20, 87, 'Delapan Puluh Tujuh        '),
(25, 43, 18, 20, 89, 'Delapan Puluh Sembilan        '),
(26, 61, 18, 20, 90, 'Sembilan Puluh        '),
(27, 56, 18, 20, 79, 'Tujuh Puluh Sembilan        '),
(28, 48, 18, 20, 98, 'Sembilan Puluh Delapan        '),
(29, 50, 18, 20, 79, 'Tujuh Puluh Sembilan        '),
(30, 62, 18, 20, 90, 'Sembilan Puluh        '),
(31, 37, 18, 21, 87, 'Delapan Puluh Tujuh        '),
(32, 47, 18, 21, 90, 'Sembilan Puluh        '),
(33, 39, 18, 21, 93, 'Sembilan Puluh Tiga        '),
(34, 40, 18, 21, 87, 'Delapan Puluh Tujuh        '),
(35, 38, 18, 21, 84, 'Delapan Puluh Empat        '),
(36, 41, 18, 21, 90, 'Sembilan Puluh        '),
(37, 36, 18, 21, 95, 'Sembilan Puluh Lima        '),
(38, 42, 18, 21, 85, 'Delapan Puluh Lima        '),
(39, 49, 18, 21, 90, 'Sembilan Puluh        '),
(40, 43, 18, 21, 85, 'Delapan Puluh Lima        '),
(41, 61, 18, 21, 96, 'Sembilan Puluh Enam        '),
(42, 56, 18, 21, 87, 'Delapan Puluh Tujuh        '),
(43, 48, 18, 21, 98, 'Sembilan Puluh Delapan        '),
(44, 50, 18, 21, 79, 'Tujuh Puluh Sembilan        '),
(45, 62, 18, 21, 80, 'Delapan Puluh        '),
(46, 37, 18, 24, 80, 'Delapan Puluh        '),
(47, 47, 18, 24, 95, 'Sembilan Puluh Lima        '),
(48, 39, 18, 24, 90, 'Sembilan Puluh        '),
(49, 40, 18, 24, 95, 'Sembilan Puluh Lima        '),
(50, 38, 18, 24, 98, 'Sembilan Puluh Delapan        '),
(51, 41, 18, 24, 96, 'Sembilan Puluh Enam        '),
(52, 36, 18, 24, 80, 'Delapan Puluh        '),
(53, 42, 18, 24, 85, 'Delapan Puluh Lima        '),
(54, 49, 18, 24, 96, 'Sembilan Puluh Enam        '),
(55, 43, 18, 24, 96, 'Sembilan Puluh Enam        '),
(56, 61, 18, 24, 88, 'Delapan Puluh Delapan        '),
(57, 56, 18, 24, 89, 'Delapan Puluh Sembilan        '),
(58, 48, 18, 24, 87, 'Delapan Puluh Tujuh        '),
(59, 50, 18, 24, 89, 'Delapan Puluh Sembilan        '),
(60, 62, 18, 24, 90, 'Sembilan Puluh        '),
(61, 37, 18, 25, 80, 'Delapan Puluh        '),
(62, 47, 18, 25, 82, 'Delapan Puluh Dua        '),
(63, 39, 18, 25, 87, 'Delapan Puluh Tujuh        '),
(64, 40, 18, 25, 80, 'Delapan Puluh        '),
(65, 38, 18, 25, 92, 'Sembilan Puluh Dua        '),
(66, 41, 18, 25, 91, 'Sembilan Puluh Satu       '),
(67, 36, 18, 25, 83, 'Delapan Puluh Tiga        '),
(68, 42, 18, 25, 90, 'Sembilan Puluh        '),
(69, 49, 18, 25, 80, 'Delapan Puluh        '),
(70, 43, 18, 25, 86, 'Delapan Puluh Enam        '),
(71, 61, 18, 25, 82, 'Delapan Puluh Dua        '),
(72, 56, 18, 25, 91, 'Sembilan Puluh Satu       '),
(73, 48, 18, 25, 93, 'Sembilan Puluh Tiga        '),
(74, 50, 18, 25, 90, 'Sembilan Puluh        '),
(75, 62, 18, 25, 89, 'Delapan Puluh Sembilan        '),
(76, 37, 18, 26, 80, 'Delapan Puluh        '),
(77, 47, 18, 26, 85, 'Delapan Puluh Lima        '),
(78, 39, 18, 26, 95, 'Sembilan Puluh Lima        '),
(79, 40, 18, 26, 90, 'Sembilan Puluh        '),
(80, 38, 18, 26, 96, 'Sembilan Puluh Enam        '),
(81, 41, 18, 26, 90, 'Sembilan Puluh        '),
(82, 36, 18, 26, 92, 'Sembilan Puluh Dua        '),
(83, 42, 18, 26, 86, 'Delapan Puluh Enam        '),
(84, 49, 18, 26, 89, 'Delapan Puluh Sembilan        '),
(85, 43, 18, 26, 98, 'Sembilan Puluh Delapan        '),
(86, 61, 18, 26, 86, 'Delapan Puluh Enam        '),
(87, 56, 18, 26, 90, 'Sembilan Puluh        '),
(88, 48, 18, 26, 85, 'Delapan Puluh Lima        '),
(89, 50, 18, 26, 90, 'Sembilan Puluh        '),
(90, 62, 18, 26, 96, 'Sembilan Puluh Enam        '),
(91, 37, 18, 27, 80, 'Delapan Puluh        '),
(92, 47, 18, 27, 98, 'Sembilan Puluh Delapan        '),
(93, 39, 18, 27, 90, 'Sembilan Puluh        '),
(94, 40, 18, 27, 89, 'Delapan Puluh Sembilan        '),
(95, 38, 18, 27, 89, 'Delapan Puluh Sembilan        '),
(96, 41, 18, 27, 79, 'Tujuh Puluh Sembilan        '),
(97, 36, 18, 27, 91, 'Sembilan Puluh Satu       '),
(98, 42, 18, 27, 85, 'Delapan Puluh Lima        '),
(99, 49, 18, 27, 83, 'Delapan Puluh Tiga        '),
(100, 43, 18, 27, 89, 'Delapan Puluh Sembilan        '),
(101, 61, 18, 27, 98, 'Sembilan Puluh Delapan        '),
(102, 56, 18, 27, 90, 'Sembilan Puluh        '),
(103, 48, 18, 27, 98, 'Sembilan Puluh Delapan        '),
(104, 50, 18, 27, 92, 'Sembilan Puluh Dua        '),
(105, 62, 18, 27, 83, 'Delapan Puluh Tiga        '),
(106, 37, 18, 29, 80, 'Delapan Puluh        '),
(107, 47, 18, 29, 90, 'Sembilan Puluh        '),
(108, 39, 18, 29, 95, 'Sembilan Puluh Lima        '),
(109, 40, 18, 29, 89, 'Delapan Puluh Sembilan        '),
(110, 38, 18, 29, 87, 'Delapan Puluh Tujuh        '),
(111, 41, 18, 29, 86, 'Delapan Puluh Enam        '),
(112, 36, 18, 29, 85, 'Delapan Puluh Lima        '),
(113, 42, 18, 29, 80, 'Delapan Puluh        '),
(114, 49, 18, 29, 82, 'Delapan Puluh Dua        '),
(115, 43, 18, 29, 90, 'Sembilan Puluh        '),
(116, 61, 18, 29, 95, 'Sembilan Puluh Lima        '),
(117, 56, 18, 29, 80, 'Delapan Puluh        '),
(118, 48, 18, 29, 87, 'Delapan Puluh Tujuh        '),
(119, 50, 18, 29, 90, 'Sembilan Puluh        '),
(120, 62, 18, 29, 98, 'Sembilan Puluh Delapan        '),
(121, 37, 18, 30, 81, 'Delapan Puluh Satu       '),
(122, 47, 18, 30, 83, 'Delapan Puluh Tiga        '),
(123, 39, 18, 30, 90, 'Sembilan Puluh        '),
(124, 40, 18, 30, 98, 'Sembilan Puluh Delapan        '),
(125, 38, 18, 30, 90, 'Sembilan Puluh        '),
(126, 41, 18, 30, 93, 'Sembilan Puluh Tiga        '),
(127, 36, 18, 30, 85, 'Delapan Puluh Lima        '),
(128, 42, 18, 30, 89, 'Delapan Puluh Sembilan        '),
(129, 49, 18, 30, 86, 'Delapan Puluh Enam        '),
(130, 43, 18, 30, 89, 'Delapan Puluh Sembilan        '),
(131, 61, 18, 30, 90, 'Sembilan Puluh        '),
(132, 56, 18, 30, 97, 'Sembilan Puluh Tujuh        '),
(133, 48, 18, 30, 80, 'Delapan Puluh        '),
(134, 50, 18, 30, 89, 'Delapan Puluh Sembilan        '),
(135, 62, 18, 30, 80, 'Delapan Puluh        '),
(136, 37, 18, 28, 90, 'Sembilan Puluh        '),
(137, 47, 18, 28, 82, 'Delapan Puluh Dua        '),
(138, 39, 18, 28, 80, 'Delapan Puluh        '),
(139, 40, 18, 28, 86, 'Delapan Puluh Enam        '),
(140, 38, 18, 28, 80, 'Delapan Puluh        '),
(141, 41, 18, 28, 84, 'Delapan Puluh Empat        '),
(142, 36, 18, 28, 90, 'Sembilan Puluh        '),
(143, 42, 18, 28, 85, 'Delapan Puluh Lima        '),
(144, 49, 18, 28, 93, 'Sembilan Puluh Tiga        '),
(145, 43, 18, 28, 90, 'Sembilan Puluh        '),
(146, 61, 18, 28, 89, 'Delapan Puluh Sembilan        '),
(147, 56, 18, 28, 90, 'Sembilan Puluh        '),
(148, 48, 18, 28, 98, 'Sembilan Puluh Delapan        '),
(149, 50, 18, 28, 92, 'Sembilan Puluh Dua        '),
(150, 62, 18, 28, 80, 'Delapan Puluh        '),
(151, 37, 18, 32, 90, 'Sembilan Puluh        '),
(152, 47, 18, 32, 89, 'Delapan Puluh Sembilan        '),
(153, 39, 18, 32, 97, 'Sembilan Puluh Tujuh        '),
(154, 40, 18, 32, 80, 'Delapan Puluh        '),
(155, 38, 18, 32, 79, 'Tujuh Puluh Sembilan        '),
(156, 41, 18, 32, 90, 'Sembilan Puluh        '),
(157, 36, 18, 32, 87, 'Delapan Puluh Tujuh        '),
(158, 42, 18, 32, 89, 'Delapan Puluh Sembilan        '),
(159, 49, 18, 32, 87, 'Delapan Puluh Tujuh        '),
(160, 43, 18, 32, 89, 'Delapan Puluh Sembilan        '),
(161, 61, 18, 32, 79, 'Tujuh Puluh Sembilan        '),
(162, 56, 18, 32, 80, 'Delapan Puluh        '),
(163, 48, 18, 32, 85, 'Delapan Puluh Lima        '),
(164, 50, 18, 32, 83, 'Delapan Puluh Tiga        '),
(165, 62, 18, 32, 89, 'Delapan Puluh Sembilan        '),
(166, 37, 18, 40, 90, 'Sembilan Puluh        '),
(167, 47, 18, 40, 80, 'Delapan Puluh        '),
(168, 39, 18, 40, 90, 'Sembilan Puluh        '),
(169, 40, 18, 40, 80, 'Delapan Puluh        '),
(170, 38, 18, 40, 90, 'Sembilan Puluh        '),
(171, 41, 18, 40, 80, 'Delapan Puluh        '),
(172, 36, 18, 40, 90, 'Sembilan Puluh        '),
(173, 42, 18, 40, 80, 'Delapan Puluh        '),
(174, 49, 18, 40, 90, 'Sembilan Puluh        '),
(175, 43, 18, 40, 80, 'Delapan Puluh        '),
(176, 61, 18, 40, 90, 'Sembilan Puluh        '),
(177, 56, 18, 40, 80, 'Delapan Puluh        '),
(178, 48, 18, 40, 90, 'Sembilan Puluh        '),
(179, 50, 18, 40, 80, 'Delapan Puluh        '),
(180, 62, 18, 40, 90, 'Sembilan Puluh        '),
(181, 37, 18, 39, 88, 'Delapan Puluh Delapan        '),
(182, 47, 18, 39, 87, 'Delapan Puluh Tujuh        '),
(183, 39, 18, 39, 89, 'Delapan Puluh Sembilan        '),
(184, 40, 18, 39, 87, 'Delapan Puluh Tujuh        '),
(185, 38, 18, 39, 96, 'Sembilan Puluh Enam        '),
(186, 41, 18, 39, 87, 'Delapan Puluh Tujuh        '),
(187, 36, 18, 39, 79, 'Tujuh Puluh Sembilan        '),
(188, 42, 18, 39, 89, 'Delapan Puluh Sembilan        '),
(189, 49, 18, 39, 88, 'Delapan Puluh Delapan        '),
(190, 43, 18, 39, 77, 'Tujuh Puluh Tujuh        '),
(191, 61, 18, 39, 79, 'Tujuh Puluh Sembilan        '),
(192, 56, 18, 39, 87, 'Delapan Puluh Tujuh        '),
(193, 48, 18, 39, 87, 'Delapan Puluh Tujuh        '),
(194, 50, 18, 39, 99, 'Sembilan Puluh Sembilan       '),
(195, 62, 18, 39, 89, 'Delapan Puluh Sembilan        '),
(196, 37, 18, 36, 89, 'Delapan Puluh Sembilan        '),
(197, 47, 18, 36, 85, 'Delapan Puluh Lima        '),
(198, 39, 18, 36, 85, 'Delapan Puluh Lima        '),
(199, 40, 18, 36, 96, 'Sembilan Puluh Enam        '),
(200, 38, 18, 36, 82, 'Delapan Puluh Dua        '),
(201, 41, 18, 36, 84, 'Delapan Puluh Empat        '),
(202, 36, 18, 36, 86, 'Delapan Puluh Enam        '),
(203, 42, 18, 36, 83, 'Delapan Puluh Tiga        '),
(204, 49, 18, 36, 84, 'Delapan Puluh Empat        '),
(205, 43, 18, 36, 82, 'Delapan Puluh Dua        '),
(206, 61, 18, 36, 86, 'Delapan Puluh Enam        '),
(207, 56, 18, 36, 96, 'Sembilan Puluh Enam        '),
(208, 48, 18, 36, 84, 'Delapan Puluh Empat        '),
(209, 50, 18, 36, 86, 'Delapan Puluh Enam        '),
(210, 62, 18, 36, 85, 'Delapan Puluh Lima        '),
(211, 37, 18, 35, 80, 'Delapan Puluh        '),
(212, 47, 18, 35, 86, 'Delapan Puluh Enam        '),
(213, 39, 18, 35, 87, 'Delapan Puluh Tujuh        '),
(214, 40, 18, 35, 89, 'Delapan Puluh Sembilan        '),
(215, 38, 18, 35, 89, 'Delapan Puluh Sembilan        '),
(216, 41, 18, 35, 81, 'Delapan Puluh Satu       '),
(217, 36, 18, 35, 85, 'Delapan Puluh Lima        '),
(218, 42, 18, 35, 86, 'Delapan Puluh Enam        '),
(219, 49, 18, 35, 95, 'Sembilan Puluh Lima        '),
(220, 43, 18, 35, 85, 'Delapan Puluh Lima        '),
(221, 61, 18, 35, 93, 'Sembilan Puluh Tiga        '),
(222, 56, 18, 35, 95, 'Sembilan Puluh Lima        '),
(223, 48, 18, 35, 89, 'Delapan Puluh Sembilan        '),
(224, 50, 18, 35, 79, 'Tujuh Puluh Sembilan        '),
(225, 62, 18, 35, 89, 'Delapan Puluh Sembilan        '),
(226, 37, 18, 37, 89, 'Delapan Puluh Sembilan        '),
(227, 47, 18, 37, 79, 'Tujuh Puluh Sembilan        '),
(228, 39, 18, 37, 86, 'Delapan Puluh Enam        '),
(229, 40, 18, 37, 81, 'Delapan Puluh Satu       '),
(230, 38, 18, 37, 96, 'Sembilan Puluh Enam        '),
(231, 41, 18, 37, 86, 'Delapan Puluh Enam        '),
(232, 36, 18, 37, 79, 'Tujuh Puluh Sembilan        '),
(233, 42, 18, 37, 86, 'Delapan Puluh Enam        '),
(234, 49, 18, 37, 76, 'Tujuh Puluh Enam        '),
(235, 43, 18, 37, 80, 'Delapan Puluh        '),
(236, 61, 18, 37, 79, 'Tujuh Puluh Sembilan        '),
(237, 56, 18, 37, 88, 'Delapan Puluh Delapan        '),
(238, 48, 18, 37, 96, 'Sembilan Puluh Enam        '),
(239, 50, 18, 37, 78, 'Tujuh Puluh Delapan        '),
(240, 62, 18, 37, 85, 'Delapan Puluh Lima        '),
(241, 37, 18, 33, 89, 'Delapan Puluh Sembilan        '),
(242, 47, 18, 33, 85, 'Delapan Puluh Lima        '),
(243, 39, 18, 33, 85, 'Delapan Puluh Lima        '),
(244, 40, 18, 33, 96, 'Sembilan Puluh Enam        '),
(245, 38, 18, 33, 84, 'Delapan Puluh Empat        '),
(246, 41, 18, 33, 86, 'Delapan Puluh Enam        '),
(247, 36, 18, 33, 96, 'Sembilan Puluh Enam        '),
(248, 42, 18, 33, 79, 'Tujuh Puluh Sembilan        '),
(249, 49, 18, 33, 89, 'Delapan Puluh Sembilan        '),
(250, 43, 18, 33, 86, 'Delapan Puluh Enam        '),
(251, 61, 18, 33, 81, 'Delapan Puluh Satu       '),
(252, 56, 18, 33, 82, 'Delapan Puluh Dua        '),
(253, 48, 18, 33, 83, 'Delapan Puluh Tiga        '),
(254, 50, 18, 33, 79, 'Tujuh Puluh Sembilan        '),
(255, 62, 18, 33, 89, 'Delapan Puluh Sembilan        '),
(256, 37, 18, 134, 89, 'Delapan Puluh Sembilan        '),
(257, 47, 18, 134, 85, 'Delapan Puluh Lima        '),
(258, 39, 18, 134, 85, 'Delapan Puluh Lima        '),
(259, 40, 18, 134, 84, 'Delapan Puluh Empat        '),
(260, 38, 18, 134, 85, 'Delapan Puluh Lima        '),
(261, 41, 18, 134, 86, 'Delapan Puluh Enam        '),
(262, 36, 18, 134, 85, 'Delapan Puluh Lima        '),
(263, 42, 18, 134, 81, 'Delapan Puluh Satu       '),
(264, 49, 18, 134, 82, 'Delapan Puluh Dua        '),
(265, 43, 18, 134, 83, 'Delapan Puluh Tiga        '),
(266, 61, 18, 134, 86, 'Delapan Puluh Enam        '),
(267, 56, 18, 134, 90, 'Sembilan Puluh        '),
(268, 48, 18, 134, 79, 'Tujuh Puluh Sembilan        '),
(269, 50, 18, 134, 84, 'Delapan Puluh Empat        '),
(270, 62, 18, 134, 97, 'Sembilan Puluh Tujuh        '),
(271, 37, 18, 34, 89, 'Delapan Puluh Sembilan        '),
(272, 47, 18, 34, 91, 'Sembilan Puluh Satu       '),
(273, 39, 18, 34, 92, 'Sembilan Puluh Dua        '),
(274, 40, 18, 34, 89, 'Delapan Puluh Sembilan        '),
(275, 38, 18, 34, 85, 'Delapan Puluh Lima        '),
(276, 41, 18, 34, 82, 'Delapan Puluh Dua        '),
(277, 36, 18, 34, 95, 'Sembilan Puluh Lima        '),
(278, 42, 18, 34, 87, 'Delapan Puluh Tujuh        '),
(279, 49, 18, 34, 81, 'Delapan Puluh Satu       '),
(280, 43, 18, 34, 86, 'Delapan Puluh Enam        '),
(281, 61, 18, 34, 87, 'Delapan Puluh Tujuh        '),
(282, 56, 18, 34, 82, 'Delapan Puluh Dua        '),
(283, 48, 18, 34, 86, 'Delapan Puluh Enam        '),
(284, 50, 18, 34, 89, 'Delapan Puluh Sembilan        '),
(285, 62, 18, 34, 90, 'Sembilan Puluh        '),
(286, 44, 19, 19, 89, 'Delapan Puluh Sembilan        '),
(287, 55, 19, 19, 88, 'Delapan Puluh Delapan        '),
(288, 67, 19, 19, 95, 'Sembilan Puluh Lima        '),
(289, 65, 19, 19, 90, 'Sembilan Puluh        '),
(290, 66, 19, 19, 89, 'Delapan Puluh Sembilan        '),
(291, 47, 18, 41, 54, 'Lima Puluh Empat        '),
(292, 39, 18, 41, 55, 'Lima Puluh Lima        '),
(293, 40, 18, 41, 64, 'Enam Puluh Empat        '),
(294, 38, 18, 41, 65, 'Enam Puluh Lima        '),
(295, 41, 18, 41, 54, 'Lima Puluh Empat        '),
(296, 36, 18, 41, 54, 'Lima Puluh Empat        '),
(297, 42, 18, 41, 46, 'Empat Puluh Enam        '),
(298, 49, 18, 41, 54, 'Lima Puluh Empat        '),
(299, 43, 18, 41, 78, 'Tujuh Puluh Delapan        '),
(300, 61, 18, 41, 78, 'Tujuh Puluh Delapan        '),
(301, 56, 18, 41, 89, 'Delapan Puluh Sembilan        '),
(302, 48, 18, 41, 89, 'Delapan Puluh Sembilan        '),
(303, 50, 18, 41, 74, 'Tujuh Puluh Empat        '),
(304, 62, 18, 41, 63, 'Enam Puluh Tiga        '),
(305, 37, 18, 41, 89, 'Delapan Puluh Sembilan        ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE IF NOT EXISTS `tb_pengguna` (
  `kode` varchar(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'o',
  `akses` int(1) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`kode`, `nama`, `password`, `status`, `akses`) VALUES
('admin', 'Administrator', '0cc175b9c0f1b6a831c399e269772661', '1', 1),
('agung', 'Agung Pambudi', 'e59cd3ce33a68f536c19fedb82a7936f', '1', 2),
('acer', 'Acer Aspire 4930', 'e4721cdedd884feed88dc9079863c278', '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE IF NOT EXISTS `tb_prodi` (
  `kode_prodi` varchar(3) NOT NULL,
  `kode_bidang` varchar(4) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_prodi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`kode_prodi`, `kode_bidang`, `nama_prodi`) VALUES
('212', '0002', 'Teknik Elektronika'),
('222', '0002', 'Teknik Mesin'),
('232', '0002', 'Teknik Ketenagalistrikan'),
('242', '0002', 'Teknik Bangunan'),
('252', '0001', 'Teknik Komputer Dan Informatika'),
('262', '0002', 'Teknik Otomotif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE IF NOT EXISTS `tb_siswa` (
  `kode_siswa` int(20) NOT NULL AUTO_INCREMENT,
  `kode_keahlian` varchar(2) CHARACTER SET latin1 NOT NULL,
  `nisn` varchar(10) CHARACTER SET latin1 NOT NULL,
  `nis` varchar(15) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 NOT NULL,
  `alamat` text CHARACTER SET latin1 NOT NULL,
  `tmp_lahir` varchar(20) CHARACTER SET latin1 NOT NULL,
  `tgl_lahir` varchar(20) CHARACTER SET latin1 NOT NULL,
  `jenis_kelamin` varchar(10) CHARACTER SET latin1 NOT NULL,
  `telpon` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `sekolah_nama` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sekolah_alamat` text CHARACTER SET latin1 NOT NULL,
  `ijasah_tahun` year(4) NOT NULL,
  `ijasah_no` varchar(20) CHARACTER SET latin1 NOT NULL,
  `tgl_masuk` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `photo` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`kode_siswa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=68 ;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`kode_siswa`, `kode_keahlian`, `nisn`, `nis`, `nama`, `alamat`, `tmp_lahir`, `tgl_lahir`, `jenis_kelamin`, `telpon`, `sekolah_nama`, `sekolah_alamat`, `ijasah_tahun`, `ijasah_no`, `tgl_masuk`, `photo`) VALUES
(36, '07', '9983823687', '14835/252.070', 'Akbar Yusrofi', 'Jl. Merbabu No.49  Ponorogo', 'Ponorogo', '19-09-1995', 'Laki-laki', '085912768176', 'SMPN 1 Ponorogo', 'Jl. Soekarno-Hatta No. 100 Ponorogo', 2011, 'SMPn 9823938', '11-07-2011', '11024825022014e02.png'),
(38, '07', '9823986787', '14831/252.070', 'Ahmad Zainal Abidin', 'Jl. Mayak No.27 Ponorogo', 'Ponorogo', '02-08-1995', 'Laki-laki', '085827368263', 'MTs Mayak', 'jl. mayak no.27 ponorogo', 2011, 'MTs 0823938', '11-07-2011', '23025524022014h01.png'),
(37, '07', '9187983726', '14832/252.070', 'Ade Maulina Rosa', 'Jl. Merbabu No. 90 Ponorogo', 'Ponorogo', '18-07-1995', 'Perempuan', '085283678237', 'SMPN 1 Ponorogo', 'Jl. Soekarno-Hatta No. 100 Ponorogo', 2011, 'SMPN 93279238', '11-07-2011', '22033804032014m04.png'),
(39, '07', '9237976287', '14839/252.070', 'Adhitya Bagus Setyadharma', 'Jl. Acer Aspire No.49 Tonanatan Ponorogo', 'Ponorogo', '12-06-1996', 'Laki-laki', '082938987293', 'SMPN 1 Ponorogo', 'Jl. Soekarno-Hatta No. 100 Ponorogo', 2011, 'SMPN 93279230', '11-07-2011', '00021525022014i05.png'),
(40, '07', '9983823680', '14876/252.070', 'Agung Pambudi', 'Jl. Letj. S. Sukowati No.49 Babadan Ponorogo', 'Ponorogo', '02-02-1995', 'Laki-laki', '085826387682', 'Agung Pambudi', 'Jl. letj. s. sukowati no.49 babadan ponorogo', 2011, 'MTs 9823938', '11-07-2011', '14035904032014f05.png'),
(42, '07', '9129879837', '14810/252.070', 'Alfin Maulana Firki', 'Jl. Teh Japan Jenangan Ponorogo', 'Ponorogo', '15-06-1995', 'Laki-laki', '085283678237', 'MtsN Ponorogo', 'Jl. Setono No. 90 Setono Jenangan Ponorogo', 2012, 'MTs 923987738', '11-07-2011', '13020425022014e02.png'),
(41, '07', '9872398723', '14809/252.070', 'Aji Tirta Ahyana', 'Jl. Letj. S. Sukowati No.88 Babadan Ponorogo', 'Ponorogo', '05-08-1995', 'Laki-laki', '085826387682', 'SMPN 1 Ponorogo', 'Jl. Soekarno-Hatta No. 100 Ponorogo', 2011, 'SMPN 93279238', '11-07-2011', '11021025022014a03.png'),
(43, '07', '9837972387', '14923/252.070', 'Anugrah Putri Nurmawati', 'Jl. Jaksa Agung No. 123 Ponorogo', 'Ponorogo', '05-05-1995', 'Perempuan', '085283768762', 'SMPN 1 Ponorogo', 'jl. soekarno-hatta no. 39', 2011, 'SMPN 98723978', '11-07-2011', '13024125022014m04.png'),
(44, '07', '9129879830', '14887/252.070', 'Eko Hidayat Ridlo', 'Jl. Letj. S. Sukowati No.49 Babadan Ponorogo', 'Ponorogo', '03-02-1995', 'Laki-laki', '081335872738', 'MtsN Ponorogo', 'jl. letj. s. sukowati no.90 babadan ponorogo', 2011, 'MTs 923987738', '11-07-2011', '18022925022014a05.png'),
(45, '02', '9982398723', '14867/252.070', 'Arumawati Sunarmi', 'Jl. Soekarno-hatta No. 39', 'Magetan', '08-04-1995', 'Perempuan', '085283678237', 'MtsN Ponorogo', 'jl. jaksa agung no. 123 ponorogo', 2011, 'MTs 923987738', '11-07-2011', '00022326022014b02.png'),
(48, '07', '9239879283', '14786/252.070', 'Chaidir Serunting Sakti', 'Jl. Setono No. 90 Setono Jenangan Ponorogo', 'Ponorogo', '02-02-1995', 'Laki-laki', '081335872738', 'SMPN 1 Ponorogo', 'jl. jaksa agung no. 123 ponorogo', 2011, 'MTs 923987738', '11-07-2011', '01024526022014b02.png'),
(47, '07', '9129879831', '14812/252.070', 'Ade Sunarmi', 'Jl. Jaksa Agung No. 123 Ponorogo', 'Ponorogo', '02-02-1995', 'Laki-laki', '085283678237', 'MtsN Ponorogo', 'Jl. Jaksa Agung No. 123 Ponorogo', 2011, 'MTs 923987738', '11-07-2011', '01021126022014b01.png'),
(49, '07', '9873987239', '14811/252.070', 'Anggi Sumani', 'Jl. Teh Japan Jenangan Ponorogo', 'Ponorogo', '02-07-1995', 'Laki-laki', '085826387682', 'MtsN Ponorogo', 'jl. jaksa agung no. 123 ponorogo', 2011, 'MTs 923987738', '11-07-2011', '17024926022014b03.png'),
(50, '07', '9129879838', '14818/252.070', 'Daniel Oloan Situmorang', 'Jl. Setono No. 90 Setono Jenangan Ponorogo', 'Ponorogo', '02-01-1995', 'Laki-laki', '085283678237', 'SMPN 1 Ponorogo', 'jl. jaksa agung no. 123 ponorogo', 2011, 'SMPN 98723978', '11-07-2011', '17022826022014h04.png'),
(51, '04', '9937928379', '14898/252.070', 'Bagiyo Sunoyo', 'Jl. Letj. S. Sukowati No.49 Babadan Ponorogo', 'Ponorogo', '02-02-1995', 'Laki-laki', '085283678237', 'SMPN 1 Ponorogo', 'jl. soekarno-hatta no. 39', 2011, 'SMPN 98723978', '11-07-2011', '17020226022014g02.png'),
(52, '04', '9128768376', '14889/252.070', 'Entis Sutisna', 'Jl. Soekarno-hatta No. 39', 'Ponorogo', '15-12-1995', 'Laki-laki', '082938987293', 'SMPN 2 Ponorogo', 'jl. jaksa agung no. 123 ponorogo', 2011, 'MTs 923987738', '11-07-2011', '17024926022014b02.png'),
(53, '04', '9129879836', '14819/252.070', 'Mudier Sunani', 'Jl. Teh Japan Jenangan Ponorogo', 'Ponorogo', '02-12-1995', 'Laki-laki', '012987923879', 'SMPN 2 Ponorogo', 'jl. setono no. 90 setono jenangan ponorogo', 2011, 'SMPN 98723978', '11-07-2011', '17020326022014e05.png'),
(54, '04', '9182798171', '14873/252.070', 'Febri Nurmawati', 'Jl. Letj. S. Sukowati No.49 Babadan Ponorogo', 'Magetan', '19-07-1995', 'Perempuan', '012987923879', 'SMPN 1 Ponorogo', 'jl. jaksa agung no. 123 ponorogo', 2011, 'MTs 923987738', '11-07-2011', '18025426022014h05.png'),
(55, '07', '9873928687', '14827/252.070', 'Ervan Nurdianto', 'Jl. Setono No. 90 Setono Jenangan Ponorogo', 'Ponorogo', '02-02-1995', 'Laki-laki', '085283678237', 'SMPN 1 Ponorogo', 'jl. jaksa agung no. 123 ponorogo', 2011, 'MTs 923987738', '11-07-2011', '18020626022014i02.png'),
(56, '07', '9128763872', '14880/252.070', 'Bagus Purwo Asmorodono', 'Jl. Soekarno-hatta No. 39', 'Magetan', '22-05-1995', 'Laki-laki', '012987923879', 'SMPN 1 Ponorogo', 'jl. jaksa agung no. 123 ponorogo', 2011, 'MTs 923987738', '11-07-2011', '18025326022014j03.png'),
(57, '02', '9182798172', '14813/252.070', 'Mahmud Sugini', 'Jl. Setono No. 90 Setono Jenangan Ponorogo', 'Ponorogo', '02-02-1995', 'Laki-laki', '012987923879', 'SMPN 1 Ponorogo', 'jl. jaksa agung no. 123 ponorogo', 2011, 'SMPN 98723978', '11-07-2011', '14030104032014c05.png'),
(58, '02', '9182798988', '14882/252.070', 'Muhammad Sugini', 'Jl. Teh Japan Jenangan Ponorogo', 'Magetan', '03-04-1995', 'Laki-laki', '081335872738', 'SMPN 2 Ponorogo', 'jl. setono no. 90 setono jenangan ponorogo', 2011, 'SMPN 98723978', '11-07-2011', '11022327022014a04.png'),
(59, '02', '9182792381', '14989/252.070', 'Zaenal Mustofa', 'Jl. Jaksa Agung No. 123 Ponorogo', 'Ponorogo', '02-06-1995', 'Laki-laki', '085283678237', 'SMPN 2 Ponorogo', 'jl. jaksa agung no. 123 ponorogo', 2011, 'SMPN 923987738', '11-07-2011', '11025227022014e03.png'),
(60, '04', '9198297987', '14890/252.070', 'Bella Angelinda', 'Jl. Jaksa Agung No. 123 Ponorogo', 'Ponorogo', '02-03-1995', 'Perempuan', '085283678237', 'SMPN 2 Ponorogo', 'jl. jaksa agung no. 123 ponorogo', 2011, 'SMPN 98723978', '11-07-2011', '11021427022014i01.png'),
(61, '07', '9182798239', '14092/252.070', 'Arfian Fahrul Rozaqi', 'Jl. Soekarno-hatta No. 39', 'Madiun', '25-06-1995', 'Laki-laki', '085283678237', 'MtsN Ponorogo', 'jl. teh japan jenangan ponorogo', 2011, 'MTs 923987738', '11-07-2011', '11025627022014a05.png'),
(62, '07', '9127861726', '14979/252.070', 'Dita Irmasari', 'Jl. Soekarno-hatta No. 39', 'Ponorogo', '02-02-1995', 'Perempuan', '085826387682', 'SMPN 2 Ponorogo', 'jl. setono no. 90 setono jenangan ponorogo', 2011, 'SMPN 98723978', '11-07-2011', '11025727022014m04.png'),
(63, '02', '9879872398', '13979/252.070', 'Youhanggi Sakti', 'Jl. Jaksa Agung No. 123 Ponorogo', 'Ponorogo', '02-03-1994', 'Perempuan', '085283678237', 'MtsN Ponorogo', 'jl. jaksa agung no. 123 ponorogo', 2011, 'SMPN 98723978', '11-07-2011', '11022327022014h04.png'),
(64, '02', '9823798798', '14888/252.070', 'Andre Stingki', 'Jl. Letj. S. Sukowati No. 97 Babadan Ponorogo', 'Ponorogo', '09-07-1995', 'Laki-laki', '085853352902', 'SMPN 1 Ponorogo', 'Jl. soekarno hatta no. 80', 2011, 'SMP 982398798', '11-07-2011', '14033104032014a05.png'),
(65, '07', '9187982379', '14892/252.070', 'Febri Akbar Velayati', 'Jl. Soekarno Hatta No. 80', 'Ponorogo', '03-04-1996', 'Laki-laki', '085989837928', 'SMPN 2 Ponorogo', 'Jl. Soekarno Hatta No. 80', 2011, 'SMP 982398798', '11-07-2011', '14034304032014l02.png'),
(66, '07', '9839287987', '14833/252.070', 'Febri Arimbi Ramadani', 'Jl. Soekarno Mlarak No. 80', 'Ponorogo', '04-05-1992', 'Perempuan', '085983298238', 'SMPN 4 Ponorogo', 'Jl. Letj. S. Sukowati No. 49 Polorejo Babadan Ponorogo', 2011, 'SMP 982398798', '11-07-2011', '14033004032014m04.png'),
(67, '07', '9192879872', '14029/252.070', 'Faruqi Rasyid', 'Jl. Soekarno Hatta No. 80', 'Ponorogo', '04-04-1994', 'Laki-laki', '085853352902', 'SMPN 1 Ponorogo', 'Jl. Soekarno Hatta No. 80', 2011, 'SMP 982398798', '11-07-2011', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_standar`
--

CREATE TABLE IF NOT EXISTS `tb_standar` (
  `kode_standar` int(15) NOT NULL AUTO_INCREMENT,
  `kode_keahlian` varchar(2) CHARACTER SET latin1 NOT NULL,
  `nama_standar` varchar(150) CHARACTER SET latin1 NOT NULL,
  `kelas` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`kode_standar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=135 ;

--
-- Dumping data for table `tb_standar`
--

INSERT INTO `tb_standar` (`kode_standar`, `kode_keahlian`, `nama_standar`, `kelas`) VALUES
(19, '07', 'Memahami teknik elekronika analog dan digital dasar', '10 Semester Ganjil'),
(20, '07', 'Menerapkan algoritma pemrograman tingkat dasar', '10 Semester Ganjil'),
(21, '07', 'Menerapkan algoritma pemrograman tingkat lanjut', '10 Semester Ganjil'),
(24, '07', 'Memahami Pemrograman Visual dengan SQL tingkat dasar', '10 Semester Genap'),
(25, '07', 'Memahami Pemrograman Visual dengan SQL tingkat lanjut', '10 Semester Genap'),
(26, '07', 'Membuat paket software aplikasi berbasis dekstop', '10 Semester Genap'),
(27, '07', 'Mengoperasikan sistem operasi jaringan komputer', '10 Semester Genap'),
(28, '07', 'Menguasai dasar-dasar pembuatan web statis tingkat dasar', '11 Semester Ganjil'),
(29, '07', 'Membuat halaman web dinamis tingkat dasar', '11 Semester Ganjil'),
(30, '07', 'Membuat halaman web dinamis tingkat lanjut', '11 Semester Ganjil'),
(32, '07', 'Sistem informasi geografis tingkat dasar', '11 Semester Ganjil'),
(33, '07', 'Animasi tingkat dasar', '11 Semester Genap'),
(34, '07', 'Pemrograman Active X', '11 Semester Genap'),
(35, '07', 'Merancang aplikasi teks dan dekstop berbasis objek', '12 Semester Ganjil'),
(36, '07', 'Menggunakan bahasa pemrograman berorientasi objek', '12 Semester Ganjil'),
(37, '07', 'Merancang program aplikasi web berbasis objek', '12 Semester Ganjil'),
(39, '07', 'CCNA 1', '12 Semester Ganjil'),
(40, '07', 'Membuat aplikasi web berbasis JSP', '12 Semester Genap'),
(41, '07', 'Membuat program basis data', '12 Semester Genap'),
(43, '03', 'Memahami dasar kekuatan bahan dan komponen mesin', '10 Semester Ganjil'),
(44, '03', 'Memahami konsep dasar kelistrikan dan konversi energi', '10 Semester Ganjil'),
(45, '03', 'Mererapkan K3', '10 Semester Ganjil'),
(46, '03', 'Mengukur dengan alat ukur mekanik perkakas', '10 Semester Genap'),
(47, '03', 'Menggunakan perkakas operasi digenggam', '10 Semester Genap'),
(48, '03', 'Menggunakan mesin untuk operasi dasar', '11 Semester Ganjil'),
(49, '03', 'Membaca gambar teknik', '11 Semester Genap'),
(50, '03', 'Melakukan pekerjaan dengan mesin bubut', '11 Semester Genap'),
(51, '03', 'Melakukan pekerjaan dengan mesin frais', '11 Semester Genap'),
(52, '03', 'Melakukan pekerjaan dengan mesin gerinda', '11 Semester Genap'),
(53, '03', 'Memrogram mesin NC/CNC', '12 Semester Ganjil'),
(54, '03', 'Memfrais tingkat lanjut', '12 Semester Ganjil'),
(55, '03', 'Menggambar 3D dengan CAD', '12 Semester Genap'),
(56, '03', 'Menggambar 2D dengan CAD', '12 Semester Genap'),
(57, '05', 'Menggambar dan membaca sketsa', '10 Semester Ganjil'),
(58, '05', 'Menggunakan Perkakas Tangan', '10 Semester Ganjil'),
(59, '05', 'Membaca Gambar Teknik', '10 Semester Ganjil'),
(60, '05', 'Mengelas Dengan Proses Las Busur Metal Manual', '10 Semester Genap'),
(61, '05', 'Mengelas Dengan Proses Las Karbit', '10 Semester Genap'),
(62, '05', 'Memotong Dengan Panasdan Gouging', '11 Semester Ganjil'),
(63, '05', 'Mengelas Dengan Proses Las Gas Metal', '11 Semester Genap'),
(64, '05', 'Mengelas Dengan Proses Las Las Tungsten', '11 Semester Genap'),
(65, '05', 'Menyolder Dengan Kuningan Dan Perak', '11 Semester Genap'),
(66, '05', 'Mengelas Tingkat Lanjut Dengan Proses Las Oksi', '12 Semester Ganjil'),
(67, '05', 'Mengelas Tingkat Lanjut Dengan Proses Las Busur Metal Manual', '12 Semester Ganjil'),
(68, '05', 'Mengelas Tingkat Lanjut Dengan Proses Las Gas Metal', '12 Semester Genap'),
(69, '05', 'Mengelas Tingkat Lanjut Dengan Proses Las Tungsten', '12 Semester Genap'),
(71, '05', 'Mengelas tingkat lanjut dengan proses las tungsten', '12 Semester Genap'),
(72, '05', 'Mengelas tingkat lanjut dengan proses las gas metal', '12 Semester Genap'),
(73, '05', 'Mengelas tingkat lanjut dengan proses las busur metal manual', '12 Semester Ganjil'),
(74, '05', 'Mengelas tingkat lanjut dengan proses las oksi', '12 Semester Ganjil'),
(75, '05', 'Mengelas tingkat lanjut dengan proses las oksi', '12 Semester Ganjil'),
(76, '04', 'Mengukur besaran listrik', '10 Semester Ganjil'),
(77, '04', 'Menerapkan konsep elektronika digital dan rangkaian elektronika komputer', '10 Semester Ganjil'),
(78, '04', 'Menerapkan sistem mikroprosesor', '10 Semester Genap'),
(79, '04', 'Menerapkan sistem mikrokontroller', '10 Semester Genap'),
(80, '04', 'Menggambar teknik elektronika menggunakan komputer', '11 Semester Ganjil'),
(81, '04', 'Mengoperasikan power supply', '11 Semester Genap'),
(82, '04', 'Mamahami komunikasi sinyal digital', '11 Semester Genap'),
(83, '04', 'Memprogram peralatan sistem pengendali ', '12 Semester Ganjil'),
(84, '04', 'Mengerjakan dasar bengkel elektronika', '12 Semester Ganjil'),
(85, '04', 'Melaksanakan pemeliharaan peralatan sistem otomasi elektronika', '12 Semester Genap'),
(86, '04', 'Merakit peralatan pengendali elektronika', '12 Semester Genap'),
(87, '01', 'Menerapkan K3', '10 Semester Ganjil'),
(88, '01', 'Menerapkan dasar gambar teknik', '10 Semester Ganjil'),
(89, '01', 'Mengidentifikasi ilmu bangunan gedung', '10 Semester Genap'),
(90, '01', 'Memahami bahan bangunan', '10 Semester Genap'),
(91, '01', 'Merencanakan pekerjaan konstruksi kayu', '11 Semester Ganjil'),
(92, '01', 'Menghitung bahan pekerjaan', '11 Semester Genap'),
(93, '01', 'Membuat sambungan dan hubungan kayu', '12 Semester Ganjil'),
(94, '01', 'Membuat komponen sambungan', '12 Semester Ganjil'),
(95, '01', 'Memasang rangka', '12 Semester Genap'),
(96, '01', 'Membuat kusen, daun pintu dan jendela', '12 Semester Genap'),
(97, '02', 'Mengatur tata letak gambar manual', '10 Semester Ganjil'),
(98, '02', 'Menggambar dengan perangkat lunak', '10 Semester Ganjil'),
(99, '02', 'Membuat gambar rencana balok beton bertulang', '10 Semester Genap'),
(100, '02', 'Membuat gambar rencana kolom beton bertulang', '10 Semester Genap'),
(101, '02', 'Menggambar konstruksi lantai dan dinding bangunan', '11 Semester Ganjil'),
(102, '02', 'Menggambar rencana dinding penahan', '11 Semester Ganjil'),
(103, '02', 'Menggambar konstruksi kusen, pintu dan jendela', '11 Semester Genap'),
(104, '02', 'Menggambar rencana plat lantai', '11 Semester Genap'),
(105, '02', 'Menggambar konstruksi tangga', '12 Semester Ganjil'),
(106, '02', 'Menggambar konstruksi langit-langit', '12 Semester Ganjil'),
(107, '02', 'Menggambar konstruksi atap', '12 Semester Ganjil'),
(108, '02', 'Menggambar konstruksi gedung', '12 Semester Ganjil'),
(109, '02', 'Menggambar dekorasi interior dan eksterior', '12 Semester Ganjil'),
(110, '02', 'Merancang partisi ruang', '12 Semester Genap'),
(111, '02', 'Menerapkan material penyelesaian bangunan', '12 Semester Genap'),
(112, '02', 'Menerapkan desain interior bangunan', '12 Semester Genap'),
(113, '06', 'Melakukan perbaikan sistem hidrolik', '10 Semester Ganjil'),
(114, '06', 'Melakukan perbaikan sistem gas buang', '10 Semester Ganjil'),
(115, '06', 'Memelihara baterai', '10 Semester Ganjil'),
(116, '06', 'Melaksanakan overhaul sistem pendingin', '10 Semester Genap'),
(117, '06', 'Melakukan perbaikan sistem bahan bakar bensin', '11 Semester Ganjil'),
(118, '06', 'Melakukan perbaikan mesin', '11 Semester Ganjil'),
(119, '06', 'Melakukan perbaikan sistem transmisi manual', '11 Semester Genap'),
(120, '06', 'Melakukan perbaikan sistem transmisi otomatis', '11 Semester Genap'),
(121, '06', 'Melakukan perbaikan sistem pengapian', '12 Semester Ganjil'),
(122, '06', 'Melakukan perbaikan sistem pengisian', '12 Semester Ganjil'),
(123, '06', 'Melakukan perbaikan sistem starter', '12 Semester Ganjil'),
(124, '06', 'Melakukan perbaikan sistem rem', '12 Semester Genap'),
(125, '06', 'Melakukan perbaikan sistem suspensi', '12 Semester Genap'),
(126, '06', 'Melakukan perbaikan ringan sistem kelistrikan', '12 Semester Genap'),
(134, '07', 'Menguasai Aplikasi Basis Data', '11 Semester Genap');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `kode` varchar(20) NOT NULL,
  `password1` varchar(50) NOT NULL,
  `password2` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `akses` int(1) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`kode`, `password1`, `password2`, `status`, `akses`) VALUES
('14831/252.070', '0cc175b9c0f1b6a831c399e269772661', 'a', 1, 2),
('14832/252.070', '0cc175b9c0f1b6a831c399e269772661', 'a', 1, 2),
('14839/252.070', '0cc175b9c0f1b6a831c399e269772661', 'a', 1, 2),
('14876/252.070', '0cc175b9c0f1b6a831c399e269772661', 'a', 1, 2),
('196879879879879879', '0cc175b9c0f1b6a831c399e269772661', 'a', 3, 1),
('199695151996105158', '0cc175b9c0f1b6a831c399e269772661', 'a', 2, 1),
('199876876283687576', '0cc175b9c0f1b6a831c399e269772661', 'a', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_wali`
--

CREATE TABLE IF NOT EXISTS `tb_wali` (
  `kode_wali` int(20) NOT NULL AUTO_INCREMENT,
  `kode_siswa` int(20) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `pendidikan_ayah` varchar(5) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `pendidikan_ibu` varchar(5) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `pendidikan_wali` varchar(5) NOT NULL,
  `pekerjaan_wali` varchar(50) NOT NULL,
  `telpon` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`kode_wali`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `tb_wali`
--

INSERT INTO `tb_wali` (`kode_wali`, `kode_siswa`, `nama_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `telpon`, `alamat`) VALUES
(30, 36, 'Eko Mulyono', 'S1', 'Wiraswasta', 'Maryam Mulyono', 'SLTA', 'Wiraswasta', '', '', '', '081335284827', 'Jl. Merbabu No. 49  Ponorogo'),
(31, 37, 'Pramdoso Ali', 'SLTP', 'Direktur', 'Juminten', 'SLTA', 'Penyedia Makanan', '', '', '', '081335284827', 'Jl. Merbabu No. 90 Ponorogo'),
(32, 38, 'Pramdoso Ali', 'S1', 'PNS', 'Juminten', 'S1', 'Wiraswasta', '', '', '', '081335284827', 'Jl. mayak no.27 ponorogo'),
(33, 39, 'Boyadi', 'S1', 'PNS', 'Juminten', 'S1', 'Wiraswasta', '', '', '', '081335284827', 'Jl. acer aspire no.49 tonanatan ponorogo'),
(34, 40, 'Kusnan Affandi', 'SD', 'Pensiun PNS', 'Sri Puji Astuti', 'SD', 'Wiraswasta', '', '', '', '081335284827', 'Jl. letj. s. sukowati no.49 babadan ponorogo'),
(35, 41, 'Agung Setyabudi', 'S1', 'PNS', 'Anugrah Rosa', 'S1', 'PNS', '', '', '', '081335284827', 'Jl. kumbokarno no. 102 Ponorogo'),
(36, 42, 'Suyadi Pramono', 'D1', 'Pamong Desa', 'Suyati Dharmo', 'D1', 'Ibu Rumah Tangga', '', '', '', '081335284827', 'Jl. Setono No. 90 Setono Jenangan Ponorogo'),
(37, 43, 'Suyadi Pramono', 'SLTP', 'Pamong Desa', 'Suyati Dharmo', 'SLTP', 'Ibu Rumah Tangga', '', '', '', '081335284827', 'Jl. setono no. 90 setono jenangan ponorogo'),
(38, 44, 'Suyadi Pramono', 'SLTP', 'Pamong Desa', 'Suyati Dharmo', 'SLTP', 'Ibu Rumah Tangga', '', '', '', '081335284827', 'Jl. jaksa agung no. 123 ponorogo'),
(39, 45, '', '', '', '', '', '', 'Bambang Sukardi', 'SLTA', 'Petani', '081335284827', 'Jl. Lejt. S. Sukowati No. 90 Ponorogo'),
(40, 46, 'Bambang Sukardi', 'SLTP', 'Pamong Desa', 'Lestari Wijono', 'SLTP', 'Ibu Rumah Tangga', '', '', '', '081335284827', 'Jl. Jaksa Agung No. 123 Ponorogo'),
(41, 47, 'Suyadi Pramono', 'SD', 'Pamong Desa', 'Suyati Dharmo', 'SD', 'Ibu Rumah Tangga', '', '', '', '081335284827', 'Jl. Jaksa Agung No. 123 Ponorogo'),
(42, 48, 'Suyadi Pramono', 'SLTP', 'Pamong Desa', 'Suyati Dharmo', 'SLTP', 'Ibu Rumah Tangga', '', '', '', '081335284827', 'Jl. Jaksa Agung No. 123 Ponorogo'),
(43, 49, 'Suyadi Pramono', 'SLTP', 'Pamong Desa', 'Suyati Dharmo', 'SLTP', 'Ibu Rumah Tangga', '', '', '', '081335284827', 'Jl. Jaksa Agung No. 123 Ponorogo'),
(44, 50, 'Bambang Sukardi', 'SLTP', 'Direktur', 'Suyati Dharmo', 'SLTP', 'Ibu Rumah Tangga', '', '', '', '081335284827', 'Jl. Jaksa Agung No. 123 Ponorogo'),
(45, 51, 'Suyadi Pramono', 'SLTP', 'Pamong Desa', 'Suyati Dharmo', 'SLTP', 'Ibu Rumah Tangga', '', '', '', '081335284827', 'Jl. Jaksa Agung No. 123 Ponorogo'),
(46, 52, '', '', '', '', '', '', 'Bambang Sukardi', 'SLTP', 'Petani', '081335284827', 'Jl. Lejt. S. Sukowati No. 90 Ponorogo'),
(47, 53, '', '', '', '', '', '', 'Bambang Sukardi', 'SLTP', 'Petani', '081335284827', 'Jl. Lejt. S. Sukowati No. 90 Ponorogo'),
(48, 54, 'Bambang Sukardi', 'SD', 'Pamong Desa', 'Suyati Dharmo', 'SD', 'Ibu Rumah Tangga', '', '', '', '081335284827', 'Jl. Jaksa Agung No. 123 Ponorogo'),
(49, 55, 'Suyadi Pramono', 'SLTP', 'Pamong Desa', 'Suyati Dharmo', 'SLTP', 'Ibu Rumah Tangga', '', '', '', '081335284827', 'Jl. Jaksa Agung No. 123 Ponorogo'),
(50, 56, '', '', '', '', '', '', 'Bambang Sukardi', 'SLTP', 'Petani', '081335284827', 'Jl. Lejt. S. Sukowati No. 90 Ponorogo'),
(51, 57, 'Bambang Sukardi', 'SLTA', 'Pamong Desa', 'Suyati Dharmo', 'SLTA', 'Ibu Rumah Tangga', '', '', '', '081335284827', 'Jl. Jaksa Agung No. 123 Ponorogo'),
(52, 58, '', '', '', '', '', '', 'Bambang Sukardi', 'SLTP', 'Petani', '081335284827', 'Jl. Lejt. S. Sukowati No. 90 Ponorogo'),
(53, 59, '', '', '', '', '', '', 'Bambang Sukardi', 'SLTP', 'Petani', '081335284827', 'Jl. Lejt. S. Sukowati No. 90 Ponorogo'),
(54, 60, 'Suyadi Pramono', 'SLTP', 'Pamong Desa', 'Suyati Dharmo', 'SLTP', 'Ibu Rumah Tangga', '', '', '', '081335284827', 'Jl. Jaksa Agung No. 123 Ponorogo'),
(55, 61, 'Suyadi Pramono', 'SLTP', 'Pamong Desa', 'Suyati Dharmo', 'SLTP', 'Ibu Rumah Tangga', '', '', '', '081335284827', 'Jl. Jaksa Agung No. 123 Ponorogo'),
(56, 62, '', '', '', '', '', '', 'Bambang Sukardi', 'SLTP', 'Direktur', '081335284827', 'Jl. Lejt. S. Sukowati No. 90 Ponorogo'),
(57, 63, 'Suyadi Pramono', 'SLTP', 'Pamong Desa', 'Lestari Wijono', 'SLTP', 'Ibu Rumah Tangga', '', '', '', '081335284827', 'Jl. Jaksa Agung No. 123 Ponorogo'),
(58, 64, '', '', '', '', '', '', 'Sutikno', 'SLTP', 'Petani', '085987198792', 'Jl. Niken Gandini No.90 Ponorogo'),
(59, 65, 'Bagiyo Sumani', 'D2', 'Wiraswasta', 'Surminah', 'D2', 'Wiraswasta', '', '', '', '085989837928', 'Jl. Soekarno Hatta No. 80'),
(60, 66, 'Bagiyo Sumani', 'SLTP', 'Wiraswasta', 'Surminah', 'SLTP', 'Wiraswasta', '', '', '', '085853352902', 'Jl. Soekarno Hatta No. 80'),
(61, 67, 'Bagiyo Sumani', 'SLTP', 'Wiraswasta', 'Surminah', 'SLTP', 'Wiraswasta', '', '', '', '085853352902', 'Jl. Soekarno Hatta No. 80');
