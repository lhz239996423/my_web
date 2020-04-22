-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2020 �?04 �?22 �?08:06
-- 服务器版本: 5.5.53
-- PHP 版本: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `notepad`
--

-- --------------------------------------------------------

--
-- 表的结构 `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '记事本编号',
  `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '备忘',
  `time` date NOT NULL COMMENT '记录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `note`
--

INSERT INTO `note` (`id`, `user`, `note`, `time`) VALUES
(1, 'root123', '4-21，测试添加记录是否成功', '2020-04-21'),
(2, 'root123', '这是第二条记录，观察是否插入成功', '2020-04-21'),
(5, 'root123', '今天是4-22的第一条记录，观察', '2020-04-22'),
(6, 'root123', '被删除的数据，序号也删除了，这是第六条', '2020-04-21');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user`, `pwd`) VALUES
('lhz2020', '8c654fa4665544c33de29257217a15e3'),
('root', '63a9f0ea7bb98050796b649e85481845'),
('root001', 'd918269bd9b3eea82cbed4525e6d96a9'),
('root123', 'ff9830c42660c1dd1942844f8069b74a'),
('yh2020', 'f4a3b02c5be5ce8c98964163c76721b4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
