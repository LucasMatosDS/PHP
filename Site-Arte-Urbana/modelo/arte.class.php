<?php

class Arte{
  private $idArtista;
  private $vulgoArtista;
  private $especialidade;
  private $pintaQuando;
  private $cidade;



  public function __construct(){

  }

  public function __destruct(){

  }

  public function __get($a){ return $this->$a;}
  public function __set($a,$v){ $this->$a = $v;}

  public function __toString(){
    return nl2br("
                  idartista: $this->idArtista
                  vulgo: $this->vulgoArtista
                  especialidade: $this->especialidade
                  pintaQuando: $this->pintaQuando
                  cidade: $this->cidade");

          }

}
