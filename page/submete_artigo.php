<?php
    include "connect/connection.php";
	
    session_start();
	//$nome = $_POST['nome'];
    $nome_artigo = $_POST['nome_artigo'];
	$resumo_artigo = $_POST['resumo_artigo'];
	$arquivo = $_POST['arquivo'];
	 
	$pdo = new PDO('mysql:host=localhost;dbname=SISTEMA_ARTIGOS',"root", "");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
try {   
  $pdo->beginTransaction();
  
  $stmt = $pdo->prepare("SISTEMA_ARTIGOS.Artigo ´VALUES ('$nome_artigo´'$resumo_artigo'");
  $stmt->execute;
  
  //Compl8icou, esquec8i
  $stmt = $pdo->prepare("SISTEMA_ARTIGOS.Participante_Artigo ´VALUES ('$nome_artigo´'$resumo_artigo'");
  $stmt->execute;
  
  $pdo->rollBack();
  
  $pdo->commit();

  //echo $stmt->rowCount(); 
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
	}
   ?>  