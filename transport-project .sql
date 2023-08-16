-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2023 at 08:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transport-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `pwd`) VALUES
('kavya', '1248'),
('vaishnavi', '1257');

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE `pdf` (
  `sno` int(11) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `RE` varchar(255) DEFAULT NULL,
  `CM` varchar(255) DEFAULT NULL,
  `PM` varchar(255) DEFAULT NULL,
  `ES` varchar(255) DEFAULT NULL,
  `TAX` varchar(255) DEFAULT NULL,
  `bus_number` varchar(255) DEFAULT NULL,
  `col1` varchar(255) NOT NULL,
  `col2` varchar(255) NOT NULL,
  `col3` varchar(255) NOT NULL,
  `col4` varchar(255) NOT NULL,
  `col5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pdf`
--

INSERT INTO `pdf` (`sno`, `date`, `amount`, `RE`, `CM`, `PM`, `ES`, `TAX`, `bus_number`, `col1`, `col2`, `col3`, `col4`, `col5`) VALUES
(11, '2023-03-25', '6789', '6789', '', '', '', '', 'AP31-TH-4019', 'fuel', '', '', '', ''),
(12, '2023-03-18', '6000', '6000', '', '', '', '', 'AP31-TE-3995', 'fuel', '', '', '', ''),
(13, '2023-02-25', '500', '500', '', '', '', '', 'AP31-TD-6636', 'spare parts', '', '', '', ''),
(14, '2023-03-22', '547', '90', '457', '', '', '', 'AP31-TH-4019', 'fuel', 'repair', '', '', ''),
(15, '2023-02-21', '400', '', '', '400', '', '', 'AP31-TH-4019', '', '', 'ertyui', '', ''),
(16, '2023-03-26', '6000', '6000', '', '', '', '', 'AP31-TH-4019', 'fuel', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `name` varchar(200) NOT NULL,
  `user_category` varchar(50) NOT NULL,
  `roll_number` varchar(40) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `year_of_enrollment` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `current_year` varchar(50) NOT NULL,
  `mobile_number` varchar(13) NOT NULL,
  `address` text NOT NULL,
  `bus_number` varchar(20) NOT NULL,
  `pick_up_point` varchar(100) NOT NULL,
  `fee` varchar(100) NOT NULL,
  `college_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`name`, `user_category`, `roll_number`, `branch`, `year_of_enrollment`, `gender`, `current_year`, `mobile_number`, `address`, `bus_number`, `pick_up_point`, `fee`, `college_name`) VALUES
('keerthi', 'staff', '19nm1a12', 'IT', '2022-2023', 'male', '4th', '8106017052', 'HOUSENO 4-19,JAGANNADHAM STREET,PARAVADA VILLAGE', '1432', 'pitapuram', '30000', 'VIIT'),
('keerthi', 'student', '19nm1a1214', 'IT', '2022-2023', 'FEMALE', '4th', '8106017052', 'HOUSENO 4-19,JAGANNADHAM STREET,PARAVADA VILLAGE', '3996', 'NAD', '30000', 'VIIT'),
('arjun', 'staff', '19nm1a1804', 'civil', '2023', 'male', '3rd yr', '9133511247', 'nhsjk ksdjklds', '1804', 'NAD', '30000', 'VIIT');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `S_NO` int(11) NOT NULL DEFAULT 0,
  `BUS_NUMBER` varchar(50) NOT NULL,
  `BUS_DRIVER` varchar(100) NOT NULL,
  `CONTACT_NUMBER` varchar(10) NOT NULL,
  `STOPS` text NOT NULL,
  `NO_OF_PASSENGERS` int(11) NOT NULL,
  `MILEAGE` varchar(100) NOT NULL,
  `PERMIT_DUE_DATE` varchar(10) NOT NULL,
  `INSURANCE_DUE_DATE` varchar(10) NOT NULL,
  `STARTING_POINT` varchar(50) NOT NULL,
  `EXPECTED_INCOME` varchar(255) NOT NULL,
  `TOTAL_INCOME` varchar(255) NOT NULL,
  `RECURRING_EXPENDIATURE` varchar(255) NOT NULL,
  `CORRECTIVE_MAINTAINANCE` varchar(255) NOT NULL,
  `PREVENTIVE_MAINTAINANCE` varchar(255) NOT NULL,
  `EMPLOYEES_SALARY` varchar(255) NOT NULL,
  `TAXES` varchar(255) NOT NULL,
  `PROFIT` varchar(255) NOT NULL,
  `DATE` varchar(255) NOT NULL,
  `col1` varchar(255) NOT NULL,
  `col2` varchar(255) NOT NULL,
  `col3` varchar(255) NOT NULL,
  `col4` varchar(255) NOT NULL,
  `col5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`S_NO`, `BUS_NUMBER`, `BUS_DRIVER`, `CONTACT_NUMBER`, `STOPS`, `NO_OF_PASSENGERS`, `MILEAGE`, `PERMIT_DUE_DATE`, `INSURANCE_DUE_DATE`, `STARTING_POINT`, `EXPECTED_INCOME`, `TOTAL_INCOME`, `RECURRING_EXPENDIATURE`, `CORRECTIVE_MAINTAINANCE`, `PREVENTIVE_MAINTAINANCE`, `EMPLOYEES_SALARY`, `TAXES`, `PROFIT`, `DATE`, `col1`, `col2`, `col3`, `col4`, `col5`) VALUES
(3, 'AP31-TE-3992', 'B. APPALA NAIDU', '9966384199', 'ARILOVA', 1, '9', '20/2/2023', '20/2/2023', 'ARILOVA', '', '0', '', '', '', '', '', '0', '', '', '', '', '', ''),
(2, 'AP31-TE-3993', 'K POLA RAO', '7680026329', 'AKKAYYAPALEM', 0, '8', '20/2/2023', '20/2/2023', 'Akkayapalem', '', '0', '', '', '', '', '', '0', '', '', '', '', '', ''),
(5, 'AP31-TE-3998', 'B KRISHNA', '9985069217', 'YENDADA', 0, '9', '20/2/2023', '20/2/2023', 'YENDADA', '', '0', '', '', '', '', '', '0', '', '', '', '', '', ''),
(4, 'AP31-TP-4914', 'P NARSINGA RAO', '9014534148', 'PM PALEM', 0, '6', '20/2/2023', '20/2/2023', 'PM PALEM', '', '0', '', '', '', '', '', '0', '', '', '', '', '', ''),
(1, 'AP31-TP-4980', 'B HARISH', '7989186285', 'BEACH ROAD', 2, '9', '20/2/2023', '20/2/2023', 'BEACH ROAD', '', '30000', '9000', '500', '0', '0', '0', '20500', '2023-03-25', '', 'repair', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `school_pdf`
--

CREATE TABLE `school_pdf` (
  `sno` int(11) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `RE` varchar(255) DEFAULT NULL,
  `CM` varchar(255) DEFAULT NULL,
  `PM` varchar(255) DEFAULT NULL,
  `ES` varchar(255) DEFAULT NULL,
  `TAX` varchar(255) DEFAULT NULL,
  `bus_number` varchar(255) DEFAULT NULL,
  `col1` varchar(255) NOT NULL,
  `col2` varchar(255) NOT NULL,
  `col3` varchar(255) NOT NULL,
  `col4` varchar(255) NOT NULL,
  `col5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_pdf`
--

INSERT INTO `school_pdf` (`sno`, `date`, `amount`, `RE`, `CM`, `PM`, `ES`, `TAX`, `bus_number`, `col1`, `col2`, `col3`, `col4`, `col5`) VALUES
(1, '2023-03-11', '9000', '9000', '', '', '', '', 'AP31-TP-4980', 'fuel', '', '', '', ''),
(2, '2023-03-25', '500', '', '500', '', '', '', 'AP31-TP-4980', '', 'repair', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `school_register`
--

CREATE TABLE `school_register` (
  `name` varchar(200) NOT NULL,
  `user_category` varchar(50) NOT NULL,
  `roll_number` varchar(40) NOT NULL,
  `class` varchar(20) NOT NULL,
  `year_of_enrollment` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `mobile_number` varchar(13) NOT NULL,
  `address` text NOT NULL,
  `bus_number` varchar(20) NOT NULL,
  `pick_up_point` varchar(100) NOT NULL,
  `fee` varchar(100) NOT NULL,
  `school_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_register`
--

INSERT INTO `school_register` (`name`, `user_category`, `roll_number`, `class`, `year_of_enrollment`, `gender`, `mobile_number`, `address`, `bus_number`, `pick_up_point`, `fee`, `school_name`) VALUES
('Gayatri Nirujogi', 'staff', '123', 'STAFF', '2023', 'female', '7989186285', 'complex', 'AP31-TP-4980', 'complex', '10000', 'WORLD ONE SCHOOL'),
('Paila Kavya', 'student', '24', '1st', '2023', 'female', '+916309530567', 'RK BEACH', 'AP31-TP-4980', 'BEACH ROAD', '20000', 'WORLD ONE SCHOOL'),
('ramya', 'student', '34', '5TH', '2023', 'female', '9966384199', 'nad', 'AP31-TP-4982', 'cmr', '', 'WORLD ONE SCHOOL'),
('keerthi', 'student', '78', '6TH', '2023', 'female', '8106017052', 'nad', 'AP31-TE-3992', 'NAD', '', 'WORLD ONE SCHOOL');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `name` varchar(255) NOT NULL,
  `roll_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `year_of_enrollment` varchar(255) NOT NULL,
  `mobile_number` varchar(13) NOT NULL,
  `current_year` varchar(255) NOT NULL,
  `bus_number` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `pick_up_point` varchar(255) NOT NULL,
  `fee` varchar(300) DEFAULT '0',
  `branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`name`, `roll_number`, `gender`, `college_name`, `year_of_enrollment`, `mobile_number`, `current_year`, `bus_number`, `address`, `pick_up_point`, `fee`, `branch`) VALUES
('hiran', '19NM1A1209', 'female', 'VIEW', '2023', '9704079567', '3 RD YEAR', 'AP31-TE-3995', 'GAJUWAKA', 'scindya', '28000', 'IT'),
('gayatari', '19NM1A1247', 'female', 'VIEW', '2023', '9704079567', '4 TH YEAR', 'AP31-TH-4019', 'GAJUWAKA', 'GAJUWAKA', '', 'IT'),
('kavya', '19NM1A1248', 'female', 'VIEW', '2023', '9704079567', '4 TH YEAR', 'AP31-TH-4019', 'PARAVADA VILLAGE', 'paravada', '', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `name` varchar(255) NOT NULL,
  `roll_number` varchar(20) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `current_year` varchar(255) NOT NULL,
  `year_of_enrollment` varchar(255) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `mobile_number` varchar(13) NOT NULL,
  `address` text NOT NULL,
  `pick_up_point` varchar(255) NOT NULL,
  `bus_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `fee` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `roll_number`, `branch`, `current_year`, `year_of_enrollment`, `college_name`, `mobile_number`, `address`, `pick_up_point`, `bus_number`, `gender`, `fee`) VALUES
('hiran', '19nm1122223', 'IT', '3 RD YEAR', '2023', 'VIEW', '09704079567', 'GAJUWAKA', 'paravada', 'AP31-TH-4019', 'female', '30000'),
('ramya', '19nm1a1148', 'IT', '4 TH YEAR', '2023', 'VIEW', '09966384199', 'nad', 'pendurthi', 'AP05-TD-2880', 'female', '0'),
('Ramya', '19NM1A1208', 'IT', '4 TH YEAR', '2023', 'VIEW', '9704079567', 'GAJUWAKA', 'BC ROAD', 'AP31-TH-4019', 'female', ''),
('hiran', '19NM1A1209', 'IT', '3 RD YEAR', '2023', 'VIEW', '9704079567', 'GAJUWAKA', 'NAD', 'AP31-TH-4019', 'female', '0'),
('hiran', '19NM1A1219', 'IT', '3 RD YEAR', '2023', 'VIEW', '9704079567', 'GAJUWAKA', 'NAD', 'AP31-TH-4019', 'female', '0'),
('Ramya Gutthula', '19NM1A1228', 'IT', '1 ST YEAR', '2023', 'VIEW', '9704079567', 'GAJUWAKA', 'BC ROAD', 'AP31-TD-6635', 'female', ''),
('Ramya', '19NM1A1238', 'IT', '4 TH YEAR', '2023', 'VIEW', '9704079567', 'GAJUWAKA', 'BC ROAD', 'AP31-TH-4019', 'female', ''),
('gayatari', '19NM1A1247', 'IT', '4 TH YEAR', '2023', 'VIEW', '9704079567', 'GAJUWAKA', 'GAJUWAKA', 'AP31-TD-6635', 'female', ''),
('PAILA KAVYA', '19NM1A1248', 'IT', '4 TH YEAR', '2023', 'VIEW', '+916309530567', 'PARAVADA VILLAGE', 'paravada', 'AP31-TH-4019', 'female', '');

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

CREATE TABLE `view` (
  `S_NO` int(11) NOT NULL,
  `BUS_NUMBER` varchar(50) NOT NULL,
  `BOARDING_TIME` varchar(10) NOT NULL,
  `BUS_DRIVER` varchar(100) NOT NULL,
  `CONTACT_NUMBER` varchar(10) NOT NULL,
  `STOPS` text NOT NULL,
  `NO_OF_PASSENGERS` int(11) NOT NULL,
  `MILEAGE` varchar(100) NOT NULL,
  `PERMIT_DUE_DATE` varchar(10) NOT NULL,
  `INSURANCE_DUE_DATE` varchar(10) NOT NULL,
  `STARTING_POINT` varchar(50) NOT NULL,
  `FEE` varchar(40) NOT NULL,
  `EXPECTED_INCOME` varchar(255) NOT NULL,
  `TOTAL_INCOME` varchar(255) NOT NULL,
  `RECURRING_EXPENDIATURE` varchar(255) NOT NULL,
  `CORRECTIVE_MAINTAINANCE` varchar(255) NOT NULL,
  `PREVENTIVE_MAINTAINANCE` varchar(255) NOT NULL,
  `EMPLOYEES_SALARY` varchar(255) NOT NULL,
  `TAXES` varchar(255) NOT NULL,
  `PROFIT` varchar(255) NOT NULL,
  `DATE` varchar(255) NOT NULL,
  `col1` varchar(255) NOT NULL,
  `col2` varchar(255) NOT NULL,
  `col3` varchar(255) NOT NULL,
  `col4` varchar(255) NOT NULL,
  `col5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `view`
--

INSERT INTO `view` (`S_NO`, `BUS_NUMBER`, `BOARDING_TIME`, `BUS_DRIVER`, `CONTACT_NUMBER`, `STOPS`, `NO_OF_PASSENGERS`, `MILEAGE`, `PERMIT_DUE_DATE`, `INSURANCE_DUE_DATE`, `STARTING_POINT`, `FEE`, `EXPECTED_INCOME`, `TOTAL_INCOME`, `RECURRING_EXPENDIATURE`, `CORRECTIVE_MAINTAINANCE`, `PREVENTIVE_MAINTAINANCE`, `EMPLOYEES_SALARY`, `TAXES`, `PROFIT`, `DATE`, `col1`, `col2`, `col3`, `col4`, `col5`) VALUES
(1, 'AP31-TH-4019', '7:45AM    ', 'RAMARAO     ', '6302501458', 'CAR SHED, HANUMATNHUWAKA, ISUKATHOTA, MADDILAPALEM, GURUDWAR  ', 8, '250', '20/2/2023', '20/2/2023', 'car shed', '28000', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'AP31-TD-6636', '7:50AM', 'NAGESH', '9703287725', 'RAMALAKSHMI APARTMENT, USHODAYA, M.V.P,4TH TOWN, THATICHETLAPALEM, KANCHARRAPALEM, URVASI', 1, '250', '20/2/2023', '20/2/2023', 'Ramalakshmi apartment', '23000', '', '0', '500', '0', '0', '0', '0', '-500', '2023-02-25', 'spare parts', '', '', '', ''),
(3, 'AP31-TH-4015', '7:50AM', 'SRINU', '9704087442', 'SATYAM JUNCTION, SEETHMMADHARA, 5TH TOWN, BIRLA JUNCTION', 0, '250', '20/2/2023', '20/2/2023', 'satyam junction', '22800', '', '0', '', '', '', '', '', '0', '2023-03-10', '', '', '', '', ''),
(4, 'AP31-TU-9613', '7:55AM', 'EASHWAR RAO', '9493803006', 'AKKAYAPALEM, AKKAYAPALEM HIGHWAY, PORT HOSPITAL, PUNJAB HOTEL, R&B, NSTL', 0, '250', '20/2/2023', '20/2/2023', 'Akkayapalem', '12334', '', '0', '', '0', '', '', '', '0', '', '', '', '', '', ''),
(5, 'AP31-TU-9614', '7:50AM', 'KANNABABU', '8790634435', 'JAGADHAMBA, R.T.C COMPLEX, LIC BUILDING, DONDAPARTHI', 0, '250', '20/2/2023', '20/2/2023', 'Jagadhamba', '23456', '', '0', '', '', '', '', '', '0', '', '', '', '', '', ''),
(6, 'AP05-TD-2880', '8:00AM', 'TARUN', '9908199775', 'PENDURTHI, PENDURTHI COLLEGE, PENDURTHI GOVT HOSPITAL, VEPAGUNTA', 1, '250', '20/2/2023', '20/2/2023', 'Pendurthi', '34246', '', '0', '', '', '', '', '', '0', '', '', '', '', '', ''),
(7, 'AP31-TD-7093', '8:00AM', 'RAMAKRISHNA', '9573377970', 'CHINNAMUSHIDIWADA, SUJATHA NAGAR, KRISHNARAI OURAM, PURSHOTA PURAM', 0, '450', '20/2/2023', '20/2/2023', 'chinnamushidiwada', '23458', '', '0', '', '', '', '', '', '0', '', '', '', '', '', ''),
(8, 'AP31-TH-4018', '8:10AM', 'NOOKARAJU', '9642132202', 'NAIDUTHOTA, BAJI JUNCTION ,NAD,KAKANI NAGAR', 0, '450', '20/2/2023', '20/2/2023', 'naiduthota', '23455', '', '0', '', '', '', '', '', '0', '', '', '', '', '', ''),
(9, 'AP39-U-0287', '8:20AM', 'RAMBABU', '8184896448', 'APPANA PALEM, GOSHALA, PRAHALADHAPURAM, GOPALAPATNAM', 0, '450', '20/2/2023', '20/2/2023', 'gopalapatnam', '28000', '', '0', '', '', '', '', '', '0', '', '', '', '', '', ''),
(10, 'AP31-TE-3995', '8:00AM', 'THATABABU', '9959104526', 'SCINDYA, MALKAPURAM, SRIHARIPURAM, CORAMANDALGATE, GAJUWAKA DEPO, ZINK GATE', 1, '250', '20/2/2023', '20/2/2023', 'scindya', '28000', '', '28000', '6000', '0', '0', '0', '0', '22000', '2023-03-18', 'fuel', '', '', '', ''),
(11, 'AP31-TD-6635', '8:15AM', 'K.V NAIDU', '9603015884', 'B.C ROAD, CHINNA NADIPUR, PEDAGANTYADA, KANYA SREE KANYA, NEW KAJUWAKA, CDR', 2, '345', '20/2/2023', '20/2/2023', 'B,C Road', '34556', '', '0', '', '0', '', '0', '0', '0', '2023-03-15', '', '', '', '', ''),
(12, 'AP31-TU-4905', '8:20AM', 'SANTOSH', '9493638373', 'OLD GAJUWADA, PANTHULUGARI MEDA, AUTO NAGAR, BHPV, NATYAPALEM, SHELLA NAGAR', 0, '450', '20/2/2023', '20/2/2023', 'Old gajuwaka', '24000', '', '0', '', '', '', '', '', '0', '', '', '', '', '', ''),
(13, 'AP31-TE-3994', '8:20AM', 'SURESH', '9885995396', 'R.K HOSPITAL,GAJUWAKA POLICE STATION,SRINAGAR', 0, '345', '20/2/2023', '20/2/2023', 'R.K Hospital', '18450', '', '0', '', '', '', '', '', '0', '', '', '', '', '', ''),
(14, 'AP31-TD-6634', '7:55AM', 'VEERAPPA RAO', '8790848364', 'ANAKAPALLI, 4ROAD JUNCTION, SIRASAPALLI, AGANAM PUDI, KOTTURU, LANKELAPALEM', 0, '250', '20/2/2023', '20/2/2023', 'Anakapalli', '23445', '', '0', '', '', '', '', '', '0', '', '', '', '', '', ''),
(15, 'AP31-TE-3996', '7:55AM', 'RAJ BABU', '9160466845', 'NTPC, PARAWADA, DESIPATRIPALEM, SECTOR 1-10, GENRAL HOSPITAL, KURMANAPALEM', 0, '250', '20/2/2023', '20/2/2023', 'NTPC', '2700', '', '0', '', '', '', '', '', '0', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD UNIQUE KEY `roll_number` (`roll_number`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`BUS_NUMBER`);

--
-- Indexes for table `school_pdf`
--
ALTER TABLE `school_pdf`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `school_register`
--
ALTER TABLE `school_register`
  ADD PRIMARY KEY (`roll_number`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD UNIQUE KEY `roll_number` (`roll_number`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD UNIQUE KEY `roll_number` (`roll_number`);

--
-- Indexes for table `view`
--
ALTER TABLE `view`
  ADD PRIMARY KEY (`S_NO`),
  ADD UNIQUE KEY `BUS_NUMBER` (`BUS_NUMBER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `school_pdf`
--
ALTER TABLE `school_pdf`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `view`
--
ALTER TABLE `view`
  MODIFY `S_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
