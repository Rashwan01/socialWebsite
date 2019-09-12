-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2019 at 01:23 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socail`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment_body` text NOT NULL,
  `comment_by` varchar(60) NOT NULL,
  `comment_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_body`, `comment_by`, `comment_to`, `date_added`, `removed`, `post_id`) VALUES
(29, 'iam crazy', 'Sayed5d619f85b2f12', 'Sayed5d619f85b2f12', '2019-08-24 22:36:40', 'no', 73),
(30, 'hello nice to meet you', 'Sayed5d619f85b2f12', 'Ahmed5d5c8df558d30', '2019-08-24 22:40:09', 'no', 75),
(31, 'hello', 'Ahmed5d5c8df558d30', 'Ahmed5d5c8df558d30', '2019-08-24 23:13:27', 'no', 74),
(32, 'berlin', 'Sayed5d619f85b2f12', 'Sayed5d619f85b2f12', '2019-08-25 00:37:30', 'no', 78),
(33, 'sk', 'Sayed5d619f85b2f12', 'Sayed5d619f85b2f12', '2019-08-25 00:42:50', 'no', 76),
(34, 'nice', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-08-25 18:27:13', 'no', 81),
(35, 'iam crazy', 'Sayed5d62eefe1cac4', 'Sayed5d62eefe1cac4', '2019-08-25 22:27:45', 'no', 84),
(36, 'berlinbelmd', 'Ahmed5d5c8df558d30', 'Ahmed5d5c8df558d30', '2019-08-25 22:38:48', 'no', 86),
(37, 'hell', 'Ahmed5d5c8df558d30', 'Ahmed5d5c8df558d30', '2019-08-25 22:55:41', 'no', 89),
(38, 'iam sayed', 'Ahmed5d5c8df558d30', 'Ahmed5d5c8df558d30', '2019-08-25 22:59:40', 'no', 88),
(39, 'iam ahmed', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-08-25 23:00:00', 'no', 91),
(40, 'nsdas', 'Ahmed5d5c8df558d30', 'Ahmed5d5c8df558d30', '2019-08-26 21:14:55', 'no', 92),
(41, '\r\nksdk', 'Sayed5d62f61d364f1', 'Sayed5d62f61d364f1', '2019-08-26 22:52:50', 'no', 140),
(42, 'hello', 'Ahmed5d5c8df558d30', 'Ahmed5d5c8df558d30', '2019-08-26 23:26:27', 'no', 146),
(43, 'jkasdhkas,', 'Ahmed5d5c8df558d30', 'Ahmed5d5c8df558d30', '2019-08-26 23:31:54', 'no', 154),
(44, 'Fuck all', 'Ahmed5d5c8df558d30', 'Ahmed5d5c8df558d30', '2019-09-06 23:55:41', 'no', 154),
(45, 'hello ahmed nice to meet You', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-11 18:13:44', 'no', 154),
(46, '???? ??????', 'Ahmed5d5c8df558d30', 'Ahmed5d5c8df558d30', '2019-09-11 19:32:22', 'no', 156),
(47, 'Hello man', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-09-11 20:55:52', 'no', 142);

-- --------------------------------------------------------

--
-- Table structure for table `friendreq`
--

CREATE TABLE `friendreq` (
  `id` int(11) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  `user_from` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friendreq`
--

INSERT INTO `friendreq` (`id`, `user_to`, `user_from`, `date`) VALUES
(1, 'Ali5d61a0dfda0fa', 'Ahmed5d5c8df558d30', '2019-08-26 21:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `username`, `post_id`) VALUES
(136, 'Sayed5d62f61d364f1', 141),
(137, 'Ahmed5d5c8df558d30', 144),
(138, 'Ahmed5d5c8df558d30', 145),
(139, 'Ahmed5d5c8df558d30', 146),
(140, 'Ahmed5d5c8df558d30', 147),
(141, 'Ahmed5d5c8df558d30', 152),
(143, 'Ahmed5d5c8df558d30', 153),
(144, 'Ahmed5d5c8df558d30', 151),
(145, 'Ahmed5d5c8df558d30', 155),
(146, 'Ahmed5d5c8df558d30', 141),
(147, 'Ahmed5d5c8df558d30', 156),
(148, 'Ahmed5d5c8df558d30', 142),
(149, 'Ahmed5d5c8df558d30', 154),
(150, 'Ahmed5d5c8df558d30', 157),
(151, 'Ahmed5d5c8df558d30', 158);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `user_from` varchar(255) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `body`, `user_from`, `user_to`, `date`) VALUES
(1, 'heello man iam ahmed', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-27 08:06:27'),
(2, 'fuck', 'Ali5d61a0dfda0fa', 'Ahmed5d5c8df558d30', '2019-08-08 07:23:29'),
(3, 'hello ahmed', 'Sayed5d619f85b2f12', 'Ahmed5d5c8df558d30', '2019-08-15 10:00:00'),
(4, 'hello again', 'Sayed5d619f85b2f12', 'Ahmed5d5c8df558d30', '2019-08-13 09:00:00'),
(5, 'hello ali ', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-16 04:11:00'),
(6, 'hello sayed your are still here', 'Ahmed5d5c8df558d30', 'Sayed5d619f85b2f12', '2019-08-14 00:32:00'),
(7, 'heelo tokio', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-08-01 08:30:00'),
(9, 'asmnasm', 'Ali5d61a0dfda0fa', 'Ahmed5d5c8df558d30', '2019-08-25 19:21:31'),
(10, 'fuck you ali', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 19:22:16'),
(11, 'sdmsdm', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 19:24:22'),
(12, 'sdmsdm', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 19:24:24'),
(13, 'snma', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 19:24:48'),
(14, 'snma', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 19:24:49'),
(15, 'nsabjasbn', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 19:25:15'),
(16, 'asnma', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 19:25:55'),
(17, 'amsnnmas', 'Ahmed5d5c8df558d30', 'Sayed5d619f85b2f12', '2019-08-25 19:26:32'),
(18, 'amsnnmasasmdn', 'Ahmed5d5c8df558d30', 'Sayed5d619f85b2f12', '2019-08-25 19:26:35'),
(19, 'namsasnm', 'Ahmed5d5c8df558d30', 'Sayed5d619f85b2f12', '2019-08-25 19:27:18'),
(20, 'namsasnm', 'Ahmed5d5c8df558d30', 'Sayed5d619f85b2f12', '2019-08-25 19:27:23'),
(21, 'fck man', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 19:28:08'),
(24, 'askkmask', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 19:29:47'),
(25, 'asmnnasm', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 19:29:51'),
(26, 'hello tokio', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-08-25 19:30:21'),
(27, 'asmasnm', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 19:33:23'),
(28, 'askjmasm', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 19:33:32'),
(29, 'a7aaaaaaaaaaaa', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 19:33:40'),
(30, 'hello tokio', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-08-25 19:34:15'),
(31, 'asdbkas', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 19:41:55'),
(32, 'anmsdnas', 'Ahmed5d5c8df558d30', 'Sayed5d619f85b2f12', '2019-08-25 19:42:01'),
(33, 'asdnmbas,', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 19:45:52'),
(34, 'aksdmasd\n', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 19:56:09'),
(35, 'masasm\n', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 20:04:30'),
(36, 'amsndbasd\n', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 20:04:49'),
(37, 'asdkasnas\n', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 20:04:52'),
(38, 'aa\n', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 20:05:00'),
(39, 'a7a\n', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 20:05:06'),
(40, 'so7a\n', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 20:05:08'),
(41, 'ms,a\n', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 20:15:58'),
(42, 'asnmd\n', 'Ahmed5d5c8df558d30', 'Eslam5d62d98eb5764', '2019-08-25 20:59:53'),
(43, 'hello\n', 'Eslam5d62d98eb5764', 'Ahmed5d5c8df558d30', '2019-08-25 21:01:25'),
(44, 'hello ali\n', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 21:58:32'),
(45, 'hello\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-08-25 23:07:34'),
(46, 'asnmd,asd\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-08-25 23:07:46'),
(47, 'mscnmsd\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-08-25 23:07:50'),
(48, 'zmcnx\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-08-25 23:07:53'),
(49, 'asmdnasdm,\n', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-08-25 23:08:36'),
(50, 'm,nsd\n', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 23:08:41'),
(51, 'msdnmd\n', 'Ahmed5d5c8df558d30', 'Ali5d61a0dfda0fa', '2019-08-25 23:08:53'),
(52, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'Tokio5d62b639d8233', 'Ahmed5d5c8df558d30', '2019-08-25 14:00:00'),
(53, '\n', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-08-25 23:57:44'),
(54, 'nmsa\n', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-08-25 23:57:59'),
(55, 'laskdm\n', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-08-25 23:58:01'),
(56, 'sas,md\n', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-08-25 23:59:23'),
(57, 'asm,nd\n', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-08-25 23:59:53'),
(58, 'kadnak\n', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-08-26 21:19:56'),
(59, 'ksd\n', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-08-26 21:20:03'),
(60, 'kasnd\n', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-08-26 21:20:09'),
(61, 'aksdn\n', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-08-26 21:20:14'),
(62, 'hi\n', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-08-26 21:20:22'),
(63, 'helli\n', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-08-26 21:20:28'),
(64, '.\n', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-08-26 21:20:35'),
(65, 'ahmed\n', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-08-26 21:20:39'),
(66, 'hello\n', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-08-26 21:20:45'),
(67, 'm cxz\n', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-08-26 21:20:48'),
(68, 'hello shady\n', 'Ahmed5d5c8df558d30', 'Shady5d6301b6d2b6c', '2019-08-30 22:48:54'),
(69, 'how are you\n', 'Ahmed5d5c8df558d30', 'Shady5d6301b6d2b6c', '2019-08-30 22:49:12'),
(70, 'fine?\n', 'Ahmed5d5c8df558d30', 'Shady5d6301b6d2b6c', '2019-08-30 22:49:23'),
(71, 'Hello\n', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-09-07 00:07:06'),
(72, 'Hi\n', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-09-07 00:07:11'),
(73, 'How are you\n', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-09-07 00:07:17'),
(74, 'fuck\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-11 18:13:56'),
(75, 'man!\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-11 18:14:01'),
(76, 'nmsdm\n', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-09-12 00:50:28'),
(77, 'masasd\n', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-09-12 00:50:31'),
(78, 'nmsdm\n', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-09-12 00:51:31'),
(79, 'asmnmas\n', 'Ahmed5d5c8df558d30', 'Eslam5d62d98eb5764', '2019-09-12 00:54:43'),
(80, 'Hello\n', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-09-12 13:18:27'),
(81, 'How are you\n', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-09-12 13:18:34'),
(82, '?\n', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-09-12 13:18:42'),
(83, 'Man', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-09-12 13:18:49'),
(84, 'Fuxk', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-09-12 13:19:07'),
(85, 'So quite', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-09-12 13:19:13'),
(86, 'Hell man', 'Ahmed5d5c8df558d30', 'Eslam5d62d98eb5764', '2019-09-12 23:46:02'),
(87, 'How are U', 'Ahmed5d5c8df558d30', 'Eslam5d62d98eb5764', '2019-09-12 23:46:08'),
(88, 'So hi', 'Ahmed5d5c8df558d30', 'Eslam5d62d98eb5764', '2019-09-12 23:46:13'),
(89, 'Berlino', 'Ahmed5d5c8df558d30', 'Eslam5d62d98eb5764', '2019-09-12 23:46:26'),
(90, 'How are U', 'Ahmed5d5c8df558d30', 'Eslam5d62d98eb5764', '2019-09-12 23:46:31'),
(91, 'hello\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-12 23:48:18'),
(92, 'Hello', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-09-12 23:48:27'),
(93, 'heel\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-12 23:48:44'),
(94, 'Soquite', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-09-12 23:48:48'),
(95, 'ok\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-12 23:48:59'),
(96, 'sajm\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-12 23:56:56'),
(97, 'msa\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-12 23:59:22'),
(98, 'asnmas\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-13 00:01:08'),
(99, 'asnm\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-13 00:03:21'),
(100, 'asjk\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-13 00:03:58'),
(101, 'ammsn\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-13 00:20:08'),
(102, 'hgjgjh\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-13 00:26:14'),
(103, 'Fuxk', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-09-13 00:26:54'),
(104, '?\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-13 00:27:08'),
(105, 'vvxcv\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-13 00:27:38'),
(106, 'Merci', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-09-13 00:28:14'),
(107, 'hmgh\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-13 00:28:35'),
(108, 'jhjj\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-13 00:28:43'),
(109, 'Thanks', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-09-13 00:28:50'),
(110, 'sddfdf\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-13 00:28:59'),
(111, 'Lol', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-09-13 00:29:07'),
(112, 'Fuck au man', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-09-13 00:29:16'),
(113, 'no\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-13 00:29:30'),
(114, 'All father and mother', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-09-13 00:29:42'),
(115, 'Merci mqn', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-09-13 00:29:49'),
(116, '??', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-09-13 00:30:40'),
(117, 'what\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-13 00:31:21'),
(118, '>>\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-13 00:31:37'),
(119, 'How are U i miss U', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-09-13 00:31:56'),
(120, 'ok\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-13 00:32:01'),
(121, 'heelo\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-13 00:32:38'),
(122, 'Howb are you man', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-09-13 00:32:54'),
(123, '?\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-13 00:33:02'),
(124, 'fine\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-13 00:33:12'),
(125, 'Ok', 'Ahmed5d5c8df558d30', 'Tokio5d62b639d8233', '2019-09-13 00:50:02'),
(126, 'fgfg\n', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-09-13 00:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `add_by` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL,
  `post_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `add_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`, `post_img`) VALUES
(139, 'hello guys', 'Sayed5d62f61d364f1', 'none', '2019-08-26 22:37:19', 'no', 'no', 0, 'none'),
(140, 'am,ssam,', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-08-26 22:45:44', 'no', 'no', 0, 'none'),
(141, 'askdsmad', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-08-26 22:48:37', 'no', 'no', 2, 'assetWebsite/images/post_img/58352avatar-female-3.jpg'),
(142, 'hello ahmed iam syaed', 'Sayed5d62f61d364f1', 'Ahmed5d5c8df558d30', '2019-08-26 23:03:40', 'no', 'no', 1, 'assetWebsite/images/post_img/13587avatar-male-2.jpg'),
(143, 'hello sayed', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-08-26 23:08:27', 'no', 'no', 0, 'assetWebsite/images/post_img/28160blog-detailfull.jpg'),
(144, 'hello friends', 'Ahmed5d5c8df558d30', 'none', '2019-08-26 23:11:13', 'no', 'no', 1, 'none'),
(145, 'iam ahmed', 'Ahmed5d5c8df558d30', 'none', '2019-08-26 23:11:23', 'no', 'no', 1, 'none'),
(146, 'ahmed mostafa', 'Ahmed5d5c8df558d30', 'none', '2019-08-26 23:26:21', 'no', 'no', 1, 'none'),
(150, 'ahmed mostafa ', 'Ahmed5d5c8df558d30', 'none', '2019-08-26 23:30:01', 'no', 'no', 0, 'none'),
(151, 'ahmed mostafa', 'Ahmed5d5c8df558d30', 'none', '2019-08-26 23:30:12', 'no', 'no', 1, 'assetWebsite/images/post_img/65785bloggrid-mas-1.jpg'),
(152, '', 'Ahmed5d5c8df558d30', 'none', '2019-08-26 23:30:22', 'no', 'no', 1, 'assetWebsite/images/post_img/98173blog-detailfull.jpg'),
(153, 'hello sayed', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-08-26 23:31:02', 'no', 'no', 1, 'none'),
(154, 'happy birthday', 'Ahmed5d5c8df558d30', 'Sayed5d62f61d364f1', '2019-08-26 23:31:18', 'no', 'no', 1, 'assetWebsite/images/post_img/58453bloglist-3.jpg'),
(155, 'Ahmed when he is bad boy', 'Ahmed5d5c8df558d30', 'none', '2019-09-11 19:31:23', 'no', 'no', 1, 'assetWebsite/images/post_img/22326IMG-20190910-WA0007.jpg'),
(156, '', 'Ahmed5d5c8df558d30', 'none', '2019-09-11 19:32:05', 'no', 'no', 1, 'assetWebsite/images/post_img/96717FB_IMG_1568120305436.jpg'),
(157, 'Hello every body iam ahmed mostafa', 'Ahmed5d5c8df558d30', 'none', '2019-09-11 20:56:34', 'no', 'no', 1, 'none'),
(158, 'Hello every body iam ahmed Mostafa ????', 'Ahmed5d5c8df558d30', 'none', '2019-09-11 20:56:40', 'no', 'no', 1, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_data` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friends_array` text NOT NULL,
  `cover_url` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `about` text NOT NULL,
  `following` text NOT NULL,
  `followers` text NOT NULL,
  `block_friends` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `signup_data`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friends_array`, `cover_url`, `phone`, `status`, `about`, `following`, `followers`, `block_friends`) VALUES
(15, 'ahmed', 'Mostafa', 'Ahmed5d5c8df558d30', 'ahmedelmasry55555@gmail.com', 'da38ed3e8a7fe1b81d059b4d4fa6ab7f', '2019-08-21', 'assetWebsite/images/ap.jpg', 16, 12, 'no', ',Tokio5d62b639d8233,Eslam5d62d98eb5764,Shady5d6301b6d2b6c,Sayed5d62f61d364f1,', 'assetWebsite/images/pro.jpg', '01090510796', 'online', '												ahmed mostafa ibrahim Fcis boiasldmkj\r\n											', ',Eslam5d62d98eb5764,Tokio5d62b639d8233,Ali5d61a0dfda0fa,Sayed5d62f61d364f1,', ',Sayed5d62f61d364f1,', ',Sayed5d62f61d364f1,'),
(18, 'Ali', 'Ali', 'Ali5d61a0dfda0fa', 'ali@gmail.com', 'da38ed3e8a7fe1b81d059b4d4fa6ab7f', '2019-08-24', 'assetWebsite/images/resources/bloglist-2.jpg', 0, 0, 'on', ',', 'assetWebsite/images/resources/timeline-4.jpg', '010100000', 'offline', 'iam good man', ',', ',Ahmed5d5c8df558d30,', ','),
(19, 'Tokio', 'Alaa', 'Tokio5d62b639d8233', 'tokio@gmail.com', 'da38ed3e8a7fe1b81d059b4d4fa6ab7f', '2019-08-25', 'assetWebsite/images/uploads/44001clouds-daylight-forest-592077.jpg', 0, 0, 'on', ',Ahmed5d5c8df558d30,', 'assetWebsite/images/uploads/31903animal-animal-photography-canidae-45242.jpg', '010100000', 'male', 'iam good mann]', ',', ',Ahmed5d5c8df558d30,Ahmed5d5c8df558d30,', ','),
(20, 'Eslam', 'Mostafa', 'Eslam5d62d98eb5764', 'eslam@gmail.com', 'da38ed3e8a7fe1b81d059b4d4fa6ab7f', '2019-08-25', 'assetWebsite/images/uploads/79804playstation_gamepad_crash_22102_1920x1080.jpg', 0, 0, 'on', ',Ahmed5d5c8df558d30,', 'assetWebsite/images/uploads/75594animal-animal-photography-canidae-45242.jpg', '010100000', 'male', 'iam good man', ',', ',Ahmed5d5c8df558d30,Ahmed5d5c8df558d30,', ','),
(23, 'Sayed', 'Kamel', 'Sayed5d62f61d364f1', 'sayed@gmail.com', 'da38ed3e8a7fe1b81d059b4d4fa6ab7f', '2019-08-25', 'assetWebsite/images/uploads/7472179804playstation_gamepad_crash_22102_1920x1080.jpg', 4, 11, 'on', ',Ahmed5d5c8df558d30,', 'assetWebsite/images/uploads/1783325557animal-animal-photography-canidae-45242.jpg', '010100000', 'male', 'iam good man', ',Ahmed5d5c8df558d30,', ',Ahmed5d5c8df558d30,', ','),
(24, 'Shady', 'Omar', 'Shady5d6301b6d2b6c', 'shady@gmail.com', '66e04540964ae7e69315b6a2fa8b128a', '2019-08-25', 'assetWebsite/images/resources/bloglist-2.jpg', 0, 0, 'on', ',Ahmed5d5c8df558d30,', 'assetWebsite/images/resources/timeline-4.jpg', '010100000', 'male', 'iam good man', ',', ',', ''),
(25, 'Soma', 'Soma', 'Soma5d657490bd488', 'somaaaa@gmail.com', '66e04540964ae7e69315b6a2fa8b128a', '2019-08-27', 'assetWebsite/images/resources/bloglist-2.jpg', 0, 0, 'on', ',', 'assetWebsite/images/resources/timeline-4.jpg', '010100000', 'male', 'iam good man', ',', ',', ''),
(26, 'Sami', 'Sami', 'Sami5d65758a00f07', 'sami@gmail.com', '149c8aa9f2fe21ec96167d7f3fcc7269', '2019-08-27', 'assetWebsite/images/resources/bloglist-2.jpg', 0, 0, 'on', ',', 'assetWebsite/images/resources/timeline-4.jpg', '010100000', 'male', 'iam good man', ',', ',', ''),
(27, 'Berlino', 'Berlino', 'Berlino5d657657a5763', 'berlinoo@gmail.com', '66e04540964ae7e69315b6a2fa8b128a', '2019-08-27', 'assetWebsite/images/resources/bloglist-2.jpg', 0, 0, 'on', ',', 'assetWebsite/images/resources/timeline-4.jpg', '010100000', 'male', 'iam good man', ',', ',', ''),
(28, 'Ahmed', 'Mohamed', 'Ahmed5d657883b3a07', 'ahmedelmasry555555@gmail.com', '66e04540964ae7e69315b6a2fa8b128a', '2019-08-27', 'assetWebsite/images/resources/bloglist-2.jpg', 0, 0, 'on', ',', 'assetWebsite/images/resources/timeline-4.jpg', '010100000', 'male', 'iam good man', ',', ',', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friendreq`
--
ALTER TABLE `friendreq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `friendreq`
--
ALTER TABLE `friendreq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
