DROP DATABASE IF EXISTS `sistema_artigos`;
CREATE DATABASE `sistema_artigos`;
ALTER DATABASE `sistema_artigos` CHARSET = UTF8 COLLATE = utf8_general_ci;
USE `sistema_artigos`;

DROP TABLE IF EXISTS `Participante`;
CREATE TABLE `Participante` (
  `id` Int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(30),
  `endereco` varchar(30),
  `telefone` varchar(30),
  `email` varchar(30),
  `local_emprego` varchar(30),
  `id_cartao` int,
  `revisor` tinyint(1),
  `autor` tinyint(1),
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `Artigo`;
CREATE TABLE `Artigo` (
  `id` Int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `resumo_artigo` varchar(300),
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `Participante_Artigo`;
CREATE TABLE `Participante_Artigo` (
  `id` Int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `id_participante` int,
  `id_artigo` int,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `Revisor_Artigo`;
CREATE TABLE `Revisor_Artigo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_artigo` int,
  `id_participante` int,
  `comentario` varchar(300),
  `nota` float,
  `data_envio` date,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `Cartao`;
CREATE TABLE `Cartao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero` varchar(30),
  `data_vencimento` date,
  `marca_cartao` varchar(30),
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `Acesso`;
CREATE TABLE `Acesso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(30),
  `password` varchar(30),
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `Info_Congresso`;
CREATE TABLE `Info_Congresso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(30),
  `data_inicio` date,
  `data_fim` date,
  `limite_submissao` date,
  PRIMARY KEY (`id`)
);

ALTER TABLE `Participante`
ADD FOREIGN KEY (`id_cartao`) REFERENCES `Cartao`(`id`);

ALTER TABLE `Participante_Artigo`
ADD FOREIGN KEY (`id_participante`) REFERENCES `Participante`(`id`);

ALTER TABLE `Participante_Artigo`
ADD FOREIGN KEY (`id_artigo`) REFERENCES `Artigo`(`id`);

ALTER TABLE `Revisor_Artigo`
ADD FOREIGN KEY (`id_artigo`) REFERENCES `Artigo`(`id`);

ALTER TABLE `Revisor_Artigo`
ADD FOREIGN KEY (`id_participante`) REFERENCES `Participante`(`id`);

ALTER TABLE `Acesso`
ADD FOREIGN KEY (`id`) REFERENCES `Participante`(`id`);