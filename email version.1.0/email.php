<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
</head>
<body>

<script type="text/javascript">
window.location.href = 'index.php';
</script>
</body>
</html>
<?php
include "connect.php";
//informações para cadastro no banco
$para = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];
$valida = md5($para);

//cadastramento das informações no banco
mysqli_query($link,"insert into tb_cadastro(email,assunto,mensagem) 
	VALUES('$para','$assunto','$mensagem')");


//echo para mostrar a variavel valida md5
//echo $valida;
//fica no lugar do assunto
//$assunto = "envio de email";
$assunto =  $_POST['assunto'];
$mensagem = $_POST['mensagem'];
$headers = 'MIME-Version: 1.0'. "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' ."\r\n";
$headers .= 'para: Lucas Matos<lucasmatoss2000@gmail.com>' ."\r\n";
$headers .= 'From: <suportFatech@informatica.com.br>' ."\r\n";
$headers .= 'Replay-To: <suportFatech@informatica.com.br>' ."\r\n";
mail($para,$assunto,$mensagem,$headers);
?>