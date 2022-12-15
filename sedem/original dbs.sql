-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2017 at 04:02 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

create database `sedem_internship`;
use `sedem_internship`;

--
-- Database: `sedem`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_company_advert`
--

CREATE TABLE `apply_company_advert` (
  `id` int(11) NOT NULL,
  `company_id` varchar(20) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `student_email` varchar(225) NOT NULL,
  `student_telephone` varchar(20) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `company_post_adverts_id` varchar(20) NOT NULL,
  `c_image` varchar(255) NOT NULL,
  `c_docx` varchar(255) NOT NULL,
  `c_pdf` varchar(255) NOT NULL,
  `ac_status` int(11) NOT NULL,
  `ac_doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply_company_advert`
--

INSERT INTO `apply_company_advert` (`id`, `company_id`, `student_id`, `student_email`, `student_telephone`, `duration`, `company_post_adverts_id`, `c_image`, `c_docx`, `c_pdf`, `ac_status`, `ac_doe`) VALUES
(1, '34451342', '10475652', 'daviddjan04@gmail.com', '233275801226', '', '1', 'ghana.jpeg', '', '', 4, '2017-04-21 00:23:36'),
(2, '34451342', '10475652', 'daviddjan04@gmail.com', '0275801226', '', '1', 'ghana.jpeg', '', '', 4, '2017-04-21 01:20:46'),
(3, '34451342', '10475652', 'daviddjan04@gmail.com', '233209061668', '', '1', 'ghana.jpeg', '', '', 4, '2017-04-21 01:34:06'),
(4, '59192556', '10475652', 'daviddjan04@gmail.com', '233275801226', '', '2', 'ghana.jpeg', '', '', 4, '2017-04-21 13:47:03'),
(5, '27441287', '14567845', 'celestinaapenkro@gmail.com', '233275801226', '', '6', 'davooo.jpg', '', '', 4, '2017-04-25 16:17:54'),
(6, '27441287', '10485657', 'juliusludu@gmail.com', '233243685759', '', '6', 'sample letter.png', '', '', 0, '2017-04-25 19:35:02'),
(7, '22837497', '10475652', 'daviddjan04@gmail.com', '233549565568', '', '11', 'Penguins.jpg', '', '', 4, '2017-04-26 00:05:04'),
(8, '22837497', '10475652', 'daviddjan04@gmail.com', '233549565568', '', '11', 'Penguins.jpg', '', '', 5, '2017-04-26 00:04:33'),
(9, '22837497', '10475652', 'daviddjan04@gmail.com', '', '', '11', '', '', '', 0, '2017-04-26 00:03:45'),
(10, '43376132', '10485217', 'ritakwanu@ymail.com', '23354', '', '12', '', '', '', 0, '2017-04-26 01:33:56'),
(11, '43376132', '10485217', 'ritakwanu@ymail.com', '233549565568', '', '12', '240_F_134776695_QCueSIEdnA6xnqaSuY5UeJsy8ckl5ufL.jpg', '', '', 0, '2017-04-26 01:34:13'),
(12, '34451342', '10475652', 'daviddjan04@gmail.com', '', '', '1', '', '', '', 0, '2017-05-23 12:21:03'),
(13, '34451342', '10475652', 'daviddjan04@gmail.com', '', '', '1', '', '', '', 0, '2017-05-23 12:22:46'),
(14, '34451342', '10475652', 'daviddjan04@gmail.com', '', '', '1', '', '10475652_1495542762.', '10475652_1495542762.', 0, '2017-05-23 12:32:41'),
(15, '34451342', '10475652', 'daviddjan04@gmail.com', '', '', '1', '', '10475652_1495542836.', '10475652_1495542836.', 0, '2017-05-23 12:33:55'),
(16, '34451342', '10475652', 'daviddjan04@gmail.com', '', '', '1', '10475652_1495542972.pdf', '10475652_1495542972.', '10475652_1495542972.', 0, '2017-05-23 12:36:11'),
(17, '34451342', '10475652', 'daviddjan04@gmail.com', '', '', '1', '10475652_1495543025.pdf', '10475652_1495543025.', '10475652_1495543025.', 0, '2017-05-23 12:37:05'),
(18, '34451342', '10475652', 'daviddjan04@gmail.com', '', '', '1', '10475652_1495543089.jpg', '10475652_1495543089.docx', '10475652_1495543089.pdf', 0, '2017-05-23 12:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `apply_department_advert`
--

CREATE TABLE `apply_department_advert` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `dept_id` varchar(20) NOT NULL,
  `student_email` varchar(225) NOT NULL,
  `student_telephone` varchar(20) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `department_post_adverts_id` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `docx` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `ad_status` varchar(20) NOT NULL,
  `ad_doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply_department_advert`
--

INSERT INTO `apply_department_advert` (`id`, `student_id`, `dept_id`, `student_email`, `student_telephone`, `duration`, `department_post_adverts_id`, `image`, `docx`, `pdf`, `ad_status`, `ad_doe`) VALUES
(1, '10475652', '12345678', 'daviddjan04@gmail.com', '233275801226', '', '1', 'davooo.jpg', '', '', '4', '2017-04-21 10:49:58'),
(2, '10496566', '12345678', 'ahiavor44@gmail.com', '233249452602', '', '7', 'sampleletter2.png', '', '', '4', '2017-04-25 17:23:16'),
(4, '10475653', '12345678', 'rebeccapayne@gmail.com', '', '', '1', '10475653_1495545770.jpg', '10475653_1495545770.docx', '10475653_1495545770.pdf', '', '2017-05-23 13:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `com_id` varchar(10) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `work_phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `about` longtext,
  `date_of_registration` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reg_ref_number` varchar(255) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `app_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`com_id`, `company_name`, `region`, `work_phone`, `email`, `website`, `about`, `date_of_registration`, `reg_ref_number`, `pin`, `status`, `app_status`) VALUES
('11397617', 'MY APP CITY', 'WESTERN REGION', '233275801226', 'appcity@ymail.com', 'myappcity.com', 'WE BUILD ANDROID APPS OF ALL KINDS.', '2017-04-25 15:28:03', '149637', '14596', '1', '4'),
('22837497', 'MAJOR NETWORKING FIRMS', 'WESTERN REGION', '233275801226', 'majornet@gmail.com', 'majornet.com', 'WE DEAL IN ALL KINDS OF TOOLS FOR NETWORKING AND FOR YOUR COMPUTING DEVICES.', '2017-04-26 00:06:51', '2233445', '78452', '1', '4'),
('24934614', 'asdasdf', 'jkbkjb', '024656384', '', '', '', '2017-04-26 01:28:38', 'hbj468', '12365', '1', '4'),
('27441287', 'MULTICORP MULTIMEDIA', 'ASHANTI REGION', '233275801226', 'multicorp@gmail.com', 'multicorp.com', 'WE BUILD WEBSITES AND ANIMATION FOR PROJECTS.', '2017-04-25 15:45:38', '120345', '36521', '1', '4'),
('27524773', 'MASLINE FOUNDATION', 'WESTERN REGION', '233209061668', 'maslinefoundation@gmail.com', 'maslinefoundation.com', 'THE HELPLESS AND NEEDY ONES ARE OUR PRIORITY. JOIN US BRIGHTEN THE FACE OF A HELPLESS CHILD.', '2017-04-25 15:33:15', '471236', '25436', '1', '4'),
('34451342', 'MAJOR FIRMS AND FOUNDATION', 'Central Region', '233275801226', 'major12345@gmail.com', 'mikebien.com', 'WE ARE HERE FOR YOU !', '2017-04-22 17:48:20', '11111', '11111', '1', '4'),
('35978796', 'I.T SOLUTIONS', 'Central Region', '233275801226', 'itsolutions@ymail.com', 'itsolutions.org', 'WE OFFER I.T TRAINING SERVICES RANGING FROM NETWORKING,  PROGRAMMING, DATABASE AND MULTIMEDIA DESIGN. ENROLL FOR QUALITY TUITION.', '2017-04-25 19:02:22', '784563', '78523', '1', '5'),
('37737448', 'DAPAT COMPUTING SYSTEMS', 'UPPER WEST', '233209061668', 'dapat@gmail.com', 'dapat.com', 'WE MAKE AVAILABLE FOR YOU ALL COMPUTING SYSTEMS OF YOUR KIND !!!', '2017-04-26 11:50:50', '809010', '85246', '1', '4'),
('43376132', 'INTERNSHIP HUB', 'GREATER ACCRA', '233275801226', 'internshiphub@gmail.com', 'internshiphub.com', 'WE OFFER INTERNSHIP OPPORTUNITIES TO STUDENTS.\r\nWITH INTERNSHIP HUB ; YOUR PLACE OF INTERNSHIP IS SECURED !!!', '2017-04-26 01:29:44', '4578963', '12589', '1', '4'),
('45346198', 'AGYA ADU COMPANIES & SONS ENGINEERING LIMITED', 'ASHANTI REGION', '233275801226', 'agyasons@gmail.com', 'agyalimited.com', 'WE OFFER TRAINING IN ALL ENGINEERING FIELDS. \r\nCOME AND ACQUIRE SKILLS FOR YOUR FUTURE MAKE - UP.', '2017-04-24 22:26:40', '457961', '24637', '1', ''),
('45883494', 'KINGS FOUNDATION', 'UPPER EAST', '233275801226', 'kings@gmail.com', 'Kings.com', 'WE OFFER AVAILABLE SERVICES !!!', '2017-04-22 18:00:02', '55555', '20017', '1', '4'),
('47746854', 'ISHFERNA SOLUTIONS', 'ASHANTI REGION', '233275801226', 'ishferna@gmail.com', 'ishferna.com', 'WE PROVIDE ALL KINDS OF SOLUTIONS TO YOUR I.T PROBLEMS. WE ARE LOCATED AT KORLE-BU . CONTACT U FOR YOUR COMPUTER HARDWARE AND SOFTWARE  REPAIRS.', '2017-04-24 15:25:28', '124589', '35942', '1', ''),
('51119678', 'ABIDORF I.T SERVICES', 'ASHANTI REGION', '233240489668', 'abidorf@ymail.com', 'abidorf.com', 'WE OFFER STUDENTS WITH WITH ALL KINDS OF I.T TRAINING. WE ARE LOCATED AT OFANKOR BARRIER INSIDE KASOA.', '2017-04-24 14:10:36', '307189', '54478', '1', ''),
('54342436', 'G & J TECHNICAL SERVICES', 'ASHANTI REGION', '2335801226', 'gj10003@gmail.com', 'gj10003.com', 'WE OFFER COMPUTER REPAIRS, AND BUILD IOS SYSTEMS.\r\nG & J TECHNICAL ; WE GOT YOUR ISSUES SOLVED !!!', '2017-04-25 08:05:21', '478512', '48956', '1', ''),
('58112967', 'FRENTIC DESIGNS AND MULTIMEDIA', 'UPPER WEST', '2335801226', 'frentic@gmail.com', 'frentic.com', 'WE PROVIDE A VARIETY OF TRAINING FOR STUDENTS WHO WANT TO MASTER MULTIMEDIA AND DESIGN.', '2017-04-24 13:47:43', '426958', '96587', '1', ''),
('58537443', 'MIBIEN TRANSPORT BUSINESS', 'eastern region', '233249452602', 'micheal@gmail.com', 'michealbienu.com', 'WE TAKE YOU WHERE EVER YOU WANT TO GO AT YOUR COMFORT.\r\nVERY SAFETY AND AFFORDABLE !!!', '2017-04-24 14:14:02', '467853', '96547', '1', ''),
('59192556', 'MAJOR AND FRIENDS', 'Central Region', '23327119929', 'major12345@gmail.com', 'mikebien.com', 'WE ARE HERE FOR YOU!', '2017-04-24 13:17:54', '114477', '12345', '1', '4'),
('61858867', 'MINISTRY OF FOOD & AGRIC', 'GREATER ACCRA', '233209061668', 'mofa123@gmail.com', 'mofa.com', 'Our agriculture is safe !!!', '2017-04-24 13:18:01', '702010', '84265', '1', ''),
('62225852', 'ADDI-CARE PRODUCTS', 'VOLTA REGION', '233275801226', 'addicare@gmail.com', 'addicare.com', 'WE DEAL IN ALL KINDS OF ARDUINO PRODUCTS FOR YOUR PROJECTS AND STUDIES. ADDI-CARE; YOU ARE AT THE SAFE PLACE !!!', '2017-04-24 22:05:18', '123456', '12587', '1', ''),
('65387536', 'FRANCO ENTERPRISE', 'GREATER ACCRA', '233546365020', 'francogh@gmail.com', 'franco.com', 'WE DEAL IN ALL FORMS OF COMPUTING SYSTEMS SUITABLE FOR A COMPANY SET - UP.', '2017-04-24 13:57:51', '423178', '74968', '1', ''),
('67254881', '3D INCORPORATION', 'GREATER ACCRA', '233576353510', '3dincorp@gmail.com', '3dincorporation.com', 'WE OFFER NETWORKING SERVICES . TRAINING IN PROGRAMING & WEB SECURITY TECHNOLOGIES. WE GOT YOU ANYTIME !!!', '2017-04-24 14:54:06', '200300', '50010', '1', ''),
('71499632', 'TAFFS ADVERTISEMENT', 'VOLTA REGION', '233574959522', 'taffs@gmail.com', 'taffs.com', 'WE ADVERTISE YOUR PRODUCT FOR YOU AT AN AFFORDABLE PRICE.\r\nTAFFS ADVERTISEMENT ; YOUR PRODUCTS ARE SAFE IN THE HANDS OF A GOOD ADVERTISER.', '2017-04-24 22:10:13', '456328', '85423', '1', ''),
('77319993', 'DREAM PHOTOGRAPHY GH', 'GREATER ACCRA', '233576370760', 'dreamphotographygh@gmail.com', 'dreamphotography.com', 'WE SERVE YOU WITH ALL THE BEST KINDS AND TYPES OF DESIGNS AND OFFER TRAINING IN PHOTOSHOP', '2017-04-25 15:34:31', '564789', '74523', '1', '4'),
('77866236', 'JULIUS NETWORKING SYSTEMS', 'ASHANTI REGION', '233243685759', 'mccyconsult@gmail.com', 'juliusenterprise.ug.edu.gh', 'WE PROVIDE YOU WITH ALL KINDS OF NETWORKING DEVICE AND SKILL NEEDED TO BE A GOOD COMPUTER NETWORKER.', '2017-04-24 13:15:56', '769423', '76143', '1', ''),
('82952328', 'SIVLEK CLOTHING PRODUCTIONS', 'Central Region', '233275801226', 'sivlekdoku@gmail.com', 'sivlekclothing.com', 'WE HAVE ALL KINDS AND TYPES OF CLOTHING FOR YOU !!!', '2017-04-24 13:18:10', '28730', '45612', '1', ''),
('84592943', 'EDICOM MULTIMEDIA', 'GREATER ACCRA', '233209061668', 'edicom@gmail.com', 'edicom.org', 'WE ARE INTO PHOTOGRAPHY, WEBSITE DESIGN AND PROGRAMMING.\r\nCONTACT US FOR YOUR WEBSITE DESIGNS,PROGRAMMING TUTORIALS AND PHOTO SHOOTS.', '2017-04-25 00:34:04', '104789', '89546', '1', ''),
('85989392', 'KEPLIX NETWORKING FIRM', 'WESTERN REGION', '233209061668', 'keplixnetworking@gmail.com', 'keplix.com', 'WE OFFER STUDENTS WITH INTENSE NETWORKING SKILLS FOR A BETTER FUTURE.', '2017-04-25 10:53:41', '451289', '12548', '1', ''),
('86442936', 'DANNYBEMS PROGRAMMING CENTRE', 'UPPER EAST', '233573305353', 'dannybems@gmail.com', 'danny.com', 'WE OFFER TRAINING TO STUDENTS WHO WANT TO MASTER THEIR PROGRAMMING SKILLS AND TO THOSE WHO WANT TO LEARN PROGRAMMING.', '2017-04-24 23:05:04', '127895', '12439', '1', ''),
('88417614', 'MIBIEN PICK UP SERVICES', 'VOLTA REGION', '233249452602', 'mibien@ymail.com', 'mibien.com', 'WE CARRY YOU EVERYWHERE AT YOUR OWN CONVENIENCE !!!', '2017-04-24 12:00:46', '809010', '91735', '1', ''),
('92415355', 'MAUDREY MUSIC SCHOOL', 'VOLTA REGION', '233208563170', 'maudrey@gmail.com', 'maudrey2010.com', 'WE TRAIN PEOPLE WHO WANT TO LEARN MUSIC AND BECOME THE BEST IN THAT FIELD.\r\nWITH MAUDREY : YOU ARE THE BEST !!!', '2017-04-25 11:00:01', '147856', '12356', '1', ''),
('95923823', 'PEARLS FOUNDATION', 'GREATER ACCRA', '233573107827', 'pearlfoundation@gmail.com', 'pearlsfoundation.com', 'WE TEACH AND RAISE THE YOUTH  TO BECOME BETTER CITIZENS OF THEIR COUNTRY AND BEYOND.\r\nPEARL FOUNDATION : YOUR DREAM COME TRUE !!!', '2017-04-25 07:58:23', '458967', '45213', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `company_post_adverts`
--

CREATE TABLE `company_post_adverts` (
  `id` int(11) NOT NULL,
  `company_id` varchar(20) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_details` longtext,
  `deadline` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_post_adverts`
--

INSERT INTO `company_post_adverts` (`id`, `company_id`, `job_title`, `job_details`, `deadline`, `doe`) VALUES
(1, '34451342', 'NSS STUDENTS NEEDED !!!', 'We need people for placement to work as the secretary for Akuffo Addo.', '2017-05-28', '2017-05-23 12:11:03'),
(2, '59192556', 'NETWORKING STUDENTS NEEDED!', 'Major and Friends company needs students who are good in networking to come and offer a 3 year period of training.', '2017-05-24', '2017-05-23 13:51:55'),
(3, '34451342', 'SHIPPING SERVICE !!!', 'We need students to work on the port to help in shipping activities.\r\nCome and apply.', '2017-04-25', '2017-04-22 19:03:27'),
(4, '34451342', 'SHIPPING SERVICE !!!', 'We need students to work on the port to help in shipping activities.\r\nCome and apply.', '2017-04-25', '2017-04-22 19:03:35'),
(5, '27441287', 'PROGRAMMERS NEEDED!!!', 'Students who are interested in learning any programming language can apply with their CV''s for immediate training.', '2017-04-30', '2017-04-25 16:11:24'),
(6, '27441287', 'PROGRAMMERS NEEDED!!!', 'Students who are interested in learning any programming language can apply with their CV''s for immediate training.', '2017-04-30', '2017-04-25 16:11:29'),
(7, '22837497', 'URGENT NOTICE !!!', 'Students who are interested in learning networking should endeavor to apply for a quick intensive two weeks training.', '2017-04-28', '2017-04-25 18:52:29'),
(12, '43376132', 'qqqqqqqqqqqqq', 'sdfs dg', '2017-04-27', '2017-04-26 01:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_id` varchar(255) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_id`, `dept_name`, `doe`) VALUES
(1, '1234578', 'COMPSSA', '2017-04-20 23:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `department_post_adverts`
--

CREATE TABLE `department_post_adverts` (
  `id` int(11) NOT NULL,
  `department_id` varchar(20) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_details` longtext,
  `deadline` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `company_tel` varchar(255) NOT NULL,
  `company_website` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_post_adverts`
--

INSERT INTO `department_post_adverts` (`id`, `department_id`, `job_title`, `job_details`, `deadline`, `company_name`, `company_email`, `company_address`, `company_tel`, `company_website`, `doe`) VALUES
(1, '12345678', 'STUDENTS NEEDED FOR T.A''s', 'Student would be required to act as teaching assistants to help lecturers in the department. If you are interested please see the department secretary.', '2017-05-28', 'COMPUTER SCIENCE DEPARTMENT', 'compssa@ug.edu.gh', 'P.O.BOX 84, LEGON', '0243289281', 'compssa.com', '2017-05-23 13:03:33'),
(2, '12345678', 'URGENT NOTICE !!!', 'Students who want to offer internship at the PORT should kindly send their CV''s  to the mail attached to this message.', '2017-05-26', 'PORT HARBOUR CORPORATION', 'daviddjan04@gmail.com', 'P.O.BOX 84, ACCRA', '0201122334', 'major1.org', '2017-05-23 13:58:01'),
(3, '12345678', 'URGENT NOTICE !!!', 'Students are needed are the Harbour.', '2017-04-28', 'PORT HARBOUR CORPORATION', 'daviddjan04@gmail.com', 'P.O.BOX 1690, ACCRA', '0201122334', 'major1.org', '2017-04-25 16:27:46'),
(4, '12345678', 'INTERNSHIP OO ! INTERNSHIP !', 'A reputable company is seeking to offer internship opportunities to students in the department.\r\nApply if interested', '2017-04-27', 'GEM FOUNDATION', 'daviddjan04@gmail.com', 'P.O.BOX 84, LEGON', '233264578541', 'gem.com', '2017-04-25 16:31:42'),
(5, '12345678', 'YOU ARE NEEDED !!!', 'The department is seeking to offer students with the opportunity of working in the HOD office as a secretary during this summer break.\r\nSee the secretary if interested.', '2017-04-28', 'COMPUTER SCIENCE DEPARTMENT', 'compssa@ug.edu.gh', 'P.O.BOX 84, LEGON', '0201122334', 'compssa.com', '2017-04-25 16:34:13'),
(6, '12345678', 'APP DEVELOPMENT TRAINING', 'A reputable company is seeking for student to train them in application development on all platforms for an upcoming project during this summer break.', '2017-04-28', 'MYAPP.Com', 'myapp23@ymail.com', 'P.O.BOX 1691, ACCRA', '233264578541', 'myapp.com', '2017-04-25 16:36:45'),
(7, '12345678', 'ARE YOU READY ?', 'Do you need some programming Skills? Are you ready to spend your summer break learn how to code in any language, then DECODERS got you this summer.\r\nRate is FREE.', '2017-04-28', 'DECODERS UNIT', 'decoder213@gmail.com', 'P.O.BOX 84, ACCRA', '0201122334', 'decoders.com', '2017-04-25 16:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_details` longtext,
  `posted_by` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_title`, `news_details`, `posted_by`, `start_date`, `end_date`, `image`, `doe`) VALUES
(1, 'VACATION TRIP !', 'There is going to be a vacation trip to the Independence Square ...... Stay put !!!', 'MAJOR', '2017-04-21', '2017-05-1', 'ghana.jpeg', '2017-05-01 07:46:17'),
(2, 'PROJECT DEFENSE', 'There defense for the final year student comes off on the 25th - 26th of April 2017.\r\nAll students should be prepared and come along on time to do a proper presentation.\r\nTHANK YOU !!!', 'MARK ATTAH', '2017-04-25', '2017-05-28', 'IMG_23740749948647.jpeg', '2017-05-01 07:56:03'),
(3, 'OPENING CEREMONY', 'There is going to be an opening of the newly completed computer science building.Amongst many that would be present at the ceremony includes the Head of the Computer Science department and the Vice Chancellor for the University of Ghana...\r\nNB; ALL STUDENTS OF THE DEPARTMENT MUST ENDEAVOR TO BE PRESENT AT THE CEREMONY', 'MADAM JEMIMA', '2017-04-25', '2017-05-28', '', '2017-05-01 08:04:18'),
(4, 'OPENING CEREMONY', 'There is going to be an opening of the newly completed computer science building.Amongst many that would be present at the ceremony includes the Head of the Computer Science department and the Vice Chancellor for the University of Ghana...\r\nNB; ALL STUDENTS OF THE DEPARTMENT MUST ENDEAVOR TO BE PRESENT AT THE CEREMONY', 'MADAM JEMIMA', '2017-04-25', '2017-05-28', '', '2017-05-01 08:04:24'),
(5, 'ANDRIOID APP DEVELOPMENT TRAINING', 'There is going to be a two days intensive training on how to develop android  applications and IOS applications at the software lab.\r\nRATE is FREE ; Hence all must endeavor to be there.', 'MADAM JEMIMA', '2017-04-25', '2017-05-27', 'img3.jpg', '2017-05-01 08:04:31'),
(6, 'ANDRIOID APP DEVELOPMENT TRAINING', 'There is going to be a two days intensive training on how to develop android  applications and IOS applications at the software lab.\r\nRATE is FREE ; Hence all must endeavor to be there.', 'MADAM JEMIMA', '2017-04-25', '2017-05-27', 'img3.jpg', '2017-05-01 08:04:39'),
(7, 'TEACHING ASSISTANTS NEEDED.', 'All level 400 students who are interested in offering national service at the department as teaching assistants should see the department Librarian and put down their names.\r\nTHANK YOU !', 'MADAM JEMIMA', '2017-04-25', '2017-05-30', '+2332057620160620_173028.jpg', '2017-05-01 09:40:46'),
(8, 'URGENT NOTICE !!!', 'All level 400 students offering INFORMATION TECHNOLOGY  are supposed to meet the Head of Department come tomorrow; 26th April, 2017 at the IBM LAB for an important session.', 'LIBRARIAN', '2017-04-25', '2017-05-26', '', '2017-05-01 08:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_department` varchar(255) NOT NULL,
  `student_program` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `student_id`, `student_name`, `student_department`, `student_program`, `student_email`, `pin`, `image`, `status`, `doe`) VALUES
(1, '10475652', 'DJAN DAVID NII DODOO', 'DEPARTMENT OF COMPUTER SCIENCE', 'COMPUTER SCIENCE', 'daviddjan04@gmail.com', '35557', '', '3', '2017-04-25 13:41:49'),
(2, '10465735', 'EMMANUEL KIPI', 'DEPARTMENT OF COMPUTER SCIENCE', 'INFORMATION TECHNOLOGY', 'emmakipi34@gmail.com', '14785', '', '3', '2017-04-25 13:14:44'),
(3, '10496566', 'JOHNSON AHIAVOR', 'DEPARTMENT OF COMPUTER SCIENCE', 'COMPUTER SCIENCE', 'ahiavor44@gmail.com', '35558', '', '3', '2017-04-25 13:16:33'),
(4, '14567845', 'CELESTINA APENKRO', 'DEPARTMENT OF COMPUTER SCIENCE', 'INFORMATION TECHNOLOGY', 'celestinaapenkro@gmail.com', '47116', '', '3', '2017-04-25 13:41:20'),
(5, '10475653', 'REBECCA PAYNE', 'DEPARTMENT OF COMPUTER SCIENCE ', 'INFORMATION TECHNOLOGY', 'rebeccapayne@gmail.com', '35411', '', '3', '2017-04-25 13:41:34'),
(6, '10485657', 'MR. JULIUS LUDU', 'DEPARTMENT OF COMPUTER SCIENCE', 'INFORMATION TECHNOLOGY', 'juliusludu@gmail.com', '11154', '', '3', '2017-04-25 19:33:32'),
(7, '10548741', 'CAIAPHAS APPIAH', 'DEPARTMENT OF COMPUTER SCIENCE ', 'INFORMATION TECHNOLOGY ', 'caiahas1123@gmail.com', '48965', '', '3', '2017-04-25 13:43:28'),
(8, '10458753', 'ABDUL MALIK YAWSON', 'DEPARTMENT OF COMPUTER SCIENCE', 'INFORMATION TECHNOLOGY', 'malikyawson@gmail.com', '49235', '', '3', '2017-04-25 13:51:13'),
(9, '10485217', 'RITA KWANU', 'DEPARTMENT OF COMPUTER SCIENCE', 'INFORMATION TECHNOLOGY', 'ritakwanu@ymail.com', '41023', '', '3', '2017-04-25 13:54:36'),
(10, '10495478', 'OPOKU AMOAKO', 'DEPARTMENT OF COMPUTER SCIENCE', 'COMPUTER SCIENCE', 'opokuamoako@gmail.com', '41174', '', '3', '2017-04-25 13:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `access_level` varchar(20) NOT NULL,
  `app_status` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pin`, `access_level`, `app_status`, `doe`) VALUES
(1, '12345678', '12345', '2', '', '2017-04-20 23:47:18'),
(2, '10475652', '35557', '3', '', '2017-04-20 23:50:58'),
(3, '34451342', '11111', '1', '4', '2017-04-22 17:49:35'),
(4, '59192556', '12345', '1', '4', '2017-04-21 13:38:21'),
(5, '45883494', '20017', '1', '4', '2017-04-22 18:00:02'),
(6, '88417614', '91735', '1', '', '2017-04-24 12:00:46'),
(7, '37737448', '85246', '1', '4', '2017-04-26 00:08:19'),
(8, '61858867', '84265', '1', '', '2017-04-24 12:17:25'),
(9, '82952328', '45612', '1', '', '2017-04-24 12:51:41'),
(10, '22837497', '78452', '1', '4', '2017-04-25 15:30:16'),
(11, '77866236', '76143', '1', '', '2017-04-24 13:15:56'),
(12, '77319993', '74523', '1', '4', '2017-04-25 15:34:31'),
(13, '58112967', '96587', '1', '', '2017-04-24 13:47:43'),
(14, '65387536', '74968', '1', '', '2017-04-24 13:57:51'),
(15, '51119678', '54478', '1', '', '2017-04-24 14:10:36'),
(16, '58537443', '96547', '1', '', '2017-04-24 14:14:02'),
(17, '35978796', '78523', '1', '4', '2017-04-25 19:02:22'),
(18, '67254881', '50010', '1', '', '2017-04-24 14:54:05'),
(19, '47746854', '35942', '1', '', '2017-04-24 15:25:28'),
(20, '62225852', '12587', '1', '4', '2017-05-02 17:49:16'),
(21, '71499632', '85423', '1', '', '2017-04-24 22:10:13'),
(22, '45346198', '24637', '1', '', '2017-04-24 22:26:40'),
(23, '86442936', '12439', '1', '', '2017-04-24 23:05:04'),
(24, '11397617', '14596', '1', '4', '2017-04-25 15:28:03'),
(26, '84592943', '89546', '1', '', '2017-04-25 00:34:04'),
(27, '43376132', '12589', '1', '4', '2017-04-26 00:10:00'),
(28, '27524773', '25436', '1', '4', '2017-04-25 15:33:15'),
(29, '95923823', '45213', '1', '', '2017-04-25 07:58:23'),
(30, '54342436', '48956', '1', '', '2017-04-25 08:05:21'),
(31, '85989392', '12548', '1', '', '2017-04-25 10:53:41'),
(32, '92415355', '12356', '1', '', '2017-04-25 11:00:01'),
(33, '10465735', '14785', '3', '', '2017-04-25 13:18:18'),
(34, '10496566', '35558', '3', '', '2017-04-25 13:19:53'),
(35, '14567845', '47116', '3', '', '2017-04-25 13:24:00'),
(36, '10475653', '35411', '3', '', '2017-04-25 13:26:39'),
(37, '10485657', '11154', '3', '', '2017-04-25 13:33:13'),
(38, '10548741', '48965', '3', '', '2017-04-25 13:44:35'),
(39, '10458753', '49235', '3', '', '2017-04-25 13:51:46'),
(40, '10485217', '41023', '3', '', '2017-04-25 13:55:35'),
(41, ' 10495478', '41174', '3', '', '2017-04-25 13:58:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply_company_advert`
--
ALTER TABLE `apply_company_advert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply_department_advert`
--
ALTER TABLE `apply_department_advert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `company_post_adverts`
--
ALTER TABLE `company_post_adverts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_post_adverts`
--
ALTER TABLE `department_post_adverts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply_company_advert`
--
ALTER TABLE `apply_company_advert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `apply_department_advert`
--
ALTER TABLE `apply_department_advert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `company_post_adverts`
--
ALTER TABLE `company_post_adverts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `department_post_adverts`
--
ALTER TABLE `department_post_adverts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
