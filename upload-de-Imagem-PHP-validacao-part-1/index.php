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
    <form method="POST" enctype="multipart/form-data">
      <label>Nome:</label>
      <input type="text" name="nome">
      <label>Email:</labe>
      <input type="email" name="email">
      <input type="file" name="foto">
      <input type="submit" value="enviar imagem">
   </form>
   <pre>
     <?php
        if(isset($_POST['nome'])){

                if($_FILES['foto']['type'] && $_POST['nome'] && $_POST['email'] != ''){
                    $nome_arq = md5($_FILES['foto']['name'].rand(1,999)). '.jpg';

              if(isset($_FILES['foto'])){
                  move_uploaded_file($_FILES['foto']['tmp_name'], 'img/'.$nome_arq);
                  echo "Imagem enviada com sucesso!";
              }

          }else{
            echo "<pre>
            Erro ao enviar imagem!
            Preencha os campos!
            </pre>";
          }
        }
      ?>
   </pre>
  </body>
</html>
