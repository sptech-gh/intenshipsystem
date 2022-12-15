-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 02:33 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sedem_internship`
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
  `commence_date` varchar(255) NOT NULL,
  `int_status` varchar(255) NOT NULL,
  `ac_doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply_company_advert`
--

INSERT INTO `apply_company_advert` (`id`, `company_id`, `student_id`, `student_email`, `student_telephone`, `duration`, `company_post_adverts_id`, `c_image`, `c_docx`, `c_pdf`, `ac_status`, `commence_date`, `int_status`, `ac_doe`) VALUES
(1, '34451342', '10475652', 'sedempee@gmail.com', '', '', '1', '10475652_1524224937.jpg', '10475652_1524224937.', '10475652_1524224937.', 0, '2018-05-01', 'on-going', '2018-05-24 11:58:48'),
(2, '15697472', '14140009', 'prince@gmail.com', '0543228227', '', '2', '14140009_1524229386.', '14140009_1524229386.', '14140009_1524229386.', 4, '2018-06-20', 'on-going', '2018-04-20 13:03:45'),
(3, '15697472', '14140010', 'prof@gmail.com', '0543228227', '', '3', '14140010_1524232098.', '14140010_1524232098.', '14140010_1524232098.', 0, '2018-05-31', 'on-going', '2018-05-24 12:04:11'),
(4, '15697472', '14140009', 'prince@gmail.com', '', '', '3', '14140009_1524760681.', '14140009_1524760681.', '14140009_1524760681.', 4, '', 'on-going', '2018-05-24 12:08:14'),
(5, '15697472', '14140009', 'prince@gmail.com', '', '', '2', '14140009_1526560488.', '14140009_1526560488.pdf', '14140009_1526560488.', 4, '', 'on-going', '2018-05-24 12:04:30'),
(6, '15697472', '14140025', 'sedempee@gmail.com', '', '', '2', '14140025_1526561039.', '14140025_1526561039.', '14140025_1526561039.pdf', 0, '2018-05-31', 'on-going', '2018-05-24 11:58:57'),
(7, '15697472', '12345987', 'kingicon05@gmail.com', '233549565568', '', '2', '12345987_1527163984.', '12345987_1527163984.', '12345987_1527163984.', 5, '2018-05-25', 'on-going', '2018-05-24 12:32:23');

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
(1, '14140009', '12345678', 'prince@gmail.com', '0543228227', '', '2', '14140009_1524227553.', '14140009_1524227553.', '14140009_1524227553.', '4', '2018-04-20 13:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `company_id` varchar(255) NOT NULL,
  `complain` longtext,
  `posted_by` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `student_id`, `company_id`, `complain`, `posted_by`, `doe`) VALUES
(1, '14140009', '34451342', 'hello Sir', '14140009', '2018-04-20 13:01:36'),
(2, '14140009', '15697472', 'Hello Sir', '14140009', '2018-04-20 13:05:59'),
(3, '14140009', '15697472', 'How are you doing?', '14140009', '2018-04-20 13:06:13'),
(4, '14140009', '15697472', 'hello  Prince', '15697472', '2018-04-20 13:07:16'),
(5, '14140009', '15697472', 'I am fine', '15697472', '2018-04-20 13:07:27'),
(6, '14140009', '', 'hello Sir', '14140009', '2018-05-17 10:13:44');

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
  `image` varchar(255) NOT NULL,
  `app_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`com_id`, `company_name`, `region`, `work_phone`, `email`, `website`, `about`, `date_of_registration`, `reg_ref_number`, `pin`, `status`, `image`, `app_status`) VALUES
('11397617', 'MY APP CITY', 'WESTERN REGION', '233275801226', 'appcity@ymail.com', 'myappcity.com', 'WE BUILD ANDROID APPS OF ALL KINDS.', '2017-04-25 15:28:03', '149637', '14596', '1', '', '4'),
('15476786', 'Solve IT', 'Greater Accra', '0543228227', 'sedempee@gmail.com', '', 'We solve all you IT related problems. Call us now', '2018-05-17 12:13:28', '15476786', '12345', '1', 'photo.jpg', '4'),
('15697472', 'HOTJOBS AFRICA', 'Greater Accra', '0543228227', 'sedempee@gmail.com', 'www.hotjobsafrica.org', 'Your no1 HR, Recruitment and Outsourcing Partner', '2018-04-20 12:23:23', '15697472', '11111', '1', 'hotlogo.JPG', '4'),
('22837497', 'MAJOR NETWORKING FIRMS', 'WESTERN REGION', '233275801226', 'majornet@gmail.com', 'majornet.com', 'WE DEAL IN ALL KINDS OF TOOLS FOR NETWORKING AND FOR YOUR COMPUTING DEVICES.', '2017-04-26 00:06:51', '2233445', '78452', '1', '', '4'),
('24934614', 'asdasdf', 'jkbkjb', '024656384', '', '', '', '2017-04-26 01:28:38', 'hbj468', '12365', '1', '', '4'),
('27441287', 'MULTICORP MULTIMEDIA', 'ASHANTI REGION', '233275801226', 'multicorp@gmail.com', 'multicorp.com', 'WE BUILD WEBSITES AND ANIMATION FOR PROJECTS.', '2017-04-25 15:45:38', '120345', '36521', '1', '', '4'),
('27524773', 'MASLINE FOUNDATION', 'WESTERN REGION', '233209061668', 'maslinefoundation@gmail.com', 'maslinefoundation.com', 'THE HELPLESS AND NEEDY ONES ARE OUR PRIORITY. JOIN US BRIGHTEN THE FACE OF A HELPLESS CHILD.', '2017-04-25 15:33:15', '471236', '25436', '1', '', '4'),
('33196883', 'ssssssssssssss', 'sssssssssssss', '88888888888888', 'kingicon05@gmail.com', '', 'sssssssssssssssss', '2018-04-20 12:23:42', '8888888888888', '11223', '1', 'GBWA-20171206154654.jpg', '4'),
('34451342', 'MAJOR FIRMS AND FOUNDATION', 'Central Region', '233275801226', 'major12345@gmail.com', 'mikebien.com', 'WE ARE HERE FOR YOU !', '2018-03-29 18:54:56', '11111', '11111', '1', 'GBWA-20171206154654.jpg', '4'),
('35978796', 'I.T SOLUTIONS', 'Central Region', '233275801226', 'itsolutions@ymail.com', 'itsolutions.org', 'WE OFFER I.T TRAINING SERVICES RANGING FROM NETWORKING,  PROGRAMMING, DATABASE AND MULTIMEDIA DESIGN. ENROLL FOR QUALITY TUITION.', '2018-04-20 12:24:01', '784563', '78523', '1', '', '4'),
('37737448', 'DAPAT COMPUTING SYSTEMS', 'UPPER WEST', '233209061668', 'dapat@gmail.com', 'dapat.com', 'WE MAKE AVAILABLE FOR YOU ALL COMPUTING SYSTEMS OF YOUR KIND !!!', '2017-04-26 11:50:50', '809010', '85246', '1', '', '4'),
('43376132', 'INTERNSHIP HUB', 'GREATER ACCRA', '233275801226', 'internshiphub@gmail.com', 'internshiphub.com', 'WE OFFER INTERNSHIP OPPORTUNITIES TO STUDENTS.\r\nWITH INTERNSHIP HUB ; YOUR PLACE OF INTERNSHIP IS SECURED !!!', '2017-04-26 01:29:44', '4578963', '12589', '1', '', '4'),
('45346198', 'AGYA ADU COMPANIES & SONS ENGINEERING LIMITED', 'ASHANTI REGION', '233275801226', 'agyasons@gmail.com', 'agyalimited.com', 'WE OFFER TRAINING IN ALL ENGINEERING FIELDS. \r\nCOME AND ACQUIRE SKILLS FOR YOUR FUTURE MAKE - UP.', '2017-04-24 22:26:40', '457961', '24637', '1', '', ''),
('45883494', 'KINGS FOUNDATION', 'UPPER EAST', '233275801226', 'kings@gmail.com', 'Kings.com', 'WE OFFER AVAILABLE SERVICES !!!', '2017-04-22 18:00:02', '55555', '20017', '1', '', '4'),
('47746854', 'ISHFERNA SOLUTIONS', 'ASHANTI REGION', '233275801226', 'ishferna@gmail.com', 'ishferna.com', 'WE PROVIDE ALL KINDS OF SOLUTIONS TO YOUR I.T PROBLEMS. WE ARE LOCATED AT KORLE-BU . CONTACT U FOR YOUR COMPUTER HARDWARE AND SOFTWARE  REPAIRS.', '2017-04-24 15:25:28', '124589', '35942', '1', '', ''),
('48862221', 'qqqqqqqqqqqqq', 'aaaaaaaa', '88888888888', 'kingicon05@gmail.com', '', 'kghjjjjjjjjjjjjjjj', '2018-04-20 12:24:10', '777777777', '11223', '1', '', '4'),
('51119678', 'ABIDORF I.T SERVICES', 'ASHANTI REGION', '233240489668', 'abidorf@ymail.com', 'abidorf.com', 'WE OFFER STUDENTS WITH WITH ALL KINDS OF I.T TRAINING. WE ARE LOCATED AT OFANKOR BARRIER INSIDE KASOA.', '2017-04-24 14:10:36', '307189', '54478', '1', '', ''),
('54342436', 'G & J TECHNICAL SERVICES', 'ASHANTI REGION', '2335801226', 'gj10003@gmail.com', 'gj10003.com', 'WE OFFER COMPUTER REPAIRS, AND BUILD IOS SYSTEMS.\r\nG & J TECHNICAL ; WE GOT YOUR ISSUES SOLVED !!!', '2018-04-20 12:24:19', '478512', '48956', '1', '', '4'),
('58112967', 'FRENTIC DESIGNS AND MULTIMEDIA', 'UPPER WEST', '2335801226', 'frentic@gmail.com', 'frentic.com', 'WE PROVIDE A VARIETY OF TRAINING FOR STUDENTS WHO WANT TO MASTER MULTIMEDIA AND DESIGN.', '2018-04-20 12:24:25', '426958', '96587', '1', '', '4'),
('58537443', 'MIBIEN TRANSPORT BUSINESS', 'eastern region', '233249452602', 'micheal@gmail.com', 'michealbienu.com', 'WE TAKE YOU WHERE EVER YOU WANT TO GO AT YOUR COMFORT.\r\nVERY SAFETY AND AFFORDABLE !!!', '2018-04-20 12:25:07', '467853', '96547', '1', '', '4'),
('59192556', 'MAJOR AND FRIENDS', 'Central Region', '23327119929', 'major12345@gmail.com', 'mikebien.com', 'WE ARE HERE FOR YOU!', '2017-04-24 13:17:54', '114477', '12345', '1', '', '4'),
('61858867', 'MINISTRY OF FOOD & AGRIC', 'GREATER ACCRA', '233209061668', 'mofa123@gmail.com', 'mofa.com', 'Our agriculture is safe !!!', '2018-04-20 12:24:50', '702010', '84265', '1', '', '4'),
('62225852', 'ADDI-CARE PRODUCTS', 'VOLTA REGION', '233275801226', 'addicare@gmail.com', 'addicare.com', 'WE DEAL IN ALL KINDS OF ARDUINO PRODUCTS FOR YOUR PROJECTS AND STUDIES. ADDI-CARE; YOU ARE AT THE SAFE PLACE !!!', '2017-04-24 22:05:18', '123456', '12587', '1', '', ''),
('65387536', 'FRANCO ENTERPRISE', 'GREATER ACCRA', '233546365020', 'francogh@gmail.com', 'franco.com', 'WE DEAL IN ALL FORMS OF COMPUTING SYSTEMS SUITABLE FOR A COMPANY SET - UP.', '2017-04-24 13:57:51', '423178', '74968', '1', '', ''),
('67254881', '3D INCORPORATION', 'GREATER ACCRA', '233576353510', '3dincorp@gmail.com', '3dincorporation.com', 'WE OFFER NETWORKING SERVICES . TRAINING IN PROGRAMING & WEB SECURITY TECHNOLOGIES. WE GOT YOU ANYTIME !!!', '2017-04-24 14:54:06', '200300', '50010', '1', '', ''),
('71499632', 'TAFFS ADVERTISEMENT', 'VOLTA REGION', '233574959522', 'taffs@gmail.com', 'taffs.com', 'WE ADVERTISE YOUR PRODUCT FOR YOU AT AN AFFORDABLE PRICE.\r\nTAFFS ADVERTISEMENT ; YOUR PRODUCTS ARE SAFE IN THE HANDS OF A GOOD ADVERTISER.', '2017-04-24 22:10:13', '456328', '85423', '1', '', ''),
('77319993', 'DREAM PHOTOGRAPHY GH', 'GREATER ACCRA', '233576370760', 'dreamphotographygh@gmail.com', 'dreamphotography.com', 'WE SERVE YOU WITH ALL THE BEST KINDS AND TYPES OF DESIGNS AND OFFER TRAINING IN PHOTOSHOP', '2017-04-25 15:34:31', '564789', '74523', '1', '', '4'),
('77866236', 'JULIUS NETWORKING SYSTEMS', 'ASHANTI REGION', '233243685759', 'mccyconsult@gmail.com', 'juliusenterprise.ug.edu.gh', 'WE PROVIDE YOU WITH ALL KINDS OF NETWORKING DEVICE AND SKILL NEEDED TO BE A GOOD COMPUTER NETWORKER.', '2018-04-20 12:24:42', '769423', '76143', '1', '', '5'),
('82952328', 'SIVLEK CLOTHING PRODUCTIONS', 'Central Region', '233275801226', 'sivlekdoku@gmail.com', 'sivlekclothing.com', 'WE HAVE ALL KINDS AND TYPES OF CLOTHING FOR YOU !!!', '2017-04-24 13:18:10', '28730', '45612', '1', '', ''),
('84592943', 'EDICOM MULTIMEDIA', 'GREATER ACCRA', '233209061668', 'edicom@gmail.com', 'edicom.org', 'WE ARE INTO PHOTOGRAPHY, WEBSITE DESIGN AND PROGRAMMING.\r\nCONTACT US FOR YOUR WEBSITE DESIGNS,PROGRAMMING TUTORIALS AND PHOTO SHOOTS.', '2017-04-25 00:34:04', '104789', '89546', '1', '', ''),
('85989392', 'KEPLIX NETWORKING FIRM', 'WESTERN REGION', '233209061668', 'keplixnetworking@gmail.com', 'keplix.com', 'WE OFFER STUDENTS WITH INTENSE NETWORKING SKILLS FOR A BETTER FUTURE.', '2017-04-25 10:53:41', '451289', '12548', '1', '', ''),
('86442936', 'DANNYBEMS PROGRAMMING CENTRE', 'UPPER EAST', '233573305353', 'dannybems@gmail.com', 'danny.com', 'WE OFFER TRAINING TO STUDENTS WHO WANT TO MASTER THEIR PROGRAMMING SKILLS AND TO THOSE WHO WANT TO LEARN PROGRAMMING.', '2017-04-24 23:05:04', '127895', '12439', '1', '', ''),
('88417614', 'MIBIEN PICK UP SERVICES', 'VOLTA REGION', '233249452602', 'mibien@ymail.com', 'mibien.com', 'WE CARRY YOU EVERYWHERE AT YOUR OWN CONVENIENCE !!!', '2017-04-24 12:00:46', '809010', '91735', '1', '', ''),
('92415355', 'MAUDREY MUSIC SCHOOL', 'VOLTA REGION', '233208563170', 'maudrey@gmail.com', 'maudrey2010.com', 'WE TRAIN PEOPLE WHO WANT TO LEARN MUSIC AND BECOME THE BEST IN THAT FIELD.\r\nWITH MAUDREY : YOU ARE THE BEST !!!', '2017-04-25 11:00:01', '147856', '12356', '1', '', ''),
('95923823', 'PEARLS FOUNDATION', 'GREATER ACCRA', '233573107827', 'pearlfoundation@gmail.com', 'pearlsfoundation.com', 'WE TEACH AND RAISE THE YOUTH  TO BECOME BETTER CITIZENS OF THEIR COUNTRY AND BEYOND.\r\nPEARL FOUNDATION : YOUR DREAM COME TRUE !!!', '2017-04-25 07:58:23', '458967', '45213', '1', '', '');

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
(1, '34451342', 'project manager', 'As the project manager, your job is to plan, budget, oversee and document all aspects of the specific project you are working on. Project managers may work closely with upper management to make sure that the scope and direction of each project is on schedule, as well as other departments for support. Project managers might work by themselves, or be in charge of a team to get the job done.', '2018-04-30', '2018-04-20 11:40:15'),
(2, '15697472', 'Radiography Expert', 'REQUIREMENTS;\r\n\r\nMust have at least 3 years working experience.\r\nMust be 30 yrs and above.', '2018-05-31', '2018-04-20 12:41:43'),
(3, '15697472', 'PHARMACY TECHNOLOGIST FULL TIME', 'RESPONSIBILITIES;\r\n\r\nHelp pharmacists prepare and give out prescription medication.\r\nSet up consultations and recommendations.\r\nSKILLS;\r\n\r\nMust pay attention to details.\r\nMust have excellent customer service skills.\r\nMust have good organization skills.\r\nREQUIREMENTS;\r\n\r\nMust have at least three (3) years working experience.\r\nMust be not less than 30 years old.', '2018-05-01', '2018-04-20 13:46:39');

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
(1, '12345678', 'MIDWIFE', 'REQUIREMENTS;\r\n\r\nIn active service or retired for at most a year.\r\nMust be 50 yrs old and above.\r\nMust be very experienced.', '2018-04-20', 'JUBAIL HOSPITAL', 'Jubail@gmail.com', '', '0268755845', '', '2018-04-20 12:27:09'),
(2, '12345678', 'Radiography Expert', 'REQUIREMENTS;\r\n\r\nMust have at least 3 years working experience.\r\nMust be 30 yrs and above.', '2018-04-20', 'INTERNSHIP HUB', 'internship@gmail.com', 'kljkljkjks', '0254545444', '', '2018-04-20 12:30:58');

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
(1, 'PHARMACY TECHNOLOGIST', 'RESPONSIBILITIES;\r\n\r\nHelp pharmacists prepare and give out prescription medication.\r\nSet up consultations and recommendations.\r\nSKILLS;\r\n\r\nMust pay attention to details.\r\nMust have excellent customer service skills.\r\nMust have good organization skills.\r\nREQUIREMENTS;\r\n\r\nMust have at least three (3) years working experience.\r\nMust be not less than 30 years old.', 'Admin', '2018-04-30', '2018-05-31', 'recruitement.JPG', '2018-04-20 12:17:44');

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
(1, '10475652', 'PROSPER AMI', 'DEPARTMENT OF COMPUTER SCIENCE', 'COMPUTER SCIENCE', 'sedempee@gmail.com', '74185', '', '3', '2018-05-23 16:50:24'),
(2, '10465735', 'EMMANUEL KIPI', 'DEPARTMENT OF COMPUTER SCIENCE', 'INFORMATION TECHNOLOGY', 'emmakipi34@gmail.com', '14785', '', '3', '2017-04-25 13:14:44'),
(3, '10496566', 'JOHNSON AHIAVOR', 'DEPARTMENT OF COMPUTER SCIENCE', 'COMPUTER SCIENCE', 'ahiavor44@gmail.com', '35558', '', '3', '2017-04-25 13:16:33'),
(4, '14567845', 'CELESTINA APENKRO', 'DEPARTMENT OF COMPUTER SCIENCE', 'INFORMATION TECHNOLOGY', 'celestinaapenkro@gmail.com', '47116', '', '3', '2017-04-25 13:41:20'),
(5, '10475653', 'REBECCA PAYNE', 'DEPARTMENT OF COMPUTER SCIENCE ', 'INFORMATION TECHNOLOGY', 'rebeccapayne@gmail.com', '35411', '', '3', '2017-04-25 13:41:34'),
(7, '10548741', 'CAIAPHAS APPIAH', 'DEPARTMENT OF COMPUTER SCIENCE ', 'INFORMATION TECHNOLOGY ', 'caiahas1123@gmail.com', '48965', '', '3', '2017-04-25 13:43:28'),
(8, '10458753', 'ABDUL MALIK YAWSON', 'DEPARTMENT OF COMPUTER SCIENCE', 'INFORMATION TECHNOLOGY', 'malikyawson@gmail.com', '49235', '', '3', '2017-04-25 13:51:13'),
(9, '10485217', 'RITA KWANU', 'DEPARTMENT OF COMPUTER SCIENCE', 'INFORMATION TECHNOLOGY', 'ritakwanu@ymail.com', '41023', '', '3', '2017-04-25 13:54:36'),
(10, '10495478', 'OPOKU AMOAKO', 'DEPARTMENT OF COMPUTER SCIENCE', 'COMPUTER SCIENCE', 'opokuamoako@gmail.com', '41174', '', '3', '2017-04-25 13:57:22'),
(11, '11111111', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'eeeeeeeeeeeeee', 'eeeeeeeeeeeeeeeeeeeeeeee', 'wwwwwwwww@wwwwwwwwwww.www', '22222', '', '3', '2018-04-10 21:07:14'),
(12, '78945612', 'SEDEM AMI', 'COMPUTER SCIENCE', 'INFO SYS AND COMPUTER SCIENCE', 'sedempee@gmail.com', '12345', '', '3', '2018-04-20 11:47:16'),
(13, '14140008', 'Walter Ami', 'IT', 'IT', 'walter@gmail.com', '11111', '', '3', '2018-04-20 12:19:13'),
(14, '14140009', 'Prince Asare', 'COMPUTER SCIENCE', 'INFO SYS AND COMPUTER SCIENCE', 'prince@gmail.com', '11111', '', '3', '2018-04-20 12:19:59'),
(15, '14140010', 'Mohammed Kese', 'COMPUTER SCIENCE', 'INFO SYS AND COMPUTER SCIENCE', 'prof@gmail.com', '11111', '', '3', '2018-04-20 12:20:40'),
(16, '14140011', 'Seth Biney', 'Business', 'Marketing', 'seth@gmail.com', '11111', '', '3', '2018-04-20 12:21:29'),
(17, '14140011', 'Frank Banaseka', 'IT', 'I.T', 'frankbanaseka@gmail.com', '11111', '', '3', '2018-04-26 16:54:25'),
(18, '14140025', 'Daniel Martey', 'COMPUTER SCIENCE', 'INFO SYS AND COMPUTER SCIENCE', 'sedempee@gmail.com', '12345', '', '3', '2018-05-17 11:01:38'),
(19, '12345987', 'Richard Kofi', 'ITT', 'IT', 'kingicon05@gmail.com', '11111', '', '3', '2018-05-24 12:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `student_report`
--

CREATE TABLE `student_report` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `company_id` varchar(255) NOT NULL,
  `report` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `report_file` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_report`
--

INSERT INTO `student_report` (`id`, `student_id`, `company_id`, `report`, `status`, `report_file`, `doe`) VALUES
(1, '10475652', '34451342', 'Dear Sir/Madam\r\nI write to confirm that your student Prosper Ami an intern with our company is still with us and doing well. ', '', '10475652__Fri 20 Apr, 2018.pdf', '2018-04-20 11:52:16'),
(2, '14140009', '15697472', 'Dear Sir, \r\nPrince has been very helpful. ', 'Ungoing', '14140009__Fri 20 Apr, 2018.pdf', '2018-04-20 13:38:22'),
(3, '14140009', '15697472', 'Dear Sir, I write on behalf Hotjobs Africa to confirm the successful completion of Mr. Prince Asare as an intern. ', 'Completed', '14140009__Thu 17 May, 2018.pdf', '2018-05-17 11:48:05');

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
  `intern_status` int(11) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pin`, `access_level`, `app_status`, `intern_status`, `doe`) VALUES
(1, '12345678', '12345', '2', '', 0, '2017-04-20 23:47:18'),
(2, '10475652', '35557', '3', '', 0, '2017-04-20 23:50:58'),
(3, '34451342', '11111', '1', '4', 0, '2017-04-22 17:49:35'),
(4, '59192556', '12345', '1', '4', 0, '2017-04-21 13:38:21'),
(5, '45883494', '20017', '1', '4', 0, '2017-04-22 18:00:02'),
(6, '88417614', '91735', '1', '', 0, '2017-04-24 12:00:46'),
(7, '37737448', '85246', '1', '4', 0, '2017-04-26 00:08:19'),
(8, '61858867', '84265', '1', '4', 0, '2018-04-20 12:24:50'),
(9, '82952328', '45612', '1', '', 0, '2017-04-24 12:51:41'),
(10, '22837497', '78452', '1', '4', 0, '2017-04-25 15:30:16'),
(11, '77866236', '76143', '1', '5', 0, '2018-04-20 12:24:42'),
(12, '77319993', '74523', '1', '4', 0, '2017-04-25 15:34:31'),
(13, '58112967', '96587', '1', '4', 0, '2018-04-20 12:24:25'),
(14, '65387536', '74968', '1', '', 0, '2017-04-24 13:57:51'),
(15, '51119678', '54478', '1', '', 0, '2017-04-24 14:10:36'),
(16, '58537443', '96547', '1', '4', 0, '2018-04-20 12:25:07'),
(17, '35978796', '78523', '1', '4', 0, '2017-04-25 19:02:22'),
(18, '67254881', '50010', '1', '', 0, '2017-04-24 14:54:05'),
(19, '47746854', '35942', '1', '', 0, '2017-04-24 15:25:28'),
(20, '62225852', '12587', '1', '4', 0, '2017-05-02 17:49:16'),
(21, '71499632', '85423', '1', '', 0, '2017-04-24 22:10:13'),
(22, '45346198', '24637', '1', '', 0, '2017-04-24 22:26:40'),
(23, '86442936', '12439', '1', '', 0, '2017-04-24 23:05:04'),
(24, '11397617', '14596', '1', '4', 0, '2017-04-25 15:28:03'),
(26, '84592943', '89546', '1', '', 0, '2017-04-25 00:34:04'),
(27, '43376132', '12589', '1', '4', 0, '2017-04-26 00:10:00'),
(28, '27524773', '25436', '1', '4', 0, '2017-04-25 15:33:15'),
(29, '95923823', '45213', '1', '', 0, '2017-04-25 07:58:23'),
(30, '54342436', '48956', '1', '4', 0, '2018-04-20 12:24:19'),
(31, '85989392', '12548', '1', '', 0, '2017-04-25 10:53:41'),
(32, '92415355', '12356', '1', '', 0, '2017-04-25 11:00:01'),
(33, '10465735', '14785', '3', '', 0, '2017-04-25 13:18:18'),
(34, '10496566', '35558', '3', '', 0, '2017-04-25 13:19:53'),
(35, '14567845', '47116', '3', '', 0, '2017-04-25 13:24:00'),
(36, '10475653', '35411', '3', '', 0, '2017-04-25 13:26:39'),
(37, '10485657', '11154', '3', '', 0, '2017-04-25 13:33:13'),
(38, '10548741', '48965', '3', '', 0, '2017-04-25 13:44:35'),
(39, '10458753', '49235', '3', '', 0, '2017-04-25 13:51:46'),
(40, '10485217', '41023', '3', '', 0, '2017-04-25 13:55:35'),
(41, ' 10495478', '41174', '3', '', 0, '2017-04-25 13:58:30'),
(42, '48862221', '11223', '1', '4', 0, '2018-04-20 12:24:10'),
(43, '33196883', '11223', '1', '4', 0, '2018-04-20 12:23:42'),
(44, '33196883', '11223', '1', '4', 0, '2018-04-20 12:23:42'),
(45, '33196883', '11223', '1', '4', 0, '2018-04-20 12:23:42'),
(46, '33196883', '11223', '1', '4', 0, '2018-04-20 12:23:42'),
(47, '11111111', '22222', '3', '', 0, '2018-04-10 21:07:14'),
(48, '78945612', '12345', '3', '', 0, '2018-04-20 11:47:16'),
(49, '15697472', '11111', '1', '4', 0, '2018-05-24 12:23:47'),
(50, '14140008', '11111', '3', '', 0, '2018-04-20 12:19:13'),
(51, '14140009', '11111', '3', '', 0, '2018-04-20 12:19:59'),
(52, '14140010', '11111', '3', '', 0, '2018-04-20 12:20:40'),
(53, '14140011', '11111', '3', '', 0, '2018-04-20 12:21:28'),
(54, '14140011', '11111', '3', '', 0, '2018-04-26 16:54:25'),
(55, '14140025', '12345', '3', '', 0, '2018-05-17 11:01:38'),
(56, '15476786', '12345', '1', '4', 0, '2018-05-17 12:13:28'),
(57, '12345987', '11111', '3', '', 1, '2018-05-24 12:31:44');

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
-- Indexes for table `chats`
--
ALTER TABLE `chats`
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
-- Indexes for table `student_report`
--
ALTER TABLE `student_report`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `apply_department_advert`
--
ALTER TABLE `apply_department_advert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `company_post_adverts`
--
ALTER TABLE `company_post_adverts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `department_post_adverts`
--
ALTER TABLE `department_post_adverts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `student_report`
--
ALTER TABLE `student_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
