<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "tj";
$charset = "utf8";

$link = mysqli_connect($host, $user, $pass, $db) or die (mysqli_error());
mysqli_set_charset($link, $charset) or die (mysqli_error());

if (!$link) {
echo "<script> console.log(\"Error: Falha ao conectar-se com o banco de dados MySQL.\") <\script>" . PHP_EOL;
echo "<script> console.log(\"Debugging errno: \" . mysqli_connect_errno()\") <\script>" . PHP_EOL;
echo "<script> console.log(\"Debugging error: \" . mysqli_connect_error()\") <\script>" . PHP_EOL;
exit;
}
echo "<script> console.log(\"Sucesso ao conectar-se com a base de dados MySQL.\")</script>" . PHP_EOL;

?>
