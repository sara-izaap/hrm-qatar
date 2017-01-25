-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2017 at 03:01 PM
-- Server version: 10.0.23-MariaDB-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `emp_code` varchar(30) NOT NULL,
  `emp_name` varchar(250) NOT NULL,
  `date_arrival` date NOT NULL,
  `date_exit_leave` date NOT NULL,
  `date_exit_final` date NOT NULL,
  `date_exit_absc` date NOT NULL,
  `current_status` enum('Joined','resigned','vacation','unpaid leave','Absconding') NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  `agency` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `visa_designation` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `joining_date` date NOT NULL,
  `no_of_months_completed` int(11) NOT NULL,
  `nationality` varchar(150) NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `org_id`, `emp_code`, `emp_name`, `date_arrival`, `date_exit_leave`, `date_exit_final`, `date_exit_absc`, `current_status`, `phone1`, `phone2`, `agency`, `designation`, `visa_designation`, `dob`, `age`, `joining_date`, `no_of_months_completed`, `nationality`, `created_id`, `updated_id`, `created_date`, `updated_date`) VALUES
(1, 2, 'IZ10002', 'John Doe', '2012-01-25', '2020-01-23', '2020-01-30', '2020-01-09', 'resigned', '9086493434', '3665434', 'ABC', 'Executive', 'dsfgdfhg', '1981-01-21', 37, '2015-01-08', 30, 'US', 1, 1, '2017-01-04 18:15:13', '2017-01-04 13:09:22'),
(2, 1, 'IZ10003', 'Blake jon', '2017-01-04', '2017-01-04', '2017-01-04', '2017-01-04', 'vacation', '9086493434', '3665434', 'XYZ', 'Developer', 'dsfgdfhg', '2017-01-04', 37, '2017-01-04', 25, 'US', 1, 0, '2017-01-04 18:42:34', '2017-01-04 13:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE IF NOT EXISTS `employee_details` (
`id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `pp_number` varchar(50) NOT NULL,
  `pp_validity` varchar(150) NOT NULL,
  `vp_number` varchar(50) NOT NULL,
  `rp_number` varchar(50) NOT NULL,
  `rp_validity` varchar(100) NOT NULL,
  `ot_rate` double NOT NULL,
  `sot_rate` double NOT NULL,
  `food_allowance` double NOT NULL,
  `food_allowance_deduction` double NOT NULL,
  `accomodation_allowance` double NOT NULL,
  `transport_allowance` double NOT NULL,
  `telephone_allowance` double NOT NULL,
  `special_allowance` double NOT NULL,
  `salary_advance` double NOT NULL,
  `advancce_deduction` double NOT NULL,
  `emp_qid` varchar(100) NOT NULL,
  `emp_visa_id` varchar(100) NOT NULL,
  `emp_bank_short_name` varchar(50) NOT NULL,
  `emp_account` varchar(150) NOT NULL,
  `salary_frequency` varchar(200) NOT NULL,
  `no_working_days` int(11) NOT NULL,
  `net_salary` double NOT NULL,
  `basic_salary` double NOT NULL,
  `extra_hours` int(11) NOT NULL,
  `extra_income` double NOT NULL,
  `deductions` double NOT NULL,
  `payment_type` enum('Account','Cash') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `emp_id`, `pp_number`, `pp_validity`, `vp_number`, `rp_number`, `rp_validity`, `ot_rate`, `sot_rate`, `food_allowance`, `food_allowance_deduction`, `accomodation_allowance`, `transport_allowance`, `telephone_allowance`, `special_allowance`, `salary_advance`, `advancce_deduction`, `emp_qid`, `emp_visa_id`, `emp_bank_short_name`, `emp_account`, `salary_frequency`, `no_working_days`, `net_salary`, `basic_salary`, `extra_hours`, `extra_income`, `deductions`, `payment_type`) VALUES
(1, 1, '675FDGDS', '676DFDG', '346346DF', 'DFG4554', '45SDGF', 45, 67, 2.5, 4, 4, 4, 4, 4, 50, 40, '67DFGFGH', '57665XDGFS', 'john', '43490568664', '4', 15, 10000, 5000, 10, 10000, 560, 'Account'),
(2, 2, '675FDGDS', '676DFDG', '346346DF', 'DFG4554', '45SDGF', 45, 67, 2.5, 4, 4, 4, 0, 0, 0, 40, '', '57665XDGFS', '', '43490568664', '', 0, 15000, 7000, 0, 0, 456, 'Account');

-- --------------------------------------------------------

--
-- Table structure for table `employee_note`
--

CREATE TABLE IF NOT EXISTS `employee_note` (
`id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `comments` text NOT NULL,
  `future_data1` text NOT NULL,
  `future_data2` text NOT NULL,
  `future_data3` text NOT NULL,
  `future_data4` text NOT NULL,
  `future_data5` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_note`
--

INSERT INTO `employee_note` (`id`, `emp_id`, `comments`, `future_data1`, `future_data2`, `future_data3`, `future_data4`, `future_data5`) VALUES
(1, 1, 'test comment', 'future data', 'future data', 'future data', 'future data', 'future data'),
(2, 2, 'test', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
`id` int(11) NOT NULL,
  `org_type` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `short_name` varchar(20) NOT NULL,
  `registration_no` varchar(50) NOT NULL,
  `web_url` varchar(250) NOT NULL,
  `employee_count` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `note` text NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `org_type`, `name`, `short_name`, `registration_no`, `web_url`, `employee_count`, `email`, `phone`, `fax`, `address`, `note`, `created_id`, `updated_id`, `created_date`, `updated_date`) VALUES
(1, 1, 'XYZ Limited', 'XYZ', 'DFG454367', 'http://myworld.com', 25, 'saravanamot90@gmail.com', '9865656778', '586345323', 'No.1,salem,10001,US', 'Note note', 1, 1, '2017-01-02 22:20:08', '2017-01-03 09:03:00'),
(2, 2, 'Xion Company', 'Xion', '676FG45', 'http://myworld.com', 10, 'saravanan@izaaptech.in', '9865656778', '45674577', '!st street,xion tech,10002,US', 'additional info', 1, 0, '2017-01-03 15:33:52', '2017-01-03 10:03:52'),
(3, 2, 'Izaap pvt ltd', 'Izaap', '76546DFGHR', 'http://example.com', 34, 'test@gmail.com', '98656567654', '45674577', '2nd street', 'Note', 1, 0, '2017-01-03 22:22:59', '2017-01-03 16:52:59'),
(4, 3, 'ABC Pvt ltd', 'ABC', '677DFDG', 'http://test.com', 25, 'test@gmail.com', '9865656774', '45674577', '1st street,US', 'notes', 1, 0, '2017-01-04 00:20:15', '2017-01-03 18:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `org_type`
--

CREATE TABLE IF NOT EXISTS `org_type` (
`id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `org_type`
--

INSERT INTO `org_type` (`id`, `name`) VALUES
(1, 'Internal'),
(2, 'Contract'),
(3, 'Subcontract');

-- --------------------------------------------------------

--
-- Table structure for table `page_titles`
--

CREATE TABLE IF NOT EXISTS `page_titles` (
`id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `controller` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `status`, `created_date`) VALUES
(1, 'Test new project', 'test', '1', '2017-01-10 00:00:00'),
(2, 'ABC construction project', 'construction', '1', '2017-01-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'HR'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `role_access`
--

CREATE TABLE IF NOT EXISTS `role_access` (
`id` int(11) NOT NULL,
  `page_title_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `access-level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `timesheet`
--

CREATE TABLE IF NOT EXISTS `timesheet` (
`id` int(11) NOT NULL,
  `emp_code` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `hour` double NOT NULL,
  `project` int(11) NOT NULL,
  `purpose` varchar(250) NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timesheet`
--

INSERT INTO `timesheet` (`id`, `emp_code`, `date`, `hour`, `project`, `purpose`, `created_id`, `updated_id`, `created_date`, `updated_date`) VALUES
(1, 'IZ10002', '2017-01-05', 8, 2, '', 1, 1, '2017-01-11 18:22:58', '2017-01-11 12:52:58'),
(2, 'IZ10002', '2017-01-06', 8, 2, '', 1, 1, '2017-01-11 18:22:58', '2017-01-11 12:52:58'),
(3, 'IZ10002', '2017-01-09', 8, 2, '', 1, 1, '2017-01-11 18:22:58', '2017-01-11 12:52:58'),
(4, 'IZ10002', '2017-01-10', 8, 2, '', 1, 1, '2017-01-11 18:22:58', '2017-01-11 12:52:58'),
(6, 'IZ10003', '2017-01-05', 8, 2, '', 1, 1, '2017-01-11 18:22:58', '2017-01-11 12:52:58'),
(7, 'IZ10003', '2017-01-06', 8, 2, '', 1, 1, '2017-01-11 18:22:58', '2017-01-11 12:52:58'),
(8, 'IZ10003', '2017-01-09', 8, 2, '', 1, 1, '2017-01-11 18:22:58', '2017-01-11 12:52:58'),
(9, 'IZ10003', '2017-01-10', 8, 2, '', 1, 1, '2017-01-11 18:22:58', '2017-01-11 12:52:58'),
(16, 'IZ10002', '2017-01-12', 7.5, 0, 'test entry', 1, 1, '2017-01-12 19:44:13', '2017-01-12 14:14:13'),
(17, 'IZ10003', '2017-01-12', 8.5, 0, 'test entry', 1, 1, '2017-01-12 19:44:13', '2017-01-12 14:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `status`, `created_date`, `updated_date`) VALUES
(1, 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 1, '1', '2016-12-27 00:00:00', '2016-12-27 16:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `working_days`
--

CREATE TABLE IF NOT EXISTS `working_days` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `working_days`
--

INSERT INTO `working_days` (`id`, `name`, `status`) VALUES
(1, 'Monday', '1'),
(2, 'Tuesday', '1'),
(3, 'Wednesday', '1'),
(4, 'Thursday', '1'),
(5, 'Friday', '1'),
(6, 'Saturday', '0'),
(7, 'Sunday', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `pp_number` (`id`);

--
-- Indexes for table `employee_note`
--
ALTER TABLE `employee_note`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_type`
--
ALTER TABLE `org_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_titles`
--
ALTER TABLE `page_titles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_access`
--
ALTER TABLE `role_access`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timesheet`
--
ALTER TABLE `timesheet`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_days`
--
ALTER TABLE `working_days`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee_note`
--
ALTER TABLE `employee_note`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `org_type`
--
ALTER TABLE `org_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `page_titles`
--
ALTER TABLE `page_titles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role_access`
--
ALTER TABLE `role_access`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `timesheet`
--
ALTER TABLE `timesheet`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `working_days`
--
ALTER TABLE `working_days`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
