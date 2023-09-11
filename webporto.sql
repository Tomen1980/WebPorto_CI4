-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 11, 2023 at 05:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webporto`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `email`, `username`, `password`) VALUES
(6, 'agungjumantoroandrian@gmail.com', 'agung', '48dd86adc0650ac98d2865980dcf68c42c5beec5a97f7563603efc0167f56584bf42d04b1f7fd9ae98ae8d5ab64b95eaf1930014c90b8d414987e6a00ef4dea9');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Social'),
(2, 'Academy'),
(3, 'Goods'),
(4, 'Services'),
(7, 'Health');

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `client` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `url` varchar(150) NOT NULL,
  `img_porto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id`, `judul`, `deskripsi`, `id_kategori`, `client`, `date`, `url`, `img_porto`) VALUES
(8, 'Todo List ', 'Aplikasi Mobile Todo ini berbasis websitte dengan ukuran menggunakan mobile, agar memudahkan dalam megakses todolist tanpa harus mendownload apk terlbih dahulu. Aplikasi ini dirancang menggunakan Javascript,Express JS, Typescript, MongoDB untuk Frontend dirancang dengan React JS, Twailwind.css.\r\nAplikasi ini bertujuan untuk melakukan list kegiatan sehari hari yang nantinya memudahkan dalam melihat dan mengingat agenda. Fitur yang ada dalam aplikasi ini yaitu 1) Tambah Agenda berguna untuk menambahkan Agenda kegiatan sehari hari yang perlu diingat, 2) Completed dan Uncompleted berguna untuk menandai Agenda yang telah selesai dilakukan, 3) Menghapus, berguna untuk menghapus Agenda Agenda yang tidak dibutuhkan Completed dan Uncompleted ', 1, 'Tidak Ada', '2023-09-11', 'https://github.com/Tomen1980/Todolist_Typescript', '1694406807_7005a1434e53ae2c13c3.png'),
(9, 'Blonjoku', 'Blonjoku adalah aplikasi berbasis web dengan teknologiMERN(MongoDB,ExpressJS,React,NodeJS) dengan tujuan mempermudah user dalam melakukan belanja suatu barang secara online serta membuka lapangan kerja berupa usaha dagang secara online. Aplikasi ini telah dilengkapi juga dengan PayPal dalam melakukan pembayarannya sehingga dapat melakukan penjualan secara online hingga ke mancanegara. \r\nFitur Aplikasi ini 1) terdapat penjual dan pembeli barang produk (Admin dan User), 2) id dan password yang terenkripsi secara aman sehingga tidak mudah di hacking 3) Detail Barang, sehingga dapat mengetahui qty yang tersisa harga dll yang nantinya dapat dipesan dan masuk kedalam fitur keranjang 4) Proses Transaksi menggunakan Paypal.', 4, 'Tidak Ada', '2023-07-13', 'https://github.com/Tomen1980/TokoOnline_MERN', '1694407937_cf9868820df2e97cc54b.png'),
(10, 'Layanan Pengaduan', 'Layanan Pengaduan merupakan aplikasi berbasis web dengan teknologi MERN (MongoDB,ExpressJS,ReactJS,Node) yang bertujuan untuk memudahkan seseorang dalam melakukan pelaporan tindakan kejahatan,maupun hal hal lain yang perlu tindakan segera.\r\nFitur pada aplikasi ini ialah, 1) Login system dengan id dan pass yang terenkripsi 2)Memiliki 2 Dashboard yang artinya memiliki fitur multi user yaitu petugas sebagai petugas penindakan atas laporan yang diberikan masyarakat dan Masyarakat sebagai orang yang melapor ketika ada kejadian tertentu. 3) Pembuatan laporan oleh level masyarakat kepada petugas yang digunakan untuk mempermudah masyarakat dalam melaporkan serta mempermudah petugas dalam menerima keluhan, 4) History Laporan yang digunakan Masyarakat dalam melihat tracking tindak lanjut dari petugas 5) Memberikan Tanggapan, fitur Petugas dalam melakukan tindakan dan melaporkan kepada masyarakat dalam fitur ini petugas memiliki 2 action pertama dalam proses yaitu petugas akan menyelediki kejadian sehingga ketika dalam proses penyelidikan, masyarakat tidak bisa menghapus kasusnya. sedangkan jika dalam selesai artinya tanggapan final atau masalah telah diselesaikan oleh petugas. 6) Data Masyarakat digunakan petugas dalam melakukan pengelolaan terhadap akun masyarakat.', 4, 'SMK Telkom Malang', '2023-07-21', 'https://github.com/Tomen1980/LayananPengaduan_MERN', '1694408548_69868ac52213d80bf0b0.png'),
(11, 'Rumpi Grub ', 'Rumpi Grub Chat merupakan aplikasi berbasis web dengan teknologi NodeJS,ExpressJS,Mysql,Sequalize dan EJS yang bertujuan untuk memudahkan user dalam bertukar pesan dalam 1 grub. Aplikasi ini juga digunakan dalam kondisi 1 kali pemakaian sehingga ketika di refresh akan menghilangkan seluruh isi dalam chat grub.\r\nFitur Aplikasi ini adalah 1) Penggolongan Grub yang dapat digunakan sehingga antar grub tidak dapat melihat isi chat satu sama lain. 2) chat grub secara realtime, sehingga tidak perlu adanya refresh pada halaman.', 1, 'Tidak Ada', '2023-06-22', 'https://github.com/Tomen1980/RumpiGrup-App', '1694409076_e57b043c7b83292f61f7.png'),
(12, 'Manajemen Siswa', 'Manejemen Siswa merupakan aplikasi berbasis web dengan teknologi NodeJS,ExpressJS,Mysql,Sequalize,socket.io dan EJS yang bertujuan untuk memudahkan seseorang dalam melakukan perekapan nilai siswa secara realtime dan mengatur data siswa.\r\nFitru pada aplikasi ini adalah 1) Login Register yang terkoneksi dengan gmail sehingga nanti akan mendapatkan kiriman email secara langsung, 2) Menejemen siswa yang nantinya dapat melakukan CRUD untuk memudahkan dalam melakukan manajemen kepada data siswa. 3) Nilai Siswa yang nantinya dapat melakukan CRUD untuk memudahkan dalam melakukan manajemen kepada data nilai siswa, 4) Rapot siswa Pada fitur ini kita dapat\r\nmencetak rapot nilai dari data siswa yang telah kita inputkan dalam bentuk PDF.\r\n', 1, 'Tidak Ada', '2023-02-22', 'https://github.com/Tomen1980/Aplikasi-Manajemen-Siswa', '1694409591_89e53300d49cbd1d371b.png'),
(13, 'Sistem Informasi RS Paru Jember', 'RS Paru Jember merupakan aplikasi berbasis web dengan teknologi NodeJS,ExpressJS,Mysql,Sequalize dan EJS yang bertujuan untuk memudahkan rumah sakit dalam memberikan informasi layanan kepada pasien.\r\nFitur pada aplikasi ini adalah 1) Landing Page yang informatif dalam memberikan informasi data berupa event,jumlah kamar, jumlah pasien, statistika pasien dll,  2) Pengaduan Layanan yang nantinya data akan masuk kedalam database dan email direktur RS Paru Jember 3) Admin Dashboard digunakan untuk melakukan manajemen konten yang ada pada Landing Page.', 7, 'RS Paru Jember', '2023-11-25', 'https://github.com/Tomen1980/rsparujember', '1694409899_90cb0cdb2aaeaf73b9f9.png'),
(14, 'Web Portofolio', 'Web Portofolio ini adalah web yang dirancang untuk mendokumentasikan project pribadi yang telah dilakukan. Teknologi yang digunakan saat ini adalah CI4 dan Templating bootstarp. \r\nFitur yang ada pada aplikasi ini adalah 1) Login sistem yang dilakukan secara enkripsi 2) Landing Page berisi tentang informasi project yang telah dibuat 3) Admin Dashboard digunakan untuk melakukan manajemen sistem informasi pada Landing Page 4) contact merupakan fitur yang dapat melakukan kontak dengan pembuat website untuk melakukan transaksi atau membrikan kritikan yang nantinya akan masuk kedalam gmail pemilik website.', 1, 'Tidak Ada', '2023-09-11', 'https://github.com/Tomen1980/Todolist_Typescript', '1694410182_52e0043b683b28ab6daa.png'),
(15, 'Inventaris Barang ', 'Inventaris Barang merupakan aplikasi berbasis web dengan teknologi PHP,MYSQL,Bootstrap yang bertujuan untuk memudahkan user dalam meminjam barang di sekolahan.\r\nFitur pada aplikasi ini adalah 1) login sistem multi level 2) Gudang user dapat melihat isi gudang dan jumlah dari barang. sehingga ketika barang habis maka tidak dapat dipinjam. 2) Peminjaman dan Pengembalian admin dapat mengetahui siapa saja yang meminjam serta dapat menghapus jika telah di konfirmasi oleh admin. 3) Manejemen User admin dapat menghapus,mengedit data user', 3, 'UKK SMK Telkom Malang', '2021-11-11', 'https://github.com/Tomen1980/UKL_Inventaris', '1694411436_bc044dad1a00caaec4c0.png');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `deskripsi_singkat` varchar(150) NOT NULL,
  `img_profile` varchar(150) NOT NULL,
  `passion` varchar(150) NOT NULL,
  `bod` date NOT NULL,
  `website` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `age` int(11) NOT NULL,
  `degree` varchar(150) NOT NULL,
  `freelance` enum('Available','Not Available') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `id_profile`, `name`, `deskripsi`, `deskripsi_singkat`, `img_profile`, `passion`, `bod`, `website`, `phone`, `city`, `age`, `degree`, `freelance`) VALUES
(1, 6, 'Agung Jumantoro Andrian', 'I am a professional in the world of information technology focused on backend Developer development. My experience and dedication in this field have made me excel in using various programming languages, especially Javascript and PHP. I have deep expertise in implementing technology-based solutions for various challenges faced by backend systems. One of the things that sets me apart is my expertise in mastering the powerful and popular MERN framework (MongoDB, Express.js, React, Redux, Node.js). With this skill, I am able to build and integrate the essential components of web applications, from user interfaces to complex business logic. My experience in using this framework allows me to easily overcome the challenges of developing modern web applications. Apart from that, I also master the CodeIgniter 4 (CI4) framework which is one of the main choices in developing PHP-based web applications. This expertise demonstrates my flexibility in adapting to different technologies and providing the best solution for each project requirement. One of the important aspects of my personality and professionalism is high spirit and perseverance. I am known as someone who does not give up easily in the face of technical challenges. My ability to remain firm and find solutions even in difficult situations is a quality that is highly valued by my colleagues. My persistence is also a valuable asset in the ever-evolving technology industry, where problem solving is the key to success.', 'I am a person engaged in the field of Web Developer in the Backend Developer. ', '1694406206_90f0bca0c60cbcbef9c2.jpg', 'BackEnd Dev', '2003-03-10', '-', '087772873951', 'Jember, Jawa Timur', 20, 'Bachelor System Information', 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_profile` (`id_profile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD CONSTRAINT `portofolio_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`id_profile`) REFERENCES `auth` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
