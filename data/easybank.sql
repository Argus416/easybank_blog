-- phpMyAdmin SQL Dump
-- version 5.0.4deb2ubuntu5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2021 at 12:22 AM
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
  `imgArticle` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `creation_date`, `imgArticle`, `is_deleted`, `id_user`) VALUES
(61, '', '', '2021-12-03 12:24:25', NULL, 1, 8),
(62, 'poaopdk', 'fqddqf', '2021-12-03 12:24:37', NULL, 1, 8),
(63, 'fffd', 'Hello world my name is poqkzdpo', '2021-12-03 12:24:41', NULL, 1, 8),
(64, 'Qu&#39;est-ce que le Lorem Ipsum?', 'qzdqsdd', '2021-12-03 16:50:04', NULL, 1, 8),
(65, '', '', '2021-12-03 16:54:36', NULL, 1, 8),
(66, '', '', '2021-12-03 16:54:52', NULL, 1, 8),
(67, '', '', '2021-12-03 16:55:51', NULL, 1, 8),
(68, '', '', '2021-12-03 16:55:54', NULL, 1, 8),
(69, '', '', '2021-12-03 16:56:18', NULL, 1, 8),
(70, '', '', '2021-12-03 16:56:19', NULL, 1, 8),
(71, 'qzd', 'qzdqsd', '2021-12-03 16:56:22', NULL, 1, 8),
(72, 'qzd', 'qzdqsd', '2021-12-03 16:56:47', NULL, 1, 8),
(73, 'qzdqsdqzdqzd', 'qzdqsdddddqzqsd', '2021-12-03 16:57:47', NULL, 1, 8),
(74, 'dzdd', 'dzqdq', '2021-12-03 17:24:44', NULL, 0, 8),
(75, 'alert', 'fffeqf', '2021-12-04 18:42:50', NULL, 1, 8),
(76, 'poaopdk', 'fffeqf', '2021-12-04 18:42:50', NULL, 0, 8),
(77, 'qsd', 'qsd', '2021-12-05 01:19:12', NULL, 1, 8),
(78, 'qsd', 'qsd', '2021-12-05 01:19:12', NULL, 1, 8),
(79, 'qsdzqdsqd', 'qsd', '2021-12-05 01:19:16', NULL, 1, 8),
(80, 'qsd', 'qsd', '2021-12-05 01:19:17', NULL, 1, 8),
(81, '', '', '2021-12-05 01:25:29', NULL, 1, 8),
(82, '', '', '2021-12-05 01:25:29', NULL, 1, 8),
(83, 'd', 'd', '2021-12-05 01:26:04', NULL, 1, 8),
(84, 'qz', 'qzdzdqqzd', '2021-12-05 14:47:41', NULL, 1, 8),
(85, 'poaopdkdddd', '41030\r\nd', '2021-12-05 14:48:30', NULL, 1, 8),
(86, 'zqd', 'zqd', '2021-12-05 17:32:24', NULL, 0, 8),
(87, '1', '1', '2021-12-05 20:55:08', NULL, 1, 8),
(88, 'poaopdk', 'd', '2021-12-05 20:55:54', NULL, 0, 8),
(89, 'd', 'd', '2021-12-05 21:29:05', NULL, 0, 8),
(90, 'qds', 'qsd', '2021-12-05 21:29:09', NULL, 1, 8),
(91, '', '123', '2021-12-05 21:57:25', NULL, 1, 8),
(92, '', '123', '2021-12-05 21:57:33', NULL, 1, 8),
(93, '', '123', '2021-12-05 21:57:55', NULL, 1, 8),
(94, '', 'qzd', '2021-12-05 21:58:49', NULL, 1, 8),
(95, '', 'qd', '2021-12-05 21:59:10', NULL, 1, 8),
(96, '', 'qd', '2021-12-05 21:59:25', NULL, 1, 8),
(97, '', 'qd', '2021-12-05 21:59:38', NULL, 1, 8),
(98, '', 'qzd', '2021-12-05 21:59:40', NULL, 1, 8),
(99, 'qzd', 'qzd', '2021-12-05 21:59:56', NULL, 1, 8),
(100, '132d', '654941', '2021-12-05 22:00:09', NULL, 0, 8),
(101, '13', '333\r\n', '2021-12-05 22:00:30', NULL, 1, 8),
(102, 'qzdqsd', 'qdsqsdqsdq', '2021-12-05 22:07:42', '61ad4254ed081857689044.jpg', 0, 8);

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
(1, 8, NULL, '2021-12-05 21:39:02', 'l\'utilisateur a été mis à jour'),
(2, 8, NULL, '2021-12-05 21:39:28', 'l\'utilisateur a été mis à jour'),
(3, 8, NULL, '2021-12-05 21:39:37', 'l\'utilisateur a été mis à jour'),
(4, 8, NULL, '2021-12-05 21:40:41', 'l\'utilisateur a été mis à jour'),
(5, 8, NULL, '2021-12-05 21:43:52', 'l\'utilisateur a été mis à jour'),
(6, 8, NULL, '2021-12-05 21:44:07', 'l\'utilisateur a été mis à jour'),
(7, 8, NULL, '2021-12-05 21:44:10', 'l\'utilisateur a été mis à jour'),
(8, 8, NULL, '2021-12-05 21:44:27', 'l\'utilisateur a été mis à jour'),
(9, 8, NULL, '2021-12-05 21:44:40', 'l\'utilisateur a été mis à jour'),
(11, 8, NULL, '2021-12-05 21:46:43', 'l\'utilisateur a été mis à jour'),
(12, 8, NULL, '2021-12-05 21:46:58', 'l\'utilisateur a été mis à jour'),
(13, 8, NULL, '2021-12-05 21:47:05', 'l\'utilisateur a été mis à jour'),
(14, 8, NULL, '2021-12-05 21:50:40', 'l\'utilisateur a été mis à jour'),
(15, 8, NULL, '2021-12-05 21:51:15', 'l\'utilisateur a été mis à jour'),
(16, 8, NULL, '2021-12-05 21:53:08', 'l\'utilisateur a été mis à jour'),
(17, 8, NULL, '2021-12-05 21:53:57', 'l\'utilisateur a été mis à jour'),
(18, 8, NULL, '2021-12-05 21:54:38', 'l\'utilisateur a été mis à jour'),
(19, 8, NULL, '2021-12-05 21:54:56', 'l\'utilisateur a été mis à jour'),
(20, 8, NULL, '2021-12-05 21:55:29', 'l\'utilisateur a été mis à jour'),
(21, 8, NULL, '2021-12-05 21:55:32', 'l\'utilisateur a été mis à jour'),
(22, 8, NULL, '2021-12-05 21:55:55', 'l\'utilisateur a été mis à jour'),
(23, 8, NULL, '2021-12-05 21:56:48', 'l\'utilisateur a été mis à jour'),
(24, 8, NULL, '2021-12-05 21:57:10', 'l\'utilisateur a été mis à jour'),
(25, 8, NULL, '2021-12-05 21:57:37', 'l\'utilisateur a été mis à jour'),
(26, 8, NULL, '2021-12-05 21:57:45', 'l\'utilisateur a été mis à jour'),
(27, 8, NULL, '2021-12-05 21:57:46', 'l\'utilisateur a été mis à jour'),
(28, 8, NULL, '2021-12-05 21:57:47', 'l\'utilisateur a été mis à jour'),
(29, 8, NULL, '2021-12-05 21:57:51', 'l\'utilisateur a été mis à jour'),
(30, 8, NULL, '2021-12-05 21:57:56', 'l\'utilisateur a été mis à jour'),
(31, 8, NULL, '2021-12-05 21:58:31', 'l\'utilisateur a été mis à jour'),
(32, 8, NULL, '2021-12-05 22:04:01', 'l\'utilisateur a été mis à jour'),
(33, 8, NULL, '2021-12-05 22:04:29', 'l\'utilisateur a été mis à jour'),
(34, 8, NULL, '2021-12-05 22:04:33', 'l\'utilisateur a été mis à jour'),
(35, 8, NULL, '2021-12-05 22:04:44', 'l\'utilisateur a été mis à jour'),
(36, 8, NULL, '2021-12-05 22:04:48', 'l\'utilisateur a été mis à jour'),
(37, 8, NULL, '2021-12-05 22:05:01', 'l\'utilisateur a été mis à jour'),
(38, 8, NULL, '2021-12-05 22:05:38', 'l\'utilisateur a été mis à jour'),
(39, 8, NULL, '2021-12-05 22:05:50', 'l\'utilisateur a été mis à jour'),
(40, 8, NULL, '2021-12-05 22:06:03', 'l\'utilisateur a été mis à jour'),
(41, 8, NULL, '2021-12-05 22:06:34', 'l\'utilisateur a été mis à jour'),
(42, 8, NULL, '2021-12-05 22:06:53', 'l\'utilisateur a été mis à jour'),
(43, 8, NULL, '2021-12-05 22:06:58', 'l\'utilisateur a été mis à jour'),
(44, 8, NULL, '2021-12-05 22:07:00', 'l\'utilisateur a été mis à jour'),
(45, 8, NULL, '2021-12-05 22:07:01', 'l\'utilisateur a été mis à jour'),
(46, 8, NULL, '2021-12-05 22:07:01', 'l\'utilisateur a été mis à jour'),
(47, 8, NULL, '2021-12-05 22:08:27', 'l\'utilisateur a été mis à jour'),
(48, 8, NULL, '2021-12-05 22:08:51', 'l\'utilisateur a été mis à jour'),
(49, 8, NULL, '2021-12-05 22:09:37', 'l\'utilisateur a été mis à jour'),
(50, 8, NULL, '2021-12-05 22:09:41', 'l\'utilisateur a été mis à jour'),
(51, 8, NULL, '2021-12-05 22:10:10', 'l\'utilisateur a été mis à jour'),
(52, 8, NULL, '2021-12-05 22:10:16', 'l\'utilisateur a été mis à jour'),
(53, 8, NULL, '2021-12-05 22:10:19', 'l\'utilisateur a été mis à jour'),
(54, 8, 102, '2021-12-05 22:30:45', 'l\'article a été modifié'),
(55, 8, 102, '2021-12-05 22:36:41', 'l\'article a été modifié'),
(56, 8, 102, '2021-12-05 22:36:56', 'l\'article a été modifié'),
(57, 8, 102, '2021-12-05 22:37:17', 'l\'article a été modifié'),
(58, 8, 102, '2021-12-05 22:37:18', 'l\'article a été modifié'),
(59, 8, 102, '2021-12-05 22:37:21', 'l\'article a été modifié'),
(60, 8, 102, '2021-12-05 22:37:48', 'l\'article a été modifié'),
(61, 8, 102, '2021-12-05 22:38:20', 'l\'article a été modifié'),
(62, 8, 102, '2021-12-05 22:38:21', 'l\'article a été modifié'),
(63, 8, 102, '2021-12-05 22:38:24', 'l\'article a été modifié'),
(64, 8, 102, '2021-12-05 22:38:39', 'l\'article a été modifié'),
(65, 8, 102, '2021-12-05 22:39:08', 'l\'article a été modifié'),
(66, 8, 102, '2021-12-05 22:39:30', 'l\'article a été modifié'),
(67, 8, 102, '2021-12-05 22:39:35', 'l\'article a été modifié'),
(68, 8, 102, '2021-12-05 22:40:06', 'l\'article a été modifié'),
(69, 8, 102, '2021-12-05 22:40:11', 'l\'article a été modifié'),
(70, 8, 102, '2021-12-05 22:40:48', 'l\'article a été modifié'),
(71, 8, 102, '2021-12-05 22:40:53', 'l\'article a été modifié'),
(72, 8, 102, '2021-12-05 22:41:17', 'l\'article a été modifié'),
(73, 8, 102, '2021-12-05 22:41:22', 'l\'article a été modifié'),
(74, 8, 102, '2021-12-05 22:41:35', 'l\'article a été modifié'),
(75, 8, 102, '2021-12-05 22:41:49', 'l\'article a été modifié'),
(76, 8, 102, '2021-12-05 22:42:55', 'l\'article a été modifié'),
(77, 8, 102, '2021-12-05 22:42:58', 'l\'article a été modifié'),
(78, 8, 102, '2021-12-05 22:43:36', 'l\'article a été modifié'),
(79, 8, 102, '2021-12-05 22:44:20', 'l\'article a été modifié'),
(80, 8, 102, '2021-12-05 22:45:24', 'l\'article a été modifié'),
(81, 8, 102, '2021-12-05 22:45:26', 'l\'article a été modifié'),
(82, 8, 102, '2021-12-05 22:45:44', 'l\'article a été modifié'),
(83, 8, 102, '2021-12-05 22:46:00', 'l\'article a été modifié'),
(84, 8, 102, '2021-12-05 22:46:15', 'l\'article a été modifié'),
(85, 8, 102, '2021-12-05 22:46:27', 'l\'article a été modifié'),
(86, 8, 102, '2021-12-05 22:46:32', 'l\'article a été modifié'),
(87, 8, 102, '2021-12-05 22:46:48', 'l\'article a été modifié'),
(88, 8, 102, '2021-12-05 22:46:59', 'l\'article a été modifié'),
(89, 8, 102, '2021-12-05 22:47:12', 'l\'article a été modifié'),
(90, 8, 102, '2021-12-05 22:47:52', 'l\'article a été modifié'),
(91, 8, 102, '2021-12-05 22:48:14', 'l\'article a été modifié'),
(92, 8, 102, '2021-12-05 22:49:27', 'l\'article a été modifié'),
(93, 8, 102, '2021-12-05 22:49:41', 'l\'article a été modifié'),
(94, 8, 102, '2021-12-05 22:49:45', 'l\'article a été modifié'),
(95, 8, 102, '2021-12-05 22:50:21', 'l\'article a été modifié'),
(96, 8, 102, '2021-12-05 22:50:29', 'l\'article a été modifié'),
(97, 8, 102, '2021-12-05 22:51:00', 'l\'article a été modifié'),
(98, 8, NULL, '2021-12-05 23:22:01', 'l\'utilisateur a été mis à jour'),
(99, 8, NULL, '2021-12-05 23:22:07', 'l\'utilisateur a été mis à jour');

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
(8, 'Al-khatib', 'Mohamad', 'mohamad@localhost.com', '$argon2i$v=19$m=65536,t=4,p=1$dTFFWkhpUi5qQVFMeDlxVA$y92QBP1TcYkYTKmqgC69LEQofI0c+hOaxkVw/H30YFU', '1998-04-11', '61ad499917897534412637.png');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `log_system`
--
ALTER TABLE `log_system`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

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