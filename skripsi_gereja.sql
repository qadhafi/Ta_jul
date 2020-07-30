-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Feb 2020 pada 05.44
-- Versi server: 10.1.33-MariaDB
-- Versi PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_gereja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(191) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `tanggal`, `isi`, `cover`) VALUES
(1, 'December', '2020-01-07', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '20200107070648.jpg'),
(2, 'I hope you get your ballroom floor', '2020-01-07', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', ''),
(4, 'Bintang Kehidupan', '2020-01-07', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)</p>', '20200107063103.png'),
(5, 'asdaw', '2020-01-11', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia adipisci quidem, quam nam reiciendis facere blanditiis atque neque architecto omnis magni totam, voluptate maiores, iusto molestias incidunt unde nesciunt cum.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia adipisci quidem, quam nam reiciendis facere blanditiis atque neque architecto omnis magni totam, voluptate maiores, iusto molestias incidunt unde nesciunt cum.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia adipisci quidem, quam nam reiciendis facere blanditiis atque neque architecto omnis magni totam, voluptate maiores, iusto molestias incidunt unde nesciunt cum.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia adipisci quidem, quam nam reiciendis facere blanditiis atque neque architecto omnis magni totam, voluptate maiores, iusto molestias incidunt unde nesciunt cum.</p>', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `baptis`
--

CREATE TABLE `baptis` (
  `id_baptis` int(11) NOT NULL,
  `jenis_baptis` enum('Baptis Anak','Baptis Dewasa') NOT NULL,
  `tanggal` date NOT NULL,
  `id_pendeta` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `baptis`
--

INSERT INTO `baptis` (`id_baptis`, `jenis_baptis`, `tanggal`, `id_pendeta`, `id_user`, `status`) VALUES
(1, 'Baptis Dewasa', '2020-01-12', 23, 22, 1),
(4, 'Baptis Anak', '2020-01-13', 34, 29, 1),
(5, 'Baptis Dewasa', '2020-01-18', 34, 30, 1),
(6, 'Baptis Anak', '2020-02-02', 34, 33, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `judul` varchar(191) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `judul`, `foto`, `tanggal`) VALUES
(1, 'Foto pertama gan', 'foto-test.jpg', '2020-01-07'),
(2, 'Ini foto kedua', '20200107075002.jpg', '2020-01-07'),
(3, 'Foto Ketiga gan', '20200107073909.jpg', '2020-01-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` int(11) NOT NULL,
  `nama_barang` varchar(191) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_barang` enum('0','1') NOT NULL,
  `ruangan` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `nama_barang`, `jumlah`, `status_barang`, `ruangan`) VALUES
(1, 'Kursi Bagus', 50, '1', 'Gereja'),
(2, 'Komputer 1 Set', 3, '1', 'Kantor'),
(3, 'Charger', 1, '1', 'Kantor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah_kehadiran_ibadah`
--

CREATE TABLE `jumlah_kehadiran_ibadah` (
  `id` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jumlah_kehadiran_ibadah`
--

INSERT INTO `jumlah_kehadiran_ibadah` (`id`, `tahun`, `bulan`, `jumlah`) VALUES
(1, 2020, 4, 150),
(2, 2019, 12, 200),
(3, 2020, 2, 100),
(4, 2020, 1, 150),
(5, 2019, 1, 90),
(6, 2019, 2, 130),
(7, 2020, 3, 145),
(8, 2020, 5, 90),
(9, 2020, 6, 140),
(10, 2020, 7, 200),
(11, 2020, 8, 50),
(12, 2020, 9, 100),
(13, 2020, 10, 85),
(14, 2020, 11, 135),
(15, 2020, 12, 300),
(18, 2019, 3, 90),
(19, 2019, 4, 130),
(20, 2019, 5, 90),
(21, 2019, 6, 50),
(22, 2019, 7, 70),
(23, 2019, 8, 65),
(24, 2019, 9, 110),
(25, 2019, 10, 45),
(26, 2019, 11, 80),
(28, 2018, 1, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(191) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `tanggal`, `deskripsi`, `foto`) VALUES
(1, 'Donor Darah', '2020-01-21', '<p>Acara donor darah ini diadakan oleh kami sebagai bentuk apresiasi terhadap seluruh pelanggan setia yang menggunakan jasa kami sebagai alat bantu untuk mengerjakan skripsi, Acara donor darah ini diadakan oleh kami sebagai bentuk apresiasi terhadap seluruh pelanggan setia yang menggunakan jasa kami sebagai alat bantu untuk mengerjakan skripsi Acara donor darah ini diadakan oleh kami sebagai bentuk apresiasi terhadap seluruh pelanggan setia yang menggunakan jasa kami sebagai alat bantu untuk mengerjakan skripsi</p>', '20200111083452.jpg'),
(2, 'Pembaktian', '2020-01-25', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Why do we use it?</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p>Where can I get some?</p><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '20200115161716.jpeg'),
(3, 'Sunat Masal', '2020-01-31', '<p>Where does it come from?</p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '20200115162933.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kehadiran`
--

INSERT INTO `kehadiran` (`id_kehadiran`, `status`, `id_kegiatan`, `id_user`, `tanggal_daftar`) VALUES
(5, '1', 1, 31, '2020-01-16'),
(8, '1', 1, 29, '2020-01-17'),
(11, '1', 1, 32, '2020-01-17'),
(12, '0', 3, 31, '2020-01-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_uang` int(11) NOT NULL,
  `tipe` enum('pemasukan','pengeluaran') NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `tanggal`, `jumlah_uang`, `tipe`, `keterangan`) VALUES
(1, '2018-12-20', 1000000, 'pemasukan', 'donasi dari donatur'),
(2, '2019-12-31', 500000, 'pemasukan', 'rejeki'),
(3, '2020-01-08', 300000, 'pengeluaran', 'keperluan gereja'),
(4, '2020-01-17', 10000, 'pemasukan', 'sedekah'),
(5, '2020-01-30', 1000000, 'pemasukan', 'Pemasukan bulanan'),
(6, '2019-06-19', 20000, 'pemasukan', '500000'),
(7, '2020-02-02', 100000, 'pengeluaran', 'belanja'),
(8, '2020-02-01', 500000, 'pemasukan', '-'),
(9, '2020-02-03', 50000, 'pengeluaran', '-'),
(10, '2020-02-05', 400000, 'pemasukan', '-'),
(11, '2020-02-08', 90000, 'pengeluaran', '-'),
(12, '2020-02-10', 60000, 'pemasukan', '-'),
(13, '2020-03-11', 300000, 'pemasukan', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konseling`
--

CREATE TABLE `konseling` (
  `id_konseling` int(11) NOT NULL,
  `subjek` varchar(191) NOT NULL,
  `pembahasan` text NOT NULL,
  `tanggal_posting` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `respon` text NOT NULL,
  `tanggal_respon` date NOT NULL,
  `id_pendeta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konseling`
--

INSERT INTO `konseling` (`id_konseling`, `subjek`, `pembahasan`, `tanggal_posting`, `id_user`, `respon`, `tanggal_respon`, `id_pendeta`) VALUES
(3, 'Dog Food', 'Rasanya ga enak bgt gan pengen muntah wkwkkw ', '2020-01-17', 31, 'kan enak tuh gan muntah2 wkwkw', '2020-01-17', 1),
(4, 'Aku banyak dosa', 'aku ingin bertobat gan, tolongin aku, aku ingin kembali ke jalanmu anjay... aku ingin bertobat gan, tolongin aku, aku ingin kembali ke jalanmu anjay... aku ingin bertobat gan, tolongin aku, aku ingin kembali ke jalanmu anjay... aku ingin bertobat gan, tolongin aku, aku ingin kembali ke jalanmu anjay...', '2020-01-17', 31, 'wah bagus tuh, ayo kita bertobat gan', '2020-01-17', 34),
(5, 'lapar', 'aku butuh makan', '2020-01-18', 31, 'beli gan', '2020-01-18', 34);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mempelai`
--

CREATE TABLE `mempelai` (
  `id_mempelai` int(11) NOT NULL,
  `id_pernikahan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tipe_mempelai` enum('pria','wanita') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mempelai`
--

INSERT INTO `mempelai` (`id_mempelai`, `id_pernikahan`, `id_user`, `tipe_mempelai`) VALUES
(1, 3, 22, 'pria'),
(2, 3, 30, 'wanita'),
(3, 1, 33, 'pria'),
(4, 1, 32, 'wanita'),
(5, 4, 29, 'pria'),
(6, 4, 31, 'wanita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orangtua`
--

CREATE TABLE `orangtua` (
  `id_orangtua` int(11) NOT NULL,
  `nama_ayah` varchar(191) NOT NULL,
  `nama_ibu` varchar(191) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orangtua`
--

INSERT INTO `orangtua` (`id_orangtua`, `nama_ayah`, `nama_ibu`, `id_user`) VALUES
(2, 'Richard lisonss', 'Lina Gracia', 22),
(4, 'Ricardo', 'Elizabeth', 28),
(5, 'Sudarmono Lee', 'Wenny Lee', 29),
(6, 'Derby kokon', 'Deby', 30),
(7, 'Coke', 'Jessica', 33),
(8, 'Lee', 'Jie', 32),
(9, 'zxcjygjygjy', 'zxccxz', 31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pernikahan`
--

CREATE TABLE `pernikahan` (
  `id_pernikahan` int(11) NOT NULL,
  `nama_pernikahan` varchar(191) NOT NULL,
  `tanggal_pernikahan` date NOT NULL,
  `lokasi_pernikahan` varchar(191) NOT NULL,
  `id_pendeta` int(11) NOT NULL,
  `keterangan` varchar(191) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pernikahan`
--

INSERT INTO `pernikahan` (`id_pernikahan`, `nama_pernikahan`, `tanggal_pernikahan`, `lokasi_pernikahan`, `id_pendeta`, `keterangan`, `status`) VALUES
(1, 'Pernikahan  Alakadarnya', '2020-01-13', 'Gereja Kristus Yesus Kuta', 23, '', '1'),
(3, 'Pernikahan Romeo dan Juliet', '2020-01-13', 'Gereja Kuta', 23, 'Acara Pernikahan Resmi', '1'),
(4, 'Menikah muda', '2020-01-18', 'gereja', 23, 'wawd', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(191) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `suku` varchar(191) NOT NULL,
  `pekerjaan` varchar(191) NOT NULL,
  `pendidikan` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `level` enum('jemaat','staff','pendeta') NOT NULL,
  `foto` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `alamat`, `suku`, `pekerjaan`, `pendidikan`, `username`, `password`, `level`, `foto`, `email`, `tanggal_daftar`) VALUES
(1, 'developer', 'Laki - Laki', 'denpasar', '2020-01-05', '0811111122', 'Andakasa 1/9', '', '', '', 'developer', 'efe6398127928f1b2e9ef3207fb82663', 'staff', '', 'developer@mail.com', '2020-01-06'),
(2, 'Roy Rivaldo', 'Laki - Laki', 'Denpasar', '2020-01-01', '0811223344', 'Konoha No. 1', '', '', '', 'riorivaldo', 'efe6398127928f1b2e9ef3207fb82663', '', '20200107063146.jpg', 'riorivaldo@example.com', '2020-01-01'),
(20, 'Joker', 'Laki - Laki', 'Gotham', '1995-01-17', '081081081', 'Gotham city no. 1', '', '', '', 'joker1', 'qweqwe', '', '20200107063252.jpeg', 'joker@email.com', '0000-00-00'),
(22, 'Steve Finnan', 'Laki - Laki', 'Scotland', '1995-01-15', '081180081', 'Liverpoo FC', '', 'Programmer', '', 'finnan', 'efe6398127928f1b2e9ef3207fb82663', 'jemaat', '20200107063326.jpg', 'finnan@lfc.com', '2020-01-06'),
(23, 'Steven Bergmann', 'Laki - Laki', 'USA', '1995-01-10', '0810812', 'St. Rosemarry Park 23', '', '', '', 'bergmann', 'efe6398127928f1b2e9ef3207fb82663', 'pendeta', '20200107041549.jpg', 'steven@email.com', '2020-01-07'),
(27, 'Julian Rully', 'Laki - Laki', 'Denpasar', '1995-01-16', '12521', 'Sesetan No. 1', '', '', '', 'julian', 'efe6398127928f1b2e9ef3207fb82663', 'staff', '20200107052311.jpeg', 'julian@email.com', '2020-01-07'),
(28, 'Kwon Ji Young', 'Laki - Laki', 'Korea', '1995-01-31', '081112233', 'Jalan simanjuntak 112', 'Asian', 'Penyanyi', 'SMA', 'kwonjiyoung', 'efe6398127928f1b2e9ef3207fb82663', 'jemaat', '20200112132355.jpg', 'kwonji@young.com', '2020-01-12'),
(29, 'Anthony Lee', 'Laki - Laki', 'Magelang', '2000-01-26', '081108101', 'Jalan Pulau Komodo', 'China', 'Programmer', 'S1', 'anthonylee', 'efe6398127928f1b2e9ef3207fb82663', 'jemaat', '20200113135556.jpg', 'anthonylee@gmail.com', '2020-01-13'),
(30, 'Juliet', 'Perempuan', 'Denpasar', '1993-01-20', '0811223322', 'Jalan Angkasapura', 'Batak', 'Ibu Rumah Tangga', 'SMA', 'juliet112', 'efe6398127928f1b2e9ef3207fb82663', 'jemaat', '20200113150142.jpg', 'juliet@email.com', '2020-01-13'),
(31, 'Juvina', 'Perempuan', 'Denpasar', '1998-06-23', '08181801', 'Jalan Sesetan raya kuta', 'Tionghoa', 'Programmer', 'SMA', 'juvina', 'efe6398127928f1b2e9ef3207fb82663', 'jemaat', '20200113150300.jpg', 'juvina@email.com', '2020-01-13'),
(32, 'Leona', 'Perempuan', 'Denpasar', '1998-01-28', '081810823', 'Jalan', 'Batak', 'Pramugari', 'S1', 'leona12', 'efe6398127928f1b2e9ef3207fb82663', 'jemaat', '20200114103316.jpg', 'leona@gmail.com', '2020-01-14'),
(33, 'Madisson', 'Laki - Laki', 'United Kingdom', '1995-01-17', '018810202', 'Anywhere', 'Bule', 'Footballer', 'S1', 'madisson', 'efe6398127928f1b2e9ef3207fb82663', 'jemaat', '20200114103435.jpg', 'madisson@gmail.com', '2020-01-14'),
(34, 'Paulo Dybala', 'Laki - Laki', 'Argentina', '1995-01-24', '081283082', 'Juventus FC', 'Bule', 'Footballer', 'SMA', 'dybala', 'efe6398127928f1b2e9ef3207fb82663', 'pendeta', '20200117085456.jpg', 'paulodybala@gmail.com', '2020-01-17'),
(35, 'Mohamed Salah', 'Laki - Laki', 'UK', '1995-01-10', '08108101', 'United Kingdom', 'Bule', 'Sepak Bola', 'S1', 'mosalah', 'efe6398127928f1b2e9ef3207fb82663', 'jemaat', '20200209075134.jpg', 'mosalah@gmail.com', '2020-02-09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `baptis`
--
ALTER TABLE `baptis`
  ADD PRIMARY KEY (`id_baptis`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`);

--
-- Indeks untuk tabel `jumlah_kehadiran_ibadah`
--
ALTER TABLE `jumlah_kehadiran_ibadah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indeks untuk tabel `konseling`
--
ALTER TABLE `konseling`
  ADD PRIMARY KEY (`id_konseling`);

--
-- Indeks untuk tabel `mempelai`
--
ALTER TABLE `mempelai`
  ADD PRIMARY KEY (`id_mempelai`);

--
-- Indeks untuk tabel `orangtua`
--
ALTER TABLE `orangtua`
  ADD PRIMARY KEY (`id_orangtua`);

--
-- Indeks untuk tabel `pernikahan`
--
ALTER TABLE `pernikahan`
  ADD PRIMARY KEY (`id_pernikahan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `baptis`
--
ALTER TABLE `baptis`
  MODIFY `id_baptis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_inventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jumlah_kehadiran_ibadah`
--
ALTER TABLE `jumlah_kehadiran_ibadah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `konseling`
--
ALTER TABLE `konseling`
  MODIFY `id_konseling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mempelai`
--
ALTER TABLE `mempelai`
  MODIFY `id_mempelai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id_orangtua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pernikahan`
--
ALTER TABLE `pernikahan`
  MODIFY `id_pernikahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
