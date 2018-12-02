<?php
    include "connect/connection.php";
    session_start();

    $nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$local_emprego= $_POST['local_emprego'];
	//$pass = md5($_POST['password']);
	
	$pdo = new PDO('mysql:host=localhost;dbname=SISTEMA_ARTIGOS', "root", "");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$stmt = $pdo->prepare("INSERT INTO SISTEMA_ARTIGOS.Participante (nome, endereco, telefone, email, local_emprego, revisor, autor) 
	VALUES ('$nome','$endereco','$telefone','$email','$local_emprego',0,1)");//,'$pass')";
    $stmt->execute();
   
	echo $stmt->rowCount(); 
	if($rows < 1) {
        $_SESSION['loginERRO'] = "Usuário já cadastrado!!";
        echo $_SESSION['loginERRO'];
        header("Location: submeter_artigo.html");
    }
    else {
        header("Location: cria_conta.html");
    }
?>
