/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50718
Source Host           : localhost:3306
Source Database       : reserva

Target Server Type    : MYSQL
Target Server Version : 50718
File Encoding         : 65001

Date: 2018-04-06 11:41:35
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
  KEY `rule_name` (`rule_name`) USING BTREE,
  KEY `idx-auth_item-type` (`type`) USING BTREE,
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
  KEY `child` (`child`) USING BTREE,
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
-- Table structure for `detalle_solicitud`
-- ----------------------------
DROP TABLE IF EXISTS `detalle_solicitud`;
CREATE TABLE `detalle_solicitud` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdEquipo` int(11) DEFAULT NULL,
  `IdSolicitud` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdEquipo_DSFK` (`IdEquipo`),
  KEY `IdSolicitud_DSFK` (`IdSolicitud`),
  CONSTRAINT `IdEquipo_DSFK` FOREIGN KEY (`IdEquipo`) REFERENCES `equipo` (`Id`),
  CONSTRAINT `IdSolicitud_DSFK` FOREIGN KEY (`IdSolicitud`) REFERENCES `solicitud` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detalle_solicitud
-- ----------------------------

-- ----------------------------
-- Table structure for `equipo`
-- ----------------------------
DROP TABLE IF EXISTS `equipo`;
CREATE TABLE `equipo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdTipo` int(11) DEFAULT NULL,
  `Prestado` int(11) DEFAULT NULL,
  `Marca` varchar(255) DEFAULT NULL,
  `Modelo` varchar(255) DEFAULT NULL,
  `NoSerie` varchar(255) DEFAULT NULL,
  `CodInventario` varchar(255) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `UbicacionOrigen` int(11) DEFAULT NULL,
  `UbicacionActual` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdTipo_EFK` (`IdTipo`),
  CONSTRAINT `IdTipo_EFK` FOREIGN KEY (`IdTipo`) REFERENCES `tipo_equipo` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of equipo
-- ----------------------------
INSERT INTO `equipo` VALUES ('1', '1', null, 'EPSON', 'H553A', 'VA9K4902686', '66936', 'blanco', '1', 'Data Show # 1', '2', '2');

-- ----------------------------
-- Table structure for `mantenimiento`
-- ----------------------------
DROP TABLE IF EXISTS `mantenimiento`;
CREATE TABLE `mantenimiento` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdUbicacion` int(11) DEFAULT NULL,
  `Fecha` varchar(255) DEFAULT NULL,
  `Observacion` varchar(255) DEFAULT NULL,
  `IdAyudante` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mantenimiento
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
  KEY `parent` (`parent`) USING BTREE,
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
-- Table structure for `movimiento_mantenimiento`
-- ----------------------------
DROP TABLE IF EXISTS `movimiento_mantenimiento`;
CREATE TABLE `movimiento_mantenimiento` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdEquipo` int(11) DEFAULT NULL,
  `IdMantenimiento` int(11) DEFAULT NULL,
  `FechaRetiro` varchar(255) DEFAULT NULL,
  `RetiradoPor` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdEquipo_MFK` (`IdEquipo`),
  KEY `IdMantenimiento_MFK` (`IdMantenimiento`),
  CONSTRAINT `IdEquipo_MFK` FOREIGN KEY (`IdEquipo`) REFERENCES `equipo` (`Id`),
  CONSTRAINT `IdMantenimiento_MFK` FOREIGN KEY (`IdMantenimiento`) REFERENCES `mantenimiento` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of movimiento_mantenimiento
-- ----------------------------

-- ----------------------------
-- Table structure for `periodo`
-- ----------------------------
DROP TABLE IF EXISTS `periodo`;
CREATE TABLE `periodo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `DuracionMinutos` int(11) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `HoriaInicio` varchar(255) DEFAULT NULL,
  `HoraFin` varchar(255) DEFAULT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `IdTurno` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdTurno_PFK` (`IdTurno`),
  CONSTRAINT `IdTurno_PFK` FOREIGN KEY (`IdTurno`) REFERENCES `turno` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of periodo
-- ----------------------------

-- ----------------------------
-- Table structure for `persona`
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(255) DEFAULT NULL,
  `Apellidos` varchar(255) DEFAULT NULL,
  `Cedula` varchar(255) DEFAULT NULL,
  `Telefono` varchar(255) DEFAULT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `IdTipo` int(11) DEFAULT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `IdTipoPersona_Index` (`IdTipo`),
  UNIQUE KEY `IdUsuario_Index` (`IdUsuario`),
  CONSTRAINT `IdTipoPersona_PFK` FOREIGN KEY (`IdTipo`) REFERENCES `tipo_persona` (`Id`),
  CONSTRAINT `IdUsuario_UFK` FOREIGN KEY (`IdUsuario`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of persona
-- ----------------------------

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
  CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES ('1', 'Norman Salvador Arauz Lopez', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', null);

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
  UNIQUE KEY `account_unique` (`provider`,`client_id`) USING BTREE,
  UNIQUE KEY `account_unique_code` (`code`) USING BTREE,
  KEY `fk_user_account` (`user_id`) USING BTREE,
  CONSTRAINT `social_account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of social_account
-- ----------------------------

-- ----------------------------
-- Table structure for `solicitud`
-- ----------------------------
DROP TABLE IF EXISTS `solicitud`;
CREATE TABLE `solicitud` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdPersona` int(11) DEFAULT NULL,
  `IdUbicacion` int(11) DEFAULT NULL,
  `FechaInicio` varchar(255) DEFAULT NULL,
  `FechaFin` varchar(255) DEFAULT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `FechaSolicitud` varchar(255) DEFAULT NULL,
  `EntregadoPor` int(11) DEFAULT NULL,
  `RetiradoPor` int(11) DEFAULT NULL,
  `Observacion1` varchar(255) DEFAULT NULL,
  `Observacion2` varchar(255) DEFAULT NULL,
  `Observacion3` varchar(255) DEFAULT NULL,
  `IdPeriodo` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdUbicacion_SFK` (`IdUbicacion`),
  KEY `IdPeriodo_SFK` (`IdPeriodo`),
  KEY `IdPersona_SFK` (`IdPersona`),
  CONSTRAINT `IdPeriodo_SFK` FOREIGN KEY (`IdPeriodo`) REFERENCES `periodo` (`Id`),
  CONSTRAINT `IdPersona_SFK` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`Id`),
  CONSTRAINT `IdUbicacion_SFK` FOREIGN KEY (`IdUbicacion`) REFERENCES `ubicacion` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of solicitud
-- ----------------------------

-- ----------------------------
-- Table structure for `tipo_equipo`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_equipo`;
CREATE TABLE `tipo_equipo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) DEFAULT NULL,
  `PermitirUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_equipo
-- ----------------------------
INSERT INTO `tipo_equipo` VALUES ('1', 'DataShow', '1');

-- ----------------------------
-- Table structure for `tipo_persona`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_persona`;
CREATE TABLE `tipo_persona` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_persona
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
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`) USING BTREE,
  CONSTRAINT `token_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of token
-- ----------------------------

-- ----------------------------
-- Table structure for `turno`
-- ----------------------------
DROP TABLE IF EXISTS `turno`;
CREATE TABLE `turno` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of turno
-- ----------------------------

-- ----------------------------
-- Table structure for `ubicacion`
-- ----------------------------
DROP TABLE IF EXISTS `ubicacion`;
CREATE TABLE `ubicacion` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  `Clasificacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ubicacion
-- ----------------------------

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
  UNIQUE KEY `user_unique_username` (`username`) USING BTREE,
  UNIQUE KEY `user_unique_email` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'admin@sistema.com', '$2y$10$vy7NbA06xq2z9audQM5l6OMWgIHLXpTIH.rbBHA3pk5NnJwRU8KZu', 'yzUH8bU5cnL2B9hHHe9Xl86iZGM35YPA', '1502235895', null, null, '127.0.0.1', '1502235382', '1502235382', '0', '10', null);

-- ----------------------------
-- View structure for `lista_equipos`
-- ----------------------------
DROP VIEW IF EXISTS `lista_equipos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lista_equipos` AS select `equipo`.`Id` AS `Id`,`equipo`.`Marca` AS `Marca`,`equipo`.`Modelo` AS `Modelo`,`equipo`.`Color` AS `Color`,`equipo`.`NoSerie` AS `NoSerie`,`equipo`.`Estado` AS `Estado`,`equipo`.`Descripcion` AS `Descripcion`,`tipo_equipo`.`PermitirUsuario` AS `PermitirUsuario` from (`equipo` join `tipo_equipo`) where (`equipo`.`IdTipo` = `tipo_equipo`.`Id`) ;

-- ----------------------------
-- View structure for `lista_periodos`
-- ----------------------------
DROP VIEW IF EXISTS `lista_periodos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lista_periodos` AS select `periodo`.`Id` AS `Id`,concat(`periodo`.`HoriaInicio`,`periodo`.`HoraFin`,`periodo`.`Descripcion`,`periodo`.`IdTurno`) AS `DescripcionCompleta` from `periodo` ;

-- ----------------------------
-- View structure for `lista_personas`
-- ----------------------------
DROP VIEW IF EXISTS `lista_personas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lista_personas` AS select `persona`.`Id` AS `Id`,concat(`persona`.`Nombres`,`persona`.`Apellidos`) AS `NombreCompleto`,`tipo_persona`.`Descripcion` AS `TipoPersona`,`persona`.`Estado` AS `Estado` from (`tipo_persona` join `persona`) where (`persona`.`IdTipo` = `tipo_persona`.`Id`) ;
