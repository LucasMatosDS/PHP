<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>teste envio de imagem</title>
  </head>
  <style type="text/css">
        input{
          display: block;
          margin: 3px;
        }
  </style>
  <body>
    <!--Envio de multiplas imagens com PHP-->
    <form method="POST" enctype="multipart/form-data">
      <label>Nome:</label>
      <input type="text" name="nome">
      <label>Email:</labe>
      <input type="email" name="email">
      <input type="file" name="foto[]" multiple>
      <input type="submit" value="enviar imagem">
   </form>
   <pre>
     <?php

        if(isset($_FILES['foto'])){
          for($i = 0; $i < count($_FILES['foto']['name']); $i++){
              $nome_arq = md5($_FILES['foto']['name'][$i].rand(1,999)). '.jpg';
                move_uploaded_file($_FILES['foto']['tmp_name'][$i], 'img/'.$nome_arq);
                echo "movendo \n ".$_FILES['foto']['name'][$i];
          }
        }
      ?>
   </pre>
  </body>
</html>
