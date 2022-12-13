-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 01:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konseling`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `nim` bigint(40) NOT NULL,
  `minggu_ke` int(11) NOT NULL,
  `senin_a` int(11) DEFAULT NULL,
  `senin_i` int(11) DEFAULT NULL,
  `senin_s` int(11) DEFAULT NULL,
  `selasa_a` int(11) DEFAULT NULL,
  `selasa_i` int(11) DEFAULT NULL,
  `selasa_s` int(11) DEFAULT NULL,
  `rabu_a` int(11) DEFAULT NULL,
  `rabu_i` int(11) DEFAULT NULL,
  `rabu_s` int(11) DEFAULT NULL,
  `kamis_a` int(11) DEFAULT NULL,
  `kamis_i` int(11) DEFAULT NULL,
  `kamis_s` int(11) DEFAULT NULL,
  `jumat_a` int(11) DEFAULT NULL,
  `jumat_i` int(11) DEFAULT NULL,
  `jumat_s` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `nim`, `minggu_ke`, `senin_a`, `senin_i`, `senin_s`, `selasa_a`, `selasa_i`, `selasa_s`, `rabu_a`, `rabu_i`, `rabu_s`, `kamis_a`, `kamis_i`, `kamis_s`, `jumat_a`, `jumat_i`, `jumat_s`) VALUES
(7, 163, 1, 48, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 163, 2, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 163, 3, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(10, 163, 4, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1),
(11, 163, 5, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 163, 6, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 163, 7, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 163, 8, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 163, 9, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 163, 10, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 163, 11, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 163, 12, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 163, 13, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 163, 14, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 163, 15, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 163, 16, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `topik` varchar(100) DEFAULT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `smester` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `username_history` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `id_pengirim`, `id_penerima`, `topik`, `isi`, `tanggal`, `smester`, `status`, `username_history`) VALUES
(40, 16319075, 6, 'Nilai Bermasalah', 'bu nilai saya apa bisa di perbaiki?', '2022-09-20 19:29:25', 6, 'Sudah Selesai', 'Darojatun Genova'),
(41, 16319075, 6, '', 'untuk itu bisa menghubungi dosen yang bersangkutan ya dek', '2022-09-25 15:34:38', 0, 'Sudah Selesai', 'Nur Sakinah'),
(42, 16319086, 6, 'kehadiran', 'fahmi, kenapa kehadiranmu kurang dari 60%? ada masalah?', '2022-09-25 15:36:48', 5, 'Belum Selesai', 'Nur Sakinah'),
(43, 16319061, 6, 'Nilai Bermasalah', 'assalamualaikum', '2022-10-03 15:23:56', 5, 'Belum Selesai', 'Eka Dianti'),
(44, 16319061, 6, '', 'eehejkkedkrj', '2022-10-03 15:24:59', 0, 'Belum Selesai', 'Eka Dianti'),
(45, 16319075, 6, '', 'Bu, saya hari ini tidak mood untuk mengikuti kelas pak Fahmi karena beliau ', '2022-10-03 16:03:00', 0, 'Sudah Selesai', 'Darojatun Genova'),
(46, 213, 4, 'sdasd', 'sadsa', '2022-10-08 16:58:19', 2, 'Belum Selesai', 'a'),
(47, 213, 17, 'asd', 'sad', '2022-10-08 16:59:15', 5, 'Sudah Selesai', 'a'),
(49, 213, 17, 'new', 'asd', '2022-10-08 17:10:19', 3, 'Sudah Selesai', 'a'),
(50, 213, 17, '', 'asds', '2022-10-08 17:10:31', 0, 'Sudah Selesai', 'a'),
(51, 213, 17, 'TOpik baru ', 'asdsad', '2022-10-08 17:11:42', 6, 'Sudah Selesai', 'a'),
(52, 213, 17, '', 'sdaas', '2022-10-08 17:12:15', 0, 'Sudah Selesai', 'a'),
(53, 213, 17, '', 'sda', '2022-10-08 17:12:35', 0, 'Sudah Selesai', 'riko'),
(54, 163, 17, 'asd', 'sad\r\n', '2022-10-08 18:18:24', 5, 'Sudah Selesai', 'riko'),
(55, 163, 17, 'sad', 'sad', '2022-10-08 18:19:54', 2, 'Belum Selesai', 'riko');

-- --------------------------------------------------------

--
-- Table structure for table `chat_grup`
--

CREATE TABLE `chat_grup` (
  `id` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `id_pengumuman` int(11) DEFAULT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `smester` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `username_history` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_grup`
--

INSERT INTO `chat_grup` (`id`, `kelas`, `id_penerima`, `id_pengumuman`, `isi`, `tanggal`, `smester`, `status`, `username_history`) VALUES
(24, '3b', 17, 4, 'sad', '2022-10-10 23:43:22', 5, 'Belum Selesai', 'riko'),
(25, '3b', 213, NULL, 'oke bu', '2022-10-10 23:57:19', 0, 'Belum Selesai', 'a'),
(26, '3b', 213, NULL, 'mantap\r\n', '2022-10-10 23:57:23', 0, 'Belum Selesai', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nohp` varchar(16) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `username`, `password`, `nama`, `nohp`, `foto`, `kelas`) VALUES
(163, 'Marifat Hakim', '$2y$10$ooHboUjs82baxX7k4TXcteVgWnWyXf6X1lK0fiLDXkmjJAm6N3Rb.', 'Marifat Hakim', '', '631eb8594b1f6.png', '3b'),
(213, 'a', '$2y$10$33QFTaukz9/WShv1B3UeleAvUS4gjR6wmS7SGURfP7.BsbY8Tom46', 'a', '123', '63412d4ac372e.png', '3b'),
(1632058, 'Nurkadri', '$2y$10$sv9nU8x22YhRauApqxOvp.pdjKWu5yd/hRE/Vu2ZP5Holw.6KrRGe', 'Nurkadri', '', '631ec8b7b7b3b.png', '2a'),
(16319001, 'Seviana', '$2y$10$Bhg3hDeZBwGbFfeOS5zh2OW53zki6BfvBCTWh8mfoTrrEY8vWfI6e', 'Seviana', '', '631eb8f1be0f2.png', '3a'),
(16319002, 'Humairoh A. Aisyah', '$2y$10$BJOp1aWD588315vlHSUhbeOli.eri.yZgUDHS0CjOoKcXhwQdwjIO', 'Humairoh A. Aisyah', '', '631eb9059c749.png', '3a'),
(16319003, 'Ananta Sukarno', '$2y$10$qs.3j1vxoRDfI96CuVaiYuUmch3KgFxmnErSSe4oE4ytHZ0Dj440C', 'Ananta Sukarno', '', '631ebc5216ef6.png', '3a'),
(16319004, 'Putra Armando', '$2y$10$uaifP32GQ1AEkOXFHjzhFualSrtD8yKjl8pHU9FaPqhRsx/M0gXOK', 'Putra Armando', '', '631ebc3887233.png', '3a'),
(16319005, 'Ismun', '$2y$10$UCJ88XoP3TjHwWhDiyEWl.igZ5GE8qjy5jg3bZooAlY7YPxLBzhMy', 'Ismun', '', '631eb80d5e9e6.png', '3a'),
(16319006, 'Kasmiruddin', '$2y$10$CK9oARF8Q8fNCxgVctsuUueksjfAt5aggONfxQnjm9kLKpOUjREp2', 'Kasmiruddin', '', '631ebc1b17b49.png', '3a'),
(16319007, 'Beato Apprilio Sirwutubun', '$2y$10$/wYTZgWPoaf8oR3DfebTQe58G3RhoPiCzwQbfhiCiq8ZgEijuTpWW', 'Beato Apprilio Sirwutubun', '', '631ebbf8b2679.png', '3a'),
(16319008, 'Megah Melianthy Saba', '$2y$10$erHLtEx9RgBfZkVOOU/nZOxKM9QDps3.o8.z3kZG26U8Z204xRDiK', 'Megah Melianthy Saba', '', '631ebbe0e1d27.png', '3a'),
(16319009, 'Maria Fransiska Dua Ketik', '$2y$10$mVuK68OQFLCF.SkOQzJcj.8lT7NfbVzM.ZfxevVw2LAnP4DHEYcLC', 'Maria Fransiska Dua Ketik', '', '631ebbbfeddec.png', '3a'),
(16319010, 'Nayung Rumanama', '$2y$10$2tz7aeHDU2ySXTmtjHpJhejxw8av/hQfQ34VPgLqhqgL2hnVi/g3e', 'Nayung Rumanama', '', '631eb82083718.png', '3a'),
(16319011, 'Cici Rumalean', '$2y$10$Tq9w.DLpjWFvrFXm8F479.tjmMTwCNivyr9mNTTi4oMC/gMdEAxt2', 'Cici Rumalean', '', '631eb996f0d6d.png', '3a'),
(16319012, 'Jasia Rumaday', '$2y$10$Z21wE2suyQoQmvvInRYWP.S2yUroRHFvMl0P7Zp0r7F/OazKaqwWC', 'Jasia Rumadai', '', '631eb97d568fb.png', '3a'),
(16319013, 'Wa Ode Endang', '$2y$10$Loqb1tr9Ngkb8V1QpYj4GuZiFJVoWP/P6jinlq65PzKOn./zvRtgq', 'Wa Ode Endang', '', '631eb96567db2.png', '3a'),
(16319014, 'Anita Rumasukun', '$2y$10$8j9dCPT9uYlEdddNI637gevuptIeVeabe0DRDevcVj3NnPgAf8iMW', 'Anita Rumasukun', '', '631eb94dc11a4.png', '3a'),
(16319015, 'Abdolah Iribaram', '$2y$10$PMb81undqnq7TRbFeUVcq.sxO9kQIFj3UKrJAcPN4e.mx/sE8GebO', 'Abdolah Iribaram', '', '631eb933209c9.png', '3a'),
(16319016, 'Hajija Yanti Kella', '$2y$10$axePMFFdRXTlhdFQBsNKeu/eKcsYhEkLJsGWFLCt18Zgmv8mvji5.', 'Hajija Yanti Kella', '', '631eb9183a2ea.png', '3a'),
(16319017, 'Oyang Zianab Ismail', '$2y$10$cfDekD.Gy3rQDeW9EFRufOpQeyhOvIXYOWXOPFlxTvsCwRVlp83Ii', 'Oyang Zianab Ismail', '', '631eb8e035ecd.png', '3a'),
(16319018, 'Ismail H.Ali', '$2y$10$sEsQrstxH7Qz71.MJoRNGOwwGEcT6UAe40yLivnqcNB5KBauXWVVm', 'Ismail H.Ali', '', '631eb8ca79dad.png', '3a'),
(16319019, 'Wafitri', '$2y$10$Uh49DIWytotheFdxZr4rJOgpUIUILmu5nOG7PQiGKglNIyzM3l4x6', 'Wafitri', '', '631eb8b7be853.png', '3a'),
(16319022, 'Nining', '$2y$10$.5Xoop8czhtl7cQCmArEdOiFN/0ecP9oHJ7.uE9s3p/4ebKLKEPk.', 'Nining', '', '631eb89d31dac.png', '3a'),
(16319023, 'Irma Krisanda Rumthe', '$2y$10$XRU4kAC.x/8r.yQLukFYTe2025fSAu4ZbdSXrF7Z7KyUQHmWEqs0m', 'Irma Krisanda Rumthe', '', '631eb88bd52b7.png', '3a'),
(16319024, 'Fatima Rumaminanan', '$2y$10$LnibDv8eG9ops8zl1YwiTO92lXyh2kVhr3ZWRumrTwwzEqF9OKdS6', 'Fatima Rumaminanan', '', '631eb87452a2f.png', '3a'),
(16319025, 'Icha Ashari', '$2y$10$2IBT.2LOvDmYARpwZQ2Fn.3gJjDDtL5luiTX54fENGTC.7lHYc5dm', 'Icha Ashari', '', '631eb844a3625.png', '3a'),
(16319026, 'Andriannengsi R.S', '$2y$10$7spfkKAhd4/qP2RIvwc6EeVz4/w/fLZ//KSQyutCs7vXMU4Z.LOYq', 'Andriannengsi R.S', '', '631eb7804bec5.png', '3a'),
(16319027, 'Rahmawati Nur', '$2y$10$g2JMtqOG/Izhh/8xf.3B2uhQaAdLt38SaKGdYu7gu6a0t3bN7/j8y', 'Rahmawati Nur', '', '631eb767ba019.png', '3a'),
(16319028, 'Febriyanti Mulyono', '$2y$10$SgG2ArzidD9jr8g5QpmA2uF0.Go1npB/2Avz3jIrPkT2.FuaNCaDm', 'Febriyanti Mulyono', '', '631eb7331704e.png', '3a'),
(16319029, 'Nasruddin Rumlus', '$2y$10$2fKq6rpX7MO.vaPL9ke8LeYplbRNvB4Gfl0lX/lZ8CUJgPrSYfCVu', 'Nasruddin Rumlus', '', '631eb70e32449.png', '3a'),
(16319030, 'Mursam  Yusuf Juneydy Rengen', '$2y$10$LF20CtFXUJaWV0Wayp7t/u1CP.pK5SFLQGHWP7PhYEyB9bF3.K6y.', 'Mursam Yusuf Juneydy Rengen ', '', '631eb6f796ec9.png', '3a'),
(16319031, 'Wulan Rumbati', '$2y$10$oWfvq2OeeCrTFAH2HE0cvOzWfyuiHmsZ/lKBtEHOjWChADdM6Swea', 'Wulan Rumbati', '', '631eb6e5b0a5c.png', '3b'),
(16319032, 'Irmayanti', '$2y$10$SnC7uVtMM.XndFT4WPx5UeT5ehw5rzH25EUJQ376XlO4UKBpaYnum', 'Irmayanti', '', '631eb6ce736a9.png', '3b'),
(16319033, 'Abu Sofyan Tianotak', '$2y$10$VlnMoN7eXYJD9AxXTWrHteOcyYSB7RcFK3YJxMBOv54zdhe9JadwK', 'Abu Sofyan Tianotak', '', '631eb6bb28f84.png', '3b'),
(16319034, 'Rahma Aini La Ramli', '$2y$10$bdSL8IEs/1W2sJwNtO1VQ.w9c4Hh7H9hOHwgNlZjRzbfW2khP.UNi', 'Rahma Aini La Ramli', '', '631eb6a110da9.png', '3b'),
(16319035, 'Adittrianggi Fakrianjaya Mulyadi', '$2y$10$VoSDnibsGpnhISdN.RTWG.SXyFIWcdYwtpWdmmcvPetj2oW69WgBy', 'Adittrianggi Fakrianjaya Mulyadi', '', '631eb68d7fecb.png', '3b'),
(16319037, 'Imam Sofyan Tianotak', '$2y$10$xJXgHOLv7/lN4wM7vDofAOuYsjPu1w2fC55N7isMNeac.kdPrhWhu', 'Imam Sofyan Tianotak', '', '631eb67972685.png', '3b'),
(16319038, 'Suci Salsabila', '$2y$10$PtDQ0t.MLvW.GG8fyD9Yv.E3QqsrdcdEtnN6O7kU9Bu/Tklp6hU8u', 'Suci Salsabila', '', '631eb666e4e94.png', '3b'),
(16319039, 'Mohamad Zulkifli', '$2y$10$6ZKIio/c1waxUiwq2q7CludCdEEb6sIKzkOQDxaxzwjHn6aLs18wK', 'Mohamad Zulkifli', '', '631eb65123bed.png', '3b'),
(16319040, 'Ayuning', '$2y$10$szaNDVJvZGgch3VgcJsc1O4mLX8R9g4xo83t7a1jxXbm7ey0eD2Tm', 'Ayuning', '', '631eb63cd5712.png', '3b'),
(16319041, 'Esterlita P. Tendean', '$2y$10$6WRna3osTX1R4aCZHlpodeuEyjIzRuXT9JL/JUavom/QJ26Pim1ty', 'Esterlita P. Tendean', '', '631eb6274768b.png', '3b'),
(16319042, 'Anastasia Pare', '$2y$10$FBE2xDB.i.l8qRKRlTrsyudRRVvJSjbiiF4OhKwOUyMQNSeFBP622', 'Anastasia Pare', '', '631eb60db67d1.png', '3b'),
(16319044, 'Kharina', '$2y$10$YBd4uYqv02ex6fOhCuO8OuV/cO42v1.93Qin4FtgW4AJ3qamZWDme', 'Kharina', '', '631eb5f6838ff.png', '3b'),
(16319045, 'Ahmad Rizal Asnandi', '$2y$10$o3HD7MKFHdfjendRMlYlhuhi5gEYVb5ii4lgtDD0lrFOTM0yFMTKC', 'Ahmad Rizal Asnandi', '', '631eb5e1b4b5a.png', '3b'),
(16319046, 'Maristicha Selvina Tuturop', '$2y$10$aerue/kNRDN4kwOEqzQpYuGZKP3hdhE891p0DyvnJRpJLBbfYMHeu', 'Maristicha Selvina Tuturop', '', '631eb5ccc9e0a.png', '3b'),
(16319047, 'Reni Nur Aini', '$2y$10$doSaDyKfs6GVgotx7HU1PexaPVpvzuFVP2Ipp3Vkl7FyPZh2HGeIK', 'Reni Nur aini', '', '631eb5b934c25.png', '3b'),
(16319048, 'Melky Tandilimbong', '$2y$10$F52KJPN3y5ioAIjQDs3LeeyuBs8um8JYTKexh6J4GYoSTGB4qELse', 'Melky Tandilimbong ', '', '631eb5a351464.png', '3b'),
(16319049, 'Rimal Miftahul Zuhair', '$2y$10$hYO1o0jhH/mtXDr4UVi8aunSIvY8YNQTvWijiMzArdxxHA4Fwk/Q6', 'Rimal Miftahul Zuhair', '', '631eb58c3d9f6.png', '3b'),
(16319050, 'Sitti Radiyah', '$2y$10$kKO10EdLLFrbo9Mj4H.sC.e4Zy9UNzK7XffCkI4gz/b1TRYQCU2x6', 'Sitti Radiyah', '', '631eb5702bcd4.png', '3b'),
(16319051, 'Harvey Tapilahuwane', '$2y$10$znI0y4gxgowaUakD9tEtUOeNQjaU0LulUcmPUPASHELksNHMLp2Um', 'Harvey Tapilahuwane', '', '631eb55602bf1.png', '3b'),
(16319053, 'Walija', '$2y$10$Ooj1IzXV.o3eiel0C6rfYeq69biXxhrtseOMgix4osZetrfO3iiJm', 'Walija', '', '631eb53a3b6f1.png', '3b'),
(16319054, 'Siti Aisyah Nurul Homsyah', '$2y$10$tpE57Q..RUz5MP/RNlPmE.ukBkSTvP3mfnO8.EKMdRG1qi8wj9veK', 'Siti Aisyah Nurul Homsyah', '', '631eb52095e89.png', '3b'),
(16319056, 'Fatimah Kelian', '$2y$10$tDdhiPK8rncVUDztLekUMevOlUsHOAAzi4oTIIy8/QUChyPeiFZgG', 'Fatimah Kelian', '', '631eb50a396ce.png', '3b'),
(16319057, 'Muh. Razak Aslam', '$2y$10$1NOxhrlzT9j.NhZD8lDC7uba815J2Tyo0EHvz.4kCH9DljUMnxGj2', 'Muh.Rasak Aslam ', '', '631eb4f76c89c.png', '3b'),
(16319058, 'La Abdul Rifail', '$2y$10$tlXbm8DycCIX4DbQ5IIldexP7o.m6noFiqh6CODWU2lUgEJc/nc5m', 'La Abdul Rifail', '', '631eb4e3bc03e.png', '3b'),
(16319059, 'Murti Sri Wulandari Bauw', '$2y$10$wDqCvAXJd/DNuMaIhmd.0OHD8Tt67XdoCueisEfhzNA4n8tSHp4ba', 'Murti Sri Wulandari Bauw', '', '631eb4d0dab2a.png', '3b'),
(16319060, 'Rosmina Laode Goho', '$2y$10$DCSzOC/p6bHQ9vVscJhmp.RhTIWLrRQwthqgFS9bpe7ShJf/7WBpu', 'Rosmina Laode Goho', '', '631eb4bc05374.png', '3b'),
(16319061, 'Eka Dianti', '$2y$10$oSlZ1Xv.VLe2UvKZzq8hBuZJerYmCKZabG0BA5jvEbvRznXXigaeS', 'Eka Dianti', '081356352134', '62d50b883c504.jpg', '1a'),
(16319062, 'Neneng Fuad', '$2y$10$9jXHh14sZ.27kzZ0puFDZeYlCpBBO6r5IHlVujTOtfDJgbxoLozv.', 'Neneng Fuad', '', '631eb4a536046.png', '3c'),
(16319063, 'Sumardiati Lakoro', '$2y$10$WHzSjHn9aUcefyI0EzvDuOsLW83TY0.HIV8Xgub4hasPygJHlzC/K', 'Sumardiati Lakoro', '', '631eb49249c1e.png', '3c'),
(16319065, 'Isnawati Rumasukun', '$2y$10$sMkr6R1ta1iQ0TWvw57DY./gITqygYx4cldhBht7C/AFmTaAkVmFO', 'Isnawati Rumasukun', '', '631eb47f2dfb4.png', '3c'),
(16319067, 'Ririn Renyaan', '$2y$10$YNdQCuoWEPdc1yFRfsF33.gu8kDez2z/aWJ1NLPefVzBIIIlrKdKa', 'Ririn Renyaan', '', '631eb46b43e58.png', '3c'),
(16319069, 'Fadita Rinilda Ismail', '$2y$10$.q97RiLn65uMbZrp94NcLOwgBU3fVqfco8u0nMdAIXe8V8RnGGen6', 'Fadita Rinilda Ismail', '', '631eb456a73b2.png', '3c'),
(16319070, 'Jitro Konoralma', '$2y$10$NDijm95Btzi9z/hqgniFUOzWprWySuTHsIbn7yrVNlfMW1gBCRPNm', 'Jitro Konoralma', '', '631eb44316c3d.png', '3c'),
(16319071, 'La Ode Ofan', '$2y$10$BJDoYt0cdtfmT86A5l1REuyXA64JuAKizCJZkZ0hVQzz7V35bSpR.', 'La Ode Ofan', '', '631eb43107904.png', '3c'),
(16319072, 'Buyung Ode', '$2y$10$KV6dlSfzokgIOAFsxjxaAOqB7f/.rhxPj0YmMIoEzkYXYV0iDLps.', 'Buyung Ode', '', '631eb4126a381.png', '3c'),
(16319074, 'Fitriani Aisyah Putri', '$2y$10$fmTtNP7aMA4Uri8y3bq.9ukMsC4xigkUlz/6RosI0/qst4Q4TbuVi', 'Fitriani Aisyah Putri', '', '631eb3f4cf892.png', '3c'),
(16319075, 'Darojatun Genova', '$2y$10$lqUcbHkKu3ebJEMRMBjBSeAsWIEp0sEF/wjvhVmW7gxg5cKa2Y3Dm', 'Darojatun Genova', '081248247020', '62d50ca2b30a3.jpg', '3c'),
(16319076, 'Rahmi Ariyani Rumuar', '$2y$10$x02UXOj0gFwuj0X82j.F9.on4TUW0cOAuPEtFrCZRCDZwZ8su.umq', 'Rahmi Ariyani Rumuar', '', '631eb3deda33c.png', '3c'),
(16319077, 'Jihad Kilian', '$2y$10$VioarnwjJ5MOkHjD0cK/e.zAouq12GZDvCtCiqNfy27W0yVa3589y', 'Jihad Kilian', '', '631eb3c6b8ee8.png', '3c'),
(16319078, 'Hadijah Rahareng', '$2y$10$uTWTwRYMJonhkRbTBR8kAuT/cjMAM.MujxKdsAOWeWJm42wOLXRkO', 'Hadijah Rahareng', '', '631eb3b0ed3f7.png', '3c'),
(16319080, 'Riski Iman Amansyah Ali', '$2y$10$1ZW/8B.41F19JViRpe.N/.Xoqk9MEGVxV4ACCJI4TnEaAy68wNveu', 'Riski Iman Amansyah Ali', '', '631eb397bf6af.png', '3c'),
(16319081, 'Firda Aprilia rumina finbay', '$2y$10$6ivOdSTRbLe80.eyUf384OTVGgfDx4bNXKfKiytVCi5Il3E24UBwG', 'Firda Aprilia Rumina Finbay', '', '631eb37f8f90f.png', '3c'),
(16319082, 'Asriani Rumbouw', '$2y$10$i8sj6r5q6ne2VAxNFTHrfeI14GaZ7dJad2gvQFV8631kejXT7iBJm', 'Asriani Rumbouw', '', '631eb32bc6ad1.png', '3c'),
(16319083, 'Rifaldy Pagesa', '$2y$10$hnpvyqArVChycK4h3HrPCu7qBlfH.Y8cKvHxO.WFKhjbuScEZ5z..', 'Rifaldy Pagesa', '', '631eb316bea40.png', '3c'),
(16319084, 'Dwiky Prasetyo Tila Ardian', '$2y$10$aAra4l.el0WO51QL1qpP9.4bGqczkYKyuNUr/YRFMn/d5wR9GLb3G', 'Dwiky Prasetyo Tila Ardian', '', '631eb3047286b.png', '3c'),
(16319086, 'Fahmi Abdul Faisal Rumaf', '$2y$10$cFBNmu6Vi70bPCFcNnRbrulL6.x55N3R7UmWhwD4nnRQlTqRaYJGu', 'Fahmi Abdul Faisal Rumaf', '', '631eb2ecd3de0.png', '3c'),
(16320002, 'Siti Hasnah Kilian', '$2y$10$KVSw1mwCJG7ljyB/31tKFuBHeHsHS4W1MHZx.pAcNgbWhfmE7e7Ie', 'Siti Hasnah Kilian', '', '631eb2db0a9ea.png', '2a'),
(16320003, 'Rahmalia Dout', '$2y$10$Abpkdsxcyjdl/kAHYpuYyeCuKO8Dgz0a1EqIGjkVLxk8dto1SRgQ.', 'Rahmalia Dout', '', '631eb2c74ce60.png', '2a'),
(16320004, 'Sheila Kadir', '$2y$10$k5j2UFdLzunAAXaDoC0lOOg9bmrN/8XuvAFqGCv7B.5rAyRM9kxiu', 'Sheila Kadir', '', '631eb2af97f59.png', '2a'),
(16320005, 'Rossalinda Aryanti', '$2y$10$EDE1oJlJxRmhBVG.78YcYeEp2OZ50UWGFjDiqfBThG/iZJBq9Eqne', 'Rossalinda Aryanti', '', '631eb299a79dc.png', '2a'),
(16320006, 'Hafsah', '$2y$10$kIBUpavCQ9GrM9EKoNeBpe3PHPNXl2DQBJmBOvIRWjxEPwhxofFk.', 'Hafsah', '', '631eb2860ea86.png', '2a'),
(16320007, 'Wa Rahmi', '$2y$10$q5aAtNsig2EP/sMQcnW20ePaaRgamAjK55.cizUki1Ti52qt6H8ra', 'Wa Rahmi', '', '631eb26ca683e.png', '2a'),
(16320008, 'Frangklyn Bery Nikson', '$2y$10$Uvb.CgzIdQodazsbIcRZFeM58xhGTg6fbABaPgOtid1FO7nidkgpG', 'Frangklyn Bery Nikson', '', '631eb25b1e55b.png', '2a'),
(16320009, 'Wa Fitri ', '$2y$10$.gQXv0EXLwYh/9bayPsRKO3MDiY1ZazdYTCHUAiCAvRVj7eh4Xhrq', 'Wa Fitri', '', '631eb23a397be.png', '2a'),
(16320010, 'Dwi Hardianty La Iji', '$2y$10$zQz4dfrxXteHXFXk2fDSMuXuwpkTs2H8C4t.9oPVXAQVaQdz2gXF6', 'Dwi Hardianty La Iji', '', '631eb224586f5.png', '2a'),
(16320011, 'Monggalina Bahamba', '$2y$10$qjoE5pnYok6YokF9fk4AXuFdhWi2MXiQgd/27sBA4WFQpQXV7/Aw2', 'Monggalina Bahamba', '', '631eb20a63085.png', '2a'),
(16320012, 'Fitria Pelu', '$2y$10$NWNeltlTPsuyFkQSJdhKMeKfRLTroTm/ino3Vq5ti/AjMdQUDR8G2', 'Fitria Pelu', '', '631eb1f6361ff.png', '2a'),
(16320013, 'Fatma Mahu', '$2y$10$9.qFyslGqvzX0jrRdcMfoOGyToPQzUv.W5C.IvG/udWe3grw1OEG2', 'Fatma Mahu', '', '631eb1e212176.png', '2a'),
(16320014, 'Umi Kalsum Weripih', '$2y$10$tf.mfL18sjpO2gewVDbpLeeAxS3fhYFy7vT1bIRualQ0QAPW/EizK', 'Umi Kalsum Weripi', '', '631eb1ce89716.png', '2a'),
(16320015, 'Ilham Rachman Halim', '$2y$10$eQP.KD31XtV..gcYU3KkQecams48Og.FIs4627EQCp4Fax5xMwhnu', 'Ilham Rachman Halim', '', '631eb1b78ede2.png', '2a'),
(16320016, 'Rusmiati Bugal', '$2y$10$NgMycc6ydJKIJ1LTCBK9cOvY2zySevPyzcDtIAEBcFFMS/V.JQZ9K', 'Rusmiati Bugal', '', '631eb1a2a094f.png', '2a'),
(16320017, 'Wa Ode Siti Rahmawati Shakila', '$2y$10$XUCo8idwmAxHn9agnmLLlOdzF38dR4dgk8zb1..psk9IEtro0ij0K', 'Wa Ode Siti Rahmawati Shakila', '', '631eb18181d7a.png', '2a'),
(16320018, 'Lutfi Al Zubaidi ', '$2y$10$3VEKfGsk7egRym3R0SaLd.LsCWgJrQKCe5Baa9nF6ErQzT1SPj8EG', 'Lutfi Al Zubaidi', '', '631eb171c68fa.png', '2a'),
(16320019, 'Anafia Rumasukun', '$2y$10$9hcS8/o3JofpEBhAg70eZ.azULmCvE6X1vv2pQjOqlyHE/ewhbIjK', 'Anafia Rumasukun', '', '631eb16097c53.png', '2a'),
(16320020, 'Yogi Arta Wardana ', '$2y$10$hFsOCociA7g9U/ndlyq1a.jJMXkmUocxdth3bKLQ5Ci2ifhKjVI4S', 'Yogi Arta Wardana', '', '631eb151d6423.png', '2a'),
(16320021, 'Manistasyaro Maryam Sohilaw', '$2y$10$zjpghLLT8RzBmlB9HGrI4OJyquqoWNvL6R16jz9tSEY8dy0HYqQBG', 'Manistasyaro Maryam Sohilaw', '', '631eb13d8f5fd.png', '2a'),
(16320022, 'Susan Nadia Maswain', '$2y$10$8CjHUyti8p0OcG8juQAc5.jR.SQyk.I6GBQKPCqEvooZbLmBlZim.', 'Susan Nadia Maswain', '', '631eb12f22cb3.png', '2a'),
(16320023, 'Indri Rahayu Ramadanti', '$2y$10$rfXVr1kw7dRD3kYVLe2FseqVpgYwJSjBATKX4IcjEGoBk603qinTa', 'Indri Rahayu Ramadanti', '', '631eb11c3f2e1.png', '2a'),
(16320024, 'Nathalia Maryke Resbal', '$2y$10$yGSfNh./VB5qHhJ/Ll6lte546UuevjT2L6TLUnq2T71z/5clfT1NW', 'Nathalia Maryke Resbal', '', '631eb0e575f0e.png', '2a'),
(16320025, 'Jellyn Stefani Resbal', '$2y$10$th6fSf.WmDyOFmrLn/A6nuJXohyKQ3/T7JthYXURwvf4BC2Lkveku', 'Jellyn Stefani Resbal', '', '631eb0ce09b6e.png', '2a'),
(16320026, 'Nabillah Zulfah Uswanas', '$2y$10$0H3rNINM7s5VwV8qIQwqLunFGdVXh0Rsz5p7ceOe41exdK4yzyKWS', 'Nabillah Zulfah Uswanas', '', '631eb0ab5edd8.png', '2a'),
(16320027, 'Siti Hajar', '$2y$10$5etSt67.5.Z9dZgbZlFokuaVTZrX1UGas9TcnXS9Yi8D2oB4cgI36', 'Siti Hajar ', '', '631eb08f09952.png', '2a'),
(16320028, 'Siti Wahdatul Khasanah Bair', '$2y$10$5cZ3PETz80nMoU7xMdBr/OsRdqCtqq5xLIEdwGzitmnvl4DdAPGq6', 'Siti Wahdatul Khasanah Bair', '', '631eb0761b447.png', '2a'),
(16320029, 'Cahya Nur Rolan Niah', '$2y$10$VytydFOg.OXVLfCcw6c7iuAeLEDFi/IE94icskWVa2ka0BUiCNu56', 'Cahya Nur Rolan Niah', '', '631eb06096edb.png', '2a'),
(16320030, 'Milani La Jainal', '$2y$10$V6IxflRFeZzcLzqY.K3HBurfZnaFUCSSdOaymsY7xzjJug1a3CpDW', 'Milani La Jainal', '', '631eb04449ff7.png', '2a'),
(16320031, 'La ode Syaiful Jamani', '$2y$10$zVg9SRbd3ajWKJpIK2rVaOMfx0N0.Y6zk84JHdVWMUEtJFBG.QVMi', 'La Ode Syaiful Jamani', '0000000000', '631ebdc933e2c.png', '2b'),
(16320032, 'Asma Rasay', '$2y$10$oVdnqZqFqknVZeKIY7Qye.0fjyW2ENjJTfOb9Cf.g8pMTfLbUmIZC', 'Asma Rasay', '', '631ebf0612aca.png', '2b'),
(16320033, 'Rindiani Armelia Aswin', '$2y$10$zIVdi/ztvaBq/RE8gPe7re9CoDwgblqR1Ij9ETesRmeL66LYZmkuu', 'Rindiani Armelia Aswin', '', '631ebf57b7589.png', '2b'),
(16320034, 'Mega Tofir', '$2y$10$pYa3L71zwSsgNX3uG.gDEOLmyjyXuVkh56VktVSj3msauBdiU60mG', 'Mega Tofir', '', '631ebf92d789e.png', '2b'),
(16320035, 'Nurfadillah', '$2y$10$mmklVTgEbLeZYpPX4VsekO4EjMFGBYy0SVHStRc3ViNTR8ovi83zK', 'Nurfadillah', '', '631ebff25d56e.png', '2b'),
(16320036, 'Suryati Mohmiangga', '$2y$10$G./fn0chJt0EDWpjfK.cS.Hl8rxaKGVrCiV0N4hxw4FecShXIJmo.', 'Suryati Mohmiangga', '', '631ec04b14c7d.png', '2b'),
(16320037, 'Melkianus Urin lewuk', '$2y$10$aUR6Aws9ocUR4WrByYfQ9uxnndU960jEIYPIpI7wTRo1O0N9jrqAS', 'Melkianus Urin Lewuk', '', '631ec09c2bd3d.png', '2b'),
(16320038, 'Putri Ayu Fadilawati', '$2y$10$AYCXWGcelNn2SUrbQDg3Feugt4HoUssrzwiUDyPkL.itDWXAtu31m', 'Putri Ayu Fadilawati', '', '631ec1228c823.png', '2b'),
(16320039, 'Sinta Jasica Josefina Falden', '$2y$10$kyAknYXNJW4sl0in65dR1Otndtu2FBNhrU2gMz6uukCnylPU4KLgS', 'Sinta Jasica Josefina Falden', '', '631ec18ac9f70.png', '2b'),
(16320040, 'Marazzi', '$2y$10$7LDDo//eOECF/VZ93jPeMeutXb511j5Bw3XZOF4HLjPHxThWD3YUm', 'Marazzi', '', '631ec1dab16b4.png', '2b'),
(16320041, 'Grace Angeline Henggiyana Talla', '$2y$10$opI1mLXuknH6rqUGyEa6EOga18IlETmfpqYlxJIGPrk5fCnBA52tW', 'Grace Angeline Henggiyana Talla', '', '631ec25404cc2.png', '2b'),
(16320042, 'Carmenita Luvina Rahangiar', '$2y$10$714rQsecdhtZlAc7nVpwNeHqtuy0GbsAwGY10GjYgjTxSoHOvQHQK', 'Carmenita Luvina Rahangiar', '', '631ec2af2e44c.png', '2a'),
(16320043, 'Theresia Mersi Clarita', '$2y$10$7UfuAa4CfSOMjd/8ibpPwevD18m2QLy2qb/khMJk4cQFSiHmx336e', 'Theresia Mersi Clarita', '', '631ec3356d7c6.png', '2b'),
(16320044, 'Irawandi', '$2y$10$7Sm83ZUy6CPDwTdR19JCfOQpocRdZlTNXftAcisEbjAECZoqE03s2', 'Irawandi', '', '631ec3753ed9b.png', '2b'),
(16320045, 'Adithya Yudi Dharma Eka Putra', '$2y$10$PGVc36DZhZoeSGF74aUPAeRcKXsH9bpqb.8fWP.RXbpv92MusIcfW', 'Adithya Yudi Dharma Eka Putra', '', '631ec3da46914.png', '2b'),
(16320046, 'Faliega Beatha Kabes', '$2y$10$RO3M2UKbwzPv3grLKNmizeqXCR26NwPr8I1bsQmC.S8BTd5Z633ji', 'Faliega Beatha Kabes', '', '631ec45ec4971.png', '2b'),
(16320047, 'Putri Nurul Moebbrey', '$2y$10$ENO7Q9Yz2aRqMKPR5dLJLuuk82OFdbek2qzaf3S8jpYcs66DUMkfO', 'Putri Nurul Moebbrey', '', '631ec4abc74aa.png', '2b'),
(16320048, 'Khafi Aulia Rumuar', '$2y$10$pemC3WlxGp61rML1X4PQZ.mpJrU8WZDddZ..WSerGRoXD4Zl3fos.', 'Khafi Aulia Rumuar', '', '631ec509d9943.png', '2b'),
(16320049, 'Arabia Rumalolas', '$2y$10$wws3I920kIQ05NAKddkyuuPkEgIzRJvDkgg7zYLFNmDYpJLEL.VeO', 'Arabia Romalolas', '', '631ec55b09064.png', '2b'),
(16320050, 'Syarifah Rugaya Alhamid', '$2y$10$cyHBpr79iPcyTh9abvfetuzWx7bAlDjpsFSTlx9En2kKo3As9nGz2', 'Syarifah Rugaya Alhamid', '', '631ec5e101419.png', '2a'),
(16320051, 'Indah Rumuar', '$2y$10$FIJH.8HXg4jjlcVfiwd4POuQckrO4ANucSort9b7w/IbUdEwi.Ez.', 'Indah Rumuar', '', '631ec621e5cb3.png', '2b'),
(16320052, 'Kristi Rahalus', '$2y$10$oPmICPlNTjlzMGteHkWukeNOU8hgJY0VJ10NWWyM75wPC7B7sHjUu', 'Kristi Rahalus', '', '631ec660c2390.png', '2b'),
(16320053, 'Mifta Nurjana Rumatiga', '$2y$10$RYSuVvpnhLfnFmjo9dzW2u7M87lhxaYlQxyP9TwVxhPDEPZmrvTHy', 'Mifta Nurjana Rumatiga', '', '631ec6bab0d63.png', '2a'),
(16320054, 'Sartika Urath ', '$2y$10$lHLF18L19OXTESi0cNPnyO4pJIQkaaUGipgHOkqnMc5.w5aMFjAVG', 'Sartika Urath', '', '631ec7227a7b9.png', '2b'),
(16320055, 'Haerunnisa', '$2y$10$z0a9hijndghdn3FTiMPlVevIw06RvlVy9QD1pI9FokeSIzOyw9XsO', 'Haerunnisa', '', '631ec764ad653.png', '2b'),
(16320056, 'Jubeda Kakat', '$2y$10$ieFp8Zd/Pff5lWHdgnO9C.O1D05qzEHRE8ZpS0xF/1PBhhdwjqpbK', 'Jubeda Kakat', '', '631ec79e17e4a.png', '2a'),
(16320057, 'Nindy Pemy Rahanra', '$2y$10$NqZdy5gnUK9B9OuKHIaVCu9VqiCoPNC5KziCivNegQKk8HJPfza4G', 'Nindy Pemy Rahanra', '', '631ec87e22071.png', '2b'),
(16320060, 'Indah Nurul Afriliani', '$2y$10$DMmSMvrYzV28bkfAu2m1LeukaHYTPODcNHA3sM/ApaGMZtLviCDJy', 'Indah Nurul Afriani', '', '631ec90bf0d8f.png', '2b'),
(16320061, 'Wulandary Aceh', '$2y$10$YrY8QNdRLIVynxd.ceeaz.SAD12AgTnGeNPhRV0/AE1rHs7.I4HIm', 'Wulandary Aceh', '', '631ecae0a1fd2.png', '2c'),
(16320062, 'Samalay Ubay', '$2y$10$KYe1FSgaQ95PLlHA7J7IbOfWe7.MJQ.A5xv49TutAQ7tZUtZscLLC', 'Samalay Ubay', '', '631ecb0ee1be6.png', '2c'),
(16320063, 'Muhammad Ikbal', '$2y$10$U36U561hGswo2Kyu09r7kOu5Mdaid.pkaIVvN2IG61YptPhujghvu', 'Muhammad Ikbal', '', '631ecb559e541.png', '2c'),
(16320064, 'Sudirman Ladese', '$2y$10$VpEGHfDPp/aYzDfyAG18Y.v5ZOvqs3C3uejacMHELAkmhZH2lXpZq', 'Sudirman Ladese', '', '631ecb8e4d8f9.png', '2c'),
(16320065, 'Irmayani Bahar', '$2y$10$XscFV4Aj2f0okGxEQmaqEeWfvoCX8Pb52tA7YgXUnhA2YhDfB8D3m', 'Irmayani Bahar', '', '631ecbd22ad1a.png', '2c'),
(16320066, 'Esterlina Anggriyani', '$2y$10$UrtKMSi/taRWgNFTKOkGDORP1RP41eNDgBeuRiVyzpFnB0ViE2ijG', 'Esterlina Anggriyani', '', '631ecc2439716.png', '2c'),
(16320067, 'Zulfah Indra Wabula', '$2y$10$rPrPOhYvicgrK7z45Q40/.lLBw3Rfch3HVA9SA/ZQSHr6oyq07plC', 'Zulfah Indra Wabula', '', '631ecc7017bc9.png', '2c'),
(16320068, 'Aldy Basir Patiran', '$2y$10$Z1NzPpbY2tRyNqR1mtbyWuhWjzv4YyanntEx5aX1GKl3NiNzUxmi2', 'Aldi Basir Patiran', '', '631eccc6e6758.png', '2c'),
(16320069, 'Andi Bulaeng', '$2y$10$nOT1YiAubRBFMOvpiuscKeQdk8iIamp2PSXBdPkOkV.JWU68rDN..', 'Andi Bulaeng', '', '631eccfdb1e89.png', '2c'),
(16320070, 'Yuyun Aryani Tuhuteru', '$2y$10$hV9uIi18Zo.M2iLE2aL6b.rfzuBirWjS7tNBYAdnK4jcxc903Zmc2', 'Yuyun Aryani Tuhuteru', '', '631ecd5f0d263.png', '2c'),
(16320071, 'Fathurahman Rumalutur', '$2y$10$6kYIORwIQuvFb.0aOToSJOeJtga.GM0saZ1wEQKcVdUjEPorO7dyy', 'Fathurahman Rumalutur', '', '631ecda8359ed.png', '2c'),
(16320072, 'Hasta', '$2y$10$2rHwVyR/kGlmb.JLHeUtC.0lOIUWnWIMuM49zdee7XZYfd9ADnMxe', 'Hasta', '', '631ecdddaf9db.png', '2c'),
(16320073, 'Nurjanah Mauw', '$2y$10$OyC.ZPYYq9LYW/SIr2wJ8e6H8Ze0b6cj/IpTzo.ti2i3B1VoQFFgO', 'Nurjanah Mauw', '', '631ece1ec9c07.png', '2c'),
(16320074, 'Fajri Kutanggas', '$2y$10$iQpkSjnUTuZ.MNit6u3QKOV8B4uX3NPZx7EIvgjlotJHHnnNfScR2', 'Fajri Kutanggas', '', '631ece5395a1e.png', '2c'),
(16320075, 'Endang Afriani Wally', '$2y$10$Nu2Bes2nbsgcKJETHaKNieWt47v1LuWB7KAZweiTciwTtXqdE38ju', 'Endang Afriani Wally', '', '631eceb9ed6d9.png', '2c'),
(16320076, 'Almendo Fredi Obednego Pehebeherot', '$2y$10$m2FSaKgcxvlxZ4uFSPqnJOJJy2L.3OYyFnsb2ueaptdQaoy6jZnJm', 'Almendo Fredi Obednego Pehebeherot', '', '631ecf1c24a2a.png', '2c'),
(16320077, 'Rosalina Maria Kocu', '$2y$10$Rm5sq7AZyGHihxZTnPYR4uGbf8pnCrqySxOVrsl24WBToYkAGvea6', 'Rosalina Maria Kocu', '', '631ecf606fd23.png', '2c'),
(16320078, 'La Mohamad Taweri', '$2y$10$m4cH/ECt2cHnMctPXEMRkOL8MK3XuigY4vlMJfXDW9mw9.iVNfUq2', 'La Mohamad Taweri', '', '631ecfad4d7c6.png', '2c'),
(16320079, 'Rafika Paradila Putri', '$2y$10$1dN0CTQ27FZv8VYVREX7yeZ/BfM88Jq.QGpSNcss3V.C9kFMUnNqO', 'Rafika Paradila Putri', '', '631ecfe9a98ac.png', '2c'),
(16320080, 'Zulyanty Ahek', '$2y$10$3ANJbbKgKGj3ukXqmVvNL.pLOU7gXviZ1mWOlbNyVmuMIvcIUfNpy', 'Zulyanty Ahek', '', '631ed03a53b89.png', '2c'),
(16320081, 'Jemmy Juwai Metuduan', '$2y$10$Rk8EW1JDCZSCxIhWmNjzF.QGxPa8mQUwPdHZDZpbVrT5Zve7Mw4lK', 'Jemmy Juwai Metuduan', '', '631ed080bf0b9.png', '2c'),
(16320082, 'Tobias Lanja', '$2y$10$BwnpvZg/SZ95BVbpBkRkK.2B138CL0yHHemWXdkmBAk3/B5YSzUA2', 'Tobias Lanja', '', '631ed0e24b8f6.png', '2c'),
(16320083, 'Islamudin Nantez Wally', '$2y$10$xEeQNJH6y2nok2LagMhhXeqNSlAVKGQRojc7B.y.xsXPaMEJPolHC', 'Islamudin Nantez Wally', '', '631ed13b90731.png', '2c'),
(16320084, 'Syarifudin La amat', '$2y$10$qS3XSn2OxPv69QBA6Zf4LeV3MZ6MLxDp4Ryj72t4/h4ZrMEV4pe7G', 'Syarifudin La amat', '', '631ed19781c94.png', '2c'),
(16320085, 'Idris Gilang Saputra Bay', '$2y$10$3z1OGvlkMJ2SjmzNAACcIOoAgMo26GNiQ3MqZo399B54LXPeaTefy', 'Idris Gilang Saputra Bay', '', '631ed1ea0a993.png', '2c'),
(16320086, 'Siti Gamar Mau', '$2y$10$2mLsgZ99M.U9kVPftz4Xu.gHN.gNmh4WHKhoq6qF1rQwGKYfZGMv2', 'Siti Gamar Mau', '', '631ed2260d03b.png', '2c'),
(16320087, 'Wa Kambalia Rahma Wati', '$2y$10$7KY25BAXyhnleDa1UCp7e.3IFv5jaT4qzuPR2gi48lOESDSqy2Wfe', 'Wa Kambalia Rahma Wati', '', '631ed2780e619.png', '2c'),
(16320090, 'Noldy Zerarme Kambuaya', '$2y$10$pD1nuRG.Lvl8ZEZ9O/OnoOEKLEX1OvmL9ZZnQFvfZuKzjyERhoz4i', 'Noldy Zerarme Kambuaya', '', '631ed2d5a1fca.png', '2c'),
(16320091, 'Herodia Sali', '$2y$10$hoioiQGFxGs9Q34CpCHGv.g311hv/SpqOUCKrvoiUdYkAaJGe.RWO', 'Herodia Sali', '', '631ed30999aa3.png', '2c'),
(16321001, 'Soniah Indah Ahmidah', '$2y$10$mU8a82wHgq3srqRnwvwH9OVq2t0vNdpFnQi9kzhWnYcUw9bFhbJre', 'Soniah Indah Ahmidah', '', '63216761ec1c9.png', '1a'),
(16321003, 'Zainudin Rumodar', '$2y$10$1TzyH4ska.rZAwLU5yHz5uIz/0MaM.3BvNL3eGy7/2BThfbhJci5u', 'Zainudin Rumodar', '', '632167e19ec6c.png', '1a'),
(16321004, 'Hafsa Hulihulis', '$2y$10$wlYHNXhnLP7JIbdsR3QNcOjzVVEaobHRKx3rAxFWcH76FPQ.zgQ7G', 'Hafsa Hulihulis', '', '632168145d709.png', '1a'),
(16321006, 'Angela Oudile.G.Talla', '$2y$10$1a2DA19In7oc8aYJc9tnPOON.LC4cUEdhV8zXa3LFwKnx1zA1cp3i', 'Angela Oudile.G.Talla', '', '6321687ae885e.png', '1a'),
(16321007, 'Reza Raihan', '$2y$10$wy7AnDslYHfdFmhVsTS6SOeR/8dDFAj.25MdJxkl531f4KVWxJSkS', 'Reza Raihan', '', '632168a94edbf.png', '1a'),
(16321008, 'Lian Rahma Sary', '$2y$10$ViSdbUcBGUexhuPeGdLuiOKO17rfaxjB/t1e./tWW.zHr80QDsZC.', 'Lian Rahma Sary', '', '632168db4d384.png', '1a'),
(16321009, 'Syarifudin Kilian', '$2y$10$ZYch0JVaS/79SDfsCpaaAO9rQQfpnGaiDJT0B1SCzd84grFgFRG4C', 'Syarifudin Kilian', '', '632169cd5bf08.png', '1a'),
(16321010, 'Resty Syafa Amanda', '$2y$10$h59rOKg1cKpClllxyBGP2OD9BeXOTvc.6kI.VNiSRIFTGgt.aJUfq', 'Resty Syafa Amanda', '', '632169807cd4e.png', '1a'),
(16321011, 'Febrianto Appu.P', '$2y$10$hhpNUgThk5tZ7tRRdC6WvOthoWOllRLeZPyvTazjIbvM8VhzefvNe', 'Febrianto Appu.P', '', '63216a52538f2.png', '1a'),
(16321012, 'Annisa Anggraini', '$2y$10$hjdFWlhKw3myMiqZRnCG/.9IdjAxCrKWgtLysIMUf9iEdDYdd3qoC', 'Annisa Anggraini', '', '63216ab159524.png', '1a'),
(16321013, 'Wahyudi', '$2y$10$sk68AAqFVyf.St0E8qvOYu70zA4JbbrGnI5aJeEly88s4.Yb4NZVa', 'Wahyudi', '', '63216adbadbfb.png', '1a'),
(16321014, 'Jaida Mauw', '$2y$10$TJtlKHWgKoiRKV38RNoT3.VMlGgc7rUFd0Z1RF2ZWU.yOxG5fCyMm', 'Jaida Mauw', '', '63216b0e24e57.png', '1a'),
(16321015, 'Firda Rumagutawan', '$2y$10$Lc6XvMOW83TXWnYopVHeDO8NdkKSP5vqmpm/bqldBZotHy85Qam6W', 'Firda Rumagutawan', '', '63216b4e54979.png', '1a'),
(16321016, 'Raning Rumagutawan', '$2y$10$/zrmLYdJ0/u61eFvBf7t6.Aluoo4hqVHuQeBm72TOcg7e.o6OAgaa', 'Raning Rumagutawan', '', '63216b8916f0f.png', '1a'),
(16321017, 'La Irlan', '$2y$10$amI9uC1wg59kqRyONfvm0Of.ikzO6Tjqk6MEa4XbjE9KjcvAJlLWu', 'La Irlan', '', '63216bb5c4ad1.png', '1a'),
(16321018, 'La Ode Risky', '$2y$10$TriDk8S5TWdMxdHnDeu0.eoikzgHSGwbnWkpFonx4cuSp/jMxHb1G', 'La Ode Risky', '', '63216beb9ec4f.png', '1a'),
(16321019, 'Ardiansyah Setio Budi', '$2y$10$pVSn/5zWUeEQCIeZu0XjiOSQotCv3h1M/AUTF.p1RiCAkSP1tw7W2', 'Ardiansyah Setio Budi', '', '63216c2457c7d.png', '1a'),
(16321020, 'Maharia Kiliwou', '$2y$10$mWknGgJ2M8FPUE0G9QiAPOUHULibB30X96MipmVrH3vf7AHjkZN7G', 'Maharia Kiliwou', '', '63216c550bdee.png', '1a'),
(16321021, 'Abdul Malik Tomsio', '$2y$10$4pmi7qYdEN5GMoYS2CfSpuTTqsfhs6zQRXFyTY5ps4GIkTcjCe6S2', 'Abdul Malik Tomsio', '', '63216c8ed22d4.png', '1a'),
(16321022, 'Muhammad Choirul Ihsan', '$2y$10$5YqH.cF/ju0xNAz1dd0ByOZGvL4.a9EEu7gfA0rNY/RvVTkIV596K', 'Muhammad Choirul Ihsan', '', '63216cc64327a.png', '1a'),
(16321023, 'Andriansyah', '$2y$10$mV.Y4Z2Ut6Th8SeRrrAJ3OcRTejcw5JJj8TqklJJ5Wlxy3NY8uNy2', 'Andriansyah', '', '63216d316d193.png', '1a'),
(16321024, 'Yusril', '$2y$10$a2mYtTwjhw0nAMpficBH1.pu32z881Nr8zDP247y23/UnuN50AOt.', 'Yusril', '', '63216d5f327b5.png', '1a'),
(16321025, 'Nursinta Keliangin', '$2y$10$vyi.cnRVlGC1jL6IMymrfey9zLgXcoqEwNSmyBlAUtQJQ9Jclkwq2', 'Nursinta Keliangin', '', '63216d97d076b.png', '1a'),
(16321026, 'Syafrin Sani', '$2y$10$5zOaHaRVugXgRbP5YCQrQ.YI1ajH/ZBzW837c1LIsQ3mTXskIbD5S', 'Syafrin Sani', '', '63216dc6f1fd5.png', '1a'),
(16321027, 'Aulia Sholihah Yusuf', '$2y$10$qBPuHoziWk7Z9ytXwzNkkeIv6KGJVdhk.50ktvwSSb92U4Dv73XoC', 'Aulia Sholihah Yusuf', '', '63216dffbc886.png', '1a'),
(16321028, 'Wafiq Nur Falah Yusuf', '$2y$10$Xq7ayTZsKwMfDhQquEMByuvJ4bPXkT4PcJ0P3PBRXeOC4LqkkVOx2', 'Wafiq Nur Falah Yusuf', '', '63216e4d2c926.png', '1a'),
(16321029, 'Nurul Asril Sugiarto', '$2y$10$TpJaQGsJyLZYrYd1LxcFoO6mNrw5tdAFP/laZbO2zzPHpGRK8lsBa', 'Nurul Asril Sugiarto', '', '63216e78b33b7.png', '1a'),
(16321030, 'Muhamad Abbas Ena', '$2y$10$2bTcIZC16aqO8uUWPTlsGOZ3oIgd7WxYGJiR/Vj6ggabyZx2jHfo6', 'Muhamad Abbas Ena', '', '63216eb39fccc.png', '1a'),
(16321032, 'Rosmita Wali', '$2y$10$ENxyu3XCnzCJZjiwnCvM6uEsOEzUeO0cJejPZ2xrzR8h6wwmnoG1y', 'Rosmita Wali', '', '632e84e4cbb96.png', '1b'),
(16321033, 'Faradillah Kurniatika S saba', '$2y$10$wlZ8N9/n0QKLbO6SwfMQQOzRfZoZpLJA4aQXuMNhUCVIXKQk9/kNK', 'Faradillah Kurniatika S saba', '', '632e85589b80c.png', '1b'),
(16321034, 'La Zainal Akbar', '$2y$10$drQQs2qumv/1bToExv56f.vf/qpUDm4Ch80KYH0ZmwBq3ITp5l8sS', 'La Zainal Akbar', '', '632e86bfafabd.png', '1b'),
(16321035, '0de Rian', '$2y$10$zpIl8W4rg1HH1TuCpHMKvenzKfusGc3ILLM7k29PN39kDO2Av7K2u', '0de Rian', '', '632e8710bb27c.png', '1b'),
(16321037, 'Melati Ena', '$2y$10$r4PDHjhanTVhwB/vJlPoLOJDT4X0LGAXFpY7cZn7xHT6M1xOXfFW6', 'Melati Ena', '', '632e87581895c.png', '1b'),
(16321038, 'Asriya', '$2y$10$BwNe.TpwS/5Q8uiDnoXwqOf7FKCR4yaAn15bYOjhiHozuVqVHfnCO', 'Asriya', '', '632e8892b09f8.png', '1b'),
(16321039, 'Yuni Julianti Ugar', '$2y$10$TnP12b5qh9WW6.14EzCx/.GTKYVFI4xS6pBlcJBz.qCTtABosrLPu', 'Yuni Julianti Ugar', '', '632e88e6b56fb.png', '1b'),
(16321040, 'Rahmawati Umasugi', '$2y$10$JUEKfDbGvHgok/nqiNUue.hSRcu.M3V6Gf0mgEU8KFcEJKSq0umGS', 'Rahmawati Ugar', '', '632e89269d0fa.png', '1b'),
(16321041, 'Musnah Patiran', '$2y$10$D3gKFUQmqyl7Q8Npr2E7TO4k4Wvb56ZDkjpCEvyA7bSnDLheTUY5q', 'Musnah Patiran', '', '632e89bf07cae.png', '1b'),
(16321042, 'Bensleo Hewangreja Kabes', '$2y$10$j8nWj.NFCgEDfdIjjGfj4.t7hXtpDxHfbcEPCKhjVpOlmWglIhvWm', 'Bensleo Hewangreja Kabes', '', '632e8a348a4e5.png', '1b'),
(16321043, 'Apolinia Heatubun', '$2y$10$iCmuems2wP6jsSh16jx3JOPjH5s56TsEUZ.BVW9TbSluF9ygpOcSe', 'Apolinia Heatubun', '', '632e8a9473938.png', '1b'),
(16321045, 'Risye Sianti Engkesa', '$2y$10$MzQwCp1wxlVS3Lc0u/u70upFIha3Obu8.43AiZOnE//TSaGwkT53G', 'Risye Sianti Engkesa', '', '632e8b8f51966.png', '1b'),
(16321046, 'Yulisari Fransiska Paijala', '$2y$10$wjWESQHvpCk8LEQ4AVA89OD2ayD3vMCEAYpv4Gunb2GZ2a7tCRH1K', 'Yulisari Fransiska Paijala', '', '632e8c3965770.png', '1b'),
(16321047, 'Nifta oktoviani La dihu', '$2y$10$VRykzehxQZpUSiR5MA0oB.0wEccH29VEQeHEl4oBfahuMhKJPMH0q', 'Nifta oktoviani La dihu', '', '632e8ca9b1678.png', '1b'),
(16321048, 'Priska Patricia H yensenen', '$2y$10$AW8GCwu1PafUo6/CVNkid.NEgTROVGfxe/aDvteUgbDZ/GiDHZqYm', 'Priska Patricia H yensenen', '', '632e8d16ad715.png', '1b'),
(16321049, 'Septiana  Adinda Marsela', '$2y$10$PTTT.jnLfzow1/D2NcMXheiFtuBh8nP15w6eQETH7uOuVecmfwWPW', 'Septiana  Adinda Marsela', '', '632e8dbd477df.png', '1b'),
(16321050, 'Muhammad Rezki Aidil ', '$2y$10$oSN.2sJ7rpO.CL8AQL38LOxscD2dFiL5pqXjL4K/geeujwywkkRJm', 'Muhammad Rezki Aidil', '', '632e8dfa7680c.png', '1b'),
(16321054, 'Clara Anugrah Tabi Andi L', '$2y$10$0Q7gJYauyOuZIHuqGeEf3uuGglmdHXb4.s2iTlyzREu3zexB.pkSu', 'Clara Anugrah Tabi Andi L', '', '632e9f2095e3f.png', '1b'),
(16321055, 'Mietha Verga Ardianty', '$2y$10$QHu/Ixwr0ytALVh46jSG3OOf13ToEXPrfd4/kO4fL8.W8UIxtXPxC', 'Mietha Verga Ardianty', '', '632e9fe9cdb48.png', '1b'),
(16321058, 'Emelia Mauw', '$2y$10$jiix4mGi9KfNf8vIl7TPOOwPr2QvOXhYYBPwhu.u/AxiMawDNWnTK', 'Emelia Mauw', '', '632ea03096ed0.png', '1b'),
(16321060, 'Yanti Rumasukun', '$2y$10$MCo49DbU0mSkZEfaEGvtsuCV1vqXnhbLGfxGPO5S2l1z9WSXQX8e2', 'Yanti Rumasukun', '', '632ea06bd3e97.png', '1b'),
(16321061, 'Sartika Mohmiangga', '$2y$10$P4S27T/zhLYaGXpjqUapVOViRZxHWLBMc2mWCUrbrwil2.ZhbbNkW', 'Sartika Mohmiangga', '', '632ea12fcc360.png', '1c'),
(16321062, 'Engel Mohmiangga', '$2y$10$0FpOLVU0hBCAKdAaS52KQuj5LvL8w.Ah1Yywb9NQUhoxK/g8v5RXS', 'Engel Mohmiangga', '', '632ea1d93e16f.png', '1c'),
(16321063, 'Sahada Rumakabis', '$2y$10$CR7v57TgI9XMz6Hz9.0T4.5GBdS4AIwhlMvv.gOeV3K6K6z17gPgy', 'Sahada Rumakabis', '', '632ea2a4d93fb.png', '1c'),
(16321064, 'Hasnawati Rumbati', '$2y$10$7W7jlm4ML3LXS214zjr/VuqantuTjTopeZ04bH/djQcybL5QZ2Ko2', 'Hasnawati Rumbati', '', '632ea2dddb7f4.png', '1c'),
(16321065, 'Ririn Ayu Wandira Marfogan', '$2y$10$5QY8KsY.lFwFZAt9UPboeudT8gJec.6593Vhrm6Zs0mpGJu2Gk4um', 'Ririn Ayu Wandira Marfogan', '', '632ea3bb88f14.png', '1c'),
(16321066, 'Amir Kapauruma', '$2y$10$8Opjbg4erOtqazm8feXFIe8W474VvaKS5P7/QHxsr.0GHRQ3/8Qd.', 'Amir Kapauruma', '', '632ea4ec6236c.png', '1c'),
(16321068, 'Naisa Kutanggas', '$2y$10$Vh00f/NyZ8nOpD8I0w0eQ.xRGLFL.c/lZ3LAqN2IcTQdrKk3YatZO', 'Naisa Kutanggas', '', '632ea45195db8.png', '1c'),
(16321069, 'Sardianti Wabula', '$2y$10$ec7BvYJLVakM.arLJq7b6eW2ooecY7TI.ywbCyw./ZX4PdLJWU0EW', 'Sardianti Wabula', '', '632ea556ba7fb.png', '1c'),
(16321070, 'Nurfuziyah Febriyanti Cahyani', '$2y$10$s1OIBbi6h1r/dNYNHUbUH.ja91Nb/g/SD0o1CdncQhiDVSyBNS06e', 'Nurfuziyah Febriyanti Cahyani', '', '632ea5b4cdd4c.png', '1c'),
(16321071, 'Muhammad Faizal Saputra', '$2y$10$8jhEyYjeyu5cPuJu4ceCvOKpQZHUl8zlvIkD.P17FtpnNglNQyuXa', 'Muhammad Faizal Saputra', '', '632ea5f7c5fcc.png', '1c'),
(16321072, 'Zulkarnain Simasina Sohilauw', '$2y$10$Ygz8Xhg/BIw9E3hSVxcvieBeW8zCIOHdjRAI.PvUsIwrdNds6SsG6', 'Zulkarnain Simasina Sohilauw', '', '632ea63b1022b.png', '1c'),
(16321073, 'Gilang Ramadhan Bay', '$2y$10$5Sja1ORgVuhtSU1hdxTPyuVdJzBTQRCrB5onWg9HJd3EVkLRAGfp.', 'Gilang Ramadhan Bay', '', '632ea6a123b7a.png', '1c'),
(16321074, 'Nurtika Chodijah Syahraini Rado', '$2y$10$KVw1A8weBIN5diOs0ANwq.biTizJ5TZDXPoEkAYPCtPzqLl4TUg7K', 'Nurtika Chodijah Syahraini Rado', '', '632ea72c680ed.png', '1c'),
(16321075, 'Syefal', '$2y$10$o151RGQ64eQCzWwun//uIuoAiM21MpoTyA3pWCi6Y.4/084idUewi', 'Syefal', '', '632ea7536250c.png', '1c'),
(16321076, 'Bayuni', '$2y$10$2JHLgzftzGeRp4SJklOj7ujcNIU3eQWg2VOwU24SAsbITHwNKgMge', 'Bayuni', '', '632ea7ba329d5.png', '1c'),
(16321077, 'Aldi Yhudistira', '$2y$10$mTuyZuBs12VqG67dlx3ibO1JZ7e2DBfXPpDPYQfbztq1.k16g9Kpe', 'Aldi Yhudistira', '', '632ea7fe9b075.png', '1c'),
(16321078, 'Fatma Windi Tianlean', '$2y$10$J1yOkEZlth.H8IKdA.Npw.Y69Ql0LN3TM1U9SYo4cqZ4K06Eo.58K', 'Fatma Windi Tianlean', '', '632ea8340e7cd.png', '1c'),
(16321079, 'Irdha Tika Muliyarthi', '$2y$10$HV/RXtYcC5bQ9LEJHbBZxOiVCYvgQBfByEboKXBI6lmMEvwUKTUo6', 'Irdha Tika Muliyarthi', '', '632ea869d78b4.png', '1c'),
(16321080, 'Said Kelkulat', '$2y$10$LqnBU81ftDQ9NvqC0XGZT./xLqC6T5pNmM3.KQFznXykIr7TEZe0W', 'Said Kelkulat', '', '632ea8967804c.png', '1c'),
(16321081, 'Intan', '$2y$10$UNhjoYKVSPV3Ull7ZiZPVOeIoDds4N4.wH7HQ55z2GStPWx/.fOsO', 'Intan', '', '632ea974a8901.png', '1c'),
(16321083, 'Putri Warawawin', '$2y$10$7MnVCEie2Qec8OArmS6QHeMa3/KaG1QUPwVi3Wa6J1VeX9T172xbG', 'Putri Warawawin', '', '632ea9a5813c8.png', '1c'),
(16321084, 'Arma Wali', '$2y$10$0Ghjhpyk7d.xxCtjtNP/yeFjek8ED01rCtrLfE91tPVM.8p98tiNe', 'Arma Wali', '', '632eaa3b9dfd6.png', '1c'),
(16321085, 'Rani Diana Rahangmetan', '$2y$10$s/ijyjywgqk0aNJ0OIP8/uVFUrcahMExu1sjajkfzoZZilEYjm/Ga', 'Rani Diana Rahangmetan', '', '632eaa75d6d79.png', '1c'),
(16321086, 'Rosita Weripih', '$2y$10$CF8eAbfgTbKGZT/o6kDX2upiI1pt7pH9lfqeKAtPAZjC0uKPrAIKW', 'Rosita Weripih', '', '632eaaaad0115.png', '1c'),
(16321087, 'Dewi Chintia Ngabalin', '$2y$10$b.aReyTZ/2jKWAtPTgsfI./VRC/XkYPfXDiUxW.LHSF/sSkDLuVii', 'Dewi Chintia Ngabalin', '', '632eaae4d415b.png', '1c'),
(16321088, 'Narti Keliwawa', '$2y$10$E4O1GoW8Xr10P.dS4snJsOexBKK5.hCbhe7WASxT3sIZsqDBNZWum', 'Narti Keliwawa', '', '632eab21bd529.png', '1c'),
(16321089, 'Sumiati keledar', '$2y$10$auAHPnrDFp4Hqf6zR.qKl.XZlB.rUC4spRhrAEJA/Az9WCHa7IWn.', 'Sumiati keledar', '', '632eab5628051.png', '1c'),
(16321090, 'Kadim Rumatela', '$2y$10$tGrHPhA7WtugOm9Vu/bilecy1.kF6CAZGS6ti6Z/0k83xP9qzMxoO', 'Kadim Rumatela', '', '632eab865c6b9.png', '1c'),
(16321091, 'Tika Sriutama Nubatonis', '$2y$10$Qm65ocBFq34lM496vxu.ju7y/vtDW/cXEECknmytP60GNlq20mP3q', 'Tika Sriutama Nubatonis', '', '632eabde96f44.png', '1c');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `super_user`
--

CREATE TABLE `super_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nip` varchar(40) NOT NULL,
  `nohp` varchar(16) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `ttl` varchar(255) DEFAULT NULL,
  `nidn` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jabatan_fungsional` varchar(255) DEFAULT NULL,
  `jabatan_struktural` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `super_user`
--

INSERT INTO `super_user` (`id`, `username`, `password`, `nama`, `nip`, `nohp`, `foto`, `jabatan`, `kelas`, `jenis_kelamin`, `ttl`, `nidn`, `jurusan`, `email`, `jabatan_fungsional`, `jabatan_struktural`) VALUES
(2, 'admin', '$2y$10$iHPEyxuWLRf3.rcO0Tjq4OmZ8sUHE2ZrR7.24K9etq/XAinkFW/Wy', 'Darojatun Genova', '000', '000', '62d50a5aa22a8.jpg', 'Admin', '', '', '', '', '', '', '', ''),
(4, 'Hasan Basri', '$2y$10$dOJm4tDJypBjOOU7G5cIPerf3..bJ8bqgl3Yf/mdPsbyYQ4k1diza', 'Hasan Basri,S.ST.,M.Tr.Kom', '000', '0813151767', '62f9cb7651fab.jpg', 'Wali Kelas', '1a', 'Laki Laki', '1992-06-01', '', 'Manajemen Informatika', 'hasan@polinet.id', '', ''),
(6, 'Nur Sakinah', '$2y$10$XvgyttHw1lsM9i0mi6A1auHpNGDVB3z4K0j2e811T0DfEuI4Pq.cO', 'Nur Sakinah,S.ST.,M.Tr.Kom', '00000', '085354102899', '62f9cf01315e9.jpg', 'Wali Kelas', '3c', 'Perempuan', '1994-06-14', '', '', 'nursakinah@gmail.com', '', ''),
(7, 'Nelson Rumui', '$2y$10$ZcijzkhzDTp9eznoPjkkzuJZ2HutTAXCzKapb3wwreYntknMd33Uu', 'Nelson Rumui,S.Kom.,M.Cs', '000', '085292024267', '62f9cd5b94a9d.jpg', 'Wali Kelas', '1b', 'Laki Laki', '1987-07-27', '', 'Manajemen Informatika', 'nelsonrumui@gmail.com', 'asisten ahli', 'ketua jurusan'),
(8, 'Muh Fachrudin', '$2y$10$HEGi0GGlO/DLPxRVVlo2I.WYzBSQ85R/knkSrBXfYkFNf3YscUaDu', 'Muh Fachrudin,S.E.,M.Ace', '199112042015041002', '085145196062', '62f9d0cdc9f5a.jpg', 'Wali Kelas', '1c', 'Laki Laki', '1991-12-04', '', 'Manajemen Informatika', 'rudifacrhudin@gmail.co', '', ''),
(9, 'Ardhyansyah Mualo', '$2y$10$TnikKcsoaO7RS9lRH9wOh.fxztOpbSyb8ag5HfF84z0thQTkRo/yS', 'Ardhyansyah Mualo,S.Kom.,M.T', '000', '085298576626', '62f9d1d72dc66.jpg', 'Wali Kelas', '2a', 'Laki Laki', '', '', 'Manajemen Informatika', '', '', ''),
(10, 'Tri Bata Biru Saputri', '$2y$10$pEOHbbW7IIverJ5IqsfZ4OOf.ijt1C6XV8OoVsMrf/o2PIqgYhNpe', 'Tri Bata Biru Saputri,S.Hum.,M.Pd.', '198710072020122014', '000000000000', '62f9d2bf3500b.jpg', 'Wali Kelas', '2b', 'Perempuan', '101987-07-07', '', 'Manajemen Informatika', 'albiruprincesss@gmail.com', '', ''),
(11, 'Andi Roy', '$2y$10$diGMQvoiYXwNYHMEqfS1lOtGsBHrgOaByk/u/em9sdrck5lbYc6JC', 'Andi Roy,S.Kom.,M.M.', '199112302019031015', '085399392393', '62f9d33215b67.jpg', 'Wali Kelas', '2c', 'Laki Laki', '1991-12-20', '', 'Manajemen Informatika', '', '', ''),
(12, 'Riyadh Arridha', '$2y$10$4DgIs.ocNg1.LYXxYuhlK.XtHxByJ6wmZhJlvT6iadH2WiE6z7oOm', 'Rivadh Arridha,S.kom.,M.T. ', '198703082014041001', '085255180807', '62f9d3bb0984f.jpg', 'Wali Kelas', '3a', 'Laki Laki', '1987-03-08', '', 'Manajemen Informatika', 'riyadh.arridha@gmail.com', 'lektor', ''),
(13, 'Syukron Anas', '$2y$10$dfGLP6yC3HRXW6OlaF3gAevdsnQg0fn925WtJHVs9LLuPNDbPA89.', 'Svukron Anas,S.Kom.,M.Kom.', '199211152019031026', '085334805443', '62f9d468e6eb1.jpg', 'Wali Kelas', '3b', 'Laki Laki', '1992-11-11', '', 'Manajemen Informatika', '', '', ''),
(17, 'riko', '$2y$10$QXxmE7Ug6Q5ATTgCWFJve.Cwdii.V/gjE3FgdURt4ddVs4jUDiD7i', 'Riko', '2343211', '0895762762', '6341279b86792.jpg', 'Wali Kelas', '3b', 'Laki Laki', '2022-10-08', '2132142', 'Ilmu Sosial', 'riko@gmail.com', 'Asisten Ahli', 'Ketua Jurusan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penerima` (`id_penerima`),
  ADD KEY `id_pengirim` (`id_pengirim`);

--
-- Indexes for table `chat_grup`
--
ALTER TABLE `chat_grup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengirim` (`kelas`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_user`
--
ALTER TABLE `super_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `chat_grup`
--
ALTER TABLE `chat_grup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `super_user`
--
ALTER TABLE `super_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_penerima`) REFERENCES `super_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`id_pengirim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
