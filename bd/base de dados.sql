/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.4.13-MariaDB : Database - bancotcc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bancotcc` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bancotcc`;

/*Table structure for table `bairro` */

DROP TABLE IF EXISTS `bairro`;

CREATE TABLE `bairro` (
  `Id_bairro` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) DEFAULT NULL,
  `Id_cidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_bairro`),
  KEY `Id_cidade` (`Id_cidade`),
  CONSTRAINT `bairro_ibfk_1` FOREIGN KEY (`Id_cidade`) REFERENCES `cidade` (`Id_cidade`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Table structure for table `cidade` */

DROP TABLE IF EXISTS `cidade`;

CREATE TABLE `cidade` (
  `Id_cidade` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(100) DEFAULT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id_cidade`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Table structure for table `endereco` */

DROP TABLE IF EXISTS `endereco`;

CREATE TABLE `endereco` (
  `Id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `Numero` int(11) DEFAULT NULL,
  `Cep` varchar(11) DEFAULT NULL,
  `Rua` varchar(100) DEFAULT NULL,
  `Id_bairro` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_endereco`),
  KEY `Id_bairro` (`Id_bairro`),
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`Id_bairro`) REFERENCES `bairro` (`Id_bairro`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `funcionario` */

DROP TABLE IF EXISTS `funcionario`;

CREATE TABLE `funcionario` (
  `Id_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) DEFAULT NULL,
  `Senha` varchar(100) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `usuario_admin` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`Id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Table structure for table `paciente` */

DROP TABLE IF EXISTS `paciente`;

CREATE TABLE `paciente` (
  `Id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `Cpf` varchar(11) DEFAULT NULL,
  `Rg` varchar(15) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `Data_nasc` date DEFAULT NULL,
  `Id_funcionario` int(11) DEFAULT NULL,
  `Id_endereco` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_paciente`),
  KEY `Id_funcionario` (`Id_funcionario`),
  KEY `paciente_ibfk_2` (`Id_endereco`),
  CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`Id_funcionario`) REFERENCES `funcionario` (`Id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Table structure for table `registro_caso` */

DROP TABLE IF EXISTS `registro_caso`;

CREATE TABLE `registro_caso` (
  `Id_registro` int(11) NOT NULL AUTO_INCREMENT,
  `Observacoes` varchar(250) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Id_funcionario` int(11) DEFAULT NULL,
  `Id_paciente` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_registro`),
  KEY `Id_paciente` (`Id_paciente`),
  KEY `Id_funcionario` (`Id_funcionario`),
  CONSTRAINT `registro_caso_ibfk_1` FOREIGN KEY (`Id_paciente`) REFERENCES `paciente` (`Id_paciente`),
  CONSTRAINT `registro_caso_ibfk_2` FOREIGN KEY (`Id_funcionario`) REFERENCES `funcionario` (`Id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO funcionario ( nome, senha, email, usuario_admin ) VALUES('admin','202cb962ac59075b964b07152d234b70', 'admin@admin.com.br','1');

