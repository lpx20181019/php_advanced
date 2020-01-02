/*
Navicat MySQL Data Transfer

Source Server         : mysql8.0
Source Server Version : 80012
Source Host           : localhost:3306
Source Database       : tp50

Target Server Type    : MYSQL
Target Server Version : 80012
File Encoding         : 65001

Date: 2020-01-02 17:18:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yunzhi_teacher
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_teacher`;
CREATE TABLE `yunzhi_teacher` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT '' COMMENT '姓名',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0男，1女',
  `username` varchar(16) NOT NULL COMMENT '用户名',
  `password` varchar(11) NOT NULL,
  `email` varchar(30) DEFAULT '' COMMENT '邮箱',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_teacher
-- ----------------------------
INSERT INTO `yunzhi_teacher` VALUES ('18', '张包', '1', 'zhangbao', '', '119@qq.com', '0', '1577946987');
INSERT INTO `yunzhi_teacher` VALUES ('19', '刘备', '0', 'liu', '', '120@qq.com', '0', '0');
INSERT INTO `yunzhi_teacher` VALUES ('25', '毛泽东', '0', 'root', 'root', '120@qq.com', '1577941350', '1577941350');
