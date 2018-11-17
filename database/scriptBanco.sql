DROP DATABASE IF EXISTS `SISTEMA_ARTIGOS`;
CREATE DATABASE `SISTEMA_ARTIGOS`;
ALTER DATABASE `SISTEMA_ARTIGOS` CHARSET = UTF8 COLLATE = utf8_general_ci;
USE `SISTEMA_ARTIGOS`;

DROP TABLE IF EXISTS SISTEMA_ARTIGOS.Participante;
CREATE TABLE SISTEMA_ARTIGOS.Participante (
  `id_participante` Int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60),
  `endereco` varchar(60),
  `telefone` varchar(60),
  `email` varchar(60),
  `local_emprego` varchar(60),
  `revisor` tinyint(1),
  `autor` tinyint(1),
  PRIMARY KEY (`id_participante`)
);

DROP TABLE IF EXISTS SISTEMA_ARTIGOS.Artigo;
CREATE TABLE SISTEMA_ARTIGOS.Artigo (
  `id_artigo` Int(5) NOT NULL AUTO_INCREMENT,
  `resumo_artigo` varchar(1000),
  PRIMARY KEY (`id_artigo`)
);

DROP TABLE IF EXISTS SISTEMA_ARTIGOS.Participante_Artigo;
CREATE TABLE SISTEMA_ARTIGOS.Participante_Artigo (
  `id_participante_artigo` Int(5) NOT NULL AUTO_INCREMENT,
  `id_participante` int,
  `id_artigo` int,
  PRIMARY KEY (`id_participante_artigo`)
);

DROP TABLE IF EXISTS SISTEMA_ARTIGOS.Revisor_Artigo;
CREATE TABLE SISTEMA_ARTIGOS.Revisor_Artigo (
  `id_revisor_artigo` Int(5) NOT NULL AUTO_INCREMENT,
  `id_artigo` int,
  `id_participante` int,
  `comentario` varchar(600),
  `nota` float,
  `data_envio` date,
  PRIMARY KEY (`id_revisor_artigo`)
);

DROP TABLE IF EXISTS SISTEMA_ARTIGOS.Cartao;
CREATE TABLE `Cartao` (
  `id_cartao_participante` Int(5) NOT NULL AUTO_INCREMENT,
  `numero` varchar(60),
  `data_vencimento` date,
  `marca_cartao` varchar(60),
  PRIMARY KEY (`id_cartao_participante`)
);

DROP TABLE IF EXISTS SISTEMA_ARTIGOS.Acesso;
CREATE TABLE SISTEMA_ARTIGOS.Acesso (
  `id_acesso_participante` Int(5) NOT NULL AUTO_INCREMENT,
  `user` varchar(60),
  `password` varchar(60),
  PRIMARY KEY (`id_acesso_participante`)
);

DROP TABLE IF EXISTS SISTEMA_ARTIGOS.Info_Congresso;
CREATE TABLE SISTEMA_ARTIGOS.Info_Congresso (
  `id_info_congresso` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(60),
  `data_inicio` date,
  `data_fim` date,
  `limite_submissao` date,
  PRIMARY KEY (`id_info_congresso`)
);

ALTER TABLE SISTEMA_ARTIGOS.Cartao
ADD FOREIGN KEY (`id_cartao_participante`) REFERENCES `Participante`(`id_participante`);

ALTER TABLE SISTEMA_ARTIGOS.Acesso
ADD FOREIGN KEY (`id_acesso_participante`) REFERENCES `Participante`(`id_participante`);

ALTER TABLE SISTEMA_ARTIGOS.Participante_Artigo
ADD FOREIGN KEY (`id_participante`) REFERENCES `Participante`(`id_participante`);

ALTER TABLE SISTEMA_ARTIGOS.Participante_Artigo
ADD FOREIGN KEY (`id_artigo`) REFERENCES `Artigo`(`id_artigo`);

ALTER TABLE SISTEMA_ARTIGOS.Revisor_Artigo
ADD FOREIGN KEY (`id_artigo`) REFERENCES `Artigo`(`id_artigo`);

ALTER TABLE SISTEMA_ARTIGOS.Revisor_Artigo
ADD FOREIGN KEY (`id_participante`) REFERENCES `Participante`(`id_participante`);