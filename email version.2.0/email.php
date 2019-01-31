<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
</head>
<body>

<script type="text/javascript">
//abre outra guia e redireciona para o index.php
window.location.href = 'index.php';
//abre outra guia com delay
//setTimeout(location.href = "index.php?pag=age_ver",3000);
</script>
</body>
</html>
<?php
if (isset($_POST['email']) && !empty($_POST['email'])){

	include "connect.php";
//informações para cadastro no banco
$para = $_POST['email'];
$email = addslashes($_POST['emailusu']);
$nome = addslashes($_POST['nome']);
$telefone = addslashes($_POST['telefone']);
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];
$valida = md5($para);

//cadastramento das informações no banco
mysqli_query($link,"insert into tb_cadastro(email,assunto,mensagem,emailuser,nome,telefone) 
	VALUES('$para','$assunto','$mensagem','$email','$nome','$telefone')");


//echo para mostrar a variavel valida md5
//echo $valida;
//fica no lugar do assunto
//$assunto = "envio de email";
$assunto =  $_POST['assunto'];
$mensagem = $_POST['mensagem'];
$headers = 'MIME-Version: 1.0'. "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' ."\r\n";
$headers .= 'para: Lucas Matos<lucasmatoss2000@gmail.com>' ."\r\n";
$body = "<br>Nome:</br> ".$nome. "\r\n".
        "<br>Email:</br> ".$email."\r\n".
        "<br>telefone:</br> ".$telefone."\r\n".
        "<br>Mensagem:</br> ".$mensagem;
$headers .= 'From: <suportFatech@informatica.com.br>' ."\r\n";
$headers .= 'Replay-To:'.$email."\r\n";
mail($para,$assunto,$body,$headers);
}

?>