-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2020 at 04:01 AM
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
  `Author` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookdata`
--

INSERT INTO `bookdata` (`BookId`, `BookName`, `Author`, `subject`, `department`) VALUES
(1, 'SAD', 'ADSF', 'SDF', 'ASDF'),
(2, 'adsf', 'dsf', 'sd', 'ECE'),
(3, 'new book', 'rajesh', 'none', 'ECE'),
(4, '', '', '', 'ECE');

-- --------------------------------------------------------

--
-- Table structure for table `booksdata`
--

CREATE TABLE `booksdata` (
  `sno` int(11) NOT NULL,
  `BookGuid` varchar(100) NOT NULL,
  `BookName` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booksdata`
--

INSERT INTO `booksdata` (`sno`, `BookGuid`, `BookName`, `status`) VALUES
(1, '234535234', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stddataa`
--

CREATE TABLE `stddataa` (
  `sno` int(11) NOT NULL,
  `stdid` varchar(30) NOT NULL,
  `stdname` varchar(100) NOT NULL,
  `group` varchar(30) NOT NULL,
  `Books` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stddataa`
--

INSERT INTO `stddataa` (`sno`, `stdid`, `stdname`, `group`, `Books`) VALUES
(1, '007', 'rajesh', 'ECE', 0);

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
  ADD PRIMARY KEY (`TranId`),
  ADD KEY `data` (`BookGiud`);

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
  MODIFY `BookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booksdata`
--
ALTER TABLE `booksdata`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stddataa`
--
ALTER TABLE `stddataa`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TranId` int(150) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `data` FOREIGN KEY (`BookGiud`) REFERENCES `booksdata` (`BookGuid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
