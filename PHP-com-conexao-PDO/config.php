<!DOCTYPE html>
<html>
<head>
	<title>PHP-COM-PDO</title>
</head>
<body>
<a href="insert.php">cadastro</a>
</body>
</html>

<?php

class Config{
 	
 	private $pdo; 	

	public function conectar($dbname, $host, $user, $passwd){		

 	 try{ 	 	 	 	
		
		$this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $user, $passwd);

 	 	}catch(PDOException $e){
			echo 'Erro ao conectar ao banco de dados!<br>'. $e->getMessage();
		
		}catch(Exception $e){
			echo 'Erro generico:' .$e->getMessage();
		}
	}

	public function cadastrar(){ 			

 		$command = $this->pdo->prepare("insert into livro(titulo,editora,autor,anoLanc,genero) values(:t,:e,:a,:an,:g)");

 		if($command->rowCount() == 0){

			$command->bindValue(":t", "sherlock holmes");
	 		$command->bindValue(":e", "Ward Lock & Co");
	 		$command->bindValue(":a", "conan doyle");
	 		$command->bindValue(":an", 1992);
	 		$command->bindValue(":g", "misterio");
	 		$command->execute(); 		

	 		echo "<h2>cadastro efetuado com sucesso!</h2>"; 		 						 		
 		}
 	}

 	public function deletar(){

 		$command = $this->pdo->query("delete from livro"); 		

 		echo "<h2>dados excluidos com sucesso!</h2>";
 	}

 	public function atualizar(){

 		 $command = $this->pdo->query("update livro set titulo = 'harry potter', editora= 'J. K. Rowling', autor= 'J. K. Rowling', anoLanc = '1997', genero = 'drama'");
 		 
 		 echo "<h2>Dados atualizados com sucesso!</h2>";
 	}


 		public function validar(){

 			$command = $this->pdo->prepare("select idLivro from livro where titulo = :t");
 			
 			$command->bindValue(":t", "zecao");
 			$command->execute();

 		if($command->rowCount() == 0){
		 		
		echo "<h2>Ainda não há dados cadastrados!</h2>"; 

 			return false;

 		}else{
			
			echo "<h2>Dados disponíveis!</h2>";  			
 			return true;

 		}

	}
}