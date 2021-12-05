-- phpMyAdmin SQL Dump
-- version 5.0.4deb2ubuntu5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2021 at 02:51 PM
-- Server version: 8.0.27-0ubuntu0.21.10.1
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easybank`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `creation_date`, `is_deleted`, `id_user`) VALUES
(61, '', '', '2021-12-03 12:24:25', 1, 8),
(62, 'poaopdk', 'fqddqf', '2021-12-03 12:24:37', 1, 8),
(63, 'fffd', 'Hello world my name is poqkzdpo', '2021-12-03 12:24:41', 1, 8),
(64, 'Qu&#39;est-ce que le Lorem Ipsum?', 'qzdqsdd', '2021-12-03 16:50:04', 0, 8),
(65, '', '', '2021-12-03 16:54:36', 1, 8),
(66, '', '', '2021-12-03 16:54:52', 1, 8),
(67, '', '', '2021-12-03 16:55:51', 1, 8),
(68, '', '', '2021-12-03 16:55:54', 1, 8),
(69, '', '', '2021-12-03 16:56:18', 1, 8),
(70, '', '', '2021-12-03 16:56:19', 1, 8),
(71, 'qzd', 'qzdqsd', '2021-12-03 16:56:22', 1, 8),
(72, 'qzd', 'qzdqsd', '2021-12-03 16:56:47', 1, 8),
(73, 'qzdqsdqzdqzd', 'qzdqsdddddqzqsd', '2021-12-03 16:57:47', 0, 8),
(74, 'dzdd', 'dzqdq', '2021-12-03 17:24:44', 0, 8),
(75, 'alert', 'fffeqf', '2021-12-04 18:42:50', 0, 8),
(76, 'poaopdk', 'fffeqf', '2021-12-04 18:42:50', 0, 8),
(77, 'qsd', 'qsd', '2021-12-05 01:19:12', 1, 8),
(78, 'qsd', 'qsd', '2021-12-05 01:19:12', 0, 8),
(79, 'qsdzqdsqd', 'qsd', '2021-12-05 01:19:16', 0, 8),
(80, 'qsd', 'qsd', '2021-12-05 01:19:17', 1, 8),
(81, '', '', '2021-12-05 01:25:29', 1, 8),
(82, '', '', '2021-12-05 01:25:29', 1, 8),
(83, 'd', 'd', '2021-12-05 01:26:04', 1, 8),
(84, 'qz', 'qzdzdqqzd', '2021-12-05 14:47:41', 0, 8),
(85, 'poaopdk', '41030\r\n', '2021-12-05 14:48:30', 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `log_system`
--

CREATE TABLE `log_system` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_article` int DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actionUtilisateur` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `log_system`
--

INSERT INTO `log_system` (`id`, `id_user`, `id_article`, `creation_date`, `actionUtilisateur`) VALUES
(8, 8, 63, '2021-12-03 11:31:00', 'qzdqsdqzdqsd'),
(9, 8, 63, '2021-12-03 11:31:14', 'test'),
(10, 8, 63, '2021-12-03 15:49:10', 'action non trouvé'),
(11, 8, 63, '2021-12-03 15:50:04', 'action non trouvé'),
(12, 8, 64, '2021-12-03 15:54:36', 'action non trouvé'),
(13, 8, 65, '2021-12-03 15:54:52', 'action non trouvé'),
(14, 8, 66, '2021-12-03 15:55:51', 'l\'utilisateur a été modifié'),
(15, 8, 67, '2021-12-03 15:55:54', 'l\'utilisateur a été modifié'),
(16, 8, 68, '2021-12-03 15:56:18', 'action non trouvé'),
(17, 8, 69, '2021-12-03 15:56:19', 'action non trouvé'),
(18, 8, 70, '2021-12-03 15:56:22', 'action non trouvé'),
(19, 8, 71, '2021-12-03 15:56:47', 'action non trouvé'),
(20, 8, 72, '2021-12-03 15:57:47', 'un nouveau article a été créé'),
(21, 8, 73, '2021-12-03 16:10:08', 'un nouveau article a été créé'),
(22, 8, 73, '2021-12-03 16:10:47', 'l\'article a été modifié'),
(23, 8, NULL, '2021-12-03 16:22:20', 'l\'article a été modifié'),
(24, 8, NULL, '2021-12-03 16:22:20', 'l\'article a été modifié'),
(25, 8, NULL, '2021-12-03 16:22:26', 'l\'article a été modifié'),
(26, 8, NULL, '2021-12-03 16:22:26', 'l\'article a été modifié'),
(27, 8, NULL, '2021-12-03 16:22:26', 'l\'article a été modifié'),
(28, 8, NULL, '2021-12-03 16:22:26', 'l\'article a été modifié'),
(29, 8, NULL, '2021-12-03 16:22:54', 'l\'article a été modifié'),
(30, 8, NULL, '2021-12-03 16:22:54', 'l\'utilisateur a été modifié'),
(31, 8, NULL, '2021-12-03 16:22:55', 'l\'article a été modifié'),
(32, 8, NULL, '2021-12-03 16:22:55', 'l\'utilisateur a été modifié'),
(33, 8, NULL, '2021-12-03 16:23:27', 'l\'utilisateur a été modifié'),
(34, 8, NULL, '2021-12-03 16:23:28', 'l\'utilisateur a été modifié'),
(35, 8, NULL, '2021-12-03 16:23:30', 'l\'utilisateur a été modifié'),
(36, 8, NULL, '2021-12-03 16:23:31', 'l\'utilisateur a été modifié'),
(37, 8, NULL, '2021-12-03 16:23:32', 'l\'utilisateur a été modifié'),
(38, 8, NULL, '2021-12-03 16:23:34', 'l\'utilisateur a été modifié'),
(39, 8, NULL, '2021-12-03 16:23:35', 'l\'utilisateur a été modifié'),
(40, 8, 73, '2021-12-03 16:24:44', 'un nouveau article a été créé'),
(41, 8, NULL, '2021-12-03 16:25:15', 'l\'utilisateur a été modifié'),
(42, 8, NULL, '2021-12-03 16:25:16', 'l\'utilisateur a été modifié'),
(43, 8, NULL, '2021-12-03 16:25:49', 'l\'utilisateur a été modifié'),
(44, 8, NULL, '2021-12-03 16:25:49', 'l\'utilisateur a été modifié'),
(45, 8, NULL, '2021-12-03 16:25:50', 'l\'utilisateur a été modifié'),
(46, 8, NULL, '2021-12-03 16:25:50', 'l\'utilisateur a été modifié'),
(47, 8, NULL, '2021-12-03 16:26:02', 'l\'utilisateur a été modifié'),
(48, 8, NULL, '2021-12-03 16:26:02', 'l\'utilisateur a été modifié'),
(49, 8, NULL, '2021-12-03 16:26:03', 'l\'utilisateur a été modifié'),
(50, 8, NULL, '2021-12-03 16:26:03', 'l\'utilisateur a été modifié'),
(51, 8, NULL, '2021-12-03 16:26:05', 'l\'utilisateur a été modifié'),
(52, 8, NULL, '2021-12-03 16:26:05', 'l\'utilisateur a été modifié'),
(53, 8, NULL, '2021-12-03 16:26:20', 'l\'utilisateur a été modifié'),
(54, 8, NULL, '2021-12-03 16:26:20', 'l\'utilisateur a été modifié'),
(55, 8, NULL, '2021-12-03 16:26:21', 'l\'utilisateur a été modifié'),
(56, 8, NULL, '2021-12-03 16:26:21', 'l\'utilisateur a été modifié'),
(57, 8, NULL, '2021-12-03 16:26:22', 'l\'utilisateur a été modifié'),
(58, 8, NULL, '2021-12-03 16:26:22', 'l\'utilisateur a été modifié'),
(59, 8, NULL, '2021-12-03 16:26:24', 'l\'utilisateur a été modifié'),
(60, 8, NULL, '2021-12-03 16:26:24', 'l\'utilisateur a été modifié'),
(61, 8, NULL, '2021-12-03 16:26:25', 'l\'utilisateur a été modifié'),
(62, 8, NULL, '2021-12-03 16:26:25', 'l\'utilisateur a été modifié'),
(63, 8, NULL, '2021-12-03 16:31:57', 'l\'utilisateur a été modifié'),
(64, 8, NULL, '2021-12-03 16:31:57', 'l\'utilisateur a été modifié'),
(65, 8, NULL, '2021-12-03 16:34:05', 'l\'utilisateur a été modifié'),
(66, 8, NULL, '2021-12-03 16:34:05', 'l\'utilisateur a été modifié'),
(69, 8, 70, '2021-12-03 16:34:28', 'l\'utilisateur a été modifié'),
(70, 8, 70, '2021-12-03 16:34:28', 'l\'utilisateur a été modifié'),
(71, 8, NULL, '2021-12-03 16:36:51', 'l\'utilisateur a été modifié'),
(72, 8, NULL, '2021-12-03 16:36:51', 'l\'utilisateur a été modifié'),
(73, 8, NULL, '2021-12-03 16:36:54', 'l\'utilisateur a été modifié'),
(74, 8, NULL, '2021-12-03 16:36:54', 'l\'utilisateur a été modifié'),
(75, 8, NULL, '2021-12-03 16:36:55', 'l\'utilisateur a été modifié'),
(76, 8, NULL, '2021-12-03 16:36:55', 'l\'utilisateur a été modifié'),
(77, 8, NULL, '2021-12-03 16:37:30', 'l\'utilisateur a été modifié'),
(78, 8, NULL, '2021-12-03 16:37:30', 'l\'utilisateur a été modifié'),
(79, 8, NULL, '2021-12-03 16:37:31', 'l\'utilisateur a été modifié'),
(80, 8, NULL, '2021-12-03 16:37:31', 'l\'utilisateur a été modifié'),
(81, 8, NULL, '2021-12-03 16:37:51', 'l\'utilisateur a été modifié'),
(82, 8, NULL, '2021-12-03 16:37:51', 'l\'utilisateur a été modifié'),
(83, 8, NULL, '2021-12-03 16:37:52', 'l\'utilisateur a été modifié'),
(84, 8, NULL, '2021-12-03 16:37:52', 'l\'utilisateur a été modifié'),
(85, 8, NULL, '2021-12-03 16:38:29', 'l\'utilisateur a été modifié'),
(86, 8, NULL, '2021-12-03 16:38:29', 'l\'utilisateur a été modifié'),
(87, 8, NULL, '2021-12-03 16:38:30', 'l\'utilisateur a été modifié'),
(88, 8, NULL, '2021-12-03 16:38:30', 'l\'utilisateur a été modifié'),
(89, 8, 71, '2021-12-03 16:39:10', 'l\'utilisateur a été modifié'),
(90, 8, 71, '2021-12-03 16:39:11', 'l\'utilisateur a été modifié'),
(91, 8, 71, '2021-12-03 16:41:15', 'l\'utilisateur a été modifié'),
(92, 8, 71, '2021-12-03 16:41:16', 'l\'utilisateur a été modifié'),
(93, 8, NULL, '2021-12-03 16:43:18', 'l\'utilisateur a été modifié'),
(94, 8, NULL, '2021-12-03 16:43:30', 'l\'utilisateur a été modifié'),
(95, 8, NULL, '2021-12-03 16:43:38', 'l\'utilisateur a été modifié'),
(96, 8, NULL, '2021-12-03 16:43:54', 'l\'utilisateur a été modifié'),
(97, 8, NULL, '2021-12-03 16:44:01', 'l\'utilisateur a été modifié'),
(98, 8, NULL, '2021-12-03 16:44:11', 'l\'utilisateur a été modifié'),
(99, 8, NULL, '2021-12-03 16:44:32', 'l\'utilisateur a été modifié'),
(100, 8, NULL, '2021-12-03 16:53:35', 'zqd'),
(101, 8, NULL, '2021-12-03 17:02:49', 'l\'utilisateur a été modifié'),
(102, 8, NULL, '2021-12-03 17:03:33', 'l\'utilisateur a été modifié'),
(103, 8, NULL, '2021-12-03 17:36:49', 'l\'utilisateur a été modifié'),
(104, 8, NULL, '2021-12-03 17:38:20', 'l\'utilisateur a été modifié'),
(105, 8, NULL, '2021-12-03 17:40:19', 'l\'utilisateur a été modifié'),
(106, 8, NULL, '2021-12-03 17:42:44', 'l\'utilisateur a été modifié'),
(107, 8, NULL, '2021-12-03 17:42:59', 'l\'utilisateur a été modifié'),
(108, 8, NULL, '2021-12-03 17:43:23', 'l\'utilisateur a été modifié'),
(109, 8, NULL, '2021-12-03 17:43:40', 'l\'utilisateur a été modifié'),
(110, 8, NULL, '2021-12-03 17:43:46', 'l\'utilisateur a été modifié'),
(111, 8, NULL, '2021-12-03 17:46:10', 'l\'utilisateur a été modifié'),
(112, 8, NULL, '2021-12-03 17:46:16', 'l\'utilisateur a été modifié'),
(113, 8, NULL, '2021-12-03 17:46:56', 'l\'utilisateur a été modifié'),
(114, 8, NULL, '2021-12-03 17:47:09', 'l\'utilisateur a été modifié'),
(115, 8, NULL, '2021-12-03 17:47:20', 'l\'utilisateur a été modifié'),
(116, 8, NULL, '2021-12-03 17:49:45', 'l\'utilisateur a été modifié'),
(117, 8, NULL, '2021-12-03 17:49:50', 'l\'utilisateur a été modifié'),
(118, 8, NULL, '2021-12-03 17:50:47', 'l\'utilisateur a été modifié'),
(119, 8, NULL, '2021-12-03 17:50:48', 'l\'utilisateur a été modifié'),
(120, 8, NULL, '2021-12-03 17:50:51', 'l\'utilisateur a été modifié'),
(121, 8, NULL, '2021-12-03 17:50:56', 'l\'utilisateur a été modifié'),
(122, 8, NULL, '2021-12-03 17:51:08', 'l\'utilisateur a été modifié'),
(123, 8, NULL, '2021-12-03 17:51:09', 'l\'utilisateur a été modifié'),
(124, 8, NULL, '2021-12-03 17:51:12', 'l\'utilisateur a été modifié'),
(125, 8, NULL, '2021-12-03 17:51:16', 'l\'utilisateur a été modifié'),
(126, 8, NULL, '2021-12-03 17:51:18', 'l\'utilisateur a été modifié'),
(127, 8, NULL, '2021-12-03 17:54:01', 'l\'utilisateur a été modifié'),
(128, 8, NULL, '2021-12-03 17:54:02', 'l\'utilisateur a été modifié'),
(129, 8, NULL, '2021-12-03 17:54:10', 'l\'utilisateur a été modifié'),
(130, 8, NULL, '2021-12-03 17:54:28', 'l\'utilisateur a été modifié'),
(131, 8, NULL, '2021-12-03 17:54:35', 'l\'utilisateur a été modifié'),
(132, 8, NULL, '2021-12-03 17:56:19', 'l\'utilisateur a été modifié'),
(133, 8, NULL, '2021-12-03 17:56:30', 'l\'utilisateur a été modifié'),
(134, 8, NULL, '2021-12-03 17:57:12', 'l\'utilisateur a été modifié'),
(135, 8, NULL, '2021-12-03 17:57:28', 'l\'utilisateur a été modifié'),
(136, 8, NULL, '2021-12-03 18:03:25', 'l\'utilisateur a été modifié'),
(137, 8, NULL, '2021-12-03 18:03:30', 'l\'utilisateur a été modifié'),
(138, 8, NULL, '2021-12-03 18:03:54', 'l\'utilisateur a été modifié'),
(139, 8, NULL, '2021-12-03 18:04:13', 'l\'utilisateur a été modifié'),
(143, 8, NULL, '2021-12-03 18:15:30', 'l\'utilisateur a été modifié'),
(144, 8, NULL, '2021-12-03 18:16:33', 'l\'utilisateur a été modifié'),
(145, 8, NULL, '2021-12-03 18:16:38', 'l\'utilisateur a été modifié'),
(146, 8, NULL, '2021-12-03 18:17:15', 'l\'utilisateur a été modifié'),
(147, 8, NULL, '2021-12-03 18:17:22', 'l\'utilisateur a été modifié'),
(148, 8, NULL, '2021-12-03 18:17:23', 'l\'utilisateur a été modifié'),
(149, 8, NULL, '2021-12-03 18:17:26', 'l\'utilisateur a été modifié'),
(150, 8, NULL, '2021-12-03 18:17:30', 'l\'utilisateur a été modifié'),
(151, 8, NULL, '2021-12-03 18:18:02', 'l\'utilisateur a été modifié'),
(152, 8, NULL, '2021-12-03 18:18:06', 'l\'utilisateur a été modifié'),
(153, 8, NULL, '2021-12-03 18:18:49', 'l\'utilisateur a été modifié'),
(154, 8, NULL, '2021-12-03 18:18:52', 'l\'utilisateur a été modifié'),
(155, 8, NULL, '2021-12-03 18:19:52', 'l\'utilisateur a été modifié'),
(156, 8, NULL, '2021-12-03 18:20:24', 'l\'utilisateur a été modifié'),
(157, 8, NULL, '2021-12-03 18:20:28', 'l\'utilisateur a été modifié'),
(158, 8, NULL, '2021-12-03 18:20:44', 'l\'utilisateur a été modifié'),
(159, 8, NULL, '2021-12-03 18:23:08', 'l\'utilisateur a été modifié'),
(160, 8, NULL, '2021-12-03 18:23:44', 'l\'utilisateur a été modifié'),
(161, 8, NULL, '2021-12-03 18:23:50', 'l\'utilisateur a été modifié'),
(162, 8, NULL, '2021-12-03 18:25:29', 'l\'utilisateur a été modifié'),
(163, 8, NULL, '2021-12-03 18:25:32', 'l\'utilisateur a été modifié'),
(164, 8, NULL, '2021-12-03 18:25:42', 'l\'utilisateur a été modifié'),
(165, 8, NULL, '2021-12-03 18:25:50', 'l\'utilisateur a été modifié'),
(166, 8, NULL, '2021-12-03 18:25:57', 'l\'utilisateur a été modifié'),
(167, 8, NULL, '2021-12-03 19:12:37', 'l\'utilisateur a été modifié'),
(168, 8, NULL, '2021-12-03 19:13:34', 'l\'utilisateur a été modifié'),
(169, 8, NULL, '2021-12-03 19:13:57', 'l\'utilisateur a été modifié'),
(170, 8, NULL, '2021-12-03 19:14:29', 'l\'utilisateur a été modifié'),
(171, 8, NULL, '2021-12-03 19:15:02', 'l\'utilisateur a été modifié'),
(172, 8, NULL, '2021-12-03 19:15:03', 'l\'utilisateur a été modifié'),
(173, 8, NULL, '2021-12-03 19:15:14', 'l\'utilisateur a été modifié'),
(174, 8, NULL, '2021-12-03 19:15:30', 'l\'utilisateur a été modifié'),
(175, 8, NULL, '2021-12-03 19:17:26', 'l\'utilisateur a été modifié'),
(176, 8, NULL, '2021-12-03 19:19:04', 'l\'utilisateur a été modifié'),
(177, 8, NULL, '2021-12-03 19:19:13', 'l\'utilisateur a été modifié'),
(178, 8, NULL, '2021-12-03 19:22:19', 'l\'utilisateur a été modifié'),
(179, 8, NULL, '2021-12-03 19:22:25', 'l\'utilisateur a été modifié'),
(180, 8, NULL, '2021-12-03 19:25:01', 'l\'utilisateur a été modifié'),
(181, 8, NULL, '2021-12-03 19:32:57', 'l\'utilisateur a été modifié'),
(182, 8, NULL, '2021-12-03 19:33:57', 'l\'utilisateur a été modifié'),
(183, 8, NULL, '2021-12-03 19:34:09', 'l\'utilisateur a été modifié'),
(184, 8, NULL, '2021-12-03 19:34:21', 'l\'utilisateur a été modifié'),
(185, 8, NULL, '2021-12-03 19:34:34', 'l\'utilisateur a été modifié'),
(186, 8, NULL, '2021-12-03 19:34:48', 'l\'utilisateur a été modifié'),
(187, 8, NULL, '2021-12-03 19:35:02', 'l\'utilisateur a été modifié'),
(188, 8, NULL, '2021-12-03 19:35:29', 'l\'utilisateur a été modifié'),
(189, 8, NULL, '2021-12-03 19:35:39', 'l\'utilisateur a été modifié'),
(190, 8, NULL, '2021-12-03 19:35:59', 'l\'utilisateur a été modifié'),
(191, 8, NULL, '2021-12-03 19:36:12', 'l\'utilisateur a été modifié'),
(192, 8, NULL, '2021-12-03 19:36:22', 'l\'utilisateur a été modifié'),
(193, 8, NULL, '2021-12-03 19:36:40', 'l\'utilisateur a été modifié'),
(194, 8, NULL, '2021-12-03 19:37:21', 'l\'utilisateur a été modifié'),
(195, 8, NULL, '2021-12-03 19:37:46', 'l\'utilisateur a été modifié'),
(196, 8, NULL, '2021-12-03 19:38:38', 'l\'utilisateur a été modifié'),
(197, 8, NULL, '2021-12-03 19:39:17', 'l\'utilisateur a été modifié'),
(198, 8, NULL, '2021-12-03 19:39:26', 'l\'utilisateur a été modifié'),
(199, 8, NULL, '2021-12-03 19:39:28', 'l\'utilisateur a été modifié'),
(200, 8, NULL, '2021-12-03 19:39:28', 'l\'utilisateur a été modifié'),
(201, 8, NULL, '2021-12-03 19:39:28', 'l\'utilisateur a été modifié'),
(202, 8, NULL, '2021-12-03 19:39:28', 'l\'utilisateur a été modifié'),
(203, 8, NULL, '2021-12-03 19:39:28', 'l\'utilisateur a été modifié'),
(204, 8, NULL, '2021-12-03 19:39:29', 'l\'utilisateur a été modifié'),
(205, 8, NULL, '2021-12-03 19:39:29', 'l\'utilisateur a été modifié'),
(206, 8, NULL, '2021-12-03 19:39:29', 'l\'utilisateur a été modifié'),
(207, 8, NULL, '2021-12-03 19:39:29', 'l\'utilisateur a été modifié'),
(208, 8, NULL, '2021-12-03 19:39:30', 'l\'utilisateur a été modifié'),
(209, 8, NULL, '2021-12-03 19:39:37', 'l\'utilisateur a été modifié'),
(210, 8, NULL, '2021-12-03 19:39:51', 'l\'utilisateur a été modifié'),
(211, 8, NULL, '2021-12-03 19:39:52', 'l\'utilisateur a été modifié'),
(212, 8, NULL, '2021-12-03 19:39:57', 'l\'utilisateur a été modifié'),
(213, 8, NULL, '2021-12-03 19:39:59', 'l\'utilisateur a été modifié'),
(214, 8, NULL, '2021-12-03 19:40:00', 'l\'utilisateur a été modifié'),
(215, 8, NULL, '2021-12-03 19:40:04', 'l\'utilisateur a été modifié'),
(216, 8, NULL, '2021-12-03 19:40:05', 'l\'utilisateur a été modifié'),
(217, 8, NULL, '2021-12-03 19:40:15', 'l\'utilisateur a été modifié'),
(218, 8, NULL, '2021-12-03 19:40:55', 'l\'utilisateur a été modifié'),
(219, 8, NULL, '2021-12-03 19:40:58', 'l\'utilisateur a été modifié'),
(220, 8, NULL, '2021-12-03 19:41:07', 'l\'utilisateur a été modifié'),
(221, 8, NULL, '2021-12-03 19:41:28', 'l\'utilisateur a été modifié'),
(222, 8, NULL, '2021-12-03 19:41:50', 'l\'utilisateur a été modifié'),
(223, 8, NULL, '2021-12-03 19:42:10', 'l\'utilisateur a été modifié'),
(224, 8, NULL, '2021-12-03 19:42:14', 'l\'utilisateur a été modifié'),
(225, 8, NULL, '2021-12-03 19:42:38', 'l\'utilisateur a été modifié'),
(226, 8, NULL, '2021-12-03 19:42:58', 'l\'utilisateur a été modifié'),
(227, 8, NULL, '2021-12-03 19:43:06', 'l\'utilisateur a été modifié'),
(228, 8, NULL, '2021-12-03 19:43:07', 'l\'utilisateur a été modifié'),
(229, 8, NULL, '2021-12-03 19:43:13', 'l\'utilisateur a été modifié'),
(230, 8, NULL, '2021-12-03 19:43:46', 'l\'utilisateur a été modifié'),
(231, 8, NULL, '2021-12-03 19:44:15', 'l\'utilisateur a été modifié'),
(232, 8, NULL, '2021-12-03 19:45:53', 'l\'utilisateur a été modifié'),
(233, 8, NULL, '2021-12-03 19:46:14', 'l\'utilisateur a été modifié'),
(234, 8, NULL, '2021-12-03 19:46:24', 'l\'utilisateur a été modifié'),
(235, 8, NULL, '2021-12-03 19:46:30', 'l\'utilisateur a été modifié'),
(236, 8, NULL, '2021-12-03 19:46:56', 'l\'utilisateur a été modifié'),
(237, 8, NULL, '2021-12-03 19:47:16', 'l\'utilisateur a été modifié'),
(238, 8, NULL, '2021-12-03 19:47:34', 'l\'utilisateur a été modifié'),
(239, 8, NULL, '2021-12-03 19:48:18', 'l\'utilisateur a été modifié'),
(240, 8, NULL, '2021-12-03 19:49:06', 'l\'utilisateur a été modifié'),
(241, 8, NULL, '2021-12-03 19:49:18', 'l\'utilisateur a été modifié'),
(242, 8, NULL, '2021-12-03 19:50:36', 'l\'utilisateur a été modifié'),
(243, 8, NULL, '2021-12-03 19:52:34', 'l\'utilisateur a été modifié'),
(244, 8, NULL, '2021-12-03 19:53:05', 'l\'utilisateur a été modifié'),
(245, 8, NULL, '2021-12-03 19:53:16', 'l\'utilisateur a été modifié'),
(246, 8, NULL, '2021-12-03 19:53:29', 'l\'utilisateur a été modifié'),
(247, 8, NULL, '2021-12-03 19:53:39', 'l\'utilisateur a été modifié'),
(248, 8, NULL, '2021-12-03 19:54:24', 'l\'utilisateur a été modifié'),
(249, 8, NULL, '2021-12-03 19:54:29', 'l\'utilisateur a été modifié'),
(250, 8, NULL, '2021-12-03 19:54:49', 'l\'utilisateur a été modifié'),
(251, 8, NULL, '2021-12-03 19:57:28', 'l\'utilisateur a été modifié'),
(252, 8, NULL, '2021-12-03 19:57:37', 'l\'utilisateur a été modifié'),
(253, 8, NULL, '2021-12-03 19:57:38', 'l\'utilisateur a été modifié'),
(254, 8, NULL, '2021-12-03 19:57:49', 'l\'utilisateur a été modifié'),
(255, 8, NULL, '2021-12-03 19:57:52', 'l\'utilisateur a été modifié'),
(256, 8, NULL, '2021-12-03 19:58:16', 'l\'utilisateur a été modifié'),
(257, 8, NULL, '2021-12-03 20:00:37', 'l\'utilisateur a été modifié'),
(258, 8, NULL, '2021-12-03 20:00:58', 'l\'utilisateur a été modifié'),
(259, 8, NULL, '2021-12-03 20:01:14', 'l\'utilisateur a été modifié'),
(260, 8, NULL, '2021-12-03 20:01:40', 'l\'utilisateur a été modifié'),
(261, 8, NULL, '2021-12-03 20:03:45', 'l\'utilisateur a été modifié'),
(262, 8, NULL, '2021-12-03 20:04:08', 'l\'utilisateur a été modifié'),
(263, 8, NULL, '2021-12-03 20:04:10', 'l\'utilisateur a été modifié'),
(264, 8, NULL, '2021-12-03 20:04:19', 'l\'utilisateur a été modifié'),
(265, 8, NULL, '2021-12-03 20:05:09', 'l\'utilisateur a été modifié'),
(266, 8, NULL, '2021-12-03 20:07:36', 'l\'utilisateur a été modifié'),
(267, 8, NULL, '2021-12-03 20:07:38', 'l\'utilisateur a été modifié'),
(268, 8, NULL, '2021-12-03 20:08:27', 'l\'utilisateur a été modifié'),
(269, 8, NULL, '2021-12-03 20:08:32', 'l\'utilisateur a été modifié'),
(270, 8, NULL, '2021-12-03 20:10:57', 'l\'utilisateur a été modifié'),
(271, 8, NULL, '2021-12-03 20:11:37', 'l\'utilisateur a été modifié'),
(272, 8, NULL, '2021-12-03 20:12:15', 'l\'utilisateur a été modifié'),
(273, 8, NULL, '2021-12-04 14:16:35', 'l\'utilisateur a été modifié'),
(274, 8, NULL, '2021-12-04 14:30:28', 'l\'utilisateur a été modifié'),
(275, 8, NULL, '2021-12-04 14:57:14', 'l\'utilisateur a été modifié'),
(276, 8, 74, '2021-12-04 15:17:47', 'l\'article a été modifié'),
(277, 8, 74, '2021-12-04 15:17:51', 'l\'article a été modifié'),
(278, 8, 74, '2021-12-04 15:17:54', 'l\'article a été modifié'),
(279, 8, NULL, '2021-12-04 15:30:24', 'l\'utilisateur a été modifié'),
(280, 8, NULL, '2021-12-04 15:40:42', 'l\'utilisateur a été mise à jour'),
(281, 8, NULL, '2021-12-04 16:05:36', 'l\'utilisateur a été mis à jour'),
(282, 8, NULL, '2021-12-04 16:08:17', 'l\'utilisateur a été mis à jour'),
(283, 8, NULL, '2021-12-04 16:08:26', 'l\'utilisateur a été mis à jour'),
(284, 8, NULL, '2021-12-04 16:09:16', 'l\'utilisateur a été mis à jour'),
(285, 8, NULL, '2021-12-04 16:09:18', 'l\'utilisateur a été mis à jour'),
(286, 8, NULL, '2021-12-04 16:09:46', 'l\'utilisateur a été mis à jour'),
(287, 8, NULL, '2021-12-04 16:09:49', 'l\'utilisateur a été mis à jour'),
(288, 8, NULL, '2021-12-04 16:09:55', 'l\'utilisateur a été mis à jour'),
(289, 8, NULL, '2021-12-04 16:10:06', 'l\'utilisateur a été mis à jour'),
(290, 8, NULL, '2021-12-04 16:10:07', 'l\'utilisateur a été mis à jour'),
(291, 8, NULL, '2021-12-04 16:10:58', 'l\'utilisateur a été mis à jour'),
(292, 8, NULL, '2021-12-04 16:11:01', 'l\'utilisateur a été mis à jour'),
(293, 8, NULL, '2021-12-04 16:11:02', 'l\'utilisateur a été mis à jour'),
(294, 8, NULL, '2021-12-04 16:11:03', 'l\'utilisateur a été mis à jour'),
(295, 8, NULL, '2021-12-04 16:11:03', 'l\'utilisateur a été mis à jour'),
(296, 8, NULL, '2021-12-04 16:11:11', 'l\'utilisateur a été mis à jour'),
(297, 8, NULL, '2021-12-04 16:30:56', 'l\'utilisateur a été mis à jour'),
(298, 8, NULL, '2021-12-04 16:33:20', 'l\'utilisateur a été mis à jour'),
(299, 8, NULL, '2021-12-04 16:33:58', 'l\'utilisateur a été mis à jour'),
(300, 8, NULL, '2021-12-04 16:34:03', 'l\'utilisateur a été mis à jour'),
(301, 8, NULL, '2021-12-04 16:34:09', 'l\'utilisateur a été mis à jour'),
(302, 8, NULL, '2021-12-04 16:34:27', 'l\'utilisateur a été mis à jour'),
(303, 8, NULL, '2021-12-04 16:42:03', 'l\'utilisateur a été mis à jour'),
(304, 8, NULL, '2021-12-04 16:42:09', 'l\'utilisateur a été mis à jour'),
(305, 8, NULL, '2021-12-04 16:42:09', 'l\'utilisateur a été mis à jour'),
(306, 8, NULL, '2021-12-04 16:42:11', 'l\'utilisateur a été mis à jour'),
(307, 8, NULL, '2021-12-04 16:42:11', 'l\'utilisateur a été mis à jour'),
(308, 8, NULL, '2021-12-04 16:42:16', 'l\'utilisateur a été mis à jour'),
(309, 8, NULL, '2021-12-04 16:42:16', 'l\'utilisateur a été mis à jour'),
(310, 8, NULL, '2021-12-04 16:42:36', 'l\'utilisateur a été mis à jour'),
(311, 8, NULL, '2021-12-04 16:42:42', 'l\'utilisateur a été mis à jour'),
(312, 8, NULL, '2021-12-04 16:42:43', 'l\'utilisateur a été mis à jour'),
(313, 8, NULL, '2021-12-04 16:43:47', 'l\'utilisateur a été mis à jour'),
(314, 8, NULL, '2021-12-04 16:44:08', 'l\'utilisateur a été mis à jour'),
(315, 8, NULL, '2021-12-04 16:44:15', 'l\'utilisateur a été mis à jour'),
(316, 8, NULL, '2021-12-04 16:44:17', 'l\'utilisateur a été mis à jour'),
(317, 8, NULL, '2021-12-04 16:44:26', 'l\'utilisateur a été mis à jour'),
(318, 8, NULL, '2021-12-04 16:44:47', 'l\'utilisateur a été mis à jour'),
(319, 8, NULL, '2021-12-04 16:44:54', 'l\'utilisateur a été mis à jour'),
(320, 8, NULL, '2021-12-04 16:44:55', 'l\'utilisateur a été mis à jour'),
(321, 8, NULL, '2021-12-04 16:44:58', 'l\'utilisateur a été mis à jour'),
(322, 8, NULL, '2021-12-04 16:54:22', 'l\'utilisateur a été mis à jour'),
(323, 8, NULL, '2021-12-04 16:54:23', 'l\'utilisateur a été mis à jour'),
(324, 8, NULL, '2021-12-04 16:54:23', 'l\'utilisateur a été mis à jour'),
(325, 8, NULL, '2021-12-04 16:58:11', 'l\'utilisateur a été mis à jour'),
(326, 8, NULL, '2021-12-04 16:58:16', 'l\'utilisateur a été mis à jour'),
(327, 8, NULL, '2021-12-04 17:01:33', 'l\'utilisateur a été mis à jour'),
(328, 8, NULL, '2021-12-04 17:01:48', 'l\'utilisateur a été mis à jour'),
(329, 8, NULL, '2021-12-04 17:07:09', 'l\'utilisateur a été mis à jour'),
(330, 8, 74, '2021-12-04 17:09:50', 'l\'article a été modifié'),
(331, 8, 74, '2021-12-04 17:10:29', 'l\'article a été modifié'),
(332, 8, NULL, '2021-12-04 17:13:07', 'l\'utilisateur a été mis à jour'),
(333, 8, NULL, '2021-12-04 17:13:16', 'l\'utilisateur a été mis à jour'),
(334, 8, NULL, '2021-12-04 17:14:13', 'l\'utilisateur a été mis à jour'),
(335, 8, NULL, '2021-12-04 17:16:14', 'l\'utilisateur a été mis à jour'),
(336, 8, NULL, '2021-12-04 17:16:19', 'l\'utilisateur a été mis à jour'),
(337, 8, NULL, '2021-12-04 17:16:34', 'l\'utilisateur a été mis à jour'),
(338, 8, NULL, '2021-12-04 17:16:38', 'l\'utilisateur a été mis à jour'),
(339, 8, NULL, '2021-12-04 17:17:05', 'l\'utilisateur a été mis à jour'),
(340, 8, NULL, '2021-12-04 17:17:19', 'l\'utilisateur a été mis à jour'),
(341, 8, NULL, '2021-12-04 17:17:30', 'l\'utilisateur a été mis à jour'),
(342, 8, NULL, '2021-12-04 17:17:40', 'l\'utilisateur a été mis à jour'),
(343, 8, NULL, '2021-12-04 17:21:21', 'l\'utilisateur a été mis à jour'),
(344, 8, NULL, '2021-12-04 17:21:23', 'l\'utilisateur a été mis à jour'),
(345, 8, NULL, '2021-12-04 17:21:41', 'l\'utilisateur a été mis à jour'),
(346, 8, NULL, '2021-12-04 17:22:19', 'l\'utilisateur a été mis à jour'),
(347, 8, 74, '2021-12-04 17:23:14', 'l\'article a été modifié'),
(348, 8, 74, '2021-12-04 17:25:29', 'l\'article a été modifié'),
(349, 8, 74, '2021-12-04 17:25:40', 'l\'article a été modifié'),
(350, 8, 74, '2021-12-04 17:25:43', 'l\'article a été modifié'),
(351, 8, 74, '2021-12-04 17:26:42', 'l\'article a été modifié'),
(352, 8, 74, '2021-12-04 17:26:57', 'l\'article a été modifié'),
(353, 8, 74, '2021-12-04 17:27:07', 'l\'article a été modifié'),
(354, 8, 74, '2021-12-04 17:27:27', 'l\'article a été modifié'),
(355, 8, 73, '2021-12-04 17:27:46', 'l\'article a été modifié'),
(356, 8, 73, '2021-12-04 17:28:14', 'l\'article a été modifié'),
(357, 8, 73, '2021-12-04 17:28:32', 'l\'article a été modifié'),
(358, 8, 73, '2021-12-04 17:28:33', 'l\'article a été modifié'),
(359, 8, 73, '2021-12-04 17:28:41', 'l\'article a été modifié'),
(360, 8, 74, '2021-12-04 17:40:04', 'l\'article a été modifié'),
(361, 8, 74, '2021-12-04 17:42:50', 'un nouveau article a été créé'),
(362, 8, NULL, '2021-12-04 17:43:57', 'l\'utilisateur a été mis à jour'),
(363, 8, 75, '2021-12-04 17:44:06', 'l\'article a été modifié'),
(364, 8, 75, '2021-12-04 23:28:10', 'l\'article a été modifié'),
(365, 8, 76, '2021-12-05 00:19:12', 'un nouveau article a été créé'),
(366, 8, 78, '2021-12-05 00:19:16', 'un nouveau article a été créé'),
(367, 8, 82, '2021-12-05 00:26:04', 'un nouveau article a été créé'),
(368, 8, 79, '2021-12-05 13:43:23', 'l\'article a été modifié'),
(369, 8, 79, '2021-12-05 13:43:52', 'l\'article a été modifié'),
(370, 8, 79, '2021-12-05 13:43:54', 'l\'article a été modifié'),
(371, 8, 84, '2021-12-05 13:48:30', 'un nouveau article a été créé'),
(372, 8, 85, '2021-12-05 13:49:38', 'l\'article a été modifié');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `img_profile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `mdp`, `date_de_naissance`, `img_profile`) VALUES
(8, 'Al-khatib', 'Mohamad', 'mohamad@localhost.com', '$argon2i$v=19$m=65536,t=4,p=1$b1VCWjhqRDBYLkJzNmk0SA$LRHTN5zQLUXAnOw1I6VOGZ4G2ZJOIQDmxSGW8d2s/EU', '1998-01-31', '61aba2b40bc09659442817.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `log_system`
--
ALTER TABLE `log_system`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `log_system`
--
ALTER TABLE `log_system`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log_system`
--
ALTER TABLE `log_system`
  ADD CONSTRAINT `log_system_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `log_system_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;