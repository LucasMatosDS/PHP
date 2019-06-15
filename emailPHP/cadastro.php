
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv=”content-type” content="text/html;" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>site Fatech</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body id="fundo">
      
    <style type="text/css">
     ::placeholder{
         color: white!important;
     }
    </style>
<div class="container" id="fundocontainer">
  <div id="customblock" class="jumbotron">
     <h1 id="titulo">Cadastro</h1>
   </div>
  <form action="email.php" method="POST" id="formulario">
  <div class="form-group col-md-12">
<input id="campo" type="text"  name="email" placeholder="Informe o E-mail do Destinatário:" autofocus class="form-control" pattern="^([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]*(.){1}[a-zA-Z]{2,4})+$" required> 
</div>
<div class="form-group col-md-12">
<input id="campo" type="text" name="assunto" placeholder="Informe o assunto: " class="form-control"  required>
</div>
<div class="form-group col-md-12">
<textarea class="form-control" style="resize: none; width: 100%;
 height: 100px; background: black; color: white;
" type="text" name="mensagem" form="formulario" placeholder="Digite sua mensagem: "></textarea>
</div>
<div class="form-group col-md-12">
  <input onclick="window.open('final.php?')" id="button1" type="submit" name="cadastrar" value="Cadastrar" class="btn btn-success">
  <input id="button2" type="reset" name="Limpar" value="limpar" class="btn btn-danger">
 </div>
</form>
    </div>
  </body>
</html>
