-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 
-- サーバのバージョン： 5.7.24
-- PHP のバージョン: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `tk_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `tk_user_table`
--

CREATE TABLE `tk_user_table` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(2) NOT NULL,
  `life_flg` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `tk_user_table`
--

INSERT INTO `tk_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(3, 'Takafumi Suzuki', '0', 'abcdefg', 0, 0),
(4, 'たかふみ', '0', 'aa11', 0, 0),
(11, 'Takafumi Suzuki', 'tk', 'abcdefg', 0, 0),
(12, 'Takafumi Suzuki66666', 'tk898966666', 'abcdefg', 0, 0),
(13, 'Takafumi Suzuki8989', 'tk8989', 'abcdefg', 2, 2),
(14, 'Takafumi Suzuki898977', 'tk89898977', 'abcdefg', 0, 0),
(15, '鈴木隆文', 'TAKA', 'aaa888', 2, 1);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `tk_user_table`
--
ALTER TABLE `tk_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `tk_user_table`
--
ALTER TABLE `tk_user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
