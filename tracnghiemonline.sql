-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2010 at 05:16 AM
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
  `a_text` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=264 ;

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
(241, 99, 1, 0, 'Sai'),
(240, 99, 0, 1, 'Đúng'),
(242, 101, 0, 0, 'sdfg dsgd gsdf gsdg sdg'),
(238, 98, 0, 1, 'Đúng'),
(239, 98, 1, 0, 'Sai'),
(260, 113, 0, 1, 'Sống chết gì cũng ráng làm cho xong,'),
(246, 105, 0, 0, 'đây là tự luận answeer'),
(247, 106, 0, 1, 'aaa'),
(248, 106, 1, 0, 'bbb'),
(249, 107, 0, 1, 'ccc'),
(250, 107, 1, 0, 'dddd'),
(251, 107, 2, 1, 'eee'),
(252, 107, 3, 0, 'ffffff'),
(253, 108, 0, 1, 'Đúng'),
(254, 108, 1, 0, 'Sai'),
(255, 109, 0, 0, NULL),
(261, 113, 1, 0, 'Nghĩ cho khỏe, đằng nào cũng trễ.'),
(262, 113, 2, 0, 'kêu gọi mọi người giúp đỡ, nếu không xong thì đành chịu.'),
(263, 114, 0, 0, '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `code`, `created_on`, `title`, `info`, `status`, `quiz_total`, `user_id`) VALUES
(9, 'KD071', 0, 'Kinh Doanh', 'Bao gồm các lĩnh vực về kinh tế, thị trường,... liên quan đến lĩnh vực Business', 1, 6, 1),
(2, 'QL071A', 0, 'Công Nghệ & Máy Tính', 'Các bài Quiz liên quan đến các lĩnh vực về Công Nghệ Thông Tin, Máy tính, Phần mềm, Phần Cứng...', 1, 2, 2),
(3, 'ED007', 0, 'Giáo Dục', 'Các bài liên quan đến thông tin giáo dục, đề thi, v.v...', 1, 4, 1),
(4, 'FN010', 0, 'Giải Trí', 'Những bài quiz có nội dung vui nhộn, giải trí, xã stress...', 1, 10, 2),
(5, 'ENG10', 0, 'Ngoại Ngữ', 'Ngoại ngữ các loại...', 1, 0, 3),
(6, 'VT071', 1291653101, 'Mạng máy tính', 'as dfasdf asfasdf dasfas dfsadf', 1, 0, 1),
(7, 'OLA12', 1291653145, 'Test môn học', 'adsf asdf asdfasdfsadf', 1, 0, 1),
(8, 'VT071', 1291653190, 'asd fasdfasdf', '', 1, 0, 1),
(1, 'Default', 0, 'Mặc định', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dssv`
--

CREATE TABLE IF NOT EXISTS `dssv` (
  `ds_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ds_status` tinyint(4) DEFAULT '1' COMMENT '0: cấm thi, 1: được thi',
  PRIMARY KEY (`ds_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dssv`
--


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
  `q_score` float DEFAULT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `quiz_id`, `q_text`, `q_order`, `q_type`, `q_score`) VALUES
(65, 44, 'Lê Thành Quang là người đẹp trai nhất đúng hay sai?', 0, 3, NULL),
(66, 44, '1 + 1 bằng mấy?', 1, 1, NULL),
(67, 44, 'Ước của 9 là?', 2, 2, NULL),
(68, 45, 'Nội dung câu hỏi', 0, 2, NULL),
(69, 46, 'Nội dung câu hỏi b', 0, 1, NULL),
(70, 46, 'Nội dung câu hỏi adc', 1, 2, NULL),
(71, 47, 'Nội dung câu hỏi', 0, 1, NULL),
(72, 48, 'Theo bạn cafe có tốt cho sức khỏe không?', 0, 1, NULL),
(73, 48, 'Theo bạn cafe như thế nào thì ngon?', 1, 2, NULL),
(74, 48, 'Cafe làm từ "kứt" chồn ngon hơn các loại bình thường?', 2, 3, NULL),
(75, 49, 'Nội dung câu hỏi', 0, 1, NULL),
(76, 50, 'bùn ngủ thì nên làm gì?', 0, 1, NULL),
(77, 51, 'Nội dung câu hỏi', 0, 1, NULL),
(78, 52, 'Nội dung câu hỏi', 0, 2, NULL),
(79, 53, 'Nội dung câu hỏi', 0, 1, NULL),
(80, 53, 'Nội dung câu hỏi', 1, 2, NULL),
(81, 53, 'Nội dung câu hỏi', 2, 2, NULL),
(82, 54, 'Nội dung câu hỏi', 0, 1, NULL),
(83, 55, '2 x 9 = ? ', 0, 1, NULL),
(84, 55, '7 x 6 = ? ', 1, 1, NULL),
(85, 55, '3 x 6 = ? ', 2, 1, NULL),
(86, 56, 'Nội dung câu hỏi', 0, 1, NULL),
(87, 56, 'Nội dung câu hỏi', 1, 2, NULL),
(88, 57, 'Nội dung câu hỏi', 0, 1, NULL),
(91, 60, 'Nội dung câu hỏi', 0, 1, NULL),
(92, 60, 'Nội dung câu hỏi', 1, 2, NULL),
(95, 62, 'Nội dung câu hỏi tự luận', 0, NULL, NULL),
(99, 74, 'Nội dung câu hỏi', 0, 3, NULL),
(98, 73, 'Nội dung câu hỏi', 0, 3, NULL),
(100, 75, 'Nội dung câu hỏi', 0, NULL, NULL),
(101, 76, 'Nội dung câu hỏi', 0, 4, NULL),
(113, 82, 'Nếu chỉ còn 1 ngày nữa là tới hạn deadline và bạn vẫn chưa xong công việc, bạn sẽ làm gì?', 0, 1, NULL),
(105, 79, 'Nội dung câu hỏi tự luận', 0, 4, NULL),
(106, 80, 'Nội dung câu hỏi', 0, 1, NULL),
(107, 80, 'Nội dung câu hỏi', 1, 2, NULL),
(108, 80, 'Nội dung câu hỏi', 2, 3, NULL),
(109, 80, 'Nội dung câu hỏi tự luận', 3, 4, NULL),
(114, 82, 'Ý kiến khác của bạn?', 1, 4, NULL);

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
  `user_id` int(11) DEFAULT NULL COMMENT 'nguoi tao quiz',
  `created_on` datetime DEFAULT NULL COMMENT 'ngay tao quiz',
  `question_total` tinyint(4) DEFAULT NULL,
  `made_total` int(11) DEFAULT '0',
  PRIMARY KEY (`quiz_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `category_id`, `quiz_title`, `quiz_info`, `user_id`, `created_on`, `question_total`, `made_total`) VALUES
(46, 4, '25 minutes', 'klafdjs fajhsd kflah akjsdh fakjh fakjsdhf kasdj hfakjdsh fakjsd hfkajsd hfkajsdh fkajsdh fkjashdl fkja shdf kjas dh fkjash fkjah sdkjafh fkasjdhf kajsh fkajs hfakjsdf hakjsdh fjkash dfkjas dhfkja sdhf kasjdhf kadsh kjads fhdskj hf akjhfa kjsdh', 1, '2010-11-10 12:45:52', 1, 28),
(44, 3, 'Test new quiz', 'chỉ là một bài test bình thường thôi mà :)', 1, '2010-11-10 12:00:16', 3, 3),
(45, 4, 'a', 'a', 1, '2010-11-10 12:00:33', 1, 0),
(47, 4, 'Quiz 5 giây test', 'as dfas dfas dfasd fasd f', 1, '2010-11-11 01:39:12', 2, 18),
(48, 1, 'Bán cafe?', 'tình hình là đang rất thèm coffee, nhưng mà coffee hết rùi, sẵn tiện test thế thôi (:|.', 1, '2010-11-11 21:06:49', 3, 4),
(49, 4, 'Olala', 'asdf sa ad fa sasdfasf', 1, '2010-11-11 22:06:03', 1, 0),
(50, 3, 'Làm sao để không buồn ngủ?', 'thiệt là chán quá đi mà :(, bùn ngủ quá đi :((', 2, '2010-11-12 01:01:09', 1, 5),
(51, 1, 'tes null quiz pass', 'as fas fs fasd sadfsadf', 1, '2010-11-12 13:32:17', 1, 16),
(52, 4, 'Test Pass', 'asdf as fasd f asf', 1, '2010-11-12 13:36:09', 1, 2),
(53, 4, 'Nguyên đầu bò', 'Tại sao Nguyên lại đầu bò', 3, '2010-11-27 14:44:35', 3, 5),
(54, 4, 'asmdfnbaksj hfsa dfa df', 'a sdfkal jhfkjashkjashfkjsadhkjsadhkfjahsfgsadfaf', 3, '2010-11-29 12:53:59', 1, 1),
(55, 3, 'Bảng Cửu Chương', 'Kiểm tra bảng cửu chương, Kiểm tra bảng cửu chương, Kiểm tra bảng cửu chương, Kiểm tra bảng cửu chương.', 3, '2010-11-29 14:38:40', 3, 11),
(56, 4, 'sad', 'asd', 1, '2010-12-01 14:41:15', 2, 1),
(57, 4, 'as dfas fasda', 'sd fasd fasd fasdf', 1, '2010-12-01 14:44:48', 1, 0),
(60, 3, 'sadsad', 'asdfasqdwfsdaffasdf aasdf', 3, '2010-12-01 15:10:05', 2, 2),
(62, 2, 'test date time setting', 'này thì teswt', 1, '2010-12-09 09:08:12', 1, 0),
(74, 9, 'ra cái coi', 'a sdfaf', 1, '2010-12-09 09:23:59', 1, 1),
(75, 9, 'test tự luận', 'a sdf asfas df', 1, '2010-12-09 10:11:32', 1, 0),
(76, 9, 'gs dfgs dgsfd', 's fgs gsdf gsfdg sdg sdf', 1, '2010-12-09 10:14:41', 1, 1),
(79, 9, 'test tự luận 2', 'ad fas fasd fsa f', 1, '2010-12-09 20:42:20', 1, 31),
(73, 1, 'okie babe', ' asdfsa fasdf asdf', 1, '2010-12-09 09:19:33', 1, 6),
(82, 2, 'Ôi deadline', '\\"Deadline\\" cụm từ kinh hoàng T+T', 2, '2010-12-21 23:36:01', 2, 3),
(80, 9, 'test all question', 'aasf asdfasdf asdf', 1, '2010-12-11 18:18:02', 4, 65);

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
DELETE FROM quiz_setting WHERE quiz_id = OLD.quiz_id;
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
  `st_question_show` tinyint(4) DEFAULT '0' COMMENT '0 là show hết, 1 là show 1 câu hỏi',
  `st_question_sort` tinyint(4) DEFAULT '0' COMMENT '0 là default, 1 là random',
  `st_limit` tinyint(4) DEFAULT '0' COMMENT '0 ko giới hạn, 1: chỉ được thực hiện 1 lần',
  `st_score_show` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`st_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `quiz_setting`
--

INSERT INTO `quiz_setting` (`st_id`, `quiz_id`, `st_status`, `st_password`, `st_time`, `st_date_start`, `st_date_end`, `st_question_show`, `st_question_sort`, `st_limit`, `st_score_show`) VALUES
(1, 44, 1, '', 5, '2010-12-09 08:52:10', NULL, 0, 0, 0, 0),
(2, 45, 1, '', 0, NULL, NULL, 0, 0, 0, 0),
(3, 46, 1, 'nothing', 15, NULL, NULL, 0, 0, 0, 0),
(4, 47, 1, '', 1, NULL, NULL, 0, 0, 0, 0),
(5, 48, 1, '123456', 0, NULL, NULL, 0, 0, 0, 0),
(6, 49, 1, '', 0, NULL, NULL, 0, 0, 0, 0),
(7, 50, 1, 'sayoung', 5, NULL, NULL, 0, 0, 0, 0),
(8, 51, 1, '', 0, NULL, NULL, 0, 0, 0, 0),
(9, 52, 1, '', 0, NULL, NULL, 0, 0, 0, 0),
(10, 53, 1, '', 1, NULL, NULL, 0, 0, 0, 0),
(11, 54, 1, '123456', 5, NULL, NULL, 0, 0, 0, 0),
(12, 55, 1, '', 1, NULL, NULL, 0, 0, 0, 0),
(13, 56, 1, '', -90, NULL, NULL, 0, 0, 0, 0),
(14, 57, 1, '', 0, NULL, NULL, 0, 0, 0, 0),
(15, 58, 1, '', 0, NULL, NULL, 0, 0, 0, 0),
(16, 59, 1, '', 0, NULL, NULL, 0, 0, 0, 0),
(17, 60, 1, '', 15, NULL, NULL, 0, 0, 0, 0),
(19, 62, 0, '', 0, NULL, NULL, 0, 0, 0, 0),
(20, 63, 0, '', 0, NULL, NULL, 0, 0, 0, 0),
(21, 64, 2, '', 0, '2010-12-01 00:32:55', '2010-12-25 00:33:03', 0, 0, 0, 0),
(22, 73, 2, '', 0, '2010-12-01 01:00:00', '2010-12-31 12:00:00', 0, 0, 0, 0),
(23, 74, 1, '', 0, NULL, NULL, 0, 0, 0, 0),
(24, 75, 1, '', 0, NULL, NULL, 0, 0, 0, 0),
(25, 76, 1, '', 0, NULL, NULL, 0, 0, 0, 0),
(31, 82, 1, '', 0, NULL, NULL, 0, 0, 0, 0),
(28, 79, 1, '', 0, NULL, NULL, 0, 0, 0, 0),
(29, 80, 1, '', 0, NULL, NULL, 0, 0, 0, 1);

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
  `rp_status` tinyint(4) DEFAULT '0' COMMENT '0: chưa chấm, 1: chấm rồi',
  PRIMARY KEY (`rp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=215 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`rp_id`, `quiz_id`, `user_id`, `date`, `time`, `total_time`, `correct`, `wrong`, `score`, `rp_status`) VALUES
(195, 80, 1, '2010-12-12 17:05:19', 9, 0, 1, 3, 3, 0),
(196, 80, 2, '2010-12-12 17:09:57', 0, 0, 0, 4, 0, 0),
(197, 79, 1, '2010-12-19 22:25:45', 17, 0, 0, 1, 0, 0),
(198, 81, 1, '2010-12-19 22:27:14', 6, 0, 3, 0, 10, 1),
(199, 80, 3, '2010-12-20 22:45:59', 11, 0, 2, 2, 5, 1),
(200, 46, 1, '2010-12-20 23:38:57', 67, 15, 1, 1, 5, 0),
(201, 61, 1, '2010-12-21 22:35:22', 60, 1, 1, 1, 5, 1),
(202, 80, 4, '2010-12-21 22:40:55', 4, 0, 2, 2, 5, 0),
(203, 79, 4, '2010-12-21 22:41:44', 11, 0, 0, 1, 0, 0),
(204, 73, 4, '2010-12-21 22:42:03', 4, 0, 1, 0, 10, 1),
(205, 51, 4, '2010-12-21 22:42:41', 3, 0, 0, 1, 0, 1),
(206, 60, 1, '2010-12-21 23:10:06', 4, 15, 1, 1, 5, 0),
(207, 50, 2, '2010-12-21 23:20:11', 3, 5, 1, 0, 10, 0),
(208, 50, 4, '2010-12-21 23:20:53', 3, 5, 0, 1, 0, 0),
(209, 50, 3, '2010-12-21 23:22:45', 3, 5, 1, 0, 10, 0),
(210, 82, 9, '2010-12-21 23:36:23', 32, 0, 1, 1, 5, 0),
(211, 82, 3, '2010-12-21 23:37:42', 7, 0, 0, 2, 0, 0),
(212, 82, 4, '2010-12-21 23:38:09', 4, 0, 1, 1, 5, 0),
(213, 46, 2, '2010-12-22 04:43:06', 14, 15, 0, 2, 0, 0),
(214, 46, 3, '2010-12-22 05:12:07', 0, 15, 0, 1, 0, 0);

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
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `rs_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `rs_result` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`rs_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=694 ;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`rs_id`, `user_id`, `quiz_id`, `question_id`, `answer_id`, `rs_result`) VALUES
(602, 1, 80, 106, 247, '0'),
(603, 1, 80, 106, 248, NULL),
(604, 1, 80, 107, 249, '0'),
(605, 1, 80, 107, 250, '2'),
(606, 1, 80, 107, 251, '3'),
(607, 1, 80, 107, 252, NULL),
(608, 1, 80, 108, 253, NULL),
(609, 1, 80, 108, 254, NULL),
(610, 1, 80, 109, 255, ''),
(611, 2, 80, 106, 247, NULL),
(612, 2, 80, 106, 248, '1'),
(613, 2, 80, 107, 249, '0'),
(614, 2, 80, 107, 250, NULL),
(615, 2, 80, 107, 251, '2'),
(616, 2, 80, 107, 252, '3'),
(617, 2, 80, 108, 253, NULL),
(618, 2, 80, 108, 254, '1'),
(619, 2, 80, 109, 255, 'hahahah ah aha ah a'),
(624, 1, 81, 112, 259, NULL),
(623, 1, 81, 112, 258, '0'),
(622, 1, 81, 111, 257, '0'),
(621, 1, 81, 110, 256, '0'),
(620, 1, 79, 105, 246, 'THẦY ƠI, EM KHÔNG BIẾT LÀM :('),
(625, 3, 80, 106, 247, '0'),
(626, 3, 80, 106, 248, NULL),
(627, 3, 80, 107, 249, '0'),
(628, 3, 80, 107, 250, NULL),
(629, 3, 80, 107, 251, NULL),
(630, 3, 80, 107, 252, NULL),
(631, 3, 80, 108, 253, '0'),
(632, 3, 80, 108, 254, NULL),
(633, 3, 80, 109, 255, 'df adsf adsf a afda fsa a fda faf '),
(634, 1, 46, 69, 166, '0'),
(635, 1, 46, 69, 167, NULL),
(636, 1, 46, 70, 168, NULL),
(637, 1, 46, 70, 169, NULL),
(638, 1, 46, 70, 170, NULL),
(639, 1, 46, 70, 171, NULL),
(640, 1, 61, 93, 228, '0'),
(641, 1, 61, 93, 229, NULL),
(642, 1, 61, 93, 230, NULL),
(643, 1, 61, 93, 231, NULL),
(644, 1, 61, 94, 232, '1'),
(645, 1, 61, 94, 233, NULL),
(646, 4, 80, 106, 247, '0'),
(647, 4, 80, 106, 248, NULL),
(648, 4, 80, 107, 249, NULL),
(649, 4, 80, 107, 250, NULL),
(650, 4, 80, 107, 251, NULL),
(651, 4, 80, 107, 252, NULL),
(652, 4, 80, 108, 253, '0'),
(653, 4, 80, 108, 254, NULL),
(654, 4, 80, 109, 255, ''),
(655, 4, 79, 105, 246, 'huhuhu, thật là khó quá đi :('),
(656, 4, 73, 98, 238, '0'),
(657, 4, 73, 98, 239, NULL),
(658, 4, 51, 77, 187, '1'),
(659, 4, 51, 77, 188, NULL),
(660, 1, 60, 91, 224, '0'),
(661, 1, 60, 91, 225, NULL),
(662, 1, 60, 92, 226, NULL),
(663, 1, 60, 92, 227, NULL),
(664, 2, 50, 76, 185, '0'),
(665, 2, 50, 76, 186, NULL),
(666, 4, 50, 76, 185, '1'),
(667, 4, 50, 76, 186, NULL),
(668, 3, 50, 76, 185, '0'),
(669, 3, 50, 76, 186, NULL),
(670, 9, 82, 113, 260, '0'),
(671, 9, 82, 113, 261, NULL),
(672, 9, 82, 113, 262, NULL),
(673, 9, 82, 114, 263, 'KHông có ý kiến, điền chơi cho zui thôi ạ :">'),
(674, 3, 82, 113, 260, '2'),
(675, 3, 82, 113, 261, NULL),
(676, 3, 82, 113, 262, NULL),
(677, 3, 82, 114, 263, ''),
(678, 4, 82, 113, 260, '0'),
(679, 4, 82, 113, 261, NULL),
(680, 4, 82, 113, 262, NULL),
(681, 4, 82, 114, 263, ''),
(682, 2, 46, 69, 166, '0'),
(683, 2, 46, 69, 167, NULL),
(684, 2, 46, 70, 168, NULL),
(685, 2, 46, 70, 169, NULL),
(686, 2, 46, 70, 170, NULL),
(687, 2, 46, 70, 171, NULL),
(688, 3, 46, 69, 166, NULL),
(689, 3, 46, 69, 167, NULL),
(690, 3, 46, 70, 168, NULL),
(691, 3, 46, 70, 169, NULL),
(692, 3, 46, 70, 170, NULL),
(693, 3, 46, 70, 171, NULL);

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
  `user_status` tinyint(4) DEFAULT '1' COMMENT '1: available, 0: disable',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `username`, `password`, `email`, `quized`, `created_on`, `quiz_created`, `user_status`) VALUES
(1, '1', 'Admin', 'e10adc3949ba59abbe56e057f20f883e', 'lethanhquang910@gmail.com', 0, '2010-11-06 10:42:25', 31, 1),
(2, '2', 'Mr.Alex', 'e10adc3949ba59abbe56e057f20f883e', 'lethanhquang910@yahoo.com', 0, '2010-11-12 00:57:15', 3, 1),
(3, '3', 'lethanhquang', 'dc2771009aabc4a37da503249ffd8f97', 'lethanhquang910@gmail.com', 0, '2010-11-27 13:52:28', 5, 1),
(4, '3', 'Sayoung', 'e10adc3949ba59abbe56e057f20f883e', 'sayoung@gmail.com', 0, '2010-11-27 13:53:39', 0, 1),
(5, '3', 'Hello', 'e10adc3949ba59abbe56e057f20f883e', 'hello@gmail.com', 0, '2010-11-27 13:55:48', 0, 1),
(6, '1', 'Quang', 'e10adc3949ba59abbe56e057f20f883e', 'hello@gmail.com', 0, '2010-12-04 19:10:01', 0, 1),
(7, '3', 'Olala', 'e10adc3949ba59abbe56e057f20f883e', 'ollala@yahoo.com', 0, '2010-12-04 20:24:41', 0, 1),
(9, '3', '071163', 'e10adc3949ba59abbe56e057f20f883e', 'quang.lt1163@sinhvien.hoasen.edu.vn', 0, '2010-12-04 20:25:47', 0, 1),
(10, '3', 'ThienThanh', 'e10adc3949ba59abbe56e057f20f883e', 'a@b.com', 0, '2010-12-04 20:26:05', 0, 1),
(12, '1', 'Baogio', 'e10adc3949ba59abbe56e057f20f883e', 'lethanhquang910@gmail.com', 0, '2010-12-04 20:28:59', 0, 1),
(13, '2', 'Teacher', 'e10adc3949ba59abbe56e057f20f883e', 'test@gmail.com', 0, '2010-12-04 20:29:48', 0, 1);

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
