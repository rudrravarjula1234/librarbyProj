-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2020 at 07:01 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

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

-- --------------------------------------------------------

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
-- Dumping data for table `bookdata`
--

INSERT INTO `bookdata` (`BookId`, `BookName`, `edition`, `type`) VALUES
(2, 'adsf', '', 0),
(3, 'name', 'jlk', 0),
(4, '', '', 0),
(5, '', '', 0);

-- --------------------------------------------------------

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
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booksdata`
--

CREATE TABLE `booksdata` (
  `sno` int(11) NOT NULL,
  `BookGuid` varchar(100) NOT NULL,
  `BookName` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `stdid` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booksdata`
--

INSERT INTO `booksdata` (`sno`, `BookGuid`, `BookName`, `status`, `stdid`) VALUES
(6, '25e1f3885a5e6c10', 2, 0, NULL),
(7, '25e1f3885a5e6c9', 2, 0, NULL),
(8, '25e1f3885a5e6c8', 2, 0, NULL),
(9, '25e1f3885a5e6c7', 2, 0, NULL),
(10, '25e1f3885a5e6c6', 2, 0, NULL),
(11, '25e1f3885a5e6c5', 2, 0, NULL),
(12, '25e1f3885a5e6c4', 2, 0, NULL),
(13, '25e1f3885a5e6c3', 2, 0, NULL),
(14, '25e1f3885a5e6c2', 2, 0, NULL),
(15, '25e1f3885a5e6c1', 2, 0, NULL);

-- --------------------------------------------------------

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
  `ddnum` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

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
  `type` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stddataa`
--

INSERT INTO `stddataa` (`sno`, `stdid`, `stdname`, `group`, `Books`, `fine`, `type`) VALUES
(1, '007', 'rajesh', 'ECE', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TranId` int(150) NOT NULL,
  `StdId` varchar(100) NOT NULL,
  `StartDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `BookGiud` varchar(150) NOT NULL,
  `type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TranId`, `StdId`, `StartDate`, `BookGiud`, `type`) VALUES
(1, '007', '2020-01-12 17:16:48', '15e19fa4dd5a562', 1),
(16, '007', '2020-01-12 17:36:38', '15e19fa4dd5a562', 1),
(17, '007', '2020-01-12 17:48:29', '15e19fa4dd5a562', 2),
(18, '007', '2020-01-12 17:49:24', '15e19fa4dd5a562', 1),
(19, '007', '2020-01-12 17:49:27', '15e19fa4dd5a562', 1),
(20, '007', '2020-01-12 17:50:49', '15e19fa4dd5a562', 1),
(21, '007', '2020-01-12 17:57:47', '15e19fa4dd5a562', 1),
(22, '007', '2020-01-12 17:58:31', '15e19fa4dd5a562', 1),
(23, '007', '2020-01-12 18:01:34', '15e19fa4dd5a562', 1),
(24, '007', '2020-01-12 18:01:36', '15e19fa4dd5a562', 1),
(25, '007', '2020-01-12 18:02:24', '15e19fa4dd5a562', 2),
(26, '007', '2020-01-14 16:46:33', '25e1f3885a5e6c9', 1),
(27, '007', '2020-01-15 17:55:44', '25e1f3885a5e6c9', 2),
(28, '007', '2020-01-15 17:56:30', '25e1f3885a5e6c9', 1),
(29, '007', '2020-01-15 17:58:44', '25e1f3885a5e6c9', 2);

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
-- Indexes for table `booksdata`
--
ALTER TABLE `booksdata`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `BookGuid` (`BookGuid`);

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
  MODIFY `BookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booksdata`
--
ALTER TABLE `booksdata`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stddataa`
--
ALTER TABLE `stddataa`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TranId` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
