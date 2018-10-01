<?php
    include "connect/connection.php";
    session_start();

    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    // cria a instrução SQL que vai selecionar os dados
    $query = "SELECT * FROM users WHERE email = '$email' AND senha = '$pass' LIMIT 1";
    // executa a query
	$dados = mysqli_query($link, $query) or die(mysql_error());

    $resultado = mysqli_fetch_array($dados);

    $rows = mysqli_num_rows($dados);

    if($rows < 1) {
        $_SESSION['loginERRO'] = "Usuário ou Senha Inválidos!!!";
        echo $_SESSION['loginERRO'];
        header("Location: index.html");
    }
    else {
        header("Location: principal.html");
    }

?>
