-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2021 at 01:52 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tk_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tk_an_table`
--

CREATE TABLE `tk_an_table` (
  `id` int(12) NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `purpose` text COLLATE utf8_unicode_ci NOT NULL,
  `finding` text COLLATE utf8_unicode_ci NOT NULL,
  `todo` text COLLATE utf8_unicode_ci NOT NULL,
  `review1` text COLLATE utf8_unicode_ci NOT NULL,
  `review2` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tk_an_table`
--

INSERT INTO `tk_an_table` (`id`, `title`, `purpose`, `finding`, `todo`, `review1`, `review2`) VALUES
(6, 'test17', 'kikkake17', 'kiduki17', 'korekara17', 'furikaeri17', 'furikaeri17-2'),
(13, 'test17', 'kikkake17\r\na', 'kiduki17', 'korekara17', 'furikaeri17', 'furikaeri17-2'),
(14, 'test17aaa', 'kikkake17\r\n\r\n\r\neee', 'kiduki17', 'korekara17', 'furikaeri17', 'furikaeri17-2'),
(15, 'メモの魔力', 'MILの最終課題に取り組むに際して、身の回りに対するアンテナをもっと高めたいと思ったから。\r\nメモを書くのが結構好きなので、もっとメモ力を高めたいと思ったから。', 'メモは「外部メモリ」の機能と「思考を深める」という機能がある！\r\n事実に対して、「抽象化（この事実から何か言えることはないか？）」と「転用（実際にやってみること）」までメモで深堀をすることで、事実からアイディアを作ることができる。', 'アイディア用ノートを作ってみて、１日１つは転用まで思考を深めてみる。', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tk_an_table`
--
ALTER TABLE `tk_an_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tk_an_table`
--
ALTER TABLE `tk_an_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
