-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 08:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chaturvedi_job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `admin_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `admin_email`, `admin_pass`, `admin_username`, `first_name`, `last_name`, `dob`, `mobile_number`, `admin_type`) VALUES
(5, 'viratkohli18@gmail.com', 'Viratkohli18', 'Virat kohli', 'Virat', 'Kohli', '2002-06-19', '7894562542', 'Super_Admin'),
(6, 'rohitsharma45@gmail.com', 'Rohitsharma45', 'Rohitsharma', 'Rohit', 'sharma', '2004-06-18', '8542639758', 'Customer_Admin'),
(7, 'klrahul01@gmail.com', 'Klrahul01', 'KLRahul', 'KL', 'Rahul', '2000-10-17', '6524789546', 'Customer_Admin'),
(8, 'suryakumar63@gmail.com', 'Suryakumar63', 'SuryakumarYadav', 'Suryakumar', 'Yadav', '1999-10-12', '9568471254', 'Customer_Admin'),
(72, 'anand@gmail.com', 'anand1234', 'anand', 'anand', 'kumar', '2002-07-23', '8956465235', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_type`
--

CREATE TABLE `admin_type` (
  `id` int(10) NOT NULL,
  `admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_type`
--

INSERT INTO `admin_type` (`id`, `admin`) VALUES
(1, 'Super admin'),
(2, 'Customer admin');

-- --------------------------------------------------------

--
-- Table structure for table `all_jobs`
--

CREATE TABLE `all_jobs` (
  `job_id` int(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `des` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `job_post` varchar(100) NOT NULL,
  `last_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `all_jobs`
--

INSERT INTO `all_jobs` (`job_id`, `customer_email`, `job_title`, `des`, `country`, `state`, `city`, `category`, `job_post`, `last_date`) VALUES
(4, 'viratkohli18@gmail.com', 'Senior Software Engineer', '4+1 Exprence', 'India', 'Rajasthan', 'ajmer', 'full stack', '2023-02-23', '2023-02-28'),
(5, 'rohitsharma45@gmail.com', 'php', 'o-1 experience', 'india', 'rajsthan', 'ajmer', 'php', '2023-10-14', '2023-10-18'),
(6, 'rohitsharma45@gmail.com', 'java', 'freshers 2024 batch', 'india', 'delhi', 'gurgaon', 'web developer', '', ''),
(7, 'viratkohli18@gmail.com', 'web developer', 'strong knowledge of html&css', 'India', 'Himachal Pradesh', 'Ambarnath', 'web developer', '2023-02-24', '2023-03-02'),
(8, 'rohitsharma45@gmail.com', 'developer', 'basic knowledge of Angular js  ', 'india', 'gujrat', 'ahemdabad', 'web developer', '', ''),
(9, 'viratkohli18@gmail.com', 'software engineer trainee', 'key skills: java, html, css, php', 'Bangladesh', 'Dhaka District', 'Barisal', 'web developer', '2023-12-01', '2023-12-04'),
(15, 'viratkohli18@gmail.com', 'Frontend React Developer', 'fresher', 'Egypt', 'Minya Governorate', 'Akhmim', 'java', '2023-12-09', '2023-12-11'),
(18, 'viratkohli18@gmail.com', 'Mobile App Developer - Reactnative', 'Key Responsibilities:\r\n\r\nDesign, build, and maintain highly optimized Android and iOS Mobile UI and ', 'India', 'Gujarat', 'Ahmedabad', 'React Native', '2022-01-07', '2022-01-12'),
(41, 'rohitsharma45@gmail.com', 'wdcs', 'sdfsdf', 'Armenia', 'Kotayk Region', 'Gyumri (Leninakan)', 'full stack', '', ''),
(48, 'viratkohli18@gmail.com', 'zfsdf', 'sdfsdf', 'India', 'Rajasthan', 'Allahabad', 'pyhton', '2023-12-13', '2023-12-30'),
(49, 'viratkohli18@gmail.com', 'Frontend Web Development Senior Engineer', 'Typescript:\r\nShowcase your extensive TypeScript experience.\r\nYour code follows guidelines and is des', 'India', 'Rajasthan', 'Ajmer', 'java', '2023-12-21', ' 2023-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(10) NOT NULL,
  `company` varchar(100) NOT NULL,
  `des` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company`, `des`, `admin`) VALUES
(7, 'Apple', 'web developer\r\n4+1 experience', 'rohitsharma45@gmail.com'),
(8, 'Amazon', '                    Web developer                              ', 'klrahul01@gmail.com'),
(9, 'Accenturer', 'Data analyst', 'rohitsharma45@gmail.com'),
(10, 'wipro', '                                        data analyst                                      ', 'anurag@gmail.com'),
(16, 'Microsoft', 'Responsibilities \r\n\r\nDevelop and improve web platform features to bridge the gap between native appl', 'rohitsharma45@gmail.com'),
(33, 'infosys', 'hvdgvcgn', 'anurag@gmail.com'),
(34, 'deepti enterprice', 'fresher', 'mohitchaturvedi911@gmail.com'),
(36, 'fsfsgsd', 'sgdgd', 'rohitsharma45@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jobskeer`
--

CREATE TABLE `jobskeer` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobskeer`
--

INSERT INTO `jobskeer` (`id`, `email`, `password`, `username`, `first_name`, `last_name`, `dob`, `mobile_number`) VALUES
(2, 'rishabhpant17@gmail.com', 'Rishabhpant17', '', 'Rishabh', 'Pant', '2023-11-27', '7854213659'),
(3, 'mohitchaturvedi911@gmail.com', 'Mohit@2001', '', 'mohit', 'chaturvedi', '2023-11-28', '8955253885'),
(4, 'manish11@gmail.com', '123', '', 'manish', 'ray', '2023-12-28', '7845123690'),
(5, 'xvv@gmail.com', 'sdhgvjvgg', '', 'lokesh', 'sgs', '2001-06-29', '8895445545'),
(16, 'mohitchaturvedi2001@gmail.com', 'mohit', 'mohit', 'Mohit', 'Chaturvedi', '2023-12-11', '8955253885'),
(17, 'sdfsd@gmail.com', 'dgsdgghhhhg', '', 'sdfsd', 'sdfsd', '2000-10-11', '7998565656');

-- --------------------------------------------------------

--
-- Table structure for table `job_apply`
--

CREATE TABLE `job_apply` (
  `id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `id_job` varchar(100) NOT NULL,
  `job_seeker` varchar(100) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `active` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_apply`
--

INSERT INTO `job_apply` (`id`, `first_name`, `last_name`, `dob`, `file`, `id_job`, `job_seeker`, `mobile_number`, `status`, `active`) VALUES
(24, 'manish', 'kumar', '2001-10-24', 'Online_Job_Portal_416_419_435.pdf', '5', 'manish11@gmail.com', '8956423657', '', 0),
(25, 'mohit', 'chaturvedi', '2001-11-22', 'mca cs unit3.pptx', '5', 'mohitchaturvedi2001@gmail.com', '7854692563', '', 0),
(26, 'mohit', 'chaturvedi', '2003-02-11', 'Unit-1.docx', '6', 'rishabhpant17@gmail.com', '7878767565', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `id` int(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `des` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`id`, `category`, `des`) VALUES
(2, 'java', 'java experince'),
(3, 'full stack', 'fresher'),
(4, 'php', 'php developer'),
(5, 'web developer', 'html and css developer'),
(6, 'React Native', 'React Native'),
(7, 'Android', 'Android developer'),
(33, 'sgsrh', 'sryhrt'),
(34, 'pyhton', 'fresher');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `img`, `name`, `dob`, `number`, `email`, `user_email`) VALUES
(5, 'th.jpg', 'Virat Kohli', '2022-10-11', '8954232232', 'viratkohli18@gmail.com', 'manish11@gmail.com'),
(7, '', 'mohit', '2023-12-06', '1221521212221', 'mohitchaturvedi911@gmail.com', 'mohitchaturvedi911@gmail.com'),
(8, 'th.jpg', 'laveena', '2001-06-21', '8845545546', 'sdffn@gmail.com', 'laveena@gmail.com'),
(9, 'th.jpg', 'mohit', '2001-08-06', '7889465623', 'mohitchaturvedi2001@gmail.com', 'mohitchaturvedi2001@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_jobs`
--
ALTER TABLE `all_jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `jobskeer`
--
ALTER TABLE `jobskeer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_apply`
--
ALTER TABLE `job_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `all_jobs`
--
ALTER TABLE `all_jobs`
  MODIFY `job_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `jobskeer`
--
ALTER TABLE `jobskeer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `job_apply`
--
ALTER TABLE `job_apply`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
