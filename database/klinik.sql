-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 30, 2019 at 07:31 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tebusobat`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `no_pendaftaran` int(5) NOT NULL,
  `kode_obat` varchar(5) NOT NULL,
  `dosis` varchar(20) NOT NULL,
  `jumlah` smallint(6) NOT NULL,
  `subTotal` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `detail`
--
DELIMITER $$
CREATE TRIGGER `kembalikan_obat` AFTER DELETE ON `detail` FOR EACH ROW BEGIN
	UPDATE obat SET stok_obat=stok_obat+OLD.jumlah WHERE kode_obat=OLD.kode_obat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurangi_obat` AFTER INSERT ON `detail` FOR EACH ROW BEGIN
	UPDATE obat SET stok_obat=stok_obat-NEW.jumlah WHERE kode_obat=NEW.kode_obat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_obat` AFTER UPDATE ON `detail` FOR EACH ROW BEGIN
	IF(NEW.jumlah < OLD.jumlah) THEN
	UPDATE obat SET stok_obat = stok_obat+(OLD.jumlah-NEW.jumlah) WHERE kode_obat=OLD.kode_obat;
	ELSE
	UPDATE obat SET stok_obat = stok_obat-(NEW.jumlah-OLD.jumlah) WHERE kode_obat=OLD.kode_obat;
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id_tindakan` int(5) NOT NULL,
  `nama_tindakan` varchar(50) NOT NULL,
  `harga_tindakan` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id_tindakan`, `nama_tindakan`, `harga_tindakan`) VALUES
(1, 'Konsultasi', '50000.00'),
(2, 'Pemeriksaan', '75000.00');

--
-- Triggers `tindakan`
--
DELIMITER $$
CREATE TRIGGER `update_subtotal2` AFTER UPDATE ON `tindakan` FOR EACH ROW BEGIN
	IF(OLD.harga_tindakan<NEW.harga_tindakan) THEN
	UPDATE detail SET subTotal = subTotal+((NEW.harga_tindakan-OLD.harga_tindakan));
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(5) NOT NULL,
  `nama_obat` varchar(40) NOT NULL,
  `jenis_obat` varchar(30) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `harga_obat` decimal(15,2) NOT NULL,
  `stok_obat` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis_obat`, `kategori`, `harga_obat`, `stok_obat`) VALUES
(1, 'Panadol', 'Strip', 'Bebas', '7000.00', 98),
(2, 'Mixagrip', 'Strip', 'Bebas', '2000.00', 100),
(3, 'Oskadon', 'Pusing', 'Bebas', '1500.00', 100),
(4, 'Bodrex', 'Pil', 'Bebas', '30000.00', 100),
(5, 'Geliga Balsem', 'Pack', 'Bebas', '50000.00', 100);

-- --------------------------------------------------------

--
-- Triggers `obat`
--
DELIMITER $$
CREATE TRIGGER `update_subtotal` AFTER UPDATE ON `obat` FOR EACH ROW BEGIN
	IF(OLD.harga_obat<NEW.harga_obat) THEN
	UPDATE detail SET subTotal = subTotal+((NEW.harga_obat-OLD.harga_obat));
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(40) NOT NULL,
  `alamat_pasien` varchar(50) NOT NULL,
  `gender_pasien` varchar(1) NOT NULL,
  `umur_pasien` tinyint(4) NOT NULL,
  `telepon_pasien` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `alamat_pasien`, `gender_pasien`, `umur_pasien`, `telepon_pasien`) VALUES
(1, 'Pasien 1', 'Malang', 'P', 17, '0000'),
(2, 'Pasien 2', 'Malang', 'L', 17, '0000'),
(3, 'Pasien 3', 'Malang', 'L', 20, '0000'),
(4, 'Pasien 4', 'Malang', 'L', 15, '0000'),
(5, 'Pasien 5', 'Malang', 'L', 30, '0000');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `no_pendaftaran` int(11) NOT NULL,
  `id_tindakan` int(5) NOT NULL,
  `waktu_daftar` datetime NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`no_pendaftaran`, `id_tindakan`, `waktu_daftar`, `id_pasien`, `id_user`) VALUES
(1, 1, '2017-02-23 08:38:58', 1, 'ID-1'),
(2, 1, '2017-02-23 10:27:35', 2, 'ID-1'),
(3, 1, '2017-02-23 17:21:01', 3, 'ID-1');

--

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `id_user` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`id_user`, `nama`, `jenis_kelamin`, `alamat`, `no_telp`, `username`, `password`, `level`) VALUES
('ID-1', 'Greggy Gianini Firmansyah', 'L', 'Malang', '0000', 'admin', 'admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD KEY `no_pendaftaran`(`no_pendaftaran`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id_tindakan`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`no_pendaftaran`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- Constraints for dumped tables

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `useradmin` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
