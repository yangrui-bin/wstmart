SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `wst_users`;
CREATE TABLE `wst_users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `loginName` varchar(20) NOT NULL,
  `loginSecret` int(11) NOT NULL,
  `loginPwd` varchar(50) NOT NULL,
  `userType` tinyint(4) NOT NULL DEFAULT '0',
  `userSex` tinyint(4) DEFAULT '0',
  `userName` varchar(100) DEFAULT NULL,
  `trueName` varchar(100) DEFAULT NULL,
  `brithday` date DEFAULT NULL,
  `userPhoto` varchar(200) DEFAULT NULL,
  `userQQ` varchar(20) DEFAULT NULL,
  `userPhone` char(11) DEFAULT '',
  `userEmail` varchar(50) DEFAULT '',
  `userScore` int(11) DEFAULT '0',
  `userTotalScore` int(11) DEFAULT '0',
  `lastIP` varchar(16) DEFAULT NULL,
  `lastTime` datetime DEFAULT NULL,
  `userFrom` tinyint(4) DEFAULT '0',
  `userMoney` decimal(11,2) DEFAULT '0.00',
  `lockMoney` decimal(11,2) DEFAULT '0.00',
  `userStatus` tinyint(4) NOT NULL DEFAULT '1',
  `dataFlag` tinyint(4) NOT NULL DEFAULT '1',
  `createTime` datetime NOT NULL,
  `payPwd` varchar(100) DEFAULT NULL,
  `rechargeMoney` decimal(11,2) DEFAULT '0.00' COMMENT '充值金额',
  `isInform` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userId`),
  KEY `userStatus` (`userStatus`,`dataFlag`),
  KEY `loginName` (`loginName`),
  KEY `userPhone` (`userPhone`),
  KEY `userEmail` (`userEmail`),
  KEY `userType` (`userType`,`dataFlag`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;


INSERT INTO `wst_users` VALUES ('1', 'wstmart', '5937', '33c67f436e38cfa964f1fde58a5213cc', '1', '0', null, null, null, '', null, '', '', '0', '0', '113.109.180.6', '2016-10-17 10:04:44', '0', '0.00', '0.00', '1', '1', '2016-10-08 10:27:28', null, '0.00', '1');