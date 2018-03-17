/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50718
Source Host           : localhost:3306
Source Database       : userdemo

Target Server Type    : MYSQL
Target Server Version : 50718
File Encoding         : 65001

Date: 2017-09-07 17:54:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('administrator', '1', '1502393734');
INSERT INTO `auth_assignment` VALUES ('estudiante', '4', '1502920005');
INSERT INTO `auth_assignment` VALUES ('estudiante', '5', '1504828262');

-- ----------------------------
-- Table structure for `auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/*', '2', null, null, null, '1502241553', '1502241553');
INSERT INTO `auth_item` VALUES ('/admin/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/assignment/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/assignment/assign', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/assignment/index', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/assignment/revoke', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/assignment/view', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/default/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/default/index', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/menu/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/menu/create', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/menu/delete', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/menu/index', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/menu/update', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/menu/view', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/permission/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/permission/assign', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/permission/create', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/permission/delete', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/permission/index', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/permission/remove', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/permission/update', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/permission/view', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/role/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/role/assign', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/role/create', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/role/delete', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/role/index', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/role/remove', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/role/update', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/role/view', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/route/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/route/assign', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/route/create', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/route/index', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/route/refresh', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/route/remove', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/rule/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/rule/create', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/rule/delete', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/rule/index', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/rule/update', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/rule/view', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/activate', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/change-password', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/delete', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/index', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/login', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/logout', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/request-password-reset', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/reset-password', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/signup', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/view', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/debug/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/debug/default/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/debug/default/db-explain', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/debug/default/download-mail', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/debug/default/index', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/debug/default/toolbar', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/debug/default/view', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/gii/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/gii/default/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/gii/default/action', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/gii/default/diff', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/gii/default/index', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/gii/default/preview', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/gii/default/view', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/site/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/site/about', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/site/captcha', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/site/contact', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/site/error', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/site/index', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/site/login', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/site/logout', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/user/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/assignments', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/block', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/confirm', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/create', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/delete', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/index', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/info', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/switch', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/update', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/update-profile', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/profile/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/profile/index', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/profile/show', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/recovery/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/recovery/request', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/recovery/reset', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/registration/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/registration/confirm', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/registration/connect', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/registration/register', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/registration/resend', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/security/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/security/auth', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/security/login', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/security/logout', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/settings/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/settings/account', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/settings/confirm', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/settings/delete', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/settings/disconnect', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/settings/networks', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/settings/profile', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('administrator', '1', null, null, null, '1502241539', '1502241689');
INSERT INTO `auth_item` VALUES ('estudiante', '1', null, null, null, '1502914131', '1502914131');

-- ----------------------------
-- Table structure for `auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('administrator', '/*');

-- ----------------------------
-- Table structure for `auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------

-- ----------------------------
-- Table structure for `migration`
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1502214347');
INSERT INTO `migration` VALUES ('m140209_132017_init', '1502214354');
INSERT INTO `migration` VALUES ('m140403_174025_create_account_table', '1502214354');
INSERT INTO `migration` VALUES ('m140504_113157_update_tables', '1502214356');
INSERT INTO `migration` VALUES ('m140504_130429_create_token_table', '1502214357');
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', '1502241345');
INSERT INTO `migration` VALUES ('m140602_111327_create_menu_table', '1502240994');
INSERT INTO `migration` VALUES ('m140830_171933_fix_ip_field', '1502214357');
INSERT INTO `migration` VALUES ('m140830_172703_change_account_table_name', '1502214357');
INSERT INTO `migration` VALUES ('m141222_110026_update_ip_field', '1502214358');
INSERT INTO `migration` VALUES ('m141222_135246_alter_username_length', '1502214358');
INSERT INTO `migration` VALUES ('m150614_103145_update_social_account_table', '1502214359');
INSERT INTO `migration` VALUES ('m150623_212711_fix_username_notnull', '1502214359');
INSERT INTO `migration` VALUES ('m151218_234654_add_timezone_to_profile', '1502214359');
INSERT INTO `migration` VALUES ('m160312_050000_create_user', '1502240994');

-- ----------------------------
-- Table structure for `profile`
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES ('1', 'Norman Salvador Arauz Lopez', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', null);
INSERT INTO `profile` VALUES ('2', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('3', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('4', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('5', null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `social_account`
-- ----------------------------
DROP TABLE IF EXISTS `social_account`;
CREATE TABLE `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  UNIQUE KEY `account_unique_code` (`code`),
  KEY `fk_user_account` (`user_id`),
  CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of social_account
-- ----------------------------

-- ----------------------------
-- Table structure for `token`
-- ----------------------------
DROP TABLE IF EXISTS `token`;
CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`),
  CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of token
-- ----------------------------
INSERT INTO `token` VALUES ('3', 'bPuQ6P-GSVMDpjeDTOHntmOhAJO9xl9x', '1502237131', '0');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '10',
  `password_reset_token` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'netman.arauz@gmail.com', '$2y$10$PZzwZyMj8vRTKzmg02FEA.sZZaPWXrgvOV9EtiBMVI0V5wx.WCOx2', 'yzUH8bU5cnL2B9hHHe9Xl86iZGM35YPA', '1502235895', null, null, '127.0.0.1', '1502235382', '1502235382', '0', '10', null);
INSERT INTO `user` VALUES ('2', 'misha', 'misha@domain.com', '$2y$10$vUVk08QgR3T3hA7t/dFdreLi2OA1l.QgNfAGYwlHlX9cxFJc.rpFe', '-s7KDAvPViWtXHNrIO-F3U-wZnu3dBkL', '1502236885', null, null, '127.0.0.1', '1502236885', '1502241781', '0', '10', null);
INSERT INTO `user` VALUES ('3', 'netman', 'netman@domain.com', '$2y$10$KMSzYXD86XgluL.5B0J55uP4BON2ipYJPeAZ6F7VwJmpjUFW1pxAS', 'CwJIYwwHTjpUDcETe0NKvWiDEHl0EJDz', '1502237210', null, null, '127.0.0.1', '1502237131', '1502241790', '0', '10', null);
INSERT INTO `user` VALUES ('4', 'mishas', 'mishas@domain.com', '$2y$10$8tJEUCOhMaD4DOt/IxqK5OlkSS4TYUy9edL2I8JJQLYBjMdDl4uhq', 'ky6t7ouboJpBy-6i2Omd_1eei8dOzBLj', '1502913097', null, null, '127.0.0.1', '1502913097', '1502913107', '0', '10', null);
INSERT INTO `user` VALUES ('5', 'delagneu', 'delagneu@domain.com', '$2y$10$mKWZVcODQFdi8P158dIR9.KflOW1MO9MInjaM2BujnJs..rsFrnBC', 'ANHfnKO2sxTt3ieBpFj0AWxY75OVn1Gu', '1504828114', null, null, '127.0.0.1', '1504828114', '1504828114', '0', '10', null);
