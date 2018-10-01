<?php
    include "connect/connection.php";
    session_start();

    $email = $_POST['email'];

    // cria a instrução SQL que vai selecionar os dados
    $query = "SELECT password FROM users WHERE email = '$email' LIMIT 1";
    // executa a query
	$dados = mysqli_query($link, $query) or die(mysql_error());

    $resultado = mysqli_fetch_array($dados);

    $rows = mysqli_num_rows($dados);

    if($rows < 1) {
        $_SESSION['loginERRO'] = "Usuário não Encotrado \n E-mail Inválido!!!";
        echo $_SESSION['loginERRO'];
        header("Location: principal.html");
    }
    else {
        header("Location: principal.html");
    }

?>
