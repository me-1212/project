-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2023 at 06:02 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`News_id`);

--
-- Indexes for table `res`
--
ALTER TABLE `res`
  ADD PRIMARY KEY (`Res_id`);

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
