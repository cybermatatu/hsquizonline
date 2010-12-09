-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2010 at 07:10 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tracnghiemonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `a_order` int(2) DEFAULT NULL,
  `a_correct` tinyint(2) DEFAULT '0',
  `a_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=234 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `question_id`, `a_order`, `a_correct`, `a_text`) VALUES
(154, 65, 0, 1, 'Đúng'),
(155, 65, 1, 0, 'Sai'),
(156, 66, 0, 0, '0'),
(157, 66, 1, 0, '1'),
(158, 66, 2, 1, '2'),
(159, 66, 3, 0, '3'),
(160, 67, 0, 1, '1'),
(161, 67, 1, 1, '3'),
(162, 67, 2, 0, '6'),
(163, 67, 3, 1, '9'),
(164, 68, 0, 1, 'sfda asf a'),
(165, 68, 1, 0, ' asdf asdfa'),
(166, 69, 0, 0, 'aaaaaaaaaa'),
(167, 69, 1, 1, 'bbbbbbbbbbbbbb'),
(168, 70, 0, 1, 'a'),
(169, 70, 1, 0, 'b'),
(170, 70, 2, 1, 'c'),
(171, 70, 3, 1, 'd'),
(172, 71, 0, 1, 'afsd fasd fasd fasd f'),
(173, 71, 1, 0, 'asd fasd fasd fasdfasdf'),
(174, 72, 0, 0, 'Chắc là có'),
(175, 72, 1, 0, 'Không đâu, hại lắm'),
(176, 72, 2, 1, 'Tùy vào mức độ sử dụng'),
(177, 72, 3, 0, 'Khong biết'),
(178, 73, 0, 1, 'Cafe phải thơm'),
(179, 73, 1, 1, 'Có vị đắng đậm, không bị chua'),
(180, 73, 2, 0, 'Chưa biết, để em đi search google'),
(181, 74, 0, 1, 'Đúng'),
(182, 74, 1, 0, 'Sai'),
(183, 75, 0, 1, 'asdf afasf asdf as'),
(184, 75, 1, 0, 'a sdfasdfads fasd fasdf'),
(185, 76, 0, 1, 'Đi ngủ chứ gì!!!'),
(186, 76, 1, 0, 'Thức tiếp đi'),
(187, 77, 0, 1, 'as dfasd f'),
(188, 77, 1, 0, 'asdf asd fasd fasf'),
(189, 78, 0, 1, ' asdf as dfasd fa'),
(190, 78, 1, 0, 'asdf asdf asdf a'),
(191, 79, 0, 1, 'dsaf asf asf asf sdfasdf'),
(192, 79, 1, 0, ' asdf asfasdf as'),
(193, 79, 2, 0, 'asdf asdf sadfasdf'),
(194, 79, 3, 0, 'asd fasdf adsfasdf'),
(195, 80, 0, 1, 'asdf asd fasf a'),
(196, 80, 1, 1, 'asdf asf asdfasdf'),
(197, 80, 2, 1, 'asdf saf asdf asd fas'),
(198, 80, 3, 0, 'af asdfasdsdaf sdaf'),
(199, 81, 0, 1, 'df af sd fasf asdf'),
(200, 81, 1, 0, 'asdf asd as'),
(201, 81, 2, 0, 'asdf asdf sa'),
(202, 81, 3, 0, 'a dsf asdfa'),
(203, 82, 0, 1, 'a f adsfsa'),
(204, 82, 1, 0, 'ds sdaf'),
(205, 82, 2, 0, 'as dfsa fasf'),
(206, 82, 3, 0, 'sad fa '),
(207, 83, 0, 0, '1'),
(208, 83, 1, 1, '18'),
(209, 83, 2, 0, '12'),
(210, 83, 3, 0, '27'),
(211, 84, 0, 0, '34'),
(212, 84, 1, 0, '23'),
(213, 84, 2, 0, '22'),
(214, 84, 3, 1, '42'),
(215, 85, 0, 1, '18'),
(216, 85, 1, 0, '81'),
(217, 85, 2, 0, '22'),
(218, 85, 3, 0, '17'),
(219, 86, 0, 1, ''),
(220, 87, 0, 1, ''),
(221, 88, 0, 1, ''),
(224, 91, 0, 1, 'dsvsdfv'),
(225, 91, 1, 0, 'qfwfwqfwqe'),
(226, 92, 0, 1, 'asdfsdaf'),
(227, 92, 1, 0, 'sadfasdfsadf'),
(228, 93, 0, 1, 'nb mn'),
(229, 93, 1, 0, ''),
(230, 93, 2, 0, ''),
(231, 93, 3, 0, ''),
(232, 94, 0, 1, 'vgcv'),
(233, 94, 1, 1, 'vgcf');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` bigint(20) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `info` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `quiz_total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `code`, `created_on`, `title`, `info`, `status`, `quiz_total`, `user_id`) VALUES
(1, 'KD071', 0, 'Kinh Doanh', 'Bao gồm các lĩnh vực về kinh tế, thị trường,... liên quan đến lĩnh vực Business', 1, 1, 1),
(2, 'QL071A', 0, 'Công Nghệ & Máy Tính', 'Các bài Quiz liên quan đến các lĩnh vực về Công Nghệ Thông Tin, Máy tính, Phần mềm, Phần Cứng...', 1, 0, 2),
(3, 'ED007', 0, 'Giáo Dục', 'Các bài liên quan đến thông tin giáo dục, đề thi, v.v...', 1, 4, 1),
(4, 'FN010', 0, 'Giải Trí', 'Những bài quiz có nội dung vui nhộn, giải trí, xã stress...', 1, 11, 2),
(5, 'ENG10', 0, 'Ngoại Ngữ', 'Ngoại ngữ các loại...', 1, 0, 3),
(6, 'VT071', 1291653101, 'Mạng máy tính', 'as dfasdf asfasdf dasfas dfsadf', 1, 0, 1),
(7, 'OLA12', 1291653145, 'Test môn học', 'adsf asdf asdfasdfsadf', 1, 0, 1),
(8, 'VT071', 1291653190, 'asd fasdfasdf', '', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) DEFAULT NULL,
  `q_text` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `q_order` tinyint(2) DEFAULT NULL,
  `q_type` tinyint(1) DEFAULT '0' COMMENT 'text, picture, media, v..v.',
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `quiz_id`, `q_text`, `q_order`, `q_type`) VALUES
(65, 44, 'Lê Thành Quang là người đẹp trai nhất đúng hay sai?', 0, 3),
(66, 44, '1 + 1 bằng mấy?', 1, 1),
(67, 44, 'Ước của 9 là?', 2, 2),
(68, 45, 'Nội dung câu hỏi', 0, 2),
(69, 46, 'Nội dung câu hỏi b', 0, 1),
(70, 46, 'Nội dung câu hỏi adc', 1, 2),
(71, 47, 'Nội dung câu hỏi', 0, 1),
(72, 48, 'Theo bạn cafe có tốt cho sức khỏe không?', 0, 1),
(73, 48, 'Theo bạn cafe như thế nào thì ngon?', 1, 2),
(74, 48, 'Cafe làm từ "kứt" chồn ngon hơn các loại bình thường?', 2, 3),
(75, 49, 'Nội dung câu hỏi', 0, 1),
(76, 50, 'bùn ngủ thì nên làm gì?', 0, 1),
(77, 51, 'Nội dung câu hỏi', 0, 1),
(78, 52, 'Nội dung câu hỏi', 0, 2),
(79, 53, 'Nội dung câu hỏi', 0, 1),
(80, 53, 'Nội dung câu hỏi', 1, 2),
(81, 53, 'Nội dung câu hỏi', 2, 2),
(82, 54, 'Nội dung câu hỏi', 0, 1),
(83, 55, '2 x 9 = ? ', 0, 1),
(84, 55, '7 x 6 = ? ', 1, 1),
(85, 55, '3 x 6 = ? ', 2, 1),
(86, 56, 'Nội dung câu hỏi', 0, 1),
(87, 56, 'Nội dung câu hỏi', 1, 2),
(88, 57, 'Nội dung câu hỏi', 0, 1),
(91, 60, 'Nội dung câu hỏi', 0, 1),
(92, 60, 'Nội dung câu hỏi', 1, 2),
(93, 61, 'Nội dung câu hỏi', 0, 1),
(94, 61, 'Nội dung câu hỏi', 1, 2);

--
-- Triggers `question`
--
DROP TRIGGER IF EXISTS `auto_delete_quiz`;
DELIMITER //
CREATE TRIGGER `auto_delete_quiz` BEFORE DELETE ON `question`
 FOR EACH ROW BEGIN
DELETE FROM answer WHERE question_id = OLD.question_id;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `quiz_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `quiz_info` text CHARACTER SET utf8,
  `quiz_tag` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'nguoi tao quiz',
  `created_on` datetime DEFAULT NULL COMMENT 'ngay tao quiz',
  `favourite` tinyint(11) DEFAULT '0' COMMENT 'tong so nguoi like',
  `question_total` tinyint(4) DEFAULT NULL,
  `made_total` int(11) DEFAULT '0',
  PRIMARY KEY (`quiz_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `category_id`, `quiz_title`, `quiz_info`, `quiz_tag`, `user_id`, `created_on`, `favourite`, `question_total`, `made_total`) VALUES
(46, 4, '25 minutes', 'klafdjs fajhsd kflah akjsdh fakjh fakjsdhf kasdj hfakjdsh fakjsd hfkajsd hfkajsdh fkajsdh fkjashdl fkja shdf kjas dh fkjash fkjah sdkjafh fkasjdhf kajsh fkajs hfakjsdf hakjsdh fjkash dfkjas dhfkja sdhf kasjdhf kadsh kjads fhdskj hf akjhfa kjsdh', 'music', 1, '2010-11-10 12:45:52', 0, 1, 11),
(44, 3, 'Test new quiz', 'chỉ là một bài test bình thường thôi mà :)', 'test', 1, '2010-11-10 12:00:16', 0, 3, 3),
(45, 4, 'a', 'a', '', 1, '2010-11-10 12:00:33', 0, 1, 0),
(47, 4, 'Quiz 5 giây test', 'as dfas dfas dfasd fasd f', 'test', 1, '2010-11-11 01:39:12', 0, 2, 18),
(48, 1, 'Bán cafe?', 'tình hình là đang rất thèm coffee, nhưng mà coffee hết rùi, sẵn tiện test thế thôi (:|.', 'cafe, coffee, bán', 1, '2010-11-11 21:06:49', 0, 3, 4),
(49, 4, 'Olala', 'asdf sa ad fa sasdfasf', '', 1, '2010-11-11 22:06:03', 0, 1, 0),
(50, 3, 'Làm sao để không buồn ngủ?', 'thiệt là chán quá đi mà :(, bùn ngủ quá đi :((', 'bùn ng?', 2, '2010-11-12 01:01:09', 0, 1, 2),
(51, 1, 'tes null quiz pass', 'as fas fs fasd sadfsadf', 'test', 1, '2010-11-12 13:32:17', 0, 1, 15),
(52, 4, 'Test Pass', 'asdf as fasd f asf', 'pass', 1, '2010-11-12 13:36:09', 0, 1, 2),
(53, 4, 'Nguyên đầu bò', 'Tại sao Nguyên lại đầu bò', 'Nguyên', 3, '2010-11-27 14:44:35', 0, 3, 5),
(54, 4, 'asmdfnbaksj hfsa dfa df', 'a sdfkal jhfkjashkjashfkjsadhkjsadhkfjahsfgsadfaf', '', 3, '2010-11-29 12:53:59', 0, 1, 1),
(55, 3, 'Bảng Cửu Chương', 'Kiểm tra bảng cửu chương, Kiểm tra bảng cửu chương, Kiểm tra bảng cửu chương, Kiểm tra bảng cửu chương.', 'toán', 3, '2010-11-29 14:38:40', 0, 3, 6),
(56, 4, 'sad', 'asd', '', 1, '2010-12-01 14:41:15', 0, 2, 1),
(57, 4, 'as dfas fasda', 'sd fasd fasd fasdf', '', 1, '2010-12-01 14:44:48', 0, 1, 0),
(60, 3, 'sadsad', 'asdfasqdwfsdaffasdf aasdf', '', 3, '2010-12-01 15:10:05', 0, 2, 1),
(61, 4, 'cgmhcmghc', 'mcfgmcfg', '', 3, '2010-12-01 16:32:20', 0, 2, 1);

--
-- Triggers `quiz`
--
DROP TRIGGER IF EXISTS `quiz_total_insert`;
DELIMITER //
CREATE TRIGGER `quiz_total_insert` AFTER INSERT ON `quiz`
 FOR EACH ROW BEGIN
UPDATE category SET quiz_total = quiz_total + 1 WHERE category_id = NEW.category_id;
UPDATE users SET quiz_created = quiz_created + 1 WHERE user_id = NEW.user_id;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `auto_delete_question`;
DELIMITER //
CREATE TRIGGER `auto_delete_question` BEFORE DELETE ON `quiz`
 FOR EACH ROW BEGIN
DELETE FROM question WHERE quiz_id = OLD.quiz_id;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `quiz_total_delete`;
DELIMITER //
CREATE TRIGGER `quiz_total_delete` AFTER DELETE ON `quiz`
 FOR EACH ROW BEGIN
UPDATE category SET quiz_total = quiz_total - 1 WHERE category_id = OLD.category_id;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_setting`
--

CREATE TABLE IF NOT EXISTS `quiz_setting` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) DEFAULT NULL COMMENT '1 la public, 0 la đong',
  `st_status` tinyint(1) DEFAULT '1',
  `st_password` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '0 là ko có pass, còn lại là pass',
  `st_time` int(11) DEFAULT '0' COMMENT '0 là ko giới hạn, được tính = phút',
  `st_date_start` datetime DEFAULT NULL,
  `st_date_end` datetime DEFAULT NULL,
  `st_show` tinyint(4) DEFAULT '0' COMMENT '0 là show hết, 1 là show 1 câu hỏi',
  `st_sort` tinyint(4) DEFAULT '0' COMMENT '0 là default, 1 là random',
  `st_limit` tinyint(4) DEFAULT '0' COMMENT '0 ko giới hạn, 1: chỉ được thực hiện 1 lần',
  PRIMARY KEY (`st_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `quiz_setting`
--

INSERT INTO `quiz_setting` (`st_id`, `quiz_id`, `st_status`, `st_password`, `st_time`, `st_date_start`, `st_date_end`, `st_show`, `st_sort`, `st_limit`) VALUES
(1, 44, 1, '', 5, NULL, NULL, 0, 0, 0),
(2, 45, 1, '', 0, NULL, NULL, 0, 0, 0),
(3, 46, 1, 'nothing', 15, NULL, NULL, 0, 0, 0),
(4, 47, 1, '', 1, NULL, NULL, 0, 0, 0),
(5, 48, 1, '123456', 0, NULL, NULL, 0, 0, 0),
(6, 49, 1, '', 0, NULL, NULL, 0, 0, 0),
(7, 50, 1, 'sayoung', 5, NULL, NULL, 0, 0, 0),
(8, 51, 1, '', 0, NULL, NULL, 0, 0, 0),
(9, 52, 1, '', 0, NULL, NULL, 0, 0, 0),
(10, 53, 1, '', 1, NULL, NULL, 0, 0, 0),
(11, 54, 1, '123456', 5, NULL, NULL, 0, 0, 0),
(12, 55, 1, '', 1, NULL, NULL, 0, 0, 0),
(13, 56, 1, '', -90, NULL, NULL, 0, 0, 0),
(14, 57, 1, '', 0, NULL, NULL, 0, 0, 0),
(15, 58, 1, '', 0, NULL, NULL, 0, 0, 0),
(16, 59, 1, '', 0, NULL, NULL, 0, 0, 0),
(17, 60, 1, '', 15, NULL, NULL, 0, 0, 0),
(18, 61, 1, '', 1, NULL, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `rp_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `time` tinyint(4) DEFAULT '0',
  `total_time` tinyint(4) DEFAULT NULL,
  `correct` tinyint(4) DEFAULT '0',
  `wrong` tinyint(4) DEFAULT NULL,
  `score` double DEFAULT '0',
  PRIMARY KEY (`rp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=72 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`rp_id`, `quiz_id`, `user_id`, `date`, `time`, `total_time`, `correct`, `wrong`, `score`) VALUES
(1, 51, 1, '2010-11-12 14:46:26', 0, NULL, 0, NULL, 0),
(2, 51, 1, '2010-11-12 14:59:45', 0, NULL, 0, NULL, 0),
(3, 51, 1, '2010-11-12 15:01:36', 0, NULL, 0, NULL, 0),
(4, 51, 1, '2010-11-12 15:10:19', 8, NULL, 1, NULL, 100),
(5, 51, 1, '2010-11-12 15:12:46', 4, NULL, 1, NULL, 100),
(6, 44, 1, '2010-11-12 15:13:41', 15, NULL, 1, NULL, 30),
(7, 52, 1, '2010-11-12 15:15:30', 0, NULL, 0, NULL, 0),
(8, 52, 1, '2010-11-12 15:15:41', 0, NULL, 0, NULL, 0),
(9, 47, 1, '2010-11-12 15:15:48', 4, NULL, 0, NULL, 0),
(10, 44, 1, '2010-11-12 15:16:03', 6, NULL, 1, NULL, 33.3),
(11, 44, 1, '2010-11-12 15:17:11', 7, NULL, 2, NULL, 66.7),
(12, 48, 1, '2010-11-12 15:18:53', 13, NULL, 1, NULL, 33),
(13, 48, 1, '2010-11-12 15:19:30', 11, NULL, 2, NULL, 67),
(14, 50, 1, '2010-11-12 15:28:36', 99, NULL, 1, NULL, 100),
(15, 51, NULL, '2010-11-22 10:17:22', 0, NULL, 0, NULL, 0),
(16, 51, 1, '2010-11-22 10:17:44', 0, NULL, 0, NULL, 0),
(17, 51, 1, '2010-11-22 10:17:48', 7, NULL, 1, NULL, 100),
(18, 46, 1, '2010-11-22 10:18:19', 0, NULL, 0, NULL, 0),
(19, 46, 1, '2010-11-22 10:18:23', 0, NULL, 0, NULL, 0),
(20, 46, 1, '2010-11-22 10:18:25', 0, NULL, 0, NULL, 0),
(21, 46, 1, '2010-11-22 10:18:27', 63, NULL, 0, NULL, 0),
(22, 46, NULL, '2010-11-22 10:19:09', 0, NULL, 0, NULL, 0),
(23, 46, NULL, '2010-11-22 10:19:12', 0, NULL, 0, NULL, 0),
(24, 51, 2, '2010-11-22 12:58:35', 0, NULL, 0, NULL, 0),
(25, 51, 2, '2010-11-22 12:58:42', 0, NULL, 0, NULL, 0),
(26, 51, 2, '2010-11-22 12:58:46', 0, NULL, 0, NULL, 0),
(27, 48, 2, '2010-11-22 13:02:29', 0, NULL, 0, NULL, 0),
(28, 46, 2, '2010-11-22 13:03:07', 0, NULL, 0, NULL, 0),
(29, 46, 2, '2010-11-22 13:03:10', 0, NULL, 0, NULL, 0),
(30, 46, 2, '2010-11-22 13:03:13', 0, NULL, 0, NULL, 0),
(31, 46, 2, '2010-11-22 13:03:56', 0, NULL, 0, NULL, 0),
(32, 46, 2, '2010-11-22 13:03:59', 0, NULL, 0, NULL, 0),
(33, 47, 2, '2010-11-22 13:04:49', 0, NULL, 0, NULL, 0),
(34, 47, 2, '2010-11-22 13:04:52', 0, NULL, 0, NULL, 0),
(35, 48, 1, '2010-11-23 18:14:21', 0, NULL, 0, NULL, 0),
(36, 47, 1, '2010-11-23 18:14:51', 0, NULL, 0, NULL, 0),
(37, 47, 1, '2010-11-23 18:38:19', 0, NULL, 0, NULL, 0),
(38, 47, 1, '2010-11-23 18:39:05', 0, NULL, 0, NULL, 0),
(39, 47, 1, '2010-11-23 18:43:27', 12, NULL, 0, NULL, 0),
(40, 47, 1, '2010-11-23 18:44:32', 60, NULL, 0, NULL, 0),
(41, 47, 1, '2010-11-23 18:46:11', 0, NULL, 0, NULL, 0),
(42, 47, 1, '2010-11-27 09:44:40', 60, NULL, 0, NULL, 0),
(43, 47, 1, '2010-11-27 09:49:10', 0, NULL, 0, NULL, 0),
(44, 47, 1, '2010-11-27 09:51:19', 0, NULL, 0, NULL, 0),
(45, 47, 1, '2010-11-27 09:51:29', 5, NULL, 0, NULL, 0),
(46, 47, 1, '2010-11-27 09:51:49', 0, NULL, 0, NULL, 0),
(47, 51, 1, '2010-11-27 09:52:46', 0, NULL, 0, NULL, 0),
(48, 51, 1, '2010-11-27 09:56:16', 0, NULL, 0, NULL, 0),
(49, 47, 1, '2010-11-27 09:56:29', 0, NULL, 0, NULL, 0),
(50, 47, 1, '2010-11-27 09:56:37', 3, NULL, 0, NULL, 0),
(51, 47, 1, '2010-11-27 09:56:46', 0, NULL, 0, NULL, 0),
(52, 53, 3, '2010-11-27 14:44:42', 6, NULL, 0, NULL, 0),
(53, 53, 3, '2010-11-27 15:34:14', 11, 1, 2, 1, 67),
(54, 53, 2, '2010-11-27 15:36:11', 60, 1, 1, 2, 33),
(55, 53, 1, '2010-11-27 15:46:15', 16, 1, 1, 2, 33),
(56, 53, 1, '2010-11-27 15:46:40', 0, 1, 0, 3, 0),
(57, 54, 3, '2010-11-29 12:54:10', 51, 5, 0, 1, 0),
(58, 55, 3, '2010-11-29 14:40:22', 16, 1, 2, 1, 67),
(59, 55, 4, '2010-11-29 14:41:31', 10, 1, 3, 0, 100),
(60, 55, 1, '2010-11-29 14:42:14', 4, 1, 1, 2, 33),
(61, 50, 2, '2010-12-01 14:25:20', 4, 5, 0, 1, 0),
(62, 51, 1, '2010-12-01 14:37:16', 9, 0, 0, 1, 0),
(63, 56, 1, '2010-12-01 14:41:24', 0, -90, 0, 2, 0),
(64, 59, 1, '2010-12-01 14:47:29', 39, 0, 0, 1, 0),
(65, 51, 1, '2010-12-01 14:55:57', 0, 0, 0, 1, 0),
(66, 55, 1, '2010-12-01 14:56:30', 0, 1, 0, 3, 0),
(67, 55, 1, '2010-12-01 14:58:27', 15, 1, 2, 1, 67),
(68, 60, 3, '2010-12-01 15:10:20', 0, 15, 0, 2, 0),
(69, 61, 3, '2010-12-01 16:32:33', 21, 1, 1, 1, 50),
(70, 55, 1, '2010-12-07 13:47:06', 15, 1, 1, 2, 33),
(71, 47, 1, '2010-12-07 14:13:45', 60, 1, 0, 1, 0);

--
-- Triggers `reports`
--
DROP TRIGGER IF EXISTS `user_quizzed_insert`;
DELIMITER //
CREATE TRIGGER `user_quizzed_insert` AFTER INSERT ON `reports`
 FOR EACH ROW BEGIN
UPDATE quiz SET made_total = made_total + 1 WHERE quiz_id = NEW.quiz_id;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member' COMMENT 'guest, member, moderator, administrator',
  `username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `quized` int(11) NOT NULL DEFAULT '0',
  `created_on` datetime DEFAULT '0000-00-00 00:00:00',
  `quiz_created` int(11) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `username`, `password`, `email`, `quized`, `created_on`, `quiz_created`) VALUES
(1, '1', 'Admin', 'e10adc3949ba59abbe56e057f20f883e', 'lethanhquang910@gmail.com', 0, '2010-11-06 10:42:25', 12),
(2, '2', 'Mr.Alex', 'e10adc3949ba59abbe56e057f20f883e', 'lethanhquang910@yahoo.com', 0, '2010-11-12 00:57:15', 1),
(3, '3', 'lethanhquang', 'dc2771009aabc4a37da503249ffd8f97', 'lethanhquang910@gmail.com', 0, '2010-11-27 13:52:28', 5),
(4, '3', 'Sayoung', 'e10adc3949ba59abbe56e057f20f883e', 'sayoung@gmail.com', 0, '2010-11-27 13:53:39', 0),
(5, '3', 'Hello', 'e10adc3949ba59abbe56e057f20f883e', 'hello@gmail.com', 0, '2010-11-27 13:55:48', 0),
(6, '1', 'Quang', 'e10adc3949ba59abbe56e057f20f883e', 'hello@gmail.com', 0, '2010-12-04 19:10:01', 0),
(7, '3', 'Olala', 'e10adc3949ba59abbe56e057f20f883e', 'ollala@yahoo.com', 0, '2010-12-04 20:24:41', 0),
(8, '3', 'Superman', 'e10adc3949ba59abbe56e057f20f883e', 'superman@gmail.com', 0, '2010-12-04 20:25:05', 0),
(9, '3', '071163', 'e10adc3949ba59abbe56e057f20f883e', 'quang.lt1163@sinhvien.hoasen.edu.vn', 0, '2010-12-04 20:25:47', 0),
(10, '3', 'ThienThanh', 'e10adc3949ba59abbe56e057f20f883e', 'a@b.com', 0, '2010-12-04 20:26:05', 0),
(11, '3', 'meomeo', 'e10adc3949ba59abbe56e057f20f883e', 'acb@def.com', 0, '2010-12-04 20:26:44', 0),
(12, '1', 'Baogio', 'e10adc3949ba59abbe56e057f20f883e', 'lethanhquang910@gmail.com', 0, '2010-12-04 20:28:59', 0),
(13, '2', 'Teacher', 'e10adc3949ba59abbe56e057f20f883e', 'test@gmail.com', 0, '2010-12-04 20:29:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_type`
--

CREATE TABLE IF NOT EXISTS `users_type` (
  `user_type` int(11) NOT NULL AUTO_INCREMENT,
  `user_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`user_type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users_type`
--

INSERT INTO `users_type` (`user_type`, `user_title`, `info`) VALUES
(1, 'Administrator', NULL),
(2, 'Teacher', NULL),
(3, 'Student', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
