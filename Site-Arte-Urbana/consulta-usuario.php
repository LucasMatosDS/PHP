<?php
session_start();
ob_start();

include_once "dao/artedao.class.php";
include_once "modelo/arte.class.php";

$arteDAO = new ArteDAO();
$array = $arteDAO->buscarUsuario();

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
      <div class="container">
        <h1 id="custom" class="jumbotron bg-info">Consulta de usuários</h1>

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
                  <li><a  style="color: #a9a9a9" href="consulta-usuario.php">Consultar usuários</a></li>
                </ul>
              </nav>
             </div>
            </nav>
            <!-- FIM DO MENU-->
        <h2 id="custom">tabela de gerenciamento de usuários</h2>
        <?php
        if(isset($array)){
          if(count($array)==0){
            echo "<script type=\"text/javascript\">alert('Não há usuarios cadastrados!');</script>";
            // echo "<h3>Não há usuarios cadastrados!</h3>";
             return;
          }
        ?>

        <form name="pesquisa" method="post" action="">
          <div class="row">
            <div class="form-group col-md-6">
              <input type="text" name="txtfiltro"
              class="form-control" placeholder="Digite sua pesquisa">
            </div>
            <div class="form-group col-md-6">
              <select name="selfiltro" class="form-control">
                <option value="todos">Todos</option>
                <option value="codigo">código</option>
                <option value="vulgoArtista">vulgo do artista</option>
                <option value="especialidade">especialidade</option>
                <option value="pintaQuando">pinta desde quando</option>
                <option value="cidade">cidade</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <input type="submit" name="filtrar" value="Filtrar"
                   class="btn btn-primary btn-block">
          </div>
        </form>

        <?php
        if(isset($_POST['filtrar'])){
          $pesquisa = $_POST['txtfiltro'];
          $filtro = $_POST['selfiltro'];
          $arteDAO = new ArteDAO();
          $array = $arteDAO->filtrarUsuario($filtro, $pesquisa);

          if(count($array) == 0){
            echo "<h2>Sua pesquisa não retornou nenhum usuario!</h2>";
            return;
          }//fecha if
        }//fecha if
        ?>

        <div class="table-responsive table">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Alterar</th>
                <th>Excluir</th>
                <th>código</th>
                <th>vulgo do artista</th>
                <th>especialidade</th>
                <th>pinta desde quando</th>
                <th>cidade</th>
              </tr>
            </thead>

            <tfoot>
              <th>Alterar</th>
              <th>Excluir</th>
              <th>Código</th>
              <th>vulgoArtista</th>
              <th>especialidade</th>
              <th>pintaQuando</th>
              <th>cidade</th>
            </tfoot>

            <tbody>
              <?php
                  foreach($array as $arte){
                    echo "<tr>";
                      echo "<td><a  href='alterar-usuario.php?id=$arte->idArtista'class='btn btn-warning' id='link1'><img src='img/alterar.png'/></a></td>";
                      echo "<td><a  href='consulta-usuario.php?id=$arte->idArtista'class='btn btn-danger' id='link2'><img src='img/deletar.png'/></a></td>";
                      echo "<td>$arte->idArtista</td>";
                      echo "<td>$arte->vulgoArtista</td>";
                      echo "<td>$arte->especialidade</td>";
                      echo "<td>$arte->pintaQuando</td>";
                      echo "<td>$arte->cidade</td>";
                    echo "</tr>";
                  }//fecha foreach
              }//fecha if
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <?php
      if(isset($_GET['id'])){
        $arteDAO = new ArteDAO();
        $arteDAO->deletarUsuario($_GET['id']);
        header("location:consulta-usuario.php");
      }//fecha if
      ?>
  </body>
</html>
