-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 11:37 PM
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
-- Database: `istar`
--
CREATE DATABASE IF NOT EXISTS `istar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `istar`;

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `agency_id` int(11) NOT NULL,
  `agency_name` varchar(1024) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Truncate table before insert `agencies`
--

TRUNCATE TABLE `agencies`;
--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`agency_id`, `agency_name`, `created_at`) VALUES
(1, 'Bansal Audio', '2024-06-23'),
(2, 'EITL', '2024-06-23'),
(3, 'Elecon', '2024-06-23'),
(4, 'Kevini Solutions', '2024-06-23'),
(5, 'R-Tech Computers', '2024-06-23'),
(6, 'Rayansh Securities ', '2024-06-23'),
(7, 'Rise Techno Solutions', '2024-06-23'),
(8, 'Yash Computers', '2024-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `approved_by`
--

CREATE TABLE `approved_by` (
  `ap_id` int(11) NOT NULL,
  `App_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Truncate table before insert `approved_by`
--

TRUNCATE TABLE `approved_by`;
--
-- Dumping data for table `approved_by`
--

INSERT INTO `approved_by` (`ap_id`, `App_name`) VALUES
(1, 'President'),
(2, 'Provost'),
(3, 'Registrar'),
(4, 'Deputy Registrar'),
(5, 'Registrar I/C');

-- --------------------------------------------------------

--
-- Table structure for table `cvm_institutes`
--

CREATE TABLE `cvm_institutes` (
  `Institute` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Truncate table before insert `cvm_institutes`
--

TRUNCATE TABLE `cvm_institutes`;
--
-- Dumping data for table `cvm_institutes`
--

INSERT INTO `cvm_institutes` (`Institute`) VALUES
('V.P. & R.P.T.P. Science College'),
('Birla Vishwakarma Mahavidyalaya (BVM)'),
('B.J. Vanijya Mahavidyalaya (Commerce College)'),
('Nalini-Arvind & T.V. Patel Arts College'),
('H.M.Patel Institute of English Training & Research'),
('Rama Manubhai Desai College of Music & Dance'),
('S.M. Patel College of Home Science'),
('A.R. College of Pharmacy & G.H. Patel Institute of Pharmacy'),
('B. & B. Institute of Technology'),
('Ipcowala – Santram College of Fine Arts'),
('Sophisticated Instrumentation Centre for Applied Research & Testing (SICART)'),
('C.V.M. Higher Secondary Complex - Science Stream (RPTP)'),
('C.V.M. Higher Secondary Complex - General Stream (TVPATEL)'),
('C.V.M. Higher Secondary Complex -Vocational Stream (HOME SCIENCE)'),
('G.J.Sharda Mandir(Primary)'),
('G.J.Sharda Mandir(Secondary)'),
('M.U.Patel Technical High School'),
('S.D.Desai High School'),
('I. B. Patel English School (GIA)'),
('I.B.Patel English School (SFI)'),
('M. S. Mistry Bilingual School'),
('Vasantiben & Chandubhai Patel English School (CBSE)'),
('Chimanbhai M.U. Patel Industrial Training Centre'),
('Shardaben C.L.Patel ITI for Women (CVM Private ITI for Women)'),
('Kanubhai M. Patel ITI for Engineering Trades'),
('Vallabh Vidyanagar Technical Institute'),
('CVM Health Centre');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `managed_by` varchar(20) NOT NULL,
  `institute_name` varchar(2048) NOT NULL,
  `clg_out_no` varchar(128) NOT NULL,
  `clg_in_no` varchar(128) NOT NULL,
  `product_info` varchar(30) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `appr_by` varchar(30) NOT NULL,
  `appr_date` date NOT NULL,
  `appr_amt` bigint(10) NOT NULL,
  `agency` varchar(50) NOT NULL,
  `work_status` varchar(10) NOT NULL,
  `bill_appr_date` date NOT NULL,
  `bill_amt` bigint(10) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Truncate table before insert `data`
--

TRUNCATE TABLE `data`;
--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `date`, `managed_by`, `institute_name`, `clg_out_no`, `clg_in_no`, `product_info`, `description`, `appr_by`, `appr_date`, `appr_amt`, `agency`, `work_status`, `bill_appr_date`, `bill_amt`, `created_at`) VALUES
(27, '2024-07-01', 'CVM', 'V.P. & R.P.T.P. Science College', '1234567890', '09876543210', 'New Purchase', 'New purchases of PCs being made :)', 'President', '2024-06-29', 1000000, 'Kevini Solutions', 'Done', '2024-06-30', 1000000, '2024-06-29'),
(28, '2024-06-01', 'CVMU', 'Institute of Science & Technology for Advanced Studies & Research (ISTAR)', '0', '9', 'New Purchase', '0', 'Provost', '2024-06-28', 3791, 'Elecon', 'Pending', '2024-06-29', 1793, '2024-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `institute_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Truncate table before insert `emails`
--

TRUNCATE TABLE `emails`;
--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `email`, `institute_id`) VALUES
(1, 'vprptpsc@yahoo.co.in', 1),
(2, 'principal@bvmengineering.ac.in', 2),
(3, 'bjvm_vvnagar@yahoo.com', 3),
(4, 'naliniartscollege@yahoo.com', 4),
(5, 'hmpietr@yahoo.com', 5),
(6, 'musicndancevvn@gmail.com', 6),
(7, 'smpcollege@yahoo.in', 7),
(8, 'arghpharmacy@yahoo.co.in', 8),
(9, 'principal@bbit.ac.in', 9),
(10, 'isfineartscvm60@gmail.com', 10),
(11, 'sicart_cvm@hotmail.com', 11),
(12, 'directorsicart@gmail.com', 11),
(13, 'sicartcvm@sicart.res.in', 11),
(14, 'tvphscvvn@gmail.com', 13),
(15, 'vrmistry117@gmail.com', 13),
(21, 'principalcvmhsecss@yahoo.com', 12),
(22, 'cvm_homevvn10@yahoo.com', 14),
(23, 'gjsm_1949@yahoo.com', 15),
(24, 'muphs2003@yahoo.com', 17),
(25, 'ibpes2007@yahoo.co.in', 19),
(26, 'ibpeschoolkgp@gmail.com', 20),
(27, 'vandcpatelenglishschool@gmail.com', 22),
(28, 'itcvvnagar@gmail.com', 23),
(29, 'cvm.itiwomen@gmail.com', 24),
(30, 'www.kmpateliti.ecvm.net', 25),
(31, 'nvpascollege@yahoo.co.in', 28),
(32, 'principal@nvpas.edu.in', 28),
(33, 'admissions@gcet.ac.in', 29),
(34, 'principal.semcom@cvmu.edu.in', 30),
(35, 'principal.istar@cvmu.edu.in', 31),
(36, 'info@adit.ac.in', 32),
(37, 'principal@adit.ac.in', 32),
(38, 'office.sspcpe@cvmu.edu.in', 33),
(39, 'principal.iicp@cvmu.edu.in', 35),
(40, 'office.iicp@cvmu.edu.in', 35),
(41, 'academic@aribas.edu.in', 36),
(42, 'ayugjp@gmail.com', 37),
(43, 'ayugjp@gmail.com', 38),
(44, 'waymadedu@yahoo.co.in', 39),
(45, 'cerlipindia@gmail.com', 40),
(46, 'principal.ilsass@cvmu.edu.in', 41),
(47, 'info@mbit.edu.in', 42),
(48, 'principal@mbit.edu.in', 42),
(49, 'principal.icctw@gmail.com', 42),
(50, 'smaidcvms@gmail.com', 43),
(51, 'PRINCIPALSMAID@GMAIL.COM', 43),
(52, 'rnpi.principal@gmail.com', 44),
(53, 'principal.cvmfinearts@cvmu.edu.in', 45),
(54, 'principal.isrre@cvmu.edu.in', 46);

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

CREATE TABLE `institutes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `organization_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Truncate table before insert `institutes`
--

TRUNCATE TABLE `institutes`;
--
-- Dumping data for table `institutes`
--

INSERT INTO `institutes` (`id`, `name`, `organization_id`, `created_at`, `organization_name`) VALUES
(1, 'V.P. & R.P.T.P. Science College', 1, '2024-06-23', 'CVM'),
(2, 'Birla Vishwakarma Mahavidyalaya (BVM)', 1, '2024-06-23', 'CVM'),
(3, 'B.J. Vanijya Mahavidyalaya (Commerce College)', 1, '2024-06-23', 'CVM'),
(4, 'Nalini-Arvind & T.V. Patel Arts College', 1, '2024-06-23', 'CVM'),
(5, 'H.M.Patel Institute of English Training & Research', 1, '2024-06-23', 'CVM'),
(6, 'Rama Manubhai Desai College of Music & Dance', 1, '2024-06-23', 'CVM'),
(7, 'S.M. Patel College of Home Science', 1, '2024-06-23', 'CVM'),
(8, 'A.R. College of Pharmacy & G.H. Patel Institute of Pharmacy', 1, '2024-06-23', 'CVM'),
(9, 'B. & B. Institute of Technology', 1, '2024-06-23', 'CVM'),
(10, 'Ipcowala – Santram College of Fine Arts', 1, '2024-06-23', 'CVM'),
(11, 'Sophisticated Instrumentation Centre for Applied Research & Testing (SICART)', 1, '2024-06-23', 'CVM'),
(12, 'C.V.M. Higher Secondary Complex - Science Stream (RPTP)', 1, '2024-06-23', 'CVM'),
(13, 'C.V.M. Higher Secondary Complex - General Stream (TVPATEL)', 1, '2024-06-23', 'CVM'),
(14, 'C.V.M. Higher Secondary Complex -Vocational Stream (HOME SCIENCE)', 1, '2024-06-23', 'CVM'),
(15, 'G.J.Sharda Mandir(Primary)', 1, '2024-06-23', 'CVM'),
(16, 'G.J.Sharda Mandir(Secondary)', 1, '2024-06-23', 'CVM'),
(17, 'M.U.Patel Technical High School', 1, '2024-06-23', 'CVM'),
(18, 'S.D.Desai High School', 1, '2024-06-23', 'CVM'),
(19, 'I. B. Patel English School (GIA)', 1, '2024-06-23', 'CVM'),
(20, 'I.B.Patel English School (SFI)', 1, '2024-06-23', 'CVM'),
(21, 'M. S. Mistry Bilingual School', 1, '2024-06-23', 'CVM'),
(22, 'Vasantiben & Chandubhai Patel English School (CBSE)', 1, '2024-06-23', 'CVM'),
(23, 'Chimanbhai M.U. Patel Industrial Training Centre', 1, '2024-06-23', 'CVM'),
(24, 'Shardaben C.L.Patel ITI for Women (CVM Private ITI for Women)', 1, '2024-06-23', 'CVM'),
(25, 'Kanubhai M. Patel ITI for Engineering Trades', 1, '2024-06-23', 'CVM'),
(26, 'Vallabh Vidyanagar Technical Institute', 1, '2024-06-23', 'CVM'),
(27, 'CVM Health Centre', 1, '2024-06-23', 'CVM'),
(28, 'N. V. Patel College of Pure & Applied Sciences (NVPAS)', 2, '2024-06-23', 'CVMU'),
(29, 'G.H. Patel College of Engineering & Technology (GCET)', 2, '2024-06-23', 'CVMU'),
(30, 'S.G.M.E. College of Commerce & Management (SEMCOM)', 2, '2024-06-23', 'CVMU'),
(31, 'Institute of Science & Technology for Advanced Studies & Research (ISTAR)', 2, '2024-06-23', 'CVMU'),
(32, 'A.D. Patel Institute of Technology (ADIT)', 2, '2024-06-23', 'CVMU'),
(33, 'S.S. Patel College of Physical Education', 2, '2024-06-23', 'CVMU'),
(34, 'C.Z. Patel College of Business And Management', 2, '2024-06-23', 'CVMU'),
(35, 'Indukaka Ipcowala College of Pharmacy (IICP)', 2, '2024-06-23', 'CVMU'),
(36, 'Ashok & Rita Patel Institute of Integrated Study & Research in Biotechnology and Allied Sciences (ARIBAS)', 2, '2024-06-23', 'CVMU'),
(37, 'Govindbhai Jorabhai Patel Institute of Ayurvedic Studies and Research', 2, '2024-06-23', 'CVMU'),
(38, 'Surajben Govindbhai Patel Ayurveda Hospital and Maternity Home', 2, '2024-06-23', 'CVMU'),
(39, 'Waymade College of Education (English Medium)', 2, '2024-06-23', 'CVMU'),
(40, 'Centre for Studies and Research on Life and Works of Sardar Vallabhbhai Patel (CERLIP)', 2, '2024-06-23', 'CVMU'),
(41, 'Institute of Language Studies & Applied Social Sciences (ILSASS)', 2, '2024-06-23', 'CVMU'),
(42, 'Madhuben & Bhanubhai Patel Institute of Technology (MBIT)', 2, '2024-06-23', 'CVMU'),
(43, 'Shantaben Manubhai Patel School of Studies & Research in Architecture and Interior Design (SMAID)', 2, '2024-06-23', 'CVMU'),
(44, 'R N Patel Ipcowala School of Law and Justice', 2, '2024-06-23', 'CVMU'),
(45, 'CVM College of Fine Arts', 2, '2024-06-23', 'CVMU'),
(46, 'C L Patel Institute of Studies And Research In Renewable Energy (ISRRE)', 2, '2024-06-23', 'CVMU'),
(47, 'H. M. Patel English Studies Centre', 2, '2024-06-23', 'CVMU'),
(48, 'H.M. Patel Career Development Centre (CDC)', 2, '2024-06-23', 'CVMU');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `organization_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Truncate table before insert `organizations`
--

TRUNCATE TABLE `organizations`;
--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`organization_id`, `name`) VALUES
(1, 'CVM'),
(2, 'CVMU');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `created_at`, `reset_token`) VALUES
(3, 'Mihir Makwana', 'mihirpmakwana786@gmail.com', 'mihir', '$2y$10$322lwdQ11HqiOjFVpd.YiOVvmGJfKY8nyMFdKUY4mFWX8C7hk/DT6', '2024-05-27 15:59:18', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`agency_id`);

--
-- Indexes for table `approved_by`
--
ALTER TABLE `approved_by`
  ADD PRIMARY KEY (`ap_id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `institute_id` (`institute_id`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization_id` (`organization_id`),
  ADD KEY `organization_name` (`organization_name`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`organization_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `agency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `approved_by`
--
ALTER TABLE `approved_by`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `organization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_ibfk_1` FOREIGN KEY (`institute_id`) REFERENCES `institutes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `institutes`
--
ALTER TABLE `institutes`
  ADD CONSTRAINT `institutes_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
