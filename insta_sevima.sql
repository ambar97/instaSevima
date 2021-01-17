-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2021 at 11:28 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insta_sevima`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(6) NOT NULL,
  `id_tread` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_tread`, `id_user`, `komentar`, `like`) VALUES
(82, 35, 2, 'enak ya kamu wisuda..', 0),
(83, 35, 1, 'enak dong.. kamu kapan ?', 0),
(84, 35, 2, 'besok paling kalau gk hujan', 0),
(85, 34, 2, 'lah nyapo kok opo jareku', 0),
(86, 34, 1, 'oh ancene dobol', 0),
(87, 35, 1, 'mosok sih iyo', 0),
(88, 29, 1, 'kalau kecut ada tidak ??', 0);

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `id` int(11) NOT NULL,
  `id_tread` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`id`, `id_tread`, `id_user`) VALUES
(38, 35, 2),
(39, 34, 2),
(40, 33, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tread`
--

CREATE TABLE `tread` (
  `id_tread` int(6) NOT NULL,
  `img_tread` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `posting` text NOT NULL,
  `like` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tread`
--

INSERT INTO `tread` (`id_tread`, `img_tread`, `id_user`, `posting`, `like`, `timestamp`) VALUES
(29, 'galery/kontent/144423.jpg', 1, 'Namanya juga hidup, ada pait ada manis.. ya begitulah ', 0, '2021-01-07 02:14:46'),
(30, 'galery/kontent/Screenshot_from_2020-11-03_19-43-04.png', 1, 'Macam nak baik tuh kau', 0, '2021-01-07 02:14:46'),
(31, 'galery/kontent/Screenshot_from_2020-12-14_11-22-25.png', 1, 'Teruslah berkarya meskipun tidak ada yang mempedulikannya', 0, '2021-01-07 02:14:46'),
(32, 'galery/kontent/Screenshot_from_2020-12-28_12-43-14.png', 1, 'Semua mah suka-suka ana..', 0, '2021-01-07 02:14:46'),
(33, 'galery/kontent/Screenshot_from_2020-11-28_09-31-46.png', 2, 'Wisuda on the road....', 1, '2021-01-07 02:21:17'),
(34, 'galery/kontent/Lamborghini-Aventador-SV-belakang-jpg.jpg', 1, 'Opo Jaremu lah..', 1, '2021-01-15 12:46:51'),
(35, 'galery/kontent/Capture.PNG', 1, 'Wisuda dulu mah atuh', 1, '2021-01-15 13:46:50'),
(36, 'galery/kontent/Screenshot_from_2021-01-10_17-50-43_-_5.png', 3, 'blank document.. iya sama sepertiku', 0, '2021-01-17 22:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(6) NOT NULL,
  `nm_user` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `foto_profile` text NOT NULL,
  `tentang` text NOT NULL,
  `phone_number` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `email`, `username`, `password`, `foto_profile`, `tentang`, `phone_number`) VALUES
(1, 'Anas Abiem', 'Abiemassyikin@gmail.com', 'ambar', 'abimsayangfia', '', 'Coba aja satu', '087857918118'),
(2, 'cobasa', 'cobasa@gmail.com', 'test', 'tesdulu', '', '', ''),
(3, 'Alifiah Wahyu', 'alifiah3119@gmail.com', 'fia', 'baa8f13fd43e67ad5eadc5c37a14f90575d540ad0d24ab79cfd03bca5e06cdc9f6dd92ea31d0d6406e2dfd8be609366253a423bc1e5ca1e8cd9721fef279e2cfkUURCf/IcoLqgYvtdTTOFCQvBNf+hvk=', 'galery/profile/Screenshot_from_2021-01-10_18-34-52.png', 'Sudah punya orang', '087857915678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tread`
--
ALTER TABLE `tread`
  ADD PRIMARY KEY (`id_tread`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tread`
--
ALTER TABLE `tread`
  MODIFY `id_tread` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
