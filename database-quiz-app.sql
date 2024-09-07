-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2024 at 11:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
-- Dumping data for table `forgot`
--

INSERT INTO `forgot` (`forgot_id`, `user_id`, `code`, `expire`, `date_created`) VALUES
('02eceb01-f082-4424-9750-59c393cef9b5', '42423003-4586-438d-8594-de23ae48dc81', '916275', 1725236945, '2024-09-02 00:00:00'),
('03ef7399-3bb3-49da-b8fb-63f84c24032f', '42423003-4586-438d-8594-de23ae48dc81', '650259', 1725241703, '2024-09-02 00:00:00'),
('15854294-6eee-4cd8-8525-4db7e2350a97', '42423003-4586-438d-8594-de23ae48dc81', '487839', 1725241473, '2024-09-02 00:00:00'),
('195f9dff-b833-4a00-ba52-3c7051d6269b', '42423003-4586-438d-8594-de23ae48dc81', '339103', 1725237941, '2024-09-02 00:00:00'),
('19d4682d-450d-4ce3-a6cd-052e373d97e8', '42423003-4586-438d-8594-de23ae48dc81', '359331', 1725238203, '2024-09-02 00:00:00'),
('1c2203a5-f1f8-4cfb-8fba-951b0736c788', '42423003-4586-438d-8594-de23ae48dc81', '046213', 1725237502, '2024-09-02 00:00:00'),
('1c6a0535-34d1-4a10-9f2a-6a2a4368a3a2', '42423003-4586-438d-8594-de23ae48dc81', '024666', 1725354139, '2024-09-03 00:00:00'),
('21638f10-d9e3-4270-b73a-b1af1e2b8afa', '42423003-4586-438d-8594-de23ae48dc81', '532320', 1725236539, '2024-09-02 00:00:00'),
('223ed414-b712-4143-acb8-fd01e536e374', '42423003-4586-438d-8594-de23ae48dc81', '429804', 1725231419, '2024-09-01 00:00:00'),
('23809f47-052c-464f-84e6-124e23d3cc22', '42423003-4586-438d-8594-de23ae48dc81', '523684', 1725237599, '2024-09-02 00:00:00'),
('257f3cb2-631b-4e6f-a618-9c71f34c9502', '42423003-4586-438d-8594-de23ae48dc81', '922111', 1725236948, '2024-09-02 00:00:00'),
('27221424-2e80-45a9-97c6-709fd5a67cd2', '42423003-4586-438d-8594-de23ae48dc81', '794962', 1725361800, '2024-09-03 00:00:00'),
('28e4712a-23b7-4adf-b3b6-f08663e81fe5', '42423003-4586-438d-8594-de23ae48dc81', '607063', 1725237704, '2024-09-02 00:00:00'),
('28e7604f-1b15-4d89-bbb2-f1e6abf179fd', '42423003-4586-438d-8594-de23ae48dc81', '184503', 1725237889, '2024-09-02 00:00:00'),
('2e572ba8-baad-40de-a0c4-0a1e559a4a15', '42423003-4586-438d-8594-de23ae48dc81', '320144', 1725236230, '2024-09-02 00:00:00'),
('315716a7-b39e-4440-85fa-a03cb071e5ae', '42423003-4586-438d-8594-de23ae48dc81', '262787', 1725239470, '2024-09-02 00:00:00'),
('384346b1-bf6e-48fb-9f1a-47952d0b66c2', '42423003-4586-438d-8594-de23ae48dc81', '848078', 1725361469, '2024-09-03 00:00:00'),
('3911125f-a471-4de6-9d61-673b423cef41', '42423003-4586-438d-8594-de23ae48dc81', '165186', 1725236834, '2024-09-02 00:00:00'),
('3d08854d-5eb6-49ea-8323-f0b2dccd940e', '42423003-4586-438d-8594-de23ae48dc81', '453329', 1725236863, '2024-09-02 00:00:00'),
('3e8bf55d-d9a3-453c-83d4-be54d024c733', '42423003-4586-438d-8594-de23ae48dc81', '806067', 1725356210, '2024-09-03 00:00:00'),
('3f5834a2-7279-4ced-a991-5bb710c6e2aa', '42423003-4586-438d-8594-de23ae48dc81', '324903', 1725236171, '2024-09-02 00:00:00'),
('4104e2e1-b9c0-4ee6-b5db-b731253a6af9', '42423003-4586-438d-8594-de23ae48dc81', '237051', 1725238049, '2024-09-02 00:00:00'),
('440e9dce-0c3c-4ba1-bf70-02ddeb1e25f8', '42423003-4586-438d-8594-de23ae48dc81', '884083', 1725237731, '2024-09-02 00:00:00'),
('4a10d95c-b8e8-47df-8cb4-cb12f34051c0', '67bf8286-198b-4f1c-8c80-cba953dde18e', '660010', 1725542583, '2024-09-05 00:00:00'),
('4dc6b146-effe-4dc9-9f46-774280286713', '42423003-4586-438d-8594-de23ae48dc81', '305937', 1725354932, '2024-09-03 00:00:00'),
('4ec8103c-b509-4b41-a773-71c65cea4ff0', '42423003-4586-438d-8594-de23ae48dc81', '022661', 1725207024, '2024-09-01 00:00:00'),
('50ae81e4-7fbc-4168-829d-aae95ce2fed3', '42423003-4586-438d-8594-de23ae48dc81', '162755', 1725208913, '2024-09-01 00:00:00'),
('56716af8-8293-4a6d-ac25-db15d0a50603', '42423003-4586-438d-8594-de23ae48dc81', '393172', 1725237536, '2024-09-02 00:00:00'),
('57200a92-eeef-44a5-bbac-06885c5f032d', '42423003-4586-438d-8594-de23ae48dc81', '957143', 1725238060, '2024-09-02 00:00:00'),
('5b66a3e9-568a-4642-9bfe-6542d0705139', '42423003-4586-438d-8594-de23ae48dc81', '946701', 1725236986, '2024-09-02 00:00:00'),
('5d833d73-193a-4601-bb28-945c7402a8ae', '42423003-4586-438d-8594-de23ae48dc81', '274342', 1725361096, '2024-09-03 00:00:00'),
('5fa637d9-19b6-4da0-97a7-13327833bf7e', '42423003-4586-438d-8594-de23ae48dc81', '582728', 1725237715, '2024-09-02 00:00:00'),
('66e9f50b-8cd4-4865-84cb-071eb810f3f0', '42423003-4586-438d-8594-de23ae48dc81', '572985', 1725233136, '2024-09-01 00:00:00'),
('7439e85b-932c-48ca-a3cb-a11109b4c99a', '42423003-4586-438d-8594-de23ae48dc81', '389223', 1725239608, '2024-09-02 00:00:00'),
('77bb1a7d-e5d3-416d-8502-0b795463f4aa', '42423003-4586-438d-8594-de23ae48dc81', '451567', 1725237559, '2024-09-02 00:00:00'),
('7af9ec43-02a4-4632-9f19-4e1f57867593', '42423003-4586-438d-8594-de23ae48dc81', '210066', 1725236479, '2024-09-02 00:00:00'),
('7dbc12ca-c536-475e-a94a-a829774609fd', '42423003-4586-438d-8594-de23ae48dc81', '897665', 1725238028, '2024-09-02 00:00:00'),
('860ff3cd-dd10-498d-ab33-935489df28c7', '42423003-4586-438d-8594-de23ae48dc81', '208322', 1725237981, '2024-09-02 00:00:00'),
('8aa18c0c-460c-43a0-a641-8c2317da154e', '42423003-4586-438d-8594-de23ae48dc81', '796540', 1725235662, '2024-09-02 00:00:00'),
('8dd2cced-9fcb-4f0c-befd-4bd34348a89b', '42423003-4586-438d-8594-de23ae48dc81', '845627', 1725239281, '2024-09-02 00:00:00'),
('91759479-061a-49da-a552-bac367f5c70b', '42423003-4586-438d-8594-de23ae48dc81', '878931', 1725237838, '2024-09-02 00:00:00'),
('9275e81e-84b7-4b22-8976-eb8bf523986a', '42423003-4586-438d-8594-de23ae48dc81', '370817', 1725458224, '2024-09-04 00:00:00'),
('9373b041-5744-45c6-b05f-817d706e3e46', '42423003-4586-438d-8594-de23ae48dc81', '066245', 1725236885, '2024-09-02 00:00:00'),
('9519c085-67ed-4beb-8096-3eed620b3420', 'fb95cd74-8cea-4abc-b5a4-7aa4511517a9', '140411', 1725299661, '2024-09-02 00:00:00'),
('998b3985-3c01-49ec-9ac6-66be53a64d92', '42423003-4586-438d-8594-de23ae48dc81', '639274', 1725232750, '2024-09-01 00:00:00'),
('99acd870-a839-49f1-8dfb-c44a90d4f5dd', '42423003-4586-438d-8594-de23ae48dc81', '212169', 1725235606, '2024-09-02 00:00:00'),
('a1a8dd59-3c5a-4b46-a0bd-233524798ea8', '42423003-4586-438d-8594-de23ae48dc81', '116577', 1725240377, '2024-09-02 00:00:00'),
('a5460d92-b71d-4bb1-a35f-a6ecf3a646f9', '42423003-4586-438d-8594-de23ae48dc81', '599258', 1725229717, '2024-09-01 00:00:00'),
('a8af3f75-b8f0-471e-8c5e-1ea6beb3df48', '67bf8286-198b-4f1c-8c80-cba953dde18e', '215620', 1725543418, '2024-09-05 00:00:00'),
('accef708-0572-404e-a9c3-99fbbe5fb3e0', '42423003-4586-438d-8594-de23ae48dc81', '912040', 1725543075, '2024-09-05 00:00:00'),
('ada25c03-0378-4fd8-80c6-d86ac906395b', '42423003-4586-438d-8594-de23ae48dc81', '910146', 1725237037, '2024-09-02 00:00:00'),
('b101db1c-04d1-4a38-b0c9-8a52fe9edd7b', '42423003-4586-438d-8594-de23ae48dc81', '525762', 1725237637, '2024-09-02 00:00:00'),
('b2e98cad-9172-4752-9fc2-c3a65f491871', '42423003-4586-438d-8594-de23ae48dc81', '814985', 1725242276, '2024-09-02 00:00:00'),
('b3aab689-a6b1-4c0e-910e-a8eb6fb81d9e', '67bf8286-198b-4f1c-8c80-cba953dde18e', '606290', 1725542936, '2024-09-05 00:00:00'),
('b561f208-5478-471f-90c5-ff5a053ff139', '42423003-4586-438d-8594-de23ae48dc81', '587012', 1725236974, '2024-09-02 00:00:00'),
('b6eaa2ae-f54e-4158-a50f-60fdf6c439a6', '42423003-4586-438d-8594-de23ae48dc81', '745770', 1725353963, '2024-09-03 00:00:00'),
('b76f75b9-446d-4e59-9357-eabc7ccdd548', '42423003-4586-438d-8594-de23ae48dc81', '702542', 1725241581, '2024-09-02 00:00:00'),
('b7d86474-d56b-459b-97c5-bc0b4009102f', '42423003-4586-438d-8594-de23ae48dc81', '089686', 1725230670, '2024-09-01 00:00:00'),
('b9a45936-91f1-4023-838e-d3efeceb83e6', '42423003-4586-438d-8594-de23ae48dc81', '667185', 1725207847, '2024-09-01 00:00:00'),
('bbcf814d-51ac-48e4-9aa5-38bdf26878a8', '42423003-4586-438d-8594-de23ae48dc81', '802836', 1725237480, '2024-09-02 00:00:00'),
('be901f9a-5d0a-4c2b-8535-32f46cbbef17', '67bf8286-198b-4f1c-8c80-cba953dde18e', '432052', 1725545019, '2024-09-05 00:00:00'),
('c6f2c064-9064-45b3-972d-bbb46f7773d8', '42423003-4586-438d-8594-de23ae48dc81', '963652', 1725241794, '2024-09-02 00:00:00'),
('c80818b9-6c11-4608-84c3-41d594165b0e', '42423003-4586-438d-8594-de23ae48dc81', '562541', 1725229241, '2024-09-01 00:00:00'),
('c97b381c-456a-4745-9eb3-21a395e4250d', '42423003-4586-438d-8594-de23ae48dc81', '761744', 1725237900, '2024-09-02 00:00:00'),
('ceece6c6-91bb-45e9-b98a-79b34ecf78ae', '42423003-4586-438d-8594-de23ae48dc81', '098563', 1725236790, '2024-09-02 00:00:00'),
('d236b632-3b0b-471a-90c5-66898259c9e1', '42423003-4586-438d-8594-de23ae48dc81', '754988', 1725237011, '2024-09-02 00:00:00'),
('d94c1b54-aab1-42cd-9eee-dae433b17e78', '42423003-4586-438d-8594-de23ae48dc81', '082739', 1725236082, '2024-09-02 00:00:00'),
('db353b79-7a7f-4af6-b447-a23f83465654', '42423003-4586-438d-8594-de23ae48dc81', '733520', 1725238981, '2024-09-02 00:00:00'),
('dd48de36-4df7-4e8c-85e8-f60f8bce437a', '42423003-4586-438d-8594-de23ae48dc81', '400176', 1725241312, '2024-09-02 00:00:00'),
('e2c8a4c3-def2-4baa-b779-a1968678c9a3', '42423003-4586-438d-8594-de23ae48dc81', '914863', 1725353920, '2024-09-03 00:00:00'),
('ef778439-54d4-4a11-bfe8-25482a007a92', '42423003-4586-438d-8594-de23ae48dc81', '714068', 1725353022, '2024-09-03 00:00:00'),
('f3748458-d3ea-459d-b5dc-f364ecf557d4', '42423003-4586-438d-8594-de23ae48dc81', '842023', 1725360868, '2024-09-03 00:00:00'),
('f3757d3d-da2b-48e0-b36b-9a08e141ad72', '42423003-4586-438d-8594-de23ae48dc81', '363155', 1725240870, '2024-09-02 00:00:00'),
('f4f1a853-5043-44e5-ad4c-49debc64d08b', '42423003-4586-438d-8594-de23ae48dc81', '701266', 1725237490, '2024-09-02 00:00:00'),
('f4f702c0-38a6-4a6a-914b-8344b263a999', '42423003-4586-438d-8594-de23ae48dc81', '693968', 1725236492, '2024-09-02 00:00:00'),
('f59cf81e-d84e-4eca-9d5b-29551efffd3e', '42423003-4586-438d-8594-de23ae48dc81', '110065', 1725237844, '2024-09-02 00:00:00'),
('f8b538e2-6be2-4deb-bd44-04314cab9e84', '42423003-4586-438d-8594-de23ae48dc81', '311486', 1725231097, '2024-09-01 00:00:00'),
('ff76fc97-553b-4b22-beb0-13fe9a3c95ce', '42423003-4586-438d-8594-de23ae48dc81', '163482', 1725360683, '2024-09-03 00:00:00'),
('fffcf250-1f66-4725-b42c-fc45b9ef7a5a', '42423003-4586-438d-8594-de23ae48dc81', '878894', 1725361451, '2024-09-03 00:00:00');

-- --------------------------------------------------------

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

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `contact`, `email`, `password`, `role`, `school_name`, `level_id`, `date_created`, `date_updated`, `terms`) VALUES
('03a470f0-3dff-45af-b482-78e25e492c57', 'Ray', 'Berth', '0205823707', 'irbbawebsdev@gmail.com', '$2y$10$MkFj.CDNZYskfUNIVaXOhOYXLXpqLqadTEZ8eTYbNI9GbIFq0N.GK', 'admin', 'St. Augustinus School', '4d09acc5-7e4c-4919-ad13-e0aa7098bc4a', '2024-09-05 18:06:03', '2024-09-06 21:20:34', NULL),
('1ca3dbe4-9d53-4583-bbe3-ea129266a2e2', 'Philip Arhin', 'Tetteh', '0543836985', 'philiptetteharhin@gmail.com', '$2y$10$KIQC4E6TDpohT22Tdbhce.lddHmzLZ0yhIV7yH4WtGHKIc49FvGqm', 'student', 'Takoradi Technical Institute', '4d09acc5-7e4c-4919-ad13-e0aa7098bc4a', '2024-09-05 14:13:50', '2024-09-05 14:13:50', ''),
('2431e75a-8adb-43f8-bcc6-33249b2fd29d', 'Marcel', 'Saint Patrick', '0242098597', 'marcel@quiz.com', '$2y$10$SaZJ/.BXhjDuKlz2T2lfQu.wwzRmV8gFUIJVAnpZIj//m/jaxexiC', 'student', 'Founders Of Greatness School', '4d09acc5-7e4c-4919-ad13-e0aa7098bc4a', '2024-08-04 22:31:01', '2024-09-06 20:47:29', NULL),
('42423003-4586-438d-8594-de23ae48dc81', 'Raymond', 'Affedzie', '0247692388', 'raymondaffedzie@gmail.com', '$2y$10$9OgVVcUc3xoQI7SKXey/PO3VPDNYAkj50frBiQ1g2BAFn/2KF/Bje', 'admin', 'St Marys Boys School', '4d09acc5-7e4c-4919-ad13-e0aa7098bc4a', '2024-07-31 03:26:05', '2024-09-06 21:20:15', NULL),
('5136a447-d1df-47da-aa34-fa5330a97586', 'Maxwell', 'Adams', '0205823777', 'maxadams@quiz.com', '$2y$10$yKPySP.FR/DRydGe4S.EGuPAXyxhgb/tELUFN3GWNiND6Ia6kUbw2', 'student', 'Synclair International School', 'a6f14132-cb80-412d-b294-9ee35059cdc7', '2024-08-14 16:02:42', '2024-08-14 16:21:30', NULL),
('51b9d812-ad55-4def-9bbc-52fdeacf29f7', 'Fathimatu', 'Abass', '0552857100', 'fati@quiz.com', '$2y$10$Av3umCXsFKrV9pa3Lz5Af./osQD3bdWDh5psEEZEE.sAdruMU43OG', 'student', 'Takoradi Technical Institute', NULL, '2024-08-09 12:16:26', '2024-08-09 12:16:26', ''),
('60563ff8-a474-4fb7-8c92-e18a6abecd65', 'Michael', 'Tate', '0252098597', 'ma@quiz.com', '$2y$10$iuMya8bK1P7zGL2Syryly.I.Mn1lEFpBG115rZOWNOUNDNWx5OnzC', 'student', 'Peek Finders Academy', 'a6f14132-cb80-412d-b294-9ee35059cdc7', '2024-08-05 15:06:29', '2024-09-06 20:48:39', NULL),
('6134f7d8-5c5a-4e39-8c07-d9f651234ea1', 'Douglas Twumasi', 'Fish', '0245511543', 'manciouz@gmail.com', '$2y$10$X/fz1hvemMKEXiHhlNarj.in.tY6.k/77uVBvZt6YC0MEPq/pBRp6', 'student', 'Takoradi Technical Institute', NULL, '2024-08-01 15:13:00', '2024-08-01 15:13:00', ''),
('67bf8286-198b-4f1c-8c80-cba953dde18e', 'Godfred', 'Eduam', '0594485384', 'geduam78@gmail.com', '$2y$10$LFuzJ15yweNsewMIdMV9Ju9mMIBvIzTqxYwzA0iLtpK2Y0ENH./Ju', 'student', 'Takoradi Technical Institute', '4d09acc5-7e4c-4919-ad13-e0aa7098bc4a', '2024-09-05 13:05:29', '2024-09-05 13:05:29', ''),
('79aa9c8a-b81d-4292-a502-de09e4703ee5', 'Christopher', 'Nketsia', '0207514200', 'christophernketsia@quiz.com', '$2y$10$w2y0rBl/9tCo/Y5aK.d20O3Iw.WHLZWv/QrDS1Kf4ldpt50ntYzzm', 'student', 'Young Generation Academy', NULL, '2024-08-09 12:58:48', '2024-08-09 15:19:42', NULL),
('8d81b738-b0bf-4e7e-873f-b4f6fd593e0e', 'Jason', 'Stephens', '0248165601', 'jasonstephens@email.com', '$2y$10$VoOF.EX5NqVlN69S2rhi4.RpgYXSK0x9e07RhT5UHQWvFMZPhwkZK', 'student', 'Soar Higher Academy', 'a6f14132-cb80-412d-b294-9ee35059cdc7', '2024-08-05 14:59:15', '2024-08-14 16:31:52', NULL),
('9f52d247-d086-4801-9be6-835b47f2f67a', 'John', 'Fish', '0552057597', 'johnfish@quiz.com', '$2y$10$dpT8T8GEoSLDTTn54mgAFujeNexvaV.g7TR2D62bsB2SmInffjUmO', 'student', 'Takoradi Technical Institute', NULL, '2024-08-09 11:43:35', '2024-08-09 11:43:35', ''),
('e903bb88-4968-44d5-a313-da163a9f0be9', 'Michael', 'Adams', '0552817597', 'adamsm@quiz.com', '$2y$10$rkR81gwu3KlK4NIkPA1xs.usD7YE0trXZg4/zeuzot7YmRJAqw9Lm', 'student', 'Livingstone Academy', 'a6f14132-cb80-412d-b294-9ee35059cdc7', '2024-08-04 22:38:19', '2024-08-14 16:43:17', NULL),
('ec2b2c18-ced4-431a-be27-80e715a7b92e', 'Jack', 'Ryan', '0256523777', 'jackryan@quiz.com', '$2y$10$dYTK9B30j/2y2Is09ZpcdOWNAF.tBfKdDYuhJy2PctIvhtloiW8Wy', 'student', 'Livingstone Academy', 'a6f14132-cb80-412d-b294-9ee35059cdc7', '2024-08-14 16:40:37', '2024-08-14 16:40:37', ''),
('ecac82dc-6563-473d-9f62-d95606c12758', 'Branden', 'Cooper Saxe', '0212356789', 'email@email.com', '$2y$10$tRz9JtDCjZCZmrIojXl/8OLxh2qtQ0eQ3Er7MBKUD73zP9MjVWrfq', 'student', 'Creedo Internation School', 'a6f14132-cb80-412d-b294-9ee35059cdc7', '2024-08-01 06:05:28', '2024-09-06 20:49:40', ''),
('fb95cd74-8cea-4abc-b5a4-7aa4511517a9', 'Helen', 'Daniels', '0598297382', 'helendaniels442@gmail.com', '$2y$10$MxxL73Qe5kAw2YekufcHO.XWUEVUJmemYrUCdmeMrSWMzthOTdTXa', 'admin', 'HuniValley Senior High', '4d09acc5-7e4c-4919-ad13-e0aa7098bc4a', '2024-09-02 17:48:48', '2024-09-05 18:09:52', '');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
