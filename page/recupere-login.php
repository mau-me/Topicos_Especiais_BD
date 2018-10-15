<?php
    include "connect/connection.php";
    session_start();

    $email = $_POST['email'];

	$consulta = $pdo->query("SELECT password FROM users WHERE email = '$email' LIMIT 1;");
	$linha = $consulta->fetch(PDO::FETCH_ASSOC)
	echo "Nome: {$linha['nome']} - Usuário: {$linha['usuario']}<br />";
	
?>
