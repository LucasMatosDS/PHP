<?php
	 include_once 'class/Imagem.php';	 

	$p = new Imagem('form_produtos', 'localhost', 'root', '');

if(isset($_GET['id']) && !empty($_GET['id'])){

	$id = addslashes($_GET['id']);

}else{

	header('location: produtos.php');
}
	$dadosP = $p->buscarProdutoPorId($id);
	$imagensP = $p->buscarImagemPorId($id);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>teste envio de imagem</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

<div>	

 <?php
  echo $dadosP['nome_prod'];
 ?>
<p><?php echo $dadosP['descricao'];?></p>

	<?php 
  foreach($imagensP as $valor){
 		
 	 	?>

  <img class="col-md-3 amostra" src="img/<?php echo $valor['nome_imagem'];?>">
	

  <?php
}

	?>	
</div>
</body>
</html>