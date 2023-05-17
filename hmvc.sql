-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 08:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_description` varchar(255) NOT NULL,
  `course_duration` varchar(255) NOT NULL,
  `course_offered_by` varchar(255) NOT NULL,
  `course_instructor` varchar(255) NOT NULL,
  `course_rating` float NOT NULL,
  `course_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_description`, `course_duration`, `course_offered_by`, `course_instructor`, `course_rating`, `course_image`) VALUES
(1, 'Mern Stack Developmemt', 'jndovnowenownv', '6 months', 'Ebridge Technologies', 'Ahsan Ali Mansoor', 0.5, ''),
(3, 'Introduction to Programming Fundamentals', 'nqfoefhiohgihgineoncnh', '4 Months', 'University of Central Punjab', 'Umer Naeem', 0.666667, ''),
(4, 'Digital Marketing and Ecommerce', 'kscnofboebuifbuibuibvibecbwibf', '6h 30m', 'Google', 'Keralin Vendor', 0.666667, ''),
(5, 'Satisfaction Guaranteed: Develop Customer Loyalty Online', 'You will examine how to gather and analyze data for an online store. You’ll learn how to use the data you’ve gathered to improve conversions and increase sales. You’ll also learn how to identify which products are performing well or underperforming. Final', '4 Weeks', 'Google', 'Author Hobs', 0, ''),
(6, 'MAVEN Stack Development', 'MAVEN stack is a collection of technologies that enables faster application development. It is used by developers worldwide. The main purpose of using MAVEN stack is to develop apps using JavaScript only. This is because the four technologies that make up', '1 year', 'Meta', 'John Elias', 0.833333, ''),
(7, 'Web Programming & PHP', 'PHP is a server-side scripting language embedded in HTML in its simplest form. PHP allows web developers to create dynamic content and interact with databases. PHP is known for its simplicity, speed, and flexibility — features that have made it a cornerst', '2 Months', 'Meta', 'Danny Morison', 0, ''),
(8, 'OOP C++/Python/Java/JavaScript', 'Object-oriented programming (OOP) is a style of programming characterized by the identification of classes of objects closely linked with the methods (functions) with which they are associated. It also includes ideas of inheritance of attributes and metho', '6 days', 'University of Edenburgh', 'Waqar Mughal', 0.666667, ''),
(9, 'SEO Training', 'Search engine optimization (SEO) is the process of improving your website to increase visibility on popular search engines such as Google and Bing. In this certification course, you\'ll learn all things SEO, including website optimization, link building, k', '1 month', 'Ebridge Technologies', 'Khadija Nasir', 0.5, ''),
(10, 'Theory of Data Science', 'jdenfnfjenvjb2gjkb', '6 months', 'Meta', 'Sabir Hussain', 0.666667, ''),
(11, 'Elements of AI', 'At its simplest form, artificial intelligence is a field, which combines computer science and robust datasets, to enable problem-solving. It also encompasses sub-fields of machine learning and deep learning, which are frequently mentioned in conjunction w', '5 days', 'University of Helsinki', 'Jozz Bari', 0.833333, '');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enroll_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_description` varchar(255) NOT NULL,
  `course_duration` varchar(255) NOT NULL,
  `course_offered_by` varchar(255) NOT NULL,
  `course_instructor` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enroll_id`, `course_id`, `user_id`, `course_name`, `course_description`, `course_duration`, `course_offered_by`, `course_instructor`, `status`) VALUES
(12, 1, 7, 'Mern Stack Developmemt', 'jndovnowenownv', '6 months', 'Ebridge Technologies', 'Ahsan Ali Mansoor', 'active'),
(14, 3, 1, 'Introduction to Programming Fundamentals', 'nqfoefhiohgihgineoncnh', '4 Months', 'University of Central Punjab', 'Umer Naeem', 'completed'),
(16, 4, 1, 'Digital Marketing and Ecommerce', 'kscnofboebuifbuibuibvibecbwibf', '6h 30m', 'Google', 'Keralin Vendor', 'completed'),
(17, 8, 1, 'OOP C++/Python/Java/JavaScript', 'Object-oriented programming (OOP) is a style of programming characterized by the identification of classes of objects closely linked with the methods (functions) with which they are associated. It also includes ideas of inheritance of attributes and metho', '6 days', 'University of Edenburgh', 'Waqar Mughal', 'completed'),
(18, 9, 1, 'SEO Training', 'Search engine optimization (SEO) is the process of improving your website to increase visibility on popular search engines such as Google and Bing. In this certification course, you\'ll learn all things SEO, including website optimization, link building, k', '1 month', 'Ebridge Technologies', 'Khadija Nasir', 'completed'),
(19, 11, 1, 'Elements of AI', 'At its simplest form, artificial intelligence is a field, which combines computer science and robust datasets, to enable problem-solving. It also encompasses sub-fields of machine learning and deep learning, which are frequently mentioned in conjunction w', '5 days', 'University of Helsinki', 'Jozz Bari', 'completed'),
(20, 10, 1, 'Theory of Data Science', 'jdenfnfjenvjb2gjkb', '6 months', 'Meta', 'Sabir Hussain', 'completed'),
(21, 6, 1, 'MAVEN Stack Development', 'MAVEN stack is a collection of technologies that enables faster application development. It is used by developers worldwide. The main purpose of using MAVEN stack is to develop apps using JavaScript only. This is because the four technologies that make up', '1 year', 'Meta', 'John Elias', 'completed'),
(22, 1, 3, 'Mern Stack Developmemt', 'jndovnowenownv', '6 months', 'Ebridge Technologies', 'Ahsan Ali Mansoor', 'active'),
(23, 4, 3, 'Digital Marketing and Ecommerce', 'kscnofboebuifbuibuibvibecbwibf', '6h 30m', 'Google', 'Keralin Vendor', 'completed'),
(30, 1, 15, 'Mern Stack Developmemt', 'jndovnowenownv', '6 months', 'Ebridge Technologies', 'Ahsan Ali Mansoor', 'active'),
(31, 1, 1, 'Mern Stack Developmemt', 'jndovnowenownv', '6 months', 'Ebridge Technologies', 'Ahsan Ali Mansoor', 'completed'),
(33, 5, 1, 'Satisfaction Guaranteed: Develop Customer Loyalty Online', 'You will examine how to gather and analyze data for an online store. You’ll learn how to use the data you’ve gathered to improve conversions and increase sales. You’ll also learn how to identify which products are performing well or underperforming. Final', '4 Weeks', 'Google', 'Author Hobs', 'active'),
(34, 7, 1, 'Web Programming & PHP', 'PHP is a server-side scripting language embedded in HTML in its simplest form. PHP allows web developers to create dynamic content and interact with databases. PHP is known for its simplicity, speed, and flexibility — features that have made it a cornerst', '2 Months', 'Meta', 'Danny Morison', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_profile`) VALUES
(1, 'Waleed Zaheer', 'waleed.zaheer55@gmail.com', 'alpha123', ''),
(2, 'M Azman', 'azman@yahoo.com', 'azi123', ''),
(3, 'Rafay Arshad', 'rafay@badoo.com', 'rafay1234', ''),
(4, 'Fahad', 'faha12@gmail.com', 'fahad12233', ''),
(5, 'John Doe', 'john@gmail.com', 'john1234', ''),
(6, 'Hamza', 'hamza@gmail.com', 'hamza123', ''),
(7, 'Ibtisam Shiekh', 'ibtisam@outlook.com', 'ib1234', ''),
(8, 'Farukh', 'farukh@ucp.edu.pk', 'farukh123', ''),
(9, 'Hassan Amjad', 'l1f20ascs0030@ucp.edu.pk', 'hassan123', ''),
(10, 'Ali', 'ali@gmail.com', 'ali1234', ''),
(11, 'M Azman', 'nim@gmail.com', 'azi345', ''),
(12, 'Evan', 'eve@gmail.com', 'eve1234', ''),
(13, 'dh', 'dh@gmail.com', 'dh1234', ''),
(14, 'Waleed Zaheer', 'bluemen522@gmail.com', 'bluew123', ''),
(15, 'ci', 'ci@gmail.com', 'ci12345', ''),
(16, 'Shahid', 'shahid@gmail.com', 'shah1234', ''),
(17, 'Moez', 'moez@gmail.com', 'moez12345', ''),
(18, 'Waleed Zaheer', 'alpha@gmail.com', 'alpha123', ''),
(19, 'Danish', 'shieldshed@gmail.com', 'shield123', ''),
(20, 'M Azman', 'hjk@gmail.com', 'hjnkl123', ''),
(21, 'Umair', 'umair@gmail.com', 'umair123', ''),
(22, 'Tipu', 'tipu@lordsmobile.com', 'tipu123', ''),
(23, 'ghio', 'ghio@lordsmobile.com', 'ghio123', ''),
(24, 'John Fleg', 'johnfleg@gmail.com', 'hjkloiuyt', ''),
(25, 'Kloia', 'kl@gmail.com', 'kdhuiwioq', ''),
(26, 'Pny', 'pny@gmail.com', 'pnhyterju', ''),
(27, 'Farukh', 'hwdyh@gmail.com', 'oeuetyfbjf', ''),
(28, 'Jio', 'hsidjwo@gmail.com', 'hewufhndjw', ''),
(29, 'jsaodj', 'heyeoo@gmail.com', 'ueieinffn', ''),
(30, 'Het', 'het@gmail.com', 'het123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enroll_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
