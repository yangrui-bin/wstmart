SET FOREIGN_KEY_CHECKS=0;


DROP TABLE IF EXISTS `wst_express`;
CREATE TABLE `wst_express` (
  `expressId` int(11) NOT NULL AUTO_INCREMENT,
  `expressName` varchar(50) NOT NULL,
  `dataFlag` tinyint(4) NOT NULL DEFAULT '1',
  `expressCode` varchar(50) DEFAULT '',
  PRIMARY KEY (`expressId`),
  KEY `dataFlag` (`dataFlag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wst_express` VALUES ('1', '申通快递', '1', 'shentong'),
('2', '中通快递', '1', 'zhongtong'),
('3', '韵达快递', '1', 'yunda'),
('4', '圆通快递', '1', 'yuantong'),
('5', '邮政快递', '1', 'ems'),
('6', '顺丰快递', '1', 'shunfeng');