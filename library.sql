-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 07:30 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librar`
--

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sno` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sno`, `email`, `password`, `username`) VALUES
(1, 'test@test.com', 'test', 'test');

--
-- Table structure for table `bookdata`
--

CREATE TABLE `bookdata` (
  `BookId` int(11) NOT NULL,
  `BookName` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `booksaddinfo`
--

CREATE TABLE `booksaddinfo` (
  `remarks` varchar(1000) NOT NULL,
  `Accession_num` varchar(100) NOT NULL,
  `BookId` int(2) NOT NULL,
  `call_num` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `source` varchar(100) NOT NULL,
  `invoice_num` varchar(100) NOT NULL,
  `pandp` varchar(200) NOT NULL,
  `yearofpub` varchar(200) NOT NULL,
  `pages` varchar(20) NOT NULL,
  `booksize` varchar(200) NOT NULL,
  `cost` varchar(50) NOT NULL,
  `date` varchar(200) NOT NULL,
  `slno...` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `booksdata`
--

CREATE TABLE `booksdata` (
  `sno` int(11) NOT NULL,
  `BookGuid` varchar(100) NOT NULL,
  `BookName` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `stdid` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `joraddinfo`
--

CREATE TABLE `joraddinfo` (
  `BookID` int(20) NOT NULL,
  `dateofpub` varchar(100) NOT NULL,
  `monthofpub` varchar(100) NOT NULL,
  `yearofpub` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `dteofrecived` varchar(100) NOT NULL,
  `ordernum` varchar(300) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `libinitials` varchar(250) NOT NULL,
  `remarks` varchar(350) NOT NULL,
  `ddnum` varchar(200) NOT NULL,
  `slno...` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `stddataa`
--

CREATE TABLE `stddataa` (
  `sno` int(11) NOT NULL,
  `stdid` varchar(30) NOT NULL,
  `stdname` varchar(100) NOT NULL,
  `group` varchar(30) NOT NULL,
  `Books` int(11) NOT NULL,
  `fine` int(100) NOT NULL,
  `type` int(3) NOT NULL,
  `running_fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TranId` int(150) NOT NULL,
  `StdId` varchar(100) NOT NULL,
  `StartDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `BookGiud` varchar(150) NOT NULL,
  `type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `bookdata`
--
ALTER TABLE `bookdata`
  ADD PRIMARY KEY (`BookId`);

--
-- Indexes for table `booksaddinfo`
--
ALTER TABLE `booksaddinfo`
  ADD UNIQUE KEY `slno...` (`slno...`);

--
-- Indexes for table `booksdata`
--
ALTER TABLE `booksdata`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `BookGuid` (`BookGuid`);

--
-- Indexes for table `joraddinfo`
--
ALTER TABLE `joraddinfo`
  ADD UNIQUE KEY `slno...` (`slno...`);

--
-- Indexes for table `stddataa`
--
ALTER TABLE `stddataa`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `stdid` (`stdid`(25));

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TranId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookdata`
--
ALTER TABLE `bookdata`
  MODIFY `BookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `booksaddinfo`
--
ALTER TABLE `booksaddinfo`
  MODIFY `slno...` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `booksdata`
--
ALTER TABLE `booksdata`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `joraddinfo`
--
ALTER TABLE `joraddinfo`
  MODIFY `slno...` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stddataa`
--
ALTER TABLE `stddataa`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TranId` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
