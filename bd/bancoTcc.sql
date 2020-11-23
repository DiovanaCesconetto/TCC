create database bancoTcc;

use bancoTcc;

CREATE TABLE Cidade (
Id_cidade int primary key auto_increment not null,
Estado varchar(100),
Nome varchar(100)
);

CREATE TABLE Bairro (
Id_bairro int primary key auto_increment not null,
Nome varchar(100),
Id_cidade int,
FOREIGN KEY(Id_cidade) REFERENCES Cidade (Id_cidade)
);

CREATE TABLE Endereço (
Id_endereco int primary key auto_increment not null,
Numero int,
Cep int,
Rua varchar(100),
Id_bairro int,
FOREIGN KEY(Id_bairro) REFERENCES Bairro (Id_bairro)
);

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
  CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`Id_funcionario`) REFERENCES `funcionario` (`Id_funcionario`),
  CONSTRAINT `paciente_ibfk_2` FOREIGN KEY (`Id_endereco`) REFERENCES `bairro` (`Id_bairro`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

CREATE TABLE Registro_caso (
Id_registro int primary key auto_increment not null,
Observacoes varchar(250),
Data date,
Id_funcionario int,
Id_paciente int,
FOREIGN KEY(Id_paciente) REFERENCES Paciente (Id_paciente)
);

CREATE TABLE Funcionario (
Id_funcionario int primary key auto_increment not null,
Nome varchar(100),
Senha varchar(100),
Email varchar(150)
);

ALTER TABLE Paciente ADD FOREIGN KEY(Id_funcionario) REFERENCES Funcionario (Id_funcionario);
ALTER TABLE Paciente ADD FOREIGN KEY(Id_endereco) REFERENCES Endereço (Id_endereco);
ALTER TABLE Registro_caso ADD FOREIGN KEY(Id_funcionario) REFERENCES Funcionario (Id_funcionario)