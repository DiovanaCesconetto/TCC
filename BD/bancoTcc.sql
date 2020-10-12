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

CREATE TABLE Paciente (
Id_paciente  int primary key auto_increment not null,
Cpf varchar(11),
Rg varchar(15),
Email varchar(150),
Nome varchar(100),
Data_nasc date,
Id_funcionario int,
Id_endereco int
);


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