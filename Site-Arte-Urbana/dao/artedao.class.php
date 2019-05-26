<?php
require_once 'config/conexaobanco.class.php';

class ArteDAO{

  private $conexao = null;

  public function __construct(){
    $this->conexao = ConexaoBanco::getInstance();
  }

  public function __destruct(){}

//cadastro usuario
  public function cadastrarUsuario($arte){
    try {
      $stat = $this->conexao->prepare("insert into arte(idArtista,vulgoArtista,especialidade,pintaQuando,cidade) values(null,?,?,?,?)");

      $stat->bindValue(1, $arte->vulgoArtista);
      $stat->bindValue(2, $arte->especialidade);
      $stat->bindValue(3, $arte->pintaQuando);
      $stat->bindValue(4, $arte->cidade);

      $stat->execute();
    } catch (PDOException $e) {
      echo "Erro ao cadastrar usuario!".$e;
    }//fecha catch
  }//fecha metodo
//cadastro de usuario

//buscar arte
  public function buscarUsuario(){
      try{
        $stat = $this->conexao->query("select * from arte");
        $array = $stat->fetchAll(PDO::FETCH_CLASS, "arte");
        return $array;
      }catch(PDOException $e){
        echo "Erro ao buscar usuario!".$e;
      }//fecha catch
  }//fecha metodo
//fecha buscar usuarios

//deletar usuarios
public function deletarUsuario($id){
  try{
    $stat = $this->conexao->prepare(
      "delete from arte where idArtista = ?");
    $stat->bindValue(1, $id);
    $stat->execute();
  }catch(PDOException $e){
    echo "Erro ao excluir Usuário! ".$e;
  }//fecha catch
}//fecha deletar usuarios
public function filtrarUsuario($filtro, $pesquisa){
  try {
    $query = "";
    switch ($filtro) {
      case "codigo": $query = "where idArtista = ".$pesquisa;
      break;
      case "vulgoArtista": $query = "where vulgoArtista like '%".$pesquisa."%'";
      break;
      case "especialidade": $query = "where especialidade like '%".$pesquisa."%'";
      break;
      case "pintaQuando": $query = "where pintaQuando like '%".$pesquisa."%'";
      break;
      case "cidade": $query = "where cidade like '%".$pesquisa."%'";
      break;
    }

    if(empty($pesquisa)){
      $query = "";
    }
    $stat = $this->conexao->query("select * from arte ".$query);
    $array = $stat->fetchAll(PDO::FETCH_CLASS, "arte");
    return $array;
  } catch (PDOException $e) {
    echo "Erro ao filtrar! ".$e;

  }
}//fecha filtrar usuario

public function alterarUsuario($arte){
  try{
    $stat = $this->conexao->prepare("update arte set vulgoArtista=?, especialidade=?, pintaQuando=?, cidade=? where idArtista=?");
    $stat->bindValue(1, $arte->vulgoArtista);
    $stat->bindvalue(2, $arte->especialidade);
    $stat->bindValue(3, $arte->pintaQuando);
    $stat->bindValue(4, $arte->cidade);
    $stat->bindValue(5, $arte->idArtista);

    $stat->execute();

  }catch(PDOException $e){
    echo "Erro ao alterar usuario!".$e;
  }
}//fecha alterar usuario

//JSON
public function gerarJSON($filtro, $pesquisa){
  try {
    $query="";
    switch ($filtro) {
      case 'codigo':
        $query = "where idArtista = ".$pesquisa;
        break;
      }
      $stat = $this->conexao->query(
        "select * from arte ".$query);
        return json_encode($stat->fetchAll(PDO::FETCH_ASSOC));
  } catch (PDOException $e) {
    echo "Erro ao gerar JSON";
  }
}
}//fecha classe
