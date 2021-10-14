-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2021 at 07:23 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'DannyBoi', '$2y$10$fLK8s7ZDnM.1lE7XMP.J6OuPbQ.DPUVKBo7rENnQY7gYq0xAzsKJy', 'Dan', 'Me', '20171014_134525.jpg', '2021-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `platform` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `position_id`, `firstname`, `lastname`, `photo`, `platform`) VALUES
(1, 1, 'Yaw', 'Osei', '20170820_124945.jpg', 'Father for all'),
(2, 1, 'Philip', 'Amoah', '', 'We can together.'),
(3, 1, 'James', 'Akoto', 'IMG-20170319-WA0002.jpg', 'We are in this together.'),
(4, 2, 'Esi', 'Owusu', '0169b5bcadbd145e2aedd5b0e9bb81cd.jpg', 'Mother for all'),
(5, 2, 'Peter', 'Addo', '20160918_112358.jpg', 'We are here to serve.'),
(6, 3, 'Perfect', 'Annim', 'IMG_20150827_234814.jpg', 'You are my heart beat.'),
(7, 3, 'Elizabeth', 'Ooko', 'IMG-20161021-WA0047.jpg', 'You are all I need.');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `depart_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `depart_name`) VALUES
(1, 'Bachelor of Laws (LLB)'),
(2, 'Bachelor of Arts in Public Relations Management'),
(3, 'Bachelor of Science in Accounting'),
(4, 'Bachelor of Science in Accounting and Finance'),
(5, 'Bachelor of Science in Business Economics'),
(6, 'Bachelor of Science in Actuarial Science'),
(7, 'Bachelor of Science in Banking and Finance'),
(8, 'Bachelor of Business Administration'),
(9, 'Bachelor of Science in Information Technology Management'),
(10, 'Bachelor of Science in Marketing'),
(11, 'Bachelor of Science in Real Estate Management and Finance'),
(12, 'Diploma in Accounting'),
(13, 'Diploma in Marketing'),
(14, 'Diploma in Management'),
(15, 'Diploma in Public Relations'),
(16, 'Diploma in Information Technology Management');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `max_vote` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `description`, `max_vote`, `priority`) VALUES
(1, 'SRC President', 0, 1),
(2, 'SRC Vice President', 0, 2),
(3, 'ITSA President', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `voters_id` varchar(15) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(62) NOT NULL,
  `dob` date NOT NULL,
  `gender` char(10) NOT NULL,
  `level` int(11) NOT NULL,
  `department_id` int(62) NOT NULL,
  `password` varchar(60) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `voters_id`, `firstname`, `lastname`, `email`, `dob`, `gender`, `level`, `department_id`, `password`, `photo`) VALUES
(1, '10032984', 'Kofii', 'Ampaa', 'bihefel197@eyeremind.com', '1999-04-15', 'male', 300, 13, '$2y$10$Fh.SgG5wFiLOcxOCRRrQRu5OLN71voyDSI0nTZYLBRPjkF8lq28LG', 'vlcsnap-2020-11-25-18h31m35s834.png'),
(2, '10012345', 'Ama', 'Ato', 'sanos49593@nhmty.com', '1998-02-01', 'female', 100, 10, '$2y$10$tGgC6gURpkmKmARYjEnle.Z4rT8sbrYe668UkgNQAriMFnbpFJIXa', ''),
(3, '213132435', 'Ama', 'Philip', '213132435@upsa.edu.gh', '1990-04-15', 'female', 200, 8, '$2y$10$ETuj8.qSOAaoSijLPBII0.Pz93GI6HeSTtpXRYEiXR5HZlwf1RyA6', '');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `voters_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
