<!DOCTYPE html>
<html>
<head>
	<title>PHP-COM-PDO</title>
</head>
<body>
<a href="config.php">voltar</a>
<a href="insert.php">cadastrar</a>
<a href="delete.php">deletar</a>
<a href="update.php">atualizar</a>
</body>
</html>

<?php
require './config.php';

$c = new Config;

$c->conectar('livraria', 'localhost', 'root', '');
$c->validar();