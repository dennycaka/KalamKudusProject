-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2017 at 09:42 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Name`) VALUES
(10002, 'Denny'),
(10001, 'Lovely');

--
-- Triggers `admin`
--
DELIMITER $$
CREATE TRIGGER `after_admin_delete` AFTER DELETE ON `admin` FOR EACH ROW BEGIN
DELETE FROM users where adminID = old.ID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_admin_insert` AFTER INSERT ON `admin` FOR EACH ROW BEGIN
INSERT INTO users(adminID, adminName,password,status) VALUES(New.ID,New.Name,md5(New.ID),'admin');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_admin_update` AFTER UPDATE ON `admin` FOR EACH ROW BEGIN
UPDATE users SET adminName = new.Name where adminID = old.ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `ID` int(11) NOT NULL,
  `Title` varchar(1000) NOT NULL,
  `Messages` varchar(10000) NOT NULL,
  `datePosted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`ID`, `Title`, `Messages`, `datePosted`) VALUES
(1, 'Semester Break', 'Semester break will start from 11/12/2017 until 7/1/2018. School will start again on 8/1/2018.', '2017-12-11'),
(2, 'Report Card', 'Report card will be given on Friday, 8 December 2017, start from 8 AM until 12 PM. Please inform your parents to come. ', '2017-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ID` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ID`, `Name`) VALUES
(5, '7b'),
(6, '8'),
(8, '7a'),
(11, '9');

-- --------------------------------------------------------

--
-- Table structure for table `class7a`
--

CREATE TABLE `class7a` (
  `Number` int(10) NOT NULL,
  `studentID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class7a`
--

INSERT INTO `class7a` (`Number`, `studentID`) VALUES
(1, 17001001),
(2, 17001002),
(3, 17001003);

--
-- Triggers `class7a`
--
DELIMITER $$
CREATE TRIGGER `after_student_insert_class7a` AFTER INSERT ON `class7a` FOR EACH ROW BEGIN
INSERT INTO marks7a(studentID) VALUES(New.studentID);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `class7b`
--

CREATE TABLE `class7b` (
  `Number` int(10) NOT NULL,
  `studentID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class7b`
--

INSERT INTO `class7b` (`Number`, `studentID`) VALUES
(1, 17001005),
(2, 17001004),
(3, 17001006);

-- --------------------------------------------------------

--
-- Table structure for table `class8`
--

CREATE TABLE `class8` (
  `Number` int(10) NOT NULL,
  `studentID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class8`
--

INSERT INTO `class8` (`Number`, `studentID`) VALUES
(1, 16001001),
(2, 16001002),
(3, 16001003),
(4, 16001004),
(5, 16001005);

-- --------------------------------------------------------

--
-- Table structure for table `class9`
--

CREATE TABLE `class9` (
  `Number` int(10) NOT NULL,
  `studentID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class9`
--

INSERT INTO `class9` (`Number`, `studentID`) VALUES
(1, 15001001),
(2, 15001002),
(3, 15001003),
(4, 15001004),
(5, 15001005);

-- --------------------------------------------------------

--
-- Table structure for table `marks7a`
--

CREATE TABLE `marks7a` (
  `ID` int(10) NOT NULL,
  `studentID` int(10) DEFAULT NULL,
  `studentName` varchar(100) DEFAULT NULL,
  `subject` varchar(20) DEFAULT NULL,
  `assignment1` double DEFAULT NULL,
  `assignment2` double DEFAULT NULL,
  `test1` double DEFAULT NULL,
  `test2` double DEFAULT NULL,
  `test3` double DEFAULT NULL,
  `finalExam` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks7a`
--

INSERT INTO `marks7a` (`ID`, `studentID`, `studentName`, `subject`, `assignment1`, `assignment2`, `test1`, `test2`, `test3`, `finalExam`) VALUES
(4, 17001001, 'I Made Budiasa', 'Art and Craft', 80, 85, 82, 89, 88, 80),
(5, 17001001, 'I Made Budiasa', 'Balinese Language', 80, 80, 86, 85, 81, 89),
(6, 17001001, 'I Made Budiasa', 'Civic Education', 89, 90, 88, 85, 89, 90),
(7, 17001001, 'I Made Budiasa', 'Computer Studies', 90, 90, 92, 92, 92, 95),
(8, 17001001, 'I Made Budiasa', 'English Language', 80, 85, 85, 86, 86, 89),
(9, 17001001, 'I Made Budiasa', 'Indonesian Language', 88, 88, 87, 87, 88, 89),
(10, 17001001, 'I Made Budiasa', 'Mandarin', 82, 80, 80, 80, 82, 85),
(11, 17001001, 'I Made Budiasa', 'Mathematics', 85, 90, 92, 92, 95, 98),
(12, 17001001, 'I Made Budiasa', 'Moral Education', 78, 78, 80, 80, 80, 80),
(13, 17001001, 'I Made Budiasa', 'Physical Education', 80, 85, 75, 78, 78, 80),
(14, 17001001, 'I Made Budiasa', 'Religion', 80, 80, 80, 85, 85, 88),
(15, 17001001, 'I Made Budiasa', 'Science Education', 88, 88, 85, 88, 90, 95),
(16, 17001001, 'I Made Budiasa', 'Social Education', 80, 80, 82, 85, 88, 88),
(17, 17001002, 'Natasha Loyard', 'Art and Craft', 75, 75, 80, 82, 85, 88),
(18, 17001002, 'Natasha Loyard', 'Balinese Language', 88, 88, 85, 88, 88, 90),
(19, 17001002, 'Natasha Loyard', 'Civic Education', 80, 80, 80, 80, 80, 80),
(20, 17001002, 'Natasha Loyard', 'Computer Studies', 78, 80, 80, 82, 82, 85),
(21, 17001002, 'Natasha Loyard', 'English Language', 80, 88, 82, 82, 85, 90),
(22, 17001002, 'Natasha Loyard', 'Indonesian Language', 88, 88, 88, 88, 90, 90),
(23, 17001002, 'Natasha Loyard', 'Mandarin', 78, 80, 80, 85, 90, 95),
(24, 17001002, 'Natasha Loyard', 'Mathematics', 80, 82, 85, 85, 88, 90),
(25, 17001002, 'Natasha Loyard', 'Moral Education', 80, 80, 80, 80, 80, 80),
(26, 17001002, 'Natasha Loyard', 'Physical Education', 80, 80, 90, 90, 90, 90),
(27, 17001002, 'Natasha Loyard', 'Religion', 80, 80, 82, 82, 85, 88),
(28, 17001002, 'Natasha Loyard', 'Science Education', 80, 80, 80, 80, 82, 85),
(29, 17001002, 'Natasha Loyard', 'Social Education', 78, 80, 80, 80, 88, 90);

-- --------------------------------------------------------

--
-- Table structure for table `marks7b`
--

CREATE TABLE `marks7b` (
  `ID` int(10) NOT NULL,
  `studentID` int(20) DEFAULT NULL,
  `studentName` varchar(100) DEFAULT NULL,
  `subject` varchar(20) DEFAULT NULL,
  `assignment1` double DEFAULT NULL,
  `assignment2` double DEFAULT NULL,
  `test1` double DEFAULT NULL,
  `test2` double DEFAULT NULL,
  `test3` double DEFAULT NULL,
  `finalExam` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marks8`
--

CREATE TABLE `marks8` (
  `ID` int(10) NOT NULL,
  `studentID` int(20) DEFAULT NULL,
  `studentName` varchar(100) DEFAULT NULL,
  `subject` varchar(20) DEFAULT NULL,
  `assignment1` double DEFAULT NULL,
  `assignment2` double DEFAULT NULL,
  `test1` double DEFAULT NULL,
  `test2` double DEFAULT NULL,
  `test3` double DEFAULT NULL,
  `finalExam` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marks9`
--

CREATE TABLE `marks9` (
  `ID` int(10) NOT NULL,
  `studentID` int(20) DEFAULT NULL,
  `studentName` varchar(100) DEFAULT NULL,
  `subject` varchar(20) DEFAULT NULL,
  `assignment1` double DEFAULT NULL,
  `assignment2` double DEFAULT NULL,
  `test1` double DEFAULT NULL,
  `test2` double DEFAULT NULL,
  `test3` double DEFAULT NULL,
  `finalExam` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `ID` int(11) NOT NULL,
  `About` varchar(255) NOT NULL,
  `Message` varchar(10000) NOT NULL,
  `dateSent` date NOT NULL,
  `Sender` int(11) NOT NULL,
  `replyMessage` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`ID`, `About`, `Message`, `dateSent`, `Sender`, `replyMessage`) VALUES
(1, 'Final Exam', 'May i know when the final exam will be conducted, and for how long? Because I am planning for a holiday with my family at the beginning of December. Thank you. ', '2017-10-30', 17001001, 'The final exam will be conducted from Monday, 27/11/2017 until Friday 1/12/2017.'),
(2, 'Extracurricular', 'Dear Sir or Mam, may i know until when the extracurricular activities will be conducted? Thank you. ', '2017-11-23', 17001002, '');

-- --------------------------------------------------------

--
-- Table structure for table `schedule7a`
--

CREATE TABLE `schedule7a` (
  `ID` int(10) NOT NULL,
  `Day` varchar(100) NOT NULL,
  `Period 1` varchar(100) NOT NULL,
  `Period 2` varchar(100) NOT NULL,
  `Period 3` varchar(100) NOT NULL,
  `Period 4` varchar(100) NOT NULL,
  `Period 5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule7a`
--

INSERT INTO `schedule7a` (`ID`, `Day`, `Period 1`, `Period 2`, `Period 3`, `Period 4`, `Period 5`) VALUES
(1, 'Monday', 'Civic Education', 'Mathematics', 'Indonesian Language', 'Religion', 'Science Education'),
(2, 'Tuesday', 'English Language', 'Computer Studies', 'Social Education', 'Science Education', 'Mandarin'),
(3, 'Wednesday', 'Indonesian Language', 'Mathematics', 'Art and Craft', 'Moral Education', 'English Language'),
(4, 'Thursday', 'Physical Education', 'Social Education', 'Computer Studies', 'Balinese Language', 'Mandarin'),
(5, 'Friday', 'English Language', 'Indonesian Language', 'Art and Craft', 'Science Education', 'Social Education');

-- --------------------------------------------------------

--
-- Table structure for table `schedule7b`
--

CREATE TABLE `schedule7b` (
  `ID` int(10) NOT NULL,
  `Day` varchar(100) NOT NULL,
  `Period 1` varchar(100) NOT NULL,
  `Period 2` varchar(100) NOT NULL,
  `Period 3` varchar(100) NOT NULL,
  `Period 4` varchar(100) NOT NULL,
  `Period 5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule7b`
--

INSERT INTO `schedule7b` (`ID`, `Day`, `Period 1`, `Period 2`, `Period 3`, `Period 4`, `Period 5`) VALUES
(1, 'Monday', 'Religion', 'Indonesian Language', 'Computer Studies', 'Mathematics', 'Science Education'),
(2, 'Tuesday', 'Social Education', 'English Language', 'Art and Craft', 'Science Education', 'Mandarin'),
(3, 'Wednesday', 'Mathematics', 'Science Education', 'Computer Studies', 'Mandarin', 'English Language'),
(4, 'Thursday', 'English Language', 'Indonesian Language', 'Balinese Language', 'Moral Education', 'Art and Craft'),
(5, 'Friday', 'Physical Education', 'English Language', 'Social Education', 'Indonesian Language', 'Science Education');

-- --------------------------------------------------------

--
-- Table structure for table `schedule8`
--

CREATE TABLE `schedule8` (
  `ID` int(10) NOT NULL,
  `Day` varchar(20) DEFAULT NULL,
  `Period 1` varchar(20) DEFAULT NULL,
  `Period 2` varchar(20) DEFAULT NULL,
  `Period 3` varchar(20) DEFAULT NULL,
  `Period 4` varchar(20) DEFAULT NULL,
  `Period 5` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule8`
--

INSERT INTO `schedule8` (`ID`, `Day`, `Period 1`, `Period 2`, `Period 3`, `Period 4`, `Period 5`) VALUES
(1, 'Monday', 'Indonesian Language', 'English Language', 'Mathematics', 'Mandarin', 'Science Education'),
(2, 'Tuesday', 'Computer Studies', 'Social Education', 'Civic Education', 'Art and Craft', 'English Language'),
(3, 'Wednesday', 'Physical Education', 'Mandarin', 'Mathematics', 'English Language', 'Science Education'),
(4, 'Thursday', 'Art and Craft', 'Social Education', 'Religion', 'Science Education', 'Balinese Language'),
(5, 'Friday', 'Computer Studies', 'Indonesian Language', 'Moral Education', 'Science Education', 'Social Education');

-- --------------------------------------------------------

--
-- Table structure for table `schedule9`
--

CREATE TABLE `schedule9` (
  `ID` int(10) NOT NULL,
  `Day` varchar(20) DEFAULT NULL,
  `Period 1` varchar(20) DEFAULT NULL,
  `Period 2` varchar(20) DEFAULT NULL,
  `Period 3` varchar(20) DEFAULT NULL,
  `Period 4` varchar(20) DEFAULT NULL,
  `Period 5` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule9`
--

INSERT INTO `schedule9` (`ID`, `Day`, `Period 1`, `Period 2`, `Period 3`, `Period 4`, `Period 5`) VALUES
(1, 'Monday', 'Balinese Language', 'Science Education', 'Moral Education', 'English Language', 'Social Education'),
(2, 'Tuesday', 'Physical Education', 'Civic Education', 'Mathematics', 'English Language', 'Mandarin'),
(3, 'Wednesday', 'Art and Craft', 'Social Education', 'Religion', 'Science Education', 'Indonesian Language'),
(4, 'Thursday', 'Mandarin', 'Mathematics', 'Computer Studies', 'Indonesian Language', 'Social Education'),
(5, 'Friday', 'Computer Studies', 'Science Education', 'Mathematics', 'English Language', 'Mandarin');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `Religion` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `guardianName` varchar(100) NOT NULL,
  `guardianAddress` varchar(100) NOT NULL,
  `guardianPhoneNumber` varchar(100) NOT NULL,
  `guardianStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `Name`, `dateOfBirth`, `Religion`, `Address`, `phoneNumber`, `guardianName`, `guardianAddress`, `guardianPhoneNumber`, `guardianStatus`) VALUES
(15001001, 'Grace Sutasoma', '2003-02-15', 'Christian', 'Jl. Pulau Batanta No. 9 Denpasar', '085999367881', 'Martin Sutasoma', 'Jl. Pulau Batanta No. 9 Denpasar', '085737569880', 'Father'),
(15001002, 'Mathew Jonas', '2003-12-01', 'Catholic', 'Jl. Tukad Batanghari Gg. 2 Renon Denpasar', '089777623907', 'Andre Jonas', 'Jl. Tukad Batanghari Gg. 2 Renon Denpasar', '089777989102', 'Father'),
(15001003, 'Ayu Sasmitha', '2003-03-12', 'Hindu', 'Jl. Kenanga Gg. III Denpasar', '087861724565', 'I Wayan Sindhu', 'Jl. Kenanga Gg. III Denpasar', '087861334912', 'Father'),
(15001004, 'Dewa Gede Brahmayuda', '2003-01-12', 'Hindu', 'Jl. Padma II Penatih Denpasar', '089742412587', 'Dewa Made Suardana', 'Jl. Padma II Penatih Denpasar', '089742412998', 'Father'),
(15001005, 'Andre Stephanus', '2003-10-01', 'Christian', 'Jl. Tukad Yeh Aya No. 12 Denpasar', '085737554916', 'Maria Stephanus', 'Jl. Tukad Yeh Aya No. 12 Denpasar', '085737554990', 'Mother'),
(16001001, 'Murad Hassan', '2004-11-12', 'Islam', 'Jl. Jendral Sudirman No. 2F Denpasar', '087861324979', 'Abdul Hassan', 'Jl. Jendral Sudirman No. 2F Denpasar', '087861324872', 'Father'),
(16001002, 'Ni Made Swandewi Putri', '2004-09-27', 'Hindu', 'Jl. Pulau Roon 13 Denpasar', '081999755502', 'Ni Wayan Andriani', 'Jl. Pulau Roon 13 Denpasar', '081999755444', 'Mother'),
(16001003, 'Anderson Jaws', '2004-08-19', 'Christian', 'Jl. By Pass I Gusti Ngurah Rai Gg. II Kuta', '081999889767', 'Stephen Jaws', 'Jl. By Pass I Gusti Ngurah Rai Gg. II Kuta', '081999889990', 'Father'),
(16001004, 'Abdul Qodir Jaelani', '2004-05-06', 'Islam', 'Jl. Gunung Kerakatau 12 Denpasar', '085969899774', 'Nurul Fatimah', 'Jl. Gunung Kerakatau 12 Denpasar', '085969899882', 'Mother'),
(16001005, 'Kadek Gunawan', '2004-07-29', 'Buddha', 'Jl. By Pass I Gusti Ngurah Rai No. 8X Kuta', '089773464992', 'Komang Sidartha', 'Jl. By Pass I Gusti Ngurah Rai No. 8X Kuta', '089773464990', 'Father'),
(17001001, 'I Made Budiasa', '2005-11-20', 'Hindu', 'Jl. Ksatria III Gg. Melati 2 Kuta', '089775627941', 'I Wayan Suparsana', 'Jl. Ksatria III Gg. Melati 2 Kuta', '089775627887', 'Father'),
(17001002, 'Natasha Loyard', '2005-12-18', 'Catholic', 'Jl. Palapa II No. 11 Denpasar', '085792890656', 'Seira Loyard', 'Jl. Palapa II No. 11 Denpasar', '085792890212', 'Mother'),
(17001003, 'Rael Kertia', '2005-07-29', 'Catholic', 'Jl. Teuku Umar Barat No. 9 Denpasar', '089861724677', 'Lazarus Kertia', 'Jl. Teuku Umar Barat No. 9 Denpasar', '089861724641', 'Father'),
(17001004, 'Regis Landegre', '2005-09-27', 'Catholic', 'Jl. Teuku Umar Gg. Buaya 2 Denpasar', '089728974596', 'Mavin Landegre', 'Jl. Teuku Umar Gg. Buaya 2 Denpasar', '089728974449', 'Father'),
(17001005, 'Rossaria Septyani', '2005-07-12', 'Christian', 'Jl. By Pass I Gusti Ngurah Rai No. 12F Kuta', '081861729534', 'Made Melati', 'Jl. By Pass I Gusti Ngurah Rai No. 12F Kuta', '081861729338', 'Mother'),
(17001006, 'Kezia Michelle', '2005-12-08', 'Christian', 'Jalan Kembang Matahari II no. 33', '087654345211', 'Fahri Haryanto', 'Jalan Kembang Matahari II no. 33', '089654213444', 'Uncle');

--
-- Triggers `students`
--
DELIMITER $$
CREATE TRIGGER `after_student_delete` AFTER DELETE ON `students` FOR EACH ROW BEGIN
DELETE FROM users where studentID = old.ID;
DELETE FROM class7a where studentID = old.ID;
DELETE FROM class7b where studentID = old.ID;
DELETE FROM class8 where studentID = old.ID;
DELETE FROM marks7a where studentID = old.ID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_student_insert` AFTER INSERT ON `students` FOR EACH ROW BEGIN
INSERT INTO users(studentID, studentName,password,status) VALUES(New.ID,New.Name,md5(New.ID),'student');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_student_update` AFTER UPDATE ON `students` FOR EACH ROW BEGIN
UPDATE users SET studentName = new.Name where studentID = old.ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `ID` int(20) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`ID`, `Name`) VALUES
(11, 'Art and Craft'),
(13, 'Balinese Language'),
(8, 'Civic Education'),
(7, 'Computer Studies'),
(5, 'English Language'),
(4, 'Indonesian Language'),
(6, 'Mandarin'),
(1, 'Mathematics'),
(9, 'Moral Education'),
(10, 'Physical Education'),
(12, 'Religion'),
(2, 'Science Education'),
(3, 'Social Education');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `Religion` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`ID`, `Name`, `dateOfBirth`, `Religion`, `Address`, `phoneNumber`, `subject`) VALUES
(101, 'I Nyoman Landep, S.Pd., M.Pd.', '1972-01-06', 'Hindu', 'Perumahan Kori Nuansa II Jimbaran', '081337889673', 'Physical Education'),
(102, 'I Wayan Suparsin, S.Pd., M.Pd.', '1975-11-05', 'Hindu', 'Jl. Tukad Barito No. 21 Denpasar', '087338676520', 'Science Education'),
(103, 'Ni Luh Nurani, S.Pd., M.Pd.', '1978-11-05', 'Hindu', 'Jl. Anyelir No. 20 Denpasar', '089778656009', 'Social Education'),
(104, 'Juan Lee, S. Hum.', '1983-06-17', 'Buddha', 'Jl. Hayam Wuruk No. 8X Denpasar', '085737007449', 'Mandarin'),
(105, 'Lanang Perbawa, S. Kom., M. Kom.', '1985-02-14', 'Hindu', 'Jl. Dewi Sartika Gg. Mawar 5 Kuta', '089766342998', 'Computer Studies'),
(106, 'Ni Luh Jelantik, S.Sn.', '1990-04-15', 'Hindu', 'Jl. Raya Kuta Gg. Tiying Sari III Kuta', '089767898444', 'Art and Craft'),
(107, 'I Wayan Juliarta, S.Pd., M.Pd.', '1989-05-25', 'Hindu', 'Jl. Cendrawasih 15 Denpasar', '087454778990', 'Civic Education'),
(108, 'Ni Made Laksmi, S.S., M.Pd.', '1991-02-20', 'Christian', 'Jl. Pata Sari 2 Kuta', '089998701209', 'Balinese Language'),
(109, 'I Wayan Setiawan, S.Pd., M.Pd.', '1987-06-19', 'Christian', 'Jl. Mekar Jaya Blok B9 Denpasar', '087861972664', 'Moral Education'),
(110, 'I Made Raka Susila, S.Pd., M.Pd.', '1988-08-09', 'Christian', 'Jl. Imam Bonjol Gg. Melasti 2 Denpasar', '089737889621', 'English Language'),
(111, 'Yohanna Supadmi, S.Pd. M.Pd.', '1987-02-19', 'Catholic', 'Jl. Sedap Malam Gg. 2 Denpasar', '089776890912', 'Indonesian Language');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Number` int(10) NOT NULL,
  `adminID` int(10) DEFAULT NULL,
  `adminName` varchar(100) DEFAULT NULL,
  `studentID` int(10) DEFAULT NULL,
  `studentName` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Number`, `adminID`, `adminName`, `studentID`, `studentName`, `password`, `Status`) VALUES
(1, 10001, 'Lovely', NULL, NULL, 'd89f3a35931c386956c1a402a8e09941', 'admin'),
(2, 10002, 'Denny', NULL, NULL, '9103c8c82514f39d8360c7430c4ee557', 'admin'),
(3, NULL, NULL, 15001001, 'Grace Sutasoma', 'd6879f27c23d311890c9918e25595ff0', 'student'),
(4, NULL, NULL, 15001002, 'Mathew Jonas', '45832fe8db892419f97e6f9424de1d6a', 'student'),
(5, NULL, NULL, 15001003, 'Ayu Sasmitha', '855fd135dd8d0d66df1c0a5e5a294ca9', 'student'),
(6, NULL, NULL, 15001004, 'Dewa Gede Brahmayuda', '961c7e3f18e13818f190516eba280ec3', 'student'),
(7, NULL, NULL, 15001005, 'Andre Stephanus', '45bd4fc8e439baf87662a3d18242b743', 'student'),
(8, NULL, NULL, 16001001, 'Murad Hassan', 'c7cbb26f1877886cda88570901487433', 'student'),
(9, NULL, NULL, 16001002, 'Ni Made Swandewi Putri', 'd5038d11ac41c8636c66a5382a6ebefc', 'student'),
(10, NULL, NULL, 16001003, 'Anderson Jaws', 'af727138c259134ad057e3e30cf5a315', 'student'),
(11, NULL, NULL, 16001004, 'Abdul Qodir Jaelani', '42adc8ffeb4635232bd543cb181c94fd', 'student'),
(12, NULL, NULL, 16001005, 'Kadek Gunawan', '737d5bb3615bc7cba873febbe85c4a3f', 'student'),
(13, NULL, NULL, 17001001, 'I Made Budiasa', '827ccb0eea8a706c4c34a16891f84e7b', 'student'),
(14, NULL, NULL, 17001002, 'Natasha Loyard', '3169e1cd32da7be4689e28a40aa914c2', 'student'),
(15, NULL, NULL, 17001003, 'Rael Kertia', 'bda322ec7d855e9971eb45a207353de3', 'student'),
(16, NULL, NULL, 17001004, 'Regis Landegre', '18a25dab1c418417461d58e854a5dad7', 'student'),
(17, NULL, NULL, 17001005, 'Rossaria Septyani', 'b6a0e683fec2a8f463e646f3191d70b7', 'student'),
(18, NULL, NULL, 17001006, 'Kezia Michelle', 'abdd6702cd5a89441d8bf252ac4a0a37', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `class7a`
--
ALTER TABLE `class7a`
  ADD PRIMARY KEY (`Number`),
  ADD KEY `class7a_ibfk_1` (`studentID`);

--
-- Indexes for table `class7b`
--
ALTER TABLE `class7b`
  ADD PRIMARY KEY (`Number`);

--
-- Indexes for table `class8`
--
ALTER TABLE `class8`
  ADD PRIMARY KEY (`Number`);

--
-- Indexes for table `class9`
--
ALTER TABLE `class9`
  ADD PRIMARY KEY (`Number`);

--
-- Indexes for table `marks7a`
--
ALTER TABLE `marks7a`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `marks7a_ibfk_1` (`studentID`);

--
-- Indexes for table `marks7b`
--
ALTER TABLE `marks7b`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `marks8`
--
ALTER TABLE `marks8`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `marks9`
--
ALTER TABLE `marks9`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `schedule7a`
--
ALTER TABLE `schedule7a`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `schedule7a_ibfk_1` (`Period 1`),
  ADD KEY `schedule7a_ibfk_2` (`Period 2`),
  ADD KEY `schedule7a_ibfk_3` (`Period 3`),
  ADD KEY `schedule7a_ibfk_4` (`Period 4`),
  ADD KEY `schedule7a_ibfk_5` (`Period 5`);

--
-- Indexes for table `schedule7b`
--
ALTER TABLE `schedule7b`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Period 1` (`Period 1`),
  ADD KEY `Period 2` (`Period 2`),
  ADD KEY `Period 3` (`Period 3`),
  ADD KEY `Period 4` (`Period 4`),
  ADD KEY `Period 5` (`Period 5`);

--
-- Indexes for table `schedule8`
--
ALTER TABLE `schedule8`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Period 1` (`Period 1`),
  ADD KEY `Period 2` (`Period 2`),
  ADD KEY `Period 3` (`Period 3`),
  ADD KEY `Period 4` (`Period 4`),
  ADD KEY `Period 5` (`Period 5`);

--
-- Indexes for table `schedule9`
--
ALTER TABLE `schedule9`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Period 1` (`Period 1`),
  ADD KEY `Period 2` (`Period 2`),
  ADD KEY `Period 3` (`Period 3`),
  ADD KEY `Period 4` (`Period 4`),
  ADD KEY `Period 5` (`Period 5`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `teachers_ibfk_1` (`subject`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Number`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `studentName` (`studentName`),
  ADD KEY `adminID` (`adminID`),
  ADD KEY `adminName` (`adminName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10003;
--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `class7a`
--
ALTER TABLE `class7a`
  MODIFY `Number` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `class7b`
--
ALTER TABLE `class7b`
  MODIFY `Number` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `class8`
--
ALTER TABLE `class8`
  MODIFY `Number` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `class9`
--
ALTER TABLE `class9`
  MODIFY `Number` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `marks7a`
--
ALTER TABLE `marks7a`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `marks7b`
--
ALTER TABLE `marks7b`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `marks8`
--
ALTER TABLE `marks8`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `marks9`
--
ALTER TABLE `marks9`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `schedule7a`
--
ALTER TABLE `schedule7a`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `schedule7b`
--
ALTER TABLE `schedule7b`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `schedule8`
--
ALTER TABLE `schedule8`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `schedule9`
--
ALTER TABLE `schedule9`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17001007;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Number` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
