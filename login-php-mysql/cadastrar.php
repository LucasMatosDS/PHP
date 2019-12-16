<?php

	require 'class/usuarios.php';
	$u = new Usuario;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login-php</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>

<div class="container rounded">
	<form method="post">
		<div class="form-group col-md-4">
		<h3 align="center">Cadastrar</h3>
	<input type="text" name="nome" placeholder="nome completo" class="form-control" maxlength="30">
	<input type="text" name="telefone" placeholder="telefone" class="form-control" maxlength="30">
	<input type="email" name="email" placeholder="email" class="form-control" maxlength="40">
	<input type="password" name="senha" placeholder="senha" class="form-control" maxlength="30">
	<input type="password" name="Csenha" placeholder="confirmar senha" class="form-control">
	<input type="submit" name="" value="Cadastrar" class="btn" name="cadastrar">

 <?php

	//verificar se ciclou no botão.

 if(isset($_POST['nome'])){

 		$nome = addslashes($_POST['nome']);
 		$telefone = addslashes($_POST['telefone']);
 		$email = addslashes($_POST['email']);
 		$senha = addslashes($_POST['senha']);
 		$confirmarSenha = addslashes($_POST['Csenha']);

 		if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)){

 			$u->conectar("login", "localhost", "root", ""); 			

 				if($senha == $confirmarSenha){

 					if($u->cadastrar($nome,$telefone,$email,$senha)){
?>

<div class="alert alert-success" role="alert">
	Cadastrado com sucesso!
	<a href="index.php">Voltar a Tela de Login</a>
</div>
<?php

 					}else{
?>
 	<div class="alert alert-danger" role="alert">
 	E-mail já cadastrado!
 </div>

 						<?php

 					}

 				}else{
 					?>
 	<div class="alert alert-danger" role="alert">Senha e confirmar senha não são compativeis</div>

		<?php
 				}

 		}else{

 	 }

		}else{

 	}
?>
 </div>
</form>
</div>
</body>
</html>
