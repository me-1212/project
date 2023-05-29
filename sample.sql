-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 05:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(11) NOT NULL,
  `pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `pass`) VALUES
('me', 123);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `Exam_id` varchar(7) NOT NULL,
  `Exam_name` varchar(35) NOT NULL,
  `No_of_ques` int(11) NOT NULL,
  `Stream` varchar(11) NOT NULL,
  `Time` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`Exam_id`, `Exam_name`, `No_of_ques`, `Stream`, `Time`, `Status`) VALUES
('Eng', 'English', 5, 'Both', 1, 1),
('Sat', 'Scholastic Aptitude Test', 5, 'Both', 120, 0),
('Math_N', 'Mathematics for Natural Science', 3, 'Natural', 180, 0),
('Math_S', 'Mathematics for Social Science', 3, 'Social', 180, 0),
('Bio', 'Biology', 5, 'Natural', 120, 0),
('Chm', 'Chemistry', 5, 'Natural', 120, 0),
('Phy', 'Physics', 3, 'Natural', 120, 0),
('Civ', 'Civics and Ethical Education', 5, 'Both', 120, 0),
('His', 'History', 5, 'Social', 120, 0),
('Geo', 'Geography', 5, 'Social', 120, 0),
('Bus', 'Business', 5, 'Social', 120, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `News_id` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Full` text NOT NULL,
  `Dat` date NOT NULL,
  `Admin_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`News_id`, `Title`, `Full`, `Dat`, `Admin_id`) VALUES
(1, 'በ2014 ዓ.ም 12ኛ ክፍል የላቀ ዉጤት ላመጡ ስለተሰጠዉ የዉጪ ሀገር የትምህርት እድል /Scholarship / ', 'በ2014 ዓ.ም የ12ኛ ክፍል ፈተና ከተፈተኑ ተማሪዎች መካከል 3.3 በመቶ ተማሪዎች ብቻ ወደዩኒቨርስቲ የሚያስገባቸዉን 50/በመቶና በላይ ዉጤት ያስመዘገቡ ሲሆን ከነዚህ መካከል 263 የተፈጥሮ ሳይንስ ተማሪዎች 600/700 እንዲሁም 10 የማህበራዊ ሳይንስ ተማሪዎች 500/600 በማምጣት የሀገሪ\r\n\r\nእነዚህ 273 ተማሪዎች የካቲት 21/2015 ዓም በሀገር አቀፍ ደረጃ የኢፌዲሪ ጠቅላይ ሚኒስትር ዶ/ር ዓብይ አህመድ፣ የትምህርት ሚኒስትሩ ፕሮፌሰር ብርሃኑ ነጋና የአጠቃላይ ትምህርት ዘርፍ ሚኒስትር ዴኤታ ዶ/ር ፋንታ ማንደፍሮ እጅ የእዉቅናና ሽልማት ተቀብለዋል፡፡\r\nበዚሁ እለት በክቡር ጠቅላይ ሚኒስትር ዓብይ አህመድ ለእነዚህ ተማሪዎች በተባበሩት አረብ ኤምሬትስ የትምህርት እድል/ Scholarship / እንደተገኘ ተገልጸል፡፡\r\nበ2014 ዓም. የተጀመረዉ የፈተና ስርዓት ለዉጥ እንዲጠናከርና መንግስት ለትምህርት ዘርፉ የሰጠዉን ልዩ ትኩረት ለማሳየት ጠቅላይ ሚኒስትሩ ባደረጉት ጥረት ከወዳጅ አገራት የተገኘዉ ይህ የትምህርት እድል ተማሪዎች ከመስከረም/2016 ዓም ጀምሮ እንዲማሩ ተመቻችቷል፡፡\r\nወደዉጪ እስኪሄዱ ድረስ ያሉትን ግዜያት የእንግሊዝኛ ቋንቋ ማሻሻያ ትምህርት በመማርና ሌሎች ለወደፊታቸዉ የሚያግዙ ቅድመ-ዝግጅቶችን እያደረጉ እንድቆዩ የሚሰራ ይሆናል፡፡\r\nእዚህ ላይ መታወቅ ያለበት አንድ ጉዳይ እነዚህ ተማሪዎች የተፈጠረላቸዉ እድል በቀጣይ እየተፈጠረ ላለዉ በዉድድር ላይ የተመሰረተ ዓለም እኛንም በዓለም አቀፍ ደረጃ ተወዳዳሪ የሚያደርጉ ምሩቃንንና ሳይንትስቶችን ፣ ቴክኖሎጂስቶችን፣ መሪዎችን የመፍጠሪያ ልዩ እድል ነው፡፡\r\nበተጨማሪም ተማሪዎቻችን በሄዱበት የሀገር ስምና ገጽታ ናቸዉ ፡፡ በአቅማቸዉ ተወዳድረዉ በዓለም ደረጃ ስመጥር በሆኑ ዩኒቨርስቲዎች አሸንፈዉ ጥሩ ሆነዉ ተመርቀዉ በተሻለ ዉጤት ሲመጡ ኢትዮጵያ ዉስጥ ትምህርት ምን እንደሚመስል ሌላዉም ዓለም ይገነዘባል፡፡ ወደሀገራቸዉ ተመልሰዉ ሲያገለግሉም በፍጥነት ከድህነት ለመዉጣትና ወደብልጽግና ለመሄድ ለምናደርገዉ ስራ አጋዥ ይሆናል የሚል ፅኑ እምነት አለ፡፡\r\nየተፈጠረዉ የትምህርት ዕድል በጣም ጥሩ እድል ነዉ፡፡ ነገር ግን ዕድሉ ለተፈጠረላቸዉ ተማሪዎች እንደግዴታ የሚወሰድ አይደለም፡፡ በጣም ትልቅ እድል፣ ከፍተኛ ጥረት ተደርጎበት በክቡር በጠቅላይ ሚኒስትር ዶ/ር አብይ አህመድ የተገኘ እድል ነዉ፡፡ በመሆኑም የአንድም ተማሪ እድል ሳይባክን መጠቀም ለሀገር ይጠቅማል፡፡ ይህንን በማድረግ ሂደት ዉስጥ ደግሞ ሁሉም የበኩሉን እንዲወጣ ማድረግ ያስፈልጋል፡፡\r\nይሁን እንጅ ተማሪዎች መማር የምፈልገዉ በሀገር ዉስጥ ባሉ ዩኒቨርስቲዎች ነዉ ብለዉ ካሰቡ የሚገደዱበት ሁኔታ የለም፡፡', '2023-04-12', ''),
(2, '“ጠንክረን በተማሪዎቹ ላይ በመስራታችን ለተከታታይ አስር ዓመታት በውጤታማነት መዝለቅ ችለናል” የወላይታ ሊቃ 2ኛ ደረጃ ትምህር ቤት ርዕሰ መምህር አቶ ማቱሳላህ፡፡', 'የወላይታ ሊቃ 2ኛ ደረጃ ትምህርት ቤት ርእሰ መምህር አቶ ማቱሳላህ ጎና ጠንክረን ተማሪዎች ላይ በመስራታችን ባለፉት አስር ዓመታት በ12ኛ ክፍል ያስፈተናቸውን ተማሪዎች በሙሉ ወደ ዩኒቨርሲቲ በማስገባት በውጤታማነት መዝለቅ መቻላቸውን ገለፁ፡፡\r\n\r\nየወላይታ ልማት ማህበር በ2000 ዓ.ም ትምህርት ቤቱን በመመስረት ከ5ኛ እስከ 7ኛ ክፍል ያሉ ተማሪዎችን በመቀበል የመማር ማስተማር ስራውን በመጀመር የመጀመሪያዎቹን የ12ኛ ክፍል ተማሪዎች በ2005 ዓ.ም ማስፈተኑን ርእሰ መምህሩ ገልፀዋል።\r\nትምህርት ቤቱም ለአስር ዓመታት ያስፈተናቸውን ሁሉንም ተማሪዎች ወደ ዩኒቨርሲቲ ያስገባ መሆኑም ተገልጿል፡፡\r\nበዚህ ትምህርት ቤት የተማሩ ተማሪዎቹም ከፍተኛ ውጤት በማምጣት ከ85 በመቶ በላይ የሚሆኑት በመረጡት ዘርፍ ትምህርታቸውን መከታተላቸውም ተገልጿል።\r\nትምህርት ቤቱ ላመጣው የላቀ ውጤት የመምህራን እና ተማሪዎች ለትምህርት የሰጡት ትኩረት ከፍተኛ በመሆኑ መሆኑንም ርዕሰ መምህሩ ተናግረዋል።\r\nለተማሪዎችም ሙሉ የትምህርት ቁሳቁስ፣ የማደሪያ፣ የምግብ ፣ የህክምና ወጪ በወላይታ ልማት ማህበር በመሟላቱ ምቹ የትምህርት ሁኔታ መፍጠር መቻሉም ተገልጿል።\r\nበመጨረሻም ትምህርት ቤቱ ባለበት የውጤታማነት ደረጃ እንዲቀጥል ልዩ ትኩረት ተሰጥቶት እየተሰራ እንደሚገኝ አቶ ማቱሳለህ ተናግረዋል፡፡', '2023-04-12', ''),
(11, 'በ2014 ዓም. 12ኛ ክፍል የላቀ ዉጤት አምጥታችሁ የዉጪ ሀገር የትምህርት እድል/Scholarship / እድል የተሰጣችሁ 273 ተማሪዎች', 'በ2014 ዓም. 12ኛ ክፍል የላቀ ዉጤት አምጥታችሁ የዉጪ ሀገር የትምህርት እድል/Scholarship / እድል የተሰጣችሁ 273 ተማሪዎች የዉጪ ሀገር ትምህርቱ የሚጀመረዉ ከመስከረም/2016ዓም. ጀምሮ በመሆኑ ቀደም ሲል ወደተመደባችሁባቸዉ ዩኒቨርስቲዎች እንድትገቡ እናሳስባለን፡፡ ለዉጪ ሀገር ትምህርታችሁ የሚያግዝ የእንግሊዝኛ ቋንቋ ትምህርትና ሌሎች የቅድመ ዝግጅት ስራዎች ከተመደባችሁባቸዉ ዩኒቨርስቲዎች ጋር በመነጋገር የሚፈጸም ይሆናል፡፡ ማስታወሻ፤- በዚህ ጉዳይ በተናጠል ወደትምህርት ሚኒስቴር የሚመጣ ተማሪ የማናስተናግድ መሆኑን እንገልጻለን፡፡ የትምህርት ሚኒስቴር!', '2023-04-16', 'me');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `Exam_id` varchar(10) NOT NULL,
  `Question_id` int(11) NOT NULL,
  `Question` varchar(200) NOT NULL,
  `Choice_1` varchar(200) NOT NULL,
  `Choice_2` varchar(200) NOT NULL,
  `Choice_3` varchar(200) NOT NULL,
  `Choice_4` varchar(200) NOT NULL,
  `Answer` char(1) NOT NULL,
  `Figure` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Exam_id`, `Question_id`, `Question`, `Choice_1`, `Choice_2`, `Choice_3`, `Choice_4`, `Answer`, `Figure`) VALUES
('Math_N', 1, 'What is gcf of 24 and 16?', '6', '2', '8', '16', 'C', ''),
('Math_N', 2, 'Which of the following is true?', 'Rectangle is square.			', 'Trapezium is a quadrilateral.', 'Rhombus has angle of 90 degrees.', 'None', 'B', ''),
('Math_N', 3, 'Which one is perfect cube?	', '56', '8	', '64', 'B and C', 'D', ''),
('Eng', 1, 'He is ........ now.', 'studying', 'studies', 'study', 'studied', 'A', ''),
('Eng', 2, 'The man killed the dog. the passive form of this s...	', 'The man was killed by dog.	', 'The dog was killed by the man.	', 'The dog is killed by the man.	', 'The dog killed by the man.', 'B', ''),
('Eng', 3, 'If I ...... you, I would tell you.	', 'am', 'were	', 'will	', 'was	', 'B', ''),
('Eng', 4, 'The book is ........ the table.	', 'at	', 'in	', 'on	', 'after	', 'C', ''),
('Eng', 5, '.......sun rises in ....... east.	', 'the.....a	', 'a.....an	', 'the.....an	', 'the ......the	', 'D', '');

-- --------------------------------------------------------

--
-- Table structure for table `res`
--

CREATE TABLE `res` (
  `Res_id` int(11) NOT NULL,
  `Title` text NOT NULL,
  `File_path` text NOT NULL,
  `Size` int(11) NOT NULL,
  `Typ` varchar(15) NOT NULL,
  `Admin_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `res`
--

INSERT INTO `res` (`Res_id`, `Title`, `File_path`, `Size`, `Typ`, `Admin_id`) VALUES
(3, 'Automated-Face-Detection-Recognition-for-Detecting-Impersonation-of-Candidate-in-Examination-System.pdf', 'resources/Automated-Face-Detection-Recognition-for-Detecting-Impersonation-of-Candidate-in-Examination-System.pdf', 834070, 'reading', ''),
(5, '111502-Article Text-308423-1-10-20150119 (3).pdf', 'resources/111502-Article Text-308423-1-10-20150119 (3).pdf', 1022625, 'exam', ''),
(11, 'ale.docx', 'resources/ale.docx', 13142, 'reading', 'me');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `Registration_no` varchar(15) NOT NULL,
  `Exam_id` varchar(15) NOT NULL,
  `Score` int(11) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`Registration_no`, `Exam_id`, `Score`, `Status`) VALUES
('10101050', 'Eng', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `Schedule_id` varchar(11) NOT NULL,
  `Admin_id` varchar(10) NOT NULL,
  `Exam_name` varchar(50) NOT NULL,
  `Stream` varchar(10) NOT NULL,
  `Dat` varchar(25) NOT NULL,
  `Start_time` time NOT NULL,
  `End_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`Schedule_id`, `Admin_id`, `Exam_name`, `Stream`, `Dat`, `Start_time`, `End_time`) VALUES
('2023_Eng', 'me', 'English', 'Both', 'Monday ', '09:00:00', '11:00:00'),
('2023_Math_N', 'me', 'Mathematics for Natural Science', 'Natural', 'Monday ', '14:00:00', '17:00:00'),
('2023_Math_S', 'me', 'Mathematics for Social Science', 'Social', 'Monday ', '14:00:00', '17:00:00'),
('2023_Sat', 'me', 'Scholastic Aptitude Test', 'Both', 'Tuesday', '09:00:00', '11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Name` varchar(50) NOT NULL,
  `Registration_number` int(15) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Pass` int(11) NOT NULL,
  `Stream` varchar(15) NOT NULL,
  `School_code` int(11) NOT NULL,
  `Region` int(11) NOT NULL,
  `Woreda` int(11) NOT NULL,
  `Photo` text NOT NULL,
  `Gender` char(1) NOT NULL,
  `Is_blind` varchar(3) NOT NULL,
  `Zone` int(11) NOT NULL,
  `City` int(11) NOT NULL,
  `Subject` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Name`, `Registration_number`, `Username`, `Pass`, `Stream`, `School_code`, `Region`, `Woreda`, `Photo`, `Gender`, `Is_blind`, `Zone`, `City`, `Subject`) VALUES
('Abebe Tamrat Bihon', 10101050, 'NS_ATB_15', 123, 'Natural', 11, 5, 6, '\"photo\\abebe.jpg\"', 'M', 'No', 1, 34, 'English\r\nMathematics for natural science\r\nSAT\r\nBiology\r\nChemistry\r\nPhysics\r\nCivics and ethical education');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`News_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD KEY `Question_id` (`Exam_id`,`Question_id`);

--
-- Indexes for table `res`
--
ALTER TABLE `res`
  ADD PRIMARY KEY (`Res_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD UNIQUE KEY `Registration_no` (`Registration_no`,`Exam_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`Schedule_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Registration_number`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Pass` (`Pass`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `News_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `res`
--
ALTER TABLE `res`
  MODIFY `Res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
