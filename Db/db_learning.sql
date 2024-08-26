-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2024 at 02:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_password` varchar(60) NOT NULL,
  `admin_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`) VALUES
(7, 'alanpaul@gmail.com', '12345', 'alan'),
(8, 'albin@gmail.com', '1234', 'Albin'),
(9, 'arjun12@gmail.com', 'asd', 'Arjun'),
(11, 'pauly@gmail.com', 'p', 'pauly'),
(12, 'yadhu@gmail.com', 'y', 'yadhu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(60) NOT NULL,
  `booking_status` char(1) NOT NULL DEFAULT '0',
  `booking_payment` char(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_status`, `booking_payment`, `user_id`, `course_id`) VALUES
(1, '2024-05-25', '0', '0', 10, 0),
(6, '2024-05-25', '0', '0', 12, 0),
(7, '2024-05-25', '2', '0', 12, 18),
(8, '2024-05-25', '0', '0', 12, 17),
(9, '2024-05-25', '0', '0', 12, 18),
(10, '2024-05-28', '2', '0', 12, 19),
(11, '2024-05-28', '2', '0', 12, 20),
(12, '2024-07-05', '4', '0', 12, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'xcvxcv'),
(3, 'asdfgh'),
(4, 'pauly');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `chat_id` int(11) NOT NULL,
  `chat_datetime` varchar(50) NOT NULL,
  `chat_content` varchar(100) NOT NULL,
  `chat_fromuid` int(11) NOT NULL,
  `chat_touid` int(11) NOT NULL,
  `chat_fromtid` int(11) NOT NULL,
  `chat_totid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`chat_id`, `chat_datetime`, `chat_content`, `chat_fromuid`, `chat_touid`, `chat_fromtid`, `chat_totid`) VALUES
(1, 'August 02 2024, 12:06 PM', 'hi', 12, 0, 0, 3),
(2, 'August 02 2024, 12:14 PM', 'hloo', 12, 0, 0, 3),
(3, 'August 02 2024, 12:23 PM', 'nn', 0, 12, 3, 0),
(4, 'August 02 2024, 12:24 PM', '1', 0, 12, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chatlist`
--

CREATE TABLE `tbl_chatlist` (
  `chatlist_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `chat_content` varchar(100) NOT NULL,
  `chat_datetime` varchar(100) NOT NULL,
  `chat_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chatlist`
--

INSERT INTO `tbl_chatlist` (`chatlist_id`, `from_id`, `to_id`, `chat_content`, `chat_datetime`, `chat_type`) VALUES
(1, 12, 3, 'hloo', '2024-08-02 12:14:13', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_choice`
--

CREATE TABLE `tbl_choice` (
  `choice_id` int(11) NOT NULL,
  `choice_content` varchar(200) NOT NULL,
  `question_id` int(11) NOT NULL,
  `choice_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_choice`
--

INSERT INTO `tbl_choice` (`choice_id`, `choice_content`, `question_id`, `choice_status`) VALUES
(1, 'Elon Musk', 1, 1),
(2, 'Joseph ', 1, 0),
(3, 'Jenin', 1, 0),
(4, 'nandu', 1, 0),
(5, 'cen', 2, 0),
(6, 'alto', 2, 0),
(7, 'bmw', 2, 1),
(8, 'benz', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_content` varchar(1000) NOT NULL,
  `complaint_date` varchar(60) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_reply` varchar(1000) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_date`, `user_id`, `user_reply`, `user_status`) VALUES
(1, 'gfghdjsbsjh', 'sdfgwfafaweawdad w rar arae', '2024-07-19', 12, '', 0),
(11, 'r', 'rwrwrwrwrwrw', '2024-07-19', 12, 'sd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(60) NOT NULL,
  `course_details` varchar(60) NOT NULL,
  `course_price` varchar(60) NOT NULL,
  `language_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `course_details`, `course_price`, `language_id`, `tutor_id`) VALUES
(11, 'fghh', 'erty', '45', 16, 3),
(17, 'mssss', 'wertyui', '4555', 18, 4),
(18, 'ar', 'asdf', '20', 18, 4),
(19, 'dauiyt', 'drdg', '6768', 22, 7),
(20, '6 month', 'fsfnfn', '9000', 11, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(9, 'kollam'),
(10, 'Ernakulam'),
(11, 'Idukki'),
(12, 'kannur'),
(13, 'Malappuram'),
(14, 'Kottayam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exambody`
--

CREATE TABLE `tbl_exambody` (
  `exambody_id` int(11) NOT NULL,
  `examhead_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `choice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_examhead`
--

CREATE TABLE `tbl_examhead` (
  `test_id` int(11) NOT NULL,
  `questionpaper_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_language`
--

CREATE TABLE `tbl_language` (
  `language_id` int(11) NOT NULL,
  `language_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_language`
--

INSERT INTO `tbl_language` (`language_id`, `language_name`) VALUES
(7, 'Malayalam'),
(10, 'Arabic'),
(11, 'French'),
(13, 'Urdu'),
(16, 'German'),
(18, 'Kannada'),
(22, 'Hindi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(60) NOT NULL,
  `place_pincode` varchar(60) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `place_pincode`, `district_id`) VALUES
(4, 'Muvattupuzha', '686668', 10),
(5, 'perumbavoor', '683542', 10),
(6, 'adimali', '363839', 11),
(7, 'Pala', '353453', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `question_id` int(11) NOT NULL,
  `question_content` varchar(100) NOT NULL,
  `questionpaper_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`question_id`, `question_content`, `questionpaper_id`) VALUES
(1, 'Most rich man in  the world', 1),
(2, 'best car in the world', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questionpaper`
--

CREATE TABLE `tbl_questionpaper` (
  `questionpaper_id` int(11) NOT NULL,
  `questionpaper_date` varchar(20) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `questionpaper_status` int(11) NOT NULL DEFAULT 0,
  `language_id` int(11) NOT NULL,
  `questionpaper_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_questionpaper`
--

INSERT INTO `tbl_questionpaper` (`questionpaper_id`, `questionpaper_date`, `tutor_id`, `questionpaper_status`, `language_id`, `questionpaper_name`) VALUES
(1, '2024-08-21', 3, 0, 0, 'Hard');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_review` varchar(60) NOT NULL,
  `user_rating` varchar(60) NOT NULL,
  `review_datetime` varchar(60) NOT NULL,
  `tutor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `user_name`, `user_review`, `user_rating`, `review_datetime`, `tutor_id`) VALUES
(1, 'hi', 'njn', '3', '2024-08-09 11:12:21', 3),
(2, 'njn', 'hi', '4', '2024-08-09 11:14:01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(60) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(1, 'asas', 1),
(2, 'eret', 3),
(3, 'asd', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tutor`
--

CREATE TABLE `tbl_tutor` (
  `tutor_id` int(11) NOT NULL,
  `tutor_name` varchar(60) NOT NULL,
  `tutor_email` varchar(60) NOT NULL,
  `tutor_password` varchar(60) NOT NULL,
  `tutor_photo` varchar(100) NOT NULL,
  `tutor_proof` varchar(60) NOT NULL,
  `tutor_address` varchar(60) NOT NULL,
  `tutor_contact` varchar(60) NOT NULL,
  `tutor_doj` date NOT NULL,
  `tutor_dob` date NOT NULL,
  `place_id` int(11) NOT NULL,
  `tutor_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tutor`
--

INSERT INTO `tbl_tutor` (`tutor_id`, `tutor_name`, `tutor_email`, `tutor_password`, `tutor_photo`, `tutor_proof`, `tutor_address`, `tutor_contact`, `tutor_doj`, `tutor_dob`, `place_id`, `tutor_status`) VALUES
(3, 'alan', 'alanpaul@gmail.com', '2', 'Predator_Wallpaper_02_3840x2400.jpg', 'Predator_Wallpaper_03_3840x2400.jpg', 'asdf', '123', '2024-07-18', '2024-05-11', 4, 1),
(4, 'ww', 'ms@gmail.com', '1', 'Predator_Wallpaper_03_3840x2400.jpg', 'Predator_Wallpaper_02_3840x2400.jpg', 'adfghj', '98798', '2024-05-16', '2024-05-11', 5, 2),
(7, 'jishnu', 'jis@gmail.com', 'j', 'ScreenShot-2024-5-27_1-31-14.png', 'ScreenShot-2024-5-27_1-31-14.png', 'aszxdcfvgbhnj', '242342344', '2024-05-25', '2024-05-15', 5, 1),
(8, 'Albin', 'albi@gmail.com', 'a', 'WhatsApp Image 2023-12-15 at 4.22.20 PM - Copy - Copy.jpeg', 'WhatsApp Image 2023-12-15 at 4.34.57 PM.jpeg', 'bavappady', '123456789', '2024-07-26', '2024-07-26', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tutor_language`
--

CREATE TABLE `tbl_tutor_language` (
  `tutor_language_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tutor_language`
--

INSERT INTO `tbl_tutor_language` (`tutor_language_id`, `tutor_id`, `language_id`) VALUES
(1, 3, 7),
(20, 4, 16),
(21, 4, 18),
(22, 7, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_address` varchar(60) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_contact` varchar(60) NOT NULL,
  `user_dob` date NOT NULL,
  `user_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `place_id`, `user_address`, `user_photo`, `user_contact`, `user_dob`, `user_password`) VALUES
(10, 'vaishu', 'vaishak@gmail.com', 6, 'adasda', 'HINEX.jpg', '5686567867', '2024-05-23', 'va'),
(11, 'arju', 'arjun12@gmail.com', 5, 'asdfghjk', 'WhatsApp Image 2024-01-25 at 20.50.23_e93198b0.jpg', '123', '2024-05-25', '1'),
(12, 'ajin', 'ajin@gmail.com', 6, 'asdfghjklkjh', 'WhatsApp Image 2024-01-25 at 20.50.23_e93198b0.jpg', '345690', '2024-05-25', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `video_id` int(11) NOT NULL,
  `video_name` varchar(60) NOT NULL,
  `video_file` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`video_id`, `video_name`, `video_file`, `course_id`) VALUES
(2, 'tutorial', 'ScreenShot-2024-5-27_1-30-12.png', 0),
(3, 'tutorial', 'ScreenShot-2024-5-27_1-30-12.png', 0),
(7, 'ajin', 'KJA LED-01.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `tbl_chatlist`
--
ALTER TABLE `tbl_chatlist`
  ADD PRIMARY KEY (`chatlist_id`);

--
-- Indexes for table `tbl_choice`
--
ALTER TABLE `tbl_choice`
  ADD PRIMARY KEY (`choice_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_exambody`
--
ALTER TABLE `tbl_exambody`
  ADD PRIMARY KEY (`exambody_id`);

--
-- Indexes for table `tbl_examhead`
--
ALTER TABLE `tbl_examhead`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `tbl_language`
--
ALTER TABLE `tbl_language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `tbl_questionpaper`
--
ALTER TABLE `tbl_questionpaper`
  ADD PRIMARY KEY (`questionpaper_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_tutor`
--
ALTER TABLE `tbl_tutor`
  ADD PRIMARY KEY (`tutor_id`);

--
-- Indexes for table `tbl_tutor_language`
--
ALTER TABLE `tbl_tutor_language`
  ADD PRIMARY KEY (`tutor_language_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_chatlist`
--
ALTER TABLE `tbl_chatlist`
  MODIFY `chatlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_choice`
--
ALTER TABLE `tbl_choice`
  MODIFY `choice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_exambody`
--
ALTER TABLE `tbl_exambody`
  MODIFY `exambody_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_examhead`
--
ALTER TABLE `tbl_examhead`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_language`
--
ALTER TABLE `tbl_language`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_questionpaper`
--
ALTER TABLE `tbl_questionpaper`
  MODIFY `questionpaper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tutor`
--
ALTER TABLE `tbl_tutor`
  MODIFY `tutor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_tutor_language`
--
ALTER TABLE `tbl_tutor_language`
  MODIFY `tutor_language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
