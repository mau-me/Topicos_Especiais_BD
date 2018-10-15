<?php
    include "connect/connection.php";
    session_start();

    $nome = $_POST['nome'];
	$end = $_POST['endereco'];
	$tel = $_POST['telefone'];
	$local_e= $_POST['local-emprego'];
	$email = $_POST['email'];
    $pass = md5($_POST['password']);

	$stmt = $pdo->prepare("INSERT INTO Participantes VALUES ('$nome','$end','$tel','$local_e','$email','$pass')");
    $stmt->execute;
   
	echo $stmt->rowCount(); 
	if($rows < 1) {
        $_SESSION['loginERRO'] = "Usuário já cadastrado!!";
        echo $_SESSION['loginERRO'];
        header("Location: principal.html");
    }
    else {
        header("Location: principal.html");
    }
?>
