-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2017 at 04:57 PM
-- Server version: 5.6.16
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agora`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `jobtitle` varchar(45) NOT NULL,
  `jobtype` varchar(45) NOT NULL,
  `company` varchar(50) NOT NULL,
  `deadline` date NOT NULL,
  `location` varchar(45) NOT NULL,
  `app_email` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `qualifications` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `jobtitle`, `jobtype`, `company`, `deadline`, `location`, `app_email`, `description`, `qualifications`, `created_at`) VALUES
(1, 'Software Developer', 'Full Time', 'MiWorld', '2017-01-25', 'Lusaka, Zambia', 'app@mail.com', 'Okay, so here we go, when the user submits the form, i use AJAX to collect the data and put it into an obj to post(JSON encoding) it to the first PHP script which is here', 'java\r\nphp', '2017-01-18 09:54:41'),
(2, 'System Analyst', 'Contract', 'Agora Innovatus', '2017-01-31', 'Ndola, Zambia', 'agora@innovatus.info', 'Sessions are a simple way to store data for individual users against a unique session ID. This can be used to persist state information between page requests. Session IDs are normally sent to the browser via session cookies and the ID is used to retrieve existing session data. The absence of an ID or session cookie lets PHP know to create a new session, and generate a new session ID.\r\n    ', 'CCNA Certification\r\nIT Essentials Certification\r\n    ', '2017-01-18 10:46:34'),
(3, 'Database Admin', 'Contract', 'MiWorld', '2017-02-04', 'Lusaka, Zambia', 'app@mail.com', 'As a database administrator (DBA) you will be responsible for the performance, integrity and security of a database. They will also be involved in the planning and development of the database, as well as troubleshooting any issues on behalf of the users.\r\n    ', '2 years experience\r\nGood sense of humor.\r\n    ', '2017-01-18 10:59:28'),
(4, 'ICT Instructor', 'Internship', 'Agora Innovatus', '2017-02-08', 'Ndola, Zambia', 'agora@innovatus.info', 'You will be responsible for teaching senior citizens ICT and everything tech related.\r\n\r\n    ', '1 year teaching experience\r\nICT diploma.\r\n    ', '2017-01-18 11:05:32'),
(5, 'Graphics Guy', 'Freelance', 'PML', '2017-02-20', 'Livingstone', 'pml@gmail.com', 'Computer engineering or CSE is a field of engineering that is concerned with computer software development and research. We provide the widest list of computer engineering projects for engineering students. Nevonprojects has the widest variety of projects for computer science students. This page lists a variety of computer science projects ideas for students research and development. This page lists the best and latest innovative final year project topics for Cse and other software engineering branches. This section lists various b tech final year projects for cse along with be final year projects for cse branch. These projects have been researched and compiled into a list to make it easy for students to choose their desired project topic for final year presentation. Get the widest list of cse projects at NevonProjects. Browse through our list below to find your final year computer engineering project topics:\r\n    ', '2 years experience\r\nneed to be good with Adobe Lightroom\r\nAwesome sense of humour\r\n    ', '2017-02-03 11:14:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
