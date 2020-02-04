-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2019 at 07:19 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chan_DAS`
--

-- --------------------------------------------------------

--
-- Table structure for table `Appointment`
--

CREATE TABLE `Appointment` (
  `appointmentid` int(11) NOT NULL,
  `appointmentDate` date NOT NULL,
  `appointmentTime` varchar(10) NOT NULL,
  `DoctorId_FK` int(11) NOT NULL,
  `Patientid_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Appointment`
--

INSERT INTO `Appointment` (`appointmentid`, `appointmentDate`, `appointmentTime`, `DoctorId_FK`, `Patientid_FK`) VALUES
(1, '2019-11-30', '3:00P.M.', 14, 6),
(2, '2019-12-04', '10:30 A.M.', 10, 10),
(3, '2019-12-03', '11:00 A.M.', 8, 5),
(4, '2019-12-04', '10:30 A.M.', 2, 8),
(5, '2019-12-04', '4:00 P.M.', 3, 9),
(6, '2019-12-06', '4:30 P.M.', 18, 12),
(7, '2019-12-09', '3:00P.M.', 12, 12),
(8, '2019-12-27', '11:00 A.M.', 13, 8),
(9, '2019-12-31', '2:00 P.M.', 17, 5),
(10, '2019-12-17', '2:00 P.M.', 5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `AvailableSchedule`
--

CREATE TABLE `AvailableSchedule` (
  `Scheduleid` int(11) NOT NULL,
  `ScheduleDate` date NOT NULL,
  `ScheduleTime` varchar(10) NOT NULL,
  `DoctorId_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `AvailableSchedule`
--

INSERT INTO `AvailableSchedule` (`Scheduleid`, `ScheduleDate`, `ScheduleTime`, `DoctorId_FK`) VALUES
(1, '2019-12-11', '5:00 P.M.', 8),
(2, '2019-12-17', '10:00 A.M.', 18),
(3, '2019-12-10', '4:30 P.M.', 3),
(4, '2019-12-18', '10:00 A.M.', 5),
(5, '2019-12-16', '2:00 P.M.', 9),
(6, '2019-12-23', '10:00 A.M.', 12),
(7, '2019-12-24', '3:30 P.M.', 17),
(8, '2019-12-30', '10:00 A.M.', 5),
(9, '2019-12-13', '11:00 A.M.', 2),
(10, '2019-12-11', '12:00 P.M', 11);

-- --------------------------------------------------------

--
-- Table structure for table `Doctors`
--

CREATE TABLE `Doctors` (
  `Did` int(11) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Specialties` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ProcedureName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ImagePath` blob,
  `Phone` int(10) DEFAULT NULL,
  `Address` varchar(200) NOT NULL,
  `zipCode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Doctors`
--

INSERT INTO `Doctors` (`Did`, `LastName`, `FirstName`, `email`, `password`, `Specialties`, `ProcedureName`, `ImagePath`, `Phone`, `Address`, `zipCode`) VALUES
(1, 'Abadi', 'jacob', 'jacobabadi@gmail.com', '430', 'Pediatrics', NULL, NULL, NULL, '2000 Galloping Hill Rd,Kenilworth, NJ', 70033),
(2, 'Abadir', 'Dale', 'Abadirdale@gmail.com', '430', 'Dermatology', NULL, NULL, NULL, ' 784 wall st,Rye Brook, NY', 12301),
(3, 'Hartley', 'Taylor', 'Taylor.Hartley@gmail.com', '430', 'Gastroenterologist', NULL, NULL, NULL, '95 Carpenter Lane, New York', 10016),
(4, 'Ray', 'Emilia', 'Ray123@gmail.com', '430', 'ENT', NULL, NULL, NULL, '9231 East Swanson Rd., Brooklyn, NY 11211, New York', 10016),
(5, 'Duncan', 'John', 'JohnD@gmail.com', '430', 'ENT', NULL, NULL, NULL, '828 W. John Court, New York, NY', 10003),
(6, 'Chao', 'Cleo', 'Cleo.Chao@gmail.com', '430', 'Dentist', NULL, NULL, NULL, '50 N. Snake Hill Lane, New York, NY', 10024),
(7, 'Cheung', 'Dale', 'helan@gmail.com', '15321', 'OBGYT', NULL, NULL, NULL, '1651 60th Street', 12356),
(8, 'Abbey-Mensah', 'Michael', 'Abbey-Mensah@gmail.com', '430', 'Pediatrics', NULL, NULL, NULL, '15 15 ave,Brooklyn, NY,', 12209),
(9, 'Abboud', 'Joseph', 'AbboudJoseph@gmail.com', '430', 'Cardiology', NULL, NULL, NULL, '555 8th avenue,Brooklyn, NY', 11234),
(10, 'Abdallah', 'Marie', 'AbdallahM@gmail.com', '430', 'Infectious Disease', NULL, NULL, NULL, '567 59th st, Queens,NY', 11365),
(11, 'Abdel-Wahab', 'Nancy', 'Abdel-WahabN@gmail.com', '430', 'Psychiatry', NULL, NULL, NULL, '999 kings street,Bronx,NY', 10044),
(12, 'Brown', 'Barry', 'BarryBrown@gmail.com', '430', 'Obstetrics & Gynecology', NULL, NULL, NULL, '4353 bla BLVD, Elmhurst,NY', 11378),
(13, 'chiu', 'ching', 'chiuching@gmail.com', '430', 'Obstetrics & Gynecology', NULL, NULL, NULL, '887 1st avenue, Brooklyn,NY', 12393),
(14, 'Smith', 'James', 'JamesSmith@gmail.com', '430', 'DERMATOLOGY', NULL, NULL, NULL, '567 well streeet, new york,NY', 10001),
(15, 'Hernandez', 'Maira', 'HernandezMaria@gmail.com', '430', 'EMERGENCY MEDICINE', NULL, NULL, NULL, '2933 Queens BLVD, Queen, NY', 11356),
(16, 'Robert', 'Garcia', 'RobertGarcia@yahoo.com', '430', 'Neurology', NULL, NULL, NULL, '27 central street, New York,NY', 10012),
(17, 'Rodriguez', 'Michell', 'RodriguezM@yahoo.com', '430', 'OPHTHALMOLOGY', NULL, NULL, NULL, '763 59th street, brooklyn, NY', 11234),
(18, 'Blaza', 'Veleria', 'BlazaVeleria@hospital.com', '430', 'PSYCHIATRY', NULL, NULL, NULL, '23 2nd Ave, New York,NY', 10019);

-- --------------------------------------------------------

--
-- Table structure for table `News`
--

CREATE TABLE `News` (
  `nid` int(11) NOT NULL,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Postbody` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `News`
--

INSERT INTO `News` (`nid`, `Title`, `Postbody`) VALUES
(1, 'Flu Shot', '2019 Flu shot is available now. Ask your doctor to do it.');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `Pid` int(11) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `insurance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `PhoneNum` int(10) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`Pid`, `Lastname`, `Firstname`, `DOB`, `Address`, `insurance`, `PhoneNum`, `email`, `password`) VALUES
(1, 'Carter', 'Nelson', '1977-11-05', '676 2nd Ave, Willamburg,NY', NULL, NULL, 'fakeemail@soso.com', '430'),
(2, 'Cooper', 'Richard', '1989-02-03', '2933 soso avenue, Brooklyn,NY', NULL, NULL, 'SecondFakeEmail@night.com', '430'),
(3, 'Faker', 'ward', '2000-03-04', '334 canal street, New York, NY', NULL, NULL, 'canalFaker@gmail.com', '430'),
(4, 'Araez', 'Pedro', '1958-08-18', '2 Atlantic Avenue, Brooklyn,NY', NULL, NULL, 'PedroAraez@gmail.com', '430'),
(5, 'Blachunas', 'Sylvester', '1990-12-31', '440 8th avenue,Brooklyn,NY', NULL, NULL, 'Blachunas.Sylvester@gmail.com', '430'),
(6, 'Boutin', 'June', '1987-05-10', '78 cherry street, Queens, NY', NULL, NULL, 'BoutinJune2@gmail.com', '430'),
(7, 'King', 'Freddy', '1977-03-23', '767 Colden street, Flushing, NY', NULL, NULL, 'Freddyking78@gmail.com', '430'),
(8, 'Martin', 'John', '1992-04-30', '430 kings Street,New York,NY', NULL, NULL, 'Johnmartin247@gmail.com', '430'),
(9, 'Kristin', 'Angela', '1983-06-08', '688 38th street,New York,NY', NULL, NULL, 'kristinangela68@gmail.com', '430'),
(10, 'Marzi', 'Joe', '1978-11-18', '375 74th st, Queens,NY', NULL, NULL, 'marzijoe1118@gmail.com', '430'),
(11, 'wood', 'Frank', '1967-07-12', '555 89th street,Brooklyn,NY', NULL, NULL, 'frankwood123@gmail.com', '430'),
(12, 'Anderson', 'Jayden', '1999-06-28', '783 W 28th Street,New York,NY', NULL, NULL, 'JaydenAnderson628@gmail.com', '430'),
(13, 'Wilson', 'Isabella', '2000-04-23', '2399 S Pond Street,Brookyn,NY', NULL, NULL, 'N/A', '430'),
(14, 'Scott', 'Benjamin', '1980-06-19', '245 Chrystie street,New York,NY', NULL, NULL, 'Benjaminscott232@gmail.com', '430'),
(15, 'Chen', 'Sophia', '2013-10-24', '782 N Mountain Avenue,Brooklyn,Ny', NULL, NULL, 'N/A', '430');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `Qid` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Qbody` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`Qid`, `Title`, `Qbody`) VALUES
(1, 'How do I know that my appointment has really been booked?', 'If you’ve reached a page that says, “Your appointment is booked,” then rest assured – you’re all set! Soon you’ll receive an email from Zocdoc with helpful details about your upcoming appointment.'),
(2, 'How do I cancel or reschedule an appointment?', 'We encourage patients to honor booked appointments, but we also understand that life happens!\r\n\r\nIf you need to cancel or reschedule your appointment, you can do so in your Docpoint account. Just login to your account or click the \"cancel\" link in your confirmation email. Once you\'re signed in, you\'ll see your Medical Team. On the left side of that page, find your upcoming appointment. Under the appointment details, you\'ll see a link to cancel or reschedule. Once you have successfully modified your appointment, you will receive a confirmation email.');

-- --------------------------------------------------------

--
-- Table structure for table `TestRecord`
--

CREATE TABLE `TestRecord` (
  `RecordID` int(11) NOT NULL,
  `RecordName` varchar(255) NOT NULL,
  `RecordTime` date NOT NULL,
  `Result` varchar(10) NOT NULL,
  `parientId_FK` int(11) NOT NULL,
  `DoctorId_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD PRIMARY KEY (`appointmentid`),
  ADD KEY `DoctorId_FK` (`DoctorId_FK`),
  ADD KEY `Patientid_FK` (`Patientid_FK`);

--
-- Indexes for table `AvailableSchedule`
--
ALTER TABLE `AvailableSchedule`
  ADD PRIMARY KEY (`Scheduleid`),
  ADD KEY `DoctorId_FK` (`DoctorId_FK`);

--
-- Indexes for table `Doctors`
--
ALTER TABLE `Doctors`
  ADD PRIMARY KEY (`Did`);

--
-- Indexes for table `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`Pid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`Qid`);

--
-- Indexes for table `TestRecord`
--
ALTER TABLE `TestRecord`
  ADD PRIMARY KEY (`RecordID`),
  ADD KEY `parientId_FK` (`parientId_FK`),
  ADD KEY `DoctorId_FK` (`DoctorId_FK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Appointment`
--
ALTER TABLE `Appointment`
  MODIFY `appointmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `AvailableSchedule`
--
ALTER TABLE `AvailableSchedule`
  MODIFY `Scheduleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Doctors`
--
ALTER TABLE `Doctors`
  MODIFY `Did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `News`
--
ALTER TABLE `News`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `Qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `TestRecord`
--
ALTER TABLE `TestRecord`
  MODIFY `RecordID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD CONSTRAINT `Appointment_ibfk_1` FOREIGN KEY (`DoctorId_FK`) REFERENCES `Doctors` (`Did`),
  ADD CONSTRAINT `Appointment_ibfk_2` FOREIGN KEY (`Patientid_FK`) REFERENCES `patients` (`Pid`);

--
-- Constraints for table `AvailableSchedule`
--
ALTER TABLE `AvailableSchedule`
  ADD CONSTRAINT `AvailableSchedule_ibfk_1` FOREIGN KEY (`DoctorId_FK`) REFERENCES `Doctors` (`Did`);

--
-- Constraints for table `TestRecord`
--
ALTER TABLE `TestRecord`
  ADD CONSTRAINT `TestRecord_ibfk_1` FOREIGN KEY (`parientId_FK`) REFERENCES `patients` (`Pid`),
  ADD CONSTRAINT `TestRecord_ibfk_2` FOREIGN KEY (`DoctorId_FK`) REFERENCES `Doctors` (`Did`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
