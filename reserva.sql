/*
Navicat MySQL Data Transfer

Source Server         : ConexionMySQL
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : reserva

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-04-11 13:36:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
`item_name`  varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`user_id`  varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`created_at`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`item_name`, `user_id`),
FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
BEGIN;
INSERT INTO `auth_assignment` VALUES ('administrator', '1', '1502393734'), ('estudiante', '4', '1502920005'), ('estudiante', '5', '1504828262'), ('profesor', '26', '1523379586'), ('profesor', '27', '1523461683');
COMMIT;

-- ----------------------------
-- Table structure for `auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
`name`  varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`type`  smallint(6) NOT NULL ,
`description`  text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ,
`rule_name`  varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`data`  blob NULL ,
`created_at`  int(11) NULL DEFAULT NULL ,
`updated_at`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`name`),
FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE,
INDEX `rule_name` (`rule_name`) USING BTREE ,
INDEX `idx-auth_item-type` (`type`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
BEGIN;
INSERT INTO `auth_item` VALUES ('/*', '2', null, null, null, '1502241553', '1502241553'), ('/admin/*', '2', null, null, null, '1502241594', '1502241594'), ('/admin/assignment/*', '2', null, null, null, '1502241593', '1502241593'), ('/admin/assignment/assign', '2', null, null, null, '1502241593', '1502241593'), ('/admin/assignment/index', '2', null, null, null, '1502241593', '1502241593'), ('/admin/assignment/revoke', '2', null, null, null, '1502241593', '1502241593'), ('/admin/assignment/view', '2', null, null, null, '1502241593', '1502241593'), ('/admin/default/*', '2', null, null, null, '1502241593', '1502241593'), ('/admin/default/index', '2', null, null, null, '1502241593', '1502241593'), ('/admin/menu/*', '2', null, null, null, '1502241593', '1502241593'), ('/admin/menu/create', '2', null, null, null, '1502241593', '1502241593'), ('/admin/menu/delete', '2', null, null, null, '1502241593', '1502241593'), ('/admin/menu/index', '2', null, null, null, '1502241593', '1502241593'), ('/admin/menu/update', '2', null, null, null, '1502241593', '1502241593'), ('/admin/menu/view', '2', null, null, null, '1502241593', '1502241593'), ('/admin/permission/*', '2', null, null, null, '1502241593', '1502241593'), ('/admin/permission/assign', '2', null, null, null, '1502241593', '1502241593'), ('/admin/permission/create', '2', null, null, null, '1502241593', '1502241593'), ('/admin/permission/delete', '2', null, null, null, '1502241593', '1502241593'), ('/admin/permission/index', '2', null, null, null, '1502241593', '1502241593'), ('/admin/permission/remove', '2', null, null, null, '1502241593', '1502241593'), ('/admin/permission/update', '2', null, null, null, '1502241593', '1502241593'), ('/admin/permission/view', '2', null, null, null, '1502241593', '1502241593'), ('/admin/role/*', '2', null, null, null, '1502241594', '1502241594'), ('/admin/role/assign', '2', null, null, null, '1502241593', '1502241593'), ('/admin/role/create', '2', null, null, null, '1502241593', '1502241593'), ('/admin/role/delete', '2', null, null, null, '1502241593', '1502241593'), ('/admin/role/index', '2', null, null, null, '1502241593', '1502241593'), ('/admin/role/remove', '2', null, null, null, '1502241594', '1502241594'), ('/admin/role/update', '2', null, null, null, '1502241593', '1502241593'), ('/admin/role/view', '2', null, null, null, '1502241593', '1502241593'), ('/admin/route/*', '2', null, null, null, '1502241594', '1502241594'), ('/admin/route/assign', '2', null, null, null, '1502241594', '1502241594'), ('/admin/route/create', '2', null, null, null, '1502241594', '1502241594'), ('/admin/route/index', '2', null, null, null, '1502241594', '1502241594'), ('/admin/route/refresh', '2', null, null, null, '1502241594', '1502241594'), ('/admin/route/remove', '2', null, null, null, '1502241594', '1502241594'), ('/admin/rule/*', '2', null, null, null, '1502241594', '1502241594'), ('/admin/rule/create', '2', null, null, null, '1502241594', '1502241594'), ('/admin/rule/delete', '2', null, null, null, '1502241594', '1502241594'), ('/admin/rule/index', '2', null, null, null, '1502241594', '1502241594'), ('/admin/rule/update', '2', null, null, null, '1502241594', '1502241594'), ('/admin/rule/view', '2', null, null, null, '1502241594', '1502241594'), ('/admin/user/*', '2', null, null, null, '1502241594', '1502241594'), ('/admin/user/activate', '2', null, null, null, '1502241594', '1502241594'), ('/admin/user/change-password', '2', null, null, null, '1502241594', '1502241594'), ('/admin/user/delete', '2', null, null, null, '1502241594', '1502241594'), ('/admin/user/index', '2', null, null, null, '1502241594', '1502241594'), ('/admin/user/login', '2', null, null, null, '1502241594', '1502241594'), ('/admin/user/logout', '2', null, null, null, '1502241594', '1502241594'), ('/admin/user/request-password-reset', '2', null, null, null, '1502241594', '1502241594'), ('/admin/user/reset-password', '2', null, null, null, '1502241594', '1502241594'), ('/admin/user/signup', '2', null, null, null, '1502241594', '1502241594'), ('/admin/user/view', '2', null, null, null, '1502241594', '1502241594'), ('/debug/*', '2', null, null, null, '1502241594', '1502241594'), ('/debug/default/*', '2', null, null, null, '1502241594', '1502241594'), ('/debug/default/db-explain', '2', null, null, null, '1502241594', '1502241594'), ('/debug/default/download-mail', '2', null, null, null, '1502241594', '1502241594'), ('/debug/default/index', '2', null, null, null, '1502241594', '1502241594'), ('/debug/default/toolbar', '2', null, null, null, '1502241594', '1502241594'), ('/debug/default/view', '2', null, null, null, '1502241594', '1502241594'), ('/gii/*', '2', null, null, null, '1502241594', '1502241594'), ('/gii/default/*', '2', null, null, null, '1502241594', '1502241594'), ('/gii/default/action', '2', null, null, null, '1502241594', '1502241594'), ('/gii/default/diff', '2', null, null, null, '1502241594', '1502241594'), ('/gii/default/index', '2', null, null, null, '1502241594', '1502241594'), ('/gii/default/preview', '2', null, null, null, '1502241594', '1502241594'), ('/gii/default/view', '2', null, null, null, '1502241594', '1502241594'), ('/site/*', '2', null, null, null, '1502241594', '1502241594'), ('/site/about', '2', null, null, null, '1502241594', '1502241594'), ('/site/captcha', '2', null, null, null, '1502241594', '1502241594'), ('/site/contact', '2', null, null, null, '1502241594', '1502241594'), ('/site/error', '2', null, null, null, '1502241594', '1502241594'), ('/site/index', '2', null, null, null, '1502241594', '1502241594'), ('/site/login', '2', null, null, null, '1502241594', '1502241594'), ('/site/logout', '2', null, null, null, '1502241594', '1502241594'), ('/solicitud/*', '2', null, null, null, '1523378361', '1523378361'), ('/solicitud/create', '2', null, null, null, '1523378361', '1523378361'), ('/solicitud/datos-equipo', '2', null, null, null, '1523378361', '1523378361'), ('/solicitud/delete', '2', null, null, null, '1523378361', '1523378361'), ('/solicitud/index', '2', null, null, null, '1523378361', '1523378361'), ('/solicitud/update', '2', null, null, null, '1523378361', '1523378361'), ('/solicitud/view', '2', null, null, null, '1523378361', '1523378361'), ('/user/*', '2', null, null, null, '1502241593', '1502241593'), ('/user/admin/*', '2', null, null, null, '1502241593', '1502241593'), ('/user/admin/assignments', '2', null, null, null, '1502241593', '1502241593'), ('/user/admin/block', '2', null, null, null, '1502241593', '1502241593'), ('/user/admin/confirm', '2', null, null, null, '1502241593', '1502241593'), ('/user/admin/create', '2', null, null, null, '1502241593', '1502241593'), ('/user/admin/delete', '2', null, null, null, '1502241593', '1502241593'), ('/user/admin/index', '2', null, null, null, '1502241593', '1502241593'), ('/user/admin/info', '2', null, null, null, '1502241593', '1502241593'), ('/user/admin/switch', '2', null, null, null, '1502241593', '1502241593'), ('/user/admin/update', '2', null, null, null, '1502241593', '1502241593'), ('/user/admin/update-profile', '2', null, null, null, '1502241593', '1502241593'), ('/user/profile/*', '2', null, null, null, '1502241593', '1502241593'), ('/user/profile/index', '2', null, null, null, '1502241593', '1502241593'), ('/user/profile/show', '2', null, null, null, '1502241593', '1502241593'), ('/user/recovery/*', '2', null, null, null, '1502241593', '1502241593'), ('/user/recovery/request', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/recovery/reset', '2', null, null, null, '1502241593', '1502241593'), ('/user/security/*', '2', null, null, null, '1502241593', '1502241593'), ('/user/security/auth', '2', null, null, null, '1502241593', '1502241593'), ('/user/security/login', '2', null, null, null, '1502241593', '1502241593'), ('/user/security/logout', '2', null, null, null, '1502241593', '1502241593'), ('/user/settings/*', '2', null, null, null, '1502241593', '1502241593'), ('/user/settings/account', '2', null, null, null, '1502241593', '1502241593'), ('/user/settings/confirm', '2', null, null, null, '1502241593', '1502241593'), ('/user/settings/delete', '2', null, null, null, '1502241593', '1502241593'), ('/user/settings/disconnect', '2', null, null, null, '1502241593', '1502241593'), ('/user/settings/networks', '2', null, null, null, '1502241593', '1502241593'), ('/user/settings/profile', '2', null, null, null, '1502241593', '1502241593'), ('administrator', '1', null, null, null, '1502241539', '1502241689'), ('estudiante', '1', null, null, null, '1502914131', '1502914131'), ('profesor', '1', null, null, null, '1523378331', '1523378331');
COMMIT;

-- ----------------------------
-- Table structure for `auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
`parent`  varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`child`  varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
PRIMARY KEY (`parent`, `child`),
FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `child` (`child`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
BEGIN;
INSERT INTO `auth_item_child` VALUES ('administrator', '/*'), ('profesor', '/solicitud/create'), ('profesor', '/solicitud/datos-equipo'), ('profesor', '/solicitud/update'), ('profesor', '/solicitud/view');
COMMIT;

-- ----------------------------
-- Table structure for `auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
`name`  varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`data`  blob NULL ,
`created_at`  int(11) NULL DEFAULT NULL ,
`updated_at`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`name`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `clasificacion_ubicacion`
-- ----------------------------
DROP TABLE IF EXISTS `clasificacion_ubicacion`;
CREATE TABLE `clasificacion_ubicacion` (
`Id`  int(11) NOT NULL AUTO_INCREMENT ,
`Descripcion`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`PermitirUsuario`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`Id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=6

;

-- ----------------------------
-- Records of clasificacion_ubicacion
-- ----------------------------
BEGIN;
INSERT INTO `clasificacion_ubicacion` VALUES ('1', 'Oficina', '2'), ('2', 'Mantenimiento', '2'), ('3', 'Aulas', '1'), ('4', 'Salas/Posgrado', '2'), ('5', 'Auditorio', '2');
COMMIT;

-- ----------------------------
-- Table structure for `detalle_solicitud`
-- ----------------------------
DROP TABLE IF EXISTS `detalle_solicitud`;
CREATE TABLE `detalle_solicitud` (
`Id`  int(11) NOT NULL AUTO_INCREMENT ,
`IdEquipo`  int(11) NULL DEFAULT NULL ,
`IdSolicitud`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`Id`),
FOREIGN KEY (`IdEquipo`) REFERENCES `equipo` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`IdSolicitud`) REFERENCES `solicitud` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `IdEquipo_DSFK` (`IdEquipo`) USING BTREE ,
INDEX `IdSolicitud_DSFK` (`IdSolicitud`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of detalle_solicitud
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `equipo`
-- ----------------------------
DROP TABLE IF EXISTS `equipo`;
CREATE TABLE `equipo` (
`Id`  int(11) NOT NULL AUTO_INCREMENT ,
`IdTipo`  int(11) NULL DEFAULT NULL ,
`Prestado`  int(11) NULL DEFAULT NULL ,
`Marca`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`Modelo`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`NoSerie`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`CodInventario`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`Color`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`Estado`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`Descripcion`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`UbicacionOrigen`  int(11) NULL DEFAULT NULL ,
`UbicacionActual`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`Id`),
FOREIGN KEY (`IdTipo`) REFERENCES `tipo_equipo` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `IdTipo_EFK` (`IdTipo`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of equipo
-- ----------------------------
BEGIN;
INSERT INTO `equipo` VALUES ('1', '1', null, 'EPSON', 'H553A', 'VA9K4902686', '66936', 'blanco', '1', 'Data Show # 1', '2', '2');
COMMIT;

-- ----------------------------
-- Table structure for `mantenimiento`
-- ----------------------------
DROP TABLE IF EXISTS `mantenimiento`;
CREATE TABLE `mantenimiento` (
`Id`  int(11) NOT NULL AUTO_INCREMENT ,
`IdUbicacion`  int(11) NULL DEFAULT NULL ,
`Fecha`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`Observacion`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`IdAyudante`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`Id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of mantenimiento
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`name`  varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`parent`  int(11) NULL DEFAULT NULL ,
`route`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`order`  int(11) NULL DEFAULT NULL ,
`data`  blob NULL ,
PRIMARY KEY (`id`),
FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
INDEX `parent` (`parent`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of menu
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `migration`
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
`version`  varchar(180) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`apply_time`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`version`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of migration
-- ----------------------------
BEGIN;
INSERT INTO `migration` VALUES ('m000000_000000_base', '1502214347'), ('m140209_132017_init', '1502214354'), ('m140403_174025_create_account_table', '1502214354'), ('m140504_113157_update_tables', '1502214356'), ('m140504_130429_create_token_table', '1502214357'), ('m140506_102106_rbac_init', '1502241345'), ('m140602_111327_create_menu_table', '1502240994'), ('m140830_171933_fix_ip_field', '1502214357'), ('m140830_172703_change_account_table_name', '1502214357'), ('m141222_110026_update_ip_field', '1502214358'), ('m141222_135246_alter_username_length', '1502214358'), ('m150614_103145_update_social_account_table', '1502214359'), ('m150623_212711_fix_username_notnull', '1502214359'), ('m151218_234654_add_timezone_to_profile', '1502214359'), ('m160312_050000_create_user', '1502240994');
COMMIT;

-- ----------------------------
-- Table structure for `movimiento_mantenimiento`
-- ----------------------------
DROP TABLE IF EXISTS `movimiento_mantenimiento`;
CREATE TABLE `movimiento_mantenimiento` (
`Id`  int(11) NOT NULL AUTO_INCREMENT ,
`IdEquipo`  int(11) NULL DEFAULT NULL ,
`IdMantenimiento`  int(11) NULL DEFAULT NULL ,
`FechaRetiro`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`RetiradoPor`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`Id`),
FOREIGN KEY (`IdEquipo`) REFERENCES `equipo` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`IdMantenimiento`) REFERENCES `mantenimiento` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `IdEquipo_MFK` (`IdEquipo`) USING BTREE ,
INDEX `IdMantenimiento_MFK` (`IdMantenimiento`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of movimiento_mantenimiento
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `periodo`
-- ----------------------------
DROP TABLE IF EXISTS `periodo`;
CREATE TABLE `periodo` (
`Id`  int(11) NOT NULL AUTO_INCREMENT ,
`DuracionMinutos`  int(11) NULL DEFAULT NULL ,
`Descripcion`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`HoriaInicio`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`HoraFin`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`Estado`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`IdTurno`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`Id`),
FOREIGN KEY (`IdTurno`) REFERENCES `turno` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `IdTurno_PFK` (`IdTurno`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of periodo
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `persona`
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
`Id`  int(11) NOT NULL AUTO_INCREMENT ,
`Nombres`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`Apellidos`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`Cedula`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`Telefono`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`Estado`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`IdTipo`  int(11) NULL DEFAULT NULL ,
`IdUsuario`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`Id`),
FOREIGN KEY (`IdTipo`) REFERENCES `tipo_persona` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`IdUsuario`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
UNIQUE INDEX `IdUsuario_Index` (`IdUsuario`) USING BTREE ,
INDEX `IdTipoPersona_Index` (`IdTipo`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=19

;

-- ----------------------------
-- Records of persona
-- ----------------------------
BEGIN;
INSERT INTO `persona` VALUES ('1', 'Norman', 'Arauz', '441-191288-0005R', '57108367', '1', '1', '2'), ('2', 'Marianela', 'Ortuño', '441-787878-005A', '44578996', null, '1', '3'), ('3', 'Ramiro', 'Contreras', '441-787878-0059', '564478', null, '1', '4'), ('4', 'Ricardo', 'Ramirez', '441-787878-0025E', '12332546', null, '1', '6'), ('7', 'test', 'test', 'test', 't', null, '1', '9'), ('8', 'Rogoberto', 'Mendoza', '441-0000-0003R', '121212', null, '1', '10'), ('9', 'Sofia', 'Maria', '441-000000-0005R', '121212', null, '1', '11'), ('10', 'Estela', 'Juarez', '000000000', '000000000', null, '1', '13'), ('11', 'asdf', 'asdf', 'asdf', 'asdf', null, '1', '19'), ('12', 'Marco', 'Antonio', '441-000000-000A', '2772-1234', null, '1', '20'), ('13', 'Francisco', 'Meza', '001-000000-0005R', '000000', null, '1', '22'), ('14', 'Octavio', 'Picado', '000000', '000000', null, '1', '23'), ('15', 'Wilmer', 'Palacio', '001-000000-0005R', '00000000', null, '2', '25'), ('16', 'Norman', 'Arauz', '441-191288-0005R', '2772-6666', null, '1', '26'), ('17', 'Erick', 'Lanzas', '001-000000-0005R', '2772-6666', null, '1', '1'), ('18', 'noel', 'martinez', '123456', '12356', null, '1', '27');
COMMIT;

-- ----------------------------
-- Table structure for `profile`
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
`user_id`  int(11) NOT NULL AUTO_INCREMENT ,
`name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`public_email`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`gravatar_email`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`gravatar_id`  varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`location`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`website`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`bio`  text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ,
`timezone`  varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
PRIMARY KEY (`user_id`),
FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=28

;

-- ----------------------------
-- Records of profile
-- ----------------------------
BEGIN;
INSERT INTO `profile` VALUES ('1', 'Norman Salvador Arauz Lopez', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', null), ('2', null, null, null, null, null, null, null, null), ('3', null, null, null, null, null, null, null, null), ('4', null, null, null, null, null, null, null, null), ('5', null, null, null, null, null, null, null, null), ('6', null, null, null, null, null, null, null, null), ('9', null, null, null, null, null, null, null, null), ('10', null, null, null, null, null, null, null, null), ('11', null, null, null, null, null, null, null, null), ('12', null, null, null, null, null, null, null, null), ('13', null, null, null, null, null, null, null, null), ('19', null, null, null, null, null, null, null, null), ('20', null, null, null, null, null, null, null, null), ('22', null, null, null, null, null, null, null, null), ('23', null, null, null, null, null, null, null, null), ('24', null, null, null, null, null, null, null, null), ('25', null, null, null, null, null, null, null, null), ('26', null, null, null, null, null, null, null, null), ('27', null, null, null, null, null, null, null, null);
COMMIT;

-- ----------------------------
-- Table structure for `social_account`
-- ----------------------------
DROP TABLE IF EXISTS `social_account`;
CREATE TABLE `social_account` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`user_id`  int(11) NULL DEFAULT NULL ,
`provider`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`client_id`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`data`  text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ,
`code`  varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`created_at`  int(11) NULL DEFAULT NULL ,
`email`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`username`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`),
FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
UNIQUE INDEX `account_unique` (`provider`, `client_id`) USING BTREE ,
UNIQUE INDEX `account_unique_code` (`code`) USING BTREE ,
INDEX `fk_user_account` (`user_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of social_account
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `solicitud`
-- ----------------------------
DROP TABLE IF EXISTS `solicitud`;
CREATE TABLE `solicitud` (
`Id`  int(11) NOT NULL AUTO_INCREMENT ,
`IdPersona`  int(11) NULL DEFAULT NULL ,
`IdUbicacion`  int(11) NULL DEFAULT NULL ,
`FechaInicio`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`FechaFin`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`Estado`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`FechaSolicitud`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`EntregadoPor`  int(11) NULL DEFAULT NULL ,
`RetiradoPor`  int(11) NULL DEFAULT NULL ,
`Observacion1`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`Observacion2`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`Observacion3`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`IdPeriodo`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`Id`),
FOREIGN KEY (`IdPeriodo`) REFERENCES `periodo` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`IdUbicacion`) REFERENCES `ubicacion` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `IdUbicacion_SFK` (`IdUbicacion`) USING BTREE ,
INDEX `IdPeriodo_SFK` (`IdPeriodo`) USING BTREE ,
INDEX `IdPersona_SFK` (`IdPersona`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of solicitud
-- ----------------------------
BEGIN;
INSERT INTO `solicitud` VALUES ('1', null, null, '2018-04-04', '2018-04-03', null, null, null, null, '', null, null, null);
COMMIT;

-- ----------------------------
-- Table structure for `tipo_equipo`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_equipo`;
CREATE TABLE `tipo_equipo` (
`Id`  int(11) NOT NULL AUTO_INCREMENT ,
`Descripcion`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`PermitirUsuario`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`Id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of tipo_equipo
-- ----------------------------
BEGIN;
INSERT INTO `tipo_equipo` VALUES ('1', 'DataShow', '1');
COMMIT;

-- ----------------------------
-- Table structure for `tipo_persona`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_persona`;
CREATE TABLE `tipo_persona` (
`Id`  int(11) NOT NULL AUTO_INCREMENT ,
`Descripcion`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`Id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Records of tipo_persona
-- ----------------------------
BEGIN;
INSERT INTO `tipo_persona` VALUES ('1', 'Docente'), ('2', 'Ayudante'), ('3', 'Administrativo');
COMMIT;

-- ----------------------------
-- Table structure for `token`
-- ----------------------------
DROP TABLE IF EXISTS `token`;
CREATE TABLE `token` (
`user_id`  int(11) NOT NULL ,
`code`  varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`created_at`  int(11) NOT NULL ,
`type`  smallint(6) NOT NULL ,
FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
UNIQUE INDEX `token_unique` (`user_id`, `code`, `type`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

;

-- ----------------------------
-- Records of token
-- ----------------------------
BEGIN;
INSERT INTO `token` VALUES ('5', 'O00_XczyWPpWM-ss97THw1wpd7Xvcr3m', '1523140613', '0');
COMMIT;

-- ----------------------------
-- Table structure for `turno`
-- ----------------------------
DROP TABLE IF EXISTS `turno`;
CREATE TABLE `turno` (
`Id`  int(11) NOT NULL AUTO_INCREMENT ,
`Descripcion`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`Estado`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`Id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Records of turno
-- ----------------------------
BEGIN;
INSERT INTO `turno` VALUES ('1', 'Matutino', '1'), ('2', 'Vespertino', '1'), ('3', 'Nocturno', '1');
COMMIT;

-- ----------------------------
-- Table structure for `ubicacion`
-- ----------------------------
DROP TABLE IF EXISTS `ubicacion`;
CREATE TABLE `ubicacion` (
`Id`  int(11) NOT NULL AUTO_INCREMENT ,
`Descripcion`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`Estado`  int(11) NULL DEFAULT NULL ,
`IdClasificacionUbicacion`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`Id`),
FOREIGN KEY (`IdClasificacionUbicacion`) REFERENCES `clasificacion_ubicacion` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `IdClasificacion_EFK` (`IdClasificacionUbicacion`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of ubicacion
-- ----------------------------
BEGIN;
INSERT INTO `ubicacion` VALUES ('1', 'Aula A4', '1', '3'), ('2', 'Aula A1', '1', '3'), ('3', 'Oficina 2do Piso', '1', '1'), ('4', 'Mantenimiento', '1', '2');
COMMIT;

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`username`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`email`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`password_hash`  varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`auth_key`  varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`confirmed_at`  int(11) NULL DEFAULT NULL ,
`unconfirmed_email`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`blocked_at`  int(11) NULL DEFAULT NULL ,
`registration_ip`  varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`created_at`  int(11) NOT NULL ,
`updated_at`  int(11) NOT NULL ,
`flags`  int(11) NOT NULL DEFAULT 0 ,
`status`  int(11) NOT NULL DEFAULT 10 ,
`password_reset_token`  varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`),
UNIQUE INDEX `user_unique_username` (`username`) USING BTREE ,
UNIQUE INDEX `user_unique_email` (`email`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=28

;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('1', 'admin', 'admin@sistema.com', '$2y$10$vy7NbA06xq2z9audQM5l6OMWgIHLXpTIH.rbBHA3pk5NnJwRU8KZu', 'yzUH8bU5cnL2B9hHHe9Xl86iZGM35YPA', '1502235895', null, null, '127.0.0.1', '1502235382', '1502235382', '0', '10', null), ('2', 'netman', 'netman.arauz@gmail.com', '$2y$10$6y6X/hOWzm5LhSIdRVwAme9n8OjvPl0Ru6lTqCo9.hMwIz614vOxm', '6BvV6YbvO3aP1Y4Gwd2-nlqOnYn7UY0Y', '1523080800', null, '1523137134', '127.0.0.1', '1523131674', '1523131674', '0', '10', null), ('3', 'marianelas', 'marianelas@gmail.com', '$2y$10$5BBEKoDdxoZTTxTbtpxoi.4a9zM4PowZIzjorePo3TXemvvFv38qK', 'xuz4ps1Fi77mGS_dxkleqOAewaF82YDf', '1523080800', null, null, '127.0.0.1', '1523137168', '1523373094', '0', '10', null), ('4', 'ramiro', 'ramiro@yahoo.es', '$2y$10$PUqe2GNHr9NErb5lLAZxNeHrSORkU3TxH7hpluuFHTuiT3Am1Wd36', 'zFJ_WoNhPxNh_mLDluioqxij3t_unkuX', '1523080800', null, null, '127.0.0.1', '1523138707', '1523138707', '0', '10', null), ('5', 'vaneza', 'vaneza@yahoo.es', '$2y$10$7Im8F0cwphxhXKgesRwLMOm0ODp2RpoCuK2ps2G6sJakAyUVyhrVe', 'S0SyTURopE5cWHUHmocB4PgH_PiFEhun', '1523080800', null, null, '127.0.0.1', '1523140613', '1523140613', '0', '10', null), ('6', 'ricardo12', 'ricardoa@gmail.com', '$2y$10$LA3f1xGoTnrEk5GC.rYO8eWFa03cRUadwSq/TVFu3vLqH1uKUaxaC', 'KJqAqkm6I9h9MpTR6q9V1BXQyShpyvXk', '1523080800', null, null, '127.0.0.1', '1523143437', '1523143437', '0', '10', null), ('9', 'test', 'test@gmail.com', '$2y$10$gJMiqDXJjjFfyDu//t3dZu3wv7iYsdiC8Wx4V4Hxn5LBHEAP4d1sC', '5mXNtlQoic8vT9uh_9LWMjF8WWjTniiX', '1523080800', null, null, '127.0.0.1', '1523154386', '1523154386', '0', '10', null), ('10', 'rigo', 'rigoberto@gmail.com', '$2y$10$BTH9qyyb1.9z0bL7azdCSum4yiko8Vq/NYNUrIcfeut3Ouo8JaeIW', 'gg91zzFVi1HFicHqqoMyFfcHhzgTUwW5', '1523080800', null, null, '127.0.0.1', '1523216925', '1523216925', '0', '10', null), ('11', 'sofi', 'sofi@gmail.com', '$2y$10$0xkhbPYwt6wluwrBPxcKKOHkfoI3OXlaghU9sbx/4sGNJRiggCwgm', 'SkLWdheL8CRpwL3YcOmEsfJGcC5XAsmq', '1523167200', null, null, '127.0.0.1', '1523217526', '1523217814', '0', '10', null), ('12', 'kzuniga', 'kassandrazuniga16@gmail.com', '$2y$10$cjjCp2q1ov.cANn81w90auVuBrzsbC4gp4ABktgvyxgAVHAHZOFGe', 'HYQZBeQ75TRZynYynCRSyBLcETSb-BaM', '1523218158', null, null, '127.0.0.1', '1523218158', '1523218158', '0', '10', null), ('13', 'estela', 'estela@gmail.com', '$2y$10$IZiPPsD4IHnCTPwaqs7y/eE9C1Ec1caDrj2m3gFYvkIzc1ww9wEvm', 'vPyy8VvuGpWeFgAp-NY-X2o5P-DgMiEr', null, null, null, '127.0.0.1', '1523218763', '1523218840', '0', '10', null), ('19', 'test2', 'test2@gmail.com', '$2y$10$VgnSyMHfR9TSLIWuqWFmwevM5I12/QIGNl20SFa3H0vk3ft8fb1/6', '8717JcFymnVvjHGvkzL9fNeLKGNNczNA', '1523224127', null, null, '127.0.0.1', '1523224127', '1523224127', '0', '10', null), ('20', 'marco', 'marco@gmail.com', '$2y$10$xNzoSVuYXYDumSdX2.S42u7h0LDF6/gCPjcc84IaYBeXw3sFSF2W6', 'rD2gp9QVVgXEwOaio-byM64a4FjvSG9l', '1523224350', null, null, '127.0.0.1', '1523224350', '1523224350', '0', '10', null), ('22', 'rene', 'rene@gmail.com', '$2y$10$ffMSg3ultRn0rwx9YeOViuRoFctaMAuvv2KXTDCevm8S3GkkuBAOq', 'd_1VS5uxr4TN9YPhEBLi3BmrJUDtdO59', '1523371612', null, null, '127.0.0.1', '1523371612', '1523371612', '0', '10', null), ('23', 'octavio', 'octavio@gmail.com', '$2y$10$eC9rE59FZRZIJY7lt4/24en1j9wkgzXCkSHp6HQ9h/KKGAfe1A/7K', 'v2p0LWyW9L2HMSKr7n1b5ulRidxi9wZj', '1523371689', null, null, '127.0.0.1', '1523371689', '1523371689', '0', '10', null), ('24', 'chomas', 'chomas@gmail.com', '$2y$10$lzr4zNsKHz4BNG4R1u6wAuX6hJw1TQTQnOf/V1SL.XlG.weKRwB7y', 'W9w8RgmitxX8S5cxY1oaqQywNT26sg9C', '1523371867', null, null, '127.0.0.1', '1523371867', '1523371867', '0', '10', null), ('25', 'wilmer', 'wilmer@gmail.com', '$2y$10$7GEMJrNV1iw57kxBZxz40OIrNQhu3S/rszC/nUVszDI/mbJxNNvBW', 'DOdJK3EJBlxdFOh5gHSjF3KSKEfgxc7O', '1523372487', null, null, '127.0.0.1', '1523372487', '1523372487', '0', '10', null), ('26', 'norman', 'norman@gmail.com', '$2y$10$yCkc1E7sYz.FJqQ.BUrcDOs4GgmWsN2AfDJ9RUFr2iwyg5GE6W/5y', 'LyrQJunjuOq8z_aWjm1g88Ux8J9ACDJc', '1523378276', null, null, '127.0.0.1', '1523378276', '1523378276', '0', '10', null), ('27', 'noel', 'noel@gmail.com', '$2y$10$yTxxgYGwuZIF8Jq3Z3j89.Z7zBr/8Zzgzbm6ZaPIiKZTT7BDfMmWC', '1ixq_h9R_wKjKoQ5wFdmGp6q563CHKlk', '1523461628', null, null, '::1', '1523461628', '1523461628', '0', '10', null);
COMMIT;

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

-- ----------------------------
-- View structure for `lista_ubicaciones`
-- ----------------------------
DROP VIEW IF EXISTS `lista_ubicaciones`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lista_ubicaciones` AS select `ubicacion`.`Id` AS `Id`,`ubicacion`.`Descripcion` AS `Descripcion`,`clasificacion_ubicacion`.`PermitirUsuario` AS `PermitirUsuario` from (`ubicacion` join `clasificacion_ubicacion`) where (`ubicacion`.`IdClasificacionUbicacion` = `clasificacion_ubicacion`.`Id`) ;

-- ----------------------------
-- View structure for `personas`
-- ----------------------------
DROP VIEW IF EXISTS `personas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `personas` AS select `persona`.`Id` AS `Id`,concat(`persona`.`Nombres`,`persona`.`Apellidos`) AS `NombreCompleto`,`tipo_persona`.`Descripcion` AS `TipoPersona`,`persona`.`Estado` AS `Estado` from (`tipo_persona` join `persona`) where (`persona`.`IdTipo` = `tipo_persona`.`Id`) ;

-- ----------------------------
-- Auto increment value for `clasificacion_ubicacion`
-- ----------------------------
ALTER TABLE `clasificacion_ubicacion` AUTO_INCREMENT=6;

-- ----------------------------
-- Auto increment value for `detalle_solicitud`
-- ----------------------------
ALTER TABLE `detalle_solicitud` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `equipo`
-- ----------------------------
ALTER TABLE `equipo` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for `mantenimiento`
-- ----------------------------
ALTER TABLE `mantenimiento` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `menu`
-- ----------------------------
ALTER TABLE `menu` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `movimiento_mantenimiento`
-- ----------------------------
ALTER TABLE `movimiento_mantenimiento` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `periodo`
-- ----------------------------
ALTER TABLE `periodo` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `persona`
-- ----------------------------
ALTER TABLE `persona` AUTO_INCREMENT=19;

-- ----------------------------
-- Auto increment value for `profile`
-- ----------------------------
ALTER TABLE `profile` AUTO_INCREMENT=28;

-- ----------------------------
-- Auto increment value for `social_account`
-- ----------------------------
ALTER TABLE `social_account` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `solicitud`
-- ----------------------------
ALTER TABLE `solicitud` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for `tipo_equipo`
-- ----------------------------
ALTER TABLE `tipo_equipo` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for `tipo_persona`
-- ----------------------------
ALTER TABLE `tipo_persona` AUTO_INCREMENT=4;

-- ----------------------------
-- Auto increment value for `turno`
-- ----------------------------
ALTER TABLE `turno` AUTO_INCREMENT=4;

-- ----------------------------
-- Auto increment value for `ubicacion`
-- ----------------------------
ALTER TABLE `ubicacion` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for `user`
-- ----------------------------
ALTER TABLE `user` AUTO_INCREMENT=28;
