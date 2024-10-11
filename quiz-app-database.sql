
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Database: `quiz_app`
--
CREATE DATABASE IF NOT EXISTS `quiz_app` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `quiz_app`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` varchar(36) NOT NULL COMMENT 'Unique identifier for each category',
  `category_name` varchar(128) DEFAULT NULL COMMENT 'Name of the category like past questions, personal practice',
  `date_created` datetime DEFAULT NULL COMMENT 'Date and time when the category was created',
  `date_updated` datetime DEFAULT NULL COMMENT 'Date and time when the category was updated',
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_name` (`category_name`),
  KEY `category_name_2` (`category_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table to store different quiz categories i.e. past questions or personal practice';

--
-- Truncate table before insert `categories`
--

TRUNCATE TABLE `categories`;
--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `date_created`, `date_updated`) VALUES
('bef64e36-64e0-4dce-9fc6-b293d9125d60', 'Personal Practice', '2024-08-12 12:12:36', '2024-08-12 17:15:53'),
('e05a3459-0563-4d1d-9ee9-7c24f25b5790', 'Past Questions', '2024-08-12 16:52:45', '2024-08-12 17:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `forgot`
--

DROP TABLE IF EXISTS `forgot`;
CREATE TABLE IF NOT EXISTS `forgot` (
  `forgot_id` varchar(36) NOT NULL COMMENT 'Unique identifier for each category',
  `user_id` varchar(36) NOT NULL COMMENT 'Identifier for the user who requested for the code',
  `code` varchar(6) NOT NULL COMMENT 'Code used to verify account',
  `expire` int(11) NOT NULL COMMENT 'Expiring Unix timestamp for code',
  `date_created` datetime DEFAULT NULL COMMENT 'Date the code was requested',
  PRIMARY KEY (`forgot_id`),
  KEY `expire` (`expire`),
  KEY `user_id` (`user_id`),
  KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table to store user_id, code and expire time for the forgot password verification code';

--
-- Truncate table before insert `forgot`
--

TRUNCATE TABLE `forgot`;

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
CREATE TABLE IF NOT EXISTS `levels` (
  `level_id` varchar(36) NOT NULL COMMENT 'Unique identifier for each level',
  `level_name` varchar(128) DEFAULT NULL COMMENT 'Name of the level like SHS, JHS, PRIMARY, TVET etc',
  `level_abbreviation` char(12) DEFAULT NULL COMMENT 'Abbreviation for the level',
  `date_created` datetime DEFAULT NULL COMMENT 'Date and time when the levels was created',
  `date_updated` datetime DEFAULT NULL COMMENT 'Date and time when the levels was updated',
  PRIMARY KEY (`level_id`),
  UNIQUE KEY `level_name` (`level_name`),
  KEY `level_name_2` (`level_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table to store different levels of studets quizzes i.e. TVET, SHS, PRIMARY, JHS';

--
-- Truncate table before insert `levels`
--

TRUNCATE TABLE `levels`;
--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`level_id`, `level_name`, `level_abbreviation`, `date_created`, `date_updated`) VALUES
('4d09acc5-7e4c-4919-ad13-e0aa7098bc4a', 'Senior High School', 'SHS', '2024-08-20 17:03:35', '2024-08-20 17:03:35'),
('a6f14132-cb80-412d-b294-9ee35059cdc7', 'Junior High School', 'JHS', '2024-08-12 10:21:37', '2024-08-12 16:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `option_id` varchar(36) NOT NULL COMMENT 'Unique identifier for each option',
  `question_id` varchar(36) DEFAULT NULL COMMENT 'Identifier for the question this option belongs to',
  `option` text DEFAULT NULL COMMENT 'The text of the option',
  PRIMARY KEY (`option_id`),
  KEY `option` (`option`(768)),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table to store options for each question';

--
-- Truncate table before insert `options`
--

TRUNCATE TABLE `options`;
-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` varchar(36) NOT NULL COMMENT 'Unique identifier for each question',
  `quiz_id` varchar(36) DEFAULT NULL COMMENT 'Identifier for the quiz this question belongs to',
  `question` text DEFAULT NULL COMMENT 'The text of the question',
  `correct_answer` text DEFAULT NULL COMMENT 'The correct answer to the question',
  `image` varchar(255) DEFAULT NULL COMMENT 'URL to an image associated with the question',
  `comment` text DEFAULT NULL COMMENT 'Additional comments or explanation for the question',
  `date_created` datetime DEFAULT NULL COMMENT 'Date and time when the question was created',
  `date_updated` datetime DEFAULT NULL COMMENT 'Date and time when the question was updated',
  PRIMARY KEY (`question_id`),
  KEY `question` (`question`(768)),
  KEY `correct_answer` (`correct_answer`(768)),
  KEY `comment` (`comment`(768)),
  KEY `quiz_id` (`quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table to store questions for quizzes';

--
-- Truncate table before insert `questions`
--

TRUNCATE TABLE `questions`;
-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

DROP TABLE IF EXISTS `quizzes`;
CREATE TABLE IF NOT EXISTS `quizzes` (
  `quiz_id` varchar(36) NOT NULL COMMENT 'Unique identifier for each quiz',
  `subject_id` varchar(36) DEFAULT NULL COMMENT 'Identifier for the subject of the quiz',
  `level_id` varchar(36) DEFAULT NULL COMMENT 'Identifier for the level of the quiz',
  `category_id` varchar(36) DEFAULT NULL COMMENT 'Identifier for the category of the quiz',
  `year_or_form` varchar(6) DEFAULT NULL COMMENT 'The year or form of the quiz',
  `date_created` datetime DEFAULT NULL COMMENT 'Date and time when the quiz was created',
  `date_updated` datetime DEFAULT NULL COMMENT 'Date and time when the quiz was updated',
  PRIMARY KEY (`quiz_id`),
  KEY `year_or_form` (`year_or_form`),
  KEY `quizzes_ibfk_1` (`subject_id`),
  KEY `quizzes_ibfk_2` (`level_id`),
  KEY `quizzes_ibfk_3` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table to store quizzes and their metadata';

--
-- Truncate table before insert `quizzes`
--

TRUNCATE TABLE `quizzes`;
--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`quiz_id`, `subject_id`, `level_id`, `category_id`, `year_or_form`, `date_created`, `date_updated`) VALUES
('3e9d98ef-5e09-469f-8525-4505008bfa74', '19c22c36-5187-4011-b881-40481630d4ae', 'a6f14132-cb80-412d-b294-9ee35059cdc7', 'e05a3459-0563-4d1d-9ee9-7c24f25b5790', '2021', '2024-09-05 13:16:25', '2024-09-05 13:16:25'),
('51a38700-11ba-4c0f-99a6-99539789076e', '19c22c36-5187-4011-b881-40481630d4ae', 'a6f14132-cb80-412d-b294-9ee35059cdc7', 'e05a3459-0563-4d1d-9ee9-7c24f25b5790', '2022', '2024-08-14 14:04:28', '2024-08-14 14:04:28'),
('672116f5-2bef-4a97-b0c0-ccb2cc4f383e', '19c22c36-5187-4011-b881-40481630d4ae', 'a6f14132-cb80-412d-b294-9ee35059cdc7', 'e05a3459-0563-4d1d-9ee9-7c24f25b5790', '2024', '2024-08-13 15:59:48', '2024-08-14 15:37:47'),
('e9319765-39b2-4277-897e-dcf1009a0b78', '19c22c36-5187-4011-b881-40481630d4ae', 'a6f14132-cb80-412d-b294-9ee35059cdc7', 'e05a3459-0563-4d1d-9ee9-7c24f25b5790', '2023', '2024-08-12 17:39:33', '2024-08-14 11:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

DROP TABLE IF EXISTS `scores`;
CREATE TABLE IF NOT EXISTS `scores` (
  `score_id` varchar(36) NOT NULL COMMENT 'Unique identifier for each score entry',
  `user_id` varchar(36) DEFAULT NULL COMMENT 'Identifier for the user this score belongs to',
  `quiz_id` varchar(36) DEFAULT NULL COMMENT 'Identifier for the quiz this score belongs to',
  `score` int(11) DEFAULT NULL COMMENT 'Score obtained by the user',
  `total` int(11) DEFAULT NULL COMMENT 'Total possible score for the quiz',
  `date` datetime DEFAULT NULL COMMENT 'Date and time when the quiz was taken',
  PRIMARY KEY (`score_id`),
  KEY `user_id` (`user_id`),
  KEY `quiz_id` (`quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table to store quiz scores for users';

--
-- Truncate table before insert `scores`
--

TRUNCATE TABLE `scores`;
-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `subject_id` varchar(36) NOT NULL COMMENT 'Unique identifier for each subject',
  `subject_title` varchar(128) DEFAULT NULL COMMENT 'Title of the subject like maths, english',
  `date_created` datetime DEFAULT NULL COMMENT 'Date and time when the subject was created',
  `date_updated` datetime DEFAULT NULL COMMENT 'Date and time when the subject was updated',
  PRIMARY KEY (`subject_id`),
  UNIQUE KEY `subject_title` (`subject_title`),
  KEY `subject_title_2` (`subject_title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table to store different subjects';

--
-- Truncate table before insert `subjects`
--

TRUNCATE TABLE `subjects`;
--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_title`, `date_created`, `date_updated`) VALUES
('13db9133-0ffa-4332-82f5-00e870172c1e', 'English Language', '2024-09-05 13:14:13', '2024-09-05 13:14:13'),
('19c22c36-5187-4011-b881-40481630d4ae', 'Core Mathematics', '2024-08-12 13:16:32', '2024-08-12 17:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(36) NOT NULL COMMENT 'Unique identifier for each user',
  `first_name` varchar(68) DEFAULT NULL COMMENT 'First name of the user',
  `last_name` varchar(68) DEFAULT NULL COMMENT 'Last name of the user',
  `contact` varchar(10) DEFAULT NULL COMMENT 'Contact number of the user',
  `email` varchar(128) DEFAULT NULL COMMENT 'Email address of the user',
  `password` varchar(255) DEFAULT NULL COMMENT 'Hashed password of the user',
  `role` char(16) DEFAULT 'student' COMMENT 'Role of the user in the system',
  `school_name` varchar(255) DEFAULT NULL COMMENT 'Name of the school the user is affiliated with',
  `level_id` varchar(36) DEFAULT NULL COMMENT 'Identifier for the level the user is in',
  `date_created` datetime DEFAULT NULL COMMENT 'Date and time when the user account was created',
  `date_updated` datetime DEFAULT NULL COMMENT 'Date and time when the user account was updated',
  `terms` char(8) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `users_ibfk_1` (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table to store user information';

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users` 
--

--
-- Users password ***incorrect***
--
INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `contact`, `email`, `password`, `role`, `school_name`, `level_id`, `date_created`, `date_updated`, `terms`) VALUES
('03a470f0-3dff-45af-b482-78e25e492c57', 'Irbba', 'Devs', '0200000001', 'admin@quiz.com', '$2y$10$MkFj.CDNZYskfUNIVaXOhOYXLXpqLqadTEZ8eTYbNI9GbIFq0N.GK', 'admin', 'Best Engineers School', '4d09acc5-7e4c-4919-ad13-e0aa7098bc4a', '2024-09-05 18:06:03', '2024-09-06 21:20:34', NULL),
('42423003-4586-438d-8594-de23ae48dc81', 'Ray', 'Berth', '024000002', 'rayberth@quiz.com', '$2y$10$9OgVVcUc3xoQI7SKXey/PO3VPDNYAkj50frBiQ1g2BAFn/2KF/Bje', 'student', 'Software Developers Academy', '4d09acc5-7e4c-4919-ad13-e0aa7098bc4a', '2024-07-31 03:26:05', '2024-09-06 21:20:15', NULL);

--
-- Users password ***incorrect***
--

--
-- Constraints for dumped tables
--

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quizzes_ibfk_2` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quizzes_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `scores_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
