/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50718
Source Host           : localhost:3306
Source Database       : reserva

Target Server Type    : MYSQL
Target Server Version : 50718
File Encoding         : 65001

Date: 2018-05-09 14:56:01
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
INSERT INTO `auth_assignment` VALUES ('profesor', '26', '1523379586');

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
INSERT INTO `auth_item` VALUES ('/solicitud/*', '2', null, null, null, '1523378361', '1523378361');
INSERT INTO `auth_item` VALUES ('/solicitud/create', '2', null, null, null, '1523378361', '1523378361');
INSERT INTO `auth_item` VALUES ('/solicitud/datos-equipo', '2', null, null, null, '1523378361', '1523378361');
INSERT INTO `auth_item` VALUES ('/solicitud/delete', '2', null, null, null, '1523378361', '1523378361');
INSERT INTO `auth_item` VALUES ('/solicitud/index', '2', null, null, null, '1523378361', '1523378361');
INSERT INTO `auth_item` VALUES ('/solicitud/periodos', '2', null, null, null, '1524504211', '1524504211');
INSERT INTO `auth_item` VALUES ('/solicitud/update', '2', null, null, null, '1523378361', '1523378361');
INSERT INTO `auth_item` VALUES ('/solicitud/view', '2', null, null, null, '1523378361', '1523378361');
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
INSERT INTO `auth_item` VALUES ('profesor', '1', null, null, null, '1523378331', '1523378331');

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
INSERT INTO `auth_item_child` VALUES ('profesor', '/debug/default/*');
INSERT INTO `auth_item_child` VALUES ('profesor', '/solicitud/create');
INSERT INTO `auth_item_child` VALUES ('profesor', '/solicitud/datos-equipo');
INSERT INTO `auth_item_child` VALUES ('profesor', '/solicitud/periodos');
INSERT INTO `auth_item_child` VALUES ('profesor', '/solicitud/update');
INSERT INTO `auth_item_child` VALUES ('profesor', '/solicitud/view');

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
-- Table structure for `clasificacion_ubicacion`
-- ----------------------------
DROP TABLE IF EXISTS `clasificacion_ubicacion`;
CREATE TABLE `clasificacion_ubicacion` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) DEFAULT NULL,
  `PermitirUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clasificacion_ubicacion
-- ----------------------------
INSERT INTO `clasificacion_ubicacion` VALUES ('1', 'Oficina', '2');
INSERT INTO `clasificacion_ubicacion` VALUES ('2', 'Mantenimiento', '2');
INSERT INTO `clasificacion_ubicacion` VALUES ('3', 'Aulas', '1');
INSERT INTO `clasificacion_ubicacion` VALUES ('4', 'Salas/Posgrado', '2');
INSERT INTO `clasificacion_ubicacion` VALUES ('5', 'Auditorio', '2');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detalle_solicitud
-- ----------------------------
INSERT INTO `detalle_solicitud` VALUES ('19', '1', '4');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of equipo
-- ----------------------------
INSERT INTO `equipo` VALUES ('1', '1', '0', 'EPSON', 'H553A', 'VA9K4902686', '66936', 'blanco', '1', 'Data Show # 1', '2', '2');
INSERT INTO `equipo` VALUES ('2', '1', '1', 'EPSON', 'H553A', 'TUWK3Z00737', '0', 'blanco', '1', 'Data Show # 2', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of periodo
-- ----------------------------
INSERT INTO `periodo` VALUES ('1', '90', 'Primer bloque', '8:00', '9:20', '1', '1');
INSERT INTO `periodo` VALUES ('2', '90', 'Segundo bloque', '9:30', '10:50', '1', '1');
INSERT INTO `periodo` VALUES ('3', '90', 'Tercer bloque', '11:00', '12:20', '1', '1');
INSERT INTO `periodo` VALUES ('4', '90', 'Primer bloque', '1:00', '2:20', '1', '2');
INSERT INTO `periodo` VALUES ('5', '90', 'Segundo bloque', '2:30', '3:50', '1', '2');
INSERT INTO `periodo` VALUES ('6', '90', 'Tercer bloque', '4:00', '5:20', '1', '2');
INSERT INTO `periodo` VALUES ('7', '90', 'Primer bloque', '6:00', '7:20', '1', '3');
INSERT INTO `periodo` VALUES ('8', '90', 'Segundo bloque', '7:30', '8:50', '1', '3');
INSERT INTO `periodo` VALUES ('9', '90', 'Tercer bloque', '9:00', '10:20', '1', '3');

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
  UNIQUE KEY `IdUsuario_Index` (`IdUsuario`),
  KEY `IdTipoPersona_Index` (`IdTipo`) USING BTREE,
  CONSTRAINT `IdTipoPersona_PFK` FOREIGN KEY (`IdTipo`) REFERENCES `tipo_persona` (`Id`),
  CONSTRAINT `IdUsuario_UFK` FOREIGN KEY (`IdUsuario`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of persona
-- ----------------------------
INSERT INTO `persona` VALUES ('1', 'Norman', 'Arauz', '441-191288-0005R', '57108367', '1', '1', '2');
INSERT INTO `persona` VALUES ('2', 'Marianela', 'Ortuño', '441-787878-005A', '44578996', null, '1', '3');
INSERT INTO `persona` VALUES ('3', 'Ramiro', 'Contreras', '441-787878-0059', '564478', null, '1', '4');
INSERT INTO `persona` VALUES ('4', 'Ricardo', 'Ramirez', '441-787878-0025E', '12332546', null, '1', '6');
INSERT INTO `persona` VALUES ('7', 'test', 'test', 'test', 't', null, '1', '9');
INSERT INTO `persona` VALUES ('8', 'Rogoberto', 'Mendoza', '441-0000-0003R', '121212', null, '1', '10');
INSERT INTO `persona` VALUES ('9', 'Sofia', 'Maria', '441-000000-0005R', '121212', null, '1', '11');
INSERT INTO `persona` VALUES ('10', 'Estela', 'Juarez', '000000000', '000000000', null, '1', '13');
INSERT INTO `persona` VALUES ('11', 'asdf', 'asdf', 'asdf', 'asdf', null, '1', '19');
INSERT INTO `persona` VALUES ('12', 'Marco', 'Antonio', '441-000000-000A', '2772-1234', null, '1', '20');
INSERT INTO `persona` VALUES ('13', 'Francisco', 'Meza', '001-000000-0005R', '000000', null, '1', '22');
INSERT INTO `persona` VALUES ('14', 'Octavio', 'Picado', '000000', '000000', null, '1', '23');
INSERT INTO `persona` VALUES ('15', 'Wilmer', 'Palacio', '001-000000-0005R', '00000000', null, '2', '25');
INSERT INTO `persona` VALUES ('16', 'Norman', 'Arauz', '441-191288-0005R', '2772-6666', null, '1', '26');
INSERT INTO `persona` VALUES ('17', 'Erick', 'Lanzas', '001-000000-0005R', '2772-6666', null, '1', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES ('1', 'Norman Salvador Arauz Lopez', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', null);
INSERT INTO `profile` VALUES ('2', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('3', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('4', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('5', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('6', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('9', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('10', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('11', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('12', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('13', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('19', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('20', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('22', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('23', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('24', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('25', null, null, null, null, null, null, null, null);
INSERT INTO `profile` VALUES ('26', null, null, null, null, null, null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of solicitud
-- ----------------------------
INSERT INTO `solicitud` VALUES ('1', '17', '1', '2018-04-04', '2018-04-03', 'Prestado', null, null, null, 'test', null, null, '1');
INSERT INTO `solicitud` VALUES ('2', '17', '1', '2018-05-09', '2018-05-16', 'Prestado', null, null, null, 'test', null, null, '1');
INSERT INTO `solicitud` VALUES ('3', '17', '1', '2018-05-09', '2018-05-09', 'Prestado', null, null, null, 'test', null, null, '1');
INSERT INTO `solicitud` VALUES ('4', '17', '1', '2018-05-09', '2018-05-09', 'Prestado', null, null, null, 'test', null, null, '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_persona
-- ----------------------------
INSERT INTO `tipo_persona` VALUES ('1', 'Docente');
INSERT INTO `tipo_persona` VALUES ('2', 'Ayudante');
INSERT INTO `tipo_persona` VALUES ('3', 'Administrativo');

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
INSERT INTO `token` VALUES ('5', 'O00_XczyWPpWM-ss97THw1wpd7Xvcr3m', '1523140613', '0');

-- ----------------------------
-- Table structure for `turno`
-- ----------------------------
DROP TABLE IF EXISTS `turno`;
CREATE TABLE `turno` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of turno
-- ----------------------------
INSERT INTO `turno` VALUES ('1', 'Matutino', '1');
INSERT INTO `turno` VALUES ('2', 'Vespertino', '1');
INSERT INTO `turno` VALUES ('3', 'Nocturno', '1');

-- ----------------------------
-- Table structure for `ubicacion`
-- ----------------------------
DROP TABLE IF EXISTS `ubicacion`;
CREATE TABLE `ubicacion` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  `IdClasificacionUbicacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdClasificacion_EFK` (`IdClasificacionUbicacion`) USING BTREE,
  CONSTRAINT `ubicacion_ibfk_1` FOREIGN KEY (`IdClasificacionUbicacion`) REFERENCES `clasificacion_ubicacion` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ubicacion
-- ----------------------------
INSERT INTO `ubicacion` VALUES ('1', 'Aula A4', '1', '3');

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'admin@sistema.com', '$2y$10$vy7NbA06xq2z9audQM5l6OMWgIHLXpTIH.rbBHA3pk5NnJwRU8KZu', 'yzUH8bU5cnL2B9hHHe9Xl86iZGM35YPA', '1502235895', null, null, '127.0.0.1', '1502235382', '1502235382', '0', '10', null);
INSERT INTO `user` VALUES ('2', 'netman', 'netman.arauz@gmail.com', '$2y$10$6y6X/hOWzm5LhSIdRVwAme9n8OjvPl0Ru6lTqCo9.hMwIz614vOxm', '6BvV6YbvO3aP1Y4Gwd2-nlqOnYn7UY0Y', '1523080800', null, '1523137134', '127.0.0.1', '1523131674', '1523131674', '0', '10', null);
INSERT INTO `user` VALUES ('3', 'marianelas', 'marianelas@gmail.com', '$2y$10$5BBEKoDdxoZTTxTbtpxoi.4a9zM4PowZIzjorePo3TXemvvFv38qK', 'xuz4ps1Fi77mGS_dxkleqOAewaF82YDf', '1523080800', null, null, '127.0.0.1', '1523137168', '1523373094', '0', '10', null);
INSERT INTO `user` VALUES ('4', 'ramiro', 'ramiro@yahoo.es', '$2y$10$PUqe2GNHr9NErb5lLAZxNeHrSORkU3TxH7hpluuFHTuiT3Am1Wd36', 'zFJ_WoNhPxNh_mLDluioqxij3t_unkuX', '1523080800', null, null, '127.0.0.1', '1523138707', '1523138707', '0', '10', null);
INSERT INTO `user` VALUES ('5', 'vaneza', 'vaneza@yahoo.es', '$2y$10$7Im8F0cwphxhXKgesRwLMOm0ODp2RpoCuK2ps2G6sJakAyUVyhrVe', 'S0SyTURopE5cWHUHmocB4PgH_PiFEhun', '1523080800', null, null, '127.0.0.1', '1523140613', '1523140613', '0', '10', null);
INSERT INTO `user` VALUES ('6', 'ricardo12', 'ricardoa@gmail.com', '$2y$10$LA3f1xGoTnrEk5GC.rYO8eWFa03cRUadwSq/TVFu3vLqH1uKUaxaC', 'KJqAqkm6I9h9MpTR6q9V1BXQyShpyvXk', '1523080800', null, null, '127.0.0.1', '1523143437', '1523143437', '0', '10', null);
INSERT INTO `user` VALUES ('9', 'test', 'test@gmail.com', '$2y$10$gJMiqDXJjjFfyDu//t3dZu3wv7iYsdiC8Wx4V4Hxn5LBHEAP4d1sC', '5mXNtlQoic8vT9uh_9LWMjF8WWjTniiX', '1523080800', null, null, '127.0.0.1', '1523154386', '1523154386', '0', '10', null);
INSERT INTO `user` VALUES ('10', 'rigo', 'rigoberto@gmail.com', '$2y$10$BTH9qyyb1.9z0bL7azdCSum4yiko8Vq/NYNUrIcfeut3Ouo8JaeIW', 'gg91zzFVi1HFicHqqoMyFfcHhzgTUwW5', '1523080800', null, null, '127.0.0.1', '1523216925', '1523216925', '0', '10', null);
INSERT INTO `user` VALUES ('11', 'sofi', 'sofi@gmail.com', '$2y$10$0xkhbPYwt6wluwrBPxcKKOHkfoI3OXlaghU9sbx/4sGNJRiggCwgm', 'SkLWdheL8CRpwL3YcOmEsfJGcC5XAsmq', '1523167200', null, null, '127.0.0.1', '1523217526', '1523217814', '0', '10', null);
INSERT INTO `user` VALUES ('12', 'kzuniga', 'kassandrazuniga16@gmail.com', '$2y$10$cjjCp2q1ov.cANn81w90auVuBrzsbC4gp4ABktgvyxgAVHAHZOFGe', 'HYQZBeQ75TRZynYynCRSyBLcETSb-BaM', '1523218158', null, null, '127.0.0.1', '1523218158', '1523218158', '0', '10', null);
INSERT INTO `user` VALUES ('13', 'estela', 'estela@gmail.com', '$2y$10$IZiPPsD4IHnCTPwaqs7y/eE9C1Ec1caDrj2m3gFYvkIzc1ww9wEvm', 'vPyy8VvuGpWeFgAp-NY-X2o5P-DgMiEr', null, null, null, '127.0.0.1', '1523218763', '1523218840', '0', '10', null);
INSERT INTO `user` VALUES ('19', 'test2', 'test2@gmail.com', '$2y$10$VgnSyMHfR9TSLIWuqWFmwevM5I12/QIGNl20SFa3H0vk3ft8fb1/6', '8717JcFymnVvjHGvkzL9fNeLKGNNczNA', '1523224127', null, null, '127.0.0.1', '1523224127', '1523224127', '0', '10', null);
INSERT INTO `user` VALUES ('20', 'marco', 'marco@gmail.com', '$2y$10$xNzoSVuYXYDumSdX2.S42u7h0LDF6/gCPjcc84IaYBeXw3sFSF2W6', 'rD2gp9QVVgXEwOaio-byM64a4FjvSG9l', '1523224350', null, null, '127.0.0.1', '1523224350', '1523224350', '0', '10', null);
INSERT INTO `user` VALUES ('22', 'rene', 'rene@gmail.com', '$2y$10$ffMSg3ultRn0rwx9YeOViuRoFctaMAuvv2KXTDCevm8S3GkkuBAOq', 'd_1VS5uxr4TN9YPhEBLi3BmrJUDtdO59', '1523371612', null, null, '127.0.0.1', '1523371612', '1523371612', '0', '10', null);
INSERT INTO `user` VALUES ('23', 'octavio', 'octavio@gmail.com', '$2y$10$eC9rE59FZRZIJY7lt4/24en1j9wkgzXCkSHp6HQ9h/KKGAfe1A/7K', 'v2p0LWyW9L2HMSKr7n1b5ulRidxi9wZj', '1523371689', null, null, '127.0.0.1', '1523371689', '1523371689', '0', '10', null);
INSERT INTO `user` VALUES ('24', 'chomas', 'chomas@gmail.com', '$2y$10$lzr4zNsKHz4BNG4R1u6wAuX6hJw1TQTQnOf/V1SL.XlG.weKRwB7y', 'W9w8RgmitxX8S5cxY1oaqQywNT26sg9C', '1523371867', null, null, '127.0.0.1', '1523371867', '1523371867', '0', '10', null);
INSERT INTO `user` VALUES ('25', 'wilmer', 'wilmer@gmail.com', '$2y$10$7GEMJrNV1iw57kxBZxz40OIrNQhu3S/rszC/nUVszDI/mbJxNNvBW', 'DOdJK3EJBlxdFOh5gHSjF3KSKEfgxc7O', '1523372487', null, null, '127.0.0.1', '1523372487', '1523372487', '0', '10', null);
INSERT INTO `user` VALUES ('26', 'norman', 'norman@gmail.com', '$2y$10$epDxvrlUwLA/U2XRj32FN.Fz0KSHQbhNUWMcAE8os82zbiORzYd9S', 'LyrQJunjuOq8z_aWjm1g88Ux8J9ACDJc', '1523378276', null, null, '127.0.0.1', '1523378276', '1524499125', '0', '10', null);

-- ----------------------------
-- View structure for `lista_equipos`
-- ----------------------------
DROP VIEW IF EXISTS `lista_equipos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lista_equipos` AS select `equipo`.`Id` AS `Id`,`equipo`.`Marca` AS `Marca`,`equipo`.`Modelo` AS `Modelo`,`equipo`.`Color` AS `Color`,`equipo`.`NoSerie` AS `NoSerie`,`equipo`.`Estado` AS `Estado`,`equipo`.`Descripcion` AS `Descripcion`,`tipo_equipo`.`PermitirUsuario` AS `PermitirUsuario`,`equipo`.`Prestado` AS `Prestado` from (`equipo` join `tipo_equipo`) where (`equipo`.`IdTipo` = `tipo_equipo`.`Id`) ;

-- ----------------------------
-- View structure for `lista_periodos`
-- ----------------------------
DROP VIEW IF EXISTS `lista_periodos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lista_periodos` AS select `periodo`.`Id` AS `Id`,concat(`periodo`.`Descripcion`,' - ',`periodo`.`HoriaInicio`,' - ',`periodo`.`HoraFin`) AS `DescripcionCompleta`,`periodo`.`IdTurno` AS `IdTurno` from `periodo` ;

-- ----------------------------
-- View structure for `personas`
-- ----------------------------
DROP VIEW IF EXISTS `personas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `personas` AS select `persona`.`Id` AS `Id`,concat(`persona`.`Nombres`,`persona`.`Apellidos`) AS `NombreCompleto`,`tipo_persona`.`Descripcion` AS `TipoPersona`,`persona`.`Estado` AS `Estado` from (`tipo_persona` join `persona`) where (`persona`.`IdTipo` = `tipo_persona`.`Id`) ;
