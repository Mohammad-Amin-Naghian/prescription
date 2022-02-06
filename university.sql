-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2021 at 12:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `ct_tbl`
--

CREATE TABLE `ct_tbl` (
  `ID` int(11) NOT NULL,
  `nation_code_ct` text NOT NULL,
  `title_ct` text NOT NULL,
  `time_ct` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ct_tbl`
--

INSERT INTO `ct_tbl` (`ID`, `nation_code_ct`, `title_ct`, `time_ct`) VALUES
(40, '0022986251', 'اسکن ریه جهت بررسی covid19', '2021-10-03 13:01:32');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `ID` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `fathername` text NOT NULL,
  `code_meli` bigint(20) NOT NULL,
  `phonedoctor` bigint(20) NOT NULL,
  `medical_number` int(5) NOT NULL,
  `email_dr` text NOT NULL,
  `pass_dr` text NOT NULL,
  `confirm_pass_dr` text NOT NULL,
  `genderDr` text NOT NULL,
  `sign` text NOT NULL,
  `zaman_sabt_dr` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`ID`, `fname`, `lname`, `fathername`, `code_meli`, `phonedoctor`, `medical_number`, `email_dr`, `pass_dr`, `confirm_pass_dr`, `genderDr`, `sign`, `zaman_sabt_dr`) VALUES
(11, 'محمدرضا', 'نقیان', 'محمدحسین', 6229741385, 9123258600, 44184, 'dr.naghian@yahoo.com', 'd93591bdf7860e1e4ee2fca799911215', 'd93591bdf7860e1e4ee2fca799911215', 'مرد', 'file_3659.png', '2021-09-21 04:51:43'),
(13, 'نسرین', 'الهی مهر', 'محمدعلی', 224545445, 9013158600, 44223, 'mohammadamin_naghian78@yahoo.com', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'زن', 'file_50507.png', '2021-09-30 09:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `govahi_tbl`
--

CREATE TABLE `govahi_tbl` (
  `ID` int(11) NOT NULL,
  `code_nation` int(11) NOT NULL,
  `detail` text NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `govahi_tbl`
--

INSERT INTO `govahi_tbl` (`ID`, `code_nation`, `detail`, `time`) VALUES
(12, 22986251, 'گواهی می شود ایشان تحت نظارت پزشک می باشد', '2021-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `log_drtbl`
--

CREATE TABLE `log_drtbl` (
  `ID` int(11) NOT NULL,
  `IP` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `drname` text NOT NULL,
  `code_log` varchar(12) NOT NULL,
  `MedicalCode_log` int(5) NOT NULL,
  `phone_log` bigint(20) NOT NULL,
  `detaillog` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_drtbl`
--

INSERT INTO `log_drtbl` (`ID`, `IP`, `time`, `drname`, `code_log`, `MedicalCode_log`, `phone_log`, `detaillog`) VALUES
(6, '::1', '2021-10-07 11:38:14', 'محمدرضا نقیان', '6229741385', 44184, 9123258600, 'کاربر به پنل خود لاگین کرد'),
(7, '::1', '2021-10-10 06:25:17', 'محمدرضا نقیان', '6229741385', 44184, 9123258600, 'کاربر به پنل خود لاگین کرد'),
(8, '::1', '2021-10-21 16:13:56', 'محمدرضا نقیان', '6229741385', 44184, 9123258600, 'کاربر به پنل خود لاگین کرد'),
(9, '::1', '2021-10-23 12:26:57', 'محمدرضا نقیان', '6229741385', 44184, 9123258600, 'کاربر به پنل خود لاگین کرد');

-- --------------------------------------------------------

--
-- Table structure for table `log_patinet_tbk`
--

CREATE TABLE `log_patinet_tbk` (
  `ID` int(11) NOT NULL,
  `IP` varchar(255) NOT NULL,
  `patinet_name` text NOT NULL,
  `code_log_p` int(12) NOT NULL,
  `insurance_log` text NOT NULL,
  `phone_log_p` bigint(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `details_log` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_patinet_tbk`
--

INSERT INTO `log_patinet_tbk` (`ID`, `IP`, `patinet_name`, `code_log_p`, `insurance_log`, `phone_log_p`, `time`, `details_log`) VALUES
(3, '::1', 'محمدامین  نقیان', 22986251, 'تامین اجتماعی', 9380321547, '2021-10-07 20:17:12', 'بیمار وارد سایت شد'),
(6, '::1', 'محمدامین  نقیان', 22986251, 'تامین اجتماعی', 9380321547, '2021-10-21 16:36:39', 'بیمار وارد سایت شد');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf16 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID`, `name`) VALUES
(23, 'درباره ما'),
(24, 'تماس با ما');

-- --------------------------------------------------------

--
-- Table structure for table `patinet`
--

CREATE TABLE `patinet` (
  `ID` int(11) NOT NULL,
  `Pname` text NOT NULL,
  `plname` text NOT NULL,
  `pfathername` text NOT NULL,
  `pPhonenumber` bigint(20) NOT NULL,
  `pCode_nation` bigint(20) NOT NULL,
  `pgender` text NOT NULL,
  `pcondition` text NOT NULL,
  `pinsurancetype` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patinet`
--

INSERT INTO `patinet` (`ID`, `Pname`, `plname`, `pfathername`, `pPhonenumber`, `pCode_nation`, `pgender`, `pcondition`, `pinsurancetype`, `time`) VALUES
(9, 'محمدامین ', 'نقیان', 'محمدرضا', 9380321547, 22986251, 'مرد', 'مجرد', 'تامین اجتماعی', '2021-09-18 17:41:40'),
(10, 'امینه', 'نقیان', 'محمدرضا', 9224924454, 24792799, 'زن', 'مجرد', 'خدمات درمانی', '2021-09-29 09:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `title_post` varchar(255) NOT NULL,
  `explain_post` text NOT NULL,
  `pic_post` varchar(255) NOT NULL,
  `category_post` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID`, `title_post`, `explain_post`, `pic_post`, `category_post`, `time`) VALUES
(7, 'fghjm', '<p>fdghjk,jhgfedwsdfghnmjn</p>\r\n', 'pic_13', 'post_2349.jpg', '2021-10-18 23:11:29'),
(8, 'fghjm', '<p>fdghjk,jhgfedwsdfghnmjn</p>\r\n', 'pic_13', 'post_2854.jpg', '2021-10-18 23:12:41'),
(9, 'fghjm', '<p>fdghjk,jhgfedwsdfghnmjn</p>\r\n', 'pic_13', 'post_3.jpg', '2021-10-18 23:17:55'),
(10, 'ff', '<p>ff</p>\r\n', 'هک', 'post_2526.jpg', '2021-10-18 23:25:00'),
(11, 'ff', '<p>ff</p>\r\n', 'هک', 'post_2434.jpg', '2021-10-18 23:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `ID` int(11) NOT NULL,
  `DrugName` text NOT NULL,
  `Consumption` text NOT NULL,
  `consumption_mm` text NOT NULL,
  `counts` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `nameAndFamily` int(12) NOT NULL,
  `email` text NOT NULL,
  `time_register` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`ID`, `DrugName`, `Consumption`, `consumption_mm`, `counts`, `detail`, `nameAndFamily`, `email`, `time_register`) VALUES
(31, 'fgh', 'har 12 saat', '1adad', '5', '', 22986251, 'dr.naghian@yahoo.com', '2021-10-02 07:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `ID` int(11) NOT NULL,
  `slidername` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`ID`, `slidername`) VALUES
(29, 'slider_204.png'),
(30, 'slider_684.png');

-- --------------------------------------------------------

--
-- Table structure for table `test_tbl`
--

CREATE TABLE `test_tbl` (
  `ID` int(11) NOT NULL,
  `title_test` text NOT NULL,
  `nation_code_test` int(12) NOT NULL,
  `email` text NOT NULL,
  `time_test` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_tbl`
--

INSERT INTO `test_tbl` (`ID`, `title_test`, `nation_code_test`, `email`, `time_test`) VALUES
(14, 'cbc', 22986251, 'dr.naghian@yahoo.com', '2021-10-03 13:04:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ct_tbl`
--
ALTER TABLE `ct_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `govahi_tbl`
--
ALTER TABLE `govahi_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `log_drtbl`
--
ALTER TABLE `log_drtbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `log_patinet_tbk`
--
ALTER TABLE `log_patinet_tbk`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `patinet`
--
ALTER TABLE `patinet`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `test_tbl`
--
ALTER TABLE `test_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ct_tbl`
--
ALTER TABLE `ct_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `govahi_tbl`
--
ALTER TABLE `govahi_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `log_drtbl`
--
ALTER TABLE `log_drtbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `log_patinet_tbk`
--
ALTER TABLE `log_patinet_tbk`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `patinet`
--
ALTER TABLE `patinet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `test_tbl`
--
ALTER TABLE `test_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
