select Participante.id_participante, Participante.nome, Acesso.user, Acesso.password from Participante
inner join Acesso 
on Participante.id_participante = Acesso.id_acesso_participante
LIMIT 1000;

select Participante.id_participante, Participante.nome, Cartao.numero, Cartao.marca_cartao from Participante
inner join Cartao 
on Participante.id_participante = Cartao.id_cartao_participante;

select Participante.id_participante AS ID, Participante.nome AS Nome, Cartao.numero AS Cartão, Acesso.user AS Usuário
FROM Participante 
INNER JOIN Cartao on Participante.id_participante = Cartao.id_cartao_participante
INNER JOIN Acesso on Participante.id_participante = Acesso.id_acesso_participante;

SELECT id_participante FROM Participante where revisor = 1 
INTO OUTFILE '/var/lib/mysql-files/ParticipanteRevisor.csv' 
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' LINES TERMINATED BY '\n';

SELECT id_participante FROM Participante where autor = 1 
INTO OUTFILE '/var/lib/mysql-files/ParticipanteAutor.csv' 
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' LINES TERMINATED BY '\n';

SELECT id_artigo FROM Artigo 
INTO OUTFILE '/var/lib/mysql-files/Artigos.csv' 
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' LINES TERMINATED BY '\n';

SELECT COUNT(*) from Participante;
SELECT COUNT(*) from Acesso;
SELECT COUNT(*) from Cartao;
SELECT COUNT(*) from Artigo;
SELECT COUNT(*) from Participante_Artigo;
SELECT COUNT(*) from Revisor_Artigo;

SELECT * FROM Participante WHERE nome = "Lovell Tesyro";

SELECT Artigo.id_artigo FROM Artigo;

DELETE FROM Participante WHERE id_participante > 18000;
DELETE FROM Artigo WHERE id_artigo > 2000;
DELETE FROM Participante_Artigo WHERE id_participante_artigo < 6000;
DELETE FROM Revisor_Artigo WHERE id_revisor_artigo < 6000;

ALTER TABLE Participante_Artigo AUTO_INCREMENT = 1;
ALTER TABLE Revisor_Artigo AUTO_INCREMENT = 1;

SELECT * FROM Acesso INTO OUTFILE '/tmp/acesso.csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' LINES TERMINATED BY '\n';