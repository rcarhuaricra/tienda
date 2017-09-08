/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.13-MariaDB : Database - ricvpe_tienda
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ricvpe_tienda` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `ricvpe_tienda`;

/*Table structure for table `accesos` */

DROP TABLE IF EXISTS `accesos`;

CREATE TABLE `accesos` (
  `ID_ACCESOS` varchar(30) NOT NULL,
  `ID_PERSONA` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_ACCESOS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `accesos` */

/*Table structure for table `categoria_producto` */

DROP TABLE IF EXISTS `categoria_producto`;

CREATE TABLE `categoria_producto` (
  `ID_CATEGORIA_PRODUCTO` varchar(30) NOT NULL,
  `NOMBRE_CATEGORIA_PRODUCTO` varchar(100) DEFAULT NULL,
  `USERREG` varchar(35) DEFAULT NULL,
  `FECREG` datetime DEFAULT NULL,
  `USERMOD` varchar(35) DEFAULT NULL,
  `FECMOD` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_CATEGORIA_PRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `categoria_producto` */

insert  into `categoria_producto`(`ID_CATEGORIA_PRODUCTO`,`NOMBRE_CATEGORIA_PRODUCTO`,`USERREG`,`FECREG`,`USERMOD`,`FECMOD`) values ('107C6BDF-AADD-497D-BA47-9429A9','luces',NULL,NULL,NULL,NULL),('ED24A0C9-214D-47CC-8262-94E5CF','RELAY',NULL,NULL,NULL,NULL),('F5F2684B-BAB7-42B4-9120-A4BF55','FRENOS',NULL,NULL,NULL,NULL);

/*Table structure for table `detalle_entradas` */

DROP TABLE IF EXISTS `detalle_entradas`;

CREATE TABLE `detalle_entradas` (
  `ID_DETALLE_ENTRADA` varchar(30) NOT NULL,
  `ID_ENTRADA` varchar(30) DEFAULT NULL,
  `ID_PRODUCTO` varchar(30) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `PRECIO_COMPRA` float DEFAULT NULL,
  `USERREG` varchar(35) DEFAULT NULL,
  `FECREG` datetime DEFAULT NULL,
  `USERMOD` varchar(35) DEFAULT NULL,
  `FECMOD` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_DETALLE_ENTRADA`),
  KEY `ID_ENTRADA` (`ID_ENTRADA`),
  KEY `ID_PRODUCTO` (`ID_PRODUCTO`),
  CONSTRAINT `detalle_entradas_ibfk_1` FOREIGN KEY (`ID_ENTRADA`) REFERENCES `entradas` (`ID_ENTRADA`),
  CONSTRAINT `detalle_entradas_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detalle_entradas` */

/*Table structure for table `detalle_salida` */

DROP TABLE IF EXISTS `detalle_salida`;

CREATE TABLE `detalle_salida` (
  `ID_DETALLE_SALIDA` varchar(30) NOT NULL,
  `ID_SALIDAS` varchar(30) DEFAULT NULL,
  `ID_PRODUCTO` varchar(30) DEFAULT NULL,
  `ID_TIPO_VENTA` varchar(30) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `PRECIO_VENTA` float DEFAULT NULL,
  `PRECIO_OBSERVACION` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID_DETALLE_SALIDA`),
  KEY `ID_SALIDAS` (`ID_SALIDAS`),
  KEY `ID_PRODUCTO` (`ID_PRODUCTO`),
  KEY `ID_TIPO_VENTA` (`ID_TIPO_VENTA`),
  CONSTRAINT `detalle_salida_ibfk_1` FOREIGN KEY (`ID_SALIDAS`) REFERENCES `salidas` (`ID_SALIDAS`),
  CONSTRAINT `detalle_salida_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`),
  CONSTRAINT `detalle_salida_ibfk_3` FOREIGN KEY (`ID_TIPO_VENTA`) REFERENCES `tipo_venta` (`ID_TIPO_VENTA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detalle_salida` */

/*Table structure for table `entradas` */

DROP TABLE IF EXISTS `entradas`;

CREATE TABLE `entradas` (
  `ID_ENTRADA` varchar(30) NOT NULL,
  `DOCUMENTO_REFERENCIA` varchar(35) DEFAULT NULL,
  `IDPROVEEDOR` varchar(30) DEFAULT NULL,
  `ID_LOCAL` int(5) DEFAULT NULL,
  `USERREG` varchar(35) DEFAULT NULL,
  `FECREG` datetime DEFAULT NULL,
  `USERMOD` varchar(35) DEFAULT NULL,
  `FECMOD` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_ENTRADA`),
  KEY `ID_LOCAL` (`ID_LOCAL`),
  CONSTRAINT `entradas_ibfk_1` FOREIGN KEY (`ID_LOCAL`) REFERENCES `locales` (`ID_LOCAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `entradas` */

/*Table structure for table `locales` */

DROP TABLE IF EXISTS `locales`;

CREATE TABLE `locales` (
  `ID_LOCAL` int(5) NOT NULL AUTO_INCREMENT,
  `NOMBRE_LOCAL` varchar(50) DEFAULT NULL,
  `RUC` varchar(11) DEFAULT NULL,
  `CORREO` varchar(50) DEFAULT NULL,
  `TELEFONO` varchar(9) DEFAULT NULL,
  `IGV` varchar(2) DEFAULT NULL,
  `DIRECCION` varchar(100) DEFAULT NULL,
  `USERREG` varchar(35) DEFAULT NULL,
  `FECREG` datetime DEFAULT NULL,
  `USERMOD` varchar(35) DEFAULT NULL,
  `FECMOD` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_LOCAL`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `locales` */

insert  into `locales`(`ID_LOCAL`,`NOMBRE_LOCAL`,`RUC`,`CORREO`,`TELEFONO`,`IGV`,`DIRECCION`,`USERREG`,`FECREG`,`USERMOD`,`FECMOD`) values (1,'LA44 - PRINCIPAL','10986532545','LA44@LA44.COM','987654321','18','NO ME ACUERDO LA DIRECCIÓN',NULL,NULL,'0000000000000000000000001-2017','2017-08-27 16:20:36'),(2,'LA44 - TIENDA 2','10986532545','LA44@LA44.COM','987654321','18','NO ME ACUERDO LA DIRECCIÓN',NULL,NULL,'0000000000000000000000001-2017','2017-08-27 12:11:37'),(3,'Tienda 3','ruc','correo','telefono','18','direccion','USER',NULL,'0000000000000000000000001-2017','2017-08-27 12:11:32'),(4,'ALMACEN','10986532545','LA44@LA44.COM','987654321','18','NO ME ACUERDO LA DIRECCIÓN',NULL,NULL,'0000000000000000000000001-2017','2017-08-27 12:11:17');

/*Table structure for table `marca` */

DROP TABLE IF EXISTS `marca`;

CREATE TABLE `marca` (
  `ID_MARCA` varchar(30) NOT NULL,
  `NOMBRE_MARCA` varchar(50) DEFAULT NULL,
  `USERREG` varchar(35) DEFAULT NULL,
  `FECREG` datetime DEFAULT NULL,
  `USERMOD` varchar(35) DEFAULT NULL,
  `FECMOD` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_MARCA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `marca` */

insert  into `marca`(`ID_MARCA`,`NOMBRE_MARCA`,`USERREG`,`FECREG`,`USERMOD`,`FECMOD`) values ('07A2C965-6348-41FC-9356-69490E','MITSUbishi',NULL,NULL,NULL,NULL),('21C2AA6E-D759-40A9-9370-ACCB3E','KYSS',NULL,NULL,NULL,NULL),('246E3C82-3F87-485B-B284-DF1268','MITSU',NULL,NULL,NULL,NULL),('29AC125D-884D-46A4-B3B4-8DECAC','salon',NULL,NULL,NULL,NULL),('3206258A-0C22-433F-9094-C0758B','KIA',NULL,NULL,NULL,NULL),('9ABD2F57-3A5E-4333-9B50-4CFD56','alfa',NULL,NULL,NULL,NULL),('A734BFF2-E801-436E-801D-06AE60','TRODAT',NULL,NULL,NULL,NULL),('BFC3F193-44E4-4030-B31A-AEB6E1','TOYOTA',NULL,NULL,NULL,NULL);

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `menus` */

insert  into `menus`(`id`,`parent`,`name`,`icon`,`slug`,`number`) values (1,NULL,'Inicio','glyphicon glyphicon-home','dashboard',1),(2,NULL,'Almacen','glyphicon glyphicon-barcode','almacen',2),(3,2,'Nuevo Producto','fa fa-circle-o','almacen/newproductos',2),(4,NULL,'Contactos','icofont icofont-brand-live-messenger','contactos',4),(5,NULL,'Facturación','icofont icofont-basket','facturacion',5),(6,NULL,'Reportes','icofont icofont-growth','reportes',6),(7,2,'Productos','fa fa-circle-o','almacen/productos',1),(8,NULL,'Configuración','icofont icofont-gears','configuracion',8),(9,4,'Clientes','icofont icofont-student-alt','contactos/clientes',1),(10,4,'Proveedores','icofont icofont-man-in-glasses','contactos/proveedores',2),(11,5,'Nueva Venta','icofont icofont-ui-cart','facturacion/nuevo',1),(12,5,'Administrar Facturas','fa fa-circle-o','facturacion/administrar',2),(13,6,'Reporte de Ventas','icofont icofont-chart-histogram-alt','reportes/ventas',1),(14,6,'Reporte de Compras','icofont icofont-chart-histogram','reportes/compras',2),(15,6,'Reporte de Inventario','icofont icofont-chart-bar-graph','reportes/inventario',3),(16,2,'Marcas','fa fa-circle-o','almacen/marcas',3),(17,2,'Historial de Compras','fa fa-circle-o','almacen/historial',4);

/*Table structure for table `persona` */

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
  `ID_PERSONA` varchar(30) NOT NULL,
  `USER` varchar(35) DEFAULT NULL,
  `NOMBRES` varchar(35) DEFAULT NULL,
  `APELLIDO_PATERNO` varchar(35) DEFAULT NULL,
  `APELLIDO_MATERNO` varchar(35) DEFAULT NULL,
  `ID_TIPO_DOCUMENTO` int(11) DEFAULT NULL,
  `NUMERO_DOCUMENTO` varchar(11) DEFAULT NULL,
  `CUMPLEAÑOS` datetime DEFAULT NULL,
  `DIRECCION` varchar(100) DEFAULT NULL,
  `TELEFONO` varchar(9) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(32) DEFAULT NULL,
  `PERSONA_CONTACTO` varchar(200) DEFAULT NULL,
  `ID_TIPO_PERSONA` int(11) DEFAULT NULL,
  `USERREG` varchar(35) DEFAULT NULL,
  `FECREG` timestamp NULL DEFAULT NULL,
  `USERMOD` varchar(35) DEFAULT NULL,
  `FECMOD` datetime DEFAULT NULL,
  `USERESTADO` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`ID_PERSONA`),
  KEY `ID_TIPO_DOCUMENTO` (`ID_TIPO_DOCUMENTO`),
  KEY `ID_TIPO_PERSONA` (`ID_TIPO_PERSONA`),
  CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`ID_TIPO_DOCUMENTO`) REFERENCES `tipo_documento` (`ID_TIPO_DOCUMENTO`),
  CONSTRAINT `persona_ibfk_3` FOREIGN KEY (`ID_TIPO_PERSONA`) REFERENCES `tipo_persona` (`ID_TIPO_PERSONA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `persona` */

insert  into `persona`(`ID_PERSONA`,`USER`,`NOMBRES`,`APELLIDO_PATERNO`,`APELLIDO_MATERNO`,`ID_TIPO_DOCUMENTO`,`NUMERO_DOCUMENTO`,`CUMPLEAÑOS`,`DIRECCION`,`TELEFONO`,`EMAIL`,`PASSWORD`,`PERSONA_CONTACTO`,`ID_TIPO_PERSONA`,`USERREG`,`FECREG`,`USERMOD`,`FECMOD`,`USERESTADO`) values ('0000000000000000000000001-2017','MCALLA','MAYKOL HENRY','CALLA','SOLIER',1,'98765421',NULL,'','987654322','M.CALLA@LA44.COM','e10adc3949ba59abbe56e057f20f883e','',1,'RICV','2017-08-06 10:45:26','0000000000000000000000001-2017','2017-08-27 16:15:38','1');

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `ID_PRODUCTO` varchar(30) NOT NULL,
  `CODIGO_BARRAS` varchar(13) DEFAULT NULL,
  `NOMBRE_PRODUCTO` varchar(60) DEFAULT NULL,
  `ID_MARCA` varchar(30) DEFAULT NULL,
  `ID_CATEGORIA_PRODUCTO` varchar(30) DEFAULT NULL,
  `DESCRIPCION_PRODUCTO` varchar(300) DEFAULT NULL,
  `IMG_PRODUCTO` varchar(100) DEFAULT NULL,
  `USERREG` varchar(35) DEFAULT NULL,
  `FECREG` datetime DEFAULT NULL,
  `USERMOD` varchar(35) DEFAULT NULL,
  `FECMOD` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_PRODUCTO`),
  KEY `ID_MARCA` (`ID_MARCA`),
  KEY `ID_CATEGORIA_PRODUCTO` (`ID_CATEGORIA_PRODUCTO`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`ID_MARCA`) REFERENCES `marca` (`ID_MARCA`),
  CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`ID_CATEGORIA_PRODUCTO`) REFERENCES `categoria_producto` (`ID_CATEGORIA_PRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `producto` */

/*Table structure for table `recibos` */

DROP TABLE IF EXISTS `recibos`;

CREATE TABLE `recibos` (
  `ID_RECIBOS` varchar(30) NOT NULL,
  `TXT_TIPO_RECIBO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_RECIBOS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `recibos` */

insert  into `recibos`(`ID_RECIBOS`,`TXT_TIPO_RECIBO`) values ('0000000000000000000000001-2017','FACTURA'),('0000000000000000000000002-2017','BOLETA VENTA'),('0000000000000000000000003-2017','GUIA REMICION'),('0000000000000000000000004-2017','PROFORMA');

/*Table structure for table `salidas` */

DROP TABLE IF EXISTS `salidas`;

CREATE TABLE `salidas` (
  `ID_SALIDAS` varchar(30) NOT NULL,
  `DOCUMENTO_REFERENCIA` varchar(35) DEFAULT NULL,
  `ID_LOCAL` int(5) DEFAULT NULL,
  `USERREG` varchar(35) DEFAULT NULL,
  `FECREG` datetime DEFAULT NULL,
  `USERMOD` varchar(35) DEFAULT NULL,
  `FECMOD` datetime DEFAULT NULL,
  `ID_RECIBOS` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_SALIDAS`),
  KEY `ID_LOCAL` (`ID_LOCAL`),
  KEY `ID_RECIBOS` (`ID_RECIBOS`),
  CONSTRAINT `salidas_ibfk_2` FOREIGN KEY (`ID_LOCAL`) REFERENCES `locales` (`ID_LOCAL`),
  CONSTRAINT `salidas_ibfk_3` FOREIGN KEY (`ID_RECIBOS`) REFERENCES `recibos` (`ID_RECIBOS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `salidas` */

/*Table structure for table `stock_producto` */

DROP TABLE IF EXISTS `stock_producto`;

CREATE TABLE `stock_producto` (
  `ID_STOCK` varchar(30) NOT NULL,
  `ID_PRODUCTO` varchar(30) DEFAULT NULL,
  `ID_LOCAL` int(5) DEFAULT NULL,
  `CANTIDAD_STOCK` int(11) DEFAULT NULL,
  `PRECIO_COMPRA` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`ID_STOCK`),
  KEY `ID_PRODUCTO` (`ID_PRODUCTO`),
  KEY `ID_LOCAL` (`ID_LOCAL`),
  CONSTRAINT `stock_producto_ibfk_1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`),
  CONSTRAINT `stock_producto_ibfk_2` FOREIGN KEY (`ID_LOCAL`) REFERENCES `locales` (`ID_LOCAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `stock_producto` */

/*Table structure for table `tipo_documento` */

DROP TABLE IF EXISTS `tipo_documento`;

CREATE TABLE `tipo_documento` (
  `ID_TIPO_DOCUMENTO` int(11) NOT NULL AUTO_INCREMENT,
  `DOCUMENTO` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_DOCUMENTO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tipo_documento` */

insert  into `tipo_documento`(`ID_TIPO_DOCUMENTO`,`DOCUMENTO`) values (1,'DNI'),(2,'RUC');

/*Table structure for table `tipo_persona` */

DROP TABLE IF EXISTS `tipo_persona`;

CREATE TABLE `tipo_persona` (
  `ID_TIPO_PERSONA` int(11) NOT NULL AUTO_INCREMENT,
  `TXT_TIPO_PERSONA` varchar(35) DEFAULT NULL,
  `TXT_TIPO_USUARIO` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_PERSONA`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tipo_persona` */

insert  into `tipo_persona`(`ID_TIPO_PERSONA`,`TXT_TIPO_PERSONA`,`TXT_TIPO_USUARIO`) values (1,'ADMINISTRADOR','TRABAJADOR'),(2,'VENDEDOR','TRABAJADOR'),(3,'ALMACEN','TRABAJADOR'),(4,'PROVEEDOR','PROVEEDOR'),(5,'CLIENTE','CLIENTE');

/*Table structure for table `tipo_venta` */

DROP TABLE IF EXISTS `tipo_venta`;

CREATE TABLE `tipo_venta` (
  `ID_TIPO_VENTA` varchar(30) NOT NULL,
  `TXT_TIPO_VENTA` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_VENTA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tipo_venta` */

insert  into `tipo_venta`(`ID_TIPO_VENTA`,`TXT_TIPO_VENTA`) values ('0000000000000000000000001-2017','VENTA_PRODUCTO'),('0000000000000000000000002-2017','SERVICIO'),('0000000000000000000000003-2017','PASE');

/* Procedure structure for procedure `insertPersona` */

/*!50003 DROP PROCEDURE IF EXISTS  `insertPersona` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`ricvpe`@`localhost` PROCEDURE `insertPersona`(IN p1 VARCHAR (35),IN p2 VARCHAR (35),IN p3 VARCHAR (35),IN p4 VARCHAR (35), in p5 int, in p6 varchar(11)
				, in p7 varchar (100), in p8 varchar(9), in p9 varchar (50), in p10 varchar(32), in p11 varchar(200), IN p12 int
				, in p13 varchar (35), IN p14 VARCHAR (35) )
BEGIN
	
	 
	
	INSERT INTO `persona` 
	(`ID_PERSONA`,`USER`,`NOMBRES`,`APELLIDO_PATERNO`,`APELLIDO_MATERNO`,`ID_TIPO_DOCUMENTO`,`NUMERO_DOCUMENTO`,`DIRECCION`,`TELEFONO`,`EMAIL`,`PASSWORD`,`PERSONA_CONTACTO`,`ID_TIPO_PERSONA`,`USERREG`,`FECREG`,`USERESTADO`,`CUMPLEAÑOS`)
	VALUES 
	((SELECT CONCAT(IFNULL(LPAD(MAX(SUBSTRING(PE.ID_PERSONA,1,25))+1,25,'0'),LPAD('1',25,'0')), '-' , DATE_FORMAT(NOW(),"%Y")) FROM persona PE
	WHERE 	SUBSTRING(PE.ID_PERSONA,27,5) 	= DATE_FORMAT(NOW(),"%Y")        
	AND 	DATE_FORMAT(PE.FECREG,"%Y") 	= DATE_FORMAT(NOW(),"%Y")), UPPER(p1), UPPER(p2), UPPER(p3), UPPER(p4), UPPER(p5), UPPER(p6), UPPER(p7), UPPER(p8), UPPER(p9), UPPER(p10), UPPER(p11), UPPER(p12), UPPER(p13),NOW(),'1',p14);
END */$$
DELIMITER ;

/* Procedure structure for procedure `insertProducto` */

/*!50003 DROP PROCEDURE IF EXISTS  `insertProducto` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`ricvpe`@`localhost` PROCEDURE `insertProducto`(IN p1 VARCHAR (13),IN p2 VARCHAR (60),IN p3 VARCHAR (30),IN p4 VARCHAR (30), IN p5 varchar(300), IN p6 VARCHAR(100), IN p7 VARCHAR (35))
BEGIN
	
	INSERT INTO `producto`
	(`ID_PRODUCTO`,`CODIGO_BARRAS`,`NOMBRE_PRODUCTO`,`ID_MARCA`,`ID_CATEGORIA_PRODUCTO`,`DESCRIPCION_PRODUCTO`,`IMG_PRODUCTO`,`USERREG`,`FECREG`)
	VALUE (
	(SELECT CONCAT(IFNULL(LPAD(MAX(SUBSTRING(PRO.`ID_PRODUCTO`,1,25))+1,25,'0'),LPAD('1',25,'0')), '-' , DATE_FORMAT(NOW(),"%Y")) FROM producto PRO
	WHERE 	SUBSTRING(PRO.`ID_PRODUCTO`,27,5) 	= DATE_FORMAT(NOW(),"%Y")        
	AND 	DATE_FORMAT(PRO.FECREG,"%Y") 	= DATE_FORMAT(NOW(),"%Y")), P1, P2, P3, P4, P5, P6, P7, now());
END */$$
DELIMITER ;

/* Procedure structure for procedure `ListarCategoria` */

/*!50003 DROP PROCEDURE IF EXISTS  `ListarCategoria` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`ricvpe`@`localhost` PROCEDURE `ListarCategoria`()
BEGIN
	select * from `categoria_producto` P;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `listarDocumento` */

/*!50003 DROP PROCEDURE IF EXISTS  `listarDocumento` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`ricvpe`@`localhost` PROCEDURE `listarDocumento`()
BEGIN
	SELECT TD.`ID_TIPO_DOCUMENTO`, TD.`DOCUMENTO` FROM `tipo_documento` TD;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `listarMarcas` */

/*!50003 DROP PROCEDURE IF EXISTS  `listarMarcas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`ricvpe`@`localhost` PROCEDURE `listarMarcas`()
BEGIN
	select * from `marca`;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `ListarProductos` */

/*!50003 DROP PROCEDURE IF EXISTS  `ListarProductos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`ricvpe`@`localhost` PROCEDURE `ListarProductos`()
BEGIN
	SELECT 
	P.`CODIGO_BARRAS`,
	P.`NOMBRE_PRODUCTO`,
	P.`DESCRIPCION_PRODUCTO`,
	M.`NOMBRE_MARCA`,
	P.`IMG_PRODUCTO`,
	CP.`NOMBRE_CATEGORIA_PRODUCTO`
	FROM `producto` P
	INNER JOIN `marca` M ON P.`ID_MARCA`=M.`ID_MARCA`
	INNER JOIN `categoria_producto` CP ON P.`ID_CATEGORIA_PRODUCTO`=CP.`ID_CATEGORIA_PRODUCTO`;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `ListarRoles` */

/*!50003 DROP PROCEDURE IF EXISTS  `ListarRoles` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`ricvpe`@`localhost` PROCEDURE `ListarRoles`()
BEGIN
	SELECT * FROM `tipo_persona`
	WHERE `TXT_TIPO_USUARIO`='TRABAJADOR';
    END */$$
DELIMITER ;

/* Procedure structure for procedure `listarUsuarios` */

/*!50003 DROP PROCEDURE IF EXISTS  `listarUsuarios` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`ricvpe`@`localhost` PROCEDURE `listarUsuarios`(in p1 VARCHAR(35))
BEGIN
	SELECT 
	PE.`ID_PERSONA`,
	PE.`USER`,
	PE.`NOMBRES`,
	PE.`APELLIDO_PATERNO`,
	PE.`APELLIDO_MATERNO`,
	TD.`DOCUMENTO`,
	PE.`NUMERO_DOCUMENTO`,
	PE.`DIRECCION`,
	PE.`TELEFONO`,
	PE.`EMAIL`,
	PE.`PASSWORD`,
	PE.`PERSONA_CONTACTO`,
	TP.`TXT_TIPO_PERSONA`,
	PE.`USERESTADO`
	FROM `persona` PE
	INNER JOIN `tipo_documento` TD ON PE.`ID_TIPO_DOCUMENTO`= TD.ID_TIPO_DOCUMENTO
	INNER JOIN `tipo_persona` TP ON PE.`ID_TIPO_PERSONA`=TP.`ID_TIPO_PERSONA`
	where TP.`TXT_TIPO_USUARIO` = p1;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `mostrarLocales` */

/*!50003 DROP PROCEDURE IF EXISTS  `mostrarLocales` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`ricvpe`@`localhost` PROCEDURE `mostrarLocales`()
BEGIN
	select * from `locales`;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `MostrarProducto` */

/*!50003 DROP PROCEDURE IF EXISTS  `MostrarProducto` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`ricvpe`@`localhost` PROCEDURE `MostrarProducto`(in p1 varchar(30))
BEGIN
	select * from `producto`
	where `ID_PRODUCTO`=p1;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `mostrarUsuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `mostrarUsuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`ricvpe`@`localhost` PROCEDURE `mostrarUsuario`(IN P1 varchar(30))
BEGIN
	SELECT 
	PE.`ID_PERSONA`,
	PE.`USER`,
	PE.`NOMBRES`,
	PE.`APELLIDO_PATERNO`,
	PE.`APELLIDO_MATERNO`,
	TD.`DOCUMENTO`,
	PE.`NUMERO_DOCUMENTO`,
	PE.`DIRECCION`,
	PE.`TELEFONO`,
	PE.`EMAIL`,
	PE.`PASSWORD`,
	PE.`PERSONA_CONTACTO`,
	TP.`TXT_TIPO_PERSONA`,
	PE.`USERESTADO`
	FROM `persona` PE
	INNER JOIN `tipo_documento` TD ON PE.`ID_TIPO_DOCUMENTO`= TD.ID_TIPO_DOCUMENTO
	INNER JOIN `tipo_persona` TP ON PE.`ID_TIPO_PERSONA`=TP.`ID_TIPO_PERSONA`
	WHERE PE.`ID_PERSONA`=P1;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `updateInfoLocales` */

/*!50003 DROP PROCEDURE IF EXISTS  `updateInfoLocales` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`ricvpe`@`localhost` PROCEDURE `updateInfoLocales`(in p1 int(5), in p2 varchar(50), in p3 varchar(11),in p4 varchar(50), in p5 varchar(9), in p6 int (2),in p7 varchar(100),IN P8 VARCHAR(35))
BEGIN
UPDATE `locales`
SET 	`NOMBRE_LOCAL` 	= p2,
	`RUC` 		= p3,
	`CORREO` 	= p4,
	`TELEFONO` 	= p5,
	`IGV` 		= p6,
	`DIRECCION` 	= p7,
	`USERMOD`	= p8,
	`FECMOD`	= NOW()
WHERE 	`ID_LOCAL` 	= p1;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `updatePasswordTrabajadores` */

/*!50003 DROP PROCEDURE IF EXISTS  `updatePasswordTrabajadores` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`ricvpe`@`localhost` PROCEDURE `updatePasswordTrabajadores`(in p1 varchar(30), in p2 varchar(32), in p3 varchar(30))
BEGIN
    
    UPDATE `persona`
	SET 	`PASSWORD` 	= p2, 
		`USERMOD` 	= p3,
		`FECMOD`	=now()
	WHERE 	`ID_PERSONA`	= p1;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `updateTrabajadores` */

/*!50003 DROP PROCEDURE IF EXISTS  `updateTrabajadores` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`ricvpe`@`localhost` PROCEDURE `updateTrabajadores`(
	 IN p1 VARCHAR(30)
	,IN p2 VARCHAR(35)
	,IN p3 VARCHAR(35)
	,IN p4 VARCHAR(35)
	,IN p5 int(11)
	,IN p6 VARCHAR(35)
        ,IN p7 VARCHAR(100)
	,IN p8 VARCHAR(20)
	,IN p9 varchar(50)
	,IN p10 VARCHAR(35)
	,IN P11 INT(11)
	,IN P12 VARCHAR(35)
	,IN P13 VARCHAR(1)
    )
BEGIN
UPDATE `persona`
SET 	`NOMBRES` 		= UPPER(p2),
	`APELLIDO_PATERNO` 	= UPPER(p3),
	`APELLIDO_MATERNO`	= UPPER(p4),
	`ID_TIPO_DOCUMENTO`	= p5,
	`NUMERO_DOCUMENTO`	= UPPER(p6),
	`DIRECCION`		= UPPER(p7),
	`TELEFONO`		= UPPER(p8),
	`EMAIL`			= UPPER(p9),
	`PERSONA_CONTACTO`	= UPPER(p10),
	`ID_TIPO_PERSONA`	= p11,
	`USERMOD`		= UPPER(p12),
	`FECMOD`		= NOW(),
	`USERESTADO`		= UPPER(p13)
WHERE 	`ID_PERSONA` 		= p1;    
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
