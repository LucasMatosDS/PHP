<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv=”content-type” content="text/html;" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="keywords" content=""/>
  <title>GraffRS</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> <!--responsavel pelo estilo e ajuste da pagina -->
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> <!--responsavel pelo icone responsivo do menu  -->

  <!--  LINK DE INSTALAÇÃO DA TAG JAVASCRIPT E JQUERY PARA O MENU -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> <!--responsavel pelas funcionalidades do menu -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script><!--responsavel pelas funcionalidades do menu -->
<!-- inicio favicon -->
<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<!--fim favicon -->
</head>
  <body>
    <!-- INÍCIO DO MENU-->
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#links-menu" style="background-color: silver;">
              <i class="material-icons">menu</i>
            </button>
          </div>
          <nav id="links-menu" class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-right">
              <li><a  style="color: #a9a9a9" href="index.php">Home</a></li>
              <li><a  style="color: #a9a9a9" href="cadastro-usuario.php">Cadastrar-se</a></li>
              <li><a  style="color: #a9a9a9" href="consulta-usuario.php">Consultar usuarios</a></li>
            </ul>
          </nav>
         </div>
        </nav>
        <!-- FIM DO MENU-->

      <div class="container" id="fundo">
      <h1 id="custom" class="jumbotron bg-info">Cadastro de usuário</h1>
        <img src="img/perfil.png" id="imagem">
        <form name="caduser" method="post" action="">
          <div class="form-group">
            <input id="campo" type="text" name="txtvulgoArtista" placeholder="vulgo do artista"  autofocus class="form-control" required>
          </div>
          <div class="form-group">
            <select required id="campo" type="select"
            name="selespecialidade"
            placeholder="especialidade do artista" class="form-control">
            <option value="Tags">Tags</option>
            <option value="Bombs">Bombs</option>
            <option value="Pixos">Pixos</option>
            <option value="Stickers">Stickers</option>
          </select>
          </div>
          <div class="form-group">
            <input id="campo" type="number" name="numpintaQuando" placeholder="pinta desde Quando ?" class="form-control">
          </div>
          <div class="form-group">
            <input id="campo" type="text" name="txtcidade" placeholder="cidade" class="form-control" required>
          </div>
          <div class="form-group">
            <input id="botao1" type="submit" name="cadastrar" value="Cadastrar" class="btn btn-success">
            <input id="botao2" type="reset" name="Limpar" value="Cancelar" class="btn btn-danger">
          </div>
      </form>

        <?php
        if (isset($_SESSION['msg'])) {
          echo $_SESSION['msg'];

          unset($_SESSION['msg']);
        }
        ?>

        <?php
        if (isset($_POST['cadastrar'])) {
          include_once "modelo/arte.class.php";
          include_once "dao/artedao.class.php";
          include_once "util/padronizacao.class.php";

          $arte = new Arte();
          $arte->vulgoArtista = Padronizacao::converterMainMin($_POST['txtvulgoArtista']);
          $arte->especialidade = Padronizacao::converterMainMin($_POST['selespecialidade']);
          $arte->pintaQuando = Padronizacao::converterMainMin($_POST['numpintaQuando']);
          $arte->cidade = Padronizacao::converterMainMin($_POST['txtcidade']);
          $arteDAO = new ArteDAO();
          $arteDAO-> cadastrarUsuario($arte);

        //  $_SESSION['msg'] = "usuario cadastrado com sucesso!";
    echo "<script type=\"text/javascript\">alert('usuario cadastrado com sucesso');</script>";
    echo "<script>window.location.href='consulta-usuario.php'</script>";
        }
        ?>

      </div>
  </body>
</html>
