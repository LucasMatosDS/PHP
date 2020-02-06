<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>teste envio de imagem</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/animate.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>	
<button type="button" class="btn btn-danger m-2" id="deletar" onclick="return verificarExclusao()">Deletar Registros</button>
 <a href="index.php" name="voltar" id="voltar">voltar</a>
<div class="container col-md-12 text-center animated fadeIn">
	<?php 

		include_once 'class/Imagem.php';

		$p = new Imagem('form_produtos', 'localhost', 'root', '');

		$dadosProduto = $p->buscarProdutos();

		if(empty($dadosProduto)){
			?>
						
			<div class="alert alert-info col-md-3 text-center" role="alert">
  				Ainda não há produtos cadastrados!
			</div>			

			<?php	

		}else{
						
			 foreach($dadosProduto as $valor){
			
			?>
<div class="card">	
<div class="embed-responsive embed-responsive-16by9
">
   <img src="img/<?php echo $valor['foto_capa'];?>" class="embed-responsive-item" alt="Imagem Indisponível">
</div>   
  <div class="card-body">
    <h5 class="card-title"><strong><?php echo $valor['nome_prod'];?></strong></h5>
    <hr>
    <p class="card-text"><?php echo $valor['descricao'];?></p>    
    <a href="img/<?php echo $valor['foto_capa'];?>" class="btn btn-warning mb-2">visualizar imagens</a>
    <a class="btn btn-primary" id="download" onclick="baixarImagem()" download>Download</a>
  </div>
</div>
			<?php
				 			

			  }
		
		}
		
	?>
</div>

<script type="text/javascript">
	
	function baixarImagem(){
		var img =  confirm('voce desejá fazer o donwload do arquivo ?');

		 if(img == true){		 			 			 	
		 $('a#download').attr({target: '_blank', 
                    href  : './img/<?php echo $valor['foto_capa'];?>'});
                    window.location.href = 'produtos.php';                    		 
                    
    			
		 }else if(img != true){

		 }
	}

	function verificarExclusao(){
	  var confirmacao = confirm('voce desejá excluir todos os registros ?');
		if(confirmacao == true){
			window.location.href = './excluir.php';			
		}
	}	

</script>
</body>
</html>