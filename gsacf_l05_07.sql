-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 6 月 03 日 10:51
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_l05_07`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `chat_table`
--

CREATE TABLE `chat_table` (
  `id` int(12) NOT NULL,
  `u_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_message` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `chat_table`
--

INSERT INTO `chat_table` (`id`, `u_name`, `u_message`, `created_at`) VALUES
(4, '比嘉', 'こんばんは', '2021-06-03 00:25:16'),
(5, '比嘉', 'こんばんは', '2021-06-03 00:26:49'),
(6, '田岸', 'バリカン持ってます', '2021-06-03 00:28:02'),
(7, '比嘉', 'もう髪切った', '2021-06-03 00:30:45'),
(8, '安倍', 'おはよー', '2021-06-03 11:03:40'),
(9, '森重', 'おはようございます', '2021-06-03 11:41:56'),
(10, '堀', '靴欲しい', '2021-06-03 11:46:43'),
(11, '比嘉', 'できたぜ', '2021-06-03 12:07:45'),
(12, '田岸', '何が？', '2021-06-03 12:09:14'),
(13, '比嘉', '課題が', '2021-06-03 12:14:38'),
(14, '堀', 'ふーん、すごいね', '2021-06-03 12:15:52'),
(15, '比嘉', '棒読みw', '2021-06-03 12:37:17'),
(16, '安倍', 'まじっすか', '2021-06-03 13:44:54'),
(17, '比嘉', 'マジっす！', '2021-06-03 13:45:04'),
(18, '比嘉', 'こんにちは', '2021-06-03 15:24:24'),
(19, '比嘉', '同時に更新されてくれー', '2021-06-03 16:21:59'),
(20, '安倍', 'フヒヒw\r\n別のページを開いて同時に更新させるのムズイですよ。Firebaseならいけるみたいです！', '2021-06-03 17:47:33');

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(12) NOT NULL,
  `todo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 'PHP課題', '2021-06-01', '2021-06-01 12:06:44', '2021-06-01 12:06:44'),
(2, 'PHP課題２', '2021-06-02', '2021-06-01 12:08:30', '2021-06-01 12:08:30'),
(3, 'コード書く', '2021-06-03', '2021-06-01 12:09:13', '2021-06-01 12:09:13'),
(4, 'ゴミ捨て', '2021-06-02', '2021-06-01 12:09:57', '2021-06-01 12:09:57'),
(5, '次の課題提出', '2021-06-04', '2021-06-01 12:10:32', '2021-06-01 12:10:32'),
(6, 'ゴミ出し', '2021-06-06', '2021-06-01 12:11:42', '2021-06-01 12:11:42'),
(7, 'UX講座', '2021-06-02', '2021-06-01 12:12:22', '2021-06-01 12:12:22'),
(8, 'スクワット', '2021-07-05', '2021-06-01 12:13:28', '2021-06-01 12:13:28'),
(9, '腕立て伏せ', '2021-07-30', '2021-06-01 12:14:01', '2021-06-01 12:14:01'),
(10, 'ランニング', '2022-01-10', '2021-06-01 12:14:38', '2021-06-01 12:14:38'),
(11, '波動拳', '2021-06-15', '2021-06-01 16:26:59', '2021-06-01 16:26:59'),
(12, '昇竜拳', '2021-06-02', '2021-06-01 16:27:42', '2021-06-01 16:27:42'),
(13, '竜巻旋風脚', '2021-06-30', '2021-06-01 16:46:58', '2021-06-01 16:46:58');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `chat_table`
--
ALTER TABLE `chat_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `chat_table`
--
ALTER TABLE `chat_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- テーブルの AUTO_INCREMENT `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
