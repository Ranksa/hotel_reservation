-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-09-17 04:00:23
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(9) NOT NULL AUTO_INCREMENT COMMENT '管理员号',
  `name` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '管理员姓名',
  `passwd` varchar(200) COLLATE utf8_bin NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='管理员表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `name`, `passwd`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- 表的结构 `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cardid` varchar(25) COLLATE utf8_bin NOT NULL COMMENT '证件号',
  `cardtype` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '证件类型',
  `cname` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '客户姓名',
  `csex` char(1) COLLATE utf8_bin NOT NULL COMMENT '客户性别',
  PRIMARY KEY (`cardid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='顾客表';

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(8) NOT NULL AUTO_INCREMENT COMMENT '订单流水号',
  `roomid` varchar(4) COLLATE utf8_bin NOT NULL COMMENT '房间号',
  `cardid` varchar(25) COLLATE utf8_bin NOT NULL COMMENT '客户标识',
  `entertime` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '入住时间',
  `leavetime` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '离开时间',
  `typeid` int(4) NOT NULL COMMENT '房间类型',
  `linkman` varchar(10) COLLATE utf8_bin DEFAULT NULL COMMENT '联系人',
  `phone` varchar(11) COLLATE utf8_bin DEFAULT NULL COMMENT '联系电话',
  `ostatus` char(1) COLLATE utf8_bin NOT NULL DEFAULT '否' COMMENT '是否网上预订',
  `oremarks` char(1) COLLATE utf8_bin DEFAULT '否' COMMENT '订单是否完成',
  PRIMARY KEY (`orderid`),
  KEY `FK_ORDER` (`typeid`),
  KEY `FK_RECORD` (`cardid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='订单入住表' AUTO_INCREMENT=1131 ;

-- --------------------------------------------------------

--
-- 表的结构 `record`
--

CREATE TABLE IF NOT EXISTS `record` (
  `orderid` int(8) NOT NULL AUTO_INCREMENT COMMENT '订单流水号',
  `roomid` varchar(4) COLLATE utf8_bin NOT NULL COMMENT '房间号',
  `cardid` varchar(25) COLLATE utf8_bin NOT NULL COMMENT '客户标识',
  `cardtype` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '证件类型',
  `cname` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '客户姓名',
  `csex` char(1) COLLATE utf8_bin NOT NULL COMMENT '客户性别',
  `entertime` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '入住时间',
  `leavetime` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '离开时间',
  `typeid` int(4) NOT NULL COMMENT '房间类型',
  `linkman` varchar(10) COLLATE utf8_bin DEFAULT NULL COMMENT '联系人',
  `phone` varchar(11) COLLATE utf8_bin DEFAULT NULL COMMENT '联系电话',
  `ostatus` char(1) COLLATE utf8_bin NOT NULL DEFAULT '否' COMMENT '是否网上预订',
  `monetary` decimal(8,2) DEFAULT NULL COMMENT '消费金额',
  `oremarks` char(1) COLLATE utf8_bin DEFAULT NULL COMMENT '订单是否完成',
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='订单入住历史表' AUTO_INCREMENT=1131 ;

--
-- 转存表中的数据 `record`
--

INSERT INTO `record` (`orderid`, `roomid`, `cardid`, `cardtype`, `cname`, `csex`, `entertime`, `leavetime`, `typeid`, `linkman`, `phone`, `ostatus`, `monetary`, `oremarks`) VALUES
(1125, '303', '21232887466654433', '身份证', '麻子', '男', '20150916', '20150920', 1004, '麻子', '15265780937', '是', '1880.00', '是'),
(1126, '302', '65465787978923434', '身份证', '麻子11', '男', '20150916', '20150920', 1003, '麻子11', '15265780937', '是', '1120.00', '是'),
(1127, '101', '333332222225555', '身份证', '张三', '女', '20150916', '20150920', 1000, '张三', '17214567834', '是', '352.00', '是'),
(1128, '201', '21232887466654433', '身份证', '麻子', '男', '20150916', '20150920', 1001, '麻子', '15265780937', '是', '560.00', '是'),
(1129, '303', '215845199001076635', '身份证', '南南', '女', '20150917', '20150921', 1004, '南南', '15741590365', '是', '1880.00', '是'),
(1130, '302', '25684598562', '学生证', '北北', '男', '20150917', '20150919', 1003, '北北', '13541692584', '否', '560.00', '是');

-- --------------------------------------------------------

--
-- 表的结构 `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `roomid` varchar(4) COLLATE utf8_bin NOT NULL COMMENT '房间编号',
  `typeid` int(4) NOT NULL COMMENT '房间类型',
  `location` varchar(55) COLLATE utf8_bin NOT NULL COMMENT '房间位置',
  `status` char(1) COLLATE utf8_bin NOT NULL DEFAULT '否' COMMENT '是否入住',
  `remarks` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '房间描述',
  PRIMARY KEY (`roomid`),
  KEY `FK_ROOM` (`typeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='房间表';

--
-- 转存表中的数据 `room`
--

INSERT INTO `room` (`roomid`, `typeid`, `location`, `status`, `remarks`) VALUES
('101', 1000, '1楼东侧', '否', 't1'),
('102', 1000, '1楼中间', '否', 't2'),
('103', 1000, '1楼西侧', '否', 't3'),
('201', 1001, '2楼东侧', '否', 't4'),
('202', 1001, '2楼中间', '否', 't5'),
('203', 1001, '2楼西侧', '否', 't6'),
('301', 1002, '3楼东侧', '否', 't7'),
('302', 1003, '3楼中间', '否', 't8'),
('303', 1004, '3楼西侧', '否', 't9');

-- --------------------------------------------------------

--
-- 表的结构 `roomtype`
--

CREATE TABLE IF NOT EXISTS `roomtype` (
  `typeid` int(4) NOT NULL AUTO_INCREMENT COMMENT '类型标识',
  `typename` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '类型名称',
  `area` varchar(2) COLLATE utf8_bin NOT NULL COMMENT '房间面积',
  `bednum` char(1) COLLATE utf8_bin NOT NULL COMMENT '床位数量',
  `hasFood` char(1) COLLATE utf8_bin NOT NULL DEFAULT '有' COMMENT '早餐',
  `hasNet` char(1) COLLATE utf8_bin NOT NULL DEFAULT '有' COMMENT '网络',
  `hasTV` char(1) COLLATE utf8_bin NOT NULL DEFAULT '有' COMMENT '有线电视',
  `hasWC` char(1) COLLATE utf8_bin NOT NULL DEFAULT '有' COMMENT '独立卫生间',
  `price` decimal(8,2) NOT NULL COMMENT '价格',
  `totalnum` int(4) NOT NULL COMMENT '房间数量',
  `leftnum` int(4) NOT NULL COMMENT '剩余数量',
  PRIMARY KEY (`typeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='房间类型表' AUTO_INCREMENT=1005 ;

--
-- 转存表中的数据 `roomtype`
--

INSERT INTO `roomtype` (`typeid`, `typename`, `area`, `bednum`, `hasFood`, `hasNet`, `hasTV`, `hasWC`, `price`, `totalnum`, `leftnum`) VALUES
(1000, '标准间【单人】', '20', '1', '有', '有', '有', '无', '88.00', 3, 3),
(1001, '标准间【双人】', '30', '2', '有', '有', '有', '有', '140.00', 3, 3),
(1002, '商务间【双人】', '60', '2', '有', '有', '有', '有', '330.00', 1, 1),
(1003, '商务间【单人】', '50', '1', '有', '有', '有', '有', '280.00', 1, 1),
(1004, '行政间【单人】', '80', '1', '有', '有', '有', '有', '470.00', 1, 1);

--
-- 限制导出的表
--

--
-- 限制表 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_ORDER` FOREIGN KEY (`typeid`) REFERENCES `roomtype` (`typeid`),
  ADD CONSTRAINT `FK_RECORD` FOREIGN KEY (`cardid`) REFERENCES `customer` (`cardid`);

--
-- 限制表 `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `FK_ROOM` FOREIGN KEY (`typeid`) REFERENCES `roomtype` (`typeid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
