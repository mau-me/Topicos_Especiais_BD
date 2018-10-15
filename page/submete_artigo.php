<?php
    include "connect/connection.php";
	
    session_start();
	$nome = $_POST['nome'];
    $nome_artigo = $_POST['nome_artigo'];
	$area_atigo = $_POST['resumo_artigo'];
	$arquivo_artigo = $_POST['arquivo_artigo'];
	 
try {   
  $stmt = $pdo->prepare("INSERT INTO Artigos join Participante WHERE nome = '$nome' 
	VALUES ('$nome_artigo','$resumo_artigo','$arquivo_artigo')");
  $stmt->execute;
   
  echo $stmt->rowCount(); 
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
  
   ?>  