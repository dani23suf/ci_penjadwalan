-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 04:25 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_penjadwalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggotadatang`
--

CREATE TABLE `tbl_anggotadatang` (
  `id_anggotadatang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `jobdesk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_anggotadatang`
--

INSERT INTO `tbl_anggotadatang` (`id_anggotadatang`, `id_user`, `id_jadwal`, `jobdesk`) VALUES
(102, 6, 9, 4),
(103, 4, 9, 2),
(104, 5, 9, 3),
(122, 6, 11, 4),
(124, 6, 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `tempat` varchar(128) NOT NULL,
  `agenda` varchar(128) NOT NULL,
  `status_id` int(11) NOT NULL,
  `foto_bukti` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `tanggal`, `jam`, `tempat`, `agenda`, `status_id`, `foto_bukti`) VALUES
(9, '2021-06-18', '08:56:00', 'surabaya', 'rapat penting', 3, 'foto-min3.jpg'),
(10, '2021-06-15', '10:00:00', 'Sidoarjo', 'Dokumentasi acara', 1, NULL),
(11, '2021-06-14', '14:49:00', 'Malang', 'rapat penting', 1, NULL),
(12, '2021-06-11', '19:15:59', 'Surabaya', 'mmmm', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id_status` int(11) NOT NULL,
  `status_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id_status`, `status_name`) VALUES
(1, 'Di Jadwalkan'),
(2, 'Di Batalkan'),
(3, 'Terlaksana');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(2, 'Dani Sufianto', 'danisufianto5@gmail.com', 'foto-min.jpg', '$2y$10$bOnKWrQVximPbuLuLqi.SuMsqpiewKz0n0eyXHGxESlqFvGLbVuya', 1, 1, 1623038536),
(3, 'dodyfirdaus', 'dodyfirdaus@gmail.com', 'default.jpg', '$2y$10$8hx652.Nc7PN2gSgUw.vaeFFMnUwTAjpwDu/uwvbYE0rGZHa6i7oa', 2, 1, 1623049516),
(4, 'Bambang', 'bambang@gmail.com', 'default.jpg', '$2y$10$zv3jcR.WwoIjjvdxxalYqe7jSblWSKyKnKBHfsfCpEIFBs1y8tzfG', 2, 1, 1623378695),
(5, 'Alex', 'alex@gmail.com', 'default.jpg', '$2y$10$AfuqHsO9otj6B0XtYzlp4eZK7ysTp3gvktYAVS6Fk.bGQivH.3xuu', 3, 1, 1623379194),
(6, 'budi', 'budi@gmail.com', 'default.jpg', '$2y$10$u51IOQR6oVtx8YyqTX0Nc.d13L6njL1pyGndmXmYQoKKNEwfdyL.O', 4, 1, 1623381612);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(6, 3, 2),
(7, 4, 2),
(8, 1, 3),
(10, 2, 7),
(11, 3, 7),
(12, 4, 7),
(13, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Tugas'),
(3, 'Menu'),
(7, 'User'),
(10, 'User2');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Videographer'),
(3, 'Fotographer'),
(4, 'publikasi');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 7, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 7, 'Edit Profile', 'user/edit_profile', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(9, 7, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(10, 2, 'Dashboard', 'tugas/dashboard', 'fas fa-fw fa-tachometer-alt', 1),
(11, 1, 'Daftar Tugas', 'admin/daftartugas', 'fas fa-fw fa-folder-open', 1),
(12, 2, 'Daftar Tugas', 'tugas/daftartugasmember', 'fas fa-fw fa-folder-open', 1),
(13, 1, 'Tambah Anggota', 'admin/tambahanggota', 'fas fa-fw fa-user-tie', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggotadatang`
--
ALTER TABLE `tbl_anggotadatang`
  ADD PRIMARY KEY (`id_anggotadatang`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_anggotadatang`
--
ALTER TABLE `tbl_anggotadatang`
  MODIFY `id_anggotadatang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
