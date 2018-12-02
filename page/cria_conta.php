<?php
    include "connect/connection.php";
    session_start();
	
    $nome = $_POST['nome'];
	$end = $_POST['endereco'];
	$tel = $_POST['telefone'];
	$local_emprego= $_POST['local-emprego'];
	$email = $_POST['email'];
    //$pass = md5($_POST['password']);

    // cria a instrução SQL que vai selecionar os dados
    $query = "INSERT INTO SISTEMA_ARTIGOS.Participante VALUES ('$nome','$end','$tel','$local_emprego','$email'");//,'$pass')";
    // executa a query
	$dados = mysqli_query($link, $query) or die(mysql_error());

    $resultado = mysqli_fetch_array($dados);

    $rows = mysqli_num_rows($dados);

    if($rows < 1) {
        $_SESSION['loginERRO'] = "Usuário já cadastrado!!";
        echo $_SESSION['loginERRO'];
        header("Location: principal.html");
    }
    else {
        header("Location: principal.html");
    }

?>
