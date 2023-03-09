-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 08:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kwpadmission`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresss`
--

CREATE TABLE `addresss` (
  `address_id` int(4) NOT NULL,
  `house_no` varchar(10) NOT NULL,
  `village` varchar(45) NOT NULL,
  `village_no` varchar(10) NOT NULL,
  `sub_area` varchar(45) NOT NULL,
  `area` varchar(45) NOT NULL,
  `province` varchar(45) NOT NULL,
  `post` varchar(5) NOT NULL,
  `id_card` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addresss`
--

INSERT INTO `addresss` (`address_id`, `house_no`, `village`, `village_no`, `sub_area`, `area`, `province`, `post`, `id_card`) VALUES
(89, '777/2', '-', '15', 'พันดอน', 'กุมภวาปี', 'อุดรธานี', '41370', '1419901858555'),
(90, '26', '-', '6', 'หอไกร', 'บางมูลนาก', 'พิจิตร', '66120', '1669900414422'),
(91, '98', 'สร้างแป้น', '2', 'เชียงเพ็ง', 'กุดจับ', 'อุดรธานี', '41250', '1410201154239'),
(92, '49', 'นากลาง', '5', 'นากลาง', 'สูงเนิน', 'นครราชศรีมา', '30380', '1309902762838'),
(93, '71/1', 'พิมานคอนโด', '10', 'ศิลา', 'ในเมือง', 'ขอนแก่น', '40000', '1139900309741'),
(94, '78/9', 'คลองเมือง', '1', 'อยู่ยง', 'ในเมือง', 'ยะลา', '41435', '1313745420375'),
(95, '8', '-', '8', 'เชียงพัง', 'หน่องใส', 'จันทบุรี', '11111', '1139900309373'),
(96, '555', 'หนองปรือ', '5', 'หนองใส', 'หนองนาคำ', 'อุดรธานี', '55555', '1139900302371'),
(97, '124/3', '-', '-', '-', 'หล่มสัก', 'เพรชบูล', '67110', '1103702693956'),
(98, '315', 'ดอนไพล', '8', 'ท่าเยี่ยม', 'โชคชัย', 'นครราชศรีมา', '30190', '1309902698258'),
(99, '71/1', '-', '10', 'หนองปรือ', 'บางละมุง', 'ชลบุรี', '20150', '1234567891231'),
(100, '06', 'ฟิวเจอร์', '1', 'หนองปรือ', 'บางละมุง', 'ขอนแก่น', '20150', '1139900309372');

-- --------------------------------------------------------

--
-- Table structure for table `application_form`
--

CREATE TABLE `application_form` (
  `form_id` int(10) NOT NULL,
  `date_form` varchar(50) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `id_card` varchar(13) NOT NULL,
  `type_student` varchar(100) NOT NULL,
  `plans` varchar(500) NOT NULL,
  `rooms` varchar(4) NOT NULL,
  `oldprovince` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `application_form`
--

INSERT INTO `application_form` (`form_id`, `date_form`, `student_id`, `id_card`, `type_student`, `plans`, `rooms`, `oldprovince`) VALUES
(87, '17 มี.ค. 2563 เวลา 01:31', '26745', '1419901858555', 'ประเภทนักเรียนมัธยมศึกษาปีที่ 3 (นักเรียนเดิม)', '3001,3002,3004', '1', 'none'),
(88, '17 มี.ค. 2563 เวลา 01:36', 'none', '1669900414422', 'ประเภทนักเรียนทั่วไป', '3001,3002,3003', 'none', 'พิจิตร'),
(89, '17 มี.ค. 2563 เวลา 01:41', 'none', '1410201154239', 'ชั้นมัธยมศึกษาปีที่ 1 ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป', '3016', 'none', 'อุดรธานี'),
(90, '17 มี.ค. 2563 เวลา 01:47', 'none', '1309902762838', 'ชั้นมัธยมศึกษาปีที่ 1 ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป', '3016', 'none', 'นครราชศรีมา'),
(91, '17 มี.ค. 2563 เวลา 01:50', '25499', '1139900309741', 'ประเภทนักเรียนมัธยมศึกษาปีที่ 3 (นักเรียนเดิม)', '3002,3003,3003', '2', 'none'),
(92, '17 มี.ค. 2563 เวลา 01:55', 'none', '1313745420375', 'ชั้นมัธยมศึกษาปีที่ 1 ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป', '3012', 'none', 'ยะลา'),
(93, '17 มี.ค. 2563 เวลา 01:59', '08626', '1139900309373', 'ประเภทนักเรียนมัธยมศึกษาปีที่ 3 (นักเรียนเดิม)', '3005,3006,3007', '1', 'none'),
(94, '17 มี.ค. 2563 เวลา 02:02', 'none', '1139900302371', 'ชั้นมัธยมศึกษาปีที่ 1 ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป', '3012', 'none', 'อุดรธานี'),
(95, '17 มี.ค. 2563 เวลา 02:06', '51250', '1103702693956', 'ประเภทนักเรียนมัธยมศึกษาปีที่ 3 (นักเรียนเดิม)', '3001,3002,3003', '10', 'none'),
(96, '17 มี.ค. 2563 เวลา 02:13', 'none', '1309902698258', 'ชั้นมัธยมศึกษาปีที่ 1 ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป', '3010', 'none', 'นครราชศรีมา'),
(97, '19 มี.ค. 2563 เวลา 19:41', 'none', '1234567891231', 'ชั้นมัธยมศึกษาปีที่ 1 ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป', '3013', 'none', 'ชลบุรี'),
(98, '19 มี.ค. 2563 เวลา 20:08', 'none', '1139900309372', 'ชั้นมัธยมศึกษาปีที่ 1 ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป', '3009', 'none', 'กทม');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id_calendar` int(3) NOT NULL,
  `parth` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id_calendar`, `parth`) VALUES
(1, 'file5e666f1e6b9a2.pdf'),
(2, 'file5e666f1e6b9a2.pdf'),
(3, 'file5e666f1e6b9a2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `check_name`
--

CREATE TABLE `check_name` (
  `check_id` int(3) NOT NULL,
  `id_card` varchar(13) NOT NULL,
  `date_time` varchar(100) NOT NULL,
  `datee` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `check_name`
--

INSERT INTO `check_name` (`check_id`, `id_card`, `date_time`, `datee`) VALUES
(100, '1139900309373', '17 มี.ค. 2563 เวลา 02:58', '17 มี.ค. 2563'),
(101, '1669900414422', '17 มี.ค. 2563 เวลา 02:58', '17 มี.ค. 2563'),
(102, '1410201154239', '17 มี.ค. 2563 เวลา 02:58', '17 มี.ค. 2563'),
(103, '1139900302371', '17 มี.ค. 2563 เวลา 02:58', '17 มี.ค. 2563'),
(108, '1309902762838', '19 มี.ค. 2563 เวลา 19:34', '19 มี.ค. 2563'),
(109, '1313745420375', '19 มี.ค. 2563 เวลา 19:43', '19 มี.ค. 2563');

-- --------------------------------------------------------

--
-- Table structure for table `examination_card`
--

CREATE TABLE `examination_card` (
  `card_id` int(6) NOT NULL,
  `barcode_id` varchar(13) NOT NULL,
  `status_card` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `examination_card`
--

INSERT INTO `examination_card` (`card_id`, `barcode_id`, `status_card`) VALUES
(64, '1419901858555', '01'),
(65, '1669900414422', '01'),
(66, '1410201154239', '01'),
(67, '1309902762838', '01'),
(68, '1139900309741', '01'),
(69, '1313745420375', '01'),
(70, '1139900309373', '01'),
(71, '1139900302371', '01'),
(72, '1103702693956', '01'),
(73, '1309902698258', '01'),
(74, '1234567891231', '01'),
(75, '1139900309372', '00');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_plans`
--

CREATE TABLE `lesson_plans` (
  `plans_id` int(4) NOT NULL,
  `plans_name` varchar(500) NOT NULL,
  `for_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lesson_plans`
--

INSERT INTO `lesson_plans` (`plans_id`, `plans_name`, `for_level`) VALUES
(3001, 'วิทย์-คณิต SME ', 'M4'),
(3002, 'วิทย์-คณิต ', 'M4'),
(3003, 'คณิต –ภาษาอังกฤษ ', 'M4'),
(3004, 'วิทย์-คณิต-เทคโนโลยี SMT ', 'M4'),
(3005, 'ทหาร-ตำรวจ (SPP) ', 'M4'),
(3006, 'คณิต –ภาษาจีน ', 'M4'),
(3007, 'เทคโนโลยี', 'M4'),
(3009, 'วิทย์-คณิต SME', 'M1'),
(3010, 'วิทย์-คณิต ', 'M1'),
(3011, 'เทคโนโลยี  ', 'M1'),
(3012, 'ภาษาอังกฤษ ', 'M1'),
(3013, 'เทคโนโลยี ', 'M1'),
(3014, 'ศิลปะ ', 'M1'),
(3015, 'ภาษาไทย ', 'M1'),
(3016, 'พลศึกษา ', 'M1');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(10) NOT NULL,
  `topic` varchar(500) NOT NULL,
  `content` varchar(500) NOT NULL,
  `pic` varchar(45) NOT NULL,
  `dates` varchar(100) NOT NULL,
  `files` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `edit_by` varchar(100) NOT NULL,
  `type_new` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `topic`, `content`, `pic`, `dates`, `files`, `link`, `edit_by`, `type_new`) VALUES
(63, 'คำแนะนำสำหรับนักเรียน นักศึกษาที่เดินทางกลับจากต่างประเทศ', 'อาการเบื้องต้นที่สังเกตได้จากการติดเชื้อไวรัสโคโรน่า หรือ \"COVID-19\" มีดังนี้ โควิช19<br>\r\n1.มีไข้สูง > 37.5 องศา<br>\r\n2.ไอ<br>\r\n3.เจ็บคอ<br>\r\n4.น้ำมูกไหล<br>\r\n5.หายใจเหนื่อยหอบ หายใจลำบาก<br>\r\n<b>หากมีอาการดังกล่าว รีบไปพบแพทย์ทันที!!! โควิด1</b>\r\n', 'img5e5a73ce8fbc6.jpg', '19 มี.ค. 2563 เวลา 11:46', 'file5e5a73ce8fd67.pdf', 'เอกสารเพิ่มเติม', 'admin', 1001),
(71, '(ด่วนที่สุด) ประกาศเปลี่ยนแปลงสถานที่สอบ', 'เนื่องจากสถานะการณ์ COVID-2019 คณะผู้บริหารได้เข้าร่วมหารือประชุมมีมติว่า จากเดิม สอบคัดเลือกวันที่ 5 เมษายน 2563 สถานที่: โรงเรียนกุมภวาปี <b>เปลี่ยนเป็น Kumphawapi Hall ศูนย์การค้า SIWALAND (กุมภวาปี) ถนนชวลิต ต.กุมภวาปี อ.กุมภวาปี จังหวัดอุดรธานี</b>', 'img5e72459f87311.jpg', '18 มี.ค. 2563 เวลา 23:00', 'covid.pdf', 'หนังสือเปลี่ยนแปลงสถานที่สอบคัดเลือกนักเรียน 63', 'admin', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parentd_id` int(4) NOT NULL,
  `father` varchar(200) NOT NULL,
  `mother` varchar(200) NOT NULL,
  `statuss` varchar(500) NOT NULL,
  `id_card` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`parentd_id`, `father`, `mother`, `statuss`, `id_card`) VALUES
(103, 'จอร์ช', 'เบลล่า', 'อยู่ด้วยกัน', '1419901858555'),
(104, 'นายดิเรก แย้มพุฒ', 'นางสาวมณีรัตน์ แย้มพุฒ', 'อยู่ด้วยกัน', '1669900414422'),
(105, 'สมชาย ไชยา', 'สมหญิง ไชยา', 'หย่าร้าง', '1410201154239'),
(106, 'นายต๊อกแต๊ก เมนะรัตน์', 'นางบุญเหลือ เมนะรัตน์', 'หย่าร้าง,แยกกันอยู่', '1309902762838'),
(107, 'นายภูไทย ยี่สุ่นซ้อน', 'นางสาวจำเรียง บุญไพล', 'หย่าร้าง', '1139900309741'),
(108, 'นายประพันธ์ คงอยู่ทน', 'นางนิยม คงอยู่ทน', 'บิดาถึงแก่กรรม,มารดาถึงแก่กรรม', '1313745420375'),
(109, 'นายสุเทพ เอียงตรง', 'นางสุรี เอียงตรง', 'อยู่ด้วยกัน', '1139900309373'),
(110, 'นายอำนวย อุไรพร', 'นางอัมพิกา อุไรพร', 'อยู่ด้วยกัน', '1139900302371'),
(111, 'นายจิรายุ บิณฑสูตร', 'นางวราพร บิณฑสูตร', 'อยู่ด้วยกัน', '1103702693956'),
(112, 'นายสมชาติ เมืองกระโทก', 'นางจรรยา เมืองกระโทก', 'อยู่ด้วยกัน', '1309902698258'),
(113, 'นายดิเรก แย้มพุฒ', 'นางสาวมณีรัตน์ แย้มพุฒ', 'อยู่ด้วยกัน', '1234567891231'),
(114, '456', 'kkk', 'อยู่ด้วยกัน', '1139900309372');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id_result` int(2) NOT NULL,
  `result_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id_result`, `result_name`) VALUES
(1, 'file5e6679c537973.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `sit`
--

CREATE TABLE `sit` (
  `id_sit` int(2) NOT NULL,
  `sit_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sit`
--

INSERT INTO `sit` (`id_sit`, `sit_name`) VALUES
(1, 'file5e66783bb05d6.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `status_admission`
--

CREATE TABLE `status_admission` (
  `id` int(2) NOT NULL,
  `status_ad` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_admission`
--

INSERT INTO `status_admission` (`id`, `status_ad`) VALUES
(1, '01');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id_card` varchar(13) NOT NULL,
  `name_title` varchar(20) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `education_level` varchar(50) NOT NULL,
  `school` varchar(200) NOT NULL,
  `GPAX` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id_card`, `name_title`, `fname`, `lname`, `birthday`, `tel`, `education_level`, `school`, `GPAX`) VALUES
('1103702693956', 'นางสาว', 'อธิติยากร', 'บิณฑสูตร', '28/10/2541', '0828850283', 'M4', 'none', '3.00'),
('1139900302371', 'เด็กหญิง', 'นกน้อย', 'อุไรพร', '13/08/2546', '0981702755', 'M1', 'หนองใส', '0'),
('1139900309372', 'เด็กชาย', 'ก', 'ด', '09/03/2563', '0854390131', 'M1', 'บางละมุง', '0'),
('1139900309373', 'นาย', 'เฉลียง', 'เอียงตรง', '17/11/2541', '0865505835', 'M4', 'none', '1.54'),
('1139900309741', 'นาย', 'ภานุวัฒน์', 'ยี่สุ่นซ้อน', '23/09/2542', '0866252950', 'M4', 'none', '2.35'),
('1234567891231', 'เด็กหญิง', 'สมหญิง', 'รักชาติ', '22/09/2542', '0854390134', 'M1', 'บางละมุง', '0'),
('1309902698258', 'เด็กหญิง', 'พัฒน์นรี', 'เมืองกระโทก', '18/08/2542', '0956154906', 'M1', 'โชคชัยสามัคคี', '0'),
('1309902762838', 'เด็กหญิง', 'ปัณฑิตา', 'เมนะรัตน์', '11/04/2543', '0801630597', 'M1', 'สุรนารี', '0'),
('1313745420375', 'เด็กชาย', 'ประยุทธ์', 'คงอยู่ทน', '13/03/2563', '0833364393', 'M1', 'ยะลาพิทยาคม', '0'),
('1410201154239', 'เด็กหญิง', 'ศิรประภา', 'ไชยา', '22/05/2542', '0965605390', 'M1', 'บ้านหมากแข้ง', '0'),
('1419901858555', 'นางสาว', 'นิลาวัณย์', 'จันทนะ', '13/07/2542', '0934652383', 'M4', 'none', '3.21'),
('1669900414422', 'นางสาว', 'สุภาวดี ', 'แย้มพุฒ', '27/05/2543', '0956126465', 'M4', 'บางมูลนากภูมิวิทยาคม', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student2`
--

CREATE TABLE `student2` (
  `id_card` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `education_level` varchar(45) NOT NULL,
  `school` varchar(200) NOT NULL,
  `GPAX` varchar(4) NOT NULL,
  `type_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id_card` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id_card`) VALUES
('1139900309372'),
('1139900309377'),
(''),
(''),
(''),
('');

-- --------------------------------------------------------

--
-- Table structure for table `type_news`
--

CREATE TABLE `type_news` (
  `type_news_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_news`
--

INSERT INTO `type_news` (`type_news_id`, `type_name`) VALUES
(1001, 'ข่าวประชาสัมพันธ์'),
(1002, 'ข่าวกิจกรรม'),
(1003, 'ข่าวสารเพิ่มเติม');

-- --------------------------------------------------------

--
-- Table structure for table `type_student`
--

CREATE TABLE `type_student` (
  `type_id` int(11) NOT NULL,
  `name_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_student`
--

INSERT INTO `type_student` (`type_id`, `name_type`) VALUES
(2001, 'ประเภทนักเรียนมัธยมศึกษาปีที่ 3 (นักเรียนเดิม)'),
(2002, 'ประเภทนักเรียนทั่วไป'),
(2003, 'ชั้นมัธยมศึกษาปีที่ 1 ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passwordd` varchar(50) NOT NULL,
  `types` varchar(2) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `passwordd`, `types`, `fname`, `lname`) VALUES
(1, 'admin', '1234', '01', 'ภานุวัฒน์', 'ยี่สุ่นซ้อน'),
(16, 'boss', '1234', '02', 'boss', 'polawat'),
(25, 'kwadmission', 'kwadmission2563', '01', 'ภานุวัฒน์', 'ยี่สุ่นซ้อน');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresss`
--
ALTER TABLE `addresss`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `application_form`
--
ALTER TABLE `application_form`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id_calendar`);

--
-- Indexes for table `check_name`
--
ALTER TABLE `check_name`
  ADD PRIMARY KEY (`check_id`);

--
-- Indexes for table `examination_card`
--
ALTER TABLE `examination_card`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `lesson_plans`
--
ALTER TABLE `lesson_plans`
  ADD PRIMARY KEY (`plans_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`) USING BTREE,
  ADD KEY `type_new` (`type_new`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parentd_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id_result`);

--
-- Indexes for table `sit`
--
ALTER TABLE `sit`
  ADD PRIMARY KEY (`id_sit`);

--
-- Indexes for table `status_admission`
--
ALTER TABLE `status_admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_card`);

--
-- Indexes for table `type_news`
--
ALTER TABLE `type_news`
  ADD PRIMARY KEY (`type_news_id`);

--
-- Indexes for table `type_student`
--
ALTER TABLE `type_student`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresss`
--
ALTER TABLE `addresss`
  MODIFY `address_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `application_form`
--
ALTER TABLE `application_form`
  MODIFY `form_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id_calendar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `check_name`
--
ALTER TABLE `check_name`
  MODIFY `check_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `examination_card`
--
ALTER TABLE `examination_card`
  MODIFY `card_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `lesson_plans`
--
ALTER TABLE `lesson_plans`
  MODIFY `plans_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3030;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `parentd_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id_result` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sit`
--
ALTER TABLE `sit`
  MODIFY `id_sit` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `type_news`
--
ALTER TABLE `type_news`
  MODIFY `type_news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `type_student`
--
ALTER TABLE `type_student`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2004;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`type_new`) REFERENCES `type_news` (`type_news_id`);

--
-- Constraints for table `student2`
--
ALTER TABLE `student2`
  ADD CONSTRAINT `student2_ibfk_1` FOREIGN KEY (`type_student`) REFERENCES `type_student` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
