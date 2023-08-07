-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 04:04 PM
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
-- Database: `nacci`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Photoname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`ID`, `Name`, `Position`, `EmailAddress`, `Password`, `Photoname`) VALUES
(1, 'Ruby Ventura', 'Programmer', 'ruby@gmail.com', '$2y$10$0FkWyr7LzxLusFGvzv.zdOyAEDU9jiplDF6lz/M9dbkqV2xU9KCae', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `clientuser`
--

CREATE TABLE `clientuser` (
  `ClientID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientuser`
--

INSERT INTO `clientuser` (`ClientID`, `Name`, `EmailAddress`, `Password`) VALUES
(4, 'Ruby', 'ruby@gmail.com', '$2y$10$aYX6Wo5v.QGjZmX9t9Dg.u3JG4uj8NBq2qVG1JlnmohoIUyejfL.K');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `name`, `location`, `description`, `start_date`, `end_date`, `admin_id`) VALUES
(1, 'Aurora Ridge to Reef Tree Planting', 'Sierra Madre, Aurora', 'Aurora Memorial National Park is a protected area of the Philippines located within the Sierra Madre mountain range between the provinces of Nueva Ecija  and  Aurora  in  Central Luzon.  On  this  historical  and  enigmatic  national  park,  visitors  can  play  in  clouds  upon  entry  to  the welcome  marker  of  Aurora  while  on  journey  at  the  long  and  winding  road.  Doña  Aurora Aragon-Quezon was the builder of a road that connects to the outside world during 1930. On its roadside lies the dedication and marker on her honour. Bird Watching is a bonus and the rare  Philippine  Eagle  has  its  kingdom  on  this  Aurora’s  Green  Mile  Corridor.  The  Aurora Memorial National park covers an area of 5,676 hectares stretching over 50 kilometers along the scenic Bongabon-Baler road. Established in 1937 by virtue of Proclamation No. 220, the park was dedicated to then First LadyAurora Aragon Quezon. It had an initial area of 2,356 hectares.  By  1941,  its  size  more  than  doubled  to  its  current  area  of  5,676  hectares.  The maximum  altitude  of  the  park  is  reported  to  be  1,000  m,  so  the  main  forest  type  inside  the park must be lowland dipterocarp, with only limited areas of montane forest. Land uses inside the park include both permanent and shifting agriculture (kaingin) and forestry.\r\n<br><br>\r\n<b>Package Rate w assisted growth Min of 500 seedlings at P 88/seedlings</b>\r\n<br><br>\r\nINCLUSIVE of: \r\n<ul>\r\n<li>Seedlings</li>\r\n<li>maintenance by the communities</li>\r\n<li>Certificate of Conservation and Social Responsibility to the of the volunteer group.</li>\r\n<li>Labor cost of hauling, land prep and transfer of the seedlings</li>\r\n<li>Planting Labor for the local community•Photos and videos</li>\r\n<li>Social Media Coverage (linkedin, tweeter, google plus, 4 fb page/group)</li>\r\n<li>Endeavor Coordinator</li>\r\n<li>Monitoring and maintenance by Nature Awareness and Conservation Club, Inc (NACCI)</li>\r\n<li>Webinar Orientation on Creation, Community, Climate Change and Conservation.</li>\r\n<li>Snacks of the community planters</li>\r\n</ul>\r\n<br>\r\nNOT INCLUDED: Transportation to and from the site, accommodations, all meals of the volunteer planters, signage, tip to the community planters', '2023-08-01', '2023-08-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `participants` int(11) NOT NULL,
  `person` varchar(50) NOT NULL,
  `contact_num` varchar(12) NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'PROCESSING',
  `user_id` int(11) NOT NULL,
  `prog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`id`, `name`, `location`, `date`, `participants`, `person`, `contact_num`, `status`, `user_id`, `prog_id`) VALUES
(4, 'Mapua University', 'Isabela', '2023-08-15', 200, 'Ruby Ventura', '09430496851', 'PROCESSING', 4, 1),
(5, 'Solsten', 'Isabela', '2023-08-24', 10, 'Ruby Jean', '123456789', 'PROCESSING', 4, 1),
(6, 'Mapua', 'Isabela', '2023-08-10', 15, 'Ruby', '12345', 'CANCELLED', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `clientuser`
--
ALTER TABLE `clientuser`
  ADD PRIMARY KEY (`ClientID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_admin fk` (`admin_id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `volunteer_user fk` (`user_id`),
  ADD KEY `volunteer_program fk` (`prog_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clientuser`
--
ALTER TABLE `clientuser`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_admin fk` FOREIGN KEY (`admin_id`) REFERENCES `adminuser` (`ID`);

--
-- Constraints for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD CONSTRAINT `volunteer_program fk` FOREIGN KEY (`prog_id`) REFERENCES `program` (`id`),
  ADD CONSTRAINT `volunteer_user fk` FOREIGN KEY (`user_id`) REFERENCES `clientuser` (`ClientID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
