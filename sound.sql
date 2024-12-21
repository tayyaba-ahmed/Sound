-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2024 at 09:19 PM
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
-- Database: `sound`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `album_ID` int(11) NOT NULL,
  `artist_ID_FK` int(11) DEFAULT NULL,
  `album_name` varchar(50) NOT NULL,
  `album_bio` text DEFAULT NULL,
  `album_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_ID`, `artist_ID_FK`, `album_name`, `album_bio`, `album_image`) VALUES
(1, 1, 'Midnights', '\"Midnights,\" released in 2022, marks Taylor Swift\'s return exploring themes of sleepless nights.', 'uploads/Midnights (The Late Night Edition).jpeg'),
(2, 1, 'Reputation', 'Reputation is the sixth studio album by the American singer Taylor Swift. It was released on November 10, 2017.', 'uploads/reputation.jpg'),
(3, 2, 'Jal Pari ', 'Jal Pari \'Mermaid\' is the debut studio album by Pakistani singer-songwriter Atif Aslam.', 'uploads/jalpari.jpg'),
(4, 2, 'Doorie', 'Doorie was a global success and hit. It was the first International album by Atif Aslam.', 'uploads/Doorie.jpg'),
(5, 3, 'Illuminate ', 'Illuminate is the studio album by Canadian singer Shawn Mendes. The album debuted atop  the Canadian Albums Chart.', 'uploads/Illuminate.png'),
(6, 3, 'Wonder', 'Wonder debuted at number one in Canada and the United States. Singers supported the album: \"Wonder\", \"Monster\" with Justin Bieber', 'uploads/Wonder.png'),
(7, 4, 'Faces of Love', 'Faces of Love is the second extended play by South Korean singer Suzy. It was released by JYP Entertainment on January 29, 2018. ', 'uploads/Faces_of_Love.jpg'),
(8, 4, ' Yes? No?', 'Yes? No? is the debut extended play by South Korean singer Suzy. It was released by JYP Entertainment on January 24, 2017', 'uploads/Yes_No_EP_Poster.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_ID` int(11) NOT NULL,
  `artist_name` varchar(50) NOT NULL,
  `artist_bio` text NOT NULL,
  `artist_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_ID`, `artist_name`, `artist_bio`, `artist_image`) VALUES
(1, 'Taylor Swift', 'Taylor Swift is a renowned singer known for her narrative-driven songs. Her storytelling have made her one of the most influential artists of our generation.', 'uploads/taylorswift.jpeg'),
(2, 'Atif Aslam ', 'Atif Aslam is a Pakistani playback singer, songwriter and actor. He has recorded many songs and is known for his vocal belting technique.\r\n', 'uploads/aa.jpg'),
(3, 'Shawn Mendes', 'Shawn Peter Raul Mendes is a Canadian singer-songwriter. He gained a following in 2013 when he posted song covers on the video-sharing platform Vine.', 'uploads/download (3).jpeg'),
(4, 'Bae Suzy ', 'Bae Su-ji better known by the stage name Bae Suzy or mononymously as Suzy, is a South Korean singer.She is a former member of the girl group Miss A. ', 'uploads/ss.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_ID` int(11) NOT NULL,
  `genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_ID`, `genre_name`) VALUES
(1, 'Electronic'),
(2, 'Indie Folk'),
(3, 'Pop'),
(4, 'Rock');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_ID` int(11) NOT NULL,
  `language_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_ID`, `language_name`) VALUES
(1, 'English'),
(4, 'Korean'),
(2, 'Urdu');

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `music_ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `artist_ID_FK` int(11) DEFAULT NULL,
  `album_ID_FK` int(11) DEFAULT NULL,
  `genre_ID_FK` int(11) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `language_ID_FK` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `music_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`music_ID`, `title`, `artist_ID_FK`, `album_ID_FK`, `genre_ID_FK`, `year`, `language_ID_FK`, `description`, `music_file`) VALUES
(1, 'Midnight Rain', 1, 1, 3, 2022, 1, '\"Midnight Rain\" explores the tension between nostalgia and self-discovery, feelings of choosing personal growth over a past relationship.', 'uploads/Taylor_Swift_-_Midnight_Rain__Official_Lyric_Video_(256k).mp3'),
(2, 'Mastermind', 1, 1, 1, 2022, 1, '\"Mastermind\" is a song by the American singer-songwriter Taylor Swift, taken from her tenth original studio album, Midnights (2022).', 'uploads/mastermind.mp3'),
(3, 'End Game', 1, 2, 3, 2017, 1, '\"End Game\" is a song by American singer-songwriter Taylor Swift featuring English singer-songwriter Ed Sheeran and American rapper Future.', 'uploads/end_game.mp3'),
(4, 'Gorgeous ', 1, 2, 1, 2017, 1, '\"Gorgeous” describes a fully intoxicating infatuation in the form of seemingly unrequited love. The man in Taylor\'s attention is so impossibly attractive.', 'uploads/gorgeous.mp3'),
(5, 'Aadat', 2, 3, 3, 2005, 2, '\"Aadat\" is originally a song by the band Jal. It was sung by Atif Aslam and composed by Goher Mumtaz.', 'uploads/aadat.mp3'),
(6, 'Rafta Rafta', 2, 3, 2, 2021, 2, 'Rafta, Rafta is a comedy by British Pakistani playwright Ayub Khan-Din adapted from the 1963 Bill Naughton play, All in Good Time.', 'uploads/Rafta Rafta - Danish Alfaaz 128 Kbps.mp3'),
(7, 'Wo mere bin', 2, 4, 2, 2020, 2, 'Woh Mere Bin is a 2020 Hindi song written by Sachin Gupta and sung by the Pakistani singer Atif Aslam. \"Woh Mere Bin\". Single by Atif Aslam.', 'uploads/Woh Mere Bin - Atif Aslam 128 Kbps.mp3'),
(8, 'Raat', 2, 4, 2, 2021, 2, '\"Atif Aslam\'s \'Raat\' is a star-studded affair\". 27 February 2021. ^ \"Atif Aslam dedicates his new single \'Raat\' to the beauty & mystery of the night\".', 'uploads/Raat - Chubare Wali Baari 128 Kbps.mp3'),
(9, 'Ruin', 3, 5, 3, 2016, 1, 'Ruin is a bluesy song from his second studio album, due in stores in 2016 via Island Records. It was first debuted live at a Radio City Music Hall concert in early March.', 'uploads/ruin.mp3'),
(10, 'Dont be a fool', 3, 5, 3, 2016, 1, '“Don\'t Be A Fool” was released by Canadian-artist Shawn Mendes on September the 15th as a promotional single for his album Illuminate.', 'uploads/dontbeafool.mp3'),
(11, 'Higher', 3, 6, 1, 2020, 1, '\"Higher\" is the third track from Shawn Mendes\'s fourth studio album, Wonder. It was released on December 4, 2020, through Island Records.', 'uploads/higher.mp3'),
(12, 'Piece of you', 3, 6, 1, 2020, 1, 'In the lyrics, the Canadian singer talks about his jealousy over a woman, and how he wants her just as much as anyone who wants a “piece” of her.', 'uploads/pieceofu.mp3'),
(13, 'Breathe', 4, 7, 4, 2011, 4, 'Suzy is a South Korean singer, actress, model and TV presenter. She is the maknae of the South Korean girl group miss A, debuting through JYP Entertainment', 'uploads/breathe.mp3'),
(14, 'Dream', 4, 7, 4, 2016, 4, 'In January 2016, Bae released a digital single titled \"Dream\" in collaboration with Exo\'s Baekhyun. ', 'uploads/dream.mp3'),
(15, 'Hush', 4, 8, 4, 2013, 4, 'On November 6, 2013, after more than a year of inactivity, Miss A made her comeback with a second studio album titled Hush. ', 'uploads/hush.mp3'),
(16, 'Ring my bell', 4, 8, 4, 2016, 4, '\" On March 9, Suzy released her fourth music video for the single ... \"Uncontrollably Fond OST Part.1\" (\"Ring My Bell\") (2016)', 'uploads/rinymybell.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviews_ID` int(11) NOT NULL,
  `user_ID_FK` int(11) DEFAULT NULL,
  `album_ID_FK` int(11) NOT NULL,
  `review_text` text DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviews_ID`, `user_ID_FK`, `album_ID_FK`, `review_text`, `rating`, `created_at`) VALUES
(1, 3, 2, 'good songs', 4, '2024-11-18 12:57:01'),
(5, 3, 3, 'good music', 4, '2024-11-19 11:11:23'),
(6, 3, 1, 'okaysongs', 1, '2024-11-19 11:33:53'),
(7, 3, 4, 'good album', 2, '2024-11-19 11:46:30'),
(8, 3, 7, 'good album', 4, '2024-11-19 12:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_ID` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_ID`, `role_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(11) NOT NULL,
  `role_ID_FK` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `role_ID_FK`, `username`, `password`, `email`, `phone`, `address`) VALUES
(1, 1, 'wania', 'nia123', 'wania@gmailcom', '0123456789', 'abc'),
(2, 1, 'tayyaba', '1234', 'tayyaba@gmail.com', '03132112222', 'karachi'),
(3, 2, 'tayyabaahmed', '1234', 'tayyabaa@gmail.com', '12345', 'karachi'),
(4, 1, 'kabeer', '1122', 'kabeer@gmail.com', '123455555', 'aa'),
(5, 2, 'nia', 'wania123', 'waniairfan05@gmail.com', '0123456789', 'abc'),
(6, 2, 'kabeerr', '1122', 'kabeer123@gmail.com', '12345', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `video_ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `artist_ID_FK` int(11) DEFAULT NULL,
  `album_ID_FK` int(11) NOT NULL,
  `genre_ID_FK` int(11) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `language_ID_FK` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `video_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`video_ID`, `title`, `artist_ID_FK`, `album_ID_FK`, `genre_ID_FK`, `year`, `language_ID_FK`, `description`, `video_file`) VALUES
(1, 'Midnight Rain', 1, 1, 3, 2022, 1, 'The Midnight Rain video features dark, moody visuals with rain, dreamlike scenes, and surreal transitions.', 'uploads/WhatsApp Video 2024-11-02 at 15.30.46_daac60d9.mp4'),
(2, 'Mastermind', 1, 1, 1, 2022, 1, '\"Mastermind\" is a song by the American singer-songwriter Taylor Swift, taken from her tenth original studio album, Midnights (2022).', 'uploads/mastermind.mp4'),
(3, 'End Game', 1, 2, 3, 2022, 1, '\"End Game\" is a song by American singer-songwriter Taylor Swift featuring English singer-songwriter Ed Sheeran and American rapper Future.', 'uploads/endgame.mp4'),
(4, '	Gorgeous', 1, 2, 1, 2017, 1, '\"Gorgeous” describes a fully intoxicating infatuation in the form of seemingly unrequited love. The man in Taylor\'s attention is so impossibly attractive.', 'uploads/gorg.mp4'),
(5, 'Aadat', 2, 3, 3, 2005, 2, '\"Aadat\" is originally a song by the band Jal. It was sung by Atif Aslam and composed by Goher Mumtaz.', 'uploads/aadat.mp4'),
(6, 'Rafta Rafta', 2, 3, 2, 2021, 2, 'Rafta, Rafta is a comedy by British Pakistani playwright Ayub Khan-Din adapted from the 1963 Bill Naughton play, All in Good Time.', 'uploads/Rafta Rafta .mp4'),
(7, 'Wo mere bin', 2, 4, 2, 2020, 2, 'Woh Mere Bin is a 2020 Hindi song written by Sachin Gupta and sung by the Pakistani singer Atif Aslam. \"Woh Mere Bin\". Single by Atif Aslam.', 'uploads/womerebin.mp4'),
(8, 'Raat', 2, 4, 2, 2021, 2, '\"Atif Aslam\'s \'Raat\' is a star-studded affair\". 27 February 2021. ^ \"Atif Aslam dedicates his new single \'Raat\' to the beauty & mystery of the night\".', 'uploads/raat.mp4'),
(9, 'Ruin', 3, 5, 3, 2016, 1, 'Ruin is a bluesy song from his second studio album, due in stores in 2016 via Island Records. It was first debuted live at a Radio City Music Hall concert in early March.', 'uploads/ruin.mp4'),
(10, 'Dont be a fool', 3, 5, 3, 2016, 1, '“Dont Be A Fool” was released by Canadian-artist Shawn Mendes on September the 15th as a promotional single for his album Illuminate.', 'uploads/Dont Be A Fool.mp4'),
(11, 'Higher', 3, 6, 1, 2020, 1, '\"Higher\" is the third track from Shawn Mendes\'s fourth studio album, Wonder. It was released on December 4, 2020, through Island Records.', 'uploads/higher.mp4'),
(12, 'Piece of you', 3, 6, 1, 2020, 1, 'In the lyrics, the Canadian singer talks about his jealousy over a woman, and how he wants her just as much as anyone who wants a “piece” of her.', 'uploads/Piece Of You.mp4'),
(13, 'Breathe', 4, 7, 4, 2011, 4, 'Suzy is a South Korean singer, actress, model and TV presenter. She is the maknae of the South Korean girl group miss A, debuting through JYP Entertainment\r\n', 'uploads/breathe.mp4'),
(14, 'Dream', 4, 7, 4, 2016, 4, 'In January 2016, Bae released a digital single titled \"Dream\" in collaboration with Exo\'s Baekhyun. ', 'uploads/dream.mp4'),
(15, 'Hush', 4, 8, 4, 2013, 4, 'On November 6, 2013, after more than a year of inactivity, Miss A made her comeback with a second studio album titled Hush. ', 'uploads/hush.mp4'),
(16, 'Ring my bell', 4, 8, 4, 2016, 4, '\"On March 9, Suzy released her fourth music video for the single ... \"Uncontrollably Fond OST Part.1\" (\"Ring My Bell\") (2016)', 'uploads/ringmybell.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_ID`),
  ADD UNIQUE KEY `album_image` (`album_image`),
  ADD KEY `artist_ID_FK` (`artist_ID_FK`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_ID`),
  ADD UNIQUE KEY `artist_image` (`artist_image`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_ID`),
  ADD UNIQUE KEY `genre_name` (`genre_name`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_ID`),
  ADD UNIQUE KEY `language` (`language_name`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`music_ID`),
  ADD KEY `music_ibfk_1` (`artist_ID_FK`),
  ADD KEY `music_ibfk_2` (`album_ID_FK`),
  ADD KEY `music_ibfk_3` (`genre_ID_FK`),
  ADD KEY `music_ibfk_4` (`language_ID_FK`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviews_ID`),
  ADD KEY `reviews_ibfk_1` (`user_ID_FK`),
  ADD KEY `albumidfk` (`album_ID_FK`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_ID_FK` (`role_ID_FK`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_ID`),
  ADD KEY `artist_ID_FK` (`artist_ID_FK`),
  ADD KEY `genre_ID_FK` (`genre_ID_FK`),
  ADD KEY `language_ID_FK` (`language_ID_FK`),
  ADD KEY `videoalbum_ID_FK` (`album_ID_FK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `album_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `music_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviews_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `video_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`artist_ID_FK`) REFERENCES `artist` (`artist_ID`);

--
-- Constraints for table `music`
--
ALTER TABLE `music`
  ADD CONSTRAINT `album_ID_FK` FOREIGN KEY (`album_ID_FK`) REFERENCES `album` (`album_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `music_ibfk_1` FOREIGN KEY (`artist_ID_FK`) REFERENCES `artist` (`artist_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `music_ibfk_3` FOREIGN KEY (`genre_ID_FK`) REFERENCES `genre` (`genre_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `music_ibfk_4` FOREIGN KEY (`language_ID_FK`) REFERENCES `language` (`language_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `albumidfk` FOREIGN KEY (`album_ID_FK`) REFERENCES `album` (`album_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_ID_FK`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role_ID_FK` FOREIGN KEY (`role_ID_FK`) REFERENCES `role` (`role_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `artist_ID_FK` FOREIGN KEY (`artist_ID_FK`) REFERENCES `artist` (`artist_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `genre_ID_FK` FOREIGN KEY (`genre_ID_FK`) REFERENCES `genre` (`genre_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `language_ID_FK` FOREIGN KEY (`language_ID_FK`) REFERENCES `language` (`language_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `videoalbum_ID_FK` FOREIGN KEY (`album_ID_FK`) REFERENCES `album` (`album_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
