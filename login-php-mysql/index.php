<?php
	require_once 'class/usuarios.php';
	$u = new usuario;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login-php</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	<form method="post">
		<div class="form-group col-md-4">
		<h3 align="center">Login</h3>
	<input type="email" name="email" placeholder="usuario" class="form-control">
	<input type="password" name="senha" placeholder="senha" class="form-control">
	<input type="submit" value="Acessar" class="btn border border-primary">
<a href="cadastrar.php" class="btn">Ainda não é inscrito?<strong>Cadastre-se</strong></a>
<?php
 if(isset($_POST['email'])){

 		$email = addslashes($_POST['email']);
 		$senha = addslashes($_POST['senha']);

 		if(!empty($email) && !empty($senha)){

 			$u->conectar("login", "localhost", "root", "");

				if($u->logar($email,$senha)){

 				header("location: AreaPrivada.php");

			}else{

				?>

				<div class="alert alert-danger" role="alert">
					E-mail e/ou senha estão incorretos!
				</div>

<?php
			}

		}else{

?>
			<div class="alert alert-danger" role="alert">
					Preencha todos os campos!
			</div>
<?php

	}
 }

?>

	 </div>
	</form>
</div>
</body>
</html>
