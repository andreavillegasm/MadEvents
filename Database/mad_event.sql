-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2020 at 11:08 PM
-- Server version: 10.3.22-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jsanzlcw_mad_event`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatbox_users`
--

CREATE TABLE `chatbox_users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventxguest`
--

CREATE TABLE `eventxguest` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eventxservice`
--

CREATE TABLE `eventxservice` (
  `service_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event_info`
--

CREATE TABLE `event_info` (
  `id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `venue_id` int(11) DEFAULT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_likes` int(11) DEFAULT NULL,
  `event_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_info`
--

INSERT INTO `event_info` (`id`, `event_name`, `venue_id`, `event_date`, `event_time`, `event_likes`, `event_status`) VALUES
(1, 'jashan\'s partyy', 1, '2020-03-31', '00:05:00', NULL, 0),
(3, 'test', 10, '2020-04-04', '20:00:00', NULL, 0),
(5, 'sukh\'s party', 3, '2020-03-31', '00:00:00', NULL, 0),
(6, 'test', 7, '2020-04-04', '09:00:00', NULL, 1),
(7, 'Party', 7, '2020-03-30', '03:04:00', NULL, 1),
(8, 'test3', 4, '2020-04-02', '13:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_service`
--

CREATE TABLE `event_service` (
  `id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `service_price` float NOT NULL,
  `service_phone` varchar(100) NOT NULL,
  `service_email` varchar(100) NOT NULL,
  `service_location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event_tags`
--

CREATE TABLE `event_tags` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `friend_first_name` varchar(100) NOT NULL,
  `friend_middle_name` varchar(100) DEFAULT NULL,
  `friend_last_name` varchar(100) NOT NULL,
  `friend_email` varchar(100) NOT NULL,
  `friend_phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_listing`
--

CREATE TABLE `gallery_listing` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `posts` varchar(255) NOT NULL,
  `tag_name` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery_listing`
--

INSERT INTO `gallery_listing` (`id`, `user_name`, `posts`, `tag_name`, `image_path`, `post_date`) VALUES
(2, 'jazz12', 'what a event', 'enjoy', 'upload_gallery/unnamed.png', '2020-03-01'),
(4, 'jazz_sandhu', 'what a event', 'lastnight', 'upload_gallery/mickey.jpg', '2020-03-01'),
(16, 'jashan12', 'this is first event with them, and i really enjoyed it..sukh tweety', 'event', 'upload_gallery/pic.jpg', '2020-03-20'),
(17, 'jashan12', 'really enjoy', 'lastnight', 'upload_gallery/sinderlla.jpg', '2020-03-20'),
(20, 'jashan12', 'this is first event with them, and i really enjoyed it', 'evnt', 'upload_gallery/mickey.jpg', '2020-03-20'),
(21, 'jashan12', 'my sinderlla', '', 'upload_gallery/hero-canada-day.jpg', '2020-03-20'),
(22, 'jashan12', 'this is mickey', 'disney', 'upload_gallery/mickey.jpg', '2020-03-20'),
(23, 'jashan', 'this is nice and cute', 'mickey', 'upload_gallery/mickey.jpg', '2020-03-02'),
(24, 'jashan', 'this is first event with them, and i really enjoyed it', '', 'upload_gallery/Af0sF2OS5S5gatqrKzVP_Silhoutte.jpg', '2020-03-26'),
(25, 'jashansandhu', 'this is me enjoying the evnet', 'yaehh', 'upload_gallery/pietra-schwarzler-FqdfVIdgR98-unsplash.jpg', '2020-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `guest_list`
--

CREATE TABLE `guest_list` (
  `event_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invitation_design`
--

CREATE TABLE `invitation_design` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `invitation_title` varchar(100) NOT NULL,
  `invitation_content` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `number_of_guests` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `password`) VALUES
(1, 'john123', 'john@example.com', '$2y$10$KcvXk0z9EJ1qRZzr7SNS/ed7r6IHJPYryJeshF4Udr3rxd.sAniK2'),
(2, 'jashan', 'me@gmail.om', '$2y$10$uO.JbSrvBWOLaIzE5o6x7OFVgTUJWLYEwrOxNZWecOB45OMjjGH/e'),
(4, 'tim', 'timothy.tudis@gmail.com', '$2y$10$BxqTPNF36s0fpGD5QFs29uj/Txf03/UmedExP9wxFSTMRHM8p1NVq'),
(5, 'jazzo', 'me@example.com', '$2y$10$mvMXpqJxnx9r9ZXqf/KtXO.7R8TCKEDWT.4DFtASDFoxRUoeObIZ6'),
(6, 'jashansandhu', 'jazzosandhu12@gmail.com', '$2y$10$9uwksxKT67VXBjlEttFlDOqrOm/P2RC/zuoapYNiccpG269qWrUcC'),
(7, 'jason123', 'jasoncwy@hotmail.com', '$2y$10$e4CIh2kJW.QK.pODzv88OOQWrU3l0D6xovFGYEpeiuZWdHwytvLrO'),
(8, 'jasonchong', 'jason@hotmail.com', '$2y$10$4uANPX4Fzyje2ivyra7k4OZtENLgnPo4KyAydSFMi5AFV902yNRUO'),
(9, 'jashan12', 'jazzosandhu12@gmail.com', '$2y$10$YgzRwmVSbVLdMsaIMcsvjuYZByL9gORt/GH7b8xlGci7B2cSCHrwi');

-- --------------------------------------------------------

--
-- Table structure for table `venue_list`
--

CREATE TABLE `venue_list` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number_of_guest` int(11) DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `venue_list`
--

INSERT INTO `venue_list` (`id`, `name`, `number_of_guest`, `cost`, `address`, `phone_number`) VALUES
(1, 'Fermenting Cellar', 600, 9000, '28 Distillery Lane, Toronto', '(416) 203-2363'),
(3, 'The Cambridge Club', 125, 200, '100 Richmond St W, Toronto', '(416) 862-1077'),
(4, 'St. James Cathedral Centre Event Venue', 400, 550, '65 Church St, Toronto', '(416) 868-5229'),
(7, 'YWCA Toronto', 200, 185, '87 Elm Street, Toronto', '(416) 961-8100'),
(10, 'JOEY Eaton Centre', 150, 4500, '1 Dundas St. W, Toronto', '(647) 352-5639');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatbox_users`
--
ALTER TABLE `chatbox_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventxguest`
--
ALTER TABLE `eventxguest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventxservice`
--
ALTER TABLE `eventxservice`
  ADD KEY `event_id` (`event_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `event_info`
--
ALTER TABLE `event_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_service`
--
ALTER TABLE `event_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_tags`
--
ALTER TABLE `event_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_listing`
--
ALTER TABLE `gallery_listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_list`
--
ALTER TABLE `guest_list`
  ADD KEY `event_id` (`event_id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Indexes for table `invitation_design`
--
ALTER TABLE `invitation_design`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `venue_list`
--
ALTER TABLE `venue_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatbox_users`
--
ALTER TABLE `chatbox_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventxguest`
--
ALTER TABLE `eventxguest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_info`
--
ALTER TABLE `event_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `event_service`
--
ALTER TABLE `event_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_tags`
--
ALTER TABLE `event_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_listing`
--
ALTER TABLE `gallery_listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `invitation_design`
--
ALTER TABLE `invitation_design`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `venue_list`
--
ALTER TABLE `venue_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventxservice`
--
ALTER TABLE `eventxservice`
  ADD CONSTRAINT `eventxservice_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event_info` (`id`),
  ADD CONSTRAINT `eventxservice_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `event_service` (`id`);

--
-- Constraints for table `guest_list`
--
ALTER TABLE `guest_list`
  ADD CONSTRAINT `guest_list_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event_info` (`id`),
  ADD CONSTRAINT `guest_list_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `friends` (`id`);

--
-- Constraints for table `invitation_design`
--
ALTER TABLE `invitation_design`
  ADD CONSTRAINT `invitation_design_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
