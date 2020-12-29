/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : demo1

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-12-29 14:59:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_message
-- ----------------------------
DROP TABLE IF EXISTS `tp_message`;
CREATE TABLE `tp_message` (
  `tid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `nickname` varchar(255) DEFAULT NULL COMMENT '昵称',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `content` varchar(255) NOT NULL COMMENT '留言',
  `create_time` datetime NOT NULL COMMENT '留言发布时间',
  `update_time` datetime DEFAULT NULL COMMENT '留言修改时间',
  `is_delete` varchar(255) NOT NULL DEFAULT '0' COMMENT '逻辑删除 0为存在 1为不存在',
  `user_id` int(11) unsigned DEFAULT NULL COMMENT '用户id',
  PRIMARY KEY (`tid`),
  KEY `uid` (`user_id`),
  KEY `nickname` (`nickname`)
) ENGINE=MyISAM AUTO_INCREMENT=238 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_message
-- ----------------------------
INSERT INTO `tp_message` VALUES ('1', 'hasakil', '771407573@qq.com', '人在塔在', '2020-11-04 15:18:49', '2020-11-11 09:52:08', '0', '1');
INSERT INTO `tp_message` VALUES ('2', 'hasakil', '771407573@qq.com', '555', '2020-11-04 15:19:10', '2020-11-16 17:41:30', '0', '1');
INSERT INTO `tp_message` VALUES ('3', 'Lukina', '771407573@qq.com', '黑玫瑰终将再次绽放', '2020-11-04 15:24:43', '2020-11-10 14:07:03', '1', '2');
INSERT INTO `tp_message` VALUES ('4', 'Lukina', '771407573@qq.com', '清风', '2020-11-04 15:24:53', '2020-11-17 09:47:46', '1', '2');
INSERT INTO `tp_message` VALUES ('5', '清风', '771407573@qq.com', '上王者了吗', '2020-11-04 15:25:06', null, '0', '3');
INSERT INTO `tp_message` VALUES ('6', '清风', '771407573@qq.com', '今天天气不错', '2020-11-04 15:25:24', null, '0', '3');
INSERT INTO `tp_message` VALUES ('7', '清风', '771407573@qq.com', '我要玩亚索', '2020-11-04 15:25:38', null, '0', '3');
INSERT INTO `tp_message` VALUES ('8', '疾风剑豪', '771407573@qq.com', '狂风绝息斩', '2020-11-04 15:25:53', '2020-11-12 11:52:37', '0', '4');
INSERT INTO `tp_message` VALUES ('9', 'Lukina', '771407573@qq.com', '333', '2020-11-10 11:40:58', '2020-11-16 10:36:15', '1', '2');
INSERT INTO `tp_message` VALUES ('10', 'Lukina', '771407573@qq.com', 'to:伊泽瑞尔  像我这么帅的，一般都是主角哦', '2020-11-10 13:45:04', null, '0', '2');
INSERT INTO `tp_message` VALUES ('11', 'Lukina', '771407573@qq.com', '你好吗', '2020-11-10 11:50:58', '2020-11-10 13:56:39', '1', '2');
INSERT INTO `tp_message` VALUES ('12', 'Lukina', '771407573@qq.com', '哈哈哈', '2020-11-10 13:47:06', null, '0', '2');
INSERT INTO `tp_message` VALUES ('203', 'Lukina', '771407573@qq.com', '卧底', '2020-11-10 13:49:54', null, '0', '2');
INSERT INTO `tp_message` VALUES ('204', 'Lukina', '771407573@qq.com', '无可匹敌的力量', '2020-11-10 14:11:52', null, '0', '2');
INSERT INTO `tp_message` VALUES ('205', 'Lukina', '771407573@qq.com', '你好，旧时光', '2020-11-10 14:12:06', null, '0', '2');
INSERT INTO `tp_message` VALUES ('206', 'Lukina', '771407573@qq.com', '方寸之间 ，欢乐一片', '2020-11-10 14:12:33', null, '0', '2');
INSERT INTO `tp_message` VALUES ('207', 'Lukina', '771407573@qq.com', '我风墙呢', '2020-11-10 14:14:28', null, '0', '2');
INSERT INTO `tp_message` VALUES ('210', 'Lukina', '771407573@qq.com', '测试', '2020-11-16 19:12:57', null, '0', '2');
INSERT INTO `tp_message` VALUES ('208', 'Lukina', '771407573@qq.com', '撒拉嘿呦', '2020-11-13 14:25:23', null, '0', '2');
INSERT INTO `tp_message` VALUES ('209', 'Lukina', '771407573@qq.com', '这是一个测试留言', '2020-11-16 10:37:07', null, '1', '2');
INSERT INTO `tp_message` VALUES ('211', 'hasakil', '771407573@qq.com', '新的生活', '2020-11-16 19:19:54', null, '0', '1');
INSERT INTO `tp_message` VALUES ('212', 'Lukina', '771407573@qq.com', '；方片', '2020-11-17 09:36:01', null, '0', '2');
INSERT INTO `tp_message` VALUES ('230', 'Lukina', '771407573@qq.com', '', '2020-11-17 15:09:07', null, '1', '2');
INSERT INTO `tp_message` VALUES ('231', 'Lukina', '771407573@qq.com', '    ', '2020-11-17 15:11:20', null, '1', '2');
INSERT INTO `tp_message` VALUES ('232', 'wayn', '1669738430@qq.com', 'test', '2020-11-17 15:29:47', null, '0', '8');
INSERT INTO `tp_message` VALUES ('233', 'Lukina', '771407573@qq.com', '测试留言', '2020-11-19 14:29:47', null, '0', '2');
INSERT INTO `tp_message` VALUES ('234', 'Lukina', '771407573@qq.com', '测试留言2', '2020-11-19 14:40:23', null, '0', '2');
INSERT INTO `tp_message` VALUES ('235', 'Lukina', '771407573@qq.com', '测试留言3', '2020-11-19 14:41:27', null, '0', '2');
INSERT INTO `tp_message` VALUES ('236', 'Lukina', '771407573@qq.com', '33333', '2020-11-19 14:42:03', null, '0', '2');
INSERT INTO `tp_message` VALUES ('237', 'hasakil', '771407573@qq.com', '2020年12月10日', '2020-12-10 13:44:34', null, '0', '1');

-- ----------------------------
-- Table structure for tp_user
-- ----------------------------
DROP TABLE IF EXISTS `tp_user`;
CREATE TABLE `tp_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `nickname` varchar(255) DEFAULT NULL COMMENT '昵称',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `tel` varchar(14) NOT NULL COMMENT '联系电话',
  `id_delete` int(11) NOT NULL DEFAULT '0' COMMENT '逻辑删除0 存在 1不存在',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_user
-- ----------------------------
INSERT INTO `tp_user` VALUES ('1', 'hasakil', 'xiayu', 'e10adc3949ba59abbe56e057f20f883e', '771407573@qq.com', '1739823229', '0');
INSERT INTO `tp_user` VALUES ('2', 'Lukina', 'xulu', 'b6ffd72032f8c85e70fce6c2833f93d0', '771407573@qq.com', '17398222', '0');
INSERT INTO `tp_user` VALUES ('3', '清风', 'qingfeng', 'e10adc3949ba59abbe56e057f20f883e', '7714000@qq.com', '456613132', '0');
INSERT INTO `tp_user` VALUES ('4', '疾风剑豪', 'yasuo', '962012d09b8170d912f0669f6d7d9d07', '4545123@qq.com', '781313132', '0');
INSERT INTO `tp_user` VALUES ('7', 'dongian', 'hhhh', '15de21c670ae7c3f6f3f1f37029303c9', '5446@qq.com', '95656', '0');
INSERT INTO `tp_user` VALUES ('6', '冬天', 'hhh', 'e10adc3949ba59abbe56e057f20f883e', '771407573@qq.com', '7134513', '0');
INSERT INTO `tp_user` VALUES ('8', 'wayn', 'wayn', 'e10adc3949ba59abbe56e057f20f883e', '1669738430@qq.com', '1361759841', '0');
INSERT INTO `tp_user` VALUES ('14', 'gg', 'gg', '1f6419b1cbe79c71410cb320fc094775', '', '132132', '0');
INSERT INTO `tp_user` VALUES ('15', '我的发', 'hhh', '202cb962ac59075b964b07152d234b70', '771407573@qq.com', '111', '0');
INSERT INTO `tp_user` VALUES ('16', '把把守高地', 'yingliu', 'fae0b27c451c728867a567e8c1bb4e53', '1840674889@qq.com', '17398232290', '0');
