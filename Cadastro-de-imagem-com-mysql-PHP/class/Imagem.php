<?php

class Imagem{

	private $pdo;

	public function __construct($dbname, $host, $user, $senha){

		try{

			$this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
			
		}catch(PDOException $e){
			echo 'Erro ao conectar ao banco de dados!'. $e->getMessage();
		
		}catch(Exception $e){
			echo 'Erro generico:' .$e->getMessage();
		}
	}

	public function enviarImagem($nome,$descricao, $fotos = array()){

		//inserindo na tabela produto.
		$cmd = $this->pdo->prepare('insert into produtos(nome_prod,descricao) values(?,?)');
		$cmd->bindValue(1, $nome);
		$cmd->bindValue(2, $descricao);
		$cmd->execute();

		//pegando o id do produto, para poder inserir na tabela imagens.
		$id_Prod = $this->pdo->LastInsertId();

		//verificar se há imagens.

		 if(count($fotos) > 0){

		 	for($i = 0; $i < count($fotos); $i++){
		 		//inserindo na tabela imagens.
		 	
		 	$nome_foto = $fotos[$i];

		$cmd = $this->pdo->prepare('insert into imagens(nome_imagem, fk_id_prod) values(?,?)');
		$cmd->bindValue(1, $nome_foto);
		$cmd->bindValue(2, $id_Prod);
		$cmd->execute();
		  }
		}	 
	}

	public function buscarProdutos(){

		$cmd = $this->pdo->prepare('select *,(select nome_imagem from imagens where fk_id_prod = id_prod limit 1) as foto_capa from produtos');			
		 	$cmd->execute();

		 if($cmd->rowCount() > 0){
		 		$dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
		 }else{
		 		$dados = array();
		 }

		 return $dados;
	}

	public function deletarTodosOsRegistros(){

     try{

         $cmd = $this->pdo->query("delete from produtos");         
         

     }catch(PDOException $e){
       echo "Erro ao excluir os Registros!";
     }
 }

 public function reiniciarId(){

 		$cmd = $this->pdo->prepare('alter table produtos auto_increment = 1');
 		$cmd = $this->pdo->prepare('alter table imagens auto_increment = 1');
 		$cmd->execute();
 }

}