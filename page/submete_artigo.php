<?php
    include "connect/connection.php";
    session_start();
	$nome = $_POST['nome'];
    $nome_artigo = $_POST['nome_artigo'];
	$area_atigo = $_POST['area_artigo'];
	$arquivo_artigo = $_POST['arquivo_artigo'];
	
    // cria a instrução SQL que vai selecionar os dados
    $query = "INSERT INTO Artigos join Participante WHERE nome = '$nome' 
	VALUES ('$nome_artigo','$area_artigo','$arquivo_artigo')";
    // executa a query
	$dados = mysqli_query($link, $query) or die(mysql_error());

    $resultado = mysqli_fetch_array($dados);

    $rows = mysqli_num_rows($dados);

    header("Location: index.php");

?>
