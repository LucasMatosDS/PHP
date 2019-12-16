<?php

	session_start();

	if(!isset($_SESSION['id_usuario'])){

		header("location: index.php");
		exit;
	}
?>

<h3>sejá bem-vindo há Area Privada!</h3>
<a href="sair.php">Sair</a>
