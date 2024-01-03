-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 04:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paths_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `User_Id` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Age` int(5) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact` int(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`User_Id`, `First_Name`, `Last_Name`, `Gender`, `Age`, `Email`, `Contact`, `Username`, `Password`) VALUES
(0, 'Admin', 'Admin', 'Admin', 0, 'Admin', 0, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Course_Id` int(11) NOT NULL,
  `CourseName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Course_Id`, `CourseName`) VALUES
(1, 'AB Communication'),
(2, 'BSBA Management Accounting'),
(3, 'BSBA Financial Management'),
(4, 'Master in Business Admin'),
(5, 'BSBA Marketing Management'),
(6, 'BS Hospitality'),
(7, 'BS Tourism'),
(8, 'BS Criminology'),
(9, 'BS Information Technology'),
(10, 'BS Electronics Engineering'),
(11, 'BS Industrial Engineering'),
(12, 'BS Psychology'),
(13, 'BS Accountancy'),
(14, 'BS Nursing'),
(15, 'BS Computer Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `Question_Id` int(11) NOT NULL,
  `Question` varchar(500) NOT NULL,
  `QuestionType` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`Question_Id`, `Question`, `QuestionType`) VALUES
(1, 'Ive always been interested in technology', '9'),
(2, 'I find working on a computer spreadsheet or database rewarding', '9'),
(3, 'I am good with software and hardware.', '9'),
(4, 'I enjoy making things for future development', '9'),
(5, 'I prefer to spend my free time studying alone.\n', '9'),
(6, 'I would rather be a public relations professional.\n', '8'),
(7, 'I follow the instructions and commands of my leader', '8'),
(8, 'I am keen to find out the cause of a problem.\n', '8'),
(9, 'I care about the safety of other people.\n', '8'),
(10, 'I am most comfortable following a schedule.\n', '8'),
(11, 'I care about the well being of other people', '12'),
(12, 'I see things as they could be.\r\n', '12'),
(13, 'I am sensitive to other peoples feelings.\r\n', '12'),
(14, 'I want them to know me that Im passionate and sensitive to others.', '12'),
(15, 'I often give advice to others.', '12'),
(16, 'I want to develop tolerance, respect, self awareness and interpersonal skills for my professional career. ', '14'),
(17, 'Effective listening is one of the most important skills that I should possess', '14'),
(18, 'Im goal-driven and good at staying the course.', '14'),
(19, 'I love helping people, no matter what.', '14'),
(20, 'I like making sure everyone has what they need.', '14'),
(21, 'I have an accurate coding skills.', '15'),
(22, 'The decisions of others is valuable to me.', '15'),
(23, 'I also make sure that my finished tasks function effectively in different error situations.', '15'),
(24, 'Im used to collaborating with others on different projects.', '15'),
(25, 'I avoid repeating mistakes.', '15'),
(26, 'I do what helps facilitate the idea that helps improve our daily practices.', '10'),
(27, 'I have been successful in creating things that used effectively.', '10'),
(28, 'I first determine the tasks then I will proceed on finishing it.', '10'),
(29, 'I do love fixing anything powered by electricity.', '10'),
(30, 'I believe that my skills and knowledge is valuable for the society.', '10'),
(31, 'Im an artistic person who likes to be involved with forms, patterns, and design in life.', '11'),
(32, 'Im very good at understanding other peoples mood and feelings.', '11'),
(33, 'I like doing outdoor, mechanical, and physical activities.', '11'),
(34, 'Im an extrovert, my energy and ability to take risks is the reason many projects get started and stay successful', '11'),
(35, 'I tend to analyze situations before making decisions.', '11'),
(36, 'I have listening skills to understand clients or executives wants and needs.', '5'),
(37, 'I want to develop promotional strategies and interpersonal skills to work with different personality types.', '5'),
(38, 'With my communication skills, I can cooperate effectively when it comes to marketing campaign.', '5'),
(39, 'I understand how bad ideas affects consumer behavior.', '5'),
(40, 'Im good at motivating myself, my teams, and others.', '5'),
(41, 'Im conventional person who is careful, quiet, and pay attention to detail.', '3'),
(42, 'Im the person who enjoys solving problems.', '3'),
(43, 'Im good at decision-making and analytical abilities.', '3'),
(44, 'Im always prepared to connect with people through a variety of channels, including emails, phone calls, instant messages, and face-to-face meetings.', '3'),
(45, 'Im the person who can study the market strategies and managing funds.', '3'),
(46, 'I always look for new opportunities.', '1'),
(47, 'I want to learn to communicate on every languages.', '1'),
(48, 'Im confident to communicate to people.', '1'),
(49, 'I want to learn and improve when it comes writing and communication skills.', '1'),
(50, 'I really like to try public speaking but Im not confident to do that.', '1'),
(51, 'I enjoyed group projects and also Id like to do voluntary work.', '13'),
(52, 'When theres a problem, I keep looking for solution until I find the answer.', '13'),
(53, 'I like learning about new people, places, and things.', '13'),
(54, 'I can explain complicated concepts in simple ways.', '13'),
(55, 'Im good at planning strategies to help my team accomplish their goals.', '13'),
(56, 'I am delighted to see new places that I havent gone to Traveling around is one of my favorite hobbies.', '7'),
(57, 'I am passionate about sharing trivial information about historical/famous places that others might not know.', '7'),
(58, 'Traveling around is one of my favorite hobbies', '7'),
(59, 'I can learn a lot from visiting other places, its either beliefs, culture, or history.', '7'),
(60, 'I can help other people not only to share knowledge about someplace, but also to promote the beauty of our country.', '7'),
(61, 'I have good listening and communication skills to help people in needs.', '6'),
(62, 'Im good problem-solver.', '6'),
(63, 'I like developing new types of focused tours or attractive themes.', '6'),
(64, 'Im good at keeping important information assigned to me.', '6'),
(65, 'I can be an effective leader or a creative thinker.', '6'),
(66, 'Im a hardworking person when it comes to business.', '4'),
(67, 'I value every day and time when doing tasks.', '4'),
(68, 'I allocate specific tasks to team members who knows to get their job done.', '4'),
(69, 'I stay organized the plan to run as effectively as possible. ', '4'),
(70, 'Im motivated to work at improving skills and knowledge.', '4'),
(71, 'I have conducted myself in a respectable manner with appropriate knowledge, values, and attitudes. ', '2'),
(72, 'Im good at making strategic and operating decisions. ', '2'),
(73, 'Im good at mathematical concepts and operations', '2'),
(74, 'I have the ability to identify, assess, create alternative solutions and solve the actual problem while continuously evaluating for outcomes.', '2'),
(75, 'I have a small knowledge of using computer and can understand known application programs.', '2');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `Results_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Test_Id` int(11) NOT NULL,
  `course1` varchar(50) NOT NULL,
  `course2` varchar(50) NOT NULL,
  `course3` varchar(50) NOT NULL,
  `Timestamp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scheduling`
--

CREATE TABLE `scheduling` (
  `Schedule_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Schedule` varchar(50) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `Test_Id` int(11) NOT NULL,
  `QuestionList` varchar(5000) NOT NULL,
  `TestAnswer` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`User_Id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Course_Id`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`Question_Id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`Results_Id`);

--
-- Indexes for table `scheduling`
--
ALTER TABLE `scheduling`
  ADD PRIMARY KEY (`Schedule_Id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`Test_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `Course_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `Question_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `Results_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `scheduling`
--
ALTER TABLE `scheduling`
  MODIFY `Schedule_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `Test_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
