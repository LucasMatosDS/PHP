<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="get" action="index.php">
    <div align="center">
	<input type="text" name="cep" style="display: block; margin-bottom: 7px;">
	<input type="submit" name="pesquisar" value="Pesquisar" style="margin-bottom: 4px;">	
	
	<?php  

if(isset($_GET['pesquisar'])){

  function get_endereco($cep){

  		//formatando o cep.

  	$cep = preg_replace("/[^0-9]/", "", $cep);

  	$url = "http://viacep.com.br/ws/$cep/xml/";

  	$xml = simplexml_load_file($url);

  	return $xml;
  }

 $endereco = (get_endereco($_GET['cep']));

 echo "<div style='background: black; color: white; width: 20%; margin: auto;'>CEP: $endereco->cep
 	   <br>Rua: $endereco->logradouro
 	   <br>Bairro: $endereco->bairro
 	   <br>Localidade: $endereco->localidade
 	   <br>Estado: $endereco->uf</div>
 ";
 }
?>
</div>
</form>
</body>
</html>
