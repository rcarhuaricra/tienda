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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `marca` */

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

insert  into `menus`(`id`,`parent`,`name`,`icon`,`slug`,`number`) values (1,NULL,'Inicio','glyphicon glyphicon-home','dashboard',1),(2,NULL,'Productos','glyphicon glyphicon-barcode','productos',2),(3,NULL,'Marcas','icofont icofont-copyright','marcas',3),(4,NULL,'Contactos','icofont icofont-brand-live-messenger','contactos',4),(5,NULL,'Facturación','icofont icofont-basket','facturacion',5),(6,NULL,'Reportes','icofont icofont-growth','reportes',6),(7,NULL,'Compras','icofont icofont-basket','compras',7),(8,NULL,'Configuración','icofont icofont-gears','configuracion',8),(9,4,'Clientes','icofont icofont-student-alt','contactos/clientes',1),(10,4,'Proveedores','icofont icofont-man-in-glasses','contactos/proveedores',2),(11,5,'Nueva Venta','icofont icofont-ui-cart','facturacion/nuevo',1),(12,5,'Administrar Facturas','fa fa-circle-o','facturacion/adminfacturas',2),(13,6,'Reporte de Ventas','icofont icofont-chart-histogram-alt','reportes/ventas',1),(14,6,'Reporte de Compras','icofont icofont-chart-histogram','reportes/compras',2),(15,6,'Reporte de Inventario','icofont icofont-chart-bar-graph','reportes/inventario',3),(16,7,'Nueva Compra','fa fa-circle-o','compras/nuevo',1),(17,7,'Historial de Compras','fa fa-circle-o','compras/historial',2);

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_PRODUCTO` varchar(60) DEFAULT NULL,
  `ID_PROVEEDOR` int(11) DEFAULT NULL,
  `ID_MARCA` int(11) DEFAULT NULL,
  `ID_CATEGORIA_PRODUCTO` int(11) DEFAULT NULL,
  `DESCRIPCION_PRODUCTO` varchar(300) DEFAULT NULL,
  `MODELO_PRODUCTO` varchar(50) DEFAULT NULL,
  `IMG_PRODUCTO` varchar(50) DEFAULT NULL,
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
  `DOC_PROVEEDOR` int(11) DEFAULT NULL,
  `NOMBRE_PROVEEDOR` varchar(100) DEFAULT NULL,
  `DIRECCION_PROVEEDOR` varchar(150) DEFAULT NULL,
  `TELEFONO_PROVEEDOR` varchar(20) DEFAULT NULL,
  `EMAIL_PROBEEDOR` varchar(50) DEFAULT NULL,
  `WEBSITE_PROVEEDOR` varchar(50) DEFAULT NULL,
  `CONTACTO_PROVEEDOR` varchar(50) DEFAULT NULL,
  `ID_TIPO_DOCUMENTO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PROVEEDOR`),
  KEY `ID_TIPO_DOCUMENTO` (`ID_TIPO_DOCUMENTO`),
  CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`ID_TIPO_DOCUMENTO`) REFERENCES `tipo_documento` (`ID_TIPO_DOCUMENTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `proveedor` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `ID_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `ROL_NOMBRE` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `roles` */

insert  into `roles`(`ID_ROL`,`ROL_NOMBRE`) values (1,'ADMINISTRADOR'),(2,'VENTAS'),(3,'ALMACEN'),(4,'CAJA');

/*Table structure for table `tipo_documento` */

DROP TABLE IF EXISTS `tipo_documento`;

CREATE TABLE `tipo_documento` (
  `ID_TIPO_DOCUMENTO` int(11) NOT NULL AUTO_INCREMENT,
  `DOCUMENTO` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_DOCUMENTO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tipo_documento` */

insert  into `tipo_documento`(`ID_TIPO_DOCUMENTO`,`DOCUMENTO`) values (1,'RUC'),(2,'DNI');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `USER` varchar(25) DEFAULT NULL,
  `NOMBRES` varchar(50) DEFAULT NULL,
  `APELLIDO_PAT` varchar(30) DEFAULT NULL,
  `APELLIDO_MAT` varchar(30) DEFAULT NULL,
  `CELULAR` varchar(9) DEFAULT NULL,
  `EMAIL` varchar(150) DEFAULT NULL,
  `DOCUMENTO_USUARIO` varchar(15) DEFAULT NULL,
  `ID_TIPO_DOCUMENTO` int(11) DEFAULT NULL,
  `ID_ROL` int(11) DEFAULT NULL,
  `PASSWORD` varchar(32) DEFAULT NULL,
  `CONFIRMAR_CORREO` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`ID_USUARIO`),
  KEY `ID_TIPO_DOCUMENTO` (`ID_TIPO_DOCUMENTO`),
  KEY `ID_ROL` (`ID_ROL`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_TIPO_DOCUMENTO`) REFERENCES `tipo_documento` (`ID_TIPO_DOCUMENTO`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`ID_ROL`) REFERENCES `roles` (`ID_ROL`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert  into `usuario`(`ID_USUARIO`,`USER`,`NOMBRES`,`APELLIDO_PAT`,`APELLIDO_MAT`,`CELULAR`,`EMAIL`,`DOCUMENTO_USUARIO`,`ID_TIPO_DOCUMENTO`,`ID_ROL`,`PASSWORD`,`CONFIRMAR_CORREO`) values (1,'MCALLA','MAYKOL HENRY','CALLA','SOLIER','123456789','M.CALLA@LA44.COM','12345678',1,1,'e10adc3949ba59abbe56e057f20f883e',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
