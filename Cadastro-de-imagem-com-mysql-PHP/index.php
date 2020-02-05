<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">   
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>teste envio de imagem</title>
  </head>
  <body>
    <a href="produtos.php" id="voltar">ver Produtos</a>
    <!--Envio de multiplas imagens com PHP-->
    <form method="POST" enctype="multipart/form-data" class="container col-md-4 mt-3 formulario">
  <div class="form-group">
    <label for="exampleFormControlInput1">Titulo:</label>
    <input type="text" class="form-control" name="nome" id="exampleFormControlInput1" placeholder="Informe um titulo">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descrição:</label>
    <textarea class="form-control mb-2" name="descricao" id="exampleFormControlTextarea1" rows="10" placeholder="Informe a descrição do produto"></textarea>    
  </div>
  <div class="form-group">    
    <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1" accept=".jpg,.png,.mp4,.mkv">        
  </div>
  <div class="form-group">
    <input type="submit" value="enviar" class="btn btn-success border border-dark">
  </div>
</form>   
   <p>
    <strong>
     <?php

  if(isset($_POST['nome'])){
        $nome = addslashes($_POST['nome']);
        $descricao = addslashes($_POST['descricao']);

        $fotos = array();

        if(isset($_FILES['foto'])){

          //for($i = 0; $i < count($_FILES['foto']['name']); $i++){

              //salvando dentro da pasta img.
              $nome_imagem = md5(uniqid($_FILES['foto']['name']));
                move_uploaded_file($_FILES['foto']['tmp_name'], 'img/'.$nome_imagem);
                echo "movendo... \n ".$_FILES['foto']['name'];

                //salvar nomes para enviar para o banco.

                //inserindo dentro da variavel foto o nome da imagem.
                array_push($fotos, $nome_imagem);

                //verificar se os campos foram preenchidos.

                 if(!empty($nome) && !empty($descricao)){

                    include_once 'class/Imagem.php';

                    $p = new Imagem('form_produtos', 'localhost', 'root', '');

                    $p->enviarImagem($nome,$descricao, $fotos);
                  
                 }else{

                  ?>

                  <script type="text/javascript">
                      alert('Preencha os campos obrigatórios!');
                  </script>

                  <?php
                 }
          //}

          ?>
            <script type="text/javascript">
                      alert('Produto cadastrado com sucesso!');
                  </script>
                  
                  <?php
        }
      }
      ?>
    </strong>
   </p>
  </body>
</html>