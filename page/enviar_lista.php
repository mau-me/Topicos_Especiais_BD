<?php
$consulta = $pdo->query("SELECT Participante_Artigo.nome from Participantes INNER JOIN Participante_Artigo Order by name DESC LIMIT 20"); 
  
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    echo "Nome do Artigo: {$linha['nome']}<br />";
}

//enviar
   
  $emailenviar = "seuemail@seudominio.com.br"; //Aqui teria o e-mail de todos
  $destino = $emailenviar;
  $assunto = "Artigos Aprovados";
 
  $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= 'From: $nome <$email>';
   
  $enviaremail = mail($destino, $assunto, $linha, $headers);
  
?>