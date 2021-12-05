-- phpMyAdmin SQL Dump
-- version 5.0.4deb2ubuntu5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2021 at 10:37 PM
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
(64, 'Qu&#39;est-ce que le Lorem Ipsum?', 'qzdqsdd', '2021-12-03 16:50:04', 1, 8),
(65, '', '', '2021-12-03 16:54:36', 1, 8),
(66, '', '', '2021-12-03 16:54:52', 1, 8),
(67, '', '', '2021-12-03 16:55:51', 1, 8),
(68, '', '', '2021-12-03 16:55:54', 1, 8),
(69, '', '', '2021-12-03 16:56:18', 1, 8),
(70, '', '', '2021-12-03 16:56:19', 1, 8),
(71, 'qzd', 'qzdqsd', '2021-12-03 16:56:22', 1, 8),
(72, 'qzd', 'qzdqsd', '2021-12-03 16:56:47', 1, 8),
(73, 'qzdqsdqzdqzd', 'qzdqsdddddqzqsd', '2021-12-03 16:57:47', 1, 8),
(74, 'dzdd', 'dzqdq', '2021-12-03 17:24:44', 0, 8),
(75, 'alert', 'fffeqf', '2021-12-04 18:42:50', 1, 8),
(76, 'poaopdk', 'fffeqf', '2021-12-04 18:42:50', 0, 8),
(77, 'qsd', 'qsd', '2021-12-05 01:19:12', 1, 8),
(78, 'qsd', 'qsd', '2021-12-05 01:19:12', 1, 8),
(79, 'qsdzqdsqd', 'qsd', '2021-12-05 01:19:16', 1, 8),
(80, 'qsd', 'qsd', '2021-12-05 01:19:17', 1, 8),
(81, '', '', '2021-12-05 01:25:29', 1, 8),
(82, '', '', '2021-12-05 01:25:29', 1, 8),
(83, 'd', 'd', '2021-12-05 01:26:04', 1, 8),
(84, 'qz', 'qzdzdqqzd', '2021-12-05 14:47:41', 1, 8),
(85, 'poaopdkdddd', '41030\r\nd', '2021-12-05 14:48:30', 1, 8),
(86, 'zqd', 'zqd', '2021-12-05 17:32:24', 0, 8),
(87, '1', '1', '2021-12-05 20:55:08', 1, 8),
(88, 'poaopdk', 'd', '2021-12-05 20:55:54', 0, 8),
(89, 'd', 'd', '2021-12-05 21:29:05', 0, 8),
(90, 'qds', 'qsd', '2021-12-05 21:29:09', 1, 8),
(91, '', '123', '2021-12-05 21:57:25', 1, 8),
(92, '', '123', '2021-12-05 21:57:33', 1, 8),
(93, '', '123', '2021-12-05 21:57:55', 1, 8),
(94, '', 'qzd', '2021-12-05 21:58:49', 1, 8),
(95, '', 'qd', '2021-12-05 21:59:10', 1, 8),
(96, '', 'qd', '2021-12-05 21:59:25', 1, 8),
(97, '', 'qd', '2021-12-05 21:59:38', 1, 8),
(98, '', 'qzd', '2021-12-05 21:59:40', 1, 8),
(99, 'qzd', 'qzd', '2021-12-05 21:59:56', 1, 8),
(100, '132d', '654941', '2021-12-05 22:00:09', 0, 8),
(101, '13', '333\r\n', '2021-12-05 22:00:30', 1, 8),
(102, 'test1d', 'test1qzdqsd', '2021-12-05 22:07:42', 0, 8);

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
(8, 'Al-khatib', 'Mohamad', 'mohamad@localhost.com', '$argon2i$v=19$m=65536,t=4,p=1$R0VZNUd1UTkxYnpyajZobg$yzpTp16P62E+ShMI0lO8eSAJ4dLxLnBFB//ZDR84yaQ', '1998-04-11', '61ad1dc4e6279902493987.png');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

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