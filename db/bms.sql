-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 12:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_list`
--

CREATE TABLE `admin_list` (
  `admin_id` int(4) NOT NULL,
  `fullname` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `date_created` varchar(19) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`admin_id`, `fullname`, `username`, `password`, `type`, `status`, `date_created`) VALUES
(1, 'Administrator', 'admin', '202cb962ac59075b964b07152d234b70', 1, 1, '2021-10-14 02:43:16'),
(4, 'Regime', '123', '202cb962ac59075b964b07152d234b70', 1, NULL, NULL),
(5, 'Ivan Berse', 'ayban', '32aa4e5fe83896a3942509dd9ba018d9', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_clearance_list`
--

CREATE TABLE `business_clearance_list` (
  `business_clearance_id` tinyint(4) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `business_name` varchar(250) DEFAULT NULL,
  `business_type` varchar(250) DEFAULT NULL,
  `b_address` varchar(250) NOT NULL,
  `contact` int(50) NOT NULL,
  `tin` varchar(50) NOT NULL,
  `or_no` int(50) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_clearance_list`
--

INSERT INTO `business_clearance_list` (`business_clearance_id`, `firstname`, `lastname`, `middlename`, `business_name`, `business_type`, `b_address`, `contact`, `tin`, `or_no`, `date_created`) VALUES
(5, 'John Michael', 'Romanos', 'Tae', 'KushKush', 'Drugs', 'P-1', 2147483647, '', 1659268005, '2022-02-12 19:50:11'),
(6, 'John Michael', 'Romanos', 'Tae', 'KushKush Balungos', 'Store', 'P-1', 808985567, '1234', 1726237611, '2022-02-12 19:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `cedula_list`
--

CREATE TABLE `cedula_list` (
  `cedula_id` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `purok_id` int(11) NOT NULL,
  `citezenship` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `civil_status` varchar(250) NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(250) NOT NULL,
  `height` double NOT NULL,
  `weights` double NOT NULL,
  `income` int(250) NOT NULL,
  `or_no` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clearance_list`
--

CREATE TABLE `clearance_list` (
  `clearance_id` tinyint(4) NOT NULL,
  `firstname` varchar(250) DEFAULT NULL,
  `lastname` varchar(250) DEFAULT NULL,
  `middlename` varchar(250) DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `civil_status` varchar(250) NOT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `purpose` varchar(250) DEFAULT NULL,
  `or_no` bigint(20) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clearance_list`
--

INSERT INTO `clearance_list` (`clearance_id`, `firstname`, `lastname`, `middlename`, `age`, `civil_status`, `contact`, `purpose`, `or_no`, `date_created`) VALUES
(2, 'Gian Jake', 'Gulfan', '', 40, '', 9391306794, 'Shabu Business', 100101, '2022-02-07 15:14:32'),
(8, 'Jhon Ivan', 'Berse', 'S', 23, 'Single', 9391306794, 'Lakaw', 1309097383, '2022-02-13 15:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_list`
--

CREATE TABLE `complaint_list` (
  `complaint_id` tinyint(4) NOT NULL,
  `complainant_name` varchar(250) DEFAULT NULL,
  `appellant` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `status` varchar(7) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_list`
--

INSERT INTO `complaint_list` (`complaint_id`, `complainant_name`, `appellant`, `description`, `status`, `date_created`) VALUES
(1, 'Bruno Batumbakal', 'Juan De la Cruz', 'Sample Complaint Only', 'Settled', '2022-02-07 15:15:09'),
(2, 'Jhon', 'Gian', 'Ngawat Mangga', 'Settled', '2022-02-07 20:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `cutting_trees`
--

CREATE TABLE `cutting_trees` (
  `cutting_id` int(50) NOT NULL,
  `purok_id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `corporation` varchar(250) NOT NULL,
  `no_trees` int(50) NOT NULL,
  `height_trees` double NOT NULL,
  `species` varchar(250) NOT NULL,
  `contact` int(50) NOT NULL,
  `purpose` text NOT NULL,
  `or_no` int(50) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cutting_trees`
--

INSERT INTO `cutting_trees` (`cutting_id`, `purok_id`, `firstname`, `middlename`, `lastname`, `corporation`, `no_trees`, `height_trees`, `species`, `contact`, `purpose`, `or_no`, `date_created`) VALUES
(2, 2, 'Jhon Ivan', 'S', 'Berse', 'Robinson Mall', 100, 10, 'Narra', 2147483647, 'Lakaw', 277405888, '2022-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `household_list`
--

CREATE TABLE `household_list` (
  `household_id` int(250) NOT NULL,
  `house_no` smallint(250) DEFAULT NULL,
  `purok_id` tinyint(4) DEFAULT NULL,
  `firstname` varchar(250) DEFAULT NULL,
  `lastname` varchar(250) DEFAULT NULL,
  `middlename` varchar(250) DEFAULT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `VaccineInfo` varchar(12) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `household_list`
--

INSERT INTO `household_list` (`household_id`, `house_no`, `purok_id`, `firstname`, `lastname`, `middlename`, `contact`, `email`, `occupation`, `VaccineInfo`, `date_created`) VALUES
(1, 2306, 2, 'Ivan', 'Berse', 'D', 912354689, 'berse.jhonivan@gmail.com', 'Programmer', 'Vaccinated', '2022-02-07 15:12:05'),
(2, 1234, 5, 'Gian Jake', 'Gulfan', 'O', 9391306794, 'gian@gmail.com', 'Tambay', 'Vaccinated', '2022-02-07 15:12:05'),
(3, 1111, 4, 'John Michael', 'Romanos', 'S', 8810000992, '', 'Drug Lord', 'Unvaccinated', '2022-02-07 15:12:05'),
(4, 1111, 4, 'Ruis', 'Romanos', 'T', 8810000992, '09351980392', 'House Wife', 'Vaccinated', '2022-02-07 15:12:05'),
(6, 909, 4, 'Marc', 'Dupalco', 'Laroga', 8810000992, '09656009723', 'Sir', 'Vaccinated', '2022-02-07 15:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `indigency_list`
--

CREATE TABLE `indigency_list` (
  `indigency_id` int(12) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `age` int(250) NOT NULL,
  `birthdate` date NOT NULL,
  `purok_id` int(50) NOT NULL,
  `occupation` varchar(250) NOT NULL,
  `or_no` int(250) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indigency_list`
--

INSERT INTO `indigency_list` (`indigency_id`, `firstname`, `lastname`, `middlename`, `age`, `birthdate`, `purok_id`, `occupation`, `or_no`, `date_created`) VALUES
(6, 'Ruis', 'Monter', 'T', 1, '2022-02-04', 2, 'Housewife', 192506969, '2022-02-12'),
(7, 'Regime', 'Mamugay', 'K', 23, '1999-01-05', 1, 'Tambay', 1004831068, '2022-02-12'),
(9, 'Gian Jake', 'Gulfan', 'Inamo', 1, '2022-02-05', 2, 'Tambay', 1807838411, '2022-02-12'),
(14, 'Jhon Ivan', 'Berse', 'S', 22, '2022-02-04', 3, 'Tambay', 331594526, '2022-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(50) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `date_created`) VALUES
(1, 'Pre-Marriage Orientation, Counselling: A Blueprint towards Successful Marriage', 'The City Government of Malaybalay through Population Development Section of the City Health Office, hosted a Pre-Marriage Orientation and Counselling (PMOC) on February 8, 2022 at the People’s Hall, New City Hall, Barangay Casisang, this city.\r\n\r\nResource speakers of this activity were Pastor Michael Mendiola, Blas Alesna, Alexis John Abregana, Marose Bordaje and Population Program Officer Angelica Abugan.\r\n\r\nA total of 24 couples attended the said session. Topics that were highlighted are the principles of marriage, responsible parenthood and family planning, and elements of a successful marriage.\r\n\r\nThe goals of the said activity are to give emphasis on the importance of marriage and to strengthen the use of Family Planning upon entering the married life. Couples were then tasked to make their 10-year plan and 1-month budget plan that they look forward to and will serve as their blueprint.\r\n\r\nReport by: Marlon L. Cacafranca, NADA-PopDev', 'Pre-Marriage-Orientation-Counselling-A-Blueprint-towards-Successful-Marriage.jpg', '2022-02-13'),
(13, 'Blessing ceremony for new heavy equipment and vehicles in the city', 'The City Government of Malaybalay conducted blessing ceremony on February 3, 2022, for the newly acquired heavy equipment and vehicles at the City Engineering’s Office compound.\r\n\r\nCity Mayor Florencio “Doc Boy” T. Flores Jr., led the activity and was officiated by Rev. Father Cirilo Sajelan.\r\n\r\nThe new heavy equipment and vehicles acquired will help augment and hasten in achieving various office programs, projects and targets.\r\n\r\nThis is also aimed to ensure the ease of mobilization of personnel and frontliners to provide better and more responsive service for the people of Malaybalay.\r\n\r\nThe event was also attended by OIC-CEO Engr. Roy Lapuz, Engr. Leo Rustan Dela Cerna, Ivy Amor Urbina, CSWDO and Dioscora Niere, GSO.', 'Blessing-ceremony-for-new-heavy-equipment-and-vehicles-in-the-city-1024x683.jpg', '2022-02-13'),
(14, 'Native chicken distribution for people’s organization of Retooled Community Support Program (RCSP) barangays', 'The Malaybalay City Peace and Order Council through the Department of Interior and Local Government (DILG) aims to achieve inclusive and sustainable peace through executing the delivery of livelihood services to help people in conflict-affected communities.\r\n\r\nOn February 8, 2022, at the Farmers Training Center of the City Agriculture Office (CAgO), the Native Chicken Production Project worth Php 132,000.00 was turned over to four identified people’s organizations.\r\n\r\nThese are the Barangay Indalasa’s MINDAGULOS ATARDAR Farmers Association, Mapayag Corn Growers Association, Imbayao Farmers Association, and Capt. Angel 4H Club. Each association received 60 head Hubbard chickens, multivitamins, and biologics. These will be distributed to fifteen of their members in a 1 male:3 female ratio.\r\n\r\nCLGOO Alaan, in his message, pointed out the importance of Executive Order No. 70 or the “Institutionalizing the Whole-of-Nation Approach” prioritizing far communities affected by local armed conflicts. He added that the LGU’s purpose is to bring the project to the doorsteps of communities.\r\n\r\nOn the other hand, Councilor Marabe expressed his encouragement to beneficiaries to take care and give value to the project. He hopes that more individuals will also receive this kind of livelihood.\r\n\r\nThe opportunities and benefits of this venture are expected to uplift the welfare of the recipients and intend to develop people’s capability to organize themselves and their progress by bringing about value-chain interventions to elevate their current situation.\r\n\r\nThe turnover ceremony was conducted along with the presence of the City Agriculture Office-OIC Engr. Naomie H. Delos Reyes, Councilor Estelito R. Marabe, City Local Government Operation Officer Aldrich C. Alaan, Dr. Aulyn Mae Salem, City Agriculture and Fishery Council Chairperson Leonard O. Leyros, Police Lieutenant Ernie P. Cabrera, and representatives from 88IB, 4ID of the Philippine Army.\r\n\r\nReport by: Gecel Quinquiño-Ocon, NADA-CAO', 'Native-chicken-distribution-for-peoples-organization-of-Retooled-Community-Support-Program-RCSP-barangays.jpg', '2022-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `official_list`
--

CREATE TABLE `official_list` (
  `official_id` tinyint(4) NOT NULL,
  `position_id` tinyint(4) DEFAULT NULL,
  `firstname` varchar(250) DEFAULT NULL,
  `lastname` varchar(250) DEFAULT NULL,
  `middlename` varchar(250) DEFAULT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `date_created` varchar(19) NOT NULL DEFAULT current_timestamp(),
  `official_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `official_list`
--

INSERT INTO `official_list` (`official_id`, `position_id`, `firstname`, `lastname`, `middlename`, `contact`, `date_created`, `official_image`) VALUES
(1, 1, 'Regime', 'Mamugay', 'C', 9123456789, '2021-10-14 05:11:59', ''),
(2, 2, 'Rodrigo', 'Duterte', 'D', 978954553, '2021-10-14 05:16:20', ''),
(3, 6, 'Bato', 'Dela Rosa', 'Tae', 808985567, '2022-02-05 16:19:44', ''),
(13, 2, 'Ruis', 'Montero', '', 8810000992, '2022-02-13 04:43:44', ''),
(14, 3, 'Ferdinand', 'Marcos', '', 9351801179, '2022-02-13 05:12:25', ''),
(15, 4, 'Sarah', 'Duterte', 'G', 9391306794, '2022-02-13 05:12:41', ''),
(16, 4, 'Ruis', 'Montero', '', 9391306794, '2022-02-13 15:21:48', '');

-- --------------------------------------------------------

--
-- Table structure for table `position_list`
--

CREATE TABLE `position_list` (
  `position_id` tinyint(4) NOT NULL,
  `position` varchar(11) DEFAULT NULL,
  `is_approver` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position_list`
--

INSERT INTO `position_list` (`position_id`, `position`, `is_approver`) VALUES
(1, 'Chairman', 1),
(2, 'Kagawad', 0),
(3, 'SK Chairman', 0),
(4, 'SK Kagawad', 0),
(6, 'BPSO', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purok_list`
--

CREATE TABLE `purok_list` (
  `purok_id` tinyint(4) NOT NULL,
  `purok` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purok_list`
--

INSERT INTO `purok_list` (`purok_id`, `purok`) VALUES
(1, 'Purok 1'),
(2, 'Purok 2'),
(3, 'Purok 3'),
(4, 'Purok 4'),
(5, 'Purok 5'),
(6, 'Purok 6');

-- --------------------------------------------------------

--
-- Table structure for table `residency_list`
--

CREATE TABLE `residency_list` (
  `residency_id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `age` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(250) NOT NULL,
  `height` double NOT NULL,
  `weights` double NOT NULL,
  `purok_id` int(4) NOT NULL,
  `occupation` varchar(250) NOT NULL,
  `or_no` int(250) NOT NULL,
  `date_created` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `residency_list`
--

INSERT INTO `residency_list` (`residency_id`, `firstname`, `lastname`, `middlename`, `age`, `birthdate`, `birthplace`, `height`, `weights`, `purok_id`, `occupation`, `or_no`, `date_created`) VALUES
(5, 'Jhon Ivan', 'Berse', 'S', 23, '2022-02-17', 'Malaybalay', 175, 45, 1, 'Programmer', 942494163, '2022-02-12 19:04:47.790402'),
(8, 'Jhon Ivan', 'Berse', 'S', 0, '2022-02-23', 'Malaybalay', 175.5, 0, 2, '', 2143746435, '2022-02-13 14:30:46.020793');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `meta_field` varchar(13) DEFAULT NULL,
  `meta_value` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`meta_field`, `meta_value`) VALUES
('barangay_name', 'Brgy. Violeta'),
('city', 'Malaybalay City'),
('province', 'Bukidnon'),
('zip_code', '8700');

-- --------------------------------------------------------

--
-- Table structure for table `vaccineinfo`
--

CREATE TABLE `vaccineinfo` (
  `vaccineId` tinyint(4) NOT NULL,
  `vaccineInfo` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccineinfo`
--

INSERT INTO `vaccineinfo` (`vaccineId`, `vaccineInfo`) VALUES
(1, 'Vaccinated'),
(2, 'Unvaccinated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_list`
--
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `business_clearance_list`
--
ALTER TABLE `business_clearance_list`
  ADD PRIMARY KEY (`business_clearance_id`);

--
-- Indexes for table `cedula_list`
--
ALTER TABLE `cedula_list`
  ADD PRIMARY KEY (`cedula_id`);

--
-- Indexes for table `clearance_list`
--
ALTER TABLE `clearance_list`
  ADD PRIMARY KEY (`clearance_id`);

--
-- Indexes for table `complaint_list`
--
ALTER TABLE `complaint_list`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `cutting_trees`
--
ALTER TABLE `cutting_trees`
  ADD PRIMARY KEY (`cutting_id`);

--
-- Indexes for table `household_list`
--
ALTER TABLE `household_list`
  ADD PRIMARY KEY (`household_id`);

--
-- Indexes for table `indigency_list`
--
ALTER TABLE `indigency_list`
  ADD PRIMARY KEY (`indigency_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `official_list`
--
ALTER TABLE `official_list`
  ADD PRIMARY KEY (`official_id`);

--
-- Indexes for table `position_list`
--
ALTER TABLE `position_list`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `purok_list`
--
ALTER TABLE `purok_list`
  ADD PRIMARY KEY (`purok_id`);

--
-- Indexes for table `residency_list`
--
ALTER TABLE `residency_list`
  ADD PRIMARY KEY (`residency_id`);

--
-- Indexes for table `vaccineinfo`
--
ALTER TABLE `vaccineinfo`
  ADD PRIMARY KEY (`vaccineId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_list`
--
ALTER TABLE `admin_list`
  MODIFY `admin_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `business_clearance_list`
--
ALTER TABLE `business_clearance_list`
  MODIFY `business_clearance_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cedula_list`
--
ALTER TABLE `cedula_list`
  MODIFY `cedula_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clearance_list`
--
ALTER TABLE `clearance_list`
  MODIFY `clearance_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `complaint_list`
--
ALTER TABLE `complaint_list`
  MODIFY `complaint_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cutting_trees`
--
ALTER TABLE `cutting_trees`
  MODIFY `cutting_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `household_list`
--
ALTER TABLE `household_list`
  MODIFY `household_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `indigency_list`
--
ALTER TABLE `indigency_list`
  MODIFY `indigency_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `official_list`
--
ALTER TABLE `official_list`
  MODIFY `official_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `position_list`
--
ALTER TABLE `position_list`
  MODIFY `position_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purok_list`
--
ALTER TABLE `purok_list`
  MODIFY `purok_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `residency_list`
--
ALTER TABLE `residency_list`
  MODIFY `residency_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vaccineinfo`
--
ALTER TABLE `vaccineinfo`
  MODIFY `vaccineId` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
