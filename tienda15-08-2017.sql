/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.13-MariaDB : Database - tienda
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tienda` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `tienda`;

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

insert  into `categoria_producto`(`ID_CATEGORIA_PRODUCTO`,`NOMBRE_CATEGORIA_PRODUCTO`,`USERREG`,`FECREG`,`USERMOD`,`FECMOD`) values ('ED24A0C9-214D-47CC-8262-94E5CF','RELAY',NULL,NULL,NULL,NULL),('F5F2684B-BAB7-42B4-9120-A4BF55','FRENOS',NULL,NULL,NULL,NULL);

/*Table structure for table `images` */

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `ID_IMAGES` varchar(30) NOT NULL,
  `ID_PRODUCTO` varchar(30) DEFAULT NULL,
  `NOMBRE_IMAGE` varchar(50) DEFAULT NULL,
  `USERREG` varchar(35) DEFAULT NULL,
  `FECREG` datetime DEFAULT NULL,
  `USERMOD` varchar(35) DEFAULT NULL,
  `FECMOD` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_IMAGES`),
  KEY `ID_PRODUCTO` (`ID_PRODUCTO`),
  CONSTRAINT `images_ibfk_1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `images` */

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

insert  into `marca`(`ID_MARCA`,`NOMBRE_MARCA`,`USERREG`,`FECREG`,`USERMOD`,`FECMOD`) values ('21C2AA6E-D759-40A9-9370-ACCB3E','KYSS',NULL,NULL,NULL,NULL),('3206258A-0C22-433F-9094-C0758B','KIA',NULL,NULL,NULL,NULL),('A734BFF2-E801-436E-801D-06AE60','TRODAT',NULL,NULL,NULL,NULL),('BFC3F193-44E4-4030-B31A-AEB6E1','TOYOTA',NULL,NULL,NULL,NULL);

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
  `DIRECCION` varchar(100) DEFAULT NULL,
  `TELEFONO` varchar(9) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(32) DEFAULT NULL,
  `PERSONA_CONTACTO` varchar(35) DEFAULT NULL,
  `ID_TIPO_PERSONA` int(11) DEFAULT NULL,
  `USERREG` varchar(35) DEFAULT NULL,
  `FECREG` timestamp NULL DEFAULT NULL,
  `USERMOD` varchar(35) DEFAULT NULL,
  `FECMOD` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_PERSONA`),
  KEY `ID_TIPO_DOCUMENTO` (`ID_TIPO_DOCUMENTO`),
  KEY `ID_TIPO_PERSONA` (`ID_TIPO_PERSONA`),
  CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`ID_TIPO_DOCUMENTO`) REFERENCES `tipo_documento` (`ID_TIPO_DOCUMENTO`),
  CONSTRAINT `persona_ibfk_3` FOREIGN KEY (`ID_TIPO_PERSONA`) REFERENCES `tipo_persona` (`ID_TIPO_PERSONA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `persona` */

insert  into `persona`(`ID_PERSONA`,`USER`,`NOMBRES`,`APELLIDO_PATERNO`,`APELLIDO_MATERNO`,`ID_TIPO_DOCUMENTO`,`NUMERO_DOCUMENTO`,`DIRECCION`,`TELEFONO`,`EMAIL`,`PASSWORD`,`PERSONA_CONTACTO`,`ID_TIPO_PERSONA`,`USERREG`,`FECREG`,`USERMOD`,`FECMOD`) values ('0000000000000000000000001-2017','MCALLA','MAYKOL HENRY','CALLA','SOLIER',1,'98765432','Av. Perú','987654321','M.CALLA@LA44.COM','e10adc3949ba59abbe56e057f20f883e',NULL,1,'RICV','2017-08-06 10:45:26',NULL,NULL),('0000000000000000000000002-2017',NULL,'JUAN','VIVAS','MOLINA',1,'12345678','LIMA','987654321','MOLINAA@SD.COM','','',5,'MCALLA','2017-08-14 23:24:56',NULL,NULL),('0000000000000000000000003-2017',NULL,'JUAN','VIVAS','MOLINA',1,'12345678','LIMA','987654321','MOLINAA@SD.COM','','',5,'MCALLA','2017-08-14 23:24:57',NULL,NULL),('0000000000000000000000004-2017',NULL,'JUAN','VIVAS','MOLINA',1,'12345678','LIMA','987654321','MOLINAA@SD.COM','','',5,'MCALLA','2017-08-14 23:24:57',NULL,NULL),('0000000000000000000000005-2017',NULL,'JUAN','VIVAS','MOLINA',1,'12345678','LIMA','987654321','MOLINAA@SD.COM','','',5,'MCALLA','2017-08-14 23:24:57',NULL,NULL),('0000000000000000000000006-2017',NULL,'JUAN','VIVAS','MOLINA',1,'12345678','LIMA','987654321','MOLINAA@SD.COM','','',5,'MCALLA','2017-08-14 23:24:57',NULL,NULL),('0000000000000000000000007-2017',NULL,'JUAN','VIVAS','MOLINA',1,'12345678','LIMA','987654321','MOLINAA@SD.COM','','',5,'MCALLA','2017-08-14 23:24:58',NULL,NULL),('0000000000000000000000008-2017',NULL,'JUAN','VIVAS','MOLINA',1,'12345678','LIMA','987654321','MOLINAA@SD.COM','','',5,'MCALLA','2017-08-14 23:24:58',NULL,NULL),('0000000000000000000000009-2017',NULL,'JUAN','VIVAS','MOLINA',1,'12345678','LIMA','987654321','MOLINAA@SD.COM','','',5,'MCALLA','2017-08-14 23:24:58',NULL,NULL),('0000000000000000000000010-2017',NULL,'JUAN','VIVAS','MOLINA',1,'12345678','LIMA','987654321','MOLINAA@SD.COM','','',5,'MCALLA','2017-08-14 23:24:58',NULL,NULL),('0000000000000000000000011-2017',NULL,'JUAN','VIVAS','MOLINA',1,'12345678','LIMA','987654321','MOLINAA@SD.COM','','',5,'MCALLA','2017-08-14 23:24:58',NULL,NULL),('0000000000000000000000012-2017',NULL,'JUAN','VIVAS','MOLINA',1,'12345678','LIMA','987654321','MOLINAA@SD.COM','','',5,'MCALLA','2017-08-14 23:24:59',NULL,NULL),('0000000000000000000000013-2017',NULL,'JUAN','VIVAS','MOLINA',1,'12345678','LIMA','987654321','MOLINAA@SD.COM','','',5,'MCALLA','2017-08-14 23:24:59',NULL,NULL),('0000000000000000000000014-2017',NULL,'JUAN','VIVAS','MOLINA',1,'12345678','LIMA','987654321','MOLINAA@SD.COM','','',5,'MCALLA','2017-08-14 23:24:59',NULL,NULL),('0000000000000000000000015-2017',NULL,'JUAN','VIVAS','MOLINA',1,'12345678','LIMA','987654321','MOLINAA@SD.COM','','',5,'MCALLA','2017-08-14 23:24:59',NULL,NULL),('0000000000000000000000016-2017',NULL,'JUAN','VIVAS','MOLINA',1,'12345678','LIMA','987654321','MOLINAA@SD.COM','','',5,'MCALLA','2017-08-14 23:25:54',NULL,NULL),('0000000000000000000000017-2017','','JUAN','VIVAS','MOLINA',1,'12345678','LIMA','987654321','MOLINAA@SD.COM','','',5,'MCALLA','2017-08-14 23:26:12',NULL,NULL),('0000000000000000000000018-2017','','IVAN','CARHUA','VIVAS',1,'45914658','uyfasd','964727438','RICV@SD.COM','','',5,'MCALLA','2017-08-14 23:33:27',NULL,NULL),('0000000000000000000000019-2017','','RICV','','',2,'10459146585','asdads','964723476','RICV@ASDF.ZXCOM','','',4,'MCALLA','2017-08-14 23:36:18',NULL,NULL),('0000000000000000000000020-2017','','RICV','ASD','ASDF',2,'10459146585','LIMA','987654321','ASDFASDF@SDAF.ZXCOM','','ASDF',4,'MCALLA','2017-08-14 23:38:49',NULL,NULL);

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

insert  into `producto`(`ID_PRODUCTO`,`CODIGO_BARRAS`,`NOMBRE_PRODUCTO`,`ID_MARCA`,`ID_CATEGORIA_PRODUCTO`,`DESCRIPCION_PRODUCTO`,`IMG_PRODUCTO`,`USERREG`,`FECREG`,`USERMOD`,`FECMOD`) values ('0000000000000000000000001-2017','3216549873215','lo que sea pero hay esta','3206258A-0C22-433F-9094-C0758B','ED24A0C9-214D-47CC-8262-94E5CF','una vaina que no sirve para nada pero ahi esta','foto','MCALLA','2017-08-15 00:28:34',NULL,NULL),('0000000000000000000000002-2017','3216549873215','lo que sea pero hay esta','3206258A-0C22-433F-9094-C0758B','ED24A0C9-214D-47CC-8262-94E5CF','una vaina que no sirve para nada pero ahi esta','foto','MCALLA','2017-08-15 00:28:36',NULL,NULL),('0000000000000000000000003-2017','3216549873215','lo que sea pero hay esta','3206258A-0C22-433F-9094-C0758B','ED24A0C9-214D-47CC-8262-94E5CF','una vaina que no sirve para nada pero ahi esta','foto','MCALLA','2017-08-15 00:28:37',NULL,NULL),('0000000000000000000000004-2017','3216549873215','lo que sea pero hay esta','3206258A-0C22-433F-9094-C0758B','ED24A0C9-214D-47CC-8262-94E5CF','una vaina que no sirve para nada pero ahi esta','foto','MCALLA','2017-08-15 00:28:37',NULL,NULL),('0000000000000000000000005-2017','3216549873215','lo que sea pero hay esta','3206258A-0C22-433F-9094-C0758B','ED24A0C9-214D-47CC-8262-94E5CF','una vaina que no sirve para nada pero ahi esta','foto','MCALLA','2017-08-15 00:28:37',NULL,NULL),('0000000000000000000000006-2017','3216549873215','lo que sea pero hay esta','3206258A-0C22-433F-9094-C0758B','ED24A0C9-214D-47CC-8262-94E5CF','una vaina que no sirve para nada pero ahi esta','foto','MCALLA','2017-08-15 00:28:37',NULL,NULL),('0000000000000000000000007-2017','3216549873215','lo que sea pero hay esta','3206258A-0C22-433F-9094-C0758B','ED24A0C9-214D-47CC-8262-94E5CF','una vaina que no sirve para nada pero ahi esta','foto','MCALLA','2017-08-15 00:28:37',NULL,NULL);

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
  PRIMARY KEY (`ID_TIPO_PERSONA`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tipo_persona` */

insert  into `tipo_persona`(`ID_TIPO_PERSONA`,`TXT_TIPO_PERSONA`) values (1,'ADMINISTRADOR'),(2,'VENDEDOR'),(3,'ALMACEN'),(4,'PROVEEDOR'),(5,'CLIENTE');

/* Procedure structure for procedure `insertPersona` */

/*!50003 DROP PROCEDURE IF EXISTS  `insertPersona` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insertPersona`(IN p1 VARCHAR (35),IN p2 VARCHAR (35),IN p3 VARCHAR (35),IN p4 VARCHAR (35), in p5 int, in p6 varchar(11)
				, in p7 varchar (100), in p8 varchar(9), in p9 varchar (50), in p10 varchar(32), in p11 varchar(35), IN p12 INT
				, in p13 varchar (35) )
BEGIN
	
	 
	
	INSERT INTO `persona` 
	(`ID_PERSONA`,`USER`,`NOMBRES`,`APELLIDO_PATERNO`,`APELLIDO_MATERNO`,`ID_TIPO_DOCUMENTO`,`NUMERO_DOCUMENTO`,`DIRECCION`,`TELEFONO`,`EMAIL`,`PASSWORD`,`PERSONA_CONTACTO`,`ID_TIPO_PERSONA`,`USERREG`,`FECREG`)
	VALUES 
	((SELECT CONCAT(IFNULL(LPAD(MAX(SUBSTRING(PE.ID_PERSONA,1,25))+1,25,'0'),LPAD('1',25,'0')), '-' , DATE_FORMAT(NOW(),"%Y")) FROM persona PE
	WHERE 	SUBSTRING(PE.ID_PERSONA,27,5) 	= DATE_FORMAT(NOW(),"%Y")        
	AND 	DATE_FORMAT(PE.FECREG,"%Y") 	= DATE_FORMAT(NOW(),"%Y")), p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, p11, p12, p13,NOW());
END */$$
DELIMITER ;

/* Procedure structure for procedure `insertProducto` */

/*!50003 DROP PROCEDURE IF EXISTS  `insertProducto` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insertProducto`(IN p1 VARCHAR (13),IN p2 VARCHAR (60),IN p3 VARCHAR (30),IN p4 VARCHAR (30), IN p5 varchar(300), IN p6 VARCHAR(100), IN p7 VARCHAR (35))
BEGIN
	
	INSERT INTO `producto`
	(`ID_PRODUCTO`,`CODIGO_BARRAS`,`NOMBRE_PRODUCTO`,`ID_MARCA`,`ID_CATEGORIA_PRODUCTO`,`DESCRIPCION_PRODUCTO`,`IMG_PRODUCTO`,`USERREG`,`FECREG`)
	VALUE (
	(SELECT CONCAT(IFNULL(LPAD(MAX(SUBSTRING(PRO.`ID_PRODUCTO`,1,25))+1,25,'0'),LPAD('1',25,'0')), '-' , DATE_FORMAT(NOW(),"%Y")) FROM producto PRO
	WHERE 	SUBSTRING(PRO.`ID_PRODUCTO`,27,5) 	= DATE_FORMAT(NOW(),"%Y")        
	AND 	DATE_FORMAT(PRO.FECREG,"%Y") 	= DATE_FORMAT(NOW(),"%Y")), P1, P2, P3, P4, P5, P6, P7, now());
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
