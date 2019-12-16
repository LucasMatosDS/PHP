<?php

 Class Usuario{

 	private $pdo;
 	public function conectar($n, $h, $u, $s){

 		global $pdo;

 		try{

 		$pdo = new PDO("mysql:dbname=".$n.";host=".$h,$u,$s);

 	 }catch(PDOException $e){
 	     echo "ERRO: erro ao conectar a Base de Dados!";
 	 }
 	}

 	public function cadastrar($nome, $telefone, $email, $senha){

 		global $pdo;

 		//verificar se existe o email cadastrado no banco de dados.

 		$sql = $pdo->prepare("select id_usuario from usuarios where email = :e");

 		$sql->bindValue(":e",$email);
 		$sql->execute();

 		//verifica se há cadastro no banco de dados.
 		if($sql->rowCount() > 0){

 			return false;//já está cadastrado

 		}else{

 			//efetuando cadastro.
 			$sql = $pdo->prepare("insert into usuarios(id_usuario,nome,telefone,email,senha) values(null,:n,:t, :e, :s)");

 			$sql->bindValue(":n",$nome);
 			$sql->bindValue(":t",$telefone);
 			$sql->bindValue(":e",$email);
 			$sql->bindValue(":s",md5($senha));
 			$sql->execute();

 			return true;//cadastro efeutado com sucesso!

 		}

 	}

 	public function logar($email, $senha){

 		global $pdo;

 		//verifica se o email e senha estão cadastrados.
 		$sql = $pdo->prepare("select id_usuario from usuarios where email = :e and senha = :s");

 		//substituindo o :e e o :s.
 		$sql->bindValue(":e", $email);
 		$sql->bindValue(":s", md5($senha));
 		$sql->execute();

 		if($sql->rowCount() > 0){

 			//sessão para entrar no sistema.

 			//transformando os dados vindo do banco de dados em um array.

 			$dado = $sql->fetch();

 			//criando uma sessão.
 			session_start();
 			$_SESSION['id_usuario'] = $dado['id_usuario'];

 			return true;//logado com sucesso!


 		}else{

 			return false;//não foi possivél logar no sistema.

 		}


 	}
 }

?>
