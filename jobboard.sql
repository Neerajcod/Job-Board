-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2025 at 04:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `Full_name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Cover_letter` varchar(255) DEFAULT NULL,
  `Linkedin` varchar(255) DEFAULT NULL,
  `Resume` varchar(255) NOT NULL,
  `status` enum('Recieved','Reviewed','Interview Scheduled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `job_id`, `Full_name`, `Email`, `Cover_letter`, `Linkedin`, `Resume`, `status`) VALUES
(4, 2, 'Priyanshu Chaturvedi', 'neeraj@gmal.com', '', '', 'uploads/resumes/resume 1.pdf', 'Reviewed'),
(5, 2, 'Priyanshu Chaturvedi', 'neeraj@gmal.com', '', '', 'uploads/resumes/resume 1.pdf', ''),
(6, 3, 'Neeraj Chaturvedi', 'piyush@gmail.com', '', '', 'uploads/resumes/resume 1.pdf', ''),
(7, 4, 'Swati Chaturvedi', 'swati@gmail.com', '', '', 'uploads/resumes/resume 1.pdf', ''),
(8, 1, 'Neeraj', 'piyush@gmail.com', '', '', 'uploads/resumes/resume 1.pdf', ''),
(9, 2, 'sanjay Chaturvedi', 'neeraj@gmal.com', '', '', 'uploads/resumes/Final Resume1.pdf', 'Recieved'),
(10, 2, 'sanjay Chaturvedi', 'neeraj@gmal.com', '', '', 'uploads/resumes/Final Resume1.pdf', 'Recieved'),
(11, 3, 'Raj Chaturvedi', 'microsoft@gmail.com', 'ams cBASCBliackNASC', 'https://in.linkedin.com/', 'uploads/resumes/neeraj add.pdf', 'Interview Scheduled'),
(12, 2, 'Priyanshu Chaturvedi', 'priyanshuchaturvedi74@gmail.com', 'jdfnbdfjbn', 'https://in.linkedin.com/', 'uploads/resumes/Final Resume1.pdf', 'Reviewed'),
(13, 2, 'Priyanshu Chaturvedi', 'priyanshuchaturvedi74@gmail.com', 'kvlakbsvikalskca', 'https://www.google.com', 'uploads/resumes/Final Resume1.pdf', 'Recieved'),
(14, 3, 'Priyanshu Chaturvedi', 'priyanshuchaturvedi74@gmail.com', 'mbjkbdoiwdln', 'https://www.google.com', 'uploads/resumes/Final Resume1.pdf', 'Recieved'),
(15, 2, 'Priyanshu Chaturvedi', 'priyanshuchaturvedi74@gmail.com', 'kcsnoBIOCLONakcn', 'https://www.google.com', 'uploads/Final Resume1.pdf', 'Recieved'),
(16, 2, 'Priyanshu Chaturvedi', 'priyanshuchaturvedi74@gmail.com', 'kcsnoBIOCLONakcn', 'https://www.google.com', 'uploads/Final Resume1.pdf', 'Recieved'),
(17, 2, 'Priyanshu Chaturvedi', 'priyanshuchaturvedi74@gmail.com', 'kcsnoBIOCLONakcn', 'https://www.google.com', 'uploads/Final Resume1.pdf', 'Recieved'),
(18, 2, 'Priyanshu Chaturvedi', 'priyanshuchaturvedi74@gmail.com', 'kcsnoBIOCLONakcn', 'https://www.google.com', 'uploads/Final Resume1.pdf', 'Recieved'),
(19, 2, 'Priyanshu Chaturvedi', 'priyanshuchaturvedi74@gmail.com', 'kcsnoBIOCLONakcn', 'https://www.google.com', 'uploads/Final Resume1.pdf', 'Recieved'),
(20, 6, 'Priyanshu Chaturvedi', 'neeraj@gmal.com', 'amblKABSLCABSKC.', 'https://in.linkedin.com/', 'uploads/RailwayForm.pdf', 'Recieved'),
(21, 9, 'Neeraj Chaturvedi', 'priyanshuchaturvedi420@gmail.com', 'ADOjbadolkjascnknask', 'https://in.linkedin.com/', 'uploads/neeraj add.pdf', 'Recieved'),
(22, 5, 'Priyanshu Chaturvedi', 'microsoft@gmail.com', 'SKLDNGIOSDNIO', 'https://in.linkedin.com/', 'uploads/Final Resume1.pdf', 'Recieved'),
(23, 9, 'Raj Chaturvedi', 'microsoft@gmail.com', 'KNVOSKDNKSNODKV', 'https://in.linkedin.com/', 'uploads/Final Resume1.pdf', 'Recieved'),
(24, 1, 'Priyanshu Chaturvedi01', 'priyanshuchaturvedi74@gmail.com', 'cbfzdbzdb', 'https://in.linkedin.com/', 'uploads/Final Resume1.pdf', 'Recieved'),
(25, 1, 'Shravan chaturvedi', 'a7738535046@gmail.com', 'kfmbzdbkmzd', 'https://in.linkedin.com/', 'uploads/neeraj add.pdf', 'Recieved'),
(26, 11, 'Neeraj Chaturvedi', 'neeraj@gmal.com', 'fh', 'https://www.google.com', 'uploads/Final Resume1.pdf', 'Recieved'),
(27, 7, 'Raj Chaturvedi', 'admin@admin.com', 'nkl', 'https://www.google.com', 'uploads/neeraj add.pdf', 'Recieved');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `DOB` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone No` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Education` varchar(255) NOT NULL,
  `Marks` varchar(255) NOT NULL,
  `Experience` varchar(255) NOT NULL,
  `Skills` varchar(255) NOT NULL,
  `Linkedin` varchar(255) NOT NULL,
  `Portfolio` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`Id`, `Name`, `DOB`, `Email`, `Phone No`, `Address`, `Education`, `Marks`, `Experience`, `Skills`, `Linkedin`, `Portfolio`, `Password`) VALUES
(1, 'Neeraj Chaturvedi', '2003-01-30', 'neeraj@gmail.com', '07304312249', 'Prabhunath Mishra Chawl 4', 'graduation', '7.92', 'Fresher', '', '', '', ''),
(2, 'Neeraj Chaturvedi', '2003-09-30', 'neeraj@gmail.com', '07304312249', 'Prabhunath Mishra Chawl\r\n4', 'graduation', '7.92', 'Fresher', '', '', '', ''),
(3, 'Neeraj Chaturvedi', '2003-01-03', 'neeraj@gmail.com', '07304312249', 'Prabhunath Mishra Chawl\r\n4', 'graduation', '7.92', 'Fresher', '', '', '', ''),
(4, 'Neeraj Chaturvedi', '2003-09-30', 'neeraj@gmail.com', '07304312249', 'Prabhunath Mishra Chawl\r\n4', 'graduation', '7.92', 'Fresher', 'html', '', '', ''),
(5, 'Neeraj Chaturvedi', '2003-09-30', 'neeraj@gmail.com', '07304312249', 'Prabhunath Mishra Chawl\r\n4', 'graduation', '7.92', 'Fresher', 'html,css,javascript', '', '', ''),
(6, 'Neeraj Chaturvedi', '2003-09-30', 'neeraj@gmail.com', '07304312249', 'Prabhunath Mishra Chawl\r\n4', 'graduation', '7.92', 'Fresher', 'html,css,javascript,bootstrap', '', '', ''),
(7, 'Neeraj Chaturvedi', '2003-09-30', 'neeraj@gmail.com', '07304312249', 'Prabhunath Mishra Chawl\r\n4', 'graduation', '7.92', 'Fresher', 'html,css,javascript,bootstrap,javaa,python,c,c sharp,django,flask,react,angular,vue,cakephp,laravel,vanilla js', '', '', ''),
(8, 'Neeraj Chaturvedi', '2003-09-30', 'neeraj@gmal.com', '07304312249', 'Prabhunath Mishra Chawl\r\n4', 'graduation', '7.92', 'Fresher', '', '', '', ''),
(9, 'Neeraj', '2003-09-30', 'neeraj@gmal.com', '07304312249', 'Prabhunath Mishra Chawl4', 'graduation', '7.92', '', '', '', '', 'Neeraj@1');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Id` int(11) NOT NULL,
  `Company Name` varchar(100) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Bussiness Type` varchar(100) NOT NULL,
  `Bussiness Activity` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Owner` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Id`, `Company Name`, `Email`, `Bussiness Type`, `Bussiness Activity`, `Address`, `Owner`, `Password`) VALUES
(5, 'Tune Stream', '', 'privateLimited', 'new', 'india', 'Piyush', ''),
(6, 'Tune Stream', '', 'partnership', 'new', 'india', 'Piyush', ''),
(7, '', '', '', '', '', '', ''),
(8, 'amazon', '', 'partnership', 'new old', 'usa', 'prashant', ''),
(9, 'google', 'neeraj@gmail.com', 'soleProprietorship', 'new', 'india', 'piyush', 'Neeraj@1'),
(10, 'facebook', 'swati@gmail.com', 'partnership', 'new', 'india', 'swati', 'Swati@1'),
(11, 'insta', 'piyush@gmail.com', 'soleProprietorship', 'new', 'india', 'piyush', 'Piyush@1');

-- --------------------------------------------------------

--
-- Table structure for table `joblist`
--

CREATE TABLE `joblist` (
  `Id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Compname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Jobdesc` varchar(255) NOT NULL,
  `Jobtype` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Salary` varchar(255) NOT NULL,
  `Deadline` varchar(255) NOT NULL,
  `Logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `joblist`
--

INSERT INTO `joblist` (`Id`, `Title`, `Compname`, `Email`, `Jobdesc`, `Jobtype`, `Location`, `Salary`, `Deadline`, `Logo`) VALUES
(1, 'php react', 'Tune Stream', '', 'qwertyuiopasdfghjklzxcvbnm', 'Full Time', 'india', '100000', '2028-01-01', 'uploads/WhatsApp Image 2024-12-10 at 1.18.07 PM.jpeg'),
(2, 'Java', 'Microsoft', '', 'qazwsxedcrfvtgbyhnujmikolp', 'Part Time', 'USA', '9000000', '2028-01-01', 'uploads/WhatsApp Image 2024-12-08 at 9.34.53 PM.jpeg'),
(3, 'Python', 'Google', '', 'zxcvbnmasdfghjklqwertyuiop', 'Contract', 'UK', '9000000', '2028-01-01', 'uploads/WhatsApp Image 2024-12-10 at 1.41.52 PM.jpeg'),
(4, 'Go', 'Amazon', '', 'qwertyuiop[asdfghjklzxcvbnm', 'Full Time', 'Canada', '1000000', '2028-01-01', 'company/uploads/WhatsApp Image 2024-12-10 at 1.36.20 PM.jpeg'),
(5, 'Go', 'Amazon', '', 'qwertyuiop[asdfghjklzxcvbnm', 'Full Time', 'Canada', '1000000', '2028-01-01', 'company/uploads/'),
(6, 'Go', 'Amazon', '', 'qwertyuiop[asdfghjklzxcvbnm', 'Full Time', 'Canada', '1000000', '2028-01-01', 'uploads/WhatsApp Image 2024-12-10 at 1.36.20 PM.jpeg'),
(7, 'Train Engineer', 'MicroSoft', '', 'ablfkabfpawbofasc', 'Part Time', 'Banglore', '1000000', '1950-03-01', 'uploads/flower-garden-blue-sky-hokkaido-japan-60628.jpeg'),
(8, 'Software Engineer', 'Accenture', 'neerajchaturvedi730@gmail.com', 'asclobascoianlsc', 'Full Time', '4552255', '16421326', '2111-11-11', 'uploads/flower-garden-blue-sky-hokkaido-japan-60628.jpeg'),
(9, 'Software Engineer', 'MicroSoft', 'priyanshuchaturvedi74@gmail.com', 'smapsnca;scasc', 'Part Time', 'Banglore', '10000000', '2007-09-02', 'uploads/flower-garden-blue-sky-hokkaido-japan-60628.jpeg'),
(10, 'Technical Engnieer', 'MicroSoft', 'neerajchaturvedi730@gmail.com', 'ASNKAOISNAILNS;CANS', 'Full Time', 'Delhi', '10000000', '2004-04-04', 'uploads/flower-garden-blue-sky-hokkaido-japan-60628.jpeg'),
(11, 'engineer', 'TCS', 'priyanshuchaturvedi74@gmail.com', 'djnsdgn', 'Full Time', 'Mumbai', '10000000', '2000-10-20', 'uploads/1.png'),
(12, 'chai wala', 'CTC', 'shravanchaturvedi74@gmail.com', 'cvbmzfml', 'Full Time', 'Pune', '345555', '2005-10-05', 'uploads/flower-garden-blue-sky-hokkaido-japan-60628.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `joblist`
--
ALTER TABLE `joblist`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `joblist`
--
ALTER TABLE `joblist`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `joblist` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
