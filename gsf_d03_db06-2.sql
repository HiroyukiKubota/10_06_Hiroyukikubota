-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 17, 2019 at 04:13 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsf_d03_db06`
--

-- --------------------------------------------------------

--
-- Table structure for table `infowners01`
--

CREATE TABLE `infowners01` (
  `id` int(12) NOT NULL,
  `area` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `rent` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `upfile1` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upfile2` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upfile3` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upfile4` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `infowners01`
--

INSERT INTO `infowners01` (`id`, `area`, `rent`, `date`, `description`, `upfile1`, `upfile2`, `upfile3`, `upfile4`, `indate`) VALUES
(63, 'ニューサウスウェールズ州（NSW）', 260, '2019-07-25', 'ご覧いただきまして、ありがとうございます。\r\n\r\n半年シドニーに滞在しておりましたが、ビザが切れるので再来週帰国します。\r\n\r\nそれに伴い、今住んでいる物件に次住む方を探しています。\r\n\r\nワールドスクエアの真向かい、マロニーのほぼ上というかなり好立地のまだ新しいタワーマンションです。ワールドスクエアのコールズまで二分です。\r\n\r\nタイプは、オウンルームで、部屋は一面真白の壁で覆われており非常に新しく清潔で綺麗です。これまでゴキブリを見たことがありません。\r\n\r\n大きな窓も付いており、高層階からのシティの眺めは最高です。\r\n\r\nさらに、ジム、プール完備されています。\r\n\r\n２ヶ月ホームステイをした後、今のフラットに入居したのですが、1度も不自由を感じたり、不快な思いをしたことがありません。同居人は別の部屋に2人ずつ住んでいますが、かなり静かです。もちろん出入り自由のオウンキーです。\r\n\r\nパーティ等は禁止ですが、オウンなので、飲みの後など友達を連れてきて話すくらいなら暗黙の了解でokです。\r\n\r\nオーナーも融通の利くいい人なので、1度もトラブルになった事がありません。\r\n\r\nとにかく快適過ぎて、1度も引越しを考えたことがありません。\r\n\r\n僕がこのフラットを所有している訳では無いので、インスペ後もし、フラットを気に入れば、オーナーに紹介して、その時に紹介料として80ドルをいただく形にしたいと思っています。\r\n\r\n家賃は週260ドルと安くはないですが、シドニー一等地のこの新しくて綺麗な部屋にしてはとてもリーズナブルな価格だったと今では感じています。シティのオウンで260は探してもなかなか見つからないと思います。\r\n\r\n興味のある方はメールアドレスまでご連絡をよろしくお願いします。\r\n\r\nオーナーの方もインスペを始めたみたいで、僕がそうだったように即決される可能性が高いので、もし先に見つかってしまった場合はご容赦下さい。問い合わせは、message 0475908387まで', 'upload/201907170337475dc9d5ed8e10c1cec22d58d8072449bb.', 'upload/201907170337475dc9d5ed8e10c1cec22d58d8072449bb.', 'upload/201907170337475dc9d5ed8e10c1cec22d58d8072449bb.', 'upload/201907170337475dc9d5ed8e10c1cec22d58d8072449bb.', '2019-07-17 12:37:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `infowners01`
--
ALTER TABLE `infowners01`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `infowners01`
--
ALTER TABLE `infowners01`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
