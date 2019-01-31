<?php
include "connect.php";
//validacao deo cadastro no banco de dados.

//estou pegando o valor que vem pela URL
$valor = $_GET['v'];
 
 if($valor == ""){
    echo "<script>window.location.href='cadastro.php';</script>";	
 }else{

//pegar o codigo
$sql = mysqli_query($link,"select * from tb_cadastro where valida = '$valor'");

while($linha = mysqli_fetch_array($sql)){
	$codigo = $linha['valida'];
}

if ($valor == $codigo) {
mysqli_query($link,"update tb_cadastro set = 1 where $valida = '$valor'");
echo "cadastro ativado com sucesso!";
	}else{
	echo "não atualizou";
	echo "<a href=cadastro.php>voltar a tela de cadastro</a>";
	}

 }


?>