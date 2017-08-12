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

/*Table structure for table `categoria_producto` */

DROP TABLE IF EXISTS `categoria_producto`;

CREATE TABLE `categoria_producto` (
  `ID_CATEGORIA_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CATEGORIA_PRODUCTO` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_CATEGORIA_PRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `categoria_producto` */

/*Table structure for table `estado_item` */

DROP TABLE IF EXISTS `estado_item`;

CREATE TABLE `estado_item` (
  `ID_ESTADO_ITEM` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ESTADO` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_ESTADO_ITEM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `estado_item` */

/*Table structure for table `item_producto` */

DROP TABLE IF EXISTS `item_producto`;

CREATE TABLE `item_producto` (
  `ID_ITEM` int(15) NOT NULL AUTO_INCREMENT,
  `ID_PRODUCTO` int(11) DEFAULT NULL,
  `SERIE_ITEM` varchar(50) DEFAULT NULL,
  `ID_ESTADO_ITEM` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ITEM`),
  KEY `ID_ESTADO_ITEM` (`ID_ESTADO_ITEM`),
  KEY `ID_PRODUCTO` (`ID_PRODUCTO`),
  CONSTRAINT `item_producto_ibfk_1` FOREIGN KEY (`ID_ESTADO_ITEM`) REFERENCES `estado_item` (`ID_ESTADO_ITEM`),
  CONSTRAINT `item_producto_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `item_producto` */

/*Table structure for table `marca` */

DROP TABLE IF EXISTS `marca`;

CREATE TABLE `marca` (
  `ID_MARCA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_MARCA` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_MARCA`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `marca` */

insert  into `marca`(`ID_MARCA`,`NOMBRE_MARCA`) values (1,'demo'),(2,'demo3'),(3,'sdfsdf'),(4,'sdfsdf'),(5,'demo'),(6,'demo'),(7,'demos'),(8,'demoss'),(9,'ivan'),(10,'ronald'),(11,'ivans'),(12,'ivanss'),(13,'pepe'),(14,'pp'),(15,'demo6'),(16,'ha'),(17,'meyli'),(18,'meylis'),(19,'ronalds');

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
  `ID_PERSONA` int(11) NOT NULL AUTO_INCREMENT,
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
  `USER_REG` varchar(35) DEFAULT NULL,
  `FEC_REG` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ID_TIPO_PERSONA` int(11) DEFAULT NULL,
  `PERSONA_CONTACTO` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`ID_PERSONA`),
  KEY `ID_TIPO_PERSONA` (`ID_TIPO_PERSONA`),
  KEY `ID_TIPO_DOCUMENTO` (`ID_TIPO_DOCUMENTO`),
  CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`ID_TIPO_PERSONA`) REFERENCES `tipo_persona` (`ID_TIPO_PERSONA`),
  CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`ID_TIPO_DOCUMENTO`) REFERENCES `tipo_documento` (`ID_TIPO_DOCUMENTO`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `persona` */

insert  into `persona`(`ID_PERSONA`,`USER`,`NOMBRES`,`APELLIDO_PATERNO`,`APELLIDO_MATERNO`,`ID_TIPO_DOCUMENTO`,`NUMERO_DOCUMENTO`,`DIRECCION`,`TELEFONO`,`EMAIL`,`PASSWORD`,`USER_REG`,`FEC_REG`,`ID_TIPO_PERSONA`,`PERSONA_CONTACTO`) values (1,'MCALLA','MAYKOL HENRY','CALLA','SOLIER',1,'98765432','Av. Perú','987654321','M.CALLA@LA44.COM','e10adc3949ba59abbe56e057f20f883e','RICV','2017-08-06 10:45:26',1,NULL),(2,'ICARHUA45914658','IVAN','CARHUA','VIVAS',1,'45914658','lima','964727438','RICV_89@HOTMAIL.COM',NULL,'MCALLA','2017-08-06 23:09:00',5,NULL),(3,'MSOTO45124123','MEY','SOTO','CAPCH',1,'45124123','LIMA','987654321','MEY.D@HOT.COM',NULL,'MCALLA','2017-08-06 23:20:20',5,NULL),(4,'UUOV98765421','UDF','UOV','UV',1,'98765421','dfsgsd','u','VU@SDF.DSF',NULL,'MCALLA','2017-08-06 23:27:27',5,NULL),(5,'UYC98765454','UY','YC','JY',1,'98765454','piuygo','jh','C.DFSGD@SDF.SDF',NULL,'MCALLA','2017-08-06 23:28:39',5,NULL),(6,'LF98765465','LUYF','F','UUV',1,'98765465','dfygiu','ku','V.SDF@SFDB.IO',NULL,'MCALLA','2017-08-06 23:29:47',5,NULL),(7,'LOUTF98765432','LIUGSADFG','OUTF','UOTF',1,'98765432','lufyit','out','VOU@DF.SADF',NULL,'MCALLA','2017-08-06 23:30:26',5,NULL),(8,'R10459146585','RICV','','',2,'10459146585','LIMA','964727438','RICV@SFDG.COM',NULL,'MCALLA','2017-08-06 23:40:16',4,'IVAN'),(9,'45914657','','','',1,'45914657','','','',NULL,'MCALLA','2017-08-10 23:47:36',5,NULL);

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO_BARRAS` varchar(15) DEFAULT NULL,
  `NOMBRE_PRODUCTO` varchar(60) DEFAULT NULL,
  `ID_PROVEEDOR` int(11) DEFAULT NULL,
  `ID_MARCA` int(11) DEFAULT NULL,
  `ID_CATEGORIA_PRODUCTO` int(11) DEFAULT NULL,
  `DESCRIPCION_PRODUCTO` varchar(300) DEFAULT NULL,
  `MODELO_PRODUCTO` varchar(50) DEFAULT NULL,
  `IMG_PRODUCTO` varchar(50) DEFAULT NULL,
  `IMAGE1` varchar(40) DEFAULT NULL,
  `IMAGE2` varchar(40) DEFAULT NULL,
  `IMAGE3` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ID_PRODUCTO`),
  KEY `MARCA_ID` (`ID_MARCA`),
  KEY `CATEGORIA_ID` (`ID_CATEGORIA_PRODUCTO`),
  KEY `PROVEEDOR_ID` (`ID_PROVEEDOR`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`ID_MARCA`) REFERENCES `marca` (`ID_MARCA`),
  CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`ID_CATEGORIA_PRODUCTO`) REFERENCES `categoria_producto` (`ID_CATEGORIA_PRODUCTO`),
  CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`ID_PROVEEDOR`) REFERENCES `proveedor` (`ID_PROVEEDOR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `producto` */

/*Table structure for table `proveedor` */

DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor` (
  `ID_PROVEEDOR` int(11) NOT NULL AUTO_INCREMENT,
  `RUC_PROVEEDOR` int(11) DEFAULT NULL,
  `NOMBRE_PROVEEDOR` varchar(100) DEFAULT NULL,
  `DIRECCION_PROVEEDOR` varchar(150) DEFAULT NULL,
  `TELEFONO_PROVEEDOR` varchar(20) DEFAULT NULL,
  `EMAIL_PROBEEDOR` varchar(50) DEFAULT NULL,
  `WEBSITE_PROVEEDOR` varchar(50) DEFAULT NULL,
  `CONTACTO_PROVEEDOR` varchar(50) DEFAULT NULL,
  `ID_USUARIO_REG` int(11) DEFAULT NULL,
  `FECHA_REG` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FECHA_ACTUALIZA` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_PROVEEDOR`),
  KEY `ID_TIPO_DOCUMENTO` (`ID_USUARIO_REG`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `proveedor` */

insert  into `proveedor`(`ID_PROVEEDOR`,`RUC_PROVEEDOR`,`NOMBRE_PROVEEDOR`,`DIRECCION_PROVEEDOR`,`TELEFONO_PROVEEDOR`,`EMAIL_PROBEEDOR`,`WEBSITE_PROVEEDOR`,`CONTACTO_PROVEEDOR`,`ID_USUARIO_REG`,`FECHA_REG`,`FECHA_ACTUALIZA`) values (1,1045914658,'RICV','EL AGUSTINO','987654321','RICV@RICV.PE.','RICV.PE','IVAN',1,'2017-08-06 02:49:54','2017-08-06 03:09:22');

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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
