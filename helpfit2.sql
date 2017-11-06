-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 03:43 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpfit2`
--

-- --------------------------------------------------------

--
-- Table structure for table `grouptraining`
--

CREATE TABLE `grouptraining` (
  `sessionID` int(10) NOT NULL,
  `classType` varchar(50) NOT NULL,
  `maxParticipants` int(10) NOT NULL,
  `numParticipants` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grouptraining`
--

INSERT INTO `grouptraining` (`sessionID`, `classType`, `maxParticipants`, `numParticipants`) VALUES
(1002, 'Dance', 9, 10),
(1003, 'Dance', 10, 0),
(1005, 'Dance', 10, 0),
(1006, 'Dance', 10, 0),
(1007, 'Dance', 10, 0),
(1008, 'Sports', 2, 0),
(1009, 'Sports', 2, 0),
(1010, 'Dance', 10, 0),
(1014, 'Sports', 9, 0),
(1016, 'Dance', 12, 0),
(1017, 'Sports', 17, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `username` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`username`, `level`) VALUES
('jane', 'Advanced'),
('sera', 'Advanced'),
('tan', 'Beginner');

-- --------------------------------------------------------

--
-- Table structure for table `membersessions`
--

CREATE TABLE `membersessions` (
  `username` varchar(50) NOT NULL,
  `sessionID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membersessions`
--

INSERT INTO `membersessions` (`username`, `sessionID`) VALUES
('jane', 1004),
('jane', 1002),
('jane', 1015);

-- --------------------------------------------------------

--
-- Table structure for table `personaltraining`
--

CREATE TABLE `personaltraining` (
  `sessionID` int(10) NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personaltraining`
--

INSERT INTO `personaltraining` (`sessionID`, `notes`) VALUES
(1000, 'hihihi'),
(1001, 'hi'),
(1002, 'hihihi'),
(1003, 'hihihi'),
(1004, 'hihih'),
(1005, 'hihi'),
(1006, 'go'),
(1007, 'hihihi'),
(1008, 'hihihi'),
(1009, 'hihihi'),
(1011, 'hihii'),
(1012, 'hihihi'),
(1013, 'hihihi'),
(1015, 'hihihi');

-- --------------------------------------------------------

--
-- Table structure for table `regtrainingsession`
--

CREATE TABLE `regtrainingsession` (
  `sessionID` int(10) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `fee` float NOT NULL,
  `classType` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` varchar(10) CHARACTER SET utf8 NOT NULL,
  `trainer` varchar(10) CHARACTER SET utf8 NOT NULL,
  `rating` int(10) NOT NULL,
  `speciality` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `username` varchar(50) NOT NULL,
  `speciality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`username`, `speciality`) VALUES
('john', 'MMA'),
('john1', 'MMA'),
('john123', ''),
('seratigger', 'Hi'),
('shaoqi', 'hi'),
('tansq16', 'MMA');

-- --------------------------------------------------------

--
-- Table structure for table `trainerrating`
--

CREATE TABLE `trainerrating` (
  `username` varchar(50) NOT NULL,
  `rating` int(10) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainerrating`
--

INSERT INTO `trainerrating` (`username`, `rating`, `comments`) VALUES
('', 0, ''),
('tansq16', 2, 'hihihi'),
('tansq16', 4, 'bye'),
('tansq16', 5, 'vvvvv'),
('tansq16', 2, 'yuo'),
('tansq16', 1, 'you'),
('tansq16', 3, 'ti'),
('shaoqi', 2, 'ghost'),
('tansq16', 1, 'booooo');

-- --------------------------------------------------------

--
-- Table structure for table `trainersessions`
--

CREATE TABLE `trainersessions` (
  `username` varchar(50) NOT NULL,
  `sessionID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainersessions`
--

INSERT INTO `trainersessions` (`username`, `sessionID`) VALUES
('tansq16', 1002),
('tansq16', 1003),
('tansq16', 1005),
('tansq16', 1006),
('tansq16', 1007),
('tansq16', 1008),
('tansq16', 1009),
('tansq16', 1013),
('tansq16', 1014),
('shaoqi', 1015),
('shaoqi', 1016),
('tansq16', 1017),
('tansq16', 1004);

-- --------------------------------------------------------

--
-- Table structure for table `trainingsession`
--

CREATE TABLE `trainingsession` (
  `sessionID` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `fee` float NOT NULL,
  `status` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainingsession`
--

INSERT INTO `trainingsession` (`sessionID`, `title`, `date`, `time`, `fee`, `status`, `type`) VALUES
(1000, 'hihihi', '2017-10-17', '15:00:00', 90, 'Cancelled', 'Personal'),
(1001, 'just', '0000-00-00', '00:00:00', 100, 'Available', 'Personal'),
(1002, 'hi', '2017-11-09', '09:50:31', 200, 'Available', 'Group'),
(1003, 'hi', '2017-11-09', '16:58:43', 100, 'Available', 'Personal'),
(1004, 'dance', '2017-11-18', '16:59:44', 100, 'Available', 'Personal'),
(1005, 'hi', '2017-11-22', '17:01:56', 1000, 'Available', 'Personal'),
(1006, 'hi', '2017-11-10', '17:14:58', 800, 'Available', 'Personal'),
(1007, 'hi', '2017-11-17', '17:19:50', 80, 'Available', 'Group'),
(1008, 'hi', '2017-11-03', '17:21:44', 70, 'Available', 'Personal'),
(1009, 'hi', '2017-11-15', '17:22:11', 100, 'Available', 'Group'),
(1010, 'blabla', '2017-11-15', '17:33:30', 900, 'Available', 'Group'),
(1011, 'gogogo', '2017-11-17', '17:37:24', 800, 'Available', 'Personal'),
(1012, 'GHOST', '2017-11-03', '17:39:18', 800, 'Available', 'Personal'),
(1013, 'hi', '2017-11-02', '17:44:16', 10, 'Available', 'Personal'),
(1014, 'bye', '2017-11-16', '17:46:09', 80, 'Available', 'Group'),
(1015, 'lalalala', '2017-11-09', '17:49:08', 90, 'Available', 'Personal'),
(1016, 'yi', '2017-11-15', '18:04:29', 800, 'Available', 'Group'),
(1017, 'hihihihihihihihi', '2017-11-08', '20:20:50', 100, 'Available', 'Group');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fullname`, `email`) VALUES
('jane', '123456', 'Jane', 'jane@gmail.com'),
('john', '123456', 'John Smith', 'john@gmail.com'),
('john1', 'qw3456', 'John Smith', 'john@gmail.com'),
('john123', '123456', 'John Smith', 'john@gmail.com'),
('sera', '123456', 'sera', 'sera@gmail.com'),
('shaoqi', '123456', 'shao', 't@gmail.com'),
('tan', '123456', 'Shao', 'tan@gmail.com'),
('tansq16', '123456', 'Shao', 'tansq16@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grouptraining`
--
ALTER TABLE `grouptraining`
  ADD PRIMARY KEY (`sessionID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `personaltraining`
--
ALTER TABLE `personaltraining`
  ADD PRIMARY KEY (`sessionID`);

--
-- Indexes for table `regtrainingsession`
--
ALTER TABLE `regtrainingsession`
  ADD PRIMARY KEY (`sessionID`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `trainingsession`
--
ALTER TABLE `trainingsession`
  ADD PRIMARY KEY (`sessionID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `regtrainingsession`
--
ALTER TABLE `regtrainingsession`
  MODIFY `sessionID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainingsession`
--
ALTER TABLE `trainingsession`
  MODIFY `sessionID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1018;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grouptraining`
--
ALTER TABLE `grouptraining`
  ADD CONSTRAINT `grouptraining_ibfk_1` FOREIGN KEY (`sessionID`) REFERENCES `trainingsession` (`sessionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personaltraining`
--
ALTER TABLE `personaltraining`
  ADD CONSTRAINT `personaltraining_ibfk_1` FOREIGN KEY (`sessionID`) REFERENCES `trainingsession` (`sessionID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
